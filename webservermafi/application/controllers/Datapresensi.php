<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapresensi extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function readrekap()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/rekapabsen');
		$this->load->view('admin/footer');
	}

	public function readizinsiswa()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/izinsiswa');
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
