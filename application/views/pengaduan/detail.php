<div class="row mt-4">
	<div class="col-md-12 ml-2">
		<div class="card">
			<div class="card-header">
				<h3><strong>Detail Pengaduan</strong></h3>
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td><strong>NIK</strong></td>
							<td><?= $pengaduan['nik'] ?></td>
						</tr>
						<tr>
							<td><strong>Nama Lengkap</strong></td>
							<td><?= $pengaduan['nm_lengkap'] ?></td>
						</tr>
						<tr>
							<td><strong>Tanggal Laporan</strong></td>
							<td><?= $pengaduan['tgl_pengaduan'] ?></td>
						</tr>
						<tr>
							<td><strong>Isi Laporan</strong></td>
							<td><?= $pengaduan['isi_laporan'] ?></td>
						</tr>
						<tr>
							<td><strong>Gambar</strong></td>
							<td><img src="<?= base_url('assets/img/') . $pengaduan['foto']; ?>" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt=""></td>
						</tr>
					</tbody>
				</table>
				<a href="<?= base_url('pengaduan'); ?>" class="btn btn-warning mt-3"><i class="fas fa-arrow-circle-left"></i> Back</a>
			</div>
		</div>
	</div>
</div>
