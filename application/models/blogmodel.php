<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Blogmodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function countBlog()
	{
		$count=$this->db->count_all('blog');
		return $count;
	}
	function countSelectedBlog($id)
	{
		$this->db->select('COUNT(*)');
		$this->db->where('businessCategory',$id);
		$query=$this->db->get('blog');
		$data=$query->result_array();
		return($data)?$data[0]['COUNT(*)']:false;
	}
	public function fetch_blog($limit, $start) {
        $this->db->limit($limit, $start);
		$this->db->where('status','1');
		$this->db->order_by('id','desc');
        $query = $this->db->get("blog");
		$data=$query->result_array();
		return($data)?$data:false;        
   }
   public function fetchSelectedblog($limit,$start,$id) {
		$this->db->limit($limit,$start);
		$this->db->where('status','1');
		$this->db->where('businessCategory',$id);
		$query = $this->db->get("blog");
		$data=$query->result_array();
		return($data)?$data:false;        
   }
    public function saveComment()
    {		
		$add=array(
		'userId'=>$this->session->userdata('user_id'),
		'blogId'=>$_POST['blogId'],
		'commentText'=>$_POST['commentText'],
		);
		$this->db->insert('comments',$add);
		return 1;
	}
	public function findComment($blogId)
	{
		$this->db->where('blogId',$blogId);
		$this->db->where('status','1');
		$this->db->from('comments');
		echo $this->db->count_all_results();		
	}
	 public function saveBrowsePhotoComment()
    {		
		$add=array(
		'userId'=>$this->session->userdata('user_id'),
		'blogId'=>$_POST['blogId'],
		'commentText'=>$_POST['commentText'],
		);
		$this->db->insert('comments',$add);
		return 1;
	}
	function follower()
	{	$this->db->select('email');
		$this->db->where('email',$_POST['email']);
		$query=$this->db->get('blog_follow');
		$data=$query->result_array();
		if($query->num_rows() > 0)
		{
		return false;
		}
		else
		{
		$arr=array('email'=>$_POST['email']);
		$this->db->insert('blog_follow',$arr);
		return true;
		}
	}
	
	function fetchpost($cat)
	{
		$this->db->select('p.*, upf.photo, us.*');
		$this->db->from('user_profiles as upf, users as us, post as p');
		$this->db->join('users', 'upf.user_id = us.id');
		$this->db->join('user_profiles', 'upf.user_id = p.userid');
		$this->db->join('post', 'us.id = p.userid');
		$this->db->limit(5);
		$this->db->where('p.category',$cat);
		$this->db->group_by('p.postid');
		$this->db->order_by('postid', 'DESC');
		$queary=$this->db->get();
		
		$data=$queary->result_array();
		return($data)?$data:false;  
	}
	function fetchcomnt($id)
	{
		$this->db->select('*, upf.photo, us.*');
		$this->db->from('user_profiles as upf, users as us, post_coment as p');
		$this->db->join('users', 'upf.user_id = us.id');
		$this->db->join('user_profiles', 'upf.user_id = p.userid');
		$this->db->join('post_coment', 'us.id = p.userid');
		$this->db->where('p.postid',$id);
		$this->db->group_by('p.cmtid');
		$queary=$this->db->get();
		$data=$queary->result_array();
		return($data)?$data:false; 
	}
	function trandsofblog()
	{
		$query=$this->db->query("SELECT g.post, g.postid, COUNT(m.postid) AS members FROM post AS g LEFT JOIN post_like AS m ON g.postid = m.postid GROUP BY g.postid HAVING members >= 1 order by members desc limit 5");
		$data=$query->result_array();
		return($data)?$data:false;
		}
	function fblogtranding()
	{
		$query=$this->db->query("SELECT g.intro, g.id, COUNT(m.fbblogid) AS members FROM fbblogmain AS g LEFT JOIN fbblog_like AS m ON g.id = m.fbblogid GROUP BY g.id HAVING members >= 1 order by members desc limit 5");
		$data=$query->result_array();
		return($data)?$data:false;
		}
	function topsalonblog()
	{
		$query=$this->db->query("SELECT userid, COUNT(*) FROM `post_coment` GROUP BY userid HAVING COUNT(userid) >= 1 order by COUNT(userid) DESC limit 5");
		$data=$query->result_array();
		return($data)?$data:false;
		}
			
	function browphotoimage()
	{
		$query=$this->db->query("SELECT * FROM `lookbook_customer` group BY `lookbook_customer`.`categorypic` ORDER BY `createdOn` DESC");
		$data=$query->result_array();
		return($data)?$data:false;
		}
		
		
		function fetchlastcomnt($id, $lvl)
	{
		if($lvl == '2'){
		$this->db->select('p.*, upf.salonName as name, upf.merchantId as id, upf.photo as photo');
		$this->db->from('merchant as upf, post_coment as p');
		$this->db->join('merchant', 'upf.merchantId = p.userid');
		$this->db->where('p.cmtid',$id);
		$this->db->group_by('p.cmtid');
		$queary=$this->db->get();
		$data=$queary->result_array();
		return($data)?$data:false; 
		}
		else{
		$this->db->select('p.*, upf.fullname as name, upf.userId as id, upf.photo as photo');
		$this->db->from('customer as upf,  post_coment as p');
		$this->db->join('customer', 'upf.userId = p.userid');
		$this->db->where('p.cmtid',$id);
		$this->db->group_by('p.cmtid');
		$queary=$this->db->get();
		$data=$queary->result_array();
		return($data)?$data:false; 
	}}
	
	function fetchlastcomntcnt($id, $lvl)
	{
		if($lvl == '2'){
		$this->db->select('p.*, upf.salonName as name, upf.merchantId as id, upf.photo as photo');
		$this->db->from('merchant as upf, coment_coment as p');
		$this->db->join('merchant', 'upf.merchantId = p.userid');
		$this->db->where('p.ccid',$id);
		$this->db->group_by('p.ccid');
		$queary=$this->db->get();
		$data=$queary->result_array();
		return($data)?$data:false; 
		}
		else{
		$this->db->select('p.*, upf.fullname as name, upf.userId as id, upf.photo as photo');
		$this->db->from('customer as upf,  coment_coment as p');
		$this->db->join('customer', 'upf.userId = p.userid');
		$this->db->where('p.ccid',$id);
		$this->db->group_by('p.ccid');
		$queary=$this->db->get();
		$data=$queary->result_array();
		return($data)?$data:false; 
	}
	}
	
	function fetchuserpost($id){
	
	$this->db->select('*');
	$this->db->where('postid', $id);
	$queary=$this->db->get('post');
	$data=$queary->result();
	//print_r($data);
	return($data)?$data:false; 
	
	}
	function blogwithsearch($start, $end, $vl)
	{
		$query=$this->db->query("SELECT `post`.* FROM `post` join `post_coment` on `post_coment`.postid = `post`.postid where `post`.post like '%$vl%' or `post_coment`.comment like '%$vl%' GROUP BY `post`.postid order by (`post`.postid) DESC limit $start, $end");
		return $query->result() ;
		}

	
//--------Ratnesh code Start-------------		
function fetchlastfbcomnt($id, $lvl)
	{
		if($lvl == '2'){
		$this->db->select('p.*, upf.salonName as name, upf.merchantId as id, upf.photo as photo');
		$this->db->from('merchant as upf, fbblog_comment as p');
		$this->db->join('merchant', 'upf.merchantId = p.userid');
		$this->db->where('p.cmtid',$id);
		$this->db->group_by('p.cmtid');
		$queary=$this->db->get();
		$data=$queary->result_array();
		return($data)?$data:false; 
		}
		else{
		$this->db->select('p.*, upf.fullname as name, upf.userId as id, upf.photo as photo');
		$this->db->from('customer as upf,  fbblog_comment as p');
		$this->db->join('customer', 'upf.userId = p.userid');
		$this->db->where('p.cmtid',$id);
		$this->db->group_by('p.cmtid');
		$queary=$this->db->get();
		$data=$queary->result_array();
		return($data)?$data:false; 
	}}		

public function uplo_image_com($dat)
{
    $date=date('Y-m-d');
$in=$this->db->insert('fbblog',$dat);
 $insert_id = $this->db->insert_id();
 
 return true;
}
//get_id function model







public function get_val()
{
$q=$this->db->get('fbblog');
$subq=$this->$q->result_array();
	return $subq;
}

public function fbblog_fbmain($limit, $start)
{
	$this->db->limit($limit, $start);
	$this->db->order_by('id','DESC');
$query=$this->db->get('fbblogmain');
$subquery=$query->result_array();

return $subquery;

}
public function getfbblog($id)
{
$this->db->where('id',$id);
$query=$this->db->get('fbblogmain');
$subquery=$query->result_array();

return $subquery;

}
public function getfbblog1stimg($id)
{
$this->db->where('id',$id);
$query=$this->db->get('fbblogmain');
$subquery=$query->result_array();

return $subquery;

}
function fetchfbblog(){

$this->db->select('id, category');
$q=$this->db->get('fbblogmain');
$subq=$this->$q->result_array();
	return $subq;

}

function fetchfbblogsb(){

$q=$this->db->get('fbblog');
$subq=$this->$q->result_array();
	return $subq;
}	
public function get_data($id)	
	{
		$this->db->where('title',$id);
		
		$qurt=$this->db->get('fbblog');
		$squ=$qurt->result_array();
		return $squ;
	
	}
	/*public function get_data_co($id)	
	{
	$this->db->where('title',$id);
		$qurt=$this->db->query('select count(*)from fbblogmain');
		$squ=$qurt->result_array();
		return $squ;
	
	}*/
function fbblogwithsearch($start, $end, $vl)
	{
		$query=$this->db->query("SELECT `fbblogmain`.* FROM `fbblogmain` left join `fbblog` on `fbblog`.title = `fbblogmain`.id left join `fbblog_comment` on `fbblog_comment`.fbblogid = `fbblogmain`.id where `fbblogmain`.intro like '%$vl%' or `fbblog_comment`.comment like '%$vl%' or `fbblog`.description like '%$vl%' GROUP BY `fbblogmain`.id order by (`fbblogmain`.id) DESC limit $start, $end");
		return $query->result_array() ;
		}
		
function fbwithwhere($table,$cnt, $start, $wr)
	{
	 	$this->db->select('*');
		$this->db->limit($cnt, $start);
		$this->db->from($table);
		$this->db->where('category', $wr);
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		return $query->result_array() ;  
	}
		
//-------------------Ratnesh code end--------		
}	 


