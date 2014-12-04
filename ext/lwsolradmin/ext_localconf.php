<?php
if (!defined ('TYPO3_MODE')) {
 	die ('Access denied.');
}

$TYPO3_CONF_VARS['BE']['AJAX']['tx_lwsolradmin::results']     = 'EXT:lwsolradmin/classes/ajax/class.tx_lwsolradmin_results.php:tx_lwsolradmin_results->ajaxGetResults';
?>
