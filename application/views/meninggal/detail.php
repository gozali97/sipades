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
							<td><?= $Meninggal['kode_surat'] ?></td>
						</tr>
						<tr>
							<td><strong>No Surat</strong></td>
							<td><?= $Meninggal['no_surat'] ?></td>
						</tr>
						<tr>
							<td><strong>Tanggal Surat</strong></td>
							<td><?= $Meninggal['tanggal'] ?></td>
						</tr>
						<tr>
							<td><strong>NIK</strong></td>
							<td><?= $Meninggal['nik'] ?></td>
						</tr>
						<tr>
							<td><strong>Nama Lengkap</strong></td>
							<td><?= $Meninggal['nm_lengkap'] ?></td>
						</tr>
						<tr>
							<td><strong>Tempat, Tanggal Lahir</strong></td>
							<td><?= $Meninggal['tmpt_lahir'] ?>, <?= $Meninggal['tgl_lahir'] ?></td>
						</tr>
						<tr>
							<td><strong>Alamat</strong></td>
							<td><?= $Meninggal['alamat'] ?></td>
						</tr>
						<tr>
							<td><strong>Jenis Kelamin</strong></td>
							<td><?= $Meninggal['jk'] ?></td>
						</tr>
						<tr>
							<td><strong>Pekerjaan</strong></td>
							<td><?= $Meninggal['pekerjaan'] ?></td>
						</tr>
						<tr>
							<td><strong>Meninggal Hari</strong></td>
							<td><?= $Meninggal['hari_m'] ?></td>
						</tr>
						<tr>
							<td><strong>Meninggal Tanggal</strong></td>
							<td><?= $Meninggal['tgl_m'] ?></td>
						</tr>
						<tr>
							<td><strong>Sebab Meninggal</strong></td>
							<td><?= $Meninggal['sebab'] ?></td>
						</tr>
						<tr>
							<td><strong>Meninggal di</strong></td>
							<td><?= $Meninggal['alamat'] ?></td>
						</tr>
					</tbody>
				</table>
				<a href="<?= base_url('meninggal'); ?>" class="btn btn-warning mt-3"><i class="fas fa-arrow-circle-left"></i> Back</a>
			</div>
		</div>
	</div>
</div>
