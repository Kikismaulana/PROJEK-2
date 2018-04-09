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
                    <div class="col-md-3">
                      <div class="card">
                        <h5 class="card-header bg-light">Pengirim</h5>
                        <div class="card-body">
                          <?php
                            foreach ($dataizin as $row) {
                              if ($row['status']==2) {
                          ?>
                          <div class="form-group">
                            <a href="<?php echo base_url('Datapresensi/readizinsiswa/'); ?><?php echo $row['id_izin'] ?>" class="btn btn-sm btn-success btn-lg text-white col-md-12"><?php echo "Bapak "; echo $row['nama_ayah']; echo " / Ibu "; echo $row['nama_ibu']; ?></a>
                          </div>
                          <?php } else { ?>
                          <div class="form-group">
                            <a href="<?php echo base_url('Datapresensi/readizinsiswa/'); ?><?php echo $row['id_izin'] ?>" class="btn btn-sm btn-warning btn-lg text-white col-md-12"><?php echo "Bapak "; echo $row['nama_ayah']; echo " / Ibu "; echo $row['nama_ibu']; ?></a>
                          </div>
                          <?php } } ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-9">
                      <div class="card">
                        <h5 class="card-header bg-light">Detail</h5>
                        <div class="card-body">
                          <?php
                            foreach ($dataizin as $row) {
                          ?>
                          <table cellpadding="10px" cellpadding="10px" style="font-size: 15px">
                            <tr>
                              <td>NIS</td>
                              <td>:</td>
                              <td><b><?php echo $row['nis']; ?></b></td>
                            </tr>
                            <tr>
                              <td>Nama</td>
                              <td>:</td>
                              <td><b><?php echo $row['nama_lengkap']; ?></b></td>
                            </tr>
                            <tr>
                              <td>Keterangan</td>
                              <td>:</td>
                              <td><b><?php echo $row['keterangan']; ?></b></td>
                            </tr>
                            <tr>
                              <td>Tanggal Izin</td>
                              <td>:</td>
                              <td><b><?php echo $row['tanggal_mulai']; ?></b></td>
                            </tr>
                            <tr>
                              <td>Tanggal Masuk</td>
                              <td>:</td>
                              <td><b><?php echo $row['tanggal_selesai']; ?></b></td>
                            </tr>
                            <tr>
                              <td>Bukti</td>
                              <td>:</td>
                              <td><img class="card-img" src="<?php echo base_url('assets/img/tittle.png'); ?>" alt="Card image"></td>
                            </tr>
                            <tr>
                              <td>Alasan</td>
                              <td>:</td>
                              <td><b><?php echo $row['alasan']; ?></b></td>
                            </tr>
                          </table>
                          <div style="padding: 10px; padding-top: 30px">
                            <a href="#" class="btn btn-sm btn-success">Accept</a>
                            <a href="#" class="btn btn-sm btn-danger">Decline</a>
                          </div>
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
                            <td><h3> : Belum di konfirmasi</h3></td>
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