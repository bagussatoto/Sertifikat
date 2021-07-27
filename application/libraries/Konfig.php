<?php 
class konfig
{
	public function konfigurasi($ID)
	{
	$ci = &get_instance();
	$ci->load->model("m_konfig");
	return $ci->m_konfig->konfigurasi($ID);
	}
	public function dataProfile($id)
	{
	$ci = &get_instance();
	$ci->load->model("m_profile");
	return $ci->m_profile->dataProfile($id);
	}
	public function noInvoice($id)
	{
	$ci = &get_instance();
	$ci->load->model("m_umum");
	return $ci->m_umum->noInvoice($id);
	}
	public function dataKonfig($id)
	{
	$ci = &get_instance();
	$ci->load->model("m_konfig");
	return $ci->m_konfig->dataKonfig($id);
	}
	public function menu()
	{
	$ci = &get_instance();
	$ci->load->model("m_konfig");
	return $ci->m_konfig->menu();
	}
	public function maxMenu()
	{
	$ci = &get_instance();
	$ci->load->model("m_konfig");
	return $ci->m_konfig->maxMenu();
	}
	function  validasi_session()
	{
	$ci = &get_instance();
	$ci->load->model("m_konfig");
	return $ci->m_konfig->validasi_session();
	}
	function  direct()
	{
	$ci = &get_instance();
	$ci->load->model("m_konfig");
	return $ci->m_konfig->getDataLevel();
	}
	
	public function colorKonfig($id)
	{
	$ci = &get_instance();
	$ci->load->model("m_konfig");
	return $ci->m_konfig->colorKonfig($id);
	}
	public function emailKonfig($id)
	{
	$ci = &get_instance();
	$ci->load->model("m_konfig");
	return $ci->m_konfig->emailKonfig($id);
	}
}
