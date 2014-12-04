<?php
namespace AOE\Linkhandler;

/***************************************************************
 *  Copyright notice
 *
 *  Copyright (c) 2008, Daniel Pötzinger <daniel.poetzinger@aoemedia.de>
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
 * Tabhandler interface
 *
 * @author Daniel Poetzinger (AOE media GmbH)
 * @package Linkhandler
 */
interface TabHandlerInterface {

	/**
	 * Constructor for the tabHandler. Normally used to sets some internal vars
	 *
	 * @param \TYPO3\CMS\Recordlist\Browser\ElementBrowser $browseLinksObj
	 * @param string $addPassOnParams
	 * @param array $configuration
	 * @param string $currentLinkValue
	 * @param bool $isRte
	 * @param int $currentPid
	 */
	public function __construct(\TYPO3\CMS\Recordlist\Browser\ElementBrowser $browseLinksObj, $addPassOnParams, $configuration, $currentLinkValue, $isRte, $currentPid);

	/**
	 * should return the correct info array that is required for the link wizard.
	 * It should detect if the current value is a link where this tabHandler should be responsible.
	 * else it should return a emty array
	 *
	 * @param string $href
	 * @param array $tabsConfig
	 * @return array
	 */
	static public function getLinkBrowserInfoArray($href, $tabsConfig);

	/**
	 * returns a new tab for the browse links wizard
	 *
	 * @param string current link selector action
	 * @return string a tab for the selected link action
	 */
	public function getTabContent();
}
