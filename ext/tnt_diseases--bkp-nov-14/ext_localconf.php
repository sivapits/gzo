<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TYPO3.' . $_EXTKEY,
	'Tntdiseases',
	array(
		'Diseases' => 'gridList,diseaseDropList,multiView,mainWidget,mainDetail',
		
	),
	// non-cacheable actions
	array(
		'Diseases' => 'gridList,diseaseDropList,multiView,mainWidget,mainDetail',
		
	)
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TYPO3.' . $_EXTKEY,
	'Tntdiseasesteaser',
	array(
                'Teaser' => 'teaserWidget',
		
	),
    array(
                'Teaser' => 'teaserWidget',
		
	)
);
