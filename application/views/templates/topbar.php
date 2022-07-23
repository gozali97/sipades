<nav class="sb-topnav navbar navbar-expand navbar-dark bg-success">
	<a class="navbar-brand" href="#">
		<img src="<?= base_url(); ?>assets/img/logo.png" class="brand-image mr-2 mb-1" width="30px" height="30px" style="opacity: .8">
		<strong>SIPADES</strong> </a>
	<button class="btn btn-link btn-sm order-1 order-lg-0 mb-1" id="sidebarToggle" href="#"><i class="fas fa-bars bg-grey-800"></i></button>
	<h5 class=" text-light ml-3"><strong>SISTEM PELAYANAN SURAT DESA DUKUHMULYO</strong> </h5>
	<!-- Navbar-->
	<ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#"><span class="mr-2 d-none d-lg-inline text-gray-600 ">
					<?= $user['nama'] ?>
				</span>
				<img src="<?= base_url('assets/img/profil/') . $user['image']; ?>" style="width: 30px; height:30px" class="img-circle elevation-2">
			</a>
			<div class="dropdown-menu dropdown-menu dropdown-menu-right">
				<div class="dropdown-divider"></div>
				<a href="<?= base_url('manageuser/profil'); ?>" class="dropdown-item">
					<i class="fas fa-user mr-2"></i> Akun
				</a>

				<div class="dropdown-divider"></div>
				<a href="<?= base_url('auth/logout') ?>" class="dropdown-item">
					<i class="fas fa-sign-out-alt mr-2"></i> Logout
				</a>
			</div>
		</li>
	</ul>
	</ul>
</nav>
