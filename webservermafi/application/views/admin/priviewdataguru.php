<?php
	if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form 
		if(isset($upload_error)){ // Jika proses upload gagal
			echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
			die; // stop skrip
		}
		
		// Buat sebuah tag form untuk proses import data ke database
		echo "<form method='post' action='".base_url("Importdataguru/import")."'>";
		
		// Buat sebuah div untuk alert validasi kosong
		// echo "<div style='color: red;' id='kosong'>
		// Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum terisi semua.
		// </div>";
		
		echo "<table border='1' cellpadding='8'>
		<tr>
			<th colspan='15'>Preview Data</th>
		</tr>
		<tr>
			<th>NIP</th>
			<th>Nama Lengkap</th>
			<th>Email</th>
			<th>Jenis Kelamin</th>
			<th>No. Hp</th>
			<th>Alamat</th>
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
				$NIP = $get[0]; // Ambil data NIS dari kolom A di csv
				$nama_lengkap = $get[1];
				$email = $get[2];
				$jk = $get[3];
				$no_hp = $get[4];
				$alamat = $get[5];
			
			// Cek jika semua data tidak diisi
			if(empty($NIP) && empty($nama_lengkap) && empty($jk) && empty($alamat))
				continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
			
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Validasi apakah semua data telah diisi$nis = $get[0]; // Ambil data NIS dari kolom A di csv
				$nip_td = ( ! empty($NIP))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
				$nama_lengkap_td = ( ! empty($nama_lengkap))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
				$email_td = ( ! empty($email))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
				$jk_td = ( ! empty($jk))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
				$no_hp_td = ( ! empty($no_hp))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
				$alamat_td = ( ! empty($alamat))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
				
				// Jika salah satu data ada yang kosong
				if(empty($nis) or empty($nama_lengkap) or empty($jk) or empty($alamat)){
					$kosong++; // Tambah 1 variabel $kosong
				}
				
				echo "<tr>";
				echo "<td".$nip_td.">".$NIP."</td>";
				echo "<td".$nama_lengkap_td.">".$nama_lengkap."</td>";
				echo "<td".$email_td.">".$email."</td>";
				echo "<td".$jk_td.">".$jk."</td>";
				echo "<td".$no_hp_td.">".$no_hp."</td>";
				echo "<td".$alamat_td.">".$alamat."</td>";
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
			echo "<a href='".base_url("Dataguru/read")."'>Cancel</a>";
		
		
		echo "</form>";
	}
	?>