<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_template extends CI_Controller {

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
	function data_tables_temp()
	{
		$list = $this->mdl->get_data_temp();
		$data = array();
		$no = $_POST['start'];
		$no =$no+1;
		foreach ($list as $dataDB) {

			$id=isset($dataDB->id_temp)?($dataDB->id_temp):'';
			$nama=isset($dataDB->nama_temp)?($dataDB->nama_temp):'';
			$img=isset($dataDB->img_temp)?($dataDB->img_temp):'';
			if($img!=''){$img=$img;}else{$img='img_not.png';}
			$default_temp=isset($dataDB->default_temp)?($dataDB->default_temp):'';
			if($default_temp=='yes'){$default_temp='<span class="text-success">DEFAULT</span>';}else{$default_temp='NOT';}

			$tombol='
					<button type="button" onclick="atdef(`'.$id.'`,`'.$nama.'`)" class="btn bg-purple btn-sm">ATUR DEFAULT</button>
					<button type="button" onclick="element(`'.$id.'`)" class="btn bg-success btn-sm">ELEMENT</button>
					<button type="button" onclick="edit(`'.$id.'`)" class="btn bg-info btn-sm">EDIT TEMPLATE</button>
					<button type="button" onclick="del(`'.$id.'`,`'.$nama.'`)" class="btn bg-danger btn-sm">DELETE</button>
			';
			$row = array();
			$row[] = "<span class='size linehover'  >".$no++."</span>";	
			$row[] = "<span class='size'><a title='".$nama."' href='".base_url()."theme/images/sertifikat/".$img."' data-toggle='lightbox' data-title='".$nama."' data-footer=''>
				<img class='img-responsive img-fluid' style='width:800px;' src='".base_url()."theme/images/sertifikat/".$img."' class='img-fluid'></a></span>";
			$row[] = "<center><h4><b>".$default_temp."</b></h4></center>";
			$row[] = "<span class='size'>".$nama."</span>";
			$row[] = $tombol ;
			//add html for action
			
			$data[] = $row;
			}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $c=$this->mdl->count_data_temp(),
			"recordsFiltered" =>$c,
			"data" => $data,
			);
		//output to json format
		echo json_encode($output);
	}
	function input_Temp()
	{
		$data=$this->mdl->input_Temp();
		echo json_encode($data);
	}	
	function edit_Temp()
	{
		$data["data"]=$this->mdl->edit_Temp();
		echo $this->load->view("edit_temp",$data);
	}
	function update_Temp()
	{
		$data=$this->mdl->update_Temp();
	 	echo json_encode($data);
	}
	function delete_Temp()
	{	
		echo $this->mdl->delete_Temp();
	}
	function update_Atdef()
	{
		$data=$this->mdl->update_Atdef();
	 	echo json_encode($data);
	}
	
	
	
	function element_Sertifikat()
	{
		$data["data"]=$this->mdl->edit_Temp();
		echo $this->load->view("element",$data);
	}
	function preview_Sertifikat()
	{
		ob_start();
		$data["data"]=$this->mdl->edit_Temp();
		$isi=$this->load->view("preview_sertifikat",$data);
		//   return true;
		$isi = ob_get_clean();
	 	require_once('static/html2pdf/html2pdf.class.php');
	 	try{
	 	  $html2pdf = new HTML2PDF('L','A4', 'en', true, '', array(0,0, 0, 0));
		  $html2pdf->AddFont('monotypecorsiva', 'bold', 'monotypecorsiva.php');
		  //$html2pdf->AddFont('robotomedium', 'normal', 'robotomedium.php');
		  $html2pdf->setDefaultFont('times');
	 	  $html2pdf->writeHTML($isi, isset($_GET['vuehtml']));
	 	  $html2pdf->Output('view.pdf','FI');
	 	}
	 	catch(HTML2PDF_exception $e){
			echo $e;
    	}
	}
	function update_Element()
	{
		$data=$this->mdl->update_Element();
	 	echo json_encode($data);
	}
	 



	
}
