<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class APIJurusan extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get() {
        $id = $this->get('id_jurusan');
        if ($id == '') {
            $jurusan = $this->db->get('jurusan')->result();
        } else {
            $this->db->where('id_jurusan', $id_jurusan);
            $jurusan = $this->db->get('jurusan')->result();
        }
        $this->response($jurusan, 200);
    }


    //Mengirim atau menambah data kontak baru
    function index_post() {
        $data = array(
                    'kode_zis'           => $this->post('kode_zis'),
                    'kategori_zakat'          => $this->post('kategori_zakat'),
                    'bulan'    => $this->post('bulan'));
        $insert = $this->db->insert('zakat', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    
    //Masukan function selanjutnya disini
}
?>