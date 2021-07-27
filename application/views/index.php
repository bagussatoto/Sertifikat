<!DOCTYPE html>
<html>
 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>
COURTESY CALL
</title>
    <!-- Favicon-->
     <link rel="icon" href="<?php echo base_url()?>plug/img/logo.png" type="image/x-icon">

 
		<link href="<?php echo base_url()?>plug/link_online/css.css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>plug/link_online/css2.css?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url()?>new/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url()?>new/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url()?>new/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?php echo base_url()?>new/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url()?>new/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url()?>new/css/themes/all-themes.css" rel="stylesheet" />
	<style>
	body{
	background-image:url("<?php echo base_url()?>plug/img/meja.png");
	background-size:cover;
		background-attachment: fixed;
	}
	.card{
	background-color:white;
	opacity: 0.8;
    filter: alpha(opacity=50); /* For IE8 and earlier */
	}
	.sadow{
text-shadow: 1px 1px 1px black;
}
.sadow2{
text-shadow: 1px 1px 1px white;
}
 
	</style>
</head>

<body class="theme-black ls-closed" style="background-image:url('<?php echo base_url()?>plug/img/bg.png');">
    <!-- Page Loader -->
    
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
		       	  
                <a class="navbar-brand sadow" href="" style="font-size:44px"><b>COURTESY CALL</b></a><br>
		<span id="loaddate">		 </span>
            </div>
		
		 <img class="pull-right" src="<?php echo base_url()?>plug/img/kemhan_new.png" height="80px">
	  
	  </div>
		
    </nav>
    
<br>
<br>
<br>

	 

    <section class="contenst" width="100%" height="100%">
        
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:40px">
                    <div class="card" height="100%"  style="height:100%">
                        <div class="body"   >
                          
						 <div id="text"  style="height:100%">
								 
						</div>
						  
                        </div>
                    </div>
                </div>
              </div>
    </section>
    <section >
        <!-- Left Sidebar -->
         <div class="menu"><ul class="list"> <li class="active"></ul></div>
		 
		  <div style="bottom:0;position:fixed;margin-bottom:0px;width:100%;height:40px" class="bg-black">
			<div id="watch" class='sadow' style="margin-top:-4px"></div>&nbsp;
			</div>
		 
 
    </section>
	
	
 


     <!-- Jquery Core Js -->
    <script src="<?php echo base_url()?>new/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url()?>new/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url()?>new/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url()?>new/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url()?>new/plugins/node-waves/waves.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="<?php echo base_url()?>new/plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="<?php echo base_url()?>new/plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="<?php echo base_url()?>new/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url()?>new/js/admin.js"></script>
    <script src="<?php echo base_url()?>new/js/pages/forms/basic-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url()?>new/js/demo.js"></script>
 
 
</body>

					 
					
</html>


 

<style>
#watch {
  color: white;
  position: fixed;
  z-index: 1;
  overflow: show;
  float:right;
  right: 0;
  font-weight:bold;
  margin-right:10px;
  font-size: 32px;
  -webkit-text-stroke: 1px rgb(210, 65, 36);
  text-shadow: 4px 4px 10px rgba(210, 65, 36, 0.4),
               4px 4px 20px rgba(210, 45, 26, 0.4),
               4px 4px 30px rgba(210, 25, 16, 0.4),
               4px 4px 40px rgba(210, 15, 06, 0.4);
}
.blink{
color:red;
}
</style>
 
  
 <script>
 load();
 setInterval(function(){  load(); }, 10000);
 function load()
 {
	  $.post("<?php echo base_url()?>welcome/load",function(data){
		 	   $("#text").html(data);
			}); 
			loaddate();
 }
  function loaddate()
 {
	  $.post("<?php echo base_url()?>welcome/loaddate",function(data){
		 	   $("#loaddate").html(data);
			}); 
 }
 </script>
 
<script type="text/javascript">
    $(document).ready(function(){
        function clock() {
          var now = new Date();
          var secs = ('0' + now.getSeconds()).slice(-2);
          var mins = ('0' + now.getMinutes()).slice(-2);
          var hr = now.getHours();
          var Time = hr + ":" + mins + ":" + secs;
          document.getElementById("watch").innerHTML = Time;
          requestAnimationFrame(clock);
        }

        requestAnimationFrame(clock);
    });
</script>




