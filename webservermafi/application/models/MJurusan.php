<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MJurusan extends CI_Model {

	public $tabel = 'jurusan';

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

	function update($data, $id_jurusan)
	{
		return $this->db->where('id_jurusan', $id_jurusan)
			->update($this->tabel, $data);
	}

	function delete($id_jurusan)
	{
		return $this->db->delete($this->tabel, ['id_jurusan'=>$id_jurusan]);
	}

}