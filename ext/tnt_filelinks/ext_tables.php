<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Tntfilelinks',
	'TNT FileLinks'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'TnT File Links');
$pluginSignature = str_replace('_','',$_EXTKEY).'_tntfilelinks';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature,'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform.xml');
