<?php 
$id=isset($data->id)?($data->id):'';
$nis=isset($data->nis)?($data->nis):'';
$nama=isset($data->nama)?($data->nama):'';
$tempat_lahir=isset($data->tempat_lahir)?($data->tempat_lahir):'';
$tanggal_lahir=$this->tanggal->tglbulanThn($data->tanggal_lahir);
$kd_kelas=isset($data->kelas)?($data->kelas):'';
$kd_program_keahlian=isset($data->program_keahlian)?($data->program_keahlian):'';
$kd_kompetensi_keahlian=isset($data->kompetensi_keahlian)?($data->kompetensi_keahlian):'';
$sekolah_asal=isset($data->sekolah_asal)?($data->sekolah_asal):'';
$nama_dudi=isset($data->nama_dudi)?($data->nama_dudi):'';
$alamat_dudi=isset($data->alamat_dudi)?($data->alamat_dudi):'';
$tanggal_mulai=$this->tanggal->tglbulanThn($data->tanggal_mulai);
$tanggal_selesai=$this->tanggal->tglbulanThn($data->tanggal_selesai);
$lama_pkl=isset($data->lama_pkl)?($data->lama_pkl):'';
$kelasDB=$this->db->where("kode",$kd_kelas);
$kelasDB=$this->db->get("tm_kelas")->row();
$kelas=isset($kelasDB->kelas)?($kelasDB->kelas):'';

$program_keahlianDB=$this->db->where("kode",$kd_program_keahlian);
$program_keahlianDB=$this->db->get("tm_program_keahlian")->row();
$program_keahlian=isset($program_keahlianDB->program_keahlian)?($program_keahlianDB->program_keahlian):'';

$kompetensi_keahlianDB=$this->db->where("kode",$kd_kompetensi_keahlian);
$kompetensi_keahlianDB=$this->db->get("tm_kompetensi_keahlian")->row();
$kompetensi_keahlian=isset($kompetensi_keahlianDB->kompetensi_keahlian)?($kompetensi_keahlianDB->kompetensi_keahlian):'';

$jml_nilaiteknik=isset($data->jml_nilaiteknik)?($data->jml_nilaiteknik):'';		
$rt_nilaiteknik=isset($data->rt_nilaiteknik)?($data->rt_nilaiteknik):'';		
$rt_katteknik=isset($data->rt_katteknik)?($data->rt_katteknik):'';		
$jml_nilainonteknik=isset($data->jml_nilainonteknik)?($data->jml_nilainonteknik):'';
$rt_nilainonteknik=isset($data->rt_nilainonteknik)?($data->rt_nilainonteknik):'';
$rt_katnonteknik=isset($data->rt_katnonteknik)?($data->rt_katnonteknik):'';	

if($rt_katteknik=="D"){$hasil="KURANG";}elseif($rt_katteknik=="C"){$hasil="CUKUP";}elseif($rt_katteknik=="B"){$hasil="BAIK";}elseif($rt_katteknik=="A"){$hasil="AMAT BAIK";}else{$hasil="";}	
?>
 
<?php
$DBtemp=$this->db->where('default_temp','yes');
$DBtemp=$this->db->get('temp_sertifikat');
$temp=$DBtemp->row();
?>

<?php 
$DBtempElement=$this->db->where('id_element',$temp->id_element);
$DBtempElement=$this->db->get('temp_element');
$tempElement=$DBtempElement->row();

//if($tempElement->el_1!=''){$logo='<img class="logo_img" src="'.base_url().'theme/images/sertifikat/'.$tempElement->el_1.'">';}else{$logo='';}
?> 

<?php
//nonteknik
$nonteknikDB=$this->db->where("ids",$id);
$nonteknikDB=$this->db->get("data_nilainonteknik")->row();
$nilai_disiplin=isset($nonteknikDB->nilai_disiplin)?($nonteknikDB->nilai_disiplin):'';
$kat_disiplin=isset($nonteknikDB->kat_disiplin)?($nonteknikDB->kat_disiplin):'';
$nilai_kerjasama=isset($nonteknikDB->nilai_kerjasama)?($nonteknikDB->nilai_kerjasama):'';
$kat_kerjasama=isset($nonteknikDB->kat_kerjasama)?($nonteknikDB->kat_kerjasama):'';
$nilai_inisiatif=isset($nonteknikDB->nilai_inisiatif)?($nonteknikDB->nilai_inisiatif):'';
$kat_inisiatif=isset($nonteknikDB->kat_inisiatif)?($nonteknikDB->kat_inisiatif):'';
$nilai_kerajinan=isset($nonteknikDB->nilai_kerajinan)?($nonteknikDB->nilai_kerajinan):'';
$kat_kerajinan=isset($nonteknikDB->kat_kerajinan)?($nonteknikDB->kat_kerajinan):'';
$nilai_tanggungjawab=isset($nonteknikDB->nilai_tanggungjawab)?($nonteknikDB->nilai_tanggungjawab):'';
$kat_tanggungjawab=isset($nonteknikDB->kat_tanggungjawab)?($nonteknikDB->kat_tanggungjawab):'';
$nilai_sikap=isset($nonteknikDB->nilai_sikap)?($nonteknikDB->nilai_sikap):'';
$kat_sikap=isset($nonteknikDB->kat_sikap)?($nonteknikDB->kat_sikap):'';		
?>
				
<style>
.page_img_index{
        background-image: url(<?php echo base_url()?>theme/images/sertifikat/<?php echo $temp->img_temp ?>); 
     }
.page_img_back{
        background-image: url(<?php echo base_url()?>theme/images/sertifikat/<?php echo $temp->img_back ?>); 
     }

<?php echo $tempElement->element; ?>
</style>
<page> 
    <page_header>           
    </page_header> 
	<div id="divid" class="page_img_index">
		<div class="logo"></div>
		<p class="nama_dudi"><?php echo $nama_dudi ?></p>
		<p class="alamat_dudi"><?php echo $alamat_dudi ?></p>
		<p class="s1"><?php echo strtoupper($tempElement->el_1) ?></p>
		<p class="s2"><?php echo $tempElement->el_2 ?></p>
		<p class="s3"><?php echo $tempElement->el_3 ?></p>
        <p class="nama"><?php echo $nama ?></p>
		<table id="tabel1" cellpadding="0">
		<tr>
			<td style="width:190px;text-align:left;font-size:16px;padding-bottom:3px;"><?php echo $tempElement->el_4 ?></td>
			<td style="width:3px">:</td>
			<td style="width:530px;text-align:left;font-size:16px;padding-bottom:3px;"><?php echo $tempat_lahir ?>, <?php echo $tanggal_lahir ?></td>
		</tr>
		<tr>
			<td style="width:190px;text-align:left;font-size:16px;padding-bottom:3px;"><?php echo $tempElement->el_5 ?></td>
			<td style="width:3px">:</td>
			<td style="width:530px;text-align:left;font-size:16px;padding-bottom:3px;"><?php echo $nis ?></td>
		</tr>
		<tr>
			<td style="width:190px;text-align:left;font-size:16px;padding-bottom:3px;"><?php echo $tempElement->el_6 ?></td>
			<td style="width:3px">:</td>
			<td style="width:530px;text-align:left;font-size:16px;padding-bottom:3px;"><?php echo $kelas ?></td>
		</tr>
		<tr>
			<td style="width:190px;text-align:left;font-size:16px;padding-bottom:3px;"><?php echo $tempElement->el_7 ?></td>
			<td style="width:3px">:</td>
			<td style="width:530px;text-align:left;font-size:16px;padding-bottom:3px;"><?php echo $program_keahlian ?></td>
		</tr>
		<tr>
			<td style="width:190px;text-align:left;font-size:16px;padding-bottom:3px;"><?php echo $tempElement->el_8 ?></td>
			<td style="width:3px">:</td>
			<td style="width:530px;text-align:left;font-size:16px;padding-bottom:3px;"><?php echo $kompetensi_keahlian ?></td>
		</tr>
		<tr>
			<td style="width:190px;text-align:left;font-size:16px;padding-bottom:3px;"><?php echo $tempElement->el_9 ?></td>
			<td style="width:3px">:</td>
			<td style="width:530px;text-align:left;font-size:16px;padding-bottom:3px;"><?php echo $sekolah_asal ?></td>
		</tr>
		</table>
		<div id="tema"><p class="namatema"><?php echo$tempElement->el_10 ?> selama <?php echo $lama_pkl?> bulan terhitung pada Tanggal <?php echo $tanggal_mulai ?><br>sampai dengan Tanggal <?php echo $tanggal_selesai ?> dengan hasil <b><u><?php echo  strtoupper($hasil) ?></u></b></p></div>
		<div class="foto"><br><br><br><br>3x4</div>
		<p class="s11"><?php echo $tempElement->el_11 ?></p>
		<p class="s12"><?php echo $tempElement->el_12 ?></p>
		<p class="s13"><?php echo $tempElement->el_13 ?></p>
    </div>
	<div class="page-break"></div>
	<div id="divid" class="page_img_back">
		<p class="s14">DAFTAR NILAI PRAKTIK KERJA LAPANGAN</p>
		<table id="tabel2" cellpadding="0">
		<tr>
			<td style="width:190px;text-align:left;font-size:16px;padding-bottom:3px;"><?php echo $tempElement->el_14 ?></td>
			<td style="width:3px">:</td>
			<td style="width:530px;text-align:left;font-size:16px;padding-bottom:3px;"><?php echo $nama ?></td>
		</tr>
		<tr>
			<td style="width:190px;text-align:left;font-size:16px;padding-bottom:3px;"><?php echo $tempElement->el_5 ?></td>
			<td style="width:3px">:</td>
			<td style="width:530px;text-align:left;font-size:16px;padding-bottom:3px;"><?php echo $nis ?></td>
		</tr>
		<tr>
			<td style="width:190px;text-align:left;font-size:16px;padding-bottom:3px;"><?php echo $tempElement->el_7 ?></td>
			<td style="width:3px">:</td>
			<td style="width:530px;text-align:left;font-size:16px;padding-bottom:3px;"><?php echo $program_keahlian ?></td>
		</tr>
		<tr>
			<td style="width:190px;text-align:left;font-size:16px;padding-bottom:3px;"><?php echo $tempElement->el_8 ?></td>
			<td style="width:3px">:</td>
			<td style="width:530px;text-align:left;font-size:16px;padding-bottom:3px;"><?php echo $kompetensi_keahlian ?></td>
		</tr>
		</table>
		
		<table id="colom2" cellpadding="0">
		<tr valign="top">
			<td style="table-layout:fixed;border:0px solid black;">

				<table class="tborder_1" cellpadding="0">
				<tr valign="middle">
					<td colspan="4" style="table-layout:fixed;text-align:left;border-left: 0px solid #000;border-top: 0px solid #000;border-right: 0px solid #000;font-weight:bold;">ASPEK TEKNIK</td>
				</tr>
				<tr valign="middle">
					<th rowspan="2" style="table-layout:fixed;text-align:center;width:20px;">No.</th>
					<th rowspan="2" style="table-layout:fixed;text-align:center;width:250px;">ASPEK TEKNIK</th>
					<th colspan="2" style="table-layout:fixed;text-align:center;">KETERANGAN</th>
				</tr>
				<tr valign="middle">
					<th style="table-layout:fixed;text-align:center;width:60px;">ANGKA</th>
					<th style="table-layout:fixed;text-align:center;width:80px;">KATEGORI</th>
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
					<td style="table-layout:fixed;text-align:center;"><?php echo $no++ ?></td>
					<td style="table-layout:fixed;text-align:left;"><?php echo isset($aspek->aspek)?($aspek->aspek):'';?></td>
					<td style="table-layout:fixed;text-align:center;"><?php echo isset($teknikDB->angka)?($teknikDB->angka):'';?></td>
					<td style="table-layout:fixed;text-align:center;"><?php echo isset($teknikDB->kategori)?($teknikDB->kategori):'';?></td>
				</tr>
				<?php }?>
				<tr>
					<td colspan="2" style="table-layout:fixed;text-align:right;">JUMLAH NILAI</td>
					<td style="table-layout:fixed;text-align:center;"><?php echo $jml_nilaiteknik ?></td>
					<td style="table-layout:fixed;text-align:center;"></td>
				</tr>
				<tr>
					<td colspan="2" style="table-layout:fixed;text-align:right;">RATA-RATA</td>
					<td style="table-layout:fixed;text-align:center;"><?php echo $rt_nilaiteknik ?></td>
					<td style="table-layout:fixed;text-align:center;"><?php echo $rt_katteknik ?></td>
				</tr>
				</table>
				
			</td>
			<td style="table-layout:fixed;border:0px solid black;">
			
				<table class="tborder_2" cellpadding="0">
				<tr valign="middle">
					<td colspan="4" style="table-layout:fixed;text-align:left;border-left: 0px solid #000;border-top: 0px solid #000;border-right: 0px solid #000;font-weight:bold;">ASPEK NON-TEKNIK</td>
				</tr>
				<tr valign="middle">
					<th style="table-layout:fixed;text-align:center;width:20px;">No.</th>
					<th style="table-layout:fixed;text-align:center;width:165px;">ASPEK NON-TEKNIK</th>
					<th style="table-layout:fixed;text-align:center;width:60px;">NILAI</th>
					<th style="table-layout:fixed;text-align:center;width:80px;">KATEGORI</th>
				</tr>
				<tr>
					<td style="table-layout:fixed;text-align:center;">1</td>
					<td style="table-layout:fixed;text-align:left;">Disiplin</td>
					<td style="table-layout:fixed;text-align:center;"><?php echo $nilai_disiplin ?></td>
					<td style="table-layout:fixed;text-align:center;"><?php echo $kat_disiplin ?></td>
				</tr>
				<tr>
					<td style="table-layout:fixed;text-align:center;">2</td>
					<td style="table-layout:fixed;text-align:left;">Kerjasama</td>
					<td style="table-layout:fixed;text-align:center;"><?php echo $nilai_kerjasama ?></td>
					<td style="table-layout:fixed;text-align:center;"><?php echo $kat_kerjasama ?></td>
				</tr>
				<tr>
					<td style="table-layout:fixed;text-align:center;">3</td>
					<td style="table-layout:fixed;text-align:left;">Inisiatif</td>
					<td style="table-layout:fixed;text-align:center;"><?php echo $nilai_inisiatif ?></td>
					<td style="table-layout:fixed;text-align:center;"><?php echo $kat_inisiatif ?></td>
				</tr>
				<tr>
					<td style="table-layout:fixed;text-align:center;">4</td>
					<td style="table-layout:fixed;text-align:left;">Kerajinan</td>
					<td style="table-layout:fixed;text-align:center;"><?php echo $nilai_kerajinan ?></td>
					<td style="table-layout:fixed;text-align:center;"><?php echo $kat_kerajinan ?></td>
				</tr>
				<tr>
					<td style="table-layout:fixed;text-align:center;">5</td>
					<td style="table-layout:fixed;text-align:left;">Tanggung Jawab</td>
					<td style="table-layout:fixed;text-align:center;"><?php echo $nilai_tanggungjawab ?></td>
					<td style="table-layout:fixed;text-align:center;"><?php echo $kat_tanggungjawab ?></td>
				</tr>
				<tr>
					<td style="table-layout:fixed;text-align:center;">6</td>
					<td style="table-layout:fixed;text-align:left;">Sikap</td>
					<td style="table-layout:fixed;text-align:center;"><?php echo $nilai_sikap ?></td>
					<td style="table-layout:fixed;text-align:center;"><?php echo $kat_sikap ?></td>
				</tr>
				<tr>
					<td colspan="2" style="table-layout:fixed;text-align:right;">JUMLAH NILAI</td>
					<td style="table-layout:fixed;text-align:center;"><?php echo $jml_nilainonteknik ?></td>
					<td style="table-layout:fixed;text-align:center;"></td>
				</tr>
				<tr>
					<td colspan="2" style="table-layout:fixed;text-align:right;">RATA-RATA</td>
					<td style="table-layout:fixed;text-align:center;"><?php echo $rt_nilainonteknik ?></td>
					<td style="table-layout:fixed;text-align:center;"><?php echo $rt_katnonteknik ?></td>
				</tr>
				</table>
				
			</td>
		</tr>
		<tr valign="top">
			<td style="table-layout:fixed;border:0px solid black;">	
				
				<table class="tborder_3" cellpadding="0">
				<tr valign="middle">
					<td colspan="4" style="table-layout:fixed;text-align:left;border-left: 0px solid #000;border-top: 0px solid #000;border-right: 0px solid #000;font-weight:bold;"><i>Predikat Nilai</i></td>
				</tr>
				<tr valign="middle">
					<th style="table-layout:fixed;text-align:center;width:60px;">NILAI</th>
					<th style="table-layout:fixed;text-align:center;width:90px;">KATEGORI</th>
					<th style="table-layout:fixed;text-align:center;width:110px;">KETERANGAN</th>
				</tr>
				<tr>
					<td style="table-layout:fixed;text-align:center;">91-98</td>
					<td style="table-layout:fixed;text-align:center;">A</td>
					<td style="table-layout:fixed;text-align:center;">Amat Baik</td>
				</tr>
				<tr>
					<td style="table-layout:fixed;text-align:center;">81-90</td>
					<td style="table-layout:fixed;text-align:center;">B</td>
					<td style="table-layout:fixed;text-align:center;">Baik</td>
				</tr>
				<tr>
					<td style="table-layout:fixed;text-align:center;">75-80</td>
					<td style="table-layout:fixed;text-align:center;">C</td>
					<td style="table-layout:fixed;text-align:center;">Cukup</td>
				</tr>
				<tr>
					<td style="table-layout:fixed;text-align:center;"> &lt;75 </td>
					<td style="table-layout:fixed;text-align:center;">D</td>
					<td style="table-layout:fixed;text-align:center;">Kurang</td>
				</tr>
				</table>
			
			</td>
			<td style="table-layout:fixed;border:0px solid black;text-align:center;padding-top:100px;">	
				
				Pembimbing
			
			</td>
			
		</tr>
		</table>

    </div>
	
    <page_footer> 
    </page_footer> 
 </page>

