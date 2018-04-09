<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MSiswa extends CI_Model {

	public $tabel = 'v_siswa';

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
		return $this->db->get($this->tabel);
	}

	function update($data, $nis)
	{
		return $this->db->where(nis, $nis)
			->update('siswa', $data);
	}
}