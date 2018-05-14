<?php
	if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form 
		if(isset($upload_error)){ // Jika proses upload gagal
			echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
			die; // stop skrip
		}
		
		// Buat sebuah tag form untuk proses import data ke database
		echo "<form method='post' action='".base_url("Importdata/import")."'>";
		
		// Buat sebuah div untuk alert validasi kosong
		// echo "<div style='color: red;' id='kosong'>
		// Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum terisi semua.
		// </div>";
		
		echo "<table border='1' cellpadding='8'>
		<tr>
			<th colspan='15'>Preview Data</th>
		</tr>
		<tr>
			<th>NIS</th>
			<th>NISN</th>
			<th>id_kelas</th>
			<th>Nama Lengkap</th>
			<th>Jenis Kelamin</th>
			<th>TTL</th>
			<th>Email</th>
			<th>Agama</th>
			<th>Alamat</th>
			<th>No. Hp</th>
			<th>Nama Ayah</th>
			<th>Nama Ibu</th>
			<th>Pekerjaan Ayah</th>
			<th>Pekerjaan Ibu</th>
			<th>Alamat Ortu</th>
		</tr>";
		
		$numrow = 1;
		$kosong = 0;
		
		// Lakukan perulangan dari data yang ada di csv
		// $sheet adalah variabel yang dikirim dari controller
		foreach($sheet as $row){ 
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
			
			// Cek jika semua data tidak diisi
			if(empty($nis) && empty($nama_lengkap) && empty($jk) && empty($alamat))
				continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
			
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Validasi apakah semua data telah diisi$nis = $get[0]; // Ambil data NIS dari kolom A di csv
				$nis_td = ( ! empty($nis))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
				$nisn_td = ( ! empty($nisn))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
				$id_kelas_td = ( ! empty($id_kelas))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
				$nama_lengkap_td = ( ! empty($nama_lengkap))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
				$jk_td = ( ! empty($jk))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
				$ttl_td = ( ! empty($ttl))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
				$email_td = ( ! empty($email))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
				$agama_td = ( ! empty($agama))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
				$alamat_td = ( ! empty($alamat))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
				$no_hp_td = ( ! empty($no_hp))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
				$nama_ayah_td = ( ! empty($nama_ayah))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
				$nama_ibu_td = ( ! empty($nama_ibu))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
				$pekerjaan_ayah_td = ( ! empty($pekerjaan_ayah))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
				$pekerjaan_ibu_td = ( ! empty($pekerjaan_ibu))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
				$alamat_ortu_td = ( ! empty($alamat_ortu))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
				
				// Jika salah satu data ada yang kosong
				if(empty($nis) or empty($nama_lengkap) or empty($jk) or empty($alamat)){
					$kosong++; // Tambah 1 variabel $kosong
				}
				
				echo "<tr>";
				echo "<td".$nis_td.">".$nis."</td>";
				echo "<td".$nisn_td.">".$nisn."</td>";
				echo "<td".$id_kelas_td.">".$id_kelas."</td>";
				echo "<td".$nama_lengkap_td.">".$nama_lengkap."</td>";
				echo "<td".$jk_td.">".$jk."</td>";
				echo "<td".$ttl_td.">".$ttl."</td>";
				echo "<td".$email_td.">".$email."</td>";
				echo "<td".$agama_td.">".$agama."</td>";
				echo "<td".$alamat_td.">".$alamat."</td>";
				echo "<td".$no_hp_td.">".$no_hp."</td>";
				echo "<td".$nama_ayah_td.">".$nama_ayah."</td>";
				echo "<td".$nama_ibu_td.">".$nama_ibu."</td>";
				echo "<td".$pekerjaan_ayah_td.">".$pekerjaan_ayah."</td>";
				echo "<td".$pekerjaan_ibu_td.">".$pekerjaan_ibu."</td>";
				echo "<td".$alamat_ortu_td.">".$alamat_ortu."</td>";
				echo "</tr>";
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}
		
		echo "</table>";
		
		// Cek apakah variabel kosong lebih dari 1
		// Jika lebih dari 1, berarti ada data yang masih kosong
		if($kosong > 1){
		?>	
			<script>
			$(document).ready(function(){
				// Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
				$("#jumlah_kosong").html('<?php echo $kosong; ?>');
				
				$("#kosong").show(); // Munculkan alert validasi kosong
			});
			</script>
		<?php
		} // Jika semua data sudah diisi
			echo "<hr>";
			
			// Buat sebuah tombol untuk mengimport data ke database
			echo "<button type='submit' name='import'>Import</button> ";
			echo "<a href='".base_url("Datasiswa/read")."'>Cancel</a>";
		
		
		echo "</form>";
	}
	?>