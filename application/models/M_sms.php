<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sms extends ci_Model
{
	
	public function __construct() {
        parent::__construct();
	//	$this->m_konfig->validasi_session("super");
     	}
	//Komponen
	function inboxHapusAll()
	{
	$IDG=$this->session->userdata("id");
	$hapus=$this->input->post("hapus");
		foreach($hapus as $ID)
		{
		$this->hapusInbox($IDG,$ID);
		}	return true;
	}
	function sentitemsHapusAll()
	{
	$IDG=$this->session->userdata("id");
	$hapus=$this->input->post("hapus");
		foreach($hapus as $ID)
		{
		$this->hapusSentitems($IDG,$ID);
		}	return true;
	}
	function outboxHapusAll()
	{
	$IDG=$this->session->userdata("id");
	$hapus=$this->input->post("hapus");
		foreach($hapus as $ID)
		{
		$this->hapusOutbox($IDG,$ID);
		}	return true;
	}
	
	//private
	private function hapusInbox($IDG,$ID)
	{
	$level=$this->session->userdata("level");
	if($level=="user"){	
	//$this->db->where("CreatorID",$IDG);
	}
	$this->db->where("ID",$ID);
	return $this->db->delete("inbox");
	}
	private function hapusSentitems($IDG,$ID)
	{
	$this->db->where("ID",$ID);
	$this->db->where("CreatorID",$IDG);
	return $this->db->delete("sentitems");
	}
	private function hapusOutbox($IDG,$ID)
	{
	$this->db->where("ID",$ID);
	$this->db->where("CreatorID",$IDG);
	return $this->db->delete("outbox");
	}
	
	
	
	
	function _modemAwal()
	{	
		$ID		=	$this->session->userdata("id");
					$this->db->where("ID",$ID);
		$db		=	$this->db->get("pbk_groups")->row();
		$data	=	explode(",",$db->modem);
		$jml	=	count($data);
		return isset($data[0])?($data[0]):"";
	}	
	function modem()
	{	
		$ID=$this->session->userdata("id");
		$this->db->where("ID",$ID);
		$dt=$this->db->get("pbk_groups")->row();
	return isset($dt->modem)?($dt->modem):"";
	}
	
	
	
	function kirim($nomor,$pesan,$modem,$from=null)
	{	
		
		$data="";
		$ID=$this->session->userdata("id");
		if($nomor)
		{	
			$nomor=explode(",",$nomor);
			foreach($nomor as $nomor)
			{	 
				$this->_kirimSms($nomor,$pesan,$modem,$ID,$from);
			}
		}	
	}
	
	function blokir()
	{
	$ID=$this->session->userdata("id");
	$this->db->where("ID",$ID);
	$data=$this->db->get("pbk_groups")->row();
	return isset($data->blokir)?($data->blokir):"";
	}
	
	function batasNomor($ID)
	{
	//$ID=$this->session->userdata("id");
	$this->db->where("ID",$ID);
	$data=$this->db->get("pbk_groups")->row();
	return isset($data->batas_nomor)?($data->batas_nomor):"";
	}
	
	function blokirAdmin()
	{
		$this->db->where("id_pengaturan","4");
		$data=$this->db->get("pengaturan")->row();
		return isset($data->val)?($data->val):"";
	}
	
	private function _kirimGroup($idGroup,$pesan,$modem)
	{
	$ID=$this->session->userdata("id");
	$this->db->where("GroupID",$ID);
	$this->db->where("id_sub_group",$idGroup);
	$res=$this->db->get("pbk")->result();
	
		$this->db->where("ID",$ID);
		$this->db->select("title");
		$data=$this->db->get("pbk_groups")->row();
		$title=explode("_:|:_",$data->title);
		
		$jmlti=count($title);
	
		foreach($res as $res)
		{
			$isiForm=explode("_:|:_",$res->form);
		//////// STR REPLACE
		
		//$no=0;
		$msg=str_replace("{NAMA}",$res->Name,$pesan);
		for($ti=0;$ti<$jmlti;$ti++)
		{
		//$title[$no]=$no;
		$msg=str_replace("{".$title[$ti]."}",$isiForm[$ti],$msg);
		//$no++;
		}
		////////
			
			$blacklist=$this->blokirAdmin()."".$this->blokir();
			if (strpos($blacklist,$res->Number) === FALSE){
			$this->_kirimSms($res->Number,$msg,$modem,$ID,"group");
			}
		}
	}
	
	function dikirim($nomor,$pesan,$source=null,$modem=null)
	{
	$idGroup=$this->session->userdata("id");
	$nomor=str_replace("+62","0",$nomor);
	$cekno=substr($nomor,0,2);	
	if($cekno=="85")
	{
		$awal="085";
		$nomor=$awal.substr($nomor,2,100);
	} 
	
	
	$batas=10;
	if(strlen($nomor)<$batas){ return false; };
	////Send Long Massage
	$jml_esms	=	strlen($pesan);
	$slide_sms	=	ceil($jml_esms/153);
	$jmlSMS 	=	$slide_sms;
	// memecah pesan asli
	$pecah  = str_split($pesan, 153);
	// proses untuk mendapatkan ID record yang akan disisipkan ke tabel OUTBOX
	$query = "SHOW TABLE STATUS LIKE 'outbox'";
	$hasil = $this->db->query($query);
	$data  = $hasil->row();

		for ($i=1; $i<=$jmlSMS; $i++)
		{
		 $msg = $pecah[$i-1];
			if ($i == 1)
			{
			 //jika merupakan pecahan pertama, maka masukkan ke tabel OUTBOX
			 $newID = $data->Auto_increment;          
			 $udh = "0500037".sprintf("%02s", $jmlSMS).sprintf("%02s", $i);
				$data=array(
				'DestinationNumber'=>$nomor,
				'UDH'=>$udh,
				'ID'=>$newID,
				'MultiPart'=>'true',
				'TextDecoded'=>$msg,
				'SenderID'=>$modem,
				'CreatorID'=>$idGroup,
				'type_sms'=>'biasa',
				'source'=>$source,
				);
			$this->db->insert('outbox',$data);           
			}else
			{
				   $data=array(
					'UDH'=>$udh,
					'ID'=>$newID,
					'TextDecoded'=>$msg,
					'SequencePosition'=>$i,
					);
			$this->db->insert('outbox_multipart',$data);
		   }
		/// end send
		}
		return true;
	}
	
	
	
	
	function _kirimSms($nomor,$pesan,$modem,$idGroup,$source)
	{
	$nomor=str_replace("+62","0",$nomor);
	$cekno=substr($nomor,0,2);	
	if($cekno=="85")
	{
		$awal="085";
		$nomor=$awal.substr($nomor,2,100);
	} 
	
	
	$batas=10;
	if(strlen($nomor)<$batas){ return false; };
	////Send Long Massage
	$jml_esms	=	strlen($pesan);
	$slide_sms	=	ceil($jml_esms/153);
	$jmlSMS 	=	$slide_sms;
	// memecah pesan asli
	$pecah  = str_split($pesan, 153);
	// proses untuk mendapatkan ID record yang akan disisipkan ke tabel OUTBOX
	$query = "SHOW TABLE STATUS LIKE 'outbox'";
	$hasil = $this->db->query($query);
	$data  = $hasil->row();

		for ($i=1; $i<=$jmlSMS; $i++)
		{
		 $msg = $pecah[$i-1];
			if ($i == 1)
			{
			 //jika merupakan pecahan pertama, maka masukkan ke tabel OUTBOX
			 $newID = $data->Auto_increment;          
			 $udh = "0500037".sprintf("%02s", $jmlSMS).sprintf("%02s", $i);
				$data=array(
				'DestinationNumber'=>$nomor,
				'UDH'=>$udh,
				'ID'=>$newID,
				'MultiPart'=>'true',
				'TextDecoded'=>$msg,
				'SenderID'=>$modem,
				'CreatorID'=>$idGroup,
				'type_sms'=>'biasa',
				'source'=>$source,
				);
			$this->db->insert('outbox',$data);           
			}else
			{
				   $data=array(
					'UDH'=>$udh,
					'ID'=>$newID,
					'TextDecoded'=>$msg,
					'SequencePosition'=>$i,
					);
			$this->db->insert('outbox_multipart',$data);
		   }
		/// end send
		}
		return true;
	}
	
	
	function get_datainbox()
	{
		
		$this->_get_datatables_inbox();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		//if($keyword=$this->uri->segment(3)){ $this->db->like('TextDecoded',$keyword);};
		
		$query = $this->db->get();
		return $query->result();
	}
	
	function get_datainbox_lap()
	{
		
		$this->_get_datatables_inbox_lap();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		//if($keyword=$this->uri->segment(3)){ $this->db->like('TextDecoded',$keyword);};
		
		$query = $this->db->get();
		return $query->result();
	}
	
	private function _get_datatables_inbox_lap()
	{
	$level=$this->session->userdata("level");
	$column = array('ReceivingDateTime','SenderNumber','TextDecoded');
	$order = array('ID' => 'desc');
	if($url=$this->uri->segment(3) and $this->uri->segment(2)=="ajax_inbox")
		{
							$idkey=$this->konversi->desc($url);
							$idkey=$this->encryption->decrypt($idkey);
		$this->db->like('TextDecoded',$idkey);
		}
	if($group=$this->input->get("group"))
	{
	$this->db->where("id_sub_group",$group);		
	}		
		
	$this->db->where("merah!=","");	
	$range=$this->input->get("range");	
	$range=str_replace("_","/",$range);	
	if($range){
	$rentang=explode(" - ",$range);
	$tgl1=$this->tanggal->eng_($rentang[0],"-");
	$tgl2=$this->tanggal->eng_($rentang[1],"-");
	$this->db->where("ReceivingDateTime BETWEEN '".$tgl1." 00:00:00' AND '".$tgl2." 23:59:59' ");
	}	
		
		
		$this->db->join("pbk a","a.Number=b.SenderNumber");
		$this->db->from("inbox b");
		$i = 0;
		$item=array("SenderNumber","TextDecoded");
		if($this->uri->segment(2)=="ajax_inbox")
		{			
		
		foreach ($item as $item) 
		{
			$element=$_POST['search']['value'];
			if($element)
				($i===0) ? $this->db->like($item, $element) : $this->db->or_like($item, $element);
			$column[$i] = $item;
			$i++;
		}
			
		
			if(isset($_POST['order']))
			{
				$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			} 
			else if(isset($order))
			{
				$order = $order;
				$this->db->order_by(key($order), $order[key($order)]);
			}
		}
	}
	public function count_inbox_lap($tabel)
	{	
		$this->_get_datatables_inbox_lap();
		return $this->db->count_all_results();
	}
	
	function cekAksesInbox($ID)
	{
		$data=$this->db->query("select akses_inbox from pbk_groups where ID='$ID' ")->row();
	return $data->akses_inbox;	
	}
	
	private function _get_datatables_inbox()
	{
	$level=$this->session->userdata("level");
	$column = array('ReceivingDateTime','SenderNumber','TextDecoded');
	$order = array('ID' => 'desc');
	if($url=$this->uri->segment(3) and $this->uri->segment(2)=="ajax_inbox")
		{
							$idkey=$this->konversi->desc($url);
							$idkey=$this->encryption->decrypt($idkey);
		$this->db->like('TextDecoded',$idkey);
		}else
		{
			if($level=="user"){
				$this->db->where("CreatorID",$ID=$this->session->userdata("id"));
				$aksesInbox=$this->cekAksesInbox($ID);
				if($aksesInbox=="bebas")
				{
				$this->db->or_where("CreatorID","0");
				}
			}else{
				if($akun=$this->input->get("akun"))
				{
					$this->db->where("CreatorID",$akun);
				}
			}
		}
	$range=$this->input->get("range");	
	$range=str_replace("_","/",$range);	
	if($range){
	$rentang=explode(" - ",$range);
	$tgl1=$this->tanggal->eng_($rentang[0],"-");
	$tgl2=$this->tanggal->eng_($rentang[1],"-");
	$this->db->where("ReceivingDateTime BETWEEN '".$tgl1." 00:00:00' AND '".$tgl2." 23:59:59' ");
	}	
		
		
		$this->db->order_by("ID","DESC");
		$this->db->from("inbox");
		$i = 0;
		$item=array("SenderNumber","TextDecoded");
		if($this->uri->segment(2)=="ajax_inbox")
		{			
		
		foreach ($item as $item) 
		{
			$element=$_POST['search']['value'];
			if($element)
				($i===0) ? $this->db->like($item, $element) : $this->db->or_like($item, $element);
			$column[$i] = $item;
			$i++;
		}
			
		
			if(isset($_POST['order']))
			{
				$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			} 
			else if(isset($order))
			{
				$order = $order;
				$this->db->order_by(key($order), $order[key($order)]);
			}
		}
	}
	public function count_inbox($tabel)
	{	
		$this->_get_datatables_inbox();
		return $this->db->count_all_results();
	}
	
	function downloadInbox($range,$cari)
	{
		//////start
		$objPHPExcel = new PHPExcel();
		//style
		$style = array( 
		 'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				  'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				  'rotation'   => 0,
		  ),
		   'fill' => array(
				  'type' => PHPExcel_Style_Fill::FILL_SOLID,
				  'color' => array('rgb' => 'ccccff')
			  ),
		 'borders' => 
		  array( 'allborders' => 
			array( 'style' => PHPExcel_Style_Border::BORDER_THIN, 'color' => array('argb' => '00000000'), 
			  ), 
			), 
		);	
		
		$head = array( 
			'font'  => array(
			'bold'  => true,
			'color' => array('rgb' => 'FFFFFF'),
			),
			
		   'fill' => array(
				  'type' => PHPExcel_Style_Fill::FILL_SOLID,
				  'color' => array('rgb' => '009966')
			  ),
		 'borders' => 
		  array( 'allborders' => 
			array( 'style' => PHPExcel_Style_Border::BORDER_THIN, 'color' => array('argb' => '00000000'), 
			  ), 
			), 
		);
		
		
	//	$objPHPExcel->getActiveSheet(0)->getColumnDimension('A')->setWidth(5);

		$objPHPExcel->getActiveSheet(0)->getColumnDimension('A')->setAutoSize(true);
		$objPHPExcel->getActiveSheet(0)->getColumnDimension('B')->setAutoSize(true);
		$objPHPExcel->getActiveSheet(0)->getColumnDimension('C')->setAutoSize(true);
		
		
		
		//create column
		
		$objPHPExcel->getActiveSheet(0)->setCellValue('A1', 'Tanggal');
		$objPHPExcel->getActiveSheet(0)->setCellValue('B1', 'Pengirim');
		$objPHPExcel->getActiveSheet(0)->setCellValue('C1', 'Sms Masuk');
		 
		//make a border column
		$objPHPExcel->getActiveSheet(0)->getStyle('A1:C1')->applyFromArray($style);
		
		
		$shit=5;
		$this->_get_datatables_inbox();
		if($cari){	$this->db->like("TextDecoded",$cari); }
		$rentang=explode(" - ",$range);
			$tgl1=$this->tanggal->eng_($rentang[0],"-");
			$tgl2=$this->tanggal->eng_($rentang[1],"-");

				
		$query=$this->db->get();
		$query=$query->result();
		$shit++;$row="2";
		foreach($query as $val)
		{
		$waktu=explode(" ",$val->ReceivingDateTime);
		$waktu=$this->tanggal->hariLengkap($waktu[0],"/")." ".$waktu[1];
		$objPHPExcel->getActiveSheet(0)->setCellValue('A'.$row.'', $waktu);
		$objPHPExcel->getActiveSheet(0)->setCellValue('B'.$row.'', $val->SenderNumber);
		$objPHPExcel->getActiveSheet(0)->setCellValue('C'.$row.'', $val->TextDecoded);
		$row++;
		}
		
		
			
		// Rename worksheet (worksheet, not filename)
		$objPHPExcel->getActiveSheet(0)->setTitle('Inbox');
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);
		
		header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Inbox.xlsx"');
		header('Cache-Control: max-age=0');
		 
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		//////finish
		
	
	}
	
	///// SENTITEMS
	function get_datasentitems()
	{
		
		$this->_get_datatables_sentitems();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		//if($keyword=$this->uri->segment(3)){ $this->db->like('TextDecoded',$keyword);};
		
		$query = $this->db->get();
		return $query->result();
	}
	
	private function _get_datatables_sentitems()
	{
	$level=$this->session->userdata("level");
	$column = array('UpdatedInDB','DestinationNumber','TextDecoded','Status',"field1","field2","field3");
	$order = array('ID' => 'desc');
	if($url=$this->uri->segment(3) and $this->uri->segment(2)=="ajax_sentitems")
		{
							$idkey=$this->konversi->desc($url);
							$idkey=$this->encryption->decrypt($idkey);
		$this->db->like('TextDecoded',$idkey);
		}else
		{
			if($level=="user"){
				$this->db->where("CreatorID",$this->session->userdata("id"));
			}else{
				if($akun=$this->input->get("akun"))
				{
					$this->db->where("CreatorID",$akun);
				}
			}
		}
	$range=$this->input->get("range");	
	$range=str_replace("_","/",$range);	
	if($range){
	$rentang=explode(" - ",$range);
	$tgl1=$this->tanggal->eng_($rentang[0],"-");
	$tgl2=$this->tanggal->eng_($rentang[1],"-");
	$this->db->where("UpdatedInDB BETWEEN '".$tgl1." 00:00:00' AND '".$tgl2." 23:59:59' ");
	}	
		
		
		$this->db->order_by("ID","DESC");
		$this->db->from("sentitems");
		$i = 0;
		$item=array("DestinationNumber","TextDecoded","Status","field1","field2","field3");
		if($this->uri->segment(2)=="ajax_sentitems")
		{			
		
		foreach ($item as $item) 
		{
			$element=$_POST['search']['value'];
			if($element)
				($i===0) ? $this->db->like($item, $element) : $this->db->or_like($item, $element);
			$column[$i] = $item;
			$i++;
		}
			
		
			if(isset($_POST['order']))
			{
				$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			} 
			else if(isset($order))
			{
				$order = $order;
				$this->db->order_by(key($order), $order[key($order)]);
			}
		}
	}
	public function count_sentitems($tabel)
	{	
		$this->_get_datatables_sentitems();
		return $this->db->count_all_results();
	}
	
	function downloadsentitems($range,$cari)
	{
		//////start
		$objPHPExcel = new PHPExcel();
		//style
		$style = array( 
		 'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				  'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				  'rotation'   => 0,
		  ),
		   'fill' => array(
				  'type' => PHPExcel_Style_Fill::FILL_SOLID,
				  'color' => array('rgb' => 'ccccff')
			  ),
		 'borders' => 
		  array( 'allborders' => 
			array( 'style' => PHPExcel_Style_Border::BORDER_THIN, 'color' => array('argb' => '00000000'), 
			  ), 
			), 
		);	
		
		$head = array( 
			'font'  => array(
			'bold'  => true,
			'color' => array('rgb' => 'FFFFFF'),
			),
			
		   'fill' => array(
				  'type' => PHPExcel_Style_Fill::FILL_SOLID,
				  'color' => array('rgb' => '009966')
			  ),
		 'borders' => 
		  array( 'allborders' => 
			array( 'style' => PHPExcel_Style_Border::BORDER_THIN, 'color' => array('argb' => '00000000'), 
			  ), 
			), 
		);
		
		
	//	$objPHPExcel->getActiveSheet(0)->getColumnDimension('A')->setWidth(5);

		$objPHPExcel->getActiveSheet(0)->getColumnDimension('A')->setAutoSize(true);
		$objPHPExcel->getActiveSheet(0)->getColumnDimension('B')->setAutoSize(true);
		$objPHPExcel->getActiveSheet(0)->getColumnDimension('C')->setAutoSize(true);
		$objPHPExcel->getActiveSheet(0)->getColumnDimension('D')->setAutoSize(true);
		
		
		
		//create column
		
		$objPHPExcel->getActiveSheet(0)->setCellValue('A1', 'Tanggal');
		$objPHPExcel->getActiveSheet(0)->setCellValue('B1', 'Nomor Tujuan');
		$objPHPExcel->getActiveSheet(0)->setCellValue('C1', 'Sms Terkirim');
		$objPHPExcel->getActiveSheet(0)->setCellValue('D1', 'Status');
		 
		//make a border column
		$objPHPExcel->getActiveSheet(0)->getStyle('A1:D1')->applyFromArray($style);
		
		
		$shit=5;
		$this->_get_datatables_sentitems();
		if($cari){	$this->db->like("TextDecoded",$cari); }
		$rentang=explode(" - ",$range);
			$tgl1=$this->tanggal->eng_($rentang[0],"-");
			$tgl2=$this->tanggal->eng_($rentang[1],"-");

				
		$query=$this->db->get();
		$query=$query->result();
		$shit++;$row="2";
		foreach($query as $val)
		{
		$waktu=explode(" ",$val->UpdatedInDB);
		$waktu=$this->tanggal->hariLengkap($waktu[0],"/")." ".$waktu[1];
		$objPHPExcel->getActiveSheet(0)->setCellValue('A'.$row.'', $waktu);
		$objPHPExcel->getActiveSheet(0)->setCellValue('B'.$row.'','`'. $val->DestinationNumber/*." - ".$val->field1." - ".$val->field2." - ".$val->field3*/);
		$objPHPExcel->getActiveSheet(0)->setCellValue('C'.$row.'', $val->TextDecoded);
		$objPHPExcel->getActiveSheet(0)->setCellValue('D'.$row.'', $val->Status);
		$row++;
		}
		
		
			
		// Rename worksheet (worksheet, not filename)
		$objPHPExcel->getActiveSheet(0)->setTitle('sentitems');
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);
		
		header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="SMS TERKIRIM.xlsx"');
		header('Cache-Control: max-age=0');
		 
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		//////finish
		
	
	}
	
	///// PUTBOX
	function get_dataoutbox()
	{
		
		$this->_get_datatables_outbox();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		//if($keyword=$this->uri->segment(3)){ $this->db->like('TextDecoded',$keyword);};
		
		$query = $this->db->get();
		return $query->result();
	}
	
	private function _get_datatables_outbox()
	{
	$level=$this->session->userdata("level");
	$column = array('UpdatedInDB','DestinationNumber','TextDecoded','SenderID');
	$order = array('ID' => 'desc');
	if($url=$this->uri->segment(3) and $this->uri->segment(2)=="ajax_outbox")
		{
							$idkey=$this->konversi->desc($url);
							$idkey=$this->encryption->decrypt($idkey);
		$this->db->like('TextDecoded',$idkey);
		}else
		{
			if($level=="user"){
				$this->db->where("CreatorID",$this->session->userdata("id"));
			}
		}
	$range=$this->input->get("range");	
	$range=str_replace("_","/",$range);	
	if($range){
	$rentang=explode(" - ",$range);
	$tgl1=$this->tanggal->eng_($rentang[0],"-");
	$tgl2=$this->tanggal->eng_($rentang[1],"-");
	$this->db->where("UpdatedInDB BETWEEN '".$tgl1." 00:00:00' AND '".$tgl2." 23:59:59' ");
	}	
		
		
		$this->db->order_by("ID","DESC");
		$this->db->from("outbox");
		$i = 0;
		$item=array('UpdatedInDB','DestinationNumber','TextDecoded','SenderID');
		if($this->uri->segment(2)=="ajax_outbox")
		{			
		
		foreach ($item as $item) 
		{
			$element=$_POST['search']['value'];
			if($element)
				($i===0) ? $this->db->like($item, $element) : $this->db->or_like($item, $element);
			$column[$i] = $item;
			$i++;
		}
			
		
			if(isset($_POST['order']))
			{
				$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			} 
			else if(isset($order))
			{
				$order = $order;
				$this->db->order_by(key($order), $order[key($order)]);
			}
		}
	}
	public function count_outbox($tabel)
	{	
		$this->_get_datatables_outbox();
		return $this->db->count_all_results();
	}
	
	function downloadoutbox($range,$cari)
	{
		//////start
		$objPHPExcel = new PHPExcel();
		//style
		$style = array( 
		 'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				  'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				  'rotation'   => 0,
		  ),
		   'fill' => array(
				  'type' => PHPExcel_Style_Fill::FILL_SOLID,
				  'color' => array('rgb' => 'ccccff')
			  ),
		 'borders' => 
		  array( 'allborders' => 
			array( 'style' => PHPExcel_Style_Border::BORDER_THIN, 'color' => array('argb' => '00000000'), 
			  ), 
			), 
		);	
		
		$head = array( 
			'font'  => array(
			'bold'  => true,
			'color' => array('rgb' => 'FFFFFF'),
			),
			
		   'fill' => array(
				  'type' => PHPExcel_Style_Fill::FILL_SOLID,
				  'color' => array('rgb' => '009966')
			  ),
		 'borders' => 
		  array( 'allborders' => 
			array( 'style' => PHPExcel_Style_Border::BORDER_THIN, 'color' => array('argb' => '00000000'), 
			  ), 
			), 
		);
		
		
	//	$objPHPExcel->getActiveSheet(0)->getColumnDimension('A')->setWidth(5);

		$objPHPExcel->getActiveSheet(0)->getColumnDimension('A')->setAutoSize(true);
		$objPHPExcel->getActiveSheet(0)->getColumnDimension('B')->setAutoSize(true);
		$objPHPExcel->getActiveSheet(0)->getColumnDimension('C')->setAutoSize(true);
		$objPHPExcel->getActiveSheet(0)->getColumnDimension('D')->setAutoSize(true);
		
		
		
		//create column
		
		$objPHPExcel->getActiveSheet(0)->setCellValue('A1', 'Tanggal');
		$objPHPExcel->getActiveSheet(0)->setCellValue('B1', 'Nomor Tujuan');
		$objPHPExcel->getActiveSheet(0)->setCellValue('C1', 'Sms');
		$objPHPExcel->getActiveSheet(0)->setCellValue('D1', 'Modem');
		 
		//make a border column
		$objPHPExcel->getActiveSheet(0)->getStyle('A1:D1')->applyFromArray($style);
		
		
		$shit=5;
		$this->_get_datatables_outbox();
		if($cari){	$this->db->like("TextDecoded",$cari); }
		$rentang=explode(" - ",$range);
			$tgl1=$this->tanggal->eng_($rentang[0],"-");
			$tgl2=$this->tanggal->eng_($rentang[1],"-");

				
		$query=$this->db->get();
		$query=$query->result();
		$shit++;$row="2";
		foreach($query as $val)
		{
		$waktu=explode(" ",$val->UpdatedInDB);
		$waktu=$this->tanggal->hariLengkap($waktu[0],"/")." ".$waktu[1];
		$objPHPExcel->getActiveSheet(0)->setCellValue('A'.$row.'', $waktu);
		$objPHPExcel->getActiveSheet(0)->setCellValue('B'.$row.'','`'. $val->DestinationNumber/*." - ".$val->field1." - ".$val->field2." - ".$val->field3*/);
		$objPHPExcel->getActiveSheet(0)->setCellValue('C'.$row.'', $val->TextDecoded);
		$objPHPExcel->getActiveSheet(0)->setCellValue('D'.$row.'', $val->SenderID);
		$row++;
		}
		
		
			
		// Rename worksheet (worksheet, not filename)
		$objPHPExcel->getActiveSheet(0)->setTitle('outbox');
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);
		
		header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="SMS ANTRIAN.xlsx"');
		header('Cache-Control: max-age=0');
		 
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		//////finish
		
	
	}
	
	//draft Sms
	function dataDraft()
	{
	$ID=$this->session->userdata("id");	
	$this->db->where("GroupID",$ID);
	$this->db->order_by("id","DESC");
	return $this->db->get("draft_sms")->result();
	}
	function simpanDraft()
	{
		$data=array(
		"GroupID"=>$this->session->userdata("id"),
		"isi"=>$this->input->post("pesanDraft"),
		);
		return $this->db->insert("draft_sms",$data);
	}
	function hapusDraft($no)
	{
	$ID=$this->session->userdata("id");	
	$this->db->where("id",$no);
	$this->db->where("GroupID",$ID);
	return	$this->db->delete("draft_sms");
	}
	function getTitle()
	{	
		$ID=$this->session->userdata("id");	
		$this->db->where("ID",$ID);
		$this->db->select("title");
		$data=$this->db->get("pbk_groups")->row();
		$title=explode("_:|:_",$data->title);
		$no=2;
		$kode= "<font color='  #27ae60  '>{NAMA} ,</font> ";
		foreach($title as $title)
		{
		$kode.=" <font color=' #27ae60  '>{".$title."} </font>, ";
		}
	echo substr($kode,0,-2);	
	}
	
	function merah($range,$group)
	{
		$range=str_replace("_","/",$range);	
		if($range){
		$rentang=explode(" - ",$range);
		$tgl1=$this->tanggal->eng_($rentang[0],"-");
		$tgl2=$this->tanggal->eng_($rentang[1],"-");
		$this->db->where("UpdatedInDB BETWEEN '".$tgl1." 00:00:00' AND '".$tgl2." 23:59:59' ");
		}	
		if($group)
		{
			$this->db->where("id_sub_group",$group);
		}
		$this->db->select("sum(merah) as merah");
		$this->db->join("pbk","pbk.Number=inbox.SenderNumber");
		$this->db->from("inbox");
		$hasil=$this->db->get()->row();
	return isset($hasil->merah)?($hasil->merah):"";
	}
	function hitam($range,$group)
	{
		$range=str_replace("_","/",$range);	
		if($range){
		$rentang=explode(" - ",$range);
		$tgl1=$this->tanggal->eng_($rentang[0],"-");
		$tgl2=$this->tanggal->eng_($rentang[1],"-");
		$this->db->where("UpdatedInDB BETWEEN '".$tgl1." 00:00:00' AND '".$tgl2." 23:59:59' ");
		}	
		if($group)
		{
			$this->db->where("id_sub_group",$group);
		}
		$this->db->select("sum(hitam) as hitam");
		$this->db->join("pbk","pbk.Number=inbox.SenderNumber");
		$this->db->from("inbox");
		$hasil=$this->db->get()->row();
		return isset($hasil->hitam)?($hasil->hitam):"";
	}
	function kuning($range,$group)
	{
	$range=str_replace("_","/",$range);	
		if($range){
		$rentang=explode(" - ",$range);
		$tgl1=$this->tanggal->eng_($rentang[0],"-");
		$tgl2=$this->tanggal->eng_($rentang[1],"-");
		$this->db->where("UpdatedInDB BETWEEN '".$tgl1." 00:00:00' AND '".$tgl2." 23:59:59' ");
		}	
		if($group)
		{
			$this->db->where("id_sub_group",$group);
		}
		$this->db->select("sum(kuning) as kuning");
		$this->db->join("pbk","pbk.Number=inbox.SenderNumber");
		$this->db->from("inbox");
		$hasil=$this->db->get()->row();
		return isset($hasil->kuning)?($hasil->kuning):"";
	}
}

?>