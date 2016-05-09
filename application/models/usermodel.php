<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usermodel extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function loginByfacebook() {
        $this->db->select('*');
        $this->db->where('email', $_POST['email']);
        $query = $this->db->get('users');
        if ($query->num_rows() == 0)
            return 'not found';
        else {
            $this->db->select('*');
            $this->db->where('email', $_POST['email']);
            $this->db->where('activated', '1');
            $query = $this->db->get('users');
            $data = $query->result_array();
            return($data) ? $data : false;
        }
    }

    function saveSignUpData($data) {
        $this->db->insert('users', $data);
        $insert['userId'] = $this->db->insert_id();
        $profile['user_id'] = $insert['userId'];
        $insert['fullName'] = $data['fullName'];
        $profile['name'] = $insert['fullName'];
        $insert['mobile'] = $data['monum'];
        $this->db->insert('customer', $insert);
        $this->db->insert('user_profiles', $profile);
        return 1;
    }

    function loginBygoogle($email) {
        $this->db->select('*');
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        if ($query->num_rows() == 0)
            return 'not found';
        else {
            $this->db->select('*');
            $this->db->where('email', $email);
            $this->db->where('activated', '1');
            $query = $this->db->get('users');
            $data = $query->result_array();
            return($data) ? $data : false;
        }
    }

    function findAllAvailableArea() {
        $query = $this->db->query("select address from merchant");
        //$query=$this->db->query("select distinct(name) from area union select distinct(cityName) from city union select distinct(address) from merchant");
        //$this->db->distinct();
        //$this->db->select('location');
        //$this->db->where('status','1');
        //$query=$this->db->get('merchant');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findAllMerchant() {
        $this->db->select('*');
        $this->db->distinct();
        $this->db->where('status', '1');
        $query = $this->db->get('merchant');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findAllMerchantcount($start, $cnt) {
        $this->db->select('*');
        $this->db->distinct();
        $this->db->limit($cnt, $start);
        $this->db->where('status', '1');
        $query = $this->db->get('merchant');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findAllOfferLocationMerchant() {
        $query = $this->db->query("SELECT * FROM  `merchant` RIGHT JOIN offers ON  `offers`.`merchantId` =  `merchant`.`merchantId` WHERE  `merchant`.`status` =  '1'");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findOfferLocationMerchant() {
        $offer = $_POST['offer'];
        $query = $this->db->query("SELECT * FROM  `merchant` RIGHT JOIN offers ON  `offers`.`merchantId` =  `merchant`.`merchantId` WHERE  `merchant`.`status` =  '1' AND offers.name LIKE '%$offer%'");
        $data = $query->result_array();
        if (!$data) {
            $query = $this->db->query("SELECT * FROM  `merchant` RIGHT JOIN offers ON  `offers`.`merchantId` =  `merchant`.`merchantId` WHERE  `merchant`.`status` =  '1'");
            $data = $query->result_array();
        }
        return($data) ? $data : false;
    }

    function findAddressOfServiceLocationMerchant() {
        $service = $_POST['place'];
        $query = $this->db->query("SELECT * FROM  `merchant` RIGHT JOIN services ON  `services`.`merchantId` =  `merchant`.`merchantId` WHERE  `merchant`.`status` =  '1' AND `services`.`serviceName` LIKE '%$service%' OR `merchant`.`salonName` LIKE '%$service%'");
        $data = $query->result_array();
        //print_r($data);
        return($data) ? $data : false;
    }

    function findMerchant() {
        if ($_POST['place'] == 'No_Area') {
            $this->db->select('*');
            $this->db->where('onlineBooking', '1');
            $this->db->where('status', '1');
            $query = $this->db->get('merchant');
            $data = $query->result_array();
            return($data) ? $data : false;
        } else {
            $this->db->select('*');
            $this->db->where('status', '1');
            $this->db->where('onlineBooking', '1');
            $this->db->like('address', $_POST['place'], 'both');
            $query = $this->db->get('merchant');
            $data = $query->result_array();
            return($data) ? $data : false;
        }
    }

    function findAllMerchantByCity($location, $start, $cnt) {
        /* $this->db->select('*');
          $this->db->where('status','1');
          $this->db->like('location',rawurldecode($location),'both');
          $this->db->group_by('salonName');
          $query=$this->db->get('merchant');
          $data=$query->result_array();
          if(count($data)==NULL)
          { */
        $this->db->select('*');
        $this->db->limit($cnt, $start);
        $this->db->where('status', '1');
        $this->db->like('address', rawurldecode($location), 'both');
        $query = $this->db->get('merchant');
        $data = $query->result_array();



        return($data) ? $data : false;
    }

    function findAllMerchantBysa($location) {
        $this->db->select('*');
        $this->db->where('status', '1');
        $this->db->group_by('salonName');
        $query = $this->db->get('merchant');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function getName($userId) {

        $this->db->select('firstName,lastName');
        $this->db->where('id', $userId);
        $query = $this->db->get('users');
        $data = $query->result_array();
        $name = $data[0]['firstName'] . ' ' . $data[0]['lastName'];
        return($data) ? $name : false;
    }

    function findsaloncount($name) {
        $this->db->select('*');
        $this->db->where('status', '1');
        $this->db->like('salonName', $name);
        $query = $this->db->get('merchant');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function onlyServices($service, $start, $cnt) {
        $as = rawurldecode($service);
        if ($service == 'No_Area') {
            $this->db->select('*');
            $this->db->limit($cnt, $start);
            $this->db->from('merchant');
            $this->db->where('status', '1');
            $query = $this->db->get();
            //$query=$this->db->query("select * from merchant where status='1' and (salonName like '%$service%' or location like '%$service%')");
        } else {
            $service = rawurldecode($service);
            //echo ($service);
            /* if (strpos($service,'and') !== false) {
              $service=split('and', $service);
              $service=array_map('trim',$service);
              }
              else{

              $service=split('[- &_,.]', $service);
              } */
            $mquery = '';
            $aquery = '';
            $cquery = '';
            //print_r($service);
            $this->db->select('merchantId');
            $this->db->from('services');
            $this->db->like('serviceName', $service);
            $this->db->or_like('keywords', $service);
            /* foreach($service as $sr){
              $this->db->or_like('serviceName',$sr);
              $this->db->or_like('keywords',$sr);
              } */
            //$this->db->or_like('keywords',$service[1]);
            $resmid = $this->db->get();
            $rmid = $resmid->result_array();

            $mid = '';
            foreach ($rmid as $m) {
                $mid.=$m['merchantId'] . ',';
            }
            $mid = rtrim($mid, ',');

            $this->db->select('merchantId');
            $this->db->from('merchant');
            $this->db->like('salonName', $service);
            /* foreach($service as $sr){

              $this->db->or_like('salonName',$sr);
              } */
            $slunid = $this->db->get();
            $slid = $slunid->result_array();
            $slnid = '';
            foreach ($slid as $s) {
                $slnid.=$s['merchantId'] . ',';
            }
            $slnid = rtrim($slnid, ',');
            $slnid = ',' . $slnid;
            $slnid = rtrim($slnid, ',');
            if (!empty($mid)) {
                $mquery = " or merchantId in($mid$slnid)";
            }
            /*
              $this->db->select('id');
              $this->db->from('area');
              $this->db->like('name',$service,'both');
              //foreach($service as $sr){
              //$this->db->like('name',$sr,'both');}
              $resmid=$this->db->get();
              $rmid=$resmid->result_array();
              $aid='';
              foreach($rmid as $m)
              {
              $aid.=$m['id'].',';
              }
              $aid=rtrim($aid,',');
              if(!empty($aid))
              {
              $aquery=" or area in($aid)";
              }

              $this->db->select('id');
              $this->db->from('city');
              /*foreach($service as $sr){
              $this->db->like('cityName',$sr);}
              $resmid=$this->db->get();
              $rmid=$resmid->result_array();
              $cid='';
              foreach($rmid as $m)
              {
              $cid.=$m['id'].',';
              }
              $cid=rtrim($cid,',');
              if(!empty($cid))
              {
              $cquery=" or city in($cid)";
              } */
            $i = 0;

            //print_r($service);

            $query = $this->db->query("select * from merchant where status='1' and (salonName like '%" . $as . "%'  $mquery$aquery$cquery) LIMIT $start, $cnt ");
//echo ($this->db->last_query());
        }
        //$this->db->select('*');
        //$this->db->where('status','1');
        //$this->db->like('salonName',$service,'both');
        //$this->db->or_like('location',$service,'both');
        //$this->db->or_where_in('merchantId',$mid);
        //$query=$this->db->get('merchant');
        //print_r("select * from merchant where status='1' and (salonName like '%$service%'$mquery$aquery$cquery)");
        //echo ($this->db->last_query());
        $data = $query->result_array();

        return($data) ? $data : false;
    }

    function findAllMerchantDataByCity($location) {
        $this->db->select('*');
        $this->db->where('status', '1');
        $this->db->like('location', rawurldecode($location), 'both');
        $query = $this->db->get('merchant');
        $data = $query->result_array();
        $check = $data ? $data : false;
        if (!$check) {
            $data = $this->findAllMerchantByService($location);
            return($data) ? $data : false;
        } else {
            return($data) ? $data : false;
        }
    }

    function findSortMostPopularMerchant() {
        $query = $this->db->query('SELECT merchant . * , MAX( rating ) AS maxrating
									FROM merchant
									LEFT JOIN userReview ON merchant.merchantId = userReview.merchantId
									where merchant.status="1"
									GROUP BY merchantId
									ORDER BY maxrating DESC');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findMerchantById($id) {
        $this->db->select('*');
        $this->db->where('status', '1');
        $this->db->where('merchantId', $id);
        $query = $this->db->get('merchant');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findCustomerById($id) {
        $this->db->select('*');
        $this->db->where('status', '1');
        $this->db->where('userId', $id);
        $query = $this->db->get('customer');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findCustomerPhotoById($id) {
        $this->db->select('photo');
        $this->db->where('userId', $id);
        $query = $this->db->get('customer');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findServiceByMerchant($merchantId) {
        $this->db->select('*');
        $this->db->where('merchantId', $merchantId);
        $this->db->where('status', '1');
        $this->db->group_by('businessCategory');
        $query = $this->db->get('services');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findNameBusiness($businessCategoryId) {
        $this->db->select('category');
        $this->db->where('id', $businessCategoryId);
        $query = $this->db->get('businessCategory');
        $data = $query->result_array();
        return($data) ? $data[0]['category'] : false;
    }

    function findServiceByCategoryId($businessCategoryId, $merchantId) {
        $this->db->select('*');
        $this->db->where('businessCategory', $businessCategoryId);
        $this->db->where('merchantId', $merchantId);
        $this->db->where('status', '1');
        $query = $this->db->get('services');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findAllServices() {
        $this->db->select('*');
        $this->db->where('status', '1');
        $this->db->group_by('serviceName');
        $query = $this->db->get('services');

        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findAllDistinctServices() {
        $query = $this->db->query("select distinct(serviceName) from services where status='1'");
        //$this->db->distinct();
        //$this->db->select('*');
        //$this->db->where('status','1');
        //$query=$this->db->get('services');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function saveRatingData() {
        $add = array(
            'userId' => $_POST['userId'],
            'rating' => $_POST['rating'],
            'merchantId' => $_POST['merchantId'],
            'status' => '1'
        );
        $result = $this->checkExistRating($_POST['userId'], $_POST['merchantId']);
        if (!empty($result)) {
            $this->db->set('rating', $_POST['rating']);
            $this->db->where('id', $result[0]['id']);
            $this->db->update('userReview');
            $data = $this->db->affected_rows();
            return $data;
        } else {
            $this->db->insert('userReview', $add);
            return 1;
        }
    }

    function checkExistRating($userId, $merchantId) {
        $this->db->select('*');
        $this->db->where('userId', $userId);
        $this->db->where('merchantId', $merchantId);
        $this->db->where('status', '1');
        $query = $this->db->get('userReview');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findRating($merchantId) {

        if ($this->session->userdata('user_level') == '4') {
            $this->db->select('rating');
            $this->db->where('userId', $this->session->userdata('user_id'));
        } else {
            $this->db->select_max('rating');
        }
        $this->db->where('merchantId', $merchantId);
        $this->db->where('status', '1');
        $query = $this->db->get('userReview');
        $data = $query->result_array();
        return($data) ? $data[0]['rating'] : false;
    }

    function bestSearch($keyword) {
        $query = $this->db->query("select * from `merchant` left join `userReview` on `userReview`.`merchantId`=`merchant`.`merchantId` where `merchant`.`status`='1' AND `merchant`.`location` LIKE '%$keyword%' GROUP BY `userReview`.`merchantId`");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findEmployeeNameById($merchantId) {
        $this->db->select('*');
        $this->db->where('merchantId', $merchantId);
        $this->db->where('status', '1');
        $query = $this->db->get('user_profiles');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findNameById($userId) {
        $this->db->select('username');
        $this->db->where('id', $userId);
        $query = $this->db->get('users');
        $data = $query->result_array();
        return($data) ? $data[0]['username'] : false;
    }

    function findRecordsByUserId($userId) {
        $this->db->select('*');
        $this->db->where('userId', $userId);
        $query = $this->db->get('customer');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findServiceOrLocation($location) {
        $query = $this->db->query("select * from `merchant` left join `userReview` on `userReview`.`merchantId`=`merchant`.`merchantId` where `merchant`.`status`='1' AND `merchant`.`location` LIKE '%$location%' GROUP BY `userReview`.`merchantId`");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findAppointment() {
        // $query=$this->db->query("select appointTime,appointDate from appointment where appointDate between '2014-05-26' and '2014-05-31' ");
        // $data=$query->result_array();
        // return($data)?$data:false;
        $this->db->select('*');
        $this->db->where('status', '1');
        $query = $this->db->get('appointment');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findStartEndTime() {
        $this->db->select('*');
        $this->db->where('status', '1');
        $query = $this->db->get('appointment');
        $data = $query->result_array();
        $array = array();
        $i = 0;
        foreach ($data as $value) {
            $result = $this->findduration($value['serviceId']);
            $starttime = strtotime($value['appointDate'] . $value['appointTime']);
            $endtime = strtotime($value['appointDate'] . $value['appointTime']) + (($result[0]['duration'] - 15) * 60);
            $array[$i] = array('starttime' => $starttime, 'endtime' => $endtime);
            $i++;
        }
        return $array;
    }

    function findduration($serviceId) {
        $this->db->select('*');
        $this->db->where('status', '1');
        $this->db->where('id', $serviceId);
        $query = $this->db->get('services');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findAddressOfMerchant($merchantId) {
        $this->db->select('location,salonName,address,city');
        $this->db->where('status', '1');
        $this->db->where('merchantId', $merchantId);
        $query = $this->db->get('merchant');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findAddressOfcustomer($merchantId) {
        $this->db->select('location,fullname');
        $this->db->where('status', '1');
        $this->db->where('userId', $merchantId);
        $query = $this->db->get('customer');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function appointmentByDate($time) {
        $data = $this->findAppointment();
        $array = array();
        foreach ($data as $value) {
            if ($time == strtotime($value['appointDate'] . $value['appointTime'])) {
                $array = array('appointDate' => $value['appointDate'],
                    'appointTime' => $value['appointTime'],
                    'serviceId' => $value['serviceId']
                );
            }
        }
        return $array;
    }

    function findOnlineBooking($location, $service) {
        $query = $this->db->query("SELECT merchant . * , MAX(rating ) AS maxrating
									FROM merchant
									LEFT JOIN userReview ON merchant.merchantId = userReview.merchantId LEFT JOIN services ON merchant.merchantId = services.merchantId
									WHERE services.serviceName LIKE  '%$service%' AND merchant.address LIKE  '%$location%' AND merchant.status='1' AND merchant.onlineBooking='1'
									GROUP BY merchantId
									ORDER BY maxrating DESC");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function OnlineBookingService($service) {
        $query = $this->db->query("SELECT merchant . * , MAX(rating ) AS maxrating
									FROM merchant
									LEFT JOIN userReview ON merchant.merchantId = userReview.merchantId LEFT JOIN services ON merchant.merchantId = services.merchantId
									WHERE services.serviceName LIKE  '%$service%' AND merchant.status='1' AND merchant.onlineBooking='1'
									GROUP BY merchantId
									ORDER BY maxrating DESC");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function OnlineHomeServiceCheck($service) {
        $query = $this->db->query("SELECT merchant . * , MAX(rating ) AS maxrating
									FROM merchant
									LEFT JOIN userReview ON merchant.merchantId = userReview.merchantId LEFT JOIN services ON merchant.merchantId = services.merchantId
									WHERE services.serviceName LIKE  '%$service%' OR merchant.salonName like '%$service%' AND merchant.status='1' AND merchant.homeService='1'
									GROUP BY merchantId
									ORDER BY maxrating DESC");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function offersServiceCheck($service) {
        $query = $this->db->query("SELECT merchant . * , MAX(rating ) AS maxrating
									FROM merchant
									LEFT JOIN userReview ON merchant.merchantId = userReview.merchantId LEFT JOIN services ON merchant.merchantId = services.merchantId
									WHERE services.serviceName LIKE  '%$service%' AND merchant.status='1' AND merchant.homeService='1'
									GROUP BY merchantId
									ORDER BY maxrating DESC");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function OnlineBookingServiceUncheck($service) {
        $query = $this->db->query("SELECT merchant . * , MAX(rating ) AS maxrating
									FROM merchant
									LEFT JOIN userReview ON merchant.merchantId = userReview.merchantId LEFT JOIN services ON merchant.merchantId = services.merchantId
									WHERE services.serviceName LIKE  '%$service%' AND merchant.status='1' GROUP BY merchantId
									ORDER BY maxrating DESC");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findhomeService($location, $service) {
        $query = $this->db->query("SELECT merchant . * , MAX(userReview.rating ) AS 		maxrating
		FROM merchant
								LEFT JOIN userReview ON userReview.merchantId = merchant.merchantId LEFT JOIN services ON merchant.merchantId = services.merchantId
								WHERE services.serviceName LIKE  '%$service%' AND merchant.location LIKE  '%$location%' AND merchant.status='1' AND merchant.homeService='1'
								GROUP BY merchant.merchantId
								ORDER BY maxrating DESC");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function offerService($location, $service) {
        $query = $this->db->query("SELECT merchant . * , MAX(userReview.rating ) AS 		maxrating
		FROM merchant
								LEFT JOIN userReview ON userReview.merchantId = merchant.merchantId LEFT JOIN services ON merchant.merchantId = services.merchantId RIGHT JOIN offers ON offers.merchantId=merchant.merchantId
								WHERE services.serviceName LIKE  '%$service%' AND merchant.location LIKE  '%$location%' AND merchant.status='1'
								GROUP BY merchant.merchantId
								ORDER BY maxrating DESC");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function offerPlaceMerchant($location) {
        $ar = split('@', $location);
        //print_r($ar);
        $query = $this->db->query("SELECT merchant . * , MAX(userReview.rating ) AS 		maxrating
		FROM merchant
								LEFT JOIN userReview ON userReview.merchantId = merchant.merchantId LEFT JOIN services ON merchant.merchantId = services.merchantId RIGHT JOIN offers ON offers.merchantId=merchant.merchantId
								WHERE merchant.address LIKE '%$ar[0]%' or merchant.location LIKE  '%$ar[1]%' AND merchant.status='1'
								GROUP BY merchant.merchantId
								ORDER BY maxrating DESC");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function onlineBookingPlaceMerchant($location) {
        $query = $this->db->query("SELECT merchant . * , MAX(userReview.rating ) AS 		maxrating
		FROM merchant
								LEFT JOIN userReview ON userReview.merchantId = merchant.merchantId
								WHERE merchant.address LIKE  '%$location%' AND merchant.status='1' AND merchant.onlineBooking='1'
								GROUP BY merchant.merchantId
								ORDER BY maxrating DESC");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function homeServiceNoArea() {
        $query = $this->db->query("SELECT merchant . * , MAX(userReview.rating ) AS 		maxrating
		FROM merchant
								LEFT JOIN userReview ON userReview.merchantId = merchant.merchantId WHERE merchant.status='1' AND merchant.homeService='1'
								GROUP BY merchant.merchantId
								ORDER BY maxrating DESC");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function OnlineBookingNoArea() {
        $query = $this->db->query("SELECT merchant . * , MAX(rating ) AS maxrating
									FROM merchant
									LEFT JOIN userReview ON merchant.merchantId = userReview.merchantId
									WHERE merchant.status='1' AND merchant.onlineBooking='1'
									GROUP BY merchantId
									ORDER BY maxrating DESC");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function offersCheck() {
        $querya = $this->db->query('select merchantId from offers');
        $val = $querya->result_array();
        $slnid = '';
        foreach ($val as $s) {
            $slnid.=$s['merchantId'] . ',';
        }
        $slnid = rtrim($slnid, ',');



        $query = $this->db->query("SELECT merchant . * , MAX(rating ) AS maxrating
									FROM merchant
									LEFT JOIN userReview ON merchant.merchantId = userReview.merchantId
									WHERE merchant.status='1'
									and merchant.merchantId in ($slnid)
									GROUP BY merchantId
									ORDER BY maxrating DESC");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findMerchantByService($service) {
        $query = $this->db->query("SELECT *,max(rating) as maxrating FROM `merchant` right join userReview on `userReview`.`merchantId`=`merchant`.`merchantId` where `merchant`.`status`='1' AND `merchant`.`homeService`='1' GROUP BY `userReview`.`merchantId` ORDER BY  maxrating DESC");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findMerchantByLocation($location) {
        $query = $this->db->query("SELECT merchant . * , MAX(userReview.rating ) AS maxrating
        FROM merchant
        LEFT JOIN userReview ON userReview.merchantId = merchant.merchantId
        WHERE merchant.location LIKE  '%$location%' AND merchant.status='1'
        GROUP BY merchant.merchantId
        ORDER BY maxrating DESC");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function homeServicePlace($location) {
        $query = $this->db->query("SELECT merchant . * , MAX(userReview.rating ) AS maxrating
        FROM merchant
        LEFT JOIN userReview ON userReview.merchantId = merchant.merchantId
        WHERE merchant.location LIKE  '%$location%' AND merchant.status='1' AND merchant.homeService='1'
        GROUP BY merchant.merchantId
        ORDER BY maxrating DESC");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function MerchantByLocation($location) {
        $query = $this->db->query("SELECT merchant . * , MAX(userReview.rating ) AS maxrating
        FROM merchant
        LEFT JOIN userReview ON userReview.merchantId = merchant.merchantId
        WHERE merchant.location LIKE  '%$location%' AND merchant.status='1'
        GROUP BY merchant.merchantId
        ORDER BY maxrating DESC");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findAllMerchatByLocation($location, $service) {
        $query = $this->db->query("SELECT merchant . * , MAX(userReview.rating ) AS maxrating
			FROM merchant
			LEFT JOIN userReview ON userReview.merchantId = merchant.merchantId LEFT JOIN services ON merchant.merchantId = services.merchantId
			WHERE services.serviceName LIKE  '%$service%' AND merchant.location LIKE  '%$location%'
			GROUP BY merchant.merchantId
			ORDER BY maxrating DESC ");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findAllSearchMerchat() {
        $query = $this->db->query("SELECT merchant . * , MAX(userReview.rating ) AS maxrating
			FROM merchant
			LEFT JOIN userReview ON userReview.merchantId = merchant.merchantId
			WHERE merchant.status='1'
			GROUP BY merchant.merchantId
			ORDER BY maxrating DESC ");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findDetailofMerchantByBrand($merchatname) {
        $query = $this->db->query("SELECT *,max(rating) as maxrating FROM `merchant` left join userReview on `userReview`.`merchantId`=`merchant`.`merchantId` where `merchant`.`status`='1' AND `merchant`.`salonName` LIKE '%" . $merchatname . "%' GROUP BY `userReview`.`merchantId` ORDER BY  maxrating DESC");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findAllMerchantNoBrand() {
        $query = $this->db->query("SELECT *,max(rating) as maxrating FROM `merchant` left join userReview on `userReview`.`merchantId`=`merchant`.`merchantId` where `merchant`.`status`='1' GROUP BY `userReview`.`merchantId` ORDER BY  maxrating DESC");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function bookAnAppointment() {
        $withouttrim = rtrim($_POST['bookServiceId'], ',');
        $serviceId = explode(',', $withouttrim);
        $i = 0;
        $minit = $_POST['bookAppointTime'];
        foreach ($serviceId as $value) {
            if ($i > 0) {
                $result = $this->findDurationTime($value, $_POST['bookMerchantId']);
                $time = $_POST['bookAppointTime'];
                $parsed = date_parse($time);
                $seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];
                $addTime = $seconds + ($result * 60);
                $minit = gmdate("H:i:s", $addTime);
            }
            $appoinDate = date('Y-m-d', strtotime($_POST['bookAppointmentDate']));
            $add = array(
                'empId' => $_POST['bookEmpId'],
                'userId' => $this->session->userdata('user_id'),
                'serviceId' => $value,
                'appointDate' => $appoinDate,
                'applyDate' => date('Y-m-d'),
                'appointTime' => $minit,
                'merchantId' => $_POST['bookMerchantId']
            );
            $this->db->insert('appointment', $add);
            $i++;
        }
        return 1;
    }

    function findDurationTime($serviceId, $merchantId) {
        $this->db->select('duration');
        $this->db->where('status', '1');
        $this->db->where('merchantId', $merchantId);
        $this->db->where('id', $serviceId);
        $query = $this->db->get('services');
        $data = $query->result_array();
        return($data) ? $data[0]['duration'] : false;
    }

    function getAppointments($merchant, $employee) {
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

    function findDetailsUserById($id) {
        $this->db->select('username,email');
        $this->db->where('id', $id);
        $this->db->where('activated', '1');
        $query = $this->db->get('users');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findallDetailsUserById($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->where('activated', '1');
        $query = $this->db->get('users');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function checkExistUserName() {

        $this->db->select('id');
        $this->db->where('username', $_GET['username']);
        $query = $this->db->get('users');
        $data = $query->result_array();
        return($data) ? $data[0]['id'] : false;
    }

    function checkExistEmail() {
        $this->db->select('id');
        $this->db->where('email', $_GET['email']);
        $query = $this->db->get('users');
        $data = $query->result_array();
        return($data) ? $data[0]['id'] : false;
    }

    function saveContactForm() {

        $add = array(
            'name' => $_POST['contactname'],
            'email' => $_POST['contactemail'],
            'phone' => $_POST['contactwebsite'],
            'subject' => $_POST['contactsubject'],
            'message' => $_POST['contactmessage']
        );
        $this->db->insert('contactForm', $add);
        return 1;
    }

    function findAllMerchat() {
        $query = $this->db->query("SELECT `merchant`.*, max(userReview.rating) as maxrating,merchant.`merchantId` as reviewmerchent FROM `merchant`
left join `userReview` on `userReview`.`merchantId`=`merchant`.`merchantId` WHERE `merchant`.`advertisement`='1' group by `merchant`.`merchantId` ORDER BY  maxrating DESC ");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findAllOfffers() {
        $query = $this->db->query("SELECT * FROM  `merchant` RIGHT JOIN offers ON  `offers`.`merchantId` =  `merchant`.`merchantId` WHERE  `merchant`.`status` =  '1' limit 0,5");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function offerFindNext($id) {
        $query = $this->db->query("SELECT * FROM  `merchant` RIGHT JOIN offers ON  `offers`.`merchantId` =  `merchant`.`merchantId` WHERE  `merchant`.`status` =  '1' limit " . $id . ",5");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findsearchOffers($keyword) {
        $this->db->select('*');
        $this->db->where('status', '1');
        $this->db->like('name', $keyword, 'both');
        $query = $this->db->get('offers');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function recommendationMsg() {
        $uid = $this->session->userdata('user_id');

        $que1 = $this->db->select('*')->where('userId', $uid)->where('merchantId', $_POST['merchantId'])->get('recommendation');
        $dt1 = $que1->result();
        //echo (count($dt1));
        /* if(!count($dt1)){
          $datared['note']='Salon Recommdation';
          $datared['userid']=$this->session->userdata('user_id');
          $datared['date']=date("d F Y");
          $datared['point']=50;
          $vals=$this->usermodel->insert_data('reward_user',$datared);
          if($vals)
          {
          $que=$this->db->select_sum('point','point')->where('userid',$datared['userid'])->get('reward_user');
          $dt=$que->result();
          if($dt[0]->point){
          $dataid['id']=$this->session->userdata('user_id');
          $dataimsg['reward']=$dt[0]->point;
          $re=$this->usermodel->updatedata($dataid,$dataimsg,'users');
          }
          }} */
        $array = array(
            'userId' => $uid,
            'message' => $_POST['message'],
            'merchantId' => $_POST['merchantId']
        );
        $rst = $this->db->insert('recommendation', $array);


        return 1;
    }

    function recommendationList($merchantId) {
        $this->db->select('*');
        $this->db->where('status', '1');
        $this->db->where('merchantId', $merchantId);
        $query = $this->db->get('recommendation');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findDetailsOfUser($userId) {
        $this->db->select('*');
        $this->db->where('userid', $userId);
        $query = $this->db->get('customer');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findDetailsOfsalon($userId) {
        $this->db->select('*');
        $this->db->where('merchantId', $userId);
        $query = $this->db->get('merchant');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function saveCustomerRecord() {
        $add = array(
            'fullname' => $_POST['fullName'],
            'howHandle' => $_POST['howHandle'],
            'gender' => $_POST['gender'],
            'location' => $_POST['state'] . ' ' . $_POST['locatestate'],
            'area' => $_POST['state'],
            'state' => $_POST['locatestate'],
            'language' => $_POST['language'],
            'DOB' => $_POST['dateOfBirth'],
            'yourself' => $_POST['yourSelf'],
            'website' => $_POST['website'],
            'mobile' => $_POST['mobileNo'],
            'interest' => implode(",", $_POST['a'])
        );

        if (!empty($_FILES['picture'])) {
            $size = $_FILES['picture']['size'];
            if ($size < "11263") {
                $this->db->select('photo');
                $this->db->where('userId', $this->session->userdata('user_id'));
                $query = $this->db->get('customer');
                $data = $query->result_array();
                $add['photo'] = $data[0]['photo'];
            } else {

                $config['upload_path'] = './assets/images/merchant/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                is_dir($config['upload_path']);
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('picture')) {
                    $this->upload->display_errors();
                }
                $data = $this->upload->data();
                $add['photo'] = $data['raw_name'] . $data['file_ext'];
            }
        }
        $this->db->where('userId', $this->session->userdata('user_id'));
        $this->db->update('customer', $add);
        $result = $this->db->affected_rows();

        $merchantarra['fullName'] = $_POST['fullName'];
        $this->db->where('id', $this->session->userdata('user_id'));
        if ($this->db->update('users', $merchantarra)) {
            $this->session->set_userdata('fullName', $_POST['fullName']);
            return true;
        } else {
            return false;
        }

        return $result;
    }

    function creditcardinformation() {
        $data = array('userId' => $this->session->userdata('user_id'), 'nameOnCard' => $_POST['cardName'], 'cardNo' => $_POST['cardNo'], 'CW' => $_POST['cw'], 'expiration' => ($_POST['expmonth'] . '-' . $_POST['expyear']), 'firstName' => $_POST['firstName'], 'lastName' => $_POST['lastName'], 'address' => $_POST['address'], 'aptFiSuite' => $_POST['aptFiSuite'], 'city' => $_POST['city'], 'state' => $_POST['state'], 'zip' => $_POST['zipcode']);
        $this->db->select('userId');
        $this->db->where('cardNo', $_POST['cardNo']);
        $query = $this->db->get('creditcard');
        $getno = $query->num_rows();
        if ($getno) {
            $this->db->where('cardNo', $_POST['cardNo']);
            $this->db->update('creditcard', $data);
        } else {

            $this->db->insert('creditcard', $data);
        }
        return true;
    }

    function myCard() {
        $this->db->select('cardNo');
        $this->db->where('userId', $this->session->userdata('user_id'));
        $query = $this->db->get('creditcard');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function getCardByNo($cardno) {
        $this->db->select('*');
        $this->db->where('cardNo', $cardno);
        $query = $this->db->get('creditcard');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function getMerchantImage($limit, $start) {
        $this->db->select('*');
        $this->db->limit($limit, $start);
        $this->db->where('photoOf', 'w');
        $this->db->order_by('createdOn', 'desc');
        $query = $this->db->get('lookbook');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function getcustomerImageall($limit, $start) {
        $this->db->select('*');
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('lookbook_customer');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function getimagebycustid($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('lookbook_customer');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function getimagebymurid($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('lookbook_customer');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function getnextimage($id, $cat) {
        $this->db->select('id, description');
        $this->db->where('id >', $id);
        $this->db->where('categorypic', $cat);
        $this->db->limit(1);
        $this->db->order_by('id', 'Asc');
        $query = $this->db->get('lookbook_customer');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function getnextimageloop($cat) {
        $this->db->select('id, description');
        $this->db->where('categorypic', $cat);
        $this->db->limit(1);
        $this->db->order_by('id', 'Asc');
        $query = $this->db->get('lookbook_customer');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function getpreviousimage($id, $cat) {
        $this->db->select('id');
        $this->db->where('id <', $id);
        $this->db->where('categorypic', $cat);
        $this->db->limit(1);
        $this->db->order_by('id', 'Desc');
        $query = $this->db->get('lookbook_customer');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function saveInviteFormation() {
        $add = array(
            'userId' => $this->session->userdata('user_id'),
            'name' => $_POST['nameCustomer'],
            'merchantName' => $_POST['nameSalon'],
            'mobileNo' => $_POST['mobileNo'],
            'emailId' => $_POST['emailId'],
            'message' => $_POST['message'],
            'status' => '1'
        );
        $this->db->insert('invite', $add);
        return 1;
    }

    function AllmerchantList() {
        $this->db->where('status', '1');
        $query = $this->db->get('merchant');
        return($query->result());
    }

    function findemailOfMerchant($id) {
        $array = array(
            'activated' => '1',
            'id' => $id
        );
        $this->db->select('email');
        $this->db->where($array);
        $query = $this->db->get('users');
        return($query->result());
    }

    function addWhishList() {
        $this->db->select('*');
        $this->db->where('userId', $this->session->userdata('user_id'));
        $this->db->where('merchantId', $_POST['merchantId']);
        $query = $this->db->get('wishList');
        if ($query->num_rows() > 0) {
            return false;
        } else {
            $array = array(
                'userId' => $this->session->userdata('user_id'),
                'merchantId' => $_POST['merchantId']
            );
            $this->db->insert('wishList', $array);
            return 1;
        }
    }

    function remWhishList() {
        $this->db->select('*');
        $this->db->where('userId', $this->session->userdata('user_id'));
        $this->db->where('merchantId', $_POST['merchantId']);
        $query = $this->db->get('wishList');
        if ($query->num_rows() == 0) {
            return false;
        } else {
            $array = array(
                'userId' => $this->session->userdata('user_id'),
                'merchantId' => $_POST['merchantId']
            );
            $this->db->delete('wishList', $array);
            return 1;
        }
    }

    function findWishList($merchantId) {
        $array = array(
            'merchantId' => $merchantId,
            'status' => '1'
        );
        $this->db->select('*');
        $this->db->distinct('userId');
        $this->db->where($array);
        $this->db->group_by('userId');
        $query = $this->db->get('wishList');
        return ($query->result());
    }

    function findServiceByCustomer($serviceId) {
        $this->db->select('serviceName');
        $this->db->where('id', $serviceId);
        $this->db->where('status', '1');
        $query = $this->db->get('services');
        $data = $query->result_array();
        return($data) ? $data[0]['serviceName'] : false;
    }

    function findEmployeById($serviceId) {
        $this->db->select('userName');
        $this->db->where('id', $serviceId);
        $query = $this->db->get('users');
        $data = $query->result_array();
        return($data) ? $data[0]['userName'] : false;
    }

    function getWishlist() {
        $this->db->select('*');
        $this->db->where('userId', $this->session->userdata('user_id'));
        $query = $this->db->get('wishList');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function getWishlistuser($id) {
        $this->db->select('*');
        $this->db->where('userId', $id);
        $query = $this->db->get('wishList');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function getWishListByUser($mid, $uid) {
        $this->db->select('*');
        $this->db->where('userId', $uid);
        $this->db->where('merchantId', $mid);
        $query = $this->db->get('wishList');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findMerchantByIdInWishlist($id) {
        $this->db->select('salonName');
        $this->db->where('status', '1');
        $this->db->where('merchantId', $id);
        $query = $this->db->get('merchant');
        $data = $query->result_array();
        return($data) ? $data[0]['salonName'] : false;
    }

    function findMerchantPhotoById($id) {
        $this->db->select('photo');
        $this->db->where('status', '1');
        $this->db->where('merchantId', $id);
        $query = $this->db->get('merchant');
        $data = $query->result_array();
        return($data) ? $data[0]['photo'] : false;
    }

    function getAppointment() {
        $curdate = date('Y-m-d');
        $this->db->select('*');
        $this->db->where('userId', $this->session->userdata('user_id'));
        $this->db->where('status', "1");
        $this->db->where('appointDate >=', $curdate);
        $query = $this->db->get('appointment');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function countOffer() {
        $count = $this->db->count_all('offers');
        return $count;
    }

    public function fetch_offer($limit, $start) {
        $curdate = date('Y-m-d');
        $this->db->limit($limit, $start);
        $this->db->where('status', '1');
        $this->db->where('expdate >=', $curdate);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get("offers");
        $data = $query->result_array();
        //echo $this->db->last_query();
        return($data) ? $data : false;
    }

    public function fetch_Selected_offer($limit, $start, $offerName) {
        $curdate = date('Y-m-d');
        $this->db->limit($limit, $start);
        $this->db->where('status', '1');
        $this->db->where('expdate >=', $curdate);
        $this->db->like('name', $offerName, 'both');
        $query = $this->db->get("offers");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function getsessiondata() {
        //echo $_POST['value'];
        $sessionval = $this->session->set_userdata('val', $_POST['value']);
        return 1;
    }

    function checkLogin() {
        $this->db->select('id,business,userLevel');
        $this->db->where('id', $this->session->userdata('user_id'));
        $this->db->where('activated', "1");
        $query = $this->db->get('users');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function seeLookupalbum($data) {
        $this->db->select('id');
        if ($data[0]['userLevel'] == 4) {

            $this->db->where('userId', $this->session->userdata('user_id'));
        } else {
            $this->db->where('merchantId', $this->session->userdata('user_id'));
        }
        $this->db->where('status', "1");
        $query = $this->db->get('lookupalbum');
        $status = $query->result_array();
        return($status) ? $status : false;
    }

    function seeLookupalbumwith($data) {
        $this->db->select('id');
        if ($data == 4) {

            $this->db->where('userId', $this->session->userdata('user_id'));
        } else {
            $this->db->where('merchantId', $this->session->userdata('user_id'));
        }
        $this->db->where('status', "1");
        $query = $this->db->get('lookupalbum');
        $status = $query->result_array();
        return($status) ? $status : false;
    }

    function addToLookbook($data) {
        $element = array('status' => "1");
        if ($data[0]['userLevel'] == 4) {
            $element['userId'] = $this->session->userdata('user_id');
        } else {
            $element['merchantId'] = $this->session->userdata('user_id');
        }

        $this->db->insert('lookupalbum', $element);
    }

    function checkExistImage() {
        $this->db->select('id');
        //$this->db->where('userId',$this->session->userdata('user_id'));
        $this->db->where('photo', $_POST['pname']);
        $query = $this->db->get('lookbook');
        $data = $query->result_array();
        return($data) ? $data[0]['id'] : false;
    }

    function addLookbook($data, $photoId) {
        $this->db->select('id');
        if ($data[0]['userLevel'] == 4) {

            $this->db->where('userId', $this->session->userdata('user_id'));
        } else {
            $this->db->where('merchantId', $this->session->userdata('user_id'));
        }
        $this->db->where('status', "1");
        $query = $this->db->get('lookupalbum');
        $status = $query->result_array();
        $albumId = $status[0]['id'];

        $check = $this->checkExistence($albumId, $photoId);
        if ($check > 0) {
            return false;
        } else {
            $element = array('status' => "1", 'albumId' => $albumId, 'photoId' => $photoId);
            $element['userId'] = $this->session->userdata('user_id');
            $this->db->insert('lookUpLike', $element);
            return true;
        }
    }

    function checkExistence($albumId, $photoId) {
        $this->db->select('id');
        $this->db->where('albumId', $albumId);
        $this->db->where('photoId', $photoId);
        $query = $this->db->get('lookUpLike');
        $data = $query->result_array();
        return($data) ? $data[0]['id'] : false;
    }

    function reverseAuctionInsert() {
        if ($_POST['lastInsertId'] > 0) {
            $this->db->set('request', $_POST['request']);
            $this->db->set('location', $_POST['location']);
            $this->db->set('minBudget', $_POST['minBudget']);
            $this->db->set('maxBudget', $_POST['maxBudget']);
            $this->db->set('dateOfService', date("Y-m-d", strtotime($_POST['dateOfService'])));
            $this->db->set('noOfPeople', $_POST['noOfPeople']);
            $this->db->where('id', $_POST['lastInsertId']);
            $this->db->update('reverseauction');
            $data = $this->db->affected_rows();
            return($data) ? $_POST['lastInsertId'] : $_POST['lastInsertId'];
        } else {
            $auction = array(
                'userId' => $this->session->userdata('user_id'),
                'request' => $_POST['request'],
                'category' => $_POST['category'],
                'location' => $_POST['location'],
                'minBudget' => $_POST['minBudget'],
                'maxBudget' => $_POST['maxBudget'],
                'dateOfService' => date("Y-m-d", strtotime($_POST['dateOfService'])),
                'noOfPeople' => $_POST['noOfPeople'],
                'note' => $_POST['note']
            );
            $this->db->insert('reverseauction', $auction);
            return $this->db->insert_id();
        }
    }

    function reverseAuctionDetail() {
        $this->db->select('*');
        $this->db->where('status', '1');
        $query = $this->db->get('reverseauction');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function getOnlyMerchantImage($id) {
        $this->db->select('*');
        $this->db->where('status', '1');
        // if($this->session->userdata('user_level')=='1')
        // $this->db->where('merchantId',$id);
        // else
        $this->db->where('merchantId', $id);
        $this->db->where('photoOf', 'p');
        $query = $this->db->get('lookbook');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function getOnlycustomerImage($id) {
        $this->db->select('photo');
        $this->db->where('status', '1');
        // if($this->session->userdata('user_level')=='1')
        // $this->db->where('merchantId',$id);
        // else
        $this->db->where('user_Id', $id);
        $query = $this->db->get('lookbook_customer');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function bidMerchantService() {
        $this->db->select('*');
        $this->db->where('reverseAuctionId', $_POST['reverseid']);
        $this->db->where('merchantId', $this->session->userdata('user_id'));
        $query = $this->db->get('merchant_biding');
        $biding = array(
            'merchantId' => $this->session->userdata('user_id'),
            'contactName' => $_POST['contactName'],
            'bamt' => $_POST['bid'],
            'note' => $_POST['note'],
            'reverseAuctionId' => $_POST['reverseid']
        );
        if ($query->num_rows() > 0) {
            $this->db->where('reverseAuctionId', $_POST['reverseid']);
            $this->db->where('merchantId', $this->session->userdata('user_id'));
            $this->db->update('merchant_biding', $biding);
        } else {

            $this->db->insert('merchant_biding', $biding);
        }
        return true;
    }

    function checkuserbyname($name) {
        $this->db->select('*');
        $this->db->where('username', $name);
        $this->db->where('userLevel', '4');
        $query = $this->db->get('users');
        $data = $query->result_array();
        return($data) ? false : true;
    }

    function reverseAuctionDetailById() {
        $this->db->select('*');
        $this->db->where('id', $_POST['reverseid']);
        $query = $this->db->get('reverseauction');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function checkuser() {
        $this->db->select('*');
        $this->db->where('id', $_POST['id']);
        $this->db->where('userLevel', '2');
        $query = $this->db->get('users');
        $data = $query->result_array();
        return($data) ? true : false;
    }

    function checkMerchant() {
        $this->db->select('*');
        $this->db->where('id', $_POST['id']);
        $this->db->where('userLevel', '2');
        $query = $this->db->get('users');
        $data = $query->result_array();
        return($data) ? true : false;
    }

    function bidcount() {
        $this->db->select('COUNT(*)');
        $this->db->where('reverseAuctionId', $_POST['id']);
        $query = $this->db->get('merchant_biding');
        $data = $query->result_array();
        return($data) ? $data[0]['COUNT(*)'] : false;
    }

    function getCategory() {
        $this->db->select('*');
        $this->db->where('status', '1');
        $query = $this->db->get('businessCategory');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function avgbid() {
        $this->db->select_avg('bamt');
        $this->db->where('reverseAuctionId', $_POST['id']);
        $query = $this->db->get('merchant_biding');
        $data = $query->result_array();
        return($data) ? $data[0]['bamt'] : false;
    }

    function budget() {
        $this->db->select('*');
        $this->db->where('id', $_POST['userid']);
        $this->db->where('status', '1');
        $query = $this->db->get('reverseauction');
        $data = $query->result_array();
        $budget = $data[0]['minBudget'] . '-' . $data[0]['maxBudget'];
        return($data) ? $budget : false;
    }

    function getBidingInformation() {
        $this->db->select('*');
        $this->db->where('merchantId', $this->session->userdata('user_id'));
        $query = $this->db->get('merchant_biding');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findServiceNamebyId($id) {
        $this->db->select('serviceName');
        $this->db->where('id', $id);
        $query = $this->db->get('services');
        $data = $query->result_array();
        return($data) ? $data[0]['serviceName'] : false;
    }

    function getcustomerImage($userid) {
        $this->db->select('*');
        $this->db->where('merchantId', $userid);
        $query = $this->db->get('lookbook');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findOfferFindByOfferId($offerId) {
        $this->db->select('*');
        $this->db->where('id', $offerId);
        $this->db->where('status', '1');
        $query = $this->db->get('offers');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findMerchantNameByAuctionId() {
        $this->db->select('request');
        $this->db->where('id', $_POST['id']);
        $query = $this->db->get('reverseauction');
        $data = $query->result_array();
        return($data) ? $data[0]['request'] : false;
    }

    function popupbid() {
        $this->db->select('contactName,bamt,note');
        $this->db->where('reverseAuctionId', $_POST['id']);
        $query = $this->db->get('merchant_biding');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function getMerchantWorkingPhoto($id) {
        $this->db->select('*');
        $this->db->where('merchantId', $id);
        $this->db->where('photoOf', 'w');
        $query = $this->db->get('lookbook');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function getMerchantratecart($id) {
        $this->db->select('*');
        $this->db->where('merchantId', $id);
        $this->db->where('photoOf', 'r');
        $query = $this->db->get('lookbook');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function getLoginName($userName) {

        $this->db->select('firstName,lastName');
        $this->db->where('username', $userName);
        $query = $this->db->get('users');
        $data = $query->result_array();
        $name = $data[0]['firstName'] . ' ' . $data[0]['lastName'];
        return($data) ? $name : false;
    }

    function getLoginimage($userName) {

        $this->db->select('photo');
        $this->db->where('userid', $userName);
        $query = $this->db->get('customer');
        $data = $query->result_array();
        $name = $data[0]['photo'];
        return($data) ? $name : 'usericon.jpg';
    }

    function cancel_Appointment() {
        $this->db->set('status', '0');
        $this->db->where('id', $_POST['id']);
        $this->db->update('appointment');
        return true;
    }

    function deleteFromWishlist() {
        $this->db->where('id', $_POST['id']);
        $this->db->delete('wishList');
        return true;
    }

    function getCommentByBlogId() {
        $this->db->select('userId,commentText,createdOn');
        $this->db->where('blogId', $_POST['blogid']);
        $this->db->order_by('id', 'desc');
        $this->db->limit(3);
        $query = $this->db->get('comments');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findCustomerNameById($userId) {
        $this->db->select('fullname,photo');
        // $this->db->where('status','1');
        $this->db->where('userId', $userId);
        $query = $this->db->get('customer');
        $data = $query->result_array();
        //return($data)?$data[0]['fullname']:false;
        return($data) ? $data : false;
    }

    function merchantEmail($id) {
        $this->db->select('email');
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        $data = $query->result_array();
        return($data) ? $data[0]['email'] : false;
    }

    function getRecomdationById($merchantId) {
        $this->db->select('COUNT(*)');
        $this->db->where('merchantId', $merchantId);
        $query = $this->db->get('recommendation');
        $data = $query->result_array();
        return($data) ? $data[0]['COUNT(*)'] : false;
    }

    function getHomeImage() {
        $this->db->select('photo');
        $this->db->where('photoOf', 'w');
        /* $this->db->where('userId','0'); */
        $this->db->limit(12);
        $query = $this->db->get('lookbook');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function AutoCompleteMerchantLocation() {
        $this->db->select('location');
        $query = $this->db->get('merchant');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function getCommentByMerchantId() {
        $this->db->select('*');
        $this->db->where('blogId', $_POST['blogid']);
        $this->db->order_by('id', 'desc');
        $this->db->limit(5);
        $query = $this->db->get('comments');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function checkCommentById($id) {
        $this->db->select('COUNT(*)');
        $this->db->where('blogId', $id);
        $query = $this->db->get('comments');
        $data = $query->result_array();
        return($data) ? $data[0]['COUNT(*)'] : false;
    }

    function request() {
        $this->db->select('request');
        $this->db->distinct();
        $this->db->where('status', '1');
        $query = $this->db->get('reverseauction');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function location() {
        $this->db->select('location');
        $this->db->distinct();
        $this->db->where('status', '1');
        $query = $this->db->get('reverseauction');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findEmpname($userId) {
        $this->db->select('*');
        $this->db->where('user_id', $userId);
        $query = $this->db->get('user_profiles');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function getBlogCategoryDetail() {
        $this->db->select('businessCategory');
        $this->db->distinct();
        $this->db->where('status', '1');
        $query = $this->db->get('blog');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function place() {
        $query = $this->db->query("select distinct(location) from merchant");
        //$query=$this->db->query("select distinct(name) from area union select distinct(cityName) from city");
        //$this->db->select('location');
        //$this->db->distinct();
        //$this->db->where('status','1');
        //$query=$this->db->get('merchant');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function service() {
        $this->db->select('serviceName');
        $this->db->distinct();
        $this->db->where('status', '1');
        $query = $this->db->get('services');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findAllMerchantByService($service) {
        $salonname = rawurldecode($service);
        $merchantAllService = $this->serviceAllBySearch(rawurldecode($service));
        if ($merchantAllService) {
            $query = $this->db->query("SELECT merchant . *
					FROM merchant
					WHERE merchant.status='1' AND merchant.merchantId IN($merchantAllService)
					GROUP BY merchant.merchantId
					");
        } else {
            $query = $this->db->query("SELECT merchant . *
					FROM merchant
					WHERE merchant.status='1' AND merchant.salonName='$salonname'
					GROUP BY merchant.merchantId
					");
        }
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function serviceAndLocation($service, $location, $start, $cnt) {
        $aquery = '';
        $cquery = '';
        $locate = rawurldecode($location);
        $servic = rawurldecode($service);
        /* if (strpos($servic,'and') !== false) {
          $servic=split('and', $servic);
          $servic=array_map('trim',$servic);
          }
          else{

          $servic=split('[- &_,.]', $servic);
          }

          $this->db->select('id');
          $this->db->from('area');
          $this->db->like('name',$locate);
          $resmid=$this->db->get();
          $rmid=$resmid->result_array();
          //echo($this->db->last_query().'<br>');
          $aid='';
          if(count($rmid)==NULL)
          {

          $this->db->select('merchantId');
          $this->db->from('merchant');
          $this->db->like('address',$locate);
          $mids=$this->db->get();
          $midss=$mids->result_array();

          foreach($midss as $value)
          {
          //print_r($value['merchantId']);
          $merchantsnew=$merchants.$value['merchantId'].",";
          $sss=rtrim($merchantsnew,',');
          }
          if(!empty($sss))
          {
          $new=",".$sss;
          }
          }
          else{
          foreach($rmid as $m)
          {
          $aid.=$m['id'].',';
          }
          $aid=rtrim($aid,',');
          if(!empty($aid))
          {
          $aquery="and merchant.area in($aid)";
          }
          }
          $this->db->select('id');
          $this->db->from('city');
          $this->db->like('cityName',$locate);
          $resmid=$this->db->get();
          $rmid=$resmid->result_array();
          //echo($this->db->last_query().'<br>');
          $cid='';
          foreach($rmid as $m)
          {
          $cid.=$m['id'].',';
          }
          $cid=rtrim($cid,',');
          if(!empty($cid))
          {
          $cquery="and merchant.city in($cid)";
          }
          $merchantAllService=$this->serviceAllBySearch(rawurldecode($service));
          $merchantAllService1=$this->serviceAllByname(rawurldecode($service));
          //echo($this->db->last_query().'<br>');
          //echo $aquery.$cquery;
          if(($aquery=='')||($cquery==''))
          {
          $salonName=rawurldecode($location);
          }

          //print_r($merchantAllService);print_r($aid);print_r($cid);exit;
          if($merchantAllService)
          {
          $query=$this->db->query("SELECT merchant . * , MAX(userReview.rating ) AS maxrating
          FROM merchant
          LEFT JOIN userReview ON userReview.merchantId = merchant.merchantId
          WHERE merchant.status='1' AND (merchant.merchantId IN($merchantAllService,$merchantAllService1$new) $aquery )
          GROUP BY merchant.merchantId
          ORDER BY maxrating DESC");
          }
          else
          {
          $query=$this->db->query("SELECT merchant . * , MAX(userReview.rating ) AS maxrating
          FROM merchant
          LEFT JOIN userReview ON userReview.merchantId = merchant.merchantId
          WHERE merchant.status='1'
          $aquery AND (merchant.
          merchantId IN($merchantAllService1$new))
          GROUP BY merchant.merchantId
          ORDER BY maxrating DESC");
          }
          $data=$query->result_array();
         */
        //foreach($servic as $sr){
        $a = " ding.serviceName LIKE '%" . $servic . "%' or ding.keywords LIKE '%" . $servic . "%' or mrch.salonName LIKE '%" . $servic . "%' ";
        //$i++;
        //}
        //$ps=implode("or",(array_unique($a)));

        $this->db->select('mrch.*');
        $this->db->limit($cnt, $start);
        $this->db->from('merchant AS mrch, services AS ding');
        $this->db->join('services', 'mrch.merchantId = ding.merchantId');
        $this->db->where('ding.status', '1');
        $this->db->where('mrch.status', '1');
        $this->db->where("($a)");
        $this->db->where("(mrch.address LIKE '%$locate%' or mrch.location LIKE '%$locate%')");
        $this->db->group_by('mrch.merchantId');
        $query = $this->db->get();
        $data = $query->result_array();
        //echo($this->db->last_query().'<br>');
        return($data) ? $data : false;
    }

    function serviceAllByname($service) {
        $this->db->select('merchantId');
        $this->db->like('salonName', $service, 'both');
        $this->db->where('status', '1');
        $query = $this->db->get('merchant');
        $data = $query->result_array();

        $merchants = '';

        foreach ($data as $value) {
            $merchants = $merchants . $value['merchantId'] . ",";
        }
        $merchantAllService = rtrim($merchants, ",");

        return($merchantAllService) ? $merchantAllService : 0;
    }

    function serviceAllBySearch($service) {
        $this->db->select('merchantId');
        $this->db->like('serviceName', $service, 'both');
        $this->db->or_like('keywords', $service, 'both');
        $this->db->where('status', '1');
        $query = $this->db->get('services');
        $data = $query->result_array();

        $merchants = '';

        foreach ($data as $value) {
            $merchants = $merchants . $value['merchantId'] . ",";
        }
        $merchantAllService = rtrim($merchants, ",");

        return($merchantAllService) ? $merchantAllService : 0;
    }

    function findRecommendationById($id) {
        $this->db->select('COUNT(*)');
        $this->db->where('merchantId', $id);
        $query = $this->db->get('recommendation');
        $data = $query->result_array();
        return($data) ? $data[0]['COUNT(*)'] : false;
    }

    function findRecommendationOfMerchant($merchantId) {
        $this->db->select('COUNT(*)');
        $this->db->where('merchantId', $merchantId);
        $query = $this->db->get('recommendation');
        $data = $query->result_array();
        return($data) ? $data[0]['COUNT(*)'] : false;
    }

    function findreviewcount($merchantId) {
        $this->db->select('COUNT(*)');
        $this->db->where('status', '1');
        $this->db->where('merchantId', $merchantId);
        $query = $this->db->get('review');
        $data = $query->result_array();
        return($data) ? $data[0]['COUNT(*)'] : false;
    }

    function findreview($merchantId) {
        $this->db->select('*');
        $this->db->where('status', '1');
        $this->db->where('merchantId', $merchantId);
        $query = $this->db->get('review');
        $data = $query->result_array();
        return($data);
    }

    function findreviewuser($merchantId) {
        $this->db->select('*');
        $this->db->where('status', '1');
        $this->db->where('userId', $merchantId);
        $this->db->order_by('createdOn', 'DESC');
        $query = $this->db->get('review');
        $data = $query->result_array();
        return($data);
    }

    function findquesuser($merchantId) {
        $this->db->select('*');
        $this->db->where('status', '1');
        $this->db->where('user_id', $merchantId);
        $this->db->order_by('createdOn', 'DESC');
        $query = $this->db->get('question');
        $data = $query->result_array();
        return($data);
    }

    function state() {
        $this->db->select('area');
        $this->db->distinct();
        $this->db->where('status', '1');
        $query = $this->db->get('customer');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function FindMerchantReviewById($id) {
        $this->db->select('*');
        $this->db->where('status', '1');
        $this->db->where('merchantId', $id);
        $this->db->order_by('id', 'desc');
        $this->db->limit(3);
        $query = $this->db->get('review');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function postReview() {
        $uid = $this->session->userdata('user_id');

        $que1 = $this->db->select('*')->where('userId', $uid)->where('merchantId', $_POST['merchantReviewId'])->get('review');
        $dt1 = $que1->result();
        //echo (count($dt1));
        if (!count($dt1)) {
            $datared['note'] = 'Salon Review';
            $datared['userid'] = $this->session->userdata('user_id');
            $datared['date'] = date("d F Y");
            $datared['point'] = 100;
            $vals = $this->usermodel->insert_data('reward_user', $datared);
            if ($vals) {
                $que = $this->db->select_sum('point', 'point')->where('userid', $datared['userid'])->get('reward_user');
                $dt = $que->result();
                if ($dt[0]->point) {
                    $dataid['id'] = $this->session->userdata('user_id');
                    $dataimsg['reward'] = $dt[0]->point;
                    $re = $this->usermodel->updatedata($dataid, $dataimsg, 'users');
                }
            }
        }

        $add = array('userId' => $this->session->userdata('user_id'), 'merchantId' => $_POST['merchantReviewId'], 'review' => $_POST['commentText'], 'status' => '1');
        $this->db->insert('review', $add);
        return true;
    }

    function findMerchantSalonNameById($id) {
        $this->db->select('salonName');
        $this->db->where('merchantId', $id);
        $query = $this->db->get('merchant');
        $data = $query->result_array();
        return($data) ? $data[0]['salonName'] : false;
    }

    function findRecordByPricelocation($locate, $pricevalue) {
        $location = rawurldecode($locate);
        if ($pricevalue == '0') {
            $query = $this->db->query("SELECT merchant . * , MAX(userReview.rating ) AS maxrating
        FROM merchant
        LEFT JOIN userReview ON userReview.merchantId = merchant.merchantId
        WHERE merchant.address LIKE '%$location%' AND merchant.status='1'
        GROUP BY merchant.merchantId
        ORDER BY maxrating DESC");
        } else {
            $query = $this->db->query("SELECT merchant . * , MAX(userReview.rating ) AS maxrating
        FROM merchant
        LEFT JOIN userReview ON userReview.merchantId = merchant.merchantId
        WHERE merchant.priceCheck = '$pricevalue' AND merchant.address LIKE '%$location%' AND merchant.status='1'
        GROUP BY merchant.merchantId
        ORDER BY maxrating DESC");
        }
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findAllRecordByPricevalue($pricevalue) {
        if ($pricevalue == '0') {
            $query = $this->db->query("SELECT merchant . * , MAX(userReview.rating ) AS maxrating
        FROM merchant
        LEFT JOIN userReview ON userReview.merchantId = merchant.merchantId
        WHERE merchant.status='1'
        GROUP BY merchant.merchantId
        ORDER BY maxrating DESC");
        } else {
            $query = $this->db->query("SELECT merchant . * , MAX(userReview.rating ) AS maxrating
        FROM merchant
        LEFT JOIN userReview ON userReview.merchantId = merchant.merchantId
        WHERE merchant.priceCheck = '$pricevalue' AND merchant.status='1'
        GROUP BY merchant.merchantId
        ORDER BY maxrating DESC");
        }
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findRecordByPriceService($service, $pricevalue) {
        if ($pricevalue == '0') {
            $query = $this->db->query("SELECT merchant . * , MAX(userReview.rating ) AS maxrating
        FROM merchant
        LEFT JOIN userReview ON userReview.merchantId = merchant.merchantId LEFT JOIN services ON services.merchantId = merchant.merchantId
        WHERE services.serviceName LIKE '%$service%' AND merchant.status='1'
        GROUP BY merchant.merchantId
        ORDER BY maxrating DESC");
        } else {
            $query = $this->db->query("SELECT merchant . * , MAX(userReview.rating ) AS maxrating
        FROM merchant
        LEFT JOIN userReview ON userReview.merchantId = merchant.merchantId LEFT JOIN services ON services.merchantId = merchant.merchantId
        WHERE merchant.priceCheck = '$pricevalue' AND services.serviceName LIKE '%$service%' AND merchant.status='1'
        GROUP BY merchant.merchantId
        ORDER BY maxrating DESC");
        }
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findRecordByPriceLocationService($locate, $srvice, $pricevalue) {
        $location = rawurldecode($locate);
        $service = rawurldecode($srvice);
        if ($pricevalue == '0') {
            $query = $this->db->query("SELECT merchant . * , MAX(userReview.rating ) AS maxrating
        FROM merchant
        LEFT JOIN userReview ON userReview.merchantId = merchant.merchantId LEFT JOIN services ON services.merchantId = merchant.merchantId
        WHERE services.serviceName LIKE '%$service%' AND merchant.location LIKE '%$location%' AND merchant.status='1'
        GROUP BY merchant.merchantId
        ORDER BY maxrating DESC");
        } else {
            $query = $this->db->query("SELECT merchant . * , MAX(userReview.rating ) AS maxrating
        FROM merchant
        LEFT JOIN userReview ON userReview.merchantId = merchant.merchantId LEFT JOIN services ON services.merchantId = merchant.merchantId
        WHERE merchant.priceCheck = '$pricevalue' AND services.serviceName LIKE '%$service%' AND merchant.location LIKE '%$location%' AND merchant.status='1'
        GROUP BY merchant.merchantId
        ORDER BY maxrating DESC");
        }
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function countSelectedoffers($id) {
        $query = $this->db->query("select count(*) as cnt from offers where merchantId in(select merchantId from merchant where area in(select id from area where name like '%$id%')) or merchantId in(select merchantId from merchant where city in(select id from city where cityName like '%$id%')) or name like '%$id%'");
        //$this->db->select('COUNT(*)');
        //$this->db->like('name',$id);
        //$query=$this->db->get('offers');
        $data = $query->result_array();
        return($data) ? $data[0]['cnt'] : false;
    }

    public function fetchSelectedoffers($limit, $start, $name) {
        $query = $this->db->query("select * from offers where merchantId in(select merchantId from merchant where area in(select id from area where name like '%$name%')) or merchantId in(select merchantId from merchant where city in(select id from city where cityName like '%$name%')) or name like '%$name%' limit $start,$limit");

        //$this->db->limit($limit, $start);
        //$this->db->where('status','1');
        //$this->db->like('name',$name);
        //$this->db->or_where_in('merchantId',$mid);
        //$query = $this->db->get("offers");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findofferAllSearch() {
        $this->db->select('name');
        $this->db->where('status', '1');
        $this->db->distinct();
        $query = $this->db->get('offers');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findSelectedMostPopularMerchant($mostPopular) {
        $query = $this->db->query("SELECT merchant . * , MAX( rating ) AS maxrating
									FROM merchant
									LEFT JOIN userReview ON merchant.merchantId = userReview.merchantId
									where merchant.status='1' AND merchant.location LIKE '%$mostPopular%'
									GROUP BY merchantId
									ORDER BY maxrating DESC");
        $data = $query->result_array();
        if (!$data) {
            $query = $this->db->query("SELECT merchant . * , MAX( rating ) AS maxrating
									FROM merchant
									LEFT JOIN userReview ON merchant.merchantId = userReview.merchantId LEFT JOIN services ON merchant.merchantId = services.merchantId
									where merchant.status='1' AND services.serviceName LIKE '%$mostPopular%'
									GROUP BY merchantId
									ORDER BY maxrating DESC");
            $data = $query->result_array();
        }
        return($data) ? $data : false;
    }

    function getAllstate() {
        $this->db->select('stateName');
        $this->db->distinct();
        $this->db->where('status', '1');
        $query = $this->db->get('state');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function getAllcity() {
        $this->db->select('cityName');
        $this->db->distinct();
        $this->db->where('status', '1');
        $query = $this->db->get('city');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function alllocate() {
        $this->db->select('name');
        $this->db->distinct();
        $this->db->where('status', '1');
        $this->db->group_by('name');
        $query = $this->db->get('area');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function getInformationByImageId() {
        $this->db->select('description');
        $this->db->where('id', $_POST['id']);
        $query = $this->db->get('lookbook');
        $data = $query->result_array();
        return($data) ? $data[0]['description'] : false;
    }

    function myReview($id) {
        $this->db->select('*');
        $this->db->from('review');
        $this->db->where('userId', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function findLastInsertIdData() {
        $id = $_POST['id'];
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('reverseauction');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function deleteLastPostRequest() {
        $this->db->set('status', '0');
        $this->db->where('id', $_POST['id']);
        $this->db->update('reverseauction');
        $data = $this->db->affected_rows();
        return($data) ? true : false;
    }

    function findAllCategory() {
        $this->db->select('category');
        $this->db->distinct();
        $this->db->where('status', '1');
        $query = $this->db->get('businessCategory');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function getBlogData() {
        $this->db->select('*');
        $this->db->from('blog');
        $this->db->where('status', '1');
        $this->db->order_by('created', 'DESC');
        $this->db->limit(3);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function selectBusinessCategory() {
        $this->db->select('id,category');
        $this->db->where('status', '1');
        //if($this->session->userdata('user_level')!='1')
        //	$this->db->where('merchantId',$this->session->userdata('user_id'));
        $query = $this->db->get('businessCategory');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function LoginAndSignupByfacebook() {


        $facebook = array(
            'email' => $_POST['email'],
            'username' => $_POST['fbid'],
            'firstName' => $_POST['fname'],
            'lastName' => $_POST['lname'],
            'fullName' => $_POST['fname'] . ' ' . $_POST['lname'],
            'fbgmId' => $_POST['fbid'],
            'activated' => '1',
            'business' => 'C',
            'reward' => '100',
            'userLevel' => '4'
        );
        $this->db->set($facebook);
        $this->db->insert('users');


        $id = $this->db->insert_id();
        if ($id) {
            $rew['note'] = "SignUp (Registration) Reward";
            $rew['point'] = '100';
            $rew['userid'] = $id;
            $rew['date'] = date("d F Y");
            $quse = $this->db->insert('reward_user', $rew);
            //$dt=$quse->result();
        }
        $customer = array(
            'userId' => $id,
            'gender' => $_POST['gender'],
            'fullname' => $_POST['fname']
        );
        $this->db->set($customer);
        $this->db->insert('customer');

        $data['user_id'] = $id;
        $data['username'] = $_POST['fbid'];
        $data['user_level'] = 4;
        $data['fullName'] = $_POST['fname'] . ' ' . $_POST['lname'];
        $this->session->set_userdata($data);

        $profile = array(
            'user_id' => $id,
            'name' => $_POST['name']
        );
        $this->db->set($profile);
        $this->db->insert('user_profiles');
        return $id;
    }

    function LoginAndSignupByfacebookpartner() {


        $facebook = array(
            'email' => $_POST['email'],
            'username' => $_POST['fbid'],
            'firstName' => $_POST['fname'],
            'lastName' => $_POST['lname'],
            'fullName' => $_POST['fname'] . ' ' . $_POST['lname'],
            'fbgmId' => $_POST['fbid'],
            'activated' => '1',
            'business' => 'P',
            'userLevel' => '2'
        );
        $this->db->set($facebook);
        $this->db->insert('users');


        $id = $this->db->insert_id();
        $customer = array(
            'merchantId' => $id,
            'status' => '1',
            'name' => $_POST['fname']
        );
        $this->db->set($customer);
        $this->db->insert('merchant');

        $data['user_id'] = $id;
        $data['username'] = $_POST['fbid'];
        $data['user_level'] = 2;
        $data['fullName'] = $_POST['fname'] . ' ' . $_POST['lname'];
        $this->session->set_userdata($data);

        $profile = array(
            'user_id' => $id,
            'name' => $_POST['name']
        );
        $this->db->set($profile);
        $this->db->insert('user_profiles');
        return $id;
    }

    function LoginAndSignupBygooglepartner($user) {


        $facebook = array(
            'email' => $user['email'],
            'username' => $user['uid'],
            'firstName' => $user['first_name'],
            'lastName' => $user['last_name'],
            'fullName' => $user['name'],
            'fbgmId' => $user['uid'],
            'activated' => '1',
            'business' => 'P',
            'userLevel' => '2'
        );
        $this->db->set($facebook);
        $this->db->insert('users');
        $id = $this->db->insert_id();
        $merchantid = $this->userisMerchantOrNot($id);
        if ($merchantid[0]['id'] > 0) {
            $name = $merchantid[0]['firstName'] . ' ' . $merchantid[0]['lastName'];
            $add = array(
                'merchantId' => $merchantid[0]['id'],
                'name' => $name
            );
            $this->db->insert('merchant', $add);
        }

        $data['user_id'] = $id;
        $data['username'] = $user['uid'];
        $data['user_level'] = 2;
        $data['fullName'] = $user['name'];
        $this->session->set_userdata($data);

        $profile = array(
            'user_id' => $id,
            'name' => $user['name']
        );
        $this->db->set($profile);
        $this->db->insert('user_profiles');
        return $user['uid'];
    }

    function userisMerchantOrNot($id) {
        $this->db->select('id,firstName,lastName,userLevel');
        $this->db->where('id', $id);
        $this->db->where('business', 'P');
        $query = $this->db->get('users');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function LoginAndSignupBygoogle($user) {


        $facebook = array(
            'email' => $user['email'],
            'username' => $user['uid'],
            'firstName' => $user['first_name'],
            'lastName' => $user['last_name'],
            'fullName' => $user['name'],
            'fbgmId' => $user['uid'],
            'activated' => '1',
            'business' => 'C',
            'reward' => '100',
            'userLevel' => '4'
        );
        $this->db->set($facebook);
        $this->db->insert('users');


        $id = $this->db->insert_id();
        if ($id) {
            $rew['note'] = "SignUp (Registration) Reward";
            $rew['point'] = '100';
            $rew['userid'] = $id;
            $rew['date'] = date("d F Y");
            $quse = $this->db->insert('reward_user', $rew);
            //$dt=$quse->result();
        }
        $customer = array(
            'userId' => $id,
            'gender' => $user['gender'],
            'fullname' => $user['first_name']
        );
        $this->db->set($customer);
        $this->db->insert('customer');

        $data['user_id'] = $id;
        $data['username'] = $user['uid'];
        $data['user_level'] = 4;
        $data['fullName'] = $user['name'];
        $this->session->set_userdata($data);

        $profile = array(
            'user_id' => $id,
            'name' => $user['name']
        );
        $this->db->set($profile);
        $this->db->insert('user_profiles');
        return $user['uid'];
    }

    function new_blog($data) {
        if ($this->session->userdata('user_level') == 4) {
            $blog['userId'] = $this->session->userdata('user_id');
            $blog['merchantId'] = '0';
        }
        $blog['title'] = $data['title'];
        $blog['description'] = str_replace("\n", "<br />", $data['description']);
        $blog['businessCategory'] = $data['category'];
        // print_r($blog);
        // exit;
        if ($this->db->insert('blog', $blog)) {
            //upload image
            if ($_FILES['blog_picture']['size'] >= "10240") {
                $config['upload_path'] = './assets/images/demo/blog/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                is_dir($config['upload_path']);
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('blog_picture')) {
                    $this->upload->display_errors();
                }

                //upload image
                $blog_id = $this->db->insert_id();
                if ($blog_id) {
                    $arr['photo'] = $_FILES['blog_picture']['name'];
                    //$arr['level'] = "3";
                    $this->db->where('id', $blog_id);
                    $add_blog = $this->db->update('blog', $arr);
                }
            }
        }
        return true;
    }

    function checkIsCustomer() {
        $userid = $this->session->userdata('user_id');
        $this->db->select('id');
        $this->db->where('id', $userid);
        $this->db->where('userLevel', '4');
        $query = $this->db->get('users');
        $data = $query->result_array();
        return($data) ? $data[0]['id'] : 0;
    }

    function checkOfferExist($itemId, $itemType) {
        $userId = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->where('userId', $userId);
        $this->db->where('itemId', $itemId);
        $this->db->where('itemType', 'offer');
        $this->db->where('status', '1');
        $query = $this->db->get('orders');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function checkReverseBidExist($itemId, $itemType) {
        $userId = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->where('userId', $userId);
        $this->db->where('itemId', $itemId);
        $this->db->where('itemType', 'reversebid');
        $this->db->where('status', '1');
        $query = $this->db->get('orders');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findOfferExist($itemType) {
        $userId = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->where('userId', $userId);
        $this->db->where('itemType', 'offer');
        $this->db->where('status', '1');
        $query = $this->db->get('orders');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findReverseBidExist($itemType) {
        $userId = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->where('userId', $userId);
        $this->db->where('itemType', 'reversebid');
        $this->db->where('status', '1');
        $query = $this->db->get('orders');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findReverseBidByReverseId($reverseid) {
        $userId = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->where('id', $reverseid);
        $this->db->where('status', '1');
        $query = $this->db->get('reverseauction');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function orderInsert() {
        $exist = $this->checkOfferExist($_POST['itemId'], $_POST['itmeType']);
        $idexist = $exist[0]['id'];
        if ($idexist > 0) {

        } else {
            $userId = $this->session->userdata('user_id');
            $order = array(
                'userId' => $userId,
                'itemId' => $_POST['itemId'],
                'bookingAmount' => $_POST['amount'],
                'itemType' => $_POST['itmeType']
            );
            $this->db->insert('orders', $order);
        }
        $data = $this->findOfferExist($_POST['itmeType']);
        return($data) ? $data : false;
    }

    function deleteOrders() {
        $id = $_POST['id'];
        $this->db->set('status', '0');
        $this->db->where('id', $id);
        $this->db->update('orders');
        $data = $this->db->affected_rows();
        return($data) ? true : false;
    }

    function orderInsertReverseBid() {
        $exist = $this->checkReverseBidExist($_POST['itemId'], $_POST['itmeType']);
        $idexist = $exist[0]['id'];
        if ($idexist > 0) {

        } else {
            $userId = $this->session->userdata('user_id');
            $order = array(
                'userId' => $userId,
                'itemId' => $_POST['itemId'],
                'bookingAmount' => $_POST['amount'],
                'itemType' => $_POST['itmeType']
            );
            $this->db->insert('orders', $order);
        }
        $data = $this->findReverseBidExist($_POST['itmeType']);
        return($data) ? $data : false;
    }

    function findLocationOfOffer() {
        $this->db->select('*');
        $this->db->where('id', $_POST['offerId']);
        $this->db->where('status', '1');
        $query = $this->db->get('offers');
        $data = $query->result_array();
        return $data[0]['merchantId'];
    }

    function findAllmerchantNameBySerservice() {
        $service = $_POST['place'];
        $merchantIds = $this->serviceAllBySearch($service);
        $query = $this->db->query("SELECT * FROM merchant WHERE status='1' AND merchantId in ($merchantIds)");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findAllmerchantNameByPlace() {
        $location = $_POST['place'];
        $aquery = '';
        $cquery = '';
        $locate = rawurldecode($location);
        $this->db->select('id');
        $this->db->from('area');
        $this->db->like('name', $locate);
        $resmid = $this->db->get();
        $rmid = $resmid->result_array();
        $aid = '';
        foreach ($rmid as $m) {
            $aid.=$m['id'] . ',';
        }
        $aid = rtrim($aid, ',');
        if (!empty($aid)) {
            $aquery = "and area in($aid)";
        }

        $this->db->select('id');
        $this->db->from('city');
        $this->db->like('cityName', $locate);
        $resmid = $this->db->get();
        $rmid = $resmid->result_array();
        $cid = '';
        foreach ($rmid as $m) {
            $cid.=$m['id'] . ',';
        }
        $cid = rtrim($cid, ',');
        if (!empty($cid)) {
            $cquery = "and city in($cid)";
        }
        $query = $this->db->query("SELECT * FROM merchant WHERE status='1' $aquery$cquery");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function myBidDetails() {
        $uid = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->where('status', '1');
        $query = $this->db->get('merchant_biding');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function myBidDetailsByReverseauctionId($reverseid) {
        $checkExist = $this->findStatusodCompleteBid($reverseid);
        if ($checkExist) {
            return $checkExist;
        } else {
            $this->db->select('*');
            $this->db->where('status', '1');
            $this->db->where('reverseAuctionId', $reverseid);
            $query = $this->db->get('merchant_biding');
            $data = $query->result_array();
            return($data) ? $data : false;
        }
    }

    function findStatusodCompleteBid($reverseid) {
        $this->db->select('*');
        $this->db->where('status', '2');
        $this->db->where('reverseAuctionId', $reverseid);
        $query = $this->db->get('merchant_biding');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function reverseAuctionDetailByuserId() {
        $uid = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->where('status', '1');
        $this->db->where('userId', $uid);
        $query = $this->db->get('reverseauction');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function completeBid() {
        $this->db->set('status', '2');
        $this->db->where('reverseAuctionId', $_POST['reverseAuctionId']);
        $this->db->where('merchantId', $_POST['bidMerchantId']);
        $this->db->update('merchant_biding');
        $data = $this->db->affected_rows();
        return $data;
    }

    function reverseAuctionDetailAllById($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('reverseauction');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function fetchuserimage($id) {
        $this->db->select('upf.photo, us.*');
        $this->db->from('user_profiles as upf, users as us');
        $this->db->join('users', 'upf.user_id = us.id');
        $this->db->where('upf.user_id', $id);
        $this->db->where('us.id', $id);
        $this->db->group_by('us.id');
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * insert a row data
     * @param type $table
     * @param type $value
     * @return boolean
     */
    function insert_data($table, $value) {
        $this->db->insert($table, $value);
        return true;
    }

    /**
     * insert n rows
     * @param type $table
     * @param type $value
     * @return type
     */
    function insert_batch($table, $value) {
        return $this->db->insert_batch($table, $value);
    }

    /**
     * get AI id of last transaction
     * @return type
     */
    function insert_id() {
        return $this->db->insert_id();
    }

    /**
     *
     * @param type $table
     * @param type $item
     * @param type $basedOn
     */
    function fetch_maxItem($table, $item) {
        $this->db->select_max($item);
        $result = $this->db->get($table)->result();
        foreach ($result as $row):
            return $row->{$item};
        endforeach;
    }

    function all_data($table) {
        $this->db->select('*');
        $this->db->from($table);
        //$this->db->where('user_id',$id);
        $query = $this->db->get();
        return $query->result();
    }

    function all_data_post($table, $cnt, $start) {
        $this->db->select('*');
        $this->db->limit($cnt, $start);
        $this->db->from($table);
        $this->db->order_by('postid', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function all_data_postop($start, $end) {
        $query = $this->db->query("SELECT `post`.* FROM `post` join `post_like` on `post_like`.postid = `post`.postid GROUP BY `post_like`.postid HAVING COUNT(`post_like`.postid) >= 1 order by COUNT(`post_like`.postid) DESC limit $start, $end");
        return $query->result();
    }

    function all_data_postwher($table, $cnt, $start, $wr) {
        $this->db->select('*');
        $this->db->limit($cnt, $start);
        $this->db->from($table);
        $this->db->where('category', $wr);
        $this->db->order_by('postid', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function all_data_postnolimit($table) {
        $this->db->select('*');

        $this->db->from($table);
        $this->db->order_by('datetm', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function where_data($table, $id) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($id);
        $query = $this->db->get();
        return $query->result();
    }

    function where_datacmt($id) {
        $this->db->select('*');
        $this->db->from('review_comment');
        $this->db->order_by('createdOn', 'DESC');
        $this->db->where('reviewid', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function where_dataans($id) {
        $this->db->select('*');
        $this->db->from('questionanswer');
        $this->db->order_by('createdOn', 'DESC');
        $this->db->where('queid', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function where_data_post($table, $id) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($id);
        $this->db->order_by('datetm', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function countlikecomment($table, $id) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($id);
        $query = $this->db->count_all_results();
        return $query;
    }

    function deletedt($table, $where) {
        $this->db->where($where);
        $this->db->delete($table);
        return true;
    }

    function updatedata($id, $data, $table) {
        $this->db->where($id);
        if ($this->db->update($table, $data)) {
            return true;
        } else {
            return false;
        }
    }

    function findcutomerById($id) {
        $this->db->select('*');
        $this->db->where('status', '1');
        $this->db->where('userId', $id);
        $query = $this->db->get('customer');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function getreward() {
        $this->db->select('*');
        $this->db->where('userid', $this->session->userdata('user_id'));
        $query = $this->db->get('reward_user');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function getMerchantImagecat($cat) {
        $this->db->select('ding.*, mrch.salonName');
        $this->db->from('merchant AS mrch, lookbook AS ding');
        $this->db->join('lookbook', 'mrch.merchantId = ding.merchantId');
        $this->db->where('ding.photoOf', 'w');
        $this->db->where('ding.categorypic', $cat);
        $this->db->group_by("ding.id");
        $query = $this->db->get();
        $data = $query->result();
        return($data) ? $data : false;
    }

    function getcutmrImagecat($cat) {

        $this->db->select('ding.*, mrch.fullname');
        $this->db->from('customer AS mrch, lookbook_customer AS ding');
        $this->db->join('lookbook_customer', 'mrch.userId = ding.user_Id');
        $this->db->where('ding.categorypic', $cat);
        $this->db->group_by("ding.id");
        //$this->db->get('lookbook_customer');
        $query = $this->db->get();

        $data = $query->result();
        return($data) ? $data : false;
    }

    function findAllRecordByspeciality($pricevalue) {
        if ($pricevalue == '0') {
            $query = $this->db->query("SELECT merchant . * , MAX(userReview.rating ) AS maxrating
        FROM merchant
        LEFT JOIN userReview ON userReview.merchantId = merchant.merchantId
        WHERE merchant.status='1'
        GROUP BY merchant.merchantId
        ORDER BY maxrating DESC");
        } else {
            $query = $this->db->query("SELECT merchant . * , MAX(userReview.rating ) AS maxrating
        FROM merchant
        LEFT JOIN userReview ON userReview.merchantId = merchant.merchantId
        WHERE merchant.speciality LIKE '%$pricevalue%' AND merchant.status='1'
        GROUP BY merchant.merchantId
        ORDER BY maxrating DESC");
        }
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function findRecordByspeciallocation($locate, $pricevalue) {
        $location = rawurldecode($locate);
        if ($pricevalue == '0') {
            $query = $this->db->query("SELECT merchant . * , MAX(userReview.rating ) AS maxrating
        FROM merchant
        LEFT JOIN userReview ON userReview.merchantId = merchant.merchantId
        WHERE merchant.address LIKE '%$location%' AND merchant.status='1'
        GROUP BY merchant.merchantId
        ORDER BY maxrating DESC");
        } else {
            $query = $this->db->query("SELECT merchant . * , MAX(userReview.rating ) AS maxrating
        FROM merchant
        LEFT JOIN userReview ON userReview.merchantId = merchant.merchantId
        WHERE merchant.speciality LIKE '%$pricevalue%' AND merchant.address LIKE '%$location%' AND merchant.status='1'
        GROUP BY merchant.merchantId
        ORDER BY maxrating DESC");
        }
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function userinfoofr($id) {
        $this->db->select('u.email, c.*');
        $this->db->from('users as u, customer as c');
        $this->db->join('users', 'u.id = c.userId');
        $this->db->where('u.id', $id);
        $this->db->group_by('u.id');
        $query = $this->db->get();

        $data = $query->result();
        return($data) ? $data : false;
    }

    function getsalonname($id) {
        $this->db->select('salonName');
        $this->db->from('merchant');
        $this->db->where('merchantId', $id);
        $query = $this->db->get();

        $data = $query->result();
        return($data) ? $data : false;
    }

    function getcustomerImageusers($limit, $start) {
        $userId = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->limit($limit, $start);
        $this->db->where('user_Id', $userId);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('lookbook_customer');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function checklogindetail($e, $p) {
        $this->db->select('id');
        $this->db->where('email', $e);
        $this->db->where('password', $p);
        $query = $this->db->get('users');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function selectotp($id) {
        $this->db->select('otp');
        $this->db->where('userid', $id);
        $que = $this->db->get('otp_user');
        $data = $que->result();
        return ($data) ? $data : false;
    }

    function fetchlastphotocomnt($id, $lvl) {
        if ($lvl == '2') {
            $this->db->select('p.*, upf.salonName as name, upf.merchantId as id, upf.photo as photo');
            $this->db->from('merchant as upf, lookbook_comment as p');
            $this->db->join('merchant', 'upf.merchantId = p.userid');
            $this->db->where('p.cmtid', $id);
            $this->db->group_by('p.cmtid');
            $queary = $this->db->get();
            $data = $queary->result_array();
            return($data) ? $data : false;
        } else {
            $this->db->select('p.*, upf.fullname as name, upf.userId as id, upf.photo as photo');
            $this->db->from('customer as upf,  lookbook_comment as p');
            $this->db->join('customer', 'upf.userId = p.userid');
            $this->db->where('p.cmtid', $id);
            $this->db->group_by('p.cmtid');
            $queary = $this->db->get();
            $data = $queary->result_array();
            return($data) ? $data : false;
        }
    }

    function getAllGroups() {

        $query = $this->db->get('category');
        return $query->result();
    }

    function selectoffercity() {
        $this->db->select('city');
        $this->db->from('offers');
        $this->db->group_by('city');
        $queary = $this->db->get();
        $data = $queary->result_array();
        return($data) ? $data : false;
    }

    public function fetchSelectedofferscity($limit, $start, $name) {
        $query = $this->db->query("select * from offers where merchantId in(select merchantId from merchant where area in(select id from area where name like '%$name%')) or merchantId in(select merchantId from merchant where city in(select id from city where cityName like '%$name%')) or city like '%$name%' limit $start,$limit");

        //$this->db->limit($limit, $start);
        //$this->db->where('status','1');
        //$this->db->like('name',$name);
        //$this->db->or_where_in('merchantId',$mid);
        //$query = $this->db->get("offers");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    public function fetchSelectedoffersboth($limit, $start, $name, $ct) {
        $query = $this->db->query("select * from offers where city like '%$ct%' and name like '%$name%' limit $start,$limit");

        //$this->db->limit($limit, $start);
        //$this->db->where('status','1');
        //$this->db->like('name',$name);
        //$this->db->or_where_in('merchantId',$mid);
        //$query = $this->db->get("offers");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function updatecustomer($gen, $date, $loca, $empl, $mob, $bri, $usid) {
        $query = $this->db->query("UPDATE customer SET gender='$gen',DOB='$date',location='$loca',employment='$empl',mobile='$mob',yourself='$bri' where userId=" . $usid);
        //echo "UPDATE customer SET gender='$gen',DOB='$date',location='$loca',employment='$empl',mobile='$mob',yourself='$bri' where userId=".$usid;
        return true;
    }

    function updatepassword($data1,$uid) {
       // $query = $this->db->query("UPDATE users SET password='$password',`username`='$name' where id=" . $uid);
        //echo "UPDATE customer SET gender='$gen',DOB='$date',location='$loca',employment='$empl',mobile='$mob',yourself='$bri' where userId=".$usid;
        $this->db->where('id', $uid);
$this->db->update('users', $data1);
		return true;
    }

    /*     * ******new function********* */

    function getInterestsById($userId) {
        $query = $this->db->query("SELECT cat_name
								FROM maincat
								INNER JOIN follow_category ON cat_name = catid
								WHERE userid ='$userId'");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

}

?>