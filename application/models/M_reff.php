<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_reff extends ci_Model
{
	
	public function __construct() {
        parent::__construct();
    }

	
	function idu()
	{
		return $this->session->userdata("id");
	}
	
	function poto_akun()
	{
		$jk=$this->goField("data_pegawai","jk","where id='".$this->idu()."'");
		if($jk=="l")
		{
			return base_url()."plug/img/l.png";
		}else{
			return base_url()."plug/img/p.png";
		}
	}
	
	function dataProfileAdmin()
	{
		return $this->db->get_where("admin",array("id_admin"=>$this->idu()))->row();
	}
	
	
	 function jk($id)
	 {
	     if($id=="l")
	     {
	         return "Laki-laki";
	     }elseif($id=="p")
	     {
	         return "Perempuan";
	     }
	 }
	 
	
	 
	function zipz($nama_file,$dir,$file)
	{
             $error=true;
            /* nama zipfile yang akan dibuat */
            $zipname = $nama_file.".zip";
            /* proses membuat zip file */
            $zip = new ZipArchive;
            $zip->open($zipname, ZipArchive::CREATE);
             
          //  foreach ($file as $value) {
            $zip->addFile($dir.$file,$file);
        //    }
             $zip->close();
            /* preses pembuatan zip file selesai disini */
             
            /* download file jika eksis*/
            if(file_exists($zipname)){
            header('Content-Type: application/zip');
            header('Content-disposition: attachment; 
            filename="'.$zipname.'"');
            header('Content-Length: ' . filesize($zipname));
            readfile($zipname);
            unlink($zipname);
             
            } else{
            $error = "Proses mengkompresi file gagal  ";
            } //end of if file_exist
            
            return $error;
            
    }
    
    function zip($zip_file,$dir,$data)
    {
            
            
            // Get real path for our folder
            $rootPath = realpath($dir);
            
            // Initialize archive object
            $zip = new ZipArchive();
            $zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);
            
            // Create recursive directory iterator
            /** @var SplFileInfo[] $files */
            $files = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($rootPath),
                RecursiveIteratorIterator::LEAVES_ONLY
            );
            
            foreach ($files as $name => $file)
            {
                // Skip directories (they would be added automatically)
                if (!$file->isDir())
                {
                    // Get real and relative path for current file
                    $filePath = $file->getRealPath();
                    $relativePath = substr($filePath, strlen($rootPath) + 1);
            
                    // Add current file to archive
                   $polder=substr($relativePath,0,6);
                   if (in_array($polder, $data)) {
                       $zip->addFile($filePath, $relativePath);
                    }  
                   
                   
                   
                }
            }
            
            // Zip archive will be created only after closing object
            $zip->close();
            
            
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($zip_file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($zip_file));
            readfile($zip_file);

            
    }
 
	function setToken()
	{
	$code=substr(str_shuffle("123aYbCdEfGhIj0K0opqrStUvwXyZ4567809"),0,25); $this->session->set_userdata("token",$code); 
	echo '<input type="hidden" name="token" value="'.$this->session->userdata("token").'">';
	}
	function cekToken()
	{
		$token_post=$this->input->post("token");
		$token_server=$this->session->userdata("token");
	
		if($token_post==$token_server)
		{
		return true;
		}else{
		return false;
		}
		
	}
	
	function hapus_file($nama_file) //full path
	{
		$filename = $nama_file;

		if (file_exists($filename)) {
			unlink($nama_file);
		}  
		return true;
	}
function upload_file($form,$dok,$nama_file_awal="file",$type_file_yg_diizinkan="JPG,JPEG,PNG",$sizeFile="3000000",$before_file=null,$full="file_upload")
	{		
	$var=array();
	$var["size"]=true; 
	$var["file"]=true;
	$var["validasi"]=false; 
		$nama_file_awal=preg_replace('/[^A-Za-z0-9\ ]/', "",$nama_file_awal);
		$nama_file_awal=str_replace(' ', "-",$nama_file_awal);
		$nama=$nama_file_awal."___".date("dmYHis");
		  $lokasi_file = $_FILES[$form]['tmp_name'];
		  $tipe_file   = $_FILES[$form]['type'];
		  $nama_file   = $_FILES[$form]['name'];
		   $size  	   = $_FILES[$form]['size'];
			 
			 $type_file_yg_diupload =substr(strrchr($nama_file, '.'), 1);
			 $nama=$nama.".".$type_file_yg_diupload;
			 $target_path = $full."/".$dok."/".$nama;
			 
		  $extention=$type_file_yg_diupload;
		  $var["maxsize"]=substr($sizeFile,0,-6); 
		  
		 $pos = strpos(strtoupper($type_file_yg_diizinkan), strtoupper($extention));
		 if ($pos === false) {
			$file_extention=false;
		} else {
			$file_extention=true;
		}
		 if($type_file_yg_diizinkan=="all"){ $file_extention=true; } 
		 
		 $maxsize =$sizeFile;
		 if($size>=$maxsize)
		 {
			$var["size"]=false; 
		 }elseif($file_extention==false){
			$var["file"]=false; $var["type_file"]=$type_file_yg_diizinkan;
		 }else{
			if($before_file!=null)
			{
				$filename=$full."/".$dok."/".$before_file;
				if (file_exists($filename)) {
					unlink($filename);
				} 
			}				
			  
		 	$var["validasi"]=true;
			if (!empty($lokasi_file)) {
			move_uploaded_file($lokasi_file,$target_path);
			 }
			$var["name"]=$nama;
		 }
		 return $var;
	}
	
	function hp($no)
	{
						$hp=str_replace("'","",$no); //hp
						$hp=str_replace("`","",$hp);
			return		str_replace("+62","0",$hp);
	}
	function hapussemua($src){ //nama folder
				$dir = opendir($src);
				while(false !== ( $file = readdir($dir)) ) {
				if (( $file != '.' ) && ( $file != '..' )) {
				$full = $src . '/' . $file;
				if ( is_dir($full) ) {
				hapussemua($full);
				}
				else {
				unlink($full);
				}
				}
				}
				closedir($dir);
				rmdir($src);
	}
	function pengaturan($id)
	{
		$return=$this->db->get_where("pengaturan",array("id"=>$id))->row();
		return $return->val;
	}
	
	 function deleteElement($element,  &$array){
		$index = array_search($element, $array);
		if($index !== false){
			unset($array[$index]);
		}
	}
	
	public function jamValid($jam_aktif,$jam_blok)
	{
		//phpinfo();
		$a=$jam_aktif;
		$a=str_replace(",,",",",$jam_aktif);
		$h=$jam_blok;
		$h=str_replace(",,",",",$jam_blok);
		
		if($a==","){ return false;}
	 
		  $na=SUBSTR($a,-1);
		  $nna=SUBSTR($a,0,1);
		
		if($na==","){
			$a=substr($a,0,-1);
		}
		if($nna==","){
			  $a=substr($a,1);
		}
		
		$array_a=explode(",",$a);
		$array_a = array_unique($array_a); //hapus isi array yg sama
		
		$array_b=explode(",",$h);
		$array_b = array_unique($array_b); //hapus isi array yg sama
		
		
		foreach($array_b as $e){
		$this->deleteElement($e,$array_a);
		}
		
		return count($array_a);
		 
	}
	
	public function jamBlok($jam_blok)
	{
		
	 
		$h=$jam_blok;
		$h=str_replace(",,",",",$jam_blok);
	 
		if(!$h){
		return 0;
		}
		
	 
	 
		  $na=SUBSTR($h,-1);
		  $nna=SUBSTR($h,0,1);
		
		if($na==","){
			$h=substr($h,0,-1);
		}
		if($nna==","){
			  $h=substr($h,1);
		}
		 
		$array_b=explode(",",$h);
		$array_b = array_unique($array_b); //hapus isi array yg sama
		
		
		return count($array_b);
		 
	}
}

?>