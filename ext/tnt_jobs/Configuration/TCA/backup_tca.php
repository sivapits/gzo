<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_tntjobs_domain_model_jobs'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_tntjobs_domain_model_jobs']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, ',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
				'foreign_table' => 'tx_tntjobs_domain_model_jobs',
				'foreign_table_where' => 'AND tx_tntjobs_domain_model_jobs.pid=###CURRENT_PID### AND tx_tntjobs_domain_model_jobs.sys_language_uid IN (-1,0)',
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

	),
);


$TCA["tx_dmmjobcontrol_region"] = array (
    "ctrl" => $TCA["tx_dmmjobcontrol_region"]["ctrl"],
    "interface" => array (
        "showRecordFieldList" => "sys_language_uid,l18n_parent,l18n_diffsource,name"
    ),
    "feInterface" => $TCA["tx_dmmjobcontrol_region"]["feInterface"],
    "columns" => array (
        'sys_language_uid' => array (
            'exclude' => 1,
            'label'  => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
            'config' => array (
                'type'                => 'select',
                'foreign_table'       => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items' => array(
                    array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
                    array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
                )
            )
        ),
        'l18n_parent' => array (
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude'     => 1,
            'label'       => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
            'config'      => array (
                'type'  => 'select',
                'items' => array (
                    array('', 0),
                ),
                'foreign_table'       => 'tx_dmmjobcontrol_region',
                'foreign_table_where' => 'AND tx_dmmjobcontrol_region.pid=###CURRENT_PID### AND tx_dmmjobcontrol_region.sys_language_uid IN (-1,0)',
            )
        ),
        'l18n_diffsource' => array (
            'config' => array (
                'type' => 'passthrough'
            )
        ),
        "name" => Array (
            "exclude" => 1,
            "label" => "LLL:EXT:dmmjobcontrol/locallang_db.xml:tx_dmmjobcontrol_region.name",
            "config" => Array (
                "type" => "input",
                "size" => "30",
                "eval" => "required",
            )
        ),
    ),
    "types" => array (
        "0" => array("showitem" => "sys_language_uid;;;;1-1-1, l18n_parent, l18n_diffsource, name")
    ),
    "palettes" => array (
        "1" => array("showitem" => "")
    )
);


$TCA["tx_tntjobs_job"] = array (
    "ctrl" => $TCA["tx_tntjobs_job"]["ctrl"],
    "interface" => array (
        "showRecordFieldList" => "sys_language_uid,l18n_parent,l18n_diffsource,hidden,starttime,endtime,reference,job_title,employer,employer_description,location,region,short_job_description,job_description,experience,job_requirements,job_benefits,apply_information,salary,job_type,contract_type,sector,category,discipline,education,contact"
    ),
    "feInterface" => $TCA["tx_tntjobs_job"]["feInterface"],
    "columns" => array (
        'sys_language_uid' => array (
            'exclude' => 1,
            'label'  => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
            'config' => array (
                'type'                => 'select',
                'foreign_table'       => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items' => array(
                    array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
                    array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
                )
            )
        ),
        'l18n_parent' => array (
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude'     => 1,
            'label'       => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
            'config'      => array (
                'type'  => 'select',
                'items' => array (
                    array('', 0),
                ),
                'foreign_table'       => 'tx_tntjobs_job',
                'foreign_table_where' => 'AND tx_tntjobs_job.pid=###CURRENT_PID### AND tx_tntjobs_job.sys_language_uid IN (-1,0)',
            )
        ),
        'l18n_diffsource' => array (
            'config' => array (
                'type' => 'passthrough'
            )
        ),
        'hidden' => array (
            'exclude' => 1,
            'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
            'config'  => array (
                'type'    => 'check',
                'default' => '0'
            )
        ),
        'starttime' => array (
            'exclude' => 1,
            'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
            'config'  => array (
                'type'     => 'input',
                'size'     => '8',
                'max'      => '20',
                'eval'     => 'date',
                'default'  => '0',
                'checkbox' => '0'
            )
        ),
        'endtime' => array (
            'exclude' => 1,
            'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
            'config'  => array (
                'type'     => 'input',
                'size'     => '8',
                'max'      => '20',
                'eval'     => 'date',
                'checkbox' => '0',
                'default'  => '0',
                'range'    => array (
                    'upper' => mktime(0, 0, 0, 12, 31, 2020),
                    'lower' => mktime(0, 0, 0, date('m')-1, date('d'), date('Y'))
                )
            )
        ),
        "reference" => Array (
            "exclude" => 1,
            "label" => "LLL:EXT:dmmjobcontrol/locallang_db.xml:tx_tntjobs_job.reference",
            "config" => Array (
                "type" => "input",
                "size" => "30",
            )
        ),
        "job_title" => Array (
            "exclude" => 1,
            "label" => "LLL:EXT:dmmjobcontrol/locallang_db.xml:tx_tntjobs_job.job_title",
            "config" => Array (
                "type" => "input",
                "size" => "30",
                "eval" => "required",
            )
        ),
        "employer" => Array (
            "exclude" => 1,
            "label" => "LLL:EXT:dmmjobcontrol/locallang_db.xml:tx_tntjobs_job.employer",
            "config" => Array (
                "type" => "input",
                "size" => "30",
            )
        ),
        "employer_description" => Array (
            "exclude" => 1,
            "label" => "LLL:EXT:dmmjobcontrol/locallang_db.xml:tx_tntjobs_job.employer_description",
            "config" => Array (
                "type" => "text",
                "cols" => "30",
                "rows" => "5",
                "wizards" => Array(
                    "_PADDING" => 2,
                    "RTE" => array(
                        "notNewRecords" => 1,
                        "RTEonly" => 1,
                        "type" => "script",
                        "title" => "Full screen Rich Text Editing|Formatteret redigering i hele vinduet",
                        "icon" => "wizard_rte2.gif",
                        "script" => "wizard_rte.php",
                    ),
                ),
            )
        ),
        "location" => Array (
            "exclude" => 1,
            "label" => "LLL:EXT:dmmjobcontrol/locallang_db.xml:tx_tntjobs_job.location",
            "config" => Array (
                "type" => "input",
                "size" => "30",
            )
        ),
        "region" => Array (
            "exclude" => 1,
            "label" => "LLL:EXT:dmmjobcontrol/locallang_db.xml:tx_tntjobs_job.region",
            "config" => Array (
                "type" => "select",
                "foreign_table" => "tx_dmmjobcontrol_region",
                "foreign_table_where" => "AND tx_dmmjobcontrol_region.pid=###STORAGE_PID### AND tx_dmmjobcontrol_region.sys_language_uid=CAST('###REC_FIELD_sys_language_uid###' AS UNSIGNED) ORDER BY tx_dmmjobcontrol_region.uid",
                "size" => 10,
                "minitems" => 0,
                "maxitems" => 100,
                "MM" => "tx_tntjobs_job_region_mm",
                "wizards" => Array(
                    "_PADDING" => 2,
                    "_VERTICAL" => 1,
                    "add" => Array(
                        "type" => "script",
                        "title" => "Create new record",
                        "icon" => "add.gif",
                        "params" => Array(
                            "table"=>"tx_dmmjobcontrol_region",
                            "pid" => "###CURRENT_PID###",
                            "setValue" => "prepend"
                        ),
                        "script" => "wizard_add.php",
                    ),
                    "list" => Array(
                        "type" => "script",
                        "title" => "List",
                        "icon" => "list.gif",
                        "params" => Array(
                            "table"=>"tx_dmmjobcontrol_region",
                            "pid" => "###CURRENT_PID###",
                        ),
                        "script" => "wizard_list.php",
                    ),
                    "edit" => Array(
                        "type" => "popup",
                        "title" => "Edit",
                        "script" => "wizard_edit.php",
                        "popup_onlyOpenIfSelected" => 1,
                        "icon" => "edit2.gif",
                        "JSopenParams" => "height=350,width=580,status=0,menubar=0,scrollbars=1",
                    ),
                ),
            )
        ),
        "short_job_description" => Array (
            "exclude" => 1,
            "label" => "LLL:EXT:dmmjobcontrol/locallang_db.xml:tx_tntjobs_job.short_job_description",
            "config" => Array (
                "type" => "text",
                "cols" => "30",
                "rows" => "2",
            )
        ),
        "job_description" => Array (
            "exclude" => 1,
            "label" => "LLL:EXT:dmmjobcontrol/locallang_db.xml:tx_tntjobs_job.job_description",
            "config" => Array (
                "type" => "text",
                "cols" => "30",
                "rows" => "5",
                "wizards" => Array(
                    "_PADDING" => 2,
                    "RTE" => array(
                        "notNewRecords" => 1,
                        "RTEonly" => 1,
                        "type" => "script",
                        "title" => "Full screen Rich Text Editing|Formatteret redigering i hele vinduet",
                        "icon" => "wizard_rte2.gif",
                        "script" => "wizard_rte.php",
                    ),
                ),
            )
        ),
        "experience" => Array (
            "exclude" => 1,
            "label" => "LLL:EXT:dmmjobcontrol/locallang_db.xml:tx_tntjobs_job.experience",
            "config" => Array (
                "type" => "input",
                "size" => "30",
            )
        ),
        "job_requirements" => Array (
            "exclude" => 1,
            "label" => "LLL:EXT:dmmjobcontrol/locallang_db.xml:tx_tntjobs_job.job_requirements",
            "config" => Array (
                "type" => "text",
                "cols" => "30",
                "rows" => "5",
                "wizards" => Array(
                    "_PADDING" => 2,
                    "RTE" => array(
                        "notNewRecords" => 1,
                        "RTEonly" => 1,
                        "type" => "script",
                        "title" => "Full screen Rich Text Editing|Formatteret redigering i hele vinduet",
                        "icon" => "wizard_rte2.gif",
                        "script" => "wizard_rte.php",
                    ),
                ),
            )
        ),
        "job_benefits" => Array (
            "exclude" => 1,
            "label" => "LLL:EXT:dmmjobcontrol/locallang_db.xml:tx_tntjobs_job.job_benefits",
            "config" => Array (
                "type" => "text",
                "cols" => "30",
                "rows" => "5",
                "wizards" => Array(
                    "_PADDING" => 2,
                    "RTE" => array(
                        "notNewRecords" => 1,
                        "RTEonly" => 1,
                        "type" => "script",
                        "title" => "Full screen Rich Text Editing|Formatteret redigering i hele vinduet",
                        "icon" => "wizard_rte2.gif",
                        "script" => "wizard_rte.php",
                    ),
                ),
            )
        ),
        "apply_information" => Array (
            "exclude" => 1,
            "label" => "LLL:EXT:dmmjobcontrol/locallang_db.xml:tx_tntjobs_job.apply_information",
            "config" => Array (
                "type" => "text",
                "cols" => "30",
                "rows" => "5",
                "wizards" => Array(
                    "_PADDING" => 2,
                    "RTE" => array(
                        "notNewRecords" => 1,
                        "RTEonly" => 1,
                        "type" => "script",
                        "title" => "Full screen Rich Text Editing|Formatteret redigering i hele vinduet",
                        "icon" => "wizard_rte2.gif",
                        "script" => "wizard_rte.php",
                    ),
                ),
            )
        ),
        "salary" => Array (
            "exclude" => 1,
            "label" => "LLL:EXT:dmmjobcontrol/locallang_db.xml:tx_tntjobs_job.salary",
            "config" => Array (
                "type" => "text",
                "cols" => "30",
                "rows" => "2",
            )
        ),
        "job_type" => Array (
            "exclude" => 1,
            "label" => "LLL:EXT:dmmjobcontrol/locallang_db.xml:tx_tntjobs_job.job_type",
            "config" => Array (
                "type" => "select",
                "items" => Array (
                    Array("LLL:EXT:dmmjobcontrol/locallang_db.xml:tx_tntjobs_job.job_type.I.0", "0"),
                    Array("LLL:EXT:dmmjobcontrol/locallang_db.xml:tx_tntjobs_job.job_type.I.1", "1"),
                ),
                "size" => 1,
                "maxitems" => 1,
            )
        ),
        "contract_type" => Array (
            "exclude" => 1,
            "label" => "LLL:EXT:dmmjobcontrol/locallang_db.xml:tx_tntjobs_job.contract_type",
            "config" => Array (
                "type" => "select",
                "items" => Array (
                    Array("LLL:EXT:dmmjobcontrol/locallang_db.xml:tx_tntjobs_job.contract_type.I.0", "0"),
                    Array("LLL:EXT:dmmjobcontrol/locallang_db.xml:tx_tntjobs_job.contract_type.I.1", "1"),
                    Array("LLL:EXT:dmmjobcontrol/locallang_db.xml:tx_tntjobs_job.contract_type.I.2", "2"),
                    Array("LLL:EXT:dmmjobcontrol/locallang_db.xml:tx_tntjobs_job.contract_type.I.3", "3"),
                ),
                "size" => 1,
                "maxitems" => 1,
            )
        ),
        "sector" => Array (
            "exclude" => 1,
            "label" => "LLL:EXT:dmmjobcontrol/locallang_db.xml:tx_tntjobs_job.sector",
            "config" => Array (
                "type" => "select",
                "foreign_table" => "tx_dmmjobcontrol_sector",
                "foreign_table_where" => "AND tx_dmmjobcontrol_sector.pid=###STORAGE_PID### AND tx_dmmjobcontrol_sector.sys_language_uid=CAST('###REC_FIELD_sys_language_uid###' AS UNSIGNED) ORDER BY tx_dmmjobcontrol_sector.uid",
                "size" => 10,
                "minitems" => 0,
                "maxitems" => 100,
                "MM" => "tx_tntjobs_job_sector_mm",
                "wizards" => Array(
                    "_PADDING" => 2,
                    "_VERTICAL" => 1,
                    "add" => Array(
                        "type" => "script",
                        "title" => "Create new record",
                        "icon" => "add.gif",
                        "params" => Array(
                            "table"=>"tx_dmmjobcontrol_sector",
                            "pid" => "###CURRENT_PID###",
                            "setValue" => "prepend"
                        ),
                        "script" => "wizard_add.php",
                    ),
                    "list" => Array(
                        "type" => "script",
                        "title" => "List",
                        "icon" => "list.gif",
                        "params" => Array(
                            "table"=>"tx_dmmjobcontrol_sector",
                            "pid" => "###CURRENT_PID###",
                        ),
                        "script" => "wizard_list.php",
                    ),
                    "edit" => Array(
                        "type" => "popup",
                        "title" => "Edit",
                        "script" => "wizard_edit.php",
                        "popup_onlyOpenIfSelected" => 1,
                        "icon" => "edit2.gif",
                        "JSopenParams" => "height=350,width=580,status=0,menubar=0,scrollbars=1",
                    ),
                ),
            )
        ),
        "category" => Array (
            "exclude" => 1,
            "label" => "LLL:EXT:dmmjobcontrol/locallang_db.xml:tx_tntjobs_job.category",
            "config" => Array (
                "type" => "select",
                "foreign_table" => "tx_dmmjobcontrol_category",
                "foreign_table_where" => "AND tx_dmmjobcontrol_category.pid=###STORAGE_PID### AND tx_dmmjobcontrol_category.sys_language_uid=CAST('###REC_FIELD_sys_language_uid###' AS UNSIGNED) ORDER BY tx_dmmjobcontrol_category.uid",
                "size" => 10,
                "minitems" => 0,
                "maxitems" => 100,
                "MM" => "tx_tntjobs_job_category_mm",
                "wizards" => Array(
                    "_PADDING" => 2,
                    "_VERTICAL" => 1,
                    "add" => Array(
                        "type" => "script",
                        "title" => "Create new record",
                        "icon" => "add.gif",
                        "params" => Array(
                            "table"=>"tx_dmmjobcontrol_category",
                            "pid" => "###CURRENT_PID###",
                            "setValue" => "prepend"
                        ),
                        "script" => "wizard_add.php",
                    ),
                    "list" => Array(
                        "type" => "script",
                        "title" => "List",
                        "icon" => "list.gif",
                        "params" => Array(
                            "table"=>"tx_dmmjobcontrol_category",
                            "pid" => "###CURRENT_PID###",
                        ),
                        "script" => "wizard_list.php",
                    ),
                    "edit" => Array(
                        "type" => "popup",
                        "title" => "Edit",
                        "script" => "wizard_edit.php",
                        "popup_onlyOpenIfSelected" => 1,
                        "icon" => "edit2.gif",
                        "JSopenParams" => "height=350,width=580,status=0,menubar=0,scrollbars=1",
                    ),
                ),
            )
        ),
        "discipline" => Array (
            "exclude" => 1,
            "label" => "LLL:EXT:dmmjobcontrol/locallang_db.xml:tx_tntjobs_job.discipline",
            "config" => Array (
                "type" => "select",
                "foreign_table" => "tx_dmmjobcontrol_discipline",
                "foreign_table_where" => "AND tx_dmmjobcontrol_discipline.pid=###STORAGE_PID### AND tx_dmmjobcontrol_discipline.sys_language_uid=CAST('###REC_FIELD_sys_language_uid###' AS UNSIGNED) ORDER BY tx_dmmjobcontrol_discipline.uid",
                "size" => 10,
                "minitems" => 0,
                "maxitems" => 100,
                "MM" => "tx_tntjobs_job_discipline_mm",
                "wizards" => Array(
                    "_PADDING" => 2,
                    "_VERTICAL" => 1,
                    "add" => Array(
                        "type" => "script",
                        "title" => "Create new record",
                        "icon" => "add.gif",
                        "params" => Array(
                            "table"=>"tx_dmmjobcontrol_discipline",
                            "pid" => "###CURRENT_PID###",
                            "setValue" => "prepend"
                        ),
                        "script" => "wizard_add.php",
                    ),
                    "list" => Array(
                        "type" => "script",
                        "title" => "List",
                        "icon" => "list.gif",
                        "params" => Array(
                            "table"=>"tx_dmmjobcontrol_discipline",
                            "pid" => "###CURRENT_PID###",
                        ),
                        "script" => "wizard_list.php",
                    ),
                    "edit" => Array(
                        "type" => "popup",
                        "title" => "Edit",
                        "script" => "wizard_edit.php",
                        "popup_onlyOpenIfSelected" => 1,
                        "icon" => "edit2.gif",
                        "JSopenParams" => "height=350,width=580,status=0,menubar=0,scrollbars=1",
                    ),
                ),
            )
        ),
        "education" => Array (
            "exclude" => 1,
            "label" => "LLL:EXT:dmmjobcontrol/locallang_db.xml:tx_tntjobs_job.education",
            "config" => Array (
                "type" => "select",
                "foreign_table" => "tx_dmmjobcontrol_education",
                "foreign_table_where" => "AND tx_dmmjobcontrol_education.pid=###STORAGE_PID### AND tx_dmmjobcontrol_education.sys_language_uid=CAST('###REC_FIELD_sys_language_uid###' AS UNSIGNED) ORDER BY tx_dmmjobcontrol_education.uid",
                "size" => 10,
                "minitems" => 0,
                "maxitems" => 100,
                "MM" => "tx_tntjobs_job_education_mm",
                "wizards" => Array(
                    "_PADDING" => 2,
                    "_VERTICAL" => 1,
                    "add" => Array(
                        "type" => "script",
                        "title" => "Create new record",
                        "icon" => "add.gif",
                        "params" => Array(
                            "table"=>"tx_dmmjobcontrol_education",
                            "pid" => "###CURRENT_PID###",
                            "setValue" => "prepend"
                        ),
                        "script" => "wizard_add.php",
                    ),
                    "list" => Array(
                        "type" => "script",
                        "title" => "List",
                        "icon" => "list.gif",
                        "params" => Array(
                            "table"=>"tx_dmmjobcontrol_education",
                            "pid" => "###CURRENT_PID###",
                        ),
                        "script" => "wizard_list.php",
                    ),
                    "edit" => Array(
                        "type" => "popup",
                        "title" => "Edit",
                        "script" => "wizard_edit.php",
                        "popup_onlyOpenIfSelected" => 1,
                        "icon" => "edit2.gif",
                        "JSopenParams" => "height=350,width=580,status=0,menubar=0,scrollbars=1",
                    ),
                ),
            ),
        ),
        "contact" => Array (
            "exclude" => 1,
            "label" => "LLL:EXT:dmmjobcontrol/locallang_db.xml:tx_tntjobs_job.contact",
            "config" => Array (
                "type" => "select",
                "items" => Array (
                    Array("",0),
                ),
                "foreign_table" => "tx_dmmjobcontrol_contact",
                "foreign_table_where" => "AND tx_dmmjobcontrol_contact.pid=###STORAGE_PID### ORDER BY tx_dmmjobcontrol_contact.uid",
                "size" => 1,
                "minitems" => 0,
                "maxitems" => 1,
                "wizards" => Array(
                    "_PADDING" => 2,
                    "_VERTICAL" => 1,
                    "add" => Array(
                        "type" => "script",
                        "title" => "Create new record",
                        "icon" => "add.gif",
                        "params" => Array(
                            "table"=>"tx_dmmjobcontrol_contact",
                            "pid" => "###CURRENT_PID###",
                            "setValue" => "prepend"
                        ),
                        "script" => "wizard_add.php",
                    ),
                    "edit" => Array(
                        "type" => "popup",
                        "title" => "Edit",
                        "script" => "wizard_edit.php",
                        "popup_onlyOpenIfSelected" => 1,
                        "icon" => "edit2.gif",
                        "JSopenParams" => "height=350,width=580,status=0,menubar=0,scrollbars=1",
                    ),
                ),
            )
        ),
    ),
    "types" => array (
        "0" => array("showitem" => "sys_language_uid;;;;1-1-1, l18n_parent, l18n_diffsource, hidden;;1, reference, job_title, employer, employer_description;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts], location, region, short_job_description, job_description;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts], experience, job_requirements;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts], job_benefits;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts], apply_information;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts], salary, job_type, contract_type, sector, category, discipline, education, contact")
    ),
    "palettes" => array (
        "1" => array("showitem" => "starttime, endtime")
    )
);
