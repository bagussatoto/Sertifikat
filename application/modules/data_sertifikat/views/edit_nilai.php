
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
$jml_nilaiteknik=isset($data->jml_nilaiteknik)?($data->jml_nilaiteknik):'';
$jml_katteknik=isset($data->jml_katteknik)?($data->jml_katteknik):'';
$rt_nilaiteknik=isset($data->rt_nilaiteknik)?($data->rt_nilaiteknik):'';
$rt_katteknik=isset($data->rt_katteknik)?($data->rt_katteknik):'';
$jml_nilainonteknik=isset($data->jml_nilainonteknik)?($data->jml_nilainonteknik):'';
$jml_katnonteknik=isset($data->jml_katnonteknik)?($data->jml_katnonteknik):'';
$rt_nilainonteknik=isset($data->rt_nilainonteknik)?($data->rt_nilainonteknik):'';
$rt_katnonteknik=isset($data->rt_katnonteknik)?($data->rt_katnonteknik):'';

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
<style type="text/css">

	.tborder{border-collapse: collapse; word-wrap:break-word; word-break: break-all;table-layout: fixed;width: 100%;font-size:13px;}
	.tborder td,.tborder  th{word-wrap:break-word;word-break: break-all;border: 0px solid #000;font-size:13px;padding-left:0px;padding-right:5px;padding-top:1px;padding-bottom:1px;}
	
.tborder_1{ margin-top:20px;margin-left:0px;border-collapse: collapse; word-wrap:break-word; word-break: break-all;width: 100%;font-size:15px;}
.tborder_1  th{background-color: #f4f4f4;word-wrap:break-word;word-break: break-all;border: 1px solid #000;font-size:16px;padding-left:5px;padding-right:3px;padding-top:2px;padding-bottom:2px;}
.tborder_1  td{word-wrap:break-word;word-break: break-all;border: 1px solid #000;font-size:15px;padding-left:8px;padding-right:8px;padding-top:2px;padding-bottom:2px;}

.tborder_2{ margin-top:20px;margin-left:0px;border-collapse: collapse; word-wrap:break-word; word-break: break-all;width: 100%;font-size:15px;}
.tborder_2  th{background-color: #f4f4f4;word-wrap:break-word;word-break: break-all;border: 1px solid #000;font-size:16px;padding-left:5px;padding-right:3px;padding-top:2px;padding-bottom:2px;}
.tborder_2  td{word-wrap:break-word;word-break: break-all;border: 1px solid #000;font-size:15px;padding-left:8px;padding-right:8px;padding-top:2px;padding-bottom:2px;}
	
</style>
			<input name="id" type="hidden" value="<?php echo $id ?>">
			<input name="nis" type="hidden" value="<?php echo $nis ?>">
			<input name="kd_kompetensi_keahlian" type="hidden" value="<?php echo $kd_kompetensi_keahlian ?>">
			<div class="row">
			<div class="col-md-5">
			<table class="tborder">
			  <tbody>
				<tr>
				  <td style="width:130px;">ID SISTEM</td>
				  <td style="width:10px;">:</td>
				  <td><?php echo $id ?></td>
				</tr>
				<tr>
				  <td style="width:130px;">NIS</td>
				  <td style="width:10px;">:</td>
				  <td><b><?php echo $nis ?></b></td>
				</tr>
				<tr>
				  <td>Nama</td>
				  <td>:</td>
				  <td><b><?php echo $nama ?></b></td>
				</tr>
				<tr>
				  <td>TTL</td>
				  <td>:</td>
				  <td><?php echo $tempat_lahir ?>, <?php echo $tanggal_lahir ?></td>
				</tr>
				<tr>
				  <td>Kelas</td>
				  <td>:</td>
				  <td><?php echo $kelas ?></td>
				</tr>
				<tr>
				  <td>Program Keahlian</td>
				  <td>:</td>
				  <td><?php echo $program_keahlian ?></td>
				</tr>
				<tr>
				  <td>Kompetensi Keahlian</td>
				  <td>:</td>
				  <td><?php echo $kompetensi_keahlian ?></td>
				</tr>
				<tr>
				  <td>Sekolah Asal</td>
				  <td>:</td>
				  <td><?php echo $sekolah_asal ?></td>
				</tr>
				
			  </tbody>
			</table>
			</div>
			<div class="col-md-5">
			<table class="tborder">
			  <tbody>
				<tr>
				  <td style="width:130px;">Nama DUDI</td>
				  <td style="width:10px;">:</td>
				  <td><?php echo $nama_dudi ?></td>
				</tr>
				<tr>
				  <td>Alamat DUDI</td>
				  <td>:</td>
				  <td><?php echo $alamat_dudi ?></td>
				</tr>
				<tr>
				  <td>Tanggal Mulai</td>
				  <td>:</td>
				  <td><?php echo $tanggal_mulai ?></td>
				</tr>
				<tr>
				  <td>Tanggal Selesai</td>
				  <td>:</td>
				  <td><?php echo $tanggal_selesai ?></td>
				</tr>
				<tr>
				  <td>Lama PKL</td>
				  <td>:</td>
				  <td><?php echo $lama_pkl ?></td>
				</tr>
			  </tbody>
			</table>
			</div>
			</div>
			
			<div class="row">
			<div class="col-md-7">
			<table class="tborder_1" cellpadding="0">
				<tr valign="middle">
					<td colspan="4" style="text-align:left;border-left: 0px solid #000;border-top: 0px solid #000;border-right: 0px solid #000;font-weight:bold;">ASPEK TEKNIK</td>
				</tr>
				<tr valign="middle">
					<th rowspan="2" style="text-align:center;">No.</th>
					<th rowspan="2" style="text-align:center;">ASPEK TEKNIK</th>
					<th colspan="2" style="text-align:center;">KETERANGAN</th>
				</tr>
				<tr valign="middle">
					<th style="text-align:center;">ANGKA</th>
					<th style="text-align:center;">KATEGORI</th>
				</tr>
				<?php 
				$aspekDB=$this->db->where("kode_kk",$kd_kompetensi_keahlian);
				$aspekDB=$this->db->order_by("kode","asc");
				$aspekDB=$this->db->get("tm_aspek")->result();
				$no=1;
				foreach($aspekDB as $aspek){
					$kodeaspek=isset($aspek->kode)?($aspek->kode):'';
					$teknikDB=$this->db->where("ids",$id);
					$teknikDB=$this->db->where("kode_aspek",$kodeaspek);
					$teknikDB=$this->db->get("data_nilaiteknik")->row();
				?>
				<tr>
					<td style="text-align:center;width:30px;"><?php echo $no++ ?></td>
					<td style="text-align:left;width:240px;"><?php echo isset($aspek->aspek)?($aspek->aspek):'';?></td>
					<td style="text-align:center;width:80px;"><input type="text" class="form-control form-control-sm text-right nilai_aspek_<?php echo $kodeaspek?>" name="nilai_aspek_<?php echo $kodeaspek?>" value="<?php echo isset($teknikDB->angka)?($teknikDB->angka):'';?>"></td>
					<td style="text-align:center;width:80px;"><input type="text" class="form-control form-control-sm text-center kat_aspek_<?php echo $kodeaspek?>" name="kat_aspek_<?php echo $kodeaspek?>" value="<?php echo isset($teknikDB->kategori)?($teknikDB->kategori):'';?>"></td>
				</tr>
				<?php }?>
				<?php 
				$serDB=$this->db->where("id",$id);
				$serDB=$this->db->get("data_sertifikat")->row();
				$jml_nilaiteknik=isset($serDB->jml_nilaiteknik)?($serDB->jml_nilaiteknik):'';
				$rt_nilaiteknik=isset($serDB->rt_nilaiteknik)?($serDB->rt_nilaiteknik):'';
				$rt_katteknik=isset($serDB->rt_katteknik)?($serDB->rt_katteknik):'';
				$jml_nilainonteknik=isset($serDB->jml_nilainonteknik)?($serDB->jml_nilainonteknik):'';
				$rt_nilainonteknik=isset($serDB->rt_nilainonteknik)?($serDB->rt_nilainonteknik):'';
				$rt_katnonteknik=isset($serDB->rt_katnonteknik)?($serDB->rt_katnonteknik):'';
				?>
				<tr>
					<td colspan="2" style="text-align:right;">JUMLAH NILAI</td>
					<td style="text-align:center;"><input type="text" class="form-control form-control-sm text-right jml_nilaiteknik" name="jml_nilaiteknik"  value="<?php echo $jml_nilaiteknik?>"></td>
					<td style="text-align:center;"></td>
				</tr>
				<tr>
					<td colspan="2" style="text-align:right;">RATA-RATA</td>
					<td style="text-align:center;"><input type="text" class="form-control form-control-sm text-right rt_nilaiteknik" name="rt_nilaiteknik" value="<?php echo $rt_nilaiteknik?>"></td>
					<td style="text-align:center;"><input type="text" class="form-control form-control-sm text-center rt_katteknik" name="rt_katteknik" value="<?php echo $rt_katteknik?>"></td>
				</tr>
			</table>
			</div>
			<div class="col-md-5">
			<table class="tborder_2" cellpadding="0">
				<tr valign="middle">
					<td colspan="4" style="text-align:left;border-left: 0px solid #000;border-top: 0px solid #000;border-right: 0px solid #000;font-weight:bold;">ASPEK NON-TEKNIK</td>
				</tr>
				<tr valign="middle">
					<th style="text-align:center;">No.</th>
					<th style="text-align:center;">ASPEK NON-TEKNIK</th>
					<th style="text-align:center;">NILAI</th>
					<th style="text-align:center;">KATEGORI</th>
				</tr>
				<?php
				$nonteknikDB=$this->db->where("ids",$id);
				$nonteknikDB=$this->db->get("data_nilainonteknik")->row();				
				?>
				<tr>
					<td style="text-align:center;width:40px;">1</td>
					<td style="text-align:left;width:200px;">Disiplin</td>
					<td style="text-align:center;width:80px;"><input type="text" class="form-control form-control-sm text-right nilai_disiplin" name="nilai_disiplin" value="<?php echo isset($nonteknikDB->nilai_disiplin)?($nonteknikDB->nilai_disiplin):'';?>"></td>
					<td style="text-align:center;width:80px;"><input type="text" class="form-control form-control-sm text-center kat_disiplin" name="kat_disiplin" value="<?php echo isset($nonteknikDB->kat_disiplin)?($nonteknikDB->kat_disiplin):'';?>"></td>
				</tr>
				<tr>
					<td style="text-align:center;">2</td>
					<td style="text-align:left;">Kerjasama</td>
					<td style="text-align:center;"><input type="text" class="form-control form-control-sm text-right nilai_kerjasama" name="nilai_kerjasama" value="<?php echo isset($nonteknikDB->nilai_kerjasama)?($nonteknikDB->nilai_kerjasama):'';?>"></td>
					<td style="text-align:center;"><input type="text" class="form-control form-control-sm text-center kat_kerjasama" name="kat_kerjasama" value="<?php echo isset($nonteknikDB->kat_kerjasama)?($nonteknikDB->kat_kerjasama):'';?>"></td>
				</tr>
				<tr>
					<td style="text-align:center;">3</td>
					<td style="text-align:left;">Inisiatif</td>
					<td style="text-align:center;"><input type="text" class="form-control form-control-sm text-right nilai_inisiatif" name="nilai_inisiatif" value="<?php echo isset($nonteknikDB->nilai_inisiatif)?($nonteknikDB->nilai_inisiatif):'';?>"></td>
					<td style="text-align:center;"><input type="text" class="form-control form-control-sm text-center kat_inisiatif" name="kat_inisiatif" value="<?php echo isset($nonteknikDB->kat_inisiatif)?($nonteknikDB->kat_inisiatif):'';?>"></td>
				</tr>
				<tr>
					<td style="text-align:center;">4</td>
					<td style="text-align:left;">Kerajinan</td>
					<td style="text-align:center;"><input type="text" class="form-control form-control-sm text-right nilai_kerajinan" name="nilai_kerajinan" value="<?php echo isset($nonteknikDB->nilai_kerajinan)?($nonteknikDB->nilai_kerajinan):'';?>"></td>
					<td style="text-align:center;"><input type="text" class="form-control form-control-sm text-center kat_kerajinan" name="kat_kerajinan" value="<?php echo isset($nonteknikDB->kat_kerajinan)?($nonteknikDB->kat_kerajinan):'';?>"></td>
				</tr>
				<tr>
					<td style="text-align:center;">5</td>
					<td style="text-align:left;">Tanggung Jawab</td>
					<td style="text-align:center;"><input type="text" class="form-control form-control-sm text-right nilai_tanggungjawab" name="nilai_tanggungjawab" value="<?php echo isset($nonteknikDB->nilai_tanggungjawab)?($nonteknikDB->nilai_tanggungjawab):'';?>"></td>
					<td style="text-align:center;"><input type="text" class="form-control form-control-sm text-center kat_tanggungjawab" name="kat_tanggungjawab" value="<?php echo isset($nonteknikDB->kat_tanggungjawab)?($nonteknikDB->kat_tanggungjawab):'';?>"></td>
				</tr>
				<tr>
					<td style="text-align:center;">6</td>
					<td style="text-align:left;">Sikap</td>
					<td style="text-align:center;"><input type="text" class="form-control form-control-sm text-right nilai_sikap" name="nilai_sikap" value="<?php echo isset($nonteknikDB->nilai_sikap)?($nonteknikDB->nilai_sikap):'';?>"></td>
					<td style="text-align:center;"><input type="text" class="form-control form-control-sm text-center kat_sikap" name="kat_sikap" value="<?php echo isset($nonteknikDB->kat_sikap)?($nonteknikDB->kat_sikap):'';?>"></td>
				</tr>
				<tr>
					<td colspan="2" style="text-align:right;">JUMLAH NILAI</td>
					<td style="text-align:center;"><input type="text" class="form-control form-control-sm text-right jml_nilainonteknik" name="jml_nilainonteknik" value="<?php echo $jml_nilainonteknik?>"></td>
					<td style="text-align:center;"></td>
				</tr>
				<tr>
					<td colspan="2" style="text-align:right;">RATA-RATA</td>
					<td style="text-align:center;"><input type="text" class="form-control form-control-sm text-right rt_nilainonteknik" name="rt_nilainonteknik" value="<?php echo $rt_nilainonteknik?>"></td>
					<td style="text-align:center;"><input type="text" class="form-control form-control-sm text-center rt_katnonteknik" name="rt_katnonteknik" value="<?php echo $rt_katnonteknik?>"></td>
				</tr>
			</table>
			</div>
			</div>
			
<?php $cn=$this->db->get_where("tm_aspek",array("kode_kk"=>$kd_kompetensi_keahlian))->num_rows(); ?>
<script>
<?php
foreach($aspekDB as $aspek){?>
$(".nilai_aspek_<?php echo isset($aspek->kode)?($aspek->kode):'';?>").on("change keyup paste keypress", function(data){
		var qt = $(this).val();
		var ht = rumus(qt);
		$('.kat_aspek_<?php echo isset($aspek->kode)?($aspek->kode):'';?>').val(ht);
		jml_nilaiteknik();
		rt_nilaiteknik(<?php echo $cn?>);
});
<?php }?>
</script>				
<script>
$(".nilai_disiplin").on("change keyup paste keypress", function(data){
		var qt = $(this).val();
		var ht = rumus(qt);
		$('.kat_disiplin').val(ht);
		jml_nilainonteknik();
		rt_nilainonteknik();
});
$(".nilai_kerjasama").on("change keyup paste keypress", function(data){
		var qt = $(this).val();
		var ht = rumus(qt);
		$('.kat_kerjasama').val(ht);
		jml_nilainonteknik();
		rt_nilainonteknik();
});  
$(".nilai_inisiatif").on("change keyup paste keypress", function(data){
		var qt = $(this).val();
		var ht = rumus(qt);
		$('.kat_inisiatif').val(ht);
		jml_nilainonteknik();
		rt_nilainonteknik();
});  
$(".nilai_kerajinan").on("change keyup paste keypress", function(data){
		var qt = $(this).val();
		var ht = rumus(qt);
		$('.kat_kerajinan').val(ht);
		jml_nilainonteknik();
		rt_nilainonteknik();
}); 
$(".nilai_tanggungjawab").on("change keyup paste keypress", function(data){
		var qt = $(this).val();
		var ht = rumus(qt);
		$('.kat_tanggungjawab').val(ht);
		jml_nilainonteknik();
		rt_nilainonteknik();
});  
$(".nilai_sikap").on("change keyup paste keypress", function(data){
		var qt = $(this).val();
		var ht = rumus(qt);
		$('.kat_sikap').val(ht);
		jml_nilainonteknik();
		rt_nilainonteknik();
});  

 function rumus($qt){
	 var kat = '';
	 if($qt>=91 && $qt<=100){
		return kat='A'; 
	 }else if($qt>=81 && $qt<=90){
		 return kat='B'; 
	 }else if($qt>=75 && $qt<=80){
		 return kat='C'; 
	 }else if($qt>=1 && $qt<=74){
		 return kat='D'; 
	 }else if($qt==0){
		 return kat=''; 
	 }
 }
 //teknik
 function jml_nilaiteknik(){
	 <?php foreach($aspekDB as $aspek){?>
	 var a_<?php echo $aspek->kode?> = $('.nilai_aspek_<?php echo isset($aspek->kode)?($aspek->kode):'';?>').val();
	 if(a_<?php echo $aspek->kode?>==''){a_<?php echo $aspek->kode?>=0;}
	 <?php }?>
	 var ht = parseInt(a_1)<?php foreach($aspekDB as $aspek){if($aspek->kode>1){?>
			+parseInt(a_<?php echo $aspek->kode ?>)
	 <?php } }?>;
	 $('.jml_nilaiteknik').val(ht);
	 rt_nilaiteknik();
 }
  function rt_nilaiteknik(cn){
	 var j = $('.jml_nilaiteknik').val();
	 var ht = (parseInt(j)/cn);
	 var fx = ht.toFixed(2);
	 $('.rt_nilaiteknik').val(fx);
	 var r = Math.round(fx);
	 var rtkt = rumus(r);
	 $('.rt_katteknik').val(rtkt);
 }
 //nonteknik
 function jml_nilainonteknik(){
	 var a = $('.nilai_disiplin').val();
	 var b = $('.nilai_kerjasama').val();
	 var c = $('.nilai_inisiatif').val();
	 var d = $('.nilai_kerajinan').val();
	 var e = $('.nilai_tanggungjawab').val();
	 var f = $('.nilai_sikap').val();
	 if(a==''){a=0;}
	 if(b==''){b=0;}
	 if(c==''){c=0;}
	 if(d==''){d=0;}
	 if(e==''){e=0;}
	 if(f==''){f=0;}
	 var ht = parseInt(a)+parseInt(b)+parseInt(c)+parseInt(d)+parseInt(e)+parseInt(f);
	 $('.jml_nilainonteknik').val(ht);
	 rt_nilainonteknik();
 }
  function rt_nilainonteknik(){
	 var j = $('.jml_nilainonteknik').val();
	 var ht = (parseInt(j)/6);
	 var fx = ht.toFixed(2);
	 $('.rt_nilainonteknik').val(fx);
	 var r = Math.round(fx);
	 var rtkt = rumus(r);
	 
	 $('.rt_katnonteknik').val(rtkt);
 }
</script>
<script>
	
	
  $(function (){
	 $('.select2').select2({
      theme: 'bootstrap4'
    });
	$('[data-mask]').inputmask();
  })
</script>
	