<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MIzin extends CI_Model {

	public $tabel = 'izin';
	public $tabel2 = 'v_izin';

	//Harus ada
	function __construct()
	{
		parent::__construct();
	}

	public function read()
	{
		return $this->db->get_where($this->tabel2, 'id_izin != ');
	}

}