<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of commonFunctions
 *
 * @author ApunniM
 */
class Common extends CI_Model {

//put your code here
    public function __construct() {
        parent::__construct();
    }

    /**
     * insert a row data
     * @param type $table
     * @param type $value
     * @return boolean
     */
    function insert_data($table, $value) {
        $this->db->insert($table, $value);
        return $this->db->affected_rows();
    }

    /**
     *
     * @param type $table
     * @param type $cond
     * @return boolean
     */
    function delete_data($table, $cond) {
        $this->db->where($cond);
        $this->db->delete($table);
        return $this->db->affected_rows();
    }

    /**
     * insert n rows
     * @param type $table
     * @param type $value
     * @return type
     */
    function insert_batch($table, $value) {
        $this->db->insert_batch($table, $value);
        return $this->db->affected_rows();
    }

    /**
     * get AI id of last transaction
     * @return type
     */
    function insert_id() {
        return $this->db->insert_id();
    }

    /**
     *
     * @param type $table
     * @param type $item
     * @param type $basedOn
     */
    function fetch_maxItem($table, $item) {
        $this->db->select_max($item);
        $row = $this->db->get($table)->row_array();
        return $row[$item];
    }

    /**
     * get a single cell returned as it is
     * @param type $table
     * @param type $select
     * @param type $cond
     */
    function fetch_cell($table, $select, $cond) {
        $this->db->select($select);
        $this->db->from($table);
        $this->db->where($cond);
        $row = $this->db->get()->row_array();
        return $row[$select];
    }

    /**
     *
     * @param type $table
     * @param type $select
     * @param type $cond
     * @return type
     */
    function fetch_where($table, $select, $cond) {
        $this->db->select($select);
        $this->db->from($table);
        $this->db->where($cond);
        return $this->db->get()->result_array();
    }

    /**
     * where from a list of items like ids
     * @param type $table
     * @param type $select
     * @param type $cond
     * @return type
     */
    function fetch_where_in($table, $select, $item, $array) {
        $this->db->select($select);
        $this->db->from($table);
        $this->db->where_in($item, $array);
        return $this->db->get()->result_array();
    }

    /**
     * for fetching items ordered by something
     * @param type $table
     * @param type $select
     * @param type $cond
     * @param type $orderBy
     * @param type $desc_asc
     * @param type $limit
     * @return type
     */
    function fetch_orderBy($table, $select, $cond, $orderBy, $desc_asc, $limit = NULL) {
        $this->db - select($select);
        $this->db->from($table);
        $this->db->where($cond);
        $this->db->orderBy($orderBy, $desc_asc);
        if ($limit) {
            $limits = explode(',', $limit);
            if (count($limits) > 1 && $limits[0] < $limits[1]) {
                $this->db->limit($limits[0], $limits[1]);
            } else {
                $this->db->limit($limits[0]);
            }
        }
        return $this->db->get()->result_array();
    }

    /**
     *  where in makes it posiible to add a list of a condition
     * @param type $table
     * @param type $select
     * @param type $where
     * @param type $in
     * @param type $orderBy
     * @param type $desc_asc
     * @param type $limit
     * @return type
     */
    function fetch_where_in_orderBy($table, $select, $where, $in, $orderBy, $desc_asc, $limit = NULL) {
        $this->db - select($select);
        $this->db->from($table);
        $this->db->where_in($where, $in);
        $this->db->orderBy($orderBy, $desc_asc);
        if ($limit) {
            $limits = explode(',', $limit);
            if (count($limits) > 1 && $limits[0] < $limits[1]) {
                $this->db->limit($limits[0], $limits[1]);
            } else {
                $this->db->limit($limits[0]);
            }
        }
        return $this->db->get()->result_array();
    }

}
