<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MSiswa extends CI_Model {

	public $tabel = 'v_datasiswa';

	// Harus ada
	function __construct()
	{
		parent::__construct();
	}

	public function create($data)
	{
		return $this->db->insert('siswa', $data);
	}

	public function read()
	{
		return $this->db->order_by("nama_kelas", "ASC")
						->get($this->tabel);
	}

	public function readrekap($kelas)
	{
		return $this->db->order_by("nama_kelas", "ASC")
						->where('id_kelas = ', $kelas)
						->get($this->tabel);
	}

	function update($data, $nis)
	{
		return $this->db->where(nis, $nis)
			->update('siswa', $data);
	}

	function delete($nis)
	{
		return $this->db->delete('siswa', ['nis'=>$nis]);
	}

	// Fungsi untuk melakukan proses upload file
	public function upload_file($filename){
		$this->load->library('upload'); // Load librari upload
		
		$config['upload_path'] = './csv/';
		$config['allowed_types'] = 'csv';
		$config['max_size']	= '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;
	
		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	public function insert_multiple_siswa($data){
		$this->db->insert_batch('siswa', $data);
	}
}