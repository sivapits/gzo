<?php

//namesapace

namespace TYPO3\TntTeaserManager\Controller;

use TYPO3\TntTeaserManager\Domain\Model;

/* * *************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Abin Sabu <abin.s@tnt-graphics.com>, TNT-Graphics
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 * ************************************************************* */

/**
 * TntTeaserMangerController
 */
class TntTeaserMangerController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

    protected $teaserModel;

    public function __construct() {
        $this->teaserModel = new \TYPO3\TntTeaserManager\Domain\Model\TntTeaserManger();
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction() {
        $settings = $this->settings;
        $startPid = $settings['feed']['recordPid'];
        $pi = $this->objectManager->create('TYPO3\CMS\Frontend\Plugin\AbstractPlugin');
        $pi->cObj = $this->configurationManager->getContentObject();
        $pidList = $pi->pi_getPidList($startPid, 10);

        //get all the content elementId in a page
        $contentElementData = $this->teaserModel->doGetAllContentElemets($pidList);
        //process all the contentelemnt objects
        $processedData = $this->processContentElements($contentElementData);


        foreach ($processedData as $key => $value) {
            if (!empty($value)) {
                foreach ($value as $_key => $_value) {

                    if (!empty($_value)) {
                        $_skey = substr(trim($_key), -1);
                    }
                    $finalCE[$_skey][]['contents'] = $this->processContentElement($_value);
                }
            }
        }

        /* if ($_SERVER['REMOTE_ADDR'] == '202.88.237.233') {


          print_r($finalCE);
          } */
        if (!empty($finalCE)) {
            ksort($finalCE);
        }

        $this->view->assign('tntTeaserMangerCE', $finalCE);
    }

    /**
     * action show
     *
     * @param \TYPO3\TntTeaserManager\Domain\Model\TntTeaserManger $tntTeaserManger
     * @return void
     */
    public function showAction(\TYPO3\TntTeaserManager\Domain\Model\TntTeaserManger $tntTeaserManger) {
        $this->view->assign('tntTeaserManger', $tntTeaserManger);
    }

    /**
     * initializes the flexform main prepartaion;-)
     */
    public function processContentElements($contentData) {
        $foundCE = '';
        foreach ($contentData as $key => $value) {

            $foundCEGroup[] = $this->processFlexForm($value);
        }
        return $foundCEGroup;
    }

    /**
     * initializes the flexform and all config options ;-)
     */
    public function processFlexForm($flexform) {
	//print_r($_GET);
        $isNewsType = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('tx_news_pi1');
        $isJobType = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('tx_tntjobs_tntjobs');
        $isDisesaseType = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('tx_tntdiseases_tntdiseases');
        $isCoworkerType = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('tx_tntmitarbeiter_tntmitarbeiter');
        //print_r($isCoworkerType['id']);
        $teaserSelected = $GLOBALS['TSFE']->id;
        $teaserType = 'field_page';
        if (!empty($isNewsType['news'])) {
            $teaserSelected = $isNewsType['news'];
            $teaserType = 'field_news';
        }
        if (!empty($isJobType['id'])) {
            $teaserSelected = $isJobType['id'];
            $teaserType = 'field_jobs';
        }
        if (!empty($isDisesaseType['diseaseSelection'])) {
            $teaserSelected = $isDisesaseType['diseaseSelection'];
            $teaserType = 'field_diseases';
        }
        if (!empty($isCoworkerType['id'])) {
            $teaserSelected = $isCoworkerType['id'];
            $teaserType = 'field_coworker';
        }
        $xml2arry = \TYPO3\CMS\Core\Utility\GeneralUtility::xml2array($flexform['tx_templavoila_flex']);
        $fieldArry = array('field_coworker', 'field_diseases', 'field_jobs', 'field_news', 'field_page');
        foreach ($xml2arry as $key => $value) {
            foreach ($value as $pin => $data) {
                foreach ($data as $top => $down) {
                    foreach ($down as $_top => $_down) {
                        $_skey = substr(trim($_top), 0, -1);
                        if($_skey == $teaserType ){
                        if ($_top != 'field_content') {
                            if (in_array($_skey, $fieldArry)) {
                                if (in_array($teaserSelected, explode(',', $_down['vDEF']))) {
                                    $foundCE[$_top] = $flexform['uid'];
                                }
                                $formatValuesInner[$_top] = $_down['vDEF'];
                            }
                        }  
                        }

                    }
                }
                $formatValues[$pin] = $formatValuesInner;
            }
        }
       // print_r($foundCE);
        return $foundCE;
    }

    /**
     * initializes the the content object prepartaion ;-)
     */
    public function processContentElement($contentIds) {
        $this->cObj = $this->configurationManager->getContentObject();
        $tt_content_conf = array('tables' => 'tt_content', 'source' => $contentIds, 'dontCheckPid' => 1);
        $contentData = $this->cObj->RECORDS($tt_content_conf);
        return $contentData;
    }

    /**
     * action tab
     *
     * @return void
     */
    public function tabsAction() {
        $settings = $this->settings;
        $pi = $this->objectManager->create('TYPO3\CMS\Frontend\Plugin\AbstractPlugin');
        $pi->cObj = $this->configurationManager->getContentObject();
        $headerText = $pi->cObj->parentRecord['data']['header'];
        $processedData = $this->processTabData($pi->cObj);
        $tabTitleRecord = explode('|', $headerText);
        $teaserType = (count($tabTitleRecord) >= 1) ? 1 : 0;
        $teaserType = (empty($headerText)) ? 0 : $teaserType;
        $multiType = (count($tabTitleRecord) > 1) ? 1 : 0;
        $this->view->assign('multiTab', $multiType);
        $this->view->assign('teaserType', $teaserType);
        $this->view->assign('tntTeaserMangerCE', $processedData);
    }

    /**
     * initializes the flexform and all config options ;-)
     */
    public function processTabData($processedData) {
        $headerLabel = $processedData->parentRecord['data']['header'];
        $processedData = $processedData->data;
        $tabTitleRecord = explode('|', $headerLabel);
        $tabContentData = explode(',', $processedData['field_content']);
        /* foreach ($tabTitleRecord as $key => $value) {
          $tabData[$key]['tab_title'] = $value;
          $tabData[$key]['isTwitter'] = ($value == 'tweet') ? 1 : 0;
          $tabData[$key]['tab_content'] = $this->processContentElement($tabContentData[$key]);
          $tabData[$key]['tab_contentId'] = $tabContentData[$key];
          } */
        // print_r($tabTitleRecord);
        //echo "</br>";
        foreach ($tabContentData as $key => $value) {
            $tabContent = $this->processContentElement($value);
            if (!empty($tabContent)) {

                if (count($tabTitleRecord) > 1) {
                    $tabData[$key]['tab_content'] = $tabContent;
                    $tabData[$key]['tab_title'] = $tabTitleRecord[$key];
                    $tabData[$key]['isTwitter'] = ($tabTitleRecord[$key] == 'tweet') ? 1 : 0;
                    $tabData[$key]['tab_contentId'] = $value;
                }else{
                    $tabData[0]['tab_content'] = $tabContent;
                    $tabData[0]['tab_title'] = $headerLabel;
                    $tabData[0]['isTwitter'] = ($tabTitleRecord[0] == 'tweet') ? 1 : 0;
                    $tabData[0]['tab_contentId'] = $value;
                    
                }
            }
        }
       /* if ($_SERVER['REMOTE_ADDR'] == '202.191.66.205') {
            echo "<pre>";
            var_dump($tabTitleRecord);
            echo $value;
            echo "</pre>";
        }*/
        return $tabData;
    }

}
