<style>
.border-line{
	border-bottom:#9E9E9E solid 1px;
}.menus{
	background-image:url('<?php echo base_url()?>plug/img/bg.jpg');
 
}
</style><?php  $dp=$this->m_reff->dataProfilePegawai(); ?> 
   <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
              
				<?php
				$poto="file_upload/dp/".$dp->poto."";
				if(!file_exists($poto))
				{
					$poto="plug/img/logo.png";
				}
				?>
          <!--   <img src="<?php echo base_url().$poto;?>"  style="z-index:-230px;position:absolute;height:135px;width:300px;margin-left:-15px;margin-top:-13px" alt="User"  />   -->
 <img src="<?php echo base_url().$poto;?>"  style="height:50px; border:white solid 2px "  id="photo_profile" /> 
                 
                <div class="info-container">
                    <div class="name font-bold" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo  isset($dp->nama)?($dp->nama):"";?></div>
                    <div class="email font-bold">NIP. <?php echo isset($dp->nip)?($dp->nip):"";?></div>
                   
				   <script>
					$(document).ready(function() {
					   function setCookie(cname,cvalue) {
						document.cookie = cname + "=" + cvalue + ";";
					}

					function getCookie(cname) {
						var name = cname + "=";
						var decodedCookie = decodeURIComponent(document.cookie);
						var ca = decodedCookie.split(';');
						for(var i = 0; i < ca.length; i++) {
							var c = ca[i];
							while (c.charAt(0) == ' ') {
								c = c.substring(1);
							}
							if (c.indexOf(name) == 0) {
								return c.substring(name.length, c.length);
							}
						}
						return "";
					}

					   var set=getCookie("sound");
					   if(set=="on")
					   {	
						$("#sound_effect").val("on");
						$("#set_sound").prop( "checked", true );
					   }else{
						$("#sound_effect").val("off");   
						$("#set_sound").prop( "checked", false );
					   }
					   set_theme();
					   function set_theme()
					   {
							var set_theme=getCookie("thema");
						   if(set_theme)
						   {	 
							  $("body").removeAttr('class');
							  $("body").attr('class', '');
							  $("body").addClass("theme-"+set_theme);
							  
							  setTimeout(function(){ tombol_icon(set_theme) },50);
							  
							 setTimeout(function(){
							 $("thead").removeAttr('class');
							 $("thead").attr('class', '');
							 $("thead").addClass("sadow bg-"+set_theme);  
							  }, 100);
							     classLS();
						   }else{
						   };
					   }
					   function tombol_icon(set_theme)
					   {	 
						      $("table button i").removeAttr('class');
							  $("table button i").attr('class', '');
							  $("table button i").addClass("material-icons col-"+set_theme);
					   };
					   
					   
					   $(document).on("keypress","#tabel_filter input,.dataTables_length select",function()
					   {
						    var set_theme=getCookie("thema");
						  	setTimeout(function(){ tombol_icon(set_theme); }, 150);
						  
					   });
					   
					   $(document).on("change","select",function()
					   {
						    var set_theme=getCookie("thema");
						  	setTimeout(function(){ tombol_icon(set_theme); }, 150);
						  
					   });

					   $(document).on("click","#tabel_paginate",function()
					   {	 
						    var set_theme=getCookie("thema");
						  	setTimeout(function(){ tombol_icon(set_theme); }, 150);
						  
					   });
					   
						$(".clickthem").click(function(event, messages){
							event.preventDefault();
							var skin=$(this).attr("thema");
							document.cookie ="thema="+skin;
							 set_theme();
						});
						$(".menuclick").click(function(){
							setTimeout(function(){ set_theme(); }, 150);
						});
					   
				   });
				   </script>
				   <script>
	<?php $mobile=$this->m_reff->mobile(); ?>
	function classLS()
	{	
		<?php if($mobile){ ?>
		 $("body").addClass("ls-closed");
		<?php } ?>
	}
	 $( document ).ready(function() {
		  $("#pull-screen").hide();
	 });
	
	function pull()
	{
		 $("body").addClass("ls-closed");
		 $("#pull-screen").show();
	}
	function lesmenu()
	{
		 $("body").removeClass("ls-closed");
		 $("#pull-screen").hide();
	}
	</script>
	
	
	
					   <div align="center" style="margin-top:-40px" class="pull-right col-white font-bold"> Suara Effect
                                <div class="switch"  >
                                    <label>OFF<input id="set_sound" type="checkbox" onclick="set_effect()" ><span class="lever switch-col-orange"></span>ON</label>
                                </div>
                        </div>
					  <input type="hidden" id="sound_effect" >
                    
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">
					MENU NAVIGASI
					<?php $mobile=$this->m_reff->mobile(); 
					
					if($mobile==false){ ?>
					<span class="pull-right" title="Full screen" onclick="pull()" style='cursor:pointer;margin-top:-10px'><i class="material-icons">fullscreen</i></span>
					<?php } ?>
					</li>
						
					
<!------------------------------------------------------------------------->
 <?php
 $tahap0=" ";
 $tahap1=" ";
 $tahap2=" ";
 $tahap3=" ";
 $tahap4=" ";
 $tahap5=" ";
 $uri=$this->uri->segment("2");
 if($uri=="profile" or $uri=="")
 {
	 $tahapProfile="active";
 }elseif($uri=="index" )
 {
	 $tahap0="active";
 }elseif($uri=="tahap0")
 {
	 $tahap1="active";
 }elseif($uri=="tahap2")
 {
	  $tahap2="active";
 }elseif($uri=="tahap3")
 {
	  $tahap3="active";
 }elseif($uri=="tahap4")
 {
	  $tahap4="active";
 }elseif($uri=="tahap5")
 {
	  $tahap5="active";
 }
 ?>
	<li class='pil1 sound <?php echo $tahapProfile ?> border-line'>
	<a  class="menuclickx" href="<?php echo base_url()?>guru_instal/profile" >
	<i class="material-icons">recent_actors</i>
	<span>TAHAP AWAL</span>
	<!--<span class="label label-primary label-circle pull-right">23</span>-->
	</a>
	</li>
	<li class='pil1 sound <?php echo $tahap0 ?> border-line'>
	<a  class="menuclicks" href="<?php echo base_url()?>guru_instal/index" >
	<i class="material-icons">filter_1</i>
	<span>TAHAP 1</span>
	<!--<span class="label label-primary label-circle pull-right">23</span>-->
	</a>
	</li>
	 
	
	<li class='pil2 sound <?php echo $tahap2 ?> border-line'>
	<a  class="menuclickx" href="<?php echo base_url()?>guru_instal/tahap2" >
	<i class="material-icons">filter_2</i>
	<span>TAHAP 2</span>
	<!--<span class="label label-primary label-circle pull-right">23</span>-->
	</a>
	</li>
	
	<li class='pil2 sound <?php echo $tahap3 ?> border-line'>
	<a  class="menuclickx" href="<?php echo base_url()?>guru_instal/tahap3" >
	<i class="material-icons">filter_3</i>
	<span>TAHAP 3</span>
	<!--<span class="label label-primary label-circle pull-right">23</span>-->
	</a>
	</li>
	<li class='pil2 sound <?php echo $tahap4 ?> border-line'>
	<a  class="menuclicsk" href="<?php echo base_url()?>guru_instal/tahap4" >
	<i class="material-icons">filter_4</i>
	<span>TAHAP 4</span>
	<!--<span class="label label-primary label-circle pull-right">23</span>-->
	</a>
	</li>
	<li class='pil2 sound <?php echo $tahap5 ?> border-line'>
	<a  class="menuclick" href="<?php echo base_url()?>guru_instal/tahap_akhir" >
	<i class="material-icons">screen_share</i>
	<span>TAHAP AKHIR</span>
	<!--<span class="label label-primary label-circle pull-right">23</span>-->
	</a>
	</li>
 
<li class="active"></li>
<!------------------------------------------------------------------------->
   </ul>
				
            </div>
            <!-- #Menu -->
            <!-- Footer -->
           
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        
        <!-- #END# Right Sidebar -->
    </section>
	
	<div id="pull-screen" onclick="lesmenu()" style="cursor:pointer;top:1;position:fixed;z-index:99;margin-top:-30px;"  >
	<p class="bg-pink" style="border-radius:25px;opacity:0.8"> 
   <span class="badge bg-pink sadow" style="padding:10px;"><i class="material-icons" style="font-size:20px">menu</i></span> <b class='sadow'>MENU</b> &nbsp;&nbsp;						
	</p>
	</div>