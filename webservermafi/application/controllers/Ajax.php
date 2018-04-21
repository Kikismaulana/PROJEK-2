<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function notif()
    {
        $this->load->model('MIzin');
        $tampildata['jumlah'] = $this->MIzin->jumlahizin()->num_rows();
        $this->load->view('Admin/notif.php',$tampildata);
    }

    public function list()
    {
        $this->load->model('MIzin');
        $tampildata['dataizin'] = $this->MIzin->read()->result_array();
        $this->load->view('Admin/listizin.php',$tampildata);
    }
}