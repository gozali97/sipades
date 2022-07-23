<!-- <h1 class="mt-3 ml-2"><?= $judul;  ?></h1> -->
<div class="col-md-12 mt-4">
	<!-- general form elements -->
	<div class="card card-info">
		<div class="card-header">
			<h3 class="card-title">Tambah Surat Keterangan</h3>
		</div>
		<!-- /.card-header -->
		<!-- form start -->
		<form class="form-horizontal" action="" method="POST">
			<div class=" card-body">
				<?php
				$queryNik = "SELECT `nik`, `nm_lengkap` FROM `tbl_penduduk` ";
				$Nik = $this->db->query($queryNik)->result_array();
				?>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">NIK</label>
					<div class="col-sm-10">
						<select name="nik" class="form-control select2bs4" style="width: 100%;">
							<option selected="selected">--pilih--</option>
							<?php foreach ($Nik as $n) : ?>
								<option value="<?php echo $n['nik'] ?>">
									<?php echo $n['nik'] ?>
									-
									<?php echo $n['nm_lengkap'] ?>
								</option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
			</div>
			<!-- /.card-body -->
			<div class="card-footer">
				<button type="submit" class="btn btn-info"><i class="fas fa-save "></i> Simpan</button>
				<a href="<?= base_url('keterangan'); ?>" class="btn btn-secondary"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
			</div>
			<!-- /.card-footer -->
		</form>
	</div>
</div>
<!-- /.card-body -->
