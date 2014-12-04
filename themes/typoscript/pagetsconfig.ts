
# on go LIVE please make disableHideAtCopy 0
TCEMAIN.table.pages {
  disablePrependAtCopy = 1
  disableHideAtCopy = 1
}

TCEMAIN.table.tt_content {
  disablePrependAtCopy = 1
  disableHideAtCopy = 1
}

# additional header with arrow tag
TCEFORM.tt_content.header_layout {
  addItems {
		10 = Header Arrow H2
		20 = Header Inhalt H1
	}
}

# additional frame for article tag wrap instead of div.csc-default
TCEFORM.tt_content.section_frame {
	addItems.101 = Article
}
TCEFORM.tt_content.section_frame.removeItems = 1,5,6,10,11,12,20,21

tx_news.templateLayouts {
    1 = News list page    	
    8 = News list page with time
    2 = Home - News template    
    7 = Home - News template  with teaser text
    3 = Top News bar   
    4 = Agenda Template
    5 = News widget with image & text
    6 = News widget with content slider
                
}

RTE.default.contentCSS = fileadmin/themes/templates/rte/default.css

RTE.default{
  #ignoreMainStyleOverride = 1 
  #useCSS = 1
  #contentCSS = fileadmin/themes/templates/assets/rte/default.css
  classesParagraph := addToList(more,summary,highlighted)
  proc.allowedClasses := addToList(summary,highlighted)
  buttons.formatblock.removeItems = article,aside,blockquote,section,address,div,footer,header,nav,pre,h1,h5,h6
  hideButtons = table
}

TCEFORM {
   tx_powermail_domain_model_forms {
      css {
         removeItems = layout2, layout3

         addItems {
            spontan = Spontanbewerbung
            kontakt = Kontakt
            rulertb = Ruler top bottom
         }
      }
   }
}

TCEFORM.pages {
  layout.altLabels.1 = level 1 Nav
  layout.removeItems = 2,3
}

#Link handler configurations

RTE.default.tx_linkhandler {
  tt_news >
	news { 
		label = GZO News
		listTables = tx_news_domain_model_news
		onlyPids = 543,548
		onlyPids.recursive = 0
		previewPageId = 544
	}
  tnt_diseases{
    label = Krankheits
		listTables = tx_tntdiseases_domain_model_diseases
		onlyPids = 652,653,654
		onlyPids.recursive = 1
		previewPageId = 362
  }
  tnt_mitarbeiter{
    label = Mitarbeiter
		listTables = tx_tntmitarbeiter_persons
		onlyPids = 551
		onlyPids.recursive = 1
		previewPageId = 564
  }
  tnt_jobs{
    label = Jobs
		listTables = tx_tntjobs_job
		onlyPids = 441
		onlyPids.recursive = 1
		previewPageId = 444
  } 
  
  
} 

mod.tx_linkhandler {
  tt_news >
	news {		
		label = GZO News
		listTables =tx_news_domain_model_news
		onlyPids = 543,548
		onlyPids.recursive = 1
		previewPageId = 544
	}
  tnt_diseases{
    label = Krankheits
		listTables = tx_tntdiseases_domain_model_diseases
		onlyPids = 652,653,654
		onlyPids.recursive = 1
		previewPageId = 362
  }
  tnt_mitarbeiter{
    label = Mitarbeiter
		listTables = tx_tntmitarbeiter_persons
		onlyPids = 551
		onlyPids.recursive = 1
		previewPageId = 564
  }
  tnt_jobs{
    label = Jobs
		listTables = tx_tntjobs_job
		onlyPids = 441
		onlyPids.recursive = 1
		previewPageId = 444
  } 	
}

RTE {
    default {
        buttons {
            link {
                dialogueWindow {
                    width = 800
                }


            }
        }
    }
}