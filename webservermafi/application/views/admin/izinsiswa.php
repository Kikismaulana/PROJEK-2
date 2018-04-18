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
                            <a href="<?php echo base_url('Datapresensi/detailizin/'); ?><?php echo $row['id_izin'] ?>" class="btn btn-sm btn-success btn-lg text-white col-md-12"><?php echo "Bapak "; echo $row['nama_ayah']; echo " / Ibu "; echo $row['nama_ibu']; ?></a>
                          </div>
                          <?php } else { ?>
                          <div class="form-group">
                            <a href="<?php echo base_url('Datapresensi/detailizin/'); ?><?php echo $row['id_izin'] ?>" class="btn btn-sm btn-warning btn-lg text-white col-md-12"><?php echo "Bapak "; echo $row['nama_ayah']; echo " / Ibu "; echo $row['nama_ibu']; ?></a>
                          </div>
                          <?php } } ?>
                        </div>
                      </div>
                    </div>