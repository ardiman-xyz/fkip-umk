<!DOCTYPE html>
<html>
<head>
	<title>print ket Aktif Kuliah</title>
	<!-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"> -->
<style type="text/css">
	.line-title{
		border: 0;
		border-style: inset;
		border-top: 0,5px solid #000;
		margin-top: -10px;
		width: 650px;
	}

	body{
		font-size: 16px;
		font-family: Times New Roman;
		/*word-spacing: 2px;*/
	}




</style>

</head>
<body>

	<img src="assets/img/logo.png" width="80" style="position: absolute; height: auto; margin-left: 20px; margin-top: 15px">
					<h3 align="center" style="word-spacing: 3px; margin-left: 10px; font-family: 18px">
						UNIVERSITAS MUHAMMADIYAH KENDARI <br>
						FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN
					</h3>
					<div align="center" style="margin-top: -20px">
						<small align="center" style="font-size: 13px; font-weight: 0; word-spacing: 0px">Alamat : Jl. KH. Ahmad Dahlan No. 10 Kendari Telp. 0401-3008780,<br> 
						fax. 0401-3930710, E-mail: fkip_umk@yahoo.com</small><br><br>
					</div>	
					
	<hr class="line-title">
<br>
	<table>
		<tr>	
			<td>Nama Mahasiswa &nbsp;&nbsp;&nbsp;</td> <td> &nbsp; : <?= $nama_mhs ?></td>
		</tr>
		<tr>	
			<td>Nim &nbsp;&nbsp;&nbsp;</td> <td> &nbsp; : <?= $data->nim ?></td>
		</tr>
		<tr>	
			<td>Semester / thn akademik&nbsp;&nbsp;&nbsp;</td> <td> &nbsp; : <?= $data->semester ?> - <?= $data->thn_akademik ?></td>
		</tr>
		<tr>	
			<td>Jurusan &nbsp;&nbsp;&nbsp;</td> <td> &nbsp; : <?= $prodi ?></td>
		</tr>
		<tr>	
			<td>IP Semester lalu &nbsp;&nbsp;&nbsp;</td> <td> &nbsp; : <?= $data->ip_smt_lalu ?></td>
		</tr>
		<tr>	
			<td>Jumlah sks yang diberikan &nbsp;&nbsp;&nbsp;</td> <td> &nbsp; : <?= $data->jml_sks ?> sks</td>
		</tr>
		<tr>	
			<td>Matakuliah yang diprogram &nbsp;&nbsp;&nbsp;</td> <td> &nbsp; : </td>
		</tr>
	</table>
	<br>
	<table border="1" style=" border-collapse: collapse; border: 1px solid #000; " width="100%">
		<thead>
			<tr style=" padding: 8px 20px;">
				<th style=" padding: 8px 20px;" width="20px">No</th>
				<th style=" padding: 8px 20px;" align="center">Nama Matakuliah</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($matakuliah as $key => $dt): ?>
				<tr style=" padding: 8px 20px;">
					<td style=" padding: 8px 20px;"><?= $key+1 ?></td>
					<td style=" padding: 8px 20px;"><?= $dt->nama_matakuliah ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>

	<p>Komentar Penasehat Akademik : </p>
	<p>"<?= $data->komentar_pa ?>"</p>

	<br>
	<p>Penasehat Akademik</p>
	<p style="margin-top: 50px"><?= $nama_pa ?></p>
	
</body>
</html>