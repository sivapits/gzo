//
//	Project:	
//	Version:	1.0.0
//	Date:
//	Auhor:		
// 
// Include SOLR constant configs

plugin.tx_solr.solr.scheme = http
plugin.tx_solr.solr.port = 80
plugin.tx_solr.solr.useCurlHttpTransport = 1
plugin.tx_solr.solr.host = solr5405:XHyGaJKv@solr5405.solr-hosting.info
plugin.tx_solr.solr.path = /default/

//plugin.tx_solr.solr.port = 80
//plugin.tx_solr.solr.useCurlHttpTransport = 1
//plugin.tx_solr.solr.host = solr5382:qLCj7Da7@solr5382.solr-hosting.info
//plugin.tx_solr.solr.path = /default/

plugin.tx_solr.logging.indexing.queue.pages = 1
plugin.tx_solr.logging.indexing.pageIndexed = 1

plugin.tx_solr.search.query {
fields = keywords^100.0, title^5.0, content^1.0
suggestField = spell
}

plugin.tx_solr.search.results{
	resultsPerPage = 5
}
plugin.tx_solr.search.results.resultsPerPageSwitchOptions = 5,10,25,50

