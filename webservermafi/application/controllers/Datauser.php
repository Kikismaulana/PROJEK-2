<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datauser extends CI_Controller {


	function __construct(){
		parent::__construct();
	}

	public function readuserguru()
	{
		$this->load->model('MUser');
		$tampildata['dataadmin'] = $this->MUser->readadmin()->result_array();
		$tampildata['data'] = $this->MUser->readuserguru()->result_array();
		$this->load->view('admin/header',$tampildata);
		$this->load->view('admin/userguru',$tampildata);
		$this->load->view('admin/footer');
	}

	public function readusersiswa()
	{
		$this->load->model('MUser');
		$tampildata['dataadmin'] = $this->MUser->readadmin()->result_array();
		$tampildata['data'] = $this->MUser->readusersiswa()->result_array();
		$this->load->view('admin/header',$tampildata);
		$this->load->view('admin/usersiswa',$tampildata);
		$this->load->view('admin/footer');
	}

	public function readuserortu()
	{
		$this->load->model('MUser');
		$tampildata['dataadmin'] = $this->MUser->readadmin()->result_array();
		$tampildata['data'] = $this->MUser->readuserortu()->result_array();
		$this->load->view('admin/header',$tampildata);
		$this->load->view('admin/userortu', $tampildata);
		$this->load->view('admin/footer');
	}

	public function createuserortu()
	{
		$this->load->model('MUser');
		$NISN = $this->input->POST('nisn');
		$NIS = $this->input->POST('nis');
		$password = $this->input->POST('password');
		$level = $this->input->POST('level');
		$data = array (
			'nisn' => $NISN,
			'nis' => $NIS,
			'password' => $password,
			'level' => $level
		);
		if ($this->MUser->create($data))
		{
			$this->session->set_flashdata('info', "<div class='alert alert-success alert-dismissible fade show'>
                        Data berhasil ditambahkan!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>");
		}
		else
		{
			$this->session->set_flashdata('info', "<div class='alert alert-danger alert-dismissible fade show'>
                        Data gagal ditambahkan!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>");
		}
		return redirect('Datauser/readuserortu');
	}

	public function createusersiswa()
	{
		$this->load->model('MUser');
		$NIS = $this->input->POST('nis');
		$password = $this->input->POST('password');
		$level = $this->input->POST('level');
		$data = array (
			'nis' => $NIS,
			'password' => $password,
			'level' => $level
		);
		if ($this->MUser->create($data))
		{
			$this->session->set_flashdata('info', "<div class='alert alert-success alert-dismissible fade show'>
                        Data berhasil ditambahkan!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>");
		}
		else
		{
			$this->session->set_flashdata('info', "<div class='alert alert-danger alert-dismissible fade show'>
                        Data gagal ditambahkan!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>");
		}
		return redirect('Datauser/readusersiswa');
	}

	public function createuserguru()
	{
		$this->load->model('MUser');
		$nip = $this->input->POST('nip');
		$password = $this->input->POST('password');
		$level = $this->input->POST('level');
		$data = array (
			'nip' => $nip,
			'password' => $password,
			'level' => $level
		);
		if ($this->MUser->create($data))
		{
			$this->session->set_flashdata('info', "<div class='alert alert-success alert-dismissible fade show'>
                        Data berhasil ditambahkan!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>");
		}
		else
		{
			$this->session->set_flashdata('info', "<div class='alert alert-danger alert-dismissible fade show'>
                        Data gagal ditambahkan!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>");
		}
		return redirect('Datauser/readuserguru');
	}

	public function update()
	{
		
	}

	public function delete()
	{
		
	}
}
