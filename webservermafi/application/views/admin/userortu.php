      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('Dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active">Data User</li>
            <li class="breadcrumb-item active">User Siswa</li>
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
                  <h4>Data User Orang tua</h4>
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
                        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-success"> Tambah data</button>
                      </div>

                      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>NISN</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Password</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              $no = 1;
                              foreach ($data as $row) {
                            ?>
                            <tr>
                                <td align="center"><?php echo $no++; ?>.</td>
                                <td align="center"><?php echo $row['nisn']; ?></td>
                                <td align="center"><?php echo $row['nis']; ?></td>
                                <td><?php echo $row['nama_ayah']; echo " / "; echo $row['nama_ibu']; ?></td>
                                <td align="center"><?php echo $row['password']; ?></td>
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

                  <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">User Orang Tua</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                        </div>
                        <form method="POST" action="<?php echo base_url('Datauser/createuserortu') ?>">
                          <div class="modal-body">
                            <p>Tambah User Orang tua</p>
                            <input type="hidden" name="level" value="ortu">
                            <div class="form-group">
                              <label>NISN</label>
                              <input type="text" name="nisn" placeholder="NISN" class="form-control" required="">
                            </div>
                            <div class="form-group">       
                            <label>NIS</label>
                              <input type="text" name="nis" placeholder="NIS" class="form-control" required="">
                            </div>
                            <div class="form-group">       
                              <label>Password</label>
                              <input type="password" name="password" placeholder="password" class="form-control" required="">
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