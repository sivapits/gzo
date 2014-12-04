<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA["tx_tntjobs_region"] = array (
    "ctrl" => $TCA["tx_tntjobs_region"]["ctrl"],
    "interface" => array (
        "showRecordFieldList" => "sys_language_uid,hidden,l18n_parent,l18n_diffsource,name"
    ),
    "feInterface" => $TCA["tx_tntjobs_region"]["feInterface"],
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
                'foreign_table'       => 'tx_tntjobs_region',
                'foreign_table_where' => 'AND tx_tntjobs_region.pid=###CURRENT_PID### AND tx_tntjobs_region.sys_language_uid IN (-1,0)',
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
        "name" => Array (
            "exclude" => 1,
            "label" => "LLL:EXT:tnt_jobs/Resources/Private/Language/locallang_db.xml:tx_tntjobs_region.name",
            "config" => Array (
                "type" => "input",
                "size" => "30",
                "eval" => "required",
            )
        ),
    ),
    "types" => array (
        "0" => array("showitem" => "sys_language_uid;;;;1-1-1,hidden;;1, l18n_parent, l18n_diffsource, name")
    ),
    "palettes" => array (
        "1" => array("showitem" => "")
    )
);

$TCA["tx_tntjobs_jobtype"] = array (
    "ctrl" => $TCA["tx_tntjobs_jobtype"]["ctrl"],
    "interface" => array (
        "showRecordFieldList" => "sys_language_uid,hidden,l18n_parent,l18n_diffsource,jobtype"
    ),
    "feInterface" => $TCA["tx_tntjobs_jobtype"]["feInterface"],
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
                'foreign_table'       => 'tx_tntjobs_jobtype',
                'foreign_table_where' => 'AND tx_tntjobs_jobtype.pid=###CURRENT_PID### AND tx_tntjobs_jobtype.sys_language_uid IN (-1,0)',
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
        "jobtype" => Array (
            "exclude" => 0,
            "label" => "LLL:EXT:tnt_jobs/Resources/Private/Language/locallang_db.xml:tx_tntjobs_job.job_type",
            "config" => Array (
                "type" => "input",
                "size" => "30",
                "eval" => "required",
            )
        ),
    ),
    "types" => array (
        "0" => array("showitem" => "sys_language_uid;;;;1-1-1,hidden;;1, l18n_parent, l18n_diffsource, jobtype")
    ),
    "palettes" => array (
        "1" => array("showitem" => "")
    )
);

$TCA["tx_tntjobs_job"] = array (
    "ctrl" => $TCA["tx_tntjobs_job"]["ctrl"],
    "interface" => array (
        "showRecordFieldList" => "sys_language_uid,l18n_parent,l18n_diffsource,hidden,starttime,endtime,reference,title,employer,employer_description,location,region,short_job_description,job_description,experience,job_requirements,job_benefits,apply_information,salary,job_type,contract_type,sector,category,discipline,education,contact"
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
        "title" => Array (
            "exclude" => 1,
            "label" => "LLL:EXT:tnt_jobs/Resources/Private/Language/locallang_db.xml:tx_tntjobs_job.job_title",
            "config" => Array (
                "type" => "input",
                "size" => "30",
                "eval" => "required",
            )
        ),
        "employer_description" => Array (
            "exclude" => 1,
            "label" => "LLL:EXT:tnt_jobs/Resources/Private/Language/locallang_db.xml:tx_tntjobs_job.employer_description",
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
        
        "region" => Array (
            "exclude" => 1,
            "label" => "LLL:EXT:tnt_jobs/Resources/Private/Language/locallang_db.xml:tx_tntjobs_job.region",
            "config" => Array (
                "type" => "select",
                "foreign_table" => "tx_tntjobs_region",
                "foreign_table_where" => "AND tx_tntjobs_region.pid=###STORAGE_PID###",
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
                            "table"=>"tx_tntjobs_region",
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
                            "table"=>"tx_tntjobs_region",
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
        
        "job_description" => Array (
            'exclude' => 0,
			'label' => 'LLL:EXT:tnt_jobs/Resources/Private/Language/locallang_db.xml:tx_tntjobs_job.job_description',
			'config' => array(
					'type' => 'text',
					'cols' => 40,
					'rows' => 6
			),
			'defaultExtras' => 'richtext[]',
			"wizards" => Array(
				'RTE' => array(
					'notNewRecords' => 1,
					'RTEonly' => 1,
					'type' => 'script',
					'title' => 'Full screen Rich Text Editing',
					'icon' => 'wizard_rte2.gif',
					'script' => 'wizard_rte.php',
				),
			),
        ),
		
		
        "experience" => Array (
            "exclude" => 1,
            "label" => "LLL:EXT:tnt_jobs/Resources/Private/Language/locallang_db.xml:tx_tntjobs_job.experience",
            "config" => Array (
                "type" => "input",
                "size" => "30",
            )
        ),
        "job_requirements" => Array (
            "exclude" => 1,
            "label" => "LLL:EXT:tnt_jobs/Resources/Private/Language/locallang_db.xml:tx_tntjobs_job.job_requirements",
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
            "label" => "LLL:EXT:tnt_jobs/Resources/Private/Language/locallang_db.xml:tx_tntjobs_job.apply_information",
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
        
        "job_type" => Array (
            "exclude" => 0,
            "label" => "LLL:EXT:tnt_jobs/Resources/Private/Language/locallang_db.xml:tx_tntjobs_job.job_type",
            "config" => Array (
                "type" => "select",
				"wizards" => Array(
                    "_PADDING" => 2,
                    "_VERTICAL" => 1,
                    "add" => Array(
                        "type" => "script",
                        "title" => "Create new record",
                        "icon" => "add.gif",
                        "params" => Array(
                            "table"=>"tx_tntjobs_jobtype",
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
                            "table"=>"tx_tntjobs_jobtype",
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
				"foreign_table" => "tx_tntjobs_jobtype",
                "foreign_table_where" => "AND tx_tntjobs_jobtype.pid=###STORAGE_PID### AND tx_tntjobs_jobtype.sys_language_uid=CAST('###REC_FIELD_sys_language_uid###' AS UNSIGNED) ORDER BY tx_tntjobs_jobtype.uid",
                "size" => 1,
                "maxitems" => 1,
            )
        ),
        'tx_tntjobs_onlinebewerbung' => array(
		        'exclude' => 1,
		        'label' => "LLL:EXT:tnt_jobs/Resources/Private/Language/locallang_db.xml:online_approval",
		        'config' => array(
		                'type' => 'check'
		        )
		),
    ),
    "types" => array (
        "0" => array("showitem" => "sys_language_uid;;;;1-1-1, l18n_parent, l18n_diffsource, hidden;;1, reference, title, employer, employer_description;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts], location, region, short_job_description, job_description;;;richtext::rte_transform[flag=rte_disabled|mode=ts_css], experience, job_requirements;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts], job_benefits;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts], apply_information;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts], salary, job_type,tx_tntjobs_onlinebewerbung, contract_type, sector, category, discipline, education, contact")
    ),
    "palettes" => array (
        "1" => array("showitem" => "starttime, endtime")
    )
);
