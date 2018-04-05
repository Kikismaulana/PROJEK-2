<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datasiswa extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function read()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/datasiswa');
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
