<!-- left column -->
<!-- <h1 class="mt-3 ml-2"><?= $judul;  ?></h1> -->
<div class="col-md-12 mt-4">
	<!-- general form elements -->
	<div class="card card-info">
		<div class="card-header">
			<h3 class="card-title">Ubah Pengajuan Surat</h3>
		</div>
		<!-- /.card-header -->
		<!-- form start -->
		<form class="form-horizontal" action="" method="POST">
			<input type="hidden" name="id_pengajuan_surat" value="<?= $pengajuan['id_pengajuan_surat'] ?>">
			<div class=" card-body">
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Kode surat</label>
					<div class="col-sm-10">
						<select name="nm_surat" class="form-control select2bs4" style="width: 100%;">
							<?php foreach ($kode_surat as $ks) : ?>
								<?php if ($ks == $pengajuan['kode_surat']) : ?>
									<option value="<?= $ks; ?>" selected><?= $ks; ?></option>
								<?php else : ?>
									<option value="<?= $ks; ?>"><?= $ks; ?></option>
								<?php endif; ?>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">No Surat</label>
					<div class="col-sm-10">
						<input type="number" name="no_surat" class="form-control" placeholder="No Surat" value="<?= $pengajuan['no_surat']; ?>">
						<small class="form-text text-danger"><?= form_error('no_surat')  ?></small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Tanggal Surat</label>
					<div class="col-sm-10">
						<input type="text" name="tanggal" class="form-control" placeholder="Tanggal Surat" value="<?= $pengajuan['tanggal']; ?>">
						<small class="form-text text-danger"><?= form_error('tanggal')  ?></small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">NIK</label>
					<div class="col-sm-10">
						<input type="text" name="nik" class="form-control" placeholder="Tanggal Surat" value="<?= $pengajuan['nik']; ?>">
						<small class="form-text text-danger"><?= form_error('nik')  ?></small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Jenis surat</label>
					<div class="col-sm-10">
						<select name="nm_surat" class="form-control select2bs4" style="width: 100%;">
							<?php foreach ($jenis_surat as $js) : ?>
								<?php if ($js == $pengajuan['nm_surat']) : ?>
									<option value="<?= $js; ?>" selected><?= $js; ?></option>
								<?php else : ?>
									<option value="<?= $js; ?>"><?= $js; ?></option>
								<?php endif; ?>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
			</div>
			<!-- /.card-body -->
			<div class="card-footer">
				<button type="submit" name="ubah" class="btn btn-info">Simpan</button>
				<a href="<?= base_url('pengajuan'); ?>" class="btn btn-secondary">Kembali</a>
			</div>
			<!-- /.card-footer -->
		</form>
	</div>
</div>
<!-- /.card-body -->
