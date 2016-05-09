<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');ob_start();

class Users extends CI_Controller {

    function __construct() {
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
        $this->load->library('form_validation');
        $this->load->model('usermodel');
 $this->load->model('common');
        $this->load->model('datamodel');
        $this->load->helper('security');
        $this->load->helper('form');
        $this->load->config('email', TRUE);
        $this->load->library('email');
            
        $this->load->helper('cookie');
        $this->load->library('phpass-0.1/PasswordHash');


        $uid = $this->session->userdata['user_id'];
        session_start();
        if (!$uid) {
            $user_id = get_cookie('logininfo');
            if ($user_id) {
                $user = $this->datamodel->getuserbyid($user_id);
                $this->session->set_userdata(array(
                    'user_id' => $user_id,
                    'username' => $user->username,
                    'fullName' => $user->fullName,
                    'user_level' => $user->userLevel,
                    'status' => ($user->activated == 1) ? 'STATUS_ACTIVATED' : 'STATUS_NOT_ACTIVATED',
                ));
                redirect('');
            }
        }

        if (!$this->input->is_ajax_request()) {
            // if(basename($_SERVER['REQUEST_URI'])!='login')
            // {
            // $newdata = array('url'=>'viewmap/'.basename($_SERVER['REQUEST_URI']));
            // $this->session->set_userdata($newdata);
            // }

            if ($this->session->userdata('logged_in') != TRUE) {
                $this->load->helper('url');
                $newdata = array('url' => current_url());
                $this->session->set_userdata($newdata);
            } else {
                if (current_url() == base_url())
                    redirect('dashboard');
            }
        }
    }

    public function index() { /*
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
      'status'	=> ($user[0]['activated'] == 1) ? 'STATUS_ACTIVATED' : 'STATUS_NOT_ACTIVATED',
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
      } */

        $uid = $this->session->userdata['user_id'];
        if ($uid) {
            //$data['int']=$this->datamodel->selectinterest($uid);
            //	$cid=$data['int'][0]->catid;


            $data['post'] = $this->datamodel->dashboarddata2($uid, '24', '2147483647');
            $data['pname'] = 'home';
            $this->layout->view('dashboard', $data, 'dashboard');
        } else {

            $this->load->view('home');
        }
    }

    public function contact() {
        $this->load->view('contact');
    }

    public function dplifeupload() {
        $text = nl2br($this->input->post('upsname'));
        $sts = ($this->input->post('upsstatus'));
        $uid = $this->session->userdata['user_id'];
        if ($_FILES['photo']['size']) {
            $config['upload_path'] = './assets/zerseynme/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '30000';
            $config['max_width'] = '102400';
            $config['max_height'] = '76800';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('photo')) {
                echo ('<script>alert("' . preg_replace('/(\n)+/m', ' ', strip_tags($this->upload->display_errors())) . '");
		window.location.href="' . base_url() . 'blog/findAllBlog";</script>');
                //redirect(base_url()."blog/findAllBlog");
            } else {
                $this->load->library('image_lib');
                $data = $this->upload->data();
                /* $config = array(
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
                $dataimg['intro'] = $text;
                $dataimg['userid'] = $uid;
                $dataimg['shareas'] = $sts;
                $dataimg['image'] = $data['file_name'];
                $dataimg['date'] = date('Y-m-d');
                $dataimg['video'] = ($this->input->post('video'));

                if (isset($_POST['savedraft'])) {
                    $dataimg['status'] = 3;
                } else if (isset($_POST['scedule'])) {
                    $dataimg['status'] = 4;
                    $dataimg['schedulepost'] = $this->input->post('scheduletime');
                } else if (isset($_POST['publish'])) {
                    //selecting max value of publish_id
                    $res = $this->db->query("SELECT MAX(publish_id) AS publish_id FROM fbblogmain WHERE status = 1");
                    if ($res->num_rows == 0) {
                        $dataimg['publish_id'] = 1;
                    } else {
                        $dataimg['publish_id'] = ($res->result()[0]->publish_id) + 1;
                        $this->db->set('publishedOn', 'NOW()', FALSE);
                    }
                }






                $val = $this->usermodel->insert_data('fbblogmain', $dataimg);
                /* if($val)
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
                  if($re){ */
                redirect($_SERVER['HTTP_REFERER']);
                //}
                //}
                //}
                //}
            }
        } else {
            $dataimg['intro'] = $text;
            $dataimg['userid'] = $uid;
            $dataimg['shareas'] = $sts;
            $dataimg['date'] = date('Y-m-d');
            $dataimg['video'] = ($this->input->post('video'));

            if (isset($_POST['savedraft'])) {
                $dataimg['status'] = 3;
            }
            if (isset($_POST['scedule'])) {
                $dataimg['status'] = 4;
                $dataimg['schedulepost'] = $this->input->post('scheduletime');
            }


            $val = $this->usermodel->insert_data('fbblogmain', $dataimg);

            /* if($val)
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
              if($re){ */
            redirect($_SERVER['HTTP_REFERER']);
            //}
            //}
            //}
            //	}
        }
    }

    function regstration() {
        if (isset($_POST["customerSubmit"])) {
            $password = $_POST['password'];
            $hasher = new PasswordHash(
                    $this->ci->config->item('phpass_hash_strength', 'tank_auth'), $this->ci->config->item('phpass_hash_portable', 'tank_auth'));
            $hashed_password = $hasher->HashPassword($password);

            $data['username'] = $_POST['username'];
            $data['password'] = $hashed_password;

            $data['email'] = $_POST['email'];
            $data['firstName'] = $_POST['firstName'];
            $data['fullName'] = $_POST['firstName'];
            $data['business'] = C;
            $data['userLevel'] = 4;
            $data['last_ip'] = $this->ci->input->ip_address();
            $data['monum'] = $_POST['phno'];


            $a = $this->usermodel->insertuser($data);

            $uid = $this->db->insert_id();
            if (count($a)) {
                $datas['uid'] = $this->db->insert_id();
                $this->session->set_userdata($datas);
            }

            $dataa['userId'] = $uid;
            $dataa['fullname'] = $_POST['firstName'];

            $dataa['mobile'] = $_POST['phno'];

            $b = $this->usermodel->insertcustomer($dataa);
        }

        redirect('confirmsignup');
    }

    function dashboard() {
        $uid = $this->session->userdata['user_id'];

        if (!$uid) {
            redirect('');
        }
        if (isset($_POST['data'])) {
            $num = $_POST['data'];
            $after = 24 + $num;
            $before = $after - 3;
            $data['post'] = $this->datamodel->dashboarddata($uid, '3', $after);
        } else {
            $data['post'] = $this->datamodel->dashboarddata2($uid, '24', '2147483647');
            $data['nextpg'] = 24;
        }

        $this->layout->view('dashboard', $data, 'dashboard');
    }

    function feeds() {

        $page = $_GET['data'];

        //$data['nextpg']=$page+24;
        $uid = $this->session->userdata['user_id'];
        if (!$uid) {
            redirect('');
        }

        $feeds['counter'] = $i;
        $feeds['post1'] = $this->datamodel->dashboarddata2($uid, '24', $page);
        $feeds['post1'] = array_filter($feeds['post1']);
        //print_r(end($feeds['post1'])['publish_id']);
        if (empty($feeds['post1'])) {
            $end['end'] = 'No more posts';
            $this->load->view('dashboard', $end);
        } else {
            $this->load->view('dashboard', $feeds);
        }
    }

    function postdraft($a) {

        $uid = $this->session->userdata['user_id'];
        if (!$uid) {
            redirect('');
        }
        $data['user_id'] = $this->datamodel->userdetailbyusername($a);
        $usid = $data['user_id']->id;

        $data['post'] = $this->datamodel->showpostdraft($usid);


        $this->layout->view('postdraft', $data, 'postdraft');
    }

    // function feeds_new(){
    // 	$page=25;
    // 	$data['nextpg']=$page+24;
    // 	$uid=$this->session->userdata['user_id'];
    // 	if(!$uid){
    // 	redirect('');
    // 		}
    // 	$data['post']=$this->datamodel->dashboarddata($uid,'3', $page);
    // 	$this->layout->view('dashboard',$data,'dashboard');
    // 	}


    function feeds_new() {
        $number_of_posts = 0;
        $database_offset = 45000;

        if ($_GET['data']) {
            $x = (int) $_GET['data'] - $database_offset;
            $sql_query = "SELECT COUNT(*) as total FROM fbblogmain WHERE publishedOn > '" . date('Y-m-d G:i:s', $x) . "'";
            $res = $this->db->query($sql_query)->result();

            print_r($res[0]->total);
        }
    }



    /* This function is for viewing the photo story */
    public function viewpost($id) {

        $uid = $this->session->userdata['user_id'];
      
       


        /* the below condition is for editing a comment */
        if (isset($_GET['comment']) && isset($_GET['comment_id'])) {
            $comment_id = $_GET['comment_id'];
            $comment = $_GET['comment'];
            $update = $this->db->query("UPDATE post_coment SET comment='" . $comment . "' WHERE cmtid=" . $comment_id);
            $sql = "Select * from post_coment where postid=" . $id . " ORDER BY datetm desc";
            $query = $this->db->query($sql); //$this->datamodel->getcomment($id);
            $data['om'] = $query->result_array();
            //echo sizeof($data['om']);
            $data['user_id'] = $uid;


            $this->load->view('postview', $data, 'postview');
        }
        /* This condition ends */
        /* The  folowing condition is for deleting a comment */
        if (isset($_GET['cmtid'])) {
            $comment = $_GET['cmtid'];
            $delete = $this->db->query("DELETE FROM post_coment WHERE cmtid=" . $comment);
            $sql = "Select * from post_coment where postid=" . $id . " ORDER BY datetm desc";
            $query = $this->db->query($sql); //$this->datamodel->getcomment($id);
            $data['om'] = $query->result_array();
            //echo sizeof($data['om']);
            $data['user_id'] = $uid;

            $this->load->view('postview', $data, 'postview');
        }
        /* The condition ends here */

        /* This condition ends */

        /* The following condition is for adding a comment */
        if (isset($_GET['data'])) {
            if ($this->session->userdata['user_id'] == NULL) {
                redirect('/');
            } else {
                $insert['userid'] = $this->session->userdata['user_id'];
                $insert['comment'] = $_GET['data'];
                $insert['postid'] = $id;
                $insert['datetm'] = date('Y-m-d H:i:s');
                $vals = $this->usermodel->insert_data('post_coment', $insert);
                $bid = $this->db->insert_id();
                $sql = "Select * from post_coment where postid=" . $id . " ORDER BY datetm desc";
                $query = $this->db->query($sql); //$this->datamodel->getcomment($id);
                $data['om'] = $query->result_array();
                //echo sizeof($data['om']);
                $data['user_id'] = $uid;

                $this->load->view('postview', $data, 'postview');
            }
        }
        /* This condition ends here */ else {
            $data['post'] = $this->datamodel->selectintroofpost($id);

            $data['postdetail'] = $this->datamodel->selectdetailofpost($id);
            if ($uid) {
                $data['next'] = $this->datamodel->postviewnext($uid, $id);
                $data['nextpost'] = $this->datamodel->movetonextpost($id);

                //$data['prev']=$this->datamodel->postviewprev($uid, $id);
                $data['user_id'] = $uid;
            }
            if (isset($_POST['like'])) {
                if ($this->session->userdata['user_id'] == NULL) {

                } else {
                    $insertcom['userid'] = $this->session->userdata['user_id'];

                    $insertcom['postid'] = $id;

                    $val = $this->usermodel->insert_data('post_like', $insertcom);
                }
            }
            if (isset($_POST['save'])) {

                $comment = $_POST['bdesc'];
                if (strlen($comment) < 100) {
                    /* echo "<script>";
                      //echo "alert('Comment should be at least 100 characters')";

                      echo "</script>"; */
                } else {
                    $postid = $_POST['postid'];

                    $userid = $_POST['userid'];

                    $this->datamodel->reportabuse($userid, $postid, $comment);
                    /* echo "<script>";
                      //echo "alert('Your comment has been received')";

                      echo "</script>"; */
                    $data['reported'] = 'report';
                }
            }

            $bookmark = "Select * FROM bookmark WHERE postid=" . $id . " AND userid=" . $uid;
            $book = $this->db->query($bookmark);
            $data['book'] = $book->result_array();

            $sql = "Select * from post_coment where postid=" . $id . " ORDER BY datetm desc";
            $query = $this->db->query($sql); //$this->datamodel->getcomment($id);
            $data['com'] = $query->result_array();

            $this->layout->view('postview', $data, 'postview');
        }
    }



    /* This function is for viewing the video */
    public function viewvideo($id) {

        $uid = $this->session->userdata['user_id'];
        /*
          if(!$uid){
          redirect('');
          }
         */
        if (isset($_GET['comment']) && isset($_GET['comment_id'])) {
            $comment_id = $_GET['comment_id'];
            $comment = $_GET['comment'];
            $update = $this->db->query("UPDATE post_coment SET comment='" . $comment . "' WHERE cmtid=" . $comment_id);
            $sql = "Select * from post_coment where postid=" . $id . " ORDER BY datetm desc";
            $query = $this->db->query($sql); //$this->datamodel->getcomment($id);
            $data['om'] = $query->result_array();
            //echo sizeof($data['om']);
            $data['user_id'] = $uid;

            //$this->load->view('postview', $data, 'postview');
        }

        if (isset($_GET['cmtid'])) {
            $comment = $_GET['cmtid'];
            $delete = $this->db->query("DELETE FROM post_coment WHERE cmtid=" . $comment);
            $sql = "Select * from post_coment where postid=" . $id . " ORDER BY datetm desc";
            $query = $this->db->query($sql); //$this->datamodel->getcomment($id);
            $data['om'] = $query->result_array();
            //echo sizeof($data['om']);
            $data['user_id'] = $uid;

            //$this->load->view('postview', $data, 'postview');
        }
        if (isset($_GET['data'])) {
            if ($this->session->userdata['user_id'] == NULL) {
                redirect('/');
            } else {
                $insert['userid'] = $this->session->userdata['user_id'];
                $insert['comment'] = $_GET['data'];
                $insert['postid'] = $id;
                $insert['datetm'] = date('Y-m-d H:i:s');
                $vals = $this->usermodel->insert_data('post_coment', $insert);
                $bid = $this->db->insert_id();
                $sql = "Select * from post_coment where postid=" . $id . " ORDER BY datetm desc";
                $query = $this->db->query($sql); //$this->datamodel->getcomment($id);
                $data['om'] = $query->result_array();
                //echo sizeof($data['om']);
                $data['user_id'] = $uid;

                $this->load->view('postviewvideo', $data, 'postviewvideo');
            }
        } else {
            $data['post'] = $this->datamodel->selectintroofvideo($id);

            $data['postdetail'] = $this->datamodel->selectdetailofvideo($id);
            if ($uid) {
                $data['next'] = $this->datamodel->postviewnext($uid, $id);
                $data['nextpost'] = $this->datamodel->movetonextvideo($id);

                //$data['prev']=$this->datamodel->postviewprev($uid, $id);
                $data['user_id'] = $uid;
            }
            if (isset($_POST['like'])) {
                if ($this->session->userdata['user_id'] == NULL) {

                } else {
                    $insertcom['userid'] = $this->session->userdata['user_id'];

                    $insertcom['postid'] = $id;

                    $val = $this->usermodel->insert_data('post_like', $insertcom);
                }
            }
            if (isset($_POST['save'])) {

                $comment = $_POST['bdesc'];
                if (strlen($comment) < 100) {
                    /* echo "<script>";
                      //echo "alert('Comment should be at least 100 characters')";

                      echo "</script>"; */
                } else {
                    $postid = $_POST['postid'];

                    $userid = $_POST['userid'];

                    $this->datamodel->reportabuse($userid, $postid, $comment);
                    /* echo "<script>";
                      //echo "alert('Your comment has been received')";

                      echo "</script>"; */
                    $data['reported'] = 'report';
                }
            }

            $bookmark = "Select * FROM bookmark WHERE postid=" . $id . " AND userid=" . $uid;
            $book = $this->db->query($bookmark);
            $data['book'] = $book->result_array();

            $sql = "Select * from post_coment where postid=" . $id . " ORDER BY datetm desc";
            $query = $this->db->query($sql); //$this->datamodel->getcomment($id);
            $data['com'] = $query->result_array();
            $this->layout->view('postviewvideo', $data, 'postviewvideo');
        }
    }

    /* This function is for adding and removing a post as bookmark (photostory and editorial) */

    function bookmark_story($id) {
        if (isset($_GET['data'])) {
            $uid = $_GET['data'];
            $status = 1;
            $select = $this->db->query("SELECT * FROM bookmark WHERE userid=" . $uid . " AND postid=" . $id);
            $rows = $select->num_rows();

            if ($rows == 1) {
                $date = date('Y-m-d H:i:s');
                $update = $this->db->query("UPDATE bookmark SET status='1', datecreated='" . $date . "' WHERE userid=" . $uid . " AND postid=" . $id);
            } else {

                $date = date('Y-m-d H:i:s');
                $this->datamodel->bookmark($uid, $id, $status, $date);
            }
        }

        if (isset($_GET['remove'])) {
            $remove = $_GET['remove'];
            $update = $this->db->query("UPDATE bookmark SET status='0' WHERE userid=" . $remove . " AND postid=" . $id);
        }
        /* $select=$this->db->query("SELECT * FROM bookmark WHERE userid=".$uid." AND postid=".$id);
          $result=$select->result_array();
          $data['status']=$result['0']['status'];
          $this->load->view('postview',$data); */
    }


    /* This function is for viewing the user's profile */
    function userprofile($a) {
        $data['user'] = str_replace("%20", " ", $a);
        //print_r($data['a']);

        $uid = $this->session->userdata['user_id'];
        $data['id'] = $uid;
        //print_r($data['user_id']);
        if (!$uid) {
            redirect('');
        }
        $data['user_id'] = $this->datamodel->userdetailbyusername($data['user']);
        //print_r($data['user_id']);
        //print_r($data['user_id']);
         if(count($data['user_id']) == 0)
        {
           $data["heading"] = "404 Page Not Found";
    $data["message"] = "The page you requested was not found ";

          $this->load->view('error_404',$data);
        }
        else
        {
        $usid = $data['user_id']->id;

        //print_r($usid);
        $data['us_id'] = $usid;
        $data['post'] = $this->datamodel->postuserprofile2($usid, '24', '2147483647');

        $data['cntpost1'] = $this->datamodel->countofuserfoll($usid);
        $data['cntfollowing'] = $this->datamodel->countfollowing($usid);


        if (isset($_POST['password'])) {
            $name=$data1['username'] = $_POST['name'];
			$passoword = $_POST['usrpass'];
			if(!empty($password)){
				
            if (strlen($password) < 6) {
                echo "<script>";
                echo "alert('Password should be minimum 6 characters')";
                echo "</script>";
           
		   }
		   $hasher = new PasswordHash();
            $data1['password'] = $hasher->HashPassword($password);

			}else{ 
			
			
                
                $update = $this->usermodel->updatepassword($data1,$usid);
                echo "<script>";
                echo "alert('your information changed successfully')";
                echo "</script>";
            
			}
		}


        if (isset($_POST["update"])) {
            $gen = $_POST['gender'];
            $date = $_POST['datepicker'];
            $loca = $_POST['loc'];
            $empl = $_POST['emp'];
            $mob = $_POST['mbno'];
            $bri = $_POST['brief'];

            //echo $loca;
            //echo $empl;
            //echo $mob;
            //echo $bri;
            $d = $this->usermodel->updatecustomer($gen, $date, $loca, $empl, $mob, $bri, $uid);
            $data['cust'] = $this->usermodel->findCustomerById($uid);
            print_r($data['cust']);
            $data['loc'] = $data['cust']['0']['location'];
            $data['emp'] = $data['cust']['0']['employment'];
            $data['mob'] = $data['cust']['0']['mobile'];

            //print_r($data['loc']);
            //echo "UPDATE customer SET gender='$gen',DOB='$date',location='$loca',employment='$empl',mobile='$mob',yourself='$bri' where userId=$uid";

            $this->layout->view('userprofile', $data, 'userprofile');
        } else {

            $data['custom'] = $this->usermodel->findCustomerById($usid);
$data['ctrl']= & get_instance();
            $data['use'] = $this->datamodel->getuserbyid($usid);
            $data['verify'] = $data['use']->verify_code;
			
			$data['uname'] = $this->usermodel->findEmployeById($uid);
            //print_r($data['verify']);
            $this->layout->view('userprofile', $data, 'userprofile');
        }
      }
    }

  /**
     * for showing users not followed by the user
     * this also makes sure they are in order of popularity
     * optionally passa variable to limit number of such users
     */
    public function show_users_not_followed($limit = 5) {
        $userid = $this->session->userdata('user_id');
        //follow users not followed
        $users_not_followed = $this->datamodel->get_users($userid, 'not_followed', 'DESC', $limit);
        // ids
        $ids = array_column($users_not_followed, 'userid');
        //if no ids error occurs
        if ($ids) {
            $usernames = $this->common->fetch_where_in('users', 'id,username', 'id', $ids);
        } else {
            $usernames = [];
        }
        //usernames from another table
        $usernames = $this->common->fetch_where_in('users', 'id,username', 'id', $ids);
        $usernames_assoc = array_reduce($usernames, function ($result, $item) {
            $result[$item['id']] = $item;
            return $result;
        }, array());
        //echo '<script>console.log(' . json_encode($usernames_assoc) . ')</script>';
        //trying to put username inside users
        $result = array();
        foreach ($users_not_followed as $item):
            $item['username'] = $usernames_assoc[$item['userid']]['username'];
            $result[] = $item;
        endforeach;
        $users_not_followed = $result;
        $data['users_not_followed'] = $users_not_followed;

        $this->load->view('dashboard/main_dashboard/user_follow', $data);

        /** ----------- follow users not follow end ----------- */
    }

    public function show_not_followed_categories() {
        $userid = $this->session->userdata('user_id');

        $not_followed_categories = $this->datamodel->get_categories($userid, 'not_followed', 'DESC', 5);
        $data['not_followed_categories'] = $not_followed_categories;
        //need to load data like user not followed and not_category_followed
        $this->load->view('dashboard/main_dashboard/category_follow', $data);
    }


/*    function userprofile($a) {
        $data['user'] = str_replace("%20", " ", $a);
        //print_r($data['a']);

        $uid = $this->session->userdata['user_id'];
        $data['id'] = $uid;
        //print_r($data['user_id']);
        if (!$uid) {
            redirect('');
        }
        $data['user_id'] = $this->datamodel->userdetailbyusername($data['user']);
        //print_r($data['user_id']);
        //print_r($data['user_id']);
        if (count($data['user_id']) == 0) {
            $data["heading"] = "404 Page Not Found";
            $data["message"] = "The page you requested was not found ";

            $this->load->view('error_404', $data);
        } else {
            $usid = $data['user_id']->id;

            //print_r($usid);
            $data['us_id'] = $usid;
            $data['post'] = $this->datamodel->postuserprofile2($usid, '24', '2147483647');

            $data['cntpost1'] = $this->datamodel->countofuserfoll($usid);
            $data['cntfollowing'] = $this->datamodel->countfollowing($usid);


            if (isset($_POST['password'])) {
                $password = $_POST['pass'];
                if (strlen($password) < 6) {
                    echo "<script>";
                    echo "alert('Password should be minimum 6 characters')";
                    echo "</script>";
                } else {
                    $hasher = new PasswordHash();
                    $pass = $hasher->HashPassword($password);

                    $update = $this->usermodel->updatepassword($pass, $uid);
                    echo "<script>";
                    echo "alert('Password changed successfully')";
                    echo "</script>";
                }
            }


            if (isset($_POST["update"])) {
                $gen = $_POST['gender'];
                $date = $_POST['datepicker'];
                $loca = $_POST['loc'];
                $empl = $_POST['emp'];
                $mob = $_POST['mbno'];
                $bri = $_POST['brief'];

                //echo $loca;
                //echo $empl;
                //echo $mob;
                //echo $bri;
                $d = $this->usermodel->updatecustomer($gen, $date, $loca, $empl, $mob, $bri, $uid);
                $data['cust'] = $this->usermodel->findCustomerById($uid);
                print_r($data['cust']);
                $data['loc'] = $data['cust']['0']['location'];
                $data['emp'] = $data['cust']['0']['employment'];
                $data['mob'] = $data['cust']['0']['mobile'];

                //print_r($data['loc']);
                //echo "UPDATE customer SET gender='$gen',DOB='$date',location='$loca',employment='$empl',mobile='$mob',yourself='$bri' where userId=$uid";

                $this->layout->view('userprofile', $data, 'userprofile');
            } else {

                $data['custom'] = $this->usermodel->findCustomerById($usid);

                $data['use'] = $this->datamodel->getuserbyid($usid);
                $data['verify'] = $data['use']->verify_code;
                //print_r($data['verify']);
                $this->layout->view('userprofile', $data, 'userprofile');
            }
        }
    }
*/

    /* For showing the posts which are bokkmarked by the users*/
    function mybookmarks($a) {
        $data['user'] = str_replace("%20", " ", $a);
        //print_r($data['a']);

        $uid = $this->session->userdata['user_id'];
        $data['id'] = $uid;
        //print_r($data['user_id']);
        if (!$uid) {
            redirect('');
        }
        $data['user_id'] = $this->datamodel->userdetailbyusername($data['user']);
        //print_r($data['user_id']);
        //print_r(count($data['user_id']));
        if (count($data['user_id']) == 0) {
            $data["heading"] = "404 Page Not Found";
            $data["message"] = "The page you requested was not found ";

            $this->load->view('error_404', $data);
        } else {
            $usid = $data['user_id']->id;

            //print_r($data['user_id']);
            $data['us_id'] = $usid;
            $data['post'] = $this->datamodel->bookmarks($usid, '24', '2147483647');

            //$data['post']=$this->datamodel->postuserprofile2($usid,'24', '2147483647');

            $data['cntpost1'] = $this->datamodel->countofgroupboard($usid);
            $data['cntfollowing'] = $this->datamodel->countofprivateboard($usid);
            if ($uid == "") {
                $this->load->view('error_404');
            }

            $bookmarks = $this->db->query("SELECT * FROM bookmark WHERE userid=" . $uid . " AND status='1'");
            $rows = $bookmarks->num_rows();


            $data['bookmark'] = $rows;

            if (isset($_POST['password'])) {
                $password = $_POST['pass'];
                if (strlen($password) < 6) {
                    echo "<script>";
                    echo "alert('Password should be minimum 6 characters')";
                    echo "</script>";
                } else {
                    $hasher = new PasswordHash();
                    $pass = $hasher->HashPassword($password);

                    $update = $this->usermodel->updatepassword($pass, $uid);
                    echo "<script>";
                    echo "alert('Password changed successfully')";
                    echo "</script>";
                }
            }


            if (isset($_POST["update"])) {
                $gen = $_POST['gender'];
                $date = $_POST['datepicker'];
                $loca = $_POST['loc'];
                $empl = $_POST['emp'];
                $mob = $_POST['mbno'];
                $bri = $_POST['brief'];

                //echo $loca;
                //echo $empl;
                //echo $mob;
                //echo $bri;
                $d = $this->usermodel->updatecustomer($gen, $date, $loca, $empl, $mob, $bri, $uid);
                $data['cust'] = $this->usermodel->findCustomerById($uid);
                print_r($data['cust']);
                $data['loc'] = $data['cust']['0']['location'];
                $data['emp'] = $data['cust']['0']['employment'];
                $data['mob'] = $data['cust']['0']['mobile'];

                //print_r($data['loc']);
                //echo "UPDATE customer SET gender='$gen',DOB='$date',location='$loca',employment='$empl',mobile='$mob',yourself='$bri' where userId=$uid";

                $this->layout->view('mybookmark', $data, 'mybookmark');
            } else {

                $data['custom'] = $this->usermodel->findCustomerById($usid);

                $data['use'] = $this->datamodel->getuserbyid($usid);
                $data['verify'] = $data['use']->verify_code;
                //print_r($data['verify']);
                $this->layout->view('mybookmark', $data, 'mybookmark');
            }
        }
    }

    function userprofileloop($a) {
        $a = str_replace("%20", " ", $a);
        $data['a'] = $a;
        $page = $_GET['data'];
        $data['user_id'] = $this->datamodel->userdetailbyusername($a);

        $usid = $data['user_id']->id;

        $data['us_id'] = $usid;

        $data['post1'] = $this->datamodel->postuserprofile2($usid, '24', $page);


        $data['post1'] = array_filter($data['post1']);

        if (empty($data['post1'])) {
            /* echo "<script>";
              echo "alert('End of posts')";
              echo "</script>"; */
            $end['end'] = 'No more posts';
            $this->load->view('userprofile', $end);
        } else {

            $this->load->view('userprofile', $data);
        }
    }

    function bookmarkloop($a) {
        $a = str_replace("%20", " ", $a);
        $data['a'] = $a;
        $page = $_GET['data'];
        $data['user_id'] = $this->datamodel->userdetailbyusername($a);

        $usid = $data['user_id']->id;

        $data['us_id'] = $usid;

        $data['post1'] = $this->datamodel->bookmarks($usid, '24', $page);


        $data['post1'] = array_filter($data['post1']);

        if (empty($data['post1'])) {
            /* echo "<script>";
              echo "alert('End of posts')";
              echo "</script>"; */
            $end['end'] = 'No more posts';
            $this->load->view('mybookmark', $end);
        } else {

            $this->load->view('mybookmark', $data);
        }
    }



/* For marking a post as something which is not accurate. User needs to provide an actual reason for this.*/
    function reportabuse() {

        if (isset($_POST['save'])) {

            $comment = $_POST['bdesc'];
            $postid = $_POST['postid'];

            $userid = $_POST['userid'];

            $this->datamodel->reportabuse($userid, $postid, $comment);

            if (isset($_POST['save'])) {

                $comment = $_POST['bdesc'];
                $postid = $_POST['postid'];

                $userid = $_POST['userid'];

                $this->datamodel->reportabuse($userid, $postid, $comment);
            }
            echo "</script>";
        }
    }

    function friendslist($a) {
        $uid = $this->session->userdata['user_id'];
        if (!$uid) {
            redirect('');
        }
        $data['user_id'] = $this->datamodel->userdetailbyusername($a);
        $usid = $data['user_id']->id;

        $this->layout->view('friendslist', $data, 'friendslist');
    }


    /* Lists all the categories available*/
    function categorylist() {


        $this->layout->view('userfriendslist', $data, 'userfriendslist');
    }


    /* Lists Top 20 users who are popular accoridng to the number of posts*/
    function userlist() {


        $select_user = "SELECT * FROM users";
        $result = $this->db->query($select_user);
        $ids = $result->result_array();
        $followers = Array();
        foreach ($ids AS $id) {
            $query = 0;
            $userid = $id['id'];
            $query = $this->usermodel->countlikecomment('fbblogmain', array('userid' => $id['id']));
            //echo $query."<br>";
            //array_push($followers,$id['id'],$query);
            $posts[$userid] = $query;
        }
        //print_r($data);
        $data['count'] = count($ids);
        //print_r($data['count']);
        $data['post'] = $posts;
        //print_r($data['follow']);
        $this->layout->view('userfriendslists', $data, 'userfriendslists');
    }

    /* Lists Public boarda of a particualar user. This is available when the public boards are greater than 5. In the Public Boards section in the user profile, this is available when clicked on More.. */
    function boardlist($id) {

        $data['boards']=$this->datamodel->publicboards($id);

        $this->layout->view('boardslist', $data, 'userfriendslist');
    }
    function search($a) {
        $uid = $this->session->userdata['user_id'];
        if (!$uid) {
            redirect('');
        }
        $data['user_id'] = $this->datamodel->userdetailbyusername($a);
        $usid = $data['user_id']->id;




        $this->layout->view('search', $data, 'search');
    }

    /* Provides information about particular category, Information includes all the feeds of that category and the topics related.*/
    function category($cat) {

      $cat=str_replace("%20"," ",$cat);
        $data['topic'] = $this->usermodel->where_data('category', array('category' => $cat));
        $data['topuser'] = $this->datamodel->topusercategory($cat);
        $data['post'] = $this->datamodel->postcategory($cat, '24', '2147483647');
        // print_r($data['post']);
        // return;

        $data['catname'] = $cat;
        $data['catidm'] = $data['topic'][0]->id;
        $data['proimg'] = $data['topic'][0]->proimage;
        $data['covimg'] = $data['topic'][0]->covimage;
        $this->layout->view('category', $data, 'category');
    }

    function categoryloop($cat) {

        $page = $_GET['data'];
        $data['topic'] = $this->usermodel->where_data('category', array('category' => $cat));
        $data['topuser'] = $this->datamodel->topusercategory($cat);
        $data['post1'] = $this->datamodel->postcategory($cat, '24', $page);
        $data['post1'] = array_filter($data['post1']);
        //alert("called");

        if (empty($data['post1'])) {
            /* echo "<script>";
              echo "alert('End of posts')";
              echo "</script>"; */
            $end['end'] = 'No more posts';
            $this->load->view('category', $end);
        } else {

            $this->load->view('category', $data);
        }
    }


/* Provides information about particular topic of that category.*/
    function categorytopic($cat, $nam) {
        $cat=str_replace("%20", " ", $cat);
        $nam=str_replace("%20", " ", $nam);
        $data['topic'] = $this->usermodel->where_data('category', array('category' => $cat));
        $data['topuser'] = $this->datamodel->categories($cat,$nam);

        $data['post'] = $this->datamodel->postcategorytopic3($cat,$nam,'2147483647');
        $data['num_post']=count($data['post']);
        $data['catname'] = $cat;
        $data['topics']='topics';
        $data['catidm'] = $data['topic'][0]->id;
        $data['proimg'] = $data['topic'][0]->proimage;
        $data['covimg'] = $data['topic'][0]->covimage;
        $this->layout->view('category_topics', $data, 'category');
    }

    function categorytopicloop($cat,$nam) {
      $cat=str_replace("%20", " ", $cat);
      $nam=str_replace("%20", " ", $nam);
        $page = $_GET['data'];
        $data['topic'] = $this->usermodel->where_data('category', array('category' => $cat));
        $data['topuser'] = $this->datamodel->categories($cat,$nam);
        $data['post1'] = $this->datamodel->postcategorytopic3($cat,$nam,$page);
        $data['post1'] = array_filter($data['post1']);

        if (empty($data['post1'])) {
            /* echo "<script>";
              echo "alert('End of posts')";
              echo "</script>"; */
            $end['end'] = 'No more posts';
            $this->load->view('category_topics', $end);
        } else {

            $this->load->view('category_topics', $data);
        }
    }

    function categoryuser($cat, $userid) {


        $data['topic'] = $this->usermodel->where_data('category', array('category' => $cat));
        $data['topuser'] = $this->datamodel->topusercategory($cat);
        $data['post'] = $this->datamodel->postcategoryuser2($cat, $userid, '24', '2147483647');
        $data['catname'] = $cat;
        $data['catidm'] = $data['topic'][0]->id;
        $data['proimg'] = $data['topic'][0]->proimage;
        $data['covimg'] = $data['topic'][0]->covimage;
        $this->layout->view('category', $data, 'category');
    }

    /*function categoryfollow() {
        $uid = $this->session->userdata['user_id'];

        if (isset($_POST["flw"])) {

            $data['userid'] = $uid;
            $data['catid'] = $_POST['cid'];

            $a = $this->datamodel->insertcatfol($data);
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
*/



    /* This is for following the category*/
function categoryfollow() {
        $uid = $this->session->userdata['user_id'];

        if (isset($_POST["flw"])) {

            $data['userid'] = $uid;
            $data['catid'] = $_POST['cid'];

            $a = $this->datamodel->insertcatfol($data);
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
    /* This is to unfollow the category*/
    function deletefollow($folid) {
        $pro1 = $this->datamodel->deletecatfol($folid);
        redirect($_SERVER['HTTP_REFERER']);
    }
/* This is for following the user*/
    function userfollow() {
        $usid = $this->session->userdata['user_id'];

        if (isset($_POST["folw"])) {

            $data['userid'] = $usid;
            $data['usid'] = $_POST['uid'];

            $a = $this->datamodel->insertuserfol($data);
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

/* This is to unfollow the user*/
    function deleteufollow($follid) {
        $pro1 = $this->datamodel->deleteuserfol($follid);
        redirect($_SERVER['HTTP_REFERER']);
    }



    function postvertualstory($cat) {
        $cat = str_replace("%20", " ", $cat);
        $uid = $this->session->userdata['user_id'];
        if (!$uid) {
            redirect('');
        }
        $data['boards'] = $this->usermodel->where_data('user_board', array('bordname' => $cat));
        $boid = $data['boards'][0]->bid;

        //$data['cat']= $this->datamodel->getsubboard($boid);

        $data['pagename'] = "postpage";

        $this->layout->view('post1', $data, 'post1');
    }

    /* ---------------------------------Facebook Login---------------------------------------- */

    public function loginByfacebook() {
        if ($_POST['email'] != 'undefined') {
            $result = $this->usermodel->loginByfacebook();
        }
        if ($result == 'not found') {
            $dts[0] = "not_registered";
            $dts[1] = $_SERVER['HTTP_REFERER'];
            echo ($dts[0] . " " . $dts[1]);
        } else {

            $data['user_id'] = $result[0]['id'];
            $data['username'] = $result[0]['username'];
            $data['user_level'] = $result[0]['userLevel'];
            $data['fullName'] = $result[0]['fullName'];

            $this->session->set_userdata($data);
            $cookie = array(
                'name' => 'logininfo',
                'value' => $result[0]['id'],
                'expire' => '1209600', // Two weeks
                'domain' => base_url(),
                'path' => '/'
            );

            set_cookie($cookie);
            //print_r($data['user_level']);
            $dts[0] = $result[0]['fbgmId'];
            $dts[1] = $_SERVER['HTTP_REFERER'];
            echo ($dts[0] . " " . $dts[1]);
        }
    }

    function header() {
        echo "<script>";
        echo "alert('Reached')";
        echo "</script>";
        $value = $_POST['boardid'];
        echo $value;
        $subboard = $this->datamodel->getsubbodall($value);

        $data['values'] = $subboard;
        print_r($data['values']);
        ?>

        <div id="subboardlistedit" class="modal fade" role="dialog">
            <div class="modal-dialog" >
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center">Select Category</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            <?php
                            $bat = $this->datamodel->getsubbodall($value);
                            foreach ($bat as $bt) {
                                ?>
                                <div class="catpopdiv" value="" >
                                    <a href="<?= base_url(); ?>posteditorial/<?= $bt['bordname'] ?>">
                                        <div style="width:100%;" class="catpopuptext">
                                            <img src="<?php echo base_url() . 'assert/images/Board_Profile_Pic_Icon.png'; ?>" class="follow" style="width:100%;">
                                        </div>
                                        <p class="catpopuphead"><?= $bt['subboardname'] ?></p>
                                        <!--<p class="catpopuptext" >dsad sds dsds dsds d</p>    -->
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        //$this->load->view('layout/header',$data);
    }

    function LoginAndSignupByfacebook() {
        $id = $this->usermodel->LoginAndSignupByfacebook();
        $result = $_POST['fbid'];
        if ($id) {
            $url = 'http://graph.facebook.com/' . $result . '/picture?type=large';
            $headers = get_headers($url, 1);
            $urls = $headers['Location'];

            $data = file_get_contents($urls);
            $fileName = './assets/images/merchant/' . $result . '.jpg';
            $file = fopen($fileName, 'w+');
            fputs($file, $data);

            if (fclose($file)) {
                $this->load->library('image_lib');

                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/merchant/' . $result . '.jpg';
                $config['create_thumb'] = false;
                $config['maintain_ratio'] = true;
                $config['width'] = 307;
                $config['height'] = 307;
                $config['new_image'] = './assets/images/merchant/' . $result . "_thumb.jpg";
                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                $this->image_lib->resize();



                $dataimg['photo'] = $result . "_thumb.jpg";
                $this->db->where('userId', $id);
                $this->db->update('customer', $dataimg);
//$this->model->insert_data('imageupload',$dataimg);
            }
            $result = $this->usermodel->loginByfacebook();
            $data['user_id'] = $result[0]['id'];
            $data['username'] = $result[0]['username'];
            $data['user_level'] = $result[0]['userLevel'];
            $data['fullName'] = $result[0]['fullName'];

            $this->session->set_userdata($data);
            $cookie = array(
                'name' => 'logininfo',
                'value' => $result[0]['id'],
                'expire' => '1209600', // Two weeks
                'domain' => base_url(),
                'path' => '/'
            );

            set_cookie($cookie);
            echo $result . " " . $_SERVER['HTTP_REFERER'];
        } else
            echo 'not' . " " . $_SERVER['HTTP_REFERER'];
    }

    function alltopicofcategory($cat, $topic) {

        $result = $this->datamodel->alltopicofcategory($cat, $topic);
        $names = array();
        $i = 0;
        foreach ($result as $value) {
            $names[$i] = $value['name'];
            $i++;
        }
        $str = implode(",", $names);
        print_r($str);
    }

    function upload_pic($name) {
        //	print_r($_FILES);exit;
        //load the helper
        $this->load->helper('form');
        $config['upload_path'] = './m.zersey/assets/zerseynme/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '30000';
        $config['max_width'] = '102400';
        $config['max_height'] = '76800';
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

    /* Used for inserting the photo story data in database.*/
    function insertvertualstory() {

        $cont = $_POST['countrow'];
        /* $this->form_validation->set_rules('picintro','pic','trim|callback_check_image');
          $this->form_validation->set_rules('title','Title','trim|required');
          $insert['image']=$this->upload_pic('picintro');
          $this->form_validation->set_rules('textdes1','textdes1','trim|callback_textdes[1]');
          $data['boards']=$this->usermodel->where_data('user_board',array('bordname'=>$cat));
          $boid=$data['boards'][0]->bid;

          //$data['cat']= $this->datamodel->getsubboard($boid);

          $data['pagename']="postpage";
          $this->form_validation->set_rules('photo1','1','trim|callback_check_sub_image(1)');

          $k=1;
          $co=$cont-1;
          /*for($p=1;$p<=$cont;$k++)
          {
          $k++;
          $this->form_validation->set_rules('textdes'.$k,$k,'trim|callback_textdes');
          //$this->form_validation->set_rules('photo'.$p,$p,'trim|callback_check_sub_image($p)');

          } */

        /* if($this->form_validation->run()==FALSE)
          {
          $data['error']="Please fill in all the required fields";
          $this->layout->view('post1',$data,'post1');
          } */

        $insert['maincat'] = ($this->input->post('catname'));
        $insert['category'] = ($this->input->post('realtopic'));
        $insert['head'] = ($this->input->post('title'));
        $insert['intro'] = nl2br($this->input->post('textdes1'));
        $insert['intro'] = strip_tags($insert['intro'], '<div><br><b><p><i><span>');
        $insert['intro'] = preg_replace("/<div[^>]*>/", '<div>', $insert['intro']);
        $insert['intro'] = preg_replace("/<p[^>]*>/", '<p>', $insert['intro']);
        //$insert['intro']=preg_replace("/<span[^>]*>/", '<span>',  $insert['intro']);
        //$insert['intro']=preg_replace("/<b[^>]*>/", '<b>', $insert['intro']);
        $insert['intro'] = preg_replace("/<span[^>]*>/", '<span>', $insert['intro']);

        $insert['intro'] = preg_replace("/<i[^>]*>/", '<i>', $insert['intro']);
        //$insert['intro'] = preg_replace('#(<[a-z ]*)(style=("|\')(.*?)("|\'))([a-z ]*>)#', '\\1\\6', $insert['intro']);
        $insert['shareas'] = ($this->input->post('upsstatus'));
        $insert['date'] = date("Y-m-d");
        $insert['createdOn'] = date("Y-m-d H:i:s");
        $insert['userid'] = $this->session->userdata['user_id'];
        $insert['image'] = $this->upload_pic('picintro');


        if (isset($_POST['savedraft'])) {
            $insert['status'] = 3;
        } else if (isset($_POST['scedule'])) {
            $insert['status'] = 4;
            $insert['schedulepost'] = $this->input->post('scheduletime');
        } else if (isset($_POST['publish'])) {
            //selecting max value of publish_id
            $res = $this->db->query("SELECT MAX(publish_id) AS publish_id FROM fbblogmain WHERE status = 1");
            if ($res->num_rows == 0) {
                $insert['publish_id'] = 1;
            } else {
                $insert['publish_id'] = ($res->result()[0]->publish_id) + 1;
                $this->db->set('publishedOn', 'NOW()', FALSE);
            }
        }

        /* if($insert['image']=="")
          {
          echo "<script>";
          echo "alert('Error loading images. Please Retry')";
          echo "</script>";

          $category=$this->postvertualstory($insert['maincat']);
          } */


        $co = $cont - 1;
        $vals = $this->usermodel->insert_data('fbblogmain', $insert);
        $bid = $this->db->insert_id();

        /* for($k=1;$k<=$co;$k++)
          {
          $in['photo']=$this->upload_pic('photo'.$k);
          if($in['photo'][$k]=="")
          {
          echo "<script>";
          echo "alert('Error loading images. Please Retry')";
          echo "</script>";
          $category=$this->postvertualstory($insert['maincat']);

          }
          } */
        $j = 1;

        for ($i = 1; $i <= $co; $i++) {
            $j++;
            $insertimg['title'] = $bid;

            $insertimg['description'] = nl2br($this->input->post('textdes' . $j));
            $insertimg['description'] = strip_tags($insertimg['description'], '<div><br><p><b><i><span>');
            $insertimg['description'] = preg_replace('/<div[^>]*>/', '<div>', $insertimg['description']);

            $insertimg['description'] = preg_replace('/<p[^>]*>/', '<p>', $insertimg['description']);
            //$insertimg['description']=preg_replace('/<span[^>]*>/', '<span>',  $insertimg['description']);
            //$insertimg['description']=preg_replace('/<b[^>]*>/', '<b>',  $insertimg['description']);
            $insertimg['description'] = preg_replace('/<span[^>]*>/', '<span>', $insertimg['description']);

            $insertimg['description'] = preg_replace('/<i[^>]*>/', '<i>', $insertimg['description']);

            $insertimg['photo'] = $this->upload_pic('photo' . $i);


            //echo ($insertimg['photo']);
            $val = $this->usermodel->insert_data('fbblog', $insertimg);
        }

        redirect('');
    }

    /* function check_image() {
      $str = explode(".", $_FILES['picintro']['name']);

      if (!isset($str[1])) {
      $this->form_validation->set_message('check_image', 'Please choose image.');
      return FALSE;
      } else {
      if ($str[1] === 'jpg' || 'png' || 'jpeg' || 'gif') {
      return TRUE;
      } else {
      $this->form_validation->set_message('check_image', 'Please choose valid image.');
      return FALSE;
      }
      }
      }

      function check_sub_image($num) {
      $str = explode(".", $_FILES['photo' . $num]['name']);

      if (!isset($str[1])) {
      echo $str[1];
      $this->form_validation->set_message('check_sub_image', 'Please choose subimages.');
      return FALSE;
      } else {
      if ($str[1] === 'jpg' || 'png' || 'jpeg' || 'gif') {
      return TRUE;
      } else {
      $this->form_validation->set_message('check_sub_image', 'Please choose valid subimages.');
      return FALSE;
      }
      }
      }

      function textdes($num) {
      if ($this->input->post('textdes' . $num) == "") {
      $this->form_validation->set_message('textdes', 'Please give description');
      return FALSE;
      } else {
      return TRUE;
      }
      } */

      /* Inserting the board data in database*/
    function insertvertualboard() {

        $cont = $_POST['countrow'];
        $insert['maincat'] = ($this->input->post('catname'));
        $insert['category'] = ($this->input->post('realtopic'));
        $insert['boardname'] = ($this->input->post('boardcat'));
        $insert['boardname'] = str_replace("%20", " ", $insert['boardname']);
        $insert['head'] = ($this->input->post('title'));
        $insert['intro'] = nl2br($this->input->post('textdes1'));
        $insert['intro'] = strip_tags($insert['intro'], '<div><br><b><p><i><span>');
        $insert['intro'] = preg_replace("/<div[^>]*>/", '<div>', $insert['intro']);
        $insert['intro'] = preg_replace("/<p[^>]*>/", '<p>', $insert['intro']);
        //$insert['intro']=preg_replace("/<span[^>]*>/", '<span>',  $insert['intro']);
        //$insert['intro']=preg_replace("/<b[^>]*>/", '<b>', $insert['intro']);
        $insert['intro'] = preg_replace("/<span[^>]*>/", '<span>', $insert['intro']);

        $insert['intro'] = preg_replace("/<i[^>]*>/", '<i>', $insert['intro']);
        $insert['shareas'] = ($this->input->post('upsstatus'));
        $insert['date'] = date("Y-m-d");
        $insert['userid'] = $this->session->userdata['user_id'];
        $insert['image'] = $this->upload_pic('picintro');
        $insert['subboardname'] = ($this->input->post('sboard'));
        $insert['createdOn'] = date("Y-m-d H:i:s");


        if (isset($_POST['savedraft'])) {
            $insert['status'] = 3;
        }
        if (isset($_POST['scedule'])) {
            $insert['status'] = 4;
            $insert['schedulepost'] = $this->input->post('scheduletime');
        } else if (isset($_POST['publish'])) {
            //selecting max value of publish_id
            $res = $this->db->query("SELECT MAX(publish_id) AS publish_id FROM fbblogmain WHERE status = 1");
            if ($res->num_rows == 0) {
                $insert['publish_id'] = 1;
            } else {
                $insert['publish_id'] = ($res->result()[0]->publish_id) + 1;
                $this->db->set('publishedOn', 'NOW()', FALSE);
            }
        }
        if ($insert['image'] == "") {
            echo "<script>";
            echo "alert('Error loading images. Please Retry')";
            echo "</script>";

            $category = $this->postvertualstory($insert['maincat']);
        }


        $co = $cont - 1;
        $vals = $this->usermodel->insert_data('fbblogmain', $insert);
        $bid = $this->db->insert_id();

        for ($k = 1; $k <= $co; $k++) {
            $in['photo'] = $this->upload_pic('photo' . $k);
            if ($in['photo'][$k] == "") {
                echo "<script>";
                echo "alert('Error loading images. Please Retry')";
                echo "</script>";
                $category = $this->postvertualstory($insert['maincat']);
            }
        }
        $j = 1;

        for ($i = 1; $i <= $co; $i++) {
            $j++;
            $insertimg['title'] = $bid;

            $insertimg['description'] = nl2br($this->input->post('textdes' . $j));
            $insertimg['description'] = strip_tags($insertimg['description'], '<div><br><p><b><i><span>');
            $insertimg['description'] = preg_replace('/<div[^>]*>/', '<div>', $insertimg['description']);

            $insertimg['description'] = preg_replace('/<p[^>]*>/', '<p>', $insertimg['description']);
            //$insertimg['description']=preg_replace('/<span[^>]*>/', '<span>',  $insertimg['description']);
            //$insertimg['description']=preg_replace('/<b[^>]*>/', '<b>',  $insertimg['description']);
            $insertimg['description'] = preg_replace('/<span[^>]*>/', '<span>', $insertimg['description']);

            $insertimg['description'] = preg_replace('/<i[^>]*>/', '<i>', $insertimg['description']);

            $insertimg['photo'] = $this->upload_pic('photo' . $i);


            //echo ($insertimg['photo']);
            $val = $this->usermodel->insert_data('fbblog', $insertimg);
        }

        if ($insert['subboardname']) {
            $subboard = $insert['subboardname'];
            $select = "SELECT * FROM subboard WHERE sbid=$subboard";
            $result = $this->db->query($select);
            $result = $result->result_array();
            $boardid = $result['0']['boardid'];
            $board = "SELECT * FROM user_board WHERE bid=$boardid";
            $result_board = $this->db->query($board);
            $result_board = $result_board->result_array();
            $boardname = $result_board['0']['bordname'];

            redirect(base_url() . 'boards/' . $boardname . '/' . $insert['subboardname']);
        }
        //$board=str_replace(" ","%20",$insert['boardname']);
        redirect(base_url() . 'board/' . $insert['boardname']);
    }


    /* Function for viewing the board*/
    function boardview($cat) {

        $cat = str_replace("%20", " ", $cat);
        $uid = $this->session->userdata['user_id'];
        $data['uid'] = $uid;
        $data['boards'] = $this->usermodel->where_data('user_board', array('bordname' => $cat));
        $data['topic'] = $this->datamodel->topicboard($cat);
        //$data['topuser']= $this->datamodel->topusercategory($cat);
        $data['post'] = $this->datamodel->postcategorybord($cat, '24', '0');
        $data['catname'] = $cat;
        $boid = $data['catidm'] = $data['boards'][0]->bid;
        $data['user_id'] = $data['boards'][0]->userid;
        $data['proimg'] = $data['boards'][0]->image;
        $data['covimg'] = $data['boards'][0]->coverimg;
        $data['category'] = $data['boards'][0]->category;

        if (isset($_GET['id']) && isset($_GET['check'])) {
            /* echo "<script>";
              echo "alert('Reached')";
              echo "</script>"; */


            $list = $_GET['id'];
            $check = $_GET['check'];
            foreach ($check as $checked) {
                $update = "UPDATE fbblogmain SET subboardname=$list, boardname= NULL WHERE id=$checked";
                //echo $update;
                $result = $this->db->query($update);
            }
        } else {
            if (isset($_POST["savesubboard"])) {
                $insert['boardid'] = $data['catidm'];
                $insert['subboardname'] = $this->input->post('sbname');
                $insert['description'] = $this->input->post('sbdesc');
                $val = $this->usermodel->insert_data('subboard', $insert);
                //print_r($val);
            }
            if(isset($_POST['collab']))
            {
              $email=$_POST['emails'];
              //echo $email;

              $group_email=explode(",",$email);

                $user=$this->datamodel->getusernamebyid($uid);
                //print_r($user);
                $username=$user->username;

                //echo $username;

                for($i=0;$i<count($group_email);$i++)
                {
            $this->email->initialize(array(
                'protocol' => 'POP3',
                'smtp_host' => 'pop.secureserver.net',
                'smtp_user' => 'info@zersey.com',
                'smtp_pass' => 'info@300',
                'smtp_port' => 110,
            ));
            $trim_email=trim($group_email[$i]);
            $this->email->set_newline("\r\n");
            $this->email->from('info@zersey.com', 'Zersey');
            $this->email->to($trim_email);

//$this->email->cc('another@another-example.com');
//$this->email->bcc('them@their-example.com');
            $this->email->subject('Invitation');
            $this->email->message('Hello'. ',' . '<br/>' . '<b>' .
                    '                                  ' . '<br/>' .
                    'You have been invited to collaborate '.
                    'on the board by ' . $username . '<br>' .
                    '                                  ' . '<br/>' .
                    'To accept the invitation,please click on the below link:' . '<br/>' .
                    '                                  ' . '<br/>' .
                    '<a href="http://zersey.com/board/'.$cat.'"style="font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block" background-color="#FF0000"> <p text-align="center" color="#000000"> Link </p> </a>'
            );
            $this->email->send();

            	$insert['boardid']=$data['catidm'];
            	$insert['email']=$trim_email;
            	$insert['status']= 0;
           $invites = $this->usermodel->insert_data('board_invites', $insert);


            }
        }
        }
        //$data['cat']= $this->datamodel->getsubboard($boid);
        $data['subboard'] = $this->datamodel->getsubbodall($data['catidm']);
        //print_r($data['subboard']);

        $this->layout->view('board', $data, 'category');
    }


      /* Function for viewing the subboard*/
    function boardviews($cat, $sboid) {
        $cat = str_replace("%20", " ", $cat);
        $uid = $this->session->userdata['user_id'];
        $data['uid'] = $uid;
        $data['boards'] = $this->usermodel->where_data('user_board', array('bordname' => $cat));
        $data['topic'] = $this->datamodel->topicboard($cat);
        //$data['topuser']= $this->datamodel->topusercategory($cat);
        $data['catname'] = $cat;
        $boid = $data['catidm'] = $data['boards'][0]->bid;
        $data['user_id'] = $data['boards'][0]->userid;
        $data['proimg'] = $data['boards'][0]->image;
        $data['covimg'] = $data['boards'][0]->coverimg;

        /* if(isset($_POST['data']))
          {
          echo "<script>";
          echo "alert('Reached')";
          echo "</script>";
          $check=$_POST['checkbox'];
          $list=$_POST['data'];
          $update="UPDATE fbblogmain SET boardname = '0' , subboardname=$list WHERE id=$check";

          $result=$this->db->query($update);

          } */
        if (isset($_POST["savesubboard"])) {
            $insert['boardid'] = $data['catidm'];
            $insert['subboardname'] = $this->input->post('sbname');
            $insert['description'] = $this->input->post('sbdesc');
            $val = $this->usermodel->insert_data('subboard', $insert);
        }
        if(isset($_POST['collab']))
            {
              $email=$_POST['emails'];
              //echo $email;

              $group_email=explode(",",$email);

                $user=$this->datamodel->getusernamebyid($uid);
                //print_r($user);
                $username=$user->username;

                //echo $username;

                for($i=0;$i<count($group_email);$i++)
                {
            $this->email->initialize(array(
                'protocol' => 'POP3',
                'smtp_host' => 'pop.secureserver.net',
                'smtp_user' => 'info@zersey.com',
                'smtp_pass' => 'info@300',
                'smtp_port' => 110,
            ));
            $trim_email=trim($group_email[$i]);
            $this->email->set_newline("\r\n");
            $this->email->from('info@zersey.com', 'Zersey');
            $this->email->to($trim_email);

//$this->email->cc('another@another-example.com');
//$this->email->bcc('them@their-example.com');
            $this->email->subject('Invitation');
            $this->email->message('Hello'. ',' . '<br/>' . '<b>' .
                    '                                  ' . '<br/>' .
                    'You have been invited to collaborate '.
                    'on the board by ' . $username . '<br>' .
                    '                                  ' . '<br/>' .
                    'To accept the invitation,please click on the below link:' . '<br/>' .
                    '                                  ' . '<br/>' .
                    '<a href="http://zersey.com/board/'.$cat.'"style="font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block" background-color="#FF0000"> <p text-align="center" color="#000000"> Link </p> </a>'
            );
            $this->email->send();

            	$insert['boardid']=$data['catidm'];
            	$insert['email']=$trim_email;
            	$insert['status']= 0;
           $invites = $this->usermodel->insert_data('board_invites', $insert);


            }
        }
        $data['subboard'] = $this->datamodel->getsubbodall($data['catidm']);
        //$data['cat']= $this->datamodel->getsubboard($boid);
        $data['post'] = $this->datamodel->postcategorysubbord($sboid, '24', '0');


        $this->layout->view('board', $data, 'category');
    }


/* Function for creating the board*/
    function creatboard() {



        $insert['userid'] = $this->session->userdata['user_id'];
        $insert['bordname'] = $_POST['boardname'];
        $insert['description'] = $_POST['boarddesc'];
        $insert['category'] = $_POST['cat'];
        $insert['image'] = 'Board_Profile.png';
        $insert['coverimg'] = 'Cover_Pic_1.jpg';
        $insert['private']=$_POST['secret'];
        $insert['post'] = $_POST['publish'];
        $val = $this->usermodel->insert_data('user_board', $insert);

        //redirect('http://zersey.com/board/' .$insert['bordname']);
    }

    /* An invitation to collaborate is sent to a particular user by board owner. The users can leave the board if they find it uninteresting */
    function invitation()
    {
    		$email=$_POST['email'];
    	if(isset($_POST['accept']))
    	{
    	$accept=$_POST['accept'];
    	$status=$this->db->query("UPDATE board_invites SET status = 1 WHERE boardid=".$accept." AND email='".$email."'");
    	//echo "UPDATE board_invites SET status = 1 WHERE boardid=".$accept." AND email=".$email;

    }
    if(isset($_POST['reject']))
    {
    	$reject=$_POST['reject'];
    	$status=$this->db->query("UPDATE board_invites SET status = -1 WHERE boardid=".$reject." AND email='".$email."'");
    }
    if(isset($_POST['leave']))
    {
      $leave=$_POST['leave'];
      $status=$this->db->query("UPDATE board_invites SET status = -2 WHERE boardid=".$leave." AND email='".$email."'");
    }

    }

    function creatboardstory() {

        $insert['userid'] = $this->session->userdata['user_id'];
        $insert['bordname'] = $this->input->post('bname');
        $insert['description'] = $this->input->post('bdesc');
        $insert['category'] = $this->input->post('bcat');
        $insert['image'] = 'Board_Profile.png';
        $insert['coverimg'] = 'Cover_Pic_1.jpg';
        $val = $this->usermodel->insert_data('user_board', $insert);

        redirect(base_url() . 'poststory/' . $insert['category'] . '/' . $insert['bordname']);
    }

    function creatboardedit() {

        $insert['userid'] = $this->session->userdata['user_id'];
        $insert['bordname'] = $this->input->post('bname');
        $insert['description'] = $this->input->post('bdesc');
        $insert['category'] = $this->input->post('bcat');
        $insert['image'] = 'Board_Profile.png';
        $insert['coverimg'] = 'Cover_Pic_1.jpg';
        $val = $this->usermodel->insert_data('user_board', $insert);

        $boardname = $insert['bordname'];
        redirect(base_url() . 'posteditorial/' . $boardname);
    }

    function poststoryboard($bord) {

        $bord = str_replace("%20", " ", $bord);
        $uid = $this->session->userdata['user_id'];
        if (!$uid) {
            redirect('');
        }
        $cat = $this->datamodel->getcatbyboad($bord);
        $data['board'] = $bord;
        $data['pagename'] = "postpage";
        $data['boards'] = $this->usermodel->where_data('user_board', array('bordname' => $bord));
        $boid = $data['boards'][0]->bid;

        //$data['cat']= $this->datamodel->getsubboard($boid);

        $this->layout->view('post1', $data, 'post1');
    }

    function postviewedit1($id) {

        $data['post'] = $this->datamodel->selectintroofpost($id);


        if (isset($_POST["publish"])) {
            $ttl = $_POST['title'];
            $intr = $_POST['intro'];

            $url = $_POST['url'];


            $d = $this->datamodel->updateintroofpost($ttl, $intr, $id);
            redirect($url);
        }


        $data['pagename'] = "postpage";
        $this->layout->view('postviewedit1', $data, 'postviewedit1');
    }

    function postviewedit2($id) {
        $data['postdetails'] = $this->datamodel->selectdetailofposts($id);

        if (isset($_POST["published"])) {
            $intrd = $_POST['introd'];
            $intrd = preg_replace("/<div[^>]*>/", '<div>', $intrd);
            $intrd = preg_replace("/<p[^>]*>/", '<p>', $intrd);
            $intrd = preg_replace("/<span[^>]*>/", '<span>', $intrd);
            $intrd = preg_replace("/<i[^>]*>/", '<i>', $intrd);
            $url = $_POST['url'];

            $d = $this->datamodel->updatedetailofpost($intrd, $id);

            redirect($url);
        }




        $data['pagename'] = "postpage";
        $this->layout->view('postviewedit2', $data, 'postviewedit2');
    }

    function posteditorialedit() {



        $data['pagename'] = "postpage";
        $this->layout->view('posteditorialedit', $data, 'posteditorialedit');
    }

    function moreposts() {
        $data['uid'] = $this->session->userdata['user_id'];



        if (isset($_GET['data'])) {


            $id = $_GET['data'];

            array_push($ids, $id);
            print_r($ids);
            $data['edit'] = $this->datamodel->movetonexteditorial($id);
            //sizeof($data['edit']);
            print_r($data['edit']['0']['id']);
            $data['editorialdetail'] = $this->datamodel->selectdetailofpost($data['edit']['0']['id']);


            $this->load->view('postviewedt', $data, 'postviewedt');
        }
    }

    /* For viewing the editorials*/
    function postviewedt($id) {
        $data['uid'] = $this->session->userdata['user_id'];
        ?>

        <?php
        if (isset($_GET['comment']) && isset($_GET['comment_id'])) {
            $comment_id = $_GET['comment_id'];
            $comment = $_GET['comment'];
            $update = $this->db->query("UPDATE post_coment SET comment='" . $comment . "' WHERE cmtid=" . $comment_id);
            $data['next'] = $this->datamodel->movetonexteditorials($id);
            //$data['pagename']="postpage";

            $data['om'] = $this->datamodel->selectdetailofcomments($id);
            //print_r($data['om']);

            $this->load->view('postviewedt', $data, 'postviewedt');
        } else if (isset($_GET['cmtid'])) {
            $comment = $_GET['cmtid'];
            $delete = $this->db->query("DELETE FROM post_coment WHERE cmtid=" . $comment);
            $data['next'] = $this->datamodel->movetonexteditorials($id);
            //$data['pagename']="postpage";

            $data['om'] = $this->datamodel->selectdetailofcomments($id);
            $this->load->view('postviewedt', $data, 'postviewedt');
        } else if (isset($_GET['data'])) {
            if ($this->session->userdata['user_id'] == NULL) {

                redirect('/');
            } else {
                $insert['userid'] = $this->session->userdata['user_id'];
                $insert['comment'] = $_GET['data'];
                $insert['postid'] = $id;
                $insert['datetm'] = date('Y-m-d H:i:s');
                $vals = $this->usermodel->insert_data('post_coment', $insert);
                $bid = $this->db->insert_id();

                //$this->datamodel->getcomment($id);
                $data['next'] = $this->datamodel->movetonexteditorials($id);
                //$data['pagename']="postpage";

                $data['om'] = $this->datamodel->selectdetailofcomments($id);
                //print_r($data['om']);
                $this->load->view('postviewedt', $data, 'postviewedt');
            }
            if (isset($_POST['like'])) {
                if ($this->session->userdata['user_id'] == NULL) {

                } else {
                    $insertcom['userid'] = $this->session->userdata['user_id'];

                    $insertcom['postid'] = $id;

                    $val = $this->usermodel->insert_data('post_like', $insertcom);
                }
            }
        } else {

            $data['post'] = $this->datamodel->selectintroofpost($id);
            $data['postdetail'] = $this->datamodel->selectdetailofpost($id);
            $data['user_id'] = $uid;
            //$data['pagename']="postpage";

            if (isset($_POST['like'])) {
                if ($this->session->userdata['user_id'] == NULL) {

                } else {
                    $insertcom['userid'] = $this->session->userdata['user_id'];

                    $insertcom['postid'] = $id;

                    $val = $this->usermodel->insert_data('post_like', $insertcom);
                }
            }

            if (isset($_POST['save'])) {

                $comment = $_POST['bdesc'];
                if (strlen($comment) < 100) {
                    echo "<script>";
                    echo "alert('Comment should be at least 100 characters')";

                    echo "</script>";
                } else {
                    $postid = $_POST['postid'];

                    $userid = $_POST['userid'];

                    $this->datamodel->reportabuse($userid, $postid, $comment);
                    echo "<script>";
                    echo "alert('Your comment has been received')";

                    echo "</script>";
                    //$data['reported'] = 'report';
                }
            }

            $data['next'] = $this->datamodel->movetonexteditorials($id);
            //print_r($data['next'])."<br>";
            $data['editorialdetail'] = $this->datamodel->selectdetailofeditorials($id);

            $data['com'] = $this->datamodel->selectdetailofcomments($id);
            //print_r($data['com']);
            //$query= $this->db->query($sql);//$this->datamodel->getcomment($id);
            //$data['com']=$query->result_array();
            //print_r($data['editorialdetail']);
            //$data['pagename']="postpage";

            $this->layout->view('postviewedt', $data, 'postviewedt');
        }
    }

    function postviewedted($id) {

        $data['post'] = $this->datamodel->selectintroofpost($id);
        $data['postdetail'] = $this->datamodel->selectdetailofpost($id);
        if (isset($_POST["published"])) {
            $ttl = $_POST['title'];
            //echo $ttl;
            $intr = $_POST['intro'];
            //echo $intr;

            $intrd = $_POST['introd1'];

            $url = $_POST['url'];
            //echo $intrd;
            //echo 'UPDATE fbblog SET description="'.$intrd.'" where id="'.$id.'"';

            $d = $this->datamodel->updateintroofpost($ttl, $intr, $id);
            $e = $this->datamodel->updatedetailofeditorial($intrd, $id);
            redirect($url);
        }

        //$data['pagename']="postpage";
        $this->layout->view('postviewedted', $data, 'postviewedted');
    }

    function posteditorial($cat) {
        $cat = str_replace("%20", " ", $cat);
        $uid = $this->session->userdata['user_id'];
        if (!$uid) {
            redirect('');
        }
        $data['pagename'] = "postpage";
        $data['post'] = $this->datamodel->showpostschedule($usid);
        $data['boards'] = $this->usermodel->where_data('user_board', array('bordname' => $cat));
        $boid = $data['boards'][0]->bid;

        //$data['cat']= $this->datamodel->getsubboard($boid);


        $this->layout->view('posteditorial', $data, 'post1');
    }


    /* Form for posting a video from youtube or vine*/
    function postvideo($cat) {
        $cat = str_replace("%20", " ", $cat);
        $uid = $this->session->userdata['user_id'];
        if (!$uid) {
            redirect('');
        }
        $data['pagename'] = "postpage";
        $data['post'] = $this->datamodel->showpostschedule($usid);
        $data['boards'] = $this->usermodel->where_data('user_board', array('bordname' => $cat));
        $boid = $data['boards'][0]->bid;

        //$data['cat']= $this->datamodel->getsubboard($boid);


        $this->layout->view('postvideo', $data, 'post1');
    }

    function posteditorialboad($cat) {
        $cat = str_replace("%20", " ", $cat);
        $uid = $this->session->userdata['user_id'];
        if (!$uid) {

            redirect('');
        }
        $cat = $this->datamodel->getcatbyboad($bord);
        $data['board'] = $cat;
        $data['boards'] = $this->usermodel->where_data('user_board', array('bordname' => $cat));
        $boid = $data['boards'][0]->bid;

        $data['cat'] = $this->datamodel->getsubboard($boid);

        $this->layout->view('posteditorial', $data, 'post1');
    }

    function postcomment($pid) {

    }

    function inserteditorialpost() {

        $cont = $_POST['countrow'];
        $insert['maincat'] = ($this->input->post('catname'));
        $insert['category'] = ($this->input->post('realtopic'));
        $insert['boardname'] = '';
        $insert['head'] = ($this->input->post('title'));
        $insert['intro'] = ($this->input->post('intro'));
        $insert['intro'] = strip_tags($insert['intro'], '<div><br><p><b><i>');
        $insert['intro'] = preg_replace('/<div[^>]*>/', '<div>', $insert['intro']);

        $insert['intro'] = preg_replace('/<p[^>]*>/', '<p>', $insert['intro']);
        $insert['intro'] = preg_replace('/<span[^>]*>/', '<span>', $insert['intro']);

        $insert['intro'] = preg_replace('/<b[^>]*>/', '<b>', $insert['intro']);
        $insert['intro'] = preg_replace('/<i[^>]*>/', '<i>', $insert['intro']);

        $insert['shareas'] = ($this->input->post('upsstatus'));
        $insert['date'] = date("Y-m-d");
        $insert['createdOn'] = date("Y-m-d H:i:s");
        $insert['userid'] = $this->session->userdata['user_id'];
        $insert['image'] = $this->upload_pic('picintro');
        $insert['subboardname'] = ($this->input->post('sboard'));

        $insert['editorial'] = 1;

        if (isset($_POST['savedraft'])) {
            $insert['status'] = 3;
        } else if (isset($_POST['scedule'])) {
            $insert['status'] = 4;
            $insert['schedulepost'] = $this->input->post('scheduletime');
        } else if (isset($_POST['publish'])) {
            //selecting max value of publish_id
            $res = $this->db->query("SELECT MAX(publish_id) AS publish_id FROM fbblogmain WHERE status = 1");
            if ($res->num_rows == 0) {
                $insert['publish_id'] = 1;
            } else {
                $insert['publish_id'] = ($res->result()[0]->publish_id) + 1;
                $insert['publishedOn'] = date("Y-m-d H:i:s");
            }
        }






        $vals = $this->usermodel->insert_data('fbblogmain', $insert);
        $bid = $this->db->insert_id();

        $insertimg['title'] = $bid;
        $insertimg['description'] = ($this->input->post('textdes'));
        $insertimg['description'] = strip_tags($insertimg['description'], '<div><br><p><b><i>');
        $insertimg['description'] = preg_replace("/<div[^>]*>/", '<div>', $insertimg['description']);
        $insertimg['description'] = preg_replace("/<p[^>]*>/", '<p>', $insertimg['description']);
        $insertimg['description'] = preg_replace("/<span[^>]*>/", '<span>', $insertimg['description']);

        $insertimg['description'] = preg_replace("/<b[^>]*>/", '<b>', $insertimg['description']);
        $insertimg['description'] = preg_replace("/<i[^>]*>/", '<i>', $insertimg['description']);

        $insertimg['photo'] = '';
        //echo ($insertimg['photo']);
        $val = $this->usermodel->insert_data('fbblog', $insertimg);

        redirect('');
    }


    /* Inserting the data of video in database.*/
    function insertvideo() {

        $cont = $_POST['countrow'];
        $insert['maincat'] = ($this->input->post('catname'));
        $insert['category'] = ($this->input->post('realtopic'));
        $insert['boardname'] = '';
        $insert['head'] = ($this->input->post('title'));
        $insert['intro'] = ($this->input->post('intro'));
        $insert['intro'] = strip_tags($insert['intro'], '<div><br><p><b><i>');
        $insert['intro'] = preg_replace('/<div[^>]*>/', '<div>', $insert['intro']);

        $insert['intro'] = preg_replace('/<p[^>]*>/', '<p>', $insert['intro']);
        $insert['intro'] = preg_replace('/<span[^>]*>/', '<span>', $insert['intro']);

        $insert['intro'] = preg_replace('/<b[^>]*>/', '<b>', $insert['intro']);
        $insert['intro'] = preg_replace('/<i[^>]*>/', '<i>', $insert['intro']);

        $insert['shareas'] = ($this->input->post('upsstatus'));
        $insert['date'] = date("Y-m-d");
        $insert['createdOn'] = date("Y-m-d H:i:s");
        $insert['userid'] = $this->session->userdata['user_id'];
        $insert['image'] = $this->input->post('url');
        $insert['subboardname'] = ($this->input->post('sboard'));

        $insert['editorial'] = 2;

        if (isset($_POST['savedraft'])) {
            $insert['status'] = 3;
        } else if (isset($_POST['scedule'])) {
            $insert['status'] = 4;
            $insert['schedulepost'] = $this->input->post('scheduletime');
        } else if (isset($_POST['publish'])) {
            //selecting max value of publish_id
            $res = $this->db->query("SELECT MAX(publish_id) AS publish_id FROM fbblogmain WHERE status = 1");
            if ($res->num_rows == 0) {
                $insert['publish_id'] = 1;
            } else {
                $insert['publish_id'] = ($res->result()[0]->publish_id) + 1;
                $insert['publishedOn'] = date("Y-m-d H:i:s");
            }
        }






        $vals = $this->usermodel->insert_data('fbblogmain', $insert);
        $bid = $this->db->insert_id();

        $insertimg['title'] = $bid;
        $insertimg['description'] = ($this->input->post('textdes'));
        $insertimg['description'] = strip_tags($insertimg['description'], '<div><br><p><b><i>');
        $insertimg['description'] = preg_replace("/<div[^>]*>/", '<div>', $insertimg['description']);
        $insertimg['description'] = preg_replace("/<p[^>]*>/", '<p>', $insertimg['description']);
        $insertimg['description'] = preg_replace("/<span[^>]*>/", '<span>', $insertimg['description']);

        $insertimg['description'] = preg_replace("/<b[^>]*>/", '<b>', $insertimg['description']);
        $insertimg['description'] = preg_replace("/<i[^>]*>/", '<i>', $insertimg['description']);

        $insertimg['photo'] = $this->input->post('url');
        //echo ($insertimg['photo']);
        $val = $this->usermodel->insert_data('fbblog', $insertimg);

        redirect('');
    }

    function inserteditorialboard() {

        $insert['maincat'] = ($this->input->post('catname'));
        $insert['category'] = ($this->input->post('realtopic'));
        $insert['boardname'] = ($this->input->post('boardcat'));
        $insert['head'] = ($this->input->post('title'));
        $insert['intro'] = ($this->input->post('intro'));
        $insert['shareas'] = ($this->input->post('upsstatus'));
        $insert['date'] = date("Y-m-d");
        $insert['userid'] = $this->session->userdata['user_id'];
        $insert['image'] = $this->upload_pic('picintro');
        $insert['subboardname'] = ($this->input->post('sboard'));
        
       $insert['createdOn'] = date("Y-m-d H:i:s");
       $insert['publishedOn'] = date("Y-m-d H:i:s");
       $select=$this->db->query("SELECT * FROM user_board WHERE bordname= '".$insert['boardname']."'");
       echo "SELECT * FROM user_board WHERE bordname= '".$insert['boardname']."'";
          $boards=$select->result_array();
            print_r($boards);


        $insert['editorial'] = 1;
        if (isset($_POST['savedraft'])) {
            $insert['status'] = 3;
        } else if (isset($_POST['scedule'])) {
            $insert['status'] = 4;
            $insert['schedulepost'] = $this->input->post('scheduletime');
        } else if (isset($_POST['publish'])) {
            //selecting max value of publish_id
              if($boards[0]['private'] == 1)
              {
                $insert['publish_id'] = NULL;
              }

              else
              {
            $res = $this->db->query("SELECT MAX(publish_id) AS publish_id FROM fbblogmain WHERE status = 1");
            if ($res->num_rows == 0) {
                $insert['publish_id'] = 1;
            } else {
                $insert['publish_id'] = ($res->result()[0]->publish_id) + 1;
                $this->db->set('publishedOn', 'NOW()', FALSE);
            }
        }
      }




        $vals = $this->usermodel->insert_data('fbblogmain', $insert);
        $bid = $this->db->insert_id();
        $insertimg['title'] = $bid;

        $insertimg['description'] = ($this->input->post('textdes'));
        $insertimg['photo'] = "";
        //echo ($insertimg['photo']);
        $val = $this->usermodel->insert_data('fbblog', $insertimg);
        if ($insert['subboardname']) {
            $subboard = $insert['subboardname'];
            $select = "SELECT * FROM subboard WHERE sbid=$subboard";
            $result = $this->db->query($select);
            $result = $result->result_array();
            $boardid = $result['0']['boardid'];
            $board = "SELECT * FROM user_board WHERE bid=$boardid";
            $result_board = $this->db->query($board);
            $result_board = $result_board->result_array();
            $boardname = $result_board['0']['bordname'];

            redirect(base_url() . 'boards/' . $boardname . '/' . $insert['subboardname']);
        }
        redirect(base_url() . 'board/' . $insert['boardname']);
    }

  /*  function uploaduserimg() {

        $propic = $this->upload_userpic('prophoto');
        $name = ($this->input->post('catman'));
        if ($propic) {
            $insert['photo'] = $propic;
        }
        $covpic = $this->upload_userpic('covphoto');
        if ($covpic) {
            $insert['covimg'] = $covpic;
        }
        if ($propic || $covpic) {
            $id = ($this->input->post('catidm'));
            $this->db->where('userId', $id);
            $this->db->update('customer', $insert);
        }

        redirect(base_url() . 'userprofile/' . $name);
    }*/


 function uploaduserimg() {

        $propic = $this->upload_userpic('prophoto');
        $name = ($this->input->post('catman'));
        if ($propic) {
            $insert['photo'] = $propic;
        }
        $covpic = $this->upload_userpic('covphoto');
        if ($covpic) {
            $insert['covimg'] = $covpic;
        }
        if ($propic || $covpic) {
            $id = ($this->input->post('catidm'));
            $this->db->where('userId', $id);
            $this->db->update('customer', $insert);
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    function uploadcatdetail() {

        $propic = $this->upload_catpic('prophoto');
        $name = ($this->input->post('catman'));
        if ($propic) {
            $insert['proimage'] = $propic;
        }
        $covpic = $this->upload_catpic('covphoto');
        if ($covpic) {
            $insert['covimage'] = $covpic;
        }
        if ($propic || $covpic) {
            $id = ($this->input->post('catidm'));
            $this->db->where('id', $id);
            $this->db->update('category', $insert);
        }

        redirect(base_url() . 'category/' . $name);
    }

    function uploadboarddetail() {
        $propic = $this->upload_catpic('prophoto');
        $name = ($this->input->post('catman'));
        if ($propic) {
            $insert['image'] = $propic;
        }
        $covpic = $this->upload_catpic('covphoto');
        if ($covpic) {
            $insert['coverimg'] = $covpic;
        }
        if ($propic || $covpic) {
            $id = ($this->input->post('catidm'));
            $this->db->where('bid', $id);
            $this->db->update('user_board', $insert);
        }

        redirect(base_url() . 'board/' . $name);
    }

    function upload_catpic($name) {
        //	print_r($_FILES);exit;
        //load the helper
        $this->load->helper('form');
        $config['upload_path'] = './assert/catimg/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '3000';
        $config['max_width'] = '10240';
        $config['max_height'] = '7680';
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
        $config['max_size'] = '3000';
        $config['max_width'] = '10240';
        $config['max_height'] = '7680';
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

    function postschedule($a) {

        $uid = $this->session->userdata['user_id'];
        if (!$uid) {
            redirect('');
        }
        $data['user_id'] = $this->datamodel->userdetailbyusername($a);
        $usid = $data['user_id']->id;

        $data['post'] = $this->datamodel->showpostschedule($usid);


        $this->layout->view('postdraft', $data, 'postdraft');
    }


    /* For following the board*/

	    function boardfollow() {
        $uid = $this->session->userdata['user_id'];


        $data['userid'] = $uid;
        $data['boardid'] = $_POST['bid'];

        $a = $this->datamodel->insertboardfol($data);

        redirect($_SERVER['HTTP_REFERER']);
    }

    function confirmsignup() {
        $uid = $this->session->userdata['user_id'];

        $data['post'] = $this->datamodel->dashboarddata2($uid, '24', '2147483647');
        $data['pname'] = 'home';
        $this->layout->view('confirmsignup', $data, 'confirmsignup');
    }

    function deletebfollow($foloid) {
        $pro2 = $this->datamodel->deleteboardfol($foloid);
        redirect($_SERVER['HTTP_REFERER']);
    }

    function deletepost($id) {
        $t = $this->datamodel->deletepost($id);
        redirect('dashboard');
    }
    /* Function for following the user*/
    function followUser($usid, $uid) {

        $a = $this->datamodel->insertfol($usid, $uid);
        redirect($_SERVER['HTTP_REFERER']);
        $data['a'] = $a;
        print_r($a);
        $this->load->view('userprofile', $data);
    }
    /* Function to unfollow the user*/
    function unfollowUser($usid, $uid) {

        $a = $this->datamodel->deletefol($usid, $uid);
        redirect($_SERVER['HTTP_REFERER']);
        $data['b'] = $a;
        print_r($b);
        $this->load->view('userprofile', $data);
    }

    /*     * ********new function********* */

    function categoryfollowByName() {
        $uid = $this->session->userdata['user_id'];
        if (isset($_POST["flw"])) {
            $data['userid'] = $uid;
            $cat_name = $_POST['cid'];
            $catName_arr = explode(",", $cat_name);
            foreach ($catName_arr as $cat_arr) {
                $data['catid'] = $cat_arr;
                $a = $this->datamodel->insertcatfol($data);
            }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

 public function contactus(){
		 if(isset($_POST['submit'])){
			 $name=$data['name']=$this->input->post('name');
			 $email=$data['email']=$this->input->post('email');
			 $subject=$data['subject']=$this->input->post('subject');
			 $message=$data['message']=$this->input->post('message');
			 $result=$this->datamodel->contact($data);
			 $this->load->library('email');
		//$this->load->database();

			$this->email->initialize(array(
				  'protocol' => 'POP3',
  				'smtp_host' => 'pop.secureserver.net',
  				'smtp_user' => 'info@zersey.com',
  				'smtp_pass' => 'info@300',
  				'smtp_port' => 110,
						));
				$this->email->set_newline("\r\n");
	
				$this->email->from($email, 'Zersey');
				$this->email->to('apeksha.lad@gmail.com');
						$email=$this->input->post('email');

$this->email->subject($subject);
		$this->email->message("$name,</br>$message");
					 
$this->email->send();


			 redirect('');
		 }else{
		
		 }
	 }
	 
	 public function autocomplete(){
		 
		 $autosrch = $this->input->post('realcat');  
        //$data['response'] = 'false'; //Set default response  
        $query = $this->datamodel->search($autosrch);
	 }
}
