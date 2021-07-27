<style>
.border-line{
	border-bottom:#9E9E9E solid 1px;
}.menus{
	background-image:url('<?php echo base_url()?>plug/img/bg.jpg');
 
}
</style> <?php $mobile=$this->m_reff->mobile(); ?>
$con=new konfig(); $dp=$con->dataProfile($this->session->userdata("id")); ?> 
<?php  $dp=$this->m_reff->dataProfilePegawai(); ?> 
   <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
			<?php
				$p=isset($dp->poto)?($dp->poto):"";
				$poto="file_upload/dp/".$p."";
				if(!file_exists($poto))
				{
					$poto="plug/img/logo.png";
				}
				?>
          <!--   <img src="<?php echo base_url().$poto;?>"  style="z-index:-230px;position:absolute;height:135px;width:300px;margin-left:-15px;margin-top:-13px" alt="User"  />   -->
<br>
<br>
<br>
<br>
               
                
                <div class="info-container">
                     <div class="name font-bold" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo  isset($dp->owner)?($dp->owner):"";?></div>
                  
                  
				   <script>
				   $( document ).ready(function() {
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
						    classLS();
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
					   function classLS()
						{	
							<?php if($mobile){ ?>
							 $("body").addClass("ls-closed");
							 $("body").removeClass("overlay-open");
							<?php } ?>
						}
				   });
				   </script>
					<!--  <div align="center" style="margin-top:-35px" class="pull-right col-white font-bold"> Suara Effect
                                <div class="switch"  >
                                    <label>OFF<input id="set_sound" type="checkbox" onclick="set_effect()" ><span class="lever switch-col-orange"></span>ON</label>
                                </div>
                        </div>-->
					  <input type="hidden" id="sound_effect" >
                    
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">
					MENU NAVIGASI
					
					</li>
						
					
<!------------------------------------------------------------------------->
<?php
$link="";$aktif="";
$uri1=$this->uri->segment(1);
$uri2=$this->uri->segment(2);
$uri=$uri1."/".$uri2;
	 
	  $this->db->where("hak_akses",$this->m_konfig->getIdLevel($this->session->userdata("level")));
	   $this->db->order_by("id_menu","ASC");
$menu=$this->db->get_where("main_menu",array("level"=>1));
foreach($menu->result() as $level1)
{
$slashLink=explode("/",$level1->link);
$jmlslash=count($slashLink);
if($jmlslash>1){
	if($level1->link==$uri){ $link="style='opacity:0.9;filter:alpha(opacity=0);'"; $aktif="active"; }else{ $aktif="";};
}else{
	if($level1->link==$uri1){ $link="style='opacity:0.9;filter:alpha(opacity=0);'"; $aktif="active"; }else{ $aktif="";};
}


if($level1->id_main==0){?>
	<li class='<?php echo $aktif; ?> border-line' >
	<a <?php echo $link; ?>  class="menuclick" href="<?php echo base_url().$level1->link;?>"  >
	<i class="material-icons"><?php echo $level1->icon;?></i>
	<span ><?php echo $level1->nama;?></span>
	<!--<span class="label label-primary label-circle pull-right">23</span>-->
	</a>
	</li>
<?php }else{ ?>
	<li class='<?php echo $aktif; ?> border-line'>
	<a href="#"  class="menu-toggle">
	<i class="material-icons"><?php echo $level1->icon;?></i>
	<span><?php echo $level1->nama;?></span>
	<i class="fa fa-angle-right drop-icon"></i>
	</a>
		<ul class="ml-menu" >
		<?php
		
	    $this->db->where("hak_akses",$this->m_konfig->getIdLevel($this->session->userdata("level")));
		$this->db->order_by("id_menu","ASC");
		$menu2=$this->db->get_where("main_menu",array("level"=>2,"id_main"=>$level1->id_menu));
		foreach($menu2->result() as $level2)
		{?>
	
		<?php
		$slashLink=explode("/",$level2->link);
		$jmlslash=count($slashLink);
		if($jmlslash>1){
		if($level1->link==$uri){ $link="style='background:#33ccff;opacity:0.9;filter:alpha(opacity=10);'"; $aktif="active"; };
		}else{
		if($level1->link==$uri1){ $link="style='background:#33ccff;opacity:0.9;filter:alpha(opacity=10);'"; $aktif="active"; };
		}
		?>
	
	
		
			<li >
			<a  class="menuclick" href="<?php echo base_url().$level2->link;?>">
			<i class="material-icons"><?php echo $level2->icon;?></i>
			<span><?php echo $level2->nama;?></span>
			</a>
			</li>
			
		<?php } ?>	
			
		</ul>
	</li>
<?php } ?>
	
<?php }; ?>
 
<li class="active"></li>
<!------------------>
 
 
<!------------------------------------------------------------------------->
   </ul>
				
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <br>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
       