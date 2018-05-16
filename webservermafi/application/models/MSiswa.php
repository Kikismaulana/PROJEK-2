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
}