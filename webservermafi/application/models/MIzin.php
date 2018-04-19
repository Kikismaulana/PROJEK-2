<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MIzin extends CI_Model {

	public $tabel = 'izin';
	public $tabel2 = 'v_izin';
	public $tabel3 = 'presensi';

	//Harus ada
	function __construct()
	{
		parent::__construct();
	}

	public function read()
	{
		return $this->db->get_where($this->tabel2, 'id_izin != ');
	}

	public function jumlahizin()
	{
		$null = '0';
		return $this->db->where('id_izin != ')
				->where('status = ',$null)
				->get($this->tabel2);	
	}

	function updatestatus($data, $id_izin)
	{
		$statusnya = 'Accepted';
		return $this->db->where('id_izin ='.$id_izin)
			->where('status != ', $statusnya)
			->update($this->tabel, $data);
	}

	function updatepresensi($id_izin)
	{
		$keterangan = $this->db->get_where($this->tabel2, 'id_izin ='.$id_izin)->row_array();
		$query = $this->db->set('presensi', $keterangan['keterangan'])
			->where('id_izin ='.$id_izin)
			->update($this->tabel3);
		return $query;
	}

	public function readdetail($id_izin)
	{
		return $this->db->get_where($this->tabel2, 'id_izin ='.$id_izin)->row_array();
	}

}