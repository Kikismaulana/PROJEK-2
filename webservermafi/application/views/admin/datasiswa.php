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
                            <option>option 1</option>
                            <option>option 2</option>
                            <option>option 3</option>
                            <option>option 4</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-sm-3">
                        <div class="col-sm-12" style="padding-top: 30px">
                          <button class="btn btn-info col-sm-12">Lihat data</button>
                        </div>
                      </div>

                      <div class="col-sm-3">
                        <div class="col-sm-12" style="padding-top: 30px">
                          <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary col-sm-12">Tambah data</button>
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
                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th>No.</th>
                              <th>NIS</th>
                              <th>Nama lengkap</th>
                              <th>Email</th>
                              <th>Alamat</th>
                              <th>Nomor Hp</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>s</td>
                              <td>s</td>
                              <td>s</td>
                              <td>s</td>
                              <td>s</td>
                              <td>s</td>
                              <td align="center">
                                <button class="btn btn-sm btn-info">Details</button>
                                <button class="btn btn-sm btn-success">Update</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                              </td>
                          </tr>
                      </tbody>
                    </table>
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
                        <div class="modal-body">
                          <p>Tambah data siswa.</p>
                            <form>

                              <div class="form-group">       
                                <label>Nama</label>
                                <input type="text" placeholder="Nama" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>NIS</label>
                                <input type="email" placeholder="NIS" class="form-control">
                              </div>

                              <label>Kelas</label>
                                  <select name="account" class="form-control">
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                  </select><br>

                              <div class="form-group">       
                                <label>Jenis Kelamin</label>
                                <div class="radio-inline">
                                  <label>
                                     <input type="radio" name="optradio">Laki-laki
                                  </label>
                                </div>
                                <div class="radio-inline">
                                  <label>
                                     <input type="radio" name="optradio">Perempuan
                                  </label>
                                </div>
                              </div>

                              <div class="form-group">
                                <label>Tempat, Tanggal Lahir</label>
                                <input type="text" name="ttl" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>Agama</label>
                                <input type="text" name="agama" class="form-control">
                              </div>

                              <div class="form-group">       
                                <label>Alamat</label>
                                <textarea class="form-control" placeholder="Alamat" name="alamat" rows="3"></textarea>
                              </div>
                          
                              <div class="form-group">
                                <label>No. Telep</label>
                                <input type="text" class="form-control" placeholder="No Telepon" name="tlp">
                              </div>

                              <div class="form-group">       
                                <label>Nama Ayah</label>
                                <input type="password" placeholder="Nama Ayah" class="form-control">
                              </div>

                              <div class="form-group">       
                                <label>Nama Ibu</label>
                                <input type="nama" placeholder="Nama Ibu" class="form-control">
                              </div>

                              <div class="form-group">       
                                <label>Pekerjaan Ayah</label>
                                <input type="pekerjaan" placeholder="Pekerjaan" class="form-control">
                              </div>

                              <div class="form-group">       
                                <label>Pekerjaan Ibu</label>
                                <input type="pekerejaan" placeholder="Pekerjaan" class="form-control">
                              </div>

                              <div class="form-group">       
                                <label>Alamat Orangtua</label>
                                <textarea class="form-control" placeholder="Alamat" name="alamatortu" rows="3"></textarea>
                              </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>