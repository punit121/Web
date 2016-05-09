<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Layout {

    // public $head = 'layout/head';
    public $header = 'layout/header';

    function __construct() {
        $this->lt = & get_instance();
        //$this->load->model('header_model');
    }

    function view($view = '', $data = '', $hd = '') {    //load view in controller with layout
        $head = 'layout/' . $hd;
        //$data['activeUserLevel']= $data['loggedUser']['userLevel'];
        //$sessionData = $this->session->userdata('loggedIn');
        $this->lt->load->view($head, $data);
        $this->lt->load->view($this->header, $data);
        //$this->lt->load->view($this->footer,$data);
        $this->lt->load->view($view, $data);
    }

    /**
     * The header for post page is minimal
     * and data for user is to be passed along
     */
    function header_postpage_materialize($head = 'post1') {

        $this->lt->load->model('usermodel');
        $this->lt->load->library('session');
        $username = $this->lt->session->userdata('username');
        $data = array(
            'user' => NULL,
            'login_image' => base_url() . 'assets/images/merchant/usericon.jpg'
        );
        //if user logged in
        if ($username) {
            $login_name = ucfirst($this->lt->usermodel->getLoginName($username));
            $user_id = $this->lt->session->userdata('user_id');
            $user = array(
                'username' => $username,
                'user_id' => $user_id,
                'login_name' => $login_name
            );
            $login_image = $this->lt->usermodel->getLoginimage($user_id);
            $data['user'] = $user;
            $data['login_image'] = $login_image ? base_url() . 'assets/images/merchant/' . $login_image : base_url() . 'assets/images/merchant/usericon.jpg';
        }
        $this->lt->load->view('layout/' . $head);
        $this->lt->load->view('layout/header_postpage_materialize', $data);
    }

    function home() {
        $this->lt->load->view('home');
    }

}

?>