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
			<i class="fa fa-table"></i> Data Surat Surat Izin
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div class="form-group row">
				<div class="ml-1 col-6">
					<a href="<?= base_url('pengajuan_user/izin') ?>" class="btn btn-primary">
						<i class="fa fa-edit"></i> Tambah Data</a>
				</div>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<!-- <th>Kode Surat</th> -->
						<th>No Surat</th>
						<th>Tanggal Surat</th>
						<th>NIK</th>
						<th>Nama Surat</th>
						<th>Keterangan</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					foreach ($suratizin as $si) { ?>


						<tr>
							<td><?php echo $no++; ?></td>
							<!-- <td><?php echo $si['kode_surat']; ?></td> -->
							<td><?php echo $si['no_surat']; ?></td>
							<td><?php echo $si['tanggal']; ?></td>
							<td><?php echo $si['nik']; ?></td>
							<td><?php echo $si['nm_surat']; ?></td>
							<td><?php echo $si['ket']; ?></td>
							<td>
								<?php if ($si['status_surat'] == 'Proses') : ?>
									<a href="#" title="Tindakan" class="btn btn-warning btn-sm">
										<span class="text-white">Proses</span>
									</a>
								<?php elseif ($si['status_surat'] == 'Ditolak') : ?>
									<a href="#" title="Tindakan" class="btn btn-danger btn-sm">
										<span class="text-white">Ditolak</span>
									</a>
									</a>
								<?php else : ?>
									<a href="#" title="Tindakan" class="btn btn-success btn-sm">
										<span class="text-white">Selesai</span>
									</a>
								<?php endif; ?>
								<!-- <a href="<?= base_url('pengajuan/detail/' . $ls['no_surat']); ?>" title="Detail" class="btn btn-info btn-sm">
									<i class="fa fa-info-circle"></i>
								</a>
								<!-- <a href="<?= base_url('pengajuan/ubah/' . $dp['no_surat']); ?>" title="Ubah" class="btn btn-primary btn-sm">
									<i class="fa fa-edit"></i>
								</a> -->
								<!-- <a href="<?= base_url('pengajuan/cetak_surat/' . $dp['no_surat']); ?>" title="Cetak" class="btn btn-success btn-sm">
									<img width="20px" src="<?= base_url('/assets/img/cetak.png') ?>" alt="">
								</a>
								<a href="<?= base_url('pengajuan/hapus/' . $dp['no_surat']); ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i>
								</a> -->
							</td>
						</tr>

					<?php } ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->
