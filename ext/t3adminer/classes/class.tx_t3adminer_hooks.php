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

class tx_t3adminer_hooks {

	/**
	 * Hook to remove t3adminer session on logoff
	 *
	 * @param $parameters
	 * @param $parentObject
	 * @return void
	 */
	public function logoffHook(&$parameters, &$parentObject) {
		unset(
			$_SESSION['pwds'],
			$_SESSION['ADM_driver'],
			$_SESSION['ADM_user'],
			$_SESSION['ADM_password'],
			$_SESSION['ADM_server'],
			$_SESSION['ADM_db'],
			$_SESSION['ADM_extConf'],
			$_SESSION['ADM_hideOtherDBs'],
			$_SESSION['ADM_SignonURL'],
			$_SESSION['ADM_LogoutURL'],
			$_SESSION['ADM_uploadDir']
		);
	}
}

if (defined('TYPO3_MODE') && $GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/t3adminer/classes/class.tx_t3adminer_hooks.php'])	{
	include_once($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/t3adminer/classes/class.tx_t3adminer_hooks.php']);
}