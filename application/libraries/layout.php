<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Layout 
{
   // public $head = 'layout/head';
    public $header = 'layout/header';
   
	function __construct()
	{
		$this->lt =& get_instance();	
		//$this->load->model('header_model');	
	}
	function view($view ='', $data ='', $hd='')				//load view in controller with layout
	{	
		 $head = 'layout/'.$hd;
		//$data['activeUserLevel']= $data['loggedUser']['userLevel'];
		//$sessionData = $this->session->userdata('loggedIn');
		$this->lt->load->view($head,$data);
		$this->lt->load->view($this->header,$data);
		//$this->lt->load->view($this->footer,$data);
		$this->lt->load->view($view, $data);
		
	}
}
?>