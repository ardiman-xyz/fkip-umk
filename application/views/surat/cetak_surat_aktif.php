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


</style>

</head>
<body>

	<img src="assets/img/logo.png" width="70" style="position: absolute; height: auto; margin-left: 20px; margin-top: -2px">
					<h4 align="center" style="word-spacing: 3px; margin-left: 10px; font-family: 14px">
						UNIVERSITAS MUHAMMADIYAH KENDARI <br>
						FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN <br>
					<small align="center" style="font-size: 10px; font-weight: 0; word-spacing: 0px">Alamat : Jl. KH. Ahmad Dahlan No. 10 Kendari Telp. 0401-3008780, fax. 0401-3930710, E-mail: fkip_umk@yahoo.com</small>
					</h4>
	<hr class="line-title">
	<p align="center" style="font-weight: bold;">
		SURAT KETERANGAN AKTIF KULIAH
	</p>
	<p align="center" style="margin-top: -10px">Nomor : ...../KET/II.O/G.b/<?= date("Y"); ?></p>
	<br>
	<p>Yang bertanda tangan di bawah ini :</p>
	<table style="margin-left: 15px;">
		<tr><td>Nama </td> <td> : <b>Tri Indah Rusli. S.Pd., M.Pd.</b></td></tr>
		<tr><td>NIDN </td> <td> : 0907068602 </td></tr>
		<tr><td>Pangkat/Gol. Ruang </td> <td> : Penata Muda Tk. I / IIIb</td></tr>
		<tr><td>Jabatan</td> <td> : Dekan Fakultas Keguruan dan Ilmu Pendidikan</td></tr>
	</table>
	<br>

	<p>Dengan ini menerangkan bahwa :</p>
	<table style="margin-left: 15px;">
		<tr><td>Nama </td> <td> : <b><?= $data->nama ?></b></td></tr>
		<tr><td>Tempat/Tanggal Lahir </td> <td> : <?= $data->tempat_lahir ?>/<?= tanggal_indo($data->tgl_lahir) ?> </td></tr>
		<tr><td>NIM</td> <td> : <?= $data->nim ?></td></tr>
		<tr><td>Fakultas</td> <td> : Keguruan dan Ilmu Pendidikan</td></tr>
		<?php $nama_prodi   = $this->prodi->nama_jurusan($data->prodi); ?>
		<tr><td>Jurusan/Program Studi</td> <td> : Ilmu Pendidikan/<?= $nama_prodi ?></td></tr>
		<tr><td>Semester</td> <td> : <?= $data->semester ?></td></tr>
		<tr><td>Alamat</td> <td> : <?= $data->alamat ?></td></tr>
	</table>
	<br>

	<p>Adalah benar mahasiswa tersebut terdaftar dan aktif kuliah pada program studi <?= $nama_prodi ?> FKIP UMK Tahun Akademik 2019/2020 dan bahwa orang tua/wali tersebut adalah : </p>
	<table style="margin-left: 15px;">
		<tr><td>Nama </td> <td> : <?= $data->nama_ortu ?></td></tr>
		<tr><td>NIP/NRP</td> <td> : <?= $data->nip ?></td></tr>
		<tr><td>Pangkat/Golongan</td> <td> : <?= $data->pangkat ?></td></tr>
		<tr><td>Jabatan/pekerjaan</td> <td> : <?= $data->jabatan ?></td></tr>
		<tr><td>Instansi Kantor</td> <td> : <?= $data->instansi ?></td></tr>
		<tr><td>Alamat</td> <td> : <?= $data->alamat_ortu ?></td></tr>
	</table>
	<p>Demikian surat keterangan ini dibuat dengan sebenarnya dan untuk digunakan sebagaimana mestinya.</p>

	<p style="margin-left: 430px">Kendari, <?= tanggal_indo(date('Y-m-d')) ?> M.</p>
	<p style="margin-left: 430px"><b>Dekan FKIP</b></p>
	<p style="margin-top: 100px; margin-left: 430px"></p>
	<p style=" margin-left: 430px; border-bottom: 1px solid #000; width: 220px"><b>Tri Indah Rusli. S.Pd., M.Pd.</b></p>
	<p style="margin-left: 430px; margin-top: -15px;" ><b>NIDN. 0907068602</b></p>

</body>
</html>