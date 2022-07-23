<!-- Sidebar -->
<div id="layoutSidenav">
	<div id="layoutSidenav_nav">
		<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
			<div class="sb-sidenav-menu">
				<div class="nav">
					<!-- Query menu -->
					<?php
					$role_id = $this->session->userdata('role_id');
					$queryMenu = "SELECT `user_menu`.`id`, `menu`  
                      FROM `user_menu` JOIN `user_access_menu` 
                        ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                     WHERE `user_access_menu`.`role_id` = $role_id
                  ORDER BY `user_access_menu`.`menu_id` ASC
                  ";
					$menu = $this->db->query($queryMenu)->result_array();
					?>

					<!-- looping menu -->
					<?php foreach ($menu as $m) : ?>
						<div class="sb-sidenav-menu-heading">
							<?= $m['menu']; ?>
						</div>

						<!-- sub-menu sesuai menu -->
						<?php
						$menuId = $m['id'];
						$querySubMenu = "SELECT *  
											FROM `user_sub_menu` JOIN `user_menu` 
						  					ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
					   						WHERE `user_sub_menu`.`menu_id` = $menuId
											AND `user_sub_menu`.`is_active` = 1
											";
						$SubMenu =  $this->db->query($querySubMenu)->result_array();
						?>

						<?php foreach ($SubMenu as $sm) : ?>
							<?php if ($judul == $sm['judul']) : ?>
								<a class="nav-item active">
								<?php else : ?>
									<a class="nav-item">
									<?php endif; ?>
									<a class="nav-link" href="<?= base_url($sm['url']); ?> ">
										<div class="sb-nav-link-icon"><i class="<?= $sm['icon']; ?>"></i></div>
										<span><?= $sm['judul']; ?></span>
									</a>
								<?php endforeach; ?>
							<?php endforeach; ?>
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
								<div class="sb-nav-link-icon"><i class="fas fa-info-circle"></i></div>
								Lihat Surat
								<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
							</a>
							<div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
								<nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
									<a href="<?= base_url('pengajuan_user/view_ket'); ?>" class="nav-link">
										<i class="far fa-circle nav-icon mr-2 text-warning"></i>Surat Domisili
									</a>
									<a href="<?= base_url('pengajuan_user/view_izin'); ?>" class="nav-link">
										<i class="far fa-circle nav-icon mr-2 text-warning"></i>Surat Izin Usaha
									</a>
									<a href="<?= base_url('pengajuan_user/view_mati'); ?>" class="nav-link">
										<i class="far fa-circle nav-icon mr-2 text-warning"></i>Surat Kematian
										<!-- </a>
									<a href="<?= base_url('domisili'); ?>" class="nav-link">
										<i class="far fa-circle nav-icon mr-2 text-warning"></i>Surat Domisili
									</a> -->
										<a href="<?= base_url('pengajuan_user/view_pindah'); ?>" class="nav-link">
											<i class="far fa-circle nav-icon mr-2 text-warning"></i>Surat Pindah
										</a>
							</div>
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="false" aria-controls="collapsePages">
								<div class="sb-nav-link-icon"><i class="fas fa-paste"></i></div>
								Pengaduan
								<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
							</a>
							<div class="collapse" id="collapsePages2" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
								<nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
									<a href="<?= base_url('pengaduanuser'); ?>" class="nav-link">
										<i class="far fa-circle nav-icon mr-2 text-warning"></i>Data Pengaduan
									</a>
									<a href="<?= base_url('pengaduanuser/tambah'); ?>" class="nav-link">
										<i class="far fa-circle nav-icon mr-2 text-warning"></i>Tambah Pengaduan
									</a>
							</div>
							<div class="sb-sidenav-menu-heading">Addons</div>
							<a class="nav-link" href="<?= base_url('auth/logout'); ?>">
								<div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt "></i></div>
								Logout
							</a>
				</div>
		</nav>
	</div>
	<div id="layoutSidenav_content">
		<main>
			<div class="container-fluid">


				<!-- <div class="sb-sidenav-menu-heading">Interface</div>
					<a class="nav-link" href="#">
						<div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>
						Data Pengunjung
					</a>
					<a class="nav-link" href="#">
						<div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
						Data Penduduk
					</a>
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
						<div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
						Kelola Surat
						<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
					</a>
					<div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
						<nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
								<i class="far fa-circle nav-icon mr-4"></i>Surat KTP
							</a>
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
								<i class="far fa-circle nav-icon mr-4"></i>Surat Kelahiran
							</a>
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
								<i class="far fa-circle nav-icon mr-4"></i>Surat Kematian
							</a>
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
								<i class="far fa-circle nav-icon mr-4"></i>Surat SKCK
							</a>
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
								<i class="far fa-circle nav-icon mr-4"></i>Surat Domisili
							</a>


						</nav>
					</div>
					<div class="sb-sidenav-menu-heading">Addons</div>
					<a class="nav-link" href="charts.html">
						<div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
						Laporan
					</a>
					<a class="nav-link" href="tables.html">
						<div class="sb-nav-link-icon"><i class="fas fa-print"></i></div>
						Cetak Dokumen
					</a> -->
