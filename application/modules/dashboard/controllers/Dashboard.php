<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller 
{
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
		if($ajax=="yes")
		{
			echo $this->load->view("index");
		}else{
			$data['konten']="index";
			$this->_template($data);
		}
		
	}


	
}
