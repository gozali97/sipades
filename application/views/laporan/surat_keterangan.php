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
			<i class="fa fa-table"></i> Data Surat Kematian
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div class="form-group row">
				<div class="ml-1 col-6">
					<a class="btn btn-danger" href="<?= base_url('laporan/print_surat_ket'); ?>"><i class="fa fa-print mr-1"></i>Print</a>

				</div>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Pemohon</th>
						<th>Kode Surat</th>
						<th>No Surat</th>
						<th>Tanggal Surat</th>
						<th>NIK</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($suratketerangan as $sk) { ?>


						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $sk['nm_lengkap']; ?></td>
							<td><?php echo $sk['kode_surat']; ?></td>
							<td><?php echo $sk['no_surat']; ?></td>
							<td><?php echo $sk['tanggal']; ?></td>
							<td><?php echo $sk['nik']; ?></td>
							<!-- <td>
								<a href="<?= base_url('pengajuan/aksi/' . $ds['id_pengajuan_surat']); ?>" title="Tindakan" class="btn btn-warning btn-sm">
									<span class="text-white">ACC</span>
								</a>
								<a href="<?= base_url('pengajuan/detail/' . $ds['id_pengajuan_surat']); ?>" title="Detail" class="btn btn-info btn-sm">
									<i class="fa fa-info-circle"></i>
								</a>
								<a href="<?= base_url('pengajuan/ubah/' . $ds['id_pengajuan_surat']); ?>" title="Ubah" class="btn btn-primary btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="<?= base_url('pengajuan/ubah/' . $ds['id_pengajuan_surat']); ?>" title="Cetak" class="btn btn-success btn-sm">
									<img width="20px" src="<?= base_url('/assets/img/cetak.png') ?>" alt="">
								</a>
								<a href="<?= base_url('pengajuan/hapus/' . $ds['id_pengajuan_surat']); ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i>
									</>
							</td> -->
						</tr>

					<?php } ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->
