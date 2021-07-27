<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends ci_Model
{
	var $temp_sertifikat="temp_sertifikat";
	var $temp_element="temp_element";
	public function __construct() {
        parent::__construct();
		//$this->m_konfig->validasi_session("super");
    }

	function get_data_temp()
	{
		$query=$this->_get_data_temp();
		if($_POST['length'] != -1)
		$query.=" limit ".$_POST['start'].",".$_POST['length'];
		return $this->db->query($query)->result();
	}
    function _get_data_temp()
	{
		$query="select * from ".$this->temp_sertifikat." where 1=1";
			if($_POST['search']['value']){
			$searchkey=$_POST['search']['value'];
				$query.=" AND (
				nama_temp LIKE '%".$searchkey."%'
				) ";
			}

		$column = array('id_temp','img_temp','default_temp','nama_temp',);
		 $i = 0;
        foreach ($column as $item) {
            $column[$i] = $item;
        }

        if (isset($_POST['order'])) {
           $query .= " order by " . $column[$_POST['order']['0']['column']] . " " . $_POST['order']['0']['dir'];
        } else if (isset($order)) {
            $order = $order;
            $query .= " order by id_temp DESC";
        }
		return $query;
	}
	public function count_data_temp()
	{				
		$query = $this->_get_data_temp();
        return  $this->db->query($query)->num_rows();
	}
	function input_Temp()
	{
		$var=array();

		$idu=$this->session->userdata("id");
		$input=$this->input->post("f");
		$datainputan=$this->security->xss_clean($input);
		
		$name=$this->input->post("f[nama_temp]");
		$cek=$this->db->query('select nama_temp from '.$this->temp_sertifikat.' where nama_temp="'.$name.'"')->num_rows();
		if($cek)
		{
			$var['gagal']=false;
			$var['info']="Not allowed, code or name already exists.";
			return $var;
		}

		$idp=$this->m_konfig->cekMaxIdTable('id_temp',$this->temp_sertifikat);
		$time=date('His');
		//image1
		if(isset($_FILES['tempimg_front'])){ 
		$lokasi_file = $_FILES['tempimg_front']['tmp_name'];
		$tipe_file   = $_FILES['tempimg_front']['type'];
		$nama_file   = $_FILES['tempimg_front']['name'];
		}else{
			$lokasi_file = '';
			$tipe_file   = '';
			$nama_file   = '';
		}
		  
		  if($tipe_file)
		  {
			$daprof=$this->db->query("select img_temp from ".$this->temp_sertifikat." where id_temp='$idp'")->row();
			$fDB=isset($daprof->img_temp)?($daprof->img_temp):'';
			if($fDB!="")
			 {
				 $path = "theme/images/sertifikat/".$daprof->img_temp;
				 if (file_exists($path)) {
					unlink($path);
				 }
			 } 
			 
			$jenis=explode("/",$tipe_file);
			$jenis=$jenis[1];
			if($jenis=="png" || $jenis=="jpg" || $jenis=="jpeg")
			{
			$jenis="png";
			}
			 $target_path = "theme/images/sertifikat/F".$time.$idp.".".$jenis;
		  }	
		  //
			if (!empty($lokasi_file)) {
				move_uploaded_file($lokasi_file,$target_path);
				$this->konversi->UploadImageResize($target_path,$jenis,1000);
			}
		if($tipe_file!=''){$photo1="F".$time.$idp.".".$jenis;}else{$photo1=$front_photo;}
		
		
		//image2
		if(isset($_FILES['tempimg_back'])){ 
		$lokasi_file2 = $_FILES['tempimg_back']['tmp_name'];
		$tipe_file2   = $_FILES['tempimg_back']['type'];
		$nama_file2   = $_FILES['tempimg_back']['name'];
		}else{
			$lokasi_file2 = '';
			$tipe_file2   = '';
			$nama_file2   = '';
		}
		  if($tipe_file2)
		  {
			$daprof2=$this->db->query("select img_back from ".$this->temp_sertifikat." where id_temp='$idp'")->row();
			$fDB2=isset($daprof2->img_back)?($daprof2->img_back):'';
			if($fDB2!="")
			 {
				 $path2 = "theme/images/sertifikat/".$daprof2->img_back;
				 if (file_exists($path2)) {
					unlink($path2);
				 }
			 } 
			 
			$jenis2=explode("/",$tipe_file2);
			$jenis2=$jenis2[1];
			if($jenis2=="png" || $jenis2=="jpg" || $jenis2=="jpeg")
			{
			$jenis2="png";
			}
			 $target_path2 = "theme/images/sertifikat/B".$time.$idp.".".$jenis2;
		  }	
		  //
			if (!empty($lokasi_file2)) {
				move_uploaded_file($lokasi_file2,$target_path2);
				$this->konversi->UploadImageResize($target_path2,$jenis2,1000);
			}
		if($tipe_file2!=''){$photo2="B".$time.$idp.".".$jenis2;}else{$photo2=$back_photo;}
		
		$this->db->set("img_temp",$photo1);
		$this->db->set("img_back",$photo2);	
		$ctime=date("Y-m-d H:i:s"); 
		$cid=$idu;
		$this->db->set("_ctime",$ctime);
		$this->db->set("_cid",$cid);
		$this->db->set($datainputan);
		$this->db->insert($this->temp_sertifikat);
		$var['table']=true;
		return $var; 
	}
	
	function edit_Temp()
	{
		$id=$this->input->get_post("id");
		$this->db->from($this->temp_sertifikat);
		$this->db->where('id_temp',$id);
		$query = $this->db->get();
		return $query->row();
	}
	function update_Temp()
	{
		$var=array();
		$idu=$this->session->userdata("id");
		$id=$this->input->post("id");
		$input=$this->input->post("f");
		$datainputan=$this->security->xss_clean($input);
		
		$name=$this->input->post("f[nama_temp]");
		$name_b=$this->input->post("nama_temp_b");
		$front_photo=$this->input->post("tempimg_front_b");
		$back_photo=$this->input->post("tempimg_back_b");
		$cek=$this->db->query('select nama_temp from '.$this->temp_sertifikat.' where nama_temp!="'.$name_b.'" AND nama_temp="'.$name.'"')->num_rows();
		if($cek)
		{
			$var['gagal']=false;
			$var['info']="Not allowed, code or name already exists.";
			return $var;
		}
		$time=date('His');
		
		//image1
		if(isset($_FILES['tempimg_front'])){ 
		$lokasi_file = $_FILES['tempimg_front']['tmp_name'];
		$tipe_file   = $_FILES['tempimg_front']['type'];
		$nama_file   = $_FILES['tempimg_front']['name'];
		}else{
			$lokasi_file = '';
			$tipe_file   = '';
			$nama_file   = '';
		}
		  
		  if($tipe_file)
		  {
			$idp=$id;
			$daprof=$this->db->query("select img_temp from ".$this->temp_sertifikat." where id_temp='$idp'")->row();
			$fDB=isset($daprof->img_temp)?($daprof->img_temp):'';
			if($fDB!="")
			 {
				 $path = "theme/images/sertifikat/".$daprof->img_temp;
				 if (file_exists($path)) {
					unlink($path);
				 }
			 } 
			 
			$jenis=explode("/",$tipe_file);
			$jenis=$jenis[1];
			if($jenis=="png" || $jenis=="jpg" || $jenis=="jpeg")
			{
			$jenis="png";
			}
			 $target_path = "theme/images/sertifikat/F".$time.$idp.".".$jenis;
		  }	
		  //
			if (!empty($lokasi_file)) {
				move_uploaded_file($lokasi_file,$target_path);
				$this->konversi->UploadImageResize($target_path,$jenis,1000);
			}
		if($tipe_file!=''){$photo1="F".$time.$idp.".".$jenis;}else{$photo1=$front_photo;}
		
		
		//image2
		if(isset($_FILES['tempimg_back'])){ 
		$lokasi_file2 = $_FILES['tempimg_back']['tmp_name'];
		$tipe_file2   = $_FILES['tempimg_back']['type'];
		$nama_file2   = $_FILES['tempimg_back']['name'];
		}else{
			$lokasi_file2 = '';
			$tipe_file2   = '';
			$nama_file2   = '';
		}
		  if($tipe_file2)
		  {
			$idp=$id;
			$daprof2=$this->db->query("select img_back from ".$this->temp_sertifikat." where id_temp='$idp'")->row();
			$fDB2=isset($daprof2->img_back)?($daprof2->img_back):'';
			if($fDB2!="")
			 {
				 $path2 = "theme/images/sertifikat/".$daprof2->img_back;
				 if (file_exists($path2)) {
					unlink($path2);
				 }
			 } 
			 
			$jenis2=explode("/",$tipe_file2);
			$jenis2=$jenis2[1];
			if($jenis2=="png" || $jenis2=="jpg" || $jenis2=="jpeg")
			{
			$jenis2="png";
			}
			 $target_path2 = "theme/images/sertifikat/B".$time.$idp.".".$jenis2;
		  }	
		  //
			if (!empty($lokasi_file2)) {
				move_uploaded_file($lokasi_file2,$target_path2);
				$this->konversi->UploadImageResize($target_path2,$jenis2,1000);
			}
		if($tipe_file2!=''){$photo2="B".$time.$idp.".".$jenis2;}else{$photo2=$back_photo;}
		
		
		$this->db->set("img_temp",$photo1);
		$this->db->set("img_back",$photo2);
		$utime=date("Y-m-d H:i:s"); 
		$uid=$idu;
		$this->db->set("_utime",$utime);
		$this->db->set("_uid",$uid);
		$this->db->set($datainputan); 
		$this->db->where("id_temp",$id);
		$this->db->update($this->temp_sertifikat);
		$var['table']=true;
		return $var;
	}
	function delete_Temp()
	{
		$id=$this->input->post("id");
		$this->db->where("id_temp",$id);
		return $this->db->delete($this->temp_sertifikat);
	}
	function update_Atdef()
	{
		$var=array();
		$id=$this->input->post("id");
		$cek=$this->db->query('select id_temp from '.$this->temp_sertifikat.' where default_temp="yes"')->row();
		$act_a=$this->db->set('default_temp','not'); 
		$act_a=$this->db->where("id_temp",$cek->id_temp);
		$act_a=$this->db->update($this->temp_sertifikat);
		if($act_a)
		{
			$act_a=$this->db->set('default_temp','yes'); 
			$this->db->where("id_temp",$id);
			$this->db->update($this->temp_sertifikat);
			$var['table']=true;
			return $var;
		}
		
	}
	function element_Sertifikat($id)
	{
		$tempDB=$this->db->query("select id_element from temp_sertifikat where id_temp='".$id."'")->row();
		$this->db->from($this->temp_element);
		$this->db->where('id_element',$tempDB->id_element);
		$query = $this->db->get();
		return $query->row();
	}
	function update_Element()
	{
		$var=array();
		$idu=$this->session->userdata("id");
		$id=$this->input->post("id");
		$input=$this->input->post("f");
		$datainputan=$this->security->xss_clean($input);
		
		$name=$this->input->post("f[name_element]");
		$name_b=$this->input->post("name_element_b");
		$p_photo=$this->input->post("logoimg_b");
		$cek=$this->db->query('select name_element from '.$this->temp_element.' where name_element!="'.$name_b.'" AND name_element="'.$name.'"')->num_rows();
		if($cek)
		{
			$var['gagal']=false;
			$var['info']="Not allowed, code or name already exists.";
			return $var;
		}
		//image
		/*
		if(isset($_FILES['logoimg'])){ 
		$lokasi_file = $_FILES['logoimg']['tmp_name'];
		$tipe_file   = $_FILES['logoimg']['type'];
		$nama_file   = $_FILES['logoimg']['name'];
		}else{
			$lokasi_file = '';
			$tipe_file   = '';
			$nama_file   = '';
		}
			$time=date('His');
		  if($tipe_file)
		  {
			$idp=$id;
			$daprof=$this->db->query("select el_1 from ".$this->temp_element." where id_element='$idp'")->row();
			$fDB=isset($daprof->el_1)?($daprof->el_1):'';
			if($fDB!="")
			 {
				 $path = "theme/images/sertifikat/".$daprof->el_1;
				 if (file_exists($path)) {
					unlink($path);
				 }
			 } 
			$jenis=explode("/",$tipe_file);
			$jenis=$jenis[1];
			if($jenis=="png")
			{
			$jenis="png";
			}
			 $target_path = "theme/images/sertifikat/log".$time.$idp.".".$jenis;
		  }	
		  //
			if (!empty($lokasi_file)) {
				move_uploaded_file($lokasi_file,$target_path);
				$this->konversi->UploadImageResize($target_path,$jenis,500);
			}
		if($tipe_file!=''){$photo="log".$time.$idp.".".$jenis;}else{$photo=$p_photo;}
		$this->db->set("el_1",$photo);*/
		$utime=date("Y-m-d H:i:s"); 
		$uid=$idu;
		$this->db->set("_utime",$utime);
		$this->db->set("_uid",$uid);
		$this->db->set($datainputan); 
		$this->db->where("id_element",$id);
		$this->db->update($this->temp_element);
		$var['table']=true;
		return $var;
	}


}

?>