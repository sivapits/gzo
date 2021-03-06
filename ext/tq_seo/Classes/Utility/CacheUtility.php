<?php
namespace TQ\TqSeo\Utility;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Markus Blaschke (TEQneers GmbH & Co. KG) <blaschke@teqneers.de>
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
 * Cache utility
 *
 * @author      Blaschke, Markus <blaschke@teqneers.de>
 * @package     tq_seo
 * @subpackage  Utility
 * @version     $Id: CacheUtility.php 81080 2013-10-28 09:54:33Z mblaschke $
 */
class CacheUtility {

    /**
     * Get cache entry
     *
     * @param   integer $pageId     Page UID
     * @param   string $section    Cache section
     * @param   string $identifier Cache identifier
     * @return  string
     */
    static public function get($pageId, $section, $identifier) {
        $ret = NULL;

        $query = 'SELECT cache_content FROM tx_tqseo_cache
                    WHERE page_uid = ' . (int)$pageId . '
                      AND cache_section = ' . $GLOBALS['TYPO3_DB']->fullQuoteStr($section, 'tx_tqseo_cache') . '
                      AND cache_identifier = ' . $GLOBALS['TYPO3_DB']->fullQuoteStr($identifier, 'tx_tqseo_cache');
        $res   = $GLOBALS['TYPO3_DB']->sql_query($query);

        if ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
            $ret = $row['cache_content'];
        }

        return $ret;
    }

    /**
     * Set cache entry
     *
     * @param   integer $pageId     Page UID
     * @param   string  $section    Cache section
     * @param   string  $identifier Cache identifier
     * @param   string  $value      Cache content
     * @return  boolean
     */
    static public function set($pageId, $section, $identifier, $value) {
        $query = 'INSERT INTO tx_tqseo_cache (page_uid, cache_section, cache_identifier, cache_content)
                    VALUES(
                        ' . (int)$pageId . ',
                        ' . $GLOBALS['TYPO3_DB']->fullQuoteStr($section, 'tx_tqseo_cache') . ',
                        ' . $GLOBALS['TYPO3_DB']->fullQuoteStr($identifier, 'tx_tqseo_cache') . ',
                        ' . $GLOBALS['TYPO3_DB']->fullQuoteStr($value, 'tx_tqseo_cache') . '
                    ) ON DUPLICATE KEY UPDATE cache_content = ' . $GLOBALS['TYPO3_DB']->fullQuoteStr($value, 'tx_tqseo_cache');
        $res   = $GLOBALS['TYPO3_DB']->sql_query($query);

        if ($res) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Get cache list
     *
     * @param   string $section    Cache section
     * @param   string $identifier Cache identifier
     * @return  array
     */
    static public function getList($section, $identifier) {
        $ret = array();

        $query = 'SELECT page_uid, cache_content FROM tx_tqseo_cache
                    WHERE cache_section = ' . $GLOBALS['TYPO3_DB']->fullQuoteStr($section, 'tx_tqseo_cache') . '
                      AND cache_identifier = ' . $GLOBALS['TYPO3_DB']->fullQuoteStr($identifier, 'tx_tqseo_cache');
        $res   = $GLOBALS['TYPO3_DB']->sql_query($query);

        while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
            $ret[$row['page_uid']] = $row['cache_content'];
        }

        return $ret;
    }

    /**
     * Clear cache entry
     *
     * @param   integer $pageId     Page UID
     * @param   string  $section    Cache section
     * @param   string  $identifier Cache identifier
     * @return  boolean
     */
    static public function remove($pageId, $section, $identifier) {
        $pageId     = (int)$pageId;
        $section    = $GLOBALS['TYPO3_DB']->fullQuoteStr($section, 'tx_tqseo_cache');
        $identifier = $GLOBALS['TYPO3_DB']->fullQuoteStr($identifier, 'tx_tqseo_cache');

        $query = 'DELETE FROM tx_tqseo_cache
                    WHERE page_uid = ' . (int)$pageId . '
                      AND cache_section = ' . $GLOBALS['TYPO3_DB']->fullQuoteStr($section, 'tx_tqseo_cache') . '
                      AND cache_identifier = ' . $GLOBALS['TYPO3_DB']->fullQuoteStr($identifier, 'tx_tqseo_cache');
        $res   = $GLOBALS['TYPO3_DB']->sql_query($query);

        if ($res) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Clear cache by page
     *
     * @param   integer $pageId Page UID
     * @return  boolean
     */
    static public function clearByPage($pageId) {
        $query = 'DELETE FROM tx_tqseo_cache
                    WHERE page_uid = ' . (int)$pageId;
        $res   = $GLOBALS['TYPO3_DB']->sql_query($query);

        if ($res) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Clear cache by section
     *
     * @param   string $section    Cache section
     * @return  boolean
     */
    static public function clearBySection($section) {
        $query = 'DELETE FROM tx_tqseo_cache
                    WHERE cache_section = ' . $GLOBALS['TYPO3_DB']->fullQuoteStr($section, 'tx_tqseo_cache');
        $res   = $GLOBALS['TYPO3_DB']->sql_query($query);

        if ($res) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Clear all cache
     *
     * @return boolean
     */
    static public function clearAll() {
        $query = 'TRUNCATE tx_tqseo_cache';
        $res   = $GLOBALS['TYPO3_DB']->sql_query($query);

        if ($res) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
