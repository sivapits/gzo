<?php
namespace TYPO3\TntMitarbeiter\Domain\Model;


/***************************************************************
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
 ***************************************************************/

/**
 * Staff
 */
class Staff extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
	public  function getPositions($sid){
		$from_table = "tx_tntmitarbeiter_position";
		if($sid > 0)
			$where_clause = "tx_tntmitarbeiter_position.deleted = 0 and tx_tntmitarbeiter_position.hidden = 0 and tx_tntmitarbeiter_position.pid=$sid";
		else
			$where_clause = "tx_tntmitarbeiter_position.deleted = 0 and tx_tntmitarbeiter_position.hidden = 0";
		$select_fields = "tx_tntmitarbeiter_position.uid,tx_tntmitarbeiter_position.name";
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select_fields, $from_table, $where_clause, NULL, "tx_tntmitarbeiter_position.name ASC");
		$response = ($res) ? $res : $res;
		return $response;
	}
	
	public function getDepartments($sid){
		$from_table = "tx_tntmitarbeiter_departments";
		if($sid > 0)
			$where_clause = "tx_tntmitarbeiter_departments.deleted = 0 and tx_tntmitarbeiter_departments.hidden = 0 and tx_tntmitarbeiter_departments.pid=$sid";
		else
			$where_clause = "tx_tntmitarbeiter_departments.deleted = 0 and tx_tntmitarbeiter_departments.hidden = 0";
		$select_fields = "tx_tntmitarbeiter_departments.uid,tx_tntmitarbeiter_departments.title";
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select_fields, $from_table, $where_clause, NULL, "tx_tntmitarbeiter_departments.title ASC");
		$response = ($res) ? $res : $res;
		return $response;
	}
	
	public  function searchStaffs($settings){
		//echo '<pre>';print_r($settings);exit;
		$limit	      = $settings['limit'] ;
		$orderBy 	= ($settings['sortorder'])?'tx_tntmitarbeiter_persons.'.$settings['sortorder']:'tx_tntmitarbeiter_persons.sorting';
		$orderBy 	.= ($settings['sortby'])?' '.$settings['sortby']:' ASC';
		$from_table =	"tx_tntmitarbeiter_persons";
		//if($settings['department'] != NULL){
		$from_table .= " LEFT JOIN tx_tntmitarbeiter_departments_mm on tx_tntmitarbeiter_departments_mm.uid_local = tx_tntmitarbeiter_persons.uid ";	
		//}
		$pid		= ($settings['resFolder'] !=NULL)?$settings['resFolder']:$GLOBALS['TSFE']->id;		
		$where_clause="tx_tntmitarbeiter_persons.hidden=0 and tx_tntmitarbeiter_persons.deleted=0 and tx_tntmitarbeiter_persons.pid = ".$pid;

		if($settings['searchkey'] != NULL){
			$where_clause .= " AND ( concat (tx_tntmitarbeiter_persons.first_name,' ',tx_tntmitarbeiter_persons.last_name) LIKE '%".$settings['searchkey']."%')";
		}
		
		if($settings['position'] != NULL){
			$positions	= explode(',', $settings['position']);//print_r($positions);
			$where_clause.= " AND (";
			$count = count($positions);
			foreach($positions as $key => $posid){
				if($key ==$count-1){
					$where_clause.= "FIND_IN_SET($posid,tx_tntmitarbeiter_persons.position) )";
				}
				else{
					$where_clause.= "FIND_IN_SET($posid,tx_tntmitarbeiter_persons.position) OR ";
				}
			}
		} 
		//$where_clause.= " AND EXISTS(SELECT NULL FROM tx_tntmitarbeiter_departments_mm WHERE tx_tntmitarbeiter_departments_mm.uid_local = tx_tntmitarbeiter_persons.uid)  ";
		if($settings['department'] != NULL){
			$departments	= explode(',', $settings['department']);//print_r($positions);
			$where_clause.= " AND (";
			$count = count($departments);
			foreach($departments as $key => $depart){
				if($key ==$count-1){
					$where_clause.= "tx_tntmitarbeiter_departments_mm.uid_foreign = $depart) ";
				}
				else{
					$where_clause.= "tx_tntmitarbeiter_departments_mm.uid_foreign = $depart OR ";
				}
			}
		}
		
		if($settings['department'] != NULL || $settings['position'] != NULL || $settings['searchkey'] != NULL){
			$where_clause.= " AND tx_tntmitarbeiter_persons.search_atr != 1";
		}
		
		$select_fields= "DISTINCT(tx_tntmitarbeiter_persons.uid) as emp_id,
					tx_tntmitarbeiter_persons.title as emp_title,
					tx_tntmitarbeiter_persons.title_text,
					tx_tntmitarbeiter_persons.function,
					tx_tntmitarbeiter_persons.first_name,
					tx_tntmitarbeiter_persons.last_name,
					tx_tntmitarbeiter_persons.teasertext,
					tx_tntmitarbeiter_persons.sorting as emp_sort,
					tx_tntmitarbeiter_persons.position,
					tx_tntmitarbeiter_persons.department					
					";
		$groupBy= NULL;
		$GLOBALS['TYPO3_DB']->store_lastBuiltQuery = 1;
		$res =	$GLOBALS['TYPO3_DB']->exec_SELECTgetRows ( $select_fields,
					$from_table,
					$where_clause,
					$groupBy,
					$orderBy,
					$limit
				); 	
		
			//echo $GLOBALS['TYPO3_DB']->debug_lastBuiltQuery;//exit();
		
		//echo '<pre>';print_r($res);exit;
		$response = ($res)?$res:false;
		if($response){
			foreach($response as $key => $value){
				$response[$key]['images'] = $this -> getImagebyUser( $value['emp_id'] );
			}
		}
		if($_SERVER['REMOTE_ADDR'] == "202.191.66.205"){
			//echo $GLOBALS['TYPO3_DB']->debug_lastBuiltQuery;exit();
		}
		//echo '<pre>';print_r($response);exit;
		return $response;
	}
	
	public function getTeam($settings){
		//$orderBy = ($settings['sortorder'])?'tx_tntmitarbeiter_persons.'.$settings['sortorder']:'tx_tntmitarbeiter_persons.sorting';
		//$orderBy .= ($settings['sortby'])?' '.$settings['sortby']:' ASC';
		$from_table =	"tx_tntmitarbeiter_departments_mm
		LEFT JOIN tx_tntmitarbeiter_persons on tx_tntmitarbeiter_persons.uid = tx_tntmitarbeiter_departments_mm.uid_local
		";
		$pid		= ($settings['resFolder'] !=NULL)?$settings['resFolder']:$GLOBALS['TSFE']->id;		
		$where_clause="tx_tntmitarbeiter_departments_mm.uid_foreign = '".$settings['depart']."' and tx_tntmitarbeiter_persons.hidden=0 and tx_tntmitarbeiter_persons.deleted=0 and tx_tntmitarbeiter_persons.pid = ".$pid;

		$select_fields=    "tx_tntmitarbeiter_persons.uid as emp_id,
					tx_tntmitarbeiter_persons.title as emp_title,
					tx_tntmitarbeiter_persons.title_text,
					tx_tntmitarbeiter_persons.first_name,
					tx_tntmitarbeiter_persons.last_name,
					tx_tntmitarbeiter_persons.function,
					tx_tntmitarbeiter_persons.teasertext,
					tx_tntmitarbeiter_persons.sorting as emp_sort,
					tx_tntmitarbeiter_persons.position,
					tx_tntmitarbeiter_persons.department					
					";
		$groupBy= NULL;
		$GLOBALS['TYPO3_DB']->store_lastBuiltQuery = 1;
		$res =	$GLOBALS['TYPO3_DB']->exec_SELECTgetRows ( $select_fields,
					$from_table,
					$where_clause,
					$groupBy,
					"tx_tntmitarbeiter_departments_mm.sorting_foreign ASC"
				); 
		//echo $GLOBALS['TYPO3_DB']->debug_lastBuiltQuery;exit();
		//echo '<pre>';print_r($res);exit;
		$response = ($res)?$res:false;
		if($response){
			foreach($response as $key => $value){
				$response[$key]['images'] = $this -> getImagebyUser( $value['emp_id'] );
			}
		}
		//echo '<pre>';print_r($response);exit;
		return $response;
	}
	
	public function  getTotalResults($settings){
		$limit	      = $settings['limit'] ;
		$from_table =	"tx_tntmitarbeiter_persons";
		$where_clause= "";
		if($settings['resFolder'] != NULL){
			$where_clause="tx_tntmitarbeiter_persons.hidden=0 and tx_tntmitarbeiter_persons.deleted=0 and tx_tntmitarbeiter_persons.pid = ".$settings['resFolder'];
		}
		if($settings['searchkey'] != NULL){
			$where_clause .= " AND ( concat (tx_tntmitarbeiter_persons.first_name,' ',tx_tntmitarbeiter_persons.last_name) LIKE '%".$settings['searchkey']."%')";
		}
		
		if($settings['position'] != NULL){
			$positions	= explode(',', $settings['position']);//print_r($positions);
			$where_clause.= " AND (";
			$count = count($positions);
			foreach($positions as $key => $posid){
				if($key ==$count-1){
					$where_clause.= "FIND_IN_SET($posid,tx_tntmitarbeiter_persons.position) )";
				}
				else{
					$where_clause.= "FIND_IN_SET($posid,tx_tntmitarbeiter_persons.position) OR ";
				}
			}
		}
		if($settings['department'] != NULL){
			$from_table .= " LEFT JOIN tx_tntmitarbeiter_departments_mm on tx_tntmitarbeiter_departments_mm.uid_local = tx_tntmitarbeiter_persons.uid ";	
		}
		if($settings['department'] != NULL){
			$departments	= explode(',', $settings['department']);//print_r($positions);
			$where_clause.= " AND (";
			$count = count($departments);
			foreach($departments as $key => $depart){
				if($key ==$count-1){
					$where_clause.= "tx_tntmitarbeiter_departments_mm.uid_foreign = $depart) ";
				}
				else{
					$where_clause.= "tx_tntmitarbeiter_departments_mm.uid_foreign = $depart OR ";
				}
			}
		}
		
		
		$select_fields=    "distinct(tx_tntmitarbeiter_persons.uid)";
		$GLOBALS['TYPO3_DB']->store_lastBuiltQuery = 1;
		$res =	$GLOBALS['TYPO3_DB']->exec_SELECTgetRows ( $select_fields,
					$from_table,
					$where_clause			
				); 
		if($_SERVER['REMOTE_ADDR'] == ""){
			//echo $GLOBALS['TYPO3_DB']->debug_lastBuiltQuery;exit();
		}
		
		return count($res);
		
	}

		public function getStaffDetails($staffID){
		$from_table     =  "tx_tntmitarbeiter_persons
						LEFT JOIN sys_file_reference ON tx_tntmitarbeiter_persons.uid  = sys_file_reference.uid_foreign
						LEFT JOIN sys_file ON sys_file_reference.uid_local  = sys_file.uid
					";
		$where_clause =   "tx_tntmitarbeiter_persons.deleted = 0 and "
					. "tx_tntmitarbeiter_persons.hidden = 0 and "
					. "tx_tntmitarbeiter_persons.uid='$staffID'";
		$select_fields   =    "tx_tntmitarbeiter_persons.title,"
					. "tx_tntmitarbeiter_persons.uid,"
					. "tx_tntmitarbeiter_persons.first_name,"
					. "tx_tntmitarbeiter_persons.last_name,"
					. "tx_tntmitarbeiter_persons.email,"
					. "tx_tntmitarbeiter_persons.membership,"
					. "tx_tntmitarbeiter_persons.phone,"
					. "tx_tntmitarbeiter_persons.function,"
					. "tx_tntmitarbeiter_persons.title_text,"
					. "tx_tntmitarbeiter_persons.cv,"
					. "tx_tntmitarbeiter_persons.teasertext,"
					. "tx_tntmitarbeiter_persons.position,"
					. "tx_tntmitarbeiter_persons.department,"				
					. "DATE_FORMAT(from_unixtime(tx_tntmitarbeiter_persons.tstamp),'%d.%m.%Y') as jdate";
		$GLOBALS['TYPO3_DB']->store_lastBuiltQuery = 1;
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTgetSingleRow($select_fields, $from_table, $where_clause, NULL, NULL
		);
		///echo $GLOBALS['TYPO3_DB']->debug_lastBuiltQuery;exit();
		
		$response				= ($res) ? $res : $res;
		$response['block_1']	= ($res['email'] != NULL || $res['email'] != NULL)?1:0;
		$response['positions']	= $this -> getPositionsbyId($res['position']);
		$response['departments']= $this -> getDepartmentbyId($res['department']);
		$response['movies']		= $this -> getMoviesbyUser($res['uid']);
		$response['links']		= $this -> getLinksbyUser($res['uid']);
     
		$response['documents']	= $this -> getDocumentsbyUser($res['uid']);
		$response['userImages']	= $this -> getImagebyUser($res['uid']);
		$response['cvdata']		= $this -> getCVdata($res['uid']);
		$response['block_2']	= ($response['cvdata'] != NULL)?1:0;
		$response['title_datas']= $this -> getTitledata($res['uid']);
		$response['block_3']	= ($response['title_datas'] != NULL)?1:0;
		$response['membership_datas']= $this -> getMembershipdata($res['uid']);
		$response['block_4']	= ($response['membership_datas'] != NULL)?1:0;
		//echo '<pre>';print_r($response);exit;
		return $response;
	}
	
	public function getempDetails( $staffID ){
		$from_table     =  "tx_tntmitarbeiter_persons
						LEFT JOIN sys_file_reference ON tx_tntmitarbeiter_persons.uid  = sys_file_reference.uid_foreign
						LEFT JOIN sys_file ON sys_file_reference.uid_local  = sys_file.uid
					";
		$where_clause =   "tx_tntmitarbeiter_persons.deleted = 0 and "
					. "tx_tntmitarbeiter_persons.hidden = 0 and "
					. "tx_tntmitarbeiter_persons.uid='$staffID'";
		$select_fields   =    "tx_tntmitarbeiter_persons.title,"
					. "tx_tntmitarbeiter_persons.uid,"
					. "tx_tntmitarbeiter_persons.first_name,"
					. "tx_tntmitarbeiter_persons.last_name,"
					. "tx_tntmitarbeiter_persons.teasertext";
					
		//$GLOBALS['TYPO3_DB']->store_lastBuiltQuery = 1;
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTgetSingleRow($select_fields, $from_table, $where_clause, NULL, NULL
		);
		///echo $GLOBALS['TYPO3_DB']->debug_lastBuiltQuery;exit();
		
		$response				= ($res) ? $res : $res;
		$response['userImages']	= $this -> getImagebyUser($res['uid']);
		//echo '<pre>';print_r($response);exit;
		return $response;
	}
	
	public function getPositionsbyId($positionID){
		
		$from_table = "tx_tntmitarbeiter_position";
		if($positionID){
			$where_clause = "tx_tntmitarbeiter_position.deleted = 0 and tx_tntmitarbeiter_position.hidden = 0 and tx_tntmitarbeiter_position.uid in ($positionID)";
		
		$select_fields = "tx_tntmitarbeiter_position.name,tx_tntmitarbeiter_position.uid";
		
		$GLOBALS['TYPO3_DB']->store_lastBuiltQuery = 1;
		
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select_fields, $from_table, $where_clause, NULL, "tx_tntmitarbeiter_position.name ASC");
		//echo $GLOBALS['TYPO3_DB']->debug_lastBuiltQuery;exit();
		}
		$response = ($res) ? $res : NULL;
		//echo '<pre>';print_r($response);exit;
		return $response;
	}
	
	public function getDepartmentbyId($departmentID){
		$from_table = "tx_tntmitarbeiter_departments";
		if($departmentID){
			$where_clause = "tx_tntmitarbeiter_departments.deleted = 0 and tx_tntmitarbeiter_departments.hidden = 0 and tx_tntmitarbeiter_departments.uid in ($departmentID)";
		
		$select_fields = "tx_tntmitarbeiter_departments.title,tx_tntmitarbeiter_departments.uid";
		
		$GLOBALS['TYPO3_DB']->store_lastBuiltQuery = 1;
		
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select_fields, $from_table, $where_clause, NULL, "tx_tntmitarbeiter_departments.title ASC");
		//echo $GLOBALS['TYPO3_DB']->debug_lastBuiltQuery;exit();
		}
		$response = ($res) ? $res : NULL;
		//echo '<pre>';print_r($response);exit;
		return $response;
	}
	public function getCVdata($uid){
		$from_table = "tx_tntmitarbeiter_cv_data";
		if($uid){
			$where_clause = "tx_tntmitarbeiter_cv_data.deleted = 0 and tx_tntmitarbeiter_cv_data.hidden = 0 and tx_tntmitarbeiter_cv_data.uid_local = $uid";
		$select_fields = "tx_tntmitarbeiter_cv_data.title,tx_tntmitarbeiter_cv_data.cvdata";
		$GLOBALS['TYPO3_DB']->store_lastBuiltQuery = 1;
		
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select_fields, $from_table, $where_clause, NULL, "tx_tntmitarbeiter_cv_data.sorting ASC");
		//echo $GLOBALS['TYPO3_DB']->debug_lastBuiltQuery;exit();
		}
		$response = ($res) ? $res : NULL;
		//echo '<pre>';print_r($response);exit;
		return $response;
	}
	
	public function getTitledata($uid){
		$from_table = "tx_tntmitarbeiter_titletext_data ";
		if($uid){
			$where_clause = "tx_tntmitarbeiter_titletext_data .deleted = 0 and tx_tntmitarbeiter_titletext_data .hidden = 0 and tx_tntmitarbeiter_titletext_data .uid_local = $uid";
		$select_fields = "tx_tntmitarbeiter_titletext_data .title,tx_tntmitarbeiter_titletext_data .title_data";
		$GLOBALS['TYPO3_DB']->store_lastBuiltQuery = 1;
		
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select_fields, $from_table, $where_clause, NULL, "tx_tntmitarbeiter_titletext_data .sorting ASC");
		//echo $GLOBALS['TYPO3_DB']->debug_lastBuiltQuery;exit();
		}
		$response = ($res) ? $res : NULL;
		//echo '<pre>';print_r($response);exit;
		return $response;
	}
	
	public function getMoviesbyUser($uid){
		$from_table = "tx_tntmitarbeiter_videos";
		if($uid){
			$where_clause = "tx_tntmitarbeiter_videos.deleted = 0 and tx_tntmitarbeiter_videos.hidden = 0 and tx_tntmitarbeiter_videos.uid_local = $uid";
		$select_fields = "tx_tntmitarbeiter_videos.title,tx_tntmitarbeiter_videos.link";
		$GLOBALS['TYPO3_DB']->store_lastBuiltQuery = 1;
		
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select_fields, $from_table, $where_clause, NULL, "tx_tntmitarbeiter_videos.sorting ASC");
		//echo $GLOBALS['TYPO3_DB']->debug_lastBuiltQuery;exit();
		}
		$response = ($res) ? $res : NULL;
		//echo '<pre>';print_r($response);exit;
		return $response;
	}
	
	public function getLinksbyUser($uid){
		$from_table = "tx_tntmitarbeiter_links";
		if($uid){
			$where_clause = "tx_tntmitarbeiter_links.deleted = 0 and tx_tntmitarbeiter_links.hidden = 0 and tx_tntmitarbeiter_links.uid_local = $uid";
		$select_fields = "tx_tntmitarbeiter_links.title,
							tx_tntmitarbeiter_links.link,
							tx_tntmitarbeiter_links.target";
		$GLOBALS['TYPO3_DB']->store_lastBuiltQuery = 1;
		
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select_fields, $from_table, $where_clause, NULL, "tx_tntmitarbeiter_links.uid ASC");
		//echo $GLOBALS['TYPO3_DB']->debug_lastBuiltQuery;exit();
		}
		$response = ($res) ? $res : NULL;
		//echo '<pre>';print_r($response);exit;
		return $response;
	}
	
	public function getMembershipdata($uid){
		$from_table = "tx_tntmitarbeiter_membership_data ";
		if($uid){
			$where_clause = " tx_tntmitarbeiter_membership_data .deleted = 0 and  tx_tntmitarbeiter_membership_data .hidden = 0 and  tx_tntmitarbeiter_membership_data .uid_local = $uid";
		$select_fields = " tx_tntmitarbeiter_membership_data .title, tx_tntmitarbeiter_membership_data .membership_details";
		$GLOBALS['TYPO3_DB']->store_lastBuiltQuery = 1;
		
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select_fields, $from_table, $where_clause, NULL, " tx_tntmitarbeiter_membership_data.sorting ASC");
		//echo $GLOBALS['TYPO3_DB']->debug_lastBuiltQuery;exit();
		}
		$response = ($res) ? $res : NULL;
		//echo '<pre>';print_r($response);exit;
		return $response;
	}
	
	public  function getDocumentsbyUser($uid){
		$from_table = "	sys_file_reference
					LEFT JOIN sys_file ON sys_file_reference.uid_local  = sys_file.uid
					LEFT JOIN sys_file_metadata ON sys_file.uid  = sys_file_metadata.file
				";
		if($uid){
			$where_clause	= "sys_file_reference.deleted = 0 and sys_file_reference.hidden = 0 and sys_file_reference.uid_foreign = $uid "
						. " and sys_file_reference.fieldname = 'documents' and sys_file_reference.tablenames = 'tx_tntmitarbeiter_persons'";
			$select_fields	= "CONCAT('fileadmin',sys_file.identifier) as docPath,"
						   . "sys_file.extension,"
						   . "sys_file.size,"
						   . "sys_file_reference.title,"
						   . "sys_file_metadata.title as metatitle";
		$GLOBALS['TYPO3_DB']->store_lastBuiltQuery = 1;
		
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select_fields, $from_table, $where_clause, NULL, "sys_file_reference.sorting ASC");
		//echo $GLOBALS['TYPO3_DB']->debug_lastBuiltQuery;exit();
		}
		$response = ($res) ? $res : NULL;
		//echo '<pre>';print_r($response);exit;
		return $response;
	}
	
	public  function getImagebyUser($uid){
		$from_table = "	sys_file_reference
					LEFT JOIN sys_file ON sys_file_reference.uid_local  = sys_file.uid";
		if($uid){
			$where_clause	= "sys_file_reference.deleted = 0 and sys_file_reference.hidden = 0 and sys_file_reference.uid_foreign = $uid "
						. " and (sys_file_reference.fieldname = 'image_sw' OR sys_file_reference.fieldname = 'image_colour') and sys_file_reference.tablenames = 'tx_tntmitarbeiter_persons'";
			$select_fields	= "sys_file_reference.uid as refID,CONCAT('fileadmin',sys_file.identifier) as profImg,"
						   . "sys_file.extension,"
						   . "sys_file.size,"
						   . "sys_file_reference.fieldname";
		$GLOBALS['TYPO3_DB']->store_lastBuiltQuery = 1;
		
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select_fields, $from_table, $where_clause, NULL, "sys_file_reference.sorting ASC");
		//echo $GLOBALS['TYPO3_DB']->debug_lastBuiltQuery;exit();
		}
		$response = ($res) ? $res : $res;
		$arrCount	=	count($response);
		if($arrCount == 0){
			$response[0]['profImg']	 = 'typo3conf/ext/tnt_mitarbeiter/Resources/Public/Icons/default.jpg';
			$response[0]['fieldname']= 'image_colour';
			$response[1]['profImg']	 = 'typo3conf/ext/tnt_mitarbeiter/Resources/Public/Icons/default.jpg';
			$response[1]['fieldname']= 'image_sw';
		}
		else{
			//echo '<pre>';print_r($response);exit;
			//foreach($response as $key => $value){
			//	echo $value;
			//}exit;
		}
		//echo '<pre>';print_r($response);exit;
		return $response;
	}
}