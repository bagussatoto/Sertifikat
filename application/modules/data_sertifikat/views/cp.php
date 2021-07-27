 
 <?php 
 if($this->input->post("id")=="xx")
 {
	  $database=$this->db->query("select * from data_kartu order by id desc limit 1 ")->row();  
 }else{
 $database=$this->db->get_where("data_kartu",array("id"=>$this->input->post("id")))->row();  
 }
  	 $this->mdl->qr($database->no_chasis);
 ?>		
 

 	
<style>
.bgdepan{
	width:325px;
	height:207px;
	background-image:url("<?php echo base_url()?>file_upload/card/depan5.png");
	background-size:325px;
}
.title0{
font-size:11px;
font-weight:bold;
color:black;
margin-top:60px;
margin-left:120px;
position:absolute;
}.title{
font-size:10px;
font-weight:bold;
color:black;
margin-top:55px;
margin-left:10px;
position:absolute;
}
.title2{
font-size:8px;
font-weight:bold;
color:black;
margin-top:50px;
margin-left:9px;
position:absolute;
}
.title3{
font-size:9px;
font-weight:bold;
color:black;
margin-top:65px;
margin-left:2px;
position:absolute;
}.title4{
font-size:9px;
font-weight:bold;
color:black;
margin-top:105px;
margin-left:2px;
line-height:10px;
position:absolute;
width:140px;
text-align:justify;
}.title5{
font-size:7px;
font-weight:bold;
color:black;
margin-top:82px;
margin-left:110px;
line-height:7px;
position:absolute;
width:220px;
text-align:center;
}
.tanggal_izin{
font-size:9px;
font-weight:bold;
color:black;
margin-left: 200px;
width:200px;
position:absolute;
}
.cap{
margin-top:92px;
font-size:9px;
font-weight:bold;
color:black;
margin-left: 165px;
position:absolute;
z-index:999px;
}.ttd{
margin-top:82px;
font-size:9px;
font-weight:bold;
color:black;
margin-left: 135px;
position:absolute;
z-index:999px;
}
#barcode{
	margin-top:69px;
	width:40px;
}
</style>

<style>
.bgbelakang{
	width:325px;
	height:207px;
	background-image:url("<?php echo base_url()?>file_upload/card/belakang.png");
	background-size:325px;
 
}
 .teks{
font-size:14px;
font-weight:bold;
color:black;
margin-top:15px;
margin-left:70px;
position:absolute;
}
.teks2{
font-size:10px;
font-weight:bold;
color:black;
margin-top:10px;
margin-left:75px;
position:absolute;
}.teks3{
font-size:9px;
font-weight:bold;
color:black;
margin-top:30px;
margin-left:5px;
position:absolute;
}.teks4{
font-size:9px;
font-weight:bold;
color:black;
line-height:15px;
margin-top:45px;
margin-left:5px;
position:absolute;
}
.teks_tanggal_izin{
font-size:9px;
font-weight:bold;
color:black;
margin-left: 95px;
width:200px;
position:absolute;
}
.tikwa1{
margin-left:32px;
}.tikwa2{
margin-left:36px;
}.tikwa3{
margin-left:49px;
}.tikwa4{
margin-left:6px;
}.tikwa5{
margin-left:9px;
}.tikwa6{
margin-left:19px;
}
.barang{
margin-left:120px;
}
.sd{
margin-left:20px;
}
.masa{
margin-left:20px;
}
.footer{
	position:absolute;
	margin-top:5px;
 padding:2px;
border:black solid 1px;
}
.u{
border-bottom:black solid 1px;
}
#print{  	width:325px; }
#print p{
padding-left:12px;
}
.gcap{
width:50px;
}
.gttd{
width:150px;
}

.title6{
display:none;
}
</style>
		
 <div id="print" >
 <table><tr>
 <td>
 <p class="bgdepan">
 
  
 <span class="title0" >SURAT IZIN </span><br> 
 <span class="title" >UNTUK PENGANGKUTAN ORANG DENGAN OTOBUS UMUM</span><br> 
 <span class="title2">Berdasarkan Izin Trayek Angkutan Dengan Kendaraan Umum</span> 
 
   <img src="<?php echo base_url()?>qr/<?php echo $database->no_chasis?>.png" id="barcode" />
 <span class="title3">

 <!--<span class='tanggal_izin'> Tanggal : <b><?php echo $this->tanggal->ind($database->tgl_izin,"-");?></b></span>-->
	<span>Tanda Nomor (STNK) &nbsp;:<b> <?php echo $database->stnk;?></b></span> 
<br>
	<span>Kepada :<b> <?php echo $database->kepada;?></b></span><br>
	<span>Alamat &nbsp;: <b><?php echo $database->alamat;?></b></span><br>
	<span>Trayek &nbsp;&nbsp;: <b><?php echo $database->trayek;?></b></span>
 </span> 
 <!--<span class="title4">Telah diberikan izin untuk mempergunakan otobus umum pengangkut orang pada trayek : <br><b><?php echo $database->trayek;?></b> <br>
 Dikeluarkan di Ambon pada<br> tanggal :<b> <?php echo $this->tanggal->ind($database->tgl_dikeluarkan,"-");?></b>
 </span> -->
 
 
 <span class="cap"><img   class='gcap'  src='<?php echo base_url()?>file_upload/card/cap.png'></span>
 <span class="ttd"><img   class='gttd' src='<?php echo base_url()?>file_upload/img/<?php echo $this->m_reff->goField("tm_referensi","poto","where id='2'");?>'></span>
 
  <span class="title5">
  <?php echo $this->tanggal->hariLengkap($database->tgl_dikeluarkan,"-");?>
  <br>KEPALA DINAS PERHUBUNGAN <br> KOTA AMBON
  <br>
  <br>
  <br>
  <br>
  
  
 <span class='u'> <b><?php echo $this->m_reff->goField("tm_referensi","konten","where id='3'");?></b></span><br><br>
 <span class="bina"> <b>PEMBINA</b><br>
  <b>NIP.   <?php echo $this->m_reff->goField("tm_referensi","konten","where id='4'");?></b>
  </span> 
  </span> 
 <span class="title6"> Masa berlaku : <?php echo $this->tanggal->ind($database->masa_berlaku,"-")?> </span>
 </p>  
 </td></tr><tr>
 <td class='td'>
  <p class="bgbelakang">
      <!--
 <span class="teks" >KARTU PENGAWASAN</span><br> 
 <span class="teks2"><b>No :<?php echo $database->nomor_kartu;?> </b></span> 
 <span class="teks3">
	<b> Untuk keperluan ini dapat dipergunakan kendaran dengan uraian sbb:</b>
 </span> 
 
  <span class="teks4">
	<span>Tanda Nomor (STNK) : <b><?php echo $database->stnk;?></b></span> <span class='teks_tanggal_izin'> Tahun : <b><?php echo  $database->tahun_pembuatan ;?></b></span><br>
	<span>Nomor Chasis </span>		<span class='tikwa1'> : </span> <span class='isitikwa'> <?php echo $database->no_chasis;?></span><br>
	<span>Nomor Mesin </span>		<span class='tikwa2'>:</span>  <span class='isitikwa'><?php echo $database->no_mesin;?></span><br>
	<span>Merk/Type </span>			<span class='tikwa3'>:</span>  <span class='isitikwa'><?php echo $database->merk;?></span><br>
	<span>Nomor Pemeriksaan </span> <span class='tikwa4'>: </span> <span class='isitikwa'><?php echo $database->no_pemeriksaan;?></span><br>
	<span>Daya Angkut Orang</span>	<span class='tikwa5'>:</span>  <span class='isitikwa'><?php echo $database->daya_angkut_orang;?></span>  <span class='barang'> Barang : <b><?php echo $database->daya_angkut_barang;?> Kg</b></span> <br>
	<span>Masa Berlaku Tgl </span>	<span class='tikwa6'>: </span> <span class='isitikwa'><?php echo $this->tanggal->ind_bulan($database->mulai_berlaku," ");?></span> 
	<span class='sd'>s/d</span> <span class="masa"><b><?php echo $this->tanggal->ind_bulan($database->masa_berlaku," ");?></b></span> <br>
 -->
  <span class='footer'>
 14 HARI SEBELUM HABIS MASA BERLAKU HARUS SUDAH LAPOR
 </span> 
 </p>  
 </td></tr>
</table> 
 </div>
 
 
 <textarea id="printing-css" style="display:none;">
.bina{
margin-top:-5px;
position:absolute;
margin-left:-55px;
}
.title6{
font-weight:bold;
color:white;
margin-top:247px;
position:absolute;
margin-left:-100px;
font-size:12px;
}
 
.bgdepan{
	width:485px;
	height:307px;
	background-image:url("<?php echo base_url()?>file_upload/card/depan5.png");
	font-family:calibri;
	background-size:485px 307px;
	margin-left:-10px;
	margin-top:-10px;
}
.title0{
font-size:18px;
font-weight:bold;
color:black;
margin-top:78px;
margin-left:190px;
position:absolute;
}
.title{
font-size:17px;
font-weight:bold;
color:black;
margin-top:85px;
margin-left:23px;
position:absolute;padding-left:12px;
}
.title2{
font-size:17px;
 padding-left:3px;
color:black;
margin-top:90px;
margin-left:30px;
position:absolute;
}
.title3{
font-size:17px;
 padding-left:12px;
color:black;
margin-top:115px;
margin-left:0px;
position:absolute;
line-height:19px;
}.title4{
font-size:17px;
 
color:black;
margin-top:167px;padding-left:12px;
margin-left:0px;
line-height:17px;
position:absolute;
width:240px;
text-align:justify;
}

.title5{
font-size:11px;
 
color:black;
margin-top:172px;
margin-left:140px;
line-height:9px;
position:absolute;
width:280px;
text-align:center;
}
.tanggal_izin{
font-size:15px;
 
color:black;
margin-left: 320px;
width:200px;
position:absolute;
}
.cap{
margin-top:188px;
font-size:9px;
font-weight:bold;
 
color:black;
margin-left: 193px;
position:absolute;
z-index:999px;
}.ttd{
margin-top:170px;
font-size:9px;
font-weight:bold;
color:black;
margin-left: 161px;
position:absolute;
z-index:999px;
}

 .gcap{
width:53px;
height:50px;
}
.gttd{
width:190px;
}


.u{
border-bottom:black solid 0.5px;
}

#barcode{
	 margin-top:120px;
	 margin-left:45px;
	width:70px;
	height:70px;
}





.bgbelakang{
	margin-left:-10px;
	margin-top:-5px;
	width:485px;
	height:309px;
	background-image:url("<?php echo base_url()?>file_upload/card/belakang.png");
	background-size:485px 309px;
	font-family:calibri;
	position:absolute;
}


.isitikwa{
font-weight:bold;
}
 .teks{
font-size:20px;
font-weight:bold;
color:black;
margin-top:25px;
margin-left:140px;
position:absolute;
}
.teks2{
font-size:15px;
color:black;
margin-top:26px;
margin-left:142px;
position:absolute;
}

.teks3{
font-size:16px;	padding-left:18px;
 
color:black;
margin-top:55px;
margin-left:-6px;
position:absolute;
}
.teks4{ 
font-size:16px;
 
color:black;
line-height:22px;
margin-top:85px;
margin-left:15px;
position:absolute;
}
.teks_tanggal_izin{
font-size:16px;
 
color:black;
margin-left: 135px;
width:200px;
position:absolute;
}
.tikwa1{
margin-left:45px;
}.tikwa2{
margin-left:45px;
}.tikwa3{
margin-left:63px;
}.tikwa4{
margin-left:2px;
}.tikwa5{
margin-left:9px;
}.tikwa6{
margin-left:24px;
}
.barang{
margin-left:179px;
}
.sd{
margin-left:22px;
}
.masa{
margin-left:33px;
}
.footer{
	position:absolute;
	margin-top:5px;
	margin-left:2px;
	font-weight:bold;
 padding:2px;
width:440px;
border:black solid 1px;
text-align:center;
}

#print{  	width:325px; }
#print p{
padding-left:12px;
}
 
</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<script type="text/javascript">

  function printDiv(divName) {
	
    var a = document.getElementById('printing-css').value;
    var b = document.getElementById(divName).innerHTML;
    window.frames["print_frame"].document.title = document.title;
    window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
	   finalShop();
}

</script>	