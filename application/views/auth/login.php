<div class="login-box ">
	<div class="card rounded">
		<div class="card-body login-card-body">
			<img src="<?= base_url(); ?>assets/img/logo.png" class="brand-image mx-auto d-block mb-2 " width="60" height="70">
			<h3 class=" text-bold text-center mb-2">MASUK <span class="text-primary">SIPADES</span> </h3>
			<hr>
			<?= $this->session->flashdata('message'); ?>
			<form method="post" action="<?= base_url('auth'); ?>">
				<div class="input-group mb-4">
					<input type="text" class="form-control" placeholder="Email" id="email" name="email" value="<?= set_value('email'); ?>">
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
					<input type="password" class="form-control" id="password" name="password" placeholder="Password">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<small class="text-danger">
					<?= form_error('password'); ?>
				</small>
				<p class="mb-4">
					<a href="<?= base_url('auth/forgotpassword'); ?>">I forgot my password</a>
				</p>
				<button type="submit" class="btn btn-primary btn-block mt-4">Masuk</button>
			</form>
			<p class="ml-5 mt-4">Belum punya akun? silahkan <a href="<?= base_url('auth/registrasi'); ?>">Daftar.</a></p>

			<center><a href="<?= base_url('home'); ?>">Home</a></center>
		</div>
		<!-- /.login-card-body -->
	</div>
</div>
