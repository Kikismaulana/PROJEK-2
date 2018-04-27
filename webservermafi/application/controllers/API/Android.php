<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Android extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('API/MAndroid');
    }

    public function index()
    {
        echo 'beasiswa api';
    }

    public function LoginApi()
    {
        $nis = $this->input->post('nis');
        $password = $this->input->post('password');
        $result = $this->MAndroid->LoginApi($nis, $password);
        if($result > 0){
            echo json_encode($result);
        }else{
            $response["error"] = TRUE;
            $response["message"] = "Incorrect Email or Password!";

            echo json_encode($response);
        }
    }
}