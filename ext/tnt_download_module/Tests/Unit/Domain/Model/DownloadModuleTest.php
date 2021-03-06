<?php

namespace TYPO3\TntDownloadModule\Tests;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Abin Sabu <abin.s@pitsolutions.com>, PITSolutions Pvt Ltd
 *  			
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \TYPO3\TntDownloadModule\Domain\Model\DownloadModule.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage TNT Download Module
 *
 * @author Abin Sabu <abin.s@pitsolutions.com>
 */
class DownloadModuleTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \TYPO3\TntDownloadModule\Domain\Model\DownloadModule
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \TYPO3\TntDownloadModule\Domain\Model\DownloadModule();
	}

	public function tearDown() {
		unset($this->fixture);
	}
	
	/**
	 * @test
	 */
	public function dummyTestToNotLeaveThisFileEmpty() {
		$this->markTestIncomplete();
	}
	
}
?>