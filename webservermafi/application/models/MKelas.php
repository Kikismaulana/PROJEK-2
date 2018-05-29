<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MKelas extends CI_Model {

	public $tabel = 'kelas';
	public $tabeljurusan = 'jurusan';

	//Harus ada
	function __construct(){
		parent::__construct();
	}

	function create($data)
	{
		return $this->db->insert($this->tabel, $data);
	}

	function read()
	{
		return $this->db->get($this->tabel);
	}

	function update($data, $id_kelas)
	{
		return $this->db->where('id_kelas', $id_kelas)
			->update($this->tabel, $data);
	}

	function delete($id_kelas)
	{
		return $this->db->delete($this->tabel, ['id_kelas'=>$id_kelas]);
	}

}