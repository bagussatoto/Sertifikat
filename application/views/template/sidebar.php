<?php $con=new konfig(); $dp=$con->dataProfile($this->session->userdata("id")); ?> 
<style>
.aktip{
color:black;
}
</style>

<div class="row">
<div id="nav-col">
<section id="col-left" class="col-left-nano">
<div id="col-left-inner" class="col-left-nano-content">
<div id="user-left-box" class="clearfix hidden-sm hidden-xs dropdown profile2-dropdown">
<img  alt="" src="<?php echo base_url();?>file_upload/dp/<?php  echo $dp->poto; ?>"/>
<div class="user-box">
<span class="name">
<a href="#" class="dropdown-toggle spesial" data-toggle="dropdown">
<?php echo $dp->owner; ?>
</a>
<?php echo $this->load->view("template/dropdown");?>
</span>
<span class="status">
<i class="fa fa-circle"></i> <?php echo $this->session->userdata("level"); ?>
</span>
</div>
</div>
<div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">
<ul class="nav nav-pills nav-stacked">
<li class="nav-header nav-header-first hidden-sm hidden-xs">
NAVIGASI
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
	<li class='<?php echo $aktif; ?>'>
	<a <?php echo $link; ?> href="<?php echo base_url().$level1->link;?>" >
	<i class="<?php echo $level1->icon;?>"></i>
	<span ><?php echo $level1->nama;?></span>
	<!--<span class="label label-primary label-circle pull-right">23</span>-->
	</a>
	</li>
<?php }else{ ?>
	<li class='<?php echo $aktif; ?>'>
	<a href="#" class="dropdown-toggle">
	<i class="<?php echo $level1->icon;?>"></i>
	<span><?php echo $level1->nama;?></span>
	<i class="fa fa-angle-right drop-icon"></i>
	</a>
		<ul class="submenu">
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
	
	
		
			<li>
			<a href="<?php echo base_url().$level2->link;?>">
			<i class="<?php echo $level2->icon;?>"></i> 
			<?php echo $level2->nama;?>
			</a>
			</li>
			
		<?php } ?>	
			
		</ul>
	</li>
<?php } ?>
	
<?php }; ?>


<!------------------------------------------------------------------------->

</ul>
</div>
</div>
</section>
<div id="nav-col-submenu"></div>
</div>

