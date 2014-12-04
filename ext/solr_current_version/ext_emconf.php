<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "solr".
 *
 * Auto generated 27-08-2014 14:18
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Apache Solr for TYPO3 - Enterprise Search',
	'description' => 'Apache Solr for TYPO3 is the enterprise search server you were looking for with special features such as Facetted Search or Synonym Support and incredibly fast response times of results within milliseconds.',
	'category' => 'plugin',
	'version' => '2.8.3',
	'state' => 'excludeFromUpdates',
	'uploadfolder' => 0,
	'createDirs' => '',
	'clearcacheonload' => 0,
	'author' => 'Ingo Renner',
	'author_email' => 'ingo@typo3.org',
	'author_company' => 'dkd Internet Service GmbH',
	'constraints' => 
	array (
		'depends' => 
		array (
			'php' => '5.2.0-0.0.0',
			'typo3' => '4.5.0-6.1.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

