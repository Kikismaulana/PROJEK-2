<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MPresensi extends CI_Model {

	public $tabel = 'siswa';

	//Harus ada
	function __construct()
	{
		parent::__construct();
	}

	public function read()
	{
		return $this->db->get($this->tabel);
	}

}

