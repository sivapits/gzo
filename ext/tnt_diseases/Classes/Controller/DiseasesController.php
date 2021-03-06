<?php

namespace TYPO3\TntDiseases\Controller;

use TYPO3\TntDiseases\Domain\Model;

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
 * DiseasesController
 */
class DiseasesController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

    protected $diseaseModel;
    protected $baseUrl;
    protected $detectMobile;

    public function __construct() {
        $this->diseaseModel = new \TYPO3\TntDiseases\Domain\Model\Diseases();
        $this->detectMobile = new \TYPO3\TntDiseases\Domain\Model\MobileDetect();
        $this->baseUrl = "typo3conf/ext/tnt_diseases/Resources/Public/";
        $GLOBALS['TSFE']->getPageRenderer()->addJsFooterFile($this->baseUrl . 'Js/CustomMain.js', 'text/javascript', TRUE, FALSE, '', TRUE);
    }

    /**
     * action diseaseDropList called from the ajax
     *
     * @return void
     */
    public function diseaseDropListAction() {
        $arguments = $this->request->getArguments();
        $this->cObj = $this->configurationManager->getContentObject();
        $pi = $this->objectManager->create('TYPO3\CMS\Frontend\Plugin\AbstractPlugin');
        $pi->cObj = $this->configurationManager->getContentObject();
        $pidList = $pi->pi_getPidList(437, 10);
        // $arguments['recordPid'] = $this->cObj->data['pages'];
        $arguments['recordPid'] = $pidList;
        //$pidList
        $flexSettings = $this->settings;
        $enableFields['disease'] = $this->cObj->enableFields('tx_tntdiseases_domain_model_diseases');
        $diseases = $this->diseaseModel->doGetDiseases($arguments, $flexSettings, $enableFields['disease']);
        $this->view->setTemplatePathAndFilename('typo3conf/ext/tnt_diseases/Resources/Private/Templates/Diseases/DiseaseDropList.html');
        foreach ($diseases as $key => $value) {
            $conf = array(
                'parameter' => $flexSettings['detail_page'],
                'additionalParams' => '&L=0&tx_tntdiseases_tntdiseases[diseaseSelection]=' . $value['uid'],
                'useCashHash' => true,
                'returnLast' => 'url'
            );
            $diseaseName = $this->cObj->typoLink('', $conf);
            $diseases[$key]['diseaseName'] = $diseaseName;
        }
        $this->view->assign('diseases', $diseases);
        echo $this->view->render();
        exit();
    }

    /**
     * doPrepareGridItems
     * 
     * 
     */
    public function doPrepareGridItems($diseases, $colMode) {

        $isMobile = $this->detectMobile->isMobile() ? ($this->detectMobile->isTablet() ? 0 : 1) : 0;
        if ($isMobile) {
            $counter = 0;
            $finalArr = array();
            $divider = ceil(count($diseases) / $colMode);
            foreach ($diseases as $key => $value) {

                if ($key % $divider == 0 && $key != 0) {
                    $counter++;
                }
                $finalArr[$counter][$key] = $value;
            }
        } else {
            $splitDisease = array_chunk($diseases, $colMode, false);
            foreach ($splitDisease as $key => $value) {
                foreach ($value as $pin => $data) {
                    if ($pin == 0) {
                        $row0[$key] = $data;
                    }
                    if ($pin == 1) {
                        $row1[$key] = $data;
                    }
                    if ($pin == 2) {
                        $row2[$key] = $data;
                    }
                }
            }
            $finalArr[0] = $row0;
            $finalArr[1] = $row1;
            if ($colMode == 3) {
                $finalArr[2] = $row2;
            }
        }
        return $finalArr;
    }

    /**
     * action multiView
     *
     * @param \TYPO3\TntDiseases\Domain\Model\Diseases $diseases
     * @return void
     */
    public function multiViewAction() {
        $this->cObj = $this->configurationManager->getContentObject();
        $pi = $this->objectManager->create('TYPO3\CMS\Frontend\Plugin\AbstractPlugin');
        $pi->cObj = $this->configurationManager->getContentObject();
        $pidList = $pi->pi_getPidList($this->cObj->data['pages'], 10);
        $arguments = $this->request->getArguments();
        $flexSettings = $this->settings;
        $diseaseId = $arguments['diseaseSelection'];
        $arguments['recordPid'] = $pidList;
        $enableFields['disease'] = $this->cObj->enableFields('tx_tntdiseases_domain_model_diseases');
        $diseases = $this->diseaseModel->doGetDiseases($arguments, $flexSettings, $enableFields['disease']);
        if ($arguments['type'] == 'grid') {
            $diseases = $this->doPrepareGridItems($diseases, 3);
            $this->view->setTemplatePathAndFilename('typo3conf/ext/tnt_diseases/Resources/Private/Partials/Diseases/Grid.html');
        } elseif ($arguments['type'] == 'list') {
            $this->view->assign('diseasesList', $diseases);
            $this->view->setTemplatePathAndFilename('typo3conf/ext/tnt_diseases/Resources/Private/Partials/Diseases/List.html');
        }
        $enableFields['disease'] = $this->cObj->enableFields('tx_tntdiseases_domain_model_diseases');
        $this->view->assign('diseases', $diseases);
        $pageOptions['pageLang'] = $GLOBALS['TSFE']->sys_language_uid;
        $pageOptions['detailPage'] = $flexSettings['detail_page'];
        $pageOptions['action'] = 'detail';
        $pageOptions['controller'] = 'Diseases';
        $this->view->assign('pageOptions', $pageOptions);
        echo $this->view->render();
        exit();
    }

    /**
     * action mainWidget
     *
     * @return void
     */
    public function mainWidgetAction() {
        $GLOBALS['TSFE']->getPageRenderer()->addJsFooterFile($this->baseUrl . 'Js/humanbuilder.js', 'text/javascript', TRUE, FALSE, '', TRUE);
        $this->cObj = $this->configurationManager->getContentObject();
        $pi = $this->objectManager->create('TYPO3\CMS\Frontend\Plugin\AbstractPlugin');
        $pi->cObj = $this->configurationManager->getContentObject();
        $pidList = $pi->pi_getPidList($this->cObj->data['pages'], 10);
        $arguments = $this->request->getArguments();
        $arguments['recordPid'] = $pidList;
        $flexSettings = $this->settings;
        $enableFields['region'] = $this->cObj->enableFields('tx_tntdiseases_domain_model_region');
        $pageOptions['regionOptions'] = $this->diseaseModel->doGetRegionOptions($enableFields['region']);
        $pageOptions['headerLabel'] = $this->cObj->data['header'];
        $pageOptions['headerText'] = $flexSettings['headerText'];
        if (!empty($flexSettings['headerImages'])) {
            $pageOptions['headerImage'] = $this->diseaseModel->doGetHeaderImage($flexSettings['headerImages']);
        }
        $pageOptions['pageId'] = $flexSettings['detail_page'];
        $pageOptions['listPage'] = $flexSettings['list_page'];
        $pageOptions['pageOption'] = $flexSettings['pageOption'];
        $pageOptions['categoryOption'] = $flexSettings['categoryOption'];
        $pageOptions['genderOptions'] = json_encode(array('male' => \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_tntdiseases_domain_model_diseases_male', 'tnt_diseases'),
            'female' => \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_tntdiseases_domain_model_diseases_female', 'tnt_diseases')));
        $conf = array(
            'parameter' => $flexSettings['detail_page'],
            'additionalParams' => '',
            'useCashHash' => false,
            'returnLast' => 'url'
        );
        $pageOptions['detailAction'] = $this->cObj->typoLink('', $conf);
        $conf = array(
            'parameter' => $flexSettings['list_page'],
            'additionalParams' => '',
            'useCashHash' => false,
            'returnLast' => 'url'
        );
        $pageOptions['listAction'] = $this->cObj->typoLink('', $conf);
        $enableFields['disease'] = $this->cObj->enableFields('tx_tntdiseases_domain_model_diseases');
        $jsonDisease = $this->diseaseModel->doGetDiseases($arguments, $flexSettings, $enableFields['disease']);
        if (!empty($jsonDisease)) {
            $pageOptions['jsonData'] = $this->prepareJsonData($jsonDisease);
        }
        $this->view->assign('pageOptions', $pageOptions);
        $this->view->assign('diseases', $diseases);
    }

    /**
     * action gridList
     *
     * @return void
     */
    public function gridListAction() {

        $this->cObj = $this->configurationManager->getContentObject();
        $pi = $this->objectManager->create('TYPO3\CMS\Frontend\Plugin\AbstractPlugin');
        $pi->cObj = $this->configurationManager->getContentObject();
        $pidList = $pi->pi_getPidList($this->cObj->data['pages'], 10);
        $arguments = $this->request->getArguments();
        $flexSettings = $this->settings;
        $diseaseId = $arguments['diseaseSelection'];
        if (!empty($arguments['genderOption'])) {
            if ($arguments['genderOption'] == 'default') {
                $arguments['genderOption'] = 0;
            }
            if (!is_numeric($arguments['genderOption'])) {
                $arguments['genderOption'] = ($arguments['genderOption'] == 'male') ? 1 : 2;
            }
        }
        if (!empty($arguments['regionOption'])) {
            if (!is_numeric($arguments['regionOption'])) {
                $arguments['regionOption'] = '';
            }
        }
        $pageOptions['pageId'] = $GLOBALS['TSFE']->id;
        $pageOptions['genderOptions'] = array(1 => \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_tntdiseases_domain_model_diseases_male', 'tnt_diseases'),
            2 => \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_tntdiseases_domain_model_diseases_female', 'tnt_diseases'));
        $this->cObj = $this->configurationManager->getContentObject();
        $arguments['recordPid'] = $pidList;
        $pageOptions['headerLabel'] = $this->cObj->data['header'];
        $enableFields['region'] = $this->cObj->enableFields('tx_tntdiseases_domain_model_region');
        $enableFields['disease'] = $this->cObj->enableFields('tx_tntdiseases_domain_model_diseases');
        $pageOptions['regionOptions'] = $this->diseaseModel->doGetRegionOptions($enableFields['region']);
        $diseases = $this->diseaseModel->doGetDiseases($arguments, $flexSettings, $enableFields['disease']);
        $pageOptions['pageLang'] = $GLOBALS['TSFE']->sys_language_uid;
        $pageOptions['pageGender'] = $arguments['genderOption'];
        $pageOptions['pageRegion'] = $arguments['regionOption'];
        $pageOptions['pageOption'] = $arguments['pageOption'];
        $pageOptions['categoryOption'] = $arguments['categoryOption'];
        $pageOptions['detailPage'] = (!empty($flexSettings['detail_page'])) ? $flexSettings['detail_page'] : $GLOBALS['TSFE']->id;
	$pageOptions['detailPage'] = $flexSettings['detail_page'];
        $pageOptions['action'] = 'detail';
        $pageOptions['controller'] = 'Diseases';
        $colMode = 3;
        $pageOptions['isFilterEnabled'] = $flexSettings['isFilterEnabled'];
        if ($flexSettings['isFilterEnabled'] == 1) {
           $pageOptions['detailPage'] = (!empty($flexSettings['detail_page'])) ? $flexSettings['detail_page'] : $GLOBALS['TSFE']->id;
            $colMode = 2;
            $this->view->setTemplatePathAndFilename('typo3conf/ext/tnt_diseases/Resources/Private/Templates/Diseases/InnerGrid.html');
        }
        $diseasesSort = $this->doPrepareGridItems($diseases, $colMode);
        if ($flexSettings['isFilterEnabled'] == 1 && !empty($diseaseId)) {
            $pageOptions['pageId'] = $GLOBALS['TSFE']->id;
            $this->view->setTemplatePathAndFilename('typo3conf/ext/tnt_diseases/Resources/Private/Templates/Diseases/Detail.html');
            $diseases = $this->diseaseModel->doGetSingleDisease($diseaseId);
            $this->view->assign('pageOptions', $pageOptions);
            $this->view->assign('diseases', $diseases);
            $this->view->assign('diseasesList', $diseases);
        } else {
            $this->view->assign('diseases', $diseasesSort);
            $this->view->assign('diseasesList', $diseases);
            $this->view->assign('pageOptions', $pageOptions);
        }
	$this->view->assign('diseasesCount', !empty($diseases) ? count($diseases) : 0 );
    }

    /**
     * action detail
     *
     * @return void
     */
    public function mainDetailAction() {
        $this->cObj = $this->configurationManager->getContentObject();
        $arguments = $this->request->getArguments();
        $flexSettings = $this->settings;
        $diseaseId = $arguments['diseaseSelection'];
        if (empty($diseaseId) || !is_numeric($diseaseId)) {
            $conf = array(
                'parameter' => $flexSettings['list_page'],
                'additionalParams' => '',
                'useCashHash' => false,
                'returnLast' => 'url'
            );
            $this->redirectToURI($this->cObj->typoLink('', $conf));
        }
        $pageOptions['pageId'] = $GLOBALS['TSFE']->id;
        $pageOptions['genderOptions'] = array(1 => \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_tntdiseases_domain_model_diseases_male', 'tnt_diseases'),
            2 => \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_tntdiseases_domain_model_diseases_female', 'tnt_diseases'));
        $this->view->setTemplatePathAndFilename('typo3conf/ext/tnt_diseases/Resources/Private/Templates/Diseases/Detail.html');
        $diseases = $this->diseaseModel->doGetSingleDisease($diseaseId);
        $this->view->assign('pageOptions', $pageOptions);
        $this->view->assign('diseases', $diseases);
    }

    public function prepareJsonData($jsonDisease) {
        $data = array();
        $counter = 0;
        $enableFields['region'] = $this->cObj->enableFields('tx_tntdiseases_domain_model_region');
        $regionOptions = $this->diseaseModel->doGetRegionOptions($enableFields['region']);

        $setCounter = 1;
        foreach ($regionOptions as $key => $value) {
            $newKey = $value['uid'];
            $newArr[$newKey] = $value['region_title'];
            $subArr[$value['uid']] = (string) $setCounter;
            $setCounter++;
        }

        /* $male =  \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_tntdiseases_domain_model_diseases_male', 'tnt_diseases');
          $female =  \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_tntdiseases_domain_model_diseases_female', 'tnt_diseases'); */
        $male = 'male';
        $female = 'female';
        foreach ($jsonDisease as $key => $value) {
            $regionOption = array();
            $regionOption = explode(',', $value['region']);
            $diseaseUrl = $this->doGetDiseaseUrl($value['uid']);
            switch ($value['gender']) {
                case 1:
                    foreach ($regionOption as $pin => $_data) {

                        $data[$male]['id'] = 1;
                        $data[$male]['bodypart'][$_data]['id'] = $_data;
                        $data[$male]['bodypart'][$_data]['title'] = $newArr[$_data];
                        $data[$male]['bodypart'][$_data]['disease'][$counter]['id'] = $value['uid'] . "|" . $diseaseUrl;
                        $data[$male]['bodypart'][$_data]['disease'][$counter]['title'] = (!empty($value['title_dropdown']))? $value['title_dropdown']:$value['title'];
                    }
                    break;
                case 2:
                    foreach ($regionOption as $pin => $_data) {
                        $data[$female]['id'] = 2;
                        $data[$female]['bodypart'][$_data]['id'] = $_data;
                        $data[$female]['bodypart'][$_data]['title'] = $newArr[$_data];
                        $data[$female]['bodypart'][$_data]['disease'][$counter]['id'] = $value['uid'] . "|" . $diseaseUrl;
                        $data[$female]['bodypart'][$_data]['disease'][$counter]['title'] = (!empty($value['title_dropdown']))? $value['title_dropdown']:$value['title'];
                    }
                    break;
                case 3:
                    foreach ($regionOption as $pin => $_data) {
                        $data[$male]['id'] = 1;
                        $data[$male]['bodypart'][$_data]['id'] = $_data;
                        $data[$male]['bodypart'][$_data]['title'] = $newArr[$_data];
                        $data[$male]['bodypart'][$_data]['disease'][$counter]['id'] = $value['uid'] . "|" . $diseaseUrl;
                        $data[$male]['bodypart'][$_data]['disease'][$counter]['title'] = (!empty($value['title_dropdown']))? $value['title_dropdown']:$value['title'];
                        $data[$female]['id'] = 2;
                        $data[$female]['bodypart'][$_data]['id'] = $_data;
                        $data[$female]['bodypart'][$_data]['title'] = $newArr[$_data];
                        $data[$female]['bodypart'][$_data]['disease'][$counter]['id'] = $value['uid'] . "|" . $diseaseUrl;
                        $data[$female]['bodypart'][$_data]['disease'][$counter]['title'] = (!empty($value['title_dropdown']))? $value['title_dropdown']:$value['title'];
                    }
                    break;
            }
            $counter ++;
        }

        $dummyVal = array(1 => '1', 5 => '2', 3 => '3', 2 => '4', 6 => '5', 4 => '6');

        foreach ($data[$male]['bodypart'] as $key => $value) {
            $nextKey = strval($subArr[$key]);
            $value['id'] = $dummyVal[$nextKey];
            $sortedArrMale[$nextKey] = $value;
        }
        //ksort($sortedArrMale);
        $data[$male]['bodypart'] = $sortedArrMale;
        foreach ($data[$female]['bodypart'] as $key => $value) {
            $nextKey = strval($subArr[$key]);
            $value['id'] = $dummyVal[$nextKey];
            $sortedArrFemale[$nextKey] = $value;
        }
         //ksort($sortedArrFemale);
        $data[$female]['bodypart'] = $sortedArrFemale;
        return json_encode($data);
    }

    public function doGetDiseaseUrl($uid) {
        $flexSettings = $this->settings;
        $this->cObj = $this->configurationManager->getContentObject();
        $conf = array(
            'parameter' => $flexSettings['detail_page'],
            'additionalParams' => '&L=0&tx_tntdiseases_tntdiseases[diseaseSelection]=' . $uid,
            'useCashHash' => true,
            'returnLast' => 'url'
        );
        $diseaseName = $this->cObj->typoLink('', $conf);
        return $diseaseName;
    }


}
