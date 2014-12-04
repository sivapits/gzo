<?php
namespace TYPO3\TntJobs\Domain\Model;
/***************************************************************
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
 ***************************************************************/

/**
 * Jobs
 */
class Jobs extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
	/*----Model Function For Fetching Job Contents----*/	
	public function getContents($settings){
		$from_table		= 	"tx_tntjobs_job
							LEFT JOIN tx_tntjobs_job_region_mm ON tx_tntjobs_job.uid = tx_tntjobs_job_region_mm.uid_local 
							LEFT JOIN tx_tntjobs_region ON tx_tntjobs_job_region_mm.uid_foreign = tx_tntjobs_region.uid
							";
		$where_clause		= 	"tx_tntjobs_job.deleted = 0 and tx_tntjobs_job.hidden = 0";
		if( $settings['resFolder'] ){
			$where_clause	.=   " and tx_tntjobs_job.pid IN (".$settings['resFolder'].")";
		}
		$limit				=	($settings['limit']!=0 && $settings['limit'])?$settings['limit']:NULL;
		if($settings['sortorder'] ==	"BACKEND"){
			$sort_by		=	"tx_tntjobs_job.sorting ".$settings['sortby'];
		}
		elseif ($settings['sortorder'] == "JOBTITLE") {
			$sort_by		=	"tx_tntjobs_job.title ".$settings['sortby'];
		}
		elseif ($settings['sortorder'] == "JOBDATE") {
			$sort_by		=	"tx_tntjobs_job.crdate  ".$settings['sortby'];
		}
		$select_fields		= 	"tx_tntjobs_job.uid as jobuid, tx_tntjobs_job.crdate, tx_tntjobs_job.title, tx_tntjobs_job.job_type, tx_tntjobs_region.name";
		$res				=	$GLOBALS['TYPO3_DB']->exec_SELECTgetRows ( $select_fields,
								$from_table,
								$where_clause,
								NULL,
								$sort_by,
								$limit
							); 
		$response			= 	($res)?$res:false;
		return $response;
	}
	/*----Model Function For Fetching Job Details----*/	
	public function getDetails($id){
		$from_table		= 	"tx_tntjobs_job
							LEFT JOIN tx_tntjobs_job_region_mm ON tx_tntjobs_job.uid = tx_tntjobs_job_region_mm.uid_local 
							LEFT JOIN tx_tntjobs_region ON tx_tntjobs_job_region_mm.uid_foreign = tx_tntjobs_region.uid
							";
		$where_clause		= 	"tx_tntjobs_job.uid = '$id' and tx_tntjobs_job.deleted = 0 and tx_tntjobs_job.hidden = 0";
		$select_fields		= 	"tx_tntjobs_job.*, tx_tntjobs_region.name";
		$res				=	$GLOBALS['TYPO3_DB']->exec_SELECTgetRows ( $select_fields,
								$from_table,
								$where_clause,
								NULL,
								"tx_tntjobs_job.title ASC"
							); 	
		$response			= 	($res)?$res:false;
		return $response;
	}
}