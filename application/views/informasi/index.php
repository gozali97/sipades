       <!-- <?php var_dump($penduduk); ?> -->
       <!-- /.card-header -->

       <div class="card card-info mt-3">
       	<div class="card-header">
       		<h3 class="card-title">
       			<i class="fa fa-table"></i> Data Informasi
       		</h3>
       	</div>
       	<!-- /.card-header -->
       	<div class="col-sm-12 mt-4">
       		<?php if ($this->session->flashdata('flash')) : ?>
       			<div class="row mt-3">
       				<div class="col-md-6">
       					<div class="alert alert-success mt-1 alert-dismissible fade show" role="alert">
       						Informasi <strong>Berhasil</strong> <?= $this->session->flashdata('flash');  ?>.
       						<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
       					</div>
       				</div>
       			</div>
       		<?php endif; ?>
       		<div class="form-group row">
       			<div class="ml-1 col-6">
       				<a href="<?= base_url('informasi/tambah') ?>" class="btn btn-primary">
       					<i class="fa fa-edit"></i> Tambah</a>
       			</div>
       		</div>
       		<?php if (empty($info)) : ?>
       			<div class="alert alert-danger mt-3" role="alert">
       				Data Informasi tidak ditemukan
       			</div>
       		<?php endif; ?>
       		<br>
       		<table id="example1" class="table table-bordered table-hover mt-4">
       			<thead>
       				<tr>
       					<th>No</th>
       					<th>GAMBAR</th>
       					<th>JUDUL</th>
       					<th>KETERANGAN</th>
       					<th>TANGGAL</th>
       					<th>AKSI</th>
       				</tr>
       			</thead>
       			<tbody>
       				<?php $no = 1;
						foreach ($info as $i) { ?>
       					<tr>
       						<td><?= $no++; ?></td>
       						<td><img src="<?= base_url('assets/img/') . $i['gambar']; ?>" class="rounded" width="150px"></td>
       						<td><?= $i['judul_informasi']; ?></td>
       						<td><?= $i['ket_informasi']; ?></td>
       						<td><?= $i['tanggal']; ?></td>
       						<td>
       							<!-- <a href="<?= base_url('penduduk/detail/' . $i['id_informasi']); ?>"> <button type="button" class="btn btn-info" title="Detail"><i class="fas fa-user"></i></button></a> -->
       							<a href="<?= base_url('informasi/ubah/' . $i['id_informasi']); ?>"><button type="button" class="btn btn-success" title="Ubah"><i class="fas fa-edit"></i></button></a>
       							<a href="<?= base_url('informasi/hapus/' . $i['id_informasi']); ?>"><button type="button" class="btn btn-danger mt-1" title="Hapus" onclick="return confirm('Yakin hapus ?');"><i class="fas fa-trash-alt"></i></button></a>
       						</td>
       					</tr>
       				<?php } ?>
       			</tbody>
       		</table>
       	</div>
