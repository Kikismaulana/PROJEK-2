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
		return $this->db->get($this->v_ortu);
	}

	public function readuserguru()
	{
		return $this->db->get($this->v_guru);
	}

	public function readusersiswa()
	{
		return $this->db->get_where($this->v_siswa);
	}

	function updateadmin($data, $id_users)
	{
		return $this->db->where('id_users', $id_users)
			->update($this->tabel, $data);
	}

	function deleteuserguru($nip)
	{
		return $this->db->delete($this->tabel, ['nip'=>$nip]);
	}

	function updateuserguru($data, $nip)
	{
		return $this->db->where(nip, $nip)
			->update($this->tabel, $data);
	}

	function deleteusersiswa($nis)
	{
		return $this->db->delete($this->tabel, [nis=>$nis]);
	}

	function updateusersiswa($data, $nis)
	{
		return $this->db->where(nis, $nis)
			->update($this->tabel, $data);
	}

	function deleteuserortu($nisn)
	{
		return $this->db->delete($this->tabel, [nisn=>$nisn]);
	}

	function updateuserortu($data, $nisn)
	{
		return $this->db->where(nisn, $nisn)
			->update($this->tabel, $data);
	}

}