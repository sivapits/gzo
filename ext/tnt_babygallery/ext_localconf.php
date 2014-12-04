<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TYPO3.' . $_EXTKEY,
	'Tntbabygallery',
	array(
		'Gallery' => 'list, datatable, gridview, detailview, search, sendcard, hitlist',
		
	),
	// non-cacheable actions
	array(
		'Gallery' => 'gridview,list,datatable, detailview, search, sendcard, hitlist',
		
	)
);
