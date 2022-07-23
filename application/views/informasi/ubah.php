<!-- left column -->
<!-- <h1 class="mt-3 ml-2"><?= $judul;  ?></h1> -->
<div class="col-md-12 mt-4">
	<!-- general form elements -->
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Tambah Informasi</h3>
		</div>
		<!-- /.card-header -->
		<!-- form start -->
		<form class="form-horizontal" action="" method="POST">
			<input type="hidden" name="id_informasi" value="<?= $informasi['id_informasi'] ?>">
			<div class=" card-body">
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Gambar</label>
					<div class="custom-file col-sm-10">
						<input type="file" id="gambar" name="gambar" value="<?= $informasi['gambar']; ?>">
					</div>
				</div>
				<script>
					// Add the following code if you want the name of the file appear on select
					$(".custom-file-input").on("change", function() {
						var fileName = $(this).val().split("\\").pop();
						$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
					});
				</script>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Judul Informasi</label>
					<div class="col-sm-10">
						<input type="text" id="judul_informasi" name="judul_informasi" class="form-control" placeholder="Judul" value="<?= $informasi['judul_informasi']; ?>">
						<small class="form-text text-danger"><?= form_error('judul_informasi')  ?></small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Keterangan</label>
					<div class="col-sm-10">
						<input type="text" id="ket_informasi" name="ket_informasi" class="form-control" placeholder="Keterangan" value="<?= $informasi['ket_informasi']; ?>">
						<small class="form-text text-danger"><?= form_error('ket_informasi')  ?></small>
					</div>
				</div>
			</div>
			<!-- /.card-body -->
			<div class="card-footer">
				<button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button>
				<a href="<?= base_url('informasi'); ?>" class="btn btn-secondary"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
			</div>
			<!-- /.card-footer -->
		</form>
	</div>
</div>
<!-- /.card-body -->
