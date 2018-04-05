<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datauser extends CI_Controller {


	function __construct(){
		parent::__construct();
	}

	public function readuserguru()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/userguru');
		$this->load->view('admin/footer');
	}

	public function readusersiswa()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/usersiswa');
		$this->load->view('admin/footer');
	}

	public function readuserortu()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/userortu');
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
