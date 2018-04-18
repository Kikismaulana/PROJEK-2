                    <div class="col-md-9">
                      <div class="card">
                        <h5 class="card-header bg-light">Detail</h5>
                        <div class="card-body">
                          <table id="izin" cellpadding="10px" cellpadding="10px" style="font-size: 15px">
                            <tr>
                              <td>NIS</td>
                              <td>:</td>
                              <td><b><?php echo $datadetailizin['nis']; ?></b></td>
                            </tr>
                            <tr>
                              <td>Nama</td>
                              <td>:</td>
                              <td><b><?php echo $datadetailizin['nama_lengkap']; ?></b></td>
                            </tr>
                            <tr>
                              <td>Keterangan</td>
                              <td>:</td>
                              <td><b><?php echo $datadetailizin['keterangan']; ?></b></td>
                            </tr>
                            <tr>
                              <td>Tanggal Izin</td>
                              <td>:</td>
                              <td><b><?php echo $datadetailizin['tanggal_mulai']; ?></b></td>
                            </tr>
                            <tr>
                              <td>Tanggal Masuk</td>
                              <td>:</td>
                              <td><b><?php echo $datadetailizin['tanggal_selesai']; ?></b></td>
                            </tr>
                            <tr>
                              <td>Bukti</td>
                              <td>:</td>
                              <td><img class="card-img" src="<?php echo base_url('assets/img/tittle.png'); ?>" style="height: 230px; width: 200px" alt="Card image"></td>
                            </tr>
                            <tr>
                              <td>Alasan</td>
                              <td>:</td>
                              <td><b><?php echo $datadetailizin['alasan']; ?></b></td>
                            </tr>
                          </table>
                          <div style="padding: 10px; padding-top: 30px">
                            <a href="#" class="btn btn-sm btn-success">Accept</a>
                            <a href="#" class="btn btn-sm btn-danger">Decline</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="card">
                        <h5 class="card-header bg-light text-danger">Keterangan : </h5>
                        <div class="card-body">
                          <table cellpadding="10px" cellpadding="10px">
                          <tr>
                            <td width="50px" height="50px" style="background-color: #FFC107"></td>
                            <td><h3> : Belum di konfirmasi</h3></td>
                          </tr>
                          <tr>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td width="50px" height="50px" style="background-color: #28A745"></td>
                            <td><h3> : Sudah di konfirmasi</h3></td>
                          </tr>
                        </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /Conten Header-->