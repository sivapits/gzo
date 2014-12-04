<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TYPO3.' . $_EXTKEY,
	'Tntmitarbeiter',
	array(
		'Staff' => 'list,team, home, detail, widget, employeewidget',
		
	),
	// non-cacheable actions
	array(
		'Staff' => 'list,team,home, detail, widget, employeewidget',
	)
);
