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
	    width: 100%
	}
	 
	.table1, th, td {
	    border: 1px solid #999;
	    padding: 3px 5px;
	}

	
	#kiri {
		float:left;
		width: 120px;
		margin-left: 20px;
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

	<img src="assets/img/logo.png" width="70" style="position: absolute; height: auto; margin-left: 30px; margin-top: -2px">
					<h4 align="center" style="word-spacing: 3px; margin-left: 10px; font-family: 18px">
						UNIVERSITAS MUHAMMADIYAH KENDARI <br>
						FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN <br>
					<small align="center" style="font-size: 10px; font-weight: 0; word-spacing: 0px">Alamat : Jl. KH. Ahmad Dahlan No. 10 Kendari Telp. 0401-3008780, fax. 0401-3930710, E-mail: fkip_umk@yahoo.com</small>
					</h4>
	<hr class="line-title">
	<p align="center" style="font-weight: bold; margin-top: 20px">
		NILAI PLP
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
				<th align="center">Komponen</th>
				<th align="center">Bobot</th>
				<th align="center">Nilai</th>
				<th align="center">Nilai Akhir</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>Nilai pelaksanaan pembelajaran di kampus oleh dosen pembimbing</td>
				<td align="center">40</td>
				<td align="center"><?= $data_nilai->nilai1 ?></td>
				<td align="center"><?= $data_nilai->n_akhir1 ?></td>
			</tr>
			<tr>
				<td>2</td>
				<td>Nilai pelaksanaan pembelajaran di sekolah dan aspek personal dan sosial</td>
				<td align="center">40</td>
				<td align="center"><?= $data_nilai->nilai2 ?></td>
				<td align="center"><?= $data_nilai->n_akhir2 ?></td>
			</tr>
			<tr>
				<td>3</td>
				<td>Nilai laporan PPL II</td>
				<td align="center">20</td>
				<td align="center"><?= $data_nilai->nilai3 ?></td>
				<td align="center"><?= $data_nilai->n_akhir3 ?></td>
			</tr>
			<tr>
				<?php $jumlah = $data_nilai->n_akhir1 + $data_nilai->n_akhir2 + $data_nilai->n_akhir3 ?>
				<td align="center" colspan="4"><b>JUMLAH</b></td>
				<td align="center"><b><?= $jumlah ?></b></td>
			</tr>
			<tr>
				<?php $skor_akhir = $jumlah / 100; ?>
				<td align="center" colspan="4"><b>SKOR AKHIR</b></td>
				<td align="center"><b><?= $skor_akhir ?></b></td>
			</tr>
		</tbody>
	</table>


</body>
</html>
