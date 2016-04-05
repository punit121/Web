<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of custom_form_validation
 *
 * @author ApunniM
 */
class MY_Form_Validation extends CI_Form_validation {

    public function __construct() {
        parent::__construct();
    }

    //put your code here
    /**
     * validation
     * @param type $value
     * @return boolean
     */
    public function is_image($img, $field) {

        $upload_config['upload_path'] = './assets/img/uploads/';
        $upload_config['allowed_types'] = 'gif|jpg|png';
        $upload_config['max_size'] = 3000;
        $upload_config['max_width'] = 2048;
        $upload_config['max_height'] = 2048;
        $upload_config['encrypt_name'] = TRUE;
        $this->load->library('upload', $upload_config);


        if (!$this->upload->do_upload($field)) {
            $this->form_validation->set_message('is_image', $this->upload->display_errors(''));
            return FALSE;
        } else {
            $this->upload->data();
            return TRUE;
        }
    }

    /**
     * get errors in array
     * @return type
     */
    public function error_array() {
        return $this->_error_array;
    }

}
