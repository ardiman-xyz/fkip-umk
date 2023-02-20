<!DOCTYPE html>
<html>
<head>
	<title>print</title>
	<link href="https://id.allfont.net/allfont.css?fonts=arial-narrow" rel="stylesheet" type="text/css" />
	
	<style type="text/css">
	.line-title{
		border: 1;
		border-style: inset;
		border-top: 0,5px solid #000;
		width: 650px;
		margin-top:-10px;
	}
	
	.stempel{
		width : 110px; 
		margin-left: 365px; 
		margin-top: -60px;
		position: absolute;
		z-index: -1;
	}

	.ttd{
		width : 170px; 
		margin-left: 440px; 
		margin-top: -60px;
		position: absolute;
		z-index: -1;
		font-weight: 1000;
	}

	body{

		font-size: 18px;
		font-family: 'Times new roman';
	}

	.kotak {
		width: 100%;
	}
	
	.container{
		margin: 5px 20px;
	}

	.kiri{
		width: 14.5%;
		float: left;
	}
	.kanan{
		width: 80%;
		float: left;
	}

	.left{

		padding: 5px;
		float: left;
	}

	.right{

		padding: 5px;
		float: left;
	}

	.clear{
		clear: left;
	}

	@page {
        margin: 0 50px;  /* this affects the margin in the printer settings */
    }
    #img {
       margin-top: 20px;
       margin-bottom: 30px;
   }
   .content {
       text-align:justify;
       line-height: 26px
   }
</style>

</head>
<body>


<img src="<?= base_url('assets/img/kop_surat_baru.png') ?>" alt="" width="900" id="img">
     <br>

	<p align="center" style="font-weight: bold;">
		SURAT KETERANGAN TIDAK SEDANG MENERIMA BEASISWA
	</p>
	<p align="center" style="margin-top: -10px">Nomor : <?= $data->no_surat ?>/KET/II.3.AU-01/B/<?= date("Y"); ?></p>
	
	<div class="container">
	    <p style="line-height: 26px">Dekan Fakultas Keguruan dan Ilmu Pendidikan Universitas Muhammadiyah Kendari dengan ini menerangkan :</p>
	<table style="margin-left: 20px;">
		<tr><td>Nama </td> <td> : &nbsp;&nbsp;&nbsp; <b><?= $data->nama ?></b></td></tr>
		<tr><td>Tempat/Tgl. Lahir &nbsp;&nbsp;&nbsp;</td> <td> :  &nbsp;&nbsp;&nbsp; <?= $data->tempat_lahir ?>, <?= tgl_balik($data->tgl_lahir) ?> </td></tr>
		<tr><td>Stambuk </td> <td> :  &nbsp;&nbsp;&nbsp; <?= $data->nim ?></td></tr>
		<?php $nama_prodi   = $this->prodi->nama_jurusan($data->id_prodi); ?>
		<tr><td>Program Studi</td> <td> :  &nbsp;&nbsp;&nbsp; <?= $nama_prodi ?></td></tr>
		<tr><td>Fakultas</td> <td> :  &nbsp;&nbsp;&nbsp; Keguruan dan Ilmu Pendidikan</td></tr>
	</table>

	<p class="content">Mahasiswa tersebut diatas adalah benar-benar Mahasiswa Program Studi <?= $nama_prodi ?> Fakultas Keguruan dan Ilmu Pendidikan Universitas Muhammadiyah Kendari terdaftar pada semester <?= cari_status_akademik() ?> tahun Akademik 2022/2023, yang bersangkutan tidak sedang menerima bantuan Beasiswa dari pihak Universitas Muhammadiyah Kendari. <br>
	    Demikian surat keterangan ini diberikan kepada yang bersangkutan untuk dipergunakan sebagaimana mestinya.</p> <br>

	<p style="margin-left: 450px">Kendari, <?= tanggal_indo(date('Y-m-d')) ?> M.</p>
	<p style="margin-left: 450px"><b>Dekan FKIP</b></p>
	<p style="margin-top: 60px; margin-left: 450px"></p>
	<!--<img src="<?= base_url('assets/adm/img/stempel.png') ?>" class="stempel">-->
	<!--<img src="<?= base_url('assets/adm/img/ttd_indah.png') ?>" class="ttd">-->
	<p style=" margin-left: 450px; border-bottom: 1px solid #000; width: 230px"><b>Tri Indah Rusli. S.Pd., M.Pd.</b></p>
	<p style="margin-left: 450px; margin-top: -17px;" ><b>NIDN. 0907068602</b></p>
	</div>

<script type="text/javascript">window.onload = function() { window.print(); }</script>
</body>
</html>