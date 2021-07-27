<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	
	public function __construct(){
		parent:: __construct();
		$this->load->model('publik_m');		
		$this->load->model('config_m');
		$this->load->helper('url');
		$this->load->helper('xss_helper');
		$this->load->helper('date_helper');
		$this->load->helper('cookie');
		$this->load->library("security");
		$this->load->library('pagination');
		$this->load->library('email');
		date_default_timezone_set("Asia/Bangkok");
	}
	
	public function index(){
		$mainconfig=$this->config_m->get_config();
		$data['site']=$this->security->xss_clean(isset($mainconfig->name_website)?($mainconfig->name_website):'');
		$data['title']=$this->security->xss_clean(isset($mainconfig->title_public)?($mainconfig->title_public):'.:TITLE');
		$data['header']=$this->security->xss_clean(isset($mainconfig->header_public)?($mainconfig->header_public):'HEADER');
		$data['logo']=$this->security->xss_clean(isset($mainconfig->logo_public)?($mainconfig->logo_public):'not_logo.png');
		$data['favicon']=$this->security->xss_clean(isset($mainconfig->favicon)?($mainconfig->favicon):'');
		$data['copyright']=$this->security->xss_clean(isset($mainconfig->footer)?($mainconfig->footer):'');
		
		$ip    = $this->input->ip_address(); // Mendapatkan IP komputer user
		$date  = date("Y-m-d"); // Mendapatkan date sekarang
		$waktu = time(); //
		$timeinsert = date("Y-m-d H:i:s");
		// Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini
		$s = $this->db->query("SELECT * FROM counter WHERE ip='".$ip."' AND date='".$date."'")->num_rows();
		$ss = isset($s)?($s):0;
		// Kalau belum ada, simpan data user tersebut ke database
		if($ss == 0){
			$this->db->query("INSERT INTO counter(ip, date, hits, online, time) VALUES('".$ip."','".$date."','1','".$waktu."','".$timeinsert."')");
		}
		// Jika sudah ada, update
		else{
			$this->db->query("UPDATE counter SET hits=hits+1, online='".$waktu."' WHERE ip='".$ip."' AND date='".$date."'");
		}
		$pengunjunghariini       = $this->db->query("SELECT * FROM counter WHERE date='".$date."' GROUP BY ip")->num_rows(); // Hitung jumlah pengunjung
		$dbpengunjung    = $this->db->query("SELECT COUNT(hits) as hits FROM counter")->row(); 
		$totalpengunjung  = isset($dbpengunjung->hits)?($dbpengunjung->hits):0; // hitung total pengunjung
		$bataswaktu       = time() - 300;
		$pengunjungonline = $this->db->query("SELECT * FROM counter WHERE online > '".$bataswaktu."'")->num_rows(); // hitung pengunjung online
		
		$data['pengunjunghariini']=$pengunjunghariini;
		$data['totalpengunjung']=$totalpengunjung;
		$data['pengunjungonline']=$pengunjungonline;
		
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
		$data['contact']=$this->publik_m->contact()->row();
		$data['widget']=$this->publik_m->widget()->result();
		
		if($uri1!='' && $uri2=='' && $uri3=='' && $uri4==''){
			$data['dbpage']=$this->publik_m->get_page('slug',$uri1);
			$dbpage=$this->publik_m->get_page('slug',$uri1);
			$urlpage=$uri1;
			$url=base_url().$uri1;
		}elseif($uri1!='' && $uri2!='' && $uri3=='' && $uri4==''){
			$data['dbpage']=$this->publik_m->get_page('slug',$uri2);
			$dbpage=$this->publik_m->get_page('slug',$uri2);
			$urlpage=$uri2;
			$url=base_url().$uri1.'/'.$uri2;
		}elseif($uri1!='' && $uri2!='' && $uri3!='' && $uri4==''){
			$data['dbpage']=$this->publik_m->get_page('slug',$uri3);
			$dbpage=$this->publik_m->get_page('slug',$uri3);
			$urlpage=$uri3;
			$url=base_url().$uri1.'/'.$uri2.'/'.$uri3;
		}elseif($uri1!='' && $uri2!='' && $uri3!='' && $uri4!=''){
			$data['dbpage']=$this->publik_m->get_page('slug',$uri4);
			$dbpage=$this->publik_m->get_page('slug',$uri4);
			$urlpage=$uri4;
			$url=base_url().$uri1.'/'.$uri2.'/'.$uri3.'/'.$uri4;
		}else{
			$data['dbpage']=$this->publik_m->get_page('slug','home');
			$dbpage=$this->publik_m->get_page('slug','home');
			$urlpage='';
			$url=base_url();
		}
		
		if($dbpage!=''){	 //jika nama page ada di database
			$data['title_page']=isset($dbpage->title_page)?($dbpage->title_page):'';
			$data['desc_page']=isset($dbpage->desc_page)?($dbpage->desc_page):'';
			
			//$data['agenda_grid']=$this->publik_m->agenda_grid()->result();
			//$data['news_grid']=$this->publik_m->news_grid()->result();
			$data['slider_full']=$this->publik_m->slider_full()->result();
			$data['service']=$this->publik_m->service()->result();
			$data['plusvalue']=$this->publik_m->plusvalue()->result();
			$data['question']=$this->publik_m->question()->result();
			$data['portfolio_grid']=$this->publik_m->portfolio_grid()->result();
			
			if($urlpage=='home'){
				$logo=isset($mainconfig->logo_public)?($mainconfig->logo_public):'not_logo.png';
				$data['metatitle']=$this->security->xss_clean(isset($mainconfig->title_public)?($mainconfig->title_public):'.:TITLE');
				$data['metadesc']=$this->security->xss_clean(strip_tags(isset($mainconfig->header_public)?($mainconfig->header_public):'HEADER'));
				$data['metaimage']=''.base_url().'theme/images/'.$logo.'';
				$data['metaurl']=''.base_url().'home';
			}else{
				$cap=str_replace("-"," ",$urlpage);
				$desc=strip_tags(isset($dbpage->desc_page)?($dbpage->desc_page):'');
				$logo=isset($mainconfig->logo_public)?($mainconfig->logo_public):'not_logo.png';
				$data['metatitle']=strtoupper(isset($cap)?($cap):'HEADER');
				$data['metadesc']=substr($desc, 0, 120).'...';
				$data['metaimage']=''.base_url().'theme/images/'.$logo.'';
				$data['metaurl']=$url;
			}
				
			$n=$this->input->get_post('n');

			$data['konten'] = "layout_public/index";
			$this->load->view("layout_public/layout",$data);					
			
		}else{
			if(preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $uri4)) { //validation uri date
				if($news_detail==true){
					$data['konten'] = "layout_public/vportfoliodetail";
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
	
	public function portfolio(){
		$mainconfig=$this->config_m->get_config();
		$data['site']=$this->security->xss_clean(isset($mainconfig->name_website)?($mainconfig->name_website):'');
		$data['title']=$this->security->xss_clean(isset($mainconfig->title_public)?($mainconfig->title_public):'.:TITLE');
		$data['header']=$this->security->xss_clean(isset($mainconfig->header_public)?($mainconfig->header_public):'HEADER');
		$data['logo']=$this->security->xss_clean(isset($mainconfig->logo_public)?($mainconfig->logo_public):'not_logo.png');
		$data['favicon']=$this->security->xss_clean(isset($mainconfig->favicon)?($mainconfig->favicon):'');
		$data['copyright']=$this->security->xss_clean(isset($mainconfig->footer)?($mainconfig->footer):'');
		
		$ip    = $this->input->ip_address(); // Mendapatkan IP komputer user
		$date  = date("Y-m-d"); // Mendapatkan date sekarang
		$waktu = time(); //
		$timeinsert = date("Y-m-d H:i:s");
		// Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini
		$s = $this->db->query("SELECT * FROM counter WHERE ip='".$ip."' AND date='".$date."'")->num_rows();
		$ss = isset($s)?($s):0;
		// Kalau belum ada, simpan data user tersebut ke database
		if($ss == 0){
			$this->db->query("INSERT INTO counter(ip, date, hits, online, time) VALUES('".$ip."','".$date."','1','".$waktu."','".$timeinsert."')");
		}
		// Jika sudah ada, update
		else{
			$this->db->query("UPDATE counter SET hits=hits+1, online='".$waktu."' WHERE ip='".$ip."' AND date='".$date."'");
		}
		$pengunjunghariini       = $this->db->query("SELECT * FROM counter WHERE date='".$date."' GROUP BY ip")->num_rows(); // Hitung jumlah pengunjung
		$dbpengunjung    = $this->db->query("SELECT COUNT(hits) as hits FROM counter")->row(); 
		$totalpengunjung  = isset($dbpengunjung->hits)?($dbpengunjung->hits):0; // hitung total pengunjung
		$bataswaktu       = time() - 300;
		$pengunjungonline = $this->db->query("SELECT * FROM counter WHERE online > '".$bataswaktu."'")->num_rows(); // hitung pengunjung online
		
		$data['pengunjunghariini']=$pengunjunghariini;
		$data['totalpengunjung']=$totalpengunjung;
		$data['pengunjungonline']=$pengunjungonline;
		
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
		$data['contact']=$this->publik_m->contact()->row();
		$data['widget']=$this->publik_m->widget()->result();
		
		if($uri1!='' && $uri2=='' && $uri3=='' && $uri4==''){
			$data['dbpage']=$this->publik_m->get_page('slug',$uri1);
			$dbpage=$this->publik_m->get_page('slug',$uri1);
			$urlpage=$uri1;
			$url=base_url().$uri1;
		}elseif($uri1!='' && $uri2!='' && $uri3=='' && $uri4==''){
			$data['dbpage']=$this->publik_m->get_page('slug',$uri2);
			$dbpage=$this->publik_m->get_page('slug',$uri2);
			$urlpage=$uri2;
			$url=base_url().$uri1.'/'.$uri2;
		}elseif($uri1!='' && $uri2!='' && $uri3!='' && $uri4==''){
			$data['dbpage']=$this->publik_m->get_page('slug',$uri3);
			$dbpage=$this->publik_m->get_page('slug',$uri3);
			$urlpage=$uri3;
			$url=base_url().$uri1.'/'.$uri2.'/'.$uri3;
		}elseif($uri1!='' && $uri2!='' && $uri3!='' && $uri4!=''){
			$data['dbpage']=$this->publik_m->get_page('slug',$uri4);
			$dbpage=$this->publik_m->get_page('slug',$uri4);
			$urlpage=$uri4;
			$url=base_url().$uri1.'/'.$uri2.'/'.$uri3.'/'.$uri4;
		}else{
			$data['dbpage']=$this->publik_m->get_page('slug','home');
			$dbpage=$this->publik_m->get_page('slug','home');
			$urlpage='';
			$url=base_url();
		}
		
		if($dbpage!=''){	 //jika nama page ada di database
			$data['title_page']=isset($dbpage->title_page)?($dbpage->title_page):'';
			$data['desc_page']=isset($dbpage->desc_page)?($dbpage->desc_page):'';
			
			$data['slider_full']=$this->publik_m->slider_full()->result();
			$data['service']=$this->publik_m->service()->result();
			$data['plusvalue']=$this->publik_m->plusvalue()->result();
			$data['question']=$this->publik_m->question()->result();
			$data['portfolio_grid']=$this->publik_m->portfolio_grid()->result();
			
			if($urlpage=='home'){
				$logo=isset($mainconfig->logo_public)?($mainconfig->logo_public):'not_logo.png';
				$data['metatitle']=$this->security->xss_clean(isset($mainconfig->title_public)?($mainconfig->title_public):'.:TITLE');
				$data['metadesc']=$this->security->xss_clean(strip_tags(isset($mainconfig->header_public)?($mainconfig->header_public):'HEADER'));
				$data['metaimage']=''.base_url().'theme/images/'.$logo.'';
				$data['metaurl']=''.base_url().'home';
			}else{
				$cap=str_replace("-"," ",$urlpage);
				$desc=strip_tags(isset($dbpage->desc_page)?($dbpage->desc_page):'');
				$logo=isset($mainconfig->logo_public)?($mainconfig->logo_public):'not_logo.png';
				$data['metatitle']=strtoupper(isset($cap)?($cap):'HEADER');
				$data['metadesc']=substr($desc, 0, 120).'...';
				$data['metaimage']=''.base_url().'theme/images/'.$logo.'';
				$data['metaurl']=$url;
			}
				
			$n=$this->input->get_post('n');

			$data['konten'] = "layout_public/index";
			$this->load->view("layout_public/layout",$data);					
			
		}else{
			if(preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $uri4)) { //validation uri date
				if($news_detail==true){
					$data['konten'] = "layout_public/vportfoliodetail";
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