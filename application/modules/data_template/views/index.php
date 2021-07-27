<div class="headertitle">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1>Template Sertifikat</h1>
	  </div><!-- /.col -->
	  <div class="col-sm-6">
		  <a href="javascript:input()" class="btn btn-primary float-sm-right">
			<i class="fa fa-plus-circle fa-lg"></i> Add Data
		  </a>
	  </div><!-- /.col -->
	</div><!-- /.row -->
</div>	

<div class="row">	 
	 <div class="col-md-12">
		<div class="card card-teal">
		  <div class="card-header">
			<h3 class="card-title">Data Template</h3>

			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			</div>
			<!-- /.card-tools -->
		  </div>
		  <!-- /.card-header -->
		  <div class="card-body" style="display: block;">
			<div id="area_lod">
				<div class="table-responsive">
				<table id='table' class="tabel black table-bordered  table-hover dataTable" style="font-size:12px;width:100%">
					<thead  class='sadow bg-teal'>			
						<th class='thead' axis="string" width='15px'>&nbsp;NO</th>
						<th class='thead' style="min-width:320px">TEMPLATE</th>
						<th class='thead' style="min-width:100px">STATUS </th>
						<th class='thead' >NAMA TEMPLATE </th>
						<th class='thead' style="min-width:180px">PROCESS</th>
					</thead>
				</table>
				</div>
			</div>
		  </div>
		  <!-- /.card-body -->
		</div>
		<!-- /.card -->
	  </div>
</div>

<script type="text/javascript">
	var  dataTable = $('#table').DataTable({ 
		"paging": true,
        "processing": true, //Feature control the processing indicator.
		"language": {
		"sSearch": "Search",
		"processing": '<i class="fa fa-spinner fa-pulse fa-2x fa-fw text-success"></i><span class="sr-only"> Loading...</span> <br><b style="color:white;background:#33AFFF">Data sedang di tampilkan..</b>',
			  "oPaginate": {
				"sFirst": "Page First",
				"sLast": "Page Last",
				 "sNext": "Next",
				 "sPrevious": "Previous"
				 },
			"sInfo": "Total :  _TOTAL_ , Row (_START_ - _END_)",
			 "sInfoEmpty": "No data displayed",
			   "sZeroRecords": "Data not available",
			  "lengthMenu": "&nbsp;&nbsp; Show _MENU_ entries", 		  
		}, 
        "serverSide": true, //Feature control DataTables' server-side processing mode.
		 "responsive": true,
		 "searching": true,
		 "order": [[ 2, "desc" ]],
		 "lengthMenu":
		 [[10 , 30,50,100,200,300,400,500], 
		 [10 , 30,50,100,200,300,400,500]], 
		dom: 'Blfrtip',
		buttons: [],
			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('data_template/data_tables_temp');?>",
				"type": "POST",
				"data": function ( data ) {
					//data.f1 = $('#f1').val();
			 },
        },
		//Set column definition initialisation properties.
        "columnDefs": [{ 
          "targets": [ -1,-2,-3,-4,-5], //last column
          "orderable": false, //set not orderable
        }],
    });

	function reload_table()
	{
		dataTable.ajax.reload(null,false);
	};
</script>  

<script>
function input()
{ 
	$("#formSubmit_input")[0].reset();
	$("#title_mdl_input").html("INPUT DATA");
	$("#inputpreview_img").attr("src", '');
	$("#mdl_formSubmit_input").modal({backdrop: 'static', keyboard: false});
	$("#formSubmit_input").attr("url","<?php echo base_url("data_template/input_Temp");?>");	
}
function edit(id)
{	
	$("#title_mdl_edit").html("EDIT DATA");    
    $("#mdl_formSubmit_edit").modal({backdrop: 'static', keyboard: false});	
	$("#formSubmit_edit").attr("url","<?php echo base_url("data_template/update_Temp");?>");
		$.post("<?php echo site_url("data_template/edit_Temp"); ?>",{id:id},function(data){
		$("#edit_page").html(data);
	});
}
function del(id,name){
   alertify.confirm("Delete","<center>Delete data : <b>`"+name+"`</b> ?</center>",function(){
	$.post("<?php echo site_url("data_template/delete_Temp"); ?>",{id:id},function(){
		toastr['success']("Successfully deleted permanently");
		reload_table();
	  })
   }, function(){ });
}
function atdef(id,name){
   alertify.confirm("Atur Default","<center>Terapkan data : <b>`"+name+"`</b> Sebagai Template Default ?</center>",function(){
	$.post("<?php echo site_url("data_template/update_Atdef"); ?>",{id:id},function(){
		toastr['success']("Successfully Set Default Template");
		reload_table();
	  })
   }, function(){ });
}
function element(id)
{	
	$("#title_mdl_element").html("EDIT ELEMENT");    
    $("#mdl_formSubmit_element").modal({backdrop: 'static', keyboard: false});	
	$("#formSubmit_element").attr("url","<?php echo base_url("data_template/update_Element");?>");
		$.post("<?php echo site_url("data_template/element_Sertifikat"); ?>",{id:id},function(data){
		$("#view_page").html(data); 
	});
}

</script>


<!-- modal -->
<div class="modal fade" id="mdl_formSubmit_input">
<div class="modal-dialog modal-lg" id="area_formSubmit_input">
  <div class="modal-content">
	<div class="modal-header">
	  <h4 class="modal-title" id="title_mdl_input">Default Modal</h4>
	  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button>
	</div>
	<form class="form-horizontal" id="formSubmit_input" action="javascript:submitForm('formSubmit_input')" method="post" enctype="multipart/form-data">
	<div class="modal-body">
	
			
		
			<div class="form-group row">
				<label class="black col-md-3 control-label">Nama Template</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="f[nama_temp]" placeholder="" required>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Element</label>
				<div class="col-md-9">
					<select class="form-control show-tick" name="f[id_element]" data-live-search="true" required>
						<!--option value="">=== Choose ===</option-->
						<?php 
					    $db=$this->db->get("temp_element")->result();
					    foreach($db as $val){
						   echo "<option value='".$val->id_element."'>".$val->name_element."</option>";
					    }
					    ?>
				    </select>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Upload Background Depan</label>
				<div class="col-md-3">
					<input type="file" class="form-control" name="tempimg_front" id="inputtempimg_front" onchange="inputpreviewFile_front(this)">
				</div>
				<div class="col-md-6">
					<small><p class="text-muted">* File Extention .png/.jpg/.jpeg  | size image : (1125px x 792px)</p></small>
				</div>
			</div>
			
			<div class="form-group row">
				<div class="col-md-12">
					<img class="vimg" width="100%" height="auto" id="inputpreview_imgfront" src="">
				</div>
			</div>
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Upload Background Belakang</label>
				<div class="col-md-3">
					<input type="file" class="form-control" name="tempimg_back" id="inputtempimg_back" onchange="inputpreviewFile_back(this)">
				</div>
				<div class="col-md-6">
					<small><p class="text-muted">* File Extention .png/.jpg/.jpeg  | size image : (1125px x 792px)</p></small>
				</div>
			</div>
			
			<div class="form-group row">
				<div class="col-md-12">
					<img class="vimg" width="100%" height="auto" id="inputpreview_imgback" src="">
				</div>
			</div>
			
			
		
	</div>
	<div class="modal-footer justify-content-between">
	  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	  <button  title="Save" id="submit" onclick="submitForm('formSubmit_input')" class="btn btn-primary"><i class='fa fa-save'></i> Save changes</button>
	</div>
	</form>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- modal -->
<div class="modal fade" id="mdl_formSubmit_edit">
<div class="modal-dialog modal-lg" id="area_formSubmit_edit">
  <div class="modal-content">
	<div class="modal-header">
	  <h4 class="modal-title" id="title_mdl_edit">Default Modal</h4>
	  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button>
	</div>
	<form class="form-horizontal" id="formSubmit_edit" action="javascript:submitForm('formSubmit_edit')" method="post" enctype="multipart/form-data">
	<div class="modal-body">
		
			<div id="edit_page"></div>

	</div>
	<div class="modal-footer justify-content-between">
	  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	  <button  title="Save" id="submit" onclick="submitForm('formSubmit_edit')" class="btn btn-primary"><i class='fa fa-save'></i> Save changes</button>
	</div>
	</form>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- modal -->
<div class="modal fade" id="mdl_formSubmit_element">
<div class="modal-dialog modal-xl" id="area_formSubmit_element">
  <div class="modal-content">
	<div class="modal-header">
	  <h4 class="modal-title" id="title_mdl_element">Default Modal</h4>
	  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button>
	</div>
	<form class="form-horizontal" id="formSubmit_element" action="javascript:submitForm('formSubmit_element')" method="post" enctype="multipart/form-data">
	<div class="modal-body">
		
			<div id="view_page"></div>

	</div>
	<div class="modal-footer justify-content-between">
	  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	  <button  title="Save" id="submit" onclick="submitForm('formSubmit_element')" class="btn btn-primary"><i class='fa fa-save'></i> SAVE ELEMENT</button>
	</div>
	</form>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
function inputpreviewFile_front(el) { 
	var extension = $('#inputtempimg_front').val().split('.').pop().toLowerCase();
	if(extension != ''){
		if(jQuery.inArray(extension, ['png','jpg','jpeg']) == -1)
		{
			alert("Image File must be .png / .jpg");
			$('#inputtempimg_front').val('');
			return false;
		}
	}
	if (el.files && el.files[0]) {
         var FR= new FileReader();
         FR.onload = function(e) {
              $("#inputpreview_imgfront").attr("src", e.target.result);
              socket.emit('image', e.target.result);
              console.log(e.target.result);
         };       
         FR.readAsDataURL( el.files[0] );
    } 
}

function inputpreviewFile_back(el) { 
	var extension = $('#inputtempimg_back').val().split('.').pop().toLowerCase();
	if(extension != ''){
		if(jQuery.inArray(extension, ['png','jpg','jpeg']) == -1)
		{
			alert("Image File must be .png / .jpg");
			$('#inputtempimg_back').val('');
			return false;
		}
	}
	if (el.files && el.files[0]) {
         var FR= new FileReader();
         FR.onload = function(e) {
              $("#inputpreview_imgback").attr("src", e.target.result);
              socket.emit('image', e.target.result);
              console.log(e.target.result);
         };       
         FR.readAsDataURL( el.files[0] );
    } 
}
</script>
