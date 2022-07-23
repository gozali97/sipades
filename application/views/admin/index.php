<h1 class="mt-4 ml-4"><?= $judul;  ?></h1>
<!-- Main content -->
<div class="content mt-2">
	<div class="container-fluid">
		<div class="row">
			<!-- v_home -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-primary">
					<div class="inner">
						<?php
						$query = "SELECT `nik`,count(`nik`) as penduduk
						FROM `tbl_penduduk`
						";
						$getPen = $this->db->query($query)->row_array();
						// var_dump($getKel);
						// die;
						?>

						<h3><?= $getPen['penduduk']; ?></h3>
						<p>Jumlah Penduduk</p>
					</div>
					<div class="icon">
						<i class="ion ion-person-stalker"></i>
					</div>
					<a href="<?= base_url('penduduk') ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-info">
					<div class="inner">
						<?php
						$query = "SELECT `nm_surat`,count(`nm_surat`) as ket
						FROM `tbl_surat_ket`
						WHERE `nm_surat` = 'Surat Keterangan'
						";
						$getKel = $this->db->query($query)->row_array();
						// var_dump($getKel);
						// die;
						?>

						<h3><?= $getKel['ket']; ?></h3>
						<p>Surat Domisili</p>
					</div>
					<div class="icon">
						<i class="ion ion-information-circled"></i>
					</div>
					<a href="<?= base_url('keterangan') ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-success">
					<div class="inner">
						<?php
						$query = "SELECT `nm_surat`,count(`nm_surat`) as izin
						FROM `tbl_surat_izin`
						WHERE `nm_surat` = 'Surat Izin usaha'
						";
						$getKel = $this->db->query($query)->row_array();
						// var_dump($getKel);
						// die;
						?>
						<h3><?= $getKel['izin']; ?></h3>
						<p>Surat Izin Usaha</p>
					</div>
					<div class="icon">
						<i class="ion ion-cube"></i>
					</div>
					<a href="<?= base_url('izin') ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-secondary">
					<div class="inner">
						<?php
						$query = "SELECT `nm_surat`,count(`nm_surat`) as meninggal
						FROM `tbl_surat_mati`
						WHERE `nm_surat` = 'Surat Kematian'
						";
						$getKel = $this->db->query($query)->row_array();
						// var_dump($getKel);
						// die;
						?>
						<h3><?= $getKel['meninggal']; ?></h3>
						<p>Surat Kematian</p>
					</div>
					<div class="icon">
						<i class="ion ion-man"></i>
					</div>
					<a href="<?= base_url('meninggal') ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-danger">
					<div class="inner">
						<?php
						$query = "SELECT `nm_surat`,count(`nm_surat`) as pindah
						FROM `tbl_surat_pindah`
						WHERE `nm_surat` = 'Surat Pindah'
						";
						$getKel = $this->db->query($query)->row_array();
						// var_dump($getKel);
						// die;
						?>
						<h3><?= $getKel['pindah']; ?></h3>
						<p>Surat Pindah</p>
					</div>
					<div class="icon">
						<i class="ion ion-person"></i>
					</div>
					<a href="<?= base_url('pindah') ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-warning">
					<div class="inner">
						<?php
						$query = "SELECT `nik`,count(`nik`) as aduan
						FROM `tbl_pengaduan`
						";
						$getKel = $this->db->query($query)->row_array();
						// var_dump($getKel);
						// die;
						?>
						<h3><?= $getKel['aduan']; ?></h3>
						<p>Pangaduan Masyarakat</p>
					</div>
					<div class="icon">
						<i class="ion ion-chatboxes"></i>
					</div>
					<a href="<?= base_url('pengaduan') ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-light">
					<div class="inner">
						<?php
						$query = "SELECT `id_informasi`,count(`id_informasi`) as informasi
						FROM `tbl_informasi`
						";
						$getKel = $this->db->query($query)->row_array();
						// var_dump($getKel);
						// die;
						?>
						<h3><?= $getKel['informasi']; ?></h3>
						<p>Informasi</p>
					</div>
					<div class="icon">
						<i class="ion-alert"></i>
					</div>
					<a href="<?= base_url('pengaduan') ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
