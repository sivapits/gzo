/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var sortQuery = '';
var order = 0;
var sortObj = '';
var ajaxStatus = 1;
var stoppedTyping;
$(document).ready(function() {
    var getDocumnet = 0;
    //doGetValue();
    $(".selectpicker").selectpicker('refresh');
    $("#thema_selector").change(function() {
        getDocumnet = 0;

        if ($(this).val() > 0) {
            $("body").find("#thema_subcat").val('');
            $('#reset-0').removeClass('deactive').addClass("active");
            doGetValue();
        } else {
            resetData(0, '');

        }
    });
    $("#filter_text").keyup(function() {

        if ($("#filter_text").val().length > 0) {
            $('#reset-2').removeClass('deactive').addClass("active");
            

        } else {
			$("#filter_text").attr('placeholder','Suchbegriff');
            $('#reset-2').removeClass('active').addClass("deactive");
            doGetValue();
            //$('#documnets').html('');
        }
// is there already a timer? clear if if there is
        if (stoppedTyping)
            clearTimeout(stoppedTyping);
        // set a new timer to execute 3 seconds from last keypress
        stoppedTyping = setTimeout(function() {
            // code to trigger once timeout has elapsed
            getDocumnet = 1;
              if ($("#filter_text").val().length > 0) {
            doGetValue();
		}
        }, 3e3); // 3 seconds
    });

    function doGetValue() {
        pageId = $('#page_id').val();
        pageLanguage = $('#page_lang').val();
        themaValue = $("#thema_selector").val();
        themaSubCat = $("#thema_subcat").val();
        if (themaSubCat === undefined) {
            themaSubCat = '';

        }
        filterText = $("#filter_text").val();
        if (themaValue.length > 0 || filterText.length > 0) {
            if (getDocumnet == 0) {
                $.ajax({
                    type: "GET",
                    url: "?id=" + pageId + "&L=" + pageLanguage + "&tx_tntdownloadmodule_tntdownloadmodule[type]=1&tx_tntdownloadmodule_tntdownloadmodule[action]=show&tx_tntdownloadmodule_tntdownloadmodule[controller]=DownloadModule&tx_tntdownloadmodule_tntdownloadmodule[cat_id]=" + themaValue,
                    success: function(data) {
                        $('#step2').html(data);
                        $(".selectpicker").selectpicker('refresh');
                    }
                });
            }
            load(1);

        } else {
            $("body").find("#thema_subcat option:first").attr('selected', 'selected');
            $("body").find("#thema_subcat").attr('disabled', 'disabled');
            load(1);
        }
    }

});
function load(page) {
    ajaxStatus = 0;
    //$('.ajaxLoadingIndicator').find('img').css("width", "25px");
    $('.ajaxLoadingIndicator').css("display",'block');
    pageLanguage = $('#page_lang').val();
    pageId = $('#page_id').val();
    themaValue = $("#thema_selector").val();
    themaSubCat = $("#thema_subcat").val();
    if (themaSubCat > 0) {
        $('#reset-1').removeClass('deactive').addClass("active");
    } else {
        $('#reset-1').removeClass('active').addClass("deactive");
    }

    if (themaSubCat === undefined) {
        themaSubCat = '';

    }
    filterText = $("#filter_text").val();
    if(filterText == 'Suchbegriff'){
		filterText = '';
	}
    ajaxLink = "?id=" + pageId + "&L=" + pageLanguage + "&tx_tntdownloadmodule_tntdownloadmodule[sort]=" + sortQuery + "&tx_tntdownloadmodule_tntdownloadmodule[currentPage]=" + page + "&tx_tntdownloadmodule_tntdownloadmodule[type]=2&tx_tntdownloadmodule_tntdownloadmodule[action]=show&tx_tntdownloadmodule_tntdownloadmodule[controller]=DownloadModule&tx_tntdownloadmodule_tntdownloadmodule[cat_id]=" + themaValue + "&tx_tntdownloadmodule_tntdownloadmodule[subcat_id]=" + themaSubCat + "&tx_tntdownloadmodule_tntdownloadmodule[filterText]=" + filterText;
    //permaLink = "?id=" + pageId + "&L=" + pageLanguage + "&tx_tntdownloadmodule_tntdownloadmodule[sort]=" + sortQuery + "&tx_tntdownloadmodule_tntdownloadmodule[currentPage]=" + page + "&tx_tntdownloadmodule_tntdownloadmodule[action]=permalink&tx_tntdownloadmodule_tntdownloadmodule[controller]=DownloadModule&tx_tntdownloadmodule_tntdownloadmodule[cat_id]=" + themaValue + "&tx_tntdownloadmodule_tntdownloadmodule[subcat_id]=" + themaSubCat + "&tx_tntdownloadmodule_tntdownloadmodule[filterText]=" + filterText,

    $.ajax({
        type: "GET",
        url: ajaxLink,
        success: function(data) {
            $('#documnets').html(data);
            ajaxStatus = 1;
            $(".selectpicker").selectpicker('refresh');
            count = $('body').find('#docCount').val();
            countText = "Alle Anzeigen";
            if (count.length > 0) {
                countText = countText + " (" + count + ")";
            }
            $('#countButton').val(countText);
            $('#permaLink').attr('href', $('body').find('#permalink').val());
            $('.ajaxLoadingIndicator').hide();
            $('body').find('#' + sortObj.id).removeClass('no_sort').addClass('')
        }
    });
}

function resetData(type, obj) {
    if(ajaxStatus == 0 ){
      return;  
    }
    themaValue = $("#thema_selector").val();
    textValue = $("body").find("#filter_text").val();
    if (type == 0) {
        $("body").find("#documnets").html('');
        //$("body").find("#filter_text").attr('disabled', 'disabled');
        $("body").find("#thema_selector option:first").attr('selected', 'selected');
        $("body").find("#thema_subcat option:first").attr('selected', 'selected');
        $("body").find("#thema_subcat").attr('disabled', 'disabled');
        $(".selectpicker").selectpicker('refresh');
        $("body").find("#thema_subcat").val('');
        //$("body").find("#filter_text").val('');
        $('#reset-0').removeClass('active').addClass("deactive");
        $('#reset-1').removeClass('active').addClass("deactive");
        if (textValue.length > 0) {
            load(1);
        }


    }
    if (type == 1) {
        subCatValue = $("body").find("#thema_subcat").val();
        if (themaValue > 0 && subCatValue > 0) {
            countText = "Alle Anzeigen";
            $('#countButton').val(countText);
            $("body").find("#documnets").html('');
            $("body").find("#thema_subcat option:first").attr('selected', 'selected');
            $(".selectpicker").selectpicker('refresh');
            load(1);
            $('#reset-1').removeClass('active').addClass("deactive");
        }
    }

    if (type == 2) {

        textValue = $("body").find("#filter_text").val();
        subCatValue = $("body").find("#thema_subcat").val();
        if (textValue.length > 0) {
            countText = "Alle Anzeigen";
            $('#countButton').val(countText);
            $("body").find("#filter_text").val('');
            $("body").find("#documnets").html('');
            if (themaValue > 0 || subCatValue > 0) {
                load(1);
            }
            $('#reset-2').removeClass('active').addClass("deactive");
        }

    }

}
function sortData(field, obj) {
    page = 1;
    if (order == 0) {
        sortOrder = 'ASC'
        order = 1;
    } else {
        sortOrder = 'DESC'
        order = 0;
    }
    sortQuery = field + ' ' + sortOrder;
    sortObj = obj;
    load(1);

}

$('.reset').on('click',function(){
	$('.placeholder').each(function(){
		var plVal = $(this).attr('placeholder');
		if($(this).val() == ''){
			$(this).val(plVal);
		}
	});
});

$('input,textarea').focus(function(){
   $(this).data('placeholder',$(this).attr('placeholder'))
   $(this).attr('placeholder','');
   var placeholderText = $(this).val();
   if(placeholderText == 'Suchbegriff'){
       
      $(this).val(''); 
   }
   
});
$('input,textarea').blur(function(){
   $(this).attr('placeholder',$(this).data('placeholder'));
});
