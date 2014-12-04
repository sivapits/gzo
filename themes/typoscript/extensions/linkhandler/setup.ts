//
//	Project:	
//	Version:	1.0.0
//	Date: 13 nov 2014
//	Auhor: Azeef,Siva		
// 
// Include all linkhandler configs here

plugin.tx_linkhandler {
  
  # news and events
	tx_news_domain_model_news {
		forceLink = 1
    parameter.stdWrap.cObject = CASE
    parameter.stdWrap.cObject{
      543=TEXT
      543.value = 544
      548=TEXT
      548.value = 597
      key.field = pid
      default = TEXT
      default.value = 544 
    }
		additionalParams = &tx_news_pi1[news]={field:uid}
   	additionalParams.insertData = 1 	
		useCacheHash = 1
	}

  #krankheitsbilder
  tx_tntdiseases_domain_model_diseases{
    forceLink = 1
		#parameter = 362
    parameter.stdWrap.cObject = CASE
    parameter.stdWrap.cObject{
      653=TEXT
      653.value = 665
      654=TEXT
      654.value = 666
      key.field = pid
      default = TEXT
      default.value = 362 
    }
		additionalParams = &tx_tntdiseases_tntdiseases[diseaseSelection]={field:uid}
   	additionalParams.insertData = 1 	
		useCacheHash = 1
  }
  
  #mitabeiter
  tx_tntmitarbeiter_persons {
    forceLink = 1
		parameter = 564
		additionalParams = &tx_tntmitarbeiter_tntmitarbeiter[id]={field:uid}
   	additionalParams.insertData = 1 	
		useCacheHash = 1
  }
  
  #jobs
  tx_tntjobs_job {
    forceLink = 1
		parameter = 444
		additionalParams = &tx_tntjobs_tntjobs[id]={field:uid}
   	additionalParams.insertData = 1 	
		useCacheHash = 1
  }


}