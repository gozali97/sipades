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
							<td><?= $pindah['kode_surat'] ?></td>
						</tr>
						<tr>
							<td><strong>No Surat</strong></td>
							<td><?= $pindah['no_surat'] ?></td>
						</tr>
						<tr>
							<td><strong>Tanggal Surat</strong></td>
							<td><?= $pindah['tanggal'] ?></td>
						</tr>
						<tr>
							<td><strong>NIK</strong></td>
							<td><?= $pindah['nik'] ?></td>
						</tr>
						<tr>
							<td><strong>Nama Lengkap</strong></td>
							<td><?= $pindah['nm_lengkap'] ?></td>
						</tr>
						<tr>
							<td><strong>Tempat, Tanggal Lahir</strong></td>
							<td><?= $pindah['tmpt_lahir'] ?>, <?= $pindah['tgl_lahir'] ?></td>
						</tr>
						<tr>
							<td><strong>Alamat</strong></td>
							<td><?= $pindah['alamat'] ?></td>
						</tr>
						<tr>
							<td><strong>Jenis Kelamin</strong></td>
							<td><?= $pindah['jk'] ?></td>
						</tr>
						<tr>
							<td><strong>Pekerjaan</strong></td>
							<td><?= $pindah['pekerjaan'] ?></td>
						</tr>
						<tr>
							<td><strong>Alamat Baru</strong></td>
							<td><?= $pindah['alamat_baru'] ?></td>
						</tr>
						<tr>
							<td><strong>Jumlah yang pindah</strong></td>
							<td><?= $pindah['jml_kel'] ?></td>
						</tr>
					</tbody>
				</table>
				<a href="<?= base_url('pindah'); ?>" class="btn btn-warning mt-3"><i class="fas fa-arrow-circle-left"></i> Back</a>
			</div>
		</div>
	</div>
</div>
