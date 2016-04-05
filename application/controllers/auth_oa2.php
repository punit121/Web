<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');ob_start();

class Auth_oa2 extends CI_Controller
{	
function __construct()
	{
		parent::__construct();
		
	   $this->load->library('session');
        $this->load->helper('url_helper');
	}
	
	public function customer()
	{	
		$this->load->library('session');
        $this->load->helper('url_helper');
		$this->session->set_userdata('test', "customer");
		$this->session->set_userdata('oldurl', $_SERVER['HTTP_REFERER']);
		redirect(base_url()."auth_oa2/session/google"); 
		}
	public function saloon()
	{	
		$this->session->set_userdata('test', "saloon");
		$this->session->set_userdata('oldurl', $_SERVER['HTTP_REFERER']);
		redirect(base_url()."auth_oa2/session/google"); 
		}
    public function session($provider_name)
    {
		//$test=$this->uri->segment(4);
     
//$this->load->spark('oauth2/0.3.1');
        $this->load->library('oauth2/OAuth2');
				$this->load->library('tank_auth');
				$this->load->model('tank_auth/users');
				$this->load->config('oauth2', TRUE);

        $provider = $this->oauth2->provider($provider_name, array(
            'id' => $this->config->item($provider_name.'_id', 'oauth2'),
            'secret' => $this->config->item($provider_name.'_secret', 'oauth2'),
        ));


        if ( ! $this->input->get('code'))
        {
            // By sending no options it'll come back here
            $provider->authorize();
        }
        else
        {
            // Howzit?
            try
            {
                //$token = $provider->access($_GET['code']);
                $token = $provider->access($this->input->get('code'));

                $user = $provider->get_user_info($token);

                // Here you should use this information to A) look for a user B) help a new user sign up with existing data.
                // If you store it all in a cookie and redirect to a registration page this is crazy-simple.
                //echo "<pre>Tokens: ";
                //var_dump($token);

                //echo "\n\nUser Info: ";
                //var_dump($user);
				$ts=$this->session->all_userdata();
//print_r ($ts);
//echo($ts['test']);
if($ts['test']=="saloon")
{

$CI = get_instance();
    $CI->load->library('session');
	
  $CI->session->set_flashdata('user',$user);

redirect(base_url()."auth_oa2/LoginAndSignupBygoogle"); 

	
	}
	else
	{	
		$CI = get_instance();
    $CI->load->library('session');
	
  $CI->session->set_flashdata('user',$user);
  
  redirect(base_url()."auth_oa2/LoginAndSignupBygoogleclient");
		
		}
							/*if ($this->tank_auth->is_logged_in()) {									// logged in
								redirect('');
								
							}elseif( !is_null($this->users->get_user_by_email($provider_name.'|'.$user['email']))) { //already registered
								echo 'already';
								
								if ($this->tank_auth->login_oa2( $provider_name.'|'.$user['email'], $user['image'] ) ) {								// success
									redirect('/');
				
								} else {
									$errors = $this->tank_auth->get_error_message();
									if (isset($errors['banned'])) {								// banned user
										$this->_show_message($this->lang->line('auth_message_banned').' '.$errors['banned']);
				
									} elseif (isset($errors['not_activated'])) {				// not activated user
										redirect('/auth/send_again/');
				
									} else {													// fail
										foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
									}
								}
								
								
							}else{
								
								if (!is_null($data = $this->tank_auth->create_user_oa2($user['email'],$provider_name,$user['first_name'],$user['last_name']))) {
									// success
									$data['site_name'] = $this->config->item('website_name', 'tank_auth');
	
										if ($this->config->item('email_account_details', 'tank_auth')) {	// send "welcome" email
				
											$this->_send_email('welcome', $data['email'], $data);
										}
										
										redirect('/auth_oa2/session/'.$provider_name);
	
								} else {
									$errors = $this->tank_auth->get_error_message();
									foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
								}

							}

*/
            }

            catch (OAuth2_Exception $e)
            {
                show_error('That didnt work: '.$e);
            }

        }
    
	}

	/**
	 * Send email message of given type (activate, forgot_password, etc.)
	 *
	 * @param	string
	 * @param	string
	 * @param	array
	 * @return	void
	 */
	function _send_email($type, $email, &$data)
	{
		$this->load->library('email');
		$this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->to($email);
		$this->email->subject(sprintf($this->lang->line('auth_subject_'.$type), $this->config->item('website_name', 'tank_auth')));
		$this->email->message($this->load->view('email/'.$type.'-html', $data, TRUE));
		$this->email->set_alt_message($this->load->view('email/'.$type.'-txt', $data, TRUE));
		$this->email->send();
	}

function LoginAndSignupBygoogle()
	{
		 $user=$this->session->flashdata('user');
		 $this->load->model('usermodel');
		 $ts=$this->session->all_userdata();
		if($user['email']!='undefined')
		{
		$result=$this->usermodel->loginBygoogle($user['email']);		
		}		
		if($result=='not found')
		{
			$value=$this->usermodel->LoginAndSignupBygooglepartner($user);
			
		if($value)
		{
			

			redirect($ts['oldurl']);
			//redirect(base_url()."dashboard");
			
		}
		}
		else
		{
		
			$data['user_id'] =$result[0]['id'];
			$data['username']=$result[0]['username'];
			$data['user_level']=$result[0]['userLevel'];
			$data['fullName']=$result[0]['fullName'];
			$this->session->set_userdata($data);
			//print_r($data['user_level']);
			//echo $result[0]['fbgmId'];
			if($data['user_level']==2)
			{
			redirect($ts['oldurl']);
			//redirect(base_url()."dashboard");
		}
		else{
			
			redirect($ts['oldurl']);
			//redirect(base_url());
			
		}
		}
	
		//$result=$this->usermodel->LoginAndSignupBygooglepartner($user);
			
		 
	}
function LoginAndSignupBygoogleclient()
	{	
		$user=$this->session->flashdata('user');
		 $this->load->model('usermodel');
 $ts=$this->session->all_userdata();
		if($user['email']!='undefined')
		{
		$result=$this->usermodel->loginBygoogle($user['email']);		
		}		
		if($result=='not found')
		{
		$vl=$this->usermodel->LoginAndSignupBygoogle($user);
		if($vl)
		{
			
			redirect($ts['oldurl']);
			//redirect(base_url());
			
		}	
		}
		else
		{
		
			$data['user_id'] =$result[0]['id'];
			$data['username']=$result[0]['username'];
			$data['user_level']=$result[0]['userLevel'];
			$data['fullName']=$result[0]['fullName'];
			$this->session->set_userdata($data);
			//print_r($data['user_level']);
			//echo $result[0]['fbgmId'];
			if($data['user_level']==2)
			{
				
			redirect($ts['oldurl']);
			//redirect(base_url()."dashboard");
		}
		else{
			
			redirect($ts['oldurl']);
			//redirect(base_url());
			
		}
	}
	}


}

/* End of file auth_oa2.php */
/* Location: ./application/controllers/auth_oa2.php */