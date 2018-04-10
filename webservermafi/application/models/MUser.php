<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MUser extends CI_Model {

	public $tabel = 'users';
	public $v_ortu = 'v_userortu';
	public $v_siswa = 'v_usersiswa';
	public $v_guru = 'v_userguru';

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
		$levelortu = "ortu";
		return $this->db->get($this->v_ortu,'level', $levelortu);
	}

	public function readuserguru()
	{
		$levelguru = "guru";
		return $this->db->get($this->v_guru,'level', $levelguru);
	}

	public function readusersiswa()
	{
		$levelsiswa = "siswa";
		return $this->db->get_where($this->v_siswa,'nis != ');
	}

	function updateadmin($data, $id_users)
	{
		return $this->db->where('id_users', $id_users)
			->update($this->tabel, $data);
	}
}