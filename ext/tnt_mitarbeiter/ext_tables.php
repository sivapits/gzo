<?php

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
		$_EXTKEY, 'Tntmitarbeiter', 'TNT Staff Management'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'TNT Staff Management');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tntmitarbeiter_domain_model_staff', 'EXT:tnt_mitarbeiter/Resources/Private/Language/locallang_csh_tx_tntmitarbeiter_domain_model_staff.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tntmitarbeiter_domain_model_staff');

$TCA['tx_tntmitarbeiter_position'] = array(
	'ctrl'			 => array(
		'searchFields'				=> 'name',
		'title'						 => 'LLL:EXT:tnt_mitarbeiter/Resources/Private/Language/locallang_db.xml:tx_tntmitarbeiter_position.name',
		'label'						 => 'name',
		'tstamp'					 => 'tstamp',
		'crdate'					 => 'crdate',
		'cruser_id'					 => 'cruser_id',
		'languageField'				 => 'sys_language_uid',
		'transOrigPointerField'			=> 'l18n_parent',
		'transOrigDiffSourceField'		=> 'l18n_diffsource',
		'default_sortby'				=> 'ORDER BY name',
		'sortby'					 => 'sorting',
		'dynamicConfigFile'			 => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Staff.php',
		'iconfile'					 => t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon.gif',
		'delete' => 'deleted',
		'enablecolumns' => array (
			'disabled' => 'hidden'
		),
	),
	'feInterface'	 => array(
		'fe_admin_fieldList' => 'sys_language_uid, l18n_parent, l18n_diffsource, name,hidden, starttime, endtime,',
	)
);

$TCA['tx_tntmitarbeiter_departments'] = array(
	'ctrl'			 => array(
		'searchFields'				=> 'title',
		'title'						 => 'LLL:EXT:tnt_mitarbeiter/Resources/Private/Language/locallang_db.xml:tx_tntmitarbeiter_department.name',
		'label'						 => 'title',
		'tstamp'					 => 'tstamp',
		'crdate'					 => 'crdate',
		'cruser_id'					 => 'cruser_id',
		'languageField'				 => 'sys_language_uid',
		'transOrigPointerField'			=> 'l18n_parent',
		'transOrigDiffSourceField'		=> 'l18n_diffsource',
		'default_sortby'				=> 'ORDER BY title',
		'sortby'					 => 'sorting',
		'dynamicConfigFile'			 => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Staff.php',
		'iconfile'					 => t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon.gif',
		'delete' => 'deleted',
		'enablecolumns' => array (
			'disabled' => 'hidden'
		),
	),
	'feInterface'	 => array(
		'fe_admin_fieldList' => 'sys_language_uid, l18n_parent, l18n_diffsource, title,department_lead,teammembers,hidden, starttime, endtime,',
	)
);

$TCA['tx_tntmitarbeiter_persons'] = array(
	'ctrl'			 => array(
		'searchFields'				=> 'first_name,last_name',
		'title'						=> 'LLL:EXT:tnt_mitarbeiter/Resources/Private/Language/locallang_db.xml:tx_tntmitarbeiter_persons.name',
		'label'						=> 'first_name',
		'label_alt'					=> 'last_name',
		'label_alt_force'			=> 1,
		'tstamp'					 => 'tstamp',
		'crdate'					 => 'crdate',
		'cruser_id'					 => 'cruser_id',
		'languageField'				 => 'sys_language_uid',
		'transOrigPointerField'			=> 'l18n_parent',
		'transOrigDiffSourceField'		=> 'l18n_diffsource',
		#'default_sortby'				=> 'ORDER BY uid DESC', 
		'sortby'					 => 'sorting',
		'dynamicConfigFile'			 => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Staff.php',
		'iconfile'					 => t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon.gif',
		'delete' => 'deleted',
		'enablecolumns' => array (
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
	),
	'feInterface'	 => array(
		'fe_admin_fieldList' => 'sys_language_uid, l18n_parent, l18n_diffsource, title,first_name,last_name,email,phone,function,title_text,cv,documents,links,movie,image_sw,image_colour,teasertext,position,department,hidden, starttime, endtime',
	)
);
t3lib_div::loadTCA('tt_content');

$pluginSignature = str_replace('_','',$_EXTKEY) . '_tntmitarbeiter';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_structures.xml');