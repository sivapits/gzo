<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011-2014 Jigal van Hemert <jigal.van.hemert@typo3.org>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
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

$LANG->includeLLFile('EXT:t3adminer/mod1/locallang.xml');
$BE_USER->modAccess($MCONF,1);	// This checks permissions and exits if the users has no permission for entry.
	// DEFAULT initialization of a module [END]

/**
 * Module 'Adminer' for the 't3adminer' extension.
 *
 * @author	Jigal van Hemert <jigal.van.hemert@typo3.org>
 * @package	TYPO3
 * @subpackage	tx_t3adminer
 */
class  tx_t3adminer_module1 extends t3lib_SCbase {
	public $pageinfo;

	/**
	 * Initializes the Module
	 * @return	void
	 */
	function init()	{
		global $BE_USER,$LANG,$BACK_PATH,$TCA_DESCR,$TCA,$CLIENT,$TYPO3_CONF_VARS;

		parent::init();
	}

	/**
	 * Adds items to the ->MOD_MENU array. Used for the function menu selector.
	 *
	 * @return	void
	 */
	function menuConfig()	{
		global $LANG;
		parent::menuConfig();
	}

	/**
	 * Main function of the module. Write the content to $this->content
	 *
	 * @return void
	 */
	function main() {
		global $BE_USER, $LANG, $BACK_PATH, $TCA_DESCR, $TCA, $CLIENT, $TYPO3_CONF_VARS;

		// Access check!
		// The page will show only if there is a valid page and
		// if this page may be viewed by the user
		$this->pageinfo = t3lib_BEfunc::readPageAccess($this->id, $this->perms_clause);
		$access = is_array($this->pageinfo) ? 1 : 0;

		if (($this->id && $access) || ($BE_USER->user['admin'] && !$this->id)) {

			// Set the path to adminer
			$extPath = t3lib_extMgm::extPath('t3adminer');
			$typo3DocumentRoot = t3lib_div::getIndpEnv('TYPO3_DOCUMENT_ROOT');
			// Set class config for module
			$this->MCONF = $GLOBALS['MCONF'];
			// Get config
			$extensionConfiguration = unserialize($TYPO3_CONF_VARS['EXT']['extConf']['t3adminer']);

			// IP-based Access restrictions
			$devIPmask = trim($TYPO3_CONF_VARS['SYS']['devIPmask']);
			$remoteAddress = t3lib_div::getIndpEnv('REMOTE_ADDR');

			// Check for devIpMask restriction
			$useDevIpMask = (boolean)$extensionConfiguration['applyDevIpMask'];
			if ($useDevIpMask === TRUE) {
				// Only use devIPmask if it is specific (not '*')
				if ($devIPmask != '*') {
					if (!t3lib_div::cmpIP($remoteAddress, $devIPmask)) {
						$this->doc = t3lib_div::makeInstance('mediumDoc');
						$this->doc->backPath = $BACK_PATH;
						$this->content = $this->doc->startPage($LANG->getLL('title'));
						$this->content .= sprintf($LANG->getLL('mlang_notindevipmask'), $remoteAddress);
						return;
					}
				}
			}

			// Check for specified IP restrictions
			$allowedIps = trim($extensionConfiguration['IPaccess']);
			if (!empty($allowedIps)) {
				if (!t3lib_div::cmpIP($remoteAddress, $allowedIps)) {
					$this->doc = t3lib_div::makeInstance('mediumDoc');
					$this->doc->backPath = $BACK_PATH;
					$this->content = $this->doc->startPage($LANG->getLL('title'));
					$this->content .= sprintf($LANG->getLL('mlang_notinipaccess'), $remoteAddress);
					return;
				}
			}

			// Check export directory
			$exportDirectory = t3lib_div::getFileAbsFileName(trim($extensionConfiguration['exportDirectory']));
			if (!is_dir($exportDirectory)) {
				$exportDirectory = t3lib_div::getFileAbsFileName($GLOBALS['TYPO3_CONF_VARS']['BE']['fileadminDir']);
			}

			// Path to install dir
			$this->MCONF['ADM_absolute_path'] = $extPath . $this->MCONF['ADM_subdir'];
			// Path to web dir
			$this->MCONF['ADM_relative_path'] = t3lib_extMgm::extRelPath('t3adminer') . $this->MCONF['ADM_subdir'];
			// If t3adminer is configured in the conf.php script, we continue to load it...
			if ($this->MCONF['ADM_absolute_path'] && @is_dir($this->MCONF['ADM_absolute_path'])) {
				// Need to have cookie visible from parent directory
				session_set_cookie_params(0, '/', '', 0);
				// Create signon session
				$session_name = 'tx_t3adminer';
				session_name($session_name);
				session_start();
				// Pass export directory
				$_SESSION['exportDirectory'] = $exportDirectory;
				// Detect DBMS
				$_SESSION['ADM_driver'] = 'server';
				if (is_array($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['dbal']['handlerCfg']['_DEFAULT'])) {
					//DBAL is configured
					if ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['dbal']['handlerCfg']['_DEFAULT']['type'] === 'adodb') {
						//ADOdb is in use, let's find the DBMS type, if type is set to 'native' it's still MySQL
						switch ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['dbal']['handlerCfg']['_DEFAULT']['config']['driver']) {
							case 'mssql':
								$_SESSION['ADM_driver'] = 'mssql';
								break;
							case 'odbc_mssql':
								$_SESSION['ADM_driver'] = 'mssql';
								break;
							case 'oci8':
								$_SESSION['ADM_driver'] = 'oracle';
								break;
							case 'postgres':
								$_SESSION['ADM_driver'] = 'pgsql';
								break;

						}
					}
				}
				// Store there credentials in the session
				$_SESSION['ADM_user'] = TYPO3_db_username;
				$_SESSION['pwds'][$_SESSION['ADM_driver']][TYPO3_db_host][TYPO3_db_username] = TYPO3_db_password;
				$_SESSION['ADM_password'] = TYPO3_db_password;
				$_SESSION['ADM_server'] = TYPO3_db_host;
				$_SESSION['ADM_db'] = TYPO3_db;
				// Configure some other parameters
				$_SESSION['ADM_extConf'] = $TYPO3_CONF_VARS['EXT']['extConf']['t3adminer'];
				$_SESSION['ADM_hideOtherDBs'] = $extensionConfiguration['hideOtherDBs'];
				// Get signon uri for redirect
				$path_ext = substr($extPath, strlen($typo3DocumentRoot), strlen($extPath));
				$path_ext = (substr($path_ext, 0, 1) != '/' ? '/' . $path_ext : $path_ext);
				$path_adm = $path_ext . $this->MCONF['ADM_subdir'];
				$_SESSION['ADM_SignonURL'] = $path_adm . $this->MCONF['ADM_script'];
				// Try to get the TYPO3 backend uri even if it's installed in a subdirectory
				// Compile logout path and add a slash if the returned string does not start with
				$path_typo3 = substr(PATH_typo3, strlen($typo3DocumentRoot), strlen(PATH_typo3));
				$path_typo3 = (substr($path_typo3, 0, 1) != '/' ? '/' . $path_typo3 : $path_typo3);
				$_SESSION['ADM_LogoutURL'] = $path_typo3 . 'logout.php';
				// Prepend document root if uploadDir does not start with a slash "/"
				$extensionConfiguration['uploadDir'] = trim($extensionConfiguration['uploadDir']);
				if (strpos($extensionConfiguration['uploadDir'], '/') !== 0) {
					$_SESSION['ADM_uploadDir'] = $typo3DocumentRoot . '/' . $extensionConfiguration['uploadDir'];
				} else {
					$_SESSION['ADM_uploadDir'] = $extensionConfiguration['uploadDir'];
				}
				$id = session_id();
				// Force to set the cookie
				setcookie($session_name, $id, 0, '/', '');
				// Close that session
				session_write_close();
				// Mapping language keys for Adminer (both for TYPO3 4.5 and later versions)
				$LANG_KEY_MAP = array(
					'ar' => 'ar',	// Arabic
					//'' => 'bn',	// Bengali
					'ca' => 'ca',	// Catalan
					'cs' => 'cs',	// Czech
					'cz' => 'cs',	// Czech
					'de' => 'de',	// German
					'en' => 'en',	// English
					'es' => 'es',	// Spanish
					'et' => 'et',	// Estonian
					'fa' => 'fa',	// Persian
					'fr' => 'fr',	// French
					'hu' => 'hu',	// Hungarian
					'ms' => 'id',	// Malay (Indonesian)
					'my' => 'id',	// Malay (Indonesian)
					'it' => 'it',	// Italian
					'jp' => 'ja',	// Japanese
					'ja' => 'ja',	// Japanese
					'ko' => 'ko',	// Korean
					'kr' => 'ko',	// Korean
					'lt' => 'lt',	// Lithuanian
					'nl' => 'nl',	// Dutch
					'no' => 'no',	// Norwegian
					'pl' => 'pl',	// Polish
					'pt' => 'pt',	// Portuguese
					'pt_BR' => 'pt-br',	// Portuguese (Brazil)
					'br' => 'pt-br',	// Portuguese (Brazil)
					'ro' => 'ro',	// Romanian
					'ru' => 'ru',	// Russian
					'sk' => 'sk',	// Slovak
					'si' => 'sl',	// Slovenian
					'sl' => 'sl',	// Slovenian
					'sr' => 'sr',	// Serbian
					//'' => 'ta',	// Tamil
					'th' => 'th',	// Thai
					'tr' => 'tr',	// Turkish
					'ua' => 'uk',	// Ukrainian
					'uk' => 'uk',	// Ukrainian
					'vi' => 'vi',	// Vietnamese
					'vn' => 'vi',	// Vietnamese
					'hk' => 'zh',	// Chinese
					'ch' => 'zh',	// Chinese
					'zh' => 'zh',	// Chinese
					//'' => 'zh-tw',	// Taiwanese
				);
				$LANG_KEY = $LANG_KEY_MAP[$LANG->lang];
				if (!$LANG_KEY) {
					$LANG_KEY = 'en';
				}
				// Redirect to adminer (should use absolute URL here!), setting default database
				$redirect_uri = $_SESSION['ADM_SignonURL'] . '?lang=' . $LANG_KEY . '&db=' . rawurlencode(TYPO3_db) .
					'&' . rawurlencode($_SESSION['ADM_driver']) . '=' . rawurlencode(TYPO3_db_host) .
					'&username=' . rawurlencode(TYPO3_db_username);
				if ($_SESSION['ADM_driver'] !== 'server') {
					$redirect_uri .= '&driver=' . rawurlencode($_SESSION['ADM_driver']);
				}
				// Build and set cache-header header
				$headers = array(
					'Expires: Mon, 26 Jul 1997 05:00:00 GMT', 'Pragma: no-cache', 'Cache-Control: private',
					'Location: ' . $redirect_uri
				);
				// Send all headers
				foreach ($headers as $header) {
					header($header);
				}
			} else {
				// No configuration set
				$this->doc = t3lib_div::makeInstance('mediumDoc');
				$this->doc->backPath = $BACK_PATH;
				$this->content = $this->doc->startPage($LANG->getLL('title'));
				$this->content .= ('
										<h3>Adminer module was not installed?</h3>
										' . ($this->MCONF['ADM_subdir'] && !@is_dir($this->MCONF['ADM_subdir']) ?
						'<hr /><strong>ERROR: The directory, ' . $this->MCONF['ADM_subdir'] . ', was NOT found!</strong><HR>'
						: '') . '
								');
			}

		}
	}

	/**
	 * Prints out the module HTML
	 *
	 * @return	void
	 */
	function printContent()	{

		if ($this->doc instanceof template) {
			$this->content .= $this->doc->endPage();
		}
		echo $this->content;
	}
}

if (defined('TYPO3_MODE') && $GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/t3adminer/mod1/index.php'])	{
	include_once($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/t3adminer/mod1/index.php']);
}

// Make instance:
/** @var $SOBE tx_t3adminer_module1 */
$SOBE = t3lib_div::makeInstance('tx_t3adminer_module1');
$SOBE->init();

// Include files?
foreach($SOBE->include_once as $INC_FILE) {
	include_once($INC_FILE);
}

$SOBE->main();
$SOBE->printContent();