<!-- left column -->
<!-- <h1 class="mt-3 ml-2"><?= $judul;  ?></h1> -->
<div class="col-md-12 mt-4">
	<!-- general form elements -->
	<div class="card card-light">
		<div class="card-header">
			<h3 class="card-title text-bold">Tambah Pengajuan Surat</h3>
		</div>
		<!-- /.card-header -->
		<div class="container overflow-hidden p-4">
			<div class="row gy-5">
				<div class="col-6 ml-5">
					<div class="card" style="width: 18rem;">
						<img class="card-img-top" src="<?= base_url(); ?>assets/img/suratket1.jpg" width="12px">
						<div class="card-body">
							<center>
								<h5 class=" text-bold">Surat Keterangan Domisili</h5>
								<a href="<?= base_url('pengajuan_user/keterangan'); ?>" class="btn btn-primary mx-0">Buat Surat</a>
							</center>

						</div>
					</div>
				</div>
				<div class="col-3">
					<div class="card" style="width: 18rem;">
						<img class="card-img-top" src="<?= base_url(); ?>assets/img/suratket1.jpg" width="12px">
						<div class="card-body">
							<center>
								<h5 class=" text-bold">Surat Izin Usaha</h5>
								<a href="<?= base_url('pengajuan_user/izin'); ?>" class="btn btn-primary mx-0">Buat Surat</a>
							</center>

						</div>
					</div>
				</div>
				<div class="col-6 ml-5 mt-3">
					<div class="card" style="width: 18rem;">
						<img class="card-img-top" src="<?= base_url(); ?>assets/img/suratket1.jpg" width="12px">
						<div class="card-body">
							<center>
								<h5 class=" text-bold">Surat Kematian</h5>
								<a href="<?= base_url('pengajuan_user/meninggal'); ?>" class="btn btn-primary mx-0">Buat Surat</a>
							</center>

						</div>
					</div>
				</div>
				<div class="col-3 mt-3">
					<div class="card" style="width: 18rem;">
						<img class="card-img-top" src="<?= base_url(); ?>assets/img/suratket1.jpg" width="12px">
						<div class="card-body">
							<center>
								<h5 class=" text-bold">Surat Keterangan Pindah</h5>
								<a href="<?= base_url('pengajuan_user/pindah'); ?>" class="btn btn-primary mx-0">Buat Surat</a>
							</center>

						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- /.card-body -->
