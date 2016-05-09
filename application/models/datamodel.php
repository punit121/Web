<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
error_reporting(1);

class Datamodel extends CI_Model {

    function __Construct() {
        parent::__Construct();
        $this->load->database();
    }

    function userdetailbyusername($username) {
        $this->db->select('id');
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        if ($query->num_rows() == 1)
            return $query->row();
        return NULL;
    }

    function deletepost($id) {
        $this->db->where('id', $id);
        $this->db->delete('fbblogmain');
        $this->db->where('title', $id);
        $this->db->delete('fbblog');
        return true;
    }


    function getusernamebyid($id) {
        $this->db->select('username');
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        if ($query->num_rows() == 1)
            return $query->row();
        return NULL;
    }

    function getcatbyboad($bord) {
        $this->db->select('category');
        $this->db->where('bordname', $bord);
        $query = $this->db->get('user_board');
        if ($query->num_rows() == 1)
            return $query->row();
        return NULL;
    }

    function getuserbyid($user_id) {
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');
        if ($query->num_rows() == 1)
            return $query->row();
        return NULL;
    }

    function dashboadcat() {
        $query = $this->db->query("SELECT DISTINCT maincat FROM `fbblogmain` GROUP BY maincat HAVING COUNT(maincat) >= 1 order by COUNT(maincat) desc limit 5");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function dashboadcats() {
        $query = $this->db->query("SELECT DISTINCT maincat FROM `fbblogmain` GROUP BY maincat HAVING COUNT(maincat) >= 1 order by COUNT(maincat)");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function catnamebyname($name) {
        $query = $this->db->query("select * from category where category = '$name'");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function topuser() {
        $query = $this->db->query("SELECT userid FROM `fbblogmain` where userid !=0 GROUP BY userid HAVING COUNT(userid) >= 1 order by COUNT(userid) desc limit 5 ");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function topusers() {
        $query = $this->db->query("SELECT userid FROM `fbblogmain` where userid !=0 GROUP BY userid HAVING COUNT(userid) >= 1 order by COUNT(userid) desc limit 20 ");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function dashboarddata($uid, $limit, $start) {
        /*
          $this->db->select('interest');
          $this->db->where('userId',$uid);
          $quersy=$this->db->get('customer');
          $rmid=$quersy->result_array();
          $mid='';
          $int='';
          if(!($quersy->num_rows()== 0))
          {
          foreach($rmid as $m)
          {
          $mid.=$m['interest'].',';
          }
          $mid=rtrim($mid,',');
          $int='or category in('.$mid.')';
          }
          if(!($int)){

          $query=$this->db->query("select * from fbblogmain where userid = $uid and status=1 $int limit  $start, $limit");
          }
          else{
          $this->db->select('*');
          $this->db->where('userid',$uid);
          $this->db->where('status','1');

          $this->db->or_where('userid','0');
          $this->db->order_by('id','desc');
          $this->db->limit($limit, $start);
          $query=$this->db->get('fbblogmain');

          }
          $data=$query->result_array();
         */
        $this->db->select('*');

        $this->db->where('status', '1');
        $this->db->from('fbblogmain');

        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function dashboarddata2($uid, $limit, $last_publish_id) {
        $sql_query = "SELECT * FROM `fbblogmain` WHERE status = 1 AND publish_id < " . $last_publish_id . " ORDER BY publish_id DESC LIMIT " . $limit;
        $res = $this->db->query($sql_query);
        $data = $res->result_array();
        return($data) ? $data : false;
    }

    function postviewnext($uid, $id) {

        $this->db->select('interest');
        $this->db->where('userId', $uid);
        $quersy = $this->db->get('customer');
        $rmid = $quersy->result_array();
        $mid = '';
        $int = '';
        if (!($quersy->num_rows() == 0)) {
            foreach ($rmid as $m) {
                $mid.=$m['interest'] . ',';
            }
            $mid = rtrim($mid, ',');
            $int = 'or category in(' . $mid . ')';
        }
        if (!($int)) {

            $query = $this->db->query("select * from fbblogmain where userid = $uid $int and id >$id ORDER BY `id` ASC limit  1");
        } else {
            $this->db->select('*');
            $this->db->where('userid', $uid);

            $this->db->or_where('userid', '0');
            $this->db->where('status', '1');

            $this->db->where('id >', $id);

            $this->db->limit(1);
            $this->db->order_by('id', 'ASC');
            $query = $this->db->get('fbblogmain');
        }
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function selectintroofpost($id) {

        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->where('status', '1');
        $this->db->where('editorial', '0');

        $query = $this->db->get('fbblogmain');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function selectintroofvideo($id) {

        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->where('status', '1');
        $this->db->where('editorial', '2');
        $query = $this->db->get('fbblogmain');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    // function movetonextpost($id)
    // {
    // 	$select='SELECT * FROM fbblogmain WHERE editorial = 0 AND id <'.$id.'  ORDER BY id DESC limit 1';
    // 	$query=$this->db->query($select);
    // 	$result=$query->result_array();
    // 	return($result)?$result:false;
    // }




    function movetonextpost($id) {

        $sql_query = 'SELECT maincat FROM fbblogmain WHERE id = ' . $id . '';

        $res = $this->db->query($sql_query);

        if ($res->num_rows == 0) {
            return false;
        }

        $res = $res->result_array();
        $cat = $res[0]['maincat'];
        $select = 'SELECT * FROM fbblogmain WHERE editorial = 0 AND status = 1 AND id<' . $id . '  AND maincat = "' . $cat . '" ORDER BY id DESC limit 1';
        $query = $this->db->query($select);
        $result = $query->result_array();
        return($result) ? $result : false;
    }

    function movetonextvideo($id) {

        $sql_query = 'SELECT maincat FROM fbblogmain WHERE id = ' . $id . '';

        $res = $this->db->query($sql_query);

        if ($res->num_rows == 0) {
            return false;
        }

        $res = $res->result_array();
        $cat = $res[0]['maincat'];
        $select = 'SELECT * FROM fbblogmain WHERE editorial = 2 AND status = 1 AND  id<' . $id . '  AND maincat = "' . $cat . '" ORDER BY id DESC limit 1';
        $query = $this->db->query($select);
        $result = $query->result_array();
        return($result) ? $result : false;
    }

    function movetonexteditorial($id) {

        $sql_query = 'SELECT maincat FROM fbblogmain WHERE id = ' . $id . '';

        $res = $this->db->query($sql_query);

        if ($res->num_rows == 0) {
            return false;
        }

        $res = $res->result_array();
        $cat = $res[0]['maincat'];
        $select = 'SELECT * FROM fbblogmain WHERE editorial = 1 AND id<' . $id . '  AND maincat = "' . $cat . '" ORDER BY id DESC limit 1';
        $query = $this->db->query($select);
        $result = $query->result_array();
        return($result) ? $result : false;
    }

    function movetonexteditorials($id) {

        $sql_query = 'SELECT maincat FROM fbblogmain WHERE id = ' . $id . '';

        $res = $this->db->query($sql_query);

        if ($res->num_rows == 0) {
            return false;
        }

        $res = $res->result_array();
        $cat = $res[0]['maincat'];
        $select = 'SELECT * FROM fbblogmain WHERE editorial = 1 AND id<=' . $id . '  AND maincat = "' . $cat . '" ORDER BY id DESC limit 10';
        $query = $this->db->query($select);
        $result = $query->result_array();
        return($result) ? $result : false;
    }

    function selectdetailofeditorials($id) {

        $sql_query = 'SELECT maincat FROM fbblogmain WHERE id = ' . $id . '';

        $res = $this->db->query($sql_query);
        $a = Array();

        if ($res->num_rows == 0) {
            return false;
        }

        $res = $res->result_array();
        $cat = $res[0]['maincat'];
        $select = 'SELECT * FROM fbblogmain WHERE editorial = 1 AND id<=' . $id . '  AND maincat = "' . $cat . '" ORDER BY id DESC limit 10';
        $query = $this->db->query($select);
        $result = $query->result_array();
        foreach ($result AS $post) {
            $editorial = "SELECT * FROM fbblog WHERE title=" . $post['id'];
            $data = $this->db->query($editorial);
            $data_array = $data->result_array();
            array_push($a, $data_array);
        }

        return($a) ? $a : false;
    }

    function selectdetailofcomments($id) {

        $sql_query = 'SELECT maincat FROM fbblogmain WHERE id = ' . $id . '';

        $res = $this->db->query($sql_query);
        $a = Array();

        if ($res->num_rows == 0) {
            return false;
        }

        $res = $res->result_array();
        $cat = $res[0]['maincat'];
        $select = 'SELECT * FROM fbblogmain WHERE editorial = 1 AND id<=' . $id . '  AND maincat = "' . $cat . '" ORDER BY id DESC limit 10';
        $query = $this->db->query($select);
        $result = $query->result_array();
        foreach ($result AS $post) {
            $editorial = "SELECT * FROM post_coment WHERE postid=" . $post['id'] . "  ORDER BY datetm desc";
            $data = $this->db->query($editorial);
            $data_array = $data->result_array();
            array_push($a, $data_array);
        }

        return($a) ? $a : false;
    }

    function selectdetailofpost($id) {

        $this->db->select('*');
        $this->db->where('title', $id);
        $query = $this->db->get('fbblog');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function selectdetailofvideo($id) {

        $this->db->select('*');
        $this->db->where('title', $id);
        $query = $this->db->get('fbblog');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function selectdetailofposts($id) {

        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('fbblog');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function updateintroofpost($ttl, $intr, $id) {

        $this->db->where('id', $id);
        $this->db->set('intro', $intr);
        $this->db->update('fbblogmain');
        //$query=$this->db->query('UPDATE fbblogmain SET head="'.$ttl.'",intro="'.$intr.'" where id="'.$id.'"');

        return true;
    }

    function updatedetailofpost($intrd, $id) { //$this->db->where('title',$id);
        //$this->db->set('description',$this->db->escape($intrd));
        //$this->db->update('fbblog');
        $query = $this->db->query('UPDATE fbblog SET description="' . $intrd . '" where id="' . $id . '"');
        return true;
    }

    function updatedetailofeditorial($intrd, $id) {
        $this->db->where('title', $id);
        $this->db->set('description', $intrd);
        $this->db->update('fbblog');

        //$query=$this->db->query('UPDATE fbblog SET description="'.$intrd.'" where title="'.$id.'"');
        return true;
    }

    function insertcatfol($data) {
        $a = $this->db->insert('follow_category', $data);
        return $a;
    }

    function selectfollow($res, $uid) {
        $this->db->select('*');
        $this->db->where('userid', $uid);
        $this->db->where('catid', $res);

        $query = $this->db->get('follow_category');
        $data = $query->result_array();

        return($data) ? $data : false;
    }

    function deletecatfol($folid) {
        $this->db->where('fcid', $folid);
        $this->db->delete('follow_category');
        return true;
    }

    function selectcategory() {
        $this->db->select('*');
        $this->db->group_by('category');
        $query = $this->db->get('category');

        $data = $query->result_array();

        return($data) ? $data : false;
    }

    function insertuserfol($data) {
        $a = $this->db->insert('follow_user', $data);
        return $a;
    }

    function selectuserfollow($uid, $usid) {
        $this->db->select('*');
        $this->db->where('userid', $usid);
        $this->db->where('usid', $uid);

        $query = $this->db->get('follow_user');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function selectfollower($uid) {
        $this->db->select('*');
        $this->db->where('usid', $uid);
        $query = $this->db->get('follow_user');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function selectfollowercustomer($fuid) {
        $this->db->select('*');
        $this->db->where('userId', $fuid);
        $query = $this->db->get('customer');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function deleteuserfol($follid) {
        $this->db->where('fuid', $follid);
        $this->db->delete('follow_user');
        return true;
    }

    function selectuser() {
        $this->db->select('*');
        $query = $this->db->get('users');

        $data = $query->result_array();

        return($data) ? $data : false;
    }

    function boardfol($data) {
        $a = $this->db->insert('follow_board', $data);
        return $a;
    }

    function selectboardfollow($bid, $usid) {
        $this->db->select('*');
        $this->db->where('userid', $usid);
        $this->db->where('boardid', $bid);

        $query = $this->db->get('follow_board');
        $data = $query->result_array();

        return($data) ? $data : false;
    }

    function insertboardfol($data) {

        $a = $this->db->insert('follow_board', $data);
        return $a;
    }

    function deleteboardfol($foloid) {
        $this->db->where('fbid', $foloid);
        $this->db->delete('follow_board');
        return true;
    }

    // function postuserprofile($id, $limit, $start){
    // $this->db->select('*');
    // $this->db->where('userid', $id);
    // $this->db->where('shareas', '1');
    // $this->db->where('status','1');
    // $this->db->order_by('id','desc');
    // $this->db->limit($limit, $start);
    // $query= $this->db->get('fbblogmain');
    // $data=$query->result_array();
    // return($data)?$data:false;
    // }

    function postuserprofile2($id, $limit, $last_publish_id) {
        $sql_query = "SELECT * FROM `fbblogmain` WHERE status = 1 AND shareas = 1 AND userid = " . $id . " AND publish_id < " . $last_publish_id . " ORDER BY publish_id DESC LIMIT " . $limit;

        $res = $this->db->query($sql_query);
        $data = $res->result_array();
        return($data) ? $data : false;
    }

    function bookmarks($id, $limit, $last_publish_id) {
        $sql_query = "SELECT * FROM `bookmark` WHERE status = 1 AND userid = " . $id . " AND id < " . $last_publish_id . " ORDER BY id DESC LIMIT " . $limit;

        $res = $this->db->query($sql_query);
        $data = $res->result_array();
        return($data) ? $data : false;
    }

    function showpostdraft($id) {
        $this->db->select('*');
        $this->db->where('userid', $id);
        $this->db->where('status', '3');

        $this->db->order_by('id', 'desc');
        $query = $this->db->get('fbblogmain');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function topusercategory($cat) {
        $this->db->select('name');
        $this->db->where('category', $cat);
        $quersy = $this->db->get('category');
        $rmid = $quersy->result_array();
        $mid = '';
        $int = '';
        if (!($quersy->num_rows() == 0)) {
            foreach ($rmid as $m) {
                $mid.="'" . $m['name'] . "',";
            }
            $mid = rtrim($mid, ',');
            $int = ' fb.category in(' . $mid . ')';
        }
        $query = $this->db->query("SELECT fb.userid, (select fullname from customer c where c.userid= fb.userid) as name,  (select c.photo from customer c where c.userid= fb.userid) as photo FROM `fbblogmain` as fb where $int and fb.userid != 0 GROUP BY fb.userid HAVING COUNT(fb.userid) >= 1 order by COUNT(fb.category) desc limit 5");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function categories($cat, $nam) {
        //$this->db->select('category');
        $this->db->like('category', $nam);
        $this->db->like('maincat', $cat);

        $res = $this->db->get('fbblogmain');
        $data = $res->result_array();
        //print_r($data);
        return $data;
    }

// function postcategory($cat, $limit, $start){
// 	$this->db->select('category');
// 	$this->db->where('category',$cat);
// 	$quersy=$this->db->get('category');
// 	$rmid=$quersy->result_array();
// 	$mid='';
// 	$int="maincat like '$cat'";
// 	if(!($quersy->num_rows()== 0))
// 	{
// 			foreach($rmid as $m)
// 			{
// 				$mid.="'".$m['category']."',";
// 			}
// 			$mid=rtrim($mid,',');
// 			$int="and (fb.category in(".$mid.") or maincat like '$cat' )";
// 	}
// 	$query=$this->db->query("SELECT fb.*, (select c.fullname from customer c where c.userid= fb.userid) as fulnm, (select c.photo from customer c where c.userid= fb.userid) as cphto FROM `fbblogmain` as fb where fb.status = 1 and fb.shareas = 1 $int group by id order by id desc limit $start, $limit");
// 		$data=$query->result_array();
// 		return($data)?$data:false;
// 	}

    function postcategory2($cat, $limit, $last_post_id) {
        $this->db->select('category');
        $this->db->where('category', $cat);
        $quersy = $this->db->get('category');
        $rmid = $quersy->result_array();
        $mid = '';
        $int = "maincat like '$cat'";
        if (!($quersy->num_rows() == 0)) {
            foreach ($rmid as $m) {
                $mid.="'" . $m['category'] . "',";
            }
            $mid = rtrim($mid, ',');
            $int = "and (fb.category in(" . $mid . ") or maincat like '$cat' )";
        }
        $query = $this->db->query("SELECT fb.*, (select c.fullname from customer c where c.userid= fb.userid) as fulnm, (select c.photo from customer c where c.userid= fb.userid) as cphto FROM `fbblogmain` as fb where fb.status = 1 and fb.publish_id < " . $last_post_id . " and fb.shareas = 1 $int group by id order by publish_id desc limit $limit");

        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function postcategory($cat, $limit, $last_publish_id) {
        $sql_query = "SELECT * FROM `fbblogmain` WHERE  `maincat` LIKE '%" . $cat . "%' AND `publish_id` < " . $last_publish_id . " ORDER BY publish_id DESC LIMIT " . $limit;

        $res = $this->db->query($sql_query);
        $data = $res->result_array();
        return($data) ? $data : false;
    }

// function postcategorytopic($nam, $limit, $start){
// 	$query=$this->db->query("SELECT fb.*, (select c.fullname from customer c where c.userid= fb.userid) as fulnm, (select c.photo from customer c where c.userid= fb.userid) as cphto FROM `fbblogmain` as fb where fb.status = 1 and fb.shareas = 1 and fb.category like '%$nam%'  group by id order by id desc limit $start, $limit");
// 		$data=$query->result_array();
// 		return($data)?$data:false;
// 	}





    function postcategorytopic2($nam, $limit, $last_post_id) {

        $query = $this->db->query("SELECT fb.*, (select c.fullname from customer c where c.userid= fb.userid) as fulnm, (select c.photo from customer c where c.userid= fb.userid) as cphto FROM `fbblogmain` as fb where fb.status = 1 and fb.publish_id < " . $last_post_id . " and fb.shareas = 1 and fb.category like '%$nam%'  group by id order by publish_id desc limit $limit");

        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function postcategorytopic3($cat, $nam, $last_post_id) {
        $query = $this->db->query("SELECT * FROM `fbblogmain` WHERE `category` LIKE '%" . $nam . "%' AND `maincat` LIKE '%" . $cat . "%' AND `publish_id` < " . $last_post_id . "  GROUP BY  `id` ORDER BY `publish_id` DESC");

        //echo "SELECT * FROM `fbblogmain` WHERE `category` LIKE '%".$nam."%' AND `maincat` LIKE '%".$cat."%' AND `publish_id` < ".$last_post_id."  GROUP BY  `id` ORDER BY `publish_id` DESC LIMIT ". $limit;
        $data = $query->result_array();
        //print_r($data);
        return($data) ? $data : false;
    }

// function postcategoryuser($cat,$userid, $limit, $start){
// 	$query=$this->db->query("SELECT fb.*, (select c.fullname from customer c where c.userid= fb.userid) as fulnm, (select c.photo from customer c where c.userid= fb.userid) as cphto FROM `fbblogmain` as fb where fb.shareas = 1 and fb.userid like '%$userid%' and fb.maincat like '%$cat%'  group by id order by id desc limit $start, $limit");
// 		$data=$query->result_array();
// 		return($data)?$data:false;
// 	}




    function postcategoryuser2($cat, $userid, $limit, $start) {

        $query = $this->db->query("SELECT fb.*, (select c.fullname from customer c where c.userid= fb.userid) as fulnm, (select c.photo from customer c where c.userid= fb.userid) as cphto FROM `fbblogmain` as fb where fb.shareas = 1 and fb.publish_id < " . $last_post_id . " and fb.userid like '%$userid%' and fb.maincat like '%$cat%'  group by id order by id desc limit  $limit");

        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function postcategorybord($cat, $limit, $start) {

        $this->db->select('*');
        $this->db->where('boardname', $cat);
        $this->db->where('status', '1');

        $this->db->where('shareas', '1');
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $quersy = $this->db->get('fbblogmain');
        $data = $quersy->result_array();

        return($data) ? $data : false;
    }

    function postcategorysubbord($sboid, $limit, $start) {

        $this->db->select('*');
        $this->db->where('subboardname', $sboid);
        $this->db->where('status', '1');

        $this->db->where('shareas', '1');
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $quersy = $this->db->get('fbblogmain');
        $data = $quersy->result_array();

        return($data) ? $data : false;
    }

    function countbordpost($cat) {

        $this->db->select('*');
        $this->db->where('boardname', $cat);
        $query = $this->db->get('fbblogmain');
        $query = $query->num_rows();
        return $query;
    }

    function getlikecount($id) {

        $this->db->select('*');
        $this->db->where('postid', $id);
        $query = $this->db->get('post_like');
        $data = $query->num_rows();
        return($data) ? $data : false;
    }

    function selectinterest($uid) {
        $this->db->select('*');
        $this->db->where('userid', $uid);
        $query = $this->db->get('follow_category');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function countofcatposr($cat) {
        $this->db->select('name');
        $this->db->where('category', $cat);
        $quersy = $this->db->get('category');
        $rmid = $quersy->result_array();
        $mid = '';
        $int = '';
        if (!($quersy->num_rows() == 0)) {
            foreach ($rmid as $m) {
                $mid.="'" . $m['name'] . "',";
            }
            $mid = rtrim($mid, ',');
            $int = 'fb.category in(' . $mid . ')';
        }

        $query1 = $this->db->query("SELECT * FROM `fbblogmain` as fb where $int");
        $this->db->select('maincat');
        $this->db->where('maincat', $cat);
        $query = $this->db->get('fbblogmain');
        $result = $query->num_rows();
        return $result;
    }
      function countofboardposr($cat) {
        $this->db->select('bid');
        $this->db->where('bordname', $cat);
        $quersy = $this->db->get('user_board');
        $rmid = $quersy->result_array();
        $mid = '';
        $int = '';
        if (!($quersy->num_rows() == 0)) {
            foreach ($rmid as $m) {
                $mid.="'" . $m['name'] . "',";
            }
            $mid = rtrim($mid, ',');
            $int = 'fb.category in(' . $mid . ')';
        }

        $query1 = $this->db->query("SELECT * FROM `fbblogmain` as fb where $int");
        $this->db->select('maincat');
        $this->db->where('maincat', $cat);
        $query = $this->db->get('fbblogmain');
        $result = $query->num_rows();
        return $result;
    }

    function countofuserpost($uid) {
        $this->db->select('id');
        $this->db->where('id', $uid);
        $quersy = $this->db->get('users');
        $rmid = $quersy->result_array();
        $mid = '';
        $int = '';
        if (!($quersy->num_rows() == 0)) {
            foreach ($rmid as $m) {
                $mid.="'" . $m['id'] . "',";
            }
            $mid = rtrim($mid, ',');
            $int = 'fb.userid in(' . $mid . ')';
        }
        $query = $this->db->query("SELECT * FROM `fbblogmain` as fb where $int");
        //$querys=$this->db->query("SELECT * FROM 'fbblogmain' WHERE userid = ".$uid);
        $result = $query->num_rows();
        return $result;
    }

    function countofcatfoll($cat) {
        $this->db->select('*');
        $this->db->where('cat_name', $cat);
        $quersy = $this->db->get('maincat');
        $rmid = $quersy->result_array();
        $mid = '';
        $int = '';
        if (!($quersy->num_rows() == 0)) {
            foreach ($rmid as $m) {
                $mid.="'" . $m['cat_name'] . "',";
            }
            $mid = rtrim($mid, ',');
            $int = 'fc.catid in(' . $mid . ')';
        }
        $query = $this->db->query("SELECT * FROM `follow_category` as fc where $int");
        $query = $query->num_rows();
        return $query;
    }

    function countofuserfoll($uid) {
        /* $this->db->select('id');
          $this->db->where('id',$uid);
          $quersy=$this->db->get('users');
          $rmid=$quersy->result_array();
          $mid='';
          $int='';
          if(!($quersy->num_rows()== 0))
          {
          foreach($rmid as $m)
          {
          $mid.="'".$m['id']."',";
          }
          $mid=rtrim($mid,',');
          $int='fu.usid in('.$mid.')';
          } */
        $query = $this->db->query("SELECT * FROM `follow_user` where usid='$uid'");
        $query = $query->num_rows();
        return $query;
    }

    function countfollowing($uid) {
        $query = $this->db->query("SELECT * FROM `follow_user` where userid='$uid'");
        $query = $query->num_rows();
        return $query;
    }
    function countofgroupboard($uid) {
        /* $this->db->select('id');
          $this->db->where('id',$uid);
          $quersy=$this->db->get('users');
          $rmid=$quersy->result_array();
          $mid='';
          $int='';
          if(!($quersy->num_rows()== 0))
          {
          foreach($rmid as $m)
          {
          $mid.="'".$m['id']."',";
          }
          $mid=rtrim($mid,',');
          $int='fu.usid in('.$mid.')';
          } */
          $select=$this->db->query("SELECT * FROM users WHERE id=".$uid);
          //echo "SELECT * FROM users WHERE id=".$uid;
          $result=$select->result_array();
           //print_r($result);
          $email=$result['0']['email'];
          //echo $email;

        $query = $this->db->query("SELECT * FROM `board_invites` where status=1 AND email='".$email."'");
        //echo "SELECT * FROM `board_invites` where status=1 AND email='".$email."'";
        $query = $query->num_rows();
        return $query;
    }
      function countofprivateboard($uid) {
        /* $this->db->select('id');
          $this->db->where('id',$uid);
          $quersy=$this->db->get('users');
          $rmid=$quersy->result_array();
          $mid='';
          $int='';
          if(!($quersy->num_rows()== 0))
          {
          foreach($rmid as $m)
          {
          $mid.="'".$m['id']."',";
          }
          $mid=rtrim($mid,',');
          $int='fu.usid in('.$mid.')';
          } */
          

        $query = $this->db->query("SELECT * FROM `user_board` where userid=".$uid." AND private = 1");
       // echo "SELECT * FROM `board_invites` where status=1 AND email='".$email."'";
        $query = $query->num_rows();
        return $query;
    }
    function countofbordfoll($cat) {
        $cat = str_replace("%20", " ", $cat);
        $this->db->select('bid');
        $this->db->where('bordname', $cat);
        $quersy = $this->db->get('user_board');
        $rmid = $quersy->result_array();
        $mid = '';
        $int = '';
        if (!($quersy->num_rows() == 0)) {
            foreach ($rmid as $m) {
                $mid.="'" . $m['id'] . "',";
            }
            $mid = rtrim($mid, ',');
            $int = 'fb.boardid in(' . $mid . ')';
        }
        $query = $this->db->query("SELECT * FROM `follow_board` as fb where $int");
        $query = $query->num_rows();
        return $query;
    }

    function fetchcatid($catn) {
        $this->db->select('*');
        $this->db->where('category', $catn);
        $quersy = $this->db->get('category');
        $data = $quersy->result_array();
        return($data) ? $data : false;
    }

    function insertfol($fid, $uid) {
        $data = array('userid' => $fid,
            'usid' => $uid);
        $a = $this->db->insert('follow_user', $data);
        return $a;
    }

    function deletefol($fid, $uid) {
        $data = array('userid' => $fid,
            'usid' => $uid);
        $a = $this->db->delete('follow_user', $data);
        return $a;
    }

    function topicboard($cat) {
        $this->db->select('category');
        $this->db->where('boardname', $cat);
        $quersy = $this->db->get('fbblogmain');
        $rmid = $quersy->result_array();
        $mid = '';
        $int = '';
        if (!($quersy->num_rows() == 0)) {
            foreach ($rmid as $m) {
                $mid.="'" . $m['category'] . "',";
            }
            $mid = rtrim($mid, ',');
        }
        return $mid;
    }

    function catlist() {

        $this->db->select('*');
        $this->db->group_by('category');
        $query = $this->db->get('category');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function bordlist() {

        $uid = $this->session->userdata['user_id'];

        $this->db->select('*');
        $this->db->where('userid', $uid);

        $query = $this->db->get('user_board');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function alltopicofcategory($cat, $topic) {
        $this->db->select('*');
        $this->db->distinct();
        $this->db->where('category', $cat);
        $this->db->like('name', $topic);
        $query = $this->db->get('category');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function selectusercategoryfollow($usid) {

        $query = $this->db->query("select f.catid,(select c.cat_name from maincat c where c.cat_name=f.catid) as cat from follow_category f where f.userid=$usid");
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function showpostschedule($id) {
        $this->db->select('*');
        $this->db->where('userid', $id);
        $this->db->where('status', '4');

        $this->db->order_by('id', 'desc');
        $query = $this->db->get('fbblogmain');
        $data = $query->result_array();
        return($data) ? $data : false;
    }

    function getsubbod4($boid) {
        $this->db->select('*');
        $this->db->where('boardid', $boid);
        $this->db->limit(4);
        $query = $this->db->get('subboard');
        $data = $query->result_array();
        return($data);
    }

    function getboardbyname($board) {
        $this->db->select('*');
        $this->db->where('bordname', $board);

        $query = $this->db->get('user_board');
        $data = $query->result_array();
        return($data);
    }

    function getcomment($bid) {


        $query = $this->db->query("Select * from post_coment where postid='$bid'");
        $data = $query->result_array();
        return($data);
    }

    function getsubbodafter($boid) {
        $this->db->select('*');
        $this->db->where('boardid', $boid);
        $this->db->limit(9999999999999, 4);
        $query = $this->db->get('subboard');
        $data = $query->result_array();
        return($data);
    }

    function getsubbodall($boid) {
        $this->db->select('*');
        $this->db->where('boardid', $boid);
        //$this->db->limit(9999999999999);
        $query = $this->db->get('subboard');
        $data = $query->result_array();
        return($data);
    }

    /**
     *  Depreciated use
     *  Use common functions to perform simple queries
     * @param type $uid
     * @param type $postid
     * @param type $comment
     * @return boolean
     */
    function reportabuse($uid, $postid, $comment) {
        $query = $this->db->query("INSERT INTO report_abuse (`postid`, `userid`, `comment`) VALUES ('$postid','$uid','$comment')");
        //echo "INSERT INTO report_abuse (`postid`, `userid`, `comment`) VALUES ('$postid','$uid','$comment')";
        //echo "UPDATE customer SET gender='$gen',DOB='$date',location='$loca',employment='$empl',mobile='$mob',yourself='$bri' where userId=".$usid;
        return true;
    }

    /**
     *  Use common functions to perform simple queries
     * @param type $uid
     * @param type $postid
     * @param type $status
     * @param type $date
     * @return boolean
     */
    function bookmark($uid, $postid, $status, $date) {
        $query = $this->db->query("INSERT INTO bookmark (`userid`, `postid`,`status`,`datecreated`) VALUES ('$uid','$postid','$status','$date')");
        //echo "INSERT INTO bookmark (`userid`, `postid`) VALUES ('$uid','$postid')";
        //echo "UPDATE customer SET gender='$gen',DOB='$date',location='$loca',employment='$empl',mobile='$mob',yourself='$bri' where userId=".$usid;
        return true;
    }

    /**
     * ALERT!!this function contains depreciated content
     * Note : Table for fbblogmain has no forign key for follow_board
     *
     * cutom feeds are taken from three
     * followed users
     * followed categories
     * followed boards
     * combined them together in the order of publishedOn
     * and limited by a number
     * @param type $userId
     * @return type
     */
    function custom_feeds($userid, $last_date, $stat = 'latest', $limit = NULL) {

        //if latest or older
        $direction = ' < '; // older
        if ($stat == 'latest') {
            $direction = ' > ';
        }
        //select this to increase efficiency
        $select = '`fbblogmain`.`image` , `fbblogmain`.`createdOn`, `fbblogmain`.`publishedOn` , `fbblogmain`.`id`, `fbblogmain`.`userid`,' .
                '`fbblogmain`.`maincat` ,`fbblogmain`.`head`,`fbblogmain`.`editorial`,`fbblogmain`.`shareas`,`fbblogmain`.`status`';


        //where publsidedOn clause same for all
        $where_publish = ' and `publishedOn` ' . $direction . "'" . date('Y-m-d H:i:s', $last_date) . "' and publish_id IS NOT NULL and  `fbblogmain`.`status` = 1 group by `id`";
        //echo '<script>console.log(' . $where_publish . ')</script>';
        //need to show it based on the date sent
        // WHERE publishedOn > '" . date('Y-m-d G:i:s', $x)
        // so basically we have to select all categories user doesn't follow
        //make sure this is orderby the number of instances in fbblogmain table
        // no limit on it as of now
        //select `fbblogmain`.* from `fbblogmain` ,`follow_category` AS `cat` where `maincat`=`cat`.`catid` and `cat`.`userid` = 2120 group by `id`
        //select `fbblogmain`.* from `fbblogmain` ,`follow_user` AS `user` where `fbblogmain`.`userid`=`user`.`usid` and `user`.`userid` = 2182 group by `id`
        //getting bordname =
        // select `user_board`.`bordname` from `user_board`, `follow_board` where `follow_board`.`fbid` = `user_board`.`bid`  and `follow_board`.`userid` = 1890 group by `bid`
        //select `fbblogmain`.* from (select `user_board`.`bordname` from `user_board`, `follow_board` where `follow_board`.`fbid` = `user_board`.`bid`  and `follow_board`.`userid` = 1924 group by `bid`) AS `bord`, `fbblogmain` where `fbblogmain`.`boardname` = `bord`.`bordname` group by `fbblogmain`.`id`
        //getting data from followed category
        $sub_query1 = 'select ' . $select . ' from `fbblogmain` ,`follow_category` AS `cat` where `maincat`=`cat`.`catid` and `cat`.`userid` = ' . $userid . $where_publish;
        //getting data  from followed user
        $sub_query2 = 'select ' . $select . 'from `fbblogmain` ,`follow_user` AS `user` where `fbblogmain`.`userid`=`user`.`usid` and `user`.`userid` = ' . $userid . $where_publish;
        //get board name
        $sub_sub_query = ' select `user_board`.`bordname` from `user_board`, `follow_board` where `follow_board`.`fbid` = `user_board`.`bid`  and `follow_board`.`userid` = ' . $userid . ' group by `bid`';
        //getting data from followed board
        $sub_query3 = 'select ' . $select . ' from (' . $sub_sub_query . ') AS `bord`, `fbblogmain` where `fbblogmain`.`boardname` = `bord`.`bordname` ' . $where_publish;
        //query 4 same user
        $sub_query4 = 'select ' . $select . ' from `fbblogmain` where `userid` = ' . $userid . $where_publish;

        //combiming all queries
        //compiling all queries


        $main_query = $sub_query1 . ' UNION ' . $sub_query2 . ' UNION ' . $sub_query3 . ' UNION ' . $sub_query4;
        // order based on published

        $main_query = $main_query . ' order by `publishedOn` DESC';
        // if any $limit usually 3 or 24
        if ($limit) {
            $main_query = $main_query . ' limit ' . $limit;
        }

        //add the main query to this as to add optimized single query
        $final_select = ' `req`.`image` , `req`.`createdOn`, `req`.`publishedOn` , `req`.`id`, `req`.`userid` , ' .
                '`req`.`maincat` ,`req`.`head`,`req`.`editorial`,`req`.`shareas`,`req`.`status`' .
                ' , `customer`.`fullname` , `customer`.`photo` , `users`.`username`';
        $conditions = ' AS `req` where `customer`.`userid` = `req`.`userid` and `users`.`id` = `req`.`userid` group by `req`.`id` order by `publishedOn` DESC';
        $final_query = 'select ' . $final_select . ' from `customer` ,`users` , (' . $main_query . ')' . $conditions;

        $query = $this->db->query($final_query);
        // echo '<script>console.log(' . $main_query . ');</script>';
        // echo $main_query;
        return $query->result_array();
    }

    /**
     *
     * @param type $userid  of the required user not the same user
     * @param type $last_date
     * @param type $stat
     * @param type $limit
     * @return type
     */
    function user_feeds($userid, $last_date, $stat = 'latest', $limit = NULL) {

        //if latest or older
        $direction = ' < '; // older
        if ($stat == 'latest') {
            $direction = ' > ';
        }
        //select this to increase efficiency
        $select = '`fbblogmain`.`image` , `fbblogmain`.`createdOn`, `fbblogmain`.`publishedOn` , `fbblogmain`.`id`, `fbblogmain`.`userid`,' .
                '`fbblogmain`.`maincat` ,`fbblogmain`.`head`,`fbblogmain`.`editorial`,`fbblogmain`.`shareas`,`fbblogmain`.`status`';


        //where publsidedOn clause same for all
        $where_publish = ' and `publishedOn` ' . $direction . "'" . date('Y-m-d H:i:s', $last_date) . "' and publish_id IS NOT NULL  and `fbblogmain`.`status` = 1 group by `id`";

        //query 4  requested user feeds
        $sub_query4 = 'select ' . $select . ' from `fbblogmain` where `userid` =  ? ' . $where_publish;

        //combiming all queries
        //compiling all queries


        $main_query = $sub_query4;
        // order based on published

        $main_query = $main_query . ' order by `publishedOn` DESC';
        // if any $limit usually 3 or 24
        if ($limit) {
            $main_query = $main_query . ' limit ' . $limit;
        }

        //add the main query to this as to add optimized single query
        $final_select = ' `req`.`image` , `req`.`createdOn`, `req`.`publishedOn` , `req`.`id`, `req`.`userid` , ' .
                '`req`.`maincat` ,`req`.`head`,`req`.`editorial`,`req`.`shareas`,`req`.`status`' .
                ' , `customer`.`fullname` , `customer`.`photo` , `users`.`username`';
        $conditions = ' AS `req` where `customer`.`userid` = `req`.`userid` and `users`.`id` = `req`.`userid` group by `req`.`id` order by `publishedOn` DESC';
        $final_query = 'select ' . $final_select . ' from `customer` ,`users` , (' . $main_query . ')' . $conditions;

        $query = $this->db->query($final_query, $userid);



        // echo '<script>console.log(' . $main_query . ');</script>';
        // echo $main_query;
        return $query->result_array();
    }

    /**
     * there are so many user inputs so beware
     *
     * @param type $category  name `cat_name` of required category
     * @param type $last_date
     * @param type $stat
     * @param type $limit
     * @return type
     */
    function category_feeds($category, $last_date, $stat = 'latest', $limit = NULL) {

        //if latest or older
        $direction = ' < '; // older
        if ($stat == 'latest') {
            $direction = ' > ';
        }
        //select this to increase efficiency
        $select = '`fbblogmain`.`image` , `fbblogmain`.`createdOn`, `fbblogmain`.`publishedOn` , `fbblogmain`.`id`, `fbblogmain`.`userid`,' .
                '`fbblogmain`.`maincat` ,`fbblogmain`.`head`,`fbblogmain`.`editorial`,`fbblogmain`.`shareas`,`fbblogmain`.`status`';
        $where_publish = ' and `publishedOn` ' . $direction . "'" . date('Y-m-d H:i:s', $last_date) . "' and `fbblogmain`.`status` = 1 group by `id`";
        //query 4 same user
        $sub_query4 = 'select ' . $select . ' from `fbblogmain` where `maincat` = ? ' . $where_publish;

        //combiming all queries
        //compiling all queries
        $main_query = $sub_query4;
        // order based on published

        $main_query = $main_query . ' order by `publishedOn` DESC';
        // if any $limit usually 3 or 24
        if ($limit) {
            $main_query = $main_query . ' limit ' . $limit;
        }

        //add the main query to this as to add optimized single query
        $final_select = ' `req`.`image` , `req`.`createdOn`, `req`.`publishedOn` , `req`.`id`, `req`.`userid` , ' .
                '`req`.`maincat` ,`req`.`head`,`req`.`editorial`,`req`.`shareas`,`req`.`status`' .
                ' , `customer`.`fullname` , `customer`.`photo` , `users`.`username`';
        $conditions = ' AS `req` where `customer`.`userid` = `req`.`userid` and `users`.`id` = `req`.`userid` group by `req`.`id` order by `publishedOn` DESC';
        $final_query = 'select ' . $final_select . ' from `customer` ,`users` , (' . $main_query . ')' . $conditions;

        $query = $this->db->query($final_query, array($category));
        // echo '<script>console.log(' . $final_query . ');</script>';
        // echo $main_query;
        return $query->result_array();
    }

    //function needs overviewon working
    function count_feeds($userid, $last_date, $stat = 'latest') {
        //if latest or older
        $direction = ' < '; // older
        if ($stat == 'latest') {
            $direction = ' > ';
        }
        //where publsidesOn clause same for all
        $where_publish = ' and `publishedOn` ' . $direction . "  date('" . date('Y-m-d G:i:s', $last_date) . "')  group by `id`";

        //need to show it based on the date sent
        // WHERE publishedOn > '" . date('Y-m-d G:i:s', $x)
        // so basically we have to select all categories user doesn't follow
        //make sure this is orderby the number of instances in fbblogmain table
        // no limit on it as of now
        //select `fbblogmain`.* from `fbblogmain` ,`follow_category` AS `cat` where `maincat`=`cat`.`catid` and `cat`.`userid` = 2120 group by `id`
        //select `fbblogmain`.* from `fbblogmain` ,`follow_user` AS `user` where `fbblogmain`.`userid`=`user`.`usid` and `user`.`userid` = 2182 group by `id`
        //getting bordname =
        // select `user_board`.`bordname` from `user_board`, `follow_board` where `follow_board`.`fbid` = `user_board`.`bid`  and `follow_board`.`userid` = 1890 group by `bid`
        //select `fbblogmain`.* from (select `user_board`.`bordname` from `user_board`, `follow_board` where `follow_board`.`fbid` = `user_board`.`bid`  and `follow_board`.`userid` = 1924 group by `bid`) AS `bord`, `fbblogmain` where `fbblogmain`.`boardname` = `bord`.`bordname` group by `fbblogmain`.`id`
        //getting data from followed category
        $sub_query1 = 'select `fbblogmain`.* from `fbblogmain` ,`follow_category` AS `cat` where `maincat`=`cat`.`catid` and `cat`.`userid` = ' . $userid . $where_publish;
        //getting data  from followed user
        $sub_query2 = 'select `fbblogmain`.* from `fbblogmain` ,`follow_user` AS `user` where `fbblogmain`.`userid`=`user`.`usid` and `user`.`userid` = ' . $userid . $where_publish;
        //get board name
        $sub_sub_query = ' select `user_board`.`bordname` from `user_board`, `follow_board` where `follow_board`.`fbid` = `user_board`.`bid`  and `follow_board`.`userid` = ' . $userid . ' group by `bid`';
        //getting data from followed board
        $sub_query3 = 'select `fbblogmain`.* from (' . $sub_sub_query . ') AS `bord`, `fbblogmain` where `fbblogmain`.`boardname` = `bord`.`bordname` ' . $where_publish;
        //query 4 same user
        $sub_query4 = 'select `fbblogmain`.* from `fbblogmain` where `userid` = ' . $userid . $where_publish;

        //combiming all queries
        //compiling all queries


        $main_query = $sub_query1 . ' UNION ' . $sub_query2 . ' UNION ' . $sub_query3 . ' UNION ' . $sub_query4;
        // order based on published
        $main_query = $main_query . ' order by `publishedOn` DESC';

        $select = ' `req`.* , `customer`.`fullname` , `customer`.`photo` , `users`.`username`';
        $conditions = ' AS `req` where `customer`.`userid` = `req`.`userid` and `users`.`id` = `req`.`userid` group by `req`.`id`';
        $final_query = 'select ' . $select . ' from `customer` ,`users` , (' . $main_query . ')' . $conditions;
        return $this->db->query($final_query)->num_rows();
    }

    /**
     *
     * @param type $userid
     * @param type $follow_status
     * @param type $order
     * @param type $limit
     * @return type
     */
    public function get_categories($userid, $follow_status = 'all', $order = 'DESC', $limit = NULL) {
        $query1 = 'select `maincat`.* from `maincat`,`fbblogmain` where ';
        $query2 = '';
        switch ($follow_status) {
            case 'not_followed' : // this means we should get all category info which user follows
                $query2 = ' `maincat`.`cat_name` NOT IN (select `follow_category`.`catid` from `follow_category` where ' .
                        ' `follow_category`.`userid` = ' . $userid . ') and ';
                break;
            case 'followed' :  // this means get all categories user doesn't follow
                $query2 = ' `maincat`.`cat_name` IN (select `follow_category`.`catid` from `follow_category` where ' .
                        ' `follow_category`.`userid` = ' . $userid . ') and ';
                break;
            case 'all' : break; // all irrespective of user, take direclt from main cat
        }
        $query3 = ' `maincat`.`cat_name` = `fbblogmain`.`maincat` group by `maincat`.`maincat_id`' .
                '  order by count(`maincat`) ' . $order;
        $query = $query1 . $query2 . $query3;

        if ($limit) {
            $query = $query . ' limit ' . $limit;
        }
        return $this->db->query($query)->result_array();
    }

    /**
     * Query to get user details including username based on number of posts
     *
     * @param type $userid
     * @param type $follow_status
     * @param type $order
     * @param type $limit
     * @return type
     */
    public function get_users($userid, $follow_status = 'all', $order = 'DESC', $limit = NULL) {
        $query1 = 'select `customer`.`userid` , `users`.`id` , `users`.`username` , `customer`.`photo` , `customer`.`fullname` from `customer`,`fbblogmain` ,`users` where ';
        $query2 = '';
        switch ($follow_status) {
            case 'not_followed' : // this means we should get all category info which user follows
                $query2 = ' `customer`.`userid` NOT IN (select `follow_user`.`usid` from `follow_user` where ' .
                        ' `follow_user`.`userid` = ' . $userid . ') and ';
                break;
            case 'followed' :  // this means get all categories user doesn't follow
                $query2 = ' `customer`.`userid`  IN (select `follow_user`.`usid` from `follow_user` where ' .
                        ' `follow_user`.`userid` = ' . $userid . ') and ';
                break;
            case 'all' : break; // all irrespective of user, take direclt from main cat
        }
        $query3 = ' `customer`.`userid` = `fbblogmain`.`userid` and `customer`.`userid` = `users`.`id` group by `fbblogmain`.`userid`' .
                '  order by count(`fbblogmain`.`userid`) ' . $order;
        $query = $query1 . $query2 . $query3;

        if ($limit) {
            $query = $query . ' limit ' . $limit;
        }
        return $this->db->query($query)->result_array();
    }

    /**
     * to get a single user from two different tables
     * @param type $select
     * @param type $userid
     * @return type
     */
    function get_user($select, $userid) {
        $this->db->select($select);
        $this->db->from('customer,users');
        $this->db->where('userId', $userid);
        $this->db->where('users.id', $userid);
        return $this->db->get()->row_array();
    }

    function contact($data) {
        $query = $this->db->insert('contact_us', $data);
    }

    function search($autosrch) {
        $this->db->select('catid');
        $ths->db->from('follow_category');
        $this->db->like('catid', $autosrch);
        $query = $this->db->get();

        return $query->result();
    }

    function publicboards($id)
    {
        $query=$this->db->query("SELECT * FROM `user_board` WHERE userid=".$id." AND private = 0");
        $result=$query->result_array();
        return $result;
    }

}

?>