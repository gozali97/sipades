<div class="row">
	<div class="col-md-12 ml-2">
		<div class="card">
			<div class="card-header">
				<h3><strong>Detail Surat</strong></h3>
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td><strong>Kode Surat</strong></td>
							<td><?= $pengajuan['kode_surat'] ?></td>
						</tr>
						<tr>
							<td><strong>No Surat</strong></td>
							<td><?= $pengajuan['no_surat'] ?></td>
						</tr>
						<tr>
							<td><strong>Tanggal Surat</strong></td>
							<td><?= $pengajuan['tanggal'] ?></td>
						</tr>
						<tr>
							<td><strong>NIK</strong></td>
							<td><?= $pengajuan['nik'] ?></td>
						</tr>
						<tr>
							<td><strong>Nama Lengkap</strong></td>
							<td><?= $pengajuan['nm_lengkap'] ?></td>
						</tr>
						<tr>
							<td><strong>Tempat, Tanggal Lahir</strong></td>
							<td><?= $pengajuan['tmpt_lahir'] ?>, <?= $pengajuan['tgl_lahir'] ?></td>
						</tr>
						<tr>
							<td><strong>Alamat</strong></td>
							<td><?= $pengajuan['alamat'] ?></td>
						</tr>
						<tr>
							<td><strong>Jenis Kelamin</strong></td>
							<td><?= $pengajuan['jk'] ?></td>
						</tr>
						<tr>
							<td><strong>Pekerjaan</strong></td>
							<td><?= $pengajuan['pekerjaan'] ?></td>
						</tr>
						<tr>
							<td><strong>Jenis Surat</strong></td>
							<td><?= $pengajuan['nm_surat'] ?></td>
						</tr>
					</tbody>
				</table>
				<a href="<?= base_url('pengajuan'); ?>" class="btn btn-warning mt-3"><i class="fas fa-arrow-circle-left"></i> Back</a>
			</div>
		</div>
	</div>
</div>
