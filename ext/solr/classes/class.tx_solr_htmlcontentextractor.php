<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011-2012 Ingo Renner <ingo.renner@dkd.de>
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
 * A content extractor to get clean, indexable content from HTML markup.
 *
 * @author	Ingo Renner <ingo.renner@dkd.de>
 * @package	TYPO3
 * @subpackage	solr
 */
class tx_solr_HtmlContentExtractor {

	/**
	 * The raw HTML markup content to extract clean content from.
	 *
	 * @var	string
	 */
	protected $content;

	/**
	 * Mapping of HTML tags to Solr document fields.
	 *
	 * @var	array
	 */
	protected $tagToFieldMapping = array(
		'h1'     => 'tagsH1',
		'h2'     => 'tagsH2H3',
		'h3'     => 'tagsH2H3',
		'h4'     => 'tagsH4H5H6',
		'h5'     => 'tagsH4H5H6',
		'h6'     => 'tagsH4H5H6',
		'u'      => 'tagsInline',
		'b'      => 'tagsInline',
		'strong' => 'tagsInline',
		'i'      => 'tagsInline',
		'em'     => 'tagsInline',
		'a'      => 'tagsA',
	);


	/**
	 * Constructor.
	 *
	 * @param	string	Content HTML markup
	 */
	public function __construct($content) {
		$this->content = $content;
	}

	/**
	 * Returns the cleaned indexable content from the page's HTML markup.
	 *
	 * The content is cleaned from HTML tags and control chars Solr could
	 * stumble on.
	 *
	 * @return	string	Indexable, cleaned content ready for indexing.
	 */
	public function getIndexableContent() {
		$content = self::cleanContent($this->content);
		$content = html_entity_decode($content, ENT_QUOTES, 'UTF-8');
			// after entity decoding we might have tags again
		$content = strip_tags($content);
		$content = trim($content);

		return $content;
	}

	/**
	 * Strips control characters that cause Jetty/Solr to fail.
	 *
	 * @param	string	the content to sanitize
	 * @return	string	the sanitized content
	 * @see	http://w3.org/International/questions/qa-forms-utf-8.html
	 */
	public static function stripControlCharacters($content) {
			// Printable utf-8 does not include any of these chars below x7F
		return preg_replace('@[\x00-\x08\x0B\x0C\x0E-\x1F]@', ' ', $content);
	}

	/**
	 * Strips html tags, and tab, new-line, carriage-return, &nbsp; whitespace
	 * characters.
	 *
	 * @param	string	String to clean
	 * @return	string	String cleaned from tags and special whitespace characters
	 */
	public static function cleanContent($content) {
		$content = self::stripControlCharacters($content);

			// remove Javascript
		$content = preg_replace('@<script[^>]*>.*?<\/script>@msi', '', $content);

			// remove internal CSS styles
		$content = preg_replace('@<style[^>]*>.*?<\/style>@msi', '', $content);

			// prevents concatenated words when stripping tags afterwards
		$content = str_replace(array('<', '>'), array(' <', '> '), $content);
		$content = strip_tags($content);
		$content = str_replace(array("\t", "\n", "\r", '&nbsp;'), ' ', $content);
		$content = trim($content);

		return $content;
	}

	/**
	 * Extracts HTML tag content from tags in the content marked for indexing.
	 *
	 * @return	array	A mapping of Solr document field names to content found in defined tags.
	 */
	public function getTagContent() {
		$result  = array();
		$matches = array();
		$content = $this->getContentMarkedForIndexing();

			// strip all ignored tags
		$content = strip_tags(
			$content,
			'<' . implode('><', array_keys($this->tagToFieldMapping)) . '>'
		);

		preg_match_all(
			'@<('. implode('|', array_keys($this->tagToFieldMapping)) .')[^>]*>(.*)</\1>@Ui',
			$content,
			$matches
		);
		foreach ($matches[1] as $key => $tag) {
				// We don't want to index links auto-generated by the url filter.
			if ($tag != 'a' || !preg_match('@(?:http://|https://|ftp://|mailto:|smb://|afp://|file://|gopher://|news://|ssl://|sslv2://|sslv3://|tls://|tcp://|udp://|www\.)[a-zA-Z0-9]+@', $matches[2][$key])) {
				$result[$this->tagToFieldMapping[$tag]] .= ' '. $matches[2][$key];
			}
		}

		return $result;
	}

}


if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/solr/classes/class.tx_solr_htmlcontentextractor.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/solr/classes/class.tx_solr_htmlcontentextractor.php']);
}

?>