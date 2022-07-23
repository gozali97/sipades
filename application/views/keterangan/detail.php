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
							<td><?= $keterangan['kode_surat'] ?></td>
						</tr>
						<tr>
							<td><strong>No Surat</strong></td>
							<td><?= $keterangan['no_surat'] ?></td>
						</tr>
						<tr>
							<td><strong>Tanggal Surat</strong></td>
							<td><?= $keterangan['tanggal'] ?></td>
						</tr>
						<tr>
							<td><strong>NIK</strong></td>
							<td><?= $keterangan['nik'] ?></td>
						</tr>
						<tr>
							<td><strong>Nama Lengkap</strong></td>
							<td><?= $keterangan['nm_lengkap'] ?></td>
						</tr>
						<tr>
							<td><strong>Tempat, Tanggal Lahir</strong></td>
							<td><?= $keterangan['tmpt_lahir'] ?>, <?= $keterangan['tgl_lahir'] ?></td>
						</tr>
						<tr>
							<td><strong>Alamat</strong></td>
							<td><?= $keterangan['alamat'] ?></td>
						</tr>
						<tr>
							<td><strong>Jenis Kelamin</strong></td>
							<td><?= $keterangan['jk'] ?></td>
						</tr>
						<tr>
							<td><strong>Pekerjaan</strong></td>
							<td><?= $keterangan['pekerjaan'] ?></td>
						</tr>
						<tr>
							<td><strong>Keterangan</strong></td>
							<td><?= $keterangan['keterangan'] ?></td>
						</tr>
					</tbody>
				</table>
				<a href="<?= base_url('keterangan'); ?>" class="btn btn-warning mt-3"><i class="fas fa-arrow-circle-left"></i> Back</a>
			</div>
		</div>
	</div>
</div>
