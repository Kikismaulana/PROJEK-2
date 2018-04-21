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
		$this->load->model('MIzin');
		$tampildata['dataizin'] = $this->MIzin->read()->result_array();
		$tampildata['jumlah'] = $this->MIzin->jumlahizin()->num_rows();
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
		$tampildata['jumlah'] = $this->MIzin->jumlahizin()->num_rows();
		$this->load->view('admin/header',$tampildata);
		$this->load->view('admin/izinsiswa',$tampildata);
		$this->load->view('admin/footer');
	}

	public function readdetailizinsiswa($id_izin)
	{
		$this->load->model('MUser');
		$tampildata['dataadmin'] = $this->MUser->readadmin()->result_array();
		$this->load->model('MIzin');
		$tampildata['dataizin'] = $this->MIzin->read()->result_array();
		$tampildata['datadetailizin'] = $this->MIzin->readdetail($id_izin);
		$tampildata['jumlah'] = $this->MIzin->jumlahizin()->num_rows();
		$this->load->view('admin/header',$tampildata);
		$this->load->view('admin/izinsiswa',$tampildata);
		$this->load->view('admin/footer');
	}

	public function create()
	{

	}

	public function updatestatusbaca($id_izin)
	{
		$this->load->model('MIzin');
		$updatestatusnya = 'Read';
		$data = array(
			'status' => $updatestatusnya
		);
		$this->MIzin->updatestatusbaca($data, $id_izin);	
		return redirect('Datapresensi/readdetailizinsiswa/'.$id_izin);
	}

	public function updatepresensisetuju($id_izin)
	{
		$this->load->model('MIzin');
		$updatestatusnya = 'Accepted';
		$data = array(
			'status' => $updatestatusnya
		);
		$status = $this->MIzin->updatestatussetuju($data, $id_izin);
		$presensi = $this->MIzin->updatepresensi($id_izin);
		if ($status && $presensi)
		{
			$this->session->set_flashdata('info', "<div class='alert alert-success alert-dismissible fade show'>
                        Data berhasil diperbarui!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>");
		}
		else
		{
			$this->session->set_flashdata('info', "<div class='alert alert-danger alert-dismissible fade show'>
                        Data gagal diperbarui!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>");
		}
		return redirect('Datapresensi/readdetailizinsiswa/'.$id_izin);
	}

	public function updatepresensitidaksetuju($id_izin)
	{
		$this->load->model('MIzin');
		$updatestatusnya = 'Decline';
		$data = array(
			'status' => $updatestatusnya
		);
		$status = $this->MIzin->updatestatustidaksetuju($data, $id_izin);
		if ($status)
		{
			$this->session->set_flashdata('info', "<div class='alert alert-success alert-dismissible fade show'>
                        Permintaan berhasil ditolak!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>");
		}
		else
		{
			$this->session->set_flashdata('info', "<div class='alert alert-danger alert-dismissible fade show'>
                        Permintaan gagal ditolak!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>");
		}
		return redirect('Datapresensi/readdetailizinsiswa/'.$id_izin);
	}

	public function delete()
	{
		
	}
}
