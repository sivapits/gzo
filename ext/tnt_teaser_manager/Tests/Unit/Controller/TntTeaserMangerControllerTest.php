<?php
namespace TYPO3\TntTeaserManager\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Abin Sabu <abin.s@tnt-graphics.com>, TNT-Graphics
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
 * Test case for class TYPO3\TntTeaserManager\Controller\TntTeaserMangerController.
 *
 * @author Abin Sabu <abin.s@tnt-graphics.com>
 */
class TntTeaserMangerControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \TYPO3\TntTeaserManager\Controller\TntTeaserMangerController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('TYPO3\\TntTeaserManager\\Controller\\TntTeaserMangerController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllTntTeaserMangersFromRepositoryAndAssignsThemToView() {

		$allTntTeaserMangers = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$tntTeaserMangerRepository = $this->getMock('', array('findAll'), array(), '', FALSE);
		$tntTeaserMangerRepository->expects($this->once())->method('findAll')->will($this->returnValue($allTntTeaserMangers));
		$this->inject($this->subject, 'tntTeaserMangerRepository', $tntTeaserMangerRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('tntTeaserMangers', $allTntTeaserMangers);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenTntTeaserMangerToView() {
		$tntTeaserManger = new \TYPO3\TntTeaserManager\Domain\Model\TntTeaserManger();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('tntTeaserManger', $tntTeaserManger);

		$this->subject->showAction($tntTeaserManger);
	}
}
