<!DOCTYPE html>
<html>
<head>
	<title>print</title>
<link rel="shortcut icon" href="<?= base_url() ?>assets/img/profil.png">
		
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

	h1{
	  font-family: sans-serif;
	}
	 
	 /*design table 1*/
	.table1 {
	    font-family: sans-serif;
	    color: #232323;
	    border-collapse: collapse;
	    width: 100%;
	}
	 
	.table1, th, td {
	    border: 1px solid #999;
	    padding: 8px 15px;
	}
	

	#kiri {
		float:left;
		width: 120px;
		margin-left: 20px
	}
	#kanan{
		margin-left: -10px
	}

	.clear{
		clear: both;
	}

</style>

</head>
<body>

	<img src="assets/img/logo.png" width="70" style="position: absolute; height: auto; margin-left: 20px; margin-top: -2px">
					<h4 align="center" style="word-spacing: 3px; margin-left: 10px; font-family: 18px">
						UNIVERSITAS MUHAMMADIYAH KENDARI <br>
						FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN <br>
					<small align="center" style="font-size: 10px; font-weight: 0; word-spacing: 0px">Alamat : Jl. KH. Ahmad Dahlan No. 10 Kendari Telp. 0401-3008780, fax. 0401-3930710, E-mail: fkip_umk@yahoo.com</small>
					</h4>
	<hr class="line-title">
	<p align="center" style="font-weight: bold; margin-top: 20px">
		NILAI MAGANG
	</p>

	<div class="head">
		<div id="kiri">Nama </div>
		<div id="kanan"> : <?= $data_mhs->nama  ?></div>
	</div>
	<div class="clear"></div>
	<div class="head">
		<div id="kiri">Prodi </div>
		<div id="kanan"> : <?= $nama_prodi ?></div>
	</div>
	<div class="clear"></div>
	<div class="head">
		<div id="kiri">Nim </div>
		<div id="kanan"> : <?= $data_mhs->nim  ?></div>
	</div>
	<div class="clear"></div>
	<div class="head">
		<div id="kiri">Lokasi </div>
		<div id="kanan"> : <?= $nama_sekolah  ?></div>
	</div>
	<div class="clear"></div>
	<div class="head">
		<div id="kiri">Program </div>
		<div id="kanan"> : <?= $data_mhs->program  ?></div>
	</div>
	<div class="clear"></div>
	<div class="head">
		<div id="kiri">Nama Pamong </div>
		<div id="kanan"> : <?= $nama_pamong  ?></div>
	</div>
	<div class="clear"></div>
	<div class="head">
		<div id="kiri">Tahun </div>
		<div id="kanan"> : <?= date('Y')  ?>-<?= cari_status_akademik(); ?></div>
	</div>
	<div class="clear"></div>
	<br>

	<table cellspacing='0' style="margin-top: 10px" class="table1">
		<thead>
			<tr>
				<th>No</th>
				<th align="center">Aspek Penilaian</th>
				<th align="center">Skor</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>Tata tulis dan sistematika penulisan</td>
				<td align="center"><?= $data_nilai->nilai1 ?></td>
			</tr>
			<tr>
				<td>2</td>
				<td>Pemahaman latar belakang kegiatan magang</td>
				<td align="center"><?= $data_nilai->nilai2 ?></td>
			</tr>
			<tr>
				<td>3</td>
				<td>Pemahaman terhadap profil sekolah mitra</td>
				<td align="center"><?= $data_nilai->nilai3 ?></td>
			</tr>
			<tr>
				<td>4</td>
				<td>Pemahaman terhadap visi misi mitra</td>
				<td align="center"><?= $data_nilai->nilai4 ?></td>
			</tr>
			<tr>
				<td>5</td>
				<td>Pemahaman terhadap pengembangan kegiatan akademik mitra</td>
				<td align="center"><?= $data_nilai->nilai5 ?></td>
			</tr>
			<tr>
				<td>6</td>
				<td>Pemahaman terhadap kegiatan non akademik mitra</td>
				<td align="center"><?= $data_nilai->nilai6 ?></td>
			</tr>
			<tr>
				<td>7</td>
				<td>Kesesuian simpulan saran</td>
				<td align="center"><?= $data_nilai->nilai7 ?></td>
			</tr>
			<tr>
				<td>8</td>
				<td>Kelengkapan Laporan</td>
				<td align="center"><?= $data_nilai->nilai8 ?></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><b>JUMLAH</b></td>
				 <?php $jumlah = $data_nilai->nilai1 + $data_nilai->nilai2 + $data_nilai->nilai3 + $data_nilai->nilai4 + $data_nilai->nilai5 + $data_nilai->nilai6 + $data_nilai->nilai7 + $data_nilai->nilai8  ?>
				<td align="center"><b><?= $jumlah ?></b></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><b>SKOR AKHIR</b></td>
				 <?php $skor_akhir = ($jumlah/32) * 100; ?>
				<td align="center"><b><?= $skor_akhir ?></b></td>
			</tr>
		</tbody>
	</table>


</body>
</html>
