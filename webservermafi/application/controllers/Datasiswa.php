<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datasiswa extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function read()
	{
		$this->load->model('MIzin');
		$tampildata['dataizin'] = $this->MIzin->read()->result_array();
		$this->load->model('MKelas');
		$tampildata['datakelas'] = $this->MKelas->read()->result_array();
		$this->load->model('MSiswa');
		$tampildata['datasiswa'] = $this->MSiswa->read()->result_array();
		$this->load->model('MUser');
        $tampildata['dataadmin'] = $this->MUser->readadmin()->result_array();
		$this->load->view('admin/header',$tampildata);
		$this->load->view('admin/datasiswa', $tampildata);
		$this->load->view('admin/footer');
	}

	public function create()
	{
		$this->load->model('MSiswa');
		$NIS = $this->input->POST('nis');
		$id_kelas = $this->input->POST('id_kelas');
		$nama_lengkap = $this->input->POST('nama');
		$jk = $this->input->POST('jk');
		$ttl = $this->input->POST('ttl');
		$email = $this->input->POST('email');
		$agama= $this->input->POST('agama');
		$alamat = $this->input->POST('alamat');
		$no_hp = $this->input->POST('tlp');
		$nama_ayah = $this->input->POST('nama_ayah');
		$nama_ibu = $this->input->POST('nama_ibu');
		$pekerjaan_ayah = $this->input->POST('pekerjaan_ayah');
		$pekerjaan_ibu = $this->input->POST('pekerjaan_ibu');
		$alamat_ortu = $this->input->POST('alamat_ortu');
		$id_kelas = $this->input->POST('id_kelas');
		$data = array(
			'nis' => $NIS,
			'id_kelas' => $id_kelas,
			'nama_lengkap' => $nama_lengkap,
			'jk' => $jk,
			'ttl' => $ttl,
			'email' => $email,
			'agama' => $agama,
			'alamat' => $alamat,
			'no_hp' => $no_hp,
			'nama_ayah' => $nama_ayah,
			'nama_ibu' => $nama_ibu,
			'pekerjaan_ayah' => $pekerjaan_ayah,
			'pekerjaan_ibu' => $pekerjaan_ibu,
			'alamat_ortu' => $alamat_ortu
		);
		if ($this->MSiswa->create($data))
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
		return redirect('Datasiswa/read');
	}

	public function update($nis)
	{
		$this->load->model('MSiswa');
		$NIS = $this->input->POST('nis');
		$id_kelas = $this->input->POST('id_kelas');
		$nama_lengkap = $this->input->POST('nama');
		$jk = $this->input->POST('jk');
		$ttl = $this->input->POST('ttl');
		$email = $this->input->POST('email');
		$agama= $this->input->POST('agama');
		$alamat = $this->input->POST('alamat');
		$no_hp = $this->input->POST('tlp');
		$nama_ayah = $this->input->POST('nama_ayah');
		$nama_ibu = $this->input->POST('nama_ibu');
		$pekerjaan_ayah = $this->input->POST('pekerjaan_ayah');
		$pekerjaan_ibu = $this->input->POST('pekerjaan_ibu');
		$alamat_ortu = $this->input->POST('alamat_ortu');
		$id_kelas = $this->input->POST('id_kelas');
		$data = array(
			'nis' => $NIS,
			'id_kelas' => $id_kelas,
			'nama_lengkap' => $nama_lengkap,
			'jk' => $jk,
			'ttl' => $ttl,
			'email' => $email,
			'agama' => $agama,
			'alamat' => $alamat,
			'no_hp' => $no_hp,
			'nama_ayah' => $nama_ayah,
			'nama_ibu' => $nama_ibu,
			'pekerjaan_ayah' => $pekerjaan_ayah,
			'pekerjaan_ibu' => $pekerjaan_ibu,
			'alamat_ortu' => $alamat_ortu
		);
		if ($this->MSiswa->update($data,$nis))
		{
			$this->session->set_flashdata('info', "<div class='alert alert-success alert-dismissible fade show'>
                        Data berhasil diupdate!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>");
		}
		else
		{
			$this->session->set_flashdata('info', "<div class='alert alert-danger alert-dismissible fade show'>
                        Data gagal diupdate!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>");
		}
		return redirect('Datasiswa/read');
	}

	public function delete($nis)
	{
		$this->load->model('MSiswa');
		if($this->MSiswa->delete($nis)){
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
		return redirect('Datasiswa/read');
	}
}
