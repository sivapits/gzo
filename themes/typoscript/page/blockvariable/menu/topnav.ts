//
//	Project:	
//	Version:	1.0.0
//	Date:
//	Auhor:	Arun, Azeef	
// 
// Top area navigation elements in page 
// 
//

// Klinik / Abteilung  Dropdown Menu (Topmenu)
lib.subview1 = COA
lib.subview1 {
	10 = RECORDS
	10 {
		source = 491
		tables = pages
		conf.pages = TEXT
		conf.pages.field = title
		wrap = <li class="sub-view"><a href="javascript:void(0);">|</a>
	}
	
	20 = HMENU
	20 {
	    special = directory
	    special.value = 491
	    1 = TMENU
	    1 {
        expAll = 1
        NO = 1
        NO.wrapItemAndSub = <li>|</li>
        CUR.wrapItemAndSub = <li>|</li>
        ACT < .CUR
        
        IFSUB = 1
        IFSUB.wrapItemAndSub= <li class="sub-view">|</li>
	    }
	
	    2 = TMENU
	    2 {
	        wrap = <ul>|</ul>
	        NO = 1
	        NO.wrapItemAndSub = <li>|</li>
	    }
	}
	20.wrap = <ul>|</ul></li>
	
}

// Spezialist Dropdown Menu (Topmenu)

lib.subview2 < lib.subview1
lib.subview2.10.source = 492
lib.subview2.20.special.value = 492

lib.subviewX = COA
lib.subviewX {
	
	10 = RECORDS
	10 {
		source = 492
		tables = pages
		conf.pages = TEXT
		conf.pages.field = title
		wrap = <li class="sub-view"><a id="spl_list" href="javascript:void(0);">|</a>
	}
	
	20 = RECORDS
	20 {
	    tables = tt_content
	    source = 167
	}
	20.wrap = |</li>
		
}

// Icon Navigation Menu (Topmenu)
lib.iconnav = HMENU
lib.iconnav {
    special = directory
    special.value = 50
    1 = TMENU
    1{
      NO = 1
      NO{
        allWrap = <li>|<div class="subnav-drop"><strong class="nav-title">{field:iconnav_title}</strong><p>{field:iconnav_desc}</p></div></li>
        allWrap.insertData = 1
        ATagParams.dataWrap = title="{field:title}" class="icons"
        stdWrap.innerWrap.cObject = COA
        stdWrap.innerWrap.cObject {
          
          10 = FILES
          10{
             references {
               table = pages
               uid.data = field:uid
               fieldName = media
             }
             renderObj = IMAGE
             renderObj {
                file.import.data = file:current:uid
                file.treatIdAsReference = 1
                altText.data = file:current:title
                wrap = |<span>
             }
          
           }
        }
        stdWrap.wrap = |</span>
        
      }
    }
}


lib.topnav = COA
lib.topnav {
	10 = COA
	10.wrap = <div class="primary-nav clearfix"><ul>|</ul></div>
	10 {
		10 = TEXT
		10 {
			value = GZO Startseite
			typolink.parameter = 1
			typolink.ATagParams= class="starter"
			wrap = <li>|</li>
		}	
		
		20 < lib.subview1
		
		30 < lib.subview2
		
		40 = HMENU
    40 {
      special = list
      special.value = 490
      includeNotInMenu = 1
			1 = TMENU
      1{
        NO = 1
        NO.allWrap = <li>|</li>
        NO.ATagParams= class="highlight"
		  }
     }
	}
	
	20 = COA
	20.wrap = <div class="secondary-nav"><ul>|</ul></div>
	20 {
		10 = TEXT
		10.value (
			<div class="search">
            	<form action="post" method="#" id="search-form">
                	<input type="text" class="text" required="" placeholder="Suche">
                    <input type="submit" class="btn-search" value="search">
                </form>
            </div>
		)
    10 >
    5 = TEXT
		5.value = <li><div class="tx-solr-searchbox search">
    10 < plugin.tx_solr_pi_search
		15 = TEXT
    15.value = </div></li>
		
		20 < lib.iconnav
	}
  wrap = <div class="quick-links mob-hide">|</div>	
}