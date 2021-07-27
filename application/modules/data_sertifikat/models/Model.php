<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends ci_Model
{
	var $data_sertifikat="data_sertifikat";
	var $data_nilaiteknik="data_nilaiteknik";
	var $data_nilainonteknik="data_nilainonteknik";
	public function __construct() {
        parent::__construct();
		//$this->m_konfig->validasi_session("super");
    }

	function get_data_sertifikat()
	{
		$query=$this->_get_data_sertifikat();
		if($_POST['length'] != -1)
		$query.=" limit ".$_POST['start'].",".$_POST['length'];
		return $this->db->query($query)->result();
	}
    function _get_data_sertifikat()
	{
		$f1=$this->input->post("f1");
		$f2=$this->input->post("f2");
		$f3=$this->input->post("f3");
		$f4=$this->input->post("f4");
		$filter="";
		if($f1)
		{
			$cf1 =$f1;
			$filter.=" AND kelas='".$cf1."' ";
		}
		if($f2)
		{
			$cf2 =$f2;
			$filter.=" AND program_keahlian='".$cf2."' ";
		}
		if($f3)
		{
			$cf3 =$f3;
			$filter.=" AND kompetensi_keahlian='".$cf3."' ";
		}
		if($f4)
		{
			$cf4 =$f4;
			$filter.=" AND nama_dudi='".$cf4."' ";
		}
		$query="select * from ".$this->data_sertifikat." where 1=1 ".$filter."";
			if($_POST['search']['value']){
			$searchkey=$_POST['search']['value'];
				$query.=" AND (
				nis LIKE '%".$searchkey."%' or nama LIKE '%".$searchkey."%' or kelas LIKE '%".$searchkey."%' or nama_dudi LIKE '%".$searchkey."%'
				) ";
			}

		$column = array('','id','','nis','nama','','tanggal_lahir','');
		 $i = 0;
        foreach ($column as $item) {
            $column[$i] = $item;
        }

        if (isset($_POST['order'])) {
           $query .= " order by " . $column[$_POST['order']['0']['column']] . " " . $_POST['order']['0']['dir'];
        } else if (isset($order)) {
            $order = $order;
            $query .= " order by id DESC";
        }
		return $query;
	}
	public function count_data_sertifikat()
	{				
		$query = $this->_get_data_sertifikat();
        return  $this->db->query($query)->num_rows();
	}
	function input_Sertifikat()
	{
		$var=array();

		$idu=$this->session->userdata("id");
		$input=$this->input->post("f");
		$datainputan=$this->security->xss_clean($input);
		
		$nis=$this->input->post("f[nis]");
		$tanggal_lahir=$this->input->post("tanggal_lahir");
		$tgl_lahir=$this->tanggal->eng_($tanggal_lahir,0);
		
		$tanggal_mulai=$this->input->post("tanggal_mulai");
		$tgl_mulai=$this->tanggal->eng_($tanggal_mulai,0);
		
		$tanggal_selesai=$this->input->post("tanggal_selesai");
		$tgl_selesai=$this->tanggal->eng_($tanggal_selesai,0);
		/*
		$cek=$this->db->query('select nis from '.$this->data_sertifikat.' where nis="'.$nis.'"')->num_rows();
		if($cek)
		{
			$var['gagal']=false;
			$var['info']="Tidak Diijinkan, NIS ini sudah ada di database.";
			return $var;
		}*/

			$ctime=date("Y-m-d H:i:s"); 
			//$kode_sistem=$this->mdl->kode_sistem(); 
			
			$cid=$idu;
			$this->db->set("tanggal_lahir",$tgl_lahir);
			$this->db->set("tanggal_mulai",$tgl_mulai);
			$this->db->set("tanggal_selesai",$tgl_selesai);
			$this->db->set("_ctime",$ctime);
			$this->db->set("_cid",$cid);
			$this->db->set($datainputan);
			$this->db->insert($this->data_sertifikat);
			$var['table']=true;
			return $var; 	 
	}
	
	function edit_Sertifikat()
	{
		$id=$this->input->post("id");
		$this->db->from($this->data_sertifikat);
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
	}
	function update_Sertifikat()
	{
		$var=array();

		$idu=$this->session->userdata("id");
		$id=$this->input->post("id");
		$input=$this->input->post("f");
		$datainputan=$this->security->xss_clean($input);
		//$nis=$this->input->post("f[nis]");
		//$nis_b=$this->input->post("nis_b");
		$kompetensi_keahlian=$this->input->post("f[kompetensi_keahlian]");
		$kompetensi_keahlian_b=$this->input->post("kompetensi_keahlian_b");
		$tanggal_lahir=$this->input->post("tanggal_lahir");
		$tgl_lahir=$this->tanggal->eng_($tanggal_lahir,0);
		$tanggal_mulai=$this->input->post("tanggal_mulai");
		$tgl_mulai=$this->tanggal->eng_($tanggal_mulai,0);
		$tanggal_selesai=$this->input->post("tanggal_selesai");
		$tgl_selesai=$this->tanggal->eng_($tanggal_selesai,0);
		/*
		$cek=$this->db->query('select id from '.$this->data_sertifikat.' where nis!="'.$nis_b.'" AND nis="'.$nis.'"')->num_rows();
		if($cek)
		{
			$var['gagal']=false;
			$var['info']="Tidak Diijinkan, NIS ini sudah ada di database.";
			return $var;
		}
		*/
		$cek_kk=$this->db->query('select * from '.$this->data_sertifikat.' where id="'.$id.'" AND kompetensi_keahlian!="'.$kompetensi_keahlian.'"')->num_rows();
		if($cek_kk!=0)
		{
			$teknikDB=$this->db->get_where("data_nilaiteknik",array("ids"=>$id))->result();
			$n=1;
			foreach($teknikDB as $teknik){
				$i=$n++;
				$ids_kk[$i]=$teknik->ids;
				$this->db->where("ids",$ids_kk[$i]);
				$this->db->delete($this->data_nilaiteknik); 
			}
			$dataray_b=array(
				"jml_nilaiteknik"=>'',
				"rt_nilaiteknik"=>'',
				"rt_katteknik"=>'',
			);
			$this->update_Tblsertifikat($dataray_b,$id);
		}
		
		
			$utime=date("Y-m-d H:i:s"); 
			$uid=$idu;
			$this->db->set("tanggal_lahir",$tgl_lahir);
			$this->db->set("tanggal_mulai",$tgl_mulai);
			$this->db->set("tanggal_selesai",$tgl_selesai);
			$this->db->set("_utime",$utime);
			$this->db->set("_uid",$uid);
			$this->db->set($datainputan);  
			$this->db->where("id",$id);
			$this->db->update($this->data_sertifikat);
			$var['table']=true;
			return $var;
	}
	function update_Nilai()
	{
		$var=array();

		$idu=$this->session->userdata("id");
		$id=$this->input->post("id");
		
		$inis=$this->input->post("nis");
		$nis=$this->security->xss_clean($inis);
		
		
		$ikd_kompetensi_keahlian=$this->input->post("kd_kompetensi_keahlian");
		$kd_kompetensi_keahlian=$this->security->xss_clean($ikd_kompetensi_keahlian);
		
		$ijml_nilaiteknik=$this->input->post("jml_nilaiteknik");
		$jml_nilaiteknik=$this->security->xss_clean($ijml_nilaiteknik);
		
		$irt_nilaiteknik=$this->input->post("rt_nilaiteknik");
		$rt_nilaiteknik=$this->security->xss_clean($irt_nilaiteknik);
		
		$irt_katteknik=$this->input->post("rt_katteknik");
		$rt_katteknik=$this->security->xss_clean($irt_katteknik);
		
		$ijml_nilainonteknik=$this->input->post("jml_nilainonteknik");
		$jml_nilainonteknik=$this->security->xss_clean($ijml_nilainonteknik);
		
		$irt_nilainonteknik=$this->input->post("rt_nilainonteknik");
		$rt_nilainonteknik=$this->security->xss_clean($irt_nilainonteknik);
		
		$irt_katnonteknik=$this->input->post("rt_katnonteknik");
		$rt_katnonteknik=$this->security->xss_clean($irt_katnonteknik);
		
		//-----------------------------------nonteknik
		
		$inilai_disiplin=$this->input->post("nilai_disiplin");
		$nilai_disiplin=$this->security->xss_clean($inilai_disiplin);
		
		$ikat_disiplin=$this->input->post("kat_disiplin");
		$kat_disiplin=$this->security->xss_clean($ikat_disiplin);
		
		$inilai_kerjasama=$this->input->post("nilai_kerjasama");
		$nilai_kerjasama=$this->security->xss_clean($inilai_kerjasama);
		
		$ikat_kerjasama=$this->input->post("kat_kerjasama");
		$kat_kerjasama=$this->security->xss_clean($ikat_kerjasama);
		
		$inilai_inisiatif=$this->input->post("nilai_inisiatif");
		$nilai_inisiatif=$this->security->xss_clean($inilai_inisiatif);
		
		$ikat_inisiatif=$this->input->post("kat_inisiatif");
		$kat_inisiatif=$this->security->xss_clean($ikat_inisiatif);
		
		$inilai_kerajinan=$this->input->post("nilai_kerajinan");
		$nilai_kerajinan=$this->security->xss_clean($inilai_kerajinan);
		
		$ikat_kerajinan=$this->input->post("kat_kerajinan");
		$kat_kerajinan=$this->security->xss_clean($ikat_kerajinan);
		
		$inilai_tanggungjawab=$this->input->post("nilai_tanggungjawab");
		$nilai_tanggungjawab=$this->security->xss_clean($inilai_tanggungjawab);
		
		$ikat_tanggungjawab=$this->input->post("kat_tanggungjawab");
		$kat_tanggungjawab=$this->security->xss_clean($ikat_tanggungjawab);
		
		$inilai_sikap=$this->input->post("nilai_sikap");
		$nilai_sikap=$this->security->xss_clean($inilai_sikap);
		
		$ikat_sikap=$this->input->post("kat_sikap");
		$kat_sikap=$this->security->xss_clean($ikat_sikap);
		
			//teknik
			$aspekDB=$this->db->where("kode_kk",$kd_kompetensi_keahlian);
			$aspekDB=$this->db->order_by("kode","asc");
			$aspekDB=$this->db->get("tm_aspek")->result();
			$n=1;
			$utime=date("Y-m-d H:i:s"); 
			$uid=$idu;
			foreach($aspekDB as $aspek){
				$i=$n++;
				$kodeaspek=isset($aspek->kode)?($aspek->kode):'';
				
				$inilai_aspek[$i]=$this->input->post("nilai_aspek_".$kodeaspek);
				$nilai_aspek[$i]=$this->security->xss_clean($inilai_aspek[$i]);
				
				$ikat_aspek[$i]=$this->input->post("kat_aspek_".$kodeaspek);
				$kat_aspek[$i]=$this->security->xss_clean($ikat_aspek[$i]);
				$cek_teknik=$this->db->get_where($this->data_nilaiteknik,array("ids"=>$id,"kode_aspek"=>$kodeaspek))->num_rows();
				if($cek_teknik){	
					$this->db->set("_utime",$utime);
					$this->db->set("_uid",$uid);
					$this->db->set("angka",$nilai_aspek[$i]);
					$this->db->set("kategori",$kat_aspek[$i]);
					//$this->db->set("nis",$nis);
					$this->db->where("ids",$id);
					$this->db->where("kode_aspek",$kodeaspek);
					$this->db->update($this->data_nilaiteknik);
				}else{
					$this->db->set("ids",$id);
					$this->db->set("_ctime",$utime);
					$this->db->set("_cid",$uid);
					$this->db->set("angka",$nilai_aspek[$i]);
					$this->db->set("kategori",$kat_aspek[$i]);
					//$this->db->set("nis",$nis);
					$this->db->set("kode_aspek",$kodeaspek);
					$this->db->insert($this->data_nilaiteknik);
				}
			}
			//nonteknik
			$cek_nonteknik=$this->db->get_where($this->data_nilainonteknik,array("ids"=>$id))->num_rows();
			if($cek_nonteknik){	
				$this->db->set("_utime",$utime);
				$this->db->set("_uid",$uid);
				$this->db->set("nilai_disiplin",$nilai_disiplin);
				$this->db->set("kat_disiplin",$kat_disiplin);
				$this->db->set("nilai_kerjasama",$nilai_kerjasama);
				$this->db->set("kat_kerjasama",$kat_kerjasama);
				$this->db->set("nilai_inisiatif",$nilai_inisiatif);
				$this->db->set("kat_inisiatif",$kat_inisiatif);
				$this->db->set("nilai_kerajinan",$nilai_kerajinan);
				$this->db->set("kat_kerajinan",$kat_kerajinan);
				$this->db->set("nilai_tanggungjawab",$nilai_tanggungjawab);
				$this->db->set("kat_tanggungjawab",$kat_tanggungjawab);
				$this->db->set("nilai_sikap",$nilai_sikap);
				$this->db->set("kat_sikap",$kat_sikap);
				//$this->db->set("nis",$nis);
				$this->db->where("ids",$id);
				$this->db->update($this->data_nilainonteknik);
			}else{
				$this->db->set("ids",$id);
				$this->db->set("_ctime",$utime);
				$this->db->set("_cid",$uid);
				$this->db->set("nilai_disiplin",$nilai_disiplin);
				$this->db->set("kat_disiplin",$kat_disiplin);
				$this->db->set("nilai_kerjasama",$nilai_kerjasama);
				$this->db->set("kat_kerjasama",$kat_kerjasama);
				$this->db->set("nilai_inisiatif",$nilai_inisiatif);
				$this->db->set("kat_inisiatif",$kat_inisiatif);
				$this->db->set("nilai_kerajinan",$nilai_kerajinan);
				$this->db->set("kat_kerajinan",$kat_kerajinan);
				$this->db->set("nilai_tanggungjawab",$nilai_tanggungjawab);
				$this->db->set("kat_tanggungjawab",$kat_tanggungjawab);
				$this->db->set("nilai_sikap",$nilai_sikap);
				$this->db->set("kat_sikap",$kat_sikap);
				//$this->db->set("nis",$nis);
				$this->db->insert($this->data_nilainonteknik);
			}
			
			$dataray_b=array(
				"jml_nilaiteknik"=>$jml_nilaiteknik,
				"rt_nilaiteknik"=>$rt_nilaiteknik,
				"rt_katteknik"=>$rt_katteknik,
				"jml_nilainonteknik"=>$jml_nilainonteknik,
				"rt_nilainonteknik"=>$rt_nilainonteknik,
				"rt_katnonteknik"=>$rt_katnonteknik
			);
			$this->update_Tblsertifikat($dataray_b,$id);
			$var['nilai']=true;
			return $var;

	}
	function update_Tblsertifikat($dataray_b,$id){
		$this->db->where("id",$id);
		return	$this->db->update($this->data_sertifikat,$dataray_b);
	}
	function delete_Sertifikat()
	{
		$id=$this->input->post("id");
		if($id)
		{
			$teknikDB=$this->db->get_where("data_nilaiteknik",array("ids"=>$id))->result();
			$n=1;
			foreach($teknikDB as $teknik){
				$i=$n++;
				$ids_kk[$i]=$teknik->ids;
				$this->db->where("ids",$ids_kk[$i]);
				$this->db->delete($this->data_nilaiteknik); 
			}
			$this->db->where("ids",$id);
			$this->db->delete($this->data_nilainonteknik);
		}
		$this->db->where("id",$id);
		return $this->db->delete($this->data_sertifikat);
	}
	/*
	function update_Print()
	{
		$var=array();

		$idu=$this->session->userdata("id");
		$id=$this->input->post("id");
		
		
		if($id=='')
		{
			$var['gagal']=false;
			$var['info']="Not allowed, code or name already exists.";
			return $var;
		}
		
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
			$utime=date("Y-m-d H:i:s"); 
			$uid=$idu;
			$maxDB=$this->db->query("SELECT CONCAT(MAX(count_print)+1) AS MAXC FROM data_sertifikat WHERE id='".$getid."'")->row();
			$max=isset($maxDB->MAXC)?($maxDB->MAXC):0;
			$this->db->set("_utime",$utime);
			$this->db->set("_uid",$uid);
			$this->db->set('count_print',$max);  
			$this->db->where("id",$getid);
			$this->db->update($this->data_sertifikat);
		}
			$var['table']=true;
			return $var;

	}*/
	

	
	function import_Data()
	{	
		$var=array();
		$var["size"]=true; 
		$var["file"]=true;
		$var["validasi"]=false; 
		$var["token"]=true; 
		 
		$idu=$this->session->userdata("id");
		$input=$this->input->post("f");
		$data=$this->security->xss_clean($input);
		if(isset($_FILES["file"]['tmp_name']))
		{
			return $this->importFile("file");
			 
		}else{
			return $var;
		}
		
	}
	function importFile($file_form)
	{		
		$this->load->library("PHPExcel");
		$insert=0;$gagal=0;$edit=0;$validasi_hp=true;$validasi=true;
		$file   = explode('.',$_FILES[$file_form]['name']);
		$length = count($file);
		if($file[$length -1] == 'xlsx' || $file[$length -1] == 'xls'){
         $tmp    = $_FILES[$file_form]['tmp_name']; 
	 
			    $load = PHPExcel_IOFactory::load($tmp);
                $sheets = $load->getActiveSheet()->toArray(null,true,true,true);
				$i=1;$no=0;
				    	 //$kode_korwil=$this->input->get_post("f[kode_korwil]");
				foreach ($sheets as $sheet) {
				if ($i > 1) 
				{
    				     //$nis=$this->mdl->innis(); 
						 $nis=isset($sheet[1])?($sheet[1]):"";
    				     $nama=isset($sheet[2])?($sheet[2]):"";
    				     $tempat_lahir=isset($sheet[3])?($sheet[3]):"";
    				     $tanggal_lahir = PHPExcel_Style_NumberFormat::toFormattedString($sheet[4],  'YYYY-MM-DD');
    				     $kelas=isset($sheet[5])?($sheet[5]):"";
						 $program_keahlian=isset($sheet[6])?($sheet[6]):"";
						 $kompetensi_keahlian=isset($sheet[7])?($sheet[7]):"";
						 $sekolah_asal=isset($sheet[8])?($sheet[8]):"";
						 $nama_dudi=isset($sheet[9])?($sheet[9]):"";
						 $alamat_dudi=isset($sheet[10])?($sheet[10]):"";
						 $tanggal_mulai=PHPExcel_Style_NumberFormat::toFormattedString($sheet[11],  'YYYY-MM-DD');
						 $tanggal_selesai=PHPExcel_Style_NumberFormat::toFormattedString($sheet[12],  'YYYY-MM-DD');
						 $lama_pkl=isset($sheet[13])?($sheet[13]):"";
						 
						//$tgl=str_replace("/","-",$tanggal_lahir);
						$pecah=explode("/",$tanggal_lahir);
						$y=isset($pecah[2])?($pecah[2]):'';
						$m=isset($pecah[1])?($pecah[1]):'';
						$d=isset($pecah[0])?($pecah[0]):'';
						$tgl_lahir=$y.'-'.$m.'-'.$d;
						
						$pecah2=explode("/",$tanggal_mulai);
						$yy=isset($pecah2[2])?($pecah2[2]):'';
						$mm=isset($pecah2[1])?($pecah2[1]):'';
						$dd=isset($pecah2[0])?($pecah2[0]):'';
						$tgl_mulai=$yy.'-'.$mm.'-'.$dd;
						
						$pecah3=explode("/",$tanggal_selesai);
						$yyy=isset($pecah3[2])?($pecah3[2]):'';
						$mmm=isset($pecah3[1])?($pecah3[1]):'';
						$ddd=isset($pecah3[0])?($pecah3[0]):'';
						$tgl_selesai=$yyy.'-'.$mmm.'-'.$ddd;

						$kelasDB=$this->db->where("kelas",$kelas);
						$kelasDB=$this->db->get("tm_kelas")->row();
						$kd_kelas=isset($kelasDB->kode)?($kelasDB->kode):'';
						
						$program_keahlianDB=$this->db->where("program_keahlian",$program_keahlian);
						$program_keahlianDB=$this->db->get("tm_program_keahlian")->row();
						$kd_program_keahlian=isset($program_keahlianDB->kode)?($program_keahlianDB->kode):'';
						
						$kompetensi_keahlianDB=$this->db->where("kompetensi_keahlian",$kompetensi_keahlian);
						$kompetensi_keahlianDB=$this->db->get("tm_kompetensi_keahlian")->row();
						$kd_kompetensi_keahlian=isset($kompetensi_keahlianDB->kode)?($kompetensi_keahlianDB->kode):'';
			
						 //$tgl_berlaku=$this->tanggal->format($tgl_berlaku); 
						 //$tgl_kadaluarsa=$this->tanggal->addBulan($tgl_berlaku,36);
						 /*$cek_ktp=$this->db->query("select * from data_kartu where ktp='$ktp' ")->num_rows();
						 if($cek_ktp)
						 {
                			  $var["info"]="KTP ada yang sama di nomor urut :".($i-1);
                			  $var["gagal"]=false;
								return $var;
						 }*/

					if($nama)
					{	     
							//if($nis)
							//{
							//	 $kode_gardu=isset($sheet[$no++])?($sheet[$no]):"";
							//	 $kode_gardu=str_replace("`","",$kode_gardu);
							//	 $kode_gardu=str_replace("'","",$kode_gardu);
							//	 $kode_gardu=sprintf("%03s", $kode_gardu);
							/*
								$cek_nis=$this->db->get_where($this->data_sertifikat,array("nis"=>$nis))->num_rows();
								if($cek_nis){
										
										$dataray=array(
										"nis"=>$nis,
										"nama"=>$nama,
										"tempat_lahir"=>$tempat_lahir,
										"tanggal_lahir"=>$tgl_lahir,
										"kelas"=>$kd_kelas,
										"program_keahlian"=>$kd_program_keahlian,
										"kompetensi_keahlian"=>$kd_kompetensi_keahlian,
										"sekolah_asal"=>$sekolah_asal
										);
	
									$this->update_data($dataray);
									$edit++;
									//$this->qr($noida);
								}else{*/
									$dataray=array(
										"nis"=>$nis,
										"nama"=>$nama,
										"tempat_lahir"=>$tempat_lahir,
										"tanggal_lahir"=>$tgl_lahir,
										"kelas"=>$kd_kelas,
										"program_keahlian"=>$kd_program_keahlian,
										"kompetensi_keahlian"=>$kd_kompetensi_keahlian,
										"sekolah_asal"=>$sekolah_asal,
										"nama_dudi"=>$nama_dudi,
										"alamat_dudi"=>$alamat_dudi,
										"tanggal_mulai"=>$tgl_mulai,
										"tanggal_selesai"=>$tgl_selesai,
										"lama_pkl"=>$lama_pkl
										);
										//if($nis){
									$this->insert_data($dataray);
									$insert++;
									//$this->qr($noida);
										//}
								//}
							//}
					}
				}
				$i++;
                }
		}else{
			 $var["file"]=false;
			 $var["type_file"]="xlsx";
		}
			  $var["import_data"]=true;
			  $var["data_insert"]=$insert;
			  $var["data_gagal"]=$gagal;
			  $var["data_edit"]=$edit;
			  $var["hp"]=$validasi_hp;
			  $var["validasi"]=$validasi;
		return $var;
	}
	function update_data($dataray)
	{
			$this->db->where("nis",$dataray['nis']);
		return	$this->db->update($this->data_sertifikat,$dataray);
	}
	function insert_data($dataray)
	{
		return	$this->db->insert($this->data_sertifikat,$dataray);
	}
	/*function innia(){
	    //if(!$val){	return false;	}
	    $t=$this->db->query("SELECT(MAX(SUBSTR(noida,4,5))+1) as noida FROM data_sertifikat")->row();
		$idv=isset($t->noida)?($t->noida):''; 
		if(!$idv){     return "00001"; }
		return  	sprintf("%05s", $idv);
	}
	/*
	function kode_sistem(){
	    //if(!$val){	return false;	}
	    $t=$this->db->query("SELECT(MAX(SUBSTR(kode_sistem,4,5))+1) as kode_sistem FROM data_sertifikat")->row();
		$idv=isset($t->kode_sistem)?($t->kode_sistem):''; 
		if(!$idv){     return "SE00001"; }
		return  	sprintf("%05s", $idv); 
	}

	/*function qr($id)
	{
			
		 if($id){
			$filename = 'qr/'.$id;
			if (!file_exists($filename)) { 
					$this->load->library('ciqrcode');
					$params['data'] = $id;
					$params['level'] = 'H';
					$params['size'] = 10;
					$params['savename'] = FCPATH.'qr/'.$id.".png";
					return	$this->ciqrcode->generate($params);
			}
		 }
	 }*/
	 
	 



}

?>