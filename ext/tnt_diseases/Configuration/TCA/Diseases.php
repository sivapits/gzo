<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$GLOBALS['TCA']['tx_tntdiseases_domain_model_diseases'] = array(
    'ctrl' => $GLOBALS['TCA']['tx_tntdiseases_domain_model_diseases']['ctrl'],
    'interface' => array(
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, ',
    ),
    'types' => array(
        '1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden,title,title_dropdown,link_title,gender,region,pages,category_type,text;;;richtext::rte_transform[flag=rte_disabled|mode=ts_css],teaser_text;;;richtext::rte_transform[flag=rte_disabled|mode=ts_css],start_image,gallery_text,gallery,video_title,video_videocode,seo_title_tag,seo_description_tag;;1, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
                'foreign_table' => 'tx_tntdiseases_domain_model_diseases',
                'foreign_table_where' => 'AND tx_tntdiseases_domain_model_diseases.pid=###CURRENT_PID### AND tx_tntdiseases_domain_model_diseases.sys_language_uid IN (-1,0)',
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
        'title' => array(
            'label' => 'LLL:EXT:tnt_diseases/Resources/Private/Language/locallang_db.xlf:tx_tntdiseases_domain_model_diseases_title',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            )
        ),
        'title_dropdown' => array(
            'label' => 'LLL:EXT:tnt_diseases/Resources/Private/Language/locallang_db.xlf:tx_tntdiseases_domain_model_diseases_title_dropdown',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            )
        ),
        'link_title' => array(
            'label' => 'LLL:EXT:tnt_diseases/Resources/Private/Language/locallang_db.xlf:tx_tntdiseases_domain_model_diseases_link_title',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            )
        ),
        'gender' => array(
            'label' => 'LLL:EXT:tnt_diseases/Resources/Private/Language/locallang_db.xlf:tx_tntdiseases_domain_model_diseases_gender',
            'config' => array(
                'type' => 'check',
                'items' => array(
                    array('LLL:EXT:tnt_diseases/Resources/Private/Language/locallang_db.xlf:tx_tntdiseases_domain_model_diseases_male', '1'),
                    array('LLL:EXT:tnt_diseases/Resources/Private/Language/locallang_db.xlf:tx_tntdiseases_domain_model_diseases_female', '2')
                ),
            ),
        ),
        'region' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:tnt_diseases/Resources/Private/Language/locallang_db.xlf:tx_tntdiseases_domain_model_diseases_region',
            'config' => array(
                'type' => 'select',
                'foreign_table' => 'tx_tntdiseases_domain_model_region',
                //'foreign_table_where' => 'AND tx_tntdiseases_domain_model_region.uid != 1',
                'size' => 10,
                'maxitems' => 20,
                'minitems' => 0,
            )
        ),
        'pages' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:tnt_diseases/Resources/Private/Language/locallang_db.xlf:tx_tntdiseases_domain_model_diseases_pages',
            'config' => array(
                'type' => 'select',
                'foreign_table' => 'tx_tntdiseases_domain_model_pages',
                'foreign_table_where' => '',
                'size' => 10,
                'maxitems' => 999,
            )
        ),
        'category_type' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:tnt_diseases/Resources/Private/Language/locallang_db.xlf:tx_tntdiseases_domain_model_diseases_category_type',
            'config' => array(
                'type' => 'select',
                'foreign_table' => 'tx_tntdiseases_domain_model_category',
                'foreign_table_where' => '',
                'size' => 10,
                'maxitems' => 999,
                'minitems' => 1,
            )
        ),
        'text' => array(
            'label' => 'LLL:EXT:tnt_diseases/Resources/Private/Language/locallang_db.xlf:tx_tntdiseases_domain_model_diseases_text',
            'config' => array(
                'type' => 'text',
                'cols' => 30,
                'rows' => 5,
                'softref' => 'rtehtmlarea_images,typolink_tag,images,email[subst],url',
                'wizards' => array(
                    '_PADDING' => 2,
                    'RTE' => array(
                        'notNewRecords' => 1,
                        'RTEonly' => 1,
                        'type' => 'script',
                        'title' => 'Full screen Rich Text Editing',
                        'icon' => 'wizard_rte2.gif',
                        'script' => 'wizard_rte.php',
                    ),
                ),
            )
        ),
        'teaser_text' => array(
            'label' => 'LLL:EXT:tnt_diseases/Resources/Private/Language/locallang_db.xlf:tx_tntdiseases_domain_model_diseases_teaser_text',
            'config' => array(
                'type' => 'text',
                'cols' => 30,
                'rows' => 5,
                'wizards' => array(
                    '_PADDING' => 2,
                    'RTE' => array(
                        'notNewRecords' => 1,
                        'RTEonly' => 1,
                        'type' => 'script',
                        'title' => 'Full screen Rich Text Editing',
                        'icon' => 'wizard_rte2.gif',
                        'script' => 'wizard_rte.php',
                    ),
                ),
            )
        ),
        'start_image' => array(
            'label' => 'LLL:EXT:tnt_diseases/Resources/Private/Language/locallang_db.xlf:tx_tntdiseases_domain_model_diseases_start_image',
            'l10n_mode' => 'exclude',
            "config" => t3lib_extMgm::getFileFieldTCAConfig('start_image', array(
                'type' => 'inline',
                'elementBrowserType' => 'file',
                'appearance' => array(
                    'createNewRelationLinkTitle' => 'LLL:EXT:tnt_diseases/Resources/Private/Language/locallang_db.xlf:tx_tntdiseases_domain_model_diseases_start_image',
                    'collapseAll' => TRUE,
                ),
                'maxitems' => '1',
                'minitems' => '0',
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ))
        ),
        'start_image_text' => array(
            'label' => 'LLL:EXT:tnt_diseases/Resources/Private/Language/locallang_db.xlf:tx_tntdiseases_domain_model_diseases_start_image_text',
            'config' => array(
                'type' => 'text',
                'cols' => 30,
                'rows' => 5,
                'softref' => 'rtehtmlarea_images,typolink_tag,images,email[subst],url',
                'wizards' => array(
                    '_PADDING' => 2,
                    'RTE' => array(
                        'notNewRecords' => 1,
                        'RTEonly' => 1,
                        'type' => 'script',
                        'title' => 'Full screen Rich Text Editing',
                        'icon' => 'wizard_rte2.gif',
                        'script' => 'wizard_rte.php',
                    ),
                ),
            )
        ),
        'gallery' => array(
            'label' => 'LLL:EXT:tnt_diseases/Resources/Private/Language/locallang_db.xlf:tx_tntdiseases_domain_model_diseases_gallery',
            'l10n_mode' => 'exclude',
            "config" => t3lib_extMgm::getFileFieldTCAConfig('gallery', array(
                'type' => 'inline',
                'elementBrowserType' => 'file',
                'appearance' => array(
                    'createNewRelationLinkTitle' => 'LLL:EXT:tnt_diseases/Resources/Private/Language/locallang_db.xlf:tx_tntdiseases_domain_model_diseases_gallery',
                    'collapseAll' => TRUE,
                ),
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ))
        ),
        'gallery_text' => array(
            'label' => 'LLL:EXT:tnt_diseases/Resources/Private/Language/locallang_db.xlf:tx_tntdiseases_domain_model_diseases_gallery_text',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            )
        ),
        'video_title' => array(
            'label' => 'LLL:EXT:tnt_diseases/Resources/Private/Language/locallang_db.xlf:tx_tntdiseases_domain_model_diseases_video_title',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            )
        ),
        'video_videocode' => array(
            'label' => 'LLL:EXT:tnt_diseases/Resources/Private/Language/locallang_db.xlf:tx_tntdiseases_domain_model_diseases_video_videocode',
            'config' => array(
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            )
        ),
        'seo_title_tag' => array(
            'label' => 'LLL:EXT:tnt_diseases/Resources/Private/Language/locallang_db.xlf:tx_tntdiseases_domain_model_diseases_seo_title_tag',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            )
        ),
        'seo_description_tag' => array(
            'label' => 'LLL:EXT:tnt_diseases/Resources/Private/Language/locallang_db.xlf:tx_tntdiseases_domain_model_diseases_seo_description_tag',
            'config' => array(
                'type' => 'text',
                'cols' => '20',
                'rows' => '15'
            )
        ),
    ),
);
