<?php

namespace TYPO3\TntDownloadModule\Controller;

use TYPO3\TntDownloadModule\Domain\Model;

/* * *************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Abin Sabu <abin.s@pitsolutions.com>, PITSolutions Pvt Ltd
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
 *
 *
 * @package tnt_download_module
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class DownloadModuleController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

    protected $downloadModel;

    public function __construct() {
        $this->downloadModel = new \TYPO3\TntDownloadModule\Domain\Model\DownloadModule();
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction() {
        $base_url = "typo3conf/ext/tnt_download_module/Resources/Public/";
        $this->cObj = $this->configurationManager->getContentObject();
        $flexSettings = $this->settings;
        //print_r($this->cObj);
        $pages['headerLabel'] = $this->cObj->data['header'];
        $pages['headerText'] = $flexSettings['headerText'];
        $pages['randNumber'] = $this->cObj->data['uid'];
        //print_r($flexSettings);
        //$recordPid = $this->cObj->data['pages'];
        $request = $this->request->getArguments();
        if ($flexSettings['view_type'] == 'widget') {
            $GLOBALS['TSFE']->getPageRenderer()->addJsFooterFile($base_url . 'Js/mainWidet.js', 'text/javascript', TRUE, FALSE, '', TRUE);
            $this->view->setTemplatePathAndFilename('typo3conf/ext/tnt_download_module/Resources/Private/Templates/DownloadModule/ListWidget.html');
            $conf = array(
                'parameter' => $flexSettings['main_page'],
                'additionalParams' => '',
                'useCashHash' => false,
                'returnLast' => 'url'
            );
            $pages['formAction'] = $this->cObj->typoLink('', $conf);
            $pages['action'] = 'permalink';
            $pages['controller'] = 'DownloadModule';
        } else {
            $GLOBALS['TSFE']->getPageRenderer()->addJsFooterFile($base_url . 'Js/main.js', 'text/javascript', TRUE, FALSE, '', TRUE);
        }
        $enableFields = $this->cObj->enableFields('tx_tntdownloadmodule_domain_model_parentcategory');
        $parent = 0;
        $downloadCategories = $this->downloadModel->doGetCategory($enableFields, $parent);
        $enableFieldsModule = $this->cObj->enableFields('tx_tntdownloadmodule_domain_model_downloadmodule');
        $request['cat_id'] = '';
        $request['subcat_id'] = '';
        $documents = $this->downloadModel->doGetDetails($enableFieldsModule, $request, $flexSettings);
        $pages['id'] = $flexSettings['main_page'];
        $pages['lang'] = $GLOBALS['TSFE']->sys_language_uid;
        $pages['jqueryEnable'] = $flexSettings['isJqueyEnabled'];
        $this->view->assign('pages', $pages);
        $this->view->assign('downloadModule', $documents);
        $this->view->assign('categories', $downloadCategories);
    }

    /**
     * action show
     *
     * @param \TYPO3\TntDownloadModule\Domain\Model\DownloadModule $downloadModule
     * @return void
     */
    public function showAction() {
        $flexSettings = $this->settings;
        $request = $this->request->getArguments();
        $this->cObj = $this->configurationManager->getContentObject();
        $enableFieldsModule = $this->cObj->enableFields('tx_tntdownloadmodule_domain_model_downloadmodule');
        $enableFieldsCategory = $this->cObj->enableFields('tx_tntdownloadmodule_domain_model_parentcategory');
        $pages['randNumber'] = $request['randNumber'];

        if ($request['type'] == 1) {
            if ($request['cat_id'] != 0) {
                $subCategories = $this->downloadModel->doGetCategory($enableFieldsCategory, $request['cat_id']);
                $this->view->setTemplatePathAndFilename('typo3conf/ext/tnt_download_module/Resources/Private/Templates/DownloadModule/SubCat.html');

                if ($request['viewType'] == 'widget') {
                    $this->view->setTemplatePathAndFilename('typo3conf/ext/tnt_download_module/Resources/Private/Templates/DownloadModule/SubCatWidget.html');
                }
                $this->view->assign('pages', $pages);
                $this->view->assign('subCategories', $subCategories);
                echo $this->view->render();
                exit();
            }
        } elseif ($request['type'] == 2) {
            $downloadCategories = $this->downloadModel->doGetDetails($enableFieldsModule, $request, $flexSettings);
            $cObjData = $this->configurationManager->getContentObject();
            $conf = array(
                'parameter' => $GLOBALS['TSFE']->id,
                'additionalParams' => '&L=' . $GLOBALS['TSFE']->sys_language_uid . '&tx_tntdownloadmodule_tntdownloadmodule[currentPage]=' . $request['currentPage'] . '&tx_tntdownloadmodule_tntdownloadmodule[action]=permalink&tx_tntdownloadmodule_tntdownloadmodule[controller]=DownloadModule&tx_tntdownloadmodule_tntdownloadmodule[cat_id]=' . $request['cat_id'] . '&tx_tntdownloadmodule_tntdownloadmodule[subcat_id]=' . $request['subcat_id'] . '&tx_tntdownloadmodule_tntdownloadmodule[filterText]=' . $request['filterText'],
                'useCashHash' => TRUE,
                'returnLast' => 'url'
            );
            $targetpage = $cObjData->typoLink('', $conf);
            $this->view->assign('permaLink', $targetpage);
            $this->view->assign('dataCount', count($downloadCategories['data']));
            $this->view->assign('downloadModule', $downloadCategories);
            $this->view->setTemplatePathAndFilename('typo3conf/ext/tnt_download_module/Resources/Private/Templates/DownloadModule/Documents.html');
            if ($request['viewType'] == 'widget') {
                $pages['randNumber'] = $request['randId'];
                $this->view->setTemplatePathAndFilename('typo3conf/ext/tnt_download_module/Resources/Private/Templates/DownloadModule/DocumentsWidget.html');
            }
            $this->view->assign('pages', $pages);
            #print_r($downloadCategories);
            echo $this->view->render();
            exit();
        } elseif ($request['type'] == 3) {
            $request = $this->request->getArguments();
        }
        exit();
    }

    public function fileAction() {
        $request = $this->request->getArguments();
        $path = $this->downloadModel->doGetFile($request);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($path));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($path));
        readfile($path);
        exit;
    }

    public function permalinkAction() {
        $base_url = "typo3conf/ext/tnt_download_module/Resources/Public/";
        $GLOBALS['TSFE']->getPageRenderer()->addJsFooterFile($base_url . 'Js/main.js', 'text/javascript', TRUE, FALSE, '', TRUE);
        $flexSettings = $this->settings;
        $request = $this->request->getArguments();
        $this->cObj = $this->configurationManager->getContentObject();
        //$recordPid = $this->cObj->data['pages'];
        $pages['headerLabel'] = $flexSettings['headerLabel'];
        $pages['headerText'] = $flexSettings['headerText'];
        $enableFieldsCategory = $this->cObj->enableFields('tx_tntdownloadmodule_domain_model_parentcategory');
        $enableFieldsModule = $this->cObj->enableFields('tx_tntdownloadmodule_domain_model_downloadmodule');
        $parent = 0;
        $downloadCategories = $this->downloadModel->doGetCategory($enableFieldsCategory, $parent);

        foreach ($downloadCategories as $key => $value) {
            $downloadCategories[$key]['selected'] = 0;
            if ($value['parentId'] == $request['cat_id']) {
                $downloadCategories[$key]['selected'] = 1;
            }
        }
        if (!empty($request['cat_id'])) {
            $subCategories = $this->downloadModel->doGetCategory($enableFieldsCategory, $request['cat_id']);
            foreach ($subCategories as $key => $value) {
                $subCategories[$key]['selected'] = 0;
                if ($value['parentId'] == $request['subcat_id']) {
                    $subCategories[$key]['selected'] = 1;
                }
            }
        }
        $downloadFiles = $this->downloadModel->doGetDetails($enableFieldsModule, $request, $flexSettings);
        $pages['lang'] = $GLOBALS['TSFE']->sys_language_uid;
        $this->view->assign('downloadModule', $downloadFiles);
        $this->view->assign('subCategories', $subCategories);
        $pages['id'] = $GLOBALS['TSFE']->id;
        $permaOptions['parent'] = $request['cat_id'];
        $permaOptions['child'] = $request['subcat_id'];
        $permaOptions['filterText'] = $request['filterText'];
        $permaOptions['currentPage'] = $request['currentPage'];
        $this->view->assign('permaOptions', $permaOptions);
        $this->view->assign('pages', $pages);
        $this->view->assign('categories', $downloadCategories);
    }

}

?>
