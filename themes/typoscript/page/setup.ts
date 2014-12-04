//
//	Project:	
//	Version:	1.0.0
//	Date:
//	Auhor:		
// 
//  Templavoila page template 
//  Variable
//

# TemplaVoilà page object
page = PAGE
page.10 = USER
page.10.userFunc = tx_templavoila_pi1->main_page
page.10.disableExplosivePreview = 1
page.shortcutIcon = fileadmin/themes/templates/images/favicon.ico


# core elements layout tweaks
# header with arrow

lib.stdheader.10{
	10 < lib.stdheader.10.1
	10.dataWrap = <h2>|<span class="show-btn"></span></h2>
	
	20 < lib.stdheader.10.1
	20.dataWrap = <h1 class="inhalt_header">|</h1>
}	

# frame wrappers
tt_content.stdWrap.innerWrap.cObject {
	101 = TEXT
  101.value = <article>|</article>
}

# lightbox bootstrap in text with image
tt_content.image.20.1.imageLinkWrap {
  JSwindow = 0
  directImageLink = 1
  linkParams.ATagParams {
    dataWrap = class="lightbox" data-lightbox="lightbox[{field:uid}]"
  }
}

[globalVar = TSFE:id = 1]
page.2 = TEXT
page.2.value = <h1 class="rem">GZO Spital Wetzikon</h1>
[global]