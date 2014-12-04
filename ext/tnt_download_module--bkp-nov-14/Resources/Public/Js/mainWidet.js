/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var sortQuery = '';
var order = 0;
var sortObj = '';
var ajaxStatus = 0;
var getDocumnet = 0;
var stoppedTyping;
$(document).ready(function() {
    $(".thema_selector").change(function() {
        getDocumnet = 0;
        formId = $(this).closest("form")[0].id;
        sectionId = formId.split('-');
        if ($(this).val() > 0) {
            // $('#' + formId).find(".filter_text").removeAttr('disabled');
            doGetValue(formId);
        } else {
            resetData(0, sectionId[1]);

        }
    });

    $(".filter_text").keyup(function() {
        formId = $(this).closest("form")[0].id;
        themaValue = $('#' + formId).find(".thema_selector").val();
        themaSubCat = $('#' + formId).find(".thema_subcat").val();
        if ($('#' + formId).find(".filter_text").val().length > 0) {
            $('#' + formId).find('.reset-2').removeClass('deactive').addClass("active");

        } else {

            $('#' + formId).find('.reset-2').removeClass('active').addClass("deactive");
            $('#' + formId).find(".documnets").html('');
            $('#' + formId).find('.docCount').val('');
            countText = "Alle Anzeigen";
            $('#' + formId).find('.countButton').val(countText);
            $('#' + formId).find(".countButton").attr('disabled', 'disabled');
            
        }
// is there already a timer? clear if if there is
        if (stoppedTyping)
            clearTimeout(stoppedTyping);
        // set a new timer to execute 3 seconds from last keypress
        stoppedTyping = setTimeout(function() {
            // code to trigger once timeout has elapsed
                    getDocumnet = 1;
                    sectionId = formId.split('-');
                    if ($('#' + formId).find(".filter_text").val().length > 0) {
                        load(sectionId[1]);
            }

        }, 3e3); // 3 seconds

    });
});
function doGetValue(formId) {
    sectionId = formId.split('-');
    pageId = $('#page_id').val();
    pageLanguage = $('#page_lang').val();
    themaValue = $('#' + formId).find(".thema_selector").val();
    themaSubCat = $('#' + formId).find(".thema_subcat").val();
    if (themaSubCat === undefined) {
        themaSubCat = '';

    }
    $('#' + formId).find(".thema_subcat").val('');
    filterText = $('#' + formId).find(".filter_text").val();
    if (themaValue.length > 0 || filterText.length > 0) {
        if (getDocumnet == 0) {
            $('#' + formId).find(".thema_selector").attr('disabled', 'disabled');
            $('#' + formId).find(".thema_subcat").attr('disabled', 'disabled');
            $.ajax({
                type: "GET",
                url: "?id=" + pageId + "&L=" + pageLanguage + "&tx_tntdownloadmodule_tntdownloadmodule[viewType]=widget&tx_tntdownloadmodule_tntdownloadmodule[type]=1&tx_tntdownloadmodule_tntdownloadmodule[action]=show&tx_tntdownloadmodule_tntdownloadmodule[controller]=DownloadModule&tx_tntdownloadmodule_tntdownloadmodule[cat_id]=" + themaValue + "&tx_tntdownloadmodule_tntdownloadmodule[randNumber]=" + sectionId[1],
                success: function(data) {
                    $('#' + formId).find('.step2').html(data);
                    $('#' + formId).find(".reset-0").removeClass('deactive').addClass("active");
                    //$('#' + formId).find(".reset-1").removeClass('deactive').addClass("active");
                    $('#' + formId).find(".thema_selector").removeAttr('disabled');
                    $('#' + formId).find(".thema_subcat").removeAttr('disabled');
                    $(".selectpicker").selectpicker('refresh');
                }
            });
        }
        load(sectionId[1]);

    } else {
        $('#' + formId).find(".thema_subcat option:first").attr('selected', 'selected');
        $('#' + formId).find(".thema_subcat").attr('disabled', 'disabled');
        load(sectionId[1]);
    }
}
function load(page) {
    ajaxStatus = 0;
    formId = 'form-' + page;
    $('#' + formId).find('.ajaxLoadingIndicator').css("display",'block');
    pageLanguage = $('#page_lang').val();
    pageId = $('#page_id').val();
    themaValue = $('#' + formId).find(".thema_selector").val();
    themaSubCat = $('#' + formId).find(".thema_subcat").val();
    if (themaSubCat > 0) {
        $('#' + formId).find('.reset-1').removeClass('deactive').addClass("active");
    } else {
        $('#' + formId).find('.reset-1').removeClass('active').addClass("deactive");
    }

    if (themaSubCat === undefined) {
        themaSubCat = '';

    }
    filterText = $('#' + formId).find(".filter_text").val();
    if(filterText == 'Suchbegriff'){
		filterText = '';
	}
    ajaxLink = "?id=" + pageId + "&L=" + pageLanguage + "&tx_tntdownloadmodule_tntdownloadmodule[viewType]=widget&tx_tntdownloadmodule_tntdownloadmodule[sort]=" + sortQuery + "&tx_tntdownloadmodule_tntdownloadmodule[currentPage]=1&tx_tntdownloadmodule_tntdownloadmodule[type]=2&tx_tntdownloadmodule_tntdownloadmodule[action]=show&tx_tntdownloadmodule_tntdownloadmodule[controller]=DownloadModule&tx_tntdownloadmodule_tntdownloadmodule[cat_id]=" + themaValue + "&tx_tntdownloadmodule_tntdownloadmodule[subcat_id]=" + themaSubCat + "&tx_tntdownloadmodule_tntdownloadmodule[filterText]=" + filterText+ "&tx_tntdownloadmodule_tntdownloadmodule[randNumber]=" + page;
    //permaLink = "?id=" + pageId + "&L=" + pageLanguage + "&tx_tntdownloadmodule_tntdownloadmodule[sort]=" + sortQuery + "&tx_tntdownloadmodule_tntdownloadmodule[currentPage]=" + page + "&tx_tntdownloadmodule_tntdownloadmodule[action]=permalink&tx_tntdownloadmodule_tntdownloadmodule[controller]=DownloadModule&tx_tntdownloadmodule_tntdownloadmodule[cat_id]=" + themaValue + "&tx_tntdownloadmodule_tntdownloadmodule[subcat_id]=" + themaSubCat + "&tx_tntdownloadmodule_tntdownloadmodule[filterText]=" + filterText,
    $.ajax({
        type: "GET",
        url: ajaxLink,
        success: function(data) {
            $('#' + formId).find('.documnets').html(data);
            ajaxStatus = 1;
            $(".selectpicker").selectpicker('refresh');
            count = $('#' + formId).find('.docCount').val();
            countText = "Alle Anzeigen";
            if (count.length > 0) {
                countText = countText + " (" + count + ")";
                $('#' + formId).find(".countButton").removeAttr('disabled');
            }else{
                $('#' + formId).find(".countButton").attr('disabled', 'disabled');
            }
            $('#' + formId).find('.countButton').val(countText);
            $('#' + formId).find('.ajaxLoadingIndicator').hide();
        }
    });
}

function resetData(type, Id) {
    if(ajaxStatus == 0 ){
        
      return;  
    }
    formId = 'form-' + Id;
    themaValue = $('#' + formId).find(".thema_selector").val();
    textValue = $('#' + formId).find(".filter_text").val();
    if (type == 0) {
            countText = "Alle Anzeigen";
            $('#' + formId).find('.countButton').val(countText);
            $('#' + formId).find(".documnets").html('');
            //$('#' + formId).find(".filter_text").attr('disabled', 'disabled');
            $('#' + formId).find(".thema_selector option:first").attr('selected', 'selected');
            $('#' + formId).find(".thema_subcat option:first").attr('selected', 'selected');
            $('#' + formId).find(".thema_subcat").attr('disabled', 'disabled');
            $(".selectpicker").selectpicker('refresh');
            $('#' + formId).find(".thema_subcat").val('');
            //$('#' + formId).find(".filter_text").val('');
            $('#' + formId).find('.docCount').val('');
            $('#' + formId).find('.reset-0').removeClass('active').addClass("deactive");
            $('#' + formId).find('.reset-1').removeClass('active').addClass("deactive");
            if(textValue.length > 0){
              load(Id);             
            }
            
    }
    if (type == 1) {
        subCatValue = $('#' + formId).find(".thema_subcat").val();
        if (themaValue > 0 && subCatValue > 0) {
            countText = "Alle Anzeigen";
            $('#' + formId).find('.countButton').val(countText);
            $('#' + formId).find(".documnets").html('');
            $('#' + formId).find(".thema_subcat option:first").attr('selected', 'selected');
            $(".selectpicker").selectpicker('refresh');
            $('#' + formId).find('.docCount').val('');
            load(Id);
            $('#' + formId).find('.reset-1').removeClass('active').addClass("deactive");
        }
    }

    if (type == 2) {
        subCatValue = $('#' + formId).find(".thema_subcat").val();
        textValue = $('#' + formId).find(".filter_text").val();
        if (textValue.length > 0) {
            countText = "Alle Anzeigen";
            $('#' + formId).find('.countButton').val(countText);
            $('#' + formId).find(".filter_text").val('');
            $('#' + formId).find(".documnets").html('');
            $('#' + formId).find('.docCount').val('');
            if (themaValue > 0 || subCatValue > 0) {
                load(Id);
            }
            $('#' + formId).find('.reset-2').removeClass('active').addClass("deactive");
            $('#' + formId).find(".filter_text").attr('placeholder','Suchbegriff');
            $('#' + formId).find('input').placeholder();
        }

    }
            count = $('#' + formId).find('.docCount').val();
            if (count > 0) {
                $('#' + formId).find(".countButton").removeAttr('disabled');
            }else{
                $('#' + formId).find(".countButton").attr('disabled', 'disabled');
            }
}
function checkFileCount(Id) {
    formId = 'form-' + Id;
    count = $('#' + formId).find('.docCount').val();
    if (count > 0) {
        return true;
    } else {

        return false;
    }

}
