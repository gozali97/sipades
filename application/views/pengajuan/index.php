<div class="card card-info mt-3">

	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Surat
		</h3>
	</div>
	<?php if ($this->session->flashdata('flash')) : ?>
		<div class="row mt-3">
			<div class="col-md-6">
				<div class="alert alert-success mt-1 alert-dismissible fade show" role="alert">
					Data Pengajuan Surat <strong>Berhasil</strong> <?= $this->session->flashdata('flash');  ?>.
					<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div class="form-group row">
				<div class="ml-1 col-6">
					<a href="<?= base_url('pengajuan/tambah') ?>" class="btn btn-primary">
						<i class="fa fa-edit"></i> Tambah Data</a>
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
					foreach ($datapengajuan as $dp) { ?>


						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $dp['kode_surat']; ?></td>
							<td><?php echo $dp['no_surat']; ?></td>
							<td><?php echo $dp['tanggal']; ?></td>
							<td><?php echo $dp['nik']; ?></td>
							<td><?php echo $dp['nm_surat']; ?></td>
							<td>
								<?php if ($dp['status_surat'] == 'Proses') : ?>
									<a href="<?= base_url('pengajuan/acc/' . $dp['no_surat']); ?>" title="Tindakan" class="btn btn-warning btn-sm">
										<span class="text-white">ACC</span>
									</a>
								<?php else : ?>
									<a href="#" title="Tindakan" class="btn btn-success btn-sm">
										<span class="text-white">Selesai</span>
									</a>
									<a href="<?= base_url('pengajuan/cetak_surat/' . $dp['no_surat']); ?>" title="Cetak" class="btn btn-success btn-sm">
										<img width="20px" src="<?= base_url('/assets/img/cetak.png') ?>" alt="">
									</a>
								<?php endif; ?>
								<a href="<?= base_url('pengajuan/detail/' . $dp['no_surat']); ?>" title="Detail" class="btn btn-info btn-sm">
									<i class="fa fa-info-circle"></i>
								</a>
								<!-- <a href="<?= base_url('pengajuan/ubah/' . $dp['no_surat']); ?>" title="Ubah" class="btn btn-primary btn-sm">
									<i class="fa fa-edit"></i>
								</a> -->

								<a href="<?= base_url('pengajuan/hapus/' . $dp['no_surat']); ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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
