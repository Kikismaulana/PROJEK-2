<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MUser extends CI_Model {

	public $tabel = 'users';
	public $v_ortu = 'v_ortu';
	public $v_siswa = 'v_siswa';

	// Harus ada
	function __construct()
	{
		parent::__construct();
	}

	public function create($data)
	{
		return $this->db->insert($this->tabel, $data);
	}

	public function readadmin()
	{
		return $this->db->get_where($this->tabel, 'level = admin');
	}

	public function read()
	{
		return $this->db->get($this->tabel);
	}

	public function readuserortu()
	{
		return $this->db->get_where($this->v_ortu,'nisn != ');
	}

	public function readusersiswa()
	{
		return $this->db->get($this->v_siswa);
	}

	function updateadmin($data, $id_users)
	{
		return $this->db->where('id_users', $id_users)
			->update($this->tabel, $data);
	}
}