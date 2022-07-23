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
				<div class="ml-1 col-6">
					<a class="btn btn-danger" href="<?= base_url('laporan/print_pengaduan'); ?>"><i class="fa fa-print mr-1"></i>Print</a>

				</div>
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
						</tr>

					<?php } ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->
