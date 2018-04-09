<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapresensi extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function readrekap()
	{
		$this->load->model('MUser');
		$tampildata['dataadmin'] = $this->MUser->readadmin()->result_array();
		$this->load->view('admin/header',$tampildata);
		$this->load->view('admin/rekapabsen');
		$this->load->view('admin/footer');
	}

	public function readizinsiswa()
	{
		$this->load->model('MUser');
		$tampildata['dataadmin'] = $this->MUser->readadmin()->result_array();
		$this->load->model('MIzin');
		$tampildata['dataizin'] = $this->MIzin->read()->result_array();
		$this->load->view('admin/header',$tampildata);
		$this->load->view('admin/izinsiswa',$tampildata);
		$this->load->view('admin/footer');
	}

	public function creat()
	{

	}

	public function update()
	{
		
	}

	public function delete()
	{
		
	}
}
