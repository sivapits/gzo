$('.disabledLink').on('click',function(e){
	e.preventDefault();
});
/*
$( ".black-img" ).on('mouseover',function() {
	$(this).css('display','none');
	$(this).parent().parent().find('.colour-img').show();
});
$( ".colour-img" ).on('mouseout',function() {
	$(this).css('display','none');
	$(this).parent().parent().find('.black-img').show();
}); */
$('.doc-img-crop').on('mouseover',function(){
  var currenSource = $(this).attr('src');
  var colourSource = $(this).siblings('.hidden-colour-image').attr('src');
  if( currenSource != colourSource){
    $(this).attr('src',colourSource);
    $(this).siblings('.hidden-colour-image').attr('src',currenSource);
  }
});
$('.doc-img-crop').on('mouseout',function(){
  var currenSource = $(this).attr('src');
  var colourSource = $(this).siblings('.hidden-colour-image').attr('src');
   if( currenSource != colourSource){
    $(this).attr('src',colourSource);
    $(this).siblings('.hidden-colour-image').attr('src',currenSource);
  }
});

checkBox();
function checkBox(className){
	var checkBox = $('.cbBind');
	$(checkBox).each(function(){
		//$(this).wrap( "<span class='custom-checkbox'></span>" );
		if(!$(this).is(':checked')){
			$(this).parent().removeClass("selected");
		}
	});
	$(checkBox).click(function(){
		$(this).parent().toggleClass("selected");
	});
}

function checkAll() {
	$('.depcheck').each(function(){
		this.checked = true;  
		$(this).parent().addClass("selected");
	});
	$('.placeholder').each(function(){
		var plVal = $(this).attr('placeholder');
		if($(this).val() == ''){
			$(this).val(plVal);
		}
	});
}
function unCheckAll()
{
	$('.depcheck').each(function(){
		this.checked = false;  
		$(this).parent().removeClass("selected");
	});
	$('.placeholder').each(function(){
		var plVal = $(this).attr('placeholder');
		if($(this).val() == ''){
			$(this).val(plVal);
		}
	});
}
function posCheckAll() {
	$('.poscheck').each(function() { //loop through each checkbox
		this.checked = true;  
		$(this).parent().addClass("selected");		
	});
	$('.placeholder').each(function(){
		var plVal = $(this).attr('placeholder');
		if($(this).val() == ''){
			$(this).val(plVal);
		}
	});
}
function posunCheckAll()
{
	$('.poscheck').each(function() { //loop through each checkbox
		this.checked = false;  
		$(this).parent().removeClass("selected");		
	});
	$('.placeholder').each(function(){
		var plVal = $(this).attr('placeholder');
		if($(this).val() == ''){
			$(this).val(plVal);
		}
	});
}

/* All Selected Conditions Managing Code */
	$('.position-select').on('click',function(){
		var row        = $(this);
		var isCheckBox = row.hasClass('poscheck');
		var isCheckAll = row.hasClass('posSelAll');
		var isUnCheckAll = row.hasClass('posSelNone');
		if(isCheckBox){
			var posLength = 0
			$('.poscheck').each(function(){
				if($(this).is(":not(:checked)")){
					posLength++;
				}
			});
			if(posLength > 0){
				$('#posall').val('0');
			}
			else{
				$('#posall').val('1');
			}
		}
		else if(isCheckAll){
			$('#posall').val('1');
		}
		else if(isUnCheckAll){
			$('#posall').val('0');
		}
	});
	
	$('.department-select').on('click',function(){
		var row        = $(this);
		var isCheckBox = row.hasClass('depcheck');
		var isCheckAll = row.hasClass('depSelAll');
		var isUnCheckAll = row.hasClass('depSelNone');
	  if(isCheckBox){
		  var depLength = 0
		  $('.depcheck').each(function(){
			if($(this).is(":not(:checked)")){
			  depLength++;
			}
		  });
		  if(depLength > 0){
			$('#depall').val('0');
		  }
		  else{
			$('#depall').val('1');
		  }
	  }
	  else if(isCheckAll){
		$('#depall').val('1');
	  }
	  else if(isUnCheckAll){
		$('#depall').val('0');
	  }
	});
/*EOC*/


$('input,textarea').focus(function(){
	var plVal = $(this).attr('placeholder');
	if( plVal == $(this).val() ){
		$(this).val('');
	}
});

$('input,textarea').blur(function(){
	var plVal = $(this).attr('placeholder');
	if( $(this).val() == '' ){
		$(this).val(plVal);
	}
});

$(window).load(function(){
	$('.position-select').each(function(){
	if($(this).is(":not(:checked)")){
	   $(this).parent().removeClass('selected');
	  }
	  else{
		$(this).parent().addClass('selected');
	  }
	});
	$('.department-select').each(function(){
	if($(this).is(":not(:checked)")){
	   $(this).parent().removeClass('selected');
	  }
	  else{
		$(this).parent().addClass('selected');
	  }
	}); 
});

