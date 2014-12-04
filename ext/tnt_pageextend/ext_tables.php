<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

$tempColsArray = array(
        'iconnav_title' => array(      
            'exclude' => 0,      
            'label' => 'LLL:EXT:tnt_pageextend/Resources/Private/Language/locallang_db.xml:tx_pageextend.icon_title',      
            'config' => array(
                'type' => 'input',  
                'size' => '30',
            )
        ),
        'iconnav_desc' => array(      
            'exclude' => 0,      
            'label' => 'LLL:EXT:tnt_pageextend/Resources/Private/Language/locallang_db.xml:tx_pageextend.icon_desc',      
            'config' => array(
                'type' => 'text',
                'cols' => 30,
                'rows' => 5
        	),
        	'defaultExtras' => 'richtext[]'
        ),
);

t3lib_extMgm::addTCAcolumns( "pages", $tempColsArray, 1 );
t3lib_extMgm::addToAllTCAtypes( "pages", "iconnav_title, iconnav_desc;;;;;1-1-1",'','after:media');
?>