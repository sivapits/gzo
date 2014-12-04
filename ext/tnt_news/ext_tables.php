<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'TNT news');

$tempColsArray = array(
        'tx_tntnews_morelink' => array(      
            'exclude' => 0,      
            'label' => 'Teaser More text',      
            'config' => array(
                'type' => 'input',  
                'size' => '30',
            )
        ),
       
);

t3lib_extMgm::addTCAcolumns( 'tx_news_domain_model_news', $tempColsArray, 1 );
t3lib_extMgm::addToAllTCAtypes( 'tx_news_domain_model_news', 'tx_tntnews_morelink','','after:import_source');
?>