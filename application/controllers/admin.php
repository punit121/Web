<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');ob_start();

class Admin extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		//$this->load->library('session');
		$this->load->library('layout');
		$this->load->library('layout_admin');
		$this->load->model('admin_model');
		$userlevel=$this->session->userdata('user_level');
		$this->userLevel=$userlevel;
	}
	 
	public function index()
	{
		
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$this->load->view('admin/dashboard');
	}
	
	function merchants(){
	
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$data['merchants'] = $this->admin_model->get_merchants();
		$this->layout_admin->view('admin/merchants', $data);
	}
	
	function setting()
	{
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$this->layout_admin->view('admin/setting');
	}
	function change_password()
	{
		$data['message'] = 'Password Changed successfully';
		$data['added'] = true;
		$this->layout_admin->view('admin/setting', $data);
	}
	
	function del_merchant(){
	if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$del = $this->admin_model->del_merchant($this->input->post('merchantId'));
		if($del){
			echo "true";
		}else{
			echo "false";
		}
	}
	function ban_merchant(){
	
	if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$update = $this->admin_model->ban_merchant($this->input->post('merchantId'));
		if($update){
			echo "true";
		}else{
			echo "false";
		}
	}
	
	
	function adctv_service(){
	if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$update = $this->admin_model->adctv_service($this->input->post('service_id'));
		if($update){
			echo "true";
		}else{
			echo "false";
		}
	}
	
	function employees(){
	
	if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$merchant = $this->session->userdata('user_id');
		$data['employees'] = $this->admin_model->get_employees($merchant);
		$data['pageName']='employee';
		$this->layout_admin->view('admin/employees', $data);
	}
	function del_employee(){
	if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$del = $this->admin_model->del_employee($this->input->post('employee_id'));
		if($del){
			echo "true";
		}else{
			echo "false";
		}
	}
	function ban_employee(){
	
	if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$update = $this->admin_model->ban_employee($this->input->post('employee_id'));
		if($update){
			echo "true";
		}else{
			echo "false";
		}
	}
	function adctv_employee(){
	if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$update = $this->admin_model->adctv_employee($this->input->post('employee_id'));
		if($update){
			echo "true";
		}else{
			echo "false";
		}
	}
	function new_emp(){
	if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$data = array();
		if($this->input->post()){
			$res = $this->admin_model->add_employee($this->input->post());
			if($res=='email_exists'){
				$data['message'] = 'This email already exists.';
				$data['added'] = false;
			}else{
				$merchant_details = $this->admin_model->get_merchant_details($this->session->userdata('user_id'));
				$mer_email = $merchant_details[0]['email'];
				$emp_email = $this->input->post('email');
				$subject = 'Account Info';
				$message = "Hi ".$this->input->post('name').",<br> Here is your account information.<br>Name:&nbsp".$this->input->post('name')."<br>Email:&nbsp".$this->input->post('email')."<br>Password:&nbsp".$this->input->post('password')."<br>You can user this info to login to your account<br><br>Regards<br>".$merchant_details[0]['name'];
				$this->sendMail($subject, $message, $emp_email, $mer_email);
				$data['message'] = 'Employee has been created and mail sent successfully.';
				$data['added'] = true;
			}
		}
		$this->layout_admin->view('admin/new_emp', $data);
	}
	function add_merchant(){
	if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$data = array();
		if($this->input->post()){
			$res = $this->admin_model->add_merchant($this->input->post());
			if($res=='email_exists'){
				$data['message'] = 'This email already exists.';
				$data['added'] = false;//print_r($data);exit;
			}
			//else{
				// $merchant_details = $this->admin_model->get_merchant_details($this->session->userdata('user_id'));
				// $mer_email = $merchant_details[0]['email'];
				// $emp_email = $this->input->post('email');
				// $subject = 'Account Info';
				// $message = "Hi ".$this->input->post('name').",<br> Here is your account information.<br>Name:&nbsp".$this->input->post('name')."<br>Email:&nbsp".$this->input->post('email')."<br>Password:&nbsp".$this->input->post('password')."<br>You can user this info to login to your account<br><br>Regards<br>".$merchant_details[0]['name'];
				// $this->sendMail($subject, $message, $emp_email, $mer_email);
				// $data['message'] = 'Employee has been created and mail sent successfully.';
				// $data['added'] = true;
			// }
		}
		$this->layout_admin->view('admin/add_merchant', $data);
	}
	function edit_employee(){
	if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		if($this->input->post()){
		$file = '';
		if($_FILES){
			$size=$_FILES['employee_image']['size'];
			if($size<"11263")
			{
			$_FILES['employee_image']['name']="";
			$update = $this->admin_model->edit_employee($this->input->post(),$_FILES['employee_image']['name']);
			 // redirect('/merchantprofile');
			}
			else
			{
				
				
				$res = $this->upload_it($_FILES);
				
				if($res['msg']=='success'){
					$file = $res['upload_data']['file_name'];
					}
				$update = $this->admin_model->edit_employee($this->input->post(),$file);
			}
		
			
		
		}
					redirect('/employees');
		}
		//$temp = $this->admin_model->get_employee_details(base64_decode($this->input->get('id')));
		$temp = $this->admin_model->get_employee_details($this->input->get('id'));
		$data['employee'] = $temp[0];		
		//$check=$this->admin_model->checkMerchantEmployee(base64_decode($this->input->get('id')));
		$check=$this->admin_model->checkMerchantEmployee($this->input->get('id'));
		if($check)
		redirect('/employees');
		else
		$this->layout_admin->view('admin/edit_employee', $data);
			
		}
	
	function services()
	{
	if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$merchant = $this->session->userdata('user_id');
		$data['services'] = $this->admin_model->get_services($merchant);
		$data['pageName']='service';
		//var_dump($data);exit;
		$this->layout_admin->view('admin/services', $data);
	}
	function newservice(){
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$data['newservice'] = $this->admin_model->newservice();
		$this->layout_admin->view('admin/new_service', $data);
	 }
	function new_service(){
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$service = $this->session->userdata('user_id');
		$data['services'] = $this->admin_model->set_service($service);
		$data['message'] = 'Service Added successfully.';
		$data['added'] = true;
		$this->layout_admin->view('admin/new_service', $data); 
	 }
	function edit_service(){
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		if($this->input->post()){
			$update = $this->admin_model->edit_service($this->input->post());
			if($update){
				$data['message'] = 'Service updated successfully.';
				$data['added'] = true;
			}
		}
		
		//$id=base64_decode($this->input->get('id'));
		$id=$this->input->get('id');	
		$temp = $this->admin_model->get_service_details($id);
		$data['service'] = $temp[0];
		//$check=$this->admin_model->checkMerchantServices(base64_decode($this->input->get('id')));
		$check=$this->admin_model->checkMerchantServices($this->input->get('id'));
		if($check)
		redirect('/services');
		else
		$this->layout_admin->view('admin/edit_service', $data);
	}
	function del_service(){
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$del = $this->admin_model->del_service($this->input->post('service_id'));
		if($del){
			echo "true";
		}else{
			echo "false";
		}
	}
	function del_category(){
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$del = $this->admin_model->del_category($this->input->post('service_id'));
		if($del){
			echo "true";
		}else{
			echo "false";
		}
	}
	
	function adctv_category(){
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$actv = $this->admin_model->adctv_category($this->input->post('category_id'));
		if($actv){
			echo "true ";
		}else{
			echo "false";
		}
	}
	
	function sendMail($subject, $message, $to, $from){
   /* $config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'xxx@gmail.com', // change it to yours
			'smtp_pass' => 'xxx', // change it to yours
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
		);*/
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';

		//$message = 'testing mail';
    $this->load->library('email', $config);
    $this->email->set_newline("\r\n");
    $this->email->from($from); // change it to yours
    $this->email->to($to);// change it to yours
    $this->email->subject($subject);
    $this->email->message($message);
    if($this->email->send()){
      return true;
    }else{
			show_error($this->email->print_debugger());
    }
		exit;
	}
	function edit_mer_profile(){
	if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		$file = '';
		if($_FILES){
			$size=$_FILES['profile_image']['size'];
			if($size<"11263")
			{
				$_FILES['profile_image']['name']="";
				$update = $this->admin_model->edit_merchant($this->input->post(),$_FILES['profile_image']['name']);
				if($update){
				$data['message'] = 'Profile updated successfully.';
				$data['added'] = true;
			}
			 // redirect('/merchantprofile');
			}
			else
			{
				//print_r($_FILES);exit;
				$res = $this->upload_it($_FILES);
				// print_r ($res);
				// exit;
				if($res['msg']=='success'){
					$file = 'thumb_'.$res['upload_data']['file_name'];
				}
			}
		}
		if($this->input->post()){
			$update = $this->admin_model->edit_merchant($this->input->post(), $file);
			if($update){
				$data['message'] = 'Profile updated successfully.';
				$data['added'] = true;
			}
		}
		$id = $this->session->userdata('user_id');
		$merchant = $this->admin_model->get_merchant_details($id);
		$data['merchant'] = $merchant[0];
		//var_dump($data);exit;
		$this->layout_admin->view('admin/edit_mer_profile', $data);
	}
	function upload_it() {
	//	print_r($_FILES);exit;
		//load the helper
		$this->load->helper('form');
		//Configure
		//set the path where the files uploaded will be copied. NOTE if using linux, set the folder to permission 777
		$config['upload_path'] = 'assets/images/merchant';		
    // set the filter image types
		$config['allowed_types'] = 'gif|jpg|png';
		
		//load the upload library
		$this->load->library('upload', $config);
    
    $this->upload->initialize($config);
    
    $this->upload->set_allowed_types('*');
		// echo $this->upload->do_upload('employee_image');
		// echo $this->upload->do_upload('profile_image');
		// exit;
		$data['upload_data'] = '';
		//print_r($this->upload->do_upload('employee_image'));
		
		if (!$this->upload->do_upload('profile_image')) {
			$data = array('msg' => $this->upload->display_errors());
		} else { //else, set the success message
			$data = array('msg' => "success");      
      $data['upload_data'] = $this->upload->data();
	  $this->load->library('image_lib');
		
		 $config = array(
    'source_image'      => $data['upload_data']['full_path'],
    'new_image'         => 'thumb_'.$data['upload_data']['file_name'],
    'maintain_ratio'    => true,
    'width'             => 335,
    'height'            => 335
    );
    //here is the second thumbnail, notice the call for the initialize() function again
    $this->image_lib->initialize($config);
    $this->image_lib->resize();

		return $data;
		}
		if (!$this->upload->do_upload('employee_image')) {
			$data = array('msg' => $this->upload->display_errors());
		} else { //else, set the success message
			$data = array('msg' => "success");      
      $data['upload_data'] = $this->upload->data();
		return $data;		
		}
		if (!$this->upload->do_upload('offerImage')) {
			$data = array('msg' => $this->upload->display_errors());
		} else { //else, set the success message
			$data = array('msg' => "success");      
      $data['upload_data'] = $this->upload->data();
		return $data;
		}
		if (!$this->upload->do_upload('photo')) {
			$data = array('msg' => $this->upload->display_errors());
		} else { //else, set the success message
			$data = array('msg' => "success");      
      $data['upload_data'] = $this->upload->data();
		return $data;
		}
		return $data;		
	}
	function offerImage_upload_it() {
		$this->load->helper('form');
		$config['upload_path'] = 'assets/images/demo/offer';		
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);   
		$this->upload->initialize($config);
		$this->upload->set_allowed_types('*');
		$data['upload_data'] = '';
		if (!$this->upload->do_upload('offerImage')) {
			$data = array('msg' => $this->upload->display_errors());
		} else { 
			$data = array('msg' => "success");      
      $data['upload_data'] = $this->upload->data();
	  
	  $this->load->library('image_lib');
		
		 $config = array(
    'source_image'      => $data['upload_data']['full_path'],
    'new_image'         => 'thumb_'.$data['upload_data']['file_name'],
    'maintain_ratio'    => true,
    'width'             => 335,
    'height'            => 335
    );
    //here is the second thumbnail, notice the call for the initialize() function again
    $this->image_lib->initialize($config);
    $this->image_lib->resize();

		return $data;
		}
		return $data;		
	}
	function new_appointment(){
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		$this->layout_admin->view('admin/new_appointment');
	}
	
	function viewAppointment()
	{
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$result=$this->admin_model->viewAppointment();
		$data['pageName']='viewAppointment';
		$this->layout_admin->view('admin/viewAppointment',$data);
		//$calendar=array('title'=>'Appointment','start'=>
		//print_r($result);
	}
	function change_appointment()
	{
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$this->layout_admin->view('admin/change_appointment');
		
	}
	function editAppointment()
	{
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		if($this->input->post()){
			$update = $this->admin_model->edit_Appointment($this->input->post());
			if($update){
				$data['message'] = 'Appointment updated successfully.';
				$data['added'] = true;
			}
		}
		//$result=$this->admin_model->editAppointment();
		
		$data['pageName']='editAppointment';
		$this->layout_admin->view('admin/edit_Appointment',$data);
		//$calendar=array('title'=>'Appointment','start'=>
		//print_r($result);
	}

	function new_category(){
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$data['pageName']='newCategory';
		$this->layout_admin->view('admin/new_category',$data);
	}
	function insert_category(){
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$category = $this->session->userdata('user_id');
		$data['services'] = $this->admin_model->set_category($category);
		$data['message'] = 'Category Added successfully.';
		$data['added'] = true;
		$this->layout_admin->view('admin/new_category', $data);
	 }
	function viewCategory()
	{	if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$data['viewCategory']=$this->admin_model->viewCategory();
		$data['pageName']='viewCategory';
		$this->layout_admin->view('admin/viewCategory',$data);
	}
	function edit_category()
	{
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		if($this->input->post()){
			$update = $this->admin_model->editCategory($this->input->post());
			if($update){
				// $data['message'] = 'Category updated successfully.';
				// $data['added'] = true;
				redirect('viewCategory');
			}
		}
		//$temp = $this->admin_model->getCategory_details(base64_decode($this->input->get('id')));
		$temp = $this->admin_model->getCategory_details($this->input->get('id'));
		$data['category'] = $temp[0];
		//$check=$this->admin_model->checkMerchantCategory(base64_decode($this->input->get('id')));
		$check=$this->admin_model->checkMerchantCategory($this->input->get('id'));
		if($check)
		redirect('/viewCategory');
		else
		$this->layout_admin->view('admin/edit_category', $data);
	}
	function book_appointment()
	{
		if(!$this->session->userdata('user_id')){
		redirect('auth/login');
	}
	if($this->userLevel==4)
		{
			redirect('auth/login');
		}
	   $this->admin_model->book_appointment();
	   $data['message'] = 'Appointment Booked successfully.';
		$data['added'] = true;
		$this->layout_admin->view('admin/new_appointment', $data);
	}
	
	function new_offer()
	{
		if(!$this->session->userdata('user_id')){
		redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$data['pageName']='new_offer';
		$this->layout_admin->view('admin/new_offer',$data);
	}
	
	function view_offer()
	{
		if(!$this->session->userdata('user_id')){
		redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$data['pageName']='view_offer';
		$this->layout_admin->view('admin/view_offer',$data);
	}
	function add_offer()
	{
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$file='';
		if($_FILES){
			$size=$_FILES['offerImage']['size'];
			if($size<"11263")
			{
			$_FILES['offerImage']['name']="";
			$this->admin_model->add_offer($_FILES['offerImage']['name']);
			}
			else
			{
				$res = $this->offerImage_upload_it($_FILES);
				
				if($res['msg']=='success'){
					$file = 'thumb_'.$res['upload_data']['file_name'];
					$this->admin_model->add_offer( $file);
				}
			}
		}
		$data['message'] = 'Offer Added successfully.';
		$data['added'] = true;
		$this->layout_admin->view('admin/new_offer', $data);
	}
	function update_offer()
	{
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$file='';
		if($_FILES){
			$size=$_FILES['offerImage']['size'];
			if($size<"11263")
			{
			$_FILES['offerImage']['name']="";
			$this->admin_model->update_offer($_FILES['offerImage']['name']);
			}
			else
			{
				$res = $this->offerImage_upload_it($_FILES);
				if($res['msg']=='success'){
					$file = 'thumb_'.$res['upload_data']['file_name'];
					$this->admin_model->update_offer($file);
				}
			}
		}
		$data['message'] = 'Offer Added successfully.';
		$data['added'] = true;
		$this->layout_admin->view('admin/view_offer', $data);
	}
	function side_setting()
	{
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$this->layout_admin->view('admin/side_setting');
	}
	function add_setting()
	{	if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
	   $this->admin_model->add_setting();
		$data['message'] = 'Setting done successfully.';
		$data['added'] = true;
		$this->layout_admin->view('admin/side_setting', $data);
	}
	function add_photo()
	{
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$this->layout_admin->view('admin/add_photo');
	}
	function view_photo()
	{
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		$this->layout_admin->view('admin/view_photo');
	}
	function add_lookbook()
	{
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$file='';
		if($_FILES){
		$this->load->library('image_lib');	
				
			
		$files = $_FILES;
		$cpt = count($_FILES['photo']['name']);
	//echo ($cpt);
    for($i=0; $i<$cpt; $i++)
    {		//echo('sdfsdfsdf ');
		//print_r($files['photo']['name']);
 $config['upload_path'] = './assets/images/merchant/browsphoto/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '3000';
		$config['max_width']  = '10240';
		$config['max_height']  = '7680';
		$this->load->library('upload', $config);
		
        $_FILES['photo']['name']= $files['photo']['name'][$i];
        $_FILES['photo']['type']= $files['photo']['type'][$i];
        $_FILES['photo']['tmp_name']= $files['photo']['tmp_name'][$i];
        $_FILES['photo']['error']= $files['photo']['error'][$i];
        $_FILES['photo']['size']= $files['photo']['size'][$i];    

		$this->upload->initialize($config);
		
	if ( !$this->upload->do_upload('photo'))
		{ 
		echo ('<script>alert("'.preg_replace('/(\n)+/m', ' ', strip_tags($this->upload->display_errors())).'");
		window.location.href="'.base_url().'add_photo";</script>');
		//redirect(base_url()."blog/findAllBlog");
		
		}
	else{
	
		$data = $this->upload->data();
		 $config = array(
    'source_image'      => $data['full_path'],
    'new_image'         => 'thumb_'.$data['file_name'],
    'maintain_ratio'    => true,
    'width'             => 150,
    'height'            => 150
    );
    //here is the second thumbnail, notice the call for the initialize() function again
    $this->image_lib->initialize($config);
    $this->image_lib->resize();		
		$lookbook=$this->admin_model->seeLookupalbum();
		if($lookbook)
		{
			$lookbook=$this->admin_model->addLookbook($data['file_name'],'thumb_'.$data['file_name']);
			//echo 'inserted into lookbook';
		}
		else
		{		
			$lookbook=$this->admin_model->addToLookbook();
			$lookbook=$this->admin_model->addLookbook($data['file_name'],'thumb_'.$data['file_name']);
			//echo 'inserted into lookupalbum';
		}
		}		$data['message'] = 'Photo Added successfully.';
				 $data['added'] = true;
			}
		
	}
		$this->layout_admin->view('admin/add_photo', $data);
	}
	
	function findAppointmentForCalendar()
	 {
	  $result=$this->admin_model->findAppointmentForCalendar();
	  $i=0;
	  if(!empty($result))
	  {
			foreach($result as $value)
			{
				if($value['userId']==0){
					
					$customerName=$this->admin_model->findNameofcustomerByuserId($value['custId']);
					$data1[$i]['customerName']=$customerName[0]['name'];
				}
				else{
			   $customerName=$this->admin_model->findNameByuserId($value['userId']);
			   $data1[$i]['customerName']=$customerName[0]['firstName'].' '.$customerName[0]['lastName'];
			   }   
			   $empName=$this->admin_model->findNameByuserId($value['empId']);
			   $datetime=strtotime($value['appointDate'].' '.$value['appointTime']);
			   $addtime=$this->admin_model->findTimeByServiceId($value['serviceId']);
			   $endTime = date("H:i:s",strtotime('+'.intVal($addtime[0]['duration']).' minutes',$datetime));
			   
			   $data1[$i]['empName']=$empName[0]['firstName'].' '.$empName[0]['lastName'];
			   $data1[$i]['bookDate']=$value['appointDate'];
			   $data1[$i]['bookTime']=$value['appointTime'];
			   $data1[$i]['endTime']=$endTime;
			   $i++;
			}
		echo json_encode($data1);
		}
		 else
		{
		echo 'fail';
		}
	 }
	 function adctv_offer()
	 {
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$actv = $this->admin_model->adctv_offer($this->input->post('offer_id'));
		if($actv){
			echo "true ";
		}else{
			echo "false";
		}
	 }
	 function edit_offer()
	{
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		 $data['pageName']='edit_offer';
		 $check=$this->admin_model->checkMerchantoffer(base64_decode($this->input->get('id')));
		if($check)
		redirect('/view_offer');
		else
		 $this->layout_admin->view('admin/edit_offer',$data);
		// $data['message'] = 'Category updated successfully.';
		// $data['added'] = true;
	}
	function add_auction()
	{
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		 $this->layout_admin->view('admin/add_auction');
	}
	function view_auction()
	{
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		 $this->layout_admin->view('admin/view_auction');
	}
	function new_auction()
	{
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		//$category = $this->session->userdata('user_id');
		$result= $this->admin_model->new_auction();
		if($result)
		{
		$data['message'] = 'Auction Added successfully.';
		$data['added'] = true;
		$this->layout_admin->view('admin/add_auction', $data);
		}
		else
		{
		$data['message'] = 'Auction Not successfully.';
		$data['added'] = true;
		$this->layout_admin->view('admin/add_auction', $data);
		}
	}
	function edit_auction()
	{
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		if($this->input->post()){
			$update = $this->admin_model->edit_auction($this->input->post());
			if($update){
				$data['message'] = 'Auction updated successfully.';
				$data['added'] = true;
			}
		}
		$temp = $this->admin_model->get_auction_details($this->input->get('id'));
		$data['auction'] = $temp[0];
		$this->layout_admin->view('admin/edit_auction', $data);
	}
	
	function del_auction()
	{
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$del = $this->admin_model->del_auction($this->input->post('auction_id'));
		if($del){
			echo "true";
		}else{
			echo "false";
		}
	}
	function del_offer()
	{
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$del = $this->admin_model->del_offer($this->input->post('offer_id'));
		if($del){
			echo "true";
		}else{
			echo "false";
		}
	}
	function adctv_auction()
	{
		if(!$this->session->userdata('user_id'))
			redirect('auth/login');
		$update = $this->admin_model->adctv_auction($this->input->post('service_id'));
		if($update)
			echo "true";
		else
			echo "false";
	}
	function new_bid()
	{
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		 $this->layout_admin->view('admin/new_bid');
	}
	function view_bid()
	{
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		 $this->layout_admin->view('admin/view_bid');
	}
	function deleteImage()
	{
		if(!$this->session->userdata('user_id'))
		{
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$result = $this->admin_model->deleteImage();
		if($result)
		echo "success";
		else
		echo "Image Not Deleted";
	}
	function edit_merchant()
	{
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$file='';
		if($this->input->post()){
			$update = $this->admin_model->edit_selected_merchant($this->input->post(),$file);
			if($update){
				$data['message'] = 'Service updated successfully.';
				$data['added'] = true;
			}
		}
		$temp = $this->admin_model->get_merchant_details(base64_decode($this->input->get('id')));
		$data['service'] = $temp[0];
		$this->layout_admin->view('admin/edit_merchant', $data);
	}
	
	function getAppointment()
	{
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		 $result=$this->admin_model->getAppointment();
		 $i=0;
		 $mainResult=array();
		 
		 foreach($result as $value)
		 {	
		 	if($value['userId']==0)
				$name=$this->admin_model->findCustomereditNameById($value['custId']);
			
			else
			$name=$this->admin_model->findCustomerNameById($value['userId']);
		 
			$ename=$this->admin_model->findEmployeById($value['empId']);
			$service=$this->admin_model->findServiceById($value['serviceId']);
			$mainResult[$i]['cName']=$name;
			$mainResult[$i]['eName']=$ename;
			$mainResult[$i]['service']=$service;
			$mainResult[$i]['appointDate']=$value['appointDate'];
			$mainResult[$i]['appointTime']=$value['appointTime'];
			$mainResult[$i]['id']=$value['id'];
			$i++;
		 }
		 //print_r($mainResult);
		 print json_encode($mainResult);
	}
	function del_Appointment($data)
	{
		if(!$this->session->userdata('user_id'))
		{
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$check=$this->admin_model->checkMerchantAppointment(base64_decode($data));
		if($check)
		redirect('/viewAppointment');
		else
		{
		$result = $this->admin_model->del_Appointment(base64_decode($data));
		$userName=$this->admin_model->findEmailById($result[0]['userId']);
		$merchantName=$this->admin_model->findEmailById($result[0]['merchantId']);
		$this->sendMail('Cancel Appointment','Your Appointment will be canceled at '.$result[0]['appointDate'].' '.$result[0]['appointTime'],$userName,$merchantName);
		$this->layout_admin->view('admin/viewAppointment');
		}
	}
	function AutoCompleteMerchantLocation()
	{
		$result=$this->admin_model->AutoCompleteMerchantLocation();
		foreach($result as $request)
		{		
			$arr[]= $request['area'];
		}
		$str=implode(",",$arr);
		print_r($str);
	}
	function add_info()
	{	
		if(!$this->session->userdata('user_id'))
		{
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		if($this->input->post()){
		$result=$this->admin_model->add_info();
		}
		$this->layout_admin->view('admin/add_info');
	}
	function new_blog()
	{
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$data = array();
		if($this->input->post()){
			$res = $this->admin_model->new_blog($this->input->post());
			if($res){
				$this->sendBlogMailFollwer();
				$data['message'] = 'Blog Added Successfully';
				$data['added'] = true;
			}
		}
		$data['pageName']='blog.php';
		$this->layout_admin->view('admin/new_blog',$data);
	}
	function sendBlogMailFollwer()
	{
		$result=$this->admin_model->sendBlogMailFollwer();
		foreach($result as $value)
		{
			$this->sendMail('Blog','New blog added 
			http://zersey.com/blog',$value['email'],'andrew@webinfomart.com');
		}	
	}
	function view_blog()
	{
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$data['blog'] = $this->admin_model->view_blog();
		$data['pageName']='View Blog';
		$this->layout_admin->view('admin/view_blog', $data);
	}
	function del_blog()
	{
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$del = $this->admin_model->del_blog($this->input->post('blog_id'));
		if($del){
			echo "true";
		}else{
			echo "false";
		}
	}
	function adctv_blog()
	{
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$update = $this->admin_model->adctv_blog($this->input->post('blog_id'));
		if($update){
			echo "true";
		}else{
			echo "false";
		}
	}
		function edit_blog(){
	if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		if($this->input->post()){
		$file = '';
		if($_FILES){
			$size=$_FILES['blog_picture']['size'];
			if($size<"11263")
			{
			$_FILES['blog_picture']['name']="";
			$update = $this->admin_model->edit_blog($this->input->post(),$_FILES['blog_picture']['name']);
			 // redirect('/merchantprofile');
			}
			else
			{
				$res = $this->upload_blog_it($_FILES);
				if($res['msg']=='success'){
					$file = $res['upload_data']['file_name'];
					}
				$update = $this->admin_model->edit_blog($this->input->post(),$file);
			}
		}
					redirect('/view_blog');
		}
		$temp = $this->admin_model->get_blog_details($this->input->get('id'));
		$data['blog'] = $temp[0];
		//var_dump($data);exit;
		$this->layout_admin->view('admin/edit_blog', $data);
		}
		
	function upload_blog_it()
	{
				$this->load->helper('form');
	$config['upload_path'] = 'assets/images/demo/blog';		
   	$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
    $this->upload->initialize($config);
    $this->upload->set_allowed_types('*');
		$data['upload_data'] = '';
		if (!$this->upload->do_upload('blog_picture')) {
			$data = array('msg' => $this->upload->display_errors());
		} else { //else, set the success message
			$data = array('msg' => "success");      
      $data['upload_data'] = $this->upload->data();
		return $data;
		}
	}
	function request()
	{
		$result=$this->admin_model->request();
		foreach($result as $request)
		{
			$arr[]=$request['request'];	
		}
		$str=implode(",",$arr);
		print_r($str);
	}
	function location()
	{
		$result=$this->admin_model->location();
		foreach($result as $request)
		{
			$arr[]=$request['location'];	
		}
		$str=implode(",",$arr);
		print_r($str);
	}
	function NoEmployeeAvailable()
	{
	  $result=$result=$this->admin_model->NoEmployeeAvailable(); 
	  if(!$result)
	  {
		$data['message'] = 'Employee Already Exists or Your Status is Blocked';
		$data['added'] = false;
	  }
	  else
	  {
		$data['message'] = 'Employee Added Successfully';
		$data['added'] = true;
	  }
			$this->layout_admin->view('admin/new_emp', $data); 
	  //echo $result;	
	}
	function getAllstate()
	{
		$result=$this->admin_model->getAllstate();
		foreach($result as $request)
		{
			$arr[]=$request['stateName'];	
		}
		$str=implode(",",$arr);
		print_r($str);
	}
	function edit_bid()
	{
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		if($this->input->post()){
			$update = $this->admin_model->edit_bid($this->input->post());
			if($update){
				$data['message'] = 'Bid updated successfully.';
				$data['added'] = true;
			}
		}
		$temp = $this->admin_model->get_bid_details(base64_decode($this->input->get('id')));
		$data['bid'] = $temp[0];
		$check=$this->admin_model->checkMerchantbid(base64_decode($this->input->get('id')));
		if($check)
		redirect('/view_bid');
		else
		$this->layout_admin->view('admin/edit_bid', $data);
	}
	function adctv_bid()
	{
		if(!$this->session->userdata('user_id'))
			redirect('auth/login');
			if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$update = $this->admin_model->adctv_bid($this->input->post('bid_id'));
		if($update)
			echo "true";
		else
			echo "false";
	}
	function del_bid()
	{
		if(!$this->session->userdata('user_id'))
			redirect('auth/login');
			if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$update = $this->admin_model->del_bid($this->input->post('biding_id'));
		if($update)
			echo "true";
		else
			echo "false";
	}
	function getAreaById()
	{
		$ret='';
		$city=$this->input->post('city');
		$carea=$this->input->post('area');
		$this->db->select('*');
		$this->db->from('area');
		$this->db->where('city',$city);
		$this->db->where('status','1');
		$query=$this->db->get();
		$result=$query->result_array();
		$ret.='<select name="location" id="location" class="ui-autocomplete-input valid" style="background: rgb(255,255,255); /* Old browsers */
background: -moz-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(241,241,241,1) 80%, rgba(225,225,225,1) 100%, rgba(246,246,246,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,1)), color-stop(80%,rgba(241,241,241,1)), color-stop(100%,rgba(225,225,225,1)), color-stop(100%,rgba(246,246,246,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, rgba(255,255,255,1) 0%,rgba(241,241,241,1) 80%,rgba(225,225,225,1) 100%,rgba(246,246,246,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, rgba(255,255,255,1) 0%,rgba(241,241,241,1) 80%,rgba(225,225,225,1) 100%,rgba(246,246,246,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, rgba(255,255,255,1) 0%,rgba(241,241,241,1) 80%,rgba(225,225,225,1) 100%,rgba(246,246,246,1) 100%); /* IE10+ */
background: linear-gradient(to bottom, rgba(255,255,255,1) 0%,rgba(241,241,241,1) 80%,rgba(225,225,225,1) 100%,rgba(246,246,246,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#ffffff\', endColorstr=\'#f6f6f6\',GradientType=0 ); /* IE6-9 */">';
		foreach($result as $r)
		{
			$sel='';
			if($carea==$r['id'])
			{
				$sel='selected';
			}
			$ret.='<option value="'.$r['id'].'" '.$sel.'>'.$r['name'].'</option>';
		}
		$ret.='</select>';
		echo $ret;
	}
	function findServiceByMerchant(){
		$merchant=$_POST['merchantId'];
		$array=array();
		$i=0;
		$result=$this->admin_model->get_services($merchant);		
		foreach($result as $val)
		{		if($val['status']==1){																									
				$status='Deactivate';
				}	else{
				$status='Activate';
				}
			$array[$i]['id']=$val['id'];
			$array[$i]['serviceName']=$val['serviceName'];
			$array[$i]['businessCategory']=$this->admin_model->findCategoryByMerchantId($val['merchantId']);
			$array[$i]['description']=$val['description'];
			$array[$i]['duration']=$val['duration'];
			$array[$i]['price']=$val['price'];
			$array[$i]['status']=$status;	
			$i++;
		}
		echo json_encode($array);
	}
	function listOfMerchant()
	{
		$result=$this->admin_model->get_merchants();
		foreach($result as $location)
		{
			$arr[]=ucwords(strtolower($location['salonName'])).'-'.ucwords(strtolower($location['location']));
		}
		$str=implode("&",$arr);
		print_r($str);
	}
	function findMerchantIdByName()
	{	
		$result=$this->admin_model->get_merchants();
		foreach($result as $location)
		{	
			if(strtolower($_POST['merchantName'])==(strtolower($location['salonName']).'-'.strtolower($location['location'])))
					{
						echo $location['merchantId'];
					}
		}
	}
	function findEmplyeeByMerchant()
	{	
		$data = $this->admin_model->get_employees_detail($_POST['merchantId']);
		$dataarray=array();
		if(isset($data))	
			{	$i=0;
			foreach($data as $value)
				{
					if($value['status']==1)
							$status='Deactivate';
					else
							$status='Activate';	
								
					if(!empty($value['photo']))
							$photo=$value['photo'];
					else
							$photo='usericon.jpg';	
					$dataarray[$i]['user_id']=$value['id'];
					$dataarray[$i]['fullName']=$value['fullName'];
					$dataarray[$i]['email']=$value['email'];
					$dataarray[$i]['address']=$value['address'];
					$dataarray[$i]['photo']=$photo;
					$dataarray[$i]['status']=$status;
					$i++;
				}
			echo json_encode($dataarray);	
			}
		else
			echo 'not';
	}
	function findMerchantIdByCategoryName()
	{
		$data = $this->admin_model->findMerchantIdByCategoryName($_POST['merchantId']);	
		$dataarray=array();
		$i=0;		
		if(isset($data))
			{
				foreach($data as $value)
				{
					if($value['status']==1)
							$status='Deactivate';
					else
							$status='Activate';			
					$dataarray[$i]['id']=$value['id'];
					$dataarray[$i]['category']=$value['category'];
					$dataarray[$i]['createdOn']=$value['createdOn'];
					$dataarray[$i]['status']=$status;
				}
			echo json_encode($dataarray);	
			}
		else
			echo 'not';
	}
	
	function addservicesdefault()
	{
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$userid = $this->session->userdata('user_id');
		$query = $this->db->get('default_businesscategory');

		foreach ($query->result() as $row)
		{	
				$category=array(
						'category' => $row->category,
						'merchantId'=>$userid,
						'status'=>'1',
						'createdOn'=>date('Y-m-d H:i:s')
						);
						if($this->db->insert('businessCategory', $category))
						{
							$bid=$this->db->insert_id();
						
						}
				$query1 = $this->db->get_where('default_services', array('businessCategory' => $row->id));
				foreach ($query1->result() as $row1)
				{ 		
							$service=array(
							'serviceName' => $row1->serviceName,
							'merchantId'=>$userid,
							'businesscategory'=>$bid,
							'keywords' => $row1->keywords,
							'duration'=>$row1->duration,
							'price'=>'0',
							'status'=>'1',
							'createdOn'=>date('Y-m-d H:i:s'),
							'last_modified'=>date('Y-m-d H:i:s'));
							
							$this->db->insert('services', $service);
						
						
				}
		}
		redirect('/services');
		}
		
		function addservicesdefaultspa()
	{
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if($this->userLevel==4)
		{
			redirect('auth/login');
		}
		$userid = $this->session->userdata('user_id');
		$query = $this->db->get('default_businesscategory_spa');

		foreach ($query->result() as $row)
		{	
				$category=array(
						'category' => $row->category,
						'merchantId'=>$userid,
						'status'=>'1',
						'createdOn'=>date('Y-m-d H:i:s')
						);
						if($this->db->insert('businessCategory', $category))
						{
							$bid=$this->db->insert_id();
						
						}
				$query1 = $this->db->get_where('default_services_spa', array('businessCategory' => $row->id));
				foreach ($query1->result() as $row1)
				{ 		
							$service=array(
							'serviceName' => $row1->serviceName,
							'merchantId'=>$userid,
							'businesscategory'=>$bid,
							'duration'=>$row1->duration,
							'price'=>'0',
							'status'=>'1',
							'createdOn'=>date('Y-m-d H:i:s'),
							'last_modified'=>date('Y-m-d H:i:s'));
							
							$this->db->insert('services', $service);
						
						
				}
		}
		redirect('/services');
		}
		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */