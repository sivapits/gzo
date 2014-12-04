//
//	Project:	
//	Version:	1.0.0
//	Date:
//	Auhor: Azeef		
// 
// page title handling


page.headerData {
    10 = TEXT
    10 {
         field = tx_tqseo_pagetitle // title
         //noTrimWrap = |<title> | - {$siteName}</title>|
         noTrimWrap = |<title>|</title>|
       }
}


lib.ptitle = RECORDS
lib.ptitle {
  dontCheckPid = 1
  #stdWrap.noTrimWrap = |<title> | - {$siteName}</title>|
  stdWrap.noTrimWrap = |<title>|</title>|
}

# Krankheitsbilder title  tx_tntdiseases_tntdiseases[diseaseSelection]
[globalVar = GP:tx_tntdiseases_tntdiseases|diseaseSelection > 0]
lib.ptitle{
  tables = tx_tntdiseases_domain_model_diseases
  source.data = GP:tx_tntdiseases_tntdiseases|diseaseSelection
  conf.tx_tntdiseases_domain_model_diseases = TEXT
  conf.tx_tntdiseases_domain_model_diseases.field = seo_title_tag // title
  conf.tx_tntdiseases_domain_model_diseases.htmlSpecialChars = 1
  
}
page.headerData.10 < lib.ptitle

plugin.tq_seo.metaTags.stdWrap.description < lib.ptitle
plugin.tq_seo.metaTags.stdWrap.description.field = seo_description_tag
plugin.tq_seo.metaTags.stdWrap.description.stdWrap.noTrimWrap >
[end]

#Jobs tx_tntjobs_job tx_tntjobs_tntjobs|id job_title
[globalVar = GP:tx_tntjobs_tntjobs|id > 0]
lib.ptitle{
  tables = tx_tntjobs_job
  source.data = GP:tx_tntjobs_tntjobs|id
  conf.tx_tntjobs_job = TEXT
  conf.tx_tntjobs_job.field = title
  conf.tx_tntjobs_job.htmlSpecialChars = 1
  
}
page.headerData.10 < lib.ptitle
[end]

#News tx_news_domain_model_news tx_news_pi1[news] title
[globalVar = GP:tx_news_pi1|news > 0]
lib.ptitle{
  tables = tx_news_domain_model_news
  source.data = GP:tx_news_pi1|news
  conf.tx_news_domain_model_news = TEXT
  conf.tx_news_domain_model_news.field = title
  conf.tx_news_domain_model_news.htmlSpecialChars = 1
  
}
page.headerData.10 < lib.ptitle
[end]

# Staff tx_tntmitarbeiter_persons tx_tntmitarbeiter_tntmitarbeiter|id  title last_name first_name
[globalVar = GP:tx_tntmitarbeiter_tntmitarbeiter|id > 0]
lib.ptitle{
  tables = tx_tntmitarbeiter_persons
  source.data = GP:tx_tntmitarbeiter_tntmitarbeiter|id
  conf.tx_tntmitarbeiter_persons = TEXT
  conf.tx_tntmitarbeiter_persons.dataWrap = {field:title} {field:first_name} {field:last_name}
  conf.tx_tntmitarbeiter_persons.htmlSpecialChars = 1
  
}
page.headerData.10 < lib.ptitle
[end]

#Babygallery tx_tntbabygallery_babies tx_tntbabygallery_tntbabygallery|uid  lastname  firstname
[globalVar = GP:tx_tntbabygallery_tntbabygallery|uid > 0]
lib.ptitle{
  tables = tx_tntbabygallery_babies
  source.data = GP:tx_tntbabygallery_tntbabygallery|uid
  conf.tx_tntbabygallery_babies = TEXT
  conf.tx_tntbabygallery_babies.dataWrap = {field:firstname} {field:lastname}
  conf.tx_tntbabygallery_babies.htmlSpecialChars = 1
  
}
page.headerData.10 < lib.ptitle
[end]