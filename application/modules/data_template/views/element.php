<?php 
$id=isset($data->id_temp)?($data->id_temp):'';
$name_temp=isset($data->nama_temp)?($data->nama_temp):'';
$img_temp=isset($data->img_temp)?($data->img_temp):'';	
$id_element=isset($data->id_element)?($data->id_element):'';			
?>
<?php 
$DBtempElement=$this->db->where('id_element',$id_element);
$DBtempElement=$this->db->get('temp_element');
$tempElement=$DBtempElement->row();

$name_element=isset($tempElement->name_element)?($tempElement->name_element):'';
$el_1=isset($tempElement->el_1)?($tempElement->el_1):'';
$el_2=isset($tempElement->el_2)?($tempElement->el_2):'';
$el_3=isset($tempElement->el_3)?($tempElement->el_3):'';
$el_4=isset($tempElement->el_4)?($tempElement->el_4):'';
$el_5=isset($tempElement->el_5)?($tempElement->el_5):'';
$el_6=isset($tempElement->el_6)?($tempElement->el_6):'';
$el_7=isset($tempElement->el_7)?($tempElement->el_7):'';
$el_8=isset($tempElement->el_8)?($tempElement->el_8):'';
$el_9=isset($tempElement->el_9)?($tempElement->el_9):'';
$el_10=isset($tempElement->el_10)?($tempElement->el_10):'';
$el_11=isset($tempElement->el_11)?($tempElement->el_11):'';
$el_12=isset($tempElement->el_12)?($tempElement->el_12):'';
$el_13=isset($tempElement->el_13)?($tempElement->el_13):'';
$el_14=isset($tempElement->el_14)?($tempElement->el_14):'';
//if($el_1!=''){$logo='<img style="padding:5px;" width="180px" height="auto" id="editpreview_img" src="'.base_url().'theme/images/sertifikat/'.$el_1.'">';}else{$logo='<img style="padding:5px;" width="80px" height="80px" id="editpreview_img" src="'.base_url().'theme/images/sertifikat/not_logo.png">';}
?> 
<h5><?php echo $name_temp ?></h5> 
<div class="row">
	<div class="col-md-8">
		<div id="preview"></div>
	</div>
	<div class="col-md-4">
		<input name="id" type="hidden" value="<?php echo $id_element ?>">
		<input name="name_element_b" type="hidden" value="<?php echo $name_element ?>">
		<input name="logoimg_b" type="hidden" value="<?php echo $el_1 ?>">		
		<div class="card-body">
				<div class="form-group row">
					<label class="black control-label">Nama Element</label>
					<input type="text" class="form-control" name="f[name_element]" value="<?php echo $name_element ?>" placeholder="" required>
				</div>
				<!--div class="form-group row">
					<label class="black control-label">Logo</label>
					<input type="file" class="form-control" name="logoimg" id="editlogoimg" onchange="editpreviewFile(this)">
					<small><p class="text-muted">* File Extention .png</p></small><hr>
					<!--?php echo $logo?>
				</div-->
				<div class="form-group row">
					<label class="black control-label">Element 1</label>
					<input type="text" class="form-control" name="f[el_1]" value="<?php echo $el_1 ?>" placeholder="" >
				</div>
				<div class="form-group row">
					<label class="black control-label">Element 2</label>
					<input type="text" class="form-control" name="f[el_2]" value="<?php echo $el_2 ?>" placeholder="" >
				</div>
				<div class="form-group row">
					<label class="black control-label">Element 3</label>
					<input type="text" class="form-control" name="f[el_3]" value="<?php echo $el_3 ?>" placeholder="" >
				</div>
				

		</div>

	</div>
</div>

<div class="row">
	<div class="col-md-4">
		<div class="card-body">

		<div class="form-group row">
			<label class="black control-label">Element 4</label>
			<input type="text" class="form-control" name="f[el_4]" value="<?php echo $el_4 ?>" placeholder="" >
		</div>
		<div class="form-group row">
			<label class="black control-label">Element 5</label>
			<input type="text" class="form-control" name="f[el_5]" value="<?php echo $el_5 ?>" placeholder="" >
		</div>
		<div class="form-group row">
			<label class="black control-label">Element 6</label>
			<input type="text" class="form-control" name="f[el_6]" value="<?php echo $el_6 ?>" placeholder="" >
		</div>
		<div class="form-group row">
			<label class="black control-label">Element 7</label>
			<input type="text" class="form-control" name="f[el_7]" value="<?php echo $el_7 ?>" placeholder="" >
		</div>
		<div class="form-group row">
			<label class="black control-label">Element 8</label>
			<input type="text" class="form-control" name="f[el_8]" value="<?php echo $el_8 ?>" placeholder="" >
		</div>
		<div class="form-group row">
			<label class="black control-label">Element 9</label>
			<input type="text" class="form-control" name="f[el_9]" value="<?php echo $el_9 ?>" placeholder="" >
		</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card-body">
		<div class="form-group row">
			<label class="black control-label">Element 10</label>
			<textarea class="form-control" rows="3" name="f[el_10]" placeholder=""><?php echo $el_10 ?></textarea>
		</div>
		<div class="form-group row">
			<label class="black control-label">Element 11</label>
			<input type="text" class="form-control" name="f[el_11]" value="<?php echo $el_11 ?>" placeholder="" >
		</div>
		<div class="form-group row">
			<label class="black control-label">Element 12</label>
			<input type="text" class="form-control" name="f[el_12]" value="<?php echo $el_12 ?>" placeholder="" >
		</div>
		<div class="form-group row">
			<label class="black control-label">Element 13</label>
			<input type="text" class="form-control" name="f[el_13]" value="<?php echo $el_13 ?>" placeholder="" >
		</div>
		<div class="form-group row">
			<label class="black control-label">Element 14</label>
			<input type="text" class="form-control" name="f[el_14]" value="<?php echo $el_14 ?>" placeholder="" >
		</div>
		</div>
	</div>
</div>

<script>
  $(function () {
	 preview(<?php echo $id ?>);
  });

function preview(id)
{	
	$.post("<?php echo site_url("data_template/preview_Sertifikat"); ?>",{id:id},function(data){
		$("#preview").html('<iframe src="<?php echo base_url();?>data_template/preview_Sertifikat?id='+id+'" style="width:100%;height:500px">'+data+'</iframe>');
	});
}

function editpreviewFile(el) { 
	var extension = $('#editlogoimg').val().split('.').pop().toLowerCase();
	if(extension != ''){
		if(jQuery.inArray(extension, ['png']) == -1)
		{
			alert("Image File must be .png");
			$('#editlogoimg').val('');
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



    
