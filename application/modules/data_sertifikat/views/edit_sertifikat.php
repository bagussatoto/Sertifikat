
<?php 
$id=isset($data->id)?($data->id):'';
$nis=isset($data->nis)?($data->nis):'';
$nama=isset($data->nama)?($data->nama):'';
$tempat_lahir=isset($data->tempat_lahir)?($data->tempat_lahir):'';
$tanggal_lahir=$this->tanggal->ind($data->tanggal_lahir,0);
$kd_kelas=isset($data->kelas)?($data->kelas):'';
$kd_program_keahlian=isset($data->program_keahlian)?($data->program_keahlian):'';
$kd_kompetensi_keahlian=isset($data->kompetensi_keahlian)?($data->kompetensi_keahlian):'';
$sekolah_asal=isset($data->sekolah_asal)?($data->sekolah_asal):'';
$nama_dudi=isset($data->nama_dudi)?($data->nama_dudi):'';
$alamat_dudi=isset($data->alamat_dudi)?($data->alamat_dudi):'';
$tanggal_mulai=$this->tanggal->ind($data->tanggal_mulai,0);
$tanggal_selesai=$this->tanggal->ind($data->tanggal_selesai,0);
$lama_pkl=isset($data->lama_pkl)?($data->lama_pkl):'';
$jml_nilaiteknis=isset($data->jml_nilaiteknis)?($data->jml_nilaiteknis):'';
$jml_katteknis=isset($data->jml_katteknis)?($data->jml_katteknis):'';
$rt_nilaiteknis=isset($data->rt_nilaiteknis)?($data->rt_nilaiteknis):'';
$rt_katteknis=isset($data->rt_katteknis)?($data->rt_katteknis):'';
$jml_nilainonteknis=isset($data->jml_nilainonteknis)?($data->jml_nilainonteknis):'';
$jml_katnonteknis=isset($data->jml_katnonteknis)?($data->jml_katnonteknis):'';
$rt_nilainonteknis=isset($data->rt_nilainonteknis)?($data->rt_nilainonteknis):'';
$rt_katnonteknis=isset($data->rt_katnonteknis)?($data->rt_katnonteknis):'';

$kelasDB=$this->db->where("kode",$kd_kelas);
$kelasDB=$this->db->get("tm_kelas")->row();
$kelas=isset($kelasDB->kelas)?($kelasDB->kelas):'';

$program_keahlianDB=$this->db->where("kode",$kd_program_keahlian);
$program_keahlianDB=$this->db->get("tm_program_keahlian")->row();
$program_keahlian=isset($program_keahlianDB->program_keahlian)?($program_keahlianDB->program_keahlian):'';

$kompetensi_keahlianDB=$this->db->where("kode",$kd_kompetensi_keahlian);
$kompetensi_keahlianDB=$this->db->get("tm_kompetensi_keahlian")->row();
$kompetensi_keahlian=isset($kompetensi_keahlianDB->kompetensi_keahlian)?($kompetensi_keahlianDB->kompetensi_keahlian):'';					
?>
			<!--input name="id" type="hidden" value="<!?php echo $id ?>"-->
			<!--input name="nis_b" type="hidden" value="<!?php echo $nis ?>"-->
			<input name="kompetensi_keahlian_b" type="hidden" value="<?php echo $kd_kompetensi_keahlian ?>">
			
			<div class="alert alert-info alert-dismissible">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			  <h5><i class="icon fas fa-info"></i> Info !</h5>
			  Jika Edit Kompetensi Keahlian maka data nilai Teknik dengan ID Sistem ini otomatis terhapus.
			</div>
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">ID SISTEM</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="id" value="<?php echo $id ?>" readonly required>
				</div>
			</div>
				
			<div class="form-group row">
				<label class="black col-md-3 control-label">NIS</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="f[nis]" value="<?php echo $nis ?>" placeholder="" required>
				</div>
			</div>
		
			<div class="form-group row">
				<label class="black col-md-3 control-label">Nama</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="f[nama]" value="<?php echo $nama ?>" placeholder="" required>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Tempat Lahir</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="f[tempat_lahir]" value="<?php echo $tempat_lahir ?>" placeholder="">
				</div>
			</div>
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Tanggal Lahir</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="tanggal_lahir" placeholder="dd/mm/yyyy" value="<?php echo $tanggal_lahir ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Kelas</label>
				<div class="col-md-9">
						<?php
						$dataray="";
						$dataray['']="=== Choose ===";
						$db=$this->db->order_by("kode","asc");
						$db=$this->db->get("tm_kelas")->result();
						foreach($db as $db)
						{
							$dataray[$db->kode]=$db->kelas;
						}
						echo form_dropdown("f[kelas]",$dataray,$kd_kelas,'class="form-control select2 kelas"  required');
						?>	
				</div>
			</div>
			<div class="form-group row">
				<label class="black col-md-3 control-label">Program Keahlian</label>
				<div class="col-md-9">
						<?php
							$dataray="";
							$dataray['']="=== Choose ===";
							$db=$this->db->order_by("kode","asc");
							$db=$this->db->get("tm_program_keahlian")->result();
							foreach($db as $db)
							{
								$dataray[$db->kode]=$db->program_keahlian;
							}
							echo form_dropdown("f[program_keahlian]",$dataray,$kd_program_keahlian,'class="form-control select2 program_keahlian_e" onchange="get_pk(`edit`)"  required');
						?>	
				</div>
			</div>
			<div class="form-group row">
				<label class="black col-md-3 control-label">Kompetensi Keahlian</label>
				<div class="col-md-9">
					<?php
						$dataray="";
						$dataray['']="=== Choose ===";
						$db=$this->db->where("kode",$kd_kompetensi_keahlian);
						$db=$this->db->get("tm_kompetensi_keahlian")->row();
							$dataray[$db->kode]=$db->kompetensi_keahlian;
						echo form_dropdown("f[kompetensi_keahlian]",$dataray,$kd_kompetensi_keahlian,'class="form-control select2 kompetensi_keahlian_e" required');
					?>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Sekolah Asal</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="f[sekolah_asal]" value="<?php echo $sekolah_asal?>" placeholder="">
				</div>
			</div>
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Nama DUDI</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="f[nama_dudi]" value="<?php echo $nama_dudi?>" placeholder="">
				</div>
			</div>
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Alamat DUDI</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="f[alamat_dudi]" value="<?php echo $alamat_dudi?>" placeholder="">
				</div>
			</div>
			
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Tanggal Mulai</label>
				<div class="col-md-9">
					<input type="text" class="form-control tanggal_mulai" name="tanggal_mulai" placeholder="dd/mm/yyyy" value="<?php echo $tanggal_mulai?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask required>
				</div>
			</div>
			<div class="form-group row">
				<label class="black col-md-3 control-label">Tanggal Selesai</label>
				<div class="col-md-9">
					<input type="text" class="form-control tanggal_selesai" name="tanggal_selesai" placeholder="dd/mm/yyyy" value="<?php echo $tanggal_selesai?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask required>
				</div>
			</div>
			<div class="form-group row">
				<label class="black col-md-3 control-label">Lama PKL</label>
				<div class="col-md-9">
					<input type="text" class="form-control lama_pkl" name="f[lama_pkl]" value="<?php echo $lama_pkl?>" placeholder="">
				</div>
			</div>


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
	