<?php

namespace TYPO3\TntDiseases\Domain\Model;

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
 * Diseases
 */
class Diseases extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

    /**
     * doGetRegionOptions
     * 
     * 
     */
    public function doGetRegionOptions($enableFields) {
        $lang = $GLOBALS['TSFE']->sys_language_uid;
        $select_fields = 'uid,region_title';
        $from_table = 'tx_tntdiseases_domain_model_region';
        $whereClause = 'sys_language_uid = 0 ' . $enableFields;
        $GLOBALS['TYPO3_DB']->store_lastBuiltQuery = 1;
        $regionOptions = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select_fields, $from_table, $whereClause, $groupBy = '', $orderBy = 'tx_tntdiseases_domain_model_region.region_title ASC', $limit = '', $uidIndexField = '');
        return $regionOptions;
    }

    /**
     * doGetDiseases
     * 
     * 
     */
    public function doGetDiseases($arguments, $flexSettings, $enableFields) {
        $genderOption = $arguments['genderOption'];
        $regionOption = $arguments['regionOption'];
        $recordPid = $arguments['recordPid'];
        $pageOption = '';
        $categoryOption = '';
        if($arguments['viewType'] != 1){
           $pageOption = (!empty($arguments['pageOption'])) ? $arguments['pageOption'] : $flexSettings['pageOption'];
           $categoryOption = (!empty($arguments['categoryOption'])) ? $arguments['categoryOption'] : $flexSettings['categoryOption'];
        }
        $wherePage = '';
        $whereCategory = '';
        $whereRegion = '';
        $whereRecordPage = '';
        if (!empty( $recordPid )) {
            $whereRecordPage = 'FIND_IN_SET( tx_tntdiseases_domain_model_diseases.pid,"' . $recordPid . '")';
            //$whereRecordPage = "tx_tntdiseases_domain_model_diseases.pid = ".$recordPid;
        }
        if (!empty( $regionOption )) {
            $whereRegion = " AND (FIND_IN_SET('" . $regionOption . "',tx_tntdiseases_domain_model_diseases.region))";
        }
        if (!empty( $genderOption )) {
            $whereGender = ' AND (tx_tntdiseases_domain_model_diseases.gender = 3 OR tx_tntdiseases_domain_model_diseases.gender = ' . $genderOption . ')';
        }
        if (!empty($pageOption)) {
            $pageOption = explode(',', $pageOption);
            $_wherePage = '';
            $wherePage = '';
            foreach ($pageOption as $key => $value) {
                $_wherePage .= "FIND_IN_SET('" . $value . "',tx_tntdiseases_domain_model_diseases.pages) OR ";
            }
            $wherePage = ' AND (' . rtrim($_wherePage, 'OR ') . ')';
        }

        if (!empty($categoryOption)) {

            $categoryOption = explode(',', $categoryOption);
            $_whereCategory = '';
            foreach ($categoryOption as $key => $value) {
                $_whereCategory .= "FIND_IN_SET('" . $value . "',tx_tntdiseases_domain_model_diseases.category_type) OR ";
            }
            $whereCategory = ' AND (' . rtrim($_whereCategory, 'OR ') . ')';
        }
        $select_fields = '*';
        $from_table = 'tx_tntdiseases_domain_model_diseases';
        $whereClause = $whereRecordPage . $whereGender . $whereRegion . $wherePage . $whereCategory . $enableFields;
        $whereClause = ltrim($whereClause, " AND");
        $GLOBALS['TYPO3_DB']->store_lastBuiltQuery = 1;
        $diseaseList = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select_fields, $from_table, $whereClause, $groupBy = '', $orderBy = 'tx_tntdiseases_domain_model_diseases.title ASC', $limit = '', $uidIndexField = '');
       
       /* if($_SERVER['REMOTE_ADDR'] == '202.88.237.233'){
            echo $GLOBALS['TYPO3_DB']->debug_lastBuiltQuery;
        }*/
      #echo $GLOBALS['TYPO3_DB']->debug_lastBuiltQuery;

        return $diseaseList;
    }

    /*
     * doGetSingleDisease
     */

    public function doGetSingleDisease($diseaseId) {

        $lang = $GLOBALS['TSFE']->sys_language_uid;
        $select_fields = '*';
        $from_table = 'tx_tntdiseases_domain_model_diseases';
        $whereClause = 'tx_tntdiseases_domain_model_diseases.uid = ' . $diseaseId;
        $GLOBALS['TYPO3_DB']->store_lastBuiltQuery = 1;
        $diseaseDetailsRaw = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select_fields, $from_table, $whereClause, $groupBy = '', $orderBy = '', $limit = '', $uidIndexField = '');
        $diseaseDetails['images'] = $this->doGetImages($diseaseId);
        $diseaseDetails['data'] = $diseaseDetailsRaw[0];
        return $diseaseDetails;
    }

    /*
     * doGetImages
     * 
     */

    public function doGetImages($diseaseId) {
        $select_fields = '*';
        $from_table = 'sys_file AS sf LEFT JOIN sys_file_reference AS sfr ON sfr.uid_local = sf.uid';
        $whereClause = 'sfr.uid_foreign = ' . $diseaseId . ' AND sfr.tablenames = "tx_tntdiseases_domain_model_diseases" AND sfr.deleted = 0 AND sfr.hidden = 0';
        $GLOBALS['TYPO3_DB']->store_lastBuiltQuery = 1;
        $diseaseImageDetails = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select_fields, $from_table, $whereClause, $groupBy = '', $orderBy = '', $limit = '', $uidIndexField = '');
        foreach ($diseaseImageDetails as $key => $value) {
            if ($value['fieldname'] == 'start_image') {
                $diseaseStartImageDetails['start_image_identifier'] = 'fileadmin' . $value['identifier'];
                $diseaseStartImageDetails['start_image_title'] = $value['title'];
                $diseaseStartImageDetails['start_image_description'] = $value['description'];
            } else {
                $diseaseGalleryImageDetails[$key]['image_identifier'] = 'fileadmin' . $value['identifier'];
                $diseaseGalleryImageDetails[$key]['image_title'] = $value['title'];
                $diseaseGalleryImageDetails[$key]['image_description'] = $value['description'];
            }
        }
        $ImageDetails['start_image'] = $diseaseStartImageDetails;
        $ImageDetails['gallery_image'] = $diseaseGalleryImageDetails;
        return $ImageDetails;
    }
    /*
     * doGetHeaderImages
     * 
     */
     
     public function doGetHeaderImage( $reffernceId ){
		$select_fields = '*';
        $from_table = 'sys_file AS sf LEFT JOIN sys_file_reference AS sfr ON sfr.uid_local = sf.uid';
        $whereClause = 'sfr.uid = ' . $reffernceId . ' AND sfr.deleted = 0 AND sfr.hidden = 0';
        $GLOBALS['TYPO3_DB']->store_lastBuiltQuery = 1;
        $headerImageDetails = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select_fields, $from_table, $whereClause, $groupBy = '', $orderBy = '', $limit = '', $uidIndexField = '');
		return $headerImageDetails[0];
	 }
}
