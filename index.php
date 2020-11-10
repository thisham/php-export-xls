<?php 
	define('DIR', __DIR__); 
	include "init.php";
	$data = new Model;
	$number = 1;
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=PPDB_" . date("dmY") . ".xlsx");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PPDB Test</title>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>No. Pendaftaran</th>
				<th>NIS</th>
				<th>NISN</th>
				<th>NIK</th>
				<th>Nama Lengkap</th>
				<th>Jenis Kelamin</th>
				<th>Kompetensi Keahlian</th>
				<th>Tinggi Badan</th>
				<th>Berat Badan</th>
				<th>Tempat Lahir</th>
				<th>Tanggal Lahir</th>
				<th>Agama</th>
				<th>Alamat</th>
				<th>No. HP</th>
				<th>Ayah</th>
				<th>Ibu</th>
				<th>Wali</th>
				<th>Asal Sekolah</th>
				<th>Tanggal Pendaftaran</th>
				<th>Verifikasi</th>
				<th>Perekomendasi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data->get() as $get) { ?>
				<tr>
					<td><?= $get['no_pendaftaran'] ?></td>
					<td><?= $get['nis'] ?></td>
					<td><?= $get['nisn'] ?></td>
					<td><?= $get['nik'] ?></td>
					<td><?= $get['nama_lengkap'] ?></td>
					<td><?= $get['jk'] ?></td>
					<td><?= $get['kompetensi_ahli'] ?></td>
					<td><?= $get['tinggi_badan'] ?></td>
					<td><?= $get['berat_badan'] ?></td>
					<td><?= $get['tempat_lahir'] ?></td>
					<td><?= $get['tgl_lahir'] ?></td>
					<td><?= $get['agama'] ?></td>
					<td><?= $get['alamat_siswa'] ?></td>
					<td>'<?= $get['no_hp_siswa'] ?></td>
					<td><?= $get['nama_ayah'] ?></td>
					<td><?= $get['nama_ibu'] ?></td>
					<td><?= $get['nama_wali'] ?></td>
					<td><?= $get['nama_sekolah'] ?></td>
					<td><?= $get['tgl_siswa'] ?></td>
					<td><?= ($get['status_verifikasi'] == 1)? 'Terverifikasi' : '' ?></td>
					<td><?= $get['nama_perekomendasi'] ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>