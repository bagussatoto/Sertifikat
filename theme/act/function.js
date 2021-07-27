/*
function cktext(){
	// CKEditor
	CKEDITOR.replace( 'ckeditor', {
        filebrowserBrowseUrl: base_url+'theme/plugin/ckfinder/ckfinder.html',
		filebrowserUploadUrl: base_url+'theme/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserWindowWidth : '1000',
		filebrowserWindowHeight : '700'
    });
    
}
function ckbasic(){
	CKEDITOR.replace( 'ckeditorbasic', {
		uiColor: '#f4f4f4',
		toolbar: [
		['Format','Font','FontSize'],
		['Bold','Italic','Underline','StrikeThrough','-'],
		['NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
		['Link','Smiley','TextColor','BGColor']
		]
	});
}
function ckbasic1(){
	CKEDITOR.replace( 'ckeditorbasic1', {
		uiColor: '#f4f4f4',
		toolbar: [
		['Format','Font','FontSize'],
		['Bold','Italic','Underline','StrikeThrough','-'],
		['NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
		['Link','Smiley','TextColor','BGColor']
		]
	});
}
function datepick(){
	// Datepicker
	$('#datepicker').datepicker({
		dateFormat:'dd/mm/yy',
		autoclose: true,
		todayHighlight: true,
	});
	// Daterangepicker
	var date = new Date();
	$('#daterangepicker').daterangepicker({
		startDate: moment(date), 
		format: 'DD/MM/YYYY',	
		singleDatePicker: true,
		showDropdowns: true,
		minYear: 1901,
		maxYear: parseInt(moment().format('YYYY'),10)
	});
	$('#daterangepicker1').daterangepicker({
		startDate: moment(date), 
		format: 'DD/MM/YYYY',	
		singleDatePicker: true,
		showDropdowns: true,
		minYear: 1901,
		maxYear: parseInt(moment().format('YYYY'),10)
	});
	$('#daterangepicker2').daterangepicker({
		startDate: moment(date), 
		format: 'DD/MM/YYYY',	
		singleDatePicker: true,
		showDropdowns: true,
		minYear: 1901,
		maxYear: parseInt(moment().format('YYYY'),10)
	});
}
function timepick(){
	// Time Picker
	$('#timepicker').timepicker({
		timeFormat: 'HH:mm',
		minTime: '11:45',
		defaultTIme: false,
		showInputs: true,
		showMeridian: false //24hr mode
	});
	$('#timepicker1').timepicker({
		timeFormat: 'HH:mm',
		minTime: '11:45',
		defaultTIme: false,
		showInputs: true,
		showMeridian: false //24hr mode
	});
	$('#timepicker2').timepicker({
		timeFormat: 'HH:mm',
		minTime: '11:45',
		defaultTIme: false,
		showInputs: true,
		showMeridian: false //24hr mode
	});
	$('#timepicker3').timepicker({
		timeFormat: 'HH:mm',
		minTime: '11:45',
		defaultTIme: false,
		showInputs: true,
		showMeridian: false //24hr mode
	});
}

*/
function activemenu(){
	//activemenu
	var selector = '.nav-main';
	var selectorB = '.nav-sub';
	
	$(selector).on('click', function(){
		$(selector).removeClass('active');
		$(this).addClass('active');
	});
	$(selectorB).on('click', function(){		
		$(selectorB).removeClass('active');
		$(this).addClass('active');
	});

}

function reload_area(){
	var url = window.location;
	load(20); $("#area_lod").html("");
	//$("#area_lod").html("<h4><img alt='&nbsp;' src='theme/images/loader/load.gif'/> Mohon Tunggu...</h4><span id='progressBar'></span>");
	$.post(url,{ajax:"yes"},function(x){
		$("#area_lod").html(x);
	});
}

function reload_content(){
	var url = window.location;
	load(20); $("#content").html("");
	//$("#content").html("<h4><img alt='&nbsp;' src='theme/images/loader/load.gif'/> Mohon Tunggu...</h4><span id='progressBar'></span>");
	$.post(url,{ajax:"yes"},function(x){
		$("#content").html(x);
	});
}





