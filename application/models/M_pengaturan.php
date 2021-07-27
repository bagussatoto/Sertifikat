<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengaturan extends ci_Model
{
	
	public function __construct() {
        parent::__construct();
	//	$this->m_konfig->validasi_session("super");
     	}

	function pengaturan($id)
	{
		$this->db->where("id_pengaturan",$id);
		$data=$this->db->get("pengaturan")->row();
		return isset($data->val)?($data->val):"";
	}
	function simpan()
	{
		$data=array(
		"val"=>$this->input->post("nama"),
		);
		$this->db->where("id_pengaturan","3");
		$this->db->update("pengaturan",$data);
		
		$data=array(
		"val"=>$this->input->post("blacklist"),
		);
		$this->db->where("id_pengaturan","4");
		$this->db->update("pengaturan",$data);
		
		
		$data=array(
		"val"=>$this->input->post("isi"),
		);
		$this->db->where("id_pengaturan","5");
		 $this->db->update("pengaturan",$data);
		
		$data=array(
		"val"=>$this->input->post("modem"),
		);
		$this->db->where("id_pengaturan","6");
		 $this->db->update("pengaturan",$data);
		
		$data=array(
		"val"=>$this->input->post("center"),
		);
		$this->db->where("id_pengaturan","2");
		return $this->db->update("pengaturan",$data);
	}
	
}

?>