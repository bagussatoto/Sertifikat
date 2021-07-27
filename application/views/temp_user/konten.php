<?php 
if(isset($konten)){?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
		<div class="container-fluid con-page">
			 <div id="content">
             <?php echo $this->load->view($konten);?>
			 </div>
		</div><!-- /.container-fluid -->
    </section>
  </div>
<?php 	}else{	echo "File Konten Tidak Ada";}; ?>
