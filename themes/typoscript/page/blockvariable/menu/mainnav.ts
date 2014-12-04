//
//	Project:	
//	Version:	1.0.0
//	Date:
//	Auhor:		
// 
// Main top navigation in pages controlled by Treelevel 
// 
//
   
# Drop menu type 1 Show in mobile only
lib.megadropmob = HMENU
lib.megadropmob{
	special = directory
	special.value = 450
	1 = TMENU
	1 {
	  expAll = 1
    NO = 1
    NO.allWrap =  <li class="dropdown">|</li>
    ACT = 1
    ACT.allWrap =  <li class="dropdown">|</li>
    ACT.ATagParams = class="menuactive"
            
    IFSUB=1 
    IFSUB.allWrap = <li class="dropdown pos-rel">|<span class="icon-mobiledropdown"></span><ul class="dropdown-menu" role="menu">
    IFSUB.ATagParams = tabindex="-1"
    ACTIFSUB=1 
    ACTIFSUB.allWrap = <li class="dropdown pos-rel menuactive">|<span class="icon-mobiledropdown"></span><ul class="dropdown-menu" role="menu">
    ACTIFSUB.ATagParams = tabindex="-1" class="menuactive"

  }
  2 = TMENU
  2 {
    wrap = |</ul></li>
    expAll = 1
    NO.wrapItemAndSub = <li>|</li>
    
    IFSUB = 1
    IFSUB.allWrap = <li class="dropdown-submenu megdrp">|<span class="icon-mobiledropdown"></span><ul class="dropdown-menu">
    
    ACT = 1
    ACT.wrapItemAndSub = <li>|</li>
    ACT.ATagParams = class="menuactive"
    
    ACTIFSUB = 1
    ACTIFSUB.allWrap = <li class="dropdown-submenu">|<span class="icon-mobiledropdown"></span><ul class="dropdown-menu">
    ACTIFSUB.ATagParams = class="menuactive" 
  
  }
      
  3 < .2
  4 < .2
  5 < .2
	
}

lib.megadropdesk = HMENU
lib.megadropdesk{
    special = directory
    special.value = 450
    1 = TMENU
    1 {
        expAll = 1
        NO = 1
        NO.allWrap = <li class="dropdown">|</li>
        NO.ATagParams = class="dropdown-toggle disabled" data-toggle="dropdown"
        ACT = 1
        ACT.allWrap = <li class="dropdown">|</li>
        ACT.ATagParams = class="dropdown-toggle disabled menuactive" data-toggle="dropdown"
        
        IFSUB=1 
        IFSUB.allWrap = <li class="dropdown lft-bdr">|<ul class="dropdown-menu"><li><div class="yamm-content"><div class="row">
        IFSUB.ATagParams = class="dropdown-toggle disabled" data-toggle="dropdown"
        ACTIFSUB=1 
        ACTIFSUB.allWrap = <li class="dropdown lft-bdr">|<ul class="dropdown-menu"><li><div class="yamm-content"><div class="row">
        ACTIFSUB.ATagParams = class="dropdown-toggle disabled menuactive" data-toggle="dropdown"
    }
    2 = TMENU
    2 {
        wrap = |
        expAll = 1
        NO.wrapItemAndSub = <ul class="no-col"><li>|</li></ul>
        
        IFSUB = 1
        IFSUB.allWrap = <ul class="col-sm-2 list-unstyled"><li class="megdrp">|</li>
        
        ACT = 1
        ACT.wrapItemAndSub = <ul class="no-col"><li>|</li></ul>
        ACT.ATagParams = class="menuactive"
        
        ACTIFSUB = 1
        ACTIFSUB.allWrap = <ul class="col-sm-2 list-unstyled"><li>|</li>
        ACTIFSUB.ATagParams = class="menuactive" 
    
    }
    
    3 = TMENU
    3{
        wrap = |</ul>
        expAll = 1
        NO.wrapItemAndSub = <li class="sub-nav">|</li>
        
        ACT = 1
        ACT.wrapItemAndSub = <li class="sub-nav">|</li>
        ACT.ATagParams = class="menuactive"     
    }
	
}

# Normal Drop menu type 2 for desktop
lib.mainmenu2 = HMENU
lib.mainmenu2{
	#special = directory
	#special.value = 1
  entryLevel = 0
  excludeUidList = 44
	1 = TMENU
	1 {
  		expAll = 1
      NO = 1
  		NO{
        wrapItemAndSub = <li class="llevel dropdown">|</li>
        ATagParams = class="dropdown-toggle"
      }
      
      ACT = 1
  		ACT{
        wrapItemAndSub = <li class="dropdown">|</li>
        ATagParams = class="dropdown-toggle menuactive"
      }
      
      IFSUB = 1
      IFSUB{
         allWrap = <li class="llevel dropdown">|<ul class="dropdown-menu nonmega" role="menu">
         ATagParams = class="dropdown-toggle"
      }
      ACTIFSUB = 1
      ACTIFSUB{
         allWrap = <li class="llevel dropdown">|<ul class="dropdown-menu nonmega" role="menu">
         ATagParams = class="dropdown-toggle menuactive"
      }
                
  }
      
  2 = TMENU
  2 {
    wrap = |</ul></li>
    expAll = 1
    NO = 1
    NO{
      wrapItemAndSub = <li>|</li>
    }
    IFSUB = 1
    IFSUB{
       allWrap = <li class="dropdown-submenu">|<span class="icon-mobiledropdown"></span><ul class="dropdown-menu nonmega">
    }
  
    ACT = 1
    ACT{
      wrapItemAndSub = <li>|</li>
      ATagParams = class="menuactive"
    }
  
    ACTIFSUB = 1
    ACTIFSUB{
       allWrap = <li class="dropdown-submenu">|<span class="icon-mobiledropdown"></span><ul class="dropdown-menu nonmega">
       ATagParams = class="menuactive"
    }
    
  }
  
  3 < .2
  4 < .2
  5 < .2
}

# Normal Drop menu type 2 for mobile
lib.mainmenu2mob < lib.mainmenu2
lib.mainmenu2mob{
   1{
    NO.ATagParams >
    ACT.ATagParams >
    IFSUB{
         allWrap = <li class="dropdown pos-rel">|<span class="icon-mobiledropdown"></span><ul class="dropdown-menu nonmega" role="menu">
         ATagParams >
    }
    ACTIFSUB{
           allWrap = <li class="dropdown pos-rel">|<span class="icon-mobiledropdown"></span><ul class="dropdown-menu nonmega" role="menu">
           ATagParams = class="menuactive"
    }
   }
  2.IFSUB{
       allWrap = <li class="dropdown-submenu pos-rel">|<span class="icon-mobiledropdown"></span><ul class="dropdown-menu nonmega">
  }
  
  3 < .2
  4 < .2
  5 < .2
  
}

lib.quicklinksmob = HMENU
lib.quicklinksmob{
	special = list
	special.value = 1,490
  includeNotInMenu = 1
  1 = TMENU
	1 {
  		wrap = <li class="bg-mobile"><div class="quick-links"><div class="primary-nav clearfix"><ul>|</ul></div></div></li>
      NO = 1
  		NO{
        stdWrap.field = subtitle // title
        allWrap = <li>|</li>
  		  ATagParams = class="starter" || class="highlight"
      }
  }
}

# B template own navigation pages
[treeLevel = 3,4,5,6]&&[PIDinRootline =51,135,219]&&[globalVar=TSFE:page|layout<1]
lib.megadropmob >
lib.mainmenu2.entryLevel = 3
lib.mainmenu2mob.entryLevel = 3
[end]

[PIDinRootline =299,300,301,302,303,432]&&[globalVar=TSFE:page|layout<1]
lib.megadropmob >
lib.mainmenu2.entryLevel = 2
lib.mainmenu2mob.entryLevel = 2 
[end]


### updated navigation new August 26

lib.nav = COA
lib.nav{
  wrap = <nav role="navigation" class="navbar yamm navbar-default"><div class="container">|</div></nav>
  
  10 = TEXT
	10.value (
           <div class="navbar-header">
              <button type="button" id="nav-expander" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span><span class="rem">Navmobile</span></button><a href="#" class="navbar-brand">Yamm Megamenu</a>
            </div>
	)
  
  20 = COA
  20{
    wrap = <div id="navbar-collapse-1">|</div>
    #desktop menu
    1 = COA
    1{
       wrap = <ul class="nav navbar-nav mob-hide">|</ul>
       10 < lib.megadropdesk
       # configure FCE for quicklinks
       15 = RECORDS
       15 {
    	    tables = tt_content
    	    source = 186
       }
       15.wrap = |</div></div></li></ul></li>
       
       20 < lib.mainmenu2
      
    }
  
    # mobile menu
    2 = COA
    2{
      wrap = <ul class="nav navbar-nav desktop-hide">|</ul>
      10 < lib.quicklinksmob
      15 < lib.megadropmob
      20 < lib.mainmenu2mob
      25 < lib.iconnav
      25.wrap = <li class="bg-mobile"><div class="quick-links"><div class="secondary-nav"><ul>|</ul></div></div></li>
      
      30 = COA
      30{
        
        5=TEXT
        5.value = <div class="mod contact-info contact-mob"></div>
        10 < lib.footernav
        10.wrap = <div class="footer-links clearfix"><ul>|</ul></div>
        wrap = <li><footer class="innerpage mobilemenu"><div class="row-fluid"><div class="col-xs-12 col-md-8">|</div></div></footer></li>
        
      } 
      
    }
    
  }
  
}
# B template own navigation pages
[treeLevel = 3,4,5,6]&&[PIDinRootline =51,135,219]&&[globalVar=TSFE:page|layout<1]
lib.nav.20.1.10 >
lib.nav.20.1.15 >
lib.nav.20.2.15 >
[end]

[PIDinRootline =299,300,301,302,303,432]&&[globalVar=TSFE:page|layout<1]
lib.nav.20.1.10 >
lib.nav.20.1.15 >
lib.nav.20.2.15 >
[end]

lib.mainnav < lib.nav