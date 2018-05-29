<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datasiswa extends CI_Controller {

	private $filename = "import_data";

	function __construct(){
		parent::__construct();
	}

	public function read()
	{
		$this->load->model('MIzin');
		$tampildata['dataizin'] = $this->MIzin->read()->result_array();
		$tampildata['jumlah'] = $this->MIzin->jumlahizin()->num_rows();
		$this->load->model('MKelas');
		$tampildata['datakelas'] = $this->MKelas->read()->result_array();
		$this->load->model('MSiswa');
		$tampildata['datasiswa'] = $this->MSiswa->read()->result_array();
		$this->load->model('MUser');
        $tampildata['dataadmin'] = $this->MUser->readadmin()->result_array();
		$this->load->view('admin/header',$tampildata);
		$this->load->view('admin/datasiswa', $tampildata);
		$this->load->view('admin/footer');
	}

	public function create()
	{
		$this->load->model('MSiswa');
		$NIS = $this->input->POST('nis');
		$NISN = $this->input->POST('nisn');
		$id_kelas = $this->input->POST('id_kelas');
		$nama_lengkap = $this->input->POST('nama');
		$jk = $this->input->POST('jk');
		$ttl = $this->input->POST('ttl');
		$email = $this->input->POST('email');
		$agama= $this->input->POST('agama');
		$alamat = $this->input->POST('alamat');
		$no_hp = $this->input->POST('tlp');
		$nama_ayah = $this->input->POST('nama_ayah');
		$nama_ibu = $this->input->POST('nama_ibu');
		$pekerjaan_ayah = $this->input->POST('pekerjaan_ayah');
		$pekerjaan_ibu = $this->input->POST('pekerjaan_ibu');
		$alamat_ortu = $this->input->POST('alamat_ortu');
		$id_kelas = $this->input->POST('id_kelas');
		$data = array(
			'nis' => $NIS,
			'nisn' => $NISN,
			'id_kelas' => $id_kelas,
			'nama_lengkap' => $nama_lengkap,
			'jk' => $jk,
			'ttl' => $ttl,
			'email' => $email,
			'agama' => $agama,
			'alamat' => $alamat,
			'no_hp' => $no_hp,
			'nama_ayah' => $nama_ayah,
			'nama_ibu' => $nama_ibu,
			'pekerjaan_ayah' => $pekerjaan_ayah,
			'pekerjaan_ibu' => $pekerjaan_ibu,
			'alamat_ortu' => $alamat_ortu
		);
		if ($this->MSiswa->create($data))
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
		return redirect('Datasiswa/read');
	}

	public function update($nis)
	{
		$this->load->model('MSiswa');
		$NIS = $this->input->POST('nis');
		$id_kelas = $this->input->POST('id_kelas');
		$nama_lengkap = $this->input->POST('nama');
		$jk = $this->input->POST('jk');
		$ttl = $this->input->POST('ttl');
		$email = $this->input->POST('email');
		$agama= $this->input->POST('agama');
		$alamat = $this->input->POST('alamat');
		$no_hp = $this->input->POST('tlp');
		$nama_ayah = $this->input->POST('nama_ayah');
		$nama_ibu = $this->input->POST('nama_ibu');
		$pekerjaan_ayah = $this->input->POST('pekerjaan_ayah');
		$pekerjaan_ibu = $this->input->POST('pekerjaan_ibu');
		$alamat_ortu = $this->input->POST('alamat_ortu');
		$id_kelas = $this->input->POST('id_kelas');
		$data = array(
			'nis' => $NIS,
			'id_kelas' => $id_kelas,
			'nama_lengkap' => $nama_lengkap,
			'jk' => $jk,
			'ttl' => $ttl,
			'email' => $email,
			'agama' => $agama,
			'alamat' => $alamat,
			'no_hp' => $no_hp,
			'nama_ayah' => $nama_ayah,
			'nama_ibu' => $nama_ibu,
			'pekerjaan_ayah' => $pekerjaan_ayah,
			'pekerjaan_ibu' => $pekerjaan_ibu,
			'alamat_ortu' => $alamat_ortu
		);
		if ($this->MSiswa->update($data,$nis))
		{
			$this->session->set_flashdata('info', "<div class='alert alert-success alert-dismissible fade show'>
                        Data berhasil diupdate!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>");
		}
		else
		{
			$this->session->set_flashdata('info', "<div class='alert alert-danger alert-dismissible fade show'>
                        Data gagal diupdate!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>");
		}
		return redirect('Datasiswa/read');
	}

	public function delete($nis)
	{
		$this->load->model('MSiswa');
		if($this->MSiswa->delete($nis)){
			$this->session->set_flashdata('info', "<div class='alert alert-success alert-dismissible fade show'>
                        Berhasil hapus data!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>");
		} else {
			$this->session->set_flashdata('info', "<div class='alert alert-danger alert-dismissible fade show'>
                        Gagal hapus data!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>");
		}
		return redirect('Datasiswa/read');
	}

	public function import(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$this->load->model('MSiswa');
			$upload = $this->MSiswa->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				
				$csvreader = PHPExcel_IOFactory::createReader('CSV');
				$loadcsv = $csvreader->load('csv/'.$this->filename.'.csv'); // Load file yang tadi diupload ke folder csv
				$sheet = $loadcsv->getActiveSheet()->getRowIterator();
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam csv yang sudha di upload sebelumnya
				$data['sheet'] = $sheet;
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
				$this->MSiswa->insert_multiple_siswa($data);

			}else{ // Jika proses upload gagal
				// $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
				$this->session->set_flashdata('info', "<div class='alert alert-danger alert-dismissible fade show'>
                        Silahkan Pilih file terlebih dahulu!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>");
			}
			return redirect("Datasiswa/read"); // Redirect ke halaman awal (ke controller siswa fungsi index)
		}
	}

	public function exportdatasiswa()
	{
	    // Load plugin PHPExcel nya
	    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
	    
	    // Panggil class PHPExcel nya
	    $excel = new PHPExcel();
	    // Settingan awal fil excel
	    $excel->getProperties()->setCreator('M-AFI TEAM')
	                 ->setLastModifiedBy('M-AFI TEAM')
	                 ->setTitle("Data Siswa")
	                 ->setSubject("siswa")
	                 ->setDescription("Data Siswa")
	                 ->setKeywords("Data Siswa");
	    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
	    $style_col = array(
	      'font' => array('bold' => true), // Set font nya jadi bold
	      'alignment' => array(
	        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	      ),
	      'borders' => array(
	        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
	        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
	        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
	        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	      )
	    );
	    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
	    $style_row = array(
	      'alignment' => array(
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	      ),
	      'borders' => array(
	        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
	        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
	        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
	        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	      )
	    );
	    $excel->setActiveSheetIndex(0)->setCellValue('A1', "Data Siswa"); // Set kolom A1 dengan tulisan "DATA guru"
	    $excel->getActiveSheet()->mergeCells('A1:P1'); // Set Merge Cell pada kolom A1 sampai E1
	    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
	    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
	    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
	    // Buat header tabel nya pada baris ke 3
	    $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
	    $excel->setActiveSheetIndex(0)->setCellValue('B3', "NIS"); // Set kolom B3 dengan tulisan "NIS"
	    $excel->setActiveSheetIndex(0)->setCellValue('C3', "NISN"); // Set kolom B3 dengan tulisan "NIS"
	    $excel->setActiveSheetIndex(0)->setCellValue('D3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
	    $excel->setActiveSheetIndex(0)->setCellValue('E3', "KELAS"); // Set kolom B3 dengan tulisan "NIS"
	    $excel->setActiveSheetIndex(0)->setCellValue('F3', "JENIS KELAMIN"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
	    $excel->setActiveSheetIndex(0)->setCellValue('G3', "TTL"); // Set kolom B3 dengan tulisan "NIS"
	    $excel->setActiveSheetIndex(0)->setCellValue('H3', "AGAMA"); // Set kolom B3 dengan tulisan "NIS"
	    $excel->setActiveSheetIndex(0)->setCellValue('I3', "ALAMAT"); // Set kolom B3 dengan tulisan "NIS"
	    $excel->setActiveSheetIndex(0)->setCellValue('J3', "NO. TELP"); // Set kolom B3 dengan tulisan "NIS"
	    $excel->setActiveSheetIndex(0)->setCellValue('K3', "EMAIL"); // Set kolom B3 dengan tulisan "NIS"
	    $excel->setActiveSheetIndex(0)->setCellValue('L3', "NAMA AYAH"); // Set kolom B3 dengan tulisan "NIS"
	    $excel->setActiveSheetIndex(0)->setCellValue('M3', "NAMA IBU"); // Set kolom B3 dengan tulisan "NIS"
	    $excel->setActiveSheetIndex(0)->setCellValue('N3', "PEKERJAAN AYAH"); // Set kolom B3 dengan tulisan "NIS"
	    $excel->setActiveSheetIndex(0)->setCellValue('O3', "PEKERJAAN IBU"); // Set kolom B3 dengan tulisan "NIS"
	    $excel->setActiveSheetIndex(0)->setCellValue('P3', "ALAMAT ORTU"); // Set kolom E3 dengan tulisan "ALAMAT"
	    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
	    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
	    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
	    $this->load->model('MSiswa');
	    $guru = $this->MSiswa->read()->result();
	    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
	    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
	    foreach($guru as $data){ // Lakukan looping pada variabel guru
	      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
	      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nis);
	      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nisn);
	      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->nama_lengkap);
	      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->nama_kelas);
	      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->jk);
	      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->ttl);
	      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->agama);
	      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->alamat);
	      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->no_hp);
	      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->email);
	      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->nama_ayah);
	      $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->nama_ibu);
	      $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->pekerjaan_ayah);
	      $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->pekerjaan_ibu);
	      $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->alamat_ortu);

	      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
	      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
	      
	      $no++; // Tambah 1 setiap kali looping
	      $numrow++; // Tambah 1 setiap kali looping
	    }
	    // Set width kolom
	    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
	    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(10); // Set width kolom B
	    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(10); // Set width kolom C
	    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
	    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(25); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(10); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(20); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(10); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(30); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(15); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(30); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('L')->setWidth(20); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('M')->setWidth(20); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('N')->setWidth(25); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('O')->setWidth(25); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('P')->setWidth(30); // Set width kolom E
	    
	    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
	    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
	    // Set orientasi kertas jadi LANDSCAPE
	    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
	    // Set judul file excel nya
	    $excel->getActiveSheet(0)->setTitle("Laporan Data Siswa");
	    $excel->setActiveSheetIndex(0);
	    // Proses file excel
	    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	    header('Content-Disposition: attachment; filename="Data Siswa.xlsx"'); // Set nama file excel nya
	    header('Cache-Control: max-age=0');
	    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
	    $write->save('php://output');
	}

}