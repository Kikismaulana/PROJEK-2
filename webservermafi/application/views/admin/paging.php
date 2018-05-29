<div class="container">
	<div class="row">
		<div class="col-md-6">
			<form method="get" action="<?php echo base_url('Datapresensi/rekapdetail?tahun=')?><?php echo $tahun1 ?><?php echo '-' ?> <?php echo $tahun2 ?><?php echo '&kelas_new=' ?><?php echo $kelas ?><?php echo '&id_kelas=' ?><?php echo $id_kelas ?>">
				<input type="hidden" name="tahun" value="<?php echo $tahun1 ?><?php echo '-' ?><?php echo $tahun2 ?>">
				<input type="hidden" name="kelas_new" value="<?php echo $kelas ?>">
				<input type="hidden" name="id_kelas" value="<?php echo $id_kelas ?>">
				<select name="ambil" class="form-control" onchange="this.form.submit()">
					<?php if ($ambil == $tahun2) { ?>
						<option value="<?php echo "$tahun1"; ?>"><?php echo "$tahun1"; ?></option>
						<option selected="" value="<?php echo "$tahun2"; ?>"><?php echo "$tahun2"; ?></option>
					<?php } else { ?>
						<option selected="" value="<?php echo "$tahun1"; ?>"><?php echo "$tahun1"; ?></option>
						<option value="<?php echo "$tahun2"; ?>"><?php echo "$tahun2"; ?></option>
					<?php } ?>
				</select>
			</form><!-- 
			<ul class="pagination pagination-sm">
				<form method="get" action="<?php echo base_url('Datapresensi/rekapdetail?tahun=')?><?php echo $tahun1 ?><?php echo '-' ?> <?php echo $tahun2 ?><?php echo '&kelas_new=' ?><?php echo $kelas ?><?php echo '&id_kelas=' ?><?php echo $id_kelas ?>">
					<input type="hidden" name="tahun" value="<?php echo $tahun1 ?><?php echo '-' ?><?php echo $tahun2 ?>">
					<input type="hidden" name="kelas_new" value="<?php echo $kelas ?>">
					<input type="hidden" name="id_kelas" value="<?php echo $id_kelas ?>">
					<li class="page-item"><input type="hidden" value="<?php echo "$tahun1"; ?>" name="ambil"><button class="page-link"><?php echo "$tahun1"; ?></button></li>
				</form>
				<form method="get" action="<?php echo base_url('Datapresensi/rekapdetail?tahun=')?><?php echo $tahun1 ?><?php echo '-' ?> <?php echo $tahun2 ?><?php echo '&kelas_new=' ?><?php echo $kelas ?><?php echo '&id_kelas=' ?><?php echo $id_kelas ?>">
					<input type="hidden" name="tahun" value="<?php echo $tahun1 ?><?php echo '-' ?><?php echo $tahun2 ?>">
					<input type="hidden" name="kelas_new" value="<?php echo $kelas ?>">
					<input type="hidden" name="id_kelas" value="<?php echo $id_kelas ?>">
					<li class="page-item"><input type="hidden" value="<?php echo "$tahun2"; ?>" name="ambil"><button class="page-link"><?php echo "$tahun2"; ?></button></li>
				</form>
			</ul> -->
		</div>
		<?php if (!isset($_GET['ambil']) || $_GET['ambil']==$tahun1) { ?>
			<div class="col-md-6">
				<form method="get" action="<?php echo base_url('Datapresensi/rekapdetail?tahun=')?><?php echo $tahun1 ?><?php echo '-' ?> <?php echo $tahun2 ?><?php echo '&kelas_new=' ?><?php echo $kelas ?><?php echo '&id_kelas=' ?><?php echo $id_kelas ?><?php if (isset($_GET['ambil'])) { echo '&ambil='; ?><?php echo $ambil; } ?>">
					<input type="hidden" name="tahun" value="<?php echo $tahun1 ?><?php echo '-' ?><?php echo $tahun2 ?>">
					<input type="hidden" name="kelas_new" value="<?php echo $kelas ?>">
					<input type="hidden" name="id_kelas" value="<?php echo $id_kelas ?>">
					<select name="bulan" class="form-control" onchange="this.form.submit()">
						
					</select>
				</form>
				<!-- <ul class="float-right pagination pagination-sm">
					<form method="get" action="<?php echo base_url('Datapresensi/rekapdetail?tahun=')?><?php echo $tahun1 ?><?php echo '-' ?> <?php echo $tahun2 ?><?php echo '&kelas_new=' ?><?php echo $kelas ?><?php echo '&id_kelas=' ?><?php echo $id_kelas ?><?php if (isset($_GET['ambil'])) { echo '&ambil='; ?><?php echo $ambil; } ?>">
						<li class="page-item">
							<input type="hidden" name="tahun" value="<?php echo $tahun1 ?><?php echo '-' ?><?php echo $tahun2 ?>">
							<input type="hidden" name="kelas_new" value="<?php echo $kelas ?>">
							<input type="hidden" name="id_kelas" value="<?php echo $id_kelas ?>">
							<input type="hidden" value="<?php echo "7"; ?>" name="bulan">
							<button class="page-link">
								July
							</button>
						</li>
					</form>
					<form method="get" action="<?php echo base_url('Datapresensi/rekapdetail?tahun=')?><?php echo $tahun1 ?><?php echo '-' ?> <?php echo $tahun2 ?><?php echo '&kelas_new=' ?><?php echo $kelas ?><?php echo '&id_kelas=' ?><?php echo $id_kelas ?><?php if (isset($_GET['ambil'])) { echo '&ambil='; ?><?php echo $ambil; } ?>">
						<li class="page-item">
							<input type="hidden" name="tahun" value="<?php echo $tahun1 ?><?php echo '-' ?><?php echo $tahun2 ?>">
							<input type="hidden" name="kelas_new" value="<?php echo $kelas ?>">
							<input type="hidden" name="id_kelas" value="<?php echo $id_kelas ?>">
							<input type="hidden" value="<?php echo "8"; ?>" name="bulan">
							<button class="page-link">
								August
							</button>
						</li>
					</form>
					<form method="get" action="<?php echo base_url('Datapresensi/rekapdetail?tahun=')?><?php echo $tahun1 ?><?php echo '-' ?> <?php echo $tahun2 ?><?php echo '&kelas_new=' ?><?php echo $kelas ?><?php echo '&id_kelas=' ?><?php echo $id_kelas ?><?php if (isset($_GET['ambil'])) { echo '&ambil='; ?><?php echo $ambil; } ?>">
						<li class="page-item">
							<input type="hidden" name="tahun" value="<?php echo $tahun1 ?><?php echo '-' ?><?php echo $tahun2 ?>">
							<input type="hidden" name="kelas_new" value="<?php echo $kelas ?>">
							<input type="hidden" name="id_kelas" value="<?php echo $id_kelas ?>">
							<input type="hidden" value="<?php echo "9"; ?>" name="bulan">
							<button class="page-link">
								Sempember
							</button>
						</li>
					</form>
					<form method="get" action="<?php echo base_url('Datapresensi/rekapdetail?tahun=')?><?php echo $tahun1 ?><?php echo '-' ?> <?php echo $tahun2 ?><?php echo '&kelas_new=' ?><?php echo $kelas ?><?php echo '&id_kelas=' ?><?php echo $id_kelas ?><?php if (isset($_GET['ambil'])) { echo '&ambil='; ?><?php echo $ambil; } ?>">
						<li class="page-item">
							<input type="hidden" name="tahun" value="<?php echo $tahun1 ?><?php echo '-' ?><?php echo $tahun2 ?>">
							<input type="hidden" name="kelas_new" value="<?php echo $kelas ?>">
							<input type="hidden" name="id_kelas" value="<?php echo $id_kelas ?>">
							<input type="hidden" value="<?php echo "10"; ?>" name="bulan">
							<button class="page-link">
								October
							</button>
						</li>
					</form>
					<form method="get" action="<?php echo base_url('Datapresensi/rekapdetail?tahun=')?><?php echo $tahun1 ?><?php echo '-' ?> <?php echo $tahun2 ?><?php echo '&kelas_new=' ?><?php echo $kelas ?><?php echo '&id_kelas=' ?><?php echo $id_kelas ?><?php if (isset($_GET['ambil'])) { echo '&ambil='; ?><?php echo $ambil; } ?>">
						<li class="page-item">
							<input type="hidden" name="tahun" value="<?php echo $tahun1 ?><?php echo '-' ?><?php echo $tahun2 ?>">
							<input type="hidden" name="kelas_new" value="<?php echo $kelas ?>">
							<input type="hidden" name="id_kelas" value="<?php echo $id_kelas ?>">
							<input type="hidden" value="<?php echo "11"; ?>" name="bulan">
							<button class="page-link">
								November
							</button>
						</li>
					</form>
					<form method="get" action="<?php echo base_url('Datapresensi/rekapdetail?tahun=')?><?php echo $tahun1 ?><?php echo '-' ?> <?php echo $tahun2 ?><?php echo '&kelas_new=' ?><?php echo $kelas ?><?php echo '&id_kelas=' ?><?php echo $id_kelas ?><?php if (isset($_GET['ambil'])) { echo '&ambil='; ?><?php echo $ambil; } ?>">
						<li class="page-item">
							<input type="hidden" name="tahun" value="<?php echo $tahun1 ?><?php echo '-' ?><?php echo $tahun2 ?>">
							<input type="hidden" name="kelas_new" value="<?php echo $kelas ?>">
							<input type="hidden" name="id_kelas" value="<?php echo $id_kelas ?>">
							<input type="hidden" value="<?php echo "12"; ?>" name="bulan">
							<button class="page-link">
								December
							</button>
						</li>
					</form>
				</ul> -->
			</div>
		<?php } elseif ($_GET['ambil']==$tahun2) { ?>
			<div class="col-md-6">
				<ul class="float-right pagination pagination-sm">
					<form method="get" action="<?php echo base_url('Datapresensi/rekapdetail?tahun=')?><?php echo $tahun1 ?><?php echo '-' ?> <?php echo $tahun2 ?><?php echo '&kelas_new=' ?><?php echo $kelas ?><?php echo '&id_kelas=' ?><?php echo $id_kelas ?><?php echo '&ambil=' ?><?php echo $ambil ?>">
						<li class="page-item">
							<input type="hidden" name="tahun" value="<?php echo $tahun1 ?><?php echo '-' ?><?php echo $tahun2 ?>">
							<input type="hidden" name="kelas_new" value="<?php echo $kelas ?>">
							<input type="hidden" name="id_kelas" value="<?php echo $id_kelas ?>">
							<input type="hidden" name="ambil" value="<?php echo $ambil ?>">
							<input type="hidden" value="<?php echo "1" ?>" name="bulan">
							<button class="page-link">
								January
							</button>
						</li>
					</form>
					<form method="get" action="<?php echo base_url('Datapresensi/rekapdetail?tahun=')?><?php echo $tahun1 ?><?php echo '-' ?> <?php echo $tahun2 ?><?php echo '&kelas_new=' ?><?php echo $kelas ?><?php echo '&id_kelas=' ?><?php echo $id_kelas ?><?php echo '&ambil=' ?><?php echo $ambil ?>">
						<li class="page-item">
							<input type="hidden" name="tahun" value="<?php echo $tahun1 ?><?php echo '-' ?><?php echo $tahun2 ?>">
							<input type="hidden" name="kelas_new" value="<?php echo $kelas ?>">
							<input type="hidden" name="id_kelas" value="<?php echo $id_kelas ?>">
							<input type="hidden" name="ambil" value="<?php echo $ambil ?>">
							<input type="hidden" value="<?php echo "2" ?>" name="bulan">
							<button class="page-link">
								February
							</button>
						</li>
					</form>
					<form method="get" action="<?php echo base_url('Datapresensi/rekapdetail?tahun=')?><?php echo $tahun1 ?><?php echo '-' ?> <?php echo $tahun2 ?><?php echo '&kelas_new=' ?><?php echo $kelas ?><?php echo '&id_kelas=' ?><?php echo $id_kelas ?><?php echo '&ambil=' ?><?php echo $ambil ?>">
						<li class="page-item">
							<input type="hidden" name="tahun" value="<?php echo $tahun1 ?><?php echo '-' ?><?php echo $tahun2 ?>">
							<input type="hidden" name="kelas_new" value="<?php echo $kelas ?>">
							<input type="hidden" name="id_kelas" value="<?php echo $id_kelas ?>">
							<input type="hidden" name="ambil" value="<?php echo $ambil ?>">
							<input type="hidden" value="<?php echo "3" ?>" name="bulan">
							<button class="page-link">
								March
							</button>
						</li>
					</form>
					<form method="get" action="<?php echo base_url('Datapresensi/rekapdetail?tahun=')?><?php echo $tahun1 ?><?php echo '-' ?> <?php echo $tahun2 ?><?php echo '&kelas_new=' ?><?php echo $kelas ?><?php echo '&id_kelas=' ?><?php echo $id_kelas ?><?php echo '&ambil=' ?><?php echo $ambil ?>">
						<li class="page-item">
							<input type="hidden" name="tahun" value="<?php echo $tahun1 ?><?php echo '-' ?><?php echo $tahun2 ?>">
							<input type="hidden" name="kelas_new" value="<?php echo $kelas ?>">
							<input type="hidden" name="id_kelas" value="<?php echo $id_kelas ?>">
							<input type="hidden" name="ambil" value="<?php echo $ambil ?>">
							<input type="hidden" value="<?php echo "4" ?>" name="bulan">
							<button class="page-link">
								April
							</button>
						</li>
					</form>
					<form method="get" action="<?php echo base_url('Datapresensi/rekapdetail?tahun=')?><?php echo $tahun1 ?><?php echo '-' ?> <?php echo $tahun2 ?><?php echo '&kelas_new=' ?><?php echo $kelas ?><?php echo '&id_kelas=' ?><?php echo $id_kelas ?><?php echo '&ambil=' ?><?php echo $ambil ?>">
						<li class="page-item">
							<input type="hidden" name="tahun" value="<?php echo $tahun1 ?><?php echo '-' ?><?php echo $tahun2 ?>">
							<input type="hidden" name="kelas_new" value="<?php echo $kelas ?>">
							<input type="hidden" name="id_kelas" value="<?php echo $id_kelas ?>">
							<input type="hidden" name="ambil" value="<?php echo $ambil ?>">
							<input type="hidden" value="<?php echo "5" ?>" name="bulan">
							<button class="page-link">
								May
							</button>
						</li>
					</form>
					<form method="get" action="<?php echo base_url('Datapresensi/rekapdetail?tahun=')?><?php echo $tahun1 ?><?php echo '-' ?> <?php echo $tahun2 ?><?php echo '&kelas_new=' ?><?php echo $kelas ?><?php echo '&id_kelas=' ?><?php echo $id_kelas ?><?php echo '&ambil=' ?><?php echo $ambil ?>">
						<li class="page-item">
							<input type="hidden" name="tahun" value="<?php echo $tahun1 ?><?php echo '-' ?><?php echo $tahun2 ?>">
							<input type="hidden" name="kelas_new" value="<?php echo $kelas ?>">
							<input type="hidden" name="id_kelas" value="<?php echo $id_kelas ?>">
							<input type="hidden" name="ambil" value="<?php echo $ambil ?>">
							<input type="hidden" value="<?php echo "6" ?>" name="bulan">
							<button class="page-link">
								June
							</button>
						</li>
					</form>
				</ul>
			</div>
		<?php } ?>
	</div>
</div>