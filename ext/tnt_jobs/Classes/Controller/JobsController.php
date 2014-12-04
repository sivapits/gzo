<?php

namespace TYPO3\TntJobs\Controller;

/* * *************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Hoja <hoja@tnt-graphics.ch>
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
 * JobsController
 */
class JobsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
	/*
	 * =================================
	 * = Controller for loading Models =
	 * =================================
	 */

	public function __construct() {
		$this->Model = new \TYPO3\TntJobs\Domain\Model\Jobs();
	}
	/**
	 * jobsRepository
	 *
	 * @var \TYPO3\TntJobs\Domain\Repository\JobsRepository
	 * @inject
	 */
	protected $jobsRepository = NULL;
	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$pi				=	$this->objectManager->create('TYPO3\CMS\Frontend\Plugin\AbstractPlugin');
		$pi->cObj			=	$this->configurationManager->getContentObject();
		$this->local_cObj		=	$this->configurationManager->getContentObject();
		$settings			=	$this->settings;
		$var				=	$this->local_cObj->data;
		$settings['resFolder']	=	($this->local_cObj->data['pages'] > 0) ? $this->local_cObj->data['pages'] : NULL;
		$pidList			=	$pi->pi_getPidList($settings['resFolder'], $recursive = $this->local_cObj->data['recursive']);
		$settings['resFolder']	=	$pidList;
		$settings['limit']		=	$this->settings['listcount'];
		$urlParam			=	$this->generateUrl($pid, true);
		$resourceurl		=	$GLOBALS['TSFE']->baseUrl;
		$content			=	$this->Model->getContents($settings);
		$content			=	$this->reWamp($content);
		$this->view->assign('urlParam', $urlParam);
		$this->view->assign('data', $content);
		$GLOBALS['TSFE']->additionalFooterData[$this->extKey] .= $this->includeJsFile("typo3conf/ext/tnt_jobs/Resources/Public/js/jobs.js");
	}
	/**
	 * action show
	 * @return void
	 */
	public function showAction() {
		$arguments		=	$this->request->getArguments();
		if (empty($arguments['id'])) {
			$arguments['id']	 =	$_GET['uid'];
		}
		if($arguments['id'] <= 0){
			//$GLOBALS['TSFE']->additionalFooterData[$this->extKey] .= $this->includeJsFile("typo3conf/ext/tnt_jobs/Resources/Public/js/jobs.js");
			$path = "typo3conf/ext/tnt_jobs/Resources/Public/js/jobs.js";
			$GLOBALS['TSFE']->getPageRenderer()->addJsFooterFile($path, 'text/javascript', TRUE, FALSE, '', TRUE); 
			return true;
		}
		$showDetails		=	$this->Model->getDetails($arguments['id']);
		$showDetails		=	$this->reWamp($showDetails);
		$settings			=	$this->settings;
		$urlParam			=	$this->generateUrl($settings['listjob'], false);
		$settings['listjob']		=	$urlParam1['baseurl'];
		$this->view->assign('jobdetails', $showDetails[0]);
		$this->view->assign('urlParam', $urlParam);
		$resourceurl		= $GLOBALS['TSFE']->baseUrl;
		//$GLOBALS['TSFE']->additionalHeaderData[$this->extKey] .= $this->includeCssFile("typo3conf/ext/tnt_jobs/Resources/Public/css/custom.css");
		//$GLOBALS['TSFE']->additionalFooterData[$this->extKey] .= $this->includeJsFile("typo3conf/ext/tnt_jobs/Resources/Public/js/jobs.js");
		$path = "typo3conf/ext/tnt_jobs/Resources/Public/js/jobs.js";
		$GLOBALS['TSFE']->getPageRenderer()->addJsFooterFile($path, 'text/javascript', TRUE, FALSE, '', TRUE); 
	}
	/**
	 * action widget
	 * @return void
	 */
	public function widgetAction() {
		$this->local_cObj		=	$this->configurationManager->getContentObject();
		$settings			=	$this->settings;
		$settings['resFolder']	=	($this->local_cObj->data['pages'] > 0) ? $this->local_cObj->data['pages'] : NULL;
		$settings['limit']		=	$this->settings['widgetcount'];
		$urlParam1			=	$this->generateUrl($settings['listjob'], false);
		$settings['listjob']		=	$urlParam1['baseurl'];
		$urlParam2			=	$this->generateUrl($settings['jobsingle'], TRUE);
		$settings['jobsingle']	=	$urlParam2['baseurl'];
		$resourceurl		=	$GLOBALS['TSFE']->baseUrl;
		$content			=	$this->Model->getContents($settings);
		foreach ($content as $key => $value) {
			$content[$key]['pageurl']	= $settings['jobsingle'] . '&uid=' . $value['jobuid'];
		}
		$content			=	$this->reWamp($content);
		if ($settings['listjob'])
		$this->view->assign('listpage', $settings['listjob']);
		$this->view->assign('data', $content);
		$this->view->assign('flexformval', $settings );
	}
	/*
	 * ===================================
	 * = URL Parameters General Function =
	 * ===================================
	 *
	 */
	public function generateUrl($pid, $status) {
		$pId				=	($pid) ? $pid : $GLOBALS['TSFE']->id;
		$addtionalParam		=	($status) ? $status : FALSE;
		$conf				= array(
							'parameter'			=>	$pId,			// Link to current page
							'additionalParams'	=>	$addtionalParam,// Set additional parameters
							'forceAbsoluteUrl'	=>	true, 
							'useCacheHash'		=>	true,			// We must add cHash because we use parameters
							'returnLast'			=>	'url',			 // We want link only
						);
		$this->local_cObj		=	$this->configurationManager->getContentObject();
		$baseUrl			=	$this->local_cObj->typoLink('', $conf);
		$data['baseurl']		=	$baseUrl;
		$data['pid']			=	$pId;
		return $data;
	}
	/*
	 * ===================================== 
	 * = Function for reArranging Job Type = 
	 * ==================================== 
	 */
	public function reWamp($content) {
		foreach ($content as $key => $data) {
			if (isset($data['job_type'])) {
				switch ($data['job_type']) {
					case $data['job_type'] < 1:
						$content[$key]['job_type'] = "100%";
						break;
					case '1':
						$content[$key]['job_type'] = "90%";
						break;
					case '2':
						$content[$key]['job_type'] = "80%";
						break;
					case '3':
						$content[$key]['job_type'] = "70%";
						break;
					case '4':
						$content[$key]['job_type'] = "60%";
						break;
					case '5':
						$content[$key]['job_type'] = "50%";
						break;
					case '6':
						$content[$key]['job_type'] = "40%";
						break;
					case '7':
						$content[$key]['job_type'] = "30%";
						break;
					case '8':
						$content[$key]['job_type'] = "20%";
						break;
					case '9':
						$content[$key]['job_type'] = "80-100%";
						break;
					case '10':
						$content[$key]['job_type'] = "50-100%";
						break;
					case '11':
						$content[$key]['job_type'] = "60-100%";
						break;
					case '12':
						$content[$key]['job_type'] = "70-100%";
						break;
					case '13':
						$content[$key]['job_type'] = "90-100%";
						break;
					case '14':
						$content[$key]['job_type'] = "50-60%";
						break;
					case '15':
						$content[$key]['job_type'] = "40-50%";
						break;

					default:
						$content[$key]['job_type'] = "100%";
						break;
				}
			}
			$detailPage			=	($this->settings['jobsingle']) ? $this->generateUrl($this->settings['jobsingle'], '&tx_tntjobs_tntjobs[id]='.$data['jobuid']) : 'javascript:void(0);';
			$content[$key]['job_page'] = $detailPage['baseurl'] ;   //if(isset($data['']))
		}
		return $content;
	}

	public function includeJsFile($jsFile) {
		return '<script src="' . htmlspecialchars($jsFile) . '" type="text/javascript"></script>';
	}

	public function includeCssFile($cssFile) {
		return '<link rel="stylesheet" href="' . htmlspecialchars($cssFile) . '" />';
	}

}
