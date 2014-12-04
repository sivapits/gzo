$(window).load(function() {
	$('.babygalerie-loading').fadeOut(1000, "linear");
})
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
	/* Managing OnChange Event on Date Picker in IE 8*/
	
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
	
	function convertDate(inputFormat) {
	  function pad(s) { return (s < 10) ? '0' + s : s; }
	  var d = new Date(inputFormat);
	  return [pad(d.getDate()), pad(d.getMonth()+1), d.getFullYear()].join('.');
	}
	function process(date){
	   var parts = date.split("/");
	   return new Date(parts[2], parts[1] - 1, parts[0]);
	}
	
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
		nameFilter = (nameFilter === "Vorname / Name")?"":nameFilter;
		var genderFilter		= $.trim($('.genderFilter').val());
		var dateFilterFrom	= $.trim($('.dateFilterFrom').val());
		var dateFilterTo		= $.trim($('.dateFilterTo').val());
		var detailPage		= $.trim($('#detailPage').val());
		
		var dateToFilter = dateFilterTo;
		var dateFromFilter = dateFilterFrom;
		
		if((dateToFilter != '' && dateToFilter != 'dd.mm.yyyy') && (dateFromFilter=='' || dateFromFilter=='dd.mm.yyyy')){
			var toDate	= $('.dateFilterTo').val();
			var mobtoDate	= $('.mobdateFilterTo').val();
			if( toDate != '' || toDate != 'dd.mm.yyyy'){
				$('.dateFilterFrom').focus();
				return false;
			}
			else if( mobtoDate != '' || mobtoDate != 'dd.mm.yyyy'){
				$('.mobdateFilterFrom').focus();
				return false;
			} 
			return false;
		}
				
		if((dateFromFilter != '' &&  dateFromFilter !='dd.mm.yyyy') && (dateToFilter=='' || dateToFilter=='dd.mm.yyyy')){
			var FromDate = $('.dateFilterFrom').val();
			var mobFromDate = $('.mobdateFilterFrom').val();
			if( FromDate != '' || FromDate != 'dd.mm.yyyy'){
				$('.dateFilterTo').focus();
				return false;
			}
			else if( mobFromDate != '' || mobFromDate != 'dd.mm.yyyy'){
				$('.mobdateFilterTo').focus();
				return false;
			}
			return false;
		}
		
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
		//console.log(nameFilter+' '+genderFilter+' '+dateFilterFrom+' '+dateFilterTo);
		getResults($(this));
	});
	
	$('.detailfilter').on('click',function(e){
		var isMobile = $(this).hasClass('mobile');
		if(isMobile){
			var dateFromFilter  = $('.mobdateFilterFrom').val();
			var dateToFilter	= $('.mobdateFilterTo').val();
		}
		else{
			var dateFromFilter = $('.dateFilterFrom').val();
			var dateToFilter  = $('.dateFilterTo').val();
		}
		
		if((dateToFilter != '' && dateToFilter != 'dd.mm.yyyy') && (dateFromFilter=='' || dateFromFilter=='dd.mm.yyyy')){
			if(isMobile){
				var toDate	= $('.mobdateFilterTo').val();
				if( toDate != '' || mobtoDate != 'dd.mm.yyyy'){
					$('.mobdateFilterFrom').focus();
					return false;
				} 
			}
			else{
				var toDate	= $('.dateFilterTo').val();
				if( toDate != '' || toDate != 'dd.mm.yyyy'){
					$('.dateFilterFrom').focus();
					return false;
				}
			} 
			return false;
		}
				
		if((dateFromFilter != '' &&  dateFromFilter !='dd.mm.yyyy') && (dateToFilter=='' || dateToFilter=='dd.mm.yyyy')){
			if(isMobile){
				var FromDate = $('.mobdateFilterFrom').val();
				if( FromDate != '' || FromDate != 'dd.mm.yyyy'){
					$('.mobdateFilterTo').focus();
					return false;
				}
			}
			else{
				var FromDate = $('.dateFilterFrom').val();
				if( FromDate != '' || FromDate != 'dd.mm.yyyy'){
					$('.dateFilterTo').focus();
					return false;
				}
			}
			return false;
		}
	});
	
	$('#mobfilterBabies').on('click', function() {
		var nameFilter		= $.trim($('.mobnameFilter').val());
		var genderFilter		= $.trim($('.mobgenderFilter').val());
		var dateFilterFrom	= $.trim($('.mobdateFilterFrom').val());
		var dateFilterTo		= $.trim($('.mobdateFilterTo').val());
		var detailPage		= $.trim($('#detailPage').val());
		var dateToFilter = dateFilterTo;
		var dateFromFilter = dateFilterFrom;
		
		if((dateToFilter != '' && dateToFilter != 'dd.mm.yyyy') && (dateFromFilter=='' || dateFromFilter=='dd.mm.yyyy')){
			var mobtoDate	= $('.mobdateFilterTo').val();
			if( mobtoDate != '' || mobtoDate != 'dd.mm.yyyy'){
				$('.mobdateFilterFrom').focus();
				return false;
			} 
			return false;
		}
				
		if((dateFromFilter != '' &&  dateFromFilter !='dd.mm.yyyy') && (dateToFilter=='' || dateToFilter=='dd.mm.yyyy')){
			var mobFromDate = $('.mobdateFilterFrom').val();
			if( mobFromDate != '' || mobFromDate != 'dd.mm.yyyy'){
				$('.mobdateFilterTo').focus();
				return false;
			}
			return false;
		}
		
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
		//console.log(nameFilter+' '+genderFilter+' '+dateFilterFrom+' '+dateFilterTo);
		getResults($(this));
	});

	function showLoader() {
		$('.babygalerie-loading').show();
	}

	function hideLoader() {
		$('.babygalerie-loading').fadeOut(1000, "linear");
	}
	var row = '';
	function getResults(row ) {
		if(row){
			setTimeout(function(){
				var checkMob = row.attr('id');
				if( checkMob == 'mobfilterBabies'){
					$('#drop').hide();
				}
			},1000);
		}
		var baseurl = $('#base_url').val();
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
					if (viewRef === "GRID"){
						$('#gridview').html(response.htmlAppend);
						$('#resultCount').val(response.data.resultCount);
						if(response.data.Babydata.babyCount < 1){
							$('.pagination').hide();
						}
						else{
							$('.pagination').show();
						}
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
					else if (viewRef === "LIST") {
						$('#datatable_ajax').dataTable().fnDestroy( );
						$('#listBody').html(response.htmlAppend);
						$('#datatable_ajax').dataTable({
							"autoWidth": false,
							"bPaginate": false,
							"searching": false,
							"sEmptyTable":"Keine Babys gefunden.",
							"ordering": true,
							"bInfo": false,
							"aoColumnDefs": [
								{'bSortable': false, 'aTargets': [0, 1, 2, 3, 4, 5]},
								{'bSortable': true, 'aTargets': [6, 7]}
							]
						});
					}
				}
				hideLoader();
			},
			error: function(response) {
				hideLoader();
			}
		});
	}

	
	$('.btnNext').on('click', function() {
		var resultsCount = parseInt($('#resultCount').val());
		var steepval = parseInt($('#steepval').val());
		if(resultsCount != "1" && (resultsCount>steepval)){
			steepval = parseInt($('#steepval').val()) + 1;
			$('#steepval').val(steepval);
			getResults();
		}
	});

	$('.btnPrevious').on('click', function() {
		var steepval = parseInt($('#steepval').val());
		if (steepval > 1) {
			steepval = parseInt($('#steepval').val() - 1);
			$('#steepval').val(steepval);
			getResults();
		}
	});
});