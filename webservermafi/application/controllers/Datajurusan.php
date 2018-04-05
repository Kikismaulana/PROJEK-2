<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datajurusan extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('Mjurusan');
		$tampildata['data'] = $this->Mjurusan->read()->result_array();
		$this->load->view('admin/header');
		$this->load->view('admin/datajurusan', $tampildata);
		$this->load->view('admin/footer');
	}

	public function create()
	{
		$this->load->model('Mjurusan');
		$nama_jurusan = $this->input->POST('nama_jurusan');
		$data = array(
			'nama_jurusan' => $nama_jurusan
		);
		if ($this->Mjurusan->create($data))
		{
			$this->session->set_flashdata('info', "<div class='alert alert-success alert-dismissible fade show'>
                        Data berhasil ditambahkan!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>");
		}
		else
		{
			$this->session->set_flashdata('info', "<div class='alert alert-danger alert-dismissible fade show'>
                        Data gagal ditambahkan!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>");
		}
		return redirect('Datajurusan');
	}

	public function update($id_jurusan)
	{
		$data = $this->input->post();
			$this->load->model('MJurusan');
			if ($this->MJurusan->update($data, $id_jurusan)) {
				$this->session->set_flashdata('info', "<div class='alert alert-success alert-dismissible fade show'>
                        Data berhasil diupdate!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>");
			} else {
				$this->session->set_flashdata('info', "<div class='alert alert-danger alert-dismissible fade show'>
                        Data gagal diupdate!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>");
			}
			return redirect('Datajurusan');
	}

	public function delete($id_jurusan)
	{
		$this->load->model('MJurusan');
		if($this->MJurusan->delete($id_jurusan)){
			$this->session->set_flashdata('info', "<div class='alert alert-success alert-dismissible fade show'>
                        Berhasil hapus data!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>");
		} else {
			$this->session->set_flashdata('info', "<div class='alert alert-danger alert-dismissible fade show'>
                        Gagal hapus data!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>");
		}
		$r['data'] = $this->MJurusan->read()->result_array();
		return redirect('Datajurusan', $r);
	}
}
