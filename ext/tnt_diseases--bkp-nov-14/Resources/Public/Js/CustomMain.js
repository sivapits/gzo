/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var gender = 0;
var thisPageId = 0;
$(document).ready(function() {
    //$('#teaserSerach').attr('disabled', 'disabled');
    thisPageId = $('.ajaxUrl').val();
    gender = $('#select-gender').val();
    region = $('#select-region').val();
    if (gender > 0 && region > 0) {

        //$('#teaserSerach').removeAttr('disabled');

    }
    $("#select-gender").change(function() {
        region = $('#select-region').val();
        if (this.value > 0) {
            $('#select-region').removeAttr('disabled');
            /*if(region > 0 ){
               getDiseaseList();
            }*/
           $("body").find("#select-region option:first").attr('selected', 'selected');
           $("body").find("#select-disease option:first").attr('selected', 'selected');
           $('#select-disease').attr('disabled', 'disabled');   
        }else{
           $("body").find("#select-region option:first").attr('selected', 'selected');
           $("body").find("#select-disease option:first").attr('selected', 'selected');
           $('#select-region').attr('disabled', 'disabled');  
           $('#select-disease').attr('disabled', 'disabled');  
        }
           $(".custom-select").selectpicker('refresh');
           $(".selectpicker").selectpicker('refresh');
    });
    $("#select-region").change(function() {
        if (this.value > 0) {
            $('#select-disease').removeAttr('disabled');
        }else{
            $('#select-disease').attr('disabled', 'disabled');           
        }
         $(".selectpicker").selectpicker('refresh');
         $(".custom-select").selectpicker('refresh');
    });
    //getMultiView();

});
/*
 * getDiseaseList
 */
function getDiseaseList() {
    gender = $('#select-gender').val();
    region = $('#select-region').val();
    pageOption = $('#pageOption').val();
    categoryOption = $('#categoryOption').val();    
    viewType = $('#viewType').val();
    thisPageId = $('.ajaxUrl').val();
        $('.ajaxLoder').css('display','block');
        $.ajax({
            type: "GET",
            url: "?id=" + thisPageId + "&tx_tntdiseases_tntdiseases[action]=diseaseDropList&tx_tntdiseases_tntdiseases[controller]=Diseases&tx_tntdiseases_tntdiseases[genderOption]=" + gender +"&tx_tntdiseases_tntdiseases[regionOption]=" + region + "&tx_tntdiseases_tntdiseases[pageOption]=" + pageOption + "&tx_tntdiseases_tntdiseases[categoryOption]=" + categoryOption+ "&tx_tntdiseases_tntdiseases[viewType]=" + viewType,
            success: function(data) {
                $('#select-disease').html(data);
                $(".custom-select").selectpicker('refresh');
                $('.ajaxLoder').hide();
                //$('#teaserSerach').removeAttr('disabled');
            }
        });

}
/*
 * getMultiView
 */
function getMultiView() {
    gender = $('#select-gender').val();
    region = $('#select-region').val();
    pageOption = $('#pageOption').val();
    categoryOption = $('#categoryOption').val();
    thisPageId = $('.ajaxUrl').val();
    //if (gender > 0 && region > 0) {
        $('.ajaxLoder').css('display','block');
        $('.tab-content').css('opacity', '.5');
        $.ajax({
            type: "GET",
            url: "?id=" + thisPageId + "&tx_tntdiseases_tntdiseases[type]=grid&tx_tntdiseases_tntdiseases[action]=multiView&tx_tntdiseases_tntdiseases[controller]=Diseases&tx_tntdiseases_tntdiseases[genderOption]=" + gender + "&tx_tntdiseases_tntdiseases[regionOption]=" + region + "&tx_tntdiseases_tntdiseases[pageOption]=" + pageOption + "&tx_tntdiseases_tntdiseases[categoryOption]=" + categoryOption,
            success: function(data) {
                $('#grid-mode').html(data);
            }
        });
        $.ajax({
            type: "GET",
            url: "?id=" + thisPageId + "&tx_tntdiseases_tntdiseases[type]=list&tx_tntdiseases_tntdiseases[action]=multiView&tx_tntdiseases_tntdiseases[controller]=Diseases&tx_tntdiseases_tntdiseases[genderOption]=" + gender + "&tx_tntdiseases_tntdiseases[regionOption]=" + region + "&tx_tntdiseases_tntdiseases[pageOption]=" + pageOption + "&tx_tntdiseases_tntdiseases[categoryOption]=" + categoryOption,
            success: function(data) {
                $('.tab-content').css('opacity', '');
                $('#liste-mod').html(data)
                $('.ajaxLoder').hide();
            }
        });
    //}

}
/*
 * switchURL
 */
 
function switchUrl() {
    diseaseToSplit = $('#select-disease').val().split('|');
    disease = diseaseToSplit[0];
    submitPage = $('#pageUrl').val();
    if (disease != 0 && disease !='default') {
        submitPage = diseaseToSplit[1];
        $('#select-disease').val(disease);
        $('#pageActionKrank').val('mainDetail');
        $('#widget-form').attr('action', submitPage);
        $('#builder').attr('action', submitPage);
      //alert(submitPage);
        window.location.href = submitPage;
    } else {

        $('#pageActionKrank').val('gridList');
        $('#widget-form').submit();
        $('#builder').submit();
    }

}
/*
 * goBack
 */
function goBack() {
    window.history.back()
}
