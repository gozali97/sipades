<div class="card card-info mt-3">
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
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pengaduan Masyarakat
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div class="form-group row">
				<!-- <div class="ml-1 col-6">
					<a href="<?= base_url('pengaduan/tambah') ?>" class="btn btn-primary">
						<i class="fa fa-edit"></i> Tambah Data</a>
				</div> -->
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
						<th>NIK</th>
						<th>Nama</th>
						<th>Tanggal</th>
						<th>Isi Laporan</th>
						<th>Foto</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					foreach ($pengaduan as $pm) { ?>


						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $pm['nik']; ?></td>
							<td><?php echo $pm['nm_lengkap']; ?></td>
							<td><?php echo $pm['tgl_pengaduan']; ?></td>
							<td><?php echo $pm['isi_laporan']; ?></td>
							<td><img src="<?= base_url('assets/img/') . $pm['foto']; ?>" class="rounded" width="150px"></td>
							<td>
								<?php if ($pm['status'] == 'Proses') : ?>
									<a href="<?= base_url('pengaduan/balas/' . $pm['id_pengaduan']); ?>" title="Tindakan" class="btn btn-warning btn-sm">
										<span class="text-white">Balas</span>
									</a>
								<?php elseif ($pm['status'] == 'Ditanggapi') : ?>
									<a href="<?= base_url('pengaduan/acc/' . $pm['id_pengaduan']); ?>" t class="btn btn-info btn-sm">
										<span class="text-white">Proses</span>
									</a>
								<?php else : ?>
									<a href="#" title="Tindakan" class="btn btn-success btn-sm">
										<span class="text-white">Selesai</span>
									</a>
									<!-- <a href="<?= base_url('pengaduan/cetak_surat/' . $pm['id_pengaduan']); ?>" title="Cetak" class="btn btn-success btn-sm">
										<img width="20px" src="<?= base_url('/assets/img/cetak.png') ?>" alt="">
									</a> -->
								<?php endif; ?>
								<a href="<?= base_url('pengaduan/detail/' . $pm['id_pengaduan']); ?>" title="Detail" class="btn btn-info btn-sm">
									<i class="fa fa-info-circle"></i>
								</a>
								<!-- <a href="<?= base_url('meninggal/ubah/' . $pm['id_pengaduan']); ?>" title="Ubah" class="btn btn-primary btn-sm">
									<i class="fa fa-edit"></i>
								</a> -->

								<a href="<?= base_url('pengaduan/hapus/' . $pm['id_pengaduan']); ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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
