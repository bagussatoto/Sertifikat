<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	

	function __construct()
	{
		parent::__construct();	
		$this->load->model('M_login','mdl');		
		date_default_timezone_set('Asia/Jakarta');
	}

	
	function _template($data)
	{
		$this->load->view('temp_login/main',$data);
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
	 
	
	function cekLogin()
	{
		$hasil=$this->mdl->cekLogin();
		echo json_encode($hasil);
	}
	
	/*public function add_data()
	{
		$data=$this->mdl->add();
		echo json_encode($data);
	}*/
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect("login");
	}

}

