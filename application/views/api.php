<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta name="viewport" content="user-scalable = no">
  
 <style>
  .justify{
	 text-align: justify;
     text-justify: inter-word;
 }
 #table1 tr td{
     font-size:14px;
     border-bottom:black dashed 0.5px;
 }
 #table1{
     width:100%;
 }
 </style>
</head>
<body style='width:95%'>
<?php    
		$v=$this->input->get_post("v");
		$data=$this->db->get_where("data_kartu",array("nomor_anggota"=>$v));
		if($data->num_rows())
		{       $i=1;
		        $data=$data->row();
			 
				if($data->tgl_kadaluarsa<=date("Y-m-d"))
				{
					$hasil = " MASA BERLAKU KEANGGOTAAN TELAH HABIS ";
				}else{
					$hasil = " INFORMASI ";
				}
				
				$header="<center><b>DATA KEANGGOTAAN</b></center>";
				$nomor_anggota=$data->nomor_anggota;
			 
				 
		 }else{	
	        $i=0;
		}
		
		
	?>
	
	<?php
	if($i==1){?>
 
	    	 <p class='justify'> <?php     echo $header ?> </p> 
	    	 <center>
	        <img style="border-radius:10px;width:150px" src="<?php echo base_url() ?>/<?php echo $data->foto; ?>">  
	      </center>   
	 <table   id="table1">
	      </tr>
	      <tr>
	         <td> Nama  </td> <td>:</td> <td  ><?php echo $data->nama;?></td>
	     </tr>
	     <tr>
	         <td> NIK</td> <td>:</td> <td  ><?php echo $nomor_anggota;?></td>
	     </tr>
	     <tr>
	         <td> KTP</td> <td>:</td> <td  ><?php echo $data->ktp;?></td>
	     </tr>
	      <tr>
	         <td> KK</td> <td>:</td> <td  ><?php echo $data->kk;?></td>
	     </tr>
	      <tr>
	         <td> T/T/L</td> <td>:</td> <td  ><?php echo $data->tempat_lhr;?>,<?php echo $this->tanggal->ind($data->tgl_lhr,"/");?></td>
	     </tr>
	      <tr>
	         <td>Alamat</td> <td>:</td> <td  ><?php echo $data->alamat;?></td>
	     </tr>
	       
	     </table>
	     <br>
	      <table   id="table1">
	      </tr>
	      <tr>
	         <td> KORWIL</td> <td>:</td> <td  ><?php echo $this->m_reff->goField("tr_korwil","nama","where kode='$data->kode_korwil' ");?></td>
	     </tr>
	     <tr>
	         <td> GARDU</td> <td>:</td> <td  ><?php echo $this->m_reff->goField("tr_gardu","nama","where kode='$data->kode_gardu' ");?></td>
	     </tr>
	     </table>
	     <br>
	 <center>   <b>MASA BERLAKU KEANGGOTAAN </b><br>
	 <?php echo $this->tanggal->hariLengkap($data->tgl_kadaluarsa,"-")?>
	 </center> 
	     
	<?php }else{
	
	    echo "<br><center>Kode tidak ditemukan</center>";
	}
	?>
	</body>
	</html>