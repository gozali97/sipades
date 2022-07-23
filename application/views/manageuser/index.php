<div class="card card-info mt-3">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pengguna Sistem
		</h3>
	</div>
	<div class="col-sm-12 mt-2">
		<?php if ($this->session->flashdata('flash')) : ?>
			<div class="row mt-3">
				<div class="col-md-6">
					<div class="alert alert-success mt-1 alert-dismissible fade show" role="alert">
						Data User <strong>Berhasil</strong> <?= $this->session->flashdata('flash');  ?>.
						<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="form-group row mt-2">
			<div class="col-5">
				<a href="<?= base_url('manageuser/tambah_user') ?>" class="btn btn-primary">Tambah Data</a>
			</div>
		</div>
		<?php if (empty($datauser)) : ?>
			<div class="alert alert-danger mt-3" role="alert">
				Data user tidak ditemukan
			</div>
		<?php endif; ?>
		<br>
		<table id="example1" class="table table-bordered table-hover mt-2">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Email</th>
					<th>Level</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$query = "SELECT *, `user_role`.`role`
						FROM `tbl_user` JOIN `user_role`
						ON `tbl_user`.`role_id` = `user_role`.`id` 
						";
				$getUser = $this->db->query($query)->result_array();
				?>
				<?php $no = 1; ?>
				<?php foreach ($getUser as $ds) : ?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?= $ds['nama']; ?></td>
						<td><?= $ds['email']; ?></td>
						<td><?= $ds['role']; ?></td>
						<td>
							<a href="<?= base_url('manageuser/ubah_user/' . $ds['id_user']); ?>">
								<button type="button" class="btn btn-success" title="Ubah">
									<i class="fas fa-edit"></i>
								</button>
							</a>
							<a href="<?= base_url('manageuser/hapus_user/' . $ds['id_user']); ?>">
								<button type="button" class="btn btn-danger" title="Hapus" onclick="return confirm('Yakin hapus ?');">
									<i class="fas fa-trash-alt"></i>
								</button>
							</a>
						</td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
