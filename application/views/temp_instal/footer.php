 <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url()?>new/plugins/bootstrap/js/bootstrap.js"></script>
   <script src="<?php echo base_url()?>static/js/alertify/alertify.js"></script>
   	<!-- Jquery CountTo Plugin Js -->
  
 <!-- Autosize Plugin Js -->
    <script src="<?php echo base_url()?>new/plugins/autosize/autosize.js"></script>

    <!-- Input Mask Plugin Js -->
    <script src="<?php echo base_url()?>new/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>  

     <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url()?>new/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
 

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="<?php echo base_url()?>new/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

     <!-- Moment Plugin Js -->
    <script src="<?php echo base_url()?>new/plugins/momentjs/moment.js"></script>

 
    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url()?>new/plugins/node-waves/waves.js"></script>
   <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="<?php echo base_url()?>new/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
  
 
    <!-- Custom Js -->
    <script src="<?php echo base_url()?>new/js/admin.js"></script>
     <script src="<?php echo base_url()?>new/js/pages/ui/tooltips-popovers.js"></script>
	 <script src="<?php echo base_url()?>new/js/pages/forms/basic-form-elements.js"></script>
 
 
    <!-- Demo Js -->
     <script src="<?php echo base_url()?>new/js/demo.js"></script>
	 <script src="<?php echo base_url()?>new/js/pages/index.js"></script>
	 <script src="<?php echo base_url()?>new/plugins/bootstrap-select/js/bootstrap-select.js"></script>
	 <script src="<?php echo base_url()?>plug/js/sound.js"></script>
	  <script type="text/javascript">
		  $(document).off("click",".menuclick").on("click",".menuclick",function (event, messages) {
			   event.preventDefault()
			   var url = $(this).attr("href");
			   var title = $(this).attr("title");
			   var session = "1";
			     if(url=="<?php echo base_url()?>login/logout")
				 {
					 window.location.href="<?php echo base_url()?>login/logout";
				 } 
				   
			    $(this).parent().addClass('active').siblings().removeClass('active');
				$(".content").html("<center><img src='<?php echo base_url()?>plug/img/loading.gif' class='img-responsive'></center>")
				$.post(url,{ajax:"yes"},function(data){
				
				$('.modal.aside').remove();
				  history.replaceState(title, title, url);
				  $('title').html(title);
				  $(".content").html(data);
			  })
		  })
 
	 </script> 
		
		 	 
<script>
	function notifin(msg){
		$("#notifin_msg").html(msg);
		 alertify.genericDialog || alertify.dialog('genericDialog',function(){
    return {
        main:function(content){
            this.setContent(content);
        },
        setup:function(){
            return {
                focus:{
                    element:function(){
                        return this.elements.body.querySelector(this.get('selector'));
                    },
                    select:true
                },
                options:{
                    basic:true,
                    maximizable:false,
                    resizable:false,
                    padding:false
                }
            };
        },
        settings:{
            selector:undefined
        }
    };
});
alertify.genericDialog ($('#notifin')[0]).set('selector', '');
	  };
	</script>
	
	
	
		<div style="display:none">
				<div class="modal-body" id="notifin">
                 <Center> <p id="notifin_msg"></p></center>
            </div>
       </div>  
	