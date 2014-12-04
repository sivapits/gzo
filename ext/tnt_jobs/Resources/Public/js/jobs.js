if($('#onlineApproval').val() < 1)
	$('.tx-powermail').remove();
var appVal	=	$('#onlineApproval').val();
if(appVal == 0)
	$('.tx-powermail').remove();
else{
	$('.layout2').show();
	var row =	$('.joblinks').clone();
	$('.joblinks').remove();
	$('.tx-powermail').after(row);
}
$('#powermail_field_jobbezeichnung').attr('readonly','readonly');
var jobID = $('#jobID').val();
var extraParam = '&uid='+jobID;
            
var OldVal = $('.powermail_form').attr('action');
var newVal = OldVal+extraParam;
$('.powermail_form').attr('action',newVal);
