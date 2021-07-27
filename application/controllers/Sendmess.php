<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Sendmess extends MX_Controller {
	
	public function __construct(){
		parent:: __construct();
		$this->load->model('sendmess_m');		
		$this->load->helper('url');
		$this->load->helper('xss_helper');
		$this->load->helper('date_helper');
		$this->load->helper('cookie');
		$this->load->library("security");
		date_default_timezone_set("Asia/Bangkok");
	}
	
	public function index(){
		
	
            //get the form data
            $fname = $this->input->post('form_name');
            $femail = $this->input->post('form_email');
            $fsubject = $this->input->post('form_subject');
            $fmessage = $this->input->post('form_message');
			$fhp = $this->input->post('form_hp');
 
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
                'newline'   => "\r\n"
			);
  
            $this->load->library('email', $config);
			$this->email->set_newline("\r\n");			
 
            //send mail;
            $this->email->from($femail, $fname);
            $this->email->to($recipientArr);
            $this->email->subject($fsubject);
            $this->email->message($fmessage);
			$result = $this->email->send();
            if ($result)
            {
                // mail sent
				$data=$this->sendmess_m->message();
				echo $data;
            }
            else
            {
                //error
                echo 0;
            }
	}
		


	
	
	


}

/* End of file Map.php */
/* Location: ./application/controllers/welcome.php */