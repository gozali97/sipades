</div>
</main>
<!-- footer -->
<footer class="py-4 bg-light mt-auto">
	<div class="container-fluid">
		<div class="d-flex align-items-center justify-content-between small">
			<div class="text-muted mx-auto ">Copyright &copy; Ahmad Gozali <?= date('Y'); ?></div>
		</div>
	</div>
</footer>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url(); ?>assets/dist/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url(); ?>assets/dist/assets/demo/chart-area-demo.js"></script>
<script src="<?= base_url(); ?>assets/dist/assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url(); ?>assets/dist/assets/demo/datatables-demo.js"></script>
<script>
	$('custom-file-input').on('change', function() {
		let fileName = $(this).val().split('\\').pop;
		$(this).next('.custom-file-label').addClass("selected").html(filename);
	});
</script>
<script>
	$(function() {
		$("#example1").DataTable();
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"dom": 'Bfrtip',
			"buttons": [
				'copy', 'csv', 'excel', 'pdf', 'print'
			]
		});
	});
</script>

<script>
	$(function() {
		//Initialize Select2 Elements
		$('.select2').select2()

		//Initialize Select2 Elements
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})
	})
</script>

<script type="module">
	import {
		Toast
	} from 'bootstrap.esm.min.js'

	Array.from(document.querySelectorAll('.toast'))
		.forEach(toastNode => new Toast(toastNode))
</script>
</body>

</html>
