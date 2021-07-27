<!DOCTYPE html>
<html>
<head>
<?php $this->load->view("template/head");?>

</head>
<body>
<div id="theme-wrapper">
<?php $this->load->view("template/header");?>

<div id="page-wrapper" class="container">
	
			<?php $this->load->view("template/sidebar");?>
<div id="content-wrapper">
 <div class="row">
			<?php $this->load->view("template/konten");?>
			<?php $this->load->view("template/konten_footer");?>
	
</div>


</div>

<?php $this->load->view("template/setting");?>
</body>
<?php $this->load->view("template/footer");?>
</html>