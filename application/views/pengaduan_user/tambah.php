<div class="col-md-12 mt-4">
	<!-- general form elements -->
	<div class="card card-info">
		<div class="card-header">
			<h2>Pengaduan</h2>
		</div>
		<div class="container mt-5">
			<form action="" method="post">
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">NIK</label>
					<div class="col-sm-8">
						<input type="text" name="nik" class="form-control" placeholder="NIK" value="<?= set_value('nik'); ?>">
						<small class="form-text text-danger"><?= form_error('nik')  ?></small>
					</div>
				</div>
				<div class="form-group row">
					<label for="isiLaporan" class="col-sm-3 col-form-label">Isi Laporan</label>
					<div class="col-sm-8">
						<textarea name="isi_laporan" class="form-control" id="isi_laporan" rows="4" required></textarea>
						<small id="helpId" class="text-muted"><?php echo form_error('isi', '<div class="alert alert-danger mt-2">', '</div>'); ?></small>
					</div>
				</div>
				<div class="form-group row">
					<label for="foto" class="col-sm-3 col-form-label">Foto</label>
					<div class="col-sm-8">
						<input type="file" name="foto" id="foto" class="form-control" placeholder="" aria-describedby="helpId" value="<?= set_value('foto') ?>" required>
						<small id="helpId" class="text-muted"><?php echo form_error('foto', '<div class="alert alert-danger mt-2">', '</div>'); ?></small>
					</div>
				</div>
				<br>
				<div class="form-group row justify-content-center">
					<button type="reset" class="btn btn-danger mr-2">Reset</button>
					<a href="<?= base_url('pengaduanuser') ?>" class="btn btn-warning mr-2">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
