<?php

namespace TYPO3\TntBabygallery\Controller;
use TYPO3\TntBabygallery\Domain\Model;

/* * *************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 HOJA.M.A <hoja@tnt-graphics.ch>
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
 * GalleryController
 */
class GalleryController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
	protected $detectMobile;
    
	public function __construct() {
		#Common Functions and Libraries Loaded Here
		$this->detectMobile = new \TYPO3\TntBabygallery\Domain\Model\MobileDetect();
		$this->Model	= new \TYPO3\TntBabygallery\Domain\Model\Gallery(); 								
		$this->arrConf	= unserialize($GLOBALS["TYPO3_CONF_VARS"]["EXT"]["extConf"]['tnt_babygallery']);
    }

    /**
     * galleryRepository
     * 
     * @var \TYPO3\TntBabygallery\Domain\Repository\GalleryRepository
     * @inject
     */
   
	protected   $galleryRepository      =  NULL;
    
	/**
     * action widgetview
     * 
     * @return void
	 */
	public  function widgetviewAction(){
		$this->local_cObj 		= $this->configurationManager->getContentObject();
		$settings['resFolder'] 	= ($this->local_cObj->data['pages'] > 0) ? $this->local_cObj->data['pages'] : NULL;
		$data['WidgetItem'] 	= $this->Model->getWidgetItems($settings);
		$gridPage		 		= 	$this->settings['listpage'];
		$data['GridUrl']		=	$this->generateUrl($gridPage, NULL);
		$data['url'] 			= $this->generateUrl(NULL, NULL);
		foreach ($data['WidgetItem'] as $key => $value) {
			$extraParam	= '&tx_tntbabygallery_tntbabygallery[uid]='.$value['uid'];
			$detailPage		=($this->settings['detailspage'])? $this->generateUrl($this->settings['detailspage'], $extraParam ):$this->generateUrl(FALSE, $extraParam );
			$data['WidgetItem'][$key]['uid'] = $detailPage['baseurl'];
			$data['WidgetItem'][$key]['tstamp'] = date('d.m.Y', $value['birthdate']);
			$data['WidgetItem'][$key]['time'] = date('H:i', $value['birthdate']);
			$data['WidgetItem'][$key]['classname'] = ($value['sex'] == 1)?"icon-female":"icon-male";
			if($value['imagepath'] != "")
				$data['WidgetItem'][$key]['imagepath'] = $this->arrConf['tnt_babygallery_imgpath'].'/'.$value['imagepath'];
			else
				$data['WidgetItem'][$key]['imagepath'] = "";
		}
		if( $_SERVER['REMOTE_ADDR'] == "202.88.237.233" ){
				// echo "<pre>";
				//print_r($data);
				}
		$data['pageOptions']	= $this->local_cObj->data['header'];
		$this->view->assign('data', $data);
	}	
    
	/**
     * action list
     * 
     * @return void
     */
    public function listAction() {
		$this->local_cObj = $this->configurationManager->getContentObject();
		$settings['resFolder'] = ($this->local_cObj->data['pages'] > 0) ? $this->local_cObj->data['pages'] : NULL;
		$settings['pageCount'] = ($this->settings['countval']) ? $this->settings['countval'] : 9;
		$settings['sortby'] = ($this->settings['sortby']) ? $this->settings['sortby'] : 'DESC';
		$settings['sortorder'] = ($this->settings['sortorder']) ? $this->settings['sortorder'] : 'Date';
		$data['NewBorn'] = $this->Model->getNewBorn($settings['resFolder']);
		$data['url'] = $this->generateUrl(NULL, NULL);
		$detailPage=($this->settings['detailspage'])? $this->generateUrl($this->settings['detailspage'], TRUE ):$data['url'];
		$data['Babydata'] = $this->Model->getGallery($settings);
		
		$extraParam	= '&tx_tntbabygallery_tntbabygallery[uid]='.$data['Babydata']['result'][0]['uid'];
		$data['detailpage']		=($this->settings['detailspage'])? $this->generateUrl($this->settings['detailspage'], $extraParam ):$this->generateUrl(FALSE, $extraParam );
		
		foreach ($data['NewBorn'] as $key => $value) {
			$data['NewBorn'][$key]['classname'] = ($value['sex'] == 1)?"w":"m";
		}
		$data['resultsCount'] 	= ceil($data['Babydata']['babyCount']/$settings['pageCount']);
		foreach ($data['Babydata']['result'] as $key => $value) {
			$extraParam	= '&tx_tntbabygallery_tntbabygallery[uid]='.$value['uid'];
			$detailPage		=($this->settings['detailspage'])? $this->generateUrl($this->settings['detailspage'], $extraParam ):$this->generateUrl(FALSE, $extraParam );
			$data['Babydata']['result'][$key]['uid'] = $detailPage['baseurl'];
			$data['Babydata']['result'][$key]['tstamp'] = date('d.m.Y', $value['birthdate']);
			$data['Babydata']['result'][$key]['time'] = date('H:i', $value['birthdate']);
			$data['Babydata']['result'][$key]['imagepath'] = $this->arrConf['tnt_babygallery_imgpath'].'/'.$value['imagepath'];
			$data['Babydata']['result'][$key]['classname'] = ($value['sex'] == 1)?"w":"m";
		}
		//echo '<pre>';print_r($data);
        $this->view->assign('data', $data);
		#Adding Common Resources in Page (CSS & JS Files)
		//$this ->commonResources();
		$GLOBALS['TSFE']->additionalFooterData[$this->extKey] .= $this->includeJsFile("typo3conf/ext/tnt_babygallery/Resources/Public/bootstrap-daterangepicker/bootstrap-datepicker.js");
		$GLOBALS['TSFE']->additionalFooterData[$this->extKey] .= $this->includeJsFile("typo3conf/ext/tnt_babygallery/Resources/Public/js/script_listview.js");
		$GLOBALS['TSFE']->additionalHeaderData[$this->extKey] .= $this->includeCssFile("typo3conf/ext/tnt_babygallery/Resources/Public/bootstrap-daterangepicker/daterangepicker-bs3.css");
		//$GLOBALS['TSFE']->additionalHeaderData[$this->extKey] .= $this->includeCssFile("typo3conf/ext/tnt_babygallery/Resources/Public/css/custom.css");
		$GLOBALS['TSFE']->additionalHeaderData[$this->extKey] .= $this->includeCssFile("typo3conf/ext/tnt_babygallery/Resources/Public/css/datepicker3.css");
		#DataTable JQuery Library Loaded Here
		$GLOBALS['TSFE']->additionalFooterData[$this->extKey] .= '<script src="//cdn.datatables.net/1.10.1/js/jquery.dataTables.min.js"></script>';
    }

    /**
     * action gridview
     * 
     * @return void
     */
    public function gridviewAction() {
		#CSV Importing Function Calls First
		$this->babyLoad();
		$this->local_cObj = $this->configurationManager->getContentObject();
		$settings['resFolder'] = ($this->local_cObj->data['pages'] > 0) ? $this->local_cObj->data['pages'] : NULL;
		$settings['pageCount'] = ($this->settings['countval']) ? $this->settings['countval'] : 9;
		
		$isMobile = $this->detectMobile->isMobile() ? ($this->detectMobile->isTablet() ? 0 : 1) : 0;
		if($isMobile){
			$settings['pageCount'] = ($settings['pageCount'] % 2 == 0) ? $settings['pageCount'] : $settings['pageCount']+1;
		}
		
		$settings['sortby'] = ($this->settings['sortby']) ? $this->settings['sortby'] : 'DESC';
		$settings['sortorder'] = ($this->settings['sortorder']) ? $this->settings['sortorder'] : 'Date';
		$data['NewBorn'] = $this->Model->getNewBorn($settings['resFolder']);
		foreach ($data['NewBorn'] as $key => $value) {
			$data['NewBorn'][$key]['classname'] = ($value['sex'] == 1)?"w":"m";
		}
		$data['url'] = $this->generateUrl(NULL, NULL);
		$arguments = $this->request->getArguments();
		$data['addClass'] = NULL;
		if(isset($arguments['detailSubmit'])){
			$settings['pageCount'] = ($this->settings['countval']) ? $this->settings['countval'] : 9;
			$settings['sortby'] = ($this->settings['sortby']) ? $this->settings['sortby'] : 'DESC';
			$settings['sortorder'] = ($this->settings['sortorder']) ? $this->settings['sortorder'] : 'Date';
			$settings['nameFilter'] = ($arguments['nameFilter'] != "") ? $arguments['nameFilter'] : NULL;
			$settings['nameFilter'] =  ($settings['nameFilter'] == "Vorname / Name")?NULL:$settings['nameFilter'];
			$settings['genderFilter'] = ($arguments['genderFilter'] == "0" || $arguments['genderFilter'] == "1") ? $arguments['genderFilter'] : NULL;
			$settings['dateFromFilter'] = ($arguments['dateFromFilter'] != "") ? strtotime($arguments['dateFromFilter']) : NULL;
			$settings['dateToFilter'] = ($arguments['dateToFilter'] != "") ? strtotime($arguments['dateToFilter']) : NULL;
			$settings['steepval'] = ($arguments['steepval'] > 1) ? $arguments['steepval'] : NULL;
			$data['Babydata'] = $this->Model->filterGallery($settings);
			$data['prefill'] = array(
				'name'		=>	$settings['nameFilter'],
				'gender'	=>	$settings['genderFilter'],
				'datefrom'	=>	$arguments['dateFromFilter'],
				'dateto'	=>	$arguments['dateToFilter']
			);
			$data['addClass'] = ($data['Babydata']['babyCount'] <= $settings['pageCount'])?'active':NULL;
		}
		else{
			$data['Babydata'] = $this->Model->getGallery($settings);
		}
		
		$extraParam	= '&tx_tntbabygallery_tntbabygallery[uid]='.$data['Babydata']['result'][0]['uid'];
		$data['detailpage']		=($this->settings['detailspage'])? $this->generateUrl($this->settings['detailspage'], $extraParam ):$this->generateUrl(FALSE, $extraParam );
		if($data['Babydata']['result'][0]['uid'] <=0)
		$data['detailpage']['baseurl']		= "javascript:void(0)";
		$data['resultsCount'] 	= ceil($data['Babydata']['babyCount']/$settings['pageCount']);
		foreach ($data['Babydata']['result'] as $key => $value) {
			$extraParam	= '&tx_tntbabygallery_tntbabygallery[uid]='.$value['uid'];
			$detailPage		=($this->settings['detailspage'])? $this->generateUrl($this->settings['detailspage'], $extraParam ):$this->generateUrl(FALSE, $extraParam );
			$data['Babydata']['result'][$key]['uid'] = $detailPage['baseurl'];
			$data['Babydata']['result'][$key]['tstamp'] = date('d.m.Y', $value['birthdate']);
			$data['Babydata']['result'][$key]['time'] = date('H:i', $value['birthdate']);
			$data['Babydata']['result'][$key]['imagepath'] = $this->arrConf['tnt_babygallery_imgpath'].'/'.$value['imagepath'];
			$data['Babydata']['result'][$key]['classname'] = ($value['sex'] == 1)?"w":"m";
		}
        $this->view->assign('data', $data);
        $this ->commonResources();
    }

    /**
     * action detailview
     * 
     * @return void
     */
    public function detailviewAction() {
		$this->local_cObj = $this->configurationManager->getContentObject();
		$settings['resFolder'] = ($this->local_cObj->data['pages'] > 0) ? $this->local_cObj->data['pages'] : NULL;
		$settings['pageCount'] = ($this->settings['countval']) ? $this->settings['countval'] : 9;
		$settings['sortby'] = ($this->settings['sortby']) ? $this->settings['sortby'] : 'DESC';
		$settings['sortorder'] = ($this->settings['sortorder']) ? $this->settings['sortorder'] : 'Date';
		$arguments = $this->request->getArguments();
		$uid	=  $arguments['uid'];
		if(empty($uid)) {
			$data['pageAccesswright']	=	0;
			$this -> commonResources();
			$this -> view -> assign('data', $data);
		}
		else{
			$data['babyDetail'] = $this->Model->getbabyDetail($uid);
			if($data['babyDetail']['prevBaby']['uid'] >0){
				$extraParam	= '&tx_tntbabygallery_tntbabygallery[uid]='.$data['babyDetail']['prevBaby']['uid'];
				$data['prevBaby'] = $this->generateUrl(NULL, $extraParam);
				$data['prevClass'] = NULL;
			}
			else{
				$data['prevBaby']['baseurl'] = "javascript:void(0);";
				$data['prevClass'] = "disabled";
			}
			
			if($data['babyDetail']['nextBaby']['uid'] >0){
				$extraParam	= '&tx_tntbabygallery_tntbabygallery[uid]='.$data['babyDetail']['nextBaby']['uid'];
				$data['nextBaby'] = $this->generateUrl(NULL, $extraParam);
				$data['nextClass'] = NULL;
			}
			else{
				$data['nextBaby']['baseurl'] = "javascript:void(0);";
				$data['nextClass'] = "disabled";
			}
			
			$data['pageAccesswright']		= ($data['babyDetail']['uid'] >0)?1:0;
			$data['babyDetail']['classname'] = ($data['babyDetail']['sex'] == 1)?"w":"m";
			$data['NewBorn'] 	= 	$this->Model->getNewBorn($settings['resFolder']);
			$gridPage		 	= 	$this->settings['listpage'];
			$data['GridUrl']	=	$this->generateUrl($gridPage, NULL);
			$data['ListUrl']	=	$this->generateUrl($gridPage, '&tx_tntbabygallery_tntbabygallery[action]=list&tx_tntbabygallery_tntbabygallery[controller]=Gallery');
			$extraParam	= '&tx_tntbabygallery_tntbabygallery[uid]='.$uid;
			$data['url']		= 	$this->generateUrl(NULL, $extraParam);
			$detailPage		=($this->settings['detailspage'])? $this->generateUrl($this->settings['detailspage'], $extraParam ):$data['url'];
			$data['Babydata'] = $this->Model->getGallery($settings);
			foreach ($data['NewBorn'] as $key => $value) {
				$data['NewBorn'][$key]['classname'] = ($value['sex'] == 1)?"w":"m";
			}
			foreach ($data['Babydata']['result'] as $key => $value) {
				$data['Babydata']['result'][$key]['uid'] = $detailPage['baseurl']; 
				$data['Babydata']['result'][$key]['tstamp'] = date('d.m.Y', $value['birthdate']);
				$data['Babydata']['result'][$key]['time'] = date('H:i', $value['birthdate']);
				$data['Babydata']['result'][$key]['imagepath'] = $this->arrConf['tnt_babygallery_imgpath'].'/'.$value['imagepath'];
				$data['Babydata']['result'][$key]['classname'] = ($value['sex'] == 1)?"w":"m";
			}
			$data['babyDetail']['tstamp'] = date('d.m.Y', $data['babyDetail']['birthdate']);
			$data['babyDetail']['time'] = date('H:i', $data['babyDetail']['birthdate']);
			$data['babyDetail']['imagepath'] = $this->arrConf['tnt_babygallery_imgpath'].'/'.$data['babyDetail']['imagepath'] ;
			$furl = $GLOBALS['TSFE']->baseUrl;
			$data['babyDetail']['shareimagepath'] =	$furl.$data['babyDetail']['imagepath'] ;
			$this -> view -> assign('data', $data);
			$this -> commonResources();
			#Social Share Plugin Files 
			$GLOBALS['TSFE']->additionalFooterData[$this->extKey] .= $this->includeJsFile("typo3conf/ext/tnt_babygallery/Resources/Public/socialshare/js/social-likes.js");
			$GLOBALS['TSFE']->additionalFooterData[$this->extKey] .= $this->includeJsFile("typo3conf/ext/tnt_babygallery/Resources/Public/validation/jquery.form.js");
			$GLOBALS['TSFE']->additionalFooterData[$this->extKey] .= $this->includeJsFile("typo3conf/ext/tnt_babygallery/Resources/Public/validation/jquery.validate.js");
			$GLOBALS['TSFE']->additionalFooterData[$this->extKey] .= $this->includeJsFile("typo3conf/ext/tnt_babygallery/Resources/Public/js/ecard.js");
		}
		//echo '<pre>';print_r($data);exit;
	 }

    /**
     * action hitlist
     * 
     * @return void
     */
    public function hitlistAction() {
		$this->local_cObj = $this->configurationManager->getContentObject();
		$settings['resFolder'] 	= ($this->local_cObj->data['pages'] > 0) ? $this->local_cObj->data['pages'] : NULL;
        $args				=	$this->request->getArguments();
		$count				=	15;
		$page_no			=	($args['pageno']>0)?$args['pageno']:0;
		$settings['pageCount'] 	=	($page_no <=1)? $count: (($page_no -1)*$count.','.$count);
        $settings['lstart']	=	($page_no <=1)? 0: (($page_no -1)*$count);
		$settings['lend']	=	($page_no <=1)? $count: $count;
		$settings['sortby']	=	($this->settings['sortby']) ? $this->settings['sortby'] : 'DESC';
        $settings['sortorder']		=	($this->settings['sortorder']) ? $this->settings['sortorder'] : 'Date';
		$settings['year_selected'] 	=	( $args['year_req'])?$args['year_req']:FALSE;
		$data['currentYear']=	$settings['year_selected'];
		
		$data['baseurl']	=	$this->generateUrl( NULL, NULL );
		$data['yearList'] 	= 	$this->Model->yearList();
		foreach ($data['yearList'] as $key => $value){
			$yurl							=	$this->generateUrl(NULL, "&tx_tntbabygallery_tntbabygallery[year_req]=".$value );
			$data['ask'][$key]['yurl']		=	$yurl['baseurl'];
			$data['ask'][$key]['year']		=	$value;;
		}
		$data['girlData'] 	= 	$this->Model->getnamenHitList($settings,1);
		$data['boyData'] 	= 	$this->Model->getnamenHitList($settings,0);
		
		$nid				=	($args['pageno']>0)?$args['pageno']+1 :2 ;
		$nid				=	($settings['year_selected'])?$nid."&tx_tntbabygallery_tntbabygallery[year_req]=".$settings['year_selected']:$nid;
		$bCount				=	count($data['boyData']);
		$gCount				=	count($data['girlData']);
		$disableNext		= 	(count($data['girlData']) < $count && count($boyData) < $count)?1:0;
		
		$nurl				=	$this->generateUrl(NULL, "&tx_tntbabygallery_tntbabygallery[pageno]=".$nid );
		$nurl['baseurl']	=	($disableNext)?"javascript:void(0);":$nurl['baseurl'];
		$data['nurl']		=	$nurl['baseurl'];				
	
		$pid				=	($args['pageno']>2)?$args['pageno']-1 :1 ;
		$pid				=	($settings['year_selected'])?$pid."&tx_tntbabygallery_tntbabygallery[year_req]=".$settings['year_selected']:$pid;
		$purl				=	$this->generateUrl(NULL, "&tx_tntbabygallery_tntbabygallery[pageno]=".$pid );
		$data['purl']		=	$purl['baseurl'];
		$disablePrevious	=	($nid == 2)?1:0;
		$data['purl']		=	($disablePrevious)?"javascript:void(0);":$data['purl'];
		$data['disablePrevious'] = $disablePrevious;
		$sl					= 	($page_no <=1)? 1: (($page_no -1)*$count);
		$dl					= 	($page_no <=1)? 1: (($page_no -1)*$count);		
		$data['nameCount']	= 	$this -> Model -> getnamenCount($data['currentYear']);
		
		$data['errFlag']	= 	(count($data['girlData']) == 0 && count($boyData) == 0)?0:1;
		$this->view->assign('data', $data);
	}
  
    /**
     * action search
     * 
     * @return void
     */
    public function searchAction() {
		$this->local_cObj 			= $this->configurationManager->getContentObject();
		$settings['resFolder'] 		= ($this->local_cObj->data['pages'] > 0) ? $this->local_cObj->data['pages'] : NULL;
		$arguments = $this->request->getArguments();
		$settings['pageCount'] 		= ($this->settings['countval']) ? $this->settings['countval'] : 9;
		
		$isMobile = $this->detectMobile->isMobile() ? ($this->detectMobile->isTablet() ? 0 : 1) : 0;
		if($isMobile){
			$settings['pageCount'] = ($settings['pageCount'] % 2 == 0) ? $settings['pageCount'] : $settings['pageCount']+1;
		}
		
		$settings['sortby'] 		= ($this->settings['sortby']) ? $this->settings['sortby'] : 'DESC';
		$settings['sortorder'] 		= ($this->settings['sortorder']) ? $this->settings['sortorder'] : 'Date';
		$settings['nameFilter'] 	= ($arguments['nameFilter'] != "") ? $arguments['nameFilter'] : NULL;
		$settings['nameFilter'] 	=  ($settings['nameFilter'] == "Vorname / Name")?NULL:$settings['nameFilter'];
		$settings['genderFilter'] 	= ($arguments['genderFilter'] == "0" || $arguments['genderFilter'] == "1") ? $arguments['genderFilter'] : NULL;
		$settings['dateFromFilter'] = ($arguments['dateFromFilter'] != "") ? strtotime($arguments['dateFromFilter']) : NULL;
		$settings['dateToFilter'] 	= ($arguments['dateToFilter'] != "") ? strtotime($arguments['dateToFilter']) : NULL;
		$settings['steepval'] 		= ($arguments['steepval'] > 1) ? $arguments['steepval'] : NULL;
		$data['Babydata'] 			= $this->Model->filterGallery($settings);
		$countResults				= count($data['Babydata']['result']);
		$totalBabies				= $data['Babydata']['babyCount']/$settings['pageCount'];
		$data['resultCount']		= ceil($totalBabies);
		foreach ($data['Babydata']['result'] as $key => $value) {
			$extraParam	= '&tx_tntbabygallery_tntbabygallery[uid]='.$value['uid'];
			$data['url'] = $this->generateUrl(NULL, $extraParam);
			$detailPage		=($this->settings['detailspage'])? $this->generateUrl($this->settings['detailspage'], $extraParam ):$data['url'];
			$data['Babydata']['result'][$key]['uid'] = $detailPage['baseurl']; 
			$data['Babydata']['result'][$key]['tstamp'] = date('d.m.Y', $value['birthdate']);
			$data['Babydata']['result'][$key]['time'] = date('H:i', $value['birthdate']);
			$data['Babydata']['result'][$key]['imagepath'] = $this->arrConf['tnt_babygallery_imgpath'].'/'.$value['imagepath'];
			$data['Babydata']['result'][$key]['classname'] = ($value['sex'] == 1)?"w":"m";
		}	 
		$status = ($data) ? TRUE : FALSE;
		if ($arguments['view'] == "LIST")
            $htmlAppend = $this->makeList($data['Babydata']);
        else if ($arguments['view'] == "GRID")
            $htmlAppend = $this->makeDiv($data['Babydata']);
		$response = array('status' => $status, 'data' => $data, 'htmlAppend' => $htmlAppend);
		echo json_encode($response);
		exit;
    }
	/**
     * action datatable
     * 
     * @return void
     */
	public function datatableAction(){
		$arguments	=	$_GET;
		//echo '<pre>';print_r($arguments);
		$settings['nameFilter'] = ($arguments['nameFilter'] != "" && $arguments['nameFilter'] != "Vorname / Name") ? $arguments['nameFilter'] : NULL;
		$settings['genderFilter'] = ($arguments['genderFilter'] == "0" || $arguments['genderFilter'] == "1") ? $arguments['genderFilter'] : NULL;
		$settings['dateFromFilter'] = ($arguments['dateFromFilter'] != "") ? strtotime($arguments['dateFromFilter']) : NULL;
		$settings['dateToFilter'] = ($arguments['dateToFilter'] != "") ? strtotime($arguments['dateToFilter']) : NULL;
		$settings['steepval'] = ($arguments['steepval'] > 1) ? $arguments['steepval'] : NULL;
		
		$this->local_cObj 		= 	$this->configurationManager->getContentObject();
		$settings['resFolder'] 	= 	($this->local_cObj->data['pages'] > 0) ? $this->local_cObj->data['pages'] : NULL;
		$settings['pageCount'] 	= 	($this->settings['countval']) ? $this->settings['countval'] : 9;
		if($arguments['firstLoad'] == 1){
			$settings['sortby'] = ($this->settings['sortby']) ? $this->settings['sortby'] : 'DESC';
			$settings['sortorder'] = ($this->settings['sortorder']) ? $this->settings['sortorder'] : 'Date';
		}
		else{
			$settings['sortby'] 	=  	$arguments['order'][0]['dir'];
			$settings['sortorder'] 	=  	$this->getOrderByCondition( $arguments['order'][0]['column'] );
		}
		
		$tableData				= 	$this->Model->getDataTable( $settings );
		
		$this->cObj2 = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance("tslib_cObj");
		$imageObj['img'] = 'IMAGE';
        $imageObj['img.']['file.']['width'] = '75';
        $imageObj['img.']['file.']['height'] = '50';
		
		foreach($tableData['data'] as $key => $value){
			$extraParam	= '&tx_tntbabygallery_tntbabygallery[uid]='.$value[10];
			$detailPage		=($this->settings['detailspage'])? $this->generateUrl($this->settings['detailspage'], $extraParam ):$this->generateUrl(NULL, $extraParam );
			$babyPage = $detailPage['baseurl']; 
			$classname = ($value[5] == 1)?'<i class="w"></i>':'<i class="m"></i>';
			$imageObj['img.']['file'] 	= 'fileadmin/data/tnt_babygallery/images/'.$value[2];
            $imageObj['img.']['altText']= $value[3].' '.$value[4];
			$tableData['data'][$key][1]= sprintf($value[1],$babyPage);
			$tableData['data'][$key][5]=$classname;
			$tableData['data'][$key][7]=$value[7].'h';
			$tableData['data'][$key][8]=$value[8].'g';
			$tableData['data'][$key][9]=$value[9].'cm';
            $tableData['data'][$key][2]  = '
				<a href="' . $babyPage . '" class="linkDetail">
					 <img alt="' . $value[3] . ' ' . $value[4] . '" class="group list-group-image" src="' . $this->cObj2->IMG_RESOURCE($imageObj['img.']) . '" />
				</a>
			';
			unset($value[10]);
		}
		echo json_encode( $tableData );
		exit;
	}
	
	public function getOrderByCondition( $order ){
		$order = $order*1;
		switch($order){
			case 3:
				$returnOrder = "lastname";
				break;
			case 4:
				$returnOrder = "firstname";
				break;
			case 5: 
				$returnOrder = "sex";
				break;
			case 6:
				$returnOrder = "birthdate";
				break;
			case 7:
				$returnOrder = "birthtime";
				break;
			case 8:
				$returnOrder = "weight";
				break;
			case 9:
				$returnOrder = "height";
				break;
			default:
				$returnOrder = "birthdate";
		}
		return $returnOrder;
	}
	
    /**
     * action sendcard
     * 
     * @return void
     */
    public function sendcardAction() {
		$args				=	$this->request->getArguments();
		$extensionName		=	$this->request->getControllerExtensionName();
		$toEmail			=	$args['recEmail'];
		$toName 			=	$args['recName'];
		$Usermessage		=	$args['recMessage'];
		$ecard				=	'<a target="_blank" href="'.$args['sendPath'].'">'.$args['sendPath'].'</a>';
		$senderName			=	$args['senderName'];
		$senderEmail		=	$args['senderAddress'];		
		$subject			= 	\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate($key="ecardSubject", $extensionName, $arguments=null);
		$fromaddr			= 	\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate($key="ecardFrom", $extensionName, $arguments=null);
		$mailbody			=	\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate($key="ecardMessage", $extensionName, $arguments=null);
		$message			=	sprintf($mailbody, $senderName ,$senderEmail, $ecard ,$Usermessage);
		$mail				= 	\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Mail\\MailMessage');
		$mail->setFrom(array($senderEmail => $senderName));
		$mail->setTo(array($toEmail => $toName));
		$mail->setSubject($subject);
		$mail->setBody(
			 '<html><head></head><body>'.nl2br($message).' </body></html>',
			 'text/html' //Mark the content-type as HTML
		);
		$status=($mail->send())?"true":"false";
		if($status){
			$markUp ='<div role="alert" class="alert alert-success fade in">
						<strong><span><i class="glyphicon glyphicon-ok"></i></span></strong> ' . $this->localise('ecardSuccess') . '
					  </div>';
		}
		else{
			$markUp = '<div role="alert" class="alert alert-danger fade in">
						<strong><span><i class="glyphicon glyphicon-info-sign"></i></span></strong> ' . $this->localise('ecardFailure') . '
					  </div>';
		}
		$response = array(
						'status' => $status,
						'message' => $markUp
					);
		echo json_encode($response);
		exit;
    }
	
    public function makeList($data) {
        $this->cObj = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance("tslib_cObj");
        $imageObj['img'] = 'IMAGE';
        $imageObj['img.']['file.']['width'] = '75';
        $imageObj['img.']['file.']['height'] = '50';
        $count = count($data['result']);
        $markUp = "";
        if ($count == 0) {
            $markUp .= '<div role="alert" class="alert alert-default fade in">
                          <strong>' . $this->localise('nodata') . '</strong>
                        </div>';
        }
        else {
            foreach ($data['result'] as $key => $value) {
                $imageObj['img.']['file'] 	= $value['imagepath'];
                $imageObj['img.']['altText']= $value['firstname'].' '.$value['lastname'];
                $markUp .= '
							<tr>
								<td class="desktop-hide"><i class="' . $value['classname'] . '"></i></td>
								<td class="desktop-hide">
									<div class="babygal-content"><span><a href="' . $value['uid'] . '" class="bold">' . $value['firstname'] . '  ' . $value['lastname'] . '</a></span><span>' . date('d.m.Y', $value['birthdate']) . ', ' . date('H:i', $value['birthdate']) . 'h, ' . $value['weight'] . 'g, ' . $value['height'] . 'cm </span></div>
								</td>
								<td class="img-babygalerie" rel="' . $value['result'] . '">
									 <a href="' . $value['uid'] . '" class="linkDetail">
										 <img alt="' . $value['firstname'] . ' ' . $value['lastname'] . '" class="group list-group-image" src="' . $this->cObj->IMG_RESOURCE($imageObj['img.']) . '" />
									 </a>
								</td>
								<td class="nachname">' . $value['firstname'] . '</td>
								<td class="vorname">' . $value['lastname'] . '</td>
								<td><i class="' . $value['classname'] . '"></i></td>
								<td> ' . date('d.m.Y', $value['birthdate']) . '</td>
								<td>' . date('H:i', $value['birthdate']) . 'h</td>
								<td>' . $value['weight'] . 'g</td>
								<td>' . $value['height'] . 'cm</td>
							</tr>
				';
            }
        }
        return $markUp;
		exit;
    }

    public function makeDiv($data) {
        $this->cObj = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance("tslib_cObj");
        $imageObj['img'] = 'IMAGE';
        
        $imageObj['img.']['file.']['width'] = '350';
        $imageObj['img.']['file.']['height'] = '233';
        $count = count($data['result']);
        $markUp = "";
        if ($count == 0) {
            $markUp .= '<div role="alert" class="alert alert-default fade in">
                          <strong>' . $this->localise('nodata') . '</strong> 
                        </div>
			';
        }
        else {
            foreach ($data['result'] as $key => $value) {
                $imageObj['img.']['file'] = $value['imagepath'];
                $imageObj['img.']['altText'] = $value['firstname'].' '.$value['lastname'];
                
                $markUp .= '<div class="col-md-4">
								<div class="box-gallery"><a class="thumb" href="'.$value['uid'].'"><img alt="' . $value['firstname'] . ' ' . $value['lastname'] . '" src="' . $this->cObj->IMG_RESOURCE($imageObj['img.']) . '"> </a>
									<div class="name"> '.$value['firstname'].' '.$value['lastname'].'<i class="'.$value['classname'].'"></i><span class="datetime"> ('.$value['tstamp'].')</span></div>
								</div>
							</div>
				';
            }
        }
        return $markUp;
		exit;
    }
	
	function babyLoad(){
		$uploadFile = $this->arrConf['tnt_babygallery_csvpath'];
		if(file_exists($uploadFile)){
			$handle = fopen ($uploadFile, "r");
			$row = 1;
			while(($data = fgetcsv($handle, 1000, ",")) !== FALSE)
			{
				$dataCount = count($data);    
				if($data[0]=="B" && $dataCount==10){ 	
					for($i=0; $i<$dataCount; $i++){
						$data[$i]= utf8_encode($data[$i]);
					}
					$response = $this->insertOrUpdateBaby($data);
				$row++;
				}
			}
			fclose($handle);	
			if($response) $this -> updateCSV($uploadFile);
		}
		return true;
	}

	function insertOrUpdateBaby($data){
		$this->local_cObj = $this->configurationManager->getContentObject();
		$settings['resFolder'] = ($this->local_cObj->data['pages'] > 0) ? $this->local_cObj->data['pages'] : NULL;
		//echo '<pre>';print_r($data);
		$babyExists = $this->Model->checkIfExists($data[1]);
		//var_dump($babyExists);exit;
		$sex	=	($data[4] == "m")?0:1;
		$insertOrUpdateFields = array(		
				'uid' => $data[1],
				'pid' => $settings['resFolder'],		
				'tstamp' => time(),
				'crdate' => time(),
				'cruser_id' => 1,
				'deleted' => 0,
				'hidden' => 0,
				'starttime' => 0,
				'endtime' => 0,
				'fe_group' => 0,
				'lastname' => $data[2],
				'firstname' => $data[3],
				'sex' => $sex,
				'birthdate' => $this->datetime2timestamp($data[5].' '.$data[6]),
				'weight' => $data[9],
				'height' => $data[7],	
				);
		if($babyExists == true){ 
			$response = $this ->Model -> updateBaby($insertOrUpdateFields,$data[1]);		
		}
		elseif($babyExists == false){ 
			$response = $this -> Model -> insertBabies($insertOrUpdateFields);	
		}
		return $response;
	}
	
	

    /* --------------------Custom Utility Functions Starts Here------------------------------------ */

   
    /*===== 1. URL Parameters General Function ========*/
    public function generateUrl($pid, $status) {
        $pId = ($pid != NULL) ? $pid : $GLOBALS['TSFE']->id;
        $addtionalParam = (!empty($status)) ? $status : FALSE;
        $conf = array(
			'parameter'        => $pId, // Link to current page
            'additionalParams' => $addtionalParam, // Set additional parameters
            'forceAbsoluteUrl' => true, 
			'useCashHash'      => true, // We must add cHash because we use parameters
            'returnLast'       => 'url', // We want link only
        );
        $this->local_cObj = $this->configurationManager->getContentObject();
        $baseUrl = $this->local_cObj->typoLink('', $conf);
        $data['baseurl'] = $baseUrl;
        $data['pid'] = $pId;
        return $data;
    }

    /*==== 2. Include Js File Formatting ========*/
    public function includeJsFile($jsFile) {
        return '<script src="' . htmlspecialchars($jsFile) . '" type="text/javascript"></script>';
    }

    /*==== 3. Include css File Formatting ========*/
    public function includeCssFile($cssFile) {
        return '<link rel="stylesheet" href="' . htmlspecialchars($cssFile) . '" />';
    }

    /*==== 4. Label Localisation ========*/
    public function localise($id) {
        return \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate($id, 'TntBabygallery');
    }
	
	/*==== 4. Common CSS and JS Files ========*/
	public function commonResources(){
		$GLOBALS['TSFE']->additionalFooterData[$this->extKey] .= $this->includeJsFile("typo3conf/ext/tnt_babygallery/Resources/Public/bootstrap-daterangepicker/bootstrap-datepicker.js");
		$GLOBALS['TSFE']->additionalFooterData[$this->extKey] .= $this->includeJsFile("typo3conf/ext/tnt_babygallery/Resources/Public/js/script.js");
		$GLOBALS['TSFE']->additionalHeaderData[$this->extKey] .= $this->includeCssFile("typo3conf/ext/tnt_babygallery/Resources/Public/bootstrap-daterangepicker/daterangepicker-bs3.css");
		//$GLOBALS['TSFE']->additionalHeaderData[$this->extKey] .= $this->includeCssFile("typo3conf/ext/tnt_babygallery/Resources/Public/css/custom.css");
		$GLOBALS['TSFE']->additionalHeaderData[$this->extKey] .= $this->includeCssFile("typo3conf/ext/tnt_babygallery/Resources/Public/css/datepicker3.css");
	}
	/*==== 5. Function to turn a mysql datetime (DD.MM.YYY HH:MM:SS) into a unix timestamp ========*/
	function datetime2timestamp($str) {
		list($date, $time) = explode(' ', $str);
		list($day, $month, $year) = explode('.', $date);
		list($hour, $minute, $second) = explode(':', $time);
		$timestamp = mktime($hour, $minute, $second, $month, $day, $year);
		return $timestamp;
	}	
	/*==== 6. CSV Importing Function */
	function updateCSV($uploadFile){
		$existingPath	= $uploadFile;
		$fileInfo		= pathinfo($existingPath);
		$filename		= $fileInfo['basename'];
		$newName		=  basename($fileInfo['basename'],'.csv').'_updated_'.time();
		$modifiedpath	= $fileInfo['dirname'].'/updatedFiles/'.$newName;
		if(file_exists($existingPath)){
			$action = rename($existingPath,$modifiedpath );
		}
	}

}
