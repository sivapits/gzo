/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 $('.accordion-toggle').keypress(function(){
    return false;
});
jQuery.validator.addMethod("alphanumeric", function(value, element) {
	return !jQuery.validator.methods.required(value, element) || /^[a-zA-Z]+$/i.test(value);
}
, "Letters, numbers or underscores only please");
var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
/*IE 8 Handler Function*/
$('#sendMail').on('click',function(e){
	$('#send-e-card').find(':input').each(function(){
		var phText 	= $(this).attr('placeholder');
		var Invalue	= $(this).val();
		var Inele	= $(this).attr('id');
		if(phText == Invalue){
			'<label id="'+Inele+'-error" class="error" for="recname">erforderlich</label>';
			$(this).val('');
		}
		else{
			$("#"+Inele+"-error").remove();
		}
	});
	return true;
});
/*IE 8 Handler Function*/

$("#send-e-card").validate({
	submitHandler: function(form) {
		var recieverName = $.trim($('#recname').val());
		var recieverEmail = $.trim($('#recemail').val());
		var message = $.trim($('#message').val());
		var baseurl = $('#base_url').val();
		var sendPath = $.trim($('#sendPath').val());
		var senderName = $.trim($('#sendername').val());
		var senderAddress = $.trim($('#senderemail').val());
		showLoader();
		$.ajax({
			cache: false,
			url: baseurl + "?&tx_tntbabygallery_tntbabygallery[action]=sendcard&tx_tntbabygallery_tntbabygallery[controller]=Gallery",
			dataType: 'json',
			type: 'post',
			data: {
				'tx_tntbabygallery_tntbabygallery[sendPath]': sendPath,
				'tx_tntbabygallery_tntbabygallery[recName]': recieverName,
				'tx_tntbabygallery_tntbabygallery[recEmail]': recieverEmail,
				'tx_tntbabygallery_tntbabygallery[recMessage]': message,
				'tx_tntbabygallery_tntbabygallery[senderName]': senderName,
				'tx_tntbabygallery_tntbabygallery[senderAddress]': senderAddress
			},
			success: function(response) {
				if (response.status == "true") {
					$('.statusResp').html(response.message);
					$('#send-e-card')[0].reset();
					$('#send-e-card').find(':input').each(function(){
						$(this).val('');
						$(this).focus();
						$(this).blur();
					});
					hideLoader();
				}
			}
		});
	},
	messages: {
		recname: {
			required: reqError
		},
		message: {
			required: reqError
		},
		recemail:{
			required:emailerror
		},
		sendername: {
			required: reqError 
		},
		senderemail: {
			required: emailerror 
		},
	}
});

//TAB Form

$("#tabsend-e-card").validate({
	submitHandler: function(form) {
		var recieverName = $.trim($('#tabrecname').val());
		var recieverEmail = $.trim($('#tabrecemail').val());
		var message = $.trim($('#tabmessage').val());
		var baseurl = $('#base_url').val();
		var sendPath = $.trim($('#sendPath').val());
		var senderName = $.trim($('#tabsendername').val());
		var senderAddress = $.trim($('#tabsenderemail').val());
		showLoader();
		$.ajax({
			cache: false,
			url: baseurl + "?&tx_tntbabygallery_tntbabygallery[action]=sendcard&tx_tntbabygallery_tntbabygallery[controller]=Gallery",
			dataType: 'json',
			type: 'post',
			data: {
				'tx_tntbabygallery_tntbabygallery[sendPath]': sendPath,
				'tx_tntbabygallery_tntbabygallery[recName]': recieverName,
				'tx_tntbabygallery_tntbabygallery[recEmail]': recieverEmail,
				'tx_tntbabygallery_tntbabygallery[recMessage]': message,
				'tx_tntbabygallery_tntbabygallery[senderName]': senderName,
				'tx_tntbabygallery_tntbabygallery[senderAddress]': senderAddress
			},
			success: function(response) {
				if (response.status == "true") {
					$('.statusResp').html(response.message);
					$('#tabsend-e-card')[0].reset();
					hideLoader();
				}
			}
		});
	},
	messages: {
		recname: {
			required: reqError
		},
		message: {
			required: reqError
		},
		recemail:{
			required:emailerror
		},
		sendername: {
			required: reqError 
		},
		senderemail: {
			required: emailerror 
		},
	}
});
//Mob Send E Card
$("#mobsend-e-card").validate({
	submitHandler: function(form) {
		var recieverName = $.trim($('#mobrecname').val());
		var recieverEmail = $.trim($('#mobrecemail').val());
		var message = $.trim($('#mobmessage').val());
		var baseurl = $('#base_url').val();
		var sendPath = $.trim($('#sendPath').val());
		var senderName = $.trim($('#mobsendername').val());
		var senderAddress = $.trim($('#mobsenderemail').val());
		showLoader();
		$.ajax({
			cache: false,
			url: baseurl + "?&tx_tntbabygallery_tntbabygallery[action]=sendcard&tx_tntbabygallery_tntbabygallery[controller]=Gallery",
			dataType: 'json',
			type: 'post',
			data: {
				'tx_tntbabygallery_tntbabygallery[sendPath]': sendPath,
				'tx_tntbabygallery_tntbabygallery[recName]': recieverName,
				'tx_tntbabygallery_tntbabygallery[recEmail]': recieverEmail,
				'tx_tntbabygallery_tntbabygallery[recMessage]': message,
				'tx_tntbabygallery_tntbabygallery[senderName]': senderName,
				'tx_tntbabygallery_tntbabygallery[senderAddress]': senderAddress
			},
			success: function(response) {
				if (response.status == "true") {
					$('.statusResp').html(response.message);
					$('#mobsend-e-card')[0].reset();
					hideLoader();
				}
			}
		});
	},
	messages: {
		recname: {
			required: reqError
		},
		message: {
			required: reqError
		},
		recemail:{
			required:emailerror
		},
		sendername: {
			required: reqError 
		},
		senderemail: {
			required: emailerror 
		},
	}
});

$('.resetBack').on('click',function(e){
	e.preventDefault();
	$('.statusResp').html('');
	
	$(this).closest("form").find(':input').each(function(){
		$(this).val('');
		$(this).focus();
		$(this).blur();
	});
  
	$('label.error').remove();
});

$('.counted').on('keyup',function(){
  countChar(this);
});
function countChar(val) {
  var len = val.value.length;
  if (len >= 300) {
    val.value = val.value.substring(0, 300);
  }
};

function showLoader() {
		$('.loading').show();
}

function hideLoader() {
	$('.loading').fadeOut(1000, "linear");
}
