<!DOCTYPE html>
<html>
<head>
	<title>print</title>
	 <link href="https://id.allfont.net/allfont.css?fonts=arial-narrow" rel="stylesheet" type="text/css" />
<style type="text/css">
	.line-title{
		border: 0;
		border-style: inset;
		border-top: 0,5px solid #000;
		width: 700px;
	}

	body{
		font-size: 16px;
		font-family: 'Times new roman';
		margin:0;
	}

	.kotak {
		width: 800px;
	}

	.kiri{
		width: 14.5%;
		float: left;
	}
	.kanan{
		width: 80%;
		float: left;
		margin-top: -15px;
	}

	.clear{
		clear: left;
	}

	.content-table{
		border-collapse: collapse;
		margin: 25px 0;
		font-size: 0.9em;
		min-width: 100%;
	}
	.content-table thead tr {
		color: black;
		text-align: left;;
		font-weight: bold;


	}
	.content-table th, .content-table td {
		padding: 5px 5px;
		border: 1px solid black
	}
		.stempel{
		width : 110px; 
		margin-left: 0px; 
		margin-top: -60px;
		position: absolute;
		z-index: -1;
	}

	.ttd{
		width : 170px; 
		margin-left: 50px; 
		margin-top: -30px;
		position: absolute;
		z-index: -1;
		font-weight: 1000;
	}

	#img{
	    margin-left:20px;
	}
	#cerdas{
	    margin-top: 20px;
	}
</style>

</head>
<body>

    <img src="<?= base_url('assets/img/kop_surat_baru.png') ?>" alt="" width="800" id="img">

	<p align="center">Bismillahirrahmanirrahim</p>

	<p align="center" style="font-weight: bold; font-size: 16px">
		SURAT KEPUTUSAN <br>
		DEKAN FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN <br>
		Nomor : ......./KEP/II.3.AU/FKIP/B/<?= date('Y'); ?>
	</p>
	<p align="center" style="font-weight: bold; font-size: 16px">TENTANG</p>

	<p align="center" style="font-weight: bold; font-size: 16px; text-transform: uppercase;">
		PENETAPAN DOSEN PEMBIMBING SKRIPSI<br>
		<?php $nama_prodi = $this->tendik->nama_prodi($data->id_prodi) ?>
		PROGRAM STUDI <?= $nama_prodi ?> <br>
		TAHUN AKADEMIK 2021/2022
	</p>

	<div class="kotak" style="text-align: justify;">
		<div class="kiri">
			Menimbang &nbsp;&nbsp;&nbsp;&nbsp;: 
		</div>
		<div class="kanan">
			<ol type="1">
				<li>Bahwa skripsi mahasiswa merupakan tugas akhir pelaksanaan perkuliahan program studi Sarjana Strata I (S.1) pada program studi <?= $nama_prodi ?> Fakultas Keguruan dan Ilmu Pendidikan Universitas Muhammadiyah Kendari
				</li>
				<li>Bahwa untuk kelancaran penelitian dan penyusunan skripsi mahasiswa maka perlu mendapatkan bimbingan dari dosen yang berkompeten
				</li>
				<li>
					Bahwa berdsarkan poin a dan b diatas, maka perlu ditetapkan dalam surat keputusan
				</li>
			</ol>
		</div>

		<div class="clear"></div>
	</div>
	<div class="kotak" style="text-align: justify; margin-top: -10px">
		<div class="kiri">
			Mengingat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
		</div>
		<div class="kanan">
			<ol type="a">
				<li>Peraturan Pemerintah No. 60 Tahun 1999 tentang Pendidikan Tinggi.</li>
				<li>Surat Keputusan PP Muhammadiyah No. 19/SKKP/II.B/1.a/1999 tanggal 04 Dzulqa'idah 1419 H/20 Februari 1999 M tentang Qaidah Perguruan Tinggi Muhammadiyah.</li>
				<li>Keputusan Menteri Pendidikan Nasional RI No. 149/D/O/2001.</li>
				<li>Statuta Universitas Muhammadiyah Kendari Tahun 2001</li>
				<li>Peraturan Akademik Universitas Muhammadiyah Kendari 2004</li>
			</ol>
		</div>

		<div class="clear"></div>
	</div>
	<div class="kotak" style="text-align: justify; margin-top: -10px">
		<div class="kiri">
			Memperhatikan 
		</div>
		<div class="kanan">
			<ol>
				<li>Hasil keputusan rapat pimpinan Fakultas Keguruan dan Ilmu Pendidikan UMK tanggal 29 Mei 2010</li>
			</ol>
		</div>

		<div class="clear"></div>
	</div>

	<p align="center" style="font-weight: bold; font-size: 16px;">
		MEMUTUSKAN		
	</p>
	<div class="kotak" style="text-align: justify;" style="margin-top:-15px">
		<div class="kiri">
			Menetapkan : 
		</div>
		<div class="kanan">
		</div>

		<div class="clear"></div>
	</div>
	<div class="kotak" style="text-align: justify;">
		<div class="kiri">
			Pertama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 
		</div>
		<div class="kanan">
			<p>Mengangkat nama-nama tersebut sebagai dosen pembimbing skripsi mahasiswa Program Studi <?= $nama_prodi ?> Fakultas Keguruan dan Ilmu Pendidikan Universitas Muhammadiyah Kendari sebagai berikut :</p>
			<p style="margin-top: -10px"> Nama Dosen Pembimbing Skripsi</p>
				<ol type="1" style="margin-top: -10px">
					<?php 	$pembimbing1 = $this->registrasi->nama_pembimbing1($data->id_pembimbing1);
        					$pembimbing2 = $this->registrasi->nama_pembimbing2($data->id_pembimbing2); ?>

					<li> Pembimbing I : <?= $pembimbing1 ?></li>
					<li> Pembimbing II : <?= $pembimbing2 ?></li>
				</ol>
			<p style="margin-top: -10px">Nama Mahasiswa Bimbingan dan Judul</p>
				<ol type="1" style="margin-top: -10px">
					<li>Nama Mahasiswa : <?= $data->nama_mhs ?></li>
					<li>Nim : <?= $data->nim ?></li>
					<li>Judul : <span style="text-transform: capitalize;"><?= $data->judul ?></span></li>
				</ol>
			
		</div>
		<div class="clear"></div>
	</div>
		<!--<p style="page-break-before: always;">&nbsp;</p>-->
	<div class="kotak" style="text-align: justify;margin-top: -10px">
		<div class="kiri">
			Kedua &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 
		</div>
		<div class="kanan">
			<p>Surat keputusan ini berlaku sejak tanggal ditetapkan, dengan ketentuan apabila terdapat kekeliruan didalamnya akan diadakan perbaikan sebagaimana mestinya</p>
		</div>

		<div class="clear"></div>
	</div>
	<div class="kotak" style="text-align: justify; margin-top: -10px">
		<div class="kiri">
			Ketiga &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 
		</div>
		<div class="kanan">
			<p>Surat keputusan ini diberikan kepada yang bersangkutan untuk dilaksanakan sebagai amanah</p>
		</div>

		<div class="clear"></div>
	</div>

	<div style="margin-left: 460px; margin-top:-5px">
		<p>Ditetapkan di : Kendari</p>
		<p style="margin-top: -13px">Pada tanggal : <?= pengaturan_tgl($data->tgl_insert) ?></p>
		<p style=" font-weight: bold;">
			Dekan FKIP
		</p>
			<!--<img src="<?= base_url('assets/adm/img/stempel.png') ?>" class="stempel">-->
   <!--     	<img src="<?= base_url('assets/adm/img/ttd_indah.png') ?>" class="ttd">-->
		<p style="margin-top: 50px; font-weight: bold; border-bottom: 1px solid black; width: 200px">
			Tri Indah Rusli, S.Pd., M.Pd.
		</p>
		<p style="font-weight: bold; margin-top: -15px">NIDN. 0907068602</p>
	</div>

<script type="text/javascript">window.onload = function() { window.print(); }</script>

</body>
</html>