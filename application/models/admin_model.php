<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Users
 *
 * This model represents user authentication data. It operates the following tables:
 * - user account data,
 * - user profiles
 *
 * @package	Tank_auth
 * @author	Ilya Konyukhov (http://konyukhov.com/soft/)
 */
class Admin_model extends CI_Model
{
	private $merchants			= 'merchants';			// user accounts
	private $profile_table_name	= 'user_profiles';	// user profiles

	function __construct()
	{
		parent::__construct();
		$ci =& get_instance();
		//$this->table_name			= $ci->config->item('db_table_prefix', 'tank_auth').$this->table_name;
		//$this->profile_table_name	= $ci->config->item('db_table_prefix', 'tank_auth').$this->profile_table_name;
	}

	/**
	 * Get list of merchants with status '1'
	 **/
	
	function get_merchants()
	{
	$this->db->select('users.username,users.email,merchant.*');
	$this->db->where('userLevel','2');
	$this->db->where('status !=','2');
    $this->db->from('users');
    $this->db->join('merchant', 'users.id = merchant.merchantId', 'left'); 
		$this->db->where('users.business', 'P');
		/*
		$this->db->select('*');
		$this->db->from('merchant');
		$this->db->where('status', '1');
*/
		$query = $this->db->get();//print_r($this->db->last_query());exit;
		//var_dump($query->result_array());exit;
		if ($query->num_rows() > 0) return $query->result_array();
		return NULL;
	}
	function edit_merchant($data, $file){
		$user['modified'] = date('Y-m-d H:i:s');
		//$user['password'] = $data['password'];
		$this->db->where('id', $data['merchantId']);
		if($this->db->update('users', $user)){
			if($file!='')
			{
				$arr['photo'] = $file;
			}
			$arr['name'] = $data['name'];
			$arr['speciality'] =implode(',',$data['mytext']);
			if($this->session->userdata('user_level')!='1')
			$arr['salonName'] = $data['salonname'];
			$arr['location'] = $this->getAreaById($data['location']);
			$arr['area'] = $data['location'];
			$arr['city'] = $data['state'];
			$arr['description'] = $data['aboutus'];
			$arr['website'] = $data['website'];
			$arr['blog'] = $data['blog'];
			$arr['twiter'] = $data['twiter'];
			$arr['gplus'] = $data['gplus'];
			$arr['linkedin'] = $data['linkedin'];
			$this->db->where('merchantId', $data['merchantId']);
			if($this->db->update('merchant',$arr)){
				$merchantarra['fullName']=$data['name'];
				$this->db->where('id',$data['merchantId']);
				if($this->db->update('users',$merchantarra)){
				$this->session->set_userdata('fullName',$data['name']);
				return true;
				}
			}
		}else{
			return false;
		}
	}

	function getCityById($id)
	{
		$this->db->select('*');
		$this->db->from('city');
		$this->db->where('id',$id);
		$query=$this->db->get();
		$result=$query->result_array();
		return $result[0]['cityName'];
	}

	function getAreaById($id)
	{
		$this->db->select('*');
		$this->db->from('area');
		$this->db->where('id',$id);
		$query=$this->db->get();
		$result=$query->result_array();
		return $result[0]['name'];
	}
	
	function ban_merchant($id){
		$this->db->select('*');
		$this->db->where('merchantId', $id);
		$this->db->from('merchant');
		$query = $this->db->get();
		$data_service=$query->result_array();		
		if($data_service[0]['status']==1)		
		$data =  array('status' => '0');		
		else
		$data= array('status' => '1');
		$this->db->where('merchantId', $id);
		$this->db->update('merchant', $data);
		
		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('users');
		$query = $this->db->get();
		$data_service1=$query->result_array();		
		if($data_service1[0]['activated']==1)		
		$data1 =  array('activated' => '0');		
		else
		$data1= array('activated' => '1');
		$this->db->where('id', $id);
		$this->db->update('users', $data1);	
		
	return true;
	}
	
	
	function set_service($data)
	{
	$service=array('serviceName' => $_POST['serviceName'],'businesscategory'=>$_POST['category'],'description'=>$_POST['description'],'duration'=>$_POST['duration'],'price'=>$_POST['price'],'status'=>'1','createdOn'=>date('Y-m-d H:i:s'),'last_modified'=>date('Y-m-d H:i:s'));
	if($this->session->userdata('user_level')=='1')
	$service['merchantId']=$_POST['merchantName'];
	else
	$service['merchantId']=$data;
	$this->db->insert('services', $service);
	}
	
	function adctv_service($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('services');
		$query = $this->db->get();
		$data_service=$query->result_array();
		// print_r($data_emp);
		if($data_service[0]['status']==1)
		{
		$data =  array('status' => '0');
		}
		else
		{
		$data= array('status' => '1');
		}//print_r($data);exit;
		$this->db->where('id', $id);
	$this->db->update('services', $data);
	}
	
	
	
	function add_employee($data){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('business','E');
		$this->db->where('email', $this->input->post('email'));
		$query = $this->db->get();
		if ($query->num_rows() > 0) return "email_exists";
		$user['created'] = date('Y-m-d H:i:s');
		$user['business'] = 'E';
		$user['email'] = $data['email'];
		$user['username'] = $data['name'];
		$user['firstName'] = $data['name'];
		$user['lastName'] = $data['lname'];
		$user['fullName'] = $data['lname'].' '.$data['lname'];
		$user['userLevel'] = "3";
		$user['password'] = crypt($data['password']);
		
		if ($this->db->insert('users', $user)) {
			
			if(isset($_FILES['picture']))
					{
						$config['upload_path'] = './assets/images/merchant/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						is_dir($config['upload_path']);
						$this->load->library('upload', $config);
							if ( ! $this->upload->do_upload('picture'))
								{
									$this->upload->display_errors();

					}
					}
			
			$user_id = $this->db->insert_id();
			if($user_id){
				$arr['user_id'] = $user_id;
				if($this->session->userdata('user_level')!='1'){
					$arr['merchantId'] = $this->session->userdata('user_id');
				} else{
					$arr['merchantId']=$data['merchantName'];
				}
				$arr['name'] = $data['name'].' '.$data['lname'];
				$arr['photo'] = $_FILES['picture']['name'];				
				$arr['address'] = $this->input->post('location');
				$add_profile = $this->db->insert('user_profiles', $arr);
			}
			return array('user_id' => $user_id);
		}
		return NULL;
	}
	function add_merchant($data)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('business','P');
		$this->db->where('email', $this->input->post('email'));
		$query = $this->db->get();
		if ($query->num_rows() > 0) return "email_exists";
		$user['created'] = date('Y-m-d H:i:s');
		$user['business'] = 'P';
		$user['activated'] = '1';
		$user['email'] = $data['email'];
		$user['username'] = $data['name'];
		$user['firstName'] = $data['name'];
		$user['lastName'] = $data['lname'];
		$user['userLevel'] = "2";
		$user['password'] = crypt($data['password']);
		
		if ($this->db->insert('users', $user)) {
			
			if(isset($_FILES['picture']))
					{
						$config['upload_path'] = './assets/images/merchant/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						is_dir($config['upload_path']);
						$this->load->library('upload', $config);
							if ( ! $this->upload->do_upload('picture'))
								{
									$this->upload->display_errors();

								}
					}
			
			$user_id = $this->db->insert_id();
			if($user_id)
			{
				$arr['user_id'] = $user_id;				
				$arr['name'] = $data['name'].' '.$data['lname'];
				$arr['photo'] = $_FILES['picture']['name'];				
				$arr['address'] = $this->input->post('location');
				$add_profile = $this->db->insert('user_profiles', $arr);
				
				$merchant['salonName']='Salon';
				$merchant['name']=$data['name'].' '.$data['lname'];
				$merchant['area']=$data['location'];
				$merchant['city']=$data['state'];
				$merchant['merchantId']=$user_id;
				$merchant['location']=$this->findAreaById($data['location']);
				$add_profile = $this->db->insert('merchant', $merchant);
			
				
				
			}
			return array('user_id' => $user_id);
		}
		return NULL;
	}
	function get_employees($merchantId)
	{
	$this->db->select('users.username,users.fullName,users.email,user_profiles.*');
    $this->db->from('users');
    $this->db->join('user_profiles', 'users.id = user_profiles.user_id'); 
	if($this->session->userdata('user_level')!='1')
		$this->db->where('user_profiles.merchantId', $merchantId);
		$this->db->where('user_profiles.status !=','2');
		$this->db->where('users.userLevel','3');
    $query = $this->db->get();
		if ($query->num_rows() > 0) return $query->result_array();
		return NULL;
	}
	function get_employees_detail($merchantId)
	{
		$this->db->select('users.username,users.fullName,users.email,user_profiles.*');
    $this->db->from('users');
    $this->db->join('user_profiles', 'users.id = user_profiles.user_id'); 	
		$this->db->where('user_profiles.merchantId', $merchantId);
		$this->db->where('user_profiles.status !=','2');
		$this->db->where('users.userLevel','3');
    $query = $this->db->get();
		if ($query->num_rows() > 0) return $query->result_array();
		return NULL;
	}
	
	function edit_employee($data,$file){
		$user['modified'] = date('Y-m-d H:i:s');
		$this->db->where('id', $data['employee_id']);
		if($this->db->update('users', $user)){
		$arr['name'] = $data['name'];
		$arremp['lastName']=$data['lname'];
		$arremp['fullName']=$data['name'].' '.$data['lname'];
			$arr['address'] = $data['Address'];
			if($file!='')
			{
				$arr['photo'] = $file;
			}
			$arr['name'] = $data['name'];
			$this->db->where('user_id', $data['employee_id']);
			
			if($this->db->update('user_profiles',$arr)){
				$this->db->where('id', $data['employee_id']);
				$this->db->update('users',$arremp);
				return true;
			}
			}else{
			return false;
		}
	}
	function del_employee($id){
		//$this->db->set('status','2');
		//$this->db->where('user_id', $id);
		//if($this->db->update('user_profiles'))
			$this->db->delete('user_profiles', array('user_id' => $id)); 
			if($this->db->delete('users', array('id' => $id)))
			{
				return true;
			}
		else{
			return false;
			}
	}
	function ban_employee($id){
		$data = array('status' => '0');//print_r($data);exit;
		$this->db->where('user_id', $id);
		if($this->db->update('user_profiles', $data)){
			return true;
		}else{
			return false;
		}
	}
	
	function adctv_employee($id){
		$this->db->select('*');
		$this->db->where('user_id', $id);
		$this->db->from('user_profiles');
		$query = $this->db->get();
		$data_emp=$query->result_array();
		// print_r($data_emp);
		if($data_emp[0]['status']==1)
		{
		$data =  array('status' => '0');
		}
		else
		{
		$data= array('status' => '1');
		}//print_r($data);exit;
		$this->db->where('user_id', $id);
		if($this->db->update('user_profiles', $data)){
			 return true;
			 //exit;
		}else{
			return false;
		}
	}
	
	function get_services($merchant)
	{
		$this->db->select('*');
		$this->db->from('services');
		$this->db->where('services.merchantId', $merchant);
		$query = $this->db->get();
		if ($query->num_rows() > 0) return $query->result_array();
		return NULL;
	}
	function add_service($data){
		$merchant = $this->session->userdata('user_id');
		$res = $this->db->query("SELECT `businessCategory` FROM `merchant` WHERE `merchantId` = $merchant");//print_r($res->result_array());exit;
		$temp = $res->result_array();
		$category = $temp[0]['businesscategory'];
		$data['merchantId'] = $merchant;
		$data['businesscategory'] = $category;
		$data['createdOn'] = date('Y-m-d H:i:s');
		if ($this->db->insert('services', $data)) {
			$result = $this->db->insert_id();
			return array('service_id' => $result);
		}
		return NULL;		
	}
	function edit_service($data){
		$data['last_modified'] = date('Y-m-d H:i:s');
		//$user['password'] = $data['password'];
		$this->db->where('id', $data['id']);
		if($this->db->update('services', $data)){			
				return true;			
		}else{
			return false;
		}
	}
	function del_service($id){
		$this->db->set('status','2');
		$this->db->where('id', $id);
		if($this->db->update('services')){			
				return true;
		}else{
			return false;
		}
	}
	function del_category($id){
		$this->db->set('status','2');
		$this->db->where('id', $id);
		if($this->db->update('businessCategory')){	
				$this->db->set('status','2');
				$this->db->where('businessCategory', $id);
				$this->db->update('services');
				return true;
		}else{
			return false;
		}
	}
	function newservice(){
		$this->db->select('*');
		$this->db->from('businessCategory');
		$query = $this->db->get();	
		$data=$query->result_array();
		return($data)?$data:false;
		
	}
	
	
	
	function edit_category($data){
		$data['last_modified'] = date('Y-m-d H:i:s');
		//$user['password'] = $data['password'];
		$this->db->where('id', $data['id']);
		if($this->db->update('services', $data)){			
				return true;			
		}else{
			return false;
		}
	}
	
	function get_employee_details($id){
		$this->db->select('users.username,users.lastName,users.email,user_profiles.*');
    $this->db->from('users');
    $this->db->join('user_profiles', 'users.id = user_profiles.user_id','left'); 
		//$this->db->where('user_profiles.merchantId', $merchantId);
		$this->db->where('users.id', $id);
    $query = $this->db->get();
		//var_dump($query->result_array());exit;
		if ($query->num_rows() > 0) return $query->result_array();
		return NULL;
	}
	function get_merchant_details($id){
		$this->db->select('users.username,users.email,merchant.*');
    $this->db->from('users');
    $this->db->join('merchant', 'users.id = merchant.merchantId', 'left'); 
		$this->db->where('users.id', $id);
    $query = $this->db->get();
		//var_dump($query->result_array());exit;
		if ($query->num_rows() > 0) return $query->result_array();
		return NULL;
	}
	function get_service_details($id){
		$this->db->select('*');
    $this->db->from('services');
    //$this->db->join('user_profiles', 'users.id = user_profiles.user_id'); 
		//$this->db->where('user_profiles.merchantId', $merchantId);
		$this->db->where('id', $id);
    $query = $this->db->get();
		//var_dump($query->result_array());exit;
		if ($query->num_rows() > 0) return $query->result_array();
		return NULL;
	}
	
	function viewAppointment()
	{
		$merchantId=$this->session->userdata('user_id');		
		$this->db->select('*');
		$this->db->where('status','1');
		if($this->session->userdata('user_level')!='1' && $this->session->userdata('user_level')!='3')
		$this->db->where('merchantId',$merchantId);
		if($this->session->userdata('user_level')=='3')
		$this->db->where('empId',$merchantId);
		$query=$this->db->get('appointment');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	
	function viewCategory()
	{
		$merchantId=$this->session->userdata('user_id');		
		$this->db->select('*');
		//$this->db->where('status','1');
		$query=$this->db->get('businessCategory');
		$data=$query->result_array();
		return($data)?$data:false;
	}	
	function getCategory()
	{
		$this->db->select('*');
		$this->db->where('status !=','2');
		$this->db->where('merchantId',$this->session->userdata('user_id'));
		$query=$this->db->get('businessCategory');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function findNameById($userId)
	{
		
		$this->db->select('username');
		$this->db->where('activated','1');
		$this->db->where('id',$userId);
		$query=$this->db->get('users');
		$data=$query->result_array();		
		return($data)?$data[0]['username']:false;
	}
	function findServiceById($serviceId)
	{
		
		$this->db->select('serviceName');
		$this->db->where('id',$serviceId);
		$query=$this->db->get('services');
		$data=$query->result_array();		
		return($data)?$data[0]['serviceName']:false;
	}

	function set_category($data){
	$category=array('category' => $_POST['categoryName'],'status'=>'1','createdOn'=>date('Y-m-d H:i:s'));
	if($this->session->userdata('user_level')=='1')
		$category['merchantId']=$_POST['merchantName'];
	else
		$category['merchantId']=$this->session->userdata('user_id');
	$this->db->insert('businessCategory', $category);	
	}
	
	function adctv_category($id){
		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('businessCategory');
		$query = $this->db->get();
		$data_cat=$query->result_array();
		if($data_cat[0]['status']==1)
		{
		$data =  array('status' => '0');
		}
		else
		{
		$data= array('status' => '1');
		}//print_r($data);exit;
		$this->db->where('id', $id);
		if($this->db->update('businessCategory', $data)){
			$this->db->where('businessCategory',$id);
			$this->db->update('services', $data);
			 return true;
			// exit;
		}else{
			return false;
		}
	}
	function editCategory($data){
		$this->db->where('id', $data['id']);
		if($this->db->update('businessCategory', $data)){			
				return true;			
		}else{
			return false;
		}
	}
	function getCategory_details($id){
		$this->db->select('*');
    $this->db->from('businessCategory');
    //$this->db->join('user_profiles', 'users.id = user_profiles.user_id'); 
		//$this->db->where('user_profiles.merchantId', $merchantId);
		$this->db->where('id', $id);
    $query = $this->db->get();
		//var_dump($query->result_array());exit;
		if ($query->num_rows() > 0) return $query->result_array();
		return NULL;
	}
	
	function findMerchantImageById($merchantId)
	{
		$this->db->select('photo');
		//$this->db->where('status',"1");
		$this->db->where('merchantId',$merchantId);
		$query=$this->db->get('merchant');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function getMerchantName()
	{
		$this->db->select('merchantId,name');
		$this->db->where('status',"1");
		$query=$this->db->get('merchant');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function findMerchantNameById($merchantId)
	{
		$this->db->select('name');
		$this->db->where('status',"1");
		$this->db->where('merchantId',$merchantId);
		$query=$this->db->get('merchant');
		$data=$query->result_array();
		return($data)?$data[0]['name']:false;
	}
	function findLevelById($merchantId)
	{
		$this->db->select('userLevel');
		$this->db->where('activated',"1");
		$this->db->where('id',$merchantId);
		$query=$this->db->get('users');
		$data=$query->result_array();
		return($data)?$data:false;
	
	}
	function findUserProfileImageById($merchantId)
	{
		  $this->db->select('photo');
		  $this->db->where('status',"1");
		  $this->db->where('user_id',$merchantId);
		  $query=$this->db->get('user_profiles');
		  $data=$query->result_array();
		  return($data)?$data:false;
	}
	function findCityOfUsers($userId)
	{
		$result=$this->findLevelById($userId);
		if($result[0]['userLevel']=='2'||$result[0]['userLevel']=='1')
		{
			$result=$this->get_merchant_details($userId);
			return $result[0]['location'];
		}		
	}
	
	function getEmployeById()
	{
    $this->db->select('user_id,name');
    $this->db->where('status',"1");
    $this->db->where('merchantId',$this->session->userdata('user_id'));
    $query=$this->db->get('user_profiles');
    $data=$query->result_array();
    return($data)?$data:false;
	}
	function findEmployeNameById($empId)
	{
    $this->db->select('name');
    $this->db->where('status',"1");
    $this->db->where('user_id',$empId);
    $query=$this->db->get('user_profiles');
    $data=$query->result_array();
	return($data)?$data[0]['name']:false;
	}	
	function getCustomers()
	{
    $this->db->select('userId,fullname');
    $this->db->where('status','1');
    $query=$this->db->get('customer');
    $data=$query->result_array();
	return($data)?$data:false;
	}
	function getservices()
	{
    $this->db->select('id,serviceName');
    $this->db->where('status',"1");
    $this->db->where('merchantId',$this->session->userdata('user_id'));
    $query=$this->db->get('services');
    $data=$query->result_array();
    return($data)?$data:false;
	}
	function getAllServices()
	{
    $this->db->select('id,serviceName');
    $this->db->where('status',"1");
    $query=$this->db->get('services');
    $data=$query->result_array();
    return($data)?$data:false;
	}
	function findCustomerNameById($userId)
	{
	  $this->db->select('fullname');
	  $this->db->where('status','1');
	  $this->db->where('userId',$userId);
	  $query=$this->db->get('customer');
	  $data=$query->result_array();  
	  return($data)?$data[0]['fullname']:false;
	}
	function findCustomereditNameById($userId)
	{
	  $this->db->select('name');
	  $this->db->where('id',$userId);
	  $query=$this->db->get('appointment_cutomer');
	  $data=$query->result_array();  
	  return($data)?$data[0]['name']:false;
	}
	function book_appointment()
	{
	  $appointmentDate=$_POST['appointmentDate'];
	  $newDate = date("Y-m-d", strtotime($appointmentDate));
	  $applyDate=$_POST['applyDate'];
	  $applynewDate= date("Y-m-d", strtotime($applyDate));
	  if($_POST['addcust']=='1'){
		  $cutomer=array('name'=>$_POST['cname'], 'email'=>$_POST['cemail'],'contact'=>$_POST['ccontact']);
		  $this->db->insert('appointment_cutomer', $cutomer);
		  $cusid=$this->db->insert_id();
	   $appointment=array('userId' => '0','custId' => $cusid,'empId'=>$_POST['clientName'],'serviceId'=>$_POST['serviceName'],'appointDate'=>$newDate,'applyDate'=>$applynewDate,'appointTime'=>$_POST['time'],'status'=>'1','createdOn'=>date('Y-m-d H:i:S'));}
	   else{
	   $appointment=array('userId' => $_POST['customerName'],'empId'=>$_POST['clientName'],'serviceId'=>$_POST['serviceName'],'appointDate'=>$newDate,'applyDate'=>$applynewDate,'appointTime'=>$_POST['time'],'status'=>'1','createdOn'=>date('Y-m-d H:i:S'));}
	   if(($this->session->userdata('user_level')=='1'))
	   $appointment['merchantId']=$_POST['merchantName'];
	   else
	   $appointment['merchantId']= $this->session->userdata('user_id');
	   $this->db->insert('appointment', $appointment);

	}
	function add_offer($file)
	{
		$data=array('name'=>$_POST['offername'],'features'=>$_POST['features'],'bookingPrice'=>$_POST['bookingprice'],'price'=>$_POST['price'],'discount'=>$_POST['discount'],'expdate'=>date('Y-m-d', strtotime($_POST['expdate'])),'discountedPrice'=>$_POST['discountedPrice'],'externallink'=>$_POST['exturl']);
		$data['offerImage']=$file;
		if(($this->session->userdata('user_level')=='1'))
		$data['merchantId']=$_POST['merchantName'];
		else
		$data['merchantId']=$this->session->userdata('user_id');
		$this->db->insert('offers', $data);	
	}	
	function update_offer($file)
	{
		if($file=="")
		{
			$this->db->select('offerImage');
			$this->db->where('id',$_POST['imageid']);
			$query=$this->db->get('offers');
			$data=$query->result_array();  
			$file=$data[0]['offerImage'];
		}
		$this->db->where('id',$_POST['imageid']);
		if($this->session->userdata('user_level')!='1')
		$data=array('name'=>$_POST['offername'],'features'=>$_POST['features'],'bookingPrice'=>$_POST['bookingprice'],'price'=>$_POST['price'],'discount'=>$_POST['discount'],'expdate'=>date('Y-m-d', strtotime($_POST['expdate'])),'merchantId'=>$this->session->userdata('user_id'),'externallink'=>$_POST['exturl']);
		else
		$data=array('name'=>$_POST['offername'],'features'=>$_POST['features'],'bookingPrice'=>$_POST['bookingprice'],'price'=>$_POST['price'],'discount'=>$_POST['discount'],'expdate'=>date('Y-m-d', strtotime($_POST['expdate'])),'externallink'=>$_POST['exturl']);

		$data['offerImage']=$file;
		$this->db->update('offers', $data);	
	}
	function getOfferData()
	{
	  $this->db->select('*');
	  $this->db->where('status !=','2');
	  $this->db->where('merchantId',$this->session->userdata('user_id'));
	  $query=$this->db->get('offers');
	  $data=$query->result_array();  
	  return($data)?$data:false;
	}
	function editOfferData($id)
	{
	  $this->db->select('*');
	  $this->db->where('status','1');
	  $this->db->where('id',$id);
	  $query=$this->db->get('offers');
	  $data=$query->result_array();  
	  return($data)?$data:false;
	}
	function add_setting()
	{
		$data=array('onlineBooking'=>$_POST['booking'],'homeService'=>$_POST['homeservice'],'advertisement'=>'0');
		if(($this->session->userdata('user_level')=='1'))
		{
		$data['advertisement']=$_POST['advertisement'];
		$this->db->where('merchantId',$_POST['merchantName']);
		}
		else
		$this->db->where('merchantId',$this->session->userdata('user_id'));
		$this->db->update('merchant', $data);
	}
	function findCategoryById($categoryId)
	{
	  $this->db->select('category');
	//  $this->db->where('status','1');
	  $this->db->where('id',$categoryId);
	  $query=$this->db->get('businessCategory');
	  $data=$query->result_array();  
	  return($data)?$data[0]['category']:false;
	}
	function findCategoryByMerchantId($categoryId)
	{
	  $this->db->select('category');
	//  $this->db->where('status','1');
	  $this->db->where('merchantId',$categoryId);
	  $query=$this->db->get('businessCategory');
	  $data=$query->result_array();  
	  return($data)?$data[0]['category']:false;
	}
	function findAllCategoryByMerchantId()
	{
	  $this->db->select('id,category');
	  $this->db->where('status','1');
	  $this->db->where('merchantId',$this->session->userdata('user_id'));
	  $query=$this->db->get('businessCategory');
	  $data=$query->result_array();  
	  return($data)?$data:false;
	}
	function findAllCategory()
	{
	  $this->db->select('id,category');
	  $this->db->where('status','1');
	  $query=$this->db->get('businessCategory');
	  $data=$query->result_array();  
	  return($data)?$data:false;
	}
	
	function add_lookbook($file)				//working
	{
		$data=array('merchantId'=>$this->session->userdata('user_id'));
		$data['photo']=$file;
		$this->db->insert('lookbook', $data);
		
	}
	function view_photo()
	{
	  $this->db->select('*');
	  $this->db->where('status','1');
	  $this->db->where('merchantId',$this->session->userdata('user_id'));
	  $query=$this->db->get('lookbook');
	  $data=$query->result_array();  
	  return($data)?$data:false;
	}
   // function checkLogin()
   // {
		// $this->db->select('id,business,userLevel');
		// $this->db->where('id',$this->session->userdata('user_id'));
		// $this->db->where('activated',"1");
		// $query=$this->db->get('users');
		// $data=$query->result_array();
		// return($data)?$data:false;
   // }
   function seeLookupalbum()
   {
		$this->db->select('id');
		if(($this->session->userdata('user_level')=='1'))
		$this->db->where('merchantId',$_POST['merchantName']);
		else
		$this->db->where('merchantId',$this->session->userdata('user_id'));
		$this->db->where('status',"1");
		$query=$this->db->get('lookupalbum');
		$status=$query->result_array();
		return($status)?$status:false;
	   
	}
	function addToLookbook()
	{
	  $element=array('status'=>"1");
	  if(($this->session->userdata('user_level')=='1'))
		$element['merchantId']=$_POST['merchantName'];
	  else
		$element['merchantId']=$this->session->userdata('user_id');
	  $this->db->insert('lookupalbum', $element);
	}
	function addLookbook($photo,$thm)
	{
		$this->db->select('id');
		if(($this->session->userdata('user_level')=='1'))
		$this->db->where('merchantId',$_POST['merchantName']);
		else
		$this->db->where('merchantId',$this->session->userdata('user_id'));
	  	$this->db->where('status',"1");
		$query=$this->db->get('lookupalbum');
		$status=$query->result_array();
	    $element=array('status'=>"1",'albumId'=>$status[0]['id'],'photo'=>$photo,'photothum'=>$thm,'description'=>$_POST['descrption']);
		if(($this->session->userdata('user_level')=='1'))
		$element['merchantId']=$_POST['merchantName'];
		else
		$element['merchantId']=$this->session->userdata('user_id');
		$element['photoOf']=$_POST['photofor'];
		$element['categorypic']=$_POST['catfor'];
		$this->db->insert('lookbook', $element);
	}
	function findAppointmentForCalendar()
	{
	  $result=$this->viewAppointment(); 
	  return $result;
	}
	function findNameByuserId($id)
	{
	  $this->db->select('firstName,lastName');
	  $this->db->where('activated','1');
	  $this->db->where('id',$id);
	  $query=$this->db->get('users');
	  $data=$query->result_array();
	  return($data)?$data:false;
	}
	function findNameofcustomerByuserId($id)
	{
	  $this->db->select('name');
	  $this->db->where('id',$id);
	  $query=$this->db->get('appointment_cutomer');
	  $data=$query->result_array();
	  return($data)?$data:false;
	}
	function findEmployeById($id)
	{
	  $this->db->select('firstName,lastName');
	  $this->db->where('activated','1');
	  $this->db->where('id',$id);
	  $query=$this->db->get('users');
	  $data=$query->result_array();
	  if($data)
	  $name=$data[0]['firstName'].' '.$data[0]['lastName'];
	  return($data)?$name:false;
	}
	function adctv_offer($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('offers');
		$query = $this->db->get();
		$data_cat=$query->result_array();
		if($data_cat[0]['status']==1)
		{
		$data =  array('status' => '0');
		}
		else
		{
		$data= array('status' => '1');
		}//print_r($data);exit;
		$this->db->where('id', $id);
		if($this->db->update('offers', $data)){
			 return true;
			 exit;
		}else{
			return false;
		}
	}
	function selectCategory()
	{
	  $this->db->select('id,category');
	  $this->db->where('status','1');
	  if($this->session->userdata('user_level')!='1')
	  $this->db->where('merchantId',$this->session->userdata('user_id'));
	  $query=$this->db->get('businessCategory');
	  $data=$query->result_array();
	  return($data)?$data:false;
	}	
	function selectService()
	{
	  $this->db->select('*');
	  if($this->session->userdata('user_level')!='1')
	  {
	 // $this->db->where('status','1');
	  $this->db->where('merchantId',$this->session->userdata('user_id'));
	  }
	  $this->db->where('status !=','2');
	  $query=$this->db->get('services');
	  $data=$query->result_array();
	  return($data)?$data:false;
	}
	function getAllmerchants()
	{
	  $this->db->select('*');
	  $this->db->where('status','1');
	  $query=$this->db->get('merchant');
	  $data=$query->result_array();
	  return($data)?$data:false;
	}	
	function getAllEmployee()
	{
		$this->db->select('user_id,name');
		$this->db->where('status',"1");
		$query=$this->db->get('user_profiles');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function getAllCategory()
	{
		$this->db->select('*');
		$query=$this->db->get('businessCategory');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function getAllOfferData()
	{
	  $this->db->select('*');
	  $query=$this->db->get('offers');
	  $data=$query->result_array();  
	  return($data)?$data:false;
	}
	function view_Allphoto()
	{
	  $this->db->select('*');
	  $this->db->where('status','1');
	  $query=$this->db->get('lookbook');
	  $data=$query->result_array();  
	  return($data)?$data:false;
	}
	function new_auction()
	{
		$auction=array('request' => $_POST['request'],'userId'=>$_POST['customerName'],'category'=>$_POST['category'],'location'=>$_POST['location'],'minBudget'=>$_POST['minBudget'],'maxBudget'=>$_POST['maxBudget'],'dateOfService'=>$_POST['dateOfRequest'],'noOfPeople'=>$_POST['people'],'note'=>$_POST['description'],'createdOn'=>date('Y-m-d H:i:s'));
		$result=$this->db->insert('reverseauction', $auction);
		if($result)
		return true;
		else
		return false;
	}
	function getAuction()
	{
	  $this->db->select('*');
	  //$this->db->where('status','1');
	  $query=$this->db->get('reverseauction');
	  $data=$query->result_array();  
	  return($data)?$data:false;
	}
	function get_auction_details($id)
	{
	  $this->db->select('*');
	  $this->db->from('reverseauction');
      $this->db->where('id', $id);
	  $query = $this->db->get();
	  if ($query->num_rows() > 0) 
	  return $query->result_array();
		return NULL;
	}
	function edit_auction($data)
	{
		$auction=array('request' => $_POST['request'],'location'=>$_POST['location'],'minBudget'=>$_POST['minBudget'],'maxBudget'=>$_POST['maxBudget'],'dateOfService'=>$_POST['dateOfRequest'],'noOfPeople'=>$_POST['people'],'note'=>$_POST['description']);
		$this->db->where('id', $data['id']);
		$result=$this->db->update('reverseauction', $auction);
		if($result)
		return true;
		else
		return false;
	}
	function del_auction($id)
	{
		$this->db->where('id', $id);
		if($this->db->delete('reverseauction'))
			return true;
		else
			return false;
	}
	function adctv_auction($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('reverseauction');
		$query = $this->db->get();
		$data_auction=$query->result_array();
		// print_r($data_emp);
		if($data_auction[0]['status']==1)
		{
		$data =  array('status' => '0');
		}
		else
		{
		$data= array('status' => '1');
		}//print_r($data);exit;
		$this->db->where('id', $id);
		$this->db->update('reverseauction', $data);
	}
	function deleteImage()
	{
		 $this->db->where('id', $_POST['id']);
		$this->db->delete('lookbook'); 
		return true;
	}
	function viewBid()
	{	
		if($this->session->userdata('user_level')=='1')
		{
		$this->db->select('*');
		$this->db->where('status','1');
		//$this->db->where('id',$data1[0]['reverseAuctionId']);
		$query=$this->db->get('reverseauction');
		$data=$query->result_array();
		return($data)?$data:false;
		}
		$this->db->select('reverseAuctionId');
		$this->db->where('merchantId',$this->session->userdata('user_id'));
		$query=$this->db->get('merchant_biding');
		$data1=$query->result_array();
		if($data1)
		{
		$merchantid=$this->session->userdata('user_id');
		$query=$this->db->query("SELECT merchant_biding . *,reverseauction . request,reverseauction.minBudget,reverseauction.maxBudget,reverseauction.location,reverseauction.dateOfService FROM merchant_biding
									LEFT JOIN reverseauction ON merchant_biding.reverseAuctionId = reverseauction.id where merchant_biding.status !='2' AND merchant_biding.merchantId='$merchantid'");
		$data=$query->result_array();
		return($data)?$data:false;
		// $data=array();
		// $i=0;
		// foreach($data1 as $reverseid)
		// {
		// $this->db->select('*');
		// $this->db->where('status','1');
		// $this->db->where('id',$reverseid['reverseAuctionId']);
		// $query=$this->db->get('reverseauction');
		// $data2=$query->result_array();
		// $data[$i]=$data2;
		// $i++;
		// }
		// return($data)?$data:false;
		}
		else
		return false;
	}
	function edit_selected_merchant($data,$file)
	{
		$user['modified'] = date('Y-m-d H:i:s');
		//$user['password'] = $data['password'];
		$this->db->where('id', $data['id']);
		if($this->db->update('users', $user)){
			$arr['name'] = $data['merchantName'];
			$arr['location'] = $data['location'].' '.$data['state'];
			$arr['area'] = $data['location'];
			$arr['state'] = $data['state'];
			$arr['salonName'] = $data['salonName'];
			$arr['description'] = $data['description'];
			$arr['priceCheck'] = $data['rating'];
			$this->db->where('merchantId', $data['id']);
			if($this->db->update('merchant',$arr)){
				return true;
			}
		}else{
			return false;
		}
	}
	function bidAmountbyId($amt)
	{
		$this->db->select('bamt');
		$this->db->where('reverseAuctionId',$amt);
		$query=$this->db->get('merchant_biding');
		$data=$query->result_array();
		return($data)?$data[0]['bamt']:false;
	}
	function getAppointment()
	{
		$this->db->select('*');
		$this->db->where('appointDate',$_POST['date']);
		$this->db->where('status','1');
		if($this->session->userdata('user_level')!='1')
		$this->db->where('merchantId',$this->session->userdata('user_id'));
		$query=$this->db->get('appointment');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function del_Appointment($id)
	{	
		$this->db->select('*');
		$this->db->where('status','1');
		$this->db->where('id',$id);
		$query=$this->db->get('appointment');
		$data=$query->result_array();
		if($data)
		{
		$this->db->set('status','2');
		$this->db->where('id',$id);
		$this->db->update('appointment'); 
		}
		return $data;
	}
	function change_apponitment($id)
	{
		$this->db->select('*');
		$this->db->where('status','1');
		$this->db->where('id',$id);
		$query=$this->db->get('appointment');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function edit_Appointment($appointment)
	{
		$data['appointDate']=date('Y-m-d',strtotime($appointment['appointDate']));
		$data['appointTime']=$appointment['appointTime'];
		$this->db->where('id', $appointment['id']);
		$this->db->update('appointment', $data);
	}
	function AutoCompleteMerchantLocation()
	{
		$this->db->select('area');
		$query=$this->db->get('merchant');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function add_info()
	{
		$data=array('information'=>$_POST['info'],'address'=>$_POST['info2'],'phone'=>$_POST['phone'],'mon'=>$_POST['monto']."-".$_POST['monfrom'],'sun'=>implode(",",$_POST['a']));
		$this->db->where('merchantId',$this->session->userdata('user_id'));
		$this->db->update('merchant', $data);
	}
	function getMerchantContactInformationById()
	{
		$this->db->select('*');
		$this->db->where('merchantId',$this->session->userdata('user_id'));
		$query=$this->db->get('merchant');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function new_blog($data)
	{
		$userId=$this->session->userdata('user_id');
		$blog['title'] = $data['title'];
		$blog['description'] = str_replace("\n","<br />",$data['description']);
		$blog['businessCategory'] = $data['category'];
		$blog['merchantId'] = $userId;
		if ($this->db->insert('blog', $blog)) {
			//upload image
			if($_FILES['blog_picture']['size']>="10240")
					{
					$config['upload_path'] = './assets/images/demo/blog/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						is_dir($config['upload_path']);
						$this->load->library('upload', $config);
							if ( ! $this->upload->do_upload('blog_picture'))
								{
									$this->upload->display_errors();

								}
					
				//upload image
				$blog_id = $this->db->insert_id();
				if($blog_id){
					$arr['photo'] = $_FILES['blog_picture']['name'];
					//$arr['level'] = "3";
					$this->db->where('id',$blog_id);
					$add_blog = $this->db->update('blog', $arr);
							}
					}
			}
			return true;
	}
	function view_blog()
	{
		$userId=$this->session->userdata('user_id');
		$this->db->select('*');
		$this->db->where('status','1');
		$this->db->where('merchantId',$userId);	
		$this->db->order_by('id','desc');		
		$query = $this->db->get('blog');	
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function del_blog($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('blog');
		return true;
	}
	function adctv_blog($id){
		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('blog');
		$query = $this->db->get();
		$data_blog=$query->result_array();
		// print_r($data_emp);
		if($data_blog[0]['status']==1)
		{
		$data =  array('status' => '0');
		}
		else
		{
		$data= array('status' => '1');
		}//print_r($data);exit;
		$this->db->where('id', $id);
		if($this->db->update('blog', $data)){
			 return true;
			 exit;
		}else{
			return false;
		}
	}
	function get_blog_details($id)
	{
		$this->db->select('*');
		$this->db->where('id',$id);
		$query = $this->db->get('blog');	
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function edit_blog($data,$file)
	{
		$arr['title'] = $data['title'];
		$arr['description']=$data['description'];
			$arr['businessCategory'] = $data['category'];
			if($file!='')
			{
				$arr['photo'] = $file;
			}
			$this->db->where('id', $data['blog_id']);
			$this->db->update('blog',$arr);
			return true;
	}
	 function request()
	 {
		$this->db->select('request');
		$this->db->distinct();
		$this->db->where('status','1');
		$query=$this->db->get('reverseauction');
		$data=$query->result_array();
		return($data)?$data:false;
	 }
	 function location()
	 {
		$this->db->select('location');
		$this->db->distinct();
		$this->db->where('status','1');
		$query=$this->db->get('reverseauction');
		$data=$query->result_array();
		return($data)?$data:false;
	 }
	function sendBlogMailFollwer()
	{
		$this->db->select('email');
		$query = $this->db->get('blog_follow');	
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function getMerchantCustomers()
	{
		$merchantid=$this->session->userdata('user_id');
		$query=$this->db->query("SELECT DISTINCT customer . * FROM customer
									LEFT JOIN appointment ON customer.userId = appointment.userId where customer.status='1' AND appointment.merchantId='$merchantid'");
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function findEmailById($id)
	{
		$this->db->select('email');
		$this->db->where('id',$id);
		$query=$this->db->get('users');
		$data=$query->result_array();		
		return($data)?$data[0]['email']:false;
	}
	function findTimeByServiceId($serviceId)
	 {
	  $this->db->select('*');
	  $this->db->where('status','1');
	  $this->db->where('id',$serviceId);
	  $query=$this->db->get('services');
	  $data=$query->result_array();
	  return($data)?$data:false;
	 }
	function NoEmployeeAvailable()
	{
	  $merchantId=$this->session->userdata('user_id');
	  
	  $this->db->select('*');
	  $this->db->where('merchantId',$merchantId);
	  $this->db->where('user_id',$merchantId);
	  $this->db->where('status','1');
	  $query=$this->db->get('user_profiles');
	  $data=$query->result_array();
	  if(($data)?$data:false)
	  { 
		return false;
	  }
	  else
	  {
	   $this->db->select('*');
	   $this->db->where('merchantId',$merchantId);
	   $this->db->where('status','1');
	   $query=$this->db->get('merchant');
	   if($query->num_rows==0)
		return false;
	   $data=$query->result_array();
	   $array=array(
	   'user_id'=>$merchantId,
	   'merchantId'=>$merchantId,
	   'name'=>$data[0]['name'],
	   'photo'=>$data[0]['photo']
	   );
	   $result=$this->db->insert('user_profiles',$array);
	   if($result)
		return true;
	   else
		return false;  
	  }
	  
	 }
	 function getAllstate()
	 {
		$this->db->select('stateName');
		$this->db->distinct();
		$this->db->where('status','1');
		$query=$this->db->get('state');
		$data=$query->result_array();
		return($data)?$data:false;
	 }
	function get_bid_details($id)
	{
	  $this->db->select('*');
	  $this->db->from('merchant_biding');
      $this->db->where('id', $id);
      //$this->db->where('status !=','2');
	  $query = $this->db->get();
	  if ($query->num_rows() > 0) 
	  return $query->result_array();
		return NULL;
	}
	function edit_bid($data)
	{
		$bid=array('contactName' => $_POST['contactName'],'bamt'=>$_POST['bamt'],'note'=>$_POST['description']);
		$this->db->where('id', $data['id']);
		$result=$this->db->update('merchant_biding',$bid);
		if($result)
		return true;
		else
		return false;
	}
	function adctv_bid($id)
	{	
		$this->db->select('*');
		$this->db->where('id',$id);
		$this->db->where('merchantId',$this->session->userdata('user_id'));
		$query = $this->db->get('merchant_biding');
		$data_bid=$query->result_array();
		if($data_bid[0]['status']=='1')
		{
		$data =  array('status' => '0');
		}
		else
		{
		$data= array('status' => '1');
		}//print_r($data);exit;
		$this->db->where('id', $id);
		$this->db->where('merchantId',$this->session->userdata('user_id'));
		if($this->db->update('merchant_biding',$data))
		return true;
		else
		return false;
	}
	function checkMerchantEmployee($check)
	{
		$this->db->select('*');
		$this->db->where('user_id',$check);
		if($this->session->userdata('user_level')!='1')
		{
		$this->db->where('merchantId',$this->session->userdata('user_id'));
		}
		$query = $this->db->get('user_profiles');
		if ($query->num_rows() > 0) 
		return false;
		else
		return true;
	}
	function checkMerchantServices($check)
	{
		$this->db->select('*');
		$this->db->where('id',$check);
		if($this->session->userdata('user_level')!='1')
		{
			$this->db->where('merchantId',$this->session->userdata('user_id'));
		}
		$query = $this->db->get('services');
		if ($query->num_rows() > 0) 
		return false;
		else
		return true;
	}
	function checkMerchantCategory($check)
	{
		$this->db->select('*');
		$this->db->where('id',$check);
		if($this->session->userdata('user_level')!='1')
		{
			$this->db->where('merchantId',$this->session->userdata('user_id'));
		}
		$query = $this->db->get('businessCategory');
		if ($query->num_rows() > 0) 
		return false;
		else
		return true;
	}
	function checkMerchantoffer($check)
	{
		$this->db->select('*');
		$this->db->where('id',$check);
		if($this->session->userdata('user_level')!='1')
		$this->db->where('merchantId',$this->session->userdata('user_id'));
		$query = $this->db->get('offers');
		if ($query->num_rows() > 0) 
		return false;
		else
		return true;
	}
	
	function checkMerchantbid($check)
	{
		$this->db->select('*');
		$this->db->where('id',$check);
		$this->db->where('merchantId',$this->session->userdata('user_id'));
		$query = $this->db->get('merchant_biding');
		if ($query->num_rows() > 0) 
		return false;
		else
		return true;
	}
	function checkMerchantAppointment($check)
	{
		$this->db->select('*');
		$this->db->where('id',$check);
		$this->db->where('merchantId',$this->session->userdata('user_id'));
		$query = $this->db->get('appointment');
		if ($query->num_rows() > 0) 
		return false;
		else
		return true;
	}
	function del_offer($check)
	{
		$this->db->set('status','2');
		$this->db->where('id',$check);
		if($this->db->update('offers'))
		return false;
		else
		return true;
	}
	function del_bid($check)
	{
		$this->db->set('status','2');
		$this->db->where('id',$check);
		if($this->db->update('merchant_biding'))
		return false;
		else
		return true;
	}
	function getBookingDetail()
	{
		$this->db->select('*');
		$this->db->where('merchantId',$this->session->userdata('user_id'));
		$query=$this->db->get('merchant');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function del_merchant($id)
	{
		$this->db->set('status','2');
		$this->db->where('merchantId',$id);
		if($this->db->update('merchant'))
		{
		$this->db->set('activated','2');
		$this->db->where('id',$id);
		if($this->db->update('users'))
		return false;
		else
		return true;
		}
		else
		return false;
	}

	function findAreaById($id)
	{
		$this->db->select('name');
		$this->db->from('area');
		$this->db->where('id',$id);
		$query=$this->db->get();
		$res=$query->result_array();
		return $res[0]['name'];
	}

	function findCityById($id)
	{
		$this->db->select('cityName');
		$this->db->from('city');
		$this->db->where('id',$id);
		$query=$this->db->get();
		$res=$query->result_array();
		return $res[0]['cityName'];
	}

	function getCity()
	{
		$this->db->select('*');
		$this->db->from('city');
		$query=$this->db->get();
		$res=$query->result_array();
		return $res;
	}

	function getArea()
	{
		$this->db->select('*');
		$this->db->from('area');
		$query=$this->db->get();
		$res=$query->result_array();
		return $res;
	}
	function findMerchantIdByCategoryName($merchantId)
	{
		$this->db->select('*');		
		$this->db->where('merchantId',$merchantId);
		$query=$this->db->get('businessCategory');
		$data=$query->result_array();
		return($data)?$data:false;
	}
}

/* End of file users.php */
/* Location: ./application/models/auth/users.php */