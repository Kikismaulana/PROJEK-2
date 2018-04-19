<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataguru extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function read()
	{
		$this->load->model('MIzin');
		$tampildata['dataizin'] = $this->MIzin->read()->result_array();
		$tampildata['jumlah'] = $this->MIzin->jumlahizin()->num_rows();
		$this->load->model('MUser');
        $tampildata['dataadmin'] = $this->MUser->readadmin()->result_array();
		$this->load->model('MGuru');
		$tampildata['data'] = $this->MGuru->read()->result_array();
		$this->load->view('admin/header',$tampildata);
		$this->load->view('admin/dataguru',$tampildata);
		$this->load->view('admin/footer');
	}

	public function create()
	{
		$this->load->model('MGuru');
		$NIP = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$jk = $this->input->post('jk');
		$no_hp = $this->input->post('no_hp');
		$alamat = $this->input->post('alamat');
		$data = array (
			'nip' => $NIP,
			'nama_lengkap' => $nama,
			'email' => $email,
			'jk' => $jk,
			'no_hp' => $no_hp,
			'alamat' => $alamat
		);
		if ($this->MGuru->create($data))
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
		return redirect('Dataguru/read');
	}

	public function update($nip)
	{
		$this->load->model('MGuru');
		$NIP = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$jk = $this->input->post('jk');
		$no_hp = $this->input->post('no_hp');
		$alamat = $this->input->post('alamat');
		$data = array (
			'nip' => $NIP,
			'nama_lengkap' => $nama,
			'email' => $email,
			'jk' => $jk,
			'no_hp' => $no_hp,
			'alamat' => $alamat
		);
		if ($this->MGuru->update($data, $nip)) {
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
		return redirect('Dataguru/read');
	}

	public function delete($nip)
	{
		$this->load->model('MGuru');
		if($this->MGuru->delete($nip)){
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
		return redirect('Dataguru/read');
	}
}
