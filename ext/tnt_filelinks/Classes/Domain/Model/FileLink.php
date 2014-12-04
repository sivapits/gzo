<?php

namespace TYPO3\TntFilelinks\Domain\Model;

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
 * FileLink
 */
class FileLink extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

    public function doGetFiles($reffernceId) {
        $select_fields = '*,sf.identifier';
        $from_table = 'sys_file AS sf LEFT JOIN sys_file_reference AS sfr ON sfr.uid_local = sf.uid';
        $whereClause = 'FIND_IN_SET(sfr.uid,"'.$reffernceId.'") AND sfr.deleted = 0 AND sfr.hidden = 0';
        $GLOBALS['TYPO3_DB']->store_lastBuiltQuery = 1;
        $fileDetails = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select_fields, $from_table, $whereClause, $groupBy = '', $orderBy = '', $limit = '', $uidIndexField = '');
        return $fileDetails;
    }

    public function doGetFile($request) {
        $uid = $request['fileId'];
        $select_fields = '*';
        $from_table = 'sys_file';
        $whereClause = "uid = " . $uid;
        $GLOBALS['TYPO3_DB']->store_lastBuiltQuery = 1;
        $singleFile = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select_fields, $from_table, $whereClause, $groupBy = '', $orderBy = '', $limit = '', $uidIndexField = '');
        $path = $_SERVER['DOCUMENT_ROOT'] . "/fileadmin" . $singleFile[0]['identifier'];
        return $path;
    }

}
