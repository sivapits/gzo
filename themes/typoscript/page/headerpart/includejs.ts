//
//	Project:	GZO
//	Version:	1.0.0
//	Date:
//	Auhor:		
// 
//  includeJs typoscript settings 
//

// Incude js in header
page.headerData.5 = TEXT
page.headerData.5.value = <script src="{$filepath.scripts}vendor/modernizr-2.6.2.min.js" type="text/javascript"></script>

[browser = msie] && [version =<9]
page.headerData.5.value(
	<script src="{$filepath.scripts}vendor/modernizr-2.6.2.min.js"></script>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js" type="text/javascript"></script>
)
[global]
page.headerData.5 >

page.includeJSFooterlibs{
  //jquery = typo3conf/ext/solr/resources/javascript/jquery/jquery.min.js 
  jquery = {$filepath.scripts}vendor/jquery-1.10.2.min.js
  //migrate = fileadmin/themes/templates/js/jquery-migrate-1.2.1.min.js
}

// Include JS in Footer
page.includeJSFooter {
	#file1 = {$filepath.scripts}vendor/jquery-1.10.2.min.js -- this is used in powermail/setup.ts now
	#file1.external = 1
  
	#file2 = {$filepath.scripts}custom.js
	#file3 = {$filepath.scripts}bootstrap.js
  	#file31 = {$filepath.scripts}bootstrap-select.js
	#file32 = {$filepath.scripts}solr/jquery.ui.core.js
	#file4 = {$filepath.scripts}plugins.js
	#file5 = {$filepath.scripts}lightbox.js
	#file6 = {$filepath.scripts}jquery.mousewheel.js
	#file7 = {$filepath.scripts}jquery.jscrollpane.min.js
	#file8 = {$filepath.scripts}solr/suggest.js
  	#file81 = {$filepath.scripts}bootstrap-filestyle.js
  	file82 = {$filepath.scripts}minified.js
  	file9 = {$filepath.scripts}main.js
  	#file91 = {$filepath.scripts}jquery.mobile.custom.min.js
    #file92 = {$filepath.scripts}ios-orientationchange-fix.js
    #file93 = {$filepath.scripts}jquery.placeholder.js
} 

page.headerData.8 = TEXT
page.headerData.8.value (
  <!--[if lt IE 9]>
     <script src="{$filepath.scripts}vendor/modernizr-2.6.2.min.js"></script>
	 <script src="http://html5shim.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
	 <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js" type="text/javascript"></script>
     <script defer type="text/javascript" src="fileadmin/themes/templates/js/pngfix.js"></script>
  <![endif]--> 
  
  <script type="text/javascript">  
	  	var mac_externalcss='fileadmin/themes/templates/css/macstyles.css' //if "external", specify Mac css file here
		var mactest=navigator.userAgent.indexOf("Mac")!=-1
		if (mactest)
		{
			document.write('<link rel="stylesheet" type="text/css" media="print" href="'+ mac_externalcss +'">')
		}
   </script>
)

[browser=msie] && [version <9]
	page.includeJSFooter.file82 = {$filepath.scripts}minified_ie.js 
[end]