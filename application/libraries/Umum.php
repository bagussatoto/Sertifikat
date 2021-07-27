<?php 
class umum
{
	
	public function totalUser()
	{
	$ci = &get_instance();
	$ci->load->model("m_umum");
	return $ci->m_umum->totalUser();
	}
}
