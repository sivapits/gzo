<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Tntjobs',
	'TNT JOBS'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'TNT JOBS');
//\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tntjobs_domain_model_jobs', 'EXT:tnt_jobs/Resources/Private/Language/locallang_csh_tx_tntjobs_domain_model_jobs.xlf');
//\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tntjobs_domain_model_jobs');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tntjobs_job');
$TCA['tx_tntjobs_job'] = array (
    'ctrl' => array (
        'title'     => 'LLL:EXT:tnt_jobs/Resources/Private/Language/locallang_db.xml:tx_tntjobs_job',
        'label'     => 'title',
        'tstamp'    => 'tstamp',
        'crdate'    => 'crdate',
        'cruser_id' => 'cruser_id',
        'languageField'            => 'sys_language_uid',
        'transOrigPointerField'    => 'l18n_parent',
        'transOrigDiffSourceField' => 'l18n_diffsource',
        'default_sortby' => 'ORDER BY crdate DESC',
        'sortby' => 'sorting',
        'delete' => 'deleted',
        'enablecolumns' => array (
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ),
        'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'Configuration/TCA/Jobs.php',
        'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon.gif',
		'searchFields' => 'title'
    ),
    'feInterface' => array (
        'fe_admin_fieldList' => 'sys_language_uid, l18n_parent, l18n_diffsource, hidden, starttime, endtime, reference, title, employer, employer_description, location, region, short_job_description, job_description, experience, job_requirements, job_benefits, apply_information, salary, job_type, contract_type, sector, category, discipline, education, contact',
    )
);

$TCA['tx_tntjobs_region'] = array (
    'ctrl' => array (
        'title'     => 'LLL:EXT:tnt_jobs/Resources/Private/Language/locallang_db.xml:tx_tntjobs_region',
        'label'     => 'name',
        'tstamp'    => 'tstamp',
        'crdate'    => 'crdate',
        'cruser_id' => 'cruser_id',
        'languageField'            => 'sys_language_uid',
        'transOrigPointerField'    => 'l18n_parent',
        'transOrigDiffSourceField' => 'l18n_diffsource',
        'default_sortby' => 'ORDER BY name',
        'sortby' => 'sorting',
		'delete' => 'deleted',
        'enablecolumns' => array (
            'disabled' => 'hidden'
        ),
        'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'Configuration/TCA/Jobs.php',
        'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon.gif',
    ),
    'feInterface' => array (
        'fe_admin_fieldList' => 'sys_language_uid, l18n_parent, l18n_diffsource,hidden, name',
    )
);

$TCA['tx_tntjobs_jobtype'] = array (
    'ctrl' => array (
        'title'     => 'LLL:EXT:tnt_jobs/Resources/Private/Language/locallang_db.xml:tx_tntjobs_job.job_type',
        'label'     => 'jobtype',
        'tstamp'    => 'tstamp',
        'crdate'    => 'crdate',
        'cruser_id' => 'cruser_id',
        'languageField'            => 'sys_language_uid',
        'transOrigPointerField'    => 'l18n_parent',
        'transOrigDiffSourceField' => 'l18n_diffsource',
        'default_sortby' => 'ORDER BY sortby',
        'sortby' => 'sorting',
		'delete' => 'deleted',
        'enablecolumns' => array (
            'disabled' => 'hidden'
        ),
        'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'Configuration/TCA/Jobs.php',
        'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon.gif',
    ),
    'feInterface' => array (
        'fe_admin_fieldList' => 'sys_language_uid, l18n_parent, l18n_diffsource,hidden, jobtype',
    )
);

t3lib_div::loadTCA('tt_content');

$pluginSignature = str_replace('_','',$_EXTKEY) . '_tntjobs';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_structures.xml');