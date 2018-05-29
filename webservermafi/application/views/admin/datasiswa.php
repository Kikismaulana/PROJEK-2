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
                        <form method="post" action="<?php echo base_url("Datasiswa/import"); ?>" enctype="multipart/form-data">
                          <div class="form-group">
                            <input type="file" name="file" class="form-control"  style="width: 32%">
                          </div>
                          <div class="form-group">
                            <input type="submit" name="preview" value="Import .CSV" class="btn btn-outline-warning">
                            <a href="<?php echo base_url('Datasiswa/exportdatasiswa') ?>" class="btn btn-success text-white">Get .xlsx</a>
                            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-info">Tambah data</button>
                          </div>
                        </form>
                      </div>
                      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                          <thead>
                              <tr>
                                  <th width="5%">No.</th>
                                  <th>NIS</th>
                                  <th width="20%">Nama lengkap</th>
                                  <th>Kelas</th>
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
                                  <td><?php echo $row['nama_kelas']; ?></td>
                                  <td align="center">
                                    <a class="btn btn-sm btn-info text-white" data-toggle="modal" data-target="#modal_detail<?php echo $row['nis'];?>">Details</a>
                                  <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_update<?php echo $row['nis'];?>">Update</button>
                                  <a data-toggle="modal" data-target="#modal_konfirmasidelete<?php echo $row['nis'];?>" class="btn btn-sm btn-danger text-white">Delete</a>
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

      <!-- ============ / MODAL ADD SISWA =============== -->
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
                                  <label>NISN</label>
                                  <input type="text" name="nisn" placeholder="NISN" class="form-control" required="">
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
                                  <input type="text" class="form-control" placeholder="No Telepon" name="tlp" required="" id="txtPhone"><span id="spnPhoneStatus"></span>
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

                  <!-- ============ / MODAL ADD SISWA =============== -->

                  <!-- ============ MODAL KONFIRMASI DELETE SISWA =============== -->
                  <?php 
                  foreach($datasiswa as $row) {
                  ?>
                  <div class="modal fade" id="modal_konfirmasidelete<?php echo $row['nis'];?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                      <div class="modal-dialog">
                      <div class="modal-content">
                      <div class="modal-header">
                          <h3 class="modal-title" id="myModalLabel">Delete Siswa</h3>
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                      </div>
                      <form class="form-horizontal" method="post" action="<?php echo base_url('Datasiswa/delete/');?><?php echo $row['nis'] ?>">
                          <div class="modal-body">

                              <div class="form-group">
                                  <label class="control-label col-xs-3" >Apakah anda yakin ingin menghapus data Siswa <b> <?php echo $row['nama_lengkap']; ?> ? </b></label>
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

                  <?php } ?>
                <!--END MODAL KONFIRMASI DELETE SISWA-->

                <!-- ============ MODAL DETAIL SISWA =============== -->
                  <?php 
                    foreach($datasiswa as $row) {
                  ?>
                  <div id="modal_detail<?php echo $row['nis'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Tambah data guru</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                        </div>
                          <div class="modal-body">
                            <div class="form-group">       
                                  <label>Nama</label>
                                  <input type="text" value="<?php echo $row['nama_lengkap'] ?>" name="nama" placeholder="Nama" class="form-control" required="" disabled="">
                                </div>

                                <div class="form-group">
                                  <label>NIS</label>
                                  <input class="form-control" type="text" value="<?php echo $row['nis'] ?>" name="nis" placeholder="NIS" class="form-control" required="" disabled="">
                                </div>

                                <div class="form-group">
                                  <label>NISN</label>
                                  <input class="form-control" type="text" value="<?php echo $row['nisn'] ?>" name="nisN" placeholder="NISN" class="form-control" required="" disabled="">
                                </div>

                                <div class="form-group">
                                  <label>Kelas</label>
                                  <input class="form-control" type="text" name="kelas" value="<?php echo $row['nama_kelas'] ?>" disabled="">
                                </div>

                                <div class="form-group">       
                                  <label>Jenis Kelamin</label>
                                  <input class="form-control" name="jk" type="text" disabled="" required="" value="<?php echo $row['jk'] ?>">
                                </div>

                                <div class="form-group">
                                  <label>Tempat, Tanggal Lahir</label>
                                  <input type="text" placeholder="(kota), (tanggal,bulan,tahun)" name="ttl" class="form-control" disabled="" value="<?php echo $row['ttl'] ?>" required="">
                                </div>

                                <div class="form-group">
                                  <label>Agama</label>
                                  <input class="form-control" type="text" name="agama" value="<?php echo $row['agama'] ?>" disabled="">
                                </div>

                                <div class="form-group">       
                                  <label>Alamat</label>
                                  <textarea class="form-control" name="alamat" disabled=""><?php echo $row['alamat'] ?></textarea>
                                </div>
                            
                                <div class="form-group">
                                  <label>No. Telep</label>
                                  <input type="text" class="form-control" disabled="" value="<?php echo $row['no_hp'] ?>" placeholder="No Telepon" name="tlp" required="">
                                </div>

                                <div class="form-group">
                                  <label>Email</label>
                                  <input type="email" disabled="" value="<?php echo $row['email'] ?>" name="email" placeholder="email" class="form-control" required="">
                                </div>

                                <div class="form-group">       
                                  <label>Nama Ayah</label>
                                  <input type="text" value="<?php echo $row['nama_ayah'] ?>" disabled="" name="nama_ayah" placeholder="Nama Ayah" class="form-control" required="">
                                </div>

                                <div class="form-group">       
                                  <label>Nama Ibu</label>
                                  <input type="text" value="<?php echo $row['nama_ibu'] ?>" disabled="" name="nama_ibu" placeholder="Nama Ibu" class="form-control" required="">
                                </div>

                                <div class="form-group">       
                                  <label>Pekerjaan Ayah</label>
                                  <input type="text" value="<?php echo $row['pekerjaan_ayah'] ?>" disabled="" name="pekerjaan_ayah" placeholder="Pekerjaan" class="form-control" required="">
                                </div>

                                <div class="form-group">       
                                  <label>Pekerjaan Ibu</label>
                                  <input type="text" value="<?php echo $row['pekerjaan_ibu'] ?>" disabled="" name="pekerjaan_ibu" placeholder="Pekerjaan" class="form-control" required="">
                                </div>

                                <div class="form-group">       
                                  <label>Alamat Orangtua</label>
                                  <textarea class="form-control" disabled="" name="alamat_ortu"><?php echo $row['alamat_ortu'] ?></textarea>
                                </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" data-dismiss="modal" class="btn btn-secondary">Close</button>
                          </div>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                  <!-- ============ / MODAL DETAIL SISWA =============== -->

                  <!-- ============ MODAL UPDATE SISWA =============== -->
                  <?php 
                    foreach($datasiswa as $row) {
                  ?>
                  <div id="modal_update<?php echo $row['nis'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Tambah data guru</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                        </div>
                        <form method="POST" action="<?php echo base_url('Datasiswa/update/'); ?><?php echo $row['nis'] ?>">
                          <div class="modal-body">
                                <div class="form-group">       
                                  <label>Nama</label>
                                  <input type="text" value="<?php echo $row['nama_lengkap'] ?>" name="nama" placeholder="Nama" class="form-control" required="">
                                </div>

                                <div class="form-group">
                                  <label>NIS</label>
                                  <input class="form-control" type="text" value="<?php echo $row['nis'] ?>" name="nis" placeholder="NIS" class="form-control" required="">
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
                                  <input type="text" placeholder="(kota), (tanggal,bulan,tahun)" name="ttl" class="form-control" value="<?php echo $row['ttl'] ?>" required="">
                                </div>

                                <div class="form-group">
                                  <label>Agama</label>
                                  <select name="agama" class="form-control" required="">
                                    <option selected="" value="ISLAM"><?php echo $row['agama'] ?></option>
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
                                  <textarea class="form-control" name="alamat"><?php echo $row['alamat'] ?></textarea>
                                </div>
                            
                                <div class="form-group">
                                  <label>No. Telep</label>
                                  <input type="text" class="form-control" value="<?php echo $row['no_hp'] ?>" placeholder="No Telepon" name="tlp" required="">
                                </div>

                                <div class="form-group">
                                  <label>Email</label>
                                  <input type="email" value="<?php echo $row['email'] ?>" name="email" placeholder="email" class="form-control" required="">
                                </div>

                                <div class="form-group">       
                                  <label>Nama Ayah</label>
                                  <input type="text" value="<?php echo $row['nama_ayah'] ?>" name="nama_ayah" placeholder="Nama Ayah" class="form-control" required="">
                                </div>

                                <div class="form-group">       
                                  <label>Nama Ibu</label>
                                  <input type="text" value="<?php echo $row['nama_ibu'] ?>" name="nama_ibu" placeholder="Nama Ibu" class="form-control" required="">
                                </div>

                                <div class="form-group">       
                                  <label>Pekerjaan Ayah</label>
                                  <input type="text" value="<?php echo $row['pekerjaan_ayah'] ?>" name="pekerjaan_ayah" placeholder="Pekerjaan" class="form-control" required="">
                                </div>

                                <div class="form-group">       
                                  <label>Pekerjaan Ibu</label>
                                  <input type="text" value="<?php echo $row['pekerjaan_ibu'] ?>" name="pekerjaan_ibu" placeholder="Pekerjaan" class="form-control" required="">
                                </div>

                                <div class="form-group">       
                                  <label>Alamat Orangtua</label>
                                  <textarea class="form-control" name="alamat_ortu"><?php echo $row['alamat_ortu'] ?></textarea>
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
                  <!-- ============ / MODAL UPDATE SISWA =============== -->


  <script type="text/javascript">
    $(document).ready(function() {
        $('#txtPhone').blur(function(e) {
            if (validatePhone('txtPhone')) {
                $('#spnPhoneStatus').html('');
            }
            else {
                $('#spnPhoneStatus').html('<b>Salah !</b> Masukkan Nomor dengan angka !');
                $('#spnPhoneStatus').css('color', 'red');
                $('#spnPhoneStatus').css('padding-top', '10px');
                $('#spnPhoneStatus').css('padding-bottom', '5px');
            }
        });
    });

    function validatePhone(txtPhone) {
        var a = document.getElementById(txtPhone).value;
        var filter = /^[0-9-+]+$/;
        if (filter.test(a)) {
            return true;
        }
        else {
            return false;
        }
    }
  </script>