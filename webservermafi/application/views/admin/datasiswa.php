      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('Dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active">Data Siswa</li>
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
                  <h4>Pilih data yang akan di tampilkan</h4>
                </div>

                <!-- Conten value-->
                <div class="card-body container-fluid">
                  <div class="form-group">

                    <!--Pilih jurusan-->
                    <div class="form-group row">

                      <div class="col-sm-4">
                        <label class="col-sm-12 form-control-label">Pilih Kelas</label>
                        <div class="col-sm-12">
                          <select name="account" class="form-control">
                            <?php foreach ($datakelas as $row) { ?>
                            <option><?php echo $row['nama_kelas']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-sm-3">
                        <div class="col-sm-12" style="padding-top: 30px">
                          <button class="btn btn-info col-sm-12">Lihat data</button>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                <!-- /Conten Header-->

                <!-- Conten Header-->
                <div class="card-header d-flex align-items-center">
                  <h4>Import data</h4>
                </div>

                <!-- Conten value-->
                <div class="card-body container-fluid">
                  <div class="form-group">

                    <!--Pilih jurusan-->
                    <div class="form-group row">

                      <div class="col-sm-4">
                        <label class="col-sm-12 form-control-label">Pilih file <b>.CSV</b></label>
                        <div class="col-sm-12 mb-3">
                          <input type="file" name="file" class="form-control">
                        </div>
                      </div>

                      <div class="col-sm-8">
                        <div class="col-sm-12" style="padding-top: 30px">
                          <button class="btn btn-warning text-white">Import data</button>
                          <button class="btn btn-danger text-white">Get .PDF</button>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                <!-- /Conten Header-->

              </div>
            </div>
          </div>
        </div>
      </section>
      <!--Content-->

      <!--Content-->
      <section class="forms">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">

                <!-- Conten Header-->
                <div class="card-header d-flex align-items-center">
                  <h4>Data siswa</h4>
                </div>

                <!-- Conten value-->
                <div class="card-body container-fluid">
                  <div class="form-group">
                    <div class="form-group row">
                      <div class="col-sm-12 form-group container-fluid" style="padding-bottom: 20px">
                        <!-- Notifikasi -->
                        <?php if ($info = $this->session->flashdata('info')) {
                          echo $info;
                        } ?>
                        <!-- /Notifikasi -->
                        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Tambah data</button>
                      </div>
                      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                          <thead>
                              <tr>
                                  <th width="5%">No.</th>
                                  <th>NIS</th>
                                  <th width="20%">Nama lengkap</th>
                                  <th>Email</th>
                                  <th>Nomor Hp</th>
                                  <th width="40%">Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                              $no = 1;
                              foreach ($datasiswa as $row) {
                            ?>
                              <tr>
                                  <td align="center"><?php echo $no++; ?></td>
                                  <td align="center"><?php echo $row['nis']; ?></td>
                                  <td><?php echo $row['nama_lengkap']; ?></td>
                                  <td><?php echo $row['email']; ?></td>
                                  <td><?php echo $row['no_hp']; ?></td>
                                  <td align="center">
                                    <button class="btn btn-sm btn-info">Details</button>
                                    <button class="btn btn-sm btn-success">Update</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                  </td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                <!-- /Conten Header-->

              </div>
            </div>
          </div>
        </div>
      </section>
      <!--Content-->


                  <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Tambah data siswa</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                        </div>
                        <form method="POST" action="<?php echo base_url('Datasiswa/create'); ?>">
                          <div class="modal-body">
                            <p>Tambah data siswa.</p>

                                <div class="form-group">       
                                  <label>Nama</label>
                                  <input type="text" name="nama" placeholder="Nama" class="form-control" required="">
                                </div>

                                <div class="form-group">
                                  <label>NIS</label>
                                  <input type="text" name="nis" placeholder="NIS" class="form-control" required="">
                                </div>

                                <div class="form-group">
                                  <label>Kelas</label>
                                  <select name="id_kelas" class="form-control" required="" id="id_kelas">
                                      <option class="active">--PILIH KELAS--</option>
                                      <?php foreach ($datakelas as $row) { ?>
                                      <option value="<?php echo $row['id_kelas']; ?>"> <?php echo $row['nama_kelas']; ?></option>
                                      <?php } ?>
                                  </select>
                                </div>

                                <div class="form-group">       
                                  <label>Jenis Kelamin</label>
                                  <div class="radio-inline">
                                    <label>
                                       <input name="jk" type="radio" required="" value="Laki-Laki">Laki-laki
                                    </label>
                                  </div>
                                  <div class="radio-inline">
                                    <label>
                                       <input name="jk" type="radio" required="" value="Perempuan">Perempuan
                                    </label>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label>Tempat, Tanggal Lahir</label>
                                  <input type="text" placeholder="(kota), (tanggal,bulan,tahun)" name="ttl" class="form-control" required="">
                                </div>

                                <div class="form-group">
                                  <label>Agama</label>
                                  <select name="agama" class="form-control" required="">
                                    <option>--PILIH AGAMA--</option>
                                    <option value="ISLAM">ISLAM</option>
                                    <option value="PROTESTAN">PROTESTAN</option>
                                    <option value="KATOLIK">KATOLIK</option>
                                    <option value="HINDU">HINDU</option>
                                    <option value="BUDHA">BUDHA</option>
                                    <option value="KONGHUCU">KONGHUCU</option>
                                  </select>
                                </div>

                                <div class="form-group">       
                                  <label>Alamat</label>
                                  <textarea class="form-control" name="alamat"></textarea>
                                </div>
                            
                                <div class="form-group">
                                  <label>No. Telep</label>
                                  <input type="text" class="form-control" placeholder="No Telepon" name="tlp" required="">
                                </div>

                                <div class="form-group">
                                  <label>Email</label>
                                  <input type="email" name="email" placeholder="email" class="form-control" required="">
                                </div>

                                <div class="form-group">       
                                  <label>Nama Ayah</label>
                                  <input type="text" name="nama_ayah" placeholder="Nama Ayah" class="form-control" required="">
                                </div>

                                <div class="form-group">       
                                  <label>Nama Ibu</label>
                                  <input type="text" name="nama_ibu" placeholder="Nama Ibu" class="form-control" required="">
                                </div>

                                <div class="form-group">       
                                  <label>Pekerjaan Ayah</label>
                                  <input type="text" name="pekerjaan_ayah" placeholder="Pekerjaan" class="form-control" required="">
                                </div>

                                <div class="form-group">       
                                  <label>Pekerjaan Ibu</label>
                                  <input type="text" name="pekerjaan_ibu" placeholder="Pekerjaan" class="form-control" required="">
                                </div>

                                <div class="form-group">       
                                  <label>Alamat Orangtua</label>
                                  <textarea class="form-control" name="alamat_ortu"></textarea>
                                </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" data-dismiss="modal" class="btn btn-secondary">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>