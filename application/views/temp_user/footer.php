  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong><?php echo $this->m_konfig->konfigurasi(8);?></strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> <?php echo $this->m_konfig->konfigurasi(9);?>
    </div>
  </footer>	
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url()?>theme/templates/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!--script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>theme/templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Ekko Lightbox -->
<script src="<?php echo base_url()?>theme/templates/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url()?>theme/templates/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url()?>theme/templates/plugins/daterangepicker/daterangepicker.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url()?>theme/templates/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url()?>theme/templates/plugins/select2/js/select2.full.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url()?>theme/templates/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url()?>theme/templates/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>theme/templates/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--script src="<?php echo base_url()?>theme/templates/dist/js/pages/dashboard.js"></script-->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>theme/templates/dist/js/demo.js"></script>



<script type="text/javascript" src="<?php echo base_url()?>theme/plugin/jqueryform/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>theme/plugin/jqueryform/jquery.form.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>theme/act/function.js"></script>	
<script type="text/javascript" src="<?php echo base_url()?>theme/act/proses.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>theme/act/toastrconfig.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>theme/plugin/pace-master/pace.js"></script>
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
				//$("#content").html("<center><h4><img alt='&nbsp;' src='theme/images/loader/load.gif'/> Mohon Tunggu...</h4><span id='progressBar'></span></center>");
				load(20); $("#content").html("");
				$.post(url,{ajax:"yes"},function(data){
				  $('.modal.aside').remove();
				  history.replaceState(title, title, url);
				  $(".uri").val(url);
				  $('title').html(title);
				  $("#content").html(data);
				  activemenu();
			  })
		  })
	 </script> 
		
<!--script>
jQuery(document).ready(function(){ 
   
});
$(window).on('load', function(){

});
</script-->
<script>
  $(function () {
	activemenu();
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });
  })
</script>
<script>
    paceOptions = {
      elements: true
    };
	/*pace loading*/
function load(time){
  var x = new XMLHttpRequest()
  x.open('GET', "http://localhost:5646/walter/" + time, true);
  x.send();
};
//load(20);
//load(100);
//load(500);
//load(2000);
//load(3000);
setTimeout(function(){
  Pace.ignore(function(){
	load(3100);
  });
}, 4000);
Pace.on('hide', function(){
  console.log('done');
});
  </script>
  
</body>
</html>
  

	