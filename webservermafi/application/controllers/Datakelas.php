<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datakelas extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('Mkelas');
		$tampildata['data'] = $this->Mkelas->read()->result_array();
		$this->load->model('Mjurusan');
		$tampildata['datajurusan'] = $this->Mjurusan->read()->result_array();
		$this->load->view('admin/header');
		$this->load->view('admin/datakelas', $tampildata);
		$this->load->view('admin/footer');
	}

	public function create()
	{
		$this->load->model('Mkelas');
		$tingkat = $this->input->POST('tingkat');
		$id_jurusan = $this->input->POST('jurusan');
		$kategori = $this->input->POST('kategori');
		$jurusan = $this->input->POST('jurusan_new');
		$gabung = "$tingkat $jurusan $kategori";
		$data = array(
			'id_jurusan' => $id_jurusan,
			'nama_kelas' => $gabung
		);
		if ($this->Mkelas->create($data))
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
		return redirect('Datakelas');
	}

	public function update($id_kelas)
	{
		$this->load->model('Mkelas');
		$tingkat = $this->input->POST('tingkat');
		$id_jurusan = $this->input->POST('jurusan');
		$kategori = $this->input->POST('kategori');
		$jurusan = $this->input->POST('jurusan_new');
		$gabung = "$tingkat $id_jurusan $kategori";
		$data = array(
			'nama_kelas' => $gabung
		);
			if ($this->Mkelas->update($data, $id_kelas)) {
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
			return redirect('Datakelas');
	}

	public function delete($id_kelas)
	{
		$this->load->model('Mkelas');
		if($this->Mkelas->delete($id_kelas)){
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
		$r['data'] = $this->Mkelas->read()->result_array();
		return redirect('Datakelas', $r);
	}
}
