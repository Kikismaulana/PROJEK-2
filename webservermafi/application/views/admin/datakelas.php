      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('Dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active">Data Kelas</li>
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
                  <h4>Data kelas</h4>
                </div>

                <!-- Conten value-->
                <div class="card-body container-fluid">
                  <div class="form-group">
                    <!--Pilih kelas-->
                    <div class="form-group row">
                      <div class="col-sm-12 form-group container-fluid" style="padding-bottom: 20px">
                        <!-- Notifikasi -->
                        <?php if ($info = $this->session->flashdata('info')) {
                          echo $info;
                        } ?>
                        <!-- /Notifikasi -->
                        <a class="btn btn-success text-white" data-toggle="modal" data-target="#modal_add_new"> Tambah data</a>
                      </div>

                      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                            $a = 1;
                            foreach ($data as $row) {
                          ?>
                            <tr>
                                <td align="center"><?php echo $a++; ?>.</td>
                                <td><?php echo $row['nama_kelas']; ?></td>
                                <td align="center">
                                  <a class="btn btn-sm btn-info text-white" data-toggle="modal" data-target="#modal_edit<?php echo $row['id_kelas'];?>">Update</a>
                                  <a data-toggle="modal" data-target="#modal_konfirmasidelete<?php echo $row['id_kelas'];?>"" class="btn btn-sm btn-danger text-white">Delete</a>
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
      
    <!-- ============ MODAL ADD KELAS =============== -->
        <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Tambah kelas</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url('Datakelas/create/')?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tingkat</label>
                        <div class="col-xs-8">
                             <select name="tingkat" class="form-control" required="">
                                <option class="active">--PILIH DATA--</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                             </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jurusan</label>
                        <div class="col-xs-8">
                            <input type="hidden" name="jurusan_new" id="jurusan_new">
                            <select name="jurusan" class="form-control" required="" id="jurusan">
                                <option class="active">--PILIH DATA--</option>
                                <?php foreach ($datajurusan as $row) { ?>
                                <option value="<?php echo $row['id_jurusan']; ?>"> <?php echo $row['nama_jurusan']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kategori</label>
                        <div class="col-xs-8">
                             <select name="kategori" class="form-control" required="">
                                <option class="active">--PILIH DATA--</option>
                                <option value="I">I</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">VI</option>
                             </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button name="simpan" class="btn btn-info">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    <!--END MODAL ADD DATA KELAS-->

    <!-- ============ MODAL UPDATE DATA KELAS =============== -->
        <?php 
          foreach($data as $row) {
        ?>
        <div class="modal fade" id="modal_edit<?php echo $row['id_kelas'];?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Tambah kelas</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url('Datakelas/update/')?><?php echo $row['id_kelas'] ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tingkat</label>
                        <div class="col-xs-8">
                             <select name="tingkat" class="form-control" required="">
                                <option class="active">--PILIH DATA--</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                             </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jurusan</label>
                        <div class="col-xs-8">
                             <select name="jurusan" class="form-control" required="">
                                <option class="active">--PILIH DATA--</option>
                                <?php foreach ($datajurusan as $row) { ?>
                                <option value="<?php echo $row['nama_jurusan']; ?>"> <?php echo $row['nama_jurusan']; ?></option>
                                <?php } ?>
                             </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kategori</label>
                        <div class="col-xs-8">
                             <select name="kategori" class="form-control" required="">
                                <option class="active">--PILIH DATA--</option>
                                <option value="I">I</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">VI</option>
                             </select>
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
        <?php } ?>
    <!--END MODAL UPDATE DATA KELAS-->

    <!-- ============ MODAL KONFIRMASI DELETE KELAS =============== -->
        <?php 
        foreach($data as $row) {
        ?>
        <div class="modal fade" id="modal_konfirmasidelete<?php echo $row['id_kelas'];?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Delete Jurusan</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url('Datakelas/delete/');?><?php echo $row['id_kelas'] ?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Apakah anda yakin ingin menghapus data jurusan <b> <?php echo $row['nama_kelas']; ?> ? </b> </label>
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
      <!--END MODAL KONFIRMASI DELETE KELAS-->

    <script type="text/javascript">
      $('#jurusan').change(function(e){
        //alert($('#jurusan option:selected').text());
        $('#jurusan_new').val($('#jurusan option:selected').text());
      });
    </script>