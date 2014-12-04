<?php
namespace TYPO3\TntTeaserManager\Domain\Model;


/***************************************************************
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
 ***************************************************************/

/**
 * TntTeaserManger
 */
class TntTeaserManger extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
    
    /**
     * function  doGetAllContentElemets get all the content element ids in a page
     *
     * @return $contentElementId
     */
    public function doGetAllContentElemets( $pageIds ) {
        $lang = $GLOBALS['TSFE']->sys_language_uid;
        $select_fields = 'uid,tx_templavoila_flex';
        $from_table = 'tt_content AS sfm';
        $whereClause = 'FIND_IN_SET( pid,"' . $pageIds . '") AND deleted = 0 AND hidden = 0 AND CType =  "templavoila_pi1"';
        $GLOBALS['TYPO3_DB']->store_lastBuiltQuery = 1;
        $pageContentElements = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select_fields, $from_table, $whereClause, $groupBy = '', $orderBy = '', $limit = '', $uidIndexField = '');
        //echo $GLOBALS['TYPO3_DB']->debug_lastBuiltQuery ;
        return $pageContentElements;
        
    }

	
}