<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "templavoila".
 *
 * Auto generated 05-08-2014 12:24
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'TemplaVoila!',
	'description' => 'Point-and-click, popular and easy template engine for TYPO3. Public free support is provided only through TYPO3 mailing lists! Contact by e-mail for commercial support.',
	'category' => 'misc',
	'shy' => true,
	'version' => '1.9.2',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => 'cm1,cm2,mod1,mod2',
	'state' => 'stable',
	'uploadfolder' => true,
	'createDirs' => 'uploads/tx_templavoila/',
	'modify_tables' => 'pages,tt_content,be_groups',
	'clearcacheonload' => true,
	'lockType' => '',
	'author' => 'TYPO3 Release Team',
	'author_email' => 'typo3v4@typo3.org',
	'author_company' => '',
	'CGLcompliance' => NULL,
	'CGLcompliance_note' => NULL,
	'constraints' => 
	array (
		'depends' => 
		array (
			'php' => '5.3.0-0.0.0',
			'typo3' => '4.5.0-6.2.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

?>