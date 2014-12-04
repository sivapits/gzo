<?php

namespace TYPO3\Tntbabygallery\Domain\Model;

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
 * Gallery
 */
class Gallery extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	public function getGallery($settings) {
		/* -----------------Configuration Parameters------------------- */
		$orderBy = "tx_tntbabygallery_babies.tstamp DESC";
		if ($settings['sortorder'] == "Date")
			$orderBy = "tx_tntbabygallery_babies.birthdate " . $settings['sortby'];
		else if ($settings['sortorder'] == "FName")
			$orderBy = "tx_tntbabygallery_babies.firstname " . $settings['sortby'];
		else if ($settings['lastname'] == "FName")
			$orderBy = "tx_tntbabygallery_babies.lastname " . $settings['sortby'];

		$limit = 0 . ',' . $settings['pageCount'];
		/* -----------------Configuration Parameters Ends--------------- */
		$from_table = "tx_tntbabygallery_babies";
		$sid = $settings['resFolder'];
		if($sid > 0)
			$where_clause = "tx_tntbabygallery_babies.deleted = 0 and tx_tntbabygallery_babies.hidden = 0 and tx_tntbabygallery_babies.imagepath!='' and tx_tntbabygallery_babies.pid=$sid";
		else
			$where_clause = "tx_tntbabygallery_babies.deleted = 0 and tx_tntbabygallery_babies.hidden = 0 and tx_tntbabygallery_babies.imagepath!=''";
		$select_fields = "tx_tntbabygallery_babies.*,DATE_FORMAT(from_unixtime(tx_tntbabygallery_babies.birthdate),'%d.%m.%Y') as bdate";

		//$where_clause = "tx_tntbabygallery_babies.deleted = 0 and tx_tntbabygallery_babies.hidden = 0 and tx_tntbabygallery_babies.imagepath != ''";
		
		$select_fields = "tx_tntbabygallery_babies.uid";

		$res['babyCount'] = $GLOBALS['TYPO3_DB']->exec_SELECTcountRows($select_fields, $from_table, $where_clause
		);
		$select_fields = "tx_tntbabygallery_babies.*";
		$res['result'] = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select_fields, $from_table, $where_clause, NULL, $orderBy, $limit
		);
		return $res;
	}

	public function getNewBorn($sid) {
		$from_table = "tx_tntbabygallery_babies";
		if($sid > 0)
			$where_clause = "tx_tntbabygallery_babies.deleted = 0 and tx_tntbabygallery_babies.hidden = 0 and tx_tntbabygallery_babies.imagepath='' and tx_tntbabygallery_babies.pid=$sid";
		else
			$where_clause = "tx_tntbabygallery_babies.deleted = 0 and tx_tntbabygallery_babies.hidden = 0 and tx_tntbabygallery_babies.imagepath=''";
		$select_fields = "tx_tntbabygallery_babies.*,DATE_FORMAT(from_unixtime(tx_tntbabygallery_babies.birthdate),'%d.%m.%Y') as bdate";

		$res = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select_fields, $from_table, $where_clause, NULL, "tx_tntbabygallery_babies.birthdate DESC"
		);

		$response = ($res) ? $res : $res;
		foreach ($response as $key => $value) {
			$response[$key]['tstamp'] = date('d.m.Y', $value['birthdate']);
			$response[$key]['time'] = date('H:i', $value['birthdate']);
		}
		return $response;
	}
	
	public function getWidgetItems($settings) {
		$from_table = "tx_tntbabygallery_babies";
		if($settings['resFolder'] > 0 && $settings['resFolder']!=NULL)
			$where_clause = "tx_tntbabygallery_babies.deleted = 0 and tx_tntbabygallery_babies.hidden = 0 and tx_tntbabygallery_babies.imagepath='' and tx_tntbabygallery_babies.pid=".$settings['resFolder'];
		else
			$where_clause = "tx_tntbabygallery_babies.deleted = 0 and tx_tntbabygallery_babies.hidden = 0 and tx_tntbabygallery_babies.imagepath=''";
		$select_fields = "tx_tntbabygallery_babies.*,DATE_FORMAT(from_unixtime(tx_tntbabygallery_babies.birthdate),'%d.%m.%Y') as bdate";

		$res = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select_fields, $from_table, $where_clause, NULL, "tx_tntbabygallery_babies.birthdate DESC","0,2"
		);
		$response1 = ($res) ? $res : $res;
		foreach ($response1 as $key => $value) {
			$response1[$key]['tstamp'] = date('d.m.Y', $value['birthdate']);
			$response1[$key]['time'] = date('H:i', $value['birthdate']);
		}
		if($settings['resFolder'] > 0 && $settings['resFolder']!=NULL){
			$where_clause = "tx_tntbabygallery_babies.deleted = 0 and tx_tntbabygallery_babies.hidden = 0 and tx_tntbabygallery_babies.imagepath!='' and tx_tntbabygallery_babies.pid=".$settings['resFolder'];
		}
		else
			$where_clause = "tx_tntbabygallery_babies.deleted = 0 and tx_tntbabygallery_babies.hidden = 0 and tx_tntbabygallery_babies.imagepath!=''";
		$select_fields = "tx_tntbabygallery_babies.*,DATE_FORMAT(from_unixtime(tx_tntbabygallery_babies.birthdate),'%d.%m.%Y') as bdate";

		$res2 = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select_fields, $from_table, $where_clause, NULL, "tx_tntbabygallery_babies.birthdate DESC","0,4"
		);
		$response2 = ($res2) ? $res2 : $res2;
		foreach ($response2 as $key => $value) {
			$response2[$key]['tstamp'] = date('d.m.Y', $value['birthdate']);
			$response2[$key]['time'] = date('H:i', $value['birthdate']);
		}
		$response = array_merge($response1,$response2);
		return $response;
	}

	public function filterGallery($settings) {
		/* -----------------Configuration Parameters------------------- */
		$select_fields = "tx_tntbabygallery_babies.*";
		$orderBy = "tx_tntbabygallery_babies.birthdate DESC";
		if ($settings['sortorder'] == "Date")
			$orderBy = "tx_tntbabygallery_babies.birthdate " . $settings['sortby'];
		else if ($settings['sortorder'] == "FName")
			$orderBy = "tx_tntbabygallery_babies.firstname " . $settings['sortby'];
		else if ($settings['lastname'] == "LName")
			$orderBy = "tx_tntbabygallery_babies.lastname " . $settings['sortby'];

		$limit = 0 . ',' . $settings['pageCount'];
		
		if ($settings['steepval'] > 1)
			$limit = ( ($settings['steepval'] - 1) * $settings['pageCount']) . ',' . $settings['pageCount'];

		/* -----------------Configuration Parameters Ends--------------- */
		$from_table = "tx_tntbabygallery_babies";
		$sid = $settings['resFolder'];
		if($sid > 0 && $sid !=NULL)
			$where_clause = "tx_tntbabygallery_babies.deleted = 0 and tx_tntbabygallery_babies.hidden = 0 and tx_tntbabygallery_babies.imagepath!='' and tx_tntbabygallery_babies.pid=$sid";
		else
			$where_clause = "tx_tntbabygallery_babies.deleted = 0 and tx_tntbabygallery_babies.hidden = 0 and tx_tntbabygallery_babies.imagepath!=''";
		//$where_clause = "tx_tntbabygallery_babies.deleted = 0 and tx_tntbabygallery_babies.hidden = 0 and tx_tntbabygallery_babies.imagepath != '' ";

		/* --------Extended Where Clause Conditions---------------------- */
		if ($settings['genderFilter'] != NULL)
			$where_clause .= " and tx_tntbabygallery_babies.sex =" . $settings['genderFilter'];
		//echo date('d-m-y h:i:s',$settings['dateFromFilter']);exit; 
		if ($settings['dateToFilter'] != NULL && $settings['dateFromFilter'] != null)
			$where_clause .= " and DATE_FORMAT(from_unixtime(tx_tntbabygallery_babies.birthdate),'%Y%m%d') between " . date('Ymd', $settings['dateFromFilter']) . " AND " . date('Ymd', $settings['dateToFilter']);
		if ($settings['nameFilter'] != NULL)
			$where_clause .= " and (tx_tntbabygallery_babies.firstname like '%" . $settings['nameFilter'] . "%' or tx_tntbabygallery_babies.lastname like '%" . $settings['nameFilter'] . "%' or CONCAT(tx_tntbabygallery_babies.firstname,' ',tx_tntbabygallery_babies.lastname) like '%" . $settings['nameFilter'] . "%')";
		/* --------Extended Where Clause Conditions End------------------ */
		$res['babyCount'] = $GLOBALS['TYPO3_DB']->exec_SELECTquery($select_fields, $from_table, $where_clause
		);
		$res['babyCount'] = $GLOBALS['TYPO3_DB']->sql_num_rows($res['babyCount']);
		$res['result'] = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select_fields, $from_table, $where_clause, NULL, $orderBy, $limit
		);
		foreach ($res['result'] as $key => $value) {
			$response[$key]['tstamp'] = date('d.m.Y', $value['birthdate']);
			$response[$key]['time'] = date('H:i', $value['birthdate']);
		}
		return $res;
	}
	
	public function getDataTable($settings){
		//print_r($settings);
		/* -----------------Configuration Parameters------------------- */
		$select_fields = "tx_tntbabygallery_babies.*,TRIM(tx_tntbabygallery_babies.firstname) as firstname,TRIM(tx_tntbabygallery_babies.lastname) as lastname";
		$orderBy = "tx_tntbabygallery_babies.birthdate DESC";
		
		if (isset($settings['sortorder'])){
			$orderBy = "tx_tntbabygallery_babies.".$settings['sortorder'] ." " . $settings['sortby'];
		}
		
		/** Start OF onLoad Conditions**/
		if ($settings['sortorder'] == "Date")
			$orderBy = "tx_tntbabygallery_babies.birthdate " . $settings['sortby'];
		else if ($settings['sortorder'] == "FName")
			$orderBy = "tx_tntbabygallery_babies.firstname" . $settings['sortby'];
		else if ($settings['lastname'] == "LName")
			$orderBy = "tx_tntbabygallery_babies.lastname" . $settings['sortby'];
		/** eND OF onLoad Conditions**/
		
		$limit = 0 . ',' . $settings['pageCount'];
		if ($settings['steepval'] > 1)
			$limit = ( ($settings['steepval'] - 1) * $settings['pageCount']) . ',' . $settings['pageCount'];

		
		/* -----------------Configuration Parameters Ends--------------- */
		$from_table = "tx_tntbabygallery_babies";
		$sid = $settings['resFolder']; 
		if($sid > 0 && $sid !=NULL)
			$where_clause = "tx_tntbabygallery_babies.deleted = 0 and tx_tntbabygallery_babies.hidden = 0 and tx_tntbabygallery_babies.imagepath!='' and tx_tntbabygallery_babies.pid=$sid";
		else
			$where_clause = "tx_tntbabygallery_babies.deleted = 0 and tx_tntbabygallery_babies.hidden = 0 and tx_tntbabygallery_babies.imagepath!=''";
		/* --------Extended Where Clause Conditions---------------------- */
		if ($settings['genderFilter'] != NULL)
			$where_clause .= " and tx_tntbabygallery_babies.sex =" . $settings['genderFilter'];
		//echo date('d-m-y h:i:s',$settings['dateFromFilter']);exit; 
		if ($settings['dateToFilter'] != NULL && $settings['dateFromFilter'] != null)
			$where_clause .= " and DATE_FORMAT(from_unixtime(tx_tntbabygallery_babies.birthdate),'%Y%m%d') between " . date('Ymd', $settings['dateFromFilter']) . " AND " . date('Ymd', $settings['dateToFilter']);
		if ($settings['nameFilter'] != NULL)
			$where_clause .= " and (tx_tntbabygallery_babies.firstname like '%" . $settings['nameFilter'] . "%' or tx_tntbabygallery_babies.lastname like '%" . $settings['nameFilter'] . "%')";
		/* --------Extended Where Clause Conditions End------------------ */
		
		
		$res['babyCount'] = $GLOBALS['TYPO3_DB']->exec_SELECTquery($select_fields, $from_table, $where_clause);
		$res['babyCount'] = $GLOBALS['TYPO3_DB']->sql_num_rows($res['babyCount']);
		
			$GLOBALS['TYPO3_DB']->store_lastBuiltQuery = 1;
		$res['result'] 	= $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select_fields, $from_table, $where_clause, NULL, $orderBy, $limit
		);
		$res['data']	=	array();
		//echo $GLOBALS['TYPO3_DB']->debug_lastBuiltQuery;exit();
		foreach ($res['result'] as $key => $value) {
			$response[$key]['tstamp'] = date('d.m.Y', $value['birthdate']);
			$response[$key]['time'] = date('H:i', $value['birthdate']);
			$gender = ($value['sex'] == 1)?"w":"m";
			$babyDetails = array(
				'<i class="' . $gender . '"></i>',
				'<div class="babygal-content"><span><a href="%s" class="bold">' . $value['firstname'] . '  ' . $value['lastname'] . '</a></span><span>' . date('d.m.Y', $value['birthdate']) . ', ' . date('H:i', $value['birthdate']) . 'h, ' . $value['weight'] . 'g, ' . $value['height'] . 'cm </span></div>',
				$value['imagepath'],
				$value['lastname'],
				$value['firstname'],
				$value['sex'],
				$response[$key]['tstamp'],
				$response[$key]['time'],
				$value['weight'].'',
				$value['height'],
				$value['uid']
			);
			array_push( $res['data'] , $babyDetails );
		}
		return $res;
	}
	
	public function getbabyDetail($uid){
		$from_table = "tx_tntbabygallery_babies";
		$where_clause = "tx_tntbabygallery_babies.deleted = 0 and tx_tntbabygallery_babies.hidden = 0 and tx_tntbabygallery_babies.uid='$uid'";
		$select_fields = "tx_tntbabygallery_babies.*,DATE_FORMAT(from_unixtime(tx_tntbabygallery_babies.birthdate),'%d.%m.%Y') as bdate";
		$GLOBALS['TYPO3_DB']->store_lastBuiltQuery = 1;
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTgetSingleRow($select_fields, $from_table, $where_clause, NULL, "tx_tntbabygallery_babies.birthdate DESC");
		$response = ($res) ? $res : $res;
		
		/**/
		$where = "tx_tntbabygallery_babies.deleted = 0 and tx_tntbabygallery_babies.hidden = 0 and tx_tntbabygallery_babies.imagepath != '' and tx_tntbabygallery_babies.birthdate>".$response['birthdate']."";
		$select= "tx_tntbabygallery_babies.uid";
		$response['prevBaby'] = $GLOBALS['TYPO3_DB']->exec_SELECTgetSingleRow($select, $from_table, $where, NULL, "tx_tntbabygallery_babies.birthdate ASC");
		//echo $GLOBALS['TYPO3_DB']->debug_lastBuiltQuery;exit();
		$where2 = "tx_tntbabygallery_babies.deleted = 0 and tx_tntbabygallery_babies.hidden = 0 and tx_tntbabygallery_babies.imagepath != '' and tx_tntbabygallery_babies.birthdate<".$response['birthdate']."";
		$response['nextBaby'] = $GLOBALS['TYPO3_DB']->exec_SELECTgetSingleRow($select, $from_table, $where2, NULL, "tx_tntbabygallery_babies.birthdate DESC");
		//echo $GLOBALS['TYPO3_DB']->debug_lastBuiltQuery;exit();
		/**/
		return $response;
	}
	public function getnamenCount($year = NULL){
		$sid = $settings['resFolder'];
		if($sid > 0)
			$where_clause = "tx_tntbabygallery_babies.deleted = 0 and tx_tntbabygallery_babies.hidden = 0 and tx_tntbabygallery_babies.pid=$sid";
		else
			$where_clause = "tx_tntbabygallery_babies.deleted = 0 and tx_tntbabygallery_babies.hidden = 0";
		if($year!=NULL){
			$where_clause .= " and DATE_FORMAT(from_unixtime(tx_tntbabygallery_babies.birthdate),'%Y') =".$year;
		}
		$select_fields = "distinct(tx_tntbabygallery_babies.firstname), tx_tntbabygallery_babies.lastname";
		$from_table = "tx_tntbabygallery_babies";
		$res['namenbabies'] = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select_fields, $from_table, $where_clause);
		$babydetails = array();
		$names	= array();
		foreach( $res['namenbabies'] as $key => $value){
			$needleasd = explode(' ',$value['firstname']);
			$names[$key] =  $needleasd[0];
		}
		
		$names = array_unique($names);
		$tot_count = count($names);
		//echo '<pre>';print_r($names);
		/*
		$tot_count = 0;
		foreach($names as $key => $value){
		if(!empty($value)){
			if($sid > 0)
				$where_clause 	= "tx_tntbabygallery_babies.firstname like '".$value."%' and tx_tntbabygallery_babies.deleted = 0 and tx_tntbabygallery_babies.hidden = 0 and tx_tntbabygallery_babies.pid=$sid";
			else
				$where_clause 	= "tx_tntbabygallery_babies.firstname like '".$value."%' and tx_tntbabygallery_babies.deleted = 0 and tx_tntbabygallery_babies.hidden = 0";
			$select_fields 		= 	"tx_tntbabygallery_babies.firstname";
			$count 				=	$GLOBALS['TYPO3_DB']->exec_SELECTcountRows($select_fields, $from_table, $where_clause);
			$tot_count 			+=	$count;
		}}*/
		//echo $tot_count; exit;
		return 	$tot_count;
	}
	public function getnamenHitList($settings,$gender){
		//echo '<pre>';print_r( $settings );exit;
		$sid = $settings['resFolder'];
		if($sid > 0)
			$where_clause = "tx_tntbabygallery_babies.deleted = 0 and tx_tntbabygallery_babies.hidden = 0 and tx_tntbabygallery_babies.sex=$gender and tx_tntbabygallery_babies.pid=$sid";
		else
			$where_clause = "tx_tntbabygallery_babies.deleted = 0 and tx_tntbabygallery_babies.hidden = 0 and tx_tntbabygallery_babies.sex=$gender";
		if($settings['year_selected'] != NULL)
			$where_clause .= " and DATE_FORMAT(from_unixtime(tx_tntbabygallery_babies.birthdate),'%Y') =".$settings['year_selected'];
		$limit = $settings['pageCount'];
		$select_fields = "tx_tntbabygallery_babies.firstname, tx_tntbabygallery_babies.lastname";
		$from_table = "tx_tntbabygallery_babies";
		$res['namenbabies'] = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select_fields, $from_table, $where_clause);
		
		
		
		/*test*/
		foreach($res['namenbabies'] as $key => $myrow) {
            $names = explode(" ", $myrow["firstname"]);
            foreach($names as $name) {
                
				$hitlist[$name]++;
            }
        }
        arsort($hitlist);
        //var_dump($hitlist);
        //echo mysql_num_rows($result);
        
		//echo '<pre>';print_r( $hitlist );exit;
		$newresult = array();
		$i=0;
		foreach($hitlist as $key => $value){
			++$i;
			$newresult[$i]['gender'] = 	$gender;
			$newresult[$i]['name']	 =	$key;
			$newresult[$i]['count']	 =	$value;
			
		}
		/*test*/
		
		/*$babydetails = array();
		$names	= array();
		foreach( $res['namenbabies'] as $key => $value){
			$needleasd = explode(' ',$value['firstname']);
			$names[$key] =  utf8_encode ( $needleasd[0] );
		}
		$names = array_unique($names);
		//echo '<pre>';print_r($names);
		foreach($names as $key => $value){
		if(!empty($value)){
			if($sid > 0)
				$where_clause 	= "tx_tntbabygallery_babies.firstname like '".$value."%' and tx_tntbabygallery_babies.deleted = 0 and tx_tntbabygallery_babies.hidden = 0 and tx_tntbabygallery_babies.sex=$gender and tx_tntbabygallery_babies.pid=$sid";
			else
				$where_clause 	= "tx_tntbabygallery_babies.firstname like '".$value."%' and tx_tntbabygallery_babies.deleted = 0 and tx_tntbabygallery_babies.hidden = 0 and tx_tntbabygallery_babies.sex=$gender";
			if($settings['year_selected'] != NULL)
				$where_clause .= " and DATE_FORMAT(from_unixtime(tx_tntbabygallery_babies.birthdate),'%Y') =".$settings['year_selected'];
		
			$select_fields 		= 	"tx_tntbabygallery_babies.firstname";
			$GLOBALS['TYPO3_DB']->store_lastBuiltQuery = 1;
			$count 				=	$GLOBALS['TYPO3_DB']->exec_SELECTcountRows($select_fields, $from_table, $where_clause);
			//echo $GLOBALS['TYPO3_DB']->debug_lastBuiltQuery;exit();
			$babydetails[$key]['gender'] = 	$gender;
			$babydetails[$key]['name']	 =	$value;
			$babydetails[$key]['count']	 =	$count;
		}}
		usort($babydetails, function($a, $b) {
			return $b['count']-$a['count'];
		});
		$babydetails = array_slice($babydetails,$settings['lstart'],$settings['lend']);*/
		$babydetails = array_slice($newresult,$settings['lstart'],$settings['lend']);
		//echo '<pre>';print_r($babydetails);exit;
		return $babydetails;
	}
	
	public function getHitList($settings,$gender){
		/* -----------------Configuration Parameters------------------- */
		$orderBy = "tx_tntbabygallery_babies.tstamp DESC";
		if ($settings['sortorder'] == "Date")
			$orderBy = "tx_tntbabygallery_babies.birthdate " . $settings['sortby'];
		else if ($settings['sortorder'] == "FName")
			$orderBy = "tx_tntbabygallery_babies.firstname " . $settings['sortby'];
		else if ($settings['lastname'] == "FName")
			$orderBy = "tx_tntbabygallery_babies.lastname " . $settings['sortby'];

		$limit = $settings['pageCount'];
		/* -----------------Configuration Parameters Ends--------------- */
		$from_table = "tx_tntbabygallery_babies";
		$sid = $settings['resFolder'];
		if($sid > 0)
			$where_clause = "tx_tntbabygallery_babies.deleted = 0 and tx_tntbabygallery_babies.hidden = 0 and tx_tntbabygallery_babies.sex=$gender and tx_tntbabygallery_babies.pid=$sid";
		else
			$where_clause = "tx_tntbabygallery_babies.deleted = 0 and tx_tntbabygallery_babies.hidden = 0 and tx_tntbabygallery_babies.sex=$gender";
		//$where_clause = "tx_tntbabygallery_babies.deleted = 0 and tx_tntbabygallery_babies.hidden = 0 and tx_tntbabygallery_babies.sex=$gender";
		if($settings['year_selected'])
			$where_clause .= " and DATE_FORMAT(from_unixtime(tx_tntbabygallery_babies.birthdate),'%Y') =".$settings['year_selected'];
		
		$select_fields = "tx_tntbabygallery_babies.uid";

		$res['babyCount'] = $GLOBALS['TYPO3_DB']->exec_SELECTcountRows($select_fields, $from_table, $where_clause
		);
		$select_fields = "tx_tntbabygallery_babies.*  , DATE_FORMAT(from_unixtime(tx_tntbabygallery_babies.birthdate),'%Y') as birthdate";
		$GLOBALS['TYPO3_DB']->store_lastBuiltQuery = 1;
		$res['result'] = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select_fields, $from_table, $where_clause, NULL, $orderBy, $limit);
		//echo $GLOBALS['TYPO3_DB']->debug_lastBuiltQuery;exit();
		//echo '<pre>';print_r($res);
		return $res;
	}
	
	public function yearList(){
		$from_table = "tx_tntbabygallery_babies";
		$where_clause = "tx_tntbabygallery_babies.deleted = 0 and tx_tntbabygallery_babies.hidden = 0 and (tx_tntbabygallery_babies.birthdate!='' or tx_tntbabygallery_babies.birthdate>0 and birthdate= (SELECT MIN(birthdate) FROM tx_tntbabygallery_babies )) ";
		$select_fields = "DATE_FORMAT(from_unixtime(tx_tntbabygallery_babies.birthdate),'%Y') as bdate";
		//$GLOBALS['TYPO3_DB']->store_lastBuiltQuery = 1;
		$startRange = $GLOBALS['TYPO3_DB']->exec_SELECTgetSingleRow($select_fields, $from_table, $where_clause, NULL, "tx_tntbabygallery_babies.birthdate ASC");
		$endRange = $GLOBALS['TYPO3_DB']->exec_SELECTgetSingleRow($select_fields, $from_table, $where_clause, NULL, "tx_tntbabygallery_babies.birthdate DESC"	);
		$start = ($startRange)?$startRange['bdate']:"2006";
		$end = ($endRange) ? $endRange['bdate'] : "2015";
		$response = array();
		for($i = $start;$i<=$end;$i++){
			array_push($response, $i);
		}
		$response = array_reverse ($response);
		return $response;
		
	}
	
	public function checkIfExists($babyId){
		//echo $babyId;
		$from_table = 'tx_tntbabygallery_babies';
		$where_clause = 'tx_tntbabygallery_babies.deleted = 0 and tx_tntbabygallery_babies.hidden = 0 and uid = '.$babyId; 
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTgetSingleRow('*',$from_table,$where_clause,'','','','');
		//print_r($res);
		$count = count($res);		
		if($count > 1) {
			return true;
		}else{
			return false;
		}
	}
	
	public  function updateBaby($insertOrUpdateFields,$data){
		$res = $GLOBALS['TYPO3_DB']->exec_UPDATEquery(
					'tx_tntbabygallery_babies', 
					'uid='.$data.'',
					$insertOrUpdateFields
			);	
		return $res;
	}
	
	public function insertBabies($insertOrUpdateFields){
		$res = $GLOBALS['TYPO3_DB']->exec_INSERTquery(
					'tx_tntbabygallery_babies', 
					$insertOrUpdateFields
			);
		return $res;
	}	
}