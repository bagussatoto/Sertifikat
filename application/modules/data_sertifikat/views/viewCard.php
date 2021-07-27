 
 <?php 
 if($this->input->post("id")=="xx")
 {
	  $database=$this->db->query("select * from data_kartu order by id desc limit 1 ")->row();  
 }else{
      $database=$this->db->get_where("data_kartu",array("id"=>$this->input->post("id")))->row();  
 }
  	 $this->mdl->qr($database->nomor_anggota);
 ?>		
 

 	
<style>
.bgdepan{
	width:345px;
	height:207px;
	background-image:url("<?php echo base_url()?>file_upload/card/kartu1.jpg");
	background-size:cover;
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
font-size:8px;
font-weight:bold;
color:black;
margin-top:5px;
margin-left:2px;
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
margin-left: 20px;
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

</style>

<style>
.bgbelakang{
	width:345px;
	height:207px;
	background-image:url("<?php echo base_url()?>file_upload/card/belakang1.jpg");
	background-size:cover;
    background-repeat:no;
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
    width:320px;
	position:absolute;
	margin-top:180px;
	margin-left:-15px;
	color:black;
 padding:2px;
 font-size:9px;
 font-weight:bold;
 
text-align:center;
}
.u{
border-bottom:black solid 1px;
}
#print{  	width:380px; }
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
 .stnk{
     font-size:11px;
 }
 .ekp{
      font-size:11px;
      float:left;
      margin-left:-155px;
      color:white;
      margin-top:23px;
 }
 .tte1{
     font-family: Arial Black, Arial Bold, Gadget, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: 700; 
     text-align:center;
    width:242px;
    position: absolute;
    margin-top: -205px;
    margin-left: 86px;
    color: black;
    line-height: 11px;
 }
 .tte2{
     font-family: Arial Black, Arial Bold, Gadget, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: 700; 
     text-align:center;
    width:242px;
    position: absolute;
    margin-top: -192px;
    margin-left: 86px;
    color: black;
    line-height: 11px;
 }
 .tte3{
        font-family: sans-serif;
    font-weight: 600;
    letter-spacing: -0.1px;
    text-align: center;
    width: 252px;
    position: absolute;
    margin-top: -179px;
    margin-left: 86px;
    color: black;
    font-size: 5.9px;
    line-height: 9px;
 }
 .nama{
    width:240px;
    position: absolute;
    margin-top: -152px;
    margin-left: 82px;
    font-weight: bold;
    color: black;
    font-size: 8.5px;
    line-height: 11px;
 }
 .tglttd{
    position: absolute;
    margin-top: -70px;
    margin-left: 198px;
    font-weight: bold;
    color:
    black;
    font-size: 7.8px;
    line-height: 10px;
 }
  .htttd{
    text-align:center;
    position: absolute;
    margin-top: -61px;
    margin-left: 215px;
    font-weight: bold;
    color:black;
    font-size: 6.5px;
    line-height: 7px;
 }
 .nmttd{
     z-index: 15;
    position: absolute;
    margin-top: -27px;
    margin-left: 220px;
    font-weight: bold;
    color:black;
    font-size: 7.5px;
    line-height: 8px;
 }
 #penttd{
    position: absolute;
    margin-top: -58px;
    margin-left: 200px;
    width: 88px;
    height:40px;
 }
 #capttd{
    z-index: 20;
    position: absolute;
    margin-top: -63px;
    margin-left: 200px;
    width: 45px;
    height:45px;
 }
 .ttl{
   width: 360px;
position: absolute;
margin-top: -126px;
margin-left: 158px;
font-weight: bold;
color: white;
font-size: 9px;
line-height: 3px;
 }
 .nia{
    width: 360px;
position: absolute;
margin-top: -140px;
margin-left: 170px;
font-weight: bold;
color: white;
font-size: 9px;
line-height: 3px;
 }
 .alamat{
    width: 140px;
position: absolute;
margin-top: -118px;
margin-left: 170px;
font-weight: bold;
color: white;
font-size: 9px;
line-height: 11px;
height: 300px;
 }
 #foto{
    position: absolute;
	margin-top: 44px;
	margin-left: 5px;
	width: 58px;
	border-radius: 0px;
	border:
	#257b23 solid 1px;
  
	max-height: 67px;
}
#barcode{
    position: absolute;
	margin-top: 115px;
	margin-left: 9px;
	width: 50px;

}
.sadows{
    color:#fccd4d;
    text-shadow:1px 1px 1px  black;
}
</style>
		
 <div id="print" >
 <table><tr>
 <td>
 <p class="bgdepan">

 <span class="title0" >  </span><br> 
   <img src="<?php echo base_url()?>/<?php echo $database->foto?>" id="foto" />
   <img src="<?php echo base_url()?>qr/<?php echo $database->nomor_anggota?>.png" id="barcode" />
 <div class="tte1">KELUARGA BESAR</div>
 <div class="tte2">FORUM BETAWI REMPUG</div>
   <div class="tte3">Sekretariat : Jl. Raya Penggilingan Pedaengan No.100 Cakung, Jakarta Timur </br> 
   Email : pimpus@forumbetawirempug.org</div>
   
<table border="0" class="nama">
    <tr valign='top'>
        <td width='115px'>Nama</td>
        <td width='9px'>:</td>
        <td width='180px'><?php echo strtoupper($database->nama)?></td>
    </tr>
    <tr  valign='top'>
        <td>NIK</td>
        <td>:</td>
        <td><?php echo strtoupper($database->nomor_anggota)?></td>
    </tr>
    <tr  valign='top'>
        <td>Tempat, Tgl Lahir</td>
        <td>:</td>
        <td><?php echo strtoupper($database->tempat_lhr)?>, <?php 
	 $tgllhr=explode('-',$database->tgl_lhr);
	 $d_a=$tgllhr[2];
	 $m_a=$tgllhr[1];
	 $y_a=$tgllhr[0];
	 $mm_a=$this->tanggal->bulan($m_a,"-");
	 echo  $d_a."&nbsp;".$mm_a."&nbsp;".$y_a ;
	 ?></td>
    </tr>
    <tr valign='top'>
        <td>Alamat</td>
        <td>:</td>
        <td><?php echo $database->alamat?></td>
    </tr>
    <tr valign='top'>
        <td>Berlaku</td>
        <td>:</td>
        <td><?php  
     $tglb=explode('-',$database->tgl_berlaku);
	 $d_b=$tglb[2];
	 $m_b=$tglb[1];
	 $y_b=$tglb[0];
	echo  $mm_b=$this->tanggal->ind_tglbulantahun($d_b,$m_b,$y_b);?> s.d <?php
	$tglc=explode('-',$database->tgl_kadaluarsa);
	 $d_c=$tglc[2];
	 $m_c=$tglc[1];
	 $y_c=$tglc[0];
	 echo  $mm_c=$this->tanggal->ind_tglbulantahun($d_c,$m_c,$y_c); ?></td>
    </tr>
</table>
 <div class="tglttd">
    Jakarta, <?php 
	 $tglttd=explode('-',$database->tgl_berlaku);
	 $d_d=$tglttd[2];
	 $m_d=$tglttd[1];
	 $y_d=$tglttd[0];
	 $mm_d=$this->tanggal->bulan($m_d,"-");
	 echo  $d_d."&nbsp;".$mm_d."&nbsp;".$y_d ;
	 ?>
 </div>
 <div class="htttd">
     Ketua Umum,<br>
	 Forum Betawi Rempug
 </div>

 <div class="nmttd">
      KH. Lutfi Hakim, MA
 </div>
  <img src="<?php echo base_url()?>file_upload/card/penttd.png" id="penttd" />
 <img src="<?php echo base_url()?>file_upload/card/capttd.png" id="capttd" />

 
 
 <span class="cap"><!--<img   class='gcap'  src='<!?php echo base_url()?>file_upload/card/cap.png'>--></span>
 <span class="ttd">
     <!---<img   class='gttd' src=' echo base_url()?>file_upload/img/<!?php echo $this->m_reff->goField("tm_referensi","poto","where id='2'");?>'>---></span>
 
  <span class="title5">
  
  <br> <br>  
  <br>
  <br>
  <br>
  <br>
 <!--<span class='ekp'> Berlaku : <b> <!?php echo $this->tanggal->ind($database->masa_berlaku,"-");?></b></span> --->
 <span class='stnk'>  &nbsp; <b>&nbsp;  </b></span> 
  
<!-- <span class='u'> <b>  $this->m_reff->goField("tm_referensi","konten","where id='3'");?></b></span>--->
 
 <br><br>
 <span class="bina"> <b> </b><br>
  <b>   </b>
  </span> 
  </span> 
 <span class="title6"> &nbsp;</span>
 </p>  
 </td></tr><tr>
 <td class='td'>
  <p class="bgbelakang">
      
  <span class='footer'>
 
 </span> 
 </p>  
 </td></tr>
</table> 
 </div>
 
 
 <textarea id="printing-css" style="display:none;">
     #barcode{
	 margin-top:190px;
	 margin-left:30px;
	 width:73px;
	 height:70px;
	 border:#cf9114 solid 0px;
}


     .sadows{
   color:#fccd4d;
    text-shadow:1px 1px 1px  black;
}
.tte1{
     font-family: Arial Black, Arial Bold, Gadget, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: 700; 
     text-align:center;
    width:342px;
    position: absolute;
    margin-top: -305px;
    margin-left: 96px;
    color: black;
    line-height: 11px;
 }
 .tte2{
     font-family: Arial Black, Arial Bold, Gadget, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: 700; 
     text-align:center;
    width:342px;
    position: absolute;
    margin-top: -287px;
    margin-left: 96px;
    color: black;
    line-height: 11px;
 }
 .tte3{
     font-family: sans-serif;
    font-weight: 600;
    letter-spacing: 0px;
    text-align: center;
    width: 370px;
    position: absolute;
    margin-top: -270px;
    margin-left: 102px;
    color:black;
    font-size: 9.5px;
    line-height: 13px;
 }
  .nama{
    width:360px;
    font-family:sans-serif;
    position: absolute;
    margin-top: -226px;
    margin-left: 110px;
    font-weight: bold;
    color: black;
    font-size: 13px;
    line-height: 14px;
 }
 .tglttd{
    position: absolute;
    font-family: Sans-serif;
    margin-top: -116px;
    margin-left: 290px;
    font-weight: bold;
    color:
    black;
    font-size: 11.5px;
    line-height: 10px;
 }
 .htttd{
    text-align:center;
    font-family: Sans-serif;
    position: absolute;
    margin-top: -104px;
    margin-left: 315px;
    font-weight: bold;
    color:black;
    font-size: 9px;
    line-height: 9px;
 }
 .nmttd{
     z-index: 15;
      font-family: Sans-serif;
    position: absolute;
    margin-top: -53px;
    margin-left: 310px;
    font-weight: bold;
    color:black;
    font-size: 11px;
    line-height: 8px;
 }
 #penttd{
    position: absolute;
    margin-top: -105px;
    margin-left: 285px;
    width: 123px;
    height:66px;
 }
 #capttd{
    z-index: 20;
    position: absolute;
    margin-top: -108px;
    margin-left: 290px;
    width: 65px;
    height:65px;
 }
 .ttl{
  font-family: Sans-serif;
    width:260px;
     position:absolute;
       margin-top:-135px;
       margin-left:120px;
       font-weight:bold;
      font-size:16px;
       line-height:3px;
 }
 .nia{
  font-family: Sans-serif;
     width:260px;
     position:absolute;
       margin-top:-87px;
       margin-left:120px;
       font-weight:bold;
      
        font-size:16px;
       line-height:3px;
 }
 
 .alamat{
  font-family: Sans-serif;
     width:260px;
     position:absolute;
       margin-top:-87px;
       margin-left:120px;
       font-weight:bold;
      
        font-size:16px;
       line-height:3px;
 }
 
 
 
   #foto{
    position:absolute;
   	margin-top:78px;
	margin-left:25px;
	width:81px;
	max-height:100px;
		border-radius: 0px;
	border:#257b23 solid 2px;
     
}
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
	background-image:url("<?php echo base_url()?>file_upload/card/kartu1.jpg");
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
font-size:15px;
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





.bgbelakang{
	margin-left:-10px;
	margin-top:-5px;
	width:485px;
	height:306px;
	background-image:url("<?php echo base_url()?>file_upload/card/belakang1.jpg");
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
    min-width:320px;
	position:absolute;
	margin-top:255px;
	margin-left:75px;
	color:black;
 padding:2px;
 font-size:13px;
  font-weight:bold;
 
text-align:center;
}

#print{  	width:325px; }
#print p{
padding-left:12px;
}
  .stnk{
     font-size:19px;
 }
  .ekp{
      font-size:11px;
      float:left;
      margin-left:-155px;
      color:white;
      margin-top:23px;
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