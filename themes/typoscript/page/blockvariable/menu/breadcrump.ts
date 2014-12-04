//
//	Project:	
//	Version:	1.0.0
//	Date:
//	Auhor:		
// 
// Breadcrump menu 
//
lib.rectitle = RECORDS
lib.rectitle {
  dontCheckPid = 1
  wrap = <li><span>|</span></li>
}

lib.breadcrumb_menu = HMENU
lib.breadcrumb_menu {
    special = rootline
    special.range = 0|-1
    includeNotInMenu = 1
    wrap =  <div class="col-md-12 breadcrumb-media"><div class="breadcrumbs"><ul>|
    1 = TMENU
    1 {
     NO.linkWrap = <li>|</li>
     CUR = 1
     CUR.doNotLinkIt = 1
     CUR.allWrap = <li><span>|</span></li>
    }
}

# Krankheitsbilder title  tx_tntdiseases_tntdiseases[diseaseSelection]
[globalVar = GP:tx_tntdiseases_tntdiseases|diseaseSelection > 0]
lib.breadcrumb_menu.includeNotInMenu = 0
lib.rectitle{
  tables = tx_tntdiseases_domain_model_diseases
  source.data = GP:tx_tntdiseases_tntdiseases|diseaseSelection
  conf.tx_tntdiseases_domain_model_diseases = TEXT
  conf.tx_tntdiseases_domain_model_diseases.field = title
  
}
[end]

[globalVar = GP:tx_tntdiseases_tntdiseases|diseaseSelection > 0] && [globalVar = TSFE:id = 66,TSFE:id = 74,TSFE:id = 75,TSFE:id = 80,TSFE:id = 81,TSFE:id = 86,TSFE:id = 87,TSFE:id = 92,TSFE:id = 93,TSFE:id = 98,TSFE:id = 99,TSFE:id = 105,TSFE:id = 106,TSFE:id = 117,TSFE:id = 118,TSFE:id = 124,TSFE:id = 125,TSFE:id = 152,TSFE:id = 153,TSFE:id = 159,TSFE:id = 160,TSFE:id = 166,TSFE:id = 167,TSFE:id = 173,TSFE:id = 174,TSFE:id = 180,TSFE:id = 181,TSFE:id = 187,TSFE:id = 188,TSFE:id = 194,TSFE:id = 195,TSFE:id = 208,TSFE:id = 209,TSFE:id = 289,TSFE:id = 290,TSFE:id = 295,TSFE:id = 296,TSFE:id = 305,TSFE:id = 306,TSFE:id = 328,TSFE:id = 332,TSFE:id = 337,TSFE:id = 341]
lib.breadcrumb_menu.1 {
     CUR.doNotLinkIt = 0
     CUR.allWrap = <li>|</li>
    }
[end]

[globalVar = GP:tx_tntdiseases_tntdiseases|diseaseSelection > 0] && [globalVar = TSFE:id = 665,TSFE:id = 666]
lib.breadcrumb_menu.includeNotInMenu = 1
lib.breadcrumb_menu.1.CUR.doNotLinkIt = 0
lib.breadcrumb_menu.special.range = 0|2
[end]

#Jobs tx_tntjobs_job tx_tntjobs_tntjobs|id job_title
[globalVar = GP:tx_tntjobs_tntjobs|id > 0]
lib.breadcrumb_menu.includeNotInMenu = 0
lib.rectitle{
  tables = tx_tntjobs_job
  source.data = GP:tx_tntjobs_tntjobs|id
  conf.tx_tntjobs_job = TEXT
  conf.tx_tntjobs_job.field = title
  
}
[end]

#News tx_news_domain_model_news tx_news_pi1[news] title
[globalVar = GP:tx_news_pi1|news > 0]
lib.breadcrumb_menu.includeNotInMenu = 0
lib.rectitle{
  tables = tx_news_domain_model_news
  source.data = GP:tx_news_pi1|news
  conf.tx_news_domain_model_news = TEXT
  conf.tx_news_domain_model_news.field = title
  
}
[end]

# Staff tx_tntmitarbeiter_persons tx_tntmitarbeiter_tntmitarbeiter|id  title last_name first_name
[globalVar = GP:tx_tntmitarbeiter_tntmitarbeiter|id > 0]
lib.breadcrumb_menu.includeNotInMenu = 0
lib.rectitle{
  tables = tx_tntmitarbeiter_persons
  source.data = GP:tx_tntmitarbeiter_tntmitarbeiter|id
  conf.tx_tntmitarbeiter_persons = TEXT
  conf.tx_tntmitarbeiter_persons.dataWrap = {field:title} {field:first_name} {field:last_name}
  
}
[end]

#Babygallery tx_tntbabygallery_babies tx_tntbabygallery_tntbabygallery|uid  lastname  firstname
[globalVar = GP:tx_tntbabygallery_tntbabygallery|uid > 0]
lib.breadcrumb_menu.includeNotInMenu = 0
lib.rectitle{
  tables = tx_tntbabygallery_babies
  source.data = GP:tx_tntbabygallery_tntbabygallery|uid
  conf.tx_tntbabygallery_babies = TEXT
  conf.tx_tntbabygallery_babies.dataWrap = {field:firstname} {field:lastname}
  
}
[end]


lib.breadcrumb = COA_INT
lib.breadcrumb{
   
  5 < lib.breadcrumb_menu
  6 < lib.rectitle 
  10 = TEXT
  10.value = Seite drucken
  10.value.wrap = </ul><a class="btn-print print" href="javascript:void(0);" onclick="window.print();return false;">|</a></div></div> 
}