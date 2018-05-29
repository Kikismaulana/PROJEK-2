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
		return $this->db->where('status = ',$null)
				->get($this->tabel);
	}

	function updatestatusbaca($data, $id_izin)
	{
		$statusnya = 'Read';
		return $this->db->where('id_izin ='.$id_izin)
			->where('status != ', $statusnya)
			->update($this->tabel, $data);
	}

	function updatestatussetuju($data, $id_izin)
	{
		$statusnya = 'Accepted';
		return $this->db->where('id_izin ='.$id_izin)
			->where('status != ', $statusnya)
			->update($this->tabel, $data);
	}

	function updatestatustidaksetuju($data, $id_izin)
	{
		$statusnya = 'Decline';
		return $this->db->where('id_izin ='.$id_izin)
			->where('status != ', $statusnya)
			->update($this->tabel, $data);
	}

	function updatepresensi($id_izin)
	{
		$ambildataizin = $this->db->get_where($this->tabel, 'id_izin ='.$id_izin)->row_array();
		$ambildatapresensi = $this->db->get_where($this->tabel3, 'NIS ='.$ambildataizin['NIS'])->result_array();
		for ($i=$ambildataizin['tanggal_mulai']; $i <= $ambildataizin['tanggal_selesai'] ; $i++) {
			$data = array(
				'NIS' => $ambildataizin['NIS'],
				'presensi' => $ambildataizin['keterangan'],
				'tanggal' => $i
			);
			
			$queryupdate = $this->db->where('NIS ='.$ambildataizin['NIS'])
									->where('tanggal =',$i)
									->delete($this->tabel3);

			$queryinsert = $this->db->insert($this->tabel3, $data);
		}
		return $queryinsert;
		return $queryupdate;
	}

	public function readdetail($id_izin)
	{
		return $this->db->get_where($this->tabel2, 'id_izin ='.$id_izin)->row_array();
	}

}