      <!-- Counts Section -->
      <section class="dashboard-counts section-padding">
        <div class="container-fluid">
          <!-- Notifikasi -->
            <?php if ($info = $this->session->flashdata('info')) {
              echo $info;
            } ?>
          <!-- /Notifikasi -->
          <div class="row">
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-user"></i></div>
                <div class="name text-black"><div style="font-size: 14px"><?php echo anchor('Datasiswa/read', 'Data Siswa', ['class'=>'text-uppercase']) ?></div><span>Jumlah</span>
                </div>
              </div>
              <div class="count-number text-center"><?php echo "$datasiswa"; ?></div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-user"></i></div>
                <div class="name text-black"><div style="font-size: 14px"><?php echo anchor('Dataguru/read', 'Data Guru', ['class'=>'text-uppercase']) ?></div><span>Jumlah</span>
                </div>
              </div>
              <div class="count-number text-center"><?php echo "$dataguru"; ?></div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-user"></i></div>
                <div class="name text-black"><div style="font-size: 14px"><?php echo anchor('Datauser/readuserguru', 'Data User', ['class'=>'text-uppercase']) ?></div><span>Jumlah</span>
                </div>
              </div>
              <div class="count-number text-center"><?php $jumlahuser = $datauser - 1; echo "$jumlahuser"; ?></div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-home"></i></div>
                <div class="name text-black"><div style="font-size: 14px"><?php echo anchor('Datakelas', 'Data Kelas', ['class'=>'text-uppercase']) ?></div><span>Jumlah</span>
                </div>
              </div>
              <div class="count-number text-center"><?php echo "$datakelas"; ?></div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-home"></i></div>
                <div class="name text-black"><div style="font-size: 13px"><?php echo anchor('Datajurusan', 'Data Jurusan', ['class'=>'text-uppercase']) ?></div><span>Jumlah</span>
                </div>
              </div>
              <div class="count-number text-center"><?php echo "$datajurusan"; ?></div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-bill"></i></div>
                <div class="name text-black"><div style="font-size: 12px"><?php echo anchor('Datapresensi/readrekap', 'Rekap Presensi', ['class'=>'text-uppercase']) ?></div><span>Jumlah</span>
                </div>
              </div>
              <div class="count-number text-center">-</div>
            </div>
          </div>
        </div>
      </section>

      <div class="col-md-12">
        <div class="text-center">
          <a target="_blank" class="btn btn-success" href="<?php echo base_url('Datapresensi/modeabsensi') ?>"><b>NYALAKAN MODE ABSENSI !</b></a>
        </div>
      </div>