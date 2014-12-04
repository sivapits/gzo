//
//	Project:	
//	Version:	1.0.0
//	Date:
//	Auhor:		
// 
//  SETUP for CONFIG typoscript

config {
  	// Administrator settings
	admPanel = {$config.adminPanel}
	debug = {$config.debug}
  	no_cache = {$config.no_cache}

	doctype = html5
	htmlTag_setParams = lang="de"
  #htmlTag_langKey = de
	xmlprologue = none
   
  	// Character sets
	renderCharset = {$config.renderCharset}
	metaCharset = {$config.metaCharset}
	additionalHeaders = Content-Type:text/html;charset={$config.metaCharset}
	moveJsFromHeaderToFooter = 1

	// Cache settings
	cache_period = 43200
	sendCacheHeaders = 1
	#cache_clearAtMidnight = 1
	
	// index search
	index_enable = 1
	index_externals = 1
	index_metatags = 1
  
  	// URL Settings
	tx_realurl_enable = 1
	simulateStaticDocuments = 0
  	xhtml_cleaning = all
  	baseURL = {$config.siteURL}
  
  	// Link settings
	absRefPrefix = {$config.absRefPrefix}
	prefixLocalAnchors = all

  	pageTitleFirst = {$pageTitleFirst}
  	noPageTitle = 2
  
  	// Code cleaning
	disablePrefixComment = 1

	// Move default CSS and JS to external file
	removeDefaultJS = external
	inlineStyle2TempFile = 1
  
  	// Language Settings
	uniqueLinkVars = 1
	sys_language_uid = 0
	language = {$config.language}
	locale_all = {$config.locale_all}
	htmlTag_langKey = {$config.htmlTag_langKey}
 
	noBlur = 1
  	disableImgBorderAttr = 1
  	defaultHeaderType = 2
    
    // source opt
    sourceopt.moveInlineCss = 0
    sourceopt.formatHtml.tabSize = 2
    
    //compression for js and css
    concatenateJsAndCss = 0
  	minifyCSS = 1 
  	minifyJS = 1 
    compressJs = 1
    compressCss = 1
	
	
 	// Multi domain links
  	#typolinkCheckRootline = 1
  	#typolinkEnableLinksAcrossDomains = 1
   
  	#spam protection
  	spamProtectEmailAddresses = 2
  	spamProtectEmailAddresses_atSubst = @<span style="display:none;">dont-want-spam.</span>
  
  	// Comment in the <head> tag
	headerComment (
				We <3 TYPO3
				===
	)
}
page.config.index_enable = 1
config.tx_extbase.mvc.callDefaultAcdetailActiontionIfActionCantBeResolved = 1