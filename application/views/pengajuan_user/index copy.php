<!-- left column -->
<!-- <h1 class="mt-3 ml-2"><?= $judul;  ?></h1> -->
<div class="col-md-12 mt-4">
	<!-- general form elements -->
	<div class="card card-info">
		<div class="card-header">
			<h3 class="card-title">Tambah Pengajuan Surat</h3>
		</div>
		<!-- /.card-header -->
		<!-- form start -->
		<form class="form-horizontal" action="" method="POST">
			<div class=" card-body">
				<?php
				$queryKode = "SELECT `kode_surat`, `nm_surat` FROM `tbl_surat` ";
				$Kode = $this->db->query($queryKode)->result_array();
				?>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Kode surat</label>
					<div class="col-sm-10">
						<select name="kode_surat" class="form-control select2bs4" style="width: 100%;">
							<option selected="selected">-- pilih --</option>
							<?php foreach ($Kode as $kd) : ?>
								<option value="<?php echo $kd['kode_surat'] ?>">
									<?php echo $kd['kode_surat'] ?>
									-
									<?php echo $kd['nm_surat'] ?>
								</option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">NIK</label>
					<div class="col-sm-10">
						<input type="text" name="nik" class="form-control" placeholder="NIK" value="<?= set_value('nik'); ?>">
						<small class="form-text text-danger"><?= form_error('nik')  ?></small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Tanggal Surat</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal Surat" required>
						<small class="form-text text-danger"><?= form_error('tgl_lahir')  ?></small>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Jenis surat</label>
					<div class="col-sm-10">
						<select name="nm_surat" class="form-control select2bs4" style="width: 100%;">
							<option selected="selected">--pilih--</option>
							<option>Surat Izin Usaha</option>
							<option>Surat Kematian</option>
							<option>Surat Domisili</option>
							<option>Surat Pindah</option>
							<option>Surat Keterangan</option>
						</select>
					</div>
				</div>
			</div>
			<!-- /.card-body -->
			<div class="card-footer">
				<button type="submit" class="btn btn-info"><i class="fas fa-save "></i> Simpan</button>
				<a href="<?= base_url('kelahiran'); ?>" class="btn btn-secondary"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
			</div>
			<!-- /.card-footer -->
		</form>
	</div>
</div>
<!-- /.card-body -->
