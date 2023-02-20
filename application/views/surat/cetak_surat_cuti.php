<!DOCTYPE html>
<html>
<head>
	<title>print</title>
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
		
<style type="text/css">
	body{
		font-size: 14px;
		font-family: arial ,sans-serif, times new roman;
		word-spacing: 2px;
	}

	.header td{
		border: 1px solid black;
		margin:5px;
		padding: 10px;
	}

	.content{
		margin-left: 30px;
	}


</style>

</head>
<body>

	<table align="center" class="header">
		<tr>
			<td >
				<img src="assets/img/logo.png" width="70">
			</td>
			<td ><h4 align="center"><b>Universitas Muhammadiyah Kendari</b></h4>
				<h3 align="center"><b>PERMOHONAN CUTI</b></h3>
			</td>
			<td><h2><b>FORMULIR</b></h2></td></tr>
	</table>
	<br>

	<div class="content">
		<p><b style="margin-right: 15px">Kepada </b> : Yth. Dekan Tri Indah Rusli. S.Pd., M.Pd.</p>
	<p style="margin-left: 78px; margin-top: -20px">Universitas Muhammadiyah Kendari</p>
	<br>

	<p style="margin-top: -20px"><b>Assalamu'alakum Wr. Wb.</b></p>
	<p style=" margin-top: -18px">Yang bertanda tangan di bawah ini, kami mahasiswa Universitas Muhammadiyah Kendari :</p>
	<table style="margin-left: 20px;margin-top: -20px">
		<tr><td>Nama </td> <td> : <b><?= $data->nama  ?></b></td></tr>
		<tr><td>No. Induk/NIM </td> <td> : <?= $data->nim  ?> </td></tr>
		<?php $nama_prodi   = $this->prodi->nama_jurusan($data->prodi); ?>
		<tr><td>Fakultas/Jurusan</td> <td> : FKIP / <?= $nama_prodi ?></td></tr>
		<tr><td>Alamat Asal</td> <td> : <?= $data->alamat_asal  ?></td></tr>
		<tr><td>Telepon/HP</td> <td> : <?= $data->telepon  ?></td></tr>
		<tr><td>Alamat di Kendari</td> <td> : <?= $data->alamat_sekarang  ?></td></tr>
	</table>

	<p>Mengajukan permohonan CUTI SEMENTARA pada : </p>
	<table style=" margin-top: -18px; margin-left: 20px">
		<tr><td>Semester</td><td>: <?= $data->smt ?> (<?= $data->semester  ?>)</td></tr>
		<tr><td>Tahun Akademik</td><td>: <?= $data->thn_akademik  ?></td></tr>
	</table>
	<p>Surat permohonan ini kami ajukan dengan alasan sebagai berikut : </p>
	<p style=" margin-top: -18px"><b><?= $data->alasan ?></b></p>
	<br>

	<p style=" margin-top: -18px">Sebagai pertimbagan kami lampirkan :</p>
	<table style=" margin-top: -18px; text-align: justify;">
		<tr><td>1. </td><td>Surat keterangan dokter (bagi yang alasan cutinya berkaitan dengan masaalah kesehatan)</td></tr>
		<tr>
			<td>2. </td><td>Surat pernyataan dari orang tua wali mahasiswa yang bersangkutan (bagi yang alasan cutinya berkaitan dengan masaalah kesulitan ekonomi)</td>
		</tr>
		<tr>
			<td>3.</td> <td>Surat keterangan atau rekomendasi dari penjabat yang berwenang  (bagi yang alasan cutinya berkaitan dengan alasan lain yang penting dan mendesak)</td>
		</tr>
		<tr>
			<td>4. </td><td>Foto kopi kartu tanda mahasiswa (KTM)</td>
		</tr>
		<tr>
			<td>5. </td><td>Surat keterangan bebas pinjaman dari perpustakaan</td>
		</tr>
		<tr>
			<td>6. </td><td>Surat keterangan bebas laboratorium (bagi program studi tertentu)</td>
		</tr>
		<tr>
			<td>7. </td><td>Surat keterangan bebas administrasi keuangan (IPP dan SPG) dari biro keuagan</td>
		</tr>
		<tr>
			<td>8. </td><td>Kuitansi pembayaran IPP</td>
		</tr>
		<tr>
			<td>9. </td><td>KHS yang ditandatangani oleh ketua program studi</td>
		</tr>
	</table>
	<br>

	<p>Demikian atas pertimbangan dan kebijaksanaan yang diberikan, kami ucapkan terimakasih.</p>
	<p style="margin-top: -18px"><b>Wasalamu'alaikum Wr. Wb</b></p>

	<table>
		<tr>
			<td>
				<p>Mengetahui,;</p>
				<p style="margin-top: -15px">Penasehat Akademik ;</p>
				<p style="margin-top: 30px"></p>
				<p style="margin-top: -10px;" ><b>....................................</b></p>
				</div>
			</td>
			<td>
				<p style="margin-left: 280px">Pemohon,</p>
				<p style="margin-top: 40px; margin-left: 280px"></p>
				<p style="margin-top: -10px; margin-left: 280px" ><b>.....................................</b></p>
				</div>
			</td>
		</tr>
	</table>
	<br>
	<div align="center">
		Menyetujui;
		<p>Ketua Prodi : Tri Indah Rusli. S.Pd., M.Pd.</p>
		<p style="margin-top: 40px;"><b>..................................................</b></p>
	</div>

	<div class="content">
		<p>Tembusan : </p>
		<p>1. Rektor</p>
		<p style="margin-top: -13px">2. Kepala Biro Akademik</p>
	</div>

</body>
</html>