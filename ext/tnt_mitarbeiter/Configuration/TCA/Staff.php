<?php

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$TCA["tx_tntmitarbeiter_position"] = array(
	"ctrl"			 => $TCA["tx_tntmitarbeiter_position"]["ctrl"],
	"interface"		 => array(
		"showRecordFieldList" => "sys_language_uid,l18n_parent,l18n_diffsource,name,hidden"
	),
	"feInterface"	 => $TCA["tx_tntmitarbeiter_position"]["feInterface"],
	"columns"		 => array(
		'sys_language_uid'	 => array(
			'exclude'	 => 1,
			'label'		 => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config'	 => array(
				'type'					 => 'select',
				'foreign_table'			 => 'sys_language',
				'foreign_table_where'		 => 'ORDER BY sys_language.title',
				'items'					 => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				)
			)
		),
		'l18n_parent'		 => array(
			'displayCond'	 => 'FIELD:sys_language_uid:>:0',
			'exclude'		 => 1,
			'label'			 => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config'		 => array(
				'type'					 => 'select',
				'items'					 => array(
					array('', 0),
				),
				'foreign_table'			 => 'tx_tntmitarbeiter_position',
				'foreign_table_where'	 => 'AND tx_tntmitarbeiter_position.pid=###CURRENT_PID### AND tx_tntmitarbeiter_position.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource'	 => array(
			'config' => array(
				'type' => 'passthrough'
			)
		),
		"name"	 => Array(
			"exclude"	 => 1,
			"label"	 => "LLL:EXT:tnt_mitarbeiter/Resources/Private/Language/locallang_db.xml:tx_tntmitarbeiter_position.name",
			"config"	 => Array(
			"type"	 => "input",
			"size"		 => "30",
			"eval"		 => "required",
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
	),
	"types"	 => array(
		"0" => array("showitem" => "sys_language_uid;;;;1-1-1, l18n_parent, l18n_diffsource,hidden;;1, name")
	),
	"palettes"	 => array(
		"1" => array("showitem" => "")
	)
);

$TCA["tx_tntmitarbeiter_cv_data"] = array(
	"ctrl"			 => array( 
			"hideTable"					=>	1,
			'sortby'					=> 'sorting',
			'crdate'					=> 'crdate',
			'delete' 					=> 'deleted',
			'tstamp'					=> 'tstamp',
			'crdate'					=> 'crdate',
			'cruser_id'					=> 'cruser_id',
			'languageField'				=> 'sys_language_uid',
			'transOrigPointerField'		=> 'l18n_parent',
			'transOrigDiffSourceField'	=> 'l18n_diffsource',
			'default_sortby'			=> 'ORDER BY sorting',
			'sortby'					=> 'sorting',
			'enablecolumns' => array (
				'disabled' 	=> 'hidden'
			),
			
	),
	"interface"		 => array(
		"showRecordFieldList" => "title,cvdata"
	),
	'feInterface'	 => array(
		'fe_admin_fieldList' => 'sys_language_uid, l18n_parent, l18n_diffsource, title,hidden',
	),
	"columns"		 => array(
		'sys_language_uid'	 => array(
			'exclude'	 => 1,
			'label'		 => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config'	 => array(
				'type'					 => 'select',
				'foreign_table'			 => 'sys_language',
				'foreign_table_where'		 => 'ORDER BY sys_language.title',
				'items'					 => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				)
			)
		),
		'l18n_parent'		 => array(
			'displayCond'	 => 'FIELD:sys_language_uid:>:0',
			'exclude'		 => 1,
			'label'			 => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config'		 => array(
				'type'					 => 'select',
				'items'					 => array(
					array('', 0),
				),
			)
		),
		'l18n_diffsource'	 => array(
			'config' => array(
				'type' => 'passthrough'
			)
		),
		"title"	 => Array(
			"exclude"	 => 1,
			"label"	 => "Title",
			"config"	 => Array(
			"type"		 => "input",
			"size"		 => "30",
			"eval"		 => "required",
			)
		),
		"cvdata"	 => Array(
			"exclude"	 => 1,
			"label"	 => "Description",
			"config"	 => Array(
				'type' => 'text',
				'cols' => '40',
				'rows' => '15',
				"eval" => "required",
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
		
	),
	"types"	 => array(
		"0" => array("showitem" => "sys_language_uid;;;;1-1-1, l18n_parent, l18n_diffsource,hidden;;1, title,cvdata")
	),
	"palettes"	 => array(
		"1" => array("showitem" => "")
	)
);

$TCA["tx_tntmitarbeiter_titletext_data"] = array(
	"ctrl"			 => array( 
			"hideTable"		=>	1,
			'sortby'		=> 'sorting',
			'crdate'		=> 'crdate',
			'delete' 		=> 'deleted',
			'tstamp'					 => 'tstamp',
			'crdate'					 => 'crdate',
			'cruser_id'					 => 'cruser_id',
			'languageField'				 => 'sys_language_uid',
			'transOrigPointerField'			=> 'l18n_parent',
			'transOrigDiffSourceField'		=> 'l18n_diffsource',
			'default_sortby'				=> 'ORDER BY sorting',
			'sortby'					 => 'sorting',
			'enablecolumns' => array (
				'disabled' 	=> 'hidden'
			),
			
	),
	"interface"		 => array(
		"showRecordFieldList" => "title,title_data"
	),
	'feInterface'	 => array(
		'fe_admin_fieldList' => 'sys_language_uid, l18n_parent, l18n_diffsource, title,hidden',
	),
	"columns"		 => array(
		'sys_language_uid'	 => array(
			'exclude'	 => 1,
			'label'		 => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config'	 => array(
				'type'					 => 'select',
				'foreign_table'			 => 'sys_language',
				'foreign_table_where'		 => 'ORDER BY sys_language.title',
				'items'					 => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				)
			)
		),
		'l18n_parent'		 => array(
			'displayCond'	 => 'FIELD:sys_language_uid:>:0',
			'exclude'		 => 1,
			'label'			 => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config'		 => array(
				'type'					 => 'select',
				'items'					 => array(
					array('', 0),
				),
			)
		),
		'l18n_diffsource'	 => array(
			'config' => array(
				'type' => 'passthrough'
			)
		),
		"title"	 => Array(
			"exclude"	 => 1,
			"label"	 => "LLL:EXT:tnt_mitarbeiter/Resources/Private/Language/locallang_db.xml:title",
			"config"	 => Array(
			"type"	 => "input",
			"size"		 => "30",
			"eval"		 => "required",
			)
		),
		"title_data"	 => Array(
			"exclude"	 => 1,
			"label"	 => "LLL:EXT:tnt_mitarbeiter/Resources/Private/Language/locallang_db.xml:titletext",
			"config"	 => Array(
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
		'hidden' => array (
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array (
				'type'    => 'check',
				'default' => '0'
			)
		),
		
	),
	"types"	 => array(
		"0" => array("showitem" => "sys_language_uid;;;;1-1-1, l18n_parent, l18n_diffsource,hidden;;1, title,title_data;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts]")
	),
	"palettes"	 => array(
		"1" => array("showitem" => "")
	)
);


$TCA["tx_tntmitarbeiter_membership_data"] = array(
	"ctrl"			 => array( 
			"hideTable"		=>	1,
			'sortby'		=> 'sorting',
			'crdate'		=> 'crdate',
			'delete' 		=> 'deleted',
			'tstamp'					 => 'tstamp',
			'crdate'					 => 'crdate',
			'cruser_id'					 => 'cruser_id',
			'languageField'				 => 'sys_language_uid',
			'transOrigPointerField'			=> 'l18n_parent',
			'transOrigDiffSourceField'		=> 'l18n_diffsource',
			'default_sortby'				=> 'ORDER BY sorting',
			'sortby'					 => 'sorting',
			'enablecolumns' => array (
				'disabled' 	=> 'hidden'
			),
			
	),
	"interface"		 => array(
		"showRecordFieldList" => "title,membership_details"
	),
	'feInterface'	 => array(
		'fe_admin_fieldList' => 'sys_language_uid, l18n_parent, l18n_diffsource, title,hidden',
	),
	"columns"		 => array(
		'sys_language_uid'	 => array(
			'exclude'	 => 1,
			'label'		 => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config'	 => array(
				'type'					 => 'select',
				'foreign_table'			 => 'sys_language',
				'foreign_table_where'		 => 'ORDER BY sys_language.title',
				'items'					 => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				)
			)
		),
		'l18n_parent'		 => array(
			'displayCond'	 => 'FIELD:sys_language_uid:>:0',
			'exclude'		 => 1,
			'label'			 => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config'		 => array(
				'type'					 => 'select',
				'items'					 => array(
					array('', 0),
				),
			)
		),
		'l18n_diffsource'	 => array(
			'config' => array(
				'type' => 'passthrough'
			)
		),
		"title"	 => Array(
			"exclude"	 => 1,
			"label"	 => "LLL:EXT:tnt_mitarbeiter/Resources/Private/Language/locallang_db.xml:title",
			"config"	 => Array(
			"type"	 => "input",
			"size"		 => "30",
			"eval"		 => "required",
			)
		),
		"membership_details"	 => Array(
			"exclude"	 => 1,
			"label"	 => "LLL:EXT:tnt_mitarbeiter/Resources/Private/Language/locallang_db.xml:titletext",
			"config"	 => Array(
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
		'hidden' => array (
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array (
				'type'    => 'check',
				'default' => '0'
			)
		),
		
	),
	"types"	 => array(
		"0" => array("showitem" => "sys_language_uid;;;;1-1-1, l18n_parent, l18n_diffsource,hidden;;1, title,membership_details;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts]")
	),
	"palettes"	 => array(
		"1" => array("showitem" => "")
	)
);

$TCA["tx_tntmitarbeiter_videos"] = array(
	"ctrl"			 => array( 
			"hideTable"		=>	1,
			'sortby'		=> 'sorting',
			'crdate'		=> 'crdate',
			'delete' 		=> 'deleted',
			'tstamp'					 => 'tstamp',
			'crdate'					 => 'crdate',
			'cruser_id'					 => 'cruser_id',
			'languageField'				 => 'sys_language_uid',
			'transOrigPointerField'			=> 'l18n_parent',
			'transOrigDiffSourceField'		=> 'l18n_diffsource',
			'default_sortby'				=> 'ORDER BY sorting',
			'sortby'					 => 'sorting',
			'enablecolumns' => array (
				'disabled' 	=> 'hidden'
			),
			
	),
	"interface"		 => array(
		"showRecordFieldList" => "title,link"
	),
	'feInterface'	 => array(
		'fe_admin_fieldList' => 'sys_language_uid, l18n_parent, l18n_diffsource, title,hidden',
	),
	"columns"		 => array(
		'sys_language_uid'	 => array(
			'exclude'	 => 1,
			'label'		 => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config'	 => array(
				'type'					 => 'select',
				'foreign_table'			 => 'sys_language',
				'foreign_table_where'		 => 'ORDER BY sys_language.title',
				'items'					 => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				)
			)
		),
		'l18n_parent'		 => array(
			'displayCond'	 => 'FIELD:sys_language_uid:>:0',
			'exclude'		 => 1,
			'label'			 => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config'		 => array(
				'type'					 => 'select',
				'items'					 => array(
					array('', 0),
				),
			)
		),
		'l18n_diffsource'	 => array(
			'config' => array(
				'type' => 'passthrough'
			)
		),
		"title"	 => Array(
			"exclude"	 => 1,
			"label"	 => "LLL:EXT:tnt_mitarbeiter/Resources/Private/Language/locallang_db.xml:tx_tntmitarbeiter_videos.title",
			"config"	 => Array(
			"type"	 => "input",
			"size"		 => "30",
			"eval"		 => "required",
			)
		),
		"link"	 => Array(
			"exclude"	 => 0,
			"label"	 => "LLL:EXT:tnt_mitarbeiter/Resources/Private/Language/locallang_db.xml:tx_tntmitarbeiter_videos.url",
			"config"	 => Array(
			"type"	 => "input",
			"size"		 => "100",
			"eval"		 => "required",
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
		
	),
	"types"	 => array(
		"0" => array("showitem" => "sys_language_uid;;;;1-1-1, l18n_parent, l18n_diffsource,hidden;;1, title,link")
	),
	"palettes"	 => array(
		"1" => array("showitem" => "")
	)
);

$TCA["tx_tntmitarbeiter_links"] = array(
	"ctrl"			 => array( 
		"hideTable"		=>	1,
		'sortby'		=> 'sorting',
		'crdate'		=> 'crdate',
		'delete' 		=> 'deleted',
		'tstamp'					 => 'tstamp',
		'crdate'					 => 'crdate',
		'cruser_id'					 => 'cruser_id',
		'languageField'				 => 'sys_language_uid',
		'transOrigPointerField'			=> 'l18n_parent',
		'transOrigDiffSourceField'		=> 'l18n_diffsource',
		'default_sortby'				=> 'ORDER BY sorting',
		'sortby'					 => 'sorting',
		'enablecolumns' => array (
			'disabled' 	=> 'hidden'
		),
	),
	"interface"		 => array(
		"showRecordFieldList" => "title,link,target"
	),
	'feInterface'	 => array(
		'fe_admin_fieldList' => 'sys_language_uid, l18n_parent, l18n_diffsource, title,hidden',
	),	
	"columns"		 => array(
		'sys_language_uid'	 => array(
			'exclude'	 => 1,
			'label'		 => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config'	 => array(
				'type'					 => 'select',
				'foreign_table'			 => 'sys_language',
				'foreign_table_where'		 => 'ORDER BY sys_language.title',
				'items'					 => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			)
		),
		'l18n_parent'		 => array(
			'displayCond'	 => 'FIELD:sys_language_uid:>:0',
			'exclude'		 => 1,
			'label'			 => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config'		 => array(
				'type'					 => 'select',
				'items'					 => array(
					array('', 0),
				),
			)
		),
		'l18n_diffsource'	 => array(
			'config' => array(
				'type' => 'passthrough'
			)
		),
		"title"	 => Array(
			"exclude"	 => 1,
			"label"	 => "LLL:EXT:tnt_mitarbeiter/Resources/Private/Language/locallang_db.xml:tx_tntmitarbeiter_videos.title",
			"config"	 => Array(
			"type"	 => "input",
			"size"		 => "30",
			"eval"		 => "required",
			)
		),
		"link"	 => Array(
			"exclude"	 => 1,
			"label"	 => "LLL:EXT:tnt_mitarbeiter/Resources/Private/Language/locallang_db.xml:tx_tntmitarbeiter_videos.url",
			"config"	 => Array(
				"type"	 => "input",
				"size"		 => "3000",
				"eval"		 => "required",
			)
		),
		"target"	 => Array(
			"exclude"	 => 0,
			"label"	 => "Target",
			"config"	 => Array(
				"type"	 => "input",
				"size"		 => "30"
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
	),
	"types"	 => array(
		"0" => array("showitem" => "sys_language_uid;;;;1-1-1, l18n_parent, l18n_diffsource,hidden;;1,title,link,target")
	),
	"palettes"	 => array(
		"1" => array("showitem" => "")
	)
);

$TCA["tx_tntmitarbeiter_departments"] = array(
	"ctrl"			 => $TCA["tx_tntmitarbeiter_departments"]["ctrl"],
	"interface"		 => array(
		"showRecordFieldList" => "sys_language_uid,l18n_parent,l18n_diffsource,title,teammembers,hidden"
	),
	"feInterface"	 => $TCA["tx_tntmitarbeiter_departments"]["feInterface"],
	"columns"		 => array(
		'sys_language_uid'	 => array(
			'exclude'	 => 1,
			'label'		 => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config'	 => array(
				'type'					 => 'select',
				'foreign_table'			 => 'sys_language',
				'foreign_table_where'		 => 'ORDER BY sys_language.title',
				'items'					 => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				)
			)
		),
		'l18n_parent'		 => array(
			'displayCond'	 => 'FIELD:sys_language_uid:>:0',
			'exclude'		 => 1,
			'label'			 => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config'		 => array(
				'type'					 => 'select',
				'items'					 => array(
					array('', 0),
				),
				'foreign_table'			 => 'tx_tntmitarbeiter_departments',
				'foreign_table_where'	 => 'AND tx_tntmitarbeiter_departments.pid=###CURRENT_PID### AND tx_tntmitarbeiter_departments.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource'	 => array(
			'config' => array(
				'type' => 'passthrough'
			)
		),
		"title"	 => Array(
			"exclude"	 => 1,
			"label"	 => "LLL:EXT:tnt_mitarbeiter/Resources/Private/Language/locallang_db.xml:tx_tntmitarbeiter_departments.title",
			"config"	 => Array(
			"type"	 => "input",
			"size"		 => "30",
			"eval"		 => "required",
			)
		),
		'teammembers' => array(
			'l10n_mode' => 'exclude',
			'exclude' => 1,
			'label' => 'Team Members',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_tntmitarbeiter_persons',
				'foreign_table_where' => 'AND tx_tntmitarbeiter_persons.l18n_parent = 0 ORDER BY tx_tntmitarbeiter_persons.last_name',
				'size' => 4,
				'minitems' => 0,
				'maxitems' => 9999,
				'MM' => 'tx_tntmitarbeiter_departments_mm',
				'MM_foreign_select' => 1,
				'MM_opposite_field' => 'uid_local',
				'wizards' => array(
					'_PADDING' => 2,
					'_VERTICAL' => 1,
					'list' => array(
						'type' => 'script',
						'title' => 'List',
						'icon' => 'list.gif',
						'params' => array(
							'table' => 'tx_tntmitarbeiter_persons',
							'pid' => '###CURRENT_PID###',
						),
						'script' => 'wizard_list.php',
					)
				)
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
	),
	"types"	 => array(
		"0" => array("showitem" => "sys_language_uid;;;;1-1-1, l18n_parent, l18n_diffsource,hidden;;1, title,teammembers")
	),
	"palettes"	 => array(
		"1" => array("showitem" => "")
	)
);

$TCA["tx_tntmitarbeiter_persons"] = array(
	"ctrl"			 => $TCA["tx_tntmitarbeiter_persons"]["ctrl"],
	"interface"		 => array(
		"showRecordFieldList" => "sys_language_uid,l18n_parent,l18n_diffsource,search_atr,title,first_name,last_name,email,phone,function,title_text,cv,membership,documents,links,movie,image_sw,image_colour,teasertext,position,department,hidden, starttime, endtime"
	),
	"feInterface"	 => $TCA["tx_tntmitarbeiter_persons"]["feInterface"],
	"columns"		 => array(
		'sys_language_uid'	 => array(
			'exclude'	 => 1,
			'label'		 => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config'	 => array(
				'type'					 => 'select',
				'foreign_table'			 => 'sys_language',
				'foreign_table_where'		 => 'ORDER BY sys_language.title',
				'items'					 => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				)
			)
		),
		'l18n_parent'		 => array(
			'displayCond'	 => 'FIELD:sys_language_uid:>:0',
			'exclude'		 => 1,
			'label'			 => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config'		 => array(
				'type'					 => 'select',
				'items'					 => array(
					array('', 0),
				),
				'foreign_table'			 => 'tx_tntmitarbeiter_persons',
				'foreign_table_where'	 => 'AND tx_tntmitarbeiter_persons.pid=###CURRENT_PID### AND tx_tntmitarbeiter_persons.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource'	 => array(
			'config' => array(
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
		"search_atr"	 => Array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:tnt_mitarbeiter/Resources/Private/Language/locallang_db.xml:exclude_search',
			'config'  => array (
				'type'    => 'check',
				'default' => '0'
			)
		),
		"title"	 => Array(
			"exclude"	 => 1,
			"label"	 => "LLL:EXT:tnt_mitarbeiter/Resources/Private/Language/locallang_db.xml:title",
			"config"	 => Array(
			"type"	 => "input",
			"size"		 => "30"
			)
		),
		"first_name"	 => Array(
			"exclude"	 => 1,
			"label"	 => "LLL:EXT:tnt_mitarbeiter/Resources/Private/Language/locallang_db.xml:first_name",
			"config"	 => Array(
			"type"	 => "input",
			"size"		 => "30",
			"eval"		 => "required",
			)
		),
		'last_name' => array(
			'l10n_mode' => $l10n_mode_merge,
			'exclude' => 1,		
			'label' => "LLL:EXT:tnt_mitarbeiter/Resources/Private/Language/locallang_db.xml:last_name",
			'config' => array(
				'type' => 'input',	
				'size' => '30',	
				'eval' => 'required'
			)
		),
		'gender' => array(
			'l10n_mode' => $l10n_mode_merge,
			'exclude' => 1,		
			'label' => 'LLL:EXT:tnt_mitarbeiter/Resources/Private/Language/locallang_db.xml:gender',		
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:tnt_mitarbeiter/locallang_db.php:gender.notSet', 0),
					array('LLL:EXT:tnt_mitarbeiter/locallang_db.php:gender.male', 1),
					array('LLL:EXT:tnt_mitarbeiter/locallang_db.php:gender.female', 2)
				)
			)
		),
		'email' => array(
			'l10n_mode' => $l10n_mode_merge,
			'exclude' => 1,		
			'label' => 'LLL:EXT:tnt_mitarbeiter/Resources/Private/Language/locallang_db.xml:email',		
			'config' => array(
				'type' => 'input',	
				'size' => '30'
			)
		),
		'phone' => array(
			'l10n_mode' => $l10n_mode_merge,
			'exclude' => 1,		
			'label' => 'LLL:EXT:tnt_mitarbeiter/Resources/Private/Language/locallang_db.xml:phone',		
			'config' => array(
				'type' => 'input',	
				'size' => '30'
			)
		),
		'function' => array(
			'l10n_mode' => $l10n_mode_merge,
			'exclude' => 1,		
			'label' => 'LLL:EXT:tnt_mitarbeiter/Resources/Private/Language/locallang_db.xml:function',		
			'config' => array(
				'type' => 'input',	
				'size' => '30'
			)
		),
		"title_text" => Array (
			"exclude" => 1,
			"label" => "Title Text Data",
			"config" => Array (
				'type' => 'inline',
				'foreign_table' => 'tx_tntmitarbeiter_titletext_data',
				'foreign_field' => 'uid_local',
				'foreign_sortby' => 'sorting',
				'foreign_label' => 'title',
				'maxitems' => 10,
				'appearance' => Array(
				  'collapseAll' => 1,
				  'expandSingle' => 1,
				),
			)
		),
		"cv" => Array (
			"exclude" => 1,
			"label" => "CV Data",
			"config" => Array (
				'type' => 'inline',
				'foreign_table' => 'tx_tntmitarbeiter_cv_data',
				'foreign_field' => 'uid_local',
				'foreign_sortby' => 'sorting',
				'foreign_label' => 'title',
				'maxitems' => 100,
				'appearance' => Array(
				  'collapseAll' => 1,
				  'expandSingle' => 1,
				),
			)
		),
		"membership" => Array (
			"exclude" => 1,
			"label" => "Membership Details",
			"config" => Array (
				'type' => 'inline',
				'foreign_table' => 'tx_tntmitarbeiter_membership_data',
				'foreign_field' => 'uid_local',
				'foreign_sortby' => 'sorting',
				'foreign_label' => 'title',
				'maxitems' => 99,
				'appearance' => Array(
				  'collapseAll' => 1,
				  'expandSingle' => 1,
				),
			)
		),
		'documents' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:tnt_mitarbeiter/Resources/Private/Language/locallang_db.xml:documentvault',
			'config' =>
			\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('documents',
					array(
							'appearance' => array(
									'createNewRelationLinkTitle' => 'Add Documents',
									'collapseAll' => TRUE,
							),
							"minitems" => 0,
							"maxitems" => 10000,
					), $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'])
		),
		"links" => Array (
			"exclude" => 1,
			"label" => "LLL:EXT:tnt_mitarbeiter/Resources/Private/Language/locallang_db.xml:links",
			"config" => Array (
				'type' => 'inline',
				'foreign_table' => 'tx_tntmitarbeiter_links',
				'foreign_field' => 'uid_local',
				'foreign_sortby' => 'sorting',
				'foreign_label' => 'title',
				'maxitems' => 999,
				'appearance' => Array(
				  'collapseAll' => 1,
				  'expandSingle' => 1,
				),
			)
		),
		"movie" => Array (
			"exclude" => 1,
			"label" => "LLL:EXT:tnt_mitarbeiter/Resources/Private/Language/locallang_db.xml:movies",
			"config" => Array (
				'type' => 'inline',
				'foreign_table' => 'tx_tntmitarbeiter_videos',
				'foreign_field' => 'uid_local',
				'foreign_sortby' => 'sorting',
				'foreign_label' => 'title',
				'maxitems' => 999,
				'appearance' => Array(
				  'collapseAll' => 1,
				  'expandSingle' => 1,
				),
			)
		),
		'image_sw' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:tnt_mitarbeiter/Resources/Private/Language/locallang_db.xml:imagesw',
			'config' =>
			\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('image_sw',
					array(
							'appearance' => array(
									'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference',
									'collapseAll' => TRUE,
							),
							"minitems" => 0,
							"maxitems" => 1,
					), $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'])
		),
		'image_colour' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:tnt_mitarbeiter/Resources/Private/Language/locallang_db.xml:imagecl',
			'config' =>\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('image_colour',
					array(
							'appearance' => array(
									'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference', 
									'collapseAll' => TRUE,
							),
							"minitems" => 0,
							"maxitems" => 1,
					), $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'])
		),
		"teasertext" => Array (
			"exclude" => 1,
			"label" => "LLL:EXT:tnt_mitarbeiter/Resources/Private/Language/locallang_db.xml:teasertext",
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
		'position' => array(
			'exclude' => 1,		
			'label' => 'LLL:EXT:tnt_mitarbeiter/Resources/Private/Language/locallang_db.xml:position',		
			"config" => Array (
                "type" => "select",
                "foreign_table" => "tx_tntmitarbeiter_position",
                "foreign_table_where" => " AND tx_tntmitarbeiter_position.hidden=0 AND tx_tntmitarbeiter_position.pid AND tx_tntmitarbeiter_position.pid=###STORAGE_PID### AND tx_tntmitarbeiter_position.sys_language_uid=CAST('###REC_FIELD_sys_language_uid###' AS UNSIGNED) ORDER BY tx_tntmitarbeiter_position.uid",
                "size" => 10,
                "minitems" => 0,
                "maxitems" => 100,
               // "MM" => "tx_tntmitarbeiter_position_mm",
                "wizards" => Array(
                    "_PADDING" => 2,
                    "_VERTICAL" => 1,
                    "add" => Array(
                        "type" => "script",
                        "title" => "Create new record",
                        "icon" => "add.gif",
                        "params" => Array(
                            "table"=>"tx_tntmitarbeiter_position",
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
                            "table"=>"tx_tntmitarbeiter_position",
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
		'department' => array(
			'l10n_mode' => 'exclude',
			'exclude' => 1,		
			'label' => 'LLL:EXT:tnt_mitarbeiter/Resources/Private/Language/locallang_db.php:department',		
			'config' => array(
				'type' => 'select',	
				'foreign_table' => 'tx_tntmitarbeiter_departments',	
				'foreign_table_where' => 'AND tx_tntmitarbeiter_departments.hidden=0 AND tx_tntmitarbeiter_departments.l18n_parent = 0 ORDER BY tx_tntmitarbeiter_departments.uid',	
				'size' => 4,	
				'minitems' => 0,
				'maxitems' => 99,	
				'MM' => 'tx_tntmitarbeiter_departments_mm',	
				'wizards' => array(
					'_PADDING' => 2,
					'_VERTICAL' => 1,
					'list' => array(
						'type' => 'script',
						'title' => 'List',
						'icon' => 'list.gif',
						'params' => array(
							'table'=>'tx_tntmitarbeiter_departments',
							'pid' => '###CURRENT_PID###',
						),
						'script' => 'wizard_list.php'
					)
				)
			)
		),
		 
	),
	
	"types"	 => array(
		"0" => array("showitem" => "sys_language_uid;;;;1-1-1, l18n_parent, l18n_diffsource,hidden;;1,search_atr, title,first_name,last_name,email,phone,function,title_text,cv,membership;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts],documents,links,movie,image_sw,image_colour,teasertext;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts],position,department")
	),
	"palettes"	 => array(
		"1" => array("showitem" => "")
	)
);

