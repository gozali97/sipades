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
							<td><?= $izin['kode_surat'] ?></td>
						</tr>
						<tr>
							<td><strong>No Surat</strong></td>
							<td><?= $izin['no_surat'] ?></td>
						</tr>
						<tr>
							<td><strong>Tanggal Surat</strong></td>
							<td><?= $izin['tanggal'] ?></td>
						</tr>
						<tr>
							<td><strong>NIK</strong></td>
							<td><?= $izin['nik'] ?></td>
						</tr>
						<tr>
							<td><strong>Nama Lengkap</strong></td>
							<td><?= $izin['nm_lengkap'] ?></td>
						</tr>
						<tr>
							<td><strong>Tempat, Tanggal Lahir</strong></td>
							<td><?= $izin['tmpt_lahir'] ?>, <?= $izin['tgl_lahir'] ?></td>
						</tr>
						<tr>
							<td><strong>Alamat</strong></td>
							<td><?= $izin['alamat'] ?></td>
						</tr>
						<tr>
							<td><strong>Jenis Kelamin</strong></td>
							<td><?= $izin['jk'] ?></td>
						</tr>
						<tr>
							<td><strong>Pekerjaan</strong></td>
							<td><?= $izin['pekerjaan'] ?></td>
						</tr>
						<tr>
							<td><strong>Nama Usaha</strong></td>
							<td><?= $izin['nm_usaha'] ?></td>
						</tr>
						<tr>
							<td><strong>Jenis Usaha</strong></td>
							<td><?= $izin['jenis_usaha'] ?></td>
						</tr>
						<tr>
							<td><strong>Alamat Usaha</strong></td>
							<td><?= $izin['alamat_usaha'] ?></td>
						</tr>
						<tr>
							<td><strong>Keterangan</strong></td>
							<td><?= $izin['keterangan'] ?></td>
						</tr>
					</tbody>
				</table>
				<a href="<?= base_url('izin'); ?>" class="btn btn-warning mt-3"><i class="fas fa-arrow-circle-left"></i> Back</a>
			</div>
		</div>
	</div>
</div>
