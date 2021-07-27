

<div class="login-box">
  <div class="login-logo" >
    <a style="color:#ffffff;font-weight:bold;text-shadow: 1px 2px 2px rgba(0,0,0,0.64);" href="<?php echo base_url()?>login"><b><?php echo $this->m_konfig->konfigurasi(6);?></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card" style="-webkit-box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.75);
box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.75);">
    <div class="card-body login-card-body">
      <p class="login-box-msg msg">Sign in to start your session</p>

     <form id="formlogin" method="POST" action="javascript:login()">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username" required autofocus >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div id="msg"></div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->





<script>
function login()
{
	$('#msg').html("<img src='<?php echo base_url();?>theme/images/loader/loadingblue.gif'> Please wait...");
	$.ajax({
	url:"<?php echo base_url();?>login/cekLogin",
	type: "POST",
	data: $('#formlogin').serialize(),
	dataType: "JSON",
	success: function(data)
		{
		   //if success close modal and reload ajax table
		   if(data["upass"]==false){
			  $('#msg').html("<span class='text-danger'><i class='fas fa-exclamation-circle'></i>&nbsp;Username/Password Salah! </span>"); return false;
		   }
		   if(data["validasi"]==true){
			$('#msg').html("<span class='text-success'><i class='fas fa-check-circle'></i>&nbsp;Berhasil !! Mohon tunggu....</span>"); 
				window.location.href="<?php echo base_url();?>"+data["direct"]; 
		   }else{
				window.location.href="<?php echo base_url();?>login/logout"; 
		   }
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
			alert('Try Again!');
		}
	});
 
}
</script>


 	
 	
 	
 	

 
            