<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
	<div class="container">
		<a class="navbar-brand" href="#">
			<img src="<?= base_url(); ?>assets/img/logo.png" class="brand-image mr-2 mb-1" width="30px" height="30px" style="opacity: .8">
			<strong>SIPADES</strong> </a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto active">
				<li class="nav-item">
					<a class="nav-link text-light text-bold" href="<?= base_url('home'); ?>">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-light text-bold" href="<?= base_url('home/profil'); ?>">Profil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-light text-bold" href="<?= base_url('home/layanan'); ?>">Layanan Desa</a>
				</li>
				</li>
				<li class="nav-item">
					<a class="nav-link text-light text-bold" href="<?= base_url('home/kontak'); ?>">Contact</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-light text-bold" href="<?= base_url('auth'); ?>">Login</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
