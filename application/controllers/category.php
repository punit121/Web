<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class category extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('layout');
		$this->load->model('usermodel');
		$this->load->model('datamodel');
		$this->load->helper('form');
		$this->load->config('email', TRUE);
		$this->load->helper('cookie');
		$uid=$this->session->userdata['user_id'];
		if(!$uid){
		$user_id=get_cookie('logininfo');
		if($user_id){
			$user=$this->datamodel->getuserbyid($user_id);
			$this->session->set_userdata(array(
								'user_id'	=> $user_id,
								'username'	=> $user->username,
								'fullName'	=> $user->fullName,
								'user_level'=> $user->userLevel,
								'status'	=> ($user->activated == 1) ? 'STATUS_ACTIVATED' : 'STATUS_NOT_ACTIVATED',
						));
			redirect('');
			
			}
		}
		if (!$this->input->is_ajax_request()){
			// if(basename($_SERVER['REQUEST_URI'])!='login')
			// {
				// $newdata = array('url'=>'viewmap/'.basename($_SERVER['REQUEST_URI']));
				// $this->session->set_userdata($newdata);
			// }
			
			if($this->session->userdata('logged_in')!=TRUE) {
				$this->load->helper('url');
				$newdata = array('url'=>current_url());
				$this->session->set_userdata($newdata);
				
			}
			else{
				if(current_url()==base_url())
				redirect( 'dashboard');
				}
			
		}
	}
	
	
	public function index($a)
	{
		echo $a;
		//$this->load->view('welcome_message');
	}
	public function topic($a, $b)
	{
		echo $a." ".$b;
		//$this->load->view('welcome_message');
		}
		
	
}
