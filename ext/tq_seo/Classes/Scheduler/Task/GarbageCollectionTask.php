<?php
namespace TQ\TqSeo\Scheduler\Task;

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
 * Scheduler Task Garbage Collection
 *
 * @author      Blaschke, Markus <blaschke@teqneers.de>
 * @package     tq_seo
 * @subpackage  lib
 * @version     $Id: GarbageCollectionTask.php 81080 2013-10-28 09:54:33Z mblaschke $
 */
class GarbageCollectionTask extends \TYPO3\CMS\Scheduler\Task\AbstractTask {

    /**
     * Execute task
     *
     * @return  boolean
     */
    public function execute() {

        // Expire sitemap entries
        \TQ\TqSeo\Utility\SitemapUtility::expire();

        return TRUE;
    }

}
