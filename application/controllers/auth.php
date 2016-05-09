<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');ob_start();

//ini_set('display_errors', 1);
//error_reporting(E_ALL);
class Auth extends CI_Controller {

    private $uid;
    private $access_token;

    function __construct() {

        //include 'HTTP_Request2-2.3.0/HTTP/Request2.php';
        //include 'plivo.php';

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('usermodel');
        $this->load->model('tank_auth/users');
        $this->load->helper('security');
        $this->load->library('tank_auth');
        $this->lang->load('tank_auth');
        $this->load->helper('url');
        $this->load->library('email', $config);
        $this->load->library('plivo');
        $this->load->helper('cookie');

        if (!$this->input->is_ajax_request()) {
            // if()
            // {
            // $newdata = array('url'=>'viewmap/'.basename($_SERVER['REQUEST_URI']));
            // $this->session->set_userdata($newdata);
            // }
            if ($this->session->userdata('logged_in') != TRUE && basename($_SERVER['REQUEST_URI']) != 'login') {
                $this->load->helper('url');
                $newdata = array('url' => current_url());
                $this->session->set_userdata($newdata);
            }
        }
    }

    function index() {
        if ($message = $this->session->flashdata('message')) {
            $this->layout->view('auth/general_message', array('message' => $message, 'pageName' => 'register'));
        } else {
            redirect('/');
        }
    }

    /**
     * Login user on the site
     *
     * @return void
     */
    function signUp() {
        $insert['business'] = 'C';
        $insert['userLevel'] = 4;
        $email = $this->input->post('email');
        $phone = $this->input->post('phno');
        $username = $this->input->post('UserName');
        $this->form_validation->set_rules('UserName', 'Username', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[' . $this->config->item('password_min_length', 'tank_auth') . ']|max_length[' . $this->config->item('password_max_length', 'tank_auth') . ']');
        $this->form_validation->set_rules('firstName', 'firstName', 'trim|required');
        $this->form_validation->set_rules('lastName', 'lastName', 'trim|required');
        $this->form_validation->set_rules('ContactNo', 'phno', 'trim|required');

        $query_email = "SELECT * FROM users WHERE email LIKE '$email'";
        //echo $query_email."<br>";

        $result_email = $this->db->query($query_email);
        $count_email = $result_email->num_rows();
        //echo $count_email."<br>";
        $query_phone = "SELECT * FROM users WHERE monum='$phone'";
        //echo $query_phone."<br>";
        $result_phone = $this->db->query($query_phone);
        $count_phone = $result_phone->num_rows();
        $query_username = "SELECT * FROM users WHERE username LIKE '$username'";
        //echo $query_username;
        $result_username = $this->db->query($query_username);
        $count_username = $result_username->num_rows();
        //echo $count_username;


        if ($count_username != 0) {
            echo "<script language=\"JavaScript\">\n";
            echo "alert(' Username is already registered ');\n";
            echo "window.location='http://zersey.com'";
            echo "</script>";
        } else if ($count_phone != 0 || $count_email != 0) {
            echo "<script language=\"JavaScript\">\n";
            echo "alert(' Email or Mobile No. is already registered ');\n";
            echo "window.location='http://zersey.com'";
            echo "</script>";
        } else {
            $plivo = rand(0, 99999);

            $insert['firstName'] = $this->input->post('firstName');
            $insert['lastName'] = $this->input->post('lastName');
            $insert['fullName'] = $insert['firstName'] . " " . $insert['lastName'];
            $insert['email'] = $this->input->post('email');
            $insert['username'] = $this->input->post('UserName');
            $insert['activated'] = 0;
            $hasher = new PasswordHash();
            $insert['password'] = $hasher->HashPassword($this->input->post('password'));
            $insert['monum'] = $this->input->post('phno');
            $insert['verify_code'] = md5($plivo);
            $this->usermodel->saveSignUpData($insert);
            $data['plivo'] = $insert['verify_code'];
            $data['mobno'] = $insert['monum'];

            $this->load->library('email');

            $this->email->initialize(array(
                'protocol' => 'POP3',
                'smtp_host' => 'pop.secureserver.net',
                'smtp_user' => 'info@zersey.com',
                'smtp_pass' => 'info@300',
                'smtp_port' => 110,
            ));
            $this->email->set_newline("\r\n");
            $this->email->from('info@zersey.com', 'Zersey');
            $this->email->to($this->input->post('email'));

//$this->email->cc('another@another-example.com');
//$this->email->bcc('them@their-example.com');
            $this->email->subject('Signing Up');
            $this->email->message('Hello' . " " . $this->input->post('username') . ',' . '<br/>' . '<b>' .
                    '                                  ' . '<br/>' .
                    'Yay, You are in' . '</b>' . "<br/>" .
                    '                                  ' . '<br/>' .
                    'We are excited to invite you to join our community' . '<br>' .
                    '                                  ' . '<br/>' .
                    'To claim your account,please click on the below link:' . '<br/>' .
                    '                                  ' . '<br/>' .
                    '<a href="http://zersey.com"  style="font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block" background-color="#FF0000"> <p text-align="center" color="#000000"> Account Link </p> </a>'
            );
            $this->email->send();



            //$auth_id = "MAN2IWMJU1ZDI5OTA3M2";
            //$auth_token = "NjIxNGFhNGQzNDQxMTc3MDY1YzE1MDRiMDNhYTM4";
            //echo "Create InstaNCE";
            //$p = new Plivo($auth_id, $auth_token);
            //$plivo=rand(0,99999);
            // Send a message
            $params = array(
                'src' => '919871425506', // Sender's phone number with country code
                'dst' => '91' . $insert['monum'], // Receiver's phone number with country code
                'text' => 'Thanks for signing up. Your verification code is ' . $plivo // Your SMS text message
                    //'text' => 'こんにちは、元気ですか？' # Your SMS Text Message - Japanese
                    //'text' => 'Ce est texte généré aléatoirement' # Your SMS Text Message - French
            );
            // Send message
//$params="hi, this is a test message";
            $this->plivo->send_sms($params);

//echo $params['text'];
            /* $response = $p->send_sms($params);
              // Print the response
              echo "Response : ";
              print_r($response);
              // Print the Api ID
              echo "<br> Api ID : {$response['response']['api_id']} <br>";
              // Print the Message UUID
              echo "Message UUID : {$response['response']['message_uuid'][0]} <br>"; */
            /* echo "<script language=\"JavaScript\">\n";
              echo "var code = prompt('Please enter your verification code from mobile');\n";
              //echo "alert(code)";
              echo "window.location='http://zersey.com'";
              echo "</script>"; */
            $this->load->view('otp', $data);

            /* require 'plivo.php';
              $plivo=new Plivo("MAN2IWMJU1ZDI5OTA3M2","NjIxNGFhNGQzNDQxMTc3MDY1YzE1MDRiMDNhYTM4","https://api.plivo.com","v1");
              $params = array(
              'src' => '0919999001344', //sender id, which must bought from plivo.com
              'dst' => '0917874215616',
              'text' => 'test SMS from plivo',
              );
              $response = $plivo->send_message($params);
              print_r($response);
              echo "Script End"; */
            //$this->load->view('success');
        }
    }

    function email($email) {
        $query = "SELECT * FROM users WHERE email='$email'";
        echo $query . "<br>";

        $result = $this->db->query($query);
        $count = $result->num_rows();
        echo $count;
        if ($count != 0) {
            $this->form_validation->set_message('email', 'Email is already registered');
            return false;
        } else if ($count == 0) {
            return true;
        }
    }

    function phoneno($phone) {
        $query = "SELECT * FROM users WHERE monum= '$phone'";
        echo $query . "<br>";
        $result = $this->db->query($query);
        $count = $result->num_rows();

        echo $count;
        if ($count != 0) {
            $this->form_validation->set_message('phoneno', 'Mobile Number is already registered');
            return false;
        } else if ($count == 0) {
            return true;
        }
    }

    /* Incorrecto otp entered by the user*/
    function incorrect_otp($random, $phone) {

        $data['plivo'] = $random;
        $data['mobno'] = $phone;
        $this->load->view('otp', $data);
    }


    /* Request for resending OTP in case it is not received or accidentally deleted*/
    function resend_otp($mobno) {
        $plivo = rand(0, 99999);
        $params = array(
            'src' => '919871425506', // Sender's phone number with country code
            'dst' => '91' . $mobno, // Receiver's phone number with country code
            'text' => 'Thanks for signing up. Your verification code is ' . $plivo // Your SMS text message
                //'text' => 'こんにちは、元気ですか？' # Your SMS Text Message - Japanese
                //'text' => 'Ce est texte généré aléatoirement' # Your SMS Text Message - French
        );

        // Send messag
//$params="hi, this is a test message";
        $this->plivo->send_sms($params);
        $plivo_hash = md5($plivo);
        $update = "UPDATE users SET verify_code='$plivo_hash' WHERE monum=$mobno";
        $this->db->query($update);
        $data['plivo'] = $plivo_hash;
        $data['mobno'] = $mobno;
        $this->load->view('otp', $data);
    }


    /* OTP entered byu the user is matched to the OTP received. IF successful, user is succesfully registered*/
    function verify_otp($plivo) {
        //include 'users.php';
        //$user=new Users();
        /* $uid=$this->session->userdata['user_id'];
          session_start(); */
        //$this->load->library('session');

        $otp = $this->input->post('otp');
        $mobile = $this->input->post('mobile');
        $otp_hash = md5($otp);
        if ($plivo == $otp_hash) {
            $update = "UPDATE users SET activated='1' WHERE monum=$mobile ORDER BY id DESC LIMIT 1";
            $this->db->query($update);

            //redirect('users/dashboard');		//$user->index();
            $select = "SELECT * FROM users WHERE monum=$mobile ORDER BY id DESC LIMIT 1";
            //echo $select;
            $result = $this->db->query($select);
            $user = $result->row_array();
            $userid = $user['id'];
            $dat = array(
                'user_id' => $user['id'],
                'username' => $user['username'],
                'fullName' => $user['fullName'],
                'user_level' => $user['userLevel'],
                'reward' => $user['reward'],
                'status' => ($user['activated'] == 1) ? 'STATUS_ACTIVATED' :'STATUS_NOT_ACTIVATED',
            );
            $this->session->set_userdata($dat);


            redirect('');
            /* echo "<script language=\"JavaScript\">\n";
              echo "alert('OTP is verified. You can now log in');\n";

              echo "window.location='http://zersey.com/dashboard'";
              echo "</script>"; */
        } else {
            echo "<script language=\"JavaScript\">\n";
            echo "alert('OTP is incorrect. Please try again');\n";
            echo "window.location='http://zersey.com/auth/incorrect_otp/$plivo/$mobile'";
            echo "</script>";
        }
    }


    /* To change the password to a new one. This can be done from the user profile.*/
    function request_password($email) {

        if (isset($_POST['submit'])) {
            $password = $this->input->post('password');
            //echo $password;
            $email_new = $this->input->post('email');
            //echo $email_new;
            $hasher = new PasswordHash();
            $password_new = $hasher->HashPassword($password);
            $update = "UPDATE users SET password='$password_new' WHERE email='$email_new' ";
            //echo $update;
            $this->db->query($update);
            echo "<script language=\"JavaScript\">\n";
            echo "alert('Password changed successfully');\n";
            echo "window.location='http://m.zersey.com'";
            echo "</script>";
        } else {
            $data['email'] = $email;

            $this->load->view('change_password', $data);
        }
    }


    /* When user logs in with the credentials.*/
    function login() {

        $data['login_by_username'] = ($this->config->item('login_by_username', 'tank_auth') AND
                $this->config->item('use_username', 'tank_auth'));
        $data['login_by_email'] = $this->config->item('login_by_email', 'tank_auth');

        $this->form_validation->set_rules('login', 'Login', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('remember', 'Remember me', 'integer');
        // Get login for counting attempts to login

        if ($this->config->item('login_count_attempts', 'tank_auth') AND ( $login = $this->input->post('login'))) {

            $login = $this->security->xss_clean($login);
        } else {
            $login = '';
        }

        $data['errors'] = array();
        if ($this->form_validation->run()) {        // validation ok
            if ($this->tank_auth->login(
                            /* echo "<script language=\"JavaScript\">\n";
                              echo "alert('Please enter your verification code from mobile');\n";
                              //echo "alert(code)";
                              echo "window.location='http://zersey.com'";
                              echo "</script>"; */
                            $this->form_validation->set_value('login'), $this->form_validation->set_value('password')
                    )) {
                //var_dump($this->session->userdata('user_level'));exit;


                if ($this->session->userdata('user_level') != '4') {
                    if ($this->session->userdata('bidurl')) {
                        $this->session->unset_userdata('bidurl');

                        //redirect('bidService');
                    }
                    //redirect($_SERVER['HTTP_REFERER']);
                }
                if ($this->session->userdata('url'))
                    $url = $this->session->userdata('url');
                else
                    $url = "/users";

                //redirect("$url");
            } else {
                $errors = $this->tank_auth->get_error_message();


                if (isset($errors['banned'])) {        // banned user
                    $this->_show_message($this->lang->line('auth_message_banned') . ' ' . $errors['banned']);
                } elseif (isset($errors['not_activated'])) { // not activated user
                    //redirect('/auth/send_activation');
                    echo "<script language=\"JavaScript\">\n";
                    echo "alert('Incorrect email or password. Please ensure email is verified through OTP verification');\n";
                    echo "</script>";
                } else {             // fail
                    foreach ($errors as $k => $v)
                        $data['errors'][$k] = $this->lang->line($v);
                }
            }
            /** -- no need of redirect everywhere * */
            redirect('');
        }
        $data['show_captcha'] = FALSE;
        if ($this->tank_auth->is_max_login_attempts_exceeded($login)) {
            $data['show_captcha'] = TRUE;
            // if ($data['use_recaptcha']) {
            // $data['recaptcha_html'] = $this->_create_recaptcha();
            // } else {
            // $data['captcha_html'] = $this->_create_captcha();
            // }
        }
        //$this->layout->view('auth/login_form', $data);
        redirect($_SERVER['HTTP_REFERER']);
        //redirect('/');*/
    }

    /**
     * Logout user
     *
     * @return void
     */
    function logout() {
        $this->load->library('HybridAuthLib');
        $this->load->library('cart');
        $this->cart->destroy();
        $this->tank_auth->logout();
        $this->hybridauthlib->logoutAllProviders();
        $this->uid = NULL;
        //echo $_SERVER['HTTP_REFERER'];
        //$this->_show_message($this->lang->line('auth_message_logged_out'));
        redirect(base_url());
        //$this->db->query($update);
    }

    /* The facebook login */
    function fblogin() {
        parse_str($_SERVER['QUERY_STRING'], $_REQUEST);
        $this->load->library("facebook", array(
            'appId' => '538927462950396', 'secret' => '5c26195405f75452d53589faf9796588'));
        $this->uid = $this->facebook->getUser();
        $this->access_token = $this->facebook->getAccessToken();
        $this->facebook->setAccessToken($this->access_token);
        if ($this->uid) {

            echo $this->uid;
            try {
                $user_profile = $this->facebook->api('/me?fields=email,name,birthday,hometown,first_name,last_name,work,cover,gender,bio');
                $user_pic = $this->facebook->api('/me/picture?redirect=false&height=300');
//print_r($user_profile);
//echo $user_pic['data']['url'];
                $gender = $user_profile['gender'];
                if ($gender == 'male') {
                    $gender = 'M';
                } else {
                    $gender = 'F';
                }

                $this->db->select('*');
                $this->db->where('email', $user_profile['email']);
                $query = $this->db->get('users');
                echo $query->num_rows();
                if ($query->num_rows() == 0) {
                    $insert['business'] = 'C';
                    $insert['userLevel'] = 4;
                    $insert['firstName'] = $user_profile['first_name'];
                    $insert['lastName'] = $user_profile['last_name'];
                    $insert['fullName'] = $user_profile['name'];
                    $insert['email'] = $user_profile['email'];
                    $insert['username'] = $user_profile['last_name'] . " " . $user_profile['first_name'];
                    $insert['fbgmid'] = $user_profile['id'];
                    $this->db->insert('users', $insert);
                    $cust['userId'] = $this->db->insert_id();
                    $cust['fullname'] = $insert['fullName'];
                    $cust['gender'] = $gender;
                    $cust['photo'] = $user_pic['data']['url'];
                    $cust['covimg'] = $user_profile['cover']['source'];
                    $this->db->insert('customer', $cust);
                    $profile['user_id'] = $cust['userId'];
                    $profile['name'] = $user_profile['name'];
                    $profile['photo'] = $user_pic['data']['url'];
                    $this->db->insert('user_profiles', $profile);
                    $this->load->library('session');
                    $user = $this->usermodel->findallDetailsUserById($cust['userId']);
                    $dat = array(
                        'user_id' => $user[0]['id'],
                        'username' => $user[0]['username'],
                        'fullName' => $user[0]['fullName'],
                        'user_level' => $user[0]['userLevel'],
                        'reward' => $user[0]['reward'],
                        'status' => ($user[0]['activated'] == 1) ? 'STATUS_ACTIVATED': 'STATUS_NOT_ACTIVATED',
                    );
                    $this->session->set_userdata($dat);
                    redirect('');
                } else {
                    print_r($user_profile);
                    $query = $this->db->query("Select * from `users` where fbgmId=$this->uid");
                    echo $query->num_rows();
                    $id = '';
                    foreach ($query->result_array() as $row) {
                        $id = $row['id'];
                    }
                    if ($query->num_rows()) {
                        $this->load->library('session');
                        $user = $this->usermodel->findallDetailsUserById($id);
                        $dat = array(
                            'user_id' => $user[0]['id'],
                            'username' => $user[0]['username'],
                            'fullName' => $user[0]['fullName'],
                            'user_level' => $user[0]['userLevel'],
                            'reward' => $user[0]['reward'],
                            'status' => ($user[0]['activated'] == 1) ? 'STATUS_ACTIVATED': 'STATUS_NOT_ACTIVATED',
                        );
                        $this->session->set_userdata($dat);
                        redirect('');
                    } else {
                        redirect(base_url());
                    }
                }
            } catch (FacebookException $e) {
                $this->uid = NULL;
            }
        } else {
            die("<script>window.location='" . $this->facebook->getLoginUrl(array(
                        'redirect_uri' => base_url() . 'auth/fblogin',
                        'scope' => array('email', 'user_likes', 'publish_actions', 'user_about_me', 'user_birthday', 'user_friends', 'user_photos', 'user_location', 'user_hometown', 'user_education_history') // permissions here
                    )) . "'</script>");
        }
    }

    function register() {
        $business = 'C';
        $userlevel = 4;

        if ($this->tank_auth->is_logged_in()) {         // logged in
            redirect('');
        } elseif ($this->tank_auth->is_logged_in(FALSE)) {      // logged in, not activated
            redirect('/auth/send_again/');
        } elseif (!$this->config->item('allow_registration', 'tank_auth')) { // registration is off
            $this->_show_message($this->lang->line('auth_message_registration_disabled'));
        } else {
            $use_username = $this->config->item('use_username', 'tank_auth');
            if ($use_username) {
                $this->form_validation->set_rules('username', 'Username', 'trim|required');
            }

            $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[' . $this->config->item('password_min_length', 'tank_auth') . ']|max_length[' . $this->config->item('password_max_length', 'tank_auth') . ']');
            $this->form_validation->set_rules('firstName', 'firstName', 'trim|required');
            $this->form_validation->set_rules('lastName', 'lastName', 'trim|required');
            // $captcha_registration	= $this->config->item('captcha_registration', 'tank_auth');
            // $use_recaptcha			= $this->config->item('use_recaptcha', 'tank_auth');
            // if ($captcha_registration) {
            // if ($use_recaptcha) {
            // $this->form_validation->set_rules('recaptcha_response_field', 'Confirmation Code', 'trim|xss_clean|required|callback__check_recaptcha');
            // } else {
            // $this->form_validation->set_rules('captcha', 'Confirmation Code', 'trim|xss_clean|required|callback__check_captcha');
            // }
            // }
            $data['errors'] = array();
            $email_activation = $this->config->item('email_activation', 'tank_auth');
            //$phnos=$_POST['phno'];
            if ($this->form_validation->run()) {
                if (!is_null($data = $this->tank_auth->create_user(
                                $use_username ? $this->form_validation->set_value('username') : '', $this->form_validation->set_value('email'), $_POST['phno'], $this->form_validation->set_value('password'), $this->form_validation->set_value('firstName'), $this->form_validation->set_value('lastName'), $_POST['facebookId'], $business, $userlevel, $email_activation))) {
                    // success
                    $data['site_name'] = $this->config->item('website_name', 'tank_auth');

                    if ($email_activation) {         // send "activate" email
                        $data['activation_period'] = $this->config->item('email_activation_expire', 'tank_auth') / 3600;

                        //$this->_send_email('activate', $data['email'], $data);

                        unset($data['password']); // Clear password (just for any case)
                        //$this->session->set_flashdata('register','<div data-alert class="alert-box info radius" id="registerMessage" style="margin:10px">You have successfully registered. Check your email address to activate your account.</div>');
                        $this->session->set_flashdata('register', '<div data-alert class="alert-box info radius" id="registerMessages" style="margin:10px">You have successfully registered. Check your mobile for OTP to activate your account.</div>');
                        redirect('register');
                        //$this->_show_message($this->lang->line('auth_message_registration_completed_1'));
                    } else {
                        if ($this->config->item('email_account_details', 'tank_auth')) { // send "welcome" email
                            $this->_send_email('welcome', $data['email'], $data);
                        }
                        unset($data['password']); // Clear password (just for any case)

                        $this->_show_message($this->lang->line('auth_message_registration_completed_2') . ' ' . anchor('/auth/login/', 'Login'));
                    }
                } else {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)
                        $data['errors'][$k] = $this->lang->line($v);
                }
            }
            // if ($captcha_registration) {
            // if ($use_recaptcha) {
            // $data['recaptcha_html'] = $this->_create_recaptcha();
            // } else {
            // $data['captcha_html'] = $this->_create_captcha();
            // }
            // }
            $data['use_username'] = $use_username;
            if ($data['use_username']) {
                $que = $this->db->query("select id,monum from users where `id` = (select max(id) from users)"); //$this->db->select_max('id')->get('users');
                $dt = $que->result();
                //print_r($dt[0]->id);
                $num = '+91' . $dt[0]->monum;
                $usid = $dt[0]->id;
                if ($dt[0]->id) {
                    $rew['note'] = "SignUp (Registration) Reward";
                    $rew['point'] = '100';
                    $rew['userid'] = $dt[0]->id;
                    $rew['date'] = date("d F Y");
                    $quse = $this->db->insert('reward_user', $rew);
                    //$dt=$quse->result();
                }
            }
            $ques = $this->db->query("select * from otp_user where `userid` = " . $dt[0]->id); //$this->db->select_max('id')->get('users');
            $dts = $ques->result();
            if ($dts[0]->userid) {
                $data['otpno'] = $dts[0]->otp;
                $data['userids'] = $dts[0]->userid;
                $data['pageName'] = 'registeruser';
            } else {
                $otp['otp'] = rand(1000, 999999);
                $otp['userid'] = $usid;
                $this->db->insert('otp_user', $otp);
                $que = $this->db->select('id')->get('users');
                $dt = $que->result();

                $this->load->library('plivo');

                $sms_data = array(
                    'src' => '+918871276050', //The phone number to use as the caller id (with the country code). E.g. For USA 15671234567
                    'dst' => $num, // The number to which the message needs to be send (regular phone numbers must be prefixed with country code but without the ‘+’ sign) E.g., For USA 15677654321.
                    'text' => 'OTP ' . $otp['otp'], // The text to send
                    'type' => 'sms', //The type of message. Should be 'sms' for a text message. Defaults to 'sms'
                    'url' => base_url() . 'index.php/auth/receive_sms', // The URL which will be called with the status of the message.
                    'method' => 'POST', // The method used to call the URL. Defaults to. POST
                );
//print_r($sms_data);
                /*
                 * look up available number groups
                 */
                $response_array = $this->plivo->send_sms($sms_data);
                //$response_array = $this->plivo->send_sms($sms_data);


                $data['otpno'] = $otp['otp'];
                $data['userids'] = $usid;
                $data['pageName'] = 'registeruser';
            }
            //$data['captcha_registration'] = $captcha_registration;
            //$data['use_recaptcha'] = $use_recaptcha;
            $this->layout->view('auth/register_form', $data);
        }
    }

    /**
     * Register user on the site
     *
     * @return void
     */
    /* function register()
      {
      $business='C';
      $userlevel=4;

      if ($this->tank_auth->is_logged_in()) {									// logged in
      redirect('');

      } elseif ($this->tank_auth->is_logged_in(FALSE)) {						// logged in, not activated
      redirect('/auth/send_again/');

      } elseif (!$this->config->item('allow_registration', 'tank_auth')) {	// registration is off
      $this->_show_message($this->lang->line('auth_message_registration_disabled'));

      } else {
      $use_username = $this->config->item('use_username', 'tank_auth');
      if ($use_username) {
      $this->form_validation->set_rules('username', 'Username', 'trim|required');
      }

      $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
      $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']');
      $this->form_validation->set_rules('firstName', 'firstName', 'trim|required');
      $this->form_validation->set_rules('lastName', 'lastName', 'trim|required');
      // $captcha_registration	= $this->config->item('captcha_registration', 'tank_auth');
      // $use_recaptcha			= $this->config->item('use_recaptcha', 'tank_auth');
      // if ($captcha_registration) {
      // if ($use_recaptcha) {
      // $this->form_validation->set_rules('recaptcha_response_field', 'Confirmation Code', 'trim|xss_clean|required|callback__check_recaptcha');
      // } else {
      // $this->form_validation->set_rules('captcha', 'Confirmation Code', 'trim|xss_clean|required|callback__check_captcha');
      // }
      // }
      $data['errors'] = array();
      $email_activation = $this->config->item('email_activation', 'tank_auth');
      //$phnos=$_POST['phno'];
      if ($this->form_validation->run()) {
      if (!is_null($data = $this->tank_auth->create_user(
      $use_username ? $this->form_validation->set_value('username') : '',
      $this->form_validation->set_value('email'),
      $_POST['phno'],
      $this->form_validation->set_value('password'),
      $this->form_validation->set_value('firstName'),
      $this->form_validation->set_value('lastName'),
      $_POST['facebookId'],$business,$userlevel,
      $email_activation))) {
      // success
      $data['site_name'] = $this->config->item('website_name', 'tank_auth');

      if ($email_activation) {									// send "activate" email
      $data['activation_period'] = $this->config->item('email_activation_expire', 'tank_auth') / 3600;

      //$this->_send_email('activate', $data['email'], $data);

      unset($data['password']); // Clear password (just for any case)

      //$this->session->set_flashdata('register','<div data-alert class="alert-box info radius" id="registerMessage" style="margin:10px">You have successfully registered. Check your email address to activate your account.</div>');
      $this->session->set_flashdata('register','<div data-alert class="alert-box info radius" id="registerMessages" style="margin:10px">You have successfully registered. Check your mobile for OTP to activate your account.</div>');
      redirect('register');
      //$this->_show_message($this->lang->line('auth_message_registration_completed_1'));

      } else {
      if ($this->config->item('email_account_details', 'tank_auth')) {	// send "welcome" email

      $this->_send_email('welcome', $data['email'], $data);
      }
      unset($data['password']); // Clear password (just for any case)

      $this->_show_message($this->lang->line('auth_message_registration_completed_2').' '.anchor('/auth/login/', 'Login'));
      }
      } else {
      $errors = $this->tank_auth->get_error_message();
      foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);

      }

      }
      // if ($captcha_registration) {
      // if ($use_recaptcha) {
      // $data['recaptcha_html'] = $this->_create_recaptcha();
      // } else {
      // $data['captcha_html'] = $this->_create_captcha();
      // }
      // }
      $data['use_username'] = $use_username;
      if($data['use_username'])
      {	$que=$this->db->query("select id,monum from users where `id` = (select max(id) from users)");//$this->db->select_max('id')->get('users');
      $dt=$que->result();
      //print_r($dt[0]->id);
      $num='+91'.$dt[0]->monum;
      $usid=$dt[0]->id;
      if($dt[0]->id)
      {
      $rew['note']= "SignUp (Registration) Reward";
      $rew['point']= '100';
      $rew['userid']= $dt[0]->id;
      $rew['date']= date("d F Y");
      $quse=$this->db->insert('reward_user', $rew);
      //$dt=$quse->result();
      }
      }
      $ques=$this->db->query("select * from otp_user where `userid` = ".$dt[0]->id);//$this->db->select_max('id')->get('users');
      $dts=$ques->result();
      if($dts[0]->userid){
      $data['otpno']=$dts[0]->otp;
      $data['userids']=$dts[0]->userid;
      $data['pageName']='registeruser';
      }
      else{
      $otp['otp']=rand(1000, 999999);
      $otp['userid']= $usid;
      $this->db->insert('otp_user', $otp);
      $que=$this->db->select('id')->get('users');
      $dt=$que->result();

      $this->load->library('plivo');

      $sms_data = array(
      'src' => '+918871276050', //The phone number to use as the caller id (with the country code). E.g. For USA 15671234567
      'dst' => $num , // The number to which the message needs to be send (regular phone numbers must be prefixed with country code but without the ‘+’ sign) E.g., For USA 15677654321.
      'text' => 'OTP '.$otp['otp'], // The text to send
      'type' => 'sms', //The type of message. Should be 'sms' for a text message. Defaults to 'sms'
      'url' => base_url() . 'index.php/auth/receive_sms', // The URL which will be called with the status of the message.
      'method' => 'POST', // The method used to call the URL. Defaults to. POST
      );
      //print_r($sms_data);
      /*
     * look up available number groups
     */
    /* $response_array = $this->plivo->send_sms($sms_data);
      //$response_array = $this->plivo->send_sms($sms_data);


      $data['otpno']=$otp['otp'];
      $data['userids']=$usid;
      $data['pageName']='registeruser';}
      //$data['captcha_registration'] = $captcha_registration;
      //$data['use_recaptcha'] = $use_recaptcha;
      $this->layout->view('auth/register_form', $data);
      }


      } */

    /**
     * Send activation email again, to the same or new email address
     *
     * @return void
     */
    function registerbus() {

        $business = 'P';
        $userlevel = 2;


        if ($this->tank_auth->is_logged_in()) {         // logged in
            redirect('');
        } elseif ($this->tank_auth->is_logged_in(FALSE)) {      // logged in, not activated
            redirect('/auth/send_again/');
        } elseif (!$this->config->item('allow_registration', 'tank_auth')) { // registration is off
            $this->_show_message($this->lang->line('auth_message_registration_disabled'));
        } else {
            $use_username = $this->config->item('use_username', 'tank_auth');
            if ($use_username) {
                $this->form_validation->set_rules('username', 'Username', 'trim|required');
            }

            $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[' . $this->config->item('password_min_length', 'tank_auth') . ']|max_length[' . $this->config->item('password_max_length', 'tank_auth') . ']');
            $this->form_validation->set_rules('firstName', 'firstName', 'trim|required');
            $this->form_validation->set_rules('lastName', 'lastName', 'trim|required');
            // $captcha_registration	= $this->config->item('captcha_registration', 'tank_auth');
            // $use_recaptcha			= $this->config->item('use_recaptcha', 'tank_auth');
            // if ($captcha_registration) {
            // if ($use_recaptcha) {
            // $this->form_validation->set_rules('recaptcha_response_field', 'Confirmation Code', 'trim|xss_clean|required|callback__check_recaptcha');
            // } else {
            // $this->form_validation->set_rules('captcha', 'Confirmation Code', 'trim|xss_clean|required|callback__check_captcha');
            // }
            // }
            $data['errors'] = array();
            $email_activation = $this->config->item('email_activation', 'tank_auth');

            if ($this->form_validation->run()) {
                if (!is_null($data = $this->tank_auth->create_user(
                                $use_username ? $this->form_validation->set_value('username') : '', $this->form_validation->set_value('email'), " ", $this->form_validation->set_value('password'), $this->form_validation->set_value('firstName'), $this->form_validation->set_value('lastName'), $_POST['facebookId'], $business, $userlevel, $email_activation))) {         // success
                    //echo $email_activation;
                    $data['site_name'] = $this->config->item('website_name', 'tank_auth');

                    if ($email_activation) {
                        // send "activate" email
                        $data['activation_period'] = $this->config->item('email_activation_expire', 'tank_auth') / 3600;

                        $this->_send_email('activate', $data['email'], $data);

                        unset($data['password']); // Clear password (just for any case)

                        $this->session->set_flashdata('register', '<div data-alert class="alert-box info radius" id="registerMessage" style="margin:10px">You have successfully registered. Check your email address to activate your account.</div>');
                        redirect('registerBusiness');
                        //$this->_show_message($this->lang->line('auth_message_registration_completed_1'));
                    } else {
                        if ($this->config->item('email_account_details', 'tank_auth')) { // send "welcome" email
                            $this->_send_email('welcome', $data['email'], $data);
                        }
                        unset($data['password']); // Clear password (just for any case)

                        $this->_show_message($this->lang->line('auth_message_registration_completed_2') . ' ' . anchor('/auth/login/', 'Login'));
                    }
                } else {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)
                        $data['errors'][$k] = $this->lang->line($v);
                }
            }
            // if ($captcha_registration) {
            // if ($use_recaptcha) {
            // $data['recaptcha_html'] = $this->_create_recaptcha();
            // } else {
            // $data['captcha_html'] = $this->_create_captcha();
            // }
            // }
            $data['use_username'] = $use_username;
            $data['pageName'] = 'register';
            //$data['captcha_registration'] = $captcha_registration;
            //$data['use_recaptcha'] = $use_recaptcha;
            $this->layout->view('auth/register_form', $data);
        }
    }

    /**
     * Send activation email again, to the same or new email address
     *
     * @return void
     */


    function send_again() {
        if (!$this->tank_auth->is_logged_in(FALSE)) {       // not logged in or activated
            redirect('/auth/login/');
        } else {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');

            $data['errors'] = array();

            if ($this->form_validation->run()) {        // validation ok
                if (!is_null($data = $this->tank_auth->change_email(
                                $this->form_validation->set_value('email')))) {   // success
                    $data['site_name'] = $this->config->item('website_name', 'tank_auth');
                    $data['activation_period'] = $this->config->item('email_activation_expire', 'tank_auth') / 3600;

                    $this->_send_email('activate', $data['email'], $data);

                    $this->_show_message(sprintf($this->lang->line('auth_message_activation_email_sent'), $data['email']));
                } else {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)
                        $data['errors'][$k] = $this->lang->line($v);
                }
            }
            $this->load->view('auth/send_again_form', $data);
        }
    }

    function send_activation() {

        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');

        $data['errors'] = array();

        if ($this->form_validation->run()) {        // validation ok
            if (!is_null($data = $this->tank_auth->change_Activation_email(
                            $this->form_validation->set_value('email')))) {   // success
                $data['site_name'] = $this->config->item('website_name', 'tank_auth');
                $data['activation_period'] = $this->config->item('email_activation_expire', 'tank_auth') / 3600;

                $this->_send_email('activate', $data['email'], $data);

                $this->_show_message(sprintf($this->lang->line('auth_message_activation_email_sent'), $data['email']));
            } else {
                $errors = $this->tank_auth->get_error_message();


                foreach ($errors as $k => $v)
                    $data['errors'][$k] = $this->lang->line($v);
            }
        }
        $data['pageName'] = 'register';
        $this->load->view('auth/send_again_form', $data);
    }

    /**
     * Activate user account.
     * User is verified by user_id and authentication code in the URL.
     * Can be called by clicking on link in mail.
     *
     * @return void
     */
    function activate() {
        $user_id = $this->uri->segment(3);
        $new_email_key = $this->uri->segment(4);

        // Activate user
        if ($this->tank_auth->activate_user($user_id, $new_email_key)) {  // success
            /* $this->session->set_flashdata('activation','<div id="inviteMessage" style="padding-left:46px;padding-top:11px;
              background:#81E289;color:#fff;margin-left:3px;margin-right:3px;height:41px; margin-bottom:17px;">Your account has been activated successfully</div>');
              $this->tank_auth->logout();
              $this->_show_message($this->lang->line('auth_message_activation_completed').' '.anchor('/auth/login/', 'Login')); */
            $this->load->library('session');
            $user = $this->usermodel->findallDetailsUserById($user_id);
            $dat = array(
                'user_id' => $user[0]['id'],
                'username' => $user[0]['username'],
                'fullName' => $user[0]['fullName'],
                'user_level' => $user[0]['userLevel'],
                'reward' => $user[0]['reward'],
                'status' => ($user[0]['activated'] == 1) ? 'STATUS_ACTIVATED' : 'STATUS_NOT_ACTIVATED',
            );
            $this->session->set_userdata($dat);
            redirect('');
        } else {                // fail
            $this->_show_message($this->lang->line('auth_message_activation_failed'));
        }
    }

    /**
     * Generate reset code (to change password) and send it to user
     *
     * @return void
     */

    /* Used in case user forgets password*/
    function forgot_password() {
        /* if ($this->tank_auth->is_logged_in()) {									// logged in
          redirect('');


          } else */

        $this->load->library('email');
        $this->load->database();

        $this->email->initialize(array(
            'protocol' => 'POP3',
            'smtp_host' => 'pop.secureserver.net',
            'smtp_user' => 'info@zersey.com',
            'smtp_pass' => 'info@300',
            'smtp_port' => 110,
        ));
        $this->email->set_newline("\r\n");
        $random = rand(0, 999999999);
        $hasher = new PasswordHash();
        $password = $hasher->HashPassword($random);

        $this->email->from('info@zersey.com', 'Zersey');
        $this->email->to($this->input->post('email'));
        $email = $this->input->post('email');
        /* $this->db->where('email',$this->input->post('email'));
          $this->db->set('password',$password);
          $this->db->update('users'); */


//$this->email->cc('another@another-example.com');
//$this->email->bcc('them@their-example.com');

        $this->email->subject('Password Request');
        $this->email->message('Hi there' . '<br/>' .
                '                                  ' . '<br/>' .
                'We have received a request to change your account password' . "<br/>" .
                '                                  ' . '<br/>' .
                '<a href="http://zersey.com/auth/request_password/' . $email . '">Click here </a> to reset your  password' . "<br/>" .
                '                                  ' . '<br/>' .
                'If you did not request a new password, then please <span color="#FF0000"> ignore this message </span>' . "<br/>" .
                '                                  ' . '<br/>' .
                'See you soon on zersey'
        );
        $this->email->send();


        echo "<script language=\"JavaScript\">\n";
        echo "alert('An email has been sent with the new password');\n";
        echo "window.location='http://zersey.com'";
        echo "</script>";

        if ($this->tank_auth->is_logged_in(FALSE)) {      // logged in, not activated
            redirect('/auth/send_again/');
        } else {
            $this->form_validation->set_rules('login', 'Email or login', 'trim|required|xss_clean');

            $data['errors'] = array();

            if ($this->form_validation->run()) {        // validation ok
                if (!is_null($data = $this->tank_auth->forgot_password(
                                $this->form_validation->set_value('login')))) {

                    $data['site_name'] = $this->config->item('website_name', 'tank_auth');

                    // Send email with password activation link
                    //$this->_send_email('forgot_password', $data['email'], $data);
                    //	$this->_show_message($this->lang->line('auth_message_new_password_sent'));
                } else {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)
                        $data['errors'][$k] = $this->lang->line($v);
                }
            }
            //redirect($_SERVER['HTTP_REFERER']);
            //redirect('/home');
        }
    }

    /**
     * Replace user password (forgotten) with a new one (set by user).
     * User is verified by user_id and authentication code in the URL.
     * Can be called by clicking on link in mail.
     *
     * @return void
     */
    function reset_password() {
        $user_id = $this->uri->segment(3);
        $new_pass_key = $this->uri->segment(4);

        $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length[' . $this->config->item('password_min_length', 'tank_auth') . ']|max_length[' . $this->config->item('password_max_length', 'tank_auth') . ']|alpha_dash');
        $this->form_validation->set_rules('confirm_new_password', 'Confirm new Password', 'trim|required|xss_clean|matches[new_password]');

        $data['errors'] = array();

        if ($this->form_validation->run()) {        // validation ok
            if (!is_null($data = $this->tank_auth->reset_password(
                            $user_id, $new_pass_key, $this->form_validation->set_value('new_password')))) { // success
                $data['site_name'] = $this->config->item('website_name', 'tank_auth');

                // Send email with new password
                $this->_send_email('reset_password', $data['email'], $data);

                redirect('/home/'); //$this->_show_message($this->lang->line('auth_message_new_password_activated').' '.anchor('/auth/login/', 'Login'));
            } else {              // fail
                $this->_show_message($this->lang->line('auth_message_new_password_failed'));
            }
        } else {
            // Try to activate user by password key (if not activated yet)
            if ($this->config->item('email_activation', 'tank_auth')) {
                $this->tank_auth->activate_user($user_id, $new_pass_key, FALSE);
            }

            if (!$this->tank_auth->can_reset_password($user_id, $new_pass_key)) {
                $this->_show_message($this->lang->line('auth_message_new_password_failed'));
            }
        }
        $data['pageName'] = 'register';
        $this->layout->view('auth/reset_password_form', $data);
    }

    /**
     * Change user password
     *
     * @return void
     */
    function checkPasswordExist() {
        $oldpassword = $_GET['old_password'];
        if ($this->tank_auth->checkPassword($oldpassword)) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    function change_password() {
        if (!$this->tank_auth->is_logged_in()) {        // not logged in or not activated
            redirect('/auth/login/');
        } else {
            $this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');
            $this->form_validation->set_rules('new_password', 'New Password', 'trim|required');
            $this->form_validation->set_rules('confirm_new_password', 'Confirm new Password', 'trim|required|matches[new_password]');
            $data['errors'] = array();

            if ($this->form_validation->run()) {        // validation ok
                if ($this->tank_auth->change_password(
                                $this->form_validation->set_value('old_password'), $this->form_validation->set_value('new_password'))) { // success
                    $this->session->set_flashdata('updatePassword', '<div id="passwordUpdated" style="padding-left:46px;padding-top:11px;background:#81E289;color:#fff;margin-left:3px;margin-right:3px;height:41px; margin-bottom:17px;">your password has been updated successfully</div>');
                    redirect('/profile');
                }
            }
            $this->layout->view('profile');
        }
    }

    function change_password1() {
        if (!$this->tank_auth->is_logged_in()) {        // not logged in or not activated
            redirect('/auth/login/');
        } else {
            $this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');
            $this->form_validation->set_rules('new_password', 'New Password', 'trim|required');
            $this->form_validation->set_rules('confirm_new_password', 'Confirm new Password', 'trim|required|matches[new_password]');
            $data['errors'] = array();

            if ($this->form_validation->run()) {        // validation ok
                if ($this->tank_auth->change_password1(
                                $this->form_validation->set_value('old_password'), $this->form_validation->set_value('new_password'))) { // success
                    $this->session->set_flashdata('updatePassword1', '<div id="passwordUpdated1" style="padding-left:46px;padding-top:11px;background:#81E289;color:#fff;margin-left:3px;margin-right:3px;height:41px; margin-bottom:17px;">your password has been updated successfully</div>');
                    redirect('/change_password');
                }
            }
            $this->layout->view('profile');
        }
    }

    /**
     * Change user email
     *
     * @return void
     */
    function change_email() {
        if (!$this->tank_auth->is_logged_in()) {        // not logged in or not activated
            redirect('/auth/login/');
        } else {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');

            $data['errors'] = array();

            if ($this->form_validation->run()) {        // validation ok
                if (!is_null($data = $this->tank_auth->set_new_email(
                                $this->form_validation->set_value('email'), $this->form_validation->set_value('password')))) {   // success
                    $data['site_name'] = $this->config->item('website_name', 'tank_auth');

                    // Send email with new email address and its activation link
                    $this->_send_email('change_email', $data['new_email'], $data);

                    $this->_show_message(sprintf($this->lang->line('auth_message_new_email_sent'), $data['new_email']));
                } else {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)
                        $data['errors'][$k] = $this->lang->line($v);
                }
            }
            $this->load->view('auth/change_email_form', $data);
        }
    }

    /**
     * Replace user email with a new one.
     * User is verified by user_id and authentication code in the URL.
     * Can be called by clicking on link in mail.
     *
     * @return void
     */
    function reset_email() {
        $user_id = $this->uri->segment(3);
        $new_email_key = $this->uri->segment(4);

        // Reset email
        if ($this->tank_auth->activate_new_email($user_id, $new_email_key)) { // success
            $this->tank_auth->logout();
            $this->_show_message($this->lang->line('auth_message_new_email_activated') . ' ' . anchor('/auth/login/', 'Login'));
        } else {                // fail
            $this->_show_message($this->lang->line('auth_message_new_email_failed'));
        }
    }

    /**
     * Delete user from the site (only when user is logged in)
     *
     * @return void
     */
    function unregister() {
        if (!$this->tank_auth->is_logged_in()) {        // not logged in or not activated
            redirect('/auth/login/');
        } else {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

            $data['errors'] = array();

            if ($this->form_validation->run()) {        // validation ok
                if ($this->tank_auth->delete_user(
                                $this->form_validation->set_value('password'))) {  // success
                    $this->_show_message($this->lang->line('auth_message_unregistered'));
                } else {              // fail
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)
                        $data['errors'][$k] = $this->lang->line($v);
                }
            }
            $this->load->view('auth/unregister_form', $data);
        }
    }

    /**
     * Show info message
     *
     * @param	string
     * @return	void
     */
    function _show_message($message) {
        $this->session->set_flashdata('message', $message);
        redirect('/auth/');
    }

    /**
     * Send email message of given type (activate, forgot_password, etc.)
     *
     * @param	string
     * @param	string
     * @param	array
     * @return	void
     */
    function _send_email($type, $email, &$data) {
        $this->load->library('email');
        $this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
        $this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
        $this->email->to($email);
        $this->email->subject(sprintf($this->lang->line('auth_subject_' . $type), $this->config->item('website_name', 'tank_auth')));
        $this->email->message($this->load->view('email/' . $type . '-html', $data, TRUE));
        $this->email->set_alt_message($this->load->view('email/' . $type . '-txt', $data, TRUE));
        $this->email->send();
    }

    /**
     * Create CAPTCHA image to verify user as a human
     *
     * @return	string
     */
    function _create_captcha() {
        $this->load->helper('captcha');

        $cap = create_captcha(array(
            'img_path' => './' . $this->config->item('captcha_path', 'tank_auth'),
            'img_url' => base_url() . $this->config->item('captcha_path', 'tank_auth'),
            'font_path' => './' . $this->config->item('captcha_fonts_path', 'tank_auth'),
            'font_size' => $this->config->item('captcha_font_size', 'tank_auth'),
            'img_width' => $this->config->item('captcha_width', 'tank_auth'),
            'img_height' => $this->config->item('captcha_height', 'tank_auth'),
            'show_grid' => $this->config->item('captcha_grid', 'tank_auth'),
            'expiration' => $this->config->item('captcha_expire', 'tank_auth'),
        ));

        // Save captcha params in session
        $this->session->set_flashdata(array(
            'captcha_word' => $cap['word'],
            'captcha_time' => $cap['time'],
        ));

        return $cap['image'];
    }

    /**
     * Callback function. Check if CAPTCHA test is passed.
     *
     * @param	string
     * @return	bool
     */
    function _check_captcha($code) {
        $time = $this->session->flashdata('captcha_time');
        $word = $this->session->flashdata('captcha_word');

        list($usec, $sec) = explode(" ", microtime());
        $now = ((float) $usec + (float) $sec);

        if ($now - $time > $this->config->item('captcha_expire', 'tank_auth')) {
            $this->form_validation->set_message('_check_captcha', $this->lang->line('auth_captcha_expired'));
            return FALSE;
        } elseif (($this->config->item('captcha_case_sensitive', 'tank_auth') AND
                $code != $word) OR
                strtolower($code) != strtolower($word)) {
            $this->form_validation->set_message('_check_captcha', $this->lang->line('auth_incorrect_captcha'));
            return FALSE;
        }
        return TRUE;
    }

    /**
     * Create reCAPTCHA JS and non-JS HTML to verify user as a human
     *
     * @return	string
     */
    function _create_recaptcha() {
        $this->load->helper('recaptcha');

        // Add custom theme so we can get only image
        $options = "<script>var RecaptchaOptions = {theme: 'custom', custom_theme_widget: 'recaptcha_widget'};</script>\n";

        // Get reCAPTCHA JS and non-JS HTML
        $html = recaptcha_get_html($this->config->item('recaptcha_public_key', 'tank_auth'));

        return $options . $html;
    }

    /**
     * Callback function. Check if reCAPTCHA test is passed.
     *
     * @return	bool
     */
    function _check_recaptcha() {
        $this->load->helper('recaptcha');

        $resp = recaptcha_check_answer($this->config->item('recaptcha_private_key', 'tank_auth'), $_SERVER['REMOTE_ADDR'], $_POST['recaptcha_challenge_field'], $_POST['recaptcha_response_field']);

        if (!$resp->is_valid) {
            $this->form_validation->set_message('_check_recaptcha', $this->lang->line('auth_incorrect_captcha'));
            return FALSE;
        }
        return TRUE;
    }

    function checkPassword() {
        $result = $this->users->getallPasswords();
        //print_r($result);
        $password = $_GET['password'];
        if ($this->tank_auth->checkPwd($password, $result)) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

//google login simpy

    public function oauth2($providername) {
        //echo ($providername);
        if ($providername == 'google') {
            $key = '289675166307-gtcebemo9har38a5cp79jq3b2ibqohv1.apps.googleusercontent.com';
            $secret = 'AIzaSyCxCZA1Ylk6lxUygq37nfcNCMdHLl2W7Mg';
        }

        $this->load->helper('url_helper');

        //$this->CI->load->spark('OAuth2/0.3.1');
        $this->load->spark('OAuth2/0.3.1');

        $provider = $this->oauth2->provider($providername, array(
            'id' => $key,
            'secret' => $secret,
        ));
//print_r($provider);
        if (!$this->input->get('code')) {
            // By sending no options it'll come back here
            $provider->authorize();
        } else {
            // Howzit?
            try {

                $token = $provider->access($_GET['code']);
                $user = $provider->get_user_info($token);


                //$this->saveData($providername,$token,$user);
            } catch (OAuth2_Exception $e) {
                show_error('That didnt work: ' . $e);
            }
        }
    }

    private function saveData($providername, $token, $user) {
        // print_r($user);
        //return;
        $usertoken = $token->access_token;
        $usersecret = $token->secret;



        $uid = $user['uid'];

        $nickname = array_key_exists('nickname', $user) ? $user['nickname'] : $uid;
        $fname = array_key_exists('first_name', $user) ? $user['first_name'] : null;
        $lname = array_key_exists('last_name', $user) ? $user['last_name'] : null;
        $location = array_key_exists('location', $user) ? $user['location'] : null;
        $description = array_key_exists('description', $user) ? $user['description'] : null;
        $profileimage = array_key_exists('image', $user) ? $user['image'] : null;
        $email = array_key_exists('email', $user) ? $user['email'] : '';
        $gender = array_key_exists('gender', $user) ? $user['gender'] : null;

        $cuntrynm = $this->countryname();
        $usersignup = array(
            'username' => $fname,
            'email' => $email,
        );

        $this->load->helper('url');

        $uids['email'] = $user['email'];
        $result = $this->model->selectrecord('signupnew', $uids);
        $id = $result[0]->uid;


        if ($id == NULL) {

            $this->db->insert('signupnew', $usersignup);

            $id = $this->db->insert_id();

            $userobj = array(
                'uid' => $id,
                'name' => $fname,
                'surname' => $lname['last_name'],
                'gender' => $user['gender'],
                'countryName' => $cuntrynm
            );
            $this->db->insert('user_profile', $userobj);

            if ($profileimage) {
                $url = $profileimage;

                $data = file_get_contents($url);
                $fileName = './uploads/' . $uid . '.jpg';
                $file = fopen($fileName, 'w+');
                fputs($file, $data);

                if (fclose($file)) {
                    $this->load->library('image_lib');

                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './uploads/' . $uid . '.jpg';
                    $config['create_thumb'] = false;
                    $config['maintain_ratio'] = false;
                    $config['width'] = 307;
                    $config['height'] = 307;
                    $config['new_image'] = './uploads/' . $uid . "_thumb.jpg";
                    $this->image_lib->clear();
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();

                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './uploads/' . $uid . '.jpg';
                    $config['overwrite'] = true;
                    $config['width'] = 287;
                    $config['height'] = 391;
                    $config['new_image'] = './uploads/' . $uid . ".jpg";
                    $this->image_lib->clear();
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();


                    $dataimg['uid'] = $id;
                    $dataimg['file_name'] = $uid . '.jpg';
                    $dataimg['full_path'] = base_url() . 'uploads/' . $uid . '.jpg';
                    $dataimg['thumb'] = $uid . "_thumb.jpg";
                    $this->model->insert_data('imageupload', $dataimg);
                }
            } else {
                $dtimg['uid'] = $id;
                $dtimg['file_name'] = "userAnonymous.png";
                $dtimg['full_path'] = base_url() . "uploads/userAnonymous.png";
                $dtimg['thumb'] = "userAnonymous_thumb.jpg";
                $this->model->insert_data('imageupload', $dtimg);
            }
            $this->load->library('session');
            $newdata = array(
                'user_id' => $id,
                'logged_in' => TRUE,
                'country' => $cuntrynm
            );

            $this->session->set_userdata($newdata);

            $info = $this->session->all_userdata();

            $data = array('session_id' => $info['session_id'], 'ip_address' => $info['ip_address'], 'user_agent' => $info['user_agent'], 'last_activity' => $info['last_activity'], 'user_id' => $info['user_id']);

            $data['session'] = $this->model->insert_data('usersessiontable', $data);

            $error = '';

            redirect(base_url() . 'user/Userprofileinfo');
        } else {

            $this->load->library('session');
            $newdata = array(
                'user_id' => $id,
                'logged_in' => TRUE
            );

            $this->session->set_userdata($newdata);

            $info = $this->session->all_userdata();

            $data = array('session_id' => $info['session_id'], 'ip_address' => $info['ip_address'], 'user_agent' => $info['user_agent'], 'last_activity' => $info['last_activity'], 'user_id' => $info['user_id']);

            $data['session'] = $this->model->insert_data('usersessiontable', $data);

            $error = '';

            redirect(base_url() . 'user/dashboardview');
        }
    }

    public function receive_sms() {

    }

    function activeuser() {
        $this->load->library('session');
        if (isset($_REQUEST['otpsub'])) {
            $otp = $_POST['newotp'];
            $uid = $_POST['usrid'];
            $a = $this->usermodel->selectotp($uid);
//print_r($uid);
            if ($a) {
                //print_r($a[0]->otp);
                if ($a[0]->otp == $otp) {
                    $data = array(
                        'activated' => '1'
                    );

                    $this->db->where('id', $uid);
                    $this->db->update('users', $data);
                    $user = $this->usermodel->findallDetailsUserById($uid);
                    $dat = array(
                        'user_id' => $user[0]['id'],
                        'username' => $user[0]['username'],
                        'fullName' => $user[0]['fullName'],
                        'user_level' => $user[0]['userLevel'],
                        'reward' => $user[0]['reward'],
                        'status' => ($user[0]['activated'] == 1) ? 'STATUS_ACTIVATED' : 'STATUS_NOT_ACTIVATED',
                    );
                    $this->session->set_userdata($dat);
                    Redirect(base_url());
                } else {
                    $dts['userids'] = $uid;
                    $this->session->set_flashdata('register', '<div data-alert class="alert-box info radius" id="registerMessages" style="margin:10px">You have entered invalid OTP. Please Check your mobile for OTP to activate your account.</div>');

                    redirect($_SERVER['HTTP_REFERER']);
                }
            }
        }
    }

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */