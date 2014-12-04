<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TYPO3.' . $_EXTKEY,
	'Tntfilelinks',
	array(
		'FileLink' => 'filelist,file',
		
	),
	// non-cacheable actions
	array(
		'FileLink' => 'filelist,file',
		
	)
);
