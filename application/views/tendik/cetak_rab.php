<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cetak</title>
	 <link href="https://id.allfont.net/allfont.css?fonts=arial-narrow" rel="stylesheet" type="text/css"/>
	<style type="text/css">
		.line-title{
			border: 0;
			border-style: inset;
			border-top: 0,5px solid #000;
			margin-top: -10px;
			width: 650px;
		}

		body{

			font-size: 16px;
			font-family: 'Times new roman';
			word-spacing: 3px;
			line-height: 1em;
		}

		.content-table{
			border-collapse: collapse;
			margin: 25px 0;
			font-size: 1em;
			min-width: 100%;
		}
		.content-table thead tr {
			color: black;
			text-align: left;
			/*font-weight: bold;*/
		}
		.content-table th, .content-table td {
			padding: 5px 5px;
			border: 1px solid black;
		}

		.container{
			margin: 0 40px;
			margin-top: -20px
		}
		#right {
			margin-left: 50px
		}

	</style>
</head>
<body>

	<?php 

		$jenis_ujian = $this->daftar_ujian->nama_jenis_ujian($data_rab->id_jenis_ujian);

	?>
		
	  <img src="<?= base_url('assets/img/kop_surat_baru.png') ?>" alt="" width="900" id="img">

	<p align="center" style="font-size: 16px; text-transform: uppercase;">
		RINCIAN ANGGARAN <?= ($data_rab->id_jenis_ujian == '3' ? 'UJIAN' : 'SEMINAR') ?> <?= $jenis_ujian ?> <br>
		<?php $nama_prodi = $this->tendik->nama_prodi($data_rab->id_prodi) ?>
		PROGRAM STUDI <?= $nama_prodi ?> T.A 2022/2023 <br></p>
		<p align="center" style="font-size: 14px; margin-top: -15px">(Berdasarkan SK Dekan FKIP UMK No. <?= $data_rab->no_sk ?>/KEP/II.3.AU-01/B/2022)</p>


		<div class="container">
			<table class="content-table">
			<thead>
				<tr>
					<th align="center">NO</th>
					<th align="center">NAMA KEGIATAN</th>
					<th align="center">JUMLAH</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="3"><b>A. PENERIMAAN</b></td>
				</tr>
				<tr>
					<td align="center">1</td>
					<td>Infak mahasiswa <?= $data_rab->A1 ?> orang x @
						<?php if ($data_rab->id_jenis_ujian == '3'): ?>
							<?= number_format($data->pembayaran_mhs_skripsi) ?>
						<?php else: ?>
							<?= number_format($data->pembayaran_mhs) ?>
						<?php endif ?>
					</td>
					<td align="center">Rp. <?= number_format($data_rab->J1) ?></td>
				</tr>
				<tr>
					<td colspan="3"><b>B. PENGELUARAN</b></td>
				</tr>
				<tr>
					<td align="center">1</td>
					<td>Insentif Ketua Penguji Seminar <?= $data_rab->A2 ?> x @<?= number_format($data->insentif_ketua_penguji) ?></td>
					<td align="center">Rp. <?= number_format($data_rab->J2) ?></td>
				</tr>
				<tr>
					<td align="center">2</td>
					<td>Insentif Sekretaris Penguji Seminar <?= $data_rab->A3 ?> x @<?= number_format($data->insentif_sekretaris_penguji) ?></td>
					<td align="center">Rp. <?= number_format($data_rab->J3) ?></td>
				</tr>
				<tr>
					<td align="center">3</td>
					<td>Insentif Anggota Penguji Seminar <?= $data_rab->A4 ?> x @<?= number_format($data->insentif_anggota_penguji) ?></td>
					<td align="center">Rp. <?= number_format($data_rab->J4) ?></td>
				</tr>

				<?php if ($data_rab->id_jenis_ujian == '3' ): ?>
					<tr>
						<td align="center">4</td>
						<td>Insentif Pembimbing I : <?= $data_rab->jml_mhs_pemb ?> x @<?=number_format( $data->insentif_pemb1) ?></td>
						<td align="center">Rp. <?= number_format($data_rab->total_insentif_pemb) ?></td>
					</tr>
					<tr>
						<td align="center">5</td>
						<td>Insentif Pembimbing II : <?= $data_rab->jml_mhs_pemb2 ?> x @<?=number_format( $data->insentif_pemb2) ?></td>
						<td align="center">Rp. <?= number_format($data_rab->total_insentif_pemb2) ?></td>
					</tr>
					<tr>
						<td align="center">6</td>
						<td>Insentif Pengelola <?= $data_rab->A5 ?> x @<?=number_format( $data->insentif_pengelola) ?></td>
						<td align="center">Rp. <?= number_format($data_rab->J5) ?></td>
					</tr>
					<tr>
						<td align="center">7</td>
						<td>Konsumsi Penguji <?= $data_rab->A6 ?> x @<?= number_format($data->konsumsi_penguji) ?></td>
						<td align="center">Rp. <?= number_format($data_rab->J6) ?></td>
					</tr>
					<tr>
						<td align="center">8</td>
						<td>Konsumsi Pengelola <?= $data_rab->A7 ?> x @<?= number_format($data->konsumsi_pengelola) ?></td>
						<td align="center">Rp. <?= number_format($data_rab->J7) ?></td>
					</tr>
					<tr>
						<td align="center">9</td>
						<td>Transportasi & Komunikasi <?= $data_rab->A8 ?> x @<?= number_format($data->transportasi) ?></td>
						<td align="center">Rp. <?= number_format($data_rab->J8) ?></td>
					</tr>
					<tr>
						<td align="center">10</td>
						<td>Petugas Kebersihan <?= $data_rab->A9 ?> x @<?= number_format($data->petugas_kebersihan) ?></td>
						<td align="center">Rp. <?= number_format($data_rab->J9) ?></td>
					</tr>
					<tr>
						<td align="center">11</td>
						<td>Kas Prodi <?= $data_rab->A10 ?> x @<?= $data_rab->id_jenis_ujian === '3' ? number_format(10000) : number_format($data->kas_prodi) ?></td>
						<td align="center">Rp. <?= number_format($data_rab->J10) ?></td>
					</tr>
					<?php 
						$totals = $data_rab->jumlah_p + $data_rab->total_insentif_pemb + $data_rab->total_insentif_pemb2
					 ?>
					<tr>
						<td colspan="2" rowspan="" headers="" align="right">Total</td>
						<td colspan="" rowspan="" headers="" align="center">Rp. <?= number_format($totals) ?></td>
					</tr>

					<!-- start -->

					<?php 

						$t1 = $data_rab->J1 - ($totals + $data_rab->J11 + $data_rab->J12) ;


					 ?>

					<tr>
						<td align="center">12</td>
						<td>Kas FKIP <?= $data_rab->A11 ?> x @<?= $data_rab->id_jenis_ujian === '3' ? number_format(15000) : number_format($data->kas_fkip) ?></td>
						<td align="center">Rp. <?= number_format($data_rab->J11) ?></td>
					</tr>
					<tr>
						<td align="center">13</td>
						<td>Kas Universitas <?= $data_rab->A12 ?> x @<?= $data_rab->id_jenis_ujian === '3' ? number_format(37500) : number_format($data->kas_universitas) ?></td>
						<td align="center">Rp. <?= number_format($data_rab->J12) ?></td>
					</tr>
					<tr>
						<td align="center">14</td>
						<td>Unit Pengembangan dan Inovasi Kewirausahaan (UPIK)</td>
						<td align="center">Rp. <?= number_format($t1) ?></td>
					</tr>
					<?php 

						$all_total	= $totals + $data_rab->J11 + $data_rab->J12 + $t1;
						$saldo = $data_rab->J1 - $all_total;

					 ?>

					<tr>
						<td colspan="2" align="center"><b>Total</b></td>
						<td align="center"><b>Rp. <?= number_format($all_total) ?></b></td>
					</tr>
				<?php else: ?>
					<tr>
						<td align="center">4</td>
						<td>Insentif Pengelola <?= $data_rab->A5 ?> x @<?=number_format( $data->insentif_pengelola) ?></td>
						<td align="center">Rp. <?= number_format($data_rab->J5) ?></td>
					</tr>
					<tr>
						<td align="center">5</td>
						<td>Konsumsi Penguji <?= $data_rab->A6 ?> x @<?= number_format($data->konsumsi_penguji) ?></td>
						<td align="center">Rp. <?= number_format($data_rab->J6) ?></td>
					</tr>
					<tr>
						<td align="center">6</td>
						<td>Konsumsi Pengelola <?= $data_rab->A7 ?> x @<?= number_format($data->konsumsi_pengelola) ?></td>
						<td align="center">Rp. <?= number_format($data_rab->J7) ?></td>
					</tr>
					<tr>
						<td align="center">7</td>
						<td>Transportasi & Komunikasi <?= $data_rab->A8 ?> x @<?= number_format($data->transportasi) ?></td>
						<td align="center">Rp. <?= number_format($data_rab->J8) ?></td>
					</tr>
					<tr>
						<td align="center">8</td>
						<td>Petugas Kebersihan <?= $data_rab->A9 ?> x @<?= number_format($data->petugas_kebersihan) ?></td>
						<td align="center">Rp. <?= number_format($data_rab->J9) ?></td>
					</tr>
					<tr>
						<td align="center">9</td>
						<td>Kas Prodi <?= $data_rab->A10 ?> x @<?= number_format($data->kas_prodi) ?></td>
						<td align="center">Rp. <?= number_format($data_rab->J10) ?></td>
					</tr>

					<tr>
						<td colspan="2" rowspan="" headers="" align="right">Total</td>
						<td colspan="" rowspan="" headers="" align="center">Rp. <?= number_format($data_rab->jumlah_p) ?></td>
					</tr>

					<!-- start -->

					<?php 

						$t1 = $data_rab->J1 - ($data_rab->jumlah_p + $data_rab->J11 + $data_rab->J12) ;

					 ?>

					<tr>
						<td align="center">10</td>
						<td>Kas FKIP <?= $data_rab->A11 ?> x @<?= number_format($data->kas_fkip) ?></td>
						<td align="center">Rp. <?= number_format($data_rab->J11) ?></td>
					</tr>
					<tr>
						<td align="center">11</td>
						<td>Kas Universitas <?= $data_rab->A12 ?> x @<?= number_format($data->kas_universitas) ?></td>
						<td align="center">Rp. <?= number_format($data_rab->J12) ?></td>
					</tr>
					<tr>
						<td align="center">11</td>
						<td>Unit Pengembangan dan Inovasi Kewirausahaan (UPIK)</td>
						<td align="center">Rp. <?= number_format($t1) ?></td>
					</tr>
					<?php 

					$all_total	= $data_rab->jumlah_p + $data_rab->J11 + $data_rab->J12 + $t1;
					$saldo = $data_rab->J1 - $all_total;

					 ?>

					<tr>
						<td colspan="2" align="center"><b>Total</b></td>
						<td align="center"><b>Rp. <?= number_format($all_total) ?></b></td>
					</tr>
				<?php endif ?>


				<!-- end -->

				
				<tr>
					<td colspan="3"><b>C. SALDO</b></td>
				</tr>
				<tr>
					<td align="center">1</td>
					<td>A - B</td>
					<td align="center"><b>Rp. <?= number_format($saldo) ?></b></td>
				</tr>
			</tbody>
		</table>

		<p style="margin-left: 430px; margin-top: 50px">Kendari, <?= tanggal_indo($data_rab->date_created) ?> M.</p>
			<p style="margin-left: 430px"><b>Dekan FKIP</b></p>
			<p style="margin-top: 50px; margin-left: 430px"></p>
			<p style=" margin-left: 430px; border-bottom: 1px solid #000; width: 220px"><b><?= $konfigurasi->nama_dekan ?></b></p>
			<p style="margin-left: 430px; margin-top: -15px;" ><b>NIDN. 0907068602</b></p>
		</div>



		<!-- 2 -->
		<p style="page-break-before: always;">&nbsp;</p>

		  <img src="<?= base_url('assets/img/kop_surat_baru.png') ?>" alt="" width="900" id="img">

			<p align="center" style="font-size: 16px; text-transform: uppercase;">
			DAFTAR INSENTIF PENGUJI <br>
			<?= ($data_rab->id_jenis_ujian == '3' ? 'UJIAN' : 'SEMINAR') ?> <?= $jenis_ujian ?> <br>
			<?php $nama_prodi = $this->tendik->nama_prodi($data_rab->id_prodi) ?>
			PROGRAM STUDI <?= $nama_prodi ?> T.A 2022/2023 <br></p>
			<p align="center" style="font-size: 14px; margin-top: -15px">(Berdasarkan SK Dekan FKIP UMK No. <?= $data_rab->no_sk ?>/KEP/II.3.AU-01/B/2022)</p>

			<table class="content-table">
				<thead>
					<tr>
						<th align="center" rowspan="2" width="5px">NO</th>
						<th align="center" rowspan="2" width="180px">NAMA</th>
						<th align="center" rowspan="2">JABATAN</th>
						<th align="center" colspan="3">JUMLAH</th>
						<th align="center" rowspan="2">TANDA TANGAN</th>
					</tr>
					<tr>
						<th align="center">Mahasiswa</th>
						<th align="center" width="100px">Insentif</th>
						<th align="center" width="100px">Total</th>
					</tr>
				</thead>
				<tbody>
						<?php $no = 1; 
						$jumlah = 0;
						foreach ($data_penguji as $penguji): 
							$nama_dosen = $this->dosen->get_nama_dosen($penguji->nama_anggota);

						?>
							<tr>
								<td align="center"><?= $no ?></td>
								<td class=""><?= $nama_dosen ?></td>
								<td align="center"><?= $penguji->jabatan ?></td>
								<td align="center"><?= $penguji->jml_mhs ?></td>
								<td align="center">Rp. <?= number_format($penguji->insentif) ?></td>
								<td align="center">Rp. <?= number_format($penguji->total) ?></td>
								<td align=""><?= $no ?>......</td>
							</tr>
						<?php $jumlah += $penguji->total; $no++; endforeach ?>
						<tr>
							<td colspan="5" align="center"><b>Total</b></td>
							<td align="center"><b>Rp. <?= number_format($jumlah) ?></b></td>
							<td></td>
						</tr>
					</tbody>
			</table>

			<p style="margin-left: 430px; margin-top: 50px">Kendari, <?= tanggal_indo($data_rab->date_created) ?> M.</p>
			<p style="margin-left: 430px"><b>Dekan FKIP</b></p>
			<p style="margin-top: 70px; margin-left: 430px"></p>
			<p style=" margin-left: 430px; border-bottom: 1px solid #000; width: 220px"><b><?= $konfigurasi->nama_dekan ?></b></p>
			<p style="margin-left: 430px; margin-top: -15px;" ><b>NIDN. 0907068602</b></p>


			<!-- 3 -->
			<p style="page-break-before: always;">&nbsp;</p>

			  <img src="<?= base_url('assets/img/kop_surat_baru.png') ?>" alt="" width="900" id="img">

			<p align="center" style="font-size: 16px; text-transform: uppercase;">
			DAFTAR INSENTIF PENGELOLA <br>
			<?= ($data_rab->id_jenis_ujian == '3' ? 'UJIAN' : 'SEMINAR') ?> <?= $jenis_ujian ?> <br>
			<?php $nama_prodi = $this->tendik->nama_prodi($data_rab->id_prodi) ?>
			PROGRAM STUDI <?= $nama_prodi ?> T.A 2022/2023 <br></p>
			<p align="center" style="font-size: 14px; margin-top: -15px">(Berdasarkan SK Dekan FKIP UMK No. <?= $data_rab->no_sk ?>/KEP/II.3.AU-01/B/2022)</p>

			<table class="content-table">
					<thead>
						<tr>
						<th align="center" rowspan="2" width="5px">NO</th>
						<th align="center" rowspan="2" width="180px">NAMA</th>
						<th align="center" rowspan="2" width="130px">JABATAN</th>
						<th align="center" colspan="3">JUMLAH</th>
						<th align="center" rowspan="2">TANDA TANGAN</th>
					</tr>
					<tr>
						<th align="center">Mahasiswa</th>
						<th align="center" width="100px">Insentif</th>
						<th align="center" width="100px">Total</th>
					</tr>
					</thead>
					<tbody>
						<?php
						 $jumlah1 = 0;
						 $no = 1; foreach ($data_pengelola as $pengelola): 
							// $nama_dosen = $this->dosen->get_nama_dosen($pengelola->nama_anggota);
							
						?>
							<tr>
								<td align="center"><?= $no ?></td>
								<td class=""><?= $pengelola->nama_anggota ?></td>
								<td align="center">
									<?php if ($pengelola->jabatan === 'ka_prodi'): ?>
										Ka. Prodi
									<?php elseif($pengelola->jabatan === 'pengarah'): ?>
										Rektor
									<?php elseif($pengelola->jabatan === 'penanggung_jawab_dekan'): ?>
										Penanggun Jawab (Dekan)
									<?php elseif($pengelola->jabatan === 'penanggung_jawab_wadek'): ?>
										Penanggun Jawab (Wakil Dekan)
									<?php elseif($pengelola->jabatan === 'staff_keuangan'): ?>
										Sekretaris
									<?php elseif($pengelola->jabatan === 'staff_administrasi'): ?>
										Bendahara
									<?php elseif($pengelola->jabatan === 'staff_fakultas'): ?>
										Bendahara
									<?php elseif($pengelola->jabatan === 'mhs_magang') : ?>
										Anggota
									<?php elseif($pengelola->jabatan === 'staff_administrasi') : ?>
										Bendahara
									<?php endif ?>
								</td>
								<td align="center"><?= $pengelola->jml_mhs ?></td>
								<td align="center">Rp. <?= number_format($pengelola->insentif) ?></td>
								<td align="center">Rp. <?= number_format($pengelola->total) ?></td>
								<td align=""><?= $no ?>......</td>
							</tr>
						<?php $jumlah1 += $pengelola->total; $no++; endforeach ?>
						<tr>
							<td colspan="5" align="center"><b>Total</b></td>
							<td align="center"><b>Rp. <?= number_format($jumlah1) ?></b></td>
							<td></td>
						</tr>
					</tbody>
					
				</table>


			<p style="margin-left: 430px; margin-top: 50px">Kendari, <?= tanggal_indo($data_rab->date_created) ?> M.</p>
			<p style="margin-left: 430px"><b>Dekan FKIP</b></p>
			<p style="margin-top: 70px; margin-left: 430px"></p>
			<p style=" margin-left: 430px; border-bottom: 1px solid #000; width: 220px"><b><?= $konfigurasi->nama_dekan ?></b></p>
			<p style="margin-left: 430px; margin-top: -15px;" ><b>NIDN. 0907068602</b></p>


		<!-- 4 -->
		<p style="page-break-before: always;">&nbsp;</p>
  <img src="<?= base_url('assets/img/kop_surat_baru.png') ?>" alt="" width="900" id="img">

			<p align="center" style="font-size: 16px; text-transform: uppercase;">
			DAFTAR INSENTIF PETUGAS KEBERSIHAN <br>
			<?= ($data_rab->id_jenis_ujian == '3' ? 'UJIAN' : 'SEMINAR') ?> <?= $jenis_ujian ?> <br>
			<?php $nama_prodi = $this->tendik->nama_prodi($data_rab->id_prodi) ?>
			PROGRAM STUDI <?= $nama_prodi ?> T.A 2022/2023 <br></p>
			<p align="center" style="font-size: 14px; margin-top: -15px">(Berdasarkan SK Dekan FKIP UMK No. <?= $data_rab->no_sk ?>/KEP/II.3.AU-01/B/2022)</p>

			<div class="k">
				<table class="content-table">
				<thead>
					<tr>
						<th align="center" rowspan="2" width="5px">NO</th>
						<th align="center" rowspan="2" width="200px">NAMA</th>
						<th align="center" colspan="3">JUMLAH</th>
						<th align="center" rowspan="2">TANDA TANGAN</th>
					</tr>
					<tr>
						<th align="center" width="78px">Mahasiswa</th>
						<th align="center">Insentif (Rp.)</th>
						<th align="center">Total (Rp.)</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$total = 0;
					$no =1; foreach ($data_petugas_k as $kebersihan): ?>
						<tr>
							<td align="center"><?= $no ?></td>
							<td><?= $kebersihan->nama ?></td>
							<td align="center"><?= $kebersihan->jml_mhs ?></td>
							<td align="center">Rp. <?= number_format($kebersihan->insentif) ?></td>
							<td align="center">Rp. <?= number_format($kebersihan->total) ?></td>
							<td align=""><?= $no ?>......</td>
						</tr>
					<?php $total += $kebersihan->total; $no++; endforeach ?>
					<tr>
						<td colspan="4" align="center"><b>Total</b></td>
						<td align="center"><b>Rp. <?= number_format($total) ?></b></td>
						<td></td>
					</tr>
				</tbody>
			</table>
			<p style="margin-left: 430px; margin-top: 50px">Kendari, <?= tanggal_indo($data_rab->date_created) ?> M.</p>
			<p style="margin-left: 430px"><b>Dekan FKIP</b></p>
			<p style="margin-top: 70px; margin-left: 430px"></p>
			<p style=" margin-left: 430px; border-bottom: 1px solid #000; width: 220px"><b><?= $konfigurasi->nama_dekan ?></b></p>
			<p style="margin-left: 430px; margin-top: -15px;" ><b>NIDN. 0907068602</b></p>
			</div>

		<?php if ($data_rab->id_jenis_ujian == '3'): ?>
			<!-- 5 -->
		<p style="page-break-before: always;">&nbsp;</p>

			  <img src="<?= base_url('assets/img/kop_surat_baru.png') ?>" alt="" width="900" id="img">
			<p align="center" style="font-size: 16px; text-transform: uppercase;">
			DAFTAR INSENTIF PEMBIMBING <?= $jenis_ujian ?> <br>
			<h3>Pembimbing I</h3>
			<div class="k">
				<table class="content-table">
				<thead>
					<tr>
						<th align="center" rowspan="2" width="5px">NO</th>
						<th align="center" rowspan="2" width="200px">NAMA DOSEN</th>
						<th align="center" colspan="3">JUMLAH</th>
						<th align="center" rowspan="2">TANDA TANGAN</th>
					</tr>
					<tr>
						<th align="center" width="78px">Mahasiswa</th>
						<th align="center">Insentif (Rp.)</th>
						<th align="center">Total (Rp.)</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$total = 0;
					$no =1; foreach ($data_pemb1 as $data): ?>
						<tr>
							<td align="center"><?= $no ?></td>
							<td><?= $data->nama_dosen ?></td>
							<td align="center"><?= $data->jumlah_mhs ?></td>
							<td align="center">Rp. <?= number_format($data->insentif) ?></td>
							<td align="center">Rp. <?= number_format($data->total) ?></td>
							<td align=""><?= $no ?>......</td>
						</tr>
					<?php $total += $data->total; $no++; endforeach ?>
					<tr>
						<td colspan="4" align="center"><b>Total</b></td>
						<td align="center"><b>Rp. <?= number_format($total) ?></b></td>
						<td></td>
					</tr>
				</tbody>
			</table>
			<p style="margin-left: 430px; margin-top: 50px">Kendari, <?= tanggal_indo($data_rab->date_created) ?> ?> M.</p>
			<p style="margin-left: 430px"><b>Dekan FKIP</b></p>
			<p style="margin-top: 70px; margin-left: 430px"></p>
			<p style=" margin-left: 430px; border-bottom: 1px solid #000; width: 220px"><b><?= $konfigurasi->nama_dekan ?></b></p>
			<p style="margin-left: 430px; margin-top: -15px;" ><b>NIDN. 0907068602</b></p>
			</div>

			<!-- 6 -->
		<p style="page-break-before: always;">&nbsp;</p>

			  <img src="<?= base_url('assets/img/kop_surat_baru.png') ?>" alt="" width="900" id="img">

			<p align="center" style="font-size: 16px; text-transform: uppercase;">
			DAFTAR INSENTIF PEMBIMBING <?= $jenis_ujian ?> <br>
			<h3>Pembimbing II</h3>
			<div class="k">
				<table class="content-table">
				<thead>
					<tr>
						<th align="center" rowspan="2" width="5px">NO</th>
						<th align="center" rowspan="2" width="200px">NAMA DOSEN</th>
						<th align="center" colspan="3">JUMLAH</th>
						<th align="center" rowspan="2">TANDA TANGAN</th>
					</tr>
					<tr>
						<th align="center" width="78px">Mahasiswa</th>
						<th align="center">Insentif (Rp.)</th>
						<th align="center">Total (Rp.)</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$total = 0;
					$no =1; foreach ($data_pemb2 as $data): ?>
						<tr>
							<td align="center"><?= $no ?></td>
							<td><?= $data->nama_dosen ?></td>
							<td align="center"><?= $data->jumlah_mhs ?></td>
							<td align="center">Rp. <?= number_format($data->insentif) ?></td>
							<td align="center">Rp. <?= number_format($data->total) ?></td>
							<td align=""><?= $no ?>......</td>
						</tr>
					<?php $total += $data->total; $no++; endforeach ?>
					<tr>
						<td colspan="4" align="center"><b>Total</b></td>
						<td align="center"><b>Rp. <?= number_format($total) ?></b></td>
						<td></td>
					</tr>
				</tbody>
			</table>
			<p style="margin-left: 430px; margin-top: 50px">Kendari, <?= tanggal_indo($data_rab->date_created) ?> ?> M.</p>
			<p style="margin-left: 430px"><b>Dekan FKIP</b></p>
			<p style="margin-top: 70px; margin-left: 430px"></p>
			<p style=" margin-left: 430px; border-bottom: 1px solid #000; width: 220px"><b><?= $konfigurasi->nama_dekan ?></b></p>
			<p style="margin-left: 430px; margin-top: -15px;" ><b>NIDN. 0907068602</b></p>
			</div>
		<?php endif ?>


		<!-- 7 -->
		<p style="page-break-before: always;">&nbsp;</p>

		  <img src="<?= base_url('assets/img/kop_surat_baru.png') ?>" alt="" width="900" id="img">

			<p align="center" style="font-size: 16px; text-transform: uppercase;">
			LEMBAR PERMOHONAN PENCAIRAN  <br>
			ANGGARAN <?= ($data_rab->id_jenis_ujian == '3' ? 'UJIAN' : 'SEMINAR') ?> <?= $jenis_ujian ?> <br>
			<?php $nama_prodi = $this->tendik->nama_prodi($data_rab->id_prodi) ?>
			PROGRAM STUDI <?= $nama_prodi ?> T.A 2022/2023 <br></p>
			<p align="center" style="font-size: 14px; margin-top: -15px">(Berdasarkan SK Dekan FKIP UMK No. <?= $data_rab->no_sk ?>/KEP/II.3.AU-01/B/2022)</p>


			<div class="container">
				<p>Yang bertanda tangan di bawah ini :</p>

			<div style="margin-top: 20px" class="table">
				<table>
					<tr>
						<td>Nama</td><td>:</td> <td>&nbsp;&nbsp;&nbsp;<?= $data_rab->nama ?></td>
					</tr>
					<tr>
						<td>Jabatan</td><td>:</td> <td>&nbsp;&nbsp;&nbsp;<?= $data_rab->jabatan ?></td>
					</tr>
					<tr>
						<td>Jumlah pengajuan &nbsp;&nbsp;&nbsp;</td> <td>:</td> 
						<td>&nbsp;&nbsp;&nbsp;Rp. 
							<?php if ($data_rab->id_jenis_ujian == '3'): ?>
								<?= number_format($totals) ?>
							<?php else: ?>
								<?= number_format($data_rab->jumlah_pengajuan) ?>
							<?php endif ?>
								
							</td>
					</tr>
					<?php if ($data_rab->jenis_byr == 'rekening'): ?>
						<tr>
							<td>Nomor rekening</td><td>:</td> <td>&nbsp;&nbsp;&nbsp;<?= $data_rab->no_rekening ?></td>
						</tr>
						<tr>
							<td>Nama bank</td><td>:</td> <td>&nbsp;&nbsp;&nbsp;<?= $data_rab->nama_bank ?></td>
						</tr>
					<?php else: ?>
						<tr>
							<td>Nomor kuitansi</td><td>:</td> <td>&nbsp;&nbsp;&nbsp;<?= $data_rab->no_rekening ?></td>
						</tr>
						<tr>
							<td>Tgl bayar</td><td>:</td> <td>&nbsp;&nbsp;&nbsp;<?= $data_rab->nama_bank ?></td>
						</tr>
					<?php endif ?>
				</table>
			</div>
			<?php $nama_prodi = $this->tendik->nama_prodi($data_rab->id_prodi) ?>
			
			<div style="text-align:justify; line-height: 1.5em">
				<p>Mengajukan permohonan pencairan anggaran <?= ($data_rab->id_jenis_ujian == '3' ? 'Ujian' : 'Seminar') ?> <?= $jenis_ujian ?>. Yang bersangkutan bertanggung jawab terhadap pengelolaan dan pelaporan penggunaan anggaran seminar profosal program studi <?= $nama_prodi ?>. Pelaporan paling lambat diserahkan 3 hari setelah seminar dilaksanakan kepada Staff Keuangan FKIP yang juga mencairkan anggaran seminar profosal ini. </p>
			</div>

			<p style="margin-left: 350px; margin-top: 50px">Kendari, <?= tanggal_indo($data_rab->date_created) ?> M.</p>
			<p style="margin-left: 350px">Yang mengajukan,</p>
			<p style="margin-top: 70px; margin-left: 350px"></p>
			<p style=" margin-left: 350px;"><b><?= $data_rab->nama ?></b></p>
			</div>

			<!-- konsumsi penguji -->
			<p style="page-break-before: always;">&nbsp;</p>

			  <img src="<?= base_url('assets/img/kop_surat_baru.png') ?>" alt="" width="900" id="img">

			<p align="center" style="font-size: 16px; text-transform: uppercase;">
			DAFTAR PEMBAYARAN KONSUMSI PENGUJI <?= ($data_rab->id_jenis_ujian == '3' ? 'UJIAN' : 'SEMINAR') ?> <?= $jenis_ujian ?> <br>
			<p align="center" style="font-size: 14px; margin-top: -15px">(Berdasarkan SK Dekan FKIP UMK No. <?= $data_rab->no_sk ?>/TUG/II.0/G.b/2020)</p>

			<div class="k">
				<table class="content-table">
				<thead>
					<tr>
						<td align="center" width="30px">No</td>
						<td align="center">Nama Proofreader</td>
						<td align="center">Jumlah</td>
						<td align="center" width="70">Tanda Tangan</td>
					</tr>
				</thead>
				<tbody>
					<?php 
						$data = $this->db->get('config_rab')->row();
						$no = 1; 
						$totalK = 0;
						foreach ($data_penguji as $penguji): 
							$nama_dosen = $this->dosen->get_nama_dosen($penguji->nama_anggota);

						?>
							<tr>
								<td align="center"><?= $no ?></td>
								<td class=""><?= $nama_dosen ?></td>
								<td align="center">Rp. <?= number_format($data->konsumsi_penguji) ?></td>
								<td id="<?php $no%2 === 0 ? 'right' : 'left' ?>"><?= $no ?>......</td>
							</tr>
						<?php  
							$no++; 
							$totalK += $data->konsumsi_penguji;
						endforeach ?>
					<tr>
						<td colspan="2" align="center"><b>Total</b></td>
						<td align="center"><b>Rp. <?= number_format($totalK) ?></b></td>
						<td></td>
					</tr>
				</tbody>
			</table>

			<p style="text-decoration: italic; text-transform: capitalize;">Terbilang : <?= terbilang($totalK) ?></p>

			<p style="margin-left: 430px; margin-top: 50px">Kendari, <?= tanggal_indo($data_rab->date_created) ?> M.</p>
			<p style="margin-left: 430px"><b>Dekan FKIP</b></p>
			<p style="margin-top: 70px; margin-left: 430px"></p>
			<p style=" margin-left: 430px; border-bottom: 1px solid #000; width: 220px"><b><?= $konfigurasi->nama_dekan ?></b></p>
			<p style="margin-left: 430px; margin-top: -15px;" ><b>NIDN. 0907068602</b></p>
			</div>

			<!-- konsumsi pengelola -->
			<p style="page-break-before: always;">&nbsp;</p>

			  <img src="<?= base_url('assets/img/kop_surat_baru.png') ?>" alt="" width="900" id="img">

			<p align="center" style="font-size: 16px; text-transform: uppercase;">
			DAFTAR PEMBAYARAN KONSUMSI PANITIA <?= ($data_rab->id_jenis_ujian == '3' ? 'UJIAN' : 'SEMINAR') ?> <?= $jenis_ujian ?> <br>
			<p align="center" style="font-size: 14px; margin-top: -15px">(Berdasarkan SK Dekan FKIP UMK No. <?= $data_rab->no_sk ?>/KEP/II.3.AU-01/B/2022)</p>

			<div class="k">
				<table class="content-table">
				<thead>
					<tr>
						<td align="center" width="30px">No</td>
						<td align="center">Nama Panitia</td>
						<td align="center">Jumlah</td>
						<td align="center" width="70">Tanda Tangan</td>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no = 1; 
						$totalK = 0;
						foreach ($data_pengelola as $pengelola): 
							if($pengelola->jabatan === 'pengarah' || $pengelola->jabatan === 'penanggung_jawab_dekan' || $pengelola->jabatan === 'penanggung_jawab_wadek'){
								continue;
							}
						?>
							<tr>
								<td align="center"><?= $no ?></td>
								<td class=""><?= $pengelola->nama_anggota ?></td>
								<td align="center">Rp. <?= number_format($data->konsumsi_pengelola) ?></td>
								<td id="<?php $no%2 === 0 ? 'right' : 'left' ?>"><?= $no ?>......</td>
							</tr>
						<?php  $no++; $totalK += $data->konsumsi_pengelola; endforeach ?>
					<tr>
						<td colspan="2" align="center"><b>Total</b></td>
						<td align="center"><b>Rp. <?= number_format($totalK) ?></b></td>
						<td></td>
					</tr>
				</tbody>
			</table>

				<p style="text-decoration: italic; text-transform: capitalize;">Terbilang : <?= terbilang($totalK) ?></p>

			<p style="margin-left: 430px; margin-top: 50px">Kendari, <?= tanggal_indo($data_rab->date_created) ?> M.</p>
			<p style="margin-left: 430px"><b>Dekan FKIP</b></p>
			<p style="margin-top: 70px; margin-left: 430px"></p>
			<p style=" margin-left: 430px; border-bottom: 1px solid #000; width: 220px"><b><?= $konfigurasi->nama_dekan ?></b></p>
			<p style="margin-left: 430px; margin-top: -15px;" ><b>NIDN. 0907068602</b></p>
			</div>

			<p style="page-break-before: always;">&nbsp;</p>
	<!-- bukti transfer -->
	<?php if ($this->session->userdata('prodi') === '4' && !empty($bukti_tf)): ?>
		<h3>Bukti transfer</h3><br>
		<?php foreach ($bukti_tf as $d): ?>
			<img src="<?= base_url('assets/upload/laporan_rab/bukti/'.$d->bukti) ?>" width="250" style="padding: 5px">
		<?php endforeach ?>
	<?php endif ?>
		
</body>
</html>