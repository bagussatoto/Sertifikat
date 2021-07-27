	<!-- BEGIN PAGE HEADER-->
	<div class="page-bar">
		<ul class="page-breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i>
				<a href="<?php echo site_url('dashboard')?>">Dashboard</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				<a href="#" class="capbreadcumb" title='Dashboard'>Dashboard</a>
			</li>
		</ul>
		<div class="page-toolbar">
			
		</div>
	</div>
    <h3 class="page-title">
	Dashboard <small>reports & statistics</small>
	</h3>
	<!-- END PAGE HEADER-->
	<!-- BEGIN DASHBOARD STATS -->
    <div class="row">
	
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="dashboard-stat blue-madison">
				<div class="visual">
					<i class="fa fa-users"></i>
				</div>
				<div class="details">
					<div class="number">
						 <?php echo isset($ttluser)?($ttluser):0; ?>
					</div>
					<div class="desc">
						 Total Users
					</div>
				</div>
				<a class="more" href="javascript:;">
				View more <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="dashboard-stat red-intense">
				<div class="visual">
					<i class="fa fa-book"></i>
				</div>
				<div class="details">
					<div class="number">
						 <?php echo isset($ttlblog)?($ttlblog):0; ?>
					</div>
					<div class="desc">
						 Total Blog
					</div>
				</div>
				<a class="more" href="javascript:;">
				View more <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="dashboard-stat green-haze">
				<div class="visual">
					<i class="fa fa-calendar"></i>
				</div>
				<div class="details">
					<div class="number">
						 <?php echo isset($ttlportfolio)?($ttlportfolio):0; ?>
					</div>
					<div class="desc">
						 Total Portfolio
					</div>
				</div>
				<a class="more" href="javascript:;">
				View more <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="dashboard-stat purple-plum">
				<div class="visual">
					<i class="fa fa-graduation-cap "></i>
				</div>
				<div class="details">
					<div class="number">
						 <?php echo isset($ttlclient)?($ttlclient):0; ?>
					</div>
					<div class="desc">
						 Total Client
					</div>
				</div>
				<a class="more" href="javascript:;">
				View more <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
     
    </div>        
	<!-- END DASHBOARD STATS -->
	<div class="clearfix">
	</div>
	
	<div class="row">
		<div class="col-md-3 col-sm-3">
			<div class="portlet light ">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-cursor font-purple-intense hide"></i>
						<span class="caption-subject font-purple-intense bold uppercase">Total Visitor</span>
					</div>
					<div class="actions">
						<a href="javascript:;" class="btn btn-sm btn-circle btn-default easy-pie-chart-reload" onclick="reload_visit()">
						<i class="fa fa-repeat"></i> Reload </a>
					</div>
				</div>
				<div class="portlet-body">
					<div class="row">
						<div class="col-md-12">
						<style>
						#visit-content{min-height:100px;}
						#visit-table tr {height:32px; color:#888;}
						</style>
						<div id="visit-content" class="msg_visit visitcontent"></div>
						</div>
						<div class="margin-bottom-10 visible-sm">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-sm-6">
			<div class="portlet light">
				<div class="portlet-title tabbable-line">
					<div class="caption">
						<span class="caption-subject font-green-sharp bold uppercase">Users Online</span>
					</div>
					<div class="actions">
						<a href="javascript:;" class="btn btn-sm btn-circle btn-default easy-pie-chart-reload" onclick="reload_users()">
						<i class="fa fa-repeat"></i> Reload </a>
					</div>
				</div>
				<div class="portlet-body">
					<div class="scroller" style="min-height: 100px;" data-always-visible="1" data-rail-visible="0">
						<div class="row">
						<div class="msg_users userscontent"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	
	<script>
	setTimeout(function(){ count_visit(); online_users();}, 500);
	
	function reload_visit(){
		setTimeout(function(){ count_visit(); }, 500);
	}
	function count_visit(){
		$.ajax({
		  type: "GET",
		  url: site_url+"dashboard/count_visit",
		  beforeSend: function() {
				$('.msg_visit').html('<img src="<?php echo base_url();?>theme/images/loader/loadingblue.gif"> Cheking...');
			},
		  success: function(data){
				$(".visitcontent").html(data);
			},
			error: function(jqXHR, textStatus, errorThrown){ return false; }                  
		}); 
	}
	
	function reload_users(){
		setTimeout(function(){ online_users(); }, 500);
	}
	function online_users(){
		$.ajax({
		  type: "GET",
		  url: site_url+"dashboard/online_users",
		  beforeSend: function() {
				$('.msg_users').html('<img src="<?php echo base_url();?>theme/images/loader/loadingblue.gif"> Cheking...');
			},
		  success: function(data){
				$(".userscontent").html(data);
			},
			error: function(jqXHR, textStatus, errorThrown){ return false; }                  
		}); 
	}
	</script>


		
		
      

