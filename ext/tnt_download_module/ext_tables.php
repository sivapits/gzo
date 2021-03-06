<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Tntdownloadmodule',
	'TNT Download Module'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'TNT Download Module');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tntdownloadmodule_domain_model_downloadmodule', 'EXT:tnt_download_module/Resources/Private/Language/locallang_csh_tx_tntdownloadmodule_domain_model_downloadmodule.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tntdownloadmodule_domain_model_downloadmodule');
$GLOBALS['TCA']['tx_tntdownloadmodule_domain_model_downloadmodule'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:tnt_download_module/Resources/Private/Language/locallang_db.xlf:tx_tntdownloadmodule_domain_model_downloadmodule',
		'label' => 'document_title',
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
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/DownloadModule.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_tntdownloadmodule_domain_model_downloadmodule.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tntdownloadmodule_domain_model_parentcategory', 'EXT:tnt_download_module/Resources/Private/Language/locallang_csh_tx_tntdownloadmodule_domain_model_parentcategory.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tntdownloadmodule_domain_model_parentcategory');
$GLOBALS['TCA']['tx_tntdownloadmodule_domain_model_parentcategory'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:tnt_download_module/Resources/Private/Language/locallang_db.xlf:tx_tntdownloadmodule_domain_model_parentcategory',
		'label' => 'category_title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
        'sortby' =>'sort_order',
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
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/ParentCategory.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_tntdownloadmodule_domain_model_parentcategory.gif'
	),
);
$pluginSignature = str_replace('_','',$_EXTKEY).'_tntdownloadmodule';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature,'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform.xml');
