jQuery(document).ready(function($) {
    for(var f=document.forms,i=f.length;i--;)f[i].setAttribute("novalidate","");

       
    $('input').attr('data-prompt-position',"bottomLeft");
    $('input').data('promptPosition',"bottomLeft");
    $('textarea').attr('data-prompt-position',"bottomLeft");
    $('textarea').data('promptPosition',"bottomLeft");
	if ($.fn.validationEngine) {
		$('.powermail_form').validationEngine();
	}

	// Tabs
	if ($.fn.powermailTabs) {
		$('.powermail_morestep').powermailTabs();
	}
	
});