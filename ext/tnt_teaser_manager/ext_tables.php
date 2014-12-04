<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Tntteasermanager',
	'TnT TeaserManager'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'TNT Teaser Mangement');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tntteasermanager_domain_model_tntteasermanger', 'EXT:tnt_teaser_manager/Resources/Private/Language/locallang_csh_tx_tntteasermanager_domain_model_tntteasermanger.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tntteasermanager_domain_model_tntteasermanger');
$GLOBALS['TCA']['tx_tntteasermanager_domain_model_tntteasermanger'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:tnt_teaser_manager/Resources/Private/Language/locallang_db.xlf:tx_tntteasermanager_domain_model_tntteasermanger',
		'label' => 'uid',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => '',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/TntTeaserManger.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_tntteasermanager_domain_model_tntteasermanger.gif'
	),
);
