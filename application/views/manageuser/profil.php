<div class="card mx-auto mt-4" style="max-width: 540px;">
	<div class="card-header ">
		<h3 class="card-title ml-3 text-bold ">Profil Saya</h3>
	</div>
	<!-- <div class="card mb-3 mx-auto" style="max-width: 540px;"> -->
	<div class="row g-0 mt-3 mb-3">
		<div class="col-md-4">
			<img src="<?= base_url('assets/img/profil/') . $user['image']; ?>" class="card-image ml-3" style="height: 180px;">
		</div>
		<div class=" col-md-8">
			<div class="card-body">
				<h5 class="card-title mt-4 mb-3 "><strong><?= $user['nama']; ?></strong></h5>
				<p class="card-text "><?= $user['email']; ?></p>
				<p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']); ?></small></p>
				<!-- <a href="<?= base_url('manageuser'); ?>" class="btn btn-primary mt-5 ml-4"><i class="fas fa-arrow-circle-left"></i> Kembali</a> -->
			</div>
		</div>
	</div>
	<!-- </div> -->
</div>
