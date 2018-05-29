<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MGuru extends CI_Model {

	public $tabel = 'guru';

	// Harus ada
	function __construct()
	{
		parent::__construct();
	}

	public function create($data)
	{
		return $this->db->insert($this->tabel, $data);
	}

	public function read()
	{
		return $this->db->order_by("nama_lengkap", "ASC")
						->get($this->tabel);
	}

	function update($data, $nip)
	{
		return $this->db->where(nip, $nip)
			->update($this->tabel, $data);
	}

	function delete($nip)
	{
		return $this->db->delete($this->tabel, ['nip'=>$nip]);
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

	public function insert_multiple_guru($data){
		$this->db->insert_batch('siswa', $data);
	}
}