<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Uploader
 *
 * @author ApunniM
 */
class Uploader extends CI_Controller {

    //put your code here
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
        // $this->load->library('layout');
        $this->load->library('form_validation');
        $this->load->model('usermodel');
        $this->load->model('datamodel');
        $this->load->helper('form');
        $this->load->config('email', TRUE);
        $this->load->helper('cookie');
        $uid = $this->session->userdata('user_id');
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
                    'status' => ($user->activated == 1) ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED,
                ));
                // redirect('');
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
            } else if (current_url() == base_url()) {
                // redirect('dashboard');
            }
        }
    }

    /**
     * This function is used to upload photostory pics
     */
    public function photostory_pic_uploader() {

        if (!empty($_FILES['pic']) and is_uploaded_file($_FILES['pic']['tmp_name'])) {
            $config['upload_path'] = '/m.zersey/assets/zerseynme/';
            $data = $this->upload_pic('pic', $config);
            echo json_encode($data);
        } else {
            $name = $this->input->server('HTTP_X_FILE_NAME');
            $file = file_get_contents('php://input');
            $file_name = substr(md5($name . time()), 6) . $name;
            $data = $this->raw_upload_file($file, $file_name, './m.zersey/assets/zerseynme/');
            echo json_encode($data);
        }
    }

    function upload_pic($name, $config) {
        echo $name;
        //	print_r($_FILES);exit;
        //load the helper
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '30000';
        $config['max_width'] = '102400';
        $config['max_height'] = '76800';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($name)) {
            $data = array('error' => $this->upload->display_errors(),
                'success' => FALSE
            );
        } else { //else, set the success message
            $data = $this->upload->data();
            $data['succees'] = TRUE;
            $data['error'] = FALSE;
            $data['id'] = uniqid();
            ////$this->load->library('image_lib');
            //here is the second thumbnail, notice the call for the initialize() function again
        }
        return $data;
    }

    public function raw_upload_file($file, $file_name, $path) {
        $id = uniqid();
        if (file_put_contents($path . $file_name, $file)) {

            $data = array(
                'success' => TRUE,
                'error' => FALSE,
                'file_name' => $file_name,
                'id' => $id
            );
        } else {
            $data = array(
                'error' => 'Image Could not be uploaded',
                'success' => FALSE
            );
        }
        return $data;
    }

}
