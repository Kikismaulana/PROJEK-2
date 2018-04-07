<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MUser extends CI_Model {

	public $tabel = 'users';
	public $v_ortu = 'v_ortu';

	// Harus ada
	function __construct()
	{
		parent::__construct();
	}

	public function createuserortu($data)
	{
		return $this->db->insert($this->tabel, $data);
	}

	public function readuserortu()
	{
		return $this->db->get_where($this->v_ortu,'nisn != ');
	}
}