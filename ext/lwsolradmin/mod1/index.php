<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2010 Pim Snel <pim@lingewoud.nl>
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
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 * Hint: use extdeveval to insert/update function index above.
 */


$LANG->includeLLFile('EXT:lwsolradmin/mod1/locallang.xml');
require_once(PATH_t3lib . 'class.t3lib_scbase.php');
$BE_USER->modAccess($MCONF,1);	// This checks permissions and exits if the users has no permission for entry.
// DEFAULT initialization of a module [END]

/**
 * Module 'Solr Admin' for the 'lwsolradmin' extension.
 *
 * @author	Pim Snel <pim@lingewoud.nl>
 * @package	TYPO3
 * @subpackage	tx_lwsolradmin
 */
class  tx_lwsolradmin_module1 extends t3lib_SCbase {

	public $solrHost = '';
	public $solrPort = '';
	public $solrPath = '';

	var $extKey = 'lwsolradmin';

	protected $solr  = null;

	var $pageinfo;

	/**
	 * Initializes the Module
	 * @return	void
	 */
	function init()	{
		global $BE_USER,$LANG,$BACK_PATH,$TCA_DESCR,$TCA,$CLIENT,$TYPO3_CONF_VARS;

		$this->extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$this->extKey]);
		$this->extjsenable = $this->extConf['extjsenable'];
		$this->setSolrExtVersion();
		parent::init();
	}


	/**
	 * Initializes a Solr Connection with the Apache Solr libraries.  These have more raw functionality
	 *           
	 * @return  void
	 */
	protected function initializeSolrApacheLib () {

		if(!$this->solrSetup) $this->getSolrSetup();
		if (is_null($this->solr)) {
			if($this->solrExtVersion=='1.3.0')
			{
				//public function __construct($host = '', $port = '8080', $path = '/solr/', $scheme = 'http') {
				$this->solrApacheLib = new tx_solr_SolrService($this->solrSetup['host'],$this->solrSetup['port'],$this->solrSetup['path']);
			}
			else
			{
				$this->solrApacheLib = t3lib_div::makeInstance('tx_solr_SolrService');
			}
		}

	}

	protected function getSolrSetup() {
		$pageSelect = t3lib_div::makeInstance('t3lib_pageSelect');
		if($this->extConf['rootpageuid']>0)
		{
			$rootLine = $pageSelect->getRootLine($this->extConf['rootpageuid']);

			$tmpl = t3lib_div::makeInstance('t3lib_tsparser_ext');
			$tmpl->tt_track = false; // Do not log time-performance information
			$tmpl->init();
			$tmpl->runThroughTemplates($rootLine); // This generates the constants/config + hierarchy info for the template.
			$tmpl->generateConfig();

			list($this->solrSetup) = $tmpl->ext_getSetup($tmpl->setup, 'plugin.tx_solr.solr');
			$this->solrRootPageUid = $this->extConf['rootpageuid']; 
		}
		else
		{
			// find website roots
			$rootPages = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows(
				'uid, title',
				'pages',
				'is_siteroot = 1 AND deleted = 0'
			);
			if(count($rootPages)<1)
			{
				die('There are no rootpages defined.');	
			}
			elseif(count($rootPages)>1)
			{
				die('There are more then one rootpages defined. Please set the rootpage to use in the EM Configuration of Solr Admin.');	
			}


			// find solr configurations and add them as function menu entries
			foreach ($rootPages as $rootPage) {
				$rootLine = $pageSelect->getRootLine($rootPage['uid']);

				$tmpl = t3lib_div::makeInstance('t3lib_tsparser_ext');
				$tmpl->tt_track = false; // Do not log time-performance information
				$tmpl->init();
				$tmpl->runThroughTemplates($rootLine); // This generates the constants/config + hierarchy info for the template.
				$tmpl->generateConfig();

				list($this->solrSetup) = $tmpl->ext_getSetup($tmpl->setup, 'plugin.tx_solr.solr');
			}

			$this->solrRootPageUid = $rootPages['uid']; 
		}
	}

	/**
	 * Initializes a Solr Connection with the TYPO3 extension libraries. 
	 *           
	 * @return  void
	 */
	protected function initializeSolrT3Lib () {
		if(!$this->solrSetup) $this->getSolrSetup();

		if (!isset($GLOBALS['TSFE'])) {
			$GLOBALS['TSFE'] = new stdClass();
			$GLOBALS['TSFE']->tmpl = new stdClass();

			$GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_solr.']['solr.'] = array (
				'host' => $this->solrSetup['host'],
				'port' => $this->solrSetup['port'],
				'path' => $this->solrSetup['path']
			);

			$GLOBALS['TSFE']->csConvObj = t3lib_div::makeInstance("t3lib_cs");
			$GLOBALS['TSFE']->csConvObj->initCharset('utf-8');
			$GLOBALS['TSFE']->renderCharset = 'utf-8';
			$GLOBALS['TSFE']->id = $this->solrRootPageUid;
			$GLOBALS['TSFE']->sys_language_uid = 0; //add more langs
		}
	}

	function main()
	{
		if($this->extjsenable)
		{
			$this->mainnew();
		}
		else
		{
			$this->mainold();
		}
	}


	function mainnew()	{
		global $BE_USER,$LANG,$BACK_PATH,$TCA_DESCR,$TCA,$CLIENT,$TYPO3_CONF_VARS;

		$PATH_TYPO3 = t3lib_div::getIndpEnv('TYPO3_SITE_URL') . 'typo3/';

		if ($BE_USER->user["admin"]) {

			// Draw the header.
			$this->doc = t3lib_div::makeInstance("template");
			$this->doc->backPath = $BACK_PATH;
			$this->pageRenderer = $this->doc->getPageRenderer();

			// Include Ext JS
			$this->pageRenderer->loadExtJS();
			$this->pageRenderer->enableExtJSQuickTips();

			$this->pageRenderer->addJsInlineCode('lwsolrstart','
				tx.lwsolradmin.back_path   = "'.$this->doc->backPath.'";
			tx.lwsolradmin.back_path   = "/backstage/typo3/";
			tx.lwsolradmin.back_url    = "'.urlencode(t3lib_div::getIndpEnv('TYPO3_REQUEST_URL')).'";
			tx.lwsolradmin.path_typo3  = "'.t3lib_div::getIndpEnv('TYPO3_SITE_URL').'typo3/";
			'); 

			$this->pageRenderer->addJsFile( $BACK_PATH . t3lib_extMgm::extRelPath('lwsolradmin') . 'res/js/tx.lwsolradmin.js' );

			$this->content .= $this->doc->startPage('SOLR ADMIN');
			$this->doc->form = '';
		}
		else {
			$this->noAccess();

		}
	}

	/**
	 * Main function of the module. Write the content to $this->content
	 * If you chose "web" as main module, you will need to consider the $this->id parameter which will contain the uid-number of the page clicked in the page tree
	 *
	 * @return	[type]		...
	 */
	function mainold()	{
		global $BE_USER,$LANG,$BACK_PATH,$TCA_DESCR,$TCA,$CLIENT,$TYPO3_CONF_VARS;

		// Access check!
		// The page will show only if there is a valid page and if this page may be viewed by the user
		$this->pageinfo = t3lib_BEfunc::readPageAccess($this->id,$this->perms_clause);
		$access = is_array($this->pageinfo) ? 1 : 0;

		if (($this->id && $access) || ($BE_USER->user['admin'] && !$this->id))	{

			// Draw the header.
			$this->doc = t3lib_div::makeInstance('mediumDoc');
			$this->doc->backPath = $BACK_PATH;
			$this->doc->form='<form action="" method="post" enctype="multipart/form-data">';

			// JavaScript

			//debug($GLOBALS['BACK_PATH']);
			require_once(t3lib_extMgm::extPath('t3jquery').'class.tx_t3jquery.php');
			$jqUrl=	tx_t3jquery::getJqJSBE(true);
			$this->doc->JScode .='<script type="text/javascript" src="../'.$jqUrl.'"></script>';

			$this->doc->JScode .= "
				<script language=\"javascript\" type=\"text/javascript\">
$(document).ready(function() {
	$('#checkall').click(function() {

		if(  $('#checkall').attr('checked'))
		{

			$('.delchecks').attr('checked', true);
		}
		else
		{
			$('.delchecks').attr('checked', false);

		}
		});


		});


		script_ended = 0;
		function jumpToUrl(URL)	{
			document.location = URL;
		}
							</script>
		";






						$this->doc->postCode='
<script language="javascript" type="text/javascript">
script_ended = 1;
if (top.fsMod) top.fsMod.recentIds["web"] = 0;
</script>
	<style>
	.typo3-mediumDoc 
{
	padding:20px;
		}
	</style>
						';

//						$headerSection = $this->doc->getHeader('pages',$this->pageinfo,$this->pageinfo['_thePath']).'<br />'.$LANG->sL('LLL:EXT:lang/locallang_core.xml:labels.path').': '.t3lib_div::fixed_lgd_pre($this->pageinfo['_thePath'],50);

						$this->content.=$this->doc->startPage($LANG->getLL('title'));
						$this->content.=$this->doc->header($LANG->getLL('title'));
//						$this->content.=$this->doc->spacer(5);
//						$this->content.=$this->doc->section('',$this->doc->funcMenu($headerSection,t3lib_BEfunc::getFuncMenu($this->id,'SET[function]',$this->MOD_SETTINGS['function'],$this->MOD_MENU['function'])));
//						$this->content.=$this->doc->divider(5);

						$this->content.=$this->printInfo();

						// Render content:
						$this->moduleContent();

						// ShortCut
/*						if ($BE_USER->mayMakeShortcut())	{
							$this->content.=$this->doc->spacer(20).$this->doc->section('',$this->doc->makeShortcutIcon('id',implode(',',array_keys($this->MOD_MENU)),$this->MCONF['name']));
}
 */

						$this->content.=$this->doc->spacer(10);
		} else {

			//If no access or if ID == zero
			$this->noAccess();
		}
	}

	private function setSolrExtVersion()
	{
		$_EXTKEY = 'solr';
		include_once(t3lib_extMgm::extPath('solr').'ext_emconf.php');
		$this->solrExtVersion = $EM_CONF['solr']['version'];
	}

	//display solr connection
	//display solr main extenion version
	private function printInfo()
	{
		$this->initializeSolrT3Lib();
		$content.= "<p><strong>Main info</strong></p>";
		$content.= "<table><tr><td>Sorl TYPO3 Extension Version:</td><td>". $this->solrExtVersion."</td></tr>";
		$content.= "<tr><td>Sorl Connection Host Address:</td><td>". $this->solrSetup['host'] ."</td></tr>";
		$content.= "<tr><td>Sorl Connection Port:</td><td>". $this->solrSetup['port'] ."</td></tr>";
		$content.= "<tr><td>Sorl Connection Path:</td><td>". $this->solrSetup['path'] ."</td></tr>";
		$content.= "<tr><td>Active root page:</td><td>". $this->solrRootPageUid ."</td></tr></table>";
		$content.= "<br/>";
		$content.= "<p><strong>Click submit with empty fields to show complete database.</strong>";
		$content.= "<p><strong>Searching all records for one site? Enter in de field site:</strong> <pre>http\:\/\/www\.website\.com\/</pre></p>";
		$content.= "<p><strong>You can use wildcards. Enter in the field url:</strong> <pre>http\:\/\/www\.website\.com*</pre></p>";
		return  $content;

	}

	public function noAccess()
	{
		$this->doc = t3lib_div::makeInstance('bigDoc');
		$this->doc->backPath = $BACK_PATH;

		$this->content.=$this->doc->startPage($LANG->getLL('title'));
		$this->content.=$this->doc->header($LANG->getLL('title'));
		$this->content.=$this->doc->spacer(5);
		$this->content.=$this->doc->spacer(10);
	}

	/**
	 * Prints out the module HTML
	 *
	 * @return	void
	 */
	function printContent()	{

		$this->content.=$this->doc->endPage();
		echo $this->content;
	}

	/**
	 * Generates the module content
	 *
	 * @return	void
	 */
	function moduleContent()	{

		if($_POST['submittedYes'])
		{
			unset($_GET['delid']);
			unset($_GET['prePost']);
						/*	if($_POST['prePost'])
							{
							$_POST=	array_merge($_POST,$_POST['prePost']);
							}
						 */

		}
		elseif($_GET['prePost']) {
			$_POST=unserialize(base64_decode($_GET['prePost']));
		}


		$this->content.=$this->doc->section('Message #1:',$content,0,1);



		$content.='<form method="post">';
		$this->content.=$this->QueryView();

		if($_GET['delid']) $this->content.=$this->DeleteSingleProcess();
		if($_POST['delselected']) $this->content.=$this->DeleteSelectedProcess();

		$this->content.=$this->QueryProcess();


		$content.='</form>';

	}

				function DeleteSelectedProcess()
				{
					$this->initializeSolrT3Lib();
					$this->initializeSolrApacheLib();

					foreach($_POST['delid'] as $delid=>$state) {
						$delResponse=$this->solrApacheLib->deleteById(base64_decode($delid));
						$content.='<div>Deleted record with id: '.base64_decode($delid).'</div>';
					}

					$commitResponse=$this->solrApacheLib->commit();


//					$content.='<pre>';
//					$content.=print_r(get_class_methods($this->solrApacheLib),true);
//					$content.=print_r($delResponse,true);
//					$content.=print_r($_POST['delid'],true);
//					$content.='</pre>';
					return $content;

				}

				function DeleteSingleProcess()
				{
					$this->initializeSolrT3Lib();
					$this->initializeSolrApacheLib();

					$delResponse=$this->solrApacheLib->deleteById(base64_decode($_GET['delid']));
					$commitResponse=$this->solrApacheLib->commit();

					$content.='<div>Deleted record with id: '.base64_decode($_GET['delid']).'</div>';

					return $content;
				}

				function QueryView() {
					$content.='<div>Numresults<br/><input type="text" name="numresults" value="'.$_POST['numresults'].'" /></div>';
//					$content.='<div>Enter list query<br/><textarea name="q" id="q">'.stripslashes($_POST['q']).'</textarea></div>';
					$filters = Array(
						'url',
						'site',
						'siteHash',
						'title',
						'type'
						);

					foreach($filters as $filter)
					{
						if($_POST['filters'])
						{
							$content.='<div>'.$filter.'<br/><input size="80" type="text" name="filters['.$filter.']" value="'.stripslashes($_POST['filters'][$filter]).'" /></div>';
						}
						else
						{
							$content.='<div>'.$filter.'<br/><input  size="80" type="text" name="filters['.$filter.']" value="" /></div>';
						}
					}

					$content.='<div><input type="hidden" name="submittedYes" value="yes" />';
					$content.='<input type="submit" name="sub" value="submit" /> ';
//					$content.='	<input type="submit" name="deleteall" value="delete all" /> Realy delete? <input type="checkbox" name="deleteallreally" /></div>';
					return $content;
				}
				function QueryProcess() {

					if(empty($_POST['sub'])) return;

					$this->initializeSolrT3Lib();

					$query = t3lib_div::makeInstance('tx_solr_Query', $_POST['q']);	
					$query->setQueryString($_POST['q']);

					$this->search = t3lib_div::makeInstance('tx_solr_Search');

					foreach($_POST['filters'] as $filter=>$val)
					{
						if(trim($val))
						{
							$query->addFilter($filter.': '.stripslashes($_POST['filters'][$filter]));
						}
					}

					if(!is_numeric($_POST['numresults'])) $_POST['numresults']=10;

					$search = $this->search->search($query, 0, $_POST['numresults']);

					$response = $this->search->getResponse();

					$content.='
						<table border="1">
						<tr>
						<td>Docs Found</td>
						<td>'.$response->numFound.'</td>
						</tr>
						</table>
						';

					$content.='<pre>';
//					$content.=print_r($query,true);
//					$content.=print_r($this->search ,true);
//					print_r($response->docs);
					$content.='</pre>';

					$content.='<br/>';

					$fields = Array(
						'id',
						'url',
						'site',
						'title',
						'type',
						'siteHash'
						);
					$content.='
						<!---<div><input type="hidden" name="submittedYes" value="yes" />-->
						<input type="submit" name="delselected" value="Delete Selected" />
					<table border="1">';
					$content.='<tr>';
					$content.='<td><input type="checkbox" id="checkall" />&nbsp;Check&nbsp;All';
					$content.='</td>';
						foreach($fields as $field)
						{
							$content.='<td>';
							$content.=$field;
							$content.='</td>';
						}
						$content.='</tr>';

						foreach($response->docs as $docObj){

							$content.='<tr>';
							$content.='<td style="width:100px;">';
							if($this->solrExtVersion=='1.3.0'){
								$idval=base64_encode($docObj->id);
							}
							else
							{
								$idval=base64_encode($docObj->_fields['id']);
							}

							$content.='<input class="delchecks" type="checkbox" name="delid['.$idval.']" />&nbsp;';
							$content.='<a href="mod.php?M=tools_txlwsolradminM1&delid='.$idval.'&prePost='.base64_encode(serialize($_POST)).'">DEL</a>';
							$content.='</td>';

							foreach($fields as $field)
							{
								$content.='<td>';
								if($this->solrExtVersion=='1.3.0'){
									$content.=$docObj->$field;
								}
								else
								{
									$content.=$docObj->_fields[$field];
								}
								$content.='</td>';
							}

							$content.='</tr>';
						}

						$content.='</table>';

					return $content;
				}
		}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/lwsolradmin/mod1/index.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/lwsolradmin/mod1/index.php']);
}

// Make instance:
$SOBE = t3lib_div::makeInstance('tx_lwsolradmin_module1');
$SOBE->init();

// Include files?
foreach($SOBE->include_once as $INC_FILE)	include_once($INC_FILE);

$SOBE->main();
#$SOBE->mainold();
$SOBE->printContent();

?>
