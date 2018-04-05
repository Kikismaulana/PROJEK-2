<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Admin extends CI_Controller {

    public function __Construct() {
        parent::__Construct();
        $this->load->model("MLogin");
    }

    public function index() {
    
        if($this->session->userdata('logged_in')) {
            redirect(base_url("Dashboard"));
        }else {
            $data = array('alert' => false);
            $this->load->view('admin/login',$data);
        }
    }

    public function login(){
        $postData = $this->input->post();
        $validate = $this->MLogin->validate_login($postData);
        if ($validate){
            $newdata = array(
                'admin'     => $validate[0]->admin,
                'level' 	=> $validate[0]->level,
                'id_users'	=> $validate[0]->id_users,
                'logged_in' => TRUE,
              
            );
            $this->session->set_userdata($newdata);
            redirect(base_url("Dashboard")); 
        }
        else{
            $data = array('alert' => true);
            $this->load->view('admin/login',$data);
        }
     
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }


}