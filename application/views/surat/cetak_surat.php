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
	}

	body{
		font-size: 16px;
		font-family: sans-serif;
		word-spacing: 2px;
	}


</style>

</head>
<body>

	<img src="assets/img/logo.png" width="80" style="position: absolute; height: auto;">
	<table style="width: 100%;">
		<tr>
			<td align="center">
				<span style="font-weight: bold; font-size: 20px">
					UNIVERSITAS MUHAMMADIYAH KENDARI <br>
					FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN <br>
					SK. MENDIKNAS NO. 149/D/0/2001 <br>
				</span>
					<small style="font-size: 10px">Kantor Pusat : Jl. KH. Ahmad Dahlan No. 10 Kendari Telp. 0401-3008780, fax. 0401-3930710</small>
			</td>
		</tr>
	</table>
	
	<hr class="line-title"><br><br>

	<table>
		<tr><td>Nomor </td> <td> : ..... /II.O/G.b/<?= date("Y"); ?></td></tr>
		<tr><td>Lampiran </td> <td> : - </td></tr>
		<tr><td>Perihal </td> <td> : <b>Izin Penelitian</b></td></tr>
	</table>
	<br>
	<table>
		<tr><td>Yth. BADAN PENELITIAN DAN PENGEMBANGAN <br>
		PROVINSI SULAWESI TENGGARA <br>
		DI- <br>
		<div style="margin-left: 30px">KENDARI</div></td></tr>
	</table>
	<br>

	<p>Dengan hormat,</p>
	<p>Dimohon kesediaan Bapak/Ibu untuk memberikan izin kepada mahasiswa :</p>
	<table style="margin-left: 20px;">
		<tr><td>Nama </td><td> : <b><?= $data->nama  ?></b></td></tr>
		<tr><td>No. Stambuk </td><td> : <?= $data->nim ?></td></tr>
		<tr><td>Semester </td><td> : <?= $data->semester ?></td></tr>
		<?php $nama_prodi   = $this->prodi->nama_jurusan($data->prodi); ?>
		<tr><td>Jurusan/Program Studi </td><td> : Ilmu Pendidikan/<?= $nama_prodi ?></td></tr>
	</table>
	<p></p>
	<p></p>
	
	<p style="text-align:justify;">Untuk mengadakan penelitian pada daerah/kantor/sekolah yang bapak/saudara pimpin dalam rangka penyusunan Skripsi sebagai syarat untuk memperoleh gelar Sarjana Pendidikan pada Fakultas Keguruan dan Ilmu Pendidikan Universitas Muhammadiyah Kendari dengan judul : </p>
	<p></p>

	<p style="font-style: italic; font-weight: bold; text-transform: uppercase;">"<?= $data->judul_penelitian  ?>"</p>
	<p></p>

	<p>Atas perhatian dan kerjasama yang baik kami ucapkan terima kasih.</p>

	<p style="margin-left: 430px">Kendari, <?= tanggal_indo(date('Y-m-d')) ?> M.</p>
	<p style="margin-left: 430px"><b>Dekan FKIP</b></p>
	<p style="margin-top: 80px; margin-left: 430px"></p>
	<p style="margin-left: 430px; border-bottom: 1px solid #000; width: 220px"><b>Tri Indah Rusli. S.Pd., M.Pd.</b></p>
	<p style="margin-left: 430px; margin-top: -7px;" ><b>NIDN. 0907068602</b></p>

</body>
</html>