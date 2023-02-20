<!DOCTYPE html>
<html>
<head>
	<title>print</title>
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
		
<style type="text/css">
	.line-title{
		border: 0;
		border-style: inset;
		border-top: 0,5px solid #000;
		margin-top: -10px;
		width: 650px;
	}

	body{
		font-size: 14px;
		font-family: arial ,sans-serif, times new roman;
		word-spacing: 2px;
	}

	.content-table{
		border-collapse: collapse;
		margin: 25px 0;
		font-size: 0.9em;
		min-width: 400px;
	}
	.content-table thead tr {
		background-color: grey;
		color: white;
		text-align: left;;
		font-weight: bold;
	}
	.content-table th, .content-table td {
		padding: 12px 15px;
	}

	.content-table, tbody, tr {
		border-bottom: 1px solid #ddd;
	}

	.content-table tbody tr:nth-of-type(even){
		background-color: #f3f3f3;
	}

	.content-table tbody, tr:last-of-type{
		border-bottom: 2px solid grey;
	}
	


</style>

</head>
<body>

	<img src="assets/img/logo.png" width="70" style="position: absolute; height: auto; margin-left: 20px; margin-top: -4px">
					<h4 align="center" style="word-spacing: 3px; margin-left: 10px; font-family: 18px; font-weight: bold">
						UNIVERSITAS MUHAMMADIYAH KENDARI <br>
						FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN <br>
					<small align="center" style="font-size: 10px; font-weight: 0; word-spacing: 0px">Alamat : Jl. KH. Ahmad Dahlan No. 10 Kendari Telp. 0401-3008780, fax. 0401-3930710, E-mail: fkip_umk@yahoo.com</small>
					</h4>
	<hr class="line-title">
	<p align="center" style="font-weight: bold; margin-top: 20px;">
		Data pendaftar ujian
	</p>
	
	<table class="content-table">
		<thead>
			<tr>
				<th>Jenis Ujian</th>
				<th>Nama Mahasiswa</th>
				<th>Nim</th>
				<th>smt</th>
				<th>Prodi</th>
				<th>No. Hp</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data as $data): 
				$nama_prodi   = $this->prodi->nama_jurusan($data->prodi); 
     			$jenis_ujian  = $this->daftar_ujian->nama_jenis_ujian($data->id_jenis_ujian)?>?>
				<tr>
			        <td><?= $jenis_ujian ?></td>
			        <td><?= $data->nama ?></td>
			        <td><?= $data->nim ?></td>
			        <th><?= $data->semester ?></th>
			        <td><?= $nama_prodi ?></td>
			        <td><?= $data->no_hp ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>


</body>
</html>