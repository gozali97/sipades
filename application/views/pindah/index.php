<div class="card card-info mt-3">

	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Surat Keterangan Pindah
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<?php if ($this->session->flashdata('flash')) : ?>
			<div class="row mt-3">
				<div class="col-md-6">
					<div class="alert alert-success mt-1 alert-dismissible fade show" role="alert">
						Data Surat pindah <strong>Berhasil</strong> <?= $this->session->flashdata('flash');  ?>
					</div>
				</div>
			<?php endif; ?>
			<div class="table-responsive">
				<div class="form-group row">
					<div class="ml-1 col-6">
						<a href="<?= base_url('pindah/tambah') ?>" class="btn btn-primary">
							<i class="fa fa-edit"></i> Tambah</a>
					</div>
					<!-- <div class="col-5">
					<div class="row mr-3">
						<div class="col-md-12">
							<form action="" method="POST">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Cari Surat" name="keyword">
									<button class="btn btn-primary" type="submit">Cari</button>
								</div>
							</form>
						</div>
					</div>
				</div>-->
				</div>
				<br>
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Surat</th>
							<th>No Surat</th>
							<th>Tanggal Surat</th>
							<th>NIK</th>
							<th>Nama Surat</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						foreach ($pindah as $sp) { ?>


							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $sp['kode_surat']; ?></td>
								<td><?php echo $sp['no_surat']; ?></td>
								<td><?php echo $sp['tanggal']; ?></td>
								<td><?php echo $sp['nik']; ?></td>
								<td><?php echo $sp['nm_surat']; ?></td>
								<td>
									<a href="<?= base_url('pindah/detail/' . $sp['no_surat']); ?>" title="Detail" class="btn btn-info btn-sm">
										<i class="fa fa-info-circle"></i>
									</a>
									<?php if ($sp['status_surat'] == 'Proses') : ?>
										<a href="<?= base_url('pindah/acc/' . $sp['no_surat']); ?>" title="Acc" class="btn btn-warning btn-sm">
											<i class="fa fa-check-circle"></i>
										</a>
										<a href="<?= base_url('pindah/denied/' . $sp['no_surat']); ?>" title="Tolak" class="btn btn-secondary btn-sm">
											<i class="fa fa-times-circle"></i>
										</a>
									<?php elseif ($sp['status_surat'] == 'Ditolak') : ?>
										<a href="#" title="ditolak" class="btn btn-danger btn-sm">
											<span class="text-white">Ditolak</span>
										</a>
									<?php else : ?>
										<a href="#" title="Selesai" class="btn btn-success btn-sm">
											<span class="text-white">Selesai</span>
										</a>
										<a href="<?= base_url('pindah/cetak_surat/' . $sp['no_surat']); ?>" title="Cetak" class="btn btn-success btn-sm">
											<img width="20px" src="<?= base_url('/assets/img/cetak.png') ?>" alt="">
										</a>
									<?php endif; ?>

									<!-- <a href="<?= base_url('pindah/ubah/' . $sp['no_surat']); ?>" title="Ubah" class="btn btn-primary btn-sm">
									<i class="fa fa-edit"></i>
								</a> -->

									<a href="<?= base_url('pindah/hapus/' . $sp['no_surat']); ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
										<i class="fa fa-trash"></i>
									</a>
								</td>
							</tr>

						<?php } ?>
					</tbody>
					</tfoot>
				</table>
			</div>
			</div>
			<!-- /.card-body -->
