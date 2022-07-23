<div class="register-box ">
	<div class="card">
		<div class="card-body register-card-body">
			<img src="<?= base_url(); ?>assets/img/logo.png" class="brand-image mx-auto d-block mb-2 mt-1 " width="60" height="70">
			<h3 class=" text-bold text-center mb-4">DAFTAR <span class="text-primary">SIPADES</span> </h3>
			<hr>
			<form action="<?= base_url('auth/registrasi'); ?>" method="post">
				<div class="input-group mb-3">
					<input type="text" id="name" name="nama" class="form-control" placeholder="Full name" value="<?= set_value('nama'); ?>">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-user"></span>
						</div>
					</div>
				</div>
				<small class="text-danger">
					<?= form_error('nama'); ?>
				</small>
				<div class="input-group mb-3">
					<input type="text" id="email" name="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-envelope"></span>
						</div>
					</div>
				</div>
				<small class="text-danger">
					<?= form_error('email'); ?>
				</small>
				<div class="input-group mb-3">
					<input type="password" id="password1" name="password1" class="form-control" placeholder="Password">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<small class="text-danger">
					<?= form_error('password1'); ?>
				</small>
				<div class="input-group mb-3">
					<input type="password" id="password2" name="password2" class="form-control" placeholder="Retype password">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<hr>
				<button type="submit" class="btn btn-primary btn-block mt-2">Daftar Akun</button>
			</form>
			<p class="ml-5 mt-4">Sudah mempunyai akun ? <a href="<?= base_url('auth'); ?>">Login.</a></p>
		</div>
		<!-- /.form-box -->
	</div><!-- /.card -->
</div>
