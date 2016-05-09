<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HAuth extends CI_Controller {

	public function index()
	{
		$this->load->view('hauth/home');
		$this->load->model('usermodel');
		 $this->load->helper('url');
	}

	public function login($provider)
	{
		log_message('debug', "controllers.HAuth.login($provider) called");

		try
		{
			log_message('debug', 'controllers.HAuth.login: loading HybridAuthLib');
			$this->load->library('HybridAuthLib');

			if ($this->hybridauthlib->providerEnabled($provider))
			{
				log_message('debug', "controllers.HAuth.login: service $provider enabled, trying to authenticate.");
				$service = $this->hybridauthlib->authenticate($provider);

				if ($service->isUserConnected())
				{
					log_message('debug', 'controller.HAuth.login: user authenticated.');

					$user_profile = $service->getUserProfile();

					log_message('info', 'controllers.HAuth.login: user profile:'.PHP_EOL.print_r($user_profile, TRUE));

					$data['user_profile'] = $user_profile;
					
					//var_dump($user_profile);
				
				$name=explode(" ",$user_profile->displayName);
				$gender= $user_profile->gender;
				if($gender=='male'){
				$gender='M';
				}
				else{
				$gender='F';
				}
				$random=rand(0,999);
				$insert['business']='C';
				$insert['userLevel']=4;
				$insert['firstName']=$name[0];
				$insert['lastName']=$name[1];
				$insert['fullName']=$user_profile->displayName;
				$insert['email']=$user_profile->email;
				$insert['username']=$insert['lastName'].$insert['firstName'].$random;
				$insert['fbgmid']=$user_profile->identifier;
				$this->db->select('*');
				$this->db->where('email',$user_profile->email);
				$query=$this->db->get('users');
				//echo $query->num_rows();
			if($query->num_rows()== 0)
			{
				$this->db->insert('users',$insert);
				$cust['userId']=$this->db->insert_id();
				$cust['fullname']=$insert['fullName'];
				$cust['gender']=$gender;
				$cust['photo']=$user_profile->photoURL;
				$headers = get_headers($cust['photo'], 1);
				$urls=$headers['Location'];
				
				$data = file_get_contents($urls);
				$fileName = './assets/images/merchant/'.$user_profile->identifier.'.jpg';
				$file = fopen($fileName, 'w+');
				fputs($file, $data);
				$cust['photo']=$user_profile->identifier.'.jpg';
				if($provider==="Facebook")
				{
				$cust['covimg']=$user_profile->coverPic;
				//echo "cust";
				}
				
				
				$this->db->insert('customer',$cust);
				$profile['user_id']=$cust['userId'];
				$profile['name']=$user_profile->displayName;
				$profile['photo']=$user_profile->identifier.'.jpg';
				$this->db->insert('user_profiles',$profile);
				$this->load->library('session');
				$this->db->select('*');
				$this->db->where('id',$cust['userId']);
				$this->db->where('activated','1');
				$query=$this->db->get('users');
				$user=$query->result_array();
				$dat=array(
									'user_id'	=> $user[0]['id'],
									'username'	=> $user[0]['username'],
									'fullName'	=> $user[0]['fullName'],
									'user_level'=> $user[0]['userLevel'],
									'reward'	=> $user[0]['reward'],
									'status'	=> ($user[0]['activated'] == 1) ? 'STATUS_ACTIVATED' : 'STATUS_NOT_ACTIVATED',
							);
				$this->session->set_userdata($dat);
						/*
							$cookie = array(
								'name'   => 'logininfo',
								'value'  => $user[0]['id'],
								'expire' => '5184000',
								'path'   => '/'
							);
							set_cookie($cookie);
							*/
	
		redirect('dashboard');
							
			}
			else { 
			//var_dump($user_profile);
			
			//$query=$this->db->query("Select * from `users` where fbgmId=$user_profile->identifier");
			//echo $query->num_rows();
			$id='';
			foreach ($query->result_array() as $row)
			{
			$id=$row['id'];
   
			}
			//echo $id;
			if($query->num_rows())
			{ 
				$this->load->library('session');
				$this->db->select('*');
				$this->db->where('id',$id);
				$this->db->where('activated','1');
				$query=$this->db->get('users');
				$user=$query->result_array();
				//var_dump($user);
				$dat=array(
									'user_id'	=> $user[0]['id'],
									'username'	=> $user[0]['username'],
									'fullName'	=> $user[0]['fullName'],
									'user_level'=> $user[0]['userLevel'],
									'reward'	=> $user[0]['reward'],
									'status'	=> ($user[0]['activated'] == 1) ? 'STATUS_ACTIVATED' : 'STATUS_NOT_ACTIVATED',
							);
				$this->session->set_userdata($dat);
					redirect('dashboard/');

						/*				

							$cookie = array(
								'name'   => 'logininfo',
								'value'  => $user[0]['id'],
								'expire' => '5184000',
								'path'   => '/'
							);
							set_cookie($cookie);
							*/
							
			}
			}
		
					//$this->load->view('hauth/done',$data);
					
				}
				else // Cannot authenticate user
				{
					show_error('Cannot authenticate user');
				}
			}
			else // This service is not enabled.
			{
				log_message('error', 'controllers.HAuth.login: This provider is not enabled ('.$provider.')');
				show_404($_SERVER['REQUEST_URI']);
			}
		}
		catch(Exception $e)
		{
			$error = 'Unexpected error';
			switch($e->getCode())
			{
				case 0 : $error = 'Unspecified error.'; break;
				case 1 : $error = 'Hybriauth configuration error.'; break;
				case 2 : $error = 'Provider not properly configured.'; break;
				case 3 : $error = 'Unknown or disabled provider.'; break;
				case 4 : $error = 'Missing provider application credentials.'; break;
				case 5 : log_message('debug', 'controllers.HAuth.login: Authentification failed. The user has canceled the authentication or the provider refused the connection.');
				         //redirect();
				         if (isset($service))
				         {
				         	log_message('debug', 'controllers.HAuth.login: logging out from service.');
				         	$service->logout();
				         }
				         show_error('User has cancelled the authentication or the provider refused the connection.');
				         break;
				case 6 : $error = 'User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.';
				         break;
				case 7 : $error = 'User not connected to the provider.';
				         break;
			}

			if (isset($service))
			{
				$service->logout();
			}

			log_message('error', 'controllers.HAuth.login: '.$error);
			show_error('Error authenticating user.');
		}
	}

	public function endpoint()
	{

		log_message('debug', 'controllers.HAuth.endpoint called.');
		log_message('info', 'controllers.HAuth.endpoint: $_REQUEST: '.print_r($_REQUEST, TRUE));

		if ($_SERVER['REQUEST_METHOD'] === 'GET')
		{
			log_message('debug', 'controllers.HAuth.endpoint: the request method is GET, copying REQUEST array into GET array.');
			$_GET = $_REQUEST;
		}

		log_message('debug', 'controllers.HAuth.endpoint: loading the original HybridAuth endpoint script.');
		require_once APPPATH.'/third_party/hybridauth/index.php';

	}
}

/* End of file hauth.php */
/* Location: ./application/controllers/hauth.php */