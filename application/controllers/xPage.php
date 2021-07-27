<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MX_Controller {
	
	public function __construct(){
		parent:: __construct();
		$this->load->model('page_m');
		$this->load->model('publik_m');
		$this->load->model('config_m');
		$this->load->helper('xss_helper');
		$this->load->library("security");
		$this->load->library('pagination');
		$this->load->library('email');
		date_default_timezone_set("Asia/Bangkok");
	}
	
	public function index(){}
	
	public function product(){
		$mainkonfig=$this->config_m->get_configpublik();
		$data['title']=$this->security->xss_clean(isset($mainkonfig->title_public)?($mainkonfig->title_public):'');
		$data['favicon']=$this->security->xss_clean(isset($mainkonfig->favicon)?($mainkonfig->favicon):'');
		$data['header']=$this->security->xss_clean(isset($mainkonfig->header_public)?($mainkonfig->header_public):'');
		$data['logo']=$this->security->xss_clean(isset($mainkonfig->logo_public)?($mainkonfig->logo_public):'');
		$data['copyright']=$this->security->xss_clean(isset($mainkonfig->footer)?($mainkonfig->footer):'');
		$data['contact'] = $this->publik_m->get_contact();

		// konfigurasi pagination
		$cat=$this->uri->segment(3);
		$search = $this->input->post('key');
		$this->db->select('*');
		if($cat){$this->db->where('cd_category', $cat);}
		$this->db->where('status', 'publish');
		$this->db->where('trash', '1');
		if($search!=''){$this->db->like('title_product', $search);}
		$getData = $this->db->get('t_product');
		$a = $getData->num_rows();
		if($cat){$config['base_url'] = base_url().'page/product/'.$cat.'';}else{$config['base_url'] = base_url().'page/product/0';} //set the base url for pagination
		$config['total_rows'] = $a; //total rows
		$config['per_page'] = 6; //the number of per page for pagination
		$config['uri_segment'] = 4; //see from base_url. 3 for this case
		//$config['page_query_string'] = TRUE;
		$config['full_tag_open'] = '<ul class="page_pagination center">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';		
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
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
		$data['product'] = $this->page_m->product($config['per_page'],$this->uri->segment(4));
		$data['category']=$this->page_m->categoryproduct()->result();
		$data['populer']=$this->page_m->productpopuler()->result();
		$jdl=$this->page_m->title_categoryproduct()->row();
		if($cat){$data['capcategory']=isset($jdl->nm_category)?($jdl->nm_category):'';}else{$data['capcategory']='';}
		$data['konten']="layout_public/product/vmain";
		$c=$this->input->post('c');
		if($c==1){
			$this->load->view("layout_public/product/list",$data);
		}else{
			$this->load->view("layout_public/layout",$data);
		}		
	}
	public function detail_product(){
		$mainkonfig=$this->config_m->get_configpublik();
		$data['title']=$this->security->xss_clean(isset($mainkonfig->title_public)?($mainkonfig->title_public):'');
		$data['favicon']=$this->security->xss_clean(isset($mainkonfig->favicon)?($mainkonfig->favicon):'');
		$data['header']=$this->security->xss_clean(isset($mainkonfig->header_public)?($mainkonfig->header_public):'');
		$data['logo']=$this->security->xss_clean(isset($mainkonfig->logo_public)?($mainkonfig->logo_public):'');
		$data['copyright']=$this->security->xss_clean(isset($mainkonfig->footer)?($mainkonfig->footer):'');
		$data['contact'] = $this->publik_m->get_contact();
		
		$db=$this->page_m->detail_product()->row();
		$title=isset($db->title_product)?($db->title_product):'';
		$slug=isset($db->slug_product)?($db->slug_product):'';
		$category=isset($db->nm_category)?($db->nm_category):'';
		$desc=isset($db->desc_product)?($db->desc_product):'';
		$datepost=isset($db->date_posting)?($db->date_posting):'';
		$photo=isset($db->photo_cover)?($db->photo_cover):'';
		$id_user=isset($db->id_user)?($db->id_user):'';
		$deskfoto=isset($db->desc_photo)?($db->desc_photo):'';
		$visit=isset($db->visit_product)?($db->visit_product):'0';
		/*meta*/
		$data['metatitle']=$title;
		$data['metadesc']='';
		$data['metaimage']=''.base_url().'theme/images/product/'.$photo.'';
		$data['metaurl']=''.base_url().''.$datepost.'/'.$slug.'';
		/*detail*/
		$data['titlepost']=$title;
		$data['imgpost']=$photo;
		$data['datepost']=$datepost;
		$data['descpost']=$desc;
		$data['capcategory']=$category;
		$data['deskfoto']=$deskfoto;
		$data['visitpost']=$visit;
		//$penulis=$this->page_m->get_penulis('user',$id_user)->row();
		//$data['penulis']=isset($penulis->fullname)?($penulis->fullname):'';
		
		$data['category']=$this->page_m->categoryproduct()->result();
		$data['populer']=$this->page_m->productpopuler()->result();
		
		$data['konten'] = "layout_public/product/detail";
		$this->load->view("layout_public/layout",$data);
	}
	public function visit_product($id){
		$t=$this->db->query("select MAX(visit_product)+1 AS visit_product from t_product where id_product='".$id."'")->row();
		$v=$t->visit_product;
		if($v==NULL){$v='1';}else{$v;}
		$val=$v;
		$data=array(
			"visit_product"=>$val,
		);
		$update=$this->db->where("id_product",$id);
		$update=$this->db->update("t_product",$data);
		return $update;
	}
	
	
	public function tutorial(){
		$mainkonfig=$this->config_m->get_configpublik();
		$data['title']=$this->security->xss_clean(isset($mainkonfig->title_public)?($mainkonfig->title_public):'');
		$data['favicon']=$this->security->xss_clean(isset($mainkonfig->favicon)?($mainkonfig->favicon):'');
		$data['header']=$this->security->xss_clean(isset($mainkonfig->header_public)?($mainkonfig->header_public):'');
		$data['logo']=$this->security->xss_clean(isset($mainkonfig->logo_public)?($mainkonfig->logo_public):'');
		$data['copyright']=$this->security->xss_clean(isset($mainkonfig->footer)?($mainkonfig->footer):'');
		$data['contact'] = $this->publik_m->get_contact();

		// konfigurasi pagination
		$cat=$this->uri->segment(3);
		$cata=$this->input->post('scat');
		$search = $this->input->post('key');
		$this->db->select('*');
		$this->db->where('status', 'publish');
		$this->db->where('trash', '1');
		if($cat){$this->db->where('slug_category', $cat);}
		if($cata){$this->db->where('slug_category', $cata);}
		if($search!=''){$this->db->like('title_tutorial', $search);}
		$getData = $this->db->get('t_tutorial');
		$a = $getData->num_rows();
		if($cat){$config['base_url'] = base_url().'page/tutorial/'.$cat.'';}else{$config['base_url'] = base_url().'page/tutorial/0';} //set the base url for pagination
		$config['total_rows'] = $a; //total rows
		$config['per_page'] = 3; //the number of per page for pagination
		$config['uri_segment'] = 4; //see from base_url. 3 for this case
		//$config['page_query_string'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination-list">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';		
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
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
		$data['tutorial'] = $this->page_m->tutorial($config['per_page'],$this->uri->segment(4));
		$data['slugcategory'] = $cat;
		$jdl=$this->page_m->title_categorytutorial()->row();
		if($cat){$data['capcategory']=isset($jdl->nm_category)?($jdl->nm_category):'';}else{$data['capcategory']='';}
		if($cat){$data['konten']="layout_public/tutorial/vmain";}else{$data['konten']="";}
		$c=$this->input->post('c');
		if($c==1){
			$this->load->view("layout_public/tutorial/list",$data);
		}else{
			$this->load->view("layout_public/layout",$data);
		}		
	}
	public function detail_tutorial(){
		$mainkonfig=$this->config_m->get_configpublik();
		$data['title']=$this->security->xss_clean(isset($mainkonfig->title_public)?($mainkonfig->title_public):'');
		$data['favicon']=$this->security->xss_clean(isset($mainkonfig->favicon)?($mainkonfig->favicon):'');
		$data['header']=$this->security->xss_clean(isset($mainkonfig->header_public)?($mainkonfig->header_public):'');
		$data['logo']=$this->security->xss_clean(isset($mainkonfig->logo_public)?($mainkonfig->logo_public):'');
		$data['copyright']=$this->security->xss_clean(isset($mainkonfig->footer)?($mainkonfig->footer):'');
		$data['contact'] = $this->publik_m->get_contact();
		
		$db=$this->page_m->detail_tutorial()->row();
		$title=isset($db->title_tutorial)?($db->title_tutorial):'';
		$slug=isset($db->slug_tutorial)?($db->slug_tutorial):'';
		$category=isset($db->nm_category)?($db->nm_category):'';
		$slugcategory=isset($db->slug_category)?($db->slug_category):'';
		$desc=isset($db->desc_tutorial)?($db->desc_tutorial):'';
		$datepost=isset($db->date_posting)?($db->date_posting):'';
			$date=explode("-",$datepost);
			$tgl=$date[2];
			$bln=$date[1];
			$thn=$date[0];
			$dateposting=$tgl.'/'.$bln.'/'.$thn;
		$photo=isset($db->photo_cover)?($db->photo_cover):'';
		$id_user=isset($db->id_user)?($db->id_user):'';
		$deskfoto=isset($db->desc_photo)?($db->desc_photo):'';
		$visit=isset($db->visit_tutorial)?($db->visit_tutorial):'0';
		/*meta*/
		$data['metatitle']=$title;
		$data['metadesc']='';
		$data['metaimage']=''.base_url().'theme/images/tutorial/'.$photo.'';
		$data['metaurl']=''.base_url().''.$datepost.'/'.$slug.'';
		/*detail*/
		$data['titlepost']=$title;
		$data['imgpost']=$photo;
		$data['datepost']=$dateposting;
		$data['descpost']=$desc;
		$data['capcategory']=$category;
		$data['slugcategory']=$slugcategory;
		$data['deskfoto']=$deskfoto;
		$data['visitpost']=$visit;
		$creator=$this->page_m->get_penulis('user',$id_user)->row();
		$data['creatpost']=isset($creator->fullname)?($creator->fullname):'';
		$data['tutorialmore']=$this->page_m->tutorialmore($slugcategory)->result();
		
		$data['konten'] = "layout_public/tutorial/detail";
		$this->load->view("layout_public/layout",$data);
	}
	public function visit_tutorial($id){
		$t=$this->db->query("select MAX(visit_tutorial)+1 AS visit_tutorial from t_tutorial where id_tutorial='".$id."'")->row();
		$v=$t->visit_tutorial;
		if($v==NULL){$v='1';}else{$v;}
		$val=$v;
		$data=array(
			"visit_tutorial"=>$val,
		);
		$update=$this->db->where("id_tutorial",$id);
		$update=$this->db->update("t_tutorial",$data);
		return $update;
	}
	
	
	public function profile(){
		$mainkonfig=$this->config_m->get_configpublik();
		$data['title']=$this->security->xss_clean(isset($mainkonfig->title_public)?($mainkonfig->title_public):'');
		$data['favicon']=$this->security->xss_clean(isset($mainkonfig->favicon)?($mainkonfig->favicon):'');
		$data['header']=$this->security->xss_clean(isset($mainkonfig->header_public)?($mainkonfig->header_public):'');
		$data['logo']=$this->security->xss_clean(isset($mainkonfig->logo_public)?($mainkonfig->logo_public):'');
		$data['copyright']=$this->security->xss_clean(isset($mainkonfig->footer)?($mainkonfig->footer):'');
		$data['contact'] = $this->publik_m->get_contact();
		
		$db=$this->page_m->profile()->row();
		$title=isset($db->title)?($db->title):'';
		$photo=isset($db->photo)?($db->photo):'';
		$slug=isset($db->slug_aboutus)?($db->slug_aboutus):'';
		$desc=isset($db->description)?($db->description):'';
		/*meta*/
		$data['metatitle']=$title;
		$data['metadesc']='';
		$data['metaimage']=''.base_url().'theme/images/'.$photo.'';
		$data['metaurl']=''.base_url().''.$slug.'';
		/*detail*/
		$data['titlepost']=$title;
		$data['photopost']=''.base_url().'theme/images/'.$photo.'';
		$data['descpost']=$desc;
		
		$data['konten'] = "layout_public/profile/vmain";
		$this->load->view("layout_public/layout",$data);
	}
	
	public function services(){
		$mainkonfig=$this->config_m->get_configpublik();
		$data['title']=$this->security->xss_clean(isset($mainkonfig->title_public)?($mainkonfig->title_public):'');
		$data['favicon']=$this->security->xss_clean(isset($mainkonfig->favicon)?($mainkonfig->favicon):'');
		$data['header']=$this->security->xss_clean(isset($mainkonfig->header_public)?($mainkonfig->header_public):'');
		$data['logo']=$this->security->xss_clean(isset($mainkonfig->logo_public)?($mainkonfig->logo_public):'');
		$data['copyright']=$this->security->xss_clean(isset($mainkonfig->footer)?($mainkonfig->footer):'');
		$data['contact'] = $this->publik_m->get_contact();
		
		$data['services']=$this->page_m->services()->result();
		$title='';
		$image='';
		$slug='page/services';

		/*meta*/
		$data['metatitle']=$title;
		$data['metadesc']='';
		$data['metaimage']=''.base_url().'theme/images/services/'.$image.'';
		$data['metaurl']=''.base_url().''.$slug.'';
		/*detail*/
		
		$data['konten'] = "layout_public/services/vmain";
		$this->load->view("layout_public/layout",$data);
	}
	
	public function portfolio(){
		$mainkonfig=$this->config_m->get_configpublik();
		$data['title']=$this->security->xss_clean(isset($mainkonfig->title_public)?($mainkonfig->title_public):'');
		$data['favicon']=$this->security->xss_clean(isset($mainkonfig->favicon)?($mainkonfig->favicon):'');
		$data['header']=$this->security->xss_clean(isset($mainkonfig->header_public)?($mainkonfig->header_public):'');
		$data['logo']=$this->security->xss_clean(isset($mainkonfig->logo_public)?($mainkonfig->logo_public):'');
		$data['copyright']=$this->security->xss_clean(isset($mainkonfig->footer)?($mainkonfig->footer):'');
		$data['contact'] = $this->publik_m->get_contact();

		// konfigurasi pagination
		$cat=$this->uri->segment(3);
		$cata=$this->input->post('scat');
		$search = $this->input->post('key');
		$this->db->select('*');
		$this->db->where('status', 'publish');
		$this->db->where('trash', '1');
		if($cat){$this->db->where('slug_category', $cat);}
		if($cata){$this->db->where('slug_category', $cata);}
		if($search!=''){$this->db->like('title_portfolio', $search);}
		$getData = $this->db->get('t_portfolio');
		$a = $getData->num_rows();
		if($cat){$config['base_url'] = base_url().'page/portfolio/'.$cat.'';}else{$config['base_url'] = base_url().'page/portfolio/0';} //set the base url for pagination
		$config['total_rows'] = $a; //total rows
		$config['per_page'] = 3; //the number of per page for pagination
		$config['uri_segment'] = 4; //see from base_url. 3 for this case
		//$config['page_query_string'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination-list">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';		
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
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
		$data['portfolio'] = $this->page_m->portfolio($config['per_page'],$this->uri->segment(4));
		$data['slugcategory'] = $cat;
		$jdl=$this->page_m->title_categoryportfolio()->row();
		if($cat){$data['capcategory']=isset($jdl->nm_category)?($jdl->nm_category):'';}else{$data['capcategory']='';}
		if($cat){$data['konten']="layout_public/portfolio/vmain";}else{$data['konten']="";}
		$c=$this->input->post('c');
		if($c==1){
			$this->load->view("layout_public/portfolio/list",$data);
		}else{
			$this->load->view("layout_public/layout",$data);
		}		
	}
	public function detail_portfolio(){
		$mainkonfig=$this->config_m->get_configpublik();
		$data['title']=$this->security->xss_clean(isset($mainkonfig->title_public)?($mainkonfig->title_public):'');
		$data['favicon']=$this->security->xss_clean(isset($mainkonfig->favicon)?($mainkonfig->favicon):'');
		$data['header']=$this->security->xss_clean(isset($mainkonfig->header_public)?($mainkonfig->header_public):'');
		$data['logo']=$this->security->xss_clean(isset($mainkonfig->logo_public)?($mainkonfig->logo_public):'');
		$data['copyright']=$this->security->xss_clean(isset($mainkonfig->footer)?($mainkonfig->footer):'');
		$data['contact'] = $this->publik_m->get_contact();
		
		$db=$this->page_m->detail_portfolio()->row();
		$title=isset($db->title_portfolio)?($db->title_portfolio):'';
		$slug=isset($db->slug_portfolio)?($db->slug_portfolio):'';
		$category=isset($db->nm_category)?($db->nm_category):'';
		$slugcategory=isset($db->slug_category)?($db->slug_category):'';
		$desc=isset($db->desc_portfolio)?($db->desc_portfolio):'';
		$datepost=isset($db->date_posting)?($db->date_posting):'';
			$date=explode("-",$datepost);
			$tgl=$date[2];
			$bln=$date[1];
			$thn=$date[0];
			$dateposting=$tgl.'/'.$bln.'/'.$thn;
		$photo=isset($db->photo_cover)?($db->photo_cover):'';
		$id_user=isset($db->id_user)?($db->id_user):'';
		$deskfoto=isset($db->desc_photo)?($db->desc_photo):'';
		$visit=isset($db->visit_portfolio)?($db->visit_portfolio):'0';
		/*meta*/
		$data['metatitle']=$title;
		$data['metadesc']='';
		$data['metaimage']=''.base_url().'theme/images/portfolio/'.$photo.'';
		$data['metaurl']=''.base_url().''.$datepost.'/'.$slug.'';
		/*detail*/
		$data['titlepost']=$title;
		$data['imgpost']=$photo;
		$data['datepost']=$dateposting;
		$data['descpost']=$desc;
		$data['capcategory']=$category;
		$data['slugcategory']=$slugcategory;
		$data['deskfoto']=$deskfoto;
		$data['visitpost']=$visit;
		$creator=$this->page_m->get_penulis('user',$id_user)->row();
		$data['creatpost']=isset($creator->fullname)?($creator->fullname):'';
		$data['portfoliomore']=$this->page_m->portfoliomore($slugcategory)->result();
		
		$data['konten'] = "layout_public/portfolio/detail";
		$this->load->view("layout_public/layout",$data);
	}
	public function visit_portfolio($id){
		$t=$this->db->query("select MAX(visit_portfolio)+1 AS visit_portfolio from t_portfolio where id_portfolio='".$id."'")->row();
		$v=$t->visit_portfolio;
		if($v==NULL){$v='1';}else{$v;}
		$val=$v;
		$data=array(
			"visit_portfolio"=>$val,
		);
		$update=$this->db->where("id_portfolio",$id);
		$update=$this->db->update("t_portfolio",$data);
		return $update;
	}
	
	
	public function gallery(){
		$mainkonfig=$this->config_m->get_configpublik();
		$data['title']=$this->security->xss_clean(isset($mainkonfig->title_public)?($mainkonfig->title_public):'');
		$data['favicon']=$this->security->xss_clean(isset($mainkonfig->favicon)?($mainkonfig->favicon):'');
		$data['header']=$this->security->xss_clean(isset($mainkonfig->header_public)?($mainkonfig->header_public):'');
		$data['logo']=$this->security->xss_clean(isset($mainkonfig->logo_public)?($mainkonfig->logo_public):'');
		$data['copyright']=$this->security->xss_clean(isset($mainkonfig->footer)?($mainkonfig->footer):'');
		$data['contact'] = $this->publik_m->get_contact();
		
		$data['galleryalbum']=$this->page_m->galleryalbum()->result();
		/*meta*/
		$data['metatitle']="Galeri";
		$data['metadesc']='';
		$data['metaimage']=''.base_url().'theme/images/logo_public.png';
		$data['metaurl']=''.base_url().'page/gallery';
		/*detail*/

		$data['konten'] = "layout_public/gallery/vmain";
		$this->load->view("layout_public/layout",$data);
	}
	public function detail_gallery(){
		$mainkonfig=$this->config_m->get_configpublik();
		$data['title']=$this->security->xss_clean(isset($mainkonfig->title_public)?($mainkonfig->title_public):'');
		$data['favicon']=$this->security->xss_clean(isset($mainkonfig->favicon)?($mainkonfig->favicon):'');
		$data['header']=$this->security->xss_clean(isset($mainkonfig->header_public)?($mainkonfig->header_public):'');
		$data['logo']=$this->security->xss_clean(isset($mainkonfig->logo_public)?($mainkonfig->logo_public):'');
		$data['copyright']=$this->security->xss_clean(isset($mainkonfig->footer)?($mainkonfig->footer):'');
		$data['contact'] = $this->publik_m->get_contact();
		
		$db=$this->page_m->galleryalbum()->row();
		$data['galleryphoto']=$this->page_m->galleryphoto()->result();
		/*meta*/
		$data['metatitle']="Galeri";
		$data['metadesc']='';
		$data['metaimage']=''.base_url().'theme/images/logo_public.png';
		$data['metaurl']=''.base_url().'page/gallery';
		/*detail*/
		
		$data['n_album']=isset($db->title_media)?($db->title_media):'';
		$data['konten'] = "layout_public/gallery/vdetail";
		$this->load->view("layout_public/layout",$data);
	}
	
	
	public function contact(){
		$mainkonfig=$this->config_m->get_configpublik();
		$data['title']=$this->security->xss_clean(isset($mainkonfig->title_public)?($mainkonfig->title_public):'');
		$data['favicon']=$this->security->xss_clean(isset($mainkonfig->favicon)?($mainkonfig->favicon):'');
		$data['header']=$this->security->xss_clean(isset($mainkonfig->header_public)?($mainkonfig->header_public):'');
		$data['logo']=$this->security->xss_clean(isset($mainkonfig->logo_public)?($mainkonfig->logo_public):'');
		$data['copyright']=$this->security->xss_clean(isset($mainkonfig->footer)?($mainkonfig->footer):'');
		$data['contact'] = $this->publik_m->get_contact();
		
		$db=$this->page_m->contact()->row();
		$title=isset($db->caption)?($db->caption):'';
		/*meta*/
		$data['metatitle']=$title;
		$data['metadesc']='Konsultasikan bisnis anda dengan kami';
		$data['metaimage']=''.base_url().'theme/images/logo_public.png';
		$data['metaurl']=''.base_url().'page/contact';
		
		$data['caption_1']=isset($db->caption_1)?($db->caption_1):'';
		$data['caption_2']=isset($db->caption_1)?($db->caption_2):'';
		$data['address_1']=isset($db->address_1)?($db->address_1):'';
		$data['address_2']=isset($db->address_2)?($db->address_2):'';
		$data['phone_1']=isset($db->phone_1)?($db->phone_1):'';
		$data['phone_2']=isset($db->phone_2)?($db->phone_2):'';
		$data['phone_3']=isset($db->phone_2)?($db->phone_3):'';
		$data['email']=isset($db->email)?($db->email):'';
		$data['facebook']=isset($db->facebook)?($db->facebook):'';
		$data['twitter']=isset($db->twitter)?($db->twitter):'';
		$data['googleplus']=isset($db->googleplus)?($db->googleplus):'';
		
		$data['konten'] = "layout_public/contact/vmain";
		$this->load->view("layout_public/layout",$data);
	}
	function send(){
	    $mainkonfig=$this->config_m->get_configpublik();
		$data['title']=$this->security->xss_clean(isset($mainkonfig->title_public)?($mainkonfig->title_public):'');
		$data['favicon']=$this->security->xss_clean(isset($mainkonfig->favicon)?($mainkonfig->favicon):'');
		$data['header']=$this->security->xss_clean(isset($mainkonfig->header_public)?($mainkonfig->header_public):'');
		$data['logo']=$this->security->xss_clean(isset($mainkonfig->logo_public)?($mainkonfig->logo_public):'');
		$data['copyright']=$this->security->xss_clean(isset($mainkonfig->footer)?($mainkonfig->footer):'');
		$data['contact'] = $this->publik_m->get_contact();
		
		$this->page_m->message();
	
            //get the form data
            $name = $this->input->post('form_name');
            $from_email = $this->input->post('form_email');
            $website = $this->input->post('form_website');
            $subject = 'Pengunjung Zaiheryf';
            $message = $this->input->post('form_message');
 
            //set to_email id to which you want to receive mails
            $to_email1 = 'zaiheryf@gmail.com';
            $recipientArr = array($to_email1);
 
            //configure email settings
			
			$config = Array(
			    'useragent' => 'CodeIgniter',
                'protocol'  => 'smtp',
                'mailpath'  => '/usr/sbin/sendmail',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => 'zaiheryf@gmail.com',
				'smtp_pass' => 'v@lov3for3v3r',
				'smtp_keepalive' => TRUE,
                'smtp_crypto' => 'SSL',
                'wordwrap'  => TRUE,
                'wrapchars' => 80,
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'validate'  => TRUE,
                'crlf'      => "\r\n",
                'newline'   => "\r\n",
			);
  
            $this->load->library('email', $config);
			$this->email->set_newline("\r\n");			
 
            //send mail;
            $this->email->from($from_email, $name);
            $this->email->to($recipientArr);
            $this->email->subject($subject);
            $this->email->message($message);
			$result = $this->email->send();
            if ($this->email->send())
            {
                // mail sent
				echo 1;
				redirect('page/contact');
            }
            else
            {
                //error
                echo 0;
                redirect('page/contact');
				//show_error($this->email->print_debugger());
            }
	}
	//custom validation function to accept only alphabets and space input
    function alpha_space_only($str)
    {
        if (!preg_match("/^[a-zA-Z ]+$/",$str))
        {
            $this->form_validation->set_message('alpha_space_only', 'The %s field must contain only alphabets and space');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

	
	
	


}

/* End of file Map.php */
/* Location: ./application/controllers/welcome.php */