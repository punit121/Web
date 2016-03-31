<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(1);
class Datamodel extends CI_Model
{
	function __Construct()
{
        parent::__Construct();
		$this->load->database();
	}

function userdetailbyusername($username)
	{	
		$this->db->select('id');
		$this->db->where('username', ($username));

		$query = $this->db->get('users');
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}
function deletepost($id){
		$this->db->where('id',$id);
		$this->db->delete('fbblogmain');
		$this->db->where('title',$id);
		$this->db->delete('fbblog');
		return true;
	}
function getusernamebyid($id)
	{	
		$this->db->select('username');
		$this->db->where('id',$id);
		$query = $this->db->get('users');
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}
function getcatbyboad($bord)
{
		$this->db->select('category');
		$this->db->where('bordname',$bord);
		$query = $this->db->get('user_board');
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}
function getuserbyid($user_id)
	{
		$this->db->where('id', $user_id);
		$query = $this->db->get('users');
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}
	
function dashboadcat()
	{
		$query=$this->db->query("SELECT DISTINCT maincat FROM `fbblogmain` GROUP BY maincat HAVING COUNT(maincat) >= 1 order by COUNT(maincat) desc limit 5");
		$data=$query->result_array();
		return($data)?$data:false;
	}
function catnamebyname($name){
	$query=$this->db->query("select * from category where category = '$name'");
		$data=$query->result_array();
		return($data)?$data:false;
	}
function topuser()
	{
		$query=$this->db->query("SELECT userid FROM `fbblogmain` where userid !=0 GROUP BY userid HAVING COUNT(userid) >= 1 order by COUNT(userid) desc limit 5 ");
		$data=$query->result_array();
		return($data)?$data:false;
	}
function dashboarddata($uid, $limit, $start){
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
		
		$this->db->where('status','1');
				$this->db->from('fbblogmain');

				$this->db->order_by('id','desc');
$this->db->limit($limit, $start);
		$query=$this->db->get();
		$data=$query->result_array();	
		return($data)?$data:false;
	}
function postviewnext($uid, $id){
	
	$this->db->select('*');
	$this->db->where('id',$id);
	$quersy=$this->db->get('fbblogmain');
	$rmid=$quersy->result_array();
	echo $rmid['maincat'];
	$mid='';
	$int='';
	if(!($quersy->num_rows()== 0))
	{
			foreach($rmid as $m)
			{
				$mid.=$m['category'].',';
			}
			$mid=rtrim($mid,',');
			$int="category in('".$mid."')";
	}
	if($int){
		$query=$this->db->query("select * from fbblogmain where $int and id >$id ORDER BY `id` ASC limit  1");
		}
	else{
		$this->db->select('*');
		$this->db->where('maincat',$rmid['maincat']);
		echo $rmid['maincat'];
		//$this->db->or_where('userid','0');
		//$this->db->where('status','1');

		$this->db->where('id >', $id);

		$this->db->limit(1);
		$this->db->order_by('id', 'ASC');
		$query=$this->db->get('fbblogmain');
		
		}
		$data=$query->result_array();	
		return($data)?$data:false;
	}
	
	function selectintroofpost($id){
		
		$this->db->select('*');
		$this->db->where('id',$id);
		$this->db->where('status','1');

		$query= $this->db->get('fbblogmain');
		$data=$query->result_array();	
		return($data)?$data:false;
		
		}
		
	function selectdetailofpost($id){
		
		$this->db->select('*');
		$this->db->where('title',$id);
		$query= $this->db->get('fbblog');
		$data=$query->result_array();	
		return($data)?$data:false;
		
		}
		function selectdetailofposts($id){
		
		$this->db->select('*');
		$this->db->where('id',$id);
		$query= $this->db->get('fbblog');
		$data=$query->result_array();	
		return($data)?$data:false;
		
		}
		 function updateintroofpost($ttl,$intr,$id)
  {
				 $query=$this->db->query('UPDATE fbblogmain SET head="'.$ttl.'",intro="'.$intr.'" where id="'.$id.'"');
		
			return true;

	}
 function updatedetailofpost($intrd,$id)
  {	$this->db->where('title',$id); 
	$this->db->set('description',$this->db->escape($intrd));
	$this->db->update('fbblog');
 		
		// $query=$this->db->query("UPDATE fbblog SET description='$intrd' where title='$id'");
		
			return true;

	}
	function insertcatfol($data)
	{
	echo $a=$this->db->insert('follow_category',$data);
	return $a;
	}
	function selectfollow($res,$uid)
{
 $this->db->select('*');
		$this->db->where('userid',$uid);
		$this->db->where('catid',$res);

		$query=$this->db->get('follow_category');
				$data=$query->result_array();	

		return($data)?$data:false;
	
}
function deletecatfol($folid){
		$this->db->where('fcid',$folid);
		$this->db->delete('follow_category');
		return true;
	}
		function selectcategory()
		{
					$this->db->select('*');
		$this->db->group_by('category');
		$query=$this->db->get('category');
		
		$data=$query->result_array();	

		return($data)?$data:false;
	

			
		}
function insertuserfol($data)
	{
	$a=$this->db->insert('follow_user',$data);
	return $a;
	}
	function selectuserfollow($uid,$usid)
	{
 		$this->db->select('*');
		$this->db->where('userid',$usid);
		$this->db->where('usid',$uid);

		$query=$this->db->get('follow_user');
		$data=$query->result_array();	
		return($data)?$data:false;
	
}
function selectfollower($uid)
{
	 		$this->db->select('*');
		$this->db->where('usid',$uid);
$query=$this->db->get('follow_user');
		$data=$query->result_array();	
		return($data)?$data:false;
	
}
function selectfollowercustomer($fuid)
{
$this->db->select('*');
		$this->db->where('userId',$fuid);
$query=$this->db->get('customer');
		$data=$query->result_array();	
		return($data)?$data:false;
		
}
function deleteuserfol($follid)
		
{
		$this->db->where('fuid',$follid);
		$this->db->delete('follow_user');
		return true;
	}
		function selectuser()
		{
					$this->db->select('*');
		$query=$this->db->get('users');
		
		$data=$query->result_array();	

		return($data)?$data:false;
	

			
		}
		function insertboardfol($data)
	{
	$a=$this->db->insert('follow_board',$data);
	return $a;
	}
	function selectboardfollow($bid,$usid)
{
 $this->db->select('*');
		$this->db->where('userid',$usid);
		$this->db->where('boardid',$bid);

		$query=$this->db->get('follow_board');
				$data=$query->result_array();	

		return($data)?$data:false;
	
}
function deleteboardfol($foloid){
		$this->db->where('fbid',$foloid);
		$this->db->delete('follow_board');
		return true;
	}
	

	
		function postuserprofile($id, $limit, $start){
		$this->db->select('*');
		$this->db->where('userid', $id);
		$this->db->where('shareas', '1');
		$this->db->where('status','1');

		$this->db->order_by('id','desc');
		$this->db->limit($limit, $start);
		$query= $this->db->get('fbblogmain');
		$data=$query->result_array();	
		return($data)?$data:false;
		}
		function showpostdraft($id){
		$this->db->select('*');
		$this->db->where('userid', $id);
		$this->db->where('status','3');

		$this->db->order_by('id','desc');
		$query= $this->db->get('fbblogmain');
		$data=$query->result_array();	
		return($data)?$data:false;
		}
		
		function topusercategory($cat)
		{
		$this->db->select('name');
		$this->db->where('category',$cat);
		$quersy=$this->db->get('category');
		$rmid=$quersy->result_array();
		$mid='';
		$int='';
		if(!($quersy->num_rows()== 0))
		{
			foreach($rmid as $m)
			{
				$mid.="'".$m['name']."',";
			}
			$mid=rtrim($mid,',');
			$int=' fb.category in('.$mid.')';
		}
		$query=$this->db->query("SELECT fb.userid, (select fullname from customer c where c.userid= fb.userid) as name,  (select c.photo from customer c where c.userid= fb.userid) as photo FROM `fbblogmain` as fb where $int and fb.userid != 0 GROUP BY fb.userid HAVING COUNT(fb.userid) >= 1 order by COUNT(fb.category) desc limit 5");
		$data=$query->result_array();
		return($data)?$data:false;
	}
		
function postcategory($cat, $limit, $start){
	
	$this->db->select('name');
	$this->db->where('category',$cat);
	$quersy=$this->db->get('category');
	$rmid=$quersy->result_array();
	$mid='';
	$int="maincat like '%$cat%'";
	if(!($quersy->num_rows()== 0))
	{
			foreach($rmid as $m)
			{
				$mid.="'".$m['name']."',";
			}
			$mid=rtrim($mid,',');
			$int="and (fb.category in(".$mid.") or maincat like '%$cat%' )";
	}
	$query=$this->db->query("SELECT fb.*, (select c.fullname from customer c where c.userid= fb.userid) as fulnm, (select c.photo from customer c where c.userid= fb.userid) as cphto FROM `fbblogmain` as fb where fb.status = 1 and fb.shareas = 1 $int group by id order by id desc limit $start, $limit");
	
		$data=$query->result_array();
		return($data)?$data:false;
	}
function postcategorytopic($nam, $limit, $start){
	
	$query=$this->db->query("SELECT fb.*, (select c.fullname from customer c where c.userid= fb.userid) as fulnm, (select c.photo from customer c where c.userid= fb.userid) as cphto FROM `fbblogmain` as fb where fb.status = 1 and fb.shareas = 1 and fb.category like '%$nam%'  group by id order by id desc limit $start, $limit");
	
		$data=$query->result_array();
		return($data)?$data:false;
	}
function postcategoryuser($cat,$userid, $limit, $start){
	
	$query=$this->db->query("SELECT fb.*, (select c.fullname from customer c where c.userid= fb.userid) as fulnm, (select c.photo from customer c where c.userid= fb.userid) as cphto FROM `fbblogmain` as fb where fb.shareas = 1 and fb.userid like '%$userid%' and fb.maincat like '%$cat%'  group by id order by id desc limit $start, $limit");
	
		$data=$query->result_array();
		return($data)?$data:false;
	}

function postcategorybord($cat, $limit, $start){
	
	$this->db->select('*');
	$this->db->where('boardname',$cat);
	$this->db->where('status','1');

	$this->db->where('shareas', '1');
	$this->db->order_by('id','desc');
	$this->db->limit($limit, $start);
	$quersy=$this->db->get('fbblogmain');
	$data=$quersy->result_array();
		
	return($data)?$data:false;
	}
function postcategorysubbord($sboid, $limit, $start){
	
	$this->db->select('*');
	$this->db->where('subboardname',$sboid);
	$this->db->where('status','1');

	$this->db->where('shareas', '1');
	$this->db->order_by('id','desc');
	$this->db->limit($limit, $start);
	$quersy=$this->db->get('fbblogmain');
	$data=$quersy->result_array();
		
	return($data)?$data:false;
	}

	function countbordpost($cat){
	
		$this->db->select('*');
		$this->db->where('boardname',$cat);
		$query=$this->db->get('fbblogmain');
		$query =  $query->num_rows();
		return $query ; 
	}
function getlikecount($id){
	
		$this->db->select('*');
		$this->db->where('postid',$id);
		$query=$this->db->get('post_like');
		$data =  $query->num_rows();
	return($data)?$data:false;
	}
function selectinterest($uid)
{
	$this->db->select('*');
		$this->db->where('userid',$uid);
		$query=$this->db->get('follow_category');
		$data=$query->result_array();
			return($data)?$data:false;

}
	
	function countofcatposr($cat){
		$this->db->select('name');
		$this->db->where('category',$cat);
		$quersy=$this->db->get('category');
		$rmid=$quersy->result_array();
		$mid='';
		$int='';
		if(!($quersy->num_rows()== 0))
		{
			foreach($rmid as $m)
			{
				$mid.="'".$m['name']."',";
			}
			$mid=rtrim($mid,',');
			$int='fb.category in('.$mid.')';
	}
	$query=$this->db->query("SELECT * FROM `fbblogmain` as fb where $int");
		$query =  $query->num_rows();
		return $query ;  
		}
		function countofuserpost($uid){
		$this->db->select('id');
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
			$int='fb.userid in('.$mid.')';
	}
	$query=$this->db->query("SELECT * FROM `fbblogmain` as fb where $int");
		$query =  $query->num_rows();
		return $query ;  
		}
	
		function countofcatfoll($cat){
		$this->db->select('id');
	$this->db->where('category',$cat);
	$quersy=$this->db->get('category');
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
			$int='fc.catid in('.$mid.')';
	}
	$query=$this->db->query("SELECT * FROM `follow_category` as fc where $int");
		$query =  $query->num_rows();
		return $query ;  
		}
	function countofuserfoll($uid){
		/*$this->db->select('id');
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
	}*/
	$query=$this->db->query("SELECT * FROM `follow_user` where usid='$uid'");
		$query =  $query->num_rows();
		return $query ;  
		}
		
	function countfollowing($uid)
	{$query=$this->db->query("SELECT * FROM `follow_user` where userid='$uid'");
		$query =  $query->num_rows();
		return $query ;  
		}
	function countofbordfoll($cat){
	$cat=str_replace("%20"," ",$cat);
		$this->db->select('bid');
	$this->db->where('bordname',$cat);
	$quersy=$this->db->get('user_board');
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
			$int='fb.boardid in('.$mid.')';
	}
	$query=$this->db->query("SELECT * FROM `follow_board` as fb where $int");
		$query =  $query->num_rows();
		return $query ;  
		}
		
		function fetchcatid($catn)
		{
			$this->db->select('*');
	$this->db->where('category',$catn);
	$quersy=$this->db->get('category');
	$data=$quersy->result_array();
			return($data)?$data:false;


		}
		function insertfol($fid,$uid)
{ $data=array('userid'=>$fid,
				'usid'=>$uid);
	$a=$this->db->insert('follow_user',$data);
	return $a;
}
	function topicboard($cat){
		$this->db->select('category');
	$this->db->where('boardname',$cat);
	$quersy=$this->db->get('fbblogmain');
	$rmid=$quersy->result_array();
	$mid='';
	$int='';
	if(!($quersy->num_rows()== 0))
	{
			foreach($rmid as $m)
			{
				$mid.="'".$m['category']."',";
			}
			$mid=rtrim($mid,',');
				}
		return $mid ;  
		}
		
	function catlist(){
		
		$this->db->select('*');
		$this->db->group_by('category');
		$query= $this->db->get('category');
		$data=$query->result_array();	
		return($data)?$data:false;
		}
	function bordlist(){
		
		$uid=$this->session->userdata['user_id'];
		
		$this->db->select('*');
		$this->db->where('userid', $uid);
		
		$query= $this->db->get('user_board');
		$data=$query->result_array();	
		return($data)?$data:false;
		}
		
	function alltopicofcategory($cat, $topic)
	{
		$this->db->select('*');
		$this->db->distinct();
		$this->db->where('category', $cat);
		$this->db->like('name', $topic);
		$query=$this->db->get('category');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function allcategory($cat)
	{
		$this->db->select('category');
		$this->db->distinct();
		$this->db->like('category', $cat);
		$query=$this->db->get('category');
		$data=$query->result_array();
		return($data)?$data:false;
	}
	function selectusercategoryfollow($usid){
	
		$query=$this->db->query("select f.catid,(select c.category from category c where c.category=f.catid) as cat from follow_category f where f.userid=$usid");
		$data=$query->result_array();
		return($data)?$data:false;
		}

	function showpostschedule($id){
		$this->db->select('*');
		$this->db->where('userid', $id);
		$this->db->where('status','4');

		$this->db->order_by('id','desc');
		$query= $this->db->get('fbblogmain');
		$data=$query->result_array();	
		return($data)?$data:false;
		}

function getsubbod4($boid)
{
		$this->db->select('*');
		$this->db->where('boardid', $boid);
		$this->db->limit(5);
		$query= $this->db->get('subboard');
		$data=$query->result_array();	
		return($data);
	
	
}

function getcomment($bid)
{
		
		
		$query= $this->db->query("Select * from post_coment where postid='$bid'");
		$data=$query->result_array();	
		return($data);
	
	
}
function getsubbodafter($boid)
{
		$this->db->select('*');
		$this->db->where('boardid', $boid);
		 $this->db->limit(9999999999999, 5);
		$query= $this->db->get('subboard');
		$data=$query->result_array();	
		return($data);
	
	
}

}
?>