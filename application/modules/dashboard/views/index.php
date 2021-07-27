<?php 
$level=$this->session->userdata('level');
$data['ttl_dtser']=$this->db->get('data_sertifikat')->num_rows();
$data['ttl_temp']=$this->db->get('temp_sertifikat')->num_rows();
$data['data_kelas']=$this->db->get('tm_kelas')->result();
$tglsekarang=date('Y-m-d');
//$DB_printhariini=$this->db->query("SELECT SUM(count_print) AS ttl_cetakhariini FROM data_sertifikat WHERE SUBSTR(_utime,1,10)='".$tglsekarang."'")->row();
//$data['ttl_cetakhariini']=$DB_printhariini->ttl_cetakhariini;
//$DB_printsemua=$this->db->query("SELECT SUM(count_print) AS ttl_cetaksemua FROM data_sertifikat")->row();
//$data['ttl_cetaksemua']=$DB_printsemua->ttl_cetaksemua;
/*
$DB_male=$this->db->query("SELECT COUNT(gender) AS ttl_male FROM data_sertifikat WHERE gender='L'")->row();
$data['ttl_male']=$DB_male->ttl_male;
$DB_female=$this->db->query("SELECT COUNT(gender) AS ttl_female FROM data_sertifikat WHERE gender='P'")->row();
$data['ttl_female']=$DB_female->ttl_female;
*/
if($level=='SUPER'){
	echo $this->load->view('dashboard_super',$data);
}elseif($level=='ADMIN'){
	echo $this->load->view('dashboard_admin',$data);
}
?>