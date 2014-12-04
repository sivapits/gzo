//
//	Project:	
//	Version:	1.0.0
//	Date:
//	Auhor:		
// 
// Page Meta elements 
/*
Configures meta information for the website. It's possible this template
remains empty because most of the information is handled by constants, which
are not allowed here. Constant settings belong to the root.
*/

page.meta {
  	viewport = width=device-width, initial-scale=1.0, maximum-scale=1.0
  	#viewport = width=device-width, initial-scale=1.0
	# Use the meta tag 'description' from the constants as default value
	# If the meta field description in the page properties is filled, then this will override the default.
	#description = {$meta.description}
  description =
	description.override.field = description

	#author = {$meta.author}
  author =
	author.override.field = author

	#keywords = {$meta.keywords}
  keywords =
	#keywords.override.field = keywords
  robots =
	#robots = {$meta.robots}
}

#page.meta.X-UA-Compatible = IE=edge,chrome=1
#page.meta.X-UA-Compatible.httpEquivalent = 1 

// Meta elements will be used from news data
[PIDinRootline = {$pages.newspid}]

page.meta.description >
page.meta.description = TEXT
page.meta.description.data = register:newsSubheader

page.meta.keywords >
page.meta.keywords = TEXT
page.meta.keywords.data = register:newsKeywords
[global]

#<meta name="format-detection" content="telephone=no">
page.meta.format-detection = telephone=no
page.meta.SKYPE_TOOLBAR = SKYPE_TOOLBAR_PARSER_COMPATIBLE

[globalVar = GP:tx_tntdiseases_tntdiseases|diseaseSelection > 0]
page.meta.description.cObject = TEXT
page.meta.description.cObject{
dataWrap = DB:tx_tntdiseases_domain_model_diseases:{GP:tx_tntdiseases_tntdiseases|diseaseSelection}:seo_description_tag
wrap3 = {|}
insertData = 1
} 
[end]