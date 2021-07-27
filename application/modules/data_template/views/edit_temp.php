<script>
$('.print').on('click', function(e){ 
		
			toastr['warning']("No column selected, cannot continue"); 
		
	});
</script>
<?php 
$id=isset($data->id_temp)?($data->id_temp):'';
$idel=isset($data->id_element)?($data->id_element):'';
$name=isset($data->nama_temp)?($data->nama_temp):'';
$img=isset($data->img_temp)?($data->img_temp):'';
if($img!=''){$img=$img;}else{$img='img_not.png';}
$img_back=isset($data->img_back)?($data->img_back):'';
if($img_back!=''){$img_back=$img_back;}else{$img_back='img_not.png';}
$default_temp=isset($data->default_temp)?($data->default_temp):'';					
?>
			<input name="id" type="hidden" value="<?php echo $id ?>">
			<input name="nama_temp_b" type="hidden" value="<?php echo $name ?>">
			<input name="tempimg_front_b" type="hidden" value="<?php echo $img ?>">
			<input name="tempimg_back_b" type="hidden" value="<?php echo $img_back ?>">
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Nama Template</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="f[nama_temp]" value="<?php echo $name ?>" placeholder="" required>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Element</label>
				<div class="col-md-9">
					<?php
						$dataray="";
						//$dataray['']="=== Choose ===";
						$db=$this->db->order_by("id_element","asc");
						$db=$this->db->get("temp_element")->result();
						foreach($db as $db)
						{
							$dataray[$db->id_element]=$db->name_element;
						}
						echo form_dropdown("f[id_element]",$dataray,$idel,'class="form-control show-tick"');
					?>	
				</div>
			</div>
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Upload Background Depan</label>
				<div class="col-md-3">
					<input type="file" class="form-control" name="tempimg_front" id="edittempimg_front" onchange="editpreviewFile_front(this)">
				</div>
				<div class="col-md-6">
					<small><p class="text-muted">* File Extention .png/.jpg/.jpeg  | size image : (1125px x 792px)</p></small>
				</div>
			</div>
			
			<div class="form-group row">
				<div class="col-md-12">
					<img class="vimg" width="100%" height="auto" id="editpreview_imgfront" src="<?php echo base_url()?>theme/images/sertifikat/<?php echo $img?>">
				</div>
			</div>
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Upload Background Belakang</label>
				<div class="col-md-3">
					<input type="file" class="form-control" name="tempimg_back" id="edittempimg_back" onchange="editpreviewFile_back(this)">
				</div>
				<div class="col-md-6">
					<small><p class="text-muted">* File Extention .png/.jpg/.jpeg  | size image : (1125px x 792px)</p></small>
				</div>
			</div>
			
			<div class="form-group row">
				<div class="col-md-12">
					<img class="vimg" width="100%" height="auto" id="editpreview_imgback" src="<?php echo base_url()?>theme/images/sertifikat/<?php echo $img_back?>">
				</div>
			</div>
			
<script>
function editpreviewFile_front(el) { 
	var extension = $('#edittempimg_front').val().split('.').pop().toLowerCase();
	if(extension != ''){
		if(jQuery.inArray(extension, ['png','jpg','jpeg']) == -1)
		{
			alert("Image File must be .png / .jpg");
			$('#edittempimg_front').val('');
			return false;
		}
	}
	if (el.files && el.files[0]) {
         var FR= new FileReader();
         FR.onload = function(e) {
              $("#editpreview_imgfront").attr("src", e.target.result);
              socket.emit('image', e.target.result);
              console.log(e.target.result);
         };       
         FR.readAsDataURL( el.files[0] );
    } 
}

function editpreviewFile_back(el) { 
	var extension = $('#edittempimg_back').val().split('.').pop().toLowerCase();
	if(extension != ''){
		if(jQuery.inArray(extension, ['png','jpg','jpeg']) == -1)
		{
			alert("Image File must be .png / .jpg");
			$('#edittempimg_back').val('');
			return false;
		}
	}
	if (el.files && el.files[0]) {
         var FR= new FileReader();
         FR.onload = function(e) {
              $("#editpreview_imgback").attr("src", e.target.result);
              socket.emit('image', e.target.result);
              console.log(e.target.result);
         };       
         FR.readAsDataURL( el.files[0] );
    } 
}
</script>
	