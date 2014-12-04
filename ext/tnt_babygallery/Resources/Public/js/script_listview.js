$(window).load(function() {
	$('.babygalerie-loading').fadeOut(1000, "linear");
});
var FromEndDate = new Date();
$(document).ready(function() {
	/* Managing OnChange Event on Date Picker in IE 8*/
	$('.datepicker').on('change',function(){
			var dateVal = $(this).val();
			var long	=	10;
			var maxlength = new Number(long); 
			if (dateVal.length > maxlength) {
				dateVal = dateVal.substring(0, maxlength);
				$(this).val(dateVal);
			}
		
	});
	
	function convertDate(inputFormat) {
	  function pad(s) { return (s < 10) ? '0' + s : s; }
	  var d = new Date(inputFormat);
	  return [pad(d.getDate()), pad(d.getMonth()+1), d.getFullYear()].join('.');
	}
	if($('#viewRef').val() == "LIST"){
		var baseurl = $('#base_url').val();
		var pid		= $('#pid').val();
		var nameFilter = '&nameFilter='+$('#filterName').val();
		var genderFilter = '&genderFilter='+$('#filterGender').val();
		var dateToFilter = '&dateToFilter='+$('#filterDateTo').val();
		var dateFromFilter = '&dateFromFilter='+$('#filterDateFrom').val();
		var steepval = '&steepval='+$('#steepval').val();
		var firstLoad = '&firstload='+1;
		var getvars = nameFilter+genderFilter+dateToFilter+dateFromFilter+steepval+firstLoad;
		//console.log(getvars);
		$('#datatable_ajax').dataTable({
			"autoWidth": false,
			"bPaginate": false,
			"searching": false,
			"ordering": true,
			"oLanguage": {
			  "sZeroRecords": "Keine Babys gefunden.",
			  "sProcessing": 'Beladung'
			},
			"bInfo": false,
			"asStripeClasses": [ "odd nutzer_tr", "even nutzer_tr"],
			"aoColumnDefs": [
				{'bSortable': true},
				{'bSortable': false, 'aTargets': [2,7]},
				{ "sClass": "img-babygalerie", "aTargets": [2] },
				{ "sClass": "desktop-hide", "aTargets": [0,1] },
				{ "sClass": "vorname", "aTargets": [3,4] }
			],
			"order": [[ 6, "desc" ]],
			"processing": true,
			"serverSide": true,
			"ajax": "/index.php?id="+pid+"&tx_tntbabygallery_tntbabygallery[action]=datatable&tx_tntbabygallery_tntbabygallery[controller]=Gallery"+getvars,
		});
	}
	/*Date Picker in Mobile Devices*/
	$('.mobdateFilterFrom').datepicker({
		format: 'dd.mm.yyyy',
		endDate: FromEndDate, 
		autoclose: true,
		"weekStart":1
	}).on('changeDate', function(e){
		$('.mobdateFilterTo').datepicker('setStartDate', e.date);
		$('.mobdateFilterTo').datepicker('setDate', e.date);
		var fDate	=	convertDate(FromEndDate);
    });
	
	$('.mobdateFilterTo ').datepicker({
		format: 'dd.mm.yyyy',
		"weekStart":1,
		orientation: 'right',
		endDate: FromEndDate, 
		autoclose: true
	});
	/*End of Date Picker in Mobile Devices*/
	
	$('.dateFilterFrom').datepicker({
		format: 'dd.mm.yyyy',
		"weekStart":1,
		endDate: FromEndDate, 
		autoclose: true
	}).on('changeDate', function(e){
		//return false;
		$('.dateFilterTo').datepicker('setStartDate', e.date);
		$('.dateFilterTo').val('');
		var fDate	=	convertDate(FromEndDate);
    });
	
	$('.dateFilterTo ').datepicker({
		format: 'dd.mm.yyyy',
		"weekStart":1,
		multidate:false,
		endDate: FromEndDate, 
		autoclose: true
	});
	
	
	$('#filterBabies').on('click', function() {
		var nameFilter		= $.trim($('.nameFilter').val());
		var genderFilter		= $.trim($('.genderFilter').val());
		var dateFilterFrom	= $.trim($('.dateFilterFrom').val());
		var dateFilterTo		= $.trim($('.dateFilterTo').val());
		var detailPage		= $.trim($('#detailPage').val());
		if(detailPage == "SET"){
			showLoader() ;
			$('.cta a.active').removeClass('active');
			$('.cta a:eq(0)').addClass('active');
			$('#gridview').removeClass('mod-detail');
		}
		$('#filterName').val(nameFilter);
		$('#filterGender').val(genderFilter);
		$('#filterDateTo').val(dateFilterTo);
		$('#filterDateFrom').val(dateFilterFrom);
		$('#steepval').val(1);
		
		var dateToFilter = $('#filterDateTo').val();
		var dateFromFilter = $('#filterDateFrom').val();
		
		if((dateToFilter != '' && dateToFilter != 'dd.mm.yyyy') && (dateFromFilter=='' || dateFromFilter=='dd.mm.yyyy')){
			var toDate	= $('.dateFilterTo').val();
			var mobtoDate	= $('.mobdateFilterTo').val();
			if( toDate != '' && toDate != 'dd.mm.yyyy'){
				$('.dateFilterFrom').focus();
			}
			else if( mobtoDate != '' && mobtoDate != 'dd.mm.yyyy'){
				$('.mobdateFilterFrom').focus();
			} 
			return false;
		}
				
		if((dateFromFilter != '' &&  dateFromFilter !='dd.mm.yyyy') && (dateToFilter=='' || dateToFilter=='dd.mm.yyyy')){
			var FromDate = $('.dateFilterFrom').val();
			var mobFromDate = $('.mobdateFilterFrom').val();
			if( FromDate != '' && FromDate != 'dd.mm.yyyy'){
				$('.dateFilterTo').focus();
			}
			else if( mobFromDate != '' && mobFromDate != 'dd.mm.yyyy'){
				$('.mobdateFilterTo').focus();
			}
			return false;
		}
		
		var pid		= $('#pid').val();
		var nameFilter = $('#filterName').val();
		var genderFilter = $('#filterGender').val();
		var dateToFilter = $('#filterDateTo').val();
		var dateFromFilter = $('#filterDateFrom').val();
		var steepval = $('#steepval').val();
		var viewRef = $('#viewRef').val();
		showLoader();
		$.ajax({
			cache: false,
			async:false,
			url: "/index.php?id="+pid+"&tx_tntbabygallery_tntbabygallery[action]=search&tx_tntbabygallery_tntbabygallery[controller]=Gallery",
			dataType: 'json',
			type: 'post',
			data: {
				'tx_tntbabygallery_tntbabygallery[nameFilter]': nameFilter,
				'tx_tntbabygallery_tntbabygallery[genderFilter]': genderFilter,
				'tx_tntbabygallery_tntbabygallery[dateToFilter]': dateToFilter,
				'tx_tntbabygallery_tntbabygallery[dateFromFilter]': dateFromFilter,
				'tx_tntbabygallery_tntbabygallery[steepval]': steepval,
				'tx_tntbabygallery_tntbabygallery[view]': viewRef
			},
			success: function(response) {
				if (response.status === true) {
					$('.babyCount').html(response.data.Babydata.babyCount+' ');
					if(response.data.Babydata.babyCount < 1){
							$('.pagination').hide();
					}
					else{
						$('.pagination').show();
					}
					$('#resultCount').val(response.data.resultCount);
					if(steepval >= response.data.resultCount){
						$('.next').addClass('active');
					}
					else{
						$('.next').removeClass('active');
					}
					if(steepval <= 1){
						$('.prev').addClass('active');
					}
					else{
						$('.prev').removeClass('active');
					}
				}
				getResults();
				hideLoader();
			},
			error: function(response) {
				hideLoader();
			}
		});
	});
	
	
	$("#datatable_ajax th").on('click',function(e){     //function_td
		var bindClass = $(this).attr('class');
		var sort =  $(this).attr('aria-sort');
		var sortVal = "ascending";
		var sortVal = (sort =='ascending')?'descending':"ascending";
		var sortVal = (sort == 'descending')?"ascending":sortVal;
		var col = $(this).parent().children().index($(this));
		$('#sortorder').val(sortVal);
		$('#sortcolumn').val(col);
		//$('#steepval').val(1);
	});
	
	$('#mobfilterBabies').on('click', function() {
		var dateFromFilter	= $.trim($('.mobdateFilterFrom').val());
		var dateToFilter		= $.trim($('.mobdateFilterTo').val());
		if((dateToFilter != '' && dateToFilter != 'dd.mm.yyyy') && (dateFromFilter=='' || dateFromFilter=='dd.mm.yyyy')){
			var mobtoDate	= $('.mobdateFilterTo').val();
			if( mobtoDate != '' && mobtoDate != 'dd.mm.yyyy'){
				$('.mobdateFilterFrom').focus();
			} 
			return false;
		}
				
		if((dateFromFilter != '' &&  dateFromFilter !='dd.mm.yyyy') && (dateToFilter=='' || dateToFilter=='dd.mm.yyyy')){
			var mobFromDate = $('.mobdateFilterFrom').val();
			if( mobFromDate != '' && mobFromDate != 'dd.mm.yyyy'){
				$('.mobdateFilterTo').focus();
			}
			return false;
		}
		
		var nameFilter		= $.trim($('.mobnameFilter').val());
		var genderFilter		= $.trim($('.mobgenderFilter').val());
		var dateFilterFrom	= $.trim($('.mobdateFilterFrom').val());
		var dateFilterTo		= $.trim($('.mobdateFilterTo').val());
		var detailPage		= $.trim($('#detailPage').val());
		if(detailPage == "SET"){
			showLoader() ;
			$('.cta a.active').removeClass('active');
			$('.cta a:eq(0)').addClass('active');
			$('#gridview').removeClass('mod-detail');
		}
		$('#filterName').val(nameFilter);
		$('#filterGender').val(genderFilter);
		$('#filterDateTo').val(dateFilterTo);
		$('#filterDateFrom').val(dateFilterFrom);
		$('#steepval').val(1);
		pid		= $('#pid').val();
		var nameFilter = $('#filterName').val();
		var genderFilter = $('#filterGender').val();
		var dateToFilter = $('#filterDateTo').val();
		var dateFromFilter = $('#filterDateFrom').val();
		var steepval = $('#steepval').val();
		var viewRef = $('#viewRef').val();
		showLoader();
		$.ajax({
			cache: false,
			async:false,
			url: "/index.php?id="+pid+"&tx_tntbabygallery_tntbabygallery[action]=search&tx_tntbabygallery_tntbabygallery[controller]=Gallery",
			dataType: 'json',
			type: 'post',
			data: {
				'tx_tntbabygallery_tntbabygallery[nameFilter]': nameFilter,
				'tx_tntbabygallery_tntbabygallery[genderFilter]': genderFilter,
				'tx_tntbabygallery_tntbabygallery[dateToFilter]': dateToFilter,
				'tx_tntbabygallery_tntbabygallery[dateFromFilter]': dateFromFilter,
				'tx_tntbabygallery_tntbabygallery[steepval]': steepval,
				'tx_tntbabygallery_tntbabygallery[view]': viewRef
			},
			success: function(response) {
				if (response.status === true) {
					$('.babyCount').html(response.data.Babydata.babyCount+' ');
					if(response.data.Babydata.babyCount < 1){
						$('.pagination').hide();
					}
					else{
						$('.pagination').show();
					}
					$('#resultCount').val(response.data.resultCount);
					if(steepval >= response.data.resultCount){
						$('.next').addClass('active');
					}
					else{
						$('.next').removeClass('active');
					}
					if(steepval <= 1){
						$('.prev').addClass('active');
					}
					else{
						$('.prev').removeClass('active');
					}
				}
				getResults();
				hideLoader();
			},
			error: function(response) {
				hideLoader();
			}
		});
	});

	function showLoader() {
		$('.babygalerie-loading').show();
	}

	function hideLoader() {
		$('.babygalerie-loading').fadeOut(1000, "linear");
	}

	function getResults(){
		var pid		= $('#pid').val();
		var nameFilter = '&nameFilter='+$('#filterName').val();
		nameFilter = (nameFilter === "Vorname / Name")?"":nameFilter;
		var genderFilter = '&genderFilter='+$('#filterGender').val();
		var dateToFilter = '&dateToFilter='+$('#filterDateTo').val();
		var dateFromFilter = '&dateFromFilter='+$('#filterDateFrom').val();
		
		if((dateToFilter != '' && dateToFilter != 'dd.mm.yyyy') && (dateFromFilter=='' || dateFromFilter=='dd.mm.yyyy')){
			var toDate	= $('.dateFilterTo').val();
			var mobtoDate	= $('.mobdateFilterTo').val();
			if( toDate != '' && toDate != 'dd.mm.yyyy'){
				$('.dateFilterFrom').focus();
			}
			else if( mobtoDate != '' && mobtoDate != 'dd.mm.yyyy'){
				$('.mobdateFilterFrom').focus();
			} 
			return false;
		}
				
		if((dateFromFilter != '' &&  dateFromFilter !='dd.mm.yyyy') && (dateToFilter=='' || dateToFilter=='dd.mm.yyyy')){
			var FromDate = $('.dateFilterFrom').val();
			var mobFromDate = $('.mobdateFilterFrom').val();
			if( FromDate != '' && FromDate != 'dd.mm.yyyy'){
				$('.dateFilterTo').focus();
			}
			else if( mobFromDate != '' && mobFromDate != 'dd.mm.yyyy'){
				$('.mobdateFilterTo').focus();
			}
			return false;
		}
		
		var classVal	=	$('#sortvalues').val();
		var steepval = '&steepval='+$('#steepval').val()+'&dumpData=0';
		var firstLoad = '&firstload='+1;
		//Used for Sorting
		var sortorder = $('#sortorder').val();
		var sortcolumn = $('#sortcolumn').val();
		var sOrder	=	(sortorder === "descending")?"desc":"asc";
		var sCol	=	(sortcolumn > 0)?sortcolumn:6;
		//////////////////////////////////////////////
		var getvars = nameFilter+genderFilter+dateToFilter+dateFromFilter+steepval+firstLoad;
		//console.log(getvars);
		$('#datatable_ajax').dataTable().fnDestroy( );
		$('#datatable_ajax').dataTable({
			"autoWidth": false,
			"bPaginate": false,
			"searching": false,
			"ordering": true,
			"oLanguage": {
			  "sZeroRecords": "Keine Babys gefunden.",
			  "sProcessing": 'Beladung'
			},
			"bInfo": false,
			"asStripeClasses": [ "odd nutzer_tr", "even nutzer_tr"],
			"aoColumnDefs": [
				{'bSortable': true},
				{'bSortable': false, 'aTargets': [2,7]},
				{ "sClass": "img-babygalerie", "aTargets": [2] },
				{ "sClass": "desktop-hide", "aTargets": [0,1] },
				{ "sClass": "vorname", "aTargets": [3,4] }
			],
			"order": [[ sCol, sOrder ]],
			"processing": true,
			"serverSide": true,
			"ajax": "/index.php?id="+pid+"&tx_tntbabygallery_tntbabygallery[action]=datatable&tx_tntbabygallery_tntbabygallery[controller]=Gallery"+getvars,
				
		});
	}
	
	$("body").delegate(".nutzer_tr", "click", function () {
		$(this).find('td.img-babygalerie a').get(0).click();
	});
	
	$('.btnNext').on('click', function() {
		var resultsCount = parseInt($('#resultCount').val());
		var steepval = parseInt($('#steepval').val());
		if(resultsCount != "1" && (resultsCount>steepval)){
			steepval = parseInt($('#steepval').val()) + 1;
			$('#steepval').val(steepval);
			getResults();
			if(steepval >= resultsCount){
				$('.next').addClass('active');
			}
			else{
				$('.next').removeClass('active');
			}
			if(steepval <= 1){
				$('.prev').addClass('active');
			}
			else{
				$('.prev').removeClass('active');
			}
		}
	});
	
	$('.btnPrevious').on('click', function() {
		var resultsCount = parseInt($('#resultCount').val());
		var steepval = parseInt($('#steepval').val());
		if (steepval > 1) {
			steepval = parseInt($('#steepval').val() - 1);
			$('#steepval').val(steepval);
			getResults();
			if(steepval >= resultsCount){
				$('.next').addClass('active');
			}
			else{
				$('.next').removeClass('active');
			}
			if(steepval <= 1){
				$('.prev').addClass('active');
			}
			else{
				$('.prev').removeClass('active');
			}
		}
	});
});