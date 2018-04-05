      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('Dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active">Data Jurusan</li>
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
                  <h4>Data Jurusan</h4>
                </div>

                <!-- Conten value-->
                <div class="card-body container-fluid">
                  <div class="form-group">
                    <!--Pilih jurusan-->
                    <div class="form-group row">
                      <div class="col-sm-12 form-group container-fluid" style="padding-bottom: 30px">
                        <!-- Notifikasi -->
                        <?php if ($info = $this->session->flashdata('info')) {
                          echo $info;
                        } ?>
                        <!-- /Notifikasi -->
                        <form method="POST" action="<?php echo base_url('Datajurusan/create') ?>">
                          <label>Tambah data Jurusan</label>
                          <input type="text" name="nama_jurusan" class="form-control" required=""><br>
                          <button data-toggle="modal" data-target="#myModal" class="btn btn-success"> Tambah data</button>
                        </form>
                      </div>

                      <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <thead align="center">
                            <tr>
                                <th width="5%">No.</th>
                                <th>Nama Jurusan</th>
                                <th width="30%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                            $a = 1;
                            foreach ($data as $row) {
                          ?>
                            <tr>
                                <td align="center"><?php echo $a++; ?>.</td>
                                <td><?php echo $row['nama_jurusan']; ?></td>
                                <td align="center">
                                  <a class="btn btn-sm btn-info text-white" data-toggle="modal" data-target="#modal_edit<?php echo $row['id_jurusan'];?>">Update</a>
                                  <a data-toggle="modal" data-target="#modal_konfirmasidelete<?php echo $row['id_jurusan'];?>"" class="btn btn-sm btn-danger text-white">Delete</a>
                                </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /Conten Header-->

      <!-- ============ MODAL EDIT JURUSAN =============== -->
        <?php 
        foreach($data as $row) {
        ?>
        <div class="modal fade" id="modal_edit<?php echo $row['id_jurusan'];?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Update Jurusan</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url('Datajurusan/update/');?><?php echo $row['id_jurusan'] ?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Jurusan</label>
                        <div class="col-xs-8">
                            <input name="nama_jurusan" value="<?php echo $row['nama_jurusan'];?>" class="form-control" type="text">
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info">Update</button>
                </div>
            </form>
            </div>
            </div>
        </div>

        <?php }?>
      <!--END MODAL EDIT JURUSAN-->

      <!-- ============ MODAL KONFIRMASI DELETE JURUSAN =============== -->
        <?php 
        foreach($data as $row) {
        ?>
        <div class="modal fade" id="modal_konfirmasidelete<?php echo $row['id_jurusan'];?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Delete Jurusan</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url('Datajurusan/delete/');?><?php echo $row['id_jurusan'] ?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Apakah anda yakin ingin menghapus data jurusan <b> <?php echo $row['nama_jurusan']; ?> ? </b></label>
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
      <!--END MODAL KONFIRMASI DELETE JURUSAN-->