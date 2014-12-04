
plugin.tx_solr.templateFiles.search = fileadmin/themes/templates/extensions/solr/pi_search/search.htm
plugin.tx_solr.search.query.queryFields > 
plugin.tx_solr.search.query.fields >
plugin.tx_solr.suggest = 1 
plugin.tx_solr.frequentSearches = 1
plugin.tx_solr.addDefaultJs = 0
plugin.tx_solr.addDefaultCss = 0
plugin.tx_solr.javascriptFiles >
plugin.tx_solr.cssFiles {
		results >
		pagebrowser >
		ui = fileadmin/themes/templates/extensions/solr/jquery-ui.custom.css
}
plugin.tx_solr.javascriptFiles.suggest = fileadmin/themes/templates/js/solr/suggest.js
plugin.tx_solr.templateFiles.results = fileadmin/themes/templates/extensions/solr/results.htm
plugin.tx_solr.templateFiles.pagebrowser = fileadmin/themes/templates/extensions/solr/pagebrowser.htm

plugin.tx_solr.index {
   files = 1 # enable file indexing
   files.allowedTypes = doc, docx, pdf
   fieldProcessingInstructions {
     changed = timestampToIsoDate
     created = timestampToIsoDate
     endtime = timestampToIsoDate
   }
}


plugin.tx_solr.search.faceting = 1
plugin.tx_solr.search.faceting{
		removeFacetLinkText = @facetText (verwijderen)
      	minimumCount = 1
      	sortBy = count
      	limit = 10
      	facetOrder = type    
      	facets {
      	type {
      		field = type
        	renderingInstruction = CASE
        	renderingInstruction {
        		key.field = optionValue
        		
    		    pages = TEXT
				pages.value = Pages
        		pages.lang.de = Seiten
        
        		tx_news_domain_model_news = TEXT
        		tx_news_domain_model_news.value = News
        		tx_news_domain_model_news.lang.de = Nieuws
        		
        		tx_tntbabygallery_babies = TEXT
        		tx_tntbabygallery_babies.value = Records
        		tx_tntbabygallery_babies.lang.de = Baby Galerie
        		
        		tx_tntdiseases_domain_model_diseases = TEXT
        		tx_tntdiseases_domain_model_diseases.value = Records
        		tx_tntdiseases_domain_model_diseases.lang.de = Krankheiten
        		
        		tx_tntmitarbeiter_persons = TEXT
        		tx_tntmitarbeiter_persons.value = Records
        		tx_tntmitarbeiter_persons.lang.de = Mitarbeiter
        		
        		tx_tntjobs_job = TEXT
        		tx_tntjobs_job.value = Records
        		tx_tntjobs_job.lang.de = Jobs
        		
        		
        	}
      }
      }        
}
#plugin.tx_solr.search.faceting.showEmptyFacets = 0

plugin.tx_solr_pi_results._LOCAL_LANG.de{
 results_found = @resultsTotal Ergebnisse,
 results_range = Ergebnisse @resultsFrom bis @resultsTo von @resultsTotal
 submit = Suchen
}

plugin.tx_solr.search.targetPage = 596
plugin.tx_solr.search.results.resultsPerPage = 5
plugin.tx_solr.search.results.resultsHighlighting = 1
plugin.tx_solr.search.results.resultsHighlighting.wrap = <strong class="results-highlight">|</strong>
plugin.tx_solr.index.queue {
	news = 1
	news {
		table = tx_news_domain_model_news
		fields {
			abstract = teaser
			author = author
			authorEmail_stringS = author_email
			title = title
			keywords = SOLR_MULTIVALUE 
			keywords {
          		field = keywords
        	}
			content = SOLR_CONTENT
			content {
				field = bodytext
			}
			url = TEXT
			url {
				typolink.parameter.cObject = CASE
				typolink.parameter.cObject {
					key.field = pid
					543 = TEXT
					543.value = 544
					
					548 = TEXT
					548.value = 597
					
				}
				typolink.additionalParams = &tx_news_pi1[news]={field:uid}
				typolink.additionalParams.insertData = 1
				typolink.useCacheHash = 1
				typolink.returnLast = url
				}
			}
		attachments {
			fields = related_files
		}
	}
	
	tnt_babygallery = 1
	tnt_babygallery {
		table = tx_tntbabygallery_babies
		fields {
			title = COA
			title.5 = TEXT
			title.5.field = firstname
			title.10 = TEXT
			title.10.value = &nbsp;
			title.15 = TEXT
			title.15.field = lastname
					
			content = SOLR_CONTENT
			content {
				field = bodytext
			}
			url = TEXT
			url {
				typolink.parameter = 447
				typolink.additionalParams = &tx_tntbabygallery_tntbabygallery[uid]={field:uid}
				typolink.additionalParams.insertData = 1
				typolink.useCacheHash = 1
				typolink.returnLast = url
				}
			}
		attachments {
			#fields = related_files
		}
	}
	
	mitarbeiter= 1
	mitarbeiter{
		table = tx_tntmitarbeiter_persons
		fields {
			title = COA
			title.3 = TEXT
			title.3.field = title
			title.5 = TEXT
			title.5.field = first_name
			title.10 = TEXT
			title.10.value = &nbsp;
			title.15 = TEXT
			title.15.field = last_name
			
			content = SOLR_CONTENT
			content {
				field = function 
			}
			url = TEXT
			url {
				typolink.parameter= 564
				typolink.additionalParams = &tx_tntmitarbeiter_tntmitarbeiter[id]={field:uid}
				typolink.additionalParams.insertData = 1
				typolink.useCacheHash = 1
				typolink.returnLast = url
				}
			}
		attachments {
			#fields = related_files
		}
	}
	
	tnt_jobs= 1
	tnt_jobs{
		table = tx_tntjobs_job
		fields {
			abstract = job_description
			author = job_requirements
			title = title
			content = SOLR_CONTENT
			content { 
				cObject = COA
				cObject {
					10 = TEXT
					10 {
						field = job_description
						#noTrimWrap = || |
					}
					11 = TEXT
					11{
						field = job_requirements
						#noTrimWrap = || |
					}
					12 = TEXT
					12{
						field = job_requirements
						#noTrimWrap = || |
					}
					13 = TEXT
					13{
						field = job_type
						#noTrimWrap = || |
					}
					14 = TEXT
					14{
						field = experience
						#noTrimWrap = || |
					}
					15 = TEXT
					15{
						field = apply_information
						#noTrimWrap = || |
					}
					16 = TEXT
					16{
						field = employer_description
						#noTrimWrap = || |
					}
				}
			}
			url = TEXT
			url {
				typolink.parameter= 444 
				typolink.additionalParams = &tx_tntjobs_tntjobs[id]={field:uid}
				typolink.additionalParams.insertData = 1
				typolink.useCacheHash = 1
				typolink.returnLast = url
				}
			}
		attachments {
			#fields = related_files
		}
	}
	tnt_diseases= 1
	tnt_diseases{
		table = tx_tntdiseases_domain_model_diseases
		fields {
			abstract = teaser_text
			keywords = SOLR_MULTIVALUE 
			keywords {
          		field = seo_title_tag
        	}
			title = title
			content = SOLR_CONTENT
			content {
				field = text
			}
			url = TEXT
			url {
				typolink.parameter= 362
				typolink.additionalParams = &tx_tntdiseases_tntdiseases[diseaseSelection]={field:uid}
				typolink.additionalParams.insertData = 1
				typolink.useCacheHash = 1
				typolink.returnLast = url
				}
			}
	}
}


plugin.tx_solr.search.faceting = 1
plugin.tx_solr {
    search {
        faceting {
        	keepAllFacetsOnSelection = 0
            facets {
                type {
                    renderingInstruction = CASE
                    renderingInstruction {
                        key.field = optionValue
                        pages = TEXT
                        pages.value = Pages
                        file = TEXT
                        file.value = Documents
                    }
                }
            }
        }
    }
}

plugin.tx_solr.logging.query.filters = 1
plugin.tx_solr.logging.query.rawGet = 1
plugin.tx_solr.logging.query.queryString = 1

plugin.tx_solr.search.faceting.facets.type.renderingInstruction.tx_news_domain_model_news.lang.de = News 