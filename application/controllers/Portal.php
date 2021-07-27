<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Portal extends MX_Controller {
	
	public function __construct(){
		parent:: __construct();
		$this->load->model('portal_m');		
		$this->load->model('config_m');
		$this->load->helper('url');
		$this->load->helper('xss_helper');
		$this->load->helper('date_helper');
		$this->load->library("security");
		$this->load->library('email');
		date_default_timezone_set("Asia/Bangkok");
	}
	
	public function index()
	{	
		$mainconfig=$this->config_m->get_config();
		$data['site']=$this->security->xss_clean(isset($mainconfig->name_website)?($mainconfig->name_website):'');
		$data['title']=$this->security->xss_clean(isset($mainconfig->title_portal)?($mainconfig->title_portal):'.:TITLE');
		$data['header']=$this->security->xss_clean(isset($mainconfig->header_portal)?($mainconfig->header_portal):'HEADER');
		$data['logo']=$this->security->xss_clean(isset($mainconfig->logo_portal)?($mainconfig->logo_portal):'not_logo.png');
		$data['favicon']=$this->security->xss_clean(isset($mainconfig->favicon)?($mainconfig->favicon):'');
		$data['copyright']=$this->security->xss_clean(isset($mainconfig->footer)?($mainconfig->footer):'');
		
		$logo=isset($mainconfig->logo_portal)?($mainconfig->logo_portal):'not_logo.png';
		$data['metatitle']=$this->security->xss_clean(isset($mainconfig->title_portal)?($mainconfig->title_portal):'.:TITLE');
		$data['metadesc']=$this->security->xss_clean(strip_tags(isset($mainconfig->header_portal)?($mainconfig->header_portal):'HEADER'));
		$data['metaimage']=''.base_url().'theme/images/'.$logo.'';
		$data['metaurl']=''.base_url().'';
		
		$data['portal']=$this->portal_m->get_portal()->result();

		$this->load->view("layout_public/vportal",$data);	
					
		
	}
	

	

	
	
	

}

/* End of file Map.php */
/* Location: ./application/controllers/welcome.php */