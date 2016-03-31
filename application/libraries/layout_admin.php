<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Layout_admin 
{
    public $head = 'admin_layout/head';
    public $header = 'admin_layout/header';
    public $footer = 'admin_layout/footer';
	function __construct()
	{
		$this->lt =& get_instance();		
	}
	function view($view ='', $data ='')				
	{
		
		$this->lt->load->view($this->head,$data);
		$this->lt->load->view($this->header,$data);
		$this->lt->load->view($view, $data);
		//$this->lt->load->view($this->footer,$data);
	}
}
?>