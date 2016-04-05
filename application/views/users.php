<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');ob_start();


class Users extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		/*
		parse_str( $_SERVER['QUERY_STRING'], $_REQUEST );
        $CI = & get_instance();
	$CI->config->load("facebook",TRUE);
	$config = $CI->config->item('facebook');
	$this->load->library('facebook', $config);
	*/
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('layout');
		$this->load->model('usermodel');
		$this->load->model('datamodel');
		$this->load->helper('form');
		$this->load->config('email', TRUE);
		$this->load->helper('cookie');
		$uid=$this->session->userdata['user_id'];
		session_start();
		if(!$uid){
		$user_id=get_cookie('logininfo');
		if($user_id){
			$user=$this->datamodel->getuserbyid($user_id);
			$this->session->set_userdata(array(
								'user_id'	=> $user_id,
								'username'	=> $user->username,
								'fullName'	=> $user->fullName,
								'user_level'=> $user->userLevel,
								'status'	=> ($user->activated == 1) ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED,
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
	public function index()
	{ /*
	$userId = $this->facebook->getUser();
 
        // If user is not yet authenticated, the id will be zero
        if($userId == 0){
            // Generate a login url
            $data['url'] = $this->facebook->getLoginUrl(array('scope'=>'email', 'user_likes','publish_actions','user_about_me','user_birthday','user_friends','user_photos','user_location','user_hometown','user_education_history'));
            $this->load->view('home', $data);
        } else {
            // Get user's data and print it
	try{
	$user_profile=$this->facebook->api('/me?fields=email,name,birthday,hometown,first_name,last_name,work,cover,gender,bio');
	$user_pic=$this->facebook->api('/me/picture?redirect=false&height=300');
//print_r($user_profile);
//echo $user_pic['data']['url'];
	$gender= $user_profile['gender'];
	if($gender=='male'){
	$gender='M';
	}
	else{
	$gender='F';
	}
	
	$this->db->select('*');
		$this->db->where('email',$user_profile['email']);
		$query=$this->db->get('users');
		//echo $query->num_rows();
		if($query->num_rows()== 0)
		{
			$insert['business']='C';
			$insert['userLevel']=4;
			$insert['firstName']=$user_profile['first_name'];
			$insert['lastName']=$user_profile['last_name'];
			$insert['fullName']=$user_profile['name'];
			$insert['email']=$user_profile['email'];
			$insert['username']=$user_profile['last_name']." ".$user_profile['first_name'];
			$insert['fbgmid']=$user_profile['id'];
			$this->db->insert('users',$insert);
			$cust['userId']=$this->db->insert_id();
			$cust['fullname']=$insert['fullName'];
			$cust['gender']=$gender;
			$cust['photo']=$user_pic['data']['url'];
			$cust['covimg']=$user_profile['cover']['source'];	
			$this->db->insert('customer',$cust);
			$profile['user_id']=$cust['userId'];
			$profile['name']=$user_profile['name'];
			$profile['photo']=$user_pic['data']['url'];
			$this->db->insert('user_profiles',$profile);
			$this->load->library('session');
				$user=$this->usermodel->findallDetailsUserById($cust['userId']);
				$dat=array(
									'user_id'	=> $user[0]['id'],
									'username'	=> $user[0]['username'],
									'fullName'	=> $user[0]['fullName'],
									'user_level'=> $user[0]['userLevel'],
									'reward'	=> $user[0]['reward'],
									'status'	=> ($user[0]['activated'] == 1) ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED,
							);
				$this->session->set_userdata($dat);
						var_dump($user);
						
							$cookie = array(
								'name'   => 'logininfo',
								'value'  => $user[0]['id'],
								'expire' => '5184000',
								'path'   => '/'
							);
							set_cookie($cookie);
							
				redirect('dashboard');
			}
	else { 
			//print_r($user_profile);
			$query=$this->db->query("Select * from `users` where fbgmId=$userId");
			//echo $query->num_rows();
			$id='';
			foreach ($query->result_array() as $row)
			{
			$id=$row['id'];
   
			}
			if($query->num_rows())
			{ 
				$this->load->library('session');
				$user=$this->usermodel->findallDetailsUserById($id);
				$dat=array(
									'user_id'	=> $user[0]['id'],
									'username'	=> $user[0]['username'],
									'fullName'	=> $user[0]['fullName'],
									'user_level'=> $user[0]['userLevel'],
									'reward'	=> $user[0]['reward'],
									'status'	=> ($user[0]['activated'] == 1) ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED,
							);
				$this->session->set_userdata($dat);
						var_dump($user);
						
							$cookie = array(
								'name'   => 'logininfo',
								'value'  => $user[0]['id'],
								'expire' => '5184000',
								'path'   => '/'
							);
							set_cookie($cookie);
							redirect('dashboard');
				
			}
			
			
				
		}

	}
	catch(FacebookException $e){
	$userId=NULL;
	}
	
            //print_r($user);
        }*/
        
		$uid=$this->session->userdata['user_id'];
		if($uid){
			//$data['int']=$this->datamodel->selectinterest($uid);

								//	$cid=$data['int'][0]->catid;

			
		$data['post']=$this->datamodel->dashboarddata($uid,'50', '0');
		$data['pname']='home';
		$this->layout->view('dashboard',$data,'dashboard');
		
			}
		else{
		
		$this->load->view('home');
		}
	}
	public function dplifeupload()
	{	
	$text=nl2br($this->input->post('upsname'));
	$sts=($this->input->post('upsstatus'));
	$uid=$this->session->userdata['user_id'];
	if($_FILES['photo']['size']){
		$config['upload_path'] = './assets/zerseynme/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '3000';
		$config['max_width']  = '10240';
		$config['max_height']  = '7680';
		$this->load->library('upload', $config);
		 $this->upload->initialize($config);
	if ( !$this->upload->do_upload('photo'))
		{
		echo ('<script>alert("'.preg_replace('/(\n)+/m', ' ', strip_tags($this->upload->display_errors())).'");
		window.location.href="'.base_url().'blog/findAllBlog";</script>');
		//redirect(base_url()."blog/findAllBlog");
		}
	else{
		$this->load->library('image_lib');
		$data = $this->upload->data();
		 /*$config = array(
    'source_image'      => $data['full_path'],
    'new_image'         => 'thumb_'.$data['file_name'],
    'maintain_ratio'    => true,
    'width'             => 500,
    'height'            => 500
    );
    //here is the second thumbnail, notice the call for the initialize() function again
    $this->image_lib->initialize($config);
    $this->image_lib->resize();
		*/
		$dataimg['intro']=$text;
		$dataimg['userid']=$uid;
		$dataimg['shareas']=$sts;
		$dataimg['image']=$data['file_name'];
		$dataimg['date']=date('Y-m-d');
	    $dataimg['video']=($this->input->post('video'));

		if(isset($_POST['savedraft'])){
			$dataimg['status']=3;
			}
		if(isset($_POST['scedule'])){
			$dataimg['status']=4;
			$dataimg['schedulepost']=$this->input->post('scheduletime');
			}
		


		$val=$this->usermodel->insert_data('fbblogmain',$dataimg);
		/*if($val)
		{
		$datared['note']='Post In Form';
		$datared['userid']=$uid;
		$datared['date']=date("d F Y");
		$datared['point']=10;
			$vals=$this->usermodel->insert_data('reward_user',$datared);
			if($vals)
			{
				$que=$this->db->select_sum('point','point')->where('userid',$uid)->get('reward_user');
				$dt=$que->result();
				if($dt[0]->point){
					$dataid['id']=$uid;
					$dataimsg['reward']=$dt[0]->point;
					$re=$this->usermodel->updatedata($dataid,$dataimsg,'users');
					if($re){*/
						redirect($_SERVER['HTTP_REFERER']);
						//}
					//}
				//}
			
			//}
		
	}
	}
	else{
		$dataimg['intro']=$text;
		$dataimg['userid']=$uid;
		$dataimg['shareas']=$sts;
		$dataimg['date']=date('Y-m-d');
       $dataimg['video']=($this->input->post('video'));

		if(isset($_POST['savedraft'])){
			$dataimg['status']=3;
			}
		if(isset($_POST['scedule'])){
			$dataimg['status']=4;
			$dataimg['schedulepost']=$this->input->post('scheduletime');
			}
		

		$val=$this->usermodel->insert_data('fbblogmain',$dataimg);
		
		/*if($val)
		{
		$datared['note']='Post In Form';
		$datared['userid']=$uid;
		$datared['date']=date("d F Y");
		$datared['point']=10;
			$vals=$this->usermodel->insert_data('reward_user',$datared);
			if($vals)
			{
				$que=$this->db->select_sum('point','point')->where('userid',$uid)->get('reward_user');
				$dt=$que->result();
				if($dt[0]->point){
					$dataid['id']=$uid;
					$dataimsg['reward']=$dt[0]->point;
					$re=$this->usermodel->updatedata($dataid,$dataimsg,'users');
					if($re){*/
					redirect($_SERVER['HTTP_REFERER']);
						//}
					//}
				//}
			
		//	}
	
	}
	}
	
	function regstration()
	{
	if(isset($_POST["customerSubmit"]))
			{
				$password=$_POST['password'];
				$hasher = new PasswordHash(
					$this->ci->config->item('phpass_hash_strength', 'tank_auth'),
					$this->ci->config->item('phpass_hash_portable', 'tank_auth'));
			$hashed_password = $hasher->HashPassword($password);
			
					$data['username']=$_POST['username'];
					$data['password']= $hashed_password;

					$data['email']=$_POST['email'];
					$data['firstName']=$_POST['firstName'];
					$data['fullName']=$_POST['firstName'];
				    $data['business']=C;
					$data['userLevel']=4;
					$data['last_ip']=$this->ci->input->ip_address();
					$data['monum']=$_POST['phno'];


				$a=$this->usermodel->insertuser($data);
				
				$uid=$this->db->insert_id();
				if(count($a)){
							$datas['uid']=$this->db->insert_id();
							$this->session->set_userdata($datas);
				}

				$dataa['userId']=$uid;
					$dataa['fullname']= $_POST['firstName'];

					$dataa['mobile']=$_POST['phno'];
					
				$b=$this->usermodel->insertcustomer($dataa);
			}

				redirect('confirmsignup');

}

	function dashboard(){
		
		$uid=$this->session->userdata['user_id'];
		if(!$uid){
		redirect('');	
			}
		$data['post']=$this->datamodel->dashboarddata($uid,'24', '0');
		$data['nextpg']=24;

		$this->layout->view('dashboard',$data,'dashboard');
		}
		
	function feeds(){
		
		$page=$_GET['nextpg'];
		
		$data['nextpg']=$page+24;
		$uid=$this->session->userdata['user_id'];
		if(!$uid){
		redirect('');	
			}
		$data['post']=$this->datamodel->dashboarddata($uid,'24', $page);
		$this->layout->view('dashboard',$data,'dashboard');
		}
		function postdraft($a){
		
		$uid=$this->session->userdata['user_id'];
		if(!$uid){
		redirect('');	
			}
			$data['user_id']=$this->datamodel->userdetailbyusername($a);
			$usid=$data['user_id']->id;
			
		$data['post']=$this->datamodel->showpostdraft($usid);
		
		
		$this->layout->view('postdraft',$data,'postdraft');
		}
	
		
	public function viewpost($id){
		
		$uid=$this->session->userdata['user_id'];
		/*
		if(!$uid){
		redirect('');	
			}
			*/
			
		$data['post']=$this->datamodel->selectintroofpost($id);
	
		$data['postdetail']=$this->datamodel->selectdetailofpost($id);
		if($uid){
		$data['next']=$this->datamodel->postviewnext($uid, $id);
		//$data['prev']=$this->datamodel->postviewprev($uid, $id);
		$data['user_id']=$uid;
		}
		 if(isset($_POST['postcomment']))
       {if($this->session->userdata['user_id']==NULL)
	   {redirect('/');
	   }else{
			$insert['userid']=$this->session->userdata['user_id'];
		$insert['comment']=($this->input->post('comment'));
		$insert['postid']=$id;
		$insert['datetm'] = date('Y-m-d H:i:s');
	       		$vals=$this->usermodel->insert_data('post_coment',$insert);
       				$bid= $this->db->insert_id();
       		}
		}
		$sql="Select * from post_coment where postid='$id' order by datetm desc";
		 $query= $this->db->query($sql);//$this->datamodel->getcomment($id);
	$data['com']=$query->result_array();
		$this->layout->view('postview',$data,'postview');
		
		}	
		
	 function userprofile($a)
	{	$a=str_replace("%20"," ",$a);
		$uid=$this->session->userdata['user_id'];
		if(!$uid){
		redirect('');	
			}
			$data['user_id']=$this->datamodel->userdetailbyusername($a);
			$usid=$data['user_id']->id;
			
		$data['post']=$this->datamodel->postuserprofile($usid,'24', '0');
		if(isset($_POST["update"]))
					{
									$gen=$_POST['gender'];
									$date=$_POST['datepicker'];
									$loca=$_POST['loc'];
									$empl=$_POST['emp'];
									$mob=$_POST['mbno'];
									$bri=$_POST['brief'];

							$d=$this->usermodel->updatecustomer($gen,$date,$loca,$empl,$mob,$bri,$usid);

}
		
					
		$this->layout->view('userprofile',$data,'userprofile');
		}
			function userprofileloop(){
		
		$page=$_POST['id'];
		
		
		$data['post']=$this->datamodel->postuserprofile($usid,'8', $page);
		
		$this->load->view('dashboardloop',$data);
		}
	
	 function friendslist($a)
	{	
		$uid=$this->session->userdata['user_id'];
		if(!$uid){
		redirect('');	
			}
			$data['user_id']=$this->datamodel->userdetailbyusername($a);
			$usid=$data['user_id']->id;
		
		$this->layout->view('friendslist',$data,'friendslist');
		}
	function categorylist()
{

			$this->layout->view('userfriendslist',$data,'userfriendslist');
}
function userlist()
{

			$this->layout->view('userfriendslists',$data,'userfriendslists');
}	
	function search($a)
	{	
		$uid=$this->session->userdata['user_id'];
		if(!$uid){
		redirect('');	
			}
			$data['user_id']=$this->datamodel->userdetailbyusername($a);
			$usid=$data['user_id']->id;
			
		
		
		
		$this->layout->view('search',$data,'search');
		}
	
	function category($cat){
		
		
		$data['topic']=$this->usermodel->where_data('category',array('category'=>$cat));
		$data['topuser']= $this->datamodel->topusercategory($cat);
		$data['post']=$this->datamodel->postcategory($cat,'24', '0');
		
		$data['catname']=$cat;
		$data['catidm']=$data['topic'][0]->id;
		$data['proimg']=$data['topic'][0]->proimage;
		$data['covimg']=$data['topic'][0]->covimage;
		$this->layout->view('category',$data,'category');
		
		}
		function categorytopic($cat,$nam){
		
		
		$data['topic']=$this->usermodel->where_data('category',array('category'=>$cat));
		$data['topuser']= $this->datamodel->topusercategory($cat);
		$data['post']=$this->datamodel->postcategorytopic($nam,'24', '0');
		$data['catname']=$cat;
		$data['catidm']=$data['topic'][0]->id;
		$data['proimg']=$data['topic'][0]->proimage;
		$data['covimg']=$data['topic'][0]->covimage;
		$this->layout->view('category',$data,'category');
		
		}
	function categoryuser($cat,$userid){
		
		
		$data['topic']=$this->usermodel->where_data('category',array('category'=>$cat));
		$data['topuser']= $this->datamodel->topusercategory($cat);
		$data['post']=$this->datamodel->postcategoryuser($cat,$userid,'24', '0');
		$data['catname']=$cat;
		$data['catidm']=$data['topic'][0]->id;
		$data['proimg']=$data['topic'][0]->proimage;
		$data['covimg']=$data['topic'][0]->covimage;
		$this->layout->view('category',$data,'category');
		
		}
		function categoryfollow()
		{
			$uid=$this->session->userdata['user_id'];
			if(isset($_POST["flw"]))
			{
				$data['userid']=$uid;
				$data['catid']=$_POST['cid'];		
				$a=$this->datamodel->insertcatfol($data);
			}
			redirect($_SERVER['HTTP_REFERER']);
		}
		function categoryfollowByName()
		{
			$uid=$this->session->userdata['user_id'];
			if(isset($_POST["flw"]))
			{
				$data['userid']=$uid;
				echo $cat_name=$_POST['realcat'];
				$catName_arr=explode(",",$cat_name);
				foreach($catName_arr as $cat_arr){
					$data['catid']=$cat_arr;
					$a=$this->datamodel->insertcatfol($data);
				}
			}
			redirect($_SERVER['HTTP_REFERER']);
		}
		function deletefollow($folid)
		{
					$pro1=$this->datamodel->deletecatfol($folid);
						redirect($_SERVER['HTTP_REFERER']);


		}
	function userfollow()
		{
			$usid=$this->session->userdata['user_id'];

			if(isset($_POST["folw"]))
			{
			
					$data['userid']=$usid;
					$data['usid']=$_POST['uid'];
					
				$a=$this->datamodel->insertuserfol($data);
			}
			redirect($_SERVER['HTTP_REFERER']);
		}
		function deleteufollow($follid)
		{
					$pro1=$this->datamodel->deleteuserfol($follid);
						redirect($_SERVER['HTTP_REFERER']);


		}
		

	
	function postvertualstory($cat){
		$uid=$this->session->userdata['user_id'];
		if(!$uid){
		redirect('');	
			}
				$data['boards']=$this->usermodel->where_data('user_board',array('bordname'=>$cat));
						$boid=$data['boards'][0]->bid;

		//$data['cat']= $this->datamodel->getsubboard($boid);

		$data['pagename']="postpage";
		
		$this->layout->view('post1',$data,'post1');
		}
	
/*---------------------------------Facebook Login----------------------------------------*/	
	public function loginByfacebook()
	{		 	
		if($_POST['email']!='undefined')
		{
		$result=$this->usermodel->loginByfacebook();		
		}		
		if($result=='not found')
		{
			$dts[0]="not_registered";
			$dts[1]=$_SERVER['HTTP_REFERER'];
			echo ($dts[0]." ".$dts[1]);
		}
		else
		{
		
			$data['user_id'] =$result[0]['id'];
			$data['username']=$result[0]['username'];
			$data['user_level']=$result[0]['userLevel'];
			$data['fullName']=$result[0]['fullName'];
			
			$this->session->set_userdata($data);
			$cookie = array(
						'name'   => 'logininfo',
						'value'  => $result[0]['id'],
						'expire' => '1209600',  // Two weeks
						'domain' => base_url(),
						'path'   => '/'
					);
					
			set_cookie($cookie);
			//print_r($data['user_level']);
			$dts[0]= $result[0]['fbgmId'];
			$dts[1]=$_SERVER['HTTP_REFERER'];
			echo ($dts[0]." ".$dts[1]);
		}
	}

function LoginAndSignupByfacebook()
	{
		$id=$this->usermodel->LoginAndSignupByfacebook();
		$result=$_POST['fbid'];
		if($id)
		{
			$url='http://graph.facebook.com/'.$result.'/picture?type=large';
			$headers = get_headers($url, 1);
			$urls=$headers['Location'];
			
			$data = file_get_contents($urls);
$fileName = './assets/images/merchant/'.$result.'.jpg';
$file = fopen($fileName, 'w+');
fputs($file, $data);

 if(fclose($file))
{
	$this->load->library('image_lib');

    $config['image_library'] = 'gd2';
    $config['source_image'] = './assets/images/merchant/'.$result.'.jpg';
    $config['create_thumb'] = false;
    $config['maintain_ratio'] = true;
    $config['width']     = 307;
    $config['height']   = 307;
	$config['new_image'] = './assets/images/merchant/'.$result."_thumb.jpg";
    $this->image_lib->clear();
    $this->image_lib->initialize($config);
    $this->image_lib->resize();
	
     

$dataimg['photo']=$result."_thumb.jpg";
$this->db->where('userId', $id);
$this->db->update('customer', $dataimg); 
//$this->model->insert_data('imageupload',$dataimg);

	}
			$result=$this->usermodel->loginByfacebook();	
			$data['user_id'] =$result[0]['id'];
			$data['username']=$result[0]['username'];
			$data['user_level']=$result[0]['userLevel'];
			$data['fullName']=$result[0]['fullName'];
			
			$this->session->set_userdata($data);
			$cookie = array(
						'name'   => 'logininfo',
						'value'  => $result[0]['id'],
						'expire' => '1209600',  // Two weeks
						'domain' => base_url(),
						'path'   => '/'
					);
					
			set_cookie($cookie);
			echo $result." ".$_SERVER['HTTP_REFERER'];
			
		}	
		else
		echo 'not'." ".$_SERVER['HTTP_REFERER'];
	}

	
	function alltopicofcategory($cat, $topic){
		
		$result=$this->datamodel->alltopicofcategory($cat, $topic);
		$names=array();
		$i=0;
		foreach($result as $value)
		{
		$names[$i]=$value['name'];
		$i++;
		}
		$str=implode(",",$names);
		print_r($str);
		
		}
		function allcategory($cat){
		
		$result=$this->datamodel->allcategory($cat);
		$names=array();
		$i=0;
		foreach($result as $value)
		{
		$names[$i]=$value['category'];
		$i++;
		}
		$str=implode(",",$names);
		print_r($str);
		
		}
		function upload_pic($name) {
	//	print_r($_FILES);exit;
		//load the helper
		$this->load->helper('form');
		$config['upload_path'] = './assets/zerseynme/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '3000';
		$config['max_width']  = '10240';
		$config['max_height']  = '7680';
		$this->load->library('upload', $config);
		 $this->upload->initialize($config);
		
		if (!$this->upload->do_upload($name)) {
			$data = array('msg' => $this->upload->display_errors());
		} else { //else, set the success message
			$data = array('msg' => "success");      
      $data['upload_data'] = $this->upload->data();
	  $this->load->library('image_lib');
		
    //here is the second thumbnail, notice the call for the initialize() function again
    
		return $data['upload_data']['file_name'];
		}
		
			return '';		
	}
	function insertvertualstory(){
		
		$cont= $_POST['countrow'];
		$insert['maincat']=($this->input->post('catname'));
		$insert['category']=($this->input->post('realtopic'));
		$insert['head']=($this->input->post('title'));
		$insert['intro']=nl2br($this->input->post('textdes0'));
		$insert['shareas']=($this->input->post('upsstatus'));
		$insert['date']=date("Y-m-d");
		$insert['userid']=$this->session->userdata['user_id'];
		$insert['image']=$this->upload_pic('picintro');
		
		if(isset($_POST['savedraft'])){
			$insert['status']=3;
			}
			if(isset($_POST['scedule'])){
			$insert['status']=4;
			$insert['schedulepost']=$this->input->post('scheduletime');
			}
		
		$vals=$this->usermodel->insert_data('fbblogmain',$insert);
		$bid= $this->db->insert_id();
		for($i=1; $i<=$cont; $i++){
		
			$insertimg['title']=$bid;
			
			$insertimg['description']=nl2br($this->input->post('textdes'.$i));
			$insertimg['photo']=$this->upload_pic('photo'.$i);
			//echo ($insertimg['photo']);
			$val=$this->usermodel->insert_data('fbblog',$insertimg);
		}
		redirect('');
		}

	function insert1vertualstory(){
		
		$cont= $_POST['countrow'];
		$insert['maincat']=($this->input->post('catname'));
		$insert['category']=($this->input->post('realtopic'));
		$insert['head']=($this->input->post('title'));
		$insert['intro']=nl2br($this->input->post('textdes0'));
		$insert['shareas']=($this->input->post('upsstatus'));
		$insert['date']=date("Y-m-d");
		$insert['userid']=$this->session->userdata['user_id'];
		$insert['image']=$this->upload_pic('picintro');
		
		if(isset($_POST['savedraft'])){
			$insert['status']=3;
			}
			if(isset($_POST['scedule'])){
			$insert['status']=4;
			$insert['schedulepost']=$this->input->post('scheduletime');
			}
		
		$vals=$this->usermodel->insert_data('fbblogmain',$insert);
		$bid= $this->db->insert_id();
		for($i=1; $i<=$cont; $i++){
		
			$insertimg['title']=$bid;
			
			$insertimg['description']=nl2br($this->input->post('textdes'.$i));
			$insertimg['photo']=$this->upload_pic('photo'.$i);
			//echo ($insertimg['photo']);
			$val=$this->usermodel->insert_data('fbblog',$insertimg);
		}
		redirect('');
		}
		

	function insertvertualboard(){
		
		$cont= $_POST['countrow'];
		$insert['maincat']=($this->input->post('catname'));
		$insert['category']=($this->input->post('realtopic'));
		$insert['boardname']=($this->input->post('boardcat'));
		$insert['head']=($this->input->post('title'));
		$insert['intro']=nl2br($this->input->post('textdes0'));
		$insert['shareas']=($this->input->post('upsstatus'));
		$insert['date']=date("Y-m-d");
		$insert['userid']=$this->session->userdata['user_id'];
		$insert['image']=$this->upload_pic('picintro');
		$insert['subboardname']=($this->input->post('sboard'));

		if(isset($_POST['savedraft'])){
			$insert['status']=3;
			}
		if(isset($_POST['scedule'])){
			$insert['status']=4;
			$insert['schedulepost']=$this->input->post('scheduletime');
			}
		
		
		$vals=$this->usermodel->insert_data('fbblogmain',$insert);
		$bid= $this->db->insert_id();
		for($i=1; $i<=$cont; $i++){
		
			$insertimg['title']=$bid;
			
			$insertimg['description']=nl2br($this->input->post('textdes'.$i));
			$insertimg['photo']=$this->upload_pic('photo'.$i);
			//echo ($insertimg['photo']);
			$val=$this->usermodel->insert_data('fbblog',$insertimg);
		}
		redirect(base_url().'board/'.$insert['boardname']);

		}
	function boardview($cat){
		
		$uid=$this->session->userdata['user_id'];
		$data['boards']=$this->usermodel->where_data('user_board',array('bordname'=>$cat));
		$data['topic']=$this->datamodel->topicboard($cat);
		//$data['topuser']= $this->datamodel->topusercategory($cat);
		$data['post']=$this->datamodel->postcategorybord($cat,'24', '0');
		$data['catname']=$cat;
		$boid=$data['catidm']=$data['boards'][0]->bid;
		$data['user_id']=$data['boards'][0]->userid;
		$data['proimg']=$data['boards'][0]->image;
		$data['covimg']=$data['boards'][0]->coverimg;
		
				if(isset($_POST["savesubboard"]))
		{
			$insert['boardid']=$data['catidm'];
		$insert['subboardname']=$this->input->post('sbname');
		$insert['description']=$this->input->post('sbdesc');
		$val=$this->usermodel->insert_data('subboard',$insert);

		
		}
				//$data['cat']= $this->datamodel->getsubboard($boid);

		
		$this->layout->view('board',$data,'category');
		
		}
	function boardviews($cat,$sboid){
		
		$uid=$this->session->userdata['user_id'];
		$data['boards']=$this->usermodel->where_data('user_board',array('bordname'=>$cat));
		$data['topic']=$this->datamodel->topicboard($cat);
		//$data['topuser']= $this->datamodel->topusercategory($cat);
		$data['catname']=$cat;
		$boid=$data['catidm']=$data['boards'][0]->bid;
		$data['user_id']=$data['boards'][0]->userid;
		$data['proimg']=$data['boards'][0]->image;
		$data['covimg']=$data['boards'][0]->coverimg;
		
				if(isset($_POST["savesubboard"]))
		{
			$insert['boardid']=$data['catidm'];
		$insert['subboardname']=$this->input->post('sbname');
		$insert['description']=$this->input->post('sbdesc');
		$val=$this->usermodel->insert_data('subboard',$insert);

		
		}
				$data['cat']= $this->datamodel->getsubboard($boid);
		$data['post']=$this->datamodel->postcategorysubbord($sboid,'24', '0');

		
		$this->layout->view('board',$data,'category');
		
		}
	
	function creatboard(){
		
		$insert['userid']=$this->session->userdata['user_id'];
		$insert['bordname']=$this->input->post('bname');
		$insert['description']=$this->input->post('bdesc');
		$insert['category']=$this->input->post('bcat');
		$insert['image']='Board_Profile.png';
		$insert['coverimg']='Cover_Pic_1.jpg';
		$val=$this->usermodel->insert_data('user_board',$insert);
		
		redirect(base_url().'board/'.$insert['bordname']);
		}
		function creatboardstory(){
		
		$insert['userid']=$this->session->userdata['user_id'];
		$insert['bordname']=$this->input->post('bname');
		$insert['description']=$this->input->post('bdesc');
		$insert['category']=$this->input->post('bcat');
		$insert['image']='Board_Profile.png';
		$insert['coverimg']='Cover_Pic_1.jpg';
		$val=$this->usermodel->insert_data('user_board',$insert);
		
		redirect(base_url().'poststoryboard/'.$insert['bordname']);
		}
		function creatboardedit(){
		
		$insert['userid']=$this->session->userdata['user_id'];
		$insert['bordname']=$this->input->post('bname');
		$insert['description']=$this->input->post('bdesc');
		$insert['category']=$this->input->post('bcat');
		$insert['image']='Board_Profile.png';
		$insert['coverimg']='Cover_Pic_1.jpg';
		$val=$this->usermodel->insert_data('user_board',$insert);
		
		redirect(base_url().'posteditorial/'.$insert['bordname']);
		}
	
	function poststoryboard($bord){
		
		$uid=$this->session->userdata['user_id'];
		if(!$uid){
		redirect('');	
			}
		$cat= $this->datamodel->getcatbyboad($bord);
		$data['board']=$bord;
		$data['pagename']="postpage";
		$data['boards']=$this->usermodel->where_data('user_board',array('bordname'=>$bord));
						$boid=$data['boards'][0]->bid;

		//$data['cat']= $this->datamodel->getsubboard($boid);

		$this->layout->view('post1',$data,'post1');
		
		}
		function postedit($id){
		
		$data['post']=$this->datamodel->selectintroofpost($id);
		
		if(isset($_POST["publish"]))
					{
									$ttl=$_POST['title'];
									$intr=$_POST['intro'];
									$url=$_POST['url'];

									
							$d=$this->datamodel->updateintroofpost($ttl,$intr,$id);
							redirect($url);


}

		
		$data['pagename']="postpage";
		$this->layout->view('postviewedit1',$data,'postviewedit1');
		
		}
		function postviewedit2($id){
if(isset($_POST["published"]))
					{
									$intrd=$_POST['introd'];
									$url=$_POST['url'];
									
							$d=$this->datamodel->updatedetailofpost($intrd,$id);
							redirect($url);



}		

		$data['postdetails']=$this->datamodel->selectdetailofposts($id);


		
		$data['pagename']="postpage";
		$this->layout->view('postviewedit2',$data,'postviewedit2');
		
		}
		
		function posteditorialedit(){
		
		
		
		$data['pagename']="postpage";
		$this->layout->view('posteditorialedit',$data,'posteditorialedit');
		
		}
		
		function postviewedt($id){
		
				$data['post']=$this->datamodel->selectintroofpost($id);
		$data['postdetail']=$this->datamodel->selectdetailofpost($id);
		
		$data['pagename']="postpage";

		$uid=$this->session->userdata['user_id'];
       if(isset($_POST['postcomment']))
       {if($this->session->userdata['user_id']==NULL)
	   {redirect('/');
	   }else{
			$insert['userid']=$this->session->userdata['user_id'];
		$insert['comment']=($this->input->post('comment'));
		$insert['postid']=$id;
		$insert['datetm'] = date('Y-m-d H:i:s');
	       		$vals=$this->usermodel->insert_data('post_coment',$insert);
       				$bid= $this->db->insert_id();
       				}
		}
		$sql="Select * from post_coment where postid='$id' order by datetm desc";
		 $query= $this->db->query($sql);//$this->datamodel->getcomment($id);
	$data['com']=$query->result_array();
       if(isset($_POST['like']))
	  {if($this->session->userdata['user_id']==NULL)
	   {redirect('/');
	   }else{
				$insertcom['userid']=$this->session->userdata['user_id'];

			$insertcom['postid']=$id;

	       		$val=$this->usermodel->insert_data('post_like',$insertcom);
	       		}

	  }
	 $data['count']= $this->datamodel->getlikecount($id);

		$this->layout->view('postviewedt',$data,'postviewedt');
		
		}
		function postviewedted($id){
		
				$data['post']=$this->datamodel->selectintroofpost($id);
		$data['postdetail']=$this->datamodel->selectdetailofpost($id);
		if(isset($_POST["published"]))
					{
									$ttl=$_POST['title'];
									$intr=$_POST['intro'];
									$intrd=$_POST['introd1'];

									$url=$_POST['url'];

									
							$d=$this->datamodel->updateintroofpost($ttl,$intr,$id);
							$e=$this->datamodel->updatedetailofpost($intrd,$id);
							redirect($url);


}
		
		$data['pagename']="postpage";
		$this->layout->view('postviewedted',$data,'postviewedted');
		
		}
	
	
	function posteditorial($cat){
		
		$uid=$this->session->userdata['user_id'];
		if(!$uid){
		redirect('');	
			}
		$data['pagename']="postpage";
		$data['post']=$this->datamodel->showpostschedule($usid);
		$data['boards']=$this->usermodel->where_data('user_board',array('bordname'=>$cat));
						$boid=$data['boards'][0]->bid;

		//$data['cat']= $this->datamodel->getsubboard($boid);

		
		$this->layout->view('posteditorial',$data,'post1');
		
		}
	
	function posteditorialboad($cat){
		
		$uid=$this->session->userdata['user_id'];
		if(!$uid){
			
		redirect('');	
			}
		$cat= $this->datamodel->getcatbyboad($bord);
		$data['board']=$cat;
		$data['boards']=$this->usermodel->where_data('user_board',array('bordname'=>$cat));
						$boid=$data['boards'][0]->bid;

		$data['cat']= $this->datamodel->getsubboard($boid);

		$this->layout->view('posteditorial',$data,'post1');
		
		}
			
			function postcomment($pid)
			{
		

      }

	function inserteditorialpost(){
		
		$cont= $_POST['countrow'];
		$insert['maincat']=($this->input->post('catname'));
		$insert['category']=($this->input->post('realtopic'));
		$insert['boardname']='';
		$insert['head']=($this->input->post('title'));
		$insert['intro']=($this->input->post('intro'));
		$insert['shareas']=($this->input->post('upsstatus'));
		$insert['date']=date("Y-m-d");
		$insert['userid']=$this->session->userdata['user_id'];
		$insert['image']=$this->upload_pic('picintro');
						$insert['subboardname']=($this->input->post('sboard'));

				$insert['editorial']=1;
				
if(isset($_POST['savedraft'])){
			$insert['status']=3;
			}
			if(isset($_POST['scedule'])){
			$insert['status']=4;
			$insert['schedulepost']=$this->input->post('scheduletime');
			}
		
		
		$vals=$this->usermodel->insert_data('fbblogmain',$insert);
		$bid= $this->db->insert_id();
		
			$insertimg['title']=$bid;	
			$insertimg['description']=($this->input->post('textdes'));
			$insertimg['photo']='';
			//echo ($insertimg['photo']);
			$val=$this->usermodel->insert_data('fbblog',$insertimg);
		
		redirect('');

		}
	function inserteditorialboard(){
		
		$insert['maincat']=($this->input->post('catname'));
		$insert['category']=($this->input->post('realtopic'));
		$insert['boardname']=($this->input->post('boardcat'));
		$insert['head']=($this->input->post('title'));
		$insert['intro']=($this->input->post('intro'));
		$insert['shareas']=($this->input->post('upsstatus'));
		$insert['date']=date("Y-m-d");
		$insert['userid']=$this->session->userdata['user_id'];
		$insert['image']=$this->upload_pic('picintro');
						$insert['subboardname']=($this->input->post('sboard'));

						$insert['editorial']=1;
						if(isset($_POST['savedraft'])){
			$insert['status']=3;
			}
			if(isset($_POST['scedule'])){
			$insert['status']=4;
			$insert['schedulepost']=$this->input->post('scheduletime');
			}
		
		

		$vals=$this->usermodel->insert_data('fbblogmain',$insert);
		$bid= $this->db->insert_id();
			$insertimg['title']=$bid;
			
			$insertimg['description']=($this->input->post('textdes'));
			$insertimg['photo']="";
			//echo ($insertimg['photo']);
			$val=$this->usermodel->insert_data('fbblog',$insertimg);
		redirect(base_url().'board/'.$insert['boardname']);

		}
	function uploaduserimg(){
		
		$propic=$this->upload_userpic('prophoto');
		$name=($this->input->post('catman'));
		if($propic)
		{$insert['photo']=$propic;}
		$covpic=$this->upload_userpic('covphoto');
		if($covpic)
		{$insert['covimg']=$covpic;}
		if($propic || $covpic){
		$id=($this->input->post('catidm'));
		$this->db->where('userId', $id);
		$this->db->update('customer', $insert); 
		}
		
		redirect (base_url().'userprofile/'.$name);
		}
	function uploadcatdetail(){
		
		$propic=$this->upload_catpic('prophoto');
		$name=($this->input->post('catman'));
		if($propic)
		{$insert['proimage']=$propic;}
		$covpic=$this->upload_catpic('covphoto');
		if($covpic)
		{$insert['covimage']=$covpic;}
		if($propic || $covpic){
		$id=($this->input->post('catidm'));
		$this->db->where('id', $id);
		$this->db->update('category', $insert); 
		}
		
		redirect (base_url().'category/'.$name);
		}
	function uploadboarddetail(){
		$propic=$this->upload_catpic('prophoto');
		$name=($this->input->post('catman'));
		if($propic)
		{$insert['image']=$propic;}
		$covpic=$this->upload_catpic('covphoto');
		if($covpic)
		{$insert['coverimg']=$covpic;}
		if($propic || $covpic){
		$id=($this->input->post('catidm'));
		$this->db->where('bid', $id);
		$this->db->update('user_board', $insert); 
		}
		
		redirect (base_url().'board/'.$name);
		
		}
	function upload_catpic($name) {
	//	print_r($_FILES);exit;
		//load the helper
		$this->load->helper('form');
		$config['upload_path'] = './assert/catimg/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '3000';
		$config['max_width']  = '10240';
		$config['max_height']  = '7680';
		$this->load->library('upload', $config);
		 $this->upload->initialize($config);
		
		if (!$this->upload->do_upload($name)) {
			$data = array('msg' => $this->upload->display_errors());
		} else { //else, set the success message
			$data = array('msg' => "success");      
      $data['upload_data'] = $this->upload->data();
	  $this->load->library('image_lib');
		
    //here is the second thumbnail, notice the call for the initialize() function again
    
		return $data['upload_data']['file_name'];
		}
		
			return false;		
	}
	function upload_userpic($name) {
	//	print_r($_FILES);exit;
		//load the helper
		$this->load->helper('form');
		$config['upload_path'] = './assets/images/merchant/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '3000';
		$config['max_width']  = '10240';
		$config['max_height']  = '7680';
		$this->load->library('upload', $config);
		 $this->upload->initialize($config);
		
		if (!$this->upload->do_upload($name)) {
			$data = array('msg' => $this->upload->display_errors());
		} else { //else, set the success message
			$data = array('msg' => "success");      
      $data['upload_data'] = $this->upload->data();
	  $this->load->library('image_lib');
		
    //here is the second thumbnail, notice the call for the initialize() function again
    
		return $data['upload_data']['file_name'];
		}
		
			return false;		
	}
	
		function postschedule($a){
		
		$uid=$this->session->userdata['user_id'];
		if(!$uid){
		redirect('');	
			}
			$data['user_id']=$this->datamodel->userdetailbyusername($a);
			$usid=$data['user_id']->id;
			
		$data['post']=$this->datamodel->showpostschedule($usid);
		
		
		$this->layout->view('postdraft',$data,'postdraft');
		}
		function boardfollow()
		{
					$uid=$this->session->userdata['user_id'];

			
					$data['userid']=$uid;
					$data['boardid']=$_POST['bid'];
					
				$a=$this->datamodel->insertboardfol($data);
			
			redirect($_SERVER['HTTP_REFERER']);
		}
function confirmsignup()
		{
			$uid=$this->session->userdata['user_id'];
	
			
		$data['post']=$this->datamodel->dashboarddata($uid,'24', '0');
		$data['pname']='home';
		$this->layout->view('confirmsignup',$data,'confirmsignup');
		}

		function deletebfollow($foloid)
		{
					$pro2=$this->datamodel->deleteboardfol($foloid);
						redirect($_SERVER['HTTP_REFERER']);


		}
		
		function deletepost($id)
		{
			$t=$this->datamodel->deletepost($id);
			redirect('dashboard');
		}
		
		function followUser($usid,$uid)
		{
			$a=$this->datamodel->insertfol($usid,$uid);
						redirect($_SERVER['HTTP_REFERER']);
		}
		

}