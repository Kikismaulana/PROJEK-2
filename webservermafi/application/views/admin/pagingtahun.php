<div class="container">
	<div class="row">
		<div class="col-md-6">
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
			</ul>
		</div>
		<div class="col-md-6">
			<ul class="float-right pagination pagination-sm">
				<li class="page-item"><a class="page-link" href="#">Previous</a></li>
				<li class="page-item"><a class="page-link" href="#">1</a></li>
				<li class="page-item"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item"><a class="page-link" href="#">Next</a></li>
			</ul>
		</div>	
	</div>
</div>