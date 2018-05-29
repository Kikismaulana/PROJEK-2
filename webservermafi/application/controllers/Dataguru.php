<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataguru extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function read()
	{
		$this->load->model('MIzin');
		$tampildata['dataizin'] = $this->MIzin->read()->result_array();
		$tampildata['jumlah'] = $this->MIzin->jumlahizin()->num_rows();
		$this->load->model('MUser');
        $tampildata['dataadmin'] = $this->MUser->readadmin()->result_array();
		$this->load->model('MGuru');
		$tampildata['data'] = $this->MGuru->read()->result_array();
		$this->load->view('admin/header',$tampildata);
		$this->load->view('admin/dataguru',$tampildata);
		$this->load->view('admin/footer');
	}

	public function create()
	{
		$this->load->model('MGuru');
		$NIP = $this->input->post('NIP');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$jk = $this->input->post('jk');
		$no_hp = $this->input->post('no_hp');
		$alamat = $this->input->post('alamat');
		$data = array (
			'NIP' => $NIP,
			'nama_lengkap' => $nama,
			'email' => $email,
			'jk' => $jk,
			'no_hp' => $no_hp,
			'alamat' => $alamat
		);
		if ($this->MGuru->create($data))
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
		return redirect('Dataguru/read');
	}

	public function update($nip)
	{
		$this->load->model('MGuru');
		$NIP = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$jk = $this->input->post('jk');
		$no_hp = $this->input->post('no_hp');
		$alamat = $this->input->post('alamat');
		$data = array (
			'nip' => $NIP,
			'nama_lengkap' => $nama,
			'email' => $email,
			'jk' => $jk,
			'no_hp' => $no_hp,
			'alamat' => $alamat
		);
		if ($this->MGuru->update($data, $nip)) {
			$this->session->set_flashdata('info', "<div class='alert alert-success alert-dismissible fade show'>
                        Data berhasil diupdate!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>");
		} else {
			$this->session->set_flashdata('info', "<div class='alert alert-danger alert-dismissible fade show'>
                    	Data gagal diupdate!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>");
		}
		return redirect('Dataguru/read');
	}

	public function delete($nip)
	{
		$this->load->model('MGuru');
		if($this->MGuru->delete($nip)){
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
		return redirect('Dataguru/read');
	}

	public function import(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$this->load->model('MGuru');
			$upload = $this->MGuru->upload_file($this->filename);
			
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
						$NIP = $get[0]; // Ambil data NIS dari kolom A di csv
						$nama_lengkap = $get[1];
						$email = $get[2];
						$jk = $get[3];
						$no_hp = $get[4];
						$alamat = $get[5];
						
						// Kita push (add) array data ke variabel data
						array_push($data, [
							'NIP'=>$NIP,
							'nama_lengkap'=>$nama_lengkap,
							'email' => $email,
							'jk'=>$jk,
							'no_hp' => $no_hp,
							'alamat' => $alamat
						]);
					}
					
					$numrow++; // Tambah 1 setiap kali looping
				}

				// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
				$this->MImportdata->insert_multiple_guru($data);

			}else{ // Jika proses upload gagal
				// $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
				$this->session->set_flashdata('info', "<div class='alert alert-danger alert-dismissible fade show'>
                        Silahkan Pilih file terlebih dahulu!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>");
			}
			return redirect("Dataguru/read"); // Redirect ke halaman awal (ke controller siswa fungsi index)
		}
	}

	public function exportdataguru()
	{
	    // Load plugin PHPExcel nya
	    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
	    
	    // Panggil class PHPExcel nya
	    $excel = new PHPExcel();
	    // Settingan awal fil excel
	    $excel->getProperties()->setCreator('M-AFI TEAM')
	                 ->setLastModifiedBy('M-AFI TEAM')
	                 ->setTitle("Data Guru")
	                 ->setSubject("Guru")
	                 ->setDescription("Data Guru")
	                 ->setKeywords("Data Guru");
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
	    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA GURU"); // Set kolom A1 dengan tulisan "DATA guru"
	    $excel->getActiveSheet()->mergeCells('A1:G1'); // Set Merge Cell pada kolom A1 sampai E1
	    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
	    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
	    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
	    // Buat header tabel nya pada baris ke 3
	    $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
	    $excel->setActiveSheetIndex(0)->setCellValue('B3', "NIP"); // Set kolom B3 dengan tulisan "NIS"
	    $excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA LENGKAP"); // Set kolom B3 dengan tulisan "NIS"
	    $excel->setActiveSheetIndex(0)->setCellValue('D3', "JENIS KELAMIN"); // Set kolom B3 dengan tulisan "NIS"
	    $excel->setActiveSheetIndex(0)->setCellValue('E3', "EMAIL"); // Set kolom C3 dengan tulisan "NAMA"
	    $excel->setActiveSheetIndex(0)->setCellValue('F3', "NO. HP"); // Set kolom B3 dengan tulisan "NIS"
	    $excel->setActiveSheetIndex(0)->setCellValue('G3', "ALAMAT"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
	    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
	    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
	    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
	    $this->load->model('MGuru');
	    $guru = $this->MGuru->read()->result();
	    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
	    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
	    foreach($guru as $data){ // Lakukan looping pada variabel guru
	      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
	      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->NIP);
	      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama_lengkap);
	      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->jk);
	      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->email);
	      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->no_hp);
	      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->alamat);

	      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
	      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
	      
	      $no++; // Tambah 1 setiap kali looping
	      $numrow++; // Tambah 1 setiap kali looping
	    }
	    // Set width kolom
	    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
	    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(10); // Set width kolom B
	    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
	    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); // Set width kolom D
	    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(40); // Set width kolom E
	    
	    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
	    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
	    // Set orientasi kertas jadi LANDSCAPE
	    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
	    // Set judul file excel nya
	    $excel->getActiveSheet(0)->setTitle("Data Guru");
	    $excel->setActiveSheetIndex(0);
	    // Proses file excel
	    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	    header('Content-Disposition: attachment; filename="Data Guru.xlsx"'); // Set nama file excel nya
	    header('Cache-Control: max-age=0');
	    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
	    $write->save('php://output');
	  }
}
