<!--?php $con=new konfig(); ?-->
<?php $dp=$this->m_konfig->dataProfile($this->session->userdata("id")); ?>   
  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url()?>theme/images/<?php echo $this->m_konfig->konfigurasi(1);?>" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-bold"><?php echo $this->m_konfig->konfigurasi(6);?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img style="width:38px;height:38px;" src="<?php echo base_url()?>theme/images/user/<?php echo isset($dp->profileimg)?($dp->profileimg):'';?>" class="img-circle elevation-2" alt="Foto">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo isset($dp->profilename)?($dp->profilename):'';?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!--li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="../../index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li>
          <!--li class="nav-item">
            <a href="pages/widgets.html" class="nav-link menuclick">
              <i class="nav-icon fas fa-th"></i>
              <p> User Group </p>
            </a>
          </li-->
		  

<?php
$aktif="";
$uri1=$this->uri->segment(1);
$uri2=$this->uri->segment(2);
$uri=$uri1."/".$uri2;
	 
$this->db->where("hak_akses",$this->m_konfig->getIdUG($this->session->userdata("level")));
$this->db->order_by("id_menu","ASC");
$menu=$this->db->get_where("main_menu",array());

foreach($menu->result() as $level1)
{
/*
	if($level1->link==$uri){ 
		$aktif="active"; 
	}else{
		$aktif="";
	}
*/
	$mlevel1=$level1->level;
	$id_main1=$level1->id_main;
	$id_menu1=$level1->id_menu;
?>
	<?php if($level1->level==1 && $level1->dropdown=='no'){?>
		<li class='nav-item <?php echo $aktif; ?>' >
			<a class="menuclick nav-link nav-main <?php echo $aktif; ?>" href="<?php echo base_url().$level1->link;?>"  >
			<i class="nav-icon <?php echo $level1->icon;?>"></i>
			<p><?php echo $level1->nama;?></p>
			</a>
		</li>
	<?php }elseif($level1->level==1 && $level1->dropdown=='yes'){ ?>
		<li class='nav-item has-treeview <?php echo $aktif; ?> '>
			<a href="#" class="nav-link nav-main <?php echo $aktif; ?>">
			<i class="nav-icon <?php echo $level1->icon;?>"></i>
			<p><?php echo $level1->nama;?> <i class="right fas fa-angle-left"></i></p>
			</a>
			<ul class="nav nav-treeview">
			<?php
			$this->db->where("hak_akses",$this->m_konfig->getIdUG($this->session->userdata("level")));
			$this->db->order_by("id_menu","ASC");
			$menu2=$this->db->get_where("main_menu",array("level"=>2,"id_main"=>$id_menu1));
			foreach($menu2->result() as $level2)
			{/*
				if($level2->link==$uri){ 
					$aktif="active"; 
				}else{
					$aktif="";
				}*/
			?>
			<li class="nav-item">
				<a style="padding-left:48px" class="menuclick nav-link nav-sub <?php echo $aktif; ?>" href="<?php echo base_url().$level2->link;?>">
				<p><?php echo $level2->nama;?></p>
				</a>
			</li>
			<?php } ?>	

			</ul>
		</li>
	<?php }; ?>
	
<?php }; ?>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>