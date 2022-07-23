<!-- left column -->
<!-- <h1 class="mt-3 ml-2"><?= $judul;  ?></h1> -->
<div class="col-md-12 mt-4">
	<!-- general form elements -->
	<div class="card card-info">
		<div class="card-header">
			<h3 class="card-title">Tambah Surat Kematian</h3>
		</div>
		<!-- /.card-header -->
		<!-- form start -->
		<form class="form-horizontal" action="" method="POST">
			<div class=" card-body">
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">NIK</label>
					<div class="col-sm-10">
						<input type="text" name="nik" class="form-control" placeholder="NIK" value="<?= set_value('nik'); ?>">
						<small class="form-text text-danger"><?= form_error('nik')  ?></small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Hari</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="hari_m" name="hari_m" placeholder="Hari" required>
						<small class="form-text text-danger"><?= form_error('hari_m')  ?></small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Tanggal</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="tgl_m" name="tgl_m" placeholder="tanggal" required>
						<small class="form-text text-danger"><?= form_error('tgl_m')  ?></small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Disebabkan oleh</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="sebab" name="sebab" placeholder="sebab" required>
						<small class="form-text text-danger"><?= form_error('sebab')  ?></small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Di </label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="alamat_m" name="alamat_m" placeholder="Tempat meninggal" required>
						<small class="form-text text-danger"><?= form_error('alamat_m')  ?></small>
					</div>
				</div>
			</div>
			<!-- /.card-body -->
			<div class="card-footer">
				<button type="submit" class="btn btn-info"><i class="fas fa-save "></i> Simpan</button>
				<a href="<?= base_url('pengajuan_user'); ?>" class="btn btn-secondary"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
			</div>
			<!-- /.card-footer -->
		</form>
	</div>
</div>
<!-- /.card-body -->
