<?php $con=new konfig(); ?> 
<?php
$sesi=$this->session->userdata("level");
if(!$sesi){ redirect("login/logout"); }?>
<header class="navbar" id="header-navbar">
<div class="container">
<a href="<?php echo base_url().$con->dataKonfig(1);?>" id="logo" class="navbar-brand">
<img  src="<?php echo base_url();?>file_upload/img/<?php echo $con->konfigurasi(1); ?>" alt=""  class="normal-logo pull-left"/>

<span style='font-size:24px;text-shadow: 2px 2px 2px #A6250C;'><?php echo $con->konfigurasi(2); ?></span>
</a>
<div class="clearfix">
<button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button">
<span class="sr-only">Toggle navigation</span>
<span class="fa fa-bars"></span>
</button>
<div class="nav-no-collapse navbar-left pull-left hidden-sm hidden-xs">
<ul class="nav navbar-nav pull-left">
<li>
<a class="btn" id="make-small-nav">
<i class="fa fa-bars"></i>
</a>
</li>
</ul>
</div>
<div class="nav-no-collapse pull-right" id="header-nav">

<ul class="nav navbar-nav pull-right" >
<!--
<li class="mobile-search">
<a class="btn">
<i class="fa fa-search"></i>
</a>
<div class="drowdown-search">
<form role="search">
<div class="form-group">
<input type="text" class="form-control" placeholder="Search...">
<i class="fa fa-search nav-search-icon"></i>
</div>
</form>
</div>
</li>



<li class="dropdown hidden-xs">
<a class="btn dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-tasks"></i>
<span class="count">5</span>
</a>
<ul class="dropdown-menu notifications-list">
<li class="pointer">
<div class="pointer-inner">
<div class="arrow"></div>
</div>
</li>

<li class="item-header">You have 5 pending tasks</li>
<li class="item">
	<a href="#">
		<div class="task-info">
			<div class="desc">Dashboard v1.3 <span class="pull-right">40%</span></div>
		</div>
		<div class="progress progress-striped">
			<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
				<span class="sr-only">40% Complete (success)</span>
			</div>
		</div>
	</a>
</li>
<li class="item">
	<a href="#">
		<div class="task-info">
			<div class="desc">Database Update <span class="pull-right">60%</span></div>
		</div>
		<div class="progress progress-striped">
			<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
				<span class="sr-only">60% Complete (warning)</span>
			</div>
		</div>
	</a>
</li>
<li class="item">
	<a href="#">
		<div class="task-info">
			<div class="desc">Iphone Development <span class="pull-right">87%</span></div>
		</div>
		<div class="progress progress-striped">
			<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 87%">
				<span class="sr-only">87% Complete</span>
			</div>
		</div>
	</a>
</li>
<li class="item">
	<a href="#">
		<div class="task-info">
			<div class="desc">Mobile App <span class="pull-right">33%</span></div>
		</div>
		<div class="progress progress-striped">
			<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
				<span class="sr-only">33% Complete (danger)</span>
			</div>
		</div>
	</a>
</li>
<li class="item">
   <a href="#">
		<div class="task-info">
			<div class="desc">Dashboard v1.3 <span class="pull-right">45%</span></div>
		</div>
		<div class="progress progress-striped active">
			<div class="progress-bar" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
				<span class="sr-only">45% Complete</span>
			</div>
		</div>
	</a>
</li>
<li class="item-footer">
<a href="#">
View all tasks
</a>
</li>
</ul>
</li>
<li class="dropdown hidden-xs">
<a class="btn dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-bell"></i>
<span class="count">8</span>
</a>
<ul class="dropdown-menu notifications-list">
<li class="pointer">
<div class="pointer-inner">
<div class="arrow"></div>
</div>
</li>
<li class="item-header">You have 6 new notifications</li>
<li class="item">
<a href="#">
<i class="fa fa-comment"></i>
<span class="content">New comment on ‘Awesome P...</span>
<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
</a>
</li>
<li class="item">
<a href="#">
<i class="fa fa-plus"></i>
<span class="content">New user registration</span>
<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
</a>
</li>
<li class="item">
<a href="#">
<i class="fa fa-envelope"></i>
<span class="content">New Message from George</span>
<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
</a>
</li>
<li class="item">
<a href="#">
<i class="fa fa-shopping-cart"></i>
<span class="content">New purchase</span>
<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
</a>
</li>
<li class="item">
<a href="#">
<i class="fa fa-eye"></i>
<span class="content">New order</span>
<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
</a>
</li>
<li class="item-footer">
<a href="#">
View all notifications
</a>
</li>
</ul>
</li>
<li class="dropdown hidden-xs">
<a class="btn dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-envelope-o"></i>
<span class="count">16</span>
</a>
<ul class="dropdown-menu notifications-list messages-list">
<li class="pointer">
<div class="pointer-inner">
<div class="arrow"></div>
</div>
</li>
<li class="item first-item">
<a href="#">
<img src="img/samples/messages-photo-1.png" alt=""/>
<span class="content">
<span class="content-headline">
George Clooney
</span>
<span class="content-text">
Look, just because I don't be givin' no man a foot massage don't make it
right for Marsellus to throw...
</span>
</span>
<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
</a>
</li>
<li class="item">
<a href="#">
<img src="<?php echo base_url();?>plug/boostrap/img/samples/messages-photo-2.png" alt=""/>
<span class="content">
<span class="content-headline">
Emma Watson
</span>
<span class="content-text">
Look, just because I don't be givin' no man a foot massage don't make it
right for Marsellus to throw...
</span>
</span>
<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
</a>
</li>
<li class="item">
<a href="#">
<img src="<?php echo base_url();?>plug/boostrap/img/samples/messages-photo-3.png" alt=""/>
<span class="content">
<span class="content-headline">
Robert Downey Jr.
</span>
<span class="content-text">
Look, just because I don't be givin' no man a foot massage don't make it
right for Marsellus to throw...
</span>
</span>
<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
</a>
</li>
<li class="item-footer">
<a href="#">
View all messages
</a>
</li>
</ul>-->
<?php $con=new konfig(); $dp=$con->dataProfile($this->session->userdata("id")); ?> 
</li>
<li class="dropdown profile-dropdown">
<a href="#" class="dropdown-toggle " data-toggle="dropdown">
<img src="<?php echo base_url();?>file_upload/dp/<?php echo $dp->poto;?>" alt=""/>
<span class="hidden-xs spesial"><?php echo $dp->owner; ?></span> <b class="caret"></b>
</a>
<?php echo $this->load->view("template/dropdown");?>
</li>

<!--
<li class="dropdown language hidden-xs">
<a class="btn dropdown-toggle" data-toggle="dropdown">
English
<i class="fa fa-caret-down"></i>
</a>
<ul class="dropdown-menu">
<li class="item">
<a href="#">
Spanish
</a>
</li>
<li class="item">
<a href="#">
German
</a>
</li>
<li class="item">
<a href="#">
Italian
</a>
</li>

</ul>
-->
</li>
</ul>
</div>
</div>
</div>
</header>