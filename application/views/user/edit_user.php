<!-- left column -->
<div class="col-md-12 mt-4">
	<!-- general form elements -->
	<div class="card card-olive">
		<div class="card-header">
			<h3 class="card-title">Ubah Data User</h3>
		</div>
		<!-- /.card-header -->
		<!-- form start -->
		<form class="form-horizontal" action="" method="POST">
			<input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
			<div class=" card-body">
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama</label>
					<div class="col-sm-10">
						<input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= $user['nama']; ?>">
						<small class="form-text text-danger"><?= form_error('nama')  ?></small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-10">
						<input type="text" id="email" name="email" class="form-control" placeholder="Email" value="<?= $user['email']; ?>">
						<small class="form-text text-danger"><?= form_error('email')  ?></small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Gambar</label>
					<div class="custom-file col-sm-10">
						<input type="file" id="image" name="image" value="<?= $user['image']; ?>">
					</div>
				</div>
				<script>
					// Add the following code if you want the name of the file appear on select
					$(".custom-file-input").on("change", function() {
						var fileName = $(this).val().split("\\").pop();
						$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
					});
				</script>
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
				<button type="submit" name="ubah_user" class="btn btn-info">Simpan</button>
				<a href="<?= base_url('user'); ?>" class="btn btn-secondary">Kembali</a>
			</div>
			<!-- /.card-footer -->
		</form>
	</div>
</div>
<!-- /.card-body -->
