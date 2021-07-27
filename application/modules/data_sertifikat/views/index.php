<div class="headertitle">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1>Cetak Sertifikat</h1>
	  </div><!-- /.col -->
	  <div class="col-sm-6">
		<div class="float-sm-right">
		  <a href="javascript:input()" class="btn btn-primary">
			<i class="fa fa-plus-circle fa-lg"></i> Add Data
		  </a>
		  <a href="javascript:import_data()" class="btn btn-secondary"><i class="fas fa-download"></i> Import Data</a>
		  </div>
	  </div><!-- /.col -->
	</div><!-- /.row -->
</div>	

<div class="row">	 
	 <div class="col-md-12">
		<div class="card card-teal">
		  <div class="card-header">
			<h3 class="card-title">Data Sertifikat</h3>

			<div class="card-tools">
			  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
			  </button>
			</div>
			<!-- /.card-tools -->
		  </div>
		  <!-- /.card-header -->
		  <div class="card-body" style="display: block;">
			<div class="row">
				<div class="col-sm-3">
				  <div class="form-group">
					<label>Kelas</label>
					<select id="f1" class="form-control select2" onchange="reload_table()">
					<option value="">=== All ===</option>
					<?php 
						$db=$this->db->order_by("kode","asc");
					    $db=$this->db->get("tm_kelas")->result();
					    foreach($db as $val){
						   echo "<option value='".$val->kode."'>".$val->kelas."</option>";
					    }
					?>
					</select>
				  </div>
				</div>
				<div class="col-sm-3">
				  <div class="form-group">
					<label>Program Keahlian</label>
					<select id="f2" class="form-control select2" onchange="reload_table()">
					<option value="">=== All ===</option>
					<?php 
						$db=$this->db->order_by("kode","asc");
					    $db=$this->db->get("tm_program_keahlian")->result();
					    foreach($db as $val){
						   echo "<option value='".$val->kode."'>".$val->program_keahlian."</option>";
					    }
					?>
					</select>
				  </div>
				</div>
				<div class="col-sm-3">
				  <div class="form-group">
					<label>Kompetensi Keahlian</label>
					<select id="f3" class="form-control select2" onchange="reload_table()">
					<option value="">=== All ===</option>
					<?php 
						$db=$this->db->order_by("kode","asc");
					    $db=$this->db->get("tm_kompetensi_keahlian")->result();
					    foreach($db as $val){
						   echo "<option value='".$val->kode."'>".$val->kompetensi_keahlian."</option>";
					    }
					?>
					</select>
				  </div>
				</div>
				<div class="col-sm-3">
				  <div class="form-group">
					<label>Nama DUDI</label>
					<select id="f4" class="form-control select2" onchange="reload_table()">
					<option value="">=== All ===</option>
					<?php 
						$db=$this->db->group_by("nama_dudi");
						$db=$this->db->order_by("nama_dudi","asc");
					    $db=$this->db->get("data_sertifikat")->result();
					    foreach($db as $val){
						   echo "<option value='".$val->nama_dudi."'>".$val->nama_dudi."</option>";
					    }
					?>
					</select>
				  </div>
				</div>
			</div>
			<div id="area_lod">
				<div class="table-responsive">
				<table id='table_sertifikat' class="tabel black table-bordered  table-hover dataTable" style="font-size:12px;width:100%">
					<thead  class='sadow bg-teal'>			
						<th class='thead' >&nbsp;</th>
						<th class='thead' axis="string" width='15px'>ID</th>
						<th class='thead' axis="string" width='15px'>&nbsp;NO</th>
						<th class='thead' style="min-width:30px">NIS </th>
						<th class='thead' style="min-width:140px">NAMA </th>
						<th class='thead' style="min-width:50px">TEMPAT LAHIR </th>
						<th class='thead' style="min-width:25px">TANGGAL LAHIR </th>
						<th class='thead' style="min-width:40px">KELAS </th>
						<th class='thead' >PROGRAM KEAHLIAN </th>
						<th class='thead' style="min-width:100px">KOMPETENSI KEAHLIAN </th>
						<th class='thead' style="min-width:100px">SEKOLAH ASAL </th>
						<th class='thead' >NAMA DUDI</th>
						<th class='thead' >ALAMAT DUDI</th>
						<th class='thead' >TGL MULAI</th>
						<th class='thead' >TGL SELESAI </th>
						<th class='thead' >LAMA PKL </th>
						<th class='thead' >JML NILAI TEKNIS</th>
						<th class='thead' >JML KAT TEKNIS</th>
						<th class='thead' >RATA-RATA NILAI TEKNIS </th>
						<th class='thead' >RATA-RATA KAT TEKNIS </th>
						<th class='thead' >JML NILAI NONTEKNIS</th>
						<th class='thead' >JML KAT NONTEKNIS</th>
						<th class='thead' >RATA-RATA NILAI NONTEKNIS </th>
						<th class='thead' >RATA-RATA KAT NONTEKNIS </th>
						<th class='thead' style="min-width:380px">PROCESS</th>
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
	var  dataTable = $('#table_sertifikat').DataTable({ 
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
				"select": {
					rows: ''
				}			  
		}, 
        "serverSide": true, //Feature control DataTables' server-side processing mode.
		 "responsive": false,
		 "searching": true,
		 'columnDefs': [{
			    'targets': [0],
				'orderable': false,
				'searchable': false,
                'width': '1%',
				'checkboxes': {
					'selectRow': true,
				},
			},
			{
                "targets": [1],
                "visible": false,
                "searchable": false
			},{ 
			  "targets": [0,-1,-2,-3,-4,-5,-6,-7,-8,-9,-10,-11,-12,-13,-14,-15,-16,-17,-18,-19,-20,-21,-22,-23,-24], //last column
			  "orderable": false, //set not orderable
			}],
			"select": {
				style:    'multi',
				selector: 'td:first-child'
			},
		 "order": [[ 1, "desc" ]],
		 "lengthMenu":
		 [[10 , 30,50,100,200,300,400,500], 
		 [10 , 30,50,100,200,300,400,500]], 
		dom: 'Blfrtip',
		buttons: [
			{
				text:'<span class="fas fa-print"></span> Print All Selected',
				className :"btn btn-default btn-sm priviewsel"
			},
			{
				text:'<span class="fas fa-print"></span> Print Hal 1 Selected',
				className :"btn btn-default btn-sm priviewhal1sel"
			},
			{
				text:'<span class="fas fa-print"></span> Print Hal 2 Selected',
				className :"btn btn-default btn-sm priviewhal2sel"
			},
			{
				extend: 'excelHtml5',
				exportOptions: { columns: [2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] },
				text:'<span class="fas fa-file-excel"></span> Download Excell',
				className :"btn btn-default btn-sm",
				title: 'DATA SERTIFIKAT',
				messageTop: 'EXPORT DATA SERTIFIKAT | <?php echo date("d/m/Y H:i");?>',
				filename: 'Export-DATA-SERTIFIKAT',
				customize: function( xlsx ) 
				{
					var source = xlsx.xl['workbook.xml'].getElementsByTagName('sheet')[0];
					source.setAttribute('name','DATA SERTIFIKAT');
				}
			},
        ],
		scrollY:        "330px",
        scrollX:        true,
        scrollCollapse: false,
		fixedColumns:   {
            leftColumns: 5
        },
		/*fixedHeader: [{
            header: true,
            footer: true
        }],*/
        
			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('data_sertifikat/data_tables_sertifikat');?>",
				"type": "POST",
				"data": function ( data ) {
					data.f1 = $('#f1').val();
					data.f2 = $('#f2').val();
					data.f3 = $('#f3').val();
					data.f4 = $('#f4').val();
			 },
			 
        },
		/*Set column definition initialisation properties.
        "columnDefs": [
        { 
          "targets": [ -1,-2,-3,-4,-5,-6,-7], //last column
          "orderable": false, //set not orderable
        },
        ],*/
    });

	
	function reload_table()
	{
		dataTable.ajax.reload(null,false);
		$('input[type="checkbox"]', dataTable.cells().nodes()).prop('checked',false);
	};
</script>  

<script>
function input()
{ 
	$("#formSubmit_input")[0].reset();
	$("#title_mdl_input").html("INPUT DATA");
	$('.select2').val(null).trigger('change');
	//$("#inputpreview_img").attr("src", '<?php echo base_url()?>theme/images/user/img_not.png');
	$("#mdl_formSubmit_input").modal({backdrop: 'static', keyboard: false});
	$("#formSubmit_input").attr("url","<?php echo base_url("data_sertifikat/input_Sertifikat");?>");	
}
function edit(id)
{	
	$("#title_mdl_edit").html("EDIT DATA");    
    $("#mdl_formSubmit_edit").modal({backdrop: 'static', keyboard: false});	
	$("#formSubmit_edit").attr("url","<?php echo base_url("data_sertifikat/update_Sertifikat");?>");
		$.post("<?php echo site_url("data_sertifikat/edit_Sertifikat"); ?>",{id:id},function(data){
		$("#edit_page").html(data);
	});
}
function nilai(id)
{	
	$("#title_mdl_nilai").html("EDIT NILAI");    
    $("#mdl_formSubmit_nilai").modal({backdrop: 'static', keyboard: false});	
	$("#formSubmit_nilai").attr("url","<?php echo base_url("data_sertifikat/update_Nilai");?>");
		$.post("<?php echo site_url("data_sertifikat/edit_Nilai"); ?>",{id:id},function(data){
		$("#nilai_page").html(data);
	});
}
function del(id,nis,name){
   alertify.confirm("Delete","<center>Delete data : <b>`"+nis+"`</b> <br> <b>`"+name+"`</b> ?</center>",function(){
	$.post("<?php echo site_url("data_sertifikat/delete_Sertifikat"); ?>",{id:id,nis:nis},function(){
		toastr['success']("Successfully deleted permanently");
		reload_table();
	  })
   }, function(){ });
}
function priview(id)
{	
	$("#title_mdl_view").html("PRINT ALL PRIVIEW");    
    $("#mdl_formSubmit_view").modal({backdrop: 'static', keyboard: false});	
	//$("#formSubmit_view").attr("url","<?php echo base_url("data_sertifikat/print_Sertifikat");?>");
	$("#_view").val(id);
	$.post("<?php echo site_url("data_sertifikat/priview_Sertifikat"); ?>",{id:id},function(data){
		//$("#view_page").html(data);
		$("#view_page").html('<iframe src="<?php echo base_url();?>data_sertifikat/priview_sertifikat?id='+id+'" style="width:100%;height:500px">'+data+'</iframe>');
	});
}
function priviewhal1(id)
{	
	$("#title_mdl_view").html("PRINT HALAMAN 1 PRIVIEW");    
    $("#mdl_formSubmit_view").modal({backdrop: 'static', keyboard: false});	
	//$("#formSubmit_view").attr("url","<?php echo base_url("data_sertifikat/print_Sertifikat");?>");
	$("#_view").val(id);
	$.post("<?php echo site_url("data_sertifikat/priviewhal1_Sertifikat"); ?>",{id:id},function(data){
		//$("#view_page").html(data);
		$("#view_page").html('<iframe src="<?php echo base_url();?>data_sertifikat/priviewhal1_sertifikat?id='+id+'" style="width:100%;height:500px">'+data+'</iframe>');
	});
}
function priviewhal2(id)
{	
	$("#title_mdl_view").html("PRINT HALAMAN 2 PRIVIEW");    
    $("#mdl_formSubmit_view").modal({backdrop: 'static', keyboard: false});	
	//$("#formSubmit_view").attr("url","<?php echo base_url("data_sertifikat/print_Sertifikat");?>");
	$("#_view").val(id);
	$.post("<?php echo site_url("data_sertifikat/priviewhal2_Sertifikat"); ?>",{id:id},function(data){
		//$("#view_page").html(data);
		$("#view_page").html('<iframe src="<?php echo base_url();?>data_sertifikat/priviewhal2_sertifikat?id='+id+'" style="width:100%;height:500px">'+data+'</iframe>');
	});
}
function import_data() 
{ 	//alert('');
    $("#formSubmitDown")[0].reset();
	$("#title_mdl_down").html("IMPORT DATA SERTIFIKAT");
	//$("#isi").html(data);
	$("#mdl_formSubmitDown").modal('show');
	$("#formSubmitDown").attr("url","<?php echo base_url()?>data_sertifikat/import_data");
}


</script>
<script>	
	$('.priviewsel').on('click', function(e){ 
		var oData = dataTable.rows({selected:  true}).data();
		var newarray=[];       
			for (var i=0; i < oData.length ;i++){
			   //alert("id: " + oData[i][0] + " no: " + oData[i][1] );
			   newarray.push(oData[i][1]);
			}
		var sData = newarray.join();
		//alert(sData);
		if(sData!=''){
			$("#title_mdl_view").html("PRINT ALL PRIVIEW");    
			$("#mdl_formSubmit_view").modal({backdrop: 'static', keyboard: false});	
			//$("#formSubmit_view").attr("url","<?php echo base_url("data_sertifikat/print_Sertifikat");?>");
			$.ajax({
				url : '<?php echo site_url("data_sertifikat/priview_Sertifikat"); ?>',
				type: "POST",
				data: "id="+sData,
				cache: false,
				success: function(data){
					$("#view_page").html('<iframe src="<?php echo base_url();?>data_sertifikat/priview_sertifikat?id='+sData+'" style="width:100%;height:500px">'+data+'</iframe>');
					$("#_view").val(sData);
				},
				error: function(jqXHR, textStatus, errorThrown){ toastr['error']("Gagal memproses"); return false;} 	  
				});
		}else{
			toastr['warning']("No column selected, cannot continue"); return false;
		}
	});
</script>	
<script>	
	$('.priviewhal1sel').on('click', function(e){ 
		var oData = dataTable.rows({selected:  true}).data();
		var newarray=[];       
			for (var i=0; i < oData.length ;i++){
			   //alert("id: " + oData[i][0] + " no: " + oData[i][1] );
			   newarray.push(oData[i][1]);
			}
		var sData = newarray.join();
		//alert(sData);
		if(sData!=''){
			$("#title_mdl_view").html("PRINT HALAMAN 1 PRIVIEW");    
			$("#mdl_formSubmit_view").modal({backdrop: 'static', keyboard: false});	
			//$("#formSubmit_view").attr("url","<?php echo base_url("data_sertifikat/print_Sertifikat");?>");
			$.ajax({
				url : '<?php echo site_url("data_sertifikat/priviewhal1_Sertifikat"); ?>',
				type: "POST",
				data: "id="+sData,
				cache: false,
				success: function(data){
					$("#view_page").html('<iframe src="<?php echo base_url();?>data_sertifikat/priviewhal1_sertifikat?id='+sData+'" style="width:100%;height:500px">'+data+'</iframe>');
					$("#_view").val(sData);
				},
				error: function(jqXHR, textStatus, errorThrown){ toastr['error']("Gagal memproses"); return false;} 	  
				});
		}else{
			toastr['warning']("No column selected, cannot continue"); return false;
		}
	});
</script>	
<script>	
	$('.priviewhal2sel').on('click', function(e){ 
		var oData = dataTable.rows({selected:  true}).data();
		var newarray=[];       
			for (var i=0; i < oData.length ;i++){
			   //alert("id: " + oData[i][0] + " no: " + oData[i][1] );
			   newarray.push(oData[i][1]);
			}
		var sData = newarray.join();
		//alert(sData);
		if(sData!=''){
			$("#title_mdl_view").html("PRINT HALAMAN 2 PRIVIEW");    
			$("#mdl_formSubmit_view").modal({backdrop: 'static', keyboard: false});	
			//$("#formSubmit_view").attr("url","<?php echo base_url("data_sertifikat/print_Sertifikat");?>");
			$.ajax({
				url : '<?php echo site_url("data_sertifikat/priviewhal2_Sertifikat"); ?>',
				type: "POST",
				data: "id="+sData,
				cache: false,
				success: function(data){
					$("#view_page").html('<iframe src="<?php echo base_url();?>data_sertifikat/priviewhal2_sertifikat?id='+sData+'" style="width:100%;height:500px">'+data+'</iframe>');
					$("#_view").val(sData);
				},
				error: function(jqXHR, textStatus, errorThrown){ toastr['error']("Gagal memproses"); return false;} 	  
				});
		}else{
			toastr['warning']("No column selected, cannot continue"); return false;
		}
	});
</script>	
<script>
  $(function (){
	 $('.select2').select2({
      theme: 'bootstrap4'
    });
	$('[data-mask]').inputmask();
	$(".tanggal_mulai").on("change keyup paste keypress", function(data){
		var tgl_1 = $(this).val();
		var tgl_2 = $(".tanggal_selesai").val();
		durasiBln(tgl_1,tgl_2);
	});
	$(".tanggal_selesai").on("change keyup paste keypress", function(data){
		var tgl_1 = $(".tanggal_mulai").val();
		var tgl_2 = $(this).val();
		durasiBln(tgl_1,tgl_2);
	});

  })
</script>
<script>
function get_pk(sel)
{	
	var val_i =$(".program_keahlian_i").val();
	var val_e =$(".program_keahlian_e").val();
	if(sel=='input'){
		$.post("<?php echo site_url("data_sertifikat/get_kk"); ?>",{id:val_i},function(data){
			$(".kompetensi_keahlian_i").html(data);
		});
	}else{
		$.post("<?php echo site_url("data_sertifikat/get_kk"); ?>",{id:val_e},function(data){
			$(".kompetensi_keahlian_e").html(data);
		});
	}
}

function durasiBln(tgl_1,tgl_2){
  $.post("<?php echo site_url("data_sertifikat/selisih_bulan"); ?>",{tgl_1:tgl_1,tgl_2:tgl_2},function(data){
		$(".lama_pkl").val(data);
  });
}
/*
function daysBetween(first, second) {
	var newDate = Date.now() + -5*24*3600*1000;

	// Copy date parts of the timestamps, discarding the time parts.
	var one = new Date(first[2], first[0], first[1]);
	var two = new Date(second[2], second[0], second[1]);

	// // Do the math.
	var millisecondsPerDay = 1000 * 60 * 60 * 24;
	var millisBetween = two.getTime() - one.getTime();
	var days = millisBetween / millisecondsPerDay;

	// Round down.
	return Math.floor(days);
}*/
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
	<form class="form-horizontal" id="formSubmit_input" action="javascript:submitForm('formSubmit_input')" method="post">
	<div class="modal-body">

			<div class="form-group row">
				<label class="black col-md-3 control-label">NIS</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="f[nis]" placeholder="" required>
				</div>
			</div>
		
			<div class="form-group row">
				<label class="black col-md-3 control-label">Nama</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="f[nama]" placeholder="" required>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Tempat Lahir</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="f[tempat_lahir]" placeholder="">
				</div>
			</div>
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Tanggal Lahir</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="tanggal_lahir" placeholder="dd/mm/yyyy" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Kelas</label>
				<div class="col-md-9">
					<select class="form-control select2 kelas" name="f[kelas]" required>
						<option value="">=== Choose ===</option>
						<?php 
						$db=$this->db->order_by("kode","asc");
					    $db=$this->db->get("tm_kelas")->result();
					    foreach($db as $val){
						   echo "<option value='".$val->kode."'>".$val->kelas."</option>";
					    }
					    ?>
				    </select>
				</div>
			</div>
			<div class="form-group row">
				<label class="black col-md-3 control-label">Program Keahlian</label>
				<div class="col-md-9">
					<select class="form-control select2 program_keahlian_i" name="f[program_keahlian]" onchange="get_pk('input')" required>
						<option value="">=== Choose ===</option>
						<?php 
						$db=$this->db->order_by("kode","asc");
					    $db=$this->db->get("tm_program_keahlian")->result();
					    foreach($db as $val){
						   echo "<option value='".$val->kode."'>".$val->program_keahlian."</option>";
					    }
					    ?>
				    </select>
				</div>
			</div>
			<div class="form-group row">
				<label class="black col-md-3 control-label">Kompetensi Keahlian</label>
				<div class="col-md-9">
					<select class="form-control select2 kompetensi_keahlian_i" name="f[kompetensi_keahlian]" required>
						<option value="">=== Choose ===</option>
						<?php 
						$db=$this->db->order_by("kode","asc");
					    $db=$this->db->get("tm_kompetensi_keahlian")->result();
					    foreach($db as $val){
						   echo "<option value='".$val->kode."'>".$val->kompetensi_keahlian."</option>";
					    }
					    ?>
				    </select>
				</div>
			</div>

			<div class="form-group row">
				<label class="black col-md-3 control-label">Sekolah Asal</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="f[sekolah_asal]" placeholder="">
				</div>
			</div>
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Nama DUDI</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="f[nama_dudi]" placeholder="">
				</div>
			</div>
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Alamat DUDI</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="f[alamat_dudi]" placeholder="">
				</div>
			</div>
			
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Tanggal Mulai</label>
				<div class="col-md-9">
					<input type="text" class="form-control tanggal_mulai" name="tanggal_mulai" placeholder="dd/mm/yyyy" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask required>
				</div>
			</div>
			<div class="form-group row">
				<label class="black col-md-3 control-label">Tanggal Selesai</label>
				<div class="col-md-9">
					<input type="text" class="form-control tanggal_selesai" name="tanggal_selesai" placeholder="dd/mm/yyyy" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask required>
				</div>
			</div>
			<div class="form-group row">
				<label class="black col-md-3 control-label">Lama PKL</label>
				<div class="col-md-9">
					<input type="text" class="form-control lama_pkl" name="f[lama_pkl]" placeholder="">
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
	<form class="form-horizontal" id="formSubmit_edit" action="javascript:submitForm('formSubmit_edit')" method="post" >
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
<div class="modal fade" id="mdl_formSubmit_nilai">
<div class="modal-dialog modal-xl" id="area_formSubmit_nilai">
  <div class="modal-content">
	<div class="modal-header">
	  <h4 class="modal-title" id="title_mdl_nilai">Default Modal</h4>
	  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button>
	</div>
	<form class="form-horizontal" id="formSubmit_nilai" action="javascript:submitForm('formSubmit_nilai')" method="post" >
	<div class="modal-body">
		
			<div id="nilai_page"></div>

	</div>
	<div class="modal-footer justify-content-between">
	  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	  <button  title="Save" id="submit" onclick="submitForm('formSubmit_nilai')" class="btn btn-primary"><i class='fa fa-save'></i> Save changes</button>
	</div>
	</form>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- modal -->
<div class="modal fade" id="mdl_formSubmit_view">
<div class="modal-dialog modal-xl" id="area_formSubmit_view">
  <div class="modal-content">
	<div class="modal-header">
	  <h4 class="modal-title" id="title_mdl_view">Default Modal</h4>
	  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button>
	</div>
	<form class="form-horizontal" id="formSubmit_view" action="javascript:submitForm('formSubmit_view')" method="post" >
	<div class="modal-body">
			<input id="_view" type="hidden">
			<div id="view_page"></div>
	</div>
	<div class="modal-footer justify-content-between">
	  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	</div>
	</form>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- modal -->
<div class="modal fade" id="mdl_formSubmitDown">
<div class="modal-dialog" id="area_formSubmitDown">
  <div class="modal-content">
	<div class="modal-header">
	  <h4 class="modal-title" id="title_mdl_down">Default Modal</h4>
	  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button>
	</div>
	<form class="form-horizontal" id="formSubmitDown" action="javascript:submitForm('formSubmitDown')" method="post" >
	<div class="modal-body">
		
			<center> <a class="sound" href="<?php echo base_url()?>format.xlsx">Download Format Upload</a> </center><br>
			<div class="form-group row">
				<label class="black col-md-3 control-label">Cari File</label>
				<div class="col-md-9">
					<input type="file" accept="xlsx" class="form-control" name="file" required/>
				</div>
			</div>

	</div>
	<div class="modal-footer justify-content-between">
	  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	  <button  title="Save" id="formSubmitDown" onclick="submitForm('formSubmitDown')" class="btn btn-primary"><i class='fa fa-send'></i> Upload</button>
	</div>
	</form>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
