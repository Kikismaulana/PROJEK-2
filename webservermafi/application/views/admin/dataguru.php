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

                      <div class="col-sm-5">
                        <label class="col-sm-12 form-control-label">Pilih file <b>.CSV</b></label>
                        <div class="col-sm-12">
                          <input type="file" name="file" class="form-control"  style="width: 80%">
                        </div>
                      </div>

                      <div class="col-sm-12" style="padding-bottom: 20px">
                        <div class="col-sm-12">
                          <button class="btn btn-warning text-white">Import Data</button>
                          <button class="btn btn-danger text-white">Get .Pdf</button>
                          <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-success"> Tambah data</button>
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
                            <tr>
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
                          <h5 id="exampleModalLabel" class="modal-title">Tambah data guru</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                                  <form>
                                    <div class="form-group">
                                      <label>NIP</label>
                                      <input type="nip" placeholder="Nip" class="form-control">
                                    </div>
                                    <div class="form-group">       
                                      <label>Nama</label>
                                      <input type="nama" placeholder="Nama" class="form-control">
                                    </div>
                                    <div class="form-group">       
                                      <label>Email</label>
                                      <input type="email" placeholder="Nama" class="form-control">
                                    </div>
                                    <div class="form-group">       
                                      <label>Password</label>
                                      <input type="password" placeholder="password" class="form-control">
                                    </div>
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
                                      <label>No Hp.</label>
                                      <input type="nama" placeholder="No Hp." class="form-control">
                                    </div>
                                    <div class="form-group">       
                                      <label>Alamat</label>
                                      <textarea class="form-control" placeholder="Alamat" name="alamat" rows="3"></textarea>
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