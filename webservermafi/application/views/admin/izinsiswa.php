      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('Dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active">Data Presensi</li>
            <li class="breadcrumb-item active">Izin Siswa</li>
          </ul>
        </div>
      </div>

      <!--Content-->
      <section class="forms" style="padding-top: 50px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <!-- Conten Header-->
                <div class="card-header d-flex align-items-center">
                  <i class="fa fa-envelope" style="padding-right: 10px"></i><h4>Izin Siswa</h4>
                </div>

                <!-- Conten value-->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="card">
                        <h5 class="card-header bg-light">Pengirim</h5>
                        <div class="card-body">
                          <?php
                            foreach ($dataizin as $row) {
                              if ($row['status'] == 'Accepted' || $row['status'] == 'Decline') {
                          ?>
                          <div class="form-group">
                            <a href="<?php echo base_url('Datapresensi/readdetailizinsiswa/'); ?><?php echo $row['id_izin'] ?>" class="btn btn-sm btn-success btn-lg text-white col-md-12"><?php echo "Bapak "; echo $row['nama_ayah']; echo " / Ibu "; echo $row['nama_ibu']; ?></a>
                          </div>
                          <?php } elseif ($row['status'] == 'Read') { ?>
                          <div class="form-group">
                            <a href="<?php echo base_url('Datapresensi/readdetailizinsiswa/'); ?><?php echo $row['id_izin'] ?>" class="btn btn-sm btn-info btn-lg text-white col-md-12"><?php echo "Bapak "; echo $row['nama_ayah']; echo " / Ibu "; echo $row['nama_ibu']; ?></a>
                          </div>
                          <?php } else { ?>
                          <div class="form-group">
                            <a href="<?php echo base_url('Datapresensi/updatestatusbaca/'); ?><?php echo $row['id_izin'] ?>" class="btn btn-sm btn-warning btn-lg text-white col-md-12"><?php echo "Bapak "; echo $row['nama_ayah']; echo " / Ibu "; echo $row['nama_ibu']; ?></a>
                          </div>
                          <?php } } ?>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-8">
                      <div class="card">
                        <h5 class="card-header bg-light">Detail</h5>
                        <div class="card-body">
                          <!-- Notifikasi -->
                            <?php if ($info = $this->session->flashdata('info')) {
                              echo $info;
                            } ?>
                          <!-- /Notifikasi -->

                          <?php
                            if (isset($datadetailizin['id_izin'])) {
                          ?>
                          <?php if ($datadetailizin['status'] == "Accepted") { ?>
                            <div class="alert alert-success" role="alert">Perizinan Disetujui <i class="fa fa-check-square-o"></i></div>
                          <?php } else { ?>
                            <div class="alert alert-danger" role="alert">Perizinan Ditolak <i class="fa fa-window-close-o"></i></div>
                          <?php }  ?>
                          <table id="izin" cellpadding="10px" cellpadding="10px" style="font-size: 15px">
                            <tr>
                              <td>NIS</td>
                              <td>:</td>
                              <td><b><?php echo $datadetailizin['nis']; ?></b></td>
                            </tr>
                            <tr>
                              <td>Nama</td>
                              <td>:</td>
                              <td><b><?php echo $datadetailizin['nama_lengkap']; ?></b></td>
                            </tr>
                            <tr>
                              <td>Keterangan</td>
                              <td>:</td>
                              <td><b><?php echo $datadetailizin['keterangan']; ?></b></td>
                            </tr>
                            <tr>
                              <td>Tanggal Izin</td>
                              <td>:</td>
                              <td><b><?php echo $datadetailizin['tanggal_mulai']; ?></b></td>
                            </tr>
                            <tr>
                              <td>Tanggal Masuk</td>
                              <td>:</td>
                              <td><b><?php echo $datadetailizin['tanggal_selesai']; ?></b></td>
                            </tr>
                            <tr>
                              <td>Bukti</td>
                              <td>:</td>
                              <td><img class="card-img" src="<?php echo base_url('assets/img/tittle.png'); ?>" style="height: 230px; width: 200px" alt="Card image"></td>
                            </tr>
                            <tr>
                              <td>Alasan</td>
                              <td>:</td>
                              <td><b><?php echo $datadetailizin['alasan']; ?></b></td>
                            </tr>
                          </table>
                            <?php if ($datadetailizin['status'] == '0' || $datadetailizin['status'] == 'Read') { ?>
                            <div style="padding: 10px; padding-top: 30px">
                              <a href="<?php echo base_url('Datapresensi/updatepresensisetuju/'); ?><?php echo $datadetailizin['id_izin'] ?>" class="btn btn-sm btn-success">Accept</a>
                              <a href="<?php echo base_url('Datapresensi/updatepresensitidaksetuju/'); ?><?php echo $datadetailizin['id_izin'] ?>" class="btn btn-sm btn-danger">Decline</a>
                            </div>
                            <?php } ?>
                          <?php } else { ?>
                          <p>Belum ada pesan yang di ambil.</p>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="card">
                        <h5 class="card-header bg-light text-danger">Keterangan : </h5>
                        <div class="card-body">
                          <table cellpadding="10px" cellpadding="10px">
                          <tr>
                            <td width="50px" height="50px" style="background-color: #FFC107"></td>
                            <td><h3> : Belum dibaca</h3></td>
                          </tr>
                          <tr>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td width="50px" height="50px" style="background-color: #17A2B8"></td>
                            <td><h3> : Sudah di baca tetapi belum di konfirmasi</h3></td>
                          </tr>
                          <tr>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td width="50px" height="50px" style="background-color: #28A745"></td>
                            <td><h3> : Sudah di konfirmasi</h3></td>
                          </tr>
                        </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /Conten Header-->