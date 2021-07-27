<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_sertifikat extends CI_Controller {

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
	function data_tables_sertifikat()
	{
		$list = $this->mdl->get_data_sertifikat();
		$data = array();
		$no = $_POST['start'];
		$no =$no+1;
		foreach ($list as $dataDB) {

			$id=isset($dataDB->id)?($dataDB->id):'';
			$nis=isset($dataDB->nis)?($dataDB->nis):'';
			$nama=isset($dataDB->nama)?($dataDB->nama):'';
			$tempat_lahir=isset($dataDB->tempat_lahir)?($dataDB->tempat_lahir):'';
			$tgl_lahir=isset($dataDB->tanggal_lahir)?($dataDB->tanggal_lahir):'';
			if($tgl_lahir!=''){$tanggal_lahir=$this->tanggal->ind($tgl_lahir,0);}else{$tanggal_lahir="";}
			$kd_kelas=isset($dataDB->kelas)?($dataDB->kelas):'';
			$kd_program_keahlian=isset($dataDB->program_keahlian)?($dataDB->program_keahlian):'';
			$kd_kompetensi_keahlian=isset($dataDB->kompetensi_keahlian)?($dataDB->kompetensi_keahlian):'';
			$sekolah_asal=isset($dataDB->sekolah_asal)?($dataDB->sekolah_asal):'';
			$jml_nilaiteknik=isset($dataDB->jml_nilaiteknik)?($dataDB->jml_nilaiteknik):'';
			$jml_katteknik=isset($dataDB->jml_katteknik)?($dataDB->jml_katteknik):'';
			$rt_nilaiteknik=isset($dataDB->rt_nilaiteknik)?($dataDB->rt_nilaiteknik):'';
			$rt_katteknik=isset($dataDB->rt_katteknik)?($dataDB->rt_katteknik):'';
			$jml_nilainonteknik=isset($dataDB->jml_nilainonteknik)?($dataDB->jml_nilainonteknik):'';
			$jml_katnonteknik=isset($dataDB->jml_katnonteknik)?($dataDB->jml_katnonteknik):'';
			$rt_nilainonteknik=isset($dataDB->rt_nilainonteknik)?($dataDB->rt_nilainonteknik):'';
			$rt_katnonteknik=isset($dataDB->rt_katnonteknik)?($dataDB->rt_katnonteknik):'';
			$nama_dudi=isset($dataDB->nama_dudi)?($dataDB->nama_dudi):'';
			$alamat_dudi=isset($dataDB->alamat_dudi)?($dataDB->alamat_dudi):'';
			$tgl_mulai=isset($dataDB->tanggal_mulai)?($dataDB->tanggal_mulai):'';
			if($tgl_mulai!=''){$tanggal_mulai=$this->tanggal->ind($tgl_mulai,0);}else{$tanggal_mulai="";}
			$tgl_selesai=isset($dataDB->tanggal_selesai)?($dataDB->tanggal_selesai):'';
			if($tgl_selesai!=''){$tanggal_selesai=$this->tanggal->ind($tgl_selesai,0);}else{$tanggal_selesai="";}
			$lama_pkl=isset($dataDB->lama_pkl)?($dataDB->lama_pkl):'';
			
			$kelasDB=$this->db->where("kode",$kd_kelas);
			$kelasDB=$this->db->get("tm_kelas")->row();
			$kelas=isset($kelasDB->kelas)?($kelasDB->kelas):'';
			
			$program_keahlianDB=$this->db->where("kode",$kd_program_keahlian);
			$program_keahlianDB=$this->db->get("tm_program_keahlian")->row();
			$program_keahlian=isset($program_keahlianDB->program_keahlian)?($program_keahlianDB->program_keahlian):'';
			
			$kompetensi_keahlianDB=$this->db->where("kode",$kd_kompetensi_keahlian);
			$kompetensi_keahlianDB=$this->db->get("tm_kompetensi_keahlian")->row();
			$kompetensi_keahlian=isset($kompetensi_keahlianDB->kompetensi_keahlian)?($kompetensi_keahlianDB->kompetensi_keahlian):'';
		
			
			$tombol='
					<button type="button" onclick="priviewhal1(`'.$id.'`)" class="btn bg-purple btn-sm" title="Priview Halaman 1">HAL 1</button>
					<button type="button" onclick="priviewhal2(`'.$id.'`)" class="btn bg-secondary btn-sm" title="Priview Halaman 2">HAL 2</button>
					<button type="button" onclick="nilai(`'.$id.'`)" class="btn bg-success btn-sm">NILAI</button>
					<button type="button" onclick="edit(`'.$id.'`)" class="btn bg-info btn-sm">EDIT</button>
					<button type="button" onclick="del(`'.$id.'`,`'.$nis.'`,`'.$nama.'`)" class="btn bg-danger btn-sm">DELETE</button>
			';
			$row = array();
			$row[] = "";
			$row[] = $id;	
			$row[] = "<span class='size linehover'  >".$no++."</span>";	
			$row[] = "<span class='size' ><a href='javascript:priview(".$id.")'>".$nis."</a></span>";
			$row[] = "<span class='size' >".$nama."</span>";
			$row[] = "<span class='size' >".$tempat_lahir."</span>";
			$row[] = "<span class='size' >".$tanggal_lahir."</span>";
			$row[] = "<span class='size' >".$kelas."</span>";
			$row[] = "<span class='size' >".$program_keahlian."</span>";
			$row[] = "<span class='size' >".$kompetensi_keahlian."</span>";
			$row[] = "<span class='size' >".$sekolah_asal."</span>";
			$row[] = "<span class='size' >".$nama_dudi."</span>";
			$row[] = "<span class='size' >".$alamat_dudi."</span>";		
			$row[] = "<span class='size' >".$tanggal_mulai."</span>";		
			$row[] = "<span class='size' >".$tanggal_selesai."</span>";	
			$row[] = "<span class='size' >".$lama_pkl."</span>";
			$row[] = "<span class='size' >".$jml_nilaiteknik."</span>";
			$row[] = "<span class='size' >".$jml_katteknik."</span>";		
			$row[] = "<span class='size' >".$rt_nilaiteknik."</span>";		
			$row[] = "<span class='size' >".$rt_katteknik."</span>";
			$row[] = "<span class='size' >".$jml_nilainonteknik."</span>";
			$row[] = "<span class='size' >".$jml_katnonteknik."</span>";		
			$row[] = "<span class='size' >".$rt_nilainonteknik."</span>";		
			$row[] = "<span class='size' >".$rt_katnonteknik."</span>";			
			$row[] = $tombol ;
			 
			  
			//add html for action
			
			$data[] = $row;
			}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $c=$this->mdl->count_data_sertifikat(),
			"recordsFiltered" =>$c,
			"data" => $data,
			);
		//output to json format
		echo json_encode($output);
	}
	function selisih_bulan(){
		$tanggal_mulai=$this->input->post("tgl_1");
		$tgl_mulai=$this->tanggal->eng_($tanggal_mulai,0);
		
		$tanggal_selesai=$this->input->post("tgl_2");
		$tgl_selesai=$this->tanggal->eng_($tanggal_selesai,0);
		
		$date = date("Y-m-d");
		
		$timeStart = strtotime($tgl_mulai);
		$timeEnd = strtotime($tgl_selesai);
		// Menambah bulan ini + semua bulan pada tahun sebelumnya
		$numBulan = 1 + (date("Y",$timeEnd)-date("Y",$timeStart))*12;
		// menghitung selisih bulan
		$numBulan += date("m",$timeEnd)-date("m",$timeStart);
		
		if($tanggal_selesai!=''){
			echo $numBulan;
		}else{
			echo '';
		}
		
	}
	function input_Sertifikat()
	{
		$data=$this->mdl->input_Sertifikat();
		echo json_encode($data);
	}	
	function edit_Sertifikat()
	{
		$data["data"]=$this->mdl->edit_Sertifikat();
		echo $this->load->view("edit_sertifikat",$data);
	}
	function edit_Nilai()
	{
		$data["data"]=$this->mdl->edit_Sertifikat();
		echo $this->load->view("edit_nilai",$data);
	}
	function update_Sertifikat()
	{
		$data=$this->mdl->update_Sertifikat();
	 	echo json_encode($data);
	}
	function update_Nilai()
	{
		$data=$this->mdl->update_Nilai();
	 	echo json_encode($data);
	}
	function delete_Sertifikat()
	{	
		echo $this->mdl->delete_Sertifikat();
	}
	function update_Print()
	{
		$data=$this->mdl->update_Print();
	 	echo json_encode($data);
	}
	function priview_Sertifikat()
	{

		ob_start();
		$id=$this->input->get("id");
		$arrayct=explode(",",$id); //potong
		$a = "";
		foreach($arrayct as $i=>$arrayctlist):
			 $a .= ",'".$arrayctlist."'";
		endforeach;
		$arrayct_a = substr($a,1); //convert
		$jmlrowct=count($arrayct); //jumlah row
		$arrayct1=$arrayct[0]; //array awal
		
		for($x=0;$x<$jmlrowct;$x++){
		$getid=isset($arrayct[$x])?($arrayct[$x]):0;
		$this->db->where("id",$getid);
		$data["data"]=$this->db->get("data_sertifikat")->row();
		$isi=$this->load->view("priview_sertifikat",$data);
		}
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
		
		/*
		$this->load->library('Pdf');
		$id=$this->input->get('id');
		$this->db->where("id",$id);
		$data["data"]=$this->db->get("data_sertifikat")->row();
		$isi=$this->load->view("priview_sertifikat",$data,true);
		
		$pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetTitle('My Title');
		$pdf->SetAuthor('Nicola Asuni');
		$pdf->SetTitle('TCPDF Example 002');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		$pdf->SetHeaderMargin(0);
		$pdf->SetTopMargin(0);
		$pdf->setFooterMargin(0);
		$pdf->SetAutoPageBreak(true);
		$pdf->SetDisplayMode('real', 'default');
		$pdf->SetCellPadding(0);
		
		$pdf->AddPage('L', 'A4');
		// -- set new background ---
		// get the current page break margin
		$bMargin = $pdf->getBreakMargin(0,0,0,0);
		// get current auto-page-break mode
		$auto_page_break = $pdf->getAutoPageBreak();
		// disable auto-page-break
		$pdf->SetAutoPageBreak(true, 0);
		// set bacground image
		$img_file = base_url().'theme/images/sertifikat/sertifikat.jpg';
		$pdf->Image($img_file, 0, 0, 420, 297, '', '', '', false, 300, '', false, false, 0);
		// restore auto-page-break status
		$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
		// set the starting point for the page content
		$pdf->setPageMark();

		$pdf->WriteHTMLCell(0, 0,'','', $isi, 0, 1, 0, true, '', true);
		$pdf->Output('My-File-Name.pdf', 'I');
		*/

	}
	function priviewhal1_Sertifikat()
	{
		ob_start();
		$id=$this->input->get("id");
		$arrayct=explode(",",$id); //potong
		$a = "";
		foreach($arrayct as $i=>$arrayctlist):
			 $a .= ",'".$arrayctlist."'";
		endforeach;
		$arrayct_a = substr($a,1); //convert
		$jmlrowct=count($arrayct); //jumlah row
		$arrayct1=$arrayct[0]; //array awal
		
		for($x=0;$x<$jmlrowct;$x++){
		$getid=isset($arrayct[$x])?($arrayct[$x]):0;
		$this->db->where("id",$getid);
		$data["data"]=$this->db->get("data_sertifikat")->row();
		$isi=$this->load->view("priviewhal1_sertifikat",$data);
		}
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
	function priviewhal2_Sertifikat()
	{
		ob_start();
		$id=$this->input->get("id");
		$arrayct=explode(",",$id); //potong
		$a = "";
		foreach($arrayct as $i=>$arrayctlist):
			 $a .= ",'".$arrayctlist."'";
		endforeach;
		$arrayct_a = substr($a,1); //convert
		$jmlrowct=count($arrayct); //jumlah row
		$arrayct1=$arrayct[0]; //array awal
		
		for($x=0;$x<$jmlrowct;$x++){
		$getid=isset($arrayct[$x])?($arrayct[$x]):0;
		$this->db->where("id",$getid);
		$data["data"]=$this->db->get("data_sertifikat")->row();
		$isi=$this->load->view("priviewhal2_sertifikat",$data);
		}
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
	
	function import_Data()
	{
		$data=$this->mdl->import_Data();
	 	echo json_encode($data);
	}
	
	function get_kk()
	{
		$val=$this->input->post("id");
		$db=$this->db->where("kd_pk","".$val."");
		$db=$this->db->order_by("kode","asc");
		$db=$this->db->get("tm_kompetensi_keahlian")->result();
		$list="<option value=''>=== Choose === </option>";
		foreach($db as $val){
			$list.="<option value='".$val->kode."'>".$val->kompetensi_keahlian."</option>";
		}
		echo $list;
	}


	 



	
}
