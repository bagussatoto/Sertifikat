<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		$this->m_konfig->validasi_session(array("super","admin"));
		$this->load->model("model","mdl");
		//$this->load->helper('slug_helper');
		//$this->load->helper('xss_helper');
		//$this->load->helper('url');
		//$this->load->helper('form');
		//$this->load->library("security");		
		date_default_timezone_set('Asia/Jakarta');
	}
	 
	function _template($data)
	{
		$this->load->view('temp_user/main',$data);	
	}
	 
	public function index()
	{
		 	
		$ajax=$this->input->get_post("ajax");
		$data['data']=$this->mdl->get_Profile();
		if($ajax=="yes")
		{
			echo $this->load->view("index",$data);
		}else{
			$data['konten']="index";
			$this->_template($data);
		}
		
	}
	
	function update_Profile()
	{
		$data=$this->mdl->update_Profile();
	 	echo json_encode($data);
	}
	
	
	public function new_password()
	{
		 	
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			echo $this->load->view("new_password");
		}else{
			$data['konten']="new_password";
			$this->_template($data);
		}
		
	}
	
	function update_Password()
	{
		$data=$this->mdl->update_Password();
		echo json_encode($data);
	}


	
	
	
	

	
}
