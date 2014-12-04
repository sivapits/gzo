//
//	Project:	
//	Version:	1.0.0
//	Date:
//	Auhor:		
//

// 
// CONSTANT for CONFIG typoscript
// file: config.ts
//

config{
  adminPanel = 1
  # change debug=0 in production environment
  debug = 0
  no_cache = 0
  renderCharset = utf-8
  metaCharset = utf-8
  absRefPrefix = 
  language = de
  locale_all = de_DE.UTF-8
  htmlTag_langKey = de_DE
  siteURL = http://p233297.mittwaldserver.info/
  absRefPrefix = http://p233297.mittwaldserver.info/ 
}

//
// Constants for header and template typoscripts
// typoscript files under headerpart folder
//

filepath{
  #css = http://ui.pitsolutions.com/public/gzo/assets_html/v1/css/
  #scripts = http://ui.pitsolutions.com/public/gzo/assets_html/v1/js/
  css = fileadmin/themes/templates/css/ 
  scripts = fileadmin/themes/templates/js/
  template = fileadmin/themes/templates/
  images = fileadmin/themes/templates/images/ 
}

//
// Constants for page META
// file: meta.ts
//

meta{
  description = GZO
  author =  GZO
  keywords = GZO Spital Wetzikon
  robots = index, no-follow

}

//Sitename
siteName = GZO Spital Wetzikon
styles.content.imgtext.linkWrap.lightboxEnabled = 1