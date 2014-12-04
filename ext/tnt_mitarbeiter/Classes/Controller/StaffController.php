<?php

namespace TYPO3\TntMitarbeiter\Controller;

/* * *************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 HOJA M A <hoja@tnt-graphics.ch>
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
 * StaffController
 */
class StaffController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
    
    protected $detectMobile;
    
    public function __construct() {
        $this->detectMobile  =   new \TYPO3\TntBabygallery\Domain\Model\MobileDetect();
        $this->Model         =   new\TYPO3\TntMitarbeiter\Domain\Model\Staff();
        $this->arrConf       =   unserialize($GLOBALS["TYPO3_CONF_VARS"]["EXT"]["extConf"]['tnt_babygallery']);
    }

    /** 	
     * staffRepository
     * 
     * @var \TYPO3\TntMitarbeiter\Domain\Repository\StaffRepository
     * @inject
     */

    protected $staffRepository = NULL;

    /**
     * action home
     * 
     * @return void
     */

    public function homeAction() {
        $this->local_cObj       =   $this->configurationManager->getContentObject();
        $settings['resFolder']  =   ($this->local_cObj->data['pages'] > 0) ? $this->local_cObj->data['pages'] : NULL;
        $data['positions']      =   $this->Model->getPositions($settings['resFolder']);
        $data['departments']    =   $this->Model->getDepartments($settings['resFolder']);
        $data['url']            =   $this->generateUrl(NULL, NULL);
        $flexform               =   $this->settings;
        $actionpage             =   (!empty($this->settings['listpage'])) ? $this->settings['listpage'] : FALSE;
        $this->view->assign('flexform', $flexform);
        $this->view->assign('data', $data);
        $this->includeJsFile("typo3conf/ext/tnt_mitarbeiter/Resources/Public/js/extScript.js");
    }

    /**
     * action list
     * 
     * @return void
     */

    public function listAction() {
        $args                   =   $this->request->getArguments();
        $this->local_cObj       =   $this->configurationManager->getContentObject();
        $settings['resFolder']  =   ($this->local_cObj->data['pages'] > 0) ? $this->local_cObj->data['pages'] : NULL;
        $settings['pageCount']  =   ($this->settings['listcount']) ? $this->settings['listcount'] : 9;
        
        $isTablet               =   $this->detectMobile->isTablet() ? 1 : 0;
        $isMobile               =   $this->detectMobile->isMobile() ? ($this->detectMobile->isTablet() ? 0 : 1) : 0;
        
        $settings['sortby']     =   ($this->settings['sortby']) ? $this->settings['sortby'] : 'ASC';
        $settings['sortorder']  =   ($this->settings['sortorder']) ? $this->settings['sortorder'] : 'first_name';
        $page_no                =   ($args['pageid']) ? $args['pageid'] : 1;
        $count                  =   ($this->settings['listcount']) ? $this->settings['listcount'] : 9;
        if($isTablet && !$isMobile){
            $reminder = 0;
            if($settings['pageCount'] % 3 != 0){
                $reminder = $settings['pageCount'] % 3;
            }
            $count  =   ($settings['pageCount'] % 3 == 0) ? $settings['pageCount'] : $settings['pageCount']-$reminder;
            $settings['pageCount'] = $count;
        }
        $settings['limit']      =   ($page_no <= 1) ? '0,' . $count : (($page_no - 1) * $count . ',' . $count);
        $data['positions']      =   $this->Model->getPositions($settings['resFolder']);
        $data['departments']    =   $this->Model->getDepartments($settings['resFolder']);
        
		if ($args['action'] == 'list' || $args['listSearch'] == 1) {
            if (is_array($args['position'])) {
				$settings ['position']  =   implode(',', $args['position']);
            } 
            else {
                $settings ['position']  =   NULL;
            }
			
			if (is_array($args['department'])) {
                $settings ['department'] =  implode(',', $args['department']);
            } 
            else {
                $settings ['department'] =  NULL;
            }
			
			$settings ['searchkey']      =   $args['searchkey'];
            $settings ['searchkey']      =   ($settings ['searchkey'] == "Name / Vorname") ? FALSE : $settings ['searchkey'];
        } 
        else {
            $settings ['position']       =  FALSE;
            $settings ['department']     =  FALSE;
            $settings ['searchkey']      =  FALSE;
        }
		
		if( $args['listSearch'] == 1 && is_array($args['department'] )){
			if( $args['department'][0] == NULL ){
				 $settings ['department'] = FALSE;
			}
		}
		else if( $args['department'] == NULL || $args['depall'] == 1){
			$settings ['department'] = FALSE;
		}
		
		if( $args['listSearch'] == 1 && is_array($args['position'] )){
			if( $args['position'][0] == NULL ){
				 $settings ['position'] = FALSE;
			}
		}
		else if( $args['position'] == NULL || $args['posall'] == 1){
			 $settings ['position'] = FALSE;
		}
		
		$data['homesearchPos']    =   $settings ['position'];
		$data['homesearchDep']    =   $settings ['department'];
		
        if(isset( $args['searchbtn'] )){
			$GLOBALS['TSFE']->fe_user->setKey('ses', 'searchDetails', $settings );
		}
		else{
			$sessionArray = $GLOBALS['TSFE']->fe_user->getKey('ses', 'searchDetails');
			if(!empty( $sessionArray )){
				$settings           =   $GLOBALS['TSFE']->fe_user->getKey('ses', 'searchDetails');
				$args               =   $settings;
				$settings['limit']  =   ($page_no <= 1) ? '0,' . $count : (($page_no - 1) * $count . ',' . $count);
			}
		}
        $getSearch  =   $this->Model->searchStaffs($settings);
        
        if (is_array($getSearch)) {
            $data['result']             =   $this->orderData($getSearch);
            $getSearch['total_results'] =   $this->Model->getTotalResults($settings);
        }
        if (isset($args['listSearch'])) {
            $data ['position']  =   implode('', $args['position']);
            $data['department'] =   implode('', $args['department']);
        }
        /* Pagination Codes */
        $data ['searchkey']         =   $args['searchkey'];
        $data['current_page']       =   $page_no;
        $showLimit                  =   $getSearch['total_results'] / $settings['pageCount'];
        $prevPage                   =   ($page_no > 1) ? ($page_no - 1) : 1;
        $data['previous_page_link'] =   $this->generateUrl(NULL, '&tx_tntmitarbeiter_tntmitarbeiter[action]=list&tx_tntmitarbeiter_tntmitarbeiter[controller]=Staff&tx_tntmitarbeiter_tntmitarbeiter[pageid]=' . $prevPage);
        $data['first_page_link']    =   ($page_no == 1) ? '' : $this->generateUrl(NULL, '&tx_tntmitarbeiter_tntmitarbeiter[action]=list&tx_tntmitarbeiter_tntmitarbeiter[controller]=Staff&tx_tntmitarbeiter_tntmitarbeiter[pageid]=1');
        $data['next_page']          =   ($showLimit > $page_no) ? $page_no + 1 : $page_no;
        $data['next_page']          =   $this->generateUrl(NULL, '&tx_tntmitarbeiter_tntmitarbeiter[action]=list&tx_tntmitarbeiter_tntmitarbeiter[controller]=Staff&tx_tntmitarbeiter_tntmitarbeiter[pageid]=' . $data['next_page']);
        $data['last_page']          =   (ceil($showLimit) == 0 ) ? 1 : ceil($showLimit);
        $data['last_page_link']     =   $this->generateUrl(NULL, '&tx_tntmitarbeiter_tntmitarbeiter[action]=list&tx_tntmitarbeiter_tntmitarbeiter[controller]=Staff&tx_tntmitarbeiter_tntmitarbeiter[pageid]=' . $data['last_page']);
        $data['segment_start']      =   ($page_no == 1) ? "disabled disabledLink" : NULL;
        $data['segment_end']        =   ($data['last_page'] == $page_no) ? "disabled disabledLink" : NULL;
        $data['paginate_url']       =   $this->generateUrl(NULL, '&tx_tntmitarbeiter_tntmitarbeiter[action]=list&tx_tntmitarbeiter_tntmitarbeiter[controller]=Staff&tx_tntmitarbeiter_tntmitarbeiter[pageid]=');
        $data['hasData']            =   ceil($showLimit);
        //added by abin on 23-10-2014 to fix empty array error.
        if(!empty($data['result'])) {
            foreach ($data['result'] as $key => $value) {
                foreach ($value['images'] as $key2 => $value) {
                    if ($value['fieldname'] == 'image_sw') {
                        $data['result'][$key]['defaultImg'] = $value['profImg'];
                    }
                    if ($value['fieldname'] == 'image_colour') {
                        $data['result'][$key]['colourImg'] = $value['profImg'];
                    }
                }
            }
        }
        //added by abin on 23-10-2014 to fix empty array error.
        /*         * ***************** */
        $this->view->assign('data', $data);
        $this->includeJsFile("typo3conf/ext/tnt_mitarbeiter/Resources/Public/js/extScript.js");
    }

    /**
     * action team
     * 
     * @return void
     */
    public function teamAction() {
        $args                   =   $this->request->getArguments();
        $this->local_cObj       =   $this->configurationManager->getContentObject();
        $settings ['depart']    =   (!empty($this->settings['department'])) ? $this->settings['department'] : FALSE;
        $settings['resFolder']  =   ($this->local_cObj->data['pages'] > 0) ? $this->local_cObj->data['pages'] : NULL;
        $settings['sortby']     =   ($this->settings['sortby']) ? $this->settings['sortby'] : 'ASC';
        $settings['sortorder']  =   ($this->settings['sortorder']) ? $this->settings['sortorder'] : 'first_name';
        $getSearch              =   $this->Model->getTeam($settings);
        
        if (is_array($getSearch)) {
            $data['result']             =   $this->orderData($getSearch);
            $getSearch['total_results'] =   $this->Model->getTotalResults($settings);
        }
        if (isset($args['listSearch'])) {
            $data ['position']          =   implode('', $args['position']);
            $data['department']         =   implode('', $args['department']);
        }
        
        $data['hasData']        =   ceil($getSearch['total_results']);
        
        if(!empty($data['result'])) {
            foreach ($data['result'] as $key => $value) {
                foreach ($value['images'] as $key2 => $value) {
                    if ($value['fieldname'] == 'image_sw') {
                        $data['result'][$key]['defaultImg'] = $value['profImg'];
                    }
                    if ($value['fieldname'] == 'image_colour') {
                        $data['result'][$key]['colourImg'] = $value['profImg'];
                    }
                }
            }
        }
		
		$this->view->assign('data', $data);
        $this->includeJsFile("typo3conf/ext/tnt_mitarbeiter/Resources/Public/js/extScript.js");
    }

    /**
     * action detail
     * 
     * @return void
     */

    public function detailAction() {
        $args               =   $this->request->getArguments();
        
        if ($args['id']     !=  NULL) {
            $data['result'] =   $this->Model->getStaffDetails($args['id']);
        } 
        else {
            $this->view->assign('data', $data);
        }
        
        if (is_array($data['result']['documents'])) {
            foreach ($data['result']['documents'] as $key => $value) {
                $data['result']['documents'][$key]['size']  =   $this->formatBytes($value['size']);
            }
        }
        
        $this->view->assign('data', $data);
        $this->includeJsFile("typo3conf/ext/tnt_mitarbeiter/Resources/Public/js/extScript.js");
    }

    /**
     * action widget
     * 
     * @return void
     */

    public function widgetAction() {
        $args                   =   $this->request->getArguments();
        $this->local_cObj       =   $this->configurationManager->getContentObject();
        $settings['resFolder']  =   ($this->local_cObj->data['pages'] > 0) ? $this->local_cObj->data['pages'] : NULL;
        $settings['pageCount']  =   ($this->settings['countval']) ? $this->settings['countval'] : 9;
        $settings['sortby']     =   ($this->settings['sortby']) ? $this->settings['sortby'] : 'ASC';
        $settings['sortorder']  =   ($this->settings['sortorder']) ? $this->settings['sortorder'] : 'first_name';
        $actionpage             =   (!empty($this->settings['listpage'])) ? $this->settings['listpage'] : FALSE;
        $parameter              =   "&tx_tntmitarbeiter_tntmitarbeiter[action]=list&tx_tntmitarbeiter_tntmitarbeiter[controller]=Staff";
        if ($actionpage) {
            $data['actionLink'] =   $this->generateUrl($actionpage, $parameter);
        } else {
            echo "You have'nt configured list page in TYPO3 Backend";
        }
        $data['positions']      =   $this->Model->getPositions($settings['resFolder']);
        $data['departments']    =   $this->Model->getDepartments($settings['resFolder']);
        $data['url']            =   $this->generateUrl(NULL, NULL);
        $data['pageOptions']    =   $this->local_cObj->data['header'];
        $flexform               =   $this->settings;
        $this->view->assign('data', $data);
        $this->view->assign('flexform', $flexform);
    }

    /**
     * action  employeewidget
     * 
     * @return void
     */
    public function employeewidgetAction() {
        $emp_id                 =   $this->settings['widgetemployee'];
        $this->local_cObj       =   $this->configurationManager->getContentObject();
        $data['empDetails']     =   $this->Model->getempDetails($emp_id);
        $detailPage             =   ($this->settings['detailspage']) ? $this->generateUrl($this->settings['detailspage'], '&tx_tntmitarbeiter_tntmitarbeiter[id]=' . $data['empDetails']['uid']) : $this->generateUrl(NULL, '&tx_tntmitarbeiter_tntmitarbeiter[action]=detail&tx_tntmitarbeiter_tntmitarbeiter[id]=' . $data['empDetails']['uid']);
        $data['employee_page']  =   $detailPage['baseurl'];
        $data['pageOptions']    =   $this->local_cObj->data['header'];
        $this->view->assign('data', $data);
    }

    public function orderData($getSearch) {
        foreach ($getSearch as $key => $value) {
            $detailPage                     =   ($this->settings['detailspage']) ? $this->generateUrl($this->settings['detailspage'], '&tx_tntmitarbeiter_tntmitarbeiter[id]=' . $value['emp_id']) : $this->generateUrl(NULL, '&tx_tntmitarbeiter_tntmitarbeiter[action]=detail&tx_tntmitarbeiter_tntmitarbeiter[id]=' . $value['emp_id']);
            $getSearch[$key]['detailPage']  =   $detailPage['baseurl'];
        }
        return $getSearch;
    }

    /* --------------------Custom Utility Functions Starts Here------------------------------------ */
    //===================================
    //= 1. URL Parameters General Function =
    //===================================
    public function generateUrl($pid, $status) {
        $pId                =   ($pid != NULL) ? $pid : $GLOBALS['TSFE']->id;
        $addtionalParam     =   (!empty($status)) ? $status : FALSE;
        $conf               =   array('parameter' => $pId, // Link to current page
                                    'additionalParams' => $addtionalParam, // Set additional parameters
                                    'forceAbsoluteUrl' => true,
                                    'useCacheHash' => true, // We must add cHash because we use parameters
                                    'returnLast' => 'url', // We want link only
                                );
        $this->local_cObj   =   $this->configurationManager->getContentObject();
        $baseUrl            =   $this->local_cObj->typoLink('', $conf);
        $data['baseurl']    =   $baseUrl;
        $data['pid']        =   $pId;
        return $data;
    }

    //==== 2. Include Js File Formatting ========
    public function includeJsFile($jsFile) {
        $GLOBALS['TSFE']->getPageRenderer()->addJsFooterFile($jsFile, 'text/javascript', TRUE, FALSE, '', TRUE); 
    }

    //==== 3. Include css File Formatting =======
    public function includeCssFile($cssFile) {
        $GLOBALS['TSFE']->getPageRenderer()->addCssFile ( $cssFile, $rel = 'stylesheet', $media = 'all', $title = '',  $compress = TRUE, $forceOnTop = FALSE, $allWrap = '', $excludeFromConcatenation = FALSE, $splitChar = '|' );
    }

    //==== 4. Label Localisation ========
    public function localise($id) {
        return \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate($id, 'TntMitarbeiter');
    }

    function formatBytes($bytes, $precision = 2) {
        $units  =   array('B', 'KB', 'MB', 'GB', 'TB');
        $bytes  =   max($bytes, 0);
        $pow    =   floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow    =   min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);
        // $bytes /= (1 << (10 * $pow)); 
        return round($bytes, $precision) . ' ' . $units[$pow];
    }

}
