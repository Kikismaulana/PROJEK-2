
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

                      <div class="form-group">
                        <div class="row">

                          <h5 class="col-md-3">Tahun</h5>
                          <h5 class="col-md-9">Bulan</h5>

                          <!-- DROP DOWN PILIH TAHUN -->
                          <div class="col-md-3">
                            <form method="get" action="<?php echo base_url('Datapresensi/rekapdetail?tahun=')?><?php echo $tahun1 ?><?php echo '-' ?> <?php echo $tahun2 ?><?php echo '&kelas_new=' ?><?php echo $kelas ?><?php echo '&id_kelas=' ?><?php echo $id_kelas ?>">
                              <input type="hidden" name="tahun" value="<?php echo $tahun1 ?><?php echo '-' ?><?php echo $tahun2 ?>">
                              <input type="hidden" name="kelas_new" value="<?php echo $kelas ?>">
                              <input type="hidden" name="id_kelas" value="<?php echo $id_kelas ?>">
                              <select name="ambil" class="form-control" onchange="this.form.submit()">
                                <?php if ($ambil == $tahun2) { ?>
                                  <option value="<?php echo "$tahun1"; ?>"><?php echo "$tahun1"; ?></option>
                                  <option selected="" value="<?php echo "$tahun2"; ?>"><?php echo "$tahun2"; ?></option>
                                <?php } else { ?>
                                  <option selected="" value="<?php echo "$tahun1"; ?>"><?php echo "$tahun1"; ?></option>
                                  <option value="<?php echo "$tahun2"; ?>"><?php echo "$tahun2"; ?></option>
                                <?php } ?>
                              </select>
                            </form>
                          </div>
                          <!-- /DROP DOWN PILIH TAHUN -->

                          <!-- DROP DOWN PILIH BULAN -->
                          <?php if (!isset($_GET['ambil']) || $_GET['ambil']==$tahun1) { ?>
                            <div class="col-md-5">
                              <form method="get" action="<?php echo base_url('Datapresensi/rekapdetail?tahun=')?><?php echo $tahun1 ?><?php echo '-' ?> <?php echo $tahun2 ?><?php echo '&kelas_new=' ?><?php echo $kelas ?><?php echo '&id_kelas=' ?><?php echo $id_kelas ?><?php echo '&ambil=' ?><?php echo $ambil ?>">
                                <input type="hidden" name="tahun" value="<?php echo $tahun1 ?><?php echo '-' ?><?php echo $tahun2 ?>">
                                <input type="hidden" name="kelas_new" value="<?php echo $kelas ?>">
                                <input type="hidden" name="id_kelas" value="<?php echo $id_kelas ?>">
                                <input type="hidden" name="ambil" value="<?php echo "2017"; ?>">
                                <select name="bulan" class="form-control" onchange="this.form.submit()">
                                  <?php if ((!isset($_GET['bulan']))||($_GET['bulan']==7)) { ?>
                                    <option selected="" value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                  <?php } elseif ($_GET['bulan']==8) { ?>
                                    <option value="7">July</option>
                                    <option selected="" value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                  <?php } elseif ($_GET['bulan']==9) { ?>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option selected="" value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                  <?php } elseif ($_GET['bulan']==10) { ?>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option selected="" value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                  <?php } elseif ($_GET['bulan']==11) { ?>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option selected="" value="11">November</option>
                                    <option value="12">December</option>
                                  <?php } elseif ($_GET['bulan']==12) { ?>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option selected="" value="11">November</option>
                                    <option value="12">December</option>
                                  <?php } ?>
                                </select>
                              </form>
                            </div>
                          <?php } elseif ($_GET['ambil']==$tahun2) { ?>
                            <div class="col-md-5">
                              <form method="get" action="<?php echo base_url('Datapresensi/rekapdetail?tahun=')?><?php echo $tahun1 ?><?php echo '-' ?> <?php echo $tahun2 ?><?php echo '&kelas_new=' ?><?php echo $kelas ?><?php echo '&id_kelas=' ?><?php echo $id_kelas ?><?php echo '&ambil=' ?><?php echo $ambil ?>">
                                <input type="hidden" name="tahun" value="<?php echo $tahun1 ?><?php echo '-' ?><?php echo $tahun2 ?>">
                                <input type="hidden" name="kelas_new" value="<?php echo $kelas ?>">
                                <input type="hidden" name="id_kelas" value="<?php echo $id_kelas ?>">
                                <input type="hidden" name="ambil" value="<?php echo $ambil ?>">
                                <select name="bulan" class="form-control" onchange="this.form.submit()">
                                  <?php if ((!isset($_GET['bulan']))||($_GET['bulan']==1)) { ?>
                                    <option selected="" value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                  <?php } elseif ($_GET['bulan']==2) { ?>
                                    <option value="1">January</option>
                                    <option selected="" value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                  <?php } elseif ($_GET['bulan']==3) { ?>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option selected="" value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                  <?php } elseif ($_GET['bulan']==4) { ?>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option selected="" value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                  <?php } elseif ($_GET['bulan']==5) { ?>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option selected="" value="5">May</option>
                                    <option value="6">June</option>
                                  <?php } elseif ($_GET['bulan']==6) { ?>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option selected="" value="6">June</option>
                                  <?php } ?>
                                </select>
                              </form>
                            </div>
                          <?php } ?>

                        </div>
                      </div>
                      <!-- /DROP DOWN PILIH BULAN -->

                    <!-- Tahun pertama atau semester 1 -->
                      <div class="card bg-light">
                        <div class="card-body text-center">
                          <?php if ((!isset($_GET['ambil'])) || ($_GET['ambil']==$tahun1)) { ?>
                            <h4> <?php echo "$tahun1"; ?> </h4>
                          <?php } else { ?>
                            <h4> <?php echo "$tahun2"; ?> </h4>
                          <?php } ?>
                        </div>
                      </div>
                      <div>

                      <table class="table table-responsive table-striped table-bordered table-hover">
                        <?php
                          if ((!isset($_GET['ambil'])) || ($_GET['ambil']==$tahun1)) {
                            $ambil = $tahun1;
                          } else {
                            $ambil = $tahun2;
                          }
                          if (isset($_GET['bulan'])) {
                            $pilihanbulan = $_GET['bulan'];
                          } elseif((!isset($_GET['ambil'])) || ($_GET['ambil']==$tahun1)) {
                            $pilihanbulan = 7;
                          } else {
                            $pilihanbulan = 1;
                          }
                          
                          $bulan = date("F", mktime(0, 0, 0, $pilihanbulan, 1, $ambil));
                        ?>
                        <tr>
                          <td colspan="36" class="text-center alert-info"><?php echo $bulan ?></td>
                        </tr>
                        <tr>
                          <td style="padding-right: 200px" class="alert-success text-center" rowspan="1">Tanggal</td>
                          <?php
                            $jml = cal_days_in_month(CAL_GREGORIAN, $pilihanbulan, $ambil);
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
                                  if($pilihanbulan<10)
                                  {
                                    $blnn="0$pilihanbulan";
                                  }
                                  else 
                                  {
                                    $blnn="$pilihanbulan";
                                  }
                                  $tanggul="$dty-$blnn-$ambil";
                                  if (date("w", mktime(0, 0, 0, $blnn, $dty, $ambil)) == 0) { ?>
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
                              if($pilihanbulan<10)
                              {
                                $blnn="0$pilihanbulan";
                              }
                              else
                              {
                                $blnn="$pilihanbulan";
                              }
                              $tanggal="$ambil-$blnn-$dty";
                              // TERPAKSA NATIVE KARENA AGAK RUMIT
                              $con = mysqli_connect('localhost','root','','mafi');
                              $sqla = mysqli_query($con,"SELECT * FROM presensi where nis='$row[nis]' AND tanggal='$tanggal'");
                              $isiabsen=mysqli_fetch_array($sqla);
                              $jumlahsakit = mysqli_query($con,"SELECT * FROM presensi where nis='$row[nis]' AND presensi='Sakit'");
                              $sqls = mysqli_num_rows($jumlahsakit);
                              $jumlahizin = mysqli_query($con,"SELECT * FROM presensi where nis='$row[nis]' AND presensi='Izin'");
                              $sqli = mysqli_num_rows($jumlahizin);
                              $jumlahhadir = mysqli_query($con,"SELECT * FROM presensi where nis='$row[nis]' AND presensi='Hadir'");
                              $sqlh = mysqli_num_rows($jumlahhadir);
                              $jumlahtidakhadir = mysqli_query($con,"SELECT * FROM presensi where nis='$row[nis]' AND presensi='Tidak Hadir'");
                              $sqlth = mysqli_num_rows($jumlahtidakhadir);
                              // TERPAKSA NATIVE KARENA AGAK RUMIT
                          ?>
                          <td class="text-center">
                            <?php
                              if ($isiabsen['presensi']=='Hadir') {
                                echo "H";
                              } elseif ($isiabsen['presensi']=='Tidak Hadir') {
                                echo "A";
                              } elseif ($isiabsen['presensi']=='Sakit') {
                                echo "S";
                              } elseif ($isiabsen['presensi']=='Izin') {
                                echo "I";
                              }
                            ?>
                          </td>
                          <?php $yu++;} ?>
                          <td class="alert-dark"><?php echo $sqlh; ?></td>
                          <td class="alert-dark"><?php echo $sqlth; ?></td>
                          <td class="alert-dark"><?php echo $sqli; ?></td>
                          <td class="alert-dark"><?php echo $sqls; ?></td>
                        </tr>
                        <?php } ?>
                      </table>
                    <!-- / Tahun pertama atau semester 1 -->

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