<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Importdatasiswa extends CI_Controller {
	private $filename = "import_data"; // Kita tentukan nama filenya
	
	public function __construct(){
		parent::__construct();
		
		$this->load->model('MImportdata');
	}
	
	public function index(){
		$data['siswa'] = $this->MImportdata->viewdatasiswa();
	}
	
	public function form(){
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->MImportdata->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$csvreader = PHPExcel_IOFactory::createReader('CSV');
				$loadcsv = $csvreader->load('csv/'.$this->filename.'.csv'); // Load file yang tadi diupload ke folder csv
				$sheet = $loadcsv->getActiveSheet()->getRowIterator();
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam csv yang sudha di upload sebelumnya
				$data['sheet'] = $sheet; 
			}else{ // Jika proses upload gagal
				// $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
				$this->session->set_flashdata('info', "<div class='alert alert-danger alert-dismissible fade show'>
                        Silahkan Pilih file terlebih dahulu!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>");
				redirect('Datasiswa/read');
			}
		}
		
		$this->load->view('admin/priviewdatasiswa', $data);
	}
	
	public function import(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$csvreader = PHPExcel_IOFactory::createReader('CSV');
		$loadcsv = $csvreader->load('csv/'.$this->filename.'.csv'); // Load file yang tadi diupload ke folder csv
		$sheet = $loadcsv->getActiveSheet()->getRowIterator();
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = [];
		
		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// START -->
				// Skrip untuk mengambil value nya
				$cellIterator = $row->getCellIterator();
				$cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
				
				$get = array(); // Valuenya akan di simpan kedalam array,dimulai dari index ke 0
				foreach ($cellIterator as $cell) {
					array_push($get, $cell->getValue()); // Menambahkan value ke variabel array $get
				}
				// <-- END
				
				// Ambil data value yang telah di ambil dan dimasukkan ke variabel $get
				$nis = $get[0]; // Ambil data NIS dari kolom A di csv
				$nisn = $get[1];
				$id_kelas = $get[2];
				$nama_lengkap = $get[3];
				$jk = $get[4];
				$ttl = $get[5];
				$email = $get[6];
				$agama = $get[7];
				$alamat = $get[8];
				$no_hp = $get[9];
				$nama_ayah = $get[10];
				$nama_ibu = $get[11];
				$pekerjaan_ayah = $get[12];
				$pekerjaan_ibu = $get[13];
				$alamat_ortu = $get[14];
				
				// Kita push (add) array data ke variabel data
				array_push($data, [
					'nis'=>$nis, // Insert data nis
					'nisn' => $nisn,
					'id_kelas' => $id_kelas,
					'nama_lengkap'=>$nama_lengkap, // Insert data nama
					'jk'=>$jk, // Insert data jenis kelamin
					'ttl'=>$alamat, // Insert data alamat
					'email' => $email,
					'agama' => $agama,
					'alamat' => $alamat,
					'no_hp' => $no_hp,
					'nama_ayah' => $nama_ayah,
					'nama_ibu' => $nama_ibu,
					'pekerjaan_ayah' => $pekerjaan_ayah,
					'pekerjaan_ibu' => $pekerjaan_ibu,
					'alamat_ortu' => $alamat_ortu
				]);
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->MImportdata->insert_multiple_siswa($data);
		
		redirect("Datasiswa/read"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}
}