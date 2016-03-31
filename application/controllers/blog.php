<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');ob_start();

class Blog extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('blogmodel');
		$this->load->library('cart');
		$this->load->helper('form');
		$this->load->model('usermodel');
	
		$userlevel=$this->session->userdata('user_level');
		$this->userLevel=$userlevel;
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
		}
	}

	public function comment()
	{	
		$user=($this->session->userdata);
		
		$date=date("d/m/Y H:i:s");
		$datapost['comment']=nl2br($this->input->post('cnttext'));
		$datapost['userid']=$this->input->post('usersid');
		$datapost['postid']=$this->input->post('post_id');
		$datapost['datetm']=$date;
		$this->usermodel->insert_data('post_coment',$datapost);
		//redirect($_SERVER['HTTP_REFERER']);
		$id=$this->db->insert_id();
		$lvl='4';
		$cmt=$this->blogmodel->fetchlastcomnt($id, $lvl);
		if($cmt)
		{
			$id=$this->db->select('userid')->where('postid',$datapost['postid'])->get('post');
			$uids=$id->result();
			if($datapost['userid']==$uids[0]->userid)
			{
				foreach($cmt as $vl){
		if($vl['photo']){$ph=base_url().'assets/images/merchant/'.$vl['photo']; }
		else{$ph=base_url().'assets/images/merchant/usericon.jpg'; }
	
				
		$val='<li class="comment" id="comentli'.$vl['cmtid'].'" style="border-bottom:solid 1px #CCC"><div class="wrap"><a href="'.base_url().'userprofile/'.$vl['id'].'"><img class="avatar" src="'.$ph.'" style="height:25px; width:25px"/><div class="info clearfix"><div class="user-info"><div class="name">'.$vl['name'].'</div></div></a><time>0 Min. <a href="#" class="close deletecomment" rel="'.$vl['cmtid'].'" style="margin-left:2px">&times;</a></time></div><div class="content">'.$vl['comment'].'</div><div class="info clearfix"><div style="float:left"><a  href="#" id="likecmt'.$vl['cmtid'].'" class="btn-like likecoment" rel="'.$vl['cmtid'].'" ref="'.$vl['id'].'"> Like </a><a id="unlikecmt'.$vl['cmtid'].'" href="#" rel="'.$vl['cmtid'].'" class="btn-like unlikecoment" style="display:none"> Unlike </a><span id="spancount'.$vl['cmtid'].'"> 0</span>&nbsp;&sdot; </div></div></div> </li>';
	
	
		}
	
				}
			else{	
			$uid=$this->session->userdata('user_id');
		$datared['note']='Earn points for answering a Beauty Question';
		$datared['userid']=$uid;
		$datared['date']=date("d F Y");
		$datared['point']=50;
			
			$vals=$this->usermodel->insert_data('reward_user',$datared);
			if($vals)
			{ 
				$que=$this->db->select_sum('point','point')->where('userid',$uid)->get('reward_user');
				$dt=$que->result();
				if($dt[0]->point){
					$dataid['id']=$uid;
					$dataimsg['reward']=$dt[0]->point;
					$re=$this->usermodel->updatedata($dataid,$dataimsg,'users');
					if($re){

	foreach($cmt as $vl){
		if($vl['photo']){$ph=base_url().'assets/images/merchant/'.$vl['photo']; }
		else{$ph=base_url().'assets/images/merchant/usericon.jpg'; }
	if($lvl=='4')
		{
				
		$val='<li class="comment" id="comentli'.$vl['cmtid'].'" style="border-bottom:solid 1px #CCC"><div class="wrap"><a href="'.base_url().'userprofile/'.$vl['id'].'"><img class="avatar" src="'.$ph.'" style="height:50px; width:50px"/><div class="info clearfix"><div class="user-info"><div class="name">'.$vl['name'].'</div></div></a><time>0 Min. <a href="#" class="close deletecomment" rel="'.$vl['cmtid'].'" style="margin-left:2px">&times;</a></time></div><div class="content">'.$vl['comment'].'</div><div class="info clearfix"><div style="float:left"><a  href="#" id="likecmt'.$vl['cmtid'].'" class="btn-like likecoment" rel="'.$vl['cmtid'].'" ref="'.$vl['id'].'"> Like </a><a id="unlikecmt'.$vl['cmtid'].'" href="#" rel="'.$vl['cmtid'].'" class="btn-like unlikecoment" style="display:none"> Unlike </a><span id="spancount'.$vl['cmtid'].'"> 0</span>&nbsp;&sdot; </div><div ><a rel="cr'.$vl['cmtid'].'" class="btn-like replybtn"> Reply</a></div></div><div><ul class="comments-list" id="cnt'.$vl['cmtid'].'"></ul></div><div id="cr'.$vl['cmtid'].'" hidden=""><form  class="replyform"  style="padding-top:10px" ref="'.$vl['cmtid'].'"><input type="text" id="cntrepl" name="cntrepl" class="form-control mention scmsnt" placeholder="Write something..." style="overflow: hidden; word-wrap: break-word; resize: none; height: 56px;width: 99%;"/><input type="hidden" value="'.$vl['id'].'" name="userxsid" id="user_id"/><input type="hidden" value="'.$vl['cmtid'].'" name="conemt_id" id="conemt_id"/><button type="submit" id="postsubmit" name="comentsubmit" class="btn btn-primary btn-sm pull-right" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/></form></div></div> </li>';
		}
	else{
		
		$val='<li class="comment" id="comentli'.$vl['cmtid'].'" style="border-bottom:solid 1px #CCC"><div class="wrap"><a href="'.base_url().'merchant/Salon/'.$vl['id'].'"><img class="avatar" src="'.$ph.'" style="height:50%; width:7%"/><div class="info clearfix"><div class="user-info"><div class="name">'.$vl->name.'</div></div></a><time>0 Min. <a href="#" class="close deletecomment" rel="'.$vl['cmtid'].'" style="margin-left:2px">&times;</a></time></div><div class="content">'.$vl['comment'].'</div><div class="info clearfix"><div><a  href="#" id="likecmt'.$vl['cmtid'].'" class="btn-like likecoment" rel="'.$vl['cmtid'].'" ref="'.$vl['id'].'"> Like </a><a id="unlikecmt'.$vl['cmtid'].'" href="#" rel="'.$vl['cmtid'].'" class="btn-like unlikecoment" style="display:none"> Unlike </a><span id="spancount'.$vl['cmtid'].'"> 0</span>&nbsp;&sdot; </div><div ><a rel="cr'.$vl['cmtid'].'" class="btn-like replybtn"> Reply</a></div></div><div><ul class="comments-list" id="cnt'.$vl['cmtid'].'"></ul></div><div id="cr'.$vl['cmtid'].'" hidden=""><form  class="replyform"  style="padding-top:10px" ref="'.$vl['cmtid'].'"><input type="text" id="cntrepl" name="cntrepl" class="form-control mention scmsnt" placeholder="Write something..." style="overflow: hidden; word-wrap: break-word; resize: none; height: 56px;width: 99%;"/><input type="hidden" value="'.$vl['id'].'" name="userxsid" id="user_id"/><input type="hidden" value="'.$vl['cmtid'].'" name="conemt_id" id="conemt_id"/><button type="submit" id="postsubmit" name="comentsubmit" class="btn btn-primary btn-sm pull-right" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/></form></div></div> </li>';
		}	
		}
				
					}}}}
					}
					echo ($val);
		}
		
	function likepost()
	{	
	$user=($this->session->userdata);
	$flw['fbblogid']=$_POST['id'];
	$flw['userid']=$user['user_id'];
	
			
	$ar=$this->usermodel->insert_data('fbblog_like',$flw);
	echo 'true' ; 
	}
	function unlikepost()
	{	
	$flw['postid']=$this->uri->segment(3);
	$flw['userid']=$this->uri->segment(4);
	if(!$flw['userid'])
		{
			echo ('<script>alert("Please Login First.");
		window.location.href="'.$_SERVER['HTTP_REFERER'].'";</script>');
			}
		else{
	$this->usermodel->deletedt('post_like',$flw);	
	redirect($_SERVER['HTTP_REFERER']);
		}
	}
	function likecmt()
	{	
	$user=($this->session->userdata);
	$flw['comentid']=$_POST['id'];
	$flw['userid']=$user['user_id'];

	$flwid=$_POST['pid'];
	//$rid=$this->uri->segment(6);
	
		
	$cmt=$this->usermodel->insert_data('coment_like',$flw);
	if($cmt)
		{	
			//$uid=$this->session->userdata('user_id');
			$id=$this->db->select('userid')->where('postid',$flwid)->get('post');
			$uids=$id->result();
			$cid=$this->db->select('userid')->where('cmtid',$flw['comentid'])->get('post_coment');
			$cuids=$cid->result();
			//echo $uids[0]->userid;
			
			if($flw['userid']==$uids[0]->userid)
			{
		
		$datared['note']='Answer Given By You Is Liked By The Person Who Asked The Question';
		$datared['userid']=$cuids[0]->userid;
		$datared['date']=date("d F Y");
		$datared['point']=100;
			$vals=$this->usermodel->insert_data('reward_user',$datared);
			if($vals)
			{
				$que=$this->db->select_sum('point','point')->where('userid',$cuids[0]->userid)->get('reward_user');
				$dt=$que->result();
				if($dt[0]->point){
					$dataid['id']=$cuids[0]->userid;
					$dataimsg['reward']=$dt[0]->point;
					$re=$this->usermodel->updatedata($dataid,$dataimsg,'users');
					if($re){
	echo "done";
	//redirect($_SERVER['HTTP_REFERER']);	
					}}}
			else{	
			
	echo "done";
	}}}
	}
	function unlikecmt()
	{	
	$user=($this->session->userdata);
	$flw['comentid']=$_POST['id'];
	$flw['userid']=$user['user_id'];
	
	$this->usermodel->deletedt('coment_like',$flw);	
	//redirect($_SERVER['HTTP_REFERER']);
	echo 'done';
	}
	
public function catfilter()
{ $user=($this->session->userdata);
	
		$result['post']=$this->blogmodel->fetchpost($_POST['category']);
		// $result['que']=$this->db->last_query();
			$i=0;
			foreach($result['post'] as $value)
			{    $p=0;
				$recommend=$this->blogmodel->fetchcomnt($value['postid']);
				$result['coment'][$value['postid']]=$recommend;
				//$result['que']=$this->db->last_query();
					}
				
				$i++;
			//$xml = new SimpleXMLElement('<root/>');
			//array_walk_recursive($result, array ($xml, 'addChild'));
			//echo $xml->asXML();
			echo json_encode($result);
		
	
	}
public function commentreviw()
	{	
		if(!$this->input->post('usersid'))
		{
			echo ('<script>alert("Please Login For comment.");
		window.location.href="'.$_SERVER['HTTP_REFERER'].'";</script>');
			}
		else{
		//$date=date("d/m/Y H:i:s");
		$datapost['comment']=$this->input->post('cmttext');
		if($this->session->userdata('user_level')!=2) {
		$datapost['userId']=$this->input->post('usersid');
		}else
		$datapost['merchantId']=$this->input->post('usersid');
		$datapost['reviewid']=$this->input->post('review_id');
		//$datapost['datetm']=$date;
		$this->usermodel->insert_data('review_comment',$datapost);
		redirect($_SERVER['HTTP_REFERER']);
		}
		
		}

	/*
	public function findAllBlog()
	{		
		$data['pageName']='blog';
		$count=$this->blogmodel->countBlog();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'/blog/findAllBlog';
		$config['total_rows'] = $count;
		$config['per_page'] = 6; 
		$config['uri_segment'] = 3;	
		// $config['first_link'] = "&lt;&lt; First";
		// $config['last_link'] = "Last &gt;&gt;";	
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next &rarr;';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&larr; Previous';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		$config['full_tag_open'] = "<div class='pagination-wrapper'>
				<ul class='pagination'>";
		$config['full_tag_close'] = "</ul></div>";
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['blogDetail'] = $this->blogmodel->fetch_blog($config["per_page"], $page);
		$data['links'] = $this->pagination->create_links();
		$this->layout->view('blog',$data);
	}
	public function findSelectedBlog($id)
	{		
		$data['pageName']='blog';
		$count=$this->blogmodel->countSelectedBlog($id);
		$this->load->library('pagination');
		$get = $this->uri->segment(3);
		$config['base_url'] = base_url().'/blog/findSelectedBlog/'.$get;
		$config['total_rows'] = $count;
		$config['per_page'] = 6; 
		$config['uri_segment'] = 4;	
		$config['first_link'] = "&lt;&lt; First";
		$config['last_link'] = "Last &gt;&gt;";	
		$config['full_tag_open'] = "<div class='pagination-wrapper'>
				<ul class='pagination'>";
		$config['full_tag_close'] = "</ul></div>";
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['blogDetail'] = $this->blogmodel->fetchSelectedblog($config["per_page"],$page,$id);
		$data['links'] = $this->pagination->create_links();
		$this->layout->view('blog',$data);
	}*/
	public function saveComment(){
		$result=$this->blogmodel->saveComment();
		if($result)
		{
			echo 'success';
		}
	}
	public function saveBrowsePhotoComment(){
		$result=$this->blogmodel->saveBrowsePhotoComment();
		if($result)
		{
			echo 'success';
		}
	}
	function follower()
	{
		$result=$this->blogmodel->follower();
		echo $result;
	}
	
	function add_lookbookmurchant()
	{
			$this->load->library('image_lib');

		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		$phf=$this->input->post('photofor');
		$youtb=$this->input->post('youtub');
		$hshtag=$this->input->post('hshtag');
		$des=$this->input->post('descrption');
		$comnt=$this->input->post('comennts');
		$cat=$this->input->post('catfor');
		$userLevel=$this->session->userdata('user_level');
		$uid=$this->session->userdata('user_id');
		if(isset($youtb))
		{
			$link = $youtb;
$video_id = explode("?v=", $link); // For videos like http://www.youtube.com/watch?v=...
if (empty($video_id[1]))
    $video_id = explode("/v/", $link); // For videos like http://www.youtube.com/watch/v/..

$video_id = explode("&", $video_id[1]); // Deleting any other params
$video_id = $video_id[0];
			}
		
		if($userLevel==4)
		{
			 
			if($_FILES['photo']){		
		$files = $_FILES;
    $cpt = count($_FILES['photo']['name']);

    for($i=0; $i<$cpt; $i++)
    {		
	$config['upload_path'] = './assets/images/merchant/browsphoto/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '3000';
		$config['max_width']  = '10240';
		$config['max_height']  = '7680';
		$this->load->library('upload', $config);
		//print_r($files['photo']['name'][$i]);

        $_FILES['photo']['name']= $files['photo']['name'][$i];
        $_FILES['photo']['type']= $files['photo']['type'][$i];
        $_FILES['photo']['tmp_name']= $files['photo']['tmp_name'][$i];
        $_FILES['photo']['error']= $files['photo']['error'][$i];
        $_FILES['photo']['size']= $files['photo']['size'][$i];    



    $this->upload->initialize($config);
   // $this->upload->do_upload('photo');


   

	if ( !$this->upload->do_upload('photo'))
		{ 
		echo ('<script>alert("'.preg_replace('/(\n)+/m', ' ', strip_tags($this->upload->display_errors())).'");
		window.location.href="'.base_url().'browsePhoto";</script>');
		//redirect(base_url()."blog/findAllBlog");
		
		}
	else{
	
		$data = $this->upload->data();
			
		 $config = array(
    'source_image'      => $data['full_path'],
    'new_image'         => 'thumb_'.$data['file_name'],
    'maintain_ratio'    => false,
    'master_dim'		=> 'width',
	'quality'			=> '80%',
	'height'			=> $data['image_height']/2,
	'width'			=> $data['image_width']/2,
    );
    //here is the second thumbnail, notice the call for the initialize() function again
    $this->image_lib->initialize($config);
    $this->image_lib->resize();
	$dataimg['photo']=$data['file_name'];
	$dataimg['photothum']='thumb_'.$data['file_name'];
				
	}
	
		$lookbook1=$this->usermodel->seeLookupalbumwith('4');
		if($lookbook1)
			{ //print_r($lookbook1[0]['id']);
				$dataimg['user_Id']=$uid;
				$dataimg['description']=$des;
				$dataimg['comentdes']=nl2br($comnt);
				$dataimg['categorypic']=$cat;
				$dataimg['youtube']=$video_id;
				$dataimg['hashtag']=$hshtag;
				$dataimg['albumId']=$lookbook1[0]['id'];
				//$dataimg['path']=$data['full_path'];
		
				$val=$this->usermodel->insert_data('lookbook_customer',$dataimg);
				
				$reps['note']='Posting a DIY Tip/Trend in Browse Photo';
				$reps['userid']=$this->session->userdata('user_id');
				$reps['date']=date("d F Y");
				$reps['point']=50;
			$valsz=$this->usermodel->insert_data('reward_user',$reps);
			if($valsz)
			{
				$que=$this->db->select_sum('point','point')->where('userid',$uid)->get('reward_user');
				$dxt=$que->result();
				if($dxt[0]->point){
					$dataidx['id']=$this->session->userdata('user_id');
					$dataimsgx['reward']=$dxt[0]->point;
					$re=$this->usermodel->updatedata($dataidx,$dataimsgx,'users');	
				}
			}

			}

		else{
				//echo('sdfsf');
				$dts['userId']=$uid;
				if($this->usermodel->insert_data('lookupalbum',$dts))
				{
					//echo('qweqweweqwe');
					$lbs=$this->db->insert_id();
					$dataimg['user_Id']=$uid;
					$dataimg['description']=$des;
					$dataimg['categorypic']=$cat;
					$dataimg['albumId']=$lbs;
					$dataimg['photo']=$data['file_name'];
					$dataimg['photothum']='thumb_'.$data['file_name'];
					//$dataimg['path']=$data['full_path'];
	
				$val=$this->usermodel->insert_data('lookbook_customer',$dataimg);
				
				$reps['note']='Posting a DIY Tip/Trend in Browse Photo';
				$reps['userid']=$this->session->userdata('user_id');
				$reps['date']=date("d F Y");
				$reps['point']=50;
			$valsz=$this->usermodel->insert_data('reward_user',$reps);
			if($valsz)
			{
				$que=$this->db->select_sum('point','point')->where('userid',$uid)->get('reward_user');
				$dxt=$que->result();
				if($dxt[0]->point){
					$dataidx['id']=$this->session->userdata('user_id');
					$dataimsgx['reward']=$dxt[0]->point;
					$re=$this->usermodel->updatedata($dataidx,$dataimsgx,'users');	
				}
			}
					}
		}
		}
		}
				redirect('browsePhoto');
		}
		else{
			
		 			
		$files = $_FILES;
    $cpt = count($_FILES['photo']['name']);
	
    for($i=0; $i<$cpt; $i++)
    {		
		//print_r($files['photo']['name'][$i]);
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
   // $this->upload->do_upload('photo');

	if ( !$this->upload->do_upload('photo'))
		{
		echo ('<script>alert("'.preg_replace('/(\n)+/m', ' ', strip_tags($this->upload->display_errors())).'");
		window.location.href="'.base_url().'browsePhoto";</script>');
		//redirect(base_url()."blog/findAllBlog");
		}
	else{
		$data = $this->upload->data();
		 $config = array(
    'source_image'      => $data['full_path'],
    'new_image'         => 'thumb_'.$data['file_name'],
     'maintain_ratio'    => false,
    'master_dim'		=> 'width',
	'quality'			=> '80%',
	'height'			=> $data['image_height']/2,
	'width'			=> $data['image_width']/2,
    );
    //here is the second thumbnail, notice the call for the initialize() function again
    $this->image_lib->initialize($config);
    $this->image_lib->resize();

		$lookbook1=$this->usermodel->seeLookupalbumwith('2');
		if($lookbook1)
			{
				$dataimg['merchantId']=$uid;
				$dataimg['description']=$des;
				$dataimg['categorypic']=$cat;
				$dataimg['albumId']=$lookbook1[0]['id'];
				$dataimg['photo']=$data['file_name'];
				$dataimg['photothum']='thumb_'.$data['file_name'];
				$dataimg['photoOf']='w';
				//$dataimg['path']=$data['full_path'];
		
				$val=$this->usermodel->insert_data('lookbook',$dataimg);
				
			}
		else{
				$dts['userId']=$uid;
				if($this->usermodel->insert_data('lookupalbum',$dts))
				{
					$lbs=$this->db->insert_id();
					$dataimg['merchantId']=$uid;
					$dataimg['description']=$des;
					$dataimg['categorypic']=$cat;
					$dataimg['albumId']=$lbs;
					$dataimg['photo']=$data['file_name'];
					$dataimg['photothum']='thumb_'.$data['file_name'];
					$dataimg['photoOf']='w';
					//$dataimg['path']=$data['full_path'];
	
				$val=$this->usermodel->insert_data('lookbook',$dataimg);
					}
		}
		}
		}
		
			redirect('browsePhoto');
			}
		//echo $this->db->last_query();
		
		}
		private function set_upload_options()
{   
//  upload an image options
 		 $config['upload_path'] = './assets/images/merchant/browsphoto/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '3000';
		$config['max_width']  = '10240';

		$config['max_height']  = '7680';
		$this->load->library('upload', $config);

    return $config;
}
		
		public function postquestion()
	{	
		
		//$date=date("d/m/Y H:i:s");
		$datapost['question']=$this->input->post('posttext');
		$datapost['user_id']=$this->input->post('userid');
		if($this->session->userdata('user_level')!=2) {
		$datapost['userId']=$this->session->userdata('user_id');
		}else
		$datapost['merchantId']=$this->session->userdata('user_id');
		
		//$datapost['datetm']=$date;
		$this->usermodel->insert_data('question',$datapost);
		redirect($_SERVER['HTTP_REFERER']);
		
		
		}
		
		public function commentquestion()
	{	
		if(!$this->input->post('usersid'))
		{
			echo ('<script>alert("Please Login For comment.");
		window.location.href="'.$_SERVER['HTTP_REFERER'].'";</script>');
			}
		else{
		//$date=date("d/m/Y H:i:s");
		$datapost['answer']=$this->input->post('cmttext');
		if($this->session->userdata('user_level')!=2) {
		$datapost['userId']=$this->input->post('usersid');
		}else
		$datapost['merchantId']=$this->input->post('usersid');
		$datapost['queid']=$this->input->post('review_id');
		//$datapost['datetm']=$date;
		$this->usermodel->insert_data('questionanswer',$datapost);
		redirect($_SERVER['HTTP_REFERER']);
		}
		
		}
		
		function likereview()
	{	
	$flw['revid']=$this->uri->segment(3);
	$flw['userId']=$this->uri->segment(4);
	if(!$flw['userId'])
		{
			echo ('<script>alert("Please Login First.");
		window.location.href="'.$_SERVER['HTTP_REFERER'].'";</script>');
			}
		else{
	$this->usermodel->insert_data('reviewlike',$flw);	
	redirect($_SERVER['HTTP_REFERER']);
	}
	}
	function unlikereview()
	{	
	$flw['revid']=$this->uri->segment(3);
	$flw['userId']=$this->uri->segment(4);
	if(!$flw['userid'])
		{
			echo ('<script>alert("Please Login First.");
		window.location.href="'.$_SERVER['HTTP_REFERER'].'";</script>');
			}
		else{
	$this->usermodel->deletedt('reviewlike',$flw);	
	redirect($_SERVER['HTTP_REFERER']);
		}
	}
function likeques()
	{	
	$flw['queid']=$this->uri->segment(3);
	$flw['userId']=$this->uri->segment(4);
	if(!$flw['userId'])
		{
			echo ('<script>alert("Please Login First.");
		window.location.href="'.$_SERVER['HTTP_REFERER'].'";</script>');
			}
		else{
	$this->usermodel->insert_data('questnlike',$flw);	
	redirect($_SERVER['HTTP_REFERER']);
	}
	}
	function unlikeques()
	{	
	$flw['queid']=$this->uri->segment(3);
	$flw['userId']=$this->uri->segment(4);
	if(!$flw['userid'])
		{
			echo ('<script>alert("Please Login First.");
		window.location.href="'.$_SERVER['HTTP_REFERER'].'";</script>');
			}
		else{
	$this->usermodel->deletedt('questnlike',$flw);	
	redirect($_SERVER['HTTP_REFERER']);
		}
	}

public function catfilterbrowsphoto()
{ 
	
		$result[0]=$this->usermodel->getMerchantImagecat($_POST['category']);
		
		$result[1]=$this->usermodel->getcutmrImagecat($_POST['category']);
		
		echo json_encode($result);
}	

function invitefriends(){
		$uid=$this->session->userdata('user_id');
		
		$que1=$this->db->select('ruId')->where('userid',$uid)->like('note','Invite Friends')->get('reward_user');
				$dt1=$que1->result();
				//echo (!count($dt1));
				if(!count($dt1)){
	
	
		$datared['note']='Invite Friends';
		$datared['userid']=$this->session->userdata('user_id');
		$datared['date']=date("d F Y");
		$datared['point']=50;
			$vals=$this->usermodel->insert_data('reward_user',$datared);
			if($vals)
			{
				$que=$this->db->select_sum('point','point')->where('userid',$uid)->get('reward_user');
				$dt=$que->result();
				if($dt[0]->point){
					$dataid['id']=$this->session->userdata('user_id');
					$dataimsg['reward']=$dt[0]->point;
					$re=$this->usermodel->updatedata($dataid,$dataimsg,'users');	
				}
			}
			return true;
			}
			else{
			return true;
}
}

function likelukbok()
	{	$tbl=$this->uri->segment(3);
	$flw['lid']=$this->uri->segment(4);
	$flw['uid']=$this->uri->segment(5);
	
	if(!$flw['uid'])
		{
			echo ('<script>alert("Please Login First.");
		window.location.href="'.$_SERVER['HTTP_REFERER'].'";</script>');
			}
		else{
			$quxe=$this->db->select('*')->where($flw)->get($tbl);
				$dtx=$quxe->result();
			//	print_r($dtx);
		if(count($dtx)){
			$this->usermodel->deletedt($tbl,$flw);	
			$que=$this->db->select('*')->where('lid',$flw['lid'])->get($tbl);
				$dt=$que->result();
				if($dt){
					$dataid['id']=$flw['lid'];
					$dataimsg['likecount']=count($dt);
					$re=$this->usermodel->updatedata($dataid,$dataimsg,'lookbook');	
				}
				else{
						$dataid['id']=$flw['lid'];
					$dataimsg['likecount']=0;
					$re=$this->usermodel->updatedata($dataid,$dataimsg,'lookbook');	
				
					
					}
		}
		else{
	$val=$this->usermodel->insert_data($tbl,$flw);	
	if($val)
			{
				$que=$this->db->select('*')->where('lid',$flw['lid'])->get($tbl);
				$dt=$que->result();
				if($dt){
					$dataid['id']=$flw['lid'];
					$dataimsg['likecount']=count($dt);
					$re=$this->usermodel->updatedata($dataid,$dataimsg,'lookbook');	
				}
			}}
	redirect($_SERVER['HTTP_REFERER']);
	}
	}
	function likelukbokcust()
	{	
	
	$tbl=$this->uri->segment(3);
	$flw['lid']=$this->uri->segment(4);
	$flw['uid']=$this->session->userdata('user_id');
	
	if(!$flw['uid'])
		{
			echo ('<script>alert("Please Login First.");
		window.location.href="'.$_SERVER['HTTP_REFERER'].'";</script>');
			}
		else{
			$quxe=$this->db->select('*')->where($flw)->get($tbl);
				$dtx=$quxe->result();
				//print_r($dtx);
		if(count($dtx)){
			$this->usermodel->deletedt($tbl,$flw);	
			$que=$this->db->select('*')->where('lid',$flw['lid'])->get($tbl);
				$dt=$que->result();
				if($dt){
					$dataid['id']=$flw['lid'];
					$dataimsg['likecount']=count($dt);
					$re=$this->usermodel->updatedata($dataid,$dataimsg,'lookbook_customer');	
				}
				else{
						$dataid['id']=$flw['lid'];
					$dataimsg['likecount']=0;
					$re=$this->usermodel->updatedata($dataid,$dataimsg,'lookbook_customer');	
				
					
					}
		}
		else{
	$val=$this->usermodel->insert_data($tbl,$flw);	
	if($val)
			{
				$que=$this->db->select('*')->where('lid',$flw['lid'])->get($tbl);
				$dt=$que->result();
				if($dt){
					$dataid['id']=$flw['lid'];
					$dataimsg['likecount']=count($dt);
					$re=$this->usermodel->updatedata($dataid,$dataimsg,'lookbook_customer');	
				}
			}}
	redirect($_SERVER['HTTP_REFERER']);

		}
		}

function comentcount(){
	
	$result=$this->usermodel->checkCommentById($_POST['category']);
		
		echo json_encode($result);

	}
	
	public function replycmnt()
	{	
		$user=($this->session->userdata);
		
		
		$datapost['coment']=$this->input->post('cntrepl');
		$datapost['userid']=$this->input->post('userxsid');
		$datapost['cmtid']=$this->input->post('conemt_id');
		
		$this->usermodel->insert_data('coment_coment',$datapost);
		//redirect($_SERVER['HTTP_REFERER']);
		$id=$this->db->insert_id();
		$lvl=$user['user_level'];
		$cmt=$this->blogmodel->fetchlastcomntcnt($id, $lvl);
		
	foreach($cmt as $vl){
		if($vl['photo']){$ph=base_url().'assets/images/merchant/'.$vl['photo']; }
		else{$ph=base_url().'assets/images/merchant/usericon.jpg'; }
	if($lvl=='4')
		{
				
		$val='<li class="comment" style="border-bottom:solid 1px #CCC"><div class="wrap"><a href="'.base_url().'userprofile/'.$vl['id'].'"><img class="avatar" src="'.$ph.'" style="height:50%; width:7%"/><div class="info clearfix"><div class="user-info"><div class="name">'.$vl['name'].'</div></div></a><time>0 Min.</time></div><div class="content">'.$vl['comment'].'</div><div class="info clearfix"><div><a href="'.base_url().'blog/likecmt/'.$vl['cmtid'].'/'.$vl['id'].'" class="btn-like">Like</a><span> 0</span></div></div></div></li>';
		}
	else{
		
		$val='<li class="comment" style="border-bottom:solid 1px #CCC"><div class="wrap"><a href="'.base_url().'merchant/Salon/'.$vl['id'].'"><img class="avatar" src="'.$ph.'" style="height:50%; width:7%"/><div class="info clearfix"><div class="user-info"><div class="name">'.$vl->name.'</div></div></a><time>0 Min.</time></div><div class="content">'.$vl['comment'].'</div><div class="info clearfix"><div><a href="'.base_url().'blog/likecmt/'.$vl['cmtid'].'/'.$vl['id'].'" class="btn-like">Like</a><span> 0</span></div></div></div></li>';
		}	
		}
		echo ($val);
		
		}
function finduserblog($id)
{
	$user=($this->session->userdata);
	$photo=$this->usermodel->fetchuserimage($user['user_id']);
	
	$data['post']=$this->blogmodel->fetchuserpost($id);
	//print_r($data['post']);
	$data['photo']=$photo[0]->photo;
	$data['pageName']='blog1';
	$data['user_id']=$user['user_id'];
	$this->layout->view('blogUser',$data);
	
	
	}

function deletecomentid(){
	$id=$_POST['id'];
	
	$this->db->where('cmtid', $id);
	$this->db->delete('post_coment');

echo true; 
	
	}


/* Ratnesh code start */
	public function fbblog()
	{
	$user=($this->session->userdata);
		if(isset($_REQUEST['searchblog'])){
			$word=$_POST['words'];
			$data['post']=$this->blogmodel->fbblogwithsearch('0','5',$word);
			$data['word']=$word;
			//echo $this->db->last_query();
			}
		else{
			$val=$this->uri->segment(2);
	
	if($val=='Top'){$data['post']=$this->blogmodel->fbblog_fbmain('5','0');}
	elseif($val){$data['post']=$this->blogmodel->fbwithwhere('fbblogmain','5','0',$val);}
	else{
	$data['post']=$this->blogmodel->fbblog_fbmain('5','0');
	}	
	
		}
	$data['user_id']=$user['user_id'];
	
	$data['pageName']="zersynme";
	$this->layout->view('fb_blog',$data);
	}
	
public function fbblogloop($start, $cat)
	{	
	$user=($this->session->userdata);
	if($cat=='all'){
	$data['post']=$this->blogmodel->fbblog_fbmain('2',$start);
	}
	elseif($cat=='Top'){
		$data['post']=$this->blogmodel->fbblog_fbmain('2',$start);
	}
	else{ 
	$data['post']=$this->blogmodel->fbwithwhere('fbblogmain','2',$start, $cat);
	}
	$data['pagesno']=$start+2;
	$data['cat']=$cat;
	//$data['word']=$cat;
	// 	$data['salon']=$this->usermodel->mrchantforblog();
	$data['user_id']=$user['user_id'];
	$this->load->view('fb_blogloop',$data);
	}
	
	public function fbblogloopsearch($start, $cat)
	{	
	$user=($this->session->userdata);
	$data['post']=$this->blogmodel->fbblogwithsearch($start,'2', $cat);
	
	$data['pagesno']=$start+2;
	//$data['cat']=$cat;
	$data['word']=$cat;
	// 	$data['salon']=$this->usermodel->mrchantforblog();
	$data['user_id']=$user['user_id'];
	$this->load->view('fb_blogloop',$data);
	}
	
	public function fbuserblog($id){
		$user=($this->session->userdata);
	$data['user_id']=$user['user_id'];
	$data['post']=$this->blogmodel->getfbblog($id);
	$data['fbmeta']=$this->blogmodel->getfbblog1stimg($id);
	$data['pageName']="zersynme";
	//echo $this->db->last_query();
	$this->layout->view('fb_bloguser',$data);
	
	}
	
	public function compost()
	{
		
		
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		if( $this->userLevel==2 || $this->userLevel==1)
		{
			redirect('auth/login');
		}
		
		
		$this->layout->view('comment_post');
	}
	
	public function do_upd()
	{ 
	
         $usid=$this->session->userdata('user_id'); 
 
	$config['upload_path'] = 'assets/zerseynme/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '3000';
		$config['max_width']  = '10240';
		$config['max_height']  = '7680';
		$this->load->library('upload');
		
         $this->upload->initialize($config);  
	
	if ( $this->upload->do_upload('imgint'))
		{

                    $datap = $this->upload->data();
					
					$date=date('Y-m-d');
$data=array('date'=>$date,'category'=>$this->input->post('catgry1'),'userid'=>$usid, 'head'=>$this->input->post('heading'),'intro'=>nl2br($this->input->post('intro')),'image'=>$datap ['file_name']);
				
					$this->db->insert('fbblogmain',$data);
					 
	                 
     			  		
							//return true;
               	 }
	
 $insert_id = $this->db->insert_id();
	for($i=1;$i<11;$i++)
			{                              
	//echo $_POST['comment'];
	// $this->input->post('comment1');
		 $dat1=$_FILES['image'.$i]['name'];
	
			$dat=array(
			'description'=>nl2br($this->input->post('comment'.$i)),
			'title'=>$insert_id,
			//'photo'=>$dat1
			);
             //Check if there was a file uploaded
			   if (!empty($dat1))
            {
           
   //$this->upload->do_upload('photo');

	if ( $this->upload->do_upload('image'.$i))
		{

                    $datas = $this->upload->data();
					$dat['photo']=$datas ['file_name'];
					//print_r($datas ['file_name']);
					$this->blogmodel->uplo_image_com($dat);
					 
	                 
     			  		
							//return true;
               	 }   
    
		       }

		}
			redirect(base_url().'Zersey&Me');
	
	} 
	 
	
	
	
	
	public function get_img()
	{
	$this->load->model('blogmodel');
	$data['res']=$this->blogmodel->get_val();
	$this->layout->view('post_show',$data);
	}
	
	
	public function get_info_fb()
	{
		
		$data['post']=$this->blogmodel->fbblog_fbmain();
		//echo $this->db->last_query();
		$this->layout->view('fb_blog',$data);
	
	}
	
	
	public function com_view_load()
	{
	//echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/>.jfafj;ajffjhfd;fa;fhs;dfhsfhakfhlfhdslkhahfsklfhsalkfhslfhslfksahfhfashkfhsfhsf";
	
	
		             $this->load->model('blogmodel');
		$data['rtu']=$this->blogmodel->fbblog_fbmain();
	                 $this->layout->view('com_post_view',$data);
	
	}		
	
	/*public function count_val()
	{
		$this->load->model('blogmodel');
	 $da['hy']=$this->blogmodel->get_data_co($id); 
	
	
	}
	*/	
	
	public function fbcomment()
	{	
		$user=($this->session->userdata);
		
		$date=date("d/m/Y H:i:s");
		$datapost['comment']=nl2br($this->input->post('cnttext'));
		$datapost['userid']=$this->input->post('usersid');
		$datapost['fbblogid']=$this->input->post('post_id');
		$datapost['datetm']=$date;
		$this->usermodel->insert_data('fbblog_comment',$datapost);
		//redirect($_SERVER['HTTP_REFERER']);
		$id=$this->db->insert_id();
		$lvl='4';
		$cmt=$this->blogmodel->fetchlastfbcomnt($id, $lvl);
		
	foreach($cmt as $vl){
		if($vl['photo']){$ph=base_url().'assets/images/merchant/'.$vl['photo']; }
		else{$ph=base_url().'assets/images/merchant/usericon.jpg'; }
	if($lvl=='4')
		{
				
		$val='<li class="comment" id="comentli'.$vl['cmtid'].'" style="border-bottom:solid 1px #CCC"><div class="wrap"><a href="'.base_url().'userprofile/'.$vl['id'].'"><img class="avatar" src="'.$ph.'" style="height:25px; width:25px"/><div class="info clearfix"><div class="user-info"><div class="name">'.$vl['name'].'</div></div></a><time>0 Min. <a href="#" class="close deletecomment" rel="'.$vl['cmtid'].'" style="margin-left:2px">&times;</a></time></div><div class="content">'.$vl['comment'].'</div><div class="info clearfix"><div style="float:left"><a  href="#" id="likecmt'.$vl['cmtid'].'" class="btn-like likecoment" rel="'.$vl['cmtid'].'" ref="'.$vl['id'].'"> Like </a><a id="unlikecmt'.$vl['cmtid'].'" href="#" rel="'.$vl['cmtid'].'" class=" unlikecoment" style="display:none"> Unlike </a><span id="spancount'.$vl['cmtid'].'"> 0</span>&nbsp;&sdot; </div></div><div><ul class="comments-list" id="cnt'.$vl['cmtid'].'"></ul></div></div> </li>';
		}
		}
				
				
					echo ($val);
		}
		
		
function likefbblog()
	{	
	$user=($this->session->userdata);
	$flw['fbblogid']=$_POST['id'];
	$flw['userid']=$user['user_id'];
	
			
	$ar=$this->usermodel->insert_data('fbblog_like',$flw);
	echo 'true' ; 
	}	
	
	function likecmtfbblog()
	{	
	$user=($this->session->userdata);
	$flw['comentid']=$_POST['id'];
	$flw['userid']=$user['user_id'];

	$flwid=$_POST['pid'];
	//$rid=$this->uri->segment(6);
	
		
	$cmt=$this->usermodel->insert_data('fbblog_coment_like',$flw);
			
	echo "done";
	}
	function unlikecmtfbblog()
	{	
	$user=($this->session->userdata);
	$flw['comentid']=$_POST['id'];
	$flw['userid']=$user['user_id'];
	
	$this->usermodel->deletedt('fbblog_coment_like',$flw);	
	//redirect($_SERVER['HTTP_REFERER']);
	echo 'done';
	}
	
	
	function deletefbcomentid(){
	$id=$_POST['id'];
	
	$this->db->where('cmtid', $id);
	$this->db->delete('fbblog_comment');

echo true; 
	
	}

	/* Ratnesh code end */



} 
