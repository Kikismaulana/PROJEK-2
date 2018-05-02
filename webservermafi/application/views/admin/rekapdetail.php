
      <!--Rekap-->
      <section class="forms" style="padding-top: 50px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <!-- Conten Header-->
                <div class="card-header d-flex align-items-center">
                  <h4>Rekap Absen</h4>
                </div>
                <!-- Conten value-->
                <div class="card-body container-fluid">
                  <div class="form-group">
                    <div class="col-md-5">
                      <p style="color: #000"><b style="font-size: 25px"><?php echo "$tahun"; ?> | </b> <?php echo "$kelas"; ?></p>
                    </div>
                    <div class="form-control col-md-12">

                    <!-- Tahun pertama atau semester 1 -->
                      <div class="card bg-light">
                        <div class="card-body text-center">
                          <h4> <?php echo "$tahun1"; ?> </h4>
                        </div>
                      </div>
                      <div>
                      <table class="table table-responsive table-striped table-bordered table-hover">
                        <?php
                          $k=7;
                          $tp=12;
                        ?>
                        <?php while($k<=$tp){
                          $bulan = date("F", mktime(0, 0, 0, $k, 1, $tahun1));
                        ?>
                        <tr>
                          <td colspan="36" class="text-center alert-info"><?php echo $bulan ?></td>
                        </tr>
                        <tr>
                          <td style="padding-right: 100px" class="alert-success text-center" rowspan="1">Tanggal</td>
                          <?php
                            $jml = cal_days_in_month(CAL_GREGORIAN, $k, $tahun1);
                            $yu=1;
                            while($yu<=$jml)
                              {
                                $kol=1;
                                  if($yu<10)
                                  {
                                    $dty="0$yu";
                                  }
                                  else
                                  {
                                    $dty="$yu";
                                  }
                                  if($k<10)
                                  {
                                    $blnn="0$k";
                                  }
                                  else 
                                  {
                                    $blnn="$k";
                                  }
                                  $tanggul="$dty-$blnn-$tahun1";
                                  if (date("w", mktime(0, 0, 0, $blnn, $dty, $tahun1)) == 0) { ?>
                          <td class="alert-danger" align="center">
                            <?php } else { echo "<td>"; }?>
                            <?php echo $yu; ?>
                          </td>
                          <?php $yu++;} ?>
                          <td class="alert-dark">H</td>
                          <td class="alert-dark">A</td>
                          <td class="alert-dark">I</td>
                          <td class="alert-dark">S</td>
                        </tr>
                        <?php foreach ($datasiswa as $row) { ?>
                        <tr>
                          <td>
                            <?php echo $row['nama_lengkap']; ?>
                          </td>
                          <?php
                            $yu=1;
                            while($yu<=$jml)
                            {
                              if($yu<10)
                              {
                                $dty="0$yu";
                              }
                              else
                              {
                                $dty="$yu";
                              }
                              if($k<10)
                              {
                                $blnn="0$k";
                              }
                              else
                              {
                                $blnn="$k";
                              }
                          ?>
                          <td class="text-center"><?php echo " "; ?></td>
                          <?php $yu++;} ?>
                          <td class="alert-dark"><?php echo $H; ?></td>
                          <td class="alert-dark"><?php echo $A; ?></td>
                          <td class="alert-dark"><?php echo $I; ?></td>
                          <td class="alert-dark"><?php echo $S; ?></td>
                        </tr>
                        <?php } ?>
                        <?php $k++; } ?>
                      </table>
                    <!-- / Tahun pertama atau semester 1 -->

                    <!-- Tahun kedua atau semester 2 -->
                      <div class="card bg-light">
                        <div class="card-body text-center">
                          <h4>
                            <?php echo "$tahun2"; ?>
                          </h4>
                        </div>
                      </div>

                      <table class="table table-responsive table-striped table-bordered table-hover">
                        <?php
                          $k=1;
                          $tp=6;
                        ?>
                        <?php
                          while($k<=$tp)
                          {
                            $bulan = date("F", mktime(0, 0, 0, $k, 1, $tahun2));
                        ?>
                        <tr>
                          <td colspan="36" class="text-center alert-info"><?php echo $bulan  ?></td>
                        </tr>
                        <tr>
                          <td style="padding-right: 100px" class="alert-success text-center" rowspan="1">Tanggal</td>
                          <?php
                            $jml = cal_days_in_month(CAL_GREGORIAN, $k, $tahun2);
                            $yu=1;
                            while($yu<=$jml)
                            {
                              $kol=1;
                              if($yu<10)
                              {
                                $dty="0$yu";
                              }
                              else
                              {
                                $dty="$yu";
                              }
                              if($k<10)
                              {
                                $blnn="0$k";
                              }
                              else
                              {
                                $blnn="$k";
                              }
                              $tanggul="$dty-$blnn-$tahun2";
                              if (date("w", mktime(0, 0, 0, $blnn, $dty, $tahun1)) == 0) { ?>
                          <td class="alert-danger" align="center">
                            <?php } else { echo "<td>"; } ?>
                            <?php echo $yu; ?>
                          </td>
                          <?php $yu++;} ?>
                          <td class="alert-dark">H</td>
                          <td class="alert-dark">A</td>
                          <td class="alert-dark">I</td>
                          <td class="alert-dark">S</td>
                        </tr>
                        <?php foreach ($datasiswa as $row) { ?>
                        <tr>
                          <td>
                            <?php echo $row['nama_lengkap']; ?>
                          </td>
                          <?php 
                            $yu=1;
                            while($yu<=$jml)
                            { 
                              if($yu<10)
                              {
                                $dty="0$yu";
                              }
                              else
                              {
                                $dty="$yu";
                              }
                              if($k<10)
                              {
                                $blnn="0$k";
                              }
                              else
                              {
                                $blnn="$k";
                              }
                          ?>
                          <td class="text-center"><?php echo " "; ?></td>
                          <?php $yu++; } ?>
                          <td class="alert-dark"><?php echo $H; ?></td>
                          <td class="alert-dark"><?php echo $A; ?></td>
                          <td class="alert-dark"><?php echo $I; ?></td>
                          <td class="alert-dark"><?php echo $S; ?></td>
                        </tr>
                        <?php } ?>
                        <?php $k++; } ?>
                      </table>
                    <!-- Tahun kedua atau semester 2 -->

                    <!-- Keterangan -->
                    <div class="card-body">
                      <h4>Keterangan Absensi</h4>
                      <p>A = Tidak Masuk Tanpa Keterangan</p>
                      <p>I = Tidak Masuk Ada Surat Ijin Atau Pemberitahuan</p>
                      <p>S = Tidak Masuk Ada Surat Dokter Atau Pemberitahuan</p>
                      <p>H = Hadir</p>
                      <p class="text-info">Warna merah pada tabel menandakan hari minggu</p>
                    </div>
                    <!-- / Keterangan -->

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /Conten Rekap-->