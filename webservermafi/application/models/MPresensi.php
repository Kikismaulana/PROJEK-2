<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MPresensi extends CI_Model {

	public $view = 'v_presensi';
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

	public function readjumlahtidakhadir()
	{
		$th = "Tidak Hadir";
		$nis = 123;
		return $this->db->where('presensi = ',$th)
						->where('nis = ', $nis)
						->get($this->view);
	}

	public function readjumlahhadir()
	{
		$th = "Hadir";
		$nis = 123;
		return $this->db->where('presensi = ',$th)
						->where('nis = ', $nis)
						->get($this->view);
	}

	public function readjumlahsakit()
	{
		$th = "Sakit";
		$nis = 123;
		return $this->db->where('presensi = ',$th)
						->where('nis = ', $nis)
						->get($this->view);
	}

	public function readjumlahizin()
	{
		$th = "Izin";
		$nis = 123;
		return $this->db->where('presensi = ',$th)
						->where('nis = ', $nis)
						->get($this->view);
	}

}

