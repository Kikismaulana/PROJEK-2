      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('Dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active">Data Presensi</li>
            <li class="breadcrumb-item active">Rekap Absesn</li>
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
                  <h4>Rekap Absen</h4>
                </div>
                <!-- Conten value-->
                <div class="card-body container-fluid">
                  <div class="form-group">
                        <input type="hidden" name="module" value="laporan">
                        <div class="col-lg-4">
                          <form method="post" action="<?php echo base_url('Datapresensi/rekapdetail') ?>">
                            <div class="form-group">
                              <label>Tahun</label>
                              <select class="form-control" name="tahun">
                                <?php if ($tahun != '') { ?>
                                  <option><?php echo "$tahun"; ?></option>
                                <?php } ?>
                                <?php
                                  $ht=2017;
                                  while($ht<=2060){
                                    $to=$ht+1;
                                  if(date("m")>=7){
                                    $e=$ht;
                                  }else{
                                    $e=$to; 
                                  }
                                  if(date("Y")==$e){
                                    echo "<option>$ht-$to</option>"; 
                                  }else{
                                    echo "<option>$ht-$to</option>";  
                                    
                                  }
                                  $ht++;
                                }?>
                              </select>
                            </div>
                            <button type="submit" class="btn btn-info">Submit</button>
                          </form>
                        </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /Conten Header-->