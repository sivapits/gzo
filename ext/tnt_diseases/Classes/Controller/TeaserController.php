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
 * TeaserController
 */
class TeaserController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

    protected $diseaseModel;

    public function __construct() {
        $this->diseaseModel = new \TYPO3\TntDiseases\Domain\Model\Diseases();
        $base_url = "typo3conf/ext/tnt_diseases/Resources/Public/";
        $GLOBALS['TSFE']->getPageRenderer()->addJsFooterFile($base_url . 'Js/CustomMain.js', 'text/javascript', TRUE, FALSE, '', TRUE);
    }
    /**
     * action gridList
     *
     * @return void
     */
    public function teaserWidgetAction() {
        $this->cObj = $this->configurationManager->getContentObject();
        $arguments = $this->request->getArguments();
        $arguments['recordPid'] = $this->cObj->data['pages'];
        $flexSettings = $this->settings;
        $enableFields['region'] = $this->cObj->enableFields('tx_tntdiseases_domain_model_region');
        $pageOptions['regionOptions'] = $this->diseaseModel->doGetRegionOptions($enableFields['region']);
        $pageOptions['headerLabel'] = $this->cObj->data['header'];
        $pageOptions['headerText'] = $flexSettings['headerText'];
        if (!empty($flexSettings['headerImages'])) {
            $pageOptions['headerImage'] = $this->diseaseModel->doGetHeaderImage($flexSettings['headerImages']);
        }
        $pageOptions['pageId'] = $flexSettings['detail_page'];
        $pageOptions['pageOption'] = $flexSettings['pageOption'];
        $pageOptions['categoryOption'] = $flexSettings['categoryOption'];
        $pageOptions['genderOptions'] = array(1 => \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_tntdiseases_domain_model_diseases_male', 'tnt_diseases'),
            2 => \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_tntdiseases_domain_model_diseases_female', 'tnt_diseases'));
        
        $conf = array(
            'parameter' => $flexSettings['builderPage'],
            'additionalParams' => '',
            'useCashHash' => false,
            'returnLast' => 'url'
        );
        $pageOptions['builderPage'] = $this->cObj->typoLink('', $conf);
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
        $enableFields['disease'] = $this->cObj->enableFields('tx_tntdiseases_domain_model_diseases');
        $pageOptions['listAction'] = $this->cObj->typoLink('', $conf);
        $this->view->setTemplatePathAndFilename('typo3conf/ext/tnt_diseases/Resources/Private/Templates/Teaser/TeaserWidget.html');
        $this->view->assign('pageOptions', $pageOptions);
        $this->view->assign('diseases', $diseases);
    }
}
