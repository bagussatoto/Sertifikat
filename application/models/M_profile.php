<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_profile extends ci_Model
{
	
	public function __construct() {
        parent::__construct();
     	}
	
	function dataProfile($id)
	{
		return $this->db->get_where("admin",array("id_admin"=>$id))->row();
	}
	
	
	public function upload_img($id)
	{	$this->m_konfig->log("admin","Upload photo");
		///
		  $lokasi_file = $_FILES['gambar']['tmp_name'];
		  $tipe_file   = $_FILES['gambar']['type'];
		  $nama_file   = $_FILES['gambar']['name'];
		  if($tipe_file)
		  {
		  $daprof=$this->dataProfile($id);
		  if($daprof->poto!="")
			 {
				 $path = "file_upload/dp/".$daprof->poto;
				 if (file_exists($path)) {
					unlink($path);
				 }
			 }
			$jenis=explode("/",$tipe_file);
			$jenis=$jenis[1];
			if($jenis=="png" || $jenis=="jpg" || $jenis=="jpeg")
			{
			$jenis="jpg";
			}
			 $target_path = "file_upload/dp/".$id.".".$jenis;
			 //
		  }
		  //
		if (!empty($lokasi_file)) {
		move_uploaded_file($lokasi_file,$target_path);
		$array=array("poto"=>$id.".".$jenis);
		$this->db->where("id_admin",$id);
		if($jenis=="png"){
		$this->konversi->UploadImageResize($target_path,$jenis,200);
		}
		return $this->db->update("admin",$array);
		}
	}
	private function cekPassword($id)
	{
	if($id!="all"){
	$this->db->where("id_admin!=",$id);
	}
	$this->db->where("username",$this->input->post('username'));
	$this->db->where("password",md5($this->input->post('password')));
	return $this->db->get("admin")->num_rows();
	}
	
	function update($id)
	{
	if(isset($_FILES['gambar']['type']))
	{
	$this->upload_img($id);
	}
	
		
	if($this->input->post("level"))
	{
		$data1=array(
		"level"=>$this->input->post("level"),
		);
	}else{ $data1=array(); };
	
	$data2=array(
	"username"=>$this->input->post("username"),
	"owner"=>$this->input->post("owner"),
	"telp"=>$this->input->post("telp"),
	"email"=>$this->input->post("email"),
	);
	$data=array_merge($data1,$data2);
	$this->db->where("id_admin",$id);
	$this->db->update("admin",$data);	
		
		
	if($this->input->post("password"))
	{
		if($this->cekPassword($id))
		{
		return 0;//password tidak tersedia
		}else
		{	$this->m_konfig->log("admin","ganti password");
		$password=md5($this->input->post("password"));
		}
	}else { $dt=$this->dataProfile($id);	$password=$dt->password; $this->m_konfig->log("admin","update data profile"); };
	
	$data=array(
	"password"=>$password,
	);
	$this->db->where("id_admin",$id);
	return $this->db->update("admin",$data);

	
	
	}
	
	
	
	function update_akun($id)
	{
	if(isset($_FILES['gambar']['type']))
	{
	$this->upload_img($id);
	}
	
		
	if($this->input->post("level"))
	{
		$data1=array(
		"level"=>$this->input->post("level"),
		);
	}else{ $data1=array(); };
	
	$data2=array(
	"username"=>$this->input->post("username"),
	"owner"=>$this->input->post("owner"),
	"telp"=>$this->input->post("telp"),
	"email"=>$this->input->post("email"),
	);
	$data=array_merge($data1,$data2);
	$this->db->where("id_admin",$id);
	$this->db->update("admin",$data);	
		
	
	$dataPbk=array(
		"Name"=>$this->input->post("akun"),
		"modem"=>$this->input->post("modem"),
		"key"=>$this->input->post("key"),
		"no_center"=>$this->input->post("center"),
		"akses_inbox"=>$this->input->post("aksesinbox"),
		);
		$this->db->where("ID",$id);
		$this->db->update("pbk_groups",$dataPbk);
	
	if($this->input->post("password"))
	{
		if($this->cekPassword($id))
		{
		return 0;//password tidak tersedia
		}else
		{	$this->m_konfig->log("admin","ganti password");
		$password=md5($this->input->post("password"));
		}
	}else { $dt=$this->dataProfile($id);	$password=$dt->password; $this->m_konfig->log("admin","update data profile"); };
	
	$data=array(
	"password"=>$password,
	);
	$this->db->where("id_admin",$id);
	return $this->db->update("admin",$data);

	
	}
	
	
	
	
	
	function cekMaxIdAdmin()
	{
	$db=$this->db->query("select MAX(id_admin) as max from admin")->row();
	return $db->max;
	}
	
	function add_akun()
	{
		
	$password=md5($this->input->post("password"));
	$data=array(
	"username"=>$this->input->post("username"),
	"password"=>$password,
	"owner"=>$this->input->post("owner"),
	"level"=>"3",
	"telp"=>$this->input->post("telp"),
	"email"=>$this->input->post("email"),
	);
	
	
	
		if($this->cekPassword("all")>0)
		{
		return 0;//password tidak tersedia
		}else
		{
			
		
		$this->db->insert("admin",$data);
		
		$dataPbk=array(
		"ID"=>$this->cekMaxIdAdmin(),
		"Name"=>$this->input->post("akun"),
		"modem"=>$this->input->post("modem"),
		"key"=>$this->input->post("key"),
		"sms_reg"=>"Terimakasih {NAMA} sudah mendaftar di group",
		"sms_unreg"=>"Data anda sudah di hapus dari keanggotaan group",
		"no_center"=>$this->input->post("center"),
		"akses_inbox"=>$this->input->post("aksesinbox"),
		"key"=>substr(str_shuffle("23456789ANCDEFGHJKLMPQRSTUVWXYA"),0,10),
		);
		$this->db->insert("pbk_groups",$dataPbk);
		
		//////////
		$idadmin=$this->cekMaxIdAdmin();
		if(isset($_FILES['gambar']['type']))
		{
		$this->upload_img($idadmin);
		}
		
		return true;
		}
	
	}
	
	
	
	function add_dataUser()
	{
		
	$password=md5($this->input->post("password"));
	$data=array(
	"username"=>$this->input->post("username"),
	"password"=>$password,
	"owner"=>$this->input->post("owner"),
	"level"=>$this->input->post("level"),
	"telp"=>$this->input->post("telp"),
	"email"=>$this->input->post("email"),
	);
	
		if($this->cekPassword("all")>0)
		{
		return 0;//password tidak tersedia
		}else
		{
		    
		$this->db->insert("admin",$data);
		//////////
		$idadmin=$this->cekMaxIdAdmin();
		if(isset($_FILES['gambar']['type']))
		{
		$this->upload_img($idadmin);
		}
		
		return true;
		}
	
	}
	
	//Pengaturan data referensi
	function cekKeyAkun($key)
	{	$ID=$this->session->userdata("id");
		$this->db->where("ID!=",$ID);
		$this->db->where("key",$key);
	return	$this->db->get("pbk_groups")->num_rows();
	}
	function saveHeaderKode()
	{
	$cek=$this->cekKeyAkun($key=$this->input->post("kode"));
	if($cek){ return false; };
	$data=array(
	"Name"=>$this->input->post("header"),
	"key"=>$key,
	);
	$ID=$this->session->userdata("id");
	$this->db->where("ID",$ID);
	return $this->db->update("pbk_groups",$data);
	}
	function saveBlacklist()
	{
	$data=array(
	"blokir"=>$this->input->post("nomor"),
	);
	$ID=$this->session->userdata("id");
	$this->db->where("ID",$ID);
	return $this->db->update("pbk_groups",$data);
	}
	
	function dataForm()
	{
	$ID=$this->session->userdata("id");
	$this->db->where("ID",$ID);
	$data=$this->db->get("pbk_groups")->row();
	return isset($data->title)?($data->title):"";
	}
	function updateForm()
	{
	  $ID=$this->session->userdata("id");
	    $form=$this->input->post("id[]");
		 $data="";
		foreach($form as $form)
		{
		$data.=$form."_:|:_";
		}
		$data=substr($data,0,-5);
		////
		$dataAwal=$this->profile->dataForm();
		$jmlDataAwal=explode("_:|:_",$dataAwal);
		$jmlBaru=explode("_:|:_",$data);
		
		if(count($jmlDataAwal)!=count($jmlBaru)){
			$this->db->where("GroupID",$ID);
			$this->db->delete("pbk");
		}
		
		
		
		$this->db->where("ID",$ID);
		$dataray=array("title"=>$data);
	return	$this->db->update("pbk_groups",$dataray);
	}
	
	function saveFormField()
	{
	$ID=$this->session->userdata("id");
	$data=$this->profile->dataForm();
	$dataField=$this->input->post("formField");
		$this->db->where("ID",$ID);
		$dataray=array("title"=>$data."_:|:_".$dataField);
	return	$this->db->update("pbk_groups",$dataray);
	}
	
	
}

?>