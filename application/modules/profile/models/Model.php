<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends ci_Model
{
	var $admin="admin";
	public function __construct() {
        parent::__construct();
		//$this->m_konfig->validasi_session("super");
    }
	
	function get_Profile()
	{
		$id=$this->session->userdata("id");
		$this->db->from($this->admin);
		$this->db->where('id_admin',$id);
		$query = $this->db->get();
		return $query->row();
	}
	
	function update_Profile()
	{
		$var=array();
		$idu=$this->session->userdata("id");
		$input=$this->input->post("f");
		$datainputan=$this->security->xss_clean($input);
		
		$username=trim($this->input->post("f[username]"));
		$username_b=trim($this->input->post("username_b"));
		$p_photo=$this->input->post("profileimg_b");
		//$password=md5($this->input->post("password"));

		$cek=$this->db->query('select username from '.$this->admin.' where username!="'.$username_b.'" AND username="'.$username.'"')->num_rows();
		if($cek)
		{
			$var['gagal']=false;
			$var['info']="Not allowed, code or username already exists.";
			return $var;
		}
		//image
		if(isset($_FILES['profileimg'])){ 
		$lokasi_file = $_FILES['profileimg']['tmp_name'];
		$tipe_file   = $_FILES['profileimg']['type'];
		$nama_file   = $_FILES['profileimg']['name'];
		}else{
			$lokasi_file = '';
			$tipe_file   = '';
			$nama_file   = '';
		}
		$time=date('His');
		  if($tipe_file)
		  {
			 $idp=$idu;
			$daprof=$this->m_konfig->dataProfile($idp);
			if($daprof->profileimg!="")
			 {
				 $path = "theme/images/user/".$daprof->profileimg;
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
			 $target_path = "theme/images/user/".$time.$idp.".".$jenis;
		  }	
		  //
			if (!empty($lokasi_file)) {
				move_uploaded_file($lokasi_file,$target_path);
				$this->konversi->UploadImageResize($target_path,$jenis,200);
			}
		if($tipe_file!=''){$photo=$time.$idp.".".$jenis;}else{$photo=$p_photo;}
		$this->db->set("profileimg",$photo);
		$this->db->set($datainputan); 
		//if($password!=''){$this->db->set("password",$password);}
		$this->db->where("id_admin",$idu);
		$this->db->update($this->admin);
		return $var;
	}
	

	function update_Password()
	{
		$var=array();
		$idu=$this->session->userdata('id');
		$userDB=$this->m_konfig->dataProfile($idu);
		$password = $userDB->password;
		$passold = trim(md5($this->input->post('passold')));
		$passnew = trim($this->input->post('passnew'));
		$retpass = trim($this->input->post('retpass'));
		if($passold=='' || $passnew=='' || $retpass==''){
			$var['gagal']=false;
			$var['info']="Make sure all fields are filled";
			return $var;
		}else if($passold != $password){
			$var['gagal']=false;
			$var['info']="The old password is not suitable";
			return $var;
		}else if($passnew != $retpass){
			$var['gagal']=false;
			$var['info']="Please repeat the password correctly";
			return $var;
		}else{

			$this->db->set("password",$this->security->xss_clean(md5($passnew)));
			$this->db->where("id_admin",$idu);
			$this->db->update($this->admin);
			return $var;
		}

		
	}

}

?>