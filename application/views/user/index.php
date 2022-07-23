<div class="col-sm-12 mt-4">
	<!-- <img src="<?= base_url(); ?>assets/img/user.png" class="rounded img-fluid" sizes="cover"> -->
	<div class="card card-info mt-3">
		<div class="card-header">
			<h2 class="card-title text-bold">
				Pengumuman
			</h2>
		</div>
		<?php foreach ($info as $i) { ?>
			<!-- <div class="card mt-2 ml-3" style="width: 60rem;">
				<img src="<?= base_url('assets/img/') . $i['gambar']; ?>" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title"><?= $i['judul_informasi']; ?></h5>
				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item"><?= $i['ket_informasi']; ?></li>
				</ul>
			</div> -->
			<div class="card mb-3 ml-3 mt-3" style="width: 64rem;">
				<div class="row g-0">
					<div class="col-md-4">
						<img src="<?= base_url('assets/img/') . $i['gambar']; ?>" width="350px" alt="...">
					</div>
					<div class="col-md-8">
						<div class="card-body">
							<h5 class="card-title text-bold"><?= $i['judul_informasi']; ?></h5>
							<p class="card-text"><?= $i['ket_informasi']; ?></p>
							<p class="card-text"><small class="text-muted">Tanggal - <?= $i['tanggal']; ?></small></p>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
