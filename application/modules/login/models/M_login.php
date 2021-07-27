<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model  {
    
		
	public function __construct() {
        parent::__construct();
		//$this->m_konfig->validasi_session("super");
    }
	

	//------------------LOGIN------------------------
	function cekLogin()
	{	
		$pass2=$this->input->post('password');
		$this->db->where("sts_aktif",'1');
		$this->db->where("username",$this->input->post('username'));
		$this->db->where("password",md5($pass2=$this->input->post('password')));
		$loginAdmin=$this->db->get("admin");

		if($loginAdmin->num_rows()==1)
		{
			$login=$loginAdmin->row();
			$level=$this->m_konfig->goField("admin","level","where id_admin='".$login->id_admin."'");
			$nama=$this->getDataLevel($level);
			$this->saveSessionAdmin($login->id_admin,$nama,$pass2);
			$this->updateLoginAdmin("admin",$login->id_admin);
			$var["validasi"]=true; 
			$var["direct"]=$this->direct($nama);
		}else{
	    	 $var["validasi"]=false; 
			 $var["upass"]=false;
		}
		$data=$var;
		return $data;	
	}
	
	
	function getDataLevel($id)//id_level
	{
		$this->db->where("id_level",$id);
		$data=$this->db->get("main_level")->row();
		return $data->levelname;
	}
	function direct($nama)
	{
		$this->db->where("levelname",$nama);
	    $return=$this->db->get("main_level")->row();
	    return isset($return->direct)?($return->direct):"dashboard";
	}
	private function saveSessionAdmin($id,$level,$pass2)
	{
		$array=array(
		"id"=>$id,
		"level"=>strtoupper($level),
		"pass"=>$pass2,
		);
		
		$this->session->set_userdata($array);
		$this->m_konfig->logSave("Login","Login");
		return "1_success";
	}
	function updateLoginAdmin($tbl,$id)
	{	
		$this->db->set("last_login",date("Y-m-d H:i:s"));
		$this->db->where("id_admin",$id);
		return	$this->db->update($tbl);
	}
	


}

?>
 