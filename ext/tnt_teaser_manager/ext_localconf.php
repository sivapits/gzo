<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TYPO3.' . $_EXTKEY,
	'Tntteasermanager',
	array(
		'TntTeaserManger' => 'list,tabs',
		
	),
	// non-cacheable actions
	array(
		'TntTeaserManger' => 'list,tabs',
		
	)
);
