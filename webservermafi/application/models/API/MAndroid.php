<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MAndroid extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function LoginApi($nis, $password)
    {
        $level = 'siswa';
        $result = $this->db->where('nis', $nis)
                    ->where('password', $password)
                    ->where('level', $level)
                    ->get('users');
        return $result->result_array();
    }
}