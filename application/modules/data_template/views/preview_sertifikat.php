<?php 
$id=isset($data->id_temp)?($data->id_temp):'';
$img_temp=isset($data->img_temp)?($data->img_temp):'';	
$img_back=isset($data->img_back)?($data->img_back):'';	
$id_element=isset($data->id_element)?($data->id_element):'';
	
?>
 
<?php 
$DBtempElement=$this->db->where('id_element',$id_element);
$DBtempElement=$this->db->get('temp_element');
$tempElement=$DBtempElement->row();

//if($tempElement->el_1!=''){$logo='<img class="logo_img" src="'.base_url().'theme/images/sertifikat/'.$tempElement->el_1.'">';}else{$logo='';}
?> 
<style>
.page_img_index{
        background-image: url(<?php echo base_url()?>theme/images/sertifikat/<?php echo $img_temp ?>); 
     }
.page_img_back{
        background-image: url(<?php echo base_url()?>theme/images/sertifikat/<?php echo $img_back ?>); 
     }

<?php echo $tempElement->element; ?>
</style>
<page> 
    <page_header>           
    </page_header> 
	<div id="divid" class="page_img_index">
		<div class="logo"></div>
		<p class="nama_dudi">Nama DUNIA USAHA DAN INDUSTRI</p>
		<p class="alamat_dudi">Alamat Dunia Usaha dan Industri</p>
		<p class="s1"><?php echo strtoupper($tempElement->el_1) ?></p>
		<p class="s2"><?php echo $tempElement->el_2 ?></p>
		<p class="s3"><?php echo $tempElement->el_3 ?></p>
        <p class="nama">NAMA LENGKAP PESERTA</p>
		<table id="tabel1" cellpadding="0">
		<tr>
			<td style="width:190px;text-align:left;font-size:16px;padding-bottom:3px;"><?php echo $tempElement->el_4 ?></td>
			<td style="width:3px">:</td>
			<td style="width:530px;text-align:left;font-size:16px;padding-bottom:3px;">.............., ....................</td>
		</tr>
		<tr>
			<td style="width:190px;text-align:left;font-size:16px;padding-bottom:3px;"><?php echo $tempElement->el_5 ?></td>
			<td style="width:3px">:</td>
			<td style="width:530px;text-align:left;font-size:16px;padding-bottom:3px;">....................</td>
		</tr>
		<tr>
			<td style="width:190px;text-align:left;font-size:16px;padding-bottom:3px;"><?php echo $tempElement->el_6 ?></td>
			<td style="width:3px">:</td>
			<td style="width:530px;text-align:left;font-size:16px;padding-bottom:3px;">....................</td>
		</tr>
		<tr>
			<td style="width:190px;text-align:left;font-size:16px;padding-bottom:3px;"><?php echo $tempElement->el_7 ?></td>
			<td style="width:3px">:</td>
			<td style="width:530px;text-align:left;font-size:16px;padding-bottom:3px;">....................</td>
		</tr>
		<tr>
			<td style="width:190px;text-align:left;font-size:16px;padding-bottom:3px;"><?php echo $tempElement->el_8 ?></td>
			<td style="width:3px">:</td>
			<td style="width:530px;text-align:left;font-size:16px;padding-bottom:3px;">....................</td>
		</tr>
		<tr>
			<td style="width:190px;text-align:left;font-size:16px;padding-bottom:3px;"><?php echo $tempElement->el_9 ?></td>
			<td style="width:3px">:</td>
			<td style="width:530px;text-align:left;font-size:16px;padding-bottom:3px;">....................</td>
		</tr>
		</table>
		<div id="tema"><p class="namatema"><?php echo$tempElement->el_10 ?> selama ....... bulan terhitung pada Tanggal ....................<br>sampai dengan Tanggal .................... dengan hasil <b><u>.............</u></b></p></div>
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
			<td style="width:530px;text-align:left;font-size:16px;padding-bottom:3px;">.................</td>
		</tr>
		<tr>
			<td style="width:190px;text-align:left;font-size:16px;padding-bottom:3px;"><?php echo $tempElement->el_5 ?></td>
			<td style="width:3px">:</td>
			<td style="width:530px;text-align:left;font-size:16px;padding-bottom:3px;">.................</td>
		</tr>
		<tr>
			<td style="width:190px;text-align:left;font-size:16px;padding-bottom:3px;"><?php echo $tempElement->el_7 ?></td>
			<td style="width:3px">:</td>
			<td style="width:530px;text-align:left;font-size:16px;padding-bottom:3px;">.................</td>
		</tr>
		<tr>
			<td style="width:190px;text-align:left;font-size:16px;padding-bottom:3px;"><?php echo $tempElement->el_8 ?></td>
			<td style="width:3px">:</td>
			<td style="width:530px;text-align:left;font-size:16px;padding-bottom:3px;">.................</td>
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
				<tr>
					<td style="table-layout:fixed;text-align:center;">1</td>
					<td style="table-layout:fixed;text-align:left;">Aspek Teknik satu</td>
					<td style="table-layout:fixed;text-align:center;">....</td>
					<td style="table-layout:fixed;text-align:center;">....</td>
				</tr>
				<tr>
					<td style="table-layout:fixed;text-align:center;">2</td>
					<td style="table-layout:fixed;text-align:left;">Aspek Teknik dua</td>
					<td style="table-layout:fixed;text-align:center;">....</td>
					<td style="table-layout:fixed;text-align:center;">....</td>
				</tr>
				<tr>
					<td style="table-layout:fixed;text-align:center;">3</td>
					<td style="table-layout:fixed;text-align:left;">Aspek Teknik tiga</td>
					<td style="table-layout:fixed;text-align:center;">....</td>
					<td style="table-layout:fixed;text-align:center;">....</td>
				</tr>

				<tr>
					<td colspan="2" style="table-layout:fixed;text-align:right;">JUMLAH NILAI</td>
					<td style="table-layout:fixed;text-align:center;">....</td>
					<td style="table-layout:fixed;text-align:center;"></td>
				</tr>
				<tr>
					<td colspan="2" style="table-layout:fixed;text-align:right;">RATA-RATA</td>
					<td style="table-layout:fixed;text-align:center;">....</td>
					<td style="table-layout:fixed;text-align:center;">....</td>
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
					<td style="table-layout:fixed;text-align:center;">....</td>
					<td style="table-layout:fixed;text-align:center;">....</td>
				</tr>
				<tr>
					<td style="table-layout:fixed;text-align:center;">2</td>
					<td style="table-layout:fixed;text-align:left;">Kerjasama</td>
					<td style="table-layout:fixed;text-align:center;">....</td>
					<td style="table-layout:fixed;text-align:center;">....</td>
				</tr>
				<tr>
					<td style="table-layout:fixed;text-align:center;">3</td>
					<td style="table-layout:fixed;text-align:left;">Inisiatif</td>
					<td style="table-layout:fixed;text-align:center;">....</td>
					<td style="table-layout:fixed;text-align:center;">....</td>
				</tr>
				<tr>
					<td style="table-layout:fixed;text-align:center;">2</td>
					<td style="table-layout:fixed;text-align:left;">Kerajinan</td>
					<td style="table-layout:fixed;text-align:center;">....</td>
					<td style="table-layout:fixed;text-align:center;">....</td>
				</tr>
				<tr>
					<td style="table-layout:fixed;text-align:center;">3</td>
					<td style="table-layout:fixed;text-align:left;">Tanggung Jawab</td>
					<td style="table-layout:fixed;text-align:center;">....</td>
					<td style="table-layout:fixed;text-align:center;">....</td>
				</tr>
				<tr>
					<td style="table-layout:fixed;text-align:center;">3</td>
					<td style="table-layout:fixed;text-align:left;">Sikap</td>
					<td style="table-layout:fixed;text-align:center;">....</td>
					<td style="table-layout:fixed;text-align:center;">....</td>
				</tr>
				<tr>
					<td colspan="2" style="table-layout:fixed;text-align:right;">JUMLAH NILAI</td>
					<td style="table-layout:fixed;text-align:center;">....</td>
					<td style="table-layout:fixed;text-align:center;"></td>
				</tr>
				<tr>
					<td colspan="2" style="table-layout:fixed;text-align:right;">RATA-RATA</td>
					<td style="table-layout:fixed;text-align:center;">....</td>
					<td style="table-layout:fixed;text-align:center;">....</td>
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

