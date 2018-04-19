      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('Dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active">Data Guru </li>
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
                  <h4>Data Guru</h4>
                </div>

                <!-- Conten value-->
                <div class="card-body container-fluid">
                  <div class="form-group">

                    <!--Pilih jurusan-->
                    <div class="form-group row">

                      <div class="col-sm-12 form-group container-fluid" style="padding-bottom: 20px">
                        <!-- Notifikasi -->
                        <?php if ($info = $this->session->flashdata('info')) {
                          echo $info;
                        } ?>
                        <!-- /Notifikasi -->
                        <div class="form-group">
                          <input type="file" name="file" class="form-control"  style="width: 32%">
                        </div>
                        <div class="form-group">
                          <button class="btn btn-warning text-white">Import data</button>
                          <button class="btn btn-danger text-white">Get .PDF</button>
                          <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Tambah data</button>
                        </div>
                      </div>

                      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIP</th>
                                <th>Nama lengkap</th>
                                <th>Email</th>
                                <th>Nomor Hp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no = 1;
                            foreach ($data as $row) {
                          ?>
                            <tr>
                                <td width="5%" align="center"><?php echo $no++; ?></td>
                                <td align="center"><?php echo $row['nip']; ?></td>
                                <td><?php echo $row['nama_lengkap']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td align="center"><?php echo $row['no_hp']; ?></td>
                                <td align="center">
                                  <a class="btn btn-sm btn-info text-white" data-toggle="modal" data-target="#modal_detail<?php echo $row['nip'];?>">Details</a>
                                  <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_update<?php echo $row['nip'];?>">Update</button>
                                  <a data-toggle="modal" data-target="#modal_konfirmasidelete<?php echo $row['nip'];?>" class="btn btn-sm btn-danger text-white">Delete</a>
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
                  <!-- ============ MODAL TAMBAH GURU =============== -->
                  <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Tambah data guru</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                        </div>
                        <form method="POST" action="<?php echo base_url('Dataguru/create'); ?>">
                          <div class="modal-body">
                            <div class="form-group">
                              <label>NIP</label>
                              <input type="text" name="nip" placeholder="NIP" class="form-control">
                            </div>
                            <div class="form-group">       
                              <label>Nama</label>
                              <input type="text" name="nama" placeholder="Nama" class="form-control">
                            </div>
                            <div class="form-group">       
                              <label>Email</label>
                              <input type="email" name="email" placeholder="Email" class="form-control">
                            </div>
                            <div class="form-group">       
                              <label>Jenis Kelamin</label>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="jk" value="Laki-laki">Laki-laki
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="jk" value="Perempuan">Perempuan
                                </label>
                              </div>
                            </div>
                            <div class="form-group">       
                              <label>No Hp.</label>
                              <input type="text" name="no_hp" placeholder="No Hp." class="form-control">
                            </div>
                            <div class="form-group">       
                              <label>Alamat</label>
                              <textarea class="form-control" name="alamat"></textarea>
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
                  <!-- ============ /MODAL TAMBAH GURU =============== -->

                  <!-- ============ MODAL KONFIRMASI DELETE GURU =============== -->
                  <?php 
                  foreach($data as $row) {
                  ?>
                  <div class="modal fade" id="modal_konfirmasidelete<?php echo $row['nip'];?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                      <div class="modal-dialog">
                      <div class="modal-content">
                      <div class="modal-header">
                          <h3 class="modal-title" id="myModalLabel">Delete Jurusan</h3>
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                      </div>
                      <form class="form-horizontal" method="post" action="<?php echo base_url('Dataguru/delete/');?><?php echo $row['nip'] ?>">
                          <div class="modal-body">

                              <div class="form-group">
                                  <label class="control-label col-xs-3" >Apakah anda yakin ingin menghapus data guru <b> <?php echo $row['nama_lengkap']; ?> ? </b></label>
                              </div>

                          </div>

                          <div class="modal-footer">
                              <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
                              <button class="btn btn-danger"> Ya </button>
                          </div>
                      </form>
                      </div>
                      </div>
                  </div>

                  <?php }?>
                <!--END MODAL KONFIRMASI DELETE GURU-->

                <!-- ============ MODAL DETAIL GURU =============== -->
                  <?php 
                    foreach($data as $row) {
                  ?>
                  <div id="modal_detail<?php echo $row['nip'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Tambah data guru</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                        </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label>NIP</label>
                              <input type="text" name="nip" placeholder="NIP" class="form-control" value="<?php echo $row['nip'] ?>" disabled="">
                            </div>
                            <div class="form-group">       
                              <label>Nama</label>
                              <input type="text" name="nama" placeholder="Nama" class="form-control" value="<?php echo $row['nama_lengkap'] ?>" disabled="">
                            </div>
                            <div class="form-group">       
                              <label>Email</label>
                              <input type="email" name="email" placeholder="Email" class="form-control" value="<?php echo $row['email'] ?>" disabled="">
                            </div>
                            <div class="form-group">       
                              <label>Jenis Kelamin</label>
                              <input type="text" name="jk" class="form-control" value="<?php echo $row['jk'] ?>" disabled="">
                            </div>
                            <div class="form-group">       
                              <label>No Hp.</label>
                              <input type="text" name="no_hp" placeholder="No Hp." class="form-control" value="<?php echo $row['no_hp'] ?>" disabled="">
                            </div>
                            <div class="form-group">       
                              <label>Alamat</label>
                              <input class="form-control" name="alamat" disabled="" value="<?php echo $row['alamat'] ?>">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" data-dismiss="modal" class="btn btn-secondary">Close</button>
                          </div>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                  <!-- ============ / MODAL DETAIL GURU =============== -->

                  <!-- ============ MODAL UPDATE GURU =============== -->
                  <?php 
                    foreach($data as $row) {
                  ?>
                  <div id="modal_update<?php echo $row['nip'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Tambah data guru</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                        </div>
                        <form method="POST" action="<?php echo base_url('Dataguru/update/'); ?><?php echo $row['nip'] ?>">
                          <div class="modal-body">
                            <div class="form-group">
                              <label>NIP</label>
                              <input type="text" name="nip" placeholder="NIP" class="form-control" value="<?php echo $row['nip'] ?>" required="">
                            </div>
                            <div class="form-group">       
                              <label>Nama</label>
                              <input type="text" name="nama" placeholder="Nama" class="form-control" value="<?php echo $row['nama_lengkap'] ?>" required="">
                            </div>
                            <div class="form-group">       
                              <label>Email</label>
                              <input type="email" name="email" placeholder="Email" class="form-control" value="<?php echo $row['email'] ?>" required="">
                            </div>
                            <div class="form-group">       
                              <label>Jenis Kelamin</label>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="jk" value="Laki-laki" required="">Laki-laki
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="jk" value="Perempuan" required="">Perempuan
                                </label>
                              </div>
                            </div>
                            <div class="form-group">       
                              <label>No Hp.</label>
                              <input type="text" name="no_hp" placeholder="No Hp." class="form-control" value="<?php echo $row['no_hp'] ?>" required="">
                            </div>
                            <div class="form-group">       
                              <label>Alamat</label>
                              <textarea class="form-control" name="alamat" required=""><?php echo $row['alamat'] ?></textarea>
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
                  <?php } ?>
                  <!-- ============ / MODAL UPDATE GURU =============== -->