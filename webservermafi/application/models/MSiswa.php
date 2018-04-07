<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MSiswa extends CI_Model {

	public $tabel = 'siswa';

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
}