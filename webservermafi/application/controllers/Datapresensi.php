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
		$this->load->model('MKelas');
		$tampildata['datakelas'] = $this->MKelas->read()->result_array();
		$this->load->view('admin/header',$tampildata);
		$this->load->view('admin/rekapabsen');
		$this->load->view('admin/footer');
	}

	public function rekapdetail()
	{
		$tahun = $this->input->get('tahun');
		$kelas = $this->input->get('id_kelas');
		$nama_kelas = $this->input->get('kelas_new');
		$pecah = explode("-", $tahun);
		$year2=$pecah[0];
		$year3=$pecah[1];
		$tampildata['id_kelas'] = $kelas;
		$tampildata['kelas'] = $nama_kelas;
		$tampildata['tahun1'] = $year2;
		$tampildata['tahun2'] = $year3;
		$tampildata['tahun'] = $tahun;
		$ambil = $this->input->get('ambil');
		// echo "$kelas";
		// echo "$nama_kelas";
		// echo "$year2 - $year3";
		$this->load->model('MUser');
		$tampildata['dataadmin'] = $this->MUser->readadmin()->result_array();
		$this->load->model('MIzin');
		$tampildata['dataizin'] = $this->MIzin->read()->result_array();
		$tampildata['jumlah'] = $this->MIzin->jumlahizin()->num_rows();
		$tampildata['tahun'] = $tahun;
		$this->load->model('MPresensi');
		$tampildata['presensi'] = $this->MPresensi->read()->result_array();
		$tampildata['H'] = $this->MPresensi->readjumlahhadir()->num_rows();
		$tampildata['A'] = $this->MPresensi->readjumlahtidakhadir()->num_rows();
		$tampildata['I'] = $this->MPresensi->readjumlahizin()->num_rows();
		$tampildata['S'] = $this->MPresensi->readjumlahsakit()->num_rows();
		$this->load->model('MKelas');
		$tampildata['datakelas'] = $this->MKelas->read()->result_array();
		$this->load->model('MSiswa');
		$tampildata['datasiswa'] = $this->MSiswa->read()->result_array();
		$this->load->view('admin/header',$tampildata);
		$this->load->view('admin/rekapabsen',$tampildata);
		// $this->load->view('admin/rekapdetail', $tampildata);
		if (($ambil == $year2)||($ambil == null)) {
			$this->load->view('admin/rekapdetail', $tampildata);
		} elseif($ambil == $year3) {
			$this->load->view('admin/rekapdetail2', $tampildata);
		}
		$this->load->view('admin/pagingtahun', $tampildata);
		$this->load->view('admin/keteranganrekapdetail', $tampildata);
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

	// public function create()
	// {
	// 	$conn = mysqli_connect('localhost','root','','ci3_fingerprint');

	// 	$IP  = "192.168.1.201";
	// 	$Key = "0";

	// 	$Connect = fsockopen($IP, "80", $errno, $errstr, 1);
	// 	if ($Connect) {
	// 	  $soap_request = "<GetAttLog>
	// 	    <ArgComKey xsi:type=\"xsd:integer\">".$Key."</ArgComKey>
	// 	    <Arg><PIN xsi:type=\"xsd:integer\">All</PIN></Arg>
	// 	  </GetAttLog>";

	// 	  $newLine = "\r\n";
	// 	  fputs($Connect, "POST /iWsService HTTP/1.0".$newLine);
	// 	  fputs($Connect, "Content-Type: text/xml".$newLine);
	// 	  fputs($Connect, "Content-Length: ".strlen($soap_request).$newLine.$newLine);
	// 	  fputs($Connect, $soap_request.$newLine);
	// 	  $buffer = "";
	// 	  while($Response = fgets($Connect, 1024)) {
	// 	    $buffer = $buffer.$Response;
	// 	  }
	// 	} else echo "Koneksi Gagal";

	// 	function Parse_Data ($data,$p1,$p2) {
	// 	  $data = " ".$data;
	// 	  $hasil = "";
	// 	  $awal = strpos($data,$p1);
	// 	  if ($awal != "") {
	// 	    $akhir = strpos(strstr($data,$p1),$p2);
	// 	    if ($akhir != ""){
	// 	      $hasil=substr($data,$awal+strlen($p1),$akhir-strlen($p1));
	// 	    }
	// 	  }
	// 	  return $hasil;    
	// 	}

	// 	$buffer = Parse_Data($buffer,"<GetAttLogResponse>","</GetAttLogResponse>");
	// 	$buffer = explode("\r\n",$buffer);

	// 	for ($a=1; $a<count($buffer)-1; $a++) {
	// 	  $data=Parse_Data($buffer[$a],"<Row>","</Row>");

	// 	  $export[$a]['pin'] = Parse_Data($data,"<PIN>","</PIN>");
	// 	  $export[$a]['waktu'] = Parse_Data($data,"<DateTime>","</DateTime>");
	// 	  $export[$a]['status'] = Parse_Data($data,"<Status>","</Status>");
	// 	}

	// 	echo '<pre>';
	// 	// print_r($export);
	// 	// end($export);
	// 	// // echo "<div style='background-color:#000000'><p style='color:#FFFFFF'>";
	// 	// // $ab=prev($export);
	// 	// $ac=prev($export);
	// 	// // print_r($ab);
	// 	// // echo "</p></div>";
	// 	// print_r($ac);
	// 	if (isset($export)) {
	// 	  $a = end($export);
	// 	  // $insert = mysqli_query ($conn, "INSERT INTO data_absen (pin,date_time,status) values ('$a[pin]','$a[waktu]','$a[status]')");
	// 	  $query = mysqli_query($conn, "SELECT * FROM data_absen WHERE date_time = '$a[waktu]' AND pin = '$a[pin]' ");
	// 	  $hasil = mysqli_num_rows($query);
	// 	  // while ($hasil == 0) {
	// 	  // 	$insert = mysqli_query ($conn, "INSERT INTO data_absen (pin,date_time,status) values ('$a[pin]','$a[waktu]','$a[status]')");
	// 	  // }
	// 	  if ($hasil == 0) {
	// 	  	if ($a['status']==0) {
	// 	  		$insert = mysqli_query ($conn, "INSERT INTO data_absen (pin,date_time,status) values ('$a[pin]','$a[waktu]','Masuk')");
	// 	  	} else {
	// 	  		$insert = mysqli_query ($conn, "INSERT INTO data_absen (pin,date_time,status) values ('$a[pin]','$a[waktu]','Pulang')");
	// 	  	}
	// 	  }
	// 	//   prev($export);
	// 	  // echo $hasil;
	// 	}

	// 	// // $sebelumnya = prev($export);
	// 	// print_r($masuk);

	// 	// $cari = mysqli_query($conn, "SELECT * FROM data_absen WHERE date_time = '$masuk[waktu]'");
	// 	// $hasil = mysqli_num_rows($cari);
	// 	// echo "$hasil";
	// 	// foreach ($export as $row) {
	// 	//   $query = mysqli_query($conn, "INSERT INTO data_absen (pin,date_time,status) values ('$row[pin]','$row[waktu]','$row[status]')");  
	// 	// }


	// 	// $query = mysqli_query($conn, "INSERT INTO data_absen (pin,date_time,status) values ('$masuk[pin]','$masuk[waktu]','$masuk[status]')");
	// 	// $query = mysqli_query($conn, "SELECT * FROM data_absen");
	// 	// $result =  mysqli_fetch_array($query);

	// 	// foreach ($query as $key) {
	// 	//   echo $key['id']; echo '<br>';
	// 	// }
	// }

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

	// public function delete()
	// {
		
	// }
}
