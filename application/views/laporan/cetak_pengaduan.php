<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Print Laporan Pengaduan</title>

	<style>
		table,
		th,
		td {
			border: 1px solid black;
			border-collapse: collapse;
			text-align: center;
		}
	</style>
</head>

<body>
	<table style="width:100%">
		<tr>
			<th>NO</th>
			<th>NIK</th>
			<th>NAMA</th>
			<th>Tanggal Pengaduan</th>
			<th>Isi Laporan</th>
			<!-- <th>Foto</th> -->
		</tr>
		<?php $no = 1;
		foreach ($laporan as $l) : ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $l['nik']; ?></td>
				<td><?php echo $l['nm_lengkap']; ?></td>
				<td><?php echo $l['tgl_pengaduan']; ?></td>
				<td><?php echo $l['isi_laporan']; ?></td>
				<!-- <td><?php echo $l['foto']; ?></td> -->
			</tr>
		<?php endforeach; ?>
	</table>
	<script type="text/javascript">
		window.print();
	</script>
</body>

</html>
