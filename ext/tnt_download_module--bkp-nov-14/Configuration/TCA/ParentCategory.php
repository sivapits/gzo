<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$GLOBALS['TCA']['tx_tntdownloadmodule_domain_model_parentcategory'] = array(
    'ctrl' => $GLOBALS['TCA']['tx_tntdownloadmodule_domain_model_parentcategory']['ctrl'],
    'interface' => array(
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, ',
    ),
    'types' => array(
        '1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden,category_title,parent;;1,--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime,category_user_group'),
    ),
    'palettes' => array(
        '1' => array('showitem' => ''),
    ),
    'columns' => array(
        'sys_language_uid' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => array(
                'type' => 'select',
                'foreign_table' => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items' => array(
                    array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
                    array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
                ),
            ),
        ),
        'l10n_parent' => array(
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => array(
                'type' => 'select',
                'items' => array(
                    array('', 0),
                ),
                'foreign_table' => 'tx_tntdownloadmodule_domain_model_parentcategory',
                'foreign_table_where' => 'AND tx_tntdownloadmodule_domain_model_parentcategory.pid=###CURRENT_PID### AND tx_tntdownloadmodule_domain_model_parentcategory.sys_language_uid IN (-1,0)',
            ),
        ),
        'l10n_diffsource' => array(
            'config' => array(
                'type' => 'passthrough',
            ),
        ),
        't3ver_label' => array(
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            )
        ),
        'hidden' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => array(
                'type' => 'check',
            ),
        ),
        'starttime' => array(
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => array(
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => array(
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ),
            ),
        ),
        'endtime' => array(
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => array(
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => array(
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ),
            ),
        ),
        'category_title' => array(
            'exclude' => 0,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:tnt_download_module/Resources/Private/Language/locallang_db.xlf:tx_tntdownloadmodule_domain_model_parentcategory_category_title',
            'config' => array(
                'type' => 'input',
                'size' => 40
            ),
        ),
        'parent' => array(
            'exclude' => 0,
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'label' => 'LLL:EXT:tnt_download_module/Resources/Private/Language/locallang_db.xlf:tx_tntdownloadmodule_domain_model_downloadmodule_document_category',
            'config' => array(
                'type' => 'select',
                'renderMode' => 'tree',
                'treeConfig' => array(
                    'parentField' => 'parent',
                    'appearance' => array(
                        'expandAll' => TRUE,
                        'showHeader' => TRUE,
                    ),
                ),
                'foreign_table' => 'tx_tntdownloadmodule_domain_model_parentcategory',
                'foreign_table_where' => 'AND tx_tntdownloadmodule_domain_model_parentcategory.sys_language_uid IN (-1,0)',
                'minitems' => 0,
                'maxitems' => 1,
            )
        ),
        'category_user_group' => array(
            'exclude' => 0,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:tnt_download_module/Resources/Private/Language/locallang_db.xlf:tx_tntdownloadmodule_domain_model_parentcategory_category_user_group',
            'config' => array(
                'type' => 'select',
                'foreign_table' => 'fe_groups',
                'size' => 10,
                'minitems' => 0,
                'maxitems' => 100,
            ),
        ),
    ),
);
