<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Tntbabygallery',
	'TNT BABY GALLERY'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'TNT BABY GALLERY');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tntbabygallery_domain_model_gallery', 'EXT:tnt_babygallery/Resources/Private/Language/locallang_csh_tx_tntbabygallery_domain_model_gallery.xlf');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tntbabygallery_babies', 'EXT:tnt_babygallery/Resources/Private/Language/locallang_csh_tx_tntbabygallery_domain_model_gallery.xlf');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tntbabygallery_babies');
$TCA['tx_tntbabygallery_babies'] = array (
    'ctrl' => array (
        'title'     => 'LLL:EXT:tnt_babygallery/Resources/Private/Language/locallang_db.xml:tx_tntbabygallery_domain_model_gallery',
        'label' => 'firstname',
        'tstamp'    => 'tstamp',
        'crdate'    => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => 'ORDER BY birthdate DESC',
        #'sortby' => 'sorting',
        'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'Configuration/TCA/Gallery.php',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_tntbabygallery_domain_model_babies.gif',
		'label_alt'=>'lastname,uid',
		'label_alt_force'=> 1,
		'delete' => 'deleted',
		'enablecolumns' => array (
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'firstname,lastname,uid'
    )
);
t3lib_div::loadTCA('tt_content');

$pluginSignature = str_replace('_','',$_EXTKEY) . '_tntbabygallery';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_structures.xml');
