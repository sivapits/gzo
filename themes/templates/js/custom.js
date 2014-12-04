$( document ).ready(function() {
    //$('input, textarea').placeholder();
	
	var imgCount = $('.item.home_banner').length;
	/*var container = $('<ol class="carousel-indicators" />');
	for( i = 0; i < parseInt(imgCount); i++ ){
		container.append('<li data-target="#carousel-example-generic" data-slide-to="'+i+'" />');	
	}
	$( '.carousel-inner' ).before( container );
	$( '.carousel-inner div:first' ).addClass('active');
	$( '.carousel-indicators li:first' ).addClass('active');*/ // commented because of Carousel having a problem 
	$( '#spl_list' ).next("a").remove();
  
  //mega drop tweak
  if($('.no-col').length > 0){
    var buildli = '';
    $('.no-col').each(function(){
       buildli += $(this).html();
    });
      
    $sel = $('.no-col').parent();
    $('.no-col').remove();
    $sel.find('.list-unstyled:last').append(buildli);
    if($('.nav-widget').prev('a').length == 1){
      $('.nav-widget').prev('a').remove();
    }
  }
  
  // footer col-sm4 addition
  $('.col-md-9 .quick-list ul').addClass('col-sm-4');
  // footer inject contact info to div.contact-mob 
  if($('.col-md-3 .contact-info').length > 0) {
    $('.contact-mob').html($('.col-md-3 .contact-info').html());
  }
  
  if($('.mobilemenu').find('.col-md-8 .contact-info').length > 0) {
    $('.mobilemenu .contact-mob').html($('footer.innerpage').not('.mobilemenu').find('.col-md-8 .contact-info').html());
  }
  
  // tweak for news widget header titles
  if($('.mod-details .csc-default .show-btn').length > 0){
   $('.mod-details .csc-default .show-btn').each(function(){
     
     var header = $(this).parent('h2').html();
     var headtext = header.replace('<span class="show-btn"></span>','');
     var cid = $(this).parent().parent().parent().attr('id');
     var headitem = '<h2 class="desktop-hide collapsed" data-target="#item' + cid + '" data-toggle="collapse"><a>' + headtext + '</a></h2><h2 class="mob-hide">' + headtext + '</h2>';
     
     $(this).parent().parent().next('div').attr('id','item' + cid);
     $(this).parent().parent('.csc-header').html(headitem);
    
 
   });
 }
 
  // tweak for FCE with dropdown
  if($('.mod-details').find('img').length > 0){
    $('.mod-details').find('img').not('img.loader-img').removeAttr('width');
    $('.mod-details').find('img').not('img.loader-img').removeAttr('height');
    //$('.mod-details').find('img').not('img.loader-img').css('width','100%');
  }
  if($('.mod-details .selteaser').length > 0){
    $('.mod-details .selteaser').change(function() {
      window.location.replace($(this).val());
    });
  }
  
  // tweak for link class in anchor with FCE without image quicklinks
  $('.thumbno').each(function(){
  if($(this).parent().parent().parent().find('img').length < 1){
     $(this).parent().parent().parent().find('h3 a').addClass('link');  
  }

  });
  
  // tweak for main sub view menu if hidden
    $('.primary-nav .sub-view a').each(function(){
        if($(this).html() == '<span class="rem">nav</span>'){
           $(this).parent().remove();
        } 
       
    });
    
    $('.humanbuilder .btn-imagemap').css('cursor','default'); 
	
  
  
  // For adding file icon class 
  if( $( ".news-related-files-link" ).length > 0 ){
  $( ".news-related-files-link" ).find( 'a' ).each( function( index ) { 
    if( $( this ).attr( "href" ) ){
      var icon = $( this ).attr( "href" );
      var lastFive = icon.substr( ( icon.length ) - 5 );
      var file_ext = lastFive.split( "." );
      $( this ).parent().next().append( '<span class="icon icon-' + file_ext[1] + '">icon</span>' );
      if( file_ext[1] == "doc" || file_ext[1] == "docx" ){
        file_ext[1] = "word";
      }
      $( this ).parent().next().find( '.icon' ).attr( "class","icon icon-"+file_ext[1] );
    }
  }); 
}
  
  // Old Script
  /*
  if( $(".news-related-files-link").length >0){
    $(".news-related-files-link").find('a').each(function( index ) { 
    
    if( $( this ).attr("class") ){
        var icon = $( this ).attr("class");	
	icon = icon.replace("download-link basic-class " ,"");
	$('<span class="' + icon + '">icon</span>').insertAfter($( this ).parent().next()); 
    	$( this ).parent().next().append('<span class="icon icon-' + icon + '">icon</span>');
	if(icon == "doc" || icon == "docx" ) icon = "word";
	$( this ).parent().next().find('.icon').attr("class","icon icon-"+icon);
    }
  }); 
 }  
 */
  //<a class="tel" href="tel:41 44 934 11 11">Tel. +41 44 934 11 11</a>
    // tweak for mobile view telephone
if($('.desktop-hide .tel').length > 1){
  //var telhtml = '<div class="tele"><a class="tel" href="tel:' + j + '">' + $('.desktop-hide .tel p.tel').html() + '</tel></div>';
  //var telhtml = '<div class="tele"><tel>' + $('.desktop-hide .tel').html() + '</tel></div>';
   var s = $('.desktop-hide .tel').html();
  var j = s.replace(/[^\d]/g, "");
  //alert (j);
  var telhtml = '<div class="tele"><a class="tel" href="tel:' + j + '">' + $('.desktop-hide .tel').html() + '</a></div>';
 
  $('.desktop-hide .tel').remove(); 
  $('.desktop-hide .contact-info').append(telhtml);
  if($('.desktop-hide .contact-info tel .tel').length > 0){
      $('.desktop-hide .contact-info tel').html($('.desktop-hide .contact-info tel .tel').html());
  }
  
}  

$('.bg-mobile .icons img').each(function(){
   $(this).parent().attr('class','icon');
   $(this).attr('src',$(this).attr('src').replace(/(.*)(\.[^.]+)$/, '$1-m$2')); 

});

if( $('.inhalt').find('ul.listing li').length > 0 ){    
	  $('.inhalt').find('ul.listing li').wrapInner("<span></span>");
}    

if( $('#wrapper').find('.feEditAdvanced-firstWrapper').length > 0 ){
	 $('body').css('overflow', 'visible'); 
}

// menu active states for shortcuts
if($('.megdrp').length > 0){
var url = window.location.href;

$('.megdrp a').filter(function() {
    return this.href == url;
}).addClass('menuactive');
}

});

function goback(){
window.history.back();
}
