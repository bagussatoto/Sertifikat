<div id="area_lod">

<div class="headertitle">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1>Edit Profile</h1>
	  </div><!-- /.col -->
	  <!--div class="col-sm-6">
		  <a href="javascript:input()" class="btn btn-primary float-sm-right">
			<i class="fa fa-plus-circle fa-lg"></i> Add User
		  </a>
	  </div><!-- /.col -->
	</div><!-- /.row -->
</div>	

<!--h5 class="mb-2"></h5-->

<div class="row" >
<div class="col-md-12">
  <div class="card">
	<div class="card-header">
	  <h3 class="card-title">Profile</h3>
	</div>
	<form class="form-horizontal" id="formSubmit_edit" action="javascript:submitForm('formSubmit_edit')" method="post" enctype="multipart/form-data">
	<!-- /.card-header -->
	<div class="card-body">
		<div class="row" >
<?php 
$username=isset($data->username)?($data->username):'';
$gender=isset($data->gender)?($data->gender):'';
$profileimg=isset($data->profileimg)?($data->profileimg):'';	
$profilename=isset($data->profilename)?($data->profilename):'';		
$wa=isset($data->wa)?($data->wa):'';	
$email=isset($data->email)?($data->email):'';
$profileaddress=isset($data->profileaddress)?($data->profileaddress):'';	
$idlevel=isset($data->level)?($data->level):'';
$level=$this->m_konfig->getNamaUG($idlevel);
if($profileimg!=''){$img=$profileimg;}else{$img='img_not.png';}					
?>
		<div class="col-md-3">
			<input name="username_b" type="hidden" value="<?php echo $username ?>">
			<input name="profileimg_b" type="hidden" value="<?php echo $profileimg ?>">
			
			<div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img style="width:100px;height:100px;" class="profile-user-img img-fluid img-circle" id="editpreview_img" src="<?php echo base_url()?>theme/images/user/<?php echo $img;?>" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><b><?php echo $profilename;?></b></h3>

                <p class="text-muted text-center"><?php echo $level;?></p>

				<input type="file" class="btn btn-primary btn-block" name="profileimg" id="editprofileimg" onchange="editpreviewFile(this)">
              </div>
              <!-- /.card-body -->
            </div>

		</div>
		<div class="col-md-1">
		&nbsp;
		</div>
		<div class="col-md-7">
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Profile name</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="f[profilename]" value="<?php echo $profilename ?>" placeholder="">
				</div>
			</div>
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Gender</label>
				<div class="col-md-9">
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="f[gender]" value="l" <?php if($gender=='l'){echo 'checked';} ?>>
					  <label class="form-check-label">Laki-laki</label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="f[gender]" value="p" <?php if($gender=='p'){echo 'checked';} ?>>
					  <label class="form-check-label">Perempuan</label>
					</div>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Wahtsapp</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="f[wa]" value="<?php echo $wa ?>" data-inputmask="'mask': ['9999 9999 9999']" data-mask placeholder="">
				</div>
			</div>
			<div class="form-group row">
				<label class="black col-md-3 control-label">Email</label>
				<div class="col-md-9">
					<input type="email" class="form-control" name="f[email]" value="<?php echo $email ?>" placeholder="">
				</div>
			</div>
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Address</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="f[profileaddress]" value="<?php echo $profileaddress ?>" placeholder="">
				</div>
			</div>

			<div class="form-group row">
				<label class="black col-md-3 control-label">Username</label>
				<div class="col-md-9">
					<input required type="text" class="form-control" name="f[username]" value="<?php echo $username ?>" placeholder="">
				</div>
			</div>
		</div>
		</div>
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
	  <button  title="Save" id="submit" onclick="submitForm('formSubmit_edit')" class="btn btn-primary"><i class='fa fa-save'></i> Save changes</button>
	</div>
	</form>
  </div>
</div>
</div>

</div>

<script>
function editpreviewFile(el) {
	var extension = $('#editprofileimg').val().split('.').pop().toLowerCase();
	if(extension != ''){
		if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
		{
			alert("Image File must be .gif / .png / .jpg");
			$('#editprofileimg').val('');
			return false;
		}
	}
	if (el.files && el.files[0]) {
         var FR= new FileReader();
         FR.onload = function(e) {
              $("#editpreview_img").attr("src", e.target.result);
              socket.emit('image', e.target.result);
              console.log(e.target.result);
         };       
         FR.readAsDataURL( el.files[0] );
    } 
}
</script>
<script>
  $(function () {
    $('[data-mask]').inputmask();
	$("#formSubmit_edit").attr("url","<?php echo base_url("profile/update_Profile");?>");
  });
</script>			
