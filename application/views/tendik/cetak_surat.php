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

	body{

		font-size: 16px;
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
</style>

</head>
<body>

    <img src="<?= base_url('assets/img/kop_surat_baru.png') ?>" alt="" width="900" id="img">
    <br>

 
	<p align="center" style="font-family: 'Fira Code';" class="min">Bismillahirrahmanirrahim</p>

	<p align="center" style="font-weight: bold;" class="min">
		SURAT KEPUTUSAN <br>
		DEKAN FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN <br>
		Nomor : <?= $data->no_sk !== null ? $data->no_sk : ".........." ?>/KEP/II.3.AU-01/B/<?= date('Y'); ?>
	</p>
	<p align="center" style="font-weight: bold;">TENTANG</p>

	<div class="container">
	    <p align="center" style="font-weight: bold; text-transform: uppercase;" class="min">
		PENETAPAN DOSEN PENGUJI 
		<?php if ($data->id_jenis_ujian == '1'): ?>
			SEMINAR PROPOSAL PENELITIAN
		<?php elseif ($data->id_jenis_ujian == '2') : ?>
			SEMINAR HASIL PENELITIAN
		<?php else: ?>
			SKRIPSI
		<?php endif ?>
		 MAHASISWA <br>
		PROGRAM STUDI <?= $data->nama_prodi ?> <br>
		TAHUN AKADEMIK 2022/2023
	</p>

	<div class="min">
	    <div class="kotak" style="text-align: justify;">
		<div class="kiri">
			Menimbang &nbsp;: 
		</div>
		<div class="kanan">
			<ol type="a">
				<li>Bahwa 
					<?php if ($data->id_jenis_ujian == '1'): ?>
						proposal penelitan
					<?php elseif ($data->id_jenis_ujian == '2') : ?>
						Hasil Penelitian
					<?php else: ?>
						Skripsi
					<?php endif ?>
				  merupakan rangkaian penyelesaian tugas akhir program Sarjana (S1) mahasiswa Fakultas Keguruan dan Ilmu Pendidikan Universitas Muhammadiyah Kendari
				</li>
				<li>Bahwa 
				    <?php if ($data->id_jenis_ujian == '1'): ?>
						proposal penelitan
					<?php elseif ($data->id_jenis_ujian == '2') : ?>
						Hasil Penelitian
					<?php else: ?>
						Skripsi
					<?php endif ?>

				yang dibuat atau disusun oleh mahasiswa wajib dipertahankan di hadapan tim penguji seminar 
					<?php if ($data->id_jenis_ujian == '1'): ?>
						proposal penelitan
					<?php elseif ($data->id_jenis_ujian == '2') : ?>
						Hasil Penelitian
					<?php else: ?>
						Skripsi
					<?php endif ?>

				</li>
				<li>
					Bahwa berdasarkan poin a dan b diatas, maka perlu ditetapkan dalam surat keputusan
				</li>
			</ol>
		</div>

		<div class="clear"></div>
	</div>
	<div class="kotak min" style="text-align: justify;">
		<div class="kiri">
			Mengingat &nbsp;&nbsp;: 
		</div>
		<div class="kanan" >
			<ol type="a">
				<li>Keputusan PP Muhammadiyah No. 19/SKKP/II.B/I.a/1999</li>
				<li>SK Mendiknas RI No. 149/D/O/2001</li>
				<li>Statuta Universitas Muhammadiyah Kendari tahun 2013</li>
				<li>Undang-undang No.20 Tahun 2003 tentang Sistem Pendidikan Nasional</li>
				<li>Peraturan Akademik Universitas Muhammadiyah Kendari 2004</li>
				<li>Undang-undang No.14 Tahun 2005 Tentang Guru dan Dosen</li>
				<li>Undang-undang No.12 Tentang Pendidikan Tinggi Tahun 2002</li>
				<li>Pedoman PP Muhammadiyah No 02/Pend/1.0/3/2012 Tentang Perguruan Tinggi Muhammadiyah</li>
			</ol>
		</div>

		<div class="clear"></div>
	</div>

	<div class="kotak" style="text-align: justify;">
		<div class="kiri">
			Memperhatikan  &nbsp;: 
		</div>
		<div class="kanan" style="margin-left:20px">
			 Hasil Keputusan Rapat Dosen dan Pemimpin Fakultas Keguruan dan Ilmu Pendidikan UMK Tanggal 24 maret 2017
		</div>

		<div class="clear"></div>
	</div>
	<br>
	</div>

	<p align="center" style="font-weight: bold;" class="min">
		MEMUTUSKAN		
	</p>
	
	<div class="kotak" style="text-align: justify;">
		<div class="kiri">
			Menetapkan  &nbsp;&nbsp;&nbsp;: 
		</div>

		<div class="clear"></div>
	</div>
	
	<div class="kotak" style="text-align: justify;">
		<div class="kiri">
			Pertama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
		</div>
        <div class="kanan" style="margin-left:20px">
            	Mengangkat Tim penguji 
			<?php if ($data->id_jenis_ujian == '1'): ?>
				Seminar proposal 
			<?php elseif ($data->id_jenis_ujian == '2') : ?>
				Seminar Hasil 
			<?php else: ?>
				Skripsi
			<?php endif ?>
			mahasiswa sebagaimana terlampir
        </div>
		<div class="clear"></div>
	</div>
	
	<div class="kotak" style="text-align: justify;">
		<div class="kiri">
    			kedua &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
		</div>
        <div class="kanan"style="margin-left:20px">
            Surat keputusan ini mulai berlaku sejak tanggal di tetapkan dengan ketentuan apabila terdapat kekeliruan didalamnya akan diadakan perbaikan sebagaimana mestinya
        </div>
		<div class="clear"></div>
	</div>
	
	<div class="kotak" style="text-align: justify;">
		<div class="kiri">
			Ketiga&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
		</div>
        <div class="kanan" style="margin-left:20px">
            Surat keputusan ini diberikan kepada yang bersangkutan untuk dilaksanakan sebagai amanah dengan penuh tanggung jawab
        </div>
		<div class="clear"></div>
	</div>
	
	

	<div style="margin-left: 400px; margin-top: 10px">
		<p>Ditetapkan di : Kendari</p>
		<p style="margin-top: -14px">Pada tanggal : <?= tanggal_indo($data->tgl_insert) ?></p>
		<p style="margin-top: 10px; font-weight: bold;">
			Dekan FKIP
		</p>
		<p style="margin-top: 60px; font-weight: bold; border-bottom: 1px solid black; width: 200px">
			<?= $konfigurasi->nama_dekan ?>
		</p>
		<p style="font-weight: bold; margin-top: -12px">NIDN. 0907068602</p>
	</div>

		<div style="margin-top:-10px">
		  <p>Tembusan Yth : </p>
		<p style="margin-top: -15px">1. Rektor UMK Kendari</p>
		<p style="margin-top: -15px">2. Wakil Rektor 1 UMK di Kendari</p>
		<p style="margin-top: -15px">3. Masing-masing bersangkutan</p>
		</div>
		<div class="clear"></div>
		<br>
	</div>

		<p style="page-break-before: always;"></p>
		<br>
   <img src="<?= base_url('assets/img/kop_surat_baru.png') ?>" alt="" width="900" id="img">
            <br>
    Lampiran : Surat Keputusan Dekan FKIP Universitas Muhammadiyah Kendari
	<table style="margin-left: 10px;">
		
		<tr>
			<td width="100px"> Nomor  </td><td> :&nbsp;&nbsp;&nbsp; <?= $data->no_sk !== null ? $data->no_sk : ".........." ?>/KEP//II.3.AU-01/B/<?= date('Y'); ?></td>
		</tr>
		<tr>
			<td>Tanggal </td> <td> : &nbsp;&nbsp;&nbsp;<?= tanggal_indo($data->tgl_insert) ?></td>
		</tr>
		<tr>
			<td>Perihal  </td> <td> : &nbsp;&nbsp;&nbsp;Pengangkatan Penguji  <?php if ($data->id_jenis_ujian == '1'): ?>
						Seminar proposal
					<?php elseif ($data->id_jenis_ujian == '2') : ?>
						Seminar Hasil
					<?php else: ?>
						Skripsi
					<?php endif ?>
			Program Studi <?= $data->nama_prodi ?> FKIP UMK T.A 2022/2023</td>
		</tr>
	</table>
	<p></p>
<br>
	<p style="font-weight: bold;margin-top: -10px">
	 TIM PENGUJI  <?php if ($data->id_jenis_ujian == '1'): ?>
		SEMINAR PROPOSAL
	<?php elseif ($data->id_jenis_ujian == '2') : ?>
		SEMINAR HASIL
	<?php else: ?>
		SKRIPSI
	<?php endif ?>	
	</p>

	<table style="margin-left: 10px; margin-top:-10px">
		<tr>
			<td width="100px">Ketua</td>
			<td> : &nbsp;&nbsp;&nbsp;<b><?= $data->ketua ?></b></td>
		</tr>
		<tr>
			<td>Sekretaris</td>
			<td> : &nbsp;&nbsp;&nbsp;<?= $data->sekretaris ?></td>
		</tr>
		 <?php $no = 1; foreach ($anggota as $item): ?>
           <tr>
             <td>
            <?php if ($item->status_penguji_tamu === 'Y'): ?>
                Penguji Tamu
            <?php else: ?>
            Anggota <?= $no++ ?>
            <?php endif ?>
             </td>
             <td> :&nbsp;&nbsp;&nbsp; <?= $item->nama_anggota ?></td>
           </tr>
           <?php endforeach ?>
	</table>
	

	<table style="margin-left: 10px;">
		<tr>
			<td width="100px">Jadwal Ujian </td> 
			<td>:&nbsp;&nbsp;&nbsp;<b> <?= nama_hari_indo($data->jadwal_ujian) ?>, <?= tanggal_indo($data->jadwal_ujian) ?></b>
			</td>
		</tr>
		<tr>
			<td>Waktu </td>
			<td>:&nbsp;&nbsp;&nbsp; <?= $data->waktu ?> WITA-selesai</td>
		</tr>
		<tr>
			<td>Tempat </td>
			<td>:&nbsp;&nbsp;&nbsp; 
					<?= $data->tempat ?>
			</td>
	    </tr>
	</table>

	<table class="content-table">
		<thead>
			<tr>
				<th width="3px" align="center">No</th>
				<th width="150px" class="text-center">Nama/Stambuk</th>
				<th width="120px" class="text-center">Program Studi</th>
				<th width="250px" class="text-center">Judul Skripsi</th>
				<th align="center" width="200px" class="text-center">Pembimbing</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; foreach ($mhs_seminar as $dt): 
			?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $dt->nama_mhs ?> / <?= $dt->nim ?></td>
					<td><span style="text-transform: capitalize"><?= $data->nama_prodi ?></span></td>
					<td>
					    <span style="text-transform: capitalize"><?= $dt->judul_skripsi ?></span>
					</td>
					<td>
						I. <?= $dt->pembimbing1 ?> <br>
						<!--<hr style="border-style:inset">-->
						II. <?= $dt->pembimbing2 ?>
						</ol>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	
	<div style="margin-left: 400px; margin-top: 5px">
		<p>Ditetapkan di &nbsp;:  &nbsp; Kendari</p>
		<p style="margin-top: -14px">Pada tanggal  &nbsp; :  &nbsp; <?= tanggal_indo($data->tgl_insert) ?></p>
		<p style="margin-top: 10px; font-weight: bold;">
			Dekan FKIP
		</p>
		<p style="margin-top: 60px; font-weight: bold; border-bottom: 1px solid black; width: 200px">
			<?= $konfigurasi->nama_dekan ?>
		</p>
		<p style="font-weight: bold; margin-top: -15px">NIDN. 0907068602</p>
	</div>

<script type="text/javascript">window.onload = function() { window.print(); }</script>

</body>
</html>