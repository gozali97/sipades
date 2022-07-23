       <div class="card card-info mt-3">
       	<div class="card-header">
       		<h3 class="card-title">
       			<i class="fa fa-table"></i> Data Penduduk
       		</h3>
       	</div>
       	<!-- /.card-header -->
       	<div class="col-sm-12 mt-4">
       		<?php if ($this->session->flashdata('flash')) : ?>
       			<div class="row mt-3">
       				<div class="col-md-6">
       					<div class="alert alert-success mt-1 alert-dismissible fade show" role="alert">
       						Data Penduduk <strong>Berhasil</strong> <?= $this->session->flashdata('flash');  ?>.
       						<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
       					</div>
       				</div>
       			</div>
       		<?php endif; ?>
       		<div class="form-group row">
       			<div class="ml-1 col-6">
       				<a href="<?= base_url('penduduk/tambah') ?>" class="btn btn-primary">
       					<i class="fa fa-edit"></i> Tambah Data</a>
       			</div>
       		</div>
       		<?php if (empty($penduduk)) : ?>
       			<div class="alert alert-danger mt-3" role="alert">
       				Data penduduk tidak ditemukan
       			</div>
       		<?php endif; ?>
       		<br>
       		<table id="example1" class="table table-bordered table-hover mt-4">
       			<thead>
       				<tr>
       					<th>No</th>
       					<th>NIK</th>
       					<th>Nama Lengkap</th>
       					<th>Jenis Kelamin</th>
       					<th>Alamat</th>
       					<th>Aksi</th>
       				</tr>
       			</thead>
       			<tbody>
       				<?php $no = 1;
						foreach ($penduduk as $pndk) { ?>
       					<tr>
       						<td><?= $no++; ?></td>
       						<td><?= $pndk['nik']; ?></td>
       						<td><?= $pndk['nm_lengkap']; ?></td>
       						<td><?= $pndk['jk']; ?></td>
       						<td><?= $pndk['alamat']; ?></td>
       						<td>
       							<a href="<?= base_url('penduduk/detail/' . $pndk['nik']); ?>"> <button type="button" class="btn btn-info" title="Detail"><i class="fas fa-user"></i></button></a>
       							<a href="<?= base_url('penduduk/ubah/' . $pndk['nik']); ?>"><button type="button" class="btn btn-success" title="Ubah"><i class="fas fa-edit"></i></button></a>
       							<a href="<?= base_url('penduduk/hapus/' . $pndk['nik']); ?>"><button type="button" class="btn btn-danger" title="Hapus" onclick="return confirm('Yakin hapus ?');"><i class="fas fa-trash-alt"></i></button></a>
       						</td>
       					</tr>
       				<?php } ?>
       			</tbody>
       		</table>
       	</div>
