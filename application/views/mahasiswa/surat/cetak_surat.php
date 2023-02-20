<!DOCTYPE html>
<html>
<head>
	<title>print surat izin penelitian</title>
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
    

   #img {
       margin-top: 20px;
       margin-bottom: 30px;
   }
	#cerdas{
	    margin-top: 20px;
	}
	@page {
        margin: 0 50px;  /* this affects the margin in the printer settings */
    }
    .tanda_tangan {
        margin-left: 480px
    }
    .container {
        padding: 20px;
    }
</style>

</head>
<body>

   

   <div class="container">
        <img src="<?= base_url('assets/img/kop_surat_baru.png') ?>" alt="" width="900" id="img">
    <br>
        <table>
        		<tr><td>Nomor </td> <td> : <?= $data->no_surat ?>/II.3.AU-01/B/<?= date("Y"); ?></td></tr>
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
        		<tr><td>Semester </td><td> : <span style="text-transform: capitalize;"><?= $data->semester ?></span></td></tr>
        		<?php $nama_prodi   = $this->prodi->nama_jurusan($data->prodi); ?>
        		<tr><td>Jurusan/Program Studi </td><td> : Ilmu Pendidikan/<?= $nama_prodi ?></td></tr>
        	</table>
        	
        	<p style="text-align:justify; margin-top: 10px" >Untuk mengadakan penelitian pada daerah/kantor/sekolah yang bapak/saudara pimpin dalam rangka penyusunan Skripsi sebagai syarat untuk memperoleh gelar Sarjana Pendidikan pada Fakultas Keguruan dan Ilmu Pendidikan Universitas Muhammadiyah Kendari dengan judul : </p>
        
        	<p style="font-style: italic; font-weight: bold; text-transform: uppercase;">"<?= $data->judul_penelitian  ?>"</p>
        	<p></p>
        
        	<p>Atas perhatian dan kerjasama yang baik kami ucapkan terima kasih.</p>
            <br><br>
        	<p class="tanda_tangan" >Kendari, <?= tanggal_indo(date('Y-m-d')) ?> M.</p>
        	<p class="tanda_tangan" ><b>Dekan FKIP</b></p>
        	<p class="tanda_tangan"style="margin-top: 60px;"></p>
        	<!--<img src="<?= base_url('assets/adm/img/stempel.png') ?>" class="stempel">-->
        	<!--<img src="<?= base_url('assets/adm/img/ttd_indah.png') ?>" class="ttd">-->
        	<p class="tanda_tangan" style="border-bottom: 1px solid #000; width: 225px"><b>Tri Indah Rusli. S.Pd., M.Pd.</b></p>
        	<p class="tanda_tangan" style="margin-top: -17px;" ><b>NIDN. 0907068602</b></p>
   </div>
        	
<script type="text/javascript">window.onload = function() { window.print(); }</script>
</body>
</html>