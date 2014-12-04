<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Alex Kellner <alexander.kellner@in2code.de>, in2code.de
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/


/**
 * Div is a class for a collection of misc functions
 *
 * @package powermail
 * @license http://www.gnu.org/licenses/lgpl.html
 * 			GNU Lesser General Public License, version 3 or later
 */
class Tx_Powermail_Utility_Div {

	/**
	 * Extension Key
	 */
	public static $extKey = 'powermail';

	/**
	 * @var Tx_Powermail_Domain_Repository_FormsRepository
	 */
	protected $formsRepository;

	/**
	 * @var Tx_Powermail_Domain_Repository_FieldsRepository
	 */
	protected $fieldsRepository;

	/**
	 * @var Tx_Powermail_Domain_Repository_UserRepository
	 */
	protected $userRepository;

	/**
	 * Get Field Uid List from given Form Uid
	 *
	 * @param integer $formUid Form Uid
	 * @return array
	 */
	public function getFieldsFromForm($formUid) {
		$fields = array();
		$form = $this->formsRepository->findByUid($formUid);
		if (!method_exists($form, 'getPages')) {
			return;
		}
		foreach ($form->getPages() as $page) {
			foreach ($page->getFields() as $field) {
				$fields[] = $field->getUid();
			}
		}

		return $fields;
	}

	/**
	 * Returns sendername from a couple of arguments
	 *
	 * @param array $fields Given Params
	 * @return string Sender Name
	 */
	public function getSenderNameFromArguments($fields) {
		if (!is_array($fields)) {
			return '';
		}

		$name = '';
		foreach ($fields as $uid => $value) {
			$field = $this->fieldsRepository->findByUid($uid); // get field
			if (method_exists($field, 'getUid') && $field->getSenderName()) {
				$name .= $value . ' ';
			}
		}

		if (!$name) {
			$name = Tx_Extbase_Utility_Localization::translate('error_no_sender_name', 'powermail');
		}
		return trim($name);
	}

	/**
	 * Returns senderemail from a couple of arguments
	 *
	 * @param array $fields Given Params
	 * @return string Sender Email
	 */
	public function getSenderMailFromArguments($fields) {
		if (!is_array($fields)) {
			return '';
		}

		$email = '';
		foreach ($fields as $uid => $value) {
			$field = $this->fieldsRepository->findByUid($uid); // get field
			if (method_exists($field, 'getUid') && $field->getSenderEmail() && t3lib_div::validEmail($value)) {
				$email = $value;
				break;
			}
		}

		if (!$email) {
			$email = Tx_Extbase_Utility_Localization::translate('error_no_sender_email', 'powermail');
			$email .= '@';
			$email .= str_replace('www.', '', t3lib_div::getIndpEnv('TYPO3_HOST_ONLY'));
		}
		return $email;
	}

	/**
	 * Save current timestamp to session
	 *
	 * @param integer $formUid Form uid
	 * @return void
	 */
	public static function saveFormStartInSession($formUid) {
		if (intval($formUid) === 0) {
			return;
		}

		$GLOBALS['TSFE']->fe_user->setKey('ses', 'powermailFormstart' . $formUid, time());
		$GLOBALS['TSFE']->storeSessionData();
	}

	/**
	 * Read FormStart
	 *
	 * @param integer $formUid Form UID
	 * @return integer Timestamp
	 */
	public static function getFormStartFromSession($formUid) {
		$timestamp = $GLOBALS['TSFE']->fe_user->getKey('ses', 'powermailFormstart' . $formUid);
		return $timestamp;
	}

	/**
	 * Returns given number or the current PID
	 *
	 * @param integer $pid Storage PID or nothing
	 * @return integer $pid
	 */
	public static function getStoragePage($pid = 0) {
		if (!$pid) {
			$pid = $GLOBALS['TSFE']->id;
		}
		return $pid;
	}

	/**
	 * This functions renders the powermail_all Template to use in Mails and Other views
	 *
	 * @param array $variables Arguments from form POST
	 * @param object $configurationManager Configuration Manager
	 * @param object $objectManager Object Manager
	 * @param string $section Choose a section (web or mail)
	 * @param array $settings TypoScript Settings
	 * @return string content parsed from powermailAll HTML Template
	 */
	public function powermailAll($variables, $configurationManager, $objectManager, $section = 'web', $settings = array()) {
		$powermailAll = $objectManager->create('Tx_Fluid_View_StandaloneView');
		$extbaseFrameworkConfiguration = $configurationManager->getConfiguration(Tx_Extbase_Configuration_ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
		$templatePathAndFilename = t3lib_div::getFileAbsFileName($extbaseFrameworkConfiguration['view']['templateRootPath']) . 'Forms/PowermailAll.html';
		$powermailAll->setLayoutRootPath(t3lib_div::getFileAbsFileName($extbaseFrameworkConfiguration['view']['layoutRootPath']));
		$powermailAll->setPartialRootPath(t3lib_div::getFileAbsFileName($extbaseFrameworkConfiguration['view']['partialRootPath']));
		$powermailAll->setTemplatePathAndFilename($templatePathAndFilename);
		$powermailAll->assign('variables', $variables);
		$powermailAll->assign('section', $section);
		$powermailAll->assign('settings', $settings);
		$content = $powermailAll->render();

		return $content;
	}

	/**
	 * Generate a new array from POST array with markers
	 * 		before: 123 => value
	 * 		after: firstname => value
	 *
	 * @param array $fields piVars from Form Submit
	 * @return array new array
	 */
	public function getVariablesWithMarkers($fields) {
		$variables = array();
		foreach ((array) $fields as $uid => $value) { // one loop for every received field
			if (!is_numeric($uid)) {
				continue;
			}
			if (!is_array($value)) {
				// default values
				$variables[$this->getMarkerFromField($uid)] = $value;
			} else {
				// values from checkboxes
				$marker = $this->getMarkerFromField($uid);
				$variables[$marker] = '';
				foreach ($value as $singleValue) {
					if (empty($singleValue)) {
						continue;
					}
					$variables[$marker] .= $singleValue;
					$variables[$marker] .= ', ';
				}
				$variables[$marker] = substr(trim($variables[$marker]), 0, -1); // remove last comma
			}
		}
		return $variables;
	}

	/**
	 * Generate a new array from POST array with their labels and respect FE language
	 * 		before: 123 => value
	 * 		after: Your Firstname: => value
	 *
	 * @param array $fields piVars from Form Submit
	 * @return array new array
	 */
	public function getVariablesWithLabels($fields) {
		$variables = array();
		foreach ((array) $fields as $uid => $value) {
			if (!is_numeric($uid)) {
				continue;
			}
			$this->cleanSubValues($value);
			$variables[] = array(
				'label' => $this->getLabelFromField($uid),
				'value' => $value,
				'uid' => $uid
			);
		}
		return $variables;
	}

	/**
	 * Workarround to eliminate uploaded values from subvalues
	 *
	 * @param mixed $subValue
	 * @return void
	 */
	protected function cleanSubValues(&$subValue) {
		if (is_array($subValue)) {
			foreach (array_keys($subValue) as $key) {
				if (!is_numeric($key)) {
					unset($subValue[$key]);
				}
			}
		}
	}

	/**
	 * Get label of a field (and respect FE language)
	 *
	 * @param integer $uid Field UID
	 * @return string Label
	 */
	public function getLabelFromField($uid) {
		$field = $this->fieldsRepository->findByUid($uid); // get field
		if (method_exists($field, 'getTitle')) {
			$title = $field->getTitle();
		}
		if ($title === NULL || empty($title)) {
			$title = 'Error, could not get Title';
		}
		return $title;
	}

	/**
	 * Read marker from given field uid
	 *
	 * @param integer $uid Field UID
	 * @return string Marker name
	 */
	public function getMarkerFromField($uid) {
		$field = $this->fieldsRepository->findByUid($uid); // get field
		$marker = NULL;
		if (method_exists($field, 'getMarker')) {
			$marker = $field->getMarker();
		}
		if ($marker === NULL || empty($marker)) {
			$marker = 'Error, could not get Marker';
		}

		return $marker;
	}

	/**
	 * Add uploads fields and rewrite date fields
	 *
	 * @param array $fields Field array
	 * @return void
	 */
	public static function addUploadsToFields(&$fields) {
		// add filenames to variable
		if (isset($_FILES['tx_powermail_pi1']['name']['field'])) {
			foreach ((array) $_FILES['tx_powermail_pi1']['name']['field'] as $uid => $value) {
				if (!empty($value)) {
					$fields[$uid] = $value;
				}
			}
		}
	}

	/**
	 * Generate Timestamp from date
	 *
	 * @param array $fields Field array
	 * @return array
	 */
	public function rewriteDateInFields($fields) {
		// rewrite datetime
		foreach ((array) $fields as $uid => $value) {
			$field = $this->fieldsRepository->findByUid($uid);
			if (method_exists($field, 'getType') && $field->getType() == 'date') {
				$fields[$uid] = strtotime($value);
			}
		}
		return $fields;
	}

	/**
	 * Generate Date from Timestamp
	 *
	 * @param string $value
	 * @param integer $fieldUid
	 * @return string
	 */
	public function getDateFromTimestamp($value, $fieldUid) {
		$field = $this->fieldsRepository->findByUid($fieldUid);
		if ($field->getType() == 'date') {
			if (intval($value) > 0) {
				$format = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_powermail.']['settings.']['misc.']['dateFormat'];
				if (empty($format)) {
					$format = '%d.%m.%Y';
				}
				$value = strftime($format, $value);
			} else {
				$value = '';
			}
		}
		return $value;
	}

	/**
	 * This is the main-function for sending Mails
	 *
	 * @param array $mail Array with all needed mail information
	 * 		$mail['receiverName'] = 'Name';
	 * 		$mail['receiverEmail'] = 'receiver@mail.com';
	 *		$mail['senderName'] = 'Name';
	 * 		$mail['senderEmail'] = 'sender@mail.com';
	 * 		$mail['subject'] = 'Subject line';
	 * 		$mail['template'] = 'PathToTemplate/';
	 * 		$mail['rteBody'] = 'This is the <b>content</b> of the RTE';
	 * 		$mail['format'] = 'both'; // or plain or html
	 * @param array $fields All arguments from POST or GET
	 * @param array $settings TypoScript Settings
	 * @param string $type Email to "sender" or "receiver"
	 * @param Tx_Extbase_Object_ObjectManager $objectManager
	 * @param object $configurationManager
	 * @return boolean Mail was successfully sent?
	 */
	public function sendTemplateEmail($mail, $fields, $settings, $type, $objectManager, $configurationManager) {
		/*****************
		 * Settings
		 ****************/
		$cObj = $configurationManager->getContentObject();
		$typoScriptService = $objectManager->get('Tx_Extbase_Service_TypoScriptService');
		$conf = $typoScriptService->convertPlainArrayToTypoScriptArray($settings);

		// parsing variables with fluid engine to allow viewhelpers and variables in some flexform fields
		$parse = array(
			'receiverName',
			'receiverEmail',
			'senderName',
			'senderEmail',
			'subject'
		);
		foreach ($parse as $value) {
			$mail[$value] = $this->fluidParseString($mail[$value], $objectManager, $this->getVariablesWithMarkers($fields));
		}

		// Debug Output
		if ($settings['debug']['mail']) {
			t3lib_utility_Debug::debug($mail, 'powermail debug: Show Mail');
		}

		// stop mail process if receiver or sender email is not valid
		if (!t3lib_div::validEmail($mail['receiverEmail']) || !t3lib_div::validEmail($mail['senderEmail'])) {
			return false;
		}

		// stop mail process if subject is empty
		if (empty($mail['subject'])) {
			return false;
		}

		// generate mail body
		$extbaseFrameworkConfiguration = $configurationManager->getConfiguration(Tx_Extbase_Configuration_ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
		$templatePathAndFilename = t3lib_div::getFileAbsFileName($extbaseFrameworkConfiguration['view']['templateRootPath']) . $mail['template'] . '.html';
		$emailView = $objectManager->create('Tx_Fluid_View_StandaloneView');
		$emailView->getRequest()->setControllerExtensionName('Powermail'); // extension name for translate viewhelper
		$emailView->getRequest()->setPluginName('Pi1');
		$emailView->getRequest()->setControllerName('Forms');
		$emailView->setFormat('html');
		$emailView->setTemplatePathAndFilename($templatePathAndFilename);
		$emailView->setPartialRootPath(t3lib_div::getFileAbsFileName($extbaseFrameworkConfiguration['view']['partialRootPath']));
		$emailView->setLayoutRootPath(t3lib_div::getFileAbsFileName($extbaseFrameworkConfiguration['view']['layoutRootPath']));

		// get variables
			// additional variables
		if (isset($mail['variables']) && is_array($mail['variables'])) {
			$emailView->assignMultiple($mail['variables']);
		}
			// markers in HTML Template
		$variablesWithMarkers = $this->getVariablesWithMarkers($fields);
		$emailView->assign('variablesWithMarkers', $this->htmlspecialcharsOnArray($variablesWithMarkers));
		$emailView->assignMultiple($variablesWithMarkers);
			// powermail_all
		$variables = $this->getVariablesWithLabels($fields);
		$content = $this->powermailAll($variables, $configurationManager, $objectManager, 'mail', $settings);
		$emailView->assign('powermail_all', $content);
			// from rte
		$emailView->assign('powermail_rte', $mail['rteBody']);
		$variablesWithLabels = $this->getVariablesWithLabels($fields);
		$emailView->assign('variablesWithLabels', $variablesWithLabels);
		$emailView->assign('marketingInfos', self::getMarketingInfos());
		$emailBody = $emailView->render();


		/*****************
		 * generate mail
		 ****************/
		$message = t3lib_div::makeInstance('t3lib_mail_Message');
		$message
			->setTo(array($mail['receiverEmail'] => $mail['receiverName']))
			->setFrom(array($mail['senderEmail'] => $mail['senderName']))
			->setSubject($mail['subject'])
			->setCharset($GLOBALS['TSFE']->metaCharset);

		// overwrite subject
		if ($cObj->cObjGetSingle($conf[$type . '.']['overwrite.']['subject'], $conf[$type . '.']['overwrite.']['subject.'])) {
			$message->setSubject($cObj->cObjGetSingle($conf[$type . '.']['overwrite.']['subject'], $conf[$type . '.']['overwrite.']['subject.']));
		}

		// add cc receivers
		if ($cObj->cObjGetSingle($conf[$type . '.']['overwrite.']['cc'], $conf[$type . '.']['overwrite.']['cc.'])) {
			$ccArray = t3lib_div::trimExplode(',', $cObj->cObjGetSingle($conf[$type . '.']['overwrite.']['cc'], $conf[$type . '.']['overwrite.']['cc.']), 1);
			$message->setCc($ccArray);
		}

		// add bcc receivers
		if ($cObj->cObjGetSingle($conf[$type . '.']['overwrite.']['bcc'], $conf[$type . '.']['overwrite.']['bcc.'])) {
			$bccArray = t3lib_div::trimExplode(',', $cObj->cObjGetSingle($conf[$type . '.']['overwrite.']['bcc'], $conf[$type . '.']['overwrite.']['bcc.']), 1);
			$message->setBcc($bccArray);
		}

		// add Return Path
		if ($cObj->cObjGetSingle($conf[$type . '.']['overwrite.']['returnPath'], $conf[$type . '.']['overwrite.']['returnPath.'])) {
			$message->setReturnPath($cObj->cObjGetSingle($conf[$type . '.']['overwrite.']['returnPath'], $conf[$type . '.']['overwrite.']['returnPath.']));
		}

		// add Reply Addresses
		if (
			$cObj->cObjGetSingle($conf[$type . '.']['overwrite.']['replyToEmail'], $conf[$type . '.']['overwrite.']['replyToEmail.'])
			&&
			$cObj->cObjGetSingle($conf[$type . '.']['overwrite.']['replyToName'], $conf[$type . '.']['overwrite.']['replyToName.'])
		) {
			$replyArray = array(
				$cObj->cObjGetSingle($conf[$type . '.']['overwrite.']['replyToEmail'], $conf[$type . '.']['overwrite.']['replyToEmail.']) =>
					$cObj->cObjGetSingle($conf[$type . '.']['overwrite.']['replyToName'], $conf[$type . '.']['overwrite.']['replyToName.'])
			);
			$message->setReplyTo($replyArray);
		}

		// set Sender Header according to RFC 2822 - 3.6.2 Originator fields
		if ($cObj->cObjGetSingle($conf[$type . '.']['senderHeader.']['email'], $conf[$type . '.']['senderHeader.']['email.'])) {
			$senderName = $cObj->cObjGetSingle($conf[$type . '.']['senderHeader.']['name'], $conf[$type . '.']['senderHeader.']['name.']);
			$message->setSender($cObj->cObjGetSingle($conf[$type . '.']['senderHeader.']['email'], $conf[$type . '.']['senderHeader.']['email.']), ($senderName?$senderName:null));
		}

		// add priority
		if ($settings[$type]['overwrite']['priority']) {
			$message->setPriority(intval($settings[$type]['overwrite']['priority']));
		}

		// add attachments from upload fields
		if ($settings[$type]['attachment']) {
			$uploadsFromSession = Tx_Powermail_Utility_Div::getSessionValue('upload'); // read upload session
			foreach ((array) $uploadsFromSession as $file) {
				$message->attach(Swift_Attachment::fromPath($file));
			}
		}

		// add attachments from typoscript
		if ($cObj->cObjGetSingle($conf[$type . '.']['addAttachment'], $conf[$type . '.']['addAttachment.'])) {
			$files = t3lib_div::trimExplode(',', $cObj->cObjGetSingle($conf[$type . '.']['addAttachment'], $conf[$type . '.']['addAttachment.']), 1);
			foreach ($files as $file) {
				$message->attach(Swift_Attachment::fromPath($file));
			}
		}
		if ($mail['format'] != 'plain') {
			$message->setBody($emailBody, 'text/html');
		}
		if ($mail['format'] != 'html') {
			$message->addPart($this->makePlain($emailBody), 'text/plain');
		}
		$message->send();

		return $message->isSent();
	}

	/**
	 * Parse String with Fluid View
	 *
	 * @param string $string Any string
	 * @param object $objectManager
	 * @param array $variables Variables
	 * @return string Parsed string
	 */
	public function fluidParseString($string, $objectManager, $variables = array()) {
		if (!$string) {
			return '';
		}
		$parseObject = $objectManager->create('Tx_Fluid_View_StandaloneView');
		$parseObject->setTemplateSource($string);
		$parseObject->assignMultiple($variables);
		$string = $parseObject->render();

		return $string;
	}

	/**
	 * Function makePlain() removes html tags and add linebreaks
	 * 		Easy generate a plain email bodytext from a html bodytext
	 *
	 * @param string $content: HTML Mail bodytext
	 * @return string $content: Plain Mail bodytext
	 */
	protected function makePlain($content) {
		// config
		$htmltagarray = array ( // This tags will be added with linebreaks
			'</p>',
			'</tr>',
			'</li>',
			'</h1>',
			'</h2>',
			'</h3>',
			'</h4>',
			'</h5>',
			'</h6>',
			'</div>',
			'</legend>',
			'</fieldset>',
			'</dd>',
			'</dt>'
		);
		$notallowed = array ( // This array contains not allowed signs which will be removed
			'&nbsp;',
			'&szlig;',
			'&Uuml;',
			'&uuml;',
			'&Ouml;',
			'&ouml;',
			'&Auml;',
			'&auml;',
		);

		// let's go
		$content = nl2br($content);
		$content = str_replace($htmltagarray, $htmltagarray[0] . '<br />', $content); // 1. add linebreaks on some parts (</p> => </p><br />)
		$content = strip_tags($content, '<br><address>'); // 2. remove all tags but not linebreaks and address (<b>bla</b><br /> => bla<br />)
		$content = preg_replace('/\s+/', ' ', $content); // 3. removes tabs and whitespaces
		$content = $this->br2nl($content); // 4. <br /> to \n
		$content = implode("\n", t3lib_div::trimExplode("\n", $content)); // 5. explode and trim each line and implode again (" bla \n blabla " => "bla\nbla")
		$content = str_replace($notallowed, '', $content); // 6. remove not allowed signs

		return $content;
	}

	/**
	 * Function br2nl is the opposite of nl2br
	 *
	 * @param string $content: Anystring
	 * @return string $content: Manipulated string
	 */
	protected function br2nl($content) {
		$array = array(
			'<br >',
			'<br>',
			'<br/>',
			'<br />'
		);
		$content = str_replace($array, "\n", $content); // replacer

		return $content;
	}

	/**
	 * Use htmlspecialchars on array (key and value) (any depth - recursive call)
	 *
	 * @param array $array Any array
	 * @return array Cleaned array
	 */
	public function htmlspecialcharsOnArray($array) {
		$newArray = array();
		foreach ((array) $array as $key => $value) {
			if (is_array($value)) {
				$newArray[htmlspecialchars($key)] = $this->htmlspecialcharsOnArray($value);
			} else {
				$newArray[htmlspecialchars($key)] = htmlspecialchars($value);
			}
		}
		unset($array);
		return $newArray;
	}

	/**
	 * Get all receiver emails in an array
	 *
	 * @param string $receiverString String with some emails
	 * @param int $feGroup fe_groups Uid
	 * @return array
	 */
	public function getReceiverEmails($receiverString, $feGroup) {
		$array = $this->getEmailsFromString($receiverString);
		if ($feGroup) {
			$array = array_merge($array, $this->getEmailsFromFeGroup($feGroup));
		}
		return $array;
	}

	/**
	 * Read E-Mails from String
	 *
	 * @param int $uid fe_groups Uid
	 * @return array Array with emails
	 */
	public function getEmailsFromFeGroup($uid) {
		$userRepository = t3lib_div::makeInstance('Tx_Powermail_Domain_Repository_UserRepository');
		$users = $userRepository->findByUsergroup($uid);
		$array = array();
		foreach ($users as $user) {
			if (t3lib_div::validEmail($user->getEmail())) {
				$array[] = $user->getEmail();
			}
		}
		return $array;
	}

	/**
	 * Read E-Mails from String
	 *
	 * @param string $string Any given string from a textarea with some emails
	 * @return array Array with emails
	 */
	public function getEmailsFromString($string) {
		$array = array();
		$string = str_replace(array("\n", '|', ','), ';', $string);
		$arr = t3lib_div::trimExplode(';', $string, 1);
		foreach ($arr as $email) {
			$array[] = $email;
		}
		return $array;
	}

	/**
	 * Create an options array (Needed for fieldsettings: select, radio, check)
	 * 		option1 =>
	 * 			label => Red Shoes
	 * 			value => red
	 * 			selected => 1
	 *
	 * @param string $string Options from the Textarea
	 * @return array Options Array
	 */
	public static function optionArray($string) {
		$options = array();
		$settingsField = t3lib_div::trimExplode("\n", $string, 1);
		foreach ($settingsField as $line) {
			$settings = t3lib_div::trimExplode('|', $line, 0);
			$options[] = array(
				'label' => $settings[0],
				'value' => isset($settings[1]) ? $settings[1] : $settings[0],
				'selected' => isset($settings[2]) ? 1 : 0
			);
		}

		return $options;
	}

	/**
	 * Get grouped mail answers for reporting
	 *
	 * @param array $mails Mail array
	 * @param int $max Max Labels
	 * @param string $maxLabel Label for "Max Labels" - could be "all others"
	 * @return array
	 */
	public static function getGroupedMailAnswers($mails, $max = 5, $maxLabel = 'All others') {
		$arr = array();
		foreach ($mails as $mail) {
			foreach ($mail->getAnswers() as $answer) {
				$value = $answer->getValue();
				if (is_array($answer->getValue())) {
					$value = implode(', ', $value);
				}
				if (!isset($arr[$answer->getField()][$value])) {
					$arr[$answer->getField()][$value] = 1;
				} else {
					$arr[$answer->getField()][$value]++;
				}
			}
		}

		// sort desc
		foreach ($arr as $key => $value) {
			arsort($arr[$key]);
		}

		// if too much values
		foreach ((array) $arr as $key => $array) {
			if (count($arr[$key]) >= $max) {
				$i = 0;
				foreach ($arr[$key] as $value => $amount) {
					$i++;
					if ($i >= $max) {
						unset($arr[$key][$value]);
						if (!isset($arr[$key][$maxLabel])) {
							$arr[$key][$maxLabel] = $amount;
						} else {
							$arr[$key][$maxLabel] += $amount;
						}
					} else {
						$arr[$key][$value] = $amount;
					}
				}
			}
		}

		return $arr;
	}

	/**
	 * Get grouped marketing stuff for reporting
	 *
	 * @param object $mails Mails
	 * @param int $max Max Labels
	 * @param string $maxLabel Label for "Max Labels" - could be "all others"
	 * @return array
	 */
	public static function getGroupedMarketingStuff($mails, $max = 10, $maxLabel = 'All others') {
		$arr = array(
			'marketingSearchterm' => array(),
			'marketingReferer' => array(),
			'marketingPayedSearchResult' => array(),
			'marketingLanguage' => array(),
			'marketingBrowserLanguage' => array(),
			'marketingFunnel' => array(),
		);
		foreach ($mails as $mail) {
			foreach ($arr as $key => $v) {
				$value = $mail->{'get' . ucfirst($key)}();
				if (is_array($value)) {
					$value = implode(',', $value);
				}
				if (!$value) {
					$value = '-';
				}
				if (!isset($arr[$key][$value])) {
					$arr[$key][$value] = 1;
				} else {
					$arr[$key][$value]++;
				}
			}
		}

		// sort desc
		foreach ($arr as $key => $value) {
			arsort($arr[$key]);
		}

		// if too much values
		foreach ($arr as $key => $array) {
			if (count($arr[$key]) >= $max) {
				$i = 0;
				foreach ($arr[$key] as $value => $amount) {
					$i++;
					if ($i >= $max) {
						unset($arr[$key][$value]);
						if (!isset($arr[$key][$maxLabel])) {
							$arr[$key][$maxLabel] = $amount;
						} else {
							$arr[$key][$maxLabel] += $amount;
						}
					} else {
						$arr[$key][$value] = $amount;
					}
				}
			}
		}

		return $arr;
	}

	/**
	 * Read MarketingInfos from Session
	 *
	 * @return array
	 */
	public static function getMarketingInfos() {
		$info = $GLOBALS['TSFE']->fe_user->getKey('ses', 'powermail_marketing');
		return $info;
	}

	/**
	 * Powermail SendPost - Send values via curl to target
	 *
	 * @param array $fields Params from User
	 * @param array $conf TypoScript Settings
	 * @param object $configurationManager Configuration Manager
	 * @return void
	 */
	public function sendPost($fields, $conf, $configurationManager) {
		if (!$conf['marketing.']['sendPost.']['_enable']) {
			return;
		}
		$fields = $this->getVariablesWithMarkers($fields);
		$cObj = $configurationManager->getContentObject();
		$cObj->start($fields);
		$curl = array(
			'url' => $conf['marketing.']['sendPost.']['targetUrl'],
			'params' => $cObj->cObjGetSingle($conf['marketing.']['sendPost.']['values'], $conf['marketing.']['sendPost.']['values.'])
		);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $curl['url']);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $curl['params']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_exec($ch);
		curl_close($ch);

		// Debug Output
		if ($conf['marketing.']['sendPost.']['debug']) {
			t3lib_utility_Debug::debug($curl, 'powermail debug: Show SendPost Values');
		}
	}

	/**
	 * Returns array with alphabetical letters
	 *
	 * @return array
	 */
	public static function getAbcArray() {
		$arr = array();
		for ($a=A; $a != AA; $a++) { // ABC loop
			$arr[] = $a;
		}
		return $arr;
	}

	/**
	 * Check of value is serialized
	 *
	 * @param string $val Any String
	 * @return bool
	 */
	public static function is_serialized($val) {
		if (!is_string($val) || trim($val) == '') {
			return false;
		}
		if (preg_match('/^(i|s|a|o|d):(.*);/si', $val)) {
			return true;
		}
		return false;
	}

	/**
	 * Check if logged in user is allowed to make changes in Pi2
	 *
	 * @param array $settings $settings TypoScript and Flexform Settings
	 * @param object $mail $mail Mail Object
	 * @return bool
	 */
	public function isAllowedToEdit($settings, $mail) {
		// settings
		if (!$GLOBALS['TSFE']->fe_user->user['uid']) {
			return false;
		}
		$usergroups = t3lib_div::trimExplode(',', $GLOBALS['TSFE']->fe_user->user['usergroup'], 1); // array with usergroups of current logged in user
		$usersSettings = t3lib_div::trimExplode(',', $settings['edit']['feuser'], 1); // array with all allowed users
		$usergroupsSettings = t3lib_div::trimExplode(',', $settings['edit']['fegroup'], 1); // array with all allowed groups

		// replace "_owner" with uid of owner in array with users
		if (method_exists($mail, 'getFeuser') && is_numeric(array_search('_owner', $usersSettings))) {
			$usersSettings[array_search('_owner', $usersSettings)] = $mail->getFeuser();
		}

		// add owner groups to allowed groups (if "_owner")
		if (method_exists($mail, 'getFeuser') && is_numeric(array_search('_owner', $usergroupsSettings))) { // if one entry is "_ownergroup"
			$usergroupsFromOwner = $this->getUserGroupsFromUser($mail->getFeuser()); // get usergroups of owner user
			$usergroupsSettings = array_merge((array) $usergroupsSettings, (array) $usergroupsFromOwner); // add owner usergroups to allowed usergroups array
		}

		// 1. check user
		if (in_array($GLOBALS['TSFE']->fe_user->user['uid'], $usersSettings)) {
			return true;
		}

		// 2. check usergroup
		if (count(array_intersect($usergroups, $usergroupsSettings))) { // if there is one of the groups allowed
			return true;
		}

		return false;
	}

	/**
	 * Return usergroups uid of a given fe_user
	 *
	 * @param string $uid FE_user UID
	 * @return array Usergroups
	 */
	protected function getUserGroupsFromUser($uid) {
		$groups = array();
		$select = 'fe_groups.uid';
		$from = 'fe_users, fe_groups, sys_refindex';
		$where = 'sys_refindex.tablename = "fe_users" AND sys_refindex.ref_table = "fe_groups" AND fe_users.uid = sys_refindex.recuid AND fe_groups.uid = sys_refindex.ref_uid AND fe_users.uid = ' . intval($uid);
		$groupBy = '';
		$orderBy = '';
		$limit = 1000;
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery($select, $from, $where, $groupBy, $orderBy, $limit);
		if ($res) {
			while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) { // One loop for every entry
				$groups[] = $row['uid'];
			}
		}

		return $groups;
	}

	/**
	 * Create Hash from String and TYPO3 Encryption Key
	 *
	 * @param string $string Any String
	 * @return string Hashed String
	 */
	public static function createOptinHash($string) {
		if (!empty($GLOBALS['TYPO3_CONF_VARS']['SYS']['encryptionKey'])) {
			$hash = t3lib_div::shortMD5($string . $GLOBALS['TYPO3_CONF_VARS']['SYS']['encryptionKey']);
		} else {
			$hash = t3lib_div::shortMD5($string);
		}
		return $hash;
	}

	/**
	 * Plain String output for given array
	 *
	 * @param array $array
	 * @return string
	 */
	public static function viewPlainArray($array) {
		$string = '';
		foreach ((array) $array as $key => $value) {
			$string .= $key . ': ' . $value . "\n";
		}
		return $string;
	}

	/**
	 * Set a powermail session (don't overwrite existing sessions)
	 *
	 * @param string $name A session name
	 * @param array $values Values to save
	 * @param int $overwrite Overwrite existing values
	 * @return void
	 */
	public static function setSessionValue($name, $values, $overwrite = 0) {
		if (!$overwrite) {
			$oldValues = self::getSessionValue($name); // read existing values
			$values = array_merge((array) $oldValues, (array) $values); // merge old values with new
		}
		$newValues = array(
			$name => $values
		);

		$GLOBALS['TSFE']->fe_user->setKey('ses', self::$extKey, $newValues);
		$GLOBALS['TSFE']->storeSessionData();
	}

	/**
	 * Read a powermail session
	 *
	 * @param string $name A session name
	 * @return mixed Values from session
	 */
	public static function getSessionValue($name = '') {
		$powermailSession = $GLOBALS['TSFE']->fe_user->getKey('ses', self::$extKey);
		if ($name && isset($powermailSession[$name])) {
			return $powermailSession[$name];
		}
		return $powermailSession;
	}

	/**
	 * Merges Flexform and TypoScript Settings (up to 2 levels) and add Global Config from ext_conf_template.txt
	 * 		Why: It's not possible to have the same field in TypoScript and Flexform and if FF value is empty, we want the TypoScript value instead
	 *
	 * @param array $settings All settings
	 * @param string $typoScriptLevel Startpoint
	 * @return array Merged settings
	 */
	public static function mergeTypoScript2FlexForm(&$settings, $typoScriptLevel = 'setup') {
		// config
		$tmp_settings = array();
		$confArr = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['powermail']);

		if (isset($settings[$typoScriptLevel]) && is_array($settings[$typoScriptLevel])) {
			$tmp_settings = $settings[$typoScriptLevel]; // copy typoscript part to conf part
		}

		if (isset($settings['flexform']) && is_array($settings['flexform'])) {
			$tmp_settings = array_merge((array) $tmp_settings, (array) $settings['flexform']); // copy flexform part to conf part
		}

		// merge ts and ff (loop every flexform)
		foreach ($tmp_settings as $key1 => $value1) {
			if (!is_array($value1)) { // 1. level
				if (isset($settings[$typoScriptLevel][$key1]) && isset($settings['flexform'][$key1])) { // only if this key exists in ff and ts
					if ($settings[$typoScriptLevel][$key1] && !$settings['flexform'][$key1]) { // only if ff is empty and ts not
						$tmp_settings[$key1] = $settings[$typoScriptLevel][$key1]; // overwrite with typoscript settings
					}
				}
			} else {
				foreach ($value1 as $key2 => $value2) { // 2. level
					if (isset($settings[$typoScriptLevel][$key1][$key2]) && isset($settings['flexform'][$key1][$key2])) { // only if this key exists in ff and ts
						if ($settings[$typoScriptLevel][$key1][$key2] && !$settings['flexform'][$key1][$key2]) { // only if ff is empty and ts not
							$tmp_settings[$key1][$key2] = $settings[$typoScriptLevel][$key1][$key2]; // overwrite with typoscript settings
						}
					}
				}
			}
		}

		// merge ts and ff (loop every typoscript)
		foreach ((array) $settings[$typoScriptLevel] as $key1 => $value1) {
			if (!is_array($value1)) { // 1. level
				if (isset($settings[$typoScriptLevel][$key1]) && !isset($settings['flexform'][$key1])) { // only if this key exists in ts and not in ff
					$tmp_settings[$key1] = $value1; // set value from ts
				}
			} else {
				foreach ($value1 as $key2 => $value2) { // 2. level
					if (isset($settings[$typoScriptLevel][$key1][$key2]) && !isset($settings['flexform'][$key1][$key2])) { // only if this key exists in ts and not in ff
						$tmp_settings[$key1][$key2] = $value2; // set value from ts
					}
				}
			}
		}

		// add global config
		$tmp_settings['global'] = $confArr;

		$settings = $tmp_settings;
		unset($tmp_settings);
	}

	/**
	 * @param Tx_Powermail_Domain_Repository_FormsRepository $formsRepository
	 * @return void
	 */
	public function injectFormsRepository(Tx_Powermail_Domain_Repository_FormsRepository $formsRepository) {
		$this->formsRepository = $formsRepository;
	}

	/**
	 * @param Tx_Powermail_Domain_Repository_FieldsRepository $fieldsRepository
	 * @return void
	 */
	public function injectFieldsRepository(Tx_Powermail_Domain_Repository_FieldsRepository $fieldsRepository) {
		$this->fieldsRepository = $fieldsRepository;
	}

	/**
	 * @param Tx_Powermail_Domain_Repository_UserRepository $userRepository
	 * @return void
	 */
	public function injectUserRepository(Tx_Powermail_Domain_Repository_UserRepository $userRepository) {
		$this->userRepository = $userRepository;
	}
}
