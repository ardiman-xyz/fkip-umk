<!DOCTYPE html>
<html>
<head>
	<title>print ket Aktif Kuliah</title>
	<!--<link href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap" rel="stylesheet">-->
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
			margin: 0 10px;
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

	.content-table{
		border-collapse: collapse;
		margin: 25px 0;
		min-width: 100%;
	}
	.content-table thead tr {
		color: black;
		text-align: left;;
		font-weight: bold;


	}
	.content-table th, .content-table td {
		padding: 2px 4px;
		border: 1px solid black
	}
    

    	#kolom-3 {
	  width:100%;
	}

	.kolom1 {
	  width:15%;
	  float:left;
	  display:inline;
	  word-wrap:break-word; /* fix for long text breaking sidebar float in IE */
	  overflow:hidden;      /* fix for long non-text content breaking IE sidebar float */
	}

	.kolom2 {
	  width:70%;
	  float:left;
	  display:inline;
	  word-wrap:break-word; /* fix for long text breaking sidebar float in IE */
	  overflow:hidden;
	  text-align: center;      /* fix for long non-text content breaking IE sidebar float */
	}

	.kolom3 {
	  width:15%;
	  float:left;
	  display:inline;
	  word-wrap:break-word; /* fix for long text breaking sidebar float in IE */
	  overflow:hidden;      /* fix for long non-text content breaking IE sidebar float */
	}
	.kolom1 #img{
		margin-top: 8px;
	}
	.kolom3 #img{
		margin-top: 20px
	}
	#cerdas{
	    margin-top: 20px;
	}
	@page {
        margin: 0 50px;  /* this affects the margin in the printer settings */
    }
     #img {
       margin-top: 20px;
       margin-bottom: 30px;
   }
   .margin_left {
       margin-left: 40px;
   }
</style>

</head>
<body>
    
      
      <img src="<?= base_url('assets/img/kop_surat_baru.png') ?>" alt="" width="900" id="img">
     <br>
      
    	<p align="center" style="font-weight: bold;">
    		SURAT KETERANGAN AKTIF KULIAH
    	</p>
    	<p align="center" style="margin-top: -10px">Nomor : <?= $data->no_surat ?>/KET/II.3.AU-01/B/<?= date("Y"); ?></p>
    	<br>
    	Yang bertanda tangan di bawah ini :
    	<p></p>
    	<table class="margin_left">
    		<tr><td width="150px">Nama </td>  <td>: &nbsp;&nbsp;<b>Tri Indah Rusli. S.Pd., M.Pd.</b></td></tr>
    		<tr><td>NIDN </td> <td> : &nbsp;&nbsp;0907068602 </td></tr>
    		<tr><td>Pangkat/Gol. Ruang  </td> <td>  : &nbsp;&nbsp;Penata Muda Tk. I / IIIb</td></tr>
    		<tr><td>Jabatan</td>  <td> :  &nbsp;&nbsp;Dekan Fakultas Keguruan dan Ilmu Pendidikan</td></tr>
    	</table>
    	<p></p>
                
    Dengan ini menerangkan bahwa :
    <p></p>
	<table class="margin_left">
		<tr><td width="150px">Nama </td> <td> : <b>&nbsp;&nbsp;<?= $data->nama ?></b></td></tr>
		<tr><td>Tempat/Tanggal Lahir </td> <td> : &nbsp;&nbsp;<?= $data->tempat_lahir ?>/<?= tanggal_indo($data->tgl_lahir) ?> </td></tr>
		<tr><td>NIM</td> <td> : &nbsp;&nbsp;<?= $data->nim ?></td></tr>
		<tr><td>Fakultas</td> <td>:  &nbsp;&nbsp;Keguruan dan Ilmu Pendidikan</td></tr>
		<?php $nama_prodi   = $this->prodi->nama_jurusan($data->prodi); ?>
		<tr><td>Jurusan/Program Studi</td> <td> :  &nbsp;&nbsp;Ilmu Pendidikan/<span tyle="text-transform"><?= $nama_prodi ?></span></td></tr>
		<tr><td>Semester</td> <td> :  &nbsp;&nbsp;<span style="text-transform"><?= $data->semester ?></span></td></tr>
		<tr><td>Alamat</td> <td> :  &nbsp;&nbsp;<?= $data->alamat ?></td></tr>
	</table>
    <p></p>
	Adalah benar mahasiswa tersebut terdaftar dan aktif kuliah pada program studi <?= $nama_prodi ?> FKIP UMK Tahun Akademik 2022/2023 dan bahwa orang tua/wali tersebut adalah : 
	<p></p>
	<table class="margin_left">
		<tr><td width="150px">Nama </td> <td> :  &nbsp;&nbsp;<?= $data->nama_ortu ?></td></tr>
		<tr><td>NIP/NRP</td> <td> :  &nbsp;&nbsp;<?= $data->nip ?></td></tr>
		<tr><td>Pangkat/Golongan</td> <td> :  &nbsp;&nbsp;<?= $data->pangkat ?></td></tr>
		<tr><td>Jabatan/pekerjaan</td> <td> :  &nbsp;&nbsp;<?= $data->jabatan ?></td></tr>
		<tr><td>Instansi Kantor</td> <td> :  &nbsp;&nbsp;<?= $data->instansi ?></td></tr>
		<tr><td>Alamat</td> <td> :  &nbsp;&nbsp;<?= $data->alamat_ortu ?></td></tr>
	</table>
	<p></p>
	<p>Demikian surat keterangan ini dibuat dengan sebenarnya dan untuk digunakan sebagaimana mestinya.</p>
	<p></p>
	<br>
	<p style="margin-left: 430px">Kendari, <?= tanggal_indo(date('Y-m-d')) ?> M.</p>
	<p style="margin-left: 430px; margin-top: -10px font-weight: 1000"><strong>Dekan FKIP</strong></p>
	<p style="margin-top: 50px; margin-left: 430px"></p>
	<!--<img src="<?= base_url('assets/adm/img/stempel.png') ?>" class="stempel">-->
	<!--<img src="<?= base_url('assets/adm/img/ttd_indah.png') ?>" class="ttd">-->
	<p style=" margin-left: 430px; border-bottom: 1px solid #000; width: 220px;">
		<span id="nama">Tri Indah Rusli. S.Pd., M.Pd.</span>
	</p>
	<div style="margin-left: 430px; margin-top: -10px">
		<b>NIDN. 0907068602</b>
	</div>
	<script type="text/javascript">window.onload = function() { window.print(); }</script>
</body>
</html>