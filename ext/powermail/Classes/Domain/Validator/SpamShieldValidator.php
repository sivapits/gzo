<?php
/**
 * @package powermail
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 */
class Tx_Powermail_Domain_Validator_SpamShieldValidator extends Tx_Extbase_Validation_Validator_AbstractValidator {

	/**
	 * @var Tx_Extbase_SignalSlot_Dispatcher
	 */
	protected $signalSlotDispatcher;

	/**
	 * Spam indication start value
	 *
	 * @var integer
	 */
	protected $spamIndicator = 0;

	/**
	 * TypoScript Settings
	 *
	 * @var array
	 */
	protected $settings;

	/**
	 * @var Tx_Powermail_Utility_Div
	 */
	protected $div;

	/**
	 * Referrer action
	 *
	 * @var string
	 */
	protected $referrer;

	/**
	 * Error messages for email to admin
	 *
	 * @var array
	 */
	protected $msg = array();

	/**
	 * Spam-Validation of given Params
	 * 		see powermail/doc/SpamDetection for formula
	 *
	 * @param array $params
	 * @return bool
	 */
	public function isValid($params) {
		if (!$this->settings['spamshield.']['_enable']) {
			return TRUE;
		}
		$spamFactor = $this->settings['spamshield.']['factor'] / 100;

		// Different checks to increase spam indicator
		$this->honeypodCheck($params, $this->settings['spamshield.']['indicator.']['honeypod']);
		$this->linkCheck(
			$params,
			$this->settings['spamshield.']['indicator.']['link'],
			$this->settings['spamshield.']['indicator.']['linkLimit']
		);
		$this->nameCheck($params, $this->settings['spamshield.']['indicator.']['name']);
		$this->sessionCheck($this->settings['spamshield.']['indicator.']['session']);
		$this->uniqueCheck($params, $this->settings['spamshield.']['indicator.']['unique']);
		$this->blacklistStringCheck($params, $this->settings['spamshield.']['indicator.']['blacklistString']);
		$this->blacklistIpCheck($this->settings['spamshield.']['indicator.']['blacklistIp']);

		// spam formula with asymptote 1 (100%)
		$thisSpamFactor = 0;
		if ($this->spamIndicator > 0) {
			$thisSpamFactor = -1 / $this->spamIndicator + 1;
		}

		$this->signalSlotDispatcher->dispatch(__CLASS__, __FUNCTION__ . 'SpamShieldValidation', array($params, $this));

		// Save Spam Factor in session for db storage
		$GLOBALS['TSFE']->fe_user->setKey('ses', 'powermail_spamfactor', $this->formatSpamFactor($thisSpamFactor));
		$GLOBALS['TSFE']->storeSessionData();

		// Spam debugging
		if ($this->settings['debug.']['spamshield']) {
			t3lib_utility_Debug::debug(
				$this->msg, 'powermail debug: Show Spamchecks - Spamfactor ' . $this->formatSpamFactor($thisSpamFactor)
			);
		}

		// if spam
		if ($thisSpamFactor >= $spamFactor) {
			$this->addError('spam_details', $this->formatSpamFactor($thisSpamFactor));

			// Send notification email to admin
			if (t3lib_div::validEmail($this->settings['spamshield.']['email'])) {
				$subject = 'Spam in powermail form recognized';
				$message = 'Possible spam in powermail form on page with PID ' . $GLOBALS['TSFE']->id;
				$message .= "\n\n";
				$message .= 'Spamfactor of this mail: ' . $this->formatSpamFactor($thisSpamFactor) . "\n";
				$message .= "\n\n";
				$message .= 'Failed Spamchecks:' . "\n";
				$message .= Tx_Powermail_Utility_Div::viewPlainArray($this->msg);
				$message .= "\n\n";
				$message .= 'Given Form variables:' . "\n";
				$message .= Tx_Powermail_Utility_Div::viewPlainArray($params);
				$header  = 'MIME-Version: 1.0' . "\r\n";
				$header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
				$header .= 'From: powermail@' . t3lib_div::getIndpEnv('TYPO3_HOST_ONLY') . "\r\n";
				t3lib_div::plainMailEncoded($this->settings['spamshield.']['email'], $subject, $message, $header);
			}

			return FALSE;
		}

		return TRUE;
	}

	/**
	 * Honeypod Check: Spam recognized if Honeypod field is filled
	 *
	 * @param array $params Given params
	 * @param float $indication Indication if check fails
	 * @return void
	 */
	protected function honeypodCheck($params, $indication = 1.0) {
		if (!$indication) {
			return;
		}

		// if check failes
		if (isset($params['hp']) && !empty($params['hp'])) {
			$this->spamIndicator += $indication;
			$this->msg[] = __FUNCTION__ . ' failed';
		}
	}

	/**
	 * Link Check: Counts numbers of links in message
	 *
	 * @param array $params Given params
	 * @param float $indication Indication if check fails
	 * @param integer $limit Limit of allowed links in mail
	 * @return void
	 */
	protected function linkCheck($params, $indication = 1.0, $limit = 2) {
		if (!$indication) {
			return;
		}

		// check numbers of links
		$linkAmount = 0;
		foreach ((array) $params as $value) {
			if (is_array($value)) {
				continue;
			}
			preg_match_all('@http://|https://|ftp.@', $value, $result);
			if (isset($result[0])) {
				// add numbers of http://
				$linkAmount += count($result[0]);
			}
		}

		// if check failes
		if ($linkAmount > $limit) {
			$this->spamIndicator += $indication;
			$this->msg[] = __FUNCTION__ . ' failed';
		}
	}

	/**
	 * Name Check: Compares first- and lastname (shouldn't be the same)
	 *
	 * @param array $params Given params
	 * @param float $indication Indication if check fails
	 * @return void
	 */
	protected function nameCheck($params, $indication = 1.0) {
		if (!$indication) {
			return;
		}
		$keysFirstname = array(
			'first_name',
			'firstname',
			'vorname'
		);
		$keysLastname = array(
			'last_name',
			'lastname',
			'sur_name',
			'surname',
			'nachname',
			'name'
		);

		// find out first- and lastname (marker should be {firstname} and {lastname}
		foreach ((array) $params as $field => $value) {
			if (is_array($value)) {
				continue;
			}
			$marker = $this->div->getMarkerFromField($field);
			if (in_array($marker, $keysFirstname)) {
				$firstname = $value;
			}
			if (in_array($marker, $keysLastname)) {
				$lastname = $value;
			}
		}

		// if check failes
		if (isset($firstname) && isset($lastname)) {
			if ($firstname && $firstname == $lastname) {
				$this->spamIndicator += $indication;
				$this->msg[] = __FUNCTION__ . ' failed';
				return;
			}
		}
	}

	/**
	 * Session Check: Checks if session was started correct on form delivery
	 *
	 * @param float $indication Indication if check fails
	 * @return void
	 */
	protected function sessionCheck($indication = 1.0) {
		// Stop sessionCheck if indicator turned to 0 OR if last action = optinConfirm
		if (!$indication || $this->referrer == 'optinConfirm') {
			return;
		}
		$gp = t3lib_div::_GP('tx_powermail_pi1');
		$formUid = $gp['form'];
		$time = Tx_Powermail_Utility_Div::getFormStartFromSession($formUid);

		// if check failes
		if (!isset($time) || !$time) {
			$this->spamIndicator += $indication;
			$this->msg[] = __FUNCTION__ . ' failed';
		}
	}

	/**
	 * Unique Check: Checks if values in given params are different
	 *
	 * @param array $params Given params
	 * @param float $indication Indication if check fails
	 * @return void
	 */
	protected function uniqueCheck($params, $indication = 1.0) {
		if (!$indication) {
			return;
		}

		$arr = array();
		foreach ((array) $params as $value) {

			// don't want values in second level (from checkboxes e.g.)
			if (is_array($value)) {
				continue;
			}

			if (!empty($value)) {
				$arr[] = $value;
			}
		}

		// if check failes
		if (count($arr) != count(array_unique($arr))) {
			$this->spamIndicator += $indication;
			$this->msg[] = __FUNCTION__ . ' failed';
			return;
		}
	}

	/**
	 * Blacklist String Check: Check if a blacklisted word is in given values
	 *
	 * @param array $params Given params
	 * @param float $indication Indication if check fails
	 * @return void
	 */
	protected function blacklistStringCheck($params, $indication = 1.0) {
		if (!$indication) {
			return;
		}
		$blacklist = t3lib_div::trimExplode(',', $this->settings['spamshield.']['indicator.']['blacklistStringValues'], 1);

		// if check failes
		foreach ((array) $params as $value) {
			foreach ((array) $blacklist as $blackword) {
				if (is_array($value)) {
					continue;
				}
				if (stristr($value, $blackword)) {
					$this->spamIndicator += $indication;
					$this->msg[] = __FUNCTION__ . ' failed';
					return;
				}
			}
		}
	}

	/**
	 * Blacklist IP-Address Check: Check if Senders IP is blacklisted
	 *
	 * @param float $indication Indication if check fails
	 * @return void
	 */
	protected function blacklistIpCheck($indication = 1.0) {
		if (!$indication) {
			return;
		}
		$blacklist = t3lib_div::trimExplode(',', $this->settings['spamshield.']['indicator.']['blacklistIpValues'], 1);

		// if check failes
		if (in_array(t3lib_div::getIndpEnv('REMOTE_ADDR'), $blacklist)) {
			$this->spamIndicator += $indication;
			$this->msg[] = __FUNCTION__ . ' failed';
			return;
		}
	}

	/**
	 * Format for Spamfactor (0.23 => 23%)
	 *
	 * @param float $factor
	 * @return float
	 */
	protected function formatSpamFactor($factor) {
		return number_format(($factor * 100), 0) . '%';
	}

	/**
	 * Constructor
	 */
	public function __construct() {
		$piVars = t3lib_div::_GP('tx_powermail_pi1');
		$this->referrer = $piVars['__referrer']['actionName'];
	}

	/**
	 * @param Tx_Extbase_Configuration_ConfigurationManagerInterface $configurationManager
	 * @return void
	 */
	public function injectConfigurationManager(Tx_Extbase_Configuration_ConfigurationManagerInterface $configurationManager) {
		$typoScriptSetup = $configurationManager->getConfiguration(
			Tx_Extbase_Configuration_ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT
		);
		$this->settings = $typoScriptSetup['plugin.']['tx_powermail.']['settings.']['setup.'];
	}

	/**
	 * @param Tx_Powermail_Utility_Div $div
	 * @return void
	 */
	public function injectDiv(Tx_Powermail_Utility_Div $div) {
		$this->div = $div;
	}

	/**
	 * @param Tx_Extbase_SignalSlot_Dispatcher $signalSlotDispatcher
	 * @return void
	 */
	public function injectSignalSlotDispatcher(Tx_Extbase_SignalSlot_Dispatcher $signalSlotDispatcher) {
		$this->signalSlotDispatcher = $signalSlotDispatcher;
	}
}
