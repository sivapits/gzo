//
//	Project:	
//	Version:	1.0.0
//	Date:
//	Auhor:		
// 
// Include all powermail typoscript files here

page{
  includeJSFooterlibs {
    //powermailJQuery = fileadmin/themes/templates/js/vendor/jquery-1.10.2.min.js
    //powermailJQuery.external=1
	powermailJQuery >
    powermailJQueryUi >
    powermailJQueryUiDatepicker >
    powermailJQueryFormValidationLanguage >
    powermailJQueryFormValidation >
    powermailJQueryTabs >

	
  }
  includeCSS {
		powermailJQueryUiTheme >
		powermailJQueryUiDatepicker >
	}
  includeJSFooter {
  	powermailForm >
  	powermailJQueryFormValidationLanguage = fileadmin/themes/templates/extensions/powermail/Resources/Public/Js/jquery.validationEngine-en.js
    powermailJQueryFormValidation  = fileadmin/themes/templates/extensions/powermail/Resources/Public/Js/jquery.validationEngine.js
  	powermailForm_extrajs = fileadmin/themes/templates/extensions/powermail/Resources/Public/Js/form.js
    powermailJQueryFormValidationLanguage >
    powermailJQueryFormValidation >
  	powermailForm_extrajs >
  }
}

plugin.tx_powermail.view{
    templateRootPath = fileadmin/themes/templates/extensions/powermail/Resources/Private/Templates/
    partialRootPath = fileadmin/themes/templates/extensions/powermail/Resources/Private/Partials/
    layoutRootPath = fileadmin/themes/templates/extensions/powermail/Resources/Private/Layouts/
}

[browser = msie] && [version =<9]
page.includeJSFooter{
  powermailJQueryFormValidationLanguage >
 powermailJQueryFormValidation  > 
}
[end]