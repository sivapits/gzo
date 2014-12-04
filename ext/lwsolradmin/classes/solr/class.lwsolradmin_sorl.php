<?php
/**
 * lwsolradmin_sorl
 **/
class lwsolradmin_sorl
{
	
	/**
	 * Initializes a Solr Connection with the Apache Solr libraries.  These have more raw functionality
	 *           
	 * @return  void
	 */
	public function initializeSolrApacheLib () {

		if(!$this->solrSetup) $this->getSolrSetup();
		if (is_null($this->solr)) {
			$this->solrApacheLib = t3lib_div::makeInstance('tx_solr_SolrService');
		}

	}

	protected function getSolrSetup() {
		// find website roots
		$rootPages = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows(
			'uid, title',
			'pages',
			'is_siteroot = 1 AND deleted = 0'
		);

		$pageSelect = t3lib_div::makeInstance('t3lib_pageSelect');

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
	}

	/**
	 * Initializes a Solr Connection with the TYPO3 extension libraries. 
	 *           
	 * @return  void
	 */
	public function initializeSolrT3Lib () {
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
		}
	}

	public	function QueryProcess($query,$filters,$numresults) {

		$this->initializeSolrT3Lib();

		$query = t3lib_div::makeInstance('tx_solr_Query', $query);	
		$query->setQueryString($query);

		$this->search = t3lib_div::makeInstance('tx_solr_Search');

		foreach($filters as $filter=>$val)
		{
			if(trim($val))
			{
				$query->addFilter($filter.': '.stripslashes($filters[$filter]));
			}
		}

		if(!is_numeric($numresults)) $numresults=10;

		$search = $this->search->search($query, 0, $numresults);

		$response = $this->search->getResponse();
		//print_r($response);
		
		$resultarr['numFound']=$response->numFound;

		foreach($response->docs as $docObj){

			foreach($docObj->_fields as $field => $val)
			{
				$result[$field]=$docObj->_fields[$field];
			
			}
			$resultarr['docs'][]=$result;
		}


		return $resultarr;
	}



}
?>
