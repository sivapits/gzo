<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "k23_imagecrop".
 *
 * Auto generated 20-09-2014 14:26
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'KERN23 Image Crop (with Presets)',
	'description' => 'Simply crop Images in File Module. Admin can set multiple presets with preview overlay and resizing for cropping. Overlay can be merged to the cropped image.',
	'category' => 'be',
	'version' => '1.6.1',
	'state' => 'stable',
	'uploadfolder' => true,
	'createDirs' => '',
	'clearcacheonload' => true,
	'author' => 'Hendrik Reimers (kern23.de)',
	'author_email' => 'kontakt@kern23.de',
	'author_company' => 'KERN23',
	'constraints' => 
	array (
		'depends' => 
		array (
			'extbase' => '6.0.0-6.2.99',
			'fluid' => '6.0.0-6.2.99',
			'typo3' => '6.0.0-6.2.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

