<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Usermodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	function loginByfacebook()
	{
		$this->db->select('*');
		$this->db->where('email',$_POST['email']);
		$this->db->where('activated','0');
		$query=$this->db->get('users');
		$data=$query->result_array();
		return($data)?$data:false;
	}

	function findAllAvailableArea()
	{	
		$this->db->distinct();
		$this->db->select('location');
		$this->db->where('status','1');
		$query=$this->db->get('merchant');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function findAllMerchant()
	{
		$this->db->select('*');
		$this->db->where('status','1');
		$query=$this->db->get('merchant');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function findAllMerchantByCity($location)
	{
		$this->db->select('*');
		$this->db->where('status','1');
		$this->db->where('status','1');
		$this->db->like('location',$location,'both');
		$query=$this->db->get('merchant');
		$data=$query->result_array();
		return($data)?$data:false;
		
	}
	function findSortMostPopularMerchant()
	{
		// $query=$this->db->query('SELECT *,max(rating) as maxrating FROM `merchant` right join userReview on `userReview`.`merchantId`=`merchant`.`merchantId` GROUP BY `userReview`.`merchantId` ORDER BY  maxrating DESC');
		$query=$this->db->query('SELECT merchant . * , MAX( rating ) AS maxrating
									FROM merchant
									LEFT JOIN userreview ON merchant.merchantId = userreview.merchantId
									GROUP BY merchantId
									ORDER BY maxrating DESC');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function findMerchantById($id)
	{
		$this->db->select('*');
		$this->db->where('status','1');
		$this->db->where('merchantId',$id);
		$query=$this->db->get('merchant');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function findServiceByMerchant($merchantId)
	{	
		$this->db->select('*');
		$this->db->where('merchantId',$merchantId);
		$this->db->where('status','1');
		$this->db->group_by('businessCategory');
		$query=$this->db->get('services');
		$data=$query->result_array();
		return($data)?$data:false;
		
	}
	function findNameBusiness($businessCategoryId)
	{
		$this->db->select('category');
		$this->db->where('id',$businessCategoryId);
		$query=$this->db->get('businessCategory');
		$data=$query->result_array();
		return($data)?$data[0]['category']:false;
	}
	function findServiceByCategoryId($businessCategoryId,$merchantId)
	{
		$this->db->select('*');
		$this->db->where('businessCategory',$businessCategoryId);
		$this->db->where('merchantId',$merchantId);
		$this->db->where('status','1');
		$query=$this->db->get('services');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function findAllServices()
	{
		$this->db->select('*');
		$this->db->where('status','1');
		$query=$this->db->get('services');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function findAllDistinctServices()
	{
		$this->db->distinct();
		$this->db->select('*');
		$this->db->where('status','1');
		$query=$this->db->get('services');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function saveRatingData()
	{
	
		$add=array(
		'userId'=>$_POST['userId'],
		'rating'=>$_POST['rating'],
		'merchantId'=>$_POST['merchantId'],
		'status'=>'1'
		);
		$result=$this->checkExistRating($_POST['userId'],$_POST['merchantId']);
		if($result)
		{
			$this->db->set('rating',$_POST['rating']);
			$this->db->where('id',$result[0]['id']);
			$this->db->update('userReview');
			$data=$this->db->affected_rows();
			return $data;
		}
		else
		{
			$this->db->insert('userReview',$add);
			return 1;
		}
	}
	function checkExistRating($userId,$merchantId)
	{
		$this->db->select('*');
		$this->db->where('userId',$userId);
		$this->db->where('merchantId',$merchantId);
		$this->db->where('status','1');
		$query=$this->db->get('userReview');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function findRating($merchantId)
	{
		$this->db->select_max('rating');
		$this->db->where('merchantId',$merchantId);
		$this->db->where('status','1');
		$query=$this->db->get('userReview');
		$data=$query->result_array();
		return($data)?$data[0]['rating']:false;
	}
	
	function bestSearch($keyword)
	{
		$query=$this->db->query("select * from `merchant` left join `userReview` on `userReview`.`merchantId`=`merchant`.`merchantId` where `merchant`.`status`='1' AND `merchant`.`location` LIKE '%$keyword%' GROUP BY `userReview`.`merchantId`");
		$data=$query->result_array();
		return($data)?$data:false;
	}
	
	function findEmployeeNameById($merchantId)
	{
		$this->db->select('*');
		$this->db->where('merchantId',$merchantId);
		$this->db->where('status','1');
		$query=$this->db->get('user_profiles');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function findNameById($userId)
	{
		$this->db->select('username');
		$this->db->where('id',$userId);
		$query=$this->db->get('users');
		$data=$query->result_array();
		return($data)?$data[0]['username']:false;
	}
	function findRecordsByUserId($userId)
	{
		$this->db->select('*');
		$this->db->where('userId',$userId);
		$query=$this->db->get('customer');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function findServiceOrLocation($location)
	{
		$query=$this->db->query("select * from `merchant` left join `userReview` on `userReview`.`merchantId`=`merchant`.`merchantId` where `merchant`.`status`='1' AND `merchant`.`location` LIKE '%$location%' GROUP BY `userReview`.`merchantId`");
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function findAppointment()
	{
		// $query=$this->db->query("select appointTime,appointDate from appointment where appointDate between '2014-05-26' and '2014-05-31' ");
		// $data=$query->result_array();		
		// return($data)?$data:false;
		$this->db->select('*');
		$this->db->where('status','1');
		$query=$this->db->get('appointment');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function findStartEndTime()
	{
		$this->db->select('*');
		$this->db->where('status','1');
		$query=$this->db->get('appointment');
		$data=$query->result_array();
		$array=array();
		$i=0;
		foreach($data as $value)
		{
			$result=$this->findduration($value['serviceId']);
			$starttime=strtotime($value['appointDate'].$value['appointTime']);
			$endtime=strtotime($value['appointDate'].$value['appointTime'])+(($result[0]['duration']-15)*60);
			$array[$i]=array('starttime'=>$starttime,'endtime'=>$endtime);
			$i++;					
		}
		return $array;
	}
	function findduration($serviceId)
	{
		$this->db->select('*');
		$this->db->where('status','1');
		$this->db->where('id',$serviceId);
		$query=$this->db->get('services');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function findAddressOfMerchant($merchantId)
	{
		$this->db->select('location');
		$this->db->where('status','1');
		$this->db->where('merchantId',$merchantId);
		$query=$this->db->get('merchant');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	
	function appointmentByDate($time)
	{
		$data=$this->findAppointment();
		$array=array();
		foreach($data as $value)
		{
			if($time==strtotime($value['appointDate'].$value['appointTime']))
			{
				$array=array('appointDate'=>$value['appointDate'],
							'appointTime'=>$value['appointTime'],
							'serviceId'=>$value['serviceId']
				);
				
			}
		}
		return $array;
	}
	
	function findOnlineBooking($location)
	{
		$query=$this->db->query("SELECT merchant . * , MAX(rating ) AS maxrating
									FROM merchant
									LEFT JOIN userreview ON merchant.merchantId = userreview.merchantId
									WHERE merchant.location LIKE  '%$location%' AND merchant.status='1' AND merchant.onlineBooking='1'
									GROUP BY merchantId
									ORDER BY maxrating DESC");
		$data=$query->result_array();
		return($data)?$data:false;
	}
	
	function findhomeService($location)
	{
		$query=$this->db->query("SELECT merchant . * , MAX(userReview.rating ) AS 	maxrating
								FROM merchant
								LEFT JOIN userReview ON userReview.merchantId = merchant.merchantId
								WHERE merchant.location LIKE  '%$location%' AND merchant.status='1' AND merchant.homeService='1'
								GROUP BY merchant.merchantId
								ORDER BY maxrating DESC");
		$data=$query->result_array();
		return($data)?$data:false;
	}
	
	function findMerchantByService($service)
	{
		$query=$this->db->query("SELECT *,max(rating) as maxrating FROM `merchant` right join userReview on `userReview`.`merchantId`=`merchant`.`merchantId` where `merchant`.`status`='1' AND `merchant`.`homeService`='1' GROUP BY `userReview`.`merchantId` ORDER BY  maxrating DESC");
		$data=$query->result_array();
		return($data)?$data:false;
	}
	
	function findMerchantByLocation($location)
	{
		 $query=$this->db->query("SELECT merchant . * , MAX(userReview.rating ) AS maxrating
        FROM merchant
        LEFT JOIN userReview ON userReview.merchantId = merchant.merchantId
        WHERE merchant.location LIKE  '%$location%' AND merchant.status='1'
        GROUP BY merchant.merchantId
        ORDER BY maxrating DESC");
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function findAllMerchatByLocation($location)
	{
	  $query=$this->db->query("SELECT merchant . * , MAX(userReview.rating ) AS maxrating
			FROM merchant
			LEFT JOIN userReview ON userReview.merchantId = merchant.merchantId
			WHERE merchant.location LIKE  '%$location%'
			GROUP BY merchant.merchantId
			ORDER BY maxrating DESC ");
	  $data=$query->result_array();
	  return($data)?$data:false;
	}
	
	function findDetailofMerchantByBrand($merchatname)
	{
		 $query=$this->db->query("SELECT *,max(rating) as maxrating FROM `merchant` left join userReview on `userReview`.`merchantId`=`merchant`.`merchantId` where `merchant`.`status`='1' AND `merchant`.`name` LIKE '%$merchatname%' GROUP BY `userReview`.`merchantId` ORDER BY  maxrating DESC");
		$data=$query->result_array();
		return($data)?$data:false;
	}
	
	function bookAnAppointment()
	{
		$withouttrim=rtrim($_POST['bookServiceId'],',');
		$serviceId=explode(',',$withouttrim);	
		$i=0;
		$minit=$_POST['bookAppointTime'];
		foreach($serviceId as $value)
		{				
				if($i>0)
				{
					$result=$this->findDurationTime($value,$_POST['bookMerchantId']);
					$time = $_POST['bookAppointTime'];
					$parsed = date_parse($time);
					$seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];
					$addTime=$seconds+($result*60);
					$minit=gmdate("H:i:s", $addTime);
				}
			$appoinDate=date('Y-m-d', strtotime($_POST['bookAppointmentDate']));
			$add=array(
			'empId'=>$_POST['bookEmpId'],
			'userId'=>$this->session->userdata('user_id'),
			'serviceId'=>$value,
			'appointDate'=>$appoinDate,
			'applyDate'=>date('Y-m-d'),
			'appointTime'=>$minit,
			'merchantId'=>$_POST['bookMerchantId']
			);
			$this->db->insert('appointment',$add);			
			$i++;
		}
		return 1;
	}
	function findDurationTime($serviceId,$merchantId)
	{
		$this->db->select('duration');
		$this->db->where('status','1');
		$this->db->where('merchantId',$merchantId);
		$this->db->where('id',$serviceId);
		$query=$this->db->get('services');
		$data=$query->result_array();
		return($data)?$data[0]['duration']:false;
	}
	function getAppointments($merchant, $employee){
		$this->db->select('services.duration,appointment.*');
		$this->db->from('appointment');
		$this->db->join('services', 'services.id = appointment.serviceId'); 
		$this->db->where('appointment.merchantId', $merchant);
		$this->db->where('appointment.empId', $employee);
		$this->db->order_by("appointment.appointDate", "asc");
		$query = $this->db->get();
		$temp = $query->result_array();
		return $temp;
	}
	function findDetailsUserById($id)
	{
		$this->db->select('username,email');
		$this->db->where('id',$id);
		$this->db->where('activated','1');
		$query=$this->db->get('users');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function checkExistUserName()
	{
		
		$this->db->select('id');
		$this->db->where('username',$_GET['username']);
		$query=$this->db->get('users');
		$data=$query->result_array();
		return($data)?$data[0]['id']:false;
		
	}
	function checkExistEmail()
	{
		$this->db->select('id');
		$this->db->where('email',$_GET['email']);
		$query=$this->db->get('users');
		$data=$query->result_array();
		return($data)?$data[0]['id']:false;
	}
	function saveContactForm()
	{
		
		$add=array(
		'name'=>$_POST['contactname'],
		'email'=>$_POST['contactemail'],
		'website'=>$_POST['contactwebsite'],
		'subject'=>$_POST['contactsubject'],
		'message'=>$_POST['contactmessage']
		);
		$this->db->insert('contactForm',$add);
		return 1;
	}
	function findAllMerchat()
	{
		$query=$this->db->query("SELECT `merchant`.*, max(userReview.rating) as maxrating,merchant.`merchantId` as reviewmerchent FROM `merchant` 
left join `userReview` on `userReview`.`merchantId`=`merchant`.`merchantId` WHERE `merchant`.`advertisement`='1' group by `merchant`.`merchantId` ORDER BY  maxrating DESC ");
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function findAllOfffers()
	{
		$query=$this->db->query("SELECT * FROM  `merchant` RIGHT JOIN offers ON  `offers`.`merchantId` =  `merchant`.`merchantId` WHERE  `merchant`.`status` =  '1' limit 0,5");
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function offerFindNext($id)
	{
		$query=$this->db->query("SELECT * FROM  `merchant` RIGHT JOIN offers ON  `offers`.`merchantId` =  `merchant`.`merchantId` WHERE  `merchant`.`status` =  '1' limit ".$id.",5");
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function findsearchOffers($keyword)
	{
		$this->db->select('*');
		$this->db->where('status','1');
		$this->db->like('name',$keyword,'both');
		$query=$this->db->get('offers');
		$data=$query->result_array();
		return($data)?$data:false;		
	}
	function recommendationMsg()
	{
		$uid=$this->session->userdata('user_id');
		$array=array(
		'userId'=>$uid,
		'message'=>$_POST['message'],
		'merchantId'=>$_POST['merchantId']
		);		
		$this->db->insert('recommendation',$array);
		return 1;
	}
	function recommendationList($merchantId)
	{
		$this->db->select('*');
		$this->db->where('status','1');
		$this->db->where('merchantId',$merchantId);
		$query=$this->db->get('recommendation');
		$data=$query->result_array();
		return($data)?$data:false;		
	}
	function findDetailsOfUser($userId)
	{
		$this->db->select('*');
		$this->db->where('user_id',$userId);
		$query=$this->db->get('user_profiles');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function saveCustomerRecord()
	{
		$add=array(
		'fullName'=>$_POST['fullName'],
		'howHandle'=>$_POST['howHandle'],
		'gender'=>$_POST['gender'],
		'state'=>$_POST['state'],
		'language'=>$_POST['language'],
		'DOB'=>$_POST['dateOfBirth'],
		'yourself'=>$_POST['yourSelf'],
		'website'=>$_POST['website'],
		'mobile'=>$_POST['mobileNo']		
		);		
		
		if(!empty($_FILES['picture']))
		{
		$size=$_FILES['picture']['size'];
			if($size<"11263")
			{
	
		$add['photo']="";
			}
			else
			{		
			$add['photo']=$_FILES['picture']['name'];
			}
			$config['upload_path'] = './assets/images/merchant/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			is_dir($config['upload_path']);
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('picture'))
			{
				$this->upload->display_errors();
			}
			
		}
		$this->db->where('userId',$this->session->userdata('user_id'));
		$this->db->update('customer',$add);
		$result=$this->db->affected_rows();		
		return $result;		
	}
	
	function creditcardinformation()
	{
	$data=array('userId'=>$this->session->userdata('user_id'),'nameOnCard'=>$_POST['cardName'],'cardNo'=>$_POST['cardNo'],'CW'=>$_POST['cw'],'expiration'=>($_POST['expmonth'].'-'.$_POST['expyear']),'firstName'=>$_POST['firstName'],'lastName'=>$_POST['lastName'],'address'=>$_POST['address'],'aptFiSuite'=>$_POST['aptFiSuite'],'city'=>$_POST['city'],'state'=>$_POST['state'],'zip'=>$_POST['zipcode']);
		$this->db->select('userId');
		$this->db->where('cardNo',$_POST['cardNo']);
		$query=$this->db->get('creditcard');
		$getno=$query->num_rows();
		 if($getno)
		 {
			$this->db->where('cardNo',$_POST['cardNo']);
			$this->db->update('creditcard',$data);
		}
		else
		{
			
			$this->db->insert('creditcard',$data);
		}
		return true;
	}
	
	function myCard()
	{
		$this->db->select('cardNo');
		$this->db->where('userId',$this->session->userdata('user_id'));
		$query=$this->db->get('creditcard');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	
	function getCardByNo($cardno)
	{
		$this->db->select('*');
		$this->db->where('cardNo',$cardno);
		$query=$this->db->get('creditcard');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	
	function getMerchantImage()
	{
		// $this->db->select('*');
		// $this->db->where('userId','0');
		// $query=$this->db->get('lookbook');
		// $data=$query->result_array();
		// $this->db->select('*');
		// $query=$this->db->get('merchant');
		// $book=$query->result_array();
		// $photodata=array($book,$data);
		$this->db->select('*');
		$this->db->where('photoOf','w');
		$this->db->where('userId','0');
		$query=$this->db->get('lookbook');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	
	function saveInviteFormation()
	{
		$add=array(
		'name'=>$_POST['nameCustomer'],
		'merchantId'=>$_POST['nameSalon'],
		'mobileNo'=>$_POST['mobileNo'],
		'emailId'=>$_POST['emailId'],
		'message'=>$_POST['message'],
		'status'=>'1'
		);
		$this->db->insert('invite',$add);
		return 1;
	}
	
	function AllmerchantList()
	{
		$this->db->where('status','1');
		$query=$this->db->get('merchant');
		return($query->result());
	}
	
	function findemailOfMerchant($id)
	{
		$array=array(
		'activated'=>'1',
		'id'=>$id		
		);
		$this->db->select('email');
		$this->db->where($array);		
		$query=$this->db->get('users');
		return($query->result());
	}
	function addWhishList()
	{	
		$this->db->select('*');
		$this->db->where('userId',$this->session->userdata('user_id'));
		$this->db->where('merchantId',$_POST['merchantId']);
		$query=$this->db->get('wishlist');
		if ($query->num_rows() > 0)
		{
			return false;
		}
		else
		{
		$array=array(
			'userId'=>$this->session->userdata('user_id'),
			'merchantId'=>$_POST['merchantId']
		);
		$this->db->insert('wishList',$array);	
		return 1;
		}
	}
	function findWishList($merchantId)
	{			
		$array=array(
		'merchantId'=>$merchantId,
		'status'=>'1'
		);
		$this->db->select('*');
		$this->db->distinct('userId');
		$this->db->where($array);	
		$this->db->group_by('userId');			
		$query=$this->db->get('wishList');
		return ($query->result());		
	}
	function findServiceByCustomer($serviceId)
	{ 
	  $this->db->select('serviceName');
	  $this->db->where('id',$serviceId);
	  $this->db->where('status','1');
	  $query=$this->db->get('services');
	  $data=$query->result_array();
	  return($data)?$data[0]['serviceName']:false;
	}
	function findEmployeById($serviceId)
	{ 
	  $this->db->select('userName');
	  $this->db->where('id',$serviceId);
	  $query=$this->db->get('users');
	  $data=$query->result_array();
	  return($data)?$data[0]['userName']:false;
	}
	function getWishlist()
	{
	  $this->db->select('merchantId');
	  $this->db->where('userId',$this->session->userdata('user_id'));
	  $query=$this->db->get('wishList');
	  $data=$query->result_array();
	  return($data)?$data:false;
	}
	function findMerchantByIdInWishlist($id)
	{
	  $this->db->select('name');
	  $this->db->where('status','1');
	  $this->db->where('merchantId',$id);
	  $query=$this->db->get('merchant');
	  $data=$query->result_array();
	  return($data)?$data[0]['name']:false;
	}
	function findMerchantPhotoById($id)
	{
	  $this->db->select('photo');
	  $this->db->where('status','1');
	  $this->db->where('merchantId',$id);
	  $query=$this->db->get('merchant');
	  $data=$query->result_array();
	  return($data)?$data[0]['photo']:false;
	}
	function getAppointment()
	{
		   $curdate=date('Y-m-d');
		$this->db->select('*');
		$this->db->where('userId',$this->session->userdata('user_id'));
		$this->db->where('status',"1");
		$this->db->where('appointDate >=',$curdate);
		$query=$this->db->get('appointment');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function countOffer()
	{
		$count=$this->db->count_all('offers');
		return $count;
	}
	public function fetch_offer($limit, $start) {
        $this->db->limit($limit, $start);
		$this->db->where('status','1');
        $query = $this->db->get("offers");
		$data=$query->result_array();
		return($data)?$data:false;        
   }
   function getsessiondata()
	{
		//echo $_POST['value'];
		$sessionval=$this->session->set_userdata('val',$_POST['value']);
		 return 1;
	}
   function checkLogin()
   {
		$this->db->select('id,business,userLevel');
		$this->db->where('id',$this->session->userdata('user_id'));
		$this->db->where('activated',"1");
		$query=$this->db->get('users');
		$data=$query->result_array();
		return($data)?$data:false;
   }
   function seeLookupalbum($data)
   {
		$this->db->select('id');
		  if($data[0]['userLevel']==4)
		{
		
			$this->db->where('userId',$this->session->userdata('user_id'));
		}
		else
	   {
			$this->db->where('merchantId',$this->session->userdata('user_id'));
	   }
		$this->db->where('status',"1");
		$query=$this->db->get('lookupalbum');
		$status=$query->result_array();
		return($status)?$status:false;
	   
	}
   
   function addToLookbook($data)
    {
	   $element=array('status'=>"1");
	   if($data[0]['userLevel']==4)
	   {
			$element['userId']=$this->session->userdata('user_id');
	   }
	   else
	   {
			$element['merchantId']=$this->session->userdata('user_id');
	   }
		
		$this->db->insert('lookupalbum', $element);
   }
   
	function checkExistImage()
	{
		$this->db->select('id');
		$this->db->where('userId',$this->session->userdata('user_id'));
		$this->db->where('photo',$_POST['pname']);
		$query=$this->db->get('lookbook');
		$data=$query->result_array();
		return($data)?true:false;
	}
	function addLookbook($data)
	{
		$this->db->select('id');
		  if($data[0]['userLevel']==4)
		{
		
			$this->db->where('userId',$this->session->userdata('user_id'));
		}
		else
	   {
			$this->db->where('merchantId',$this->session->userdata('user_id'));
	   }
		$this->db->where('status',"1");
		$query=$this->db->get('lookupalbum');
		$status=$query->result_array();
		   $element=array('status'=>"1",'albumId'=>$status[0]['id'],'photo'=>$_POST['pname'],'description'=>$_POST['desc'],'photoOf'=>'w');
		  
		   if($data[0]['userLevel']==4)
		   {
				$element['userId']=$this->session->userdata('user_id');
		   }
		   else
		   {
				$element['merchantId']=$this->session->userdata('user_id');
		   }
			
			$this->db->insert('lookbook', $element);
			
   }
   
   function reverseAuctionInsert()
   {
		$auction=array(
		'userId'=>$this->session->userdata('user_id'),
		'request'=>$_POST['request'],
		'category'=>$_POST['category'],
		'location'=>$_POST['location'],
		'minBudget'=>$_POST['minBudget'],
		'maxBudget'=>$_POST['maxBudget'],
		'dateOfService'=>date("Y-m-d",strtotime($_POST['dateOfService'])),
		'noOfPeople'=>$_POST['noOfPeople'],
		'note'=>$_POST['note']
		);
		$this->db->insert('reverseauction', $auction);
		return true;
	}
	function reverseAuctionDetail()
	{
		$this->db->select('*');
		$this->db->where('status','1');
		$query=$this->db->get('reverseauction');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function getOnlyMerchantImage($id)
	{	
		$this->db->select('photo');
		$this->db->where('status','1');
		// if($this->session->userdata('user_level')=='1')
		// $this->db->where('merchantId',$id);
		// else
		$this->db->where('merchantId',$id);
		$this->db->where('photoOf','p');
		$query=$this->db->get('lookbook');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function bidMerchantService()
	{
		$this->db->select('*');
		$this->db->where('reverseAuctionId',$_POST['reverseid']);
		$this->db->where('merchantId',$this->session->userdata('user_id'));
		$query=$this->db->get('merchant_biding');
		$biding=array(
		'merchantId'=>$this->session->userdata('user_id'),
		'contactName'=>$_POST['contactName'],
		'bamt'=>$_POST['bid'],
		'note'=>$_POST['note'],
		'reverseAuctionId'=>$_POST['reverseid']
		);			
		if ($query->num_rows()> 0){
			  $this->db->where('reverseAuctionId',$_POST['reverseid']);
			  $this->db->where('merchantId',$this->session->userdata('user_id'));
              $this->db->update('merchant_biding', $biding);
            }
            else{ 
			
		$this->db->insert('merchant_biding', $biding);
		}
		return true;
	}
	function checkuserbyname($name)
	{
		$this->db->select('*');
		$this->db->where('username',$name);
		$this->db->where('userLevel','4');
		$query=$this->db->get('users');
		$data=$query->result_array();
		return($data)?false:true;
	}
	function reverseAuctionDetailById()
	{
		$this->db->select('*');
		$this->db->where('id',$_POST['reverseid']);
		$query=$this->db->get('reverseauction');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function checkuser()
	{	
		$this->db->select('*');
		$this->db->where('id',$_POST['id']);
		$this->db->where('userLevel','2');
		$query=$this->db->get('users');
		$data=$query->result_array();
		return($data)?true:false;
	}
	function checkMerchant()
	{	
		$this->db->select('*');
		$this->db->where('id',$_POST['id']);
		$this->db->where('userLevel','2');
		$query=$this->db->get('users');
		$data=$query->result_array();
		return($data)?true:false;
	}
	function bidcount()
	{
		$this->db->select('COUNT(*)');
		$this->db->where('reverseAuctionId',$_POST['id']);
		$query=$this->db->get('merchant_biding');
		$data=$query->result_array();
		return($data)?$data[0]['COUNT(*)']:false;
	}
	function getCategory()
	{
		$this->db->select('*');
		$this->db->where('status','1');
		$query=$this->db->get('businessCategory');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function avgbid()
	{
		$this->db->select_avg('bamt');
		$this->db->where('reverseAuctionId',$_POST['id']);
		$query=$this->db->get('merchant_biding');
		$data=$query->result_array();
		return($data)?$data[0]['bamt']:false;
	}
	function budget()
	{
		$this->db->select('*');
		$this->db->where('id',$_POST['userid']);
		$this->db->where('status','1');
		$query=$this->db->get('reverseauction');
		$data=$query->result_array();
		$budget=$data[0]['minBudget'].'-'.$data[0]['maxBudget'];
		return($data)?$budget:false;
	}
	function getBidingInformation()
	{
		$this->db->select('*');
		$this->db->where('merchantId',$this->session->userdata('user_id'));
		$query=$this->db->get('merchant_biding');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function findServiceNamebyId($id)
	{
		$this->db->select('serviceName');
		$this->db->where('id',$id);
		$query=$this->db->get('services');
		$data=$query->result_array();
		return($data)?$data[0]['serviceName']:false;
	}
	function getcustomerImage($userid)
	 {
	  $this->db->select('photo,description');
	  $this->db->where('userId',$userid);
	  $query=$this->db->get('lookbook');
	  $data=$query->result_array();
	  return($data)?$data:false;
	 }
	 function findOfferFindByOfferId($offerId)
	 {
	  $this->db->select('*');
	  $this->db->where('id',$offerId);
	  $this->db->where('status','1');
	  $query=$this->db->get('offers');
	  $data=$query->result_array();
	  return($data)?$data:false;
	 }
	 function findMerchantNameByAuctionId()
	 {
	  $this->db->select('request');
	  $this->db->where('id',$_POST['id']);
	  $query=$this->db->get('reverseauction');
	  $data=$query->result_array();
	  return($data)?$data[0]['request']:false;
	 }
	 function popupbid()
	 {
		$this->db->select('contactName,bamt,note');
		$this->db->where('reverseAuctionId',$_POST['id']);
		$query=$this->db->get('merchant_biding');
		$data=$query->result_array();
		return($data)?$data:false;
	 }
	 function getMerchantWorkingPhoto($id)
	 {
		$this->db->select('photo');
		$this->db->where('merchantId',$id);
		$this->db->where('photoOf','w');
		$query=$this->db->get('lookbook');
		$data=$query->result_array();
		return($data)?$data:false;
	 } 
	 function getLoginName($userName)
	 {
		$this->db->select('firstName,lastName');
		$this->db->where('username',$userName);
		$query=$this->db->get('users');
		$data=$query->result_array();
		$name=$data[0]['firstName'].' '.$data[0]['lastName'];
		return($data)?$name:false;
	 }
}

?>