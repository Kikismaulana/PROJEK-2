					            <?php
                        foreach ($dataizin as $row) {
                          if ($row['status'] == '0') {
                      ?>
                        <li><a rel="nofollow" href="<?php echo base_url('Datapresensi/updatestatusbaca/'); ?><?php echo $row['id_izin'] ?>" class="dropdown-item d-flex"> 
                            <div class="msg-profile icon-rss-feed" style="font-size: 40px"></div>
                            <div class="msg-body">
                              <h3 class="h5"><?php echo $row['nis']; ?></h3><span>Izin Siswa</span><small><?php echo $row['waktu_kirim']; ?></small>
                            </div></a></li>
                      <?php } } ?>