<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploadimage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Uploadimage_model', 'uploadimage');
		$this->load->library(array('form_validation', 'session'));
	}

	public function index()
	{
		$data['images'] = $this->uploadimage->get_all();
		$this->load->view('admin/upload', $data);
	}

	public function create()
	{
		$this->rules();
		if ($this->form_validation->run() == FALSE) {
			$data['nama_file'] = $this->input->post('nama_file') ? $this->input->post('nama_file') : '';
		}
		$this->load->view('admin/upload', $data);
	}

	public function store()
	{
		$config = array(
			'upload_path' => './images/',
			'allowed_types' => 'jpeg|jpg|png',
			'max_size' => '2048',
			'max_width' => '2000',
			'max_height' => '2000'
 		);
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('filefoto')) {
			$this->session->set_flashdata('message', "<div style='color:#ff0000;'>" . $this->upload->display_errors() . "</div>");
			redirect(site_url('uploadimage/create'));
		} else {
			$file = $this->upload->data();
			$nis = $this->input->post('nis');
			$alasan = $this->input->post('alasan');
			$tanggal_mulai = $this->input->post('mulai');
			$tanggal_selesai = $this->input->post('selesai');
			$keterangan = $this->input->post('ket');
			$data = array(
					'NIS' => $nis,
					'alasan' => $alasan,
					'tanggal_mulai' => $tanggal_mulai,
					'tanggal_selesai' => $tanggal_selesai,
					'keterangan' => $keterangan,
					'bukti'  => $file['file_name']
			);

			$this->uploadimage->insert($data);
		}
		$this->session->set_flashdata('message', "<div style='color:#00a65a;'>Gambar berhasil ditambah.</div>");
		redirect(site_url('uploadimage'));
	}

	public function delete($id)
	{
		$row = $this->uploadimage->get_by_id($id);

		if ($row) {

				// unlink() use for delete files like image.
				unlink('images/'.$row->filefoto);

				$this->uploadimage->delete($id);
				$this->session->set_flashdata('message', "<div style='color:#00a65a;'>Gambar berhasil dihapus.</div>");
				redirect(site_url('uploadimage'));
		} else {
				$this->session->set_flashdata('message', "<div style='color:#dd4b39;'>Data tidak ditemukan.</div>");
				redirect(site_url('uploadimage'));
		}
	}

	public function rules()
	{
		$this->form_validation->set_rules('nama_file', 'Nama File', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}
