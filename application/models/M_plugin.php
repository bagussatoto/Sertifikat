<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_plugin extends ci_Model
{
	
	public function __construct() {
        parent::__construct();
     	}
	function dataPlug()
	{
			$this->db->order_by("id","ASC");
	return	$this->db->get("plugin")->result();
	}
	
	
	
}

?>