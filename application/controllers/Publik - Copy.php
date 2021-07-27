<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Publik extends MX_Controller {
	
	public function __construct(){
		parent:: __construct();
		$this->load->model('publik_m');		
		$this->load->model('config_m');
		$this->load->helper('url');
		$this->load->helper('xss_helper');
		$this->load->library("security");
		$this->load->library('pagination');
		$this->load->library('email');
		date_default_timezone_set("Asia/Bangkok");
	}
	
	public function index()
	{	

	}
	
	public function home(){
		$mainkonfig=$this->config_m->get_config();
		$data['site']=$this->security->xss_clean(isset($mainkonfig->name_website)?($mainkonfig->name_website):'');
		$data['title']=$this->security->xss_clean(isset($mainkonfig->title_public)?($mainkonfig->title_public):'');
		$data['favicon']=$this->security->xss_clean(isset($mainkonfig->favicon)?($mainkonfig->favicon):'');
		$data['header']=$this->security->xss_clean(isset($mainkonfig->header_public)?($mainkonfig->header_public):'');
		$data['logo']=$this->security->xss_clean(isset($mainkonfig->logo_public)?($mainkonfig->logo_public):'');
		$data['copyright']=$this->security->xss_clean(isset($mainkonfig->footer)?($mainkonfig->footer):'');
		
		$data['uri1']=$this->uri->segment(1);
		$data['uri2']=$this->uri->segment(2);
		$data['uri3']=$this->uri->segment(3);
		$data['uri4']=$this->uri->segment(4);
		$data['uri5']=$this->uri->segment(5);
		
		$uri1=$this->uri->segment(1);
		$uri2=$this->uri->segment(2);
		$uri3=$this->uri->segment(3);
		$uri4=$this->uri->segment(4);
		$uri5=$this->uri->segment(5);
		
		$data['navbar']=$this->publik_m->get_navbar(); 

		$act_page=$this->input->get_post('p');
		if($act_page=='news'){ /*news pagination*/
			$news_scat=$this->input->get_post('category');
			$news_skey=$this->input->post('skey');
			$this->db->select('*');
			$this->db->where('status', 'publish');
			$this->db->where('trash', '1');
			if($news_scat){$this->db->where('id_category', $news_scat);}
			if($news_skey){$this->db->like('title_news', $news_skey);}
			$newsData = $this->db->get('t_news');
			$totalRow = $newsData->num_rows();
			$base=base_url().'publik/home/'.$uri3.'?category='.$news_scat; 
		}elseif($act_page=='agenda'){ /*agenda pagination*/
			$agenda_scat=$this->input->get_post('category');
			$agenda_skey=$this->input->post('skey');
			$this->db->select('*');
			$this->db->where('status', 'publish');
			$this->db->where('trash', '1');
			if($agenda_scat){$this->db->where('id_category', $agenda_scat);}
			if($agenda_skey){$this->db->like('title_agenda', $agenda_skey);}
			$agendaData = $this->db->get('t_agenda');
			$totalRow = $agendaData->num_rows();
			$base=base_url().'publik/home/'.$uri3.'?category='.$agenda_scat;
		}else{
			$base=base_url().'publik/home/'.$uri3.'?category=';
			$totalRow='';
		}
		$config['base_url'] = $base; //set the base url for pagination
		$config['total_rows'] = $totalRow; //total rows		
		$config['per_page'] = 2; //the number of per page for pagination
		//$config['cur_page'] = 0;//CURRENT PAGE NUMBER
		$config['uri_segment'] = 5; //see from base_url. 3 for this case
		//$config['num_links'] = 1;
		$config['page_query_string'] = TRUE; //type url string true int false
		$config['use_page_numbers'] = TRUE; //Rreal number paging
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';		
		$config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">'; //active paging
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_link'] = '&lt;'; //back
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_link'] = '&gt;'; //next
		$config['next_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_link'] = '&lt;&lt;';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_link'] = '&gt;&gt;';
		$config['last_tag_close'] = '</li>';
		$this->pagination->initialize($config); //initialize pagination
		$page_num=$this->input->get('per_page');
		if($page_num!=''){$offset = ($page_num - 1) * $config['per_page'];}else{$offset=$page_num;}
		
		/*news get*/
		$data['news_offset']=$offset;
		$data['news_list'] = $this->publik_m->news_list($config['per_page'],$offset);
		$news_list= $this->publik_m->news_list($config['per_page'],$offset);
		$data['news_detail'] = $this->publik_m->news_detail($uri5)->row();
		$data['news_category'] = $this->publik_m->get_category('news')->result();
		$data['news_populer'] = $this->publik_m->news_populer()->result();
		$data['news_capcategory'] = $this->publik_m->news_captegory()->row();
		/*meta news*/
		$news_detail=$this->publik_m->news_detail($uri5)->row();
		if($news_detail==true){
			$data['metatitle']=$news_detail->title_news;
			$descfile=$news_detail->desc_news;
			$desccut=strip_tags($descfile);
			$data['metadesc']=substr($desccut, 0, 100).'...';
			$data['metaimage']=''.base_url().'theme/images/news/'.$news_detail->photo_cover.'';
			$data['metaurl']=''.base_url().'/'.$uri3.'/'.$news_detail->date_posting.'/'.$news_detail->slug_news.'';
		}
		/*agenda get*/
		$data['agenda_list'] = $this->publik_m->agenda_list($config['per_page'],$offset);
		$agenda_list= $this->publik_m->agenda_list($config['per_page'],$offset);
		$data['agenda_detail'] = $this->publik_m->agenda_detail($uri5)->row();
		$data['agenda_category'] = $this->publik_m->get_category('agenda')->result();
		$data['agenda_populer'] = $this->publik_m->agenda_populer()->result();
		$data['agenda_capcategory'] = $this->publik_m->agenda_captegory()->row();
		/*meta agenda*/
		$agenda_detail=$this->publik_m->agenda_detail($uri5)->row();
		if($agenda_detail==true){
			$data['metatitle']=$agenda_detail->title_agenda;
			$descfile=$agenda_detail->desc_agenda;
			$desccut=strip_tags($descfile);
			$data['metadesc']=substr($desccut, 0, 100).'...';
			$data['metaimage']=''.base_url().'theme/images/agenda/'.$agenda_detail->photo_cover.'';
			$data['metaurl']=''.base_url().'/'.$uri3.'/'.$agenda_detail->date_posting.'/'.$agenda_detail->slug_agenda.'';
		}

		
		
		if($uri2!='' && $uri3=='' && $uri4=='' && $uri5==''){
			$data['dbpage']=$this->publik_m->get_page('slug',$uri2);
			$dbpage=$this->publik_m->get_page('slug',$uri2);
		}elseif($uri2!='' && $uri3!='' && $uri4=='' && $uri5==''){
			$data['dbpage']=$this->publik_m->get_page('slug',$uri3);
			$dbpage=$this->publik_m->get_page('slug',$uri3);
		}elseif($uri2!='' && $uri3!='' && $uri4!='' && $uri5==''){
			$data['dbpage']=$this->publik_m->get_page('slug',$uri4);
			$dbpage=$this->publik_m->get_page('slug',$uri4);
		}elseif($uri2!='' && $uri3!='' && $uri4!='' && $uri5!=''){
			$data['dbpage']=$this->publik_m->get_page('slug',$uri5);
			$dbpage=$this->publik_m->get_page('slug',$uri5);
		}else{
			$data['dbpage']=$this->publik_m->get_page('slug','home');
			$dbpage=$this->publik_m->get_page('slug','home');
		}
		

		
		if($dbpage!=''){
		$data['title_page']=isset($dbpage->title_page)?($dbpage->title_page):'';
		$data['desc_page']=isset($dbpage->desc_page)?($dbpage->desc_page):'';
			$n=$this->input->get_post('n');
			if($n==1){
				if($news_list==true){
					return $this->load->view('layout_public/list/news',$data);
				}elseif($agenda_list==true){
					return $this->load->view('layout_public/list/agenda',$data);
				}else{
					return 0;
				}
			}else{
				$data['konten'] = "layout_public/index";
				$this->load->view("layout_public/layout",$data);					
			}
		}else{
			if(preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $uri4)) { //validation uri date
				if($news_detail==true){
					$data['konten'] = "layout_public/vnewsdetail";
					$this->load->view("layout_public/layout",$data);
				}else{
					$data['konten'] = "layout_public/404";
					$this->load->view("layout_public/layout",$data);
				}
			}else{
				$data['konten'] = "layout_public/404";
				$this->load->view("layout_public/layout",$data);
			}
		}
			
			
	
		
	}
	

	
	
	

}

/* End of file Map.php */
/* Location: ./application/controllers/welcome.php */