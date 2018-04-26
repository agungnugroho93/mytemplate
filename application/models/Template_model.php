<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Template_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }


    public function insertData($table,$params)
    {
        return $this->db->insert($table,$params);
    }


    public function getRowData($table,$arrWhere)
    {
        $this->db->where($arrWhere);
        return $this->db->get($table)->row();
    }
}