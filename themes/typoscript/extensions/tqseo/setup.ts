plugin.tq_seo{
    metaTags.conf.title_page.field = tx_tqseo_pagetitle
    pageTitle.sitetitlePosition = 1
    metaTags.enableDC = 0
    metaTags.revisit = 0
    metaTags.linkGeneration = 0
    metaTags.robotsIndex = 1
    metaTags.robotsFollow = 1
    metaTags.useDetectLanguage >
    metaTags.useLastUpdate >
    
    metaTags.useCanonical = 0
}

[globalVar = GP:tx_tntdiseases_tntdiseases|diseaseSelection > 0] || [globalVar = GP:tx_tntmitarbeiter_tntmitarbeiter|id > 0]
#plugin.tq_seo.metaTags.robotsIndex = 0
#plugin.tq_seo.metaTags.robotsFollow = 0
[end]

[globalVar = GP:tx_tntdiseases_tntdiseases|diseaseSelection > 0] && [globalVar = TSFE:id = 362]
# uncomment when GO live
#plugin.tq_seo.metaTags.robotsIndex = 1
#plugin.tq_seo.metaTags.robotsFollow = 1
[end]

[globalVar = GP:tx_tntmitarbeiter_tntmitarbeiter|id > 0] && [globalVar = TSFE:id = 556]
# uncomment when GO live
#plugin.tq_seo.metaTags.robotsIndex = 1
#plugin.tq_seo.metaTags.robotsFollow = 1
[end]