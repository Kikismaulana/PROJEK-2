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
		return $this->db->get($this->tabel);
	}

	function update($data, $nip)
	{
		return $this->db->where('nip', $nip)
			->update($this->tabel, $data);
	}

	function delete($nip)
	{
		return $this->db->delete($this->tabel, ['nip'=>$nip]);
	}
}