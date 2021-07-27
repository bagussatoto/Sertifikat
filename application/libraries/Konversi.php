<?php
class konversi
{
  function change_integer($data) {

        $data =  preg_replace('/[^0-9,\.]+/', '',       $data);
        if ($data) {

                $jmltitik = explode(".",$data);
                $jmlkoma = explode(",",$data);

                if (count($jmltitik) > 1 && count($jmlkoma) > 1 && count($jmltitik) > count($jmlkoma)){
                        $data =  str_replace('.', '', $data);
                        $data =  str_replace(',', '.', $data);
                }elseif (count($jmltitik) > 1 && count($jmlkoma) > 1){
                        if (strlen($jmlkoma[0])>strlen($jmltitik[0])){
                                $data =  str_replace('.', '', $data);
                        }else{
                                $data =  str_replace(',', '', $data);
                        }
                }elseif (count($jmltitik)==2 && count($jmlkoma)==1){
                         if (strlen($jmltitik[0])>3){
                 }elseif (strlen($jmltitik[1])!=3){
                 }else{
                                $data =  $jmltitik[0].$jmltitik[1];
                }
                }elseif (count($jmltitik)==1 && count($jmlkoma)==2){
                         if (strlen($jmlkoma[0])>3){
                                $data =   $jmlkoma[0].".".$jmlkoma[1];
                 }elseif (strlen($jmlkoma[1])!=3){
                                $data =   $jmlkoma[0].".".$jmlkoma[1];
                 }else{
                                $data =   $jmlkoma[0].$jmlkoma[1];
                }
                }elseif (count($jmltitik)==1 && count($jmlkoma)==1){
                }elseif (count($jmltitik) > count($jmlkoma)){
                         if (strlen($jmltitik[1])!=3){
                                $data =   $jmltitik[0].".".$jmltitik[1];
                 }else{
                                $data =   $jmltitik[0].$jmltitik[1];
         }
                }else{
                         if (strlen($jmlkoma[1])!=3){
                                $data =   $jmlkoma[0].".".$jmlkoma[1];
                 }else{
                                $data =   $jmlkoma[0].$jmlkoma[1];
         }

                }
        }

                if (strlen((int)$data)>5)$data = $data/1000;
                return $data;

        }
	
	
	function enc($id)
	{
	$ci = &get_instance();
	$ci->load->model("m_umum");
	$id=$ci->m_umum->enc($id);
	
	$id=str_replace("`","sibuta1",$id);
	$id=str_replace("!","sibuta2",$id);
	$id=str_replace("@","sibuta3",$id);
	$id=str_replace("#","sibuta4",$id);
	$id=str_replace("$","sibuta5",$id);
	$id=str_replace("%","sibuta6",$id);
	$id=str_replace("^","sibuta7",$id);
	$id=str_replace("&","sibuta8",$id);
	$id=str_replace("*","sibuta9",$id);
	$id=str_replace("(","sibutaa",$id);
	$id=str_replace(")","sibutab",$id);
	$id=str_replace("-","sibutac",$id);
	$id=str_replace("+","sibutad",$id);
	$id=str_replace("=","sibutae",$id);
	$id=str_replace("/","sibutaf",$id);
	$id=str_replace(".","sibutag",$id);
	$id=str_replace("<","sibutah",$id);
	$id=str_replace(">","sibutai",$id);
	$id=str_replace("|","sibutaj",$id);
	$id=str_replace("~","sibutak",$id);
	$id=str_replace("[","sibutal",$id);
	$id=str_replace("]","sibutam",$id);
	$id=str_replace("{","sibutan",$id);
	$id=str_replace("}","sibutao",$id);
	$id=str_replace("?","sibutap",$id);
	return $id;
	}
	function desc($id)
	{
	$id=str_replace("sibuta1","`",$id);
	$id=str_replace("sibuta2","!",$id);
	$id=str_replace("sibuta3","@",$id);
	$id=str_replace("sibuta4","#",$id);
	$id=str_replace("sibuta5","$",$id);
	$id=str_replace("sibuta6","%",$id);
	$id=str_replace("sibuta7","^",$id);
	$id=str_replace("sibuta8","&",$id);
	$id=str_replace("sibuta9","*",$id);
	$id=str_replace("sibutaa","(",$id);
	$id=str_replace("sibutab",")",$id);
	$id=str_replace("sibutac","-",$id);
	$id=str_replace("sibutad","+",$id);
	$id=str_replace("sibutae","=",$id);
	$id=str_replace("sibutaf","/",$id);
	$id=str_replace("sibutag",".",$id);
	$id=str_replace("sibutah","<",$id);
	$id=str_replace("sibutai",">",$id);
	$id=str_replace("sibutaj","|",$id);
	$id=str_replace("sibutak","~",$id);
	$id=str_replace("sibutal","[",$id);
	$id=str_replace("sibutam","]",$id);
	$id=str_replace("sibutan","{",$id);
	$id=str_replace("sibutao","}",$id);
	$id=str_replace("sibutap","?",$id);
	$ci = &get_instance();
	$ci->load->model("m_umum");
	$id=$ci->m_umum->desc($id);
	return $id;
	}
	function bulan($bulan)
	{
		if($bulan==1){
		return "Januari"; }
		elseif($bulan==2){
		return "Februari"; }
		elseif($bulan==3){
		return "Maret"; }
		elseif($bulan==4){
		return "April"; }
		elseif($bulan==5){
		return "Mei"; }
		elseif($bulan==6){
		return "Juni"; }
		elseif($bulan==7){
		return "Juli"; }
		elseif($bulan==8){
		return "Agustus"; }
		elseif($bulan==9){
		return "September"; }
		elseif($bulan==10){
		return "Oktober"; }
		elseif($bulan==11){
		return "November"; }
		elseif($bulan==12){
		return "Desember"; }
		
	}
	
	function minggu($data)
	{
	$pecah=explode("-",$data);
	$id=$pecah[0];
	$tahun=$pecah[1];
	$bagi=$id/4;
	$hasilBagi=$id%4;
	if($hasilBagi==0){
	$hasilBagi=4; }
	$bulan=ceil($bagi);
		if($bulan==1){
		$bln="Januari"; }
		elseif($bulan==2){
		$bln= "Februari"; }
		elseif($bulan==3){
		$bln= "Maret"; }
		elseif($bulan==4){
		$bln= "April"; }
		elseif($bulan==5){
		$bln= "Mei"; }
		elseif($bulan==6){
		$bln= "Juni"; }
		elseif($bulan==7){
		$bln= "Juli"; }
		elseif($bulan==8){
		$bln= "Agustus"; }
		elseif($bulan==9){
		$bln= "September"; }
		elseif($bulan==10){
		$bln= "Oktober"; }
		elseif($bulan==11){
		$bln= "November"; }
		elseif($bulan==12){
		$bln= "Desember"; }
		else{
		$bln= "Januari"; }
	return "Minggu ke ".$hasilBagi."-".$bln."-".$tahun; 
	
	
	}
	

 function UploadImageResize($dir,$jenis,$width){
	 if($jenis=="jpg" or $jenis=="JPG" or $jenis=="jpeg")
	 {
	   //direktori gambar
	   $vdir_upload = $dir;
	   $vfile_upload = $vdir_upload;

	   //identitas file asli
	   $im_src = imagecreatefromjpeg($vfile_upload);
	   $src_width = imageSX($im_src);
	   $src_height = imageSY($im_src);

	   //Set ukuran gambar hasil perubahan
	   $dst_width = $width;
	   $dst_height = ($dst_width/$src_width)*$src_height;

	   //proses perubahan ukuran
	   $im = imagecreatetruecolor($dst_width,$dst_height);
	   imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
	   imagejpeg($im,$vdir_upload,$width);
	   //remove chaceh
	   imagedestroy($im_src);
	   imagedestroy($im);
	 }
 }




}
?>