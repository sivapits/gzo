<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}
$TCA["tx_tntbabygallery_babies"] = array (
	"ctrl" => $TCA["tx_tntbabygallery_babies"]["ctrl"],
	"interface" => array (
		"showRecordFieldList" => "hidden,starttime,endtime,fe_group,lastname,firstname,sex,birthdate,weight,height,imagepath,facebooklike,googleplus,twitter"
	),
	"feInterface" => $TCA["tx_tntbabygallery_babies"]["feInterface"],
	"columns" => array (
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
		'fe_group' => array (		
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.fe_group',
			'config'  => array (
				'type'  => 'select',
				'items' => array (
					array('', 0),
					array('LLL:EXT:lang/locallang_general.xml:LGL.hide_at_login', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.any_login', -2),
					array('LLL:EXT:lang/locallang_general.xml:LGL.usergroups', '--div--')
				),
				'foreign_table' => 'fe_groups'
			)
		),
		"lastname" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:tnt_babygallery/Resources/Private/Language/locallang_db.xml:tx_tntbabygallery_babies.lastname",		
			"config" => Array (
				"type" => "input",	
				"size" => "30",	
				"max" => "50",	
				"eval" => "required,trim",
			)
		),
		"firstname" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:tnt_babygallery/Resources/Private/Language/locallang_db.xml:tx_tntbabygallery_babies.firstname",		
			"config" => Array (
				"type" => "input",	
				"size" => "30",	
				"max" => "50",	
				"eval" => "required,trim",
			)
		),
		"sex" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:tnt_babygallery/Resources/Private/Language/locallang_db.xml:tx_tntbabygallery_babies.sex",		
			"config" => Array (
				"type" => "radio",
				"items" => Array (
					Array("LLL:EXT:tnt_babygallery/Resources/Private/Language/locallang_db.xml:tx_tntbabygallery_babies.sex.I.0", "0"),
					Array("LLL:EXT:tnt_babygallery/Resources/Private/Language/locallang_db.xml:tx_tntbabygallery_babies.sex.I.1", "1"),
				),
			)
		),
		"birthdate" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:tnt_babygallery/Resources/Private/Language/locallang_db.xml:tx_tntbabygallery_babies.birthdate",		
			"config" => Array (
				"type"     => "input",
				"size"     => "12",
				"max"      => "20",
				"eval"     => "datetime",
				"checkbox" => "0",
				"default"  => "0"
			)
		),
		"weight" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:tnt_babygallery/Resources/Private/Language/locallang_db.xml:tx_tntbabygallery_babies.weight",		
			"config" => Array (
				"type"     => "input",
				"size"     => "4",
				"max"      => "4",
				"eval"     => "int",
				"checkbox" => "0",
				"range"    => Array (
					"upper" => "6000",
					"lower" => "10"
				),
				"default" => 0
			)
		),
		"height" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:tnt_babygallery/Resources/Private/Language/locallang_db.xml:tx_tntbabygallery_babies.height",		
			"config" => Array (
				"type"     => "input",
				"size"     => "4",
				"max"      => "4",
				"eval"     => "int",
				"checkbox" => "0",
				"range"    => Array (
					"upper" => "1000",
					"lower" => "10"
				),
				"default" => 0
			)
		),
		"imagepath" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:tnt_babygallery/Resources/Private/Language/locallang_db.xml:tx_tntbabygallery_babies.imagepath",		
			"config" => Array (
				"type" => "group",
				"internal_type" => "file",
				"allowed" => "gif,png,jpeg,jpg",	
				"max_size" => 1000,	
				"uploadfolder" => "fileadmin/data/tnt_babygallery/images",
				"show_thumbs" => 1,	
				"size" => 1,	
				"minitems" => 0,
				"maxitems" => 1,
			)
		),
        "facebooklike" => Array (        
            "exclude" => 0,        
            "label" => "LLL:EXT:tnt_babygallery/Resources/Private/Language/locallang_db.xml:tx_tntbabygallery_babies.facebooklike",        
            "config" => Array (
                "type" => "check",
            )
        ),
		 "googleplus" => Array (        
            "exclude" => 0,
            "label" => "LLL:EXT:tnt_babygallery/Resources/Private/Language/locallang_db.xml:googleplus",        
            "config" => Array (
                "type" => "check",
            )
        ),
		"twitter" => Array (        
            "exclude" => 0,        
            "label" => "LLL:EXT:tnt_babygallery/Resources/Private/Language/locallang_db.xml:twitter",        
            "config" => Array (
                "type" => "check",
            )
        ),
	),
	"types" => array (
		"0" => array("showitem" => "hidden;;1;;1-1-1, lastname, firstname, sex, birthdate, weight, height, imagepath, facebooklike,googleplus,twitter")
	),
	"palettes" => array (
		"1" => array("showitem" => "starttime, endtime, fe_group")
	)
);

