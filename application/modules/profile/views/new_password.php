<div id="area_lod">

<div class="headertitle">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1>New Password</h1>
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
	  <h3 class="card-title">Set New Password</h3>
	</div>
	<form class="form-horizontal" id="formSubmit_edit" action="javascript:submitForm('formSubmit_edit')" method="post">
	<!-- /.card-header -->
	<div class="card-body">
		<div class="row" >

		<div class="col-md-7">
			
			<div class="form-group row">
				<label class="black col-md-4 control-label">Current Password</label>
				<div class="col-md-8">
					<div class="input-group">
					  <div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-key"></i></span>
					  </div>
					  <input type="password" id="passold" name="passold" class="form-control" />
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label class="black col-md-4 control-label">New Password</label>
				<div class="col-md-8">
					<div class="input-group">
					  <div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-key"></i></span>
					  </div>
					  <input type="password" id="passnew" name="passnew" class="form-control" />
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label class="black col-md-4 control-label">Re-type New Password</label>
				<div class="col-md-8">
					<div class="input-group">
					  <div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-key"></i></span>
					  </div>
					  <input type="password" id="retpass" name="retpass" class="form-control" />
					</div>
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
  $(function () {
	$("#formSubmit_edit").attr("url","<?php echo base_url("profile/update_Password");?>");
  });
</script>			
