<script src="<?php echo base_url();?>plug/boostrap/js/demo-skin-changer.js"></script>  
<!--<script src="<?php echo base_url();?>plug/boostrap/js/jquery.js"></script>-->
<script src="<?php echo base_url();?>plug/boostrap/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>plug/boostrap/js/jquery.nanoscroller.min.js"></script>
<script src="<?php echo base_url();?>plug/boostrap/js/demo.js"></script>  
 
<script src="<?php echo base_url();?>plug/boostrap/js/jquery.maskedinput.min.js"></script>
<script src="<?php echo base_url();?>plug/boostrap/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>plug/boostrap/js/moment.min.js"></script>
<script src="<?php echo base_url();?>plug/boostrap/js/daterangepicker.js"></script>
<script src="<?php echo base_url();?>plug/boostrap/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>plug/boostrap/js/select2.min.js"></script>
<script src="<?php echo base_url();?>plug/boostrap/js/hogan.js"></script>
<script src="<?php echo base_url();?>plug/boostrap/js/typeahead.min.js"></script>
<script src="<?php echo base_url();?>plug/boostrap/js/jquery.pwstrength.js"></script>
 
<script src="<?php echo base_url();?>plug/boostrap/js/scripts.js"></script>
<script src="<?php echo base_url();?>plug/boostrap/js/pace.min.js"></script>
<script src="<?php echo base_url();?>plug/boostrap/js/modalEffects.js"></script>
<script src="<?php echo base_url();?>plug/boostrap/js/classie.js"></script>
<script>
	$(function($) {
		//tooltip init
		$('#exampleTooltip').tooltip();

		//nice select boxes
		$('#sel2').select2();
		
		$('#sel2Multi').select2({
			placeholder: 'Select a Country',
			allowClear: true
		});
	
		//masked inputs
		$("#maskedDate").mask("99/99/9999");
		$("#maskedPhone").mask("(999) 999-9999");
		$("#maskedPhoneExt").mask("(999) 999-9999? x99999");
		$("#maskedTax").mask("99-9999999");
		$("#maskedSsn").mask("999-99-9999");
		
		$("#maskedProductKey").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
		
		$.mask.definitions['~']='[+-]';
		$("#maskedEye").mask("~9.99 ~9.99 999");
	
		//datepicker
		$('#datepickerDate').datepicker({
		  format: 'mm-dd-yyyy'
		});

		$('#datepickerDateComponent').datepicker();
		
		//daterange picker
		$('#datepickerDateRange').daterangepicker();
		
		//timepicker
		$('#timepicker').timepicker({
			minuteStep: 5,
			showSeconds: true,
			showMeridian: false,
			disableFocus: false,
			showWidget: true
		}).focus(function() {
			$(this).next().trigger('click');
		});
		
		//autocomplete simple
		$('#exampleAutocompleteSimple').typeahead({                              
			prefetch: '/data/countries.json',
			limit: 10
		});
		
		//autocomplete with templating
		$('#exampleAutocomplete').typeahead({                              
			name: 'twitter-oss',                                                        
			prefetch: '/data/repos.json',                                             
			template: [                                                              
				'<p class="repo-language">{{language}}</p>',                              
				'<p class="repo-name">{{name}}</p>',                                      
				'<p class="repo-description">{{description}}</p>'                         
			].join(''),                                                                 
			engine: Hogan                                                               
		});
		
		//password strength meter
		$('#examplePwdMeter').pwstrength({
			label: '.pwdstrength-label'
		});
		
	});
	</script>
	
	
	