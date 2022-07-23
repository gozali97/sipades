<div class="row mt-4">
	<div class="col-md-12 ml-2">
		<div class="card">
			<div class="card-header">
				<h3><strong>Tanggapan</strong></h3>
			</div>
			<div class="card-body">
				<form action="" method="post">
					<input type="hidden" name="id_tanggapan" value="<?= $aduan['id_tanggapan'] ?>">
					<div class="form-group row">
						<label for="tanggapan" class="col-sm-3 col-form-label">Balasan</label>
						<div class="col-sm-8">
							<textarea name="tanggapan" class="form-control" id="tanggapan" rows="4" required></textarea>
							<small id="helpId" class="text-muted"><?php echo form_error('tanggapan', '<div class="alert alert-danger mt-2">', '</div>'); ?></small>
						</div>
					</div>
					<br>
					<div class="form-group row justify-content-center">
						<button type="submit" name="ubah" class="btn btn-info"><i class="fas fa-save"></i> Balas </button>
					</div>
				</form>
				<a href="<?= base_url('pengaduan'); ?>" class="btn btn-warning mt-3"><i class="fas fa-arrow-circle-left"></i> Back</a>
			</div>
		</div>
	</div>
</div>
