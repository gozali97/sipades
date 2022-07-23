<!-- left column -->
<!-- <h1 class="mt-3 ml-2"><?= $judul;  ?></h1> -->
<div class="col-md-12 mt-4">
	<!-- general form elements -->
	<div class="card card-info">
		<div class="card-header">
			<h3 class="card-title">Tambah Surat Izin Usaha</h3>
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
					<label class="col-sm-2 col-form-label">Nama Usaha</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nm_usaha" name="nm_usaha" placeholder="Nama Usaha" required>
						<small class="form-text text-danger"><?= form_error('nm_usaha')  ?></small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Jenis Usaha</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="jenis_usaha" name="jenis_usaha" placeholder="Jenis Usaha" required>
						<small class="form-text text-danger"><?= form_error('jenis_usaha')  ?></small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Alamat Usaha</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="alamat_usaha" name="alamat_usaha" placeholder="Alamat Usaha" required>
						<small class="form-text text-danger"><?= form_error('alamat_usaha')  ?></small>
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
