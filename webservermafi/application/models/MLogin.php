<?php

    /******************************************
    *      Codeigniter 3 Simple Login         *
    *   Developer  :  rudiliucs1@gmail.com    *
    *        Copyright © 2017 Rudi Liu        *
    *******************************************/

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MLogin extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    function validate_login($postData){
        $this->db->select('*');
        $this->db->where('admin', $postData['admin']);
        $this->db->where('password', $postData['password']);
        $this->db->from('users');
        $query=$this->db->get();
        if ($query->num_rows() == 0)
            return false;
        else
            return $query->result();
    }
}

/* End of file  */