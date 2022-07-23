<!-- left column -->
<div class="col-md-12">
	<!-- general form elements -->
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Edit Data Penduduk</h3>
		</div>
		<!-- /.card-header -->
		<!-- form start -->
		<form class="form-horizontal" action="<?= base_url('penduduk/update/' . $penduduk['nik']) ?>" method="POST">
			<div class=" card-body">
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">NIK</label>
					<div class="col-sm-10">
						<input type="number" name="nik" class="form-control" placeholder="NIK" value="<?= $penduduk['nik']; ?>">
						<small class="form-text text-danger"><?= form_error('nik')  ?></small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama</label>
					<div class="col-sm-10">
						<input type="text" name="nm_lengkap" class="form-control" placeholder="Nama Lengkap" value="<?= $penduduk['nm_lengkap']; ?>">
						<small class="form-text text-danger"><?= form_error('nm_lengkap')  ?></small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">TTL</label>
					<div class="col-5">
						<input type="text" name="tmpt_lahir" class="form-control" placeholder="Tempat Lahir" value=" <?= $penduduk['tmpt_lahir']; ?>">
						<small class="form-text text-danger"><?= form_error('tmpt_lahir')  ?></small>
					</div>
					<div class="col-5">
						<div class="input-group">
							<input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" value=" <?= $penduduk['tgl_lahir']; ?>">
							<small class="form-text text-danger"><?= form_error('tgl_lahir')  ?></small>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-10">
					<input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?= $penduduk['alamat']; ?>">
					<small class="form-text text-danger"><?= form_error('alamat')  ?></small>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Agama</label>
				<div class="col-sm-10">
					<input type="text" name="agama" class="form-control" placeholder="Agama" value="<?= $penduduk['agama']; ?>">
					<small class="form-text text-danger"><?= form_error('agama')  ?></small>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis kelamin</label>
				<div class="col-sm-10">
					<select name="jk" class="form-control select2bs4" style="width: 100%;">
						<option selected="selected">--pilih--</option>
						<option>Laki-Laki</option>
						<option>Perempuan</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Perkawinan</label>
				<div class="col-sm-10">
					<select name="stts_kawin" class="form-control select2bs4" style="width: 100%;">
						<option selected="selected">--pilih--</option>
						<option>Kawin</option>
						<option>Belum Kawin</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pekerjaan</label>
				<div class="col-sm-10">
					<input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" value="<?= $penduduk['pekerjaan']; ?>">
					<small class="form-text text-danger"><?= form_error('pekerjaan')  ?></small>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Penduduk</label>
				<div class="col-sm-10">
					<select name="stts_penduduk" class="form-control select2bs4" style="width: 100%;">
						<option selected="selected">--pilih--</option>
						<option>Penduduk tetap</option>
						<option>Pendatang</option>
					</select>
				</div>
			</div>
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
		<button type="submit" class="btn btn-info">Update</button>
		<button type="submit" class="btn btn-secondary">Batal</button>
	</div>
	<!-- /.card-footer -->
	</form>
</div>
</div>
<!-- /.card-body -->
