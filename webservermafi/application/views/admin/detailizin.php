<div class="col-md-9">
                      <div class="card">
                        <h5 class="card-header bg-light">Detail</h5>
                        <div class="card-body">
                          <?php
                            foreach ($dataizin as $row) {
                          ?>
                          <table cellpadding="10px" cellpadding="10px" style="font-size: 15px">
                            <tr>
                              <td>NIS</td>
                              <td>:</td>
                              <td><b><?php echo $row['nis']; ?></b></td>
                            </tr>
                            <tr>
                              <td>Nama</td>
                              <td>:</td>
                              <td><b><?php echo $row['nama_lengkap']; ?></b></td>
                            </tr>
                            <tr>
                              <td>Keterangan</td>
                              <td>:</td>
                              <td><b><?php echo $row['keterangan']; ?></b></td>
                            </tr>
                            <tr>
                              <td>Tanggal Izin</td>
                              <td>:</td>
                              <td><b><?php echo $row['tanggal_mulai']; ?></b></td>
                            </tr>
                            <tr>
                              <td>Tanggal Masuk</td>
                              <td>:</td>
                              <td><b><?php echo $row['tanggal_selesai']; ?></b></td>
                            </tr>
                            <tr>
                              <td>Bukti</td>
                              <td>:</td>
                              <td><img class="card-img" src="<?php echo base_url('assets/img/tittle.png'); ?>" alt="Card image"></td>
                            </tr>
                            <tr>
                              <td>Alasan</td>
                              <td>:</td>
                              <td><b><?php echo $row['alasan']; ?></b></td>
                            </tr>
                          </table>
                          <div style="padding: 10px; padding-top: 30px">
                            <a href="#" class="btn btn-sm btn-success">Accept</a>
                            <a href="#" class="btn btn-sm btn-danger">Decline</a>
                          </div>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>