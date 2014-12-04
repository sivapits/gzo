<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TYPO3.' . $_EXTKEY,
	'Tntjobs',
	array(
		'Jobs' => 'list, show, new, create, edit, update, delete,widget',
		
	),
	// non-cacheable actions
	array(
		'Jobs' => 'list, show,create, update, delete',
		
	)
);
