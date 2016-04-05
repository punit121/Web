<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dashboard
 *
 * @author ApunniM
 */
class Dashboard extends CI_Controller {

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
        /**
         * loading Models
         */
        $this->load->Model('usermodel');
        /**
         * loading libraries
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
     * Photostory submission takes care of
     * submitting photostory
     * A photostory consists of an introductory photo
     * A title,tags, and a description and image credits
     *
     * it also consists of  N number of story where N >=5
     * Each story consists of  a photo , a description
     * and an image credit
     *
     * description is not less than 100 characters
     */
    public function photostory_submit() {
        //post data are in arrays
        // eg : name="pic_id[]"
        // name="desc[]";
        //except a post data with pic_id as name
        // this is for selecting introduction pic
        //condition for status
        $scheduler = ($this->input->post('scheduler_status')) ? 4 : 1;
        $status = ($this->input->post('savedraf_status')) ? 3 : $scheduler;
        //getting scheduled time
        $scheduler_time = ($this->input->post('scheduler_time')) ? $this->input->post('scheduler_time') : NULL;
        //sata array for procesing
        $data = array(
            'id' => $this->input->post('pic_id'),
            'desc' => $this->input->post('desc'),
            'pic' => $this->input->post('pic'),
            'img_cred' => $this->input->post('img_cred'),
            'head' => $this->input->post('head'),
            'board' => $this->input->post('board'),
            'category' => $this->input->post('category'),
            'privacy' => $this->input->post('privacy'),
            'scheduled_on' => $scheduler_time,
            'status' => $status
        );

        $config = array(
            array(
                'field' => 'pic[]',
                'Label' => 'Introductory Photo',
                'rules' => 'required'
            ),
            array(
                'field' => 'desc[]',
                'label' => 'Description',
                'rules' => 'required|min_length[100]'
            ),
            array(
                'field' => 'head',
                'label' => 'Title',
                'rules' => 'required',
            ),
            array(
                'field' => 'board',
                'label' => 'Board Name',
                'rules' => 'required',
            ),
            array(
                'field' => 'category',
                'label' => 'Category',
                'rules' => 'required',
            ),
            array(
                'field' => 'pic_id[]',
                'label' => 'Picture Id',
                'rules' => 'required',
            ),
            array(
                'field' => 'privacy',
                'label' => 'Privacy',
                'rules' => 'required',
            )
        );

        //after getting values these values need to be validated
        //all values are passed into validation
        //front end validation need to be implemented because
        //images stored temporarily are lost on transaction
        $this->form_validation->set_rules($config);
        if (count($data['pic_id'] >= 5)) {

            if ($this->form_validation->run('photostory_validation_rules') == FALSE) {
                $errors = $this->form_validation->error_array();
                $this->session->set_flashdata('validation_data', $data);
                $this->session->set_flashdata('error_data', $errors);
                redirect('photostory/form');
            } else {
                // now we know the (name as id) for deciding intro pic
                // thus we loop through the data and create a model
                //which we will pass into Model and into db
                //further functionalities like shedule post is to be included
                $parsed_intro_model = $this->parse_photostory_intro($data);
                $data_status = NULL;

                $intro_status = $this->usermodel->insert_data('fbblogmain', $parsed_intro_model);

                //successfully inserted
                if ($intro_status) {
                    $data['title'] = $this->usermodel->insert_id();
                    //making title in all arrays

                    $parsed_data_model = $this->parse_photostory_data($data);
                    $data_status = $this->usermodel->insert_batch('fbblog', $parsed_data_model);
                }
                //successfully inserted
                if ($data_status && $intro_status) {
                    redirect('dashboard');
                } else {
                    //validation
                    //set flash data
                    $error = array('general' => 'Error Writing to database try again');
                    $this->session->set_flashdata('validation_data', $data);
                    $this->session->set_flashdata('error_data', $error);
                    redirect('photostory/form');
                }
            }
        } else {
            $this->session->set_flashdata('validation_data', $data);
            $error = array('general' => 'At least 6 Story Items are required');
            $this->session->set_flashdata('error_data', $error);
            redirect('photostory/form');
            //error atleat 5 needed
        }
    }

    /**
     * This is a demo view for photoStory Form
     * this view are mitigated to the main files
     * with refracored resusable type views
     * Setting stands in templating is an issue because
     * of new plugins used in this including editted materialize.js
     *
     */
    public function photostory_form() {

        if ($validation_data = $this->session->flashdata('validation_data')) {
            echo json_encode($validation_data);
        } else {
            $data = array('title' => 'Photostory');
            $this->load->view('dashboard/photostory', $data);
        }
    }

    /**
     * parse data into a model
     * for db operations
     * @param type $data
     * @return type
     */
    public function parse_photostory_data($data = NULL) {
        if ($data) {
            $i = 0;
            $parsedDataModel = array();
            foreach ($data['id'] as $id):
                if (!($this->input->post($id))) {
                    $parsedData = array();
                    $parsedData['title'] = $data['title'];
                    $parsedData['photo'] = $data['pic'][$i];
                    $parsedData['description'] = $data['desc'][$i];
                    $parsedData['img_credits'] = $data['img_cred'][$i];
                    array_push($parsedDataModel, $parsedData);
                }
                $i++;

            endforeach;
            return $parsedDataModel;
        } else {
            return NULL;
        }
    }

    /**
     * Making the parser for intro only
     * fbblogmain tavble model
     * so as insert_data into the table
     * @return {array} parsedData Model for DB transaction
     */
    public function parse_photostory_intro($data = NULL) {

        if ($data) {
            $i = 0;
            $flag = 0;
            //intro pic is selected by user no error
            $parsedData['boardname'] = $data['board'];
            $parsedData['head'] = $data['head'];
            $parsedData['maincat'] = $data['category'];
            $parsedData['shareas'] = $data['privacy'];
            $parsedData['userid'] = $this->session->userdata('user_id');
            $parsedData['schedulepost'] = $data['scheduled_on'];
            $parsedData['status'] = $data['status'];
            $parsedData['publish_id'] = $this->usermodel->fetch_maxItem('fbblogmain', 'publish_id') + 1;

            foreach ($data['id'] as $id):
                if ($this->input->post($id)) {
                    $flag = 1;

                    $parsedData['image'] = $data['pic'][$i];
                    $parsedData['intro'] = $data['desc'][$i];
                    $parsedData['img_credits'] = $data['img_cred'][$i];
                }
                $i++;
            endforeach;
            //incase no intro pic selected
            if ($flag == 0) {
                $parsedData['image'] = $data['pic'][0];
                $parsedData['intro'] = $data['desc'][0];
                $parsedData['img_credits'] = $data['img_cred'][0];
            }
            return $parsedData;
        } else {
            return NULL;
        }
    }

}
