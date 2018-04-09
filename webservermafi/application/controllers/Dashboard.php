<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Dashboard extends CI_Controller {

    public function __Construct() {
        parent::__Construct();
        if(!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
    }

    public function index() {
        $this->load->model('MSiswa');
        $tampildata['datasiswa'] = $this->MSiswa->read()->num_rows();
        $this->load->model('MGuru');
        $tampildata['dataguru'] = $this->MGuru->read()->num_rows();
        $this->load->model('MUser');
        $tampildata['datauser'] = $this->MUser->read()->num_rows();
        $tampildata['dataadmin'] = $this->MUser->readadmin()->result_array();
        $this->load->model('MKelas');
        $tampildata['datakelas'] = $this->MKelas->read()->num_rows();
        $this->load->model('MJurusan');
        $tampildata['datajurusan'] = $this->MJurusan->read()->num_rows();
        $this->load->view('admin/header', $tampildata);
        $this->load->view('admin/dashboard', $tampildata);
        $this->load->view('admin/footer');
    }
}