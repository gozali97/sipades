<!-- left column -->
<h1 class="mt-4 ml-2"><?= $judul;  ?></h1>
<div class="col-md-12">
	<!-- general form elements -->
	<div class="card card-olive">
		<div class="card-header">
			<h3 class="card-title">Tambah Data User</h3>
		</div>
		<!-- /.card-header -->
		<!-- form start -->
		<form class="form-horizontal" action="" method="POST">
			<div class=" card-body">
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama</label>
					<div class="col-sm-10">
						<input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
						<small class="form-text text-danger"><?= form_error('nama')  ?></small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-10">
						<input type="text" id="email" name="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>">
						<small class="form-text text-danger"><?= form_error('email')  ?></small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Password</label>
					<div class="col-5">
						<input type="password" id="password1" name="password1" class="form-control" placeholder="Password">
						<small class="form-text text-danger"><?= form_error('password1')  ?></small>
					</div>
					<div class="col-5">
						<div class="input-group">
							<input type="password" id="password2" name="password2" class="form-control" placeholder="Confirm Password">
						</div>
					</div>
				</div>
			</div>
			<!-- /.card-body -->
			<div class="card-footer">
				<button type="submit" class="btn btn-info">Simpan</button>
				<a href="<?= base_url('manageuser'); ?>" class="btn btn-secondary">Kembali</a>
			</div>
			<!-- /.card-footer -->
		</form>
	</div>
</div>
<!-- /.card-body -->
