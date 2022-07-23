<!-- <h1 class="mt-3 ml-2"><?= $judul;  ?></h1> -->
<div class="row card-info mt-4">
	<div class="col-md-12 ml-2 ">
		<div class="card">
			<div class="card-header ">
				<h3><strong>Data Penduduk</strong></h3>
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td><strong>NIK</strong></td>
							<td><?= $penduduk['nik'] ?></td>
						</tr>
						<tr>
							<td><strong>Nama</strong></td>
							<td><?= $penduduk['nm_lengkap'] ?></td>
						</tr>
						<tr>
							<td><strong>Tempat Lahir</strong></td>
							<td><?= $penduduk['tmpt_lahir'] ?></td>
						</tr>
						<tr>
							<td><strong>Tanggal Lahir</strong></td>
							<td><?= $penduduk['tgl_lahir'] ?></td>
						</tr>
						<tr>
							<td><strong>Alamat</strong></td>
							<td><?= $penduduk['alamat'] ?></td>
						</tr>
						<tr>
							<td><strong>Agama</strong></td>
							<td><?= $penduduk['agama'] ?></td>
						</tr>

						<tr>
							<td><strong>Jenis Kelamin</strong></td>
							<td><?= $penduduk['jk'] ?></td>
						</tr>
						<tr>
							<td><strong>Status Kawin</strong></td>
							<td><?= $penduduk['stts_kawin'] ?></td>
						</tr>
						<tr>
							<td><strong>Pekerjaan</strong></td>
							<td><?= $penduduk['pekerjaan'] ?></td>
						</tr>
						</tr>
						<tr>
							<td><strong>Status Penduduk</strong></td>
							<td><?= $penduduk['stts_penduduk'] ?></td>
						</tr>
					</tbody>
				</table>
				<a href="<?= base_url('penduduk'); ?>" class="btn btn-warning mt-3"><i class="fas fa-arrow-circle-left"></i> Back</a>
			</div>
		</div>
	</div>
</div>
