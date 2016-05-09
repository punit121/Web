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

        /**
         * loading Models
         */
        $this->load->model('common');
        $this->load->model('datamodel');
        $this->load->model('usermodel');
        /**
         * loading libraries
         */
        $this->load->helper('url');
        $this->load->library('layout');
        $this->load->library('form_validation');
        $this->load->helper('form');
        // $userid = $this->session->userdata['user_id'];
    }

    function index() {

        $userid = $this->session->userdata['user_id'];
        if (!$userid) {
            $this->layout->home();
            return;
        }
        $data = array();
        // echo '<script>console.log("' . $userid . '");</script>';
        //showing headers
        $this->load->view('layout/dashboard');
        $this->load->view('layout/header');

        //setting visits if not available to show user for first time only
        if (!$this->session->userdata('visits')) {
            //if the value is null that also is okay
            // so $visita are either 0 or a number
            $condition = array('userId' => $userid);
            $visits = $this->common->fetch_cell('customer', 'visits', $condition);
            if ($visits == 0) {
                $this->custom_feed_input();
            } else {
                $visits++;
                $visits_model = array('visits' => $visits);
                $this->usermodel->updatedata($condition, $visits_model, 'customer');
                $this->session->set_userdata('visits', $visits);
            }
        }
        //so based on number of visit custome feed input will be shown
        //for side bars
        // echo '<script>console.log(' . json_encode($users_not_followed) . ')</script>';
        $data['ctrl'] = & get_instance();
        $this->load->view('dashboard/main_dashboard/dashboard', $data);
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

    /* ---------------------PHOTOSTORY----------------------------------- */

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
            'subboard' => $this->input->post('subboard'),
            'privacy' => $this->input->post('privacy'),
            'scheduled_on' => $scheduler_time,
            'status' => $status
        );
        //validation rules need to be moved into cofig

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
                $errors = 'Incorrect Data';
                //on CI 3 Upgradation
                //$this->form_validation->error_array();
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

                $intro_status = $this->common->insert_data('fbblogmain', $parsed_intro_model);

                //successfully inserted
                if ($intro_status) {
                    $data['title'] = $this->common->insert_id();
                    //making title in all arrays

                    $parsed_data_model = $this->parse_photostory_data($data);
                    $data_status = $this->common->insert_batch('fbblog', $parsed_data_model);
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
    public function photostory_form($category = NULL, $board = NULL, $sub_board = NULL) {

        $userid = $this->session->userdata('user_id');
        if (!$userid) {
            redirect('');
        }

        $data = array(
            'boradname' => $board,
            'category' => $category,
            'subboard' => $subboard
        );

        if ($validation_data = $this->session->flashdata('validation_data')) {
            // echo json_encode($validation_data);
            echo '<h1>ERROR WITH DATA</h1>';
        } else {
            $this->layout->header_postpage_materialize('post1_materialize');
            $this->load->view('dashboard/forms/photostory', $data);
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
            $parsedData['subboardname'] = $data['subboard'];
            $parsedData['date'] = date("Y-m-d");
            $parsedData['createdOn'] = date("Y-m-d H:i:s");
            //incase we are not publishing right away
            if ($data['status'] === 1) {
                $parsedData['publishedOn'] = date("Y-m-d H:i:s");
                $parsedData['publish_id'] = $this->common->fetch_maxItem('fbblogmain', 'publish_id') + 1;
            }

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

    /* -----------------------------EDITORIAL--------------------------------- */

    /**
     * Editorial Has several factors
     * Showing Board is one among them
     * Category
     * User
     * Heading
     * Image
     * Intro description
     */
    public function editorial_form($category = NULL, $board = NULL, $sub_board = NULL) {

        $data = array(
            'boradname' => $board,
            'category' => $category,
            'subboard' => $subboard,
            'pagename' => 'postpage'
        );

        $userid = $this->session->userdata('user_id');
        if (!$userid) {
            redirect('');
        }
        //requires from two tables
        $select = ' userId , customer.fullname , username , photo ';
        $data['user'] = $this->datamodel->get_user($select, $userid);

        //viewing form
        $this->layout->view('dashboard/forms/editorial', $data, 'post1');
    }

    public function editorial_submit() {
        $userid = $this->session->userdata('user_id');
        if (!$userid) {
            echo 'User not logged in logIn first';
        }
        $config = array(
            array(
                'field' => 'content',
                'Label' => 'Content',
                'rules' => 'required|min_length[1000]'
            ),
            array(
                'field' => 'head',
                'label' => 'Title',
                'rules' => 'required|min_length[10]',
            ),
            array(
                'field' => 'category',
                'label' => 'Category',
                'rules' => 'required',
            ),
            array(
                'field' => 'image',
                'label' => 'Picture Id',
                'rules' => 'required',
            ),
            array(
                'field' => 'privacy',
                'label' => 'Privacy',
                'rules' => 'required',
            )
        );
        //setting form validation
        $this->form_validation->set_rules($config);

        //parsing data for db operation
        $parsedData['boardname'] = $this->input->post('board');
        $parsedData['head'] = $this->input->post('head');
        $parsedData['maincat'] = $this->input->post('category');
        $parsedData['shareas'] = $this->input->post('privacy');
        $parsedData['userid'] = $this->session->userdata('user_id');
        $parsedData['status'] = 1;
        if ($this->input->post('draft')) {
            $parsedData['status'] = 3;
        } else if ($this->input->post('scheduled')) {
            $parsedData['status'] = 3;
            $parsedData['schedulepost'] = $this->input->post('scheduleDate');
        } else {
            //if no other case only
            $parsedData['publish_id'] = $this->common->fetch_maxItem('fbblogmain', 'publish_id') + 1;
            $parsedData['publishedOn'] = date("Y-m-d H:i:s");
        }
        $parsedData['editorial'] = 1;
        $parsedData['image'] = $this->input->post('image');
        $parsedData['intro'] = $this->input->post('content');
        $parsedData['img_credits'] = $this->input->post('img_creds');
        $parsedData['subboardname'] = $this->input->post('subboard');
        $parsedData['date'] = date("Y-m-d");
        $parsedData['createdOn'] = date("Y-m-d H:i:s");




        if ($this->form_validation->run('photostory_validation_rules') == FALSE) {
            echo validation_errors();
        } else {
            //now save data to db here
            $status = $this->common->insert_data('fbblogmain', $parsedData);

            if ($status) {
                echo 'success';
            } else {
                echo 'Error While writing data to DB';
            }
        }
    }

    /* ---------------------PHOTOSTORY END----------------------------------- */
    /* ---------------------CATEGORY SELECTION
     *                        CUSTOM FEED INPUT------------------------------ */

    /**
     * Custom feed input
     * is specified as the selection of category
     * and users to follow which will help create
     * the necessary custom feeds
     */
    public function custom_feed_input() {
        //several functionalities in this function will be later to be split for
        //reuse , for example recommended users

        /** --------fetch categories which are most popular and downward----- */
        //output is expected to be an array of data
        // based on number of rows
        $userid = $this->session->userdata('user_id');

        if ($userid) {
            //categories can now be accessed from main cat
            $not_followed_categories = $this->datamodel->get_categories($userid, 'not_followed', 'DESC');
            $followed_categories = $this->datamodel->get_categories($userid, 'followed', 'DESC');
            $users_not_followed = $this->datamodel->get_users($userid, 'not_followed', 'DESC', 20);
            $users_followed = $this->datamodel->get_users($userid, 'followed', 'DESC', 5);
            //echo '<script>console.log(' . json_encode($not_followed_categories) . ')</script>';
            //pass it down to input selection
            $data['users_not_followed'] = $users_not_followed;
            $data['users_followed'] = $users_followed;
            $data['followed_categories'] = $followed_categories;
            $data['not_followed_categories'] = $not_followed_categories;
            $this->load->view('dashboard/custom_feed_input', $data);
        } else {
            echo '<script>console.log("no custom input");</script>';
        }
    }

    /**
     * This is used to follow a particular category
     * by a user, single cateegory through ajax at a time
     */
    function follow_category() {

        //prepping data
        $data['userid'] = $this->session->userdata('user_id');
        $data['catid'] = $this->input->post('cid');
        $a = NULL;
        //need to have a look at this function
        if ($this->input->post('status') == 'follow') {
            $a = $this->common->insert_data('follow_category', $data);
        } else
        if ($this->input->post('status') == 'un_follow') {
            $a = $this->common->delete_data('follow_category', $data);
        }

        if ($a) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    /**
     * follow single user by session user
     */
    function follow_user() {

        //prepping data
        $data['userid'] = $this->session->userdata('user_id');
        $data['usid'] = $this->input->post('user_id');
        $a = NULL;
        //need to have a look at this function
        if ($this->input->post('status') === 'follow') {
            $a = $this->common->insert_data('follow_user', $data);
        } else
        if ($this->input->post('status') === 'un_follow') {
            $a = $this->common->delete_data('follow_user', $data);
        }

        if ($a) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    /* --------------------CUSTOM FEED OUTPUT---------------------------- */

    /**
     * outputs custom feeds based on time and limit
     * also accepts a param stats  for getting
     * latest and older posts
     * @param type $stat
     */
    public function custom_feeds($stat = 'latest') {
        //lpid is last post id
        $last_date = $this->input->get('last_date');
        $database_offset = 0;
        $last_date = (int) ($last_date + $database_offset);
        $limit = $this->input->get('limit'); //number of posts
        $userid = $this->session->userdata('user_id'); //user id
        $data['feeds'] = array();
        if ($userid) {
            //stat means latest or older
            $feeds = $this->datamodel->custom_feeds($userid, $last_date, $stat, $limit);
            //array of userids
            $data['feeds'] = $feeds;
            echo json_encode($data);
        } else {
            //need to show some error
            echo json_encode($data);
        }
    }

    /**
     * feeds based on category
     */
    public function category_feeds($stat = 'latest') {
        //lpid is last post id
        $last_date = $this->input->get('last_date');
        $database_offset = 0;
        $last_date = (int) ($last_date + $database_offset);
        $category = $this->input->get('category');
        $limit = $this->input->get('limit'); //number of posts
        $userid = $this->session->userdata('user_id'); //user id
        $data['feeds'] = array();
        if ($userid) {
            //stat means latest or older
            $feeds = $this->datamodel->category_feeds($category, $last_date, $stat, $limit);
            //array of userids
            $data['feeds'] = $feeds;
            echo json_encode($data);
        } else {
            //need to show some error
            echo json_encode($data);
        }
    }

    /**
     * feeds based on user
     *
     * based on private public we may need some classifications later on
     */
    public function user_feeds($stat = 'latest') {
        //lpid is last post id
        $last_date = $this->input->get('last_date');
        $database_offset = 0;
        //dont confuse it with the current user
        //this is the user which we are requesting for
        $req_userid = $this->input->get('userid');
        $last_date = (int) ($last_date + $database_offset);
        $limit = $this->input->get('limit'); //number of posts
        //id of user using this
        $userid = $this->session->userdata('user_id'); //user id
        $data['feeds'] = array();
        if ($userid) {
            //stat means latest or older
            $feeds = $this->datamodel->user_feeds($req_userid, $last_date, $stat, $limit);
            //array of userids
            $data['feeds'] = $feeds;
            echo json_encode($data);
        } else {
            //need to show some error
            echo json_encode($data);
        }
    }

    /**
     * Counting latest feeds that needs to be updated
     */
    public function count_feeds() {
        $number_of_posts = 0;
        $database_offset = 45000;
        $userid = $this->session->userdata('user_id');
        $last_date = (int) ($this->input->get('data ') || 0) + $database_offset;
        echo $this->datamodel->count_feeds($userid, $last_date);
    }

    /**
     * confirming custom feed input
     */
    public function custom_feed_input_confirm() {
        //userid to check the authenticity of user
        $userid = $this->session->userdata('user_id');
        if (!$userid) {
            echo 'error';
        } else {
            //funny to confirm jesus
            $confirm = $this->input->post('confirm');
            if ($confirm == 'jesus') {
                $condition = array('userId' => $userid);
                $visits = $this->common->fetch_cell('customer', 'visits', $condition);
                $visits++;
                $visits_model = array('visits' => $visits);
                $this->usermodel->updatedata($condition, $visits_model, 'customer');
                $this->session->set_userdata('visits', $visits);
                echo 'success';
            } else {
                echo 'error';
            }
        }
    }

}
