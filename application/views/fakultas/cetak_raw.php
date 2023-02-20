<!DOCTYPE html>
<html>
<head>
	<title>print</title>
		<!--<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">-->
	 <!--<link href="https://id.allfont.net/allfont.css?fonts=arial-narrow" rel="stylesheet" type="text/css" />-->
<style type="text/css">

	body{
		font-size: 16px;
		font-family:  'Times New Roman';
		/*word-spacing: 2px;*/
	}
	.table1 {
	    color: #000;
	    border-collapse: collapse;
	    width: 100%;
	}
	 
	.table1, th, td {
	    border: 1px solid #000;
	    padding: 6px 8px;
	}
</style>

</head>
<body>

    <img src="<?= base_url('assets/img/kop_surat_baru.png') ?>" alt="" width="900" id="img">
	<?php $nama_prodi = $this->prodi->nama_jurusan($data->id_prodi) ?>
	<p align="center" style="font-weight: bold; margin-top: 20px; text-transform: uppercase;">
		PENDAPATAN TRANSITORIS <br>
		DANA WISUDA FKIP <br>
		PROGRAM STUDI <?= $nama_prodi ?> <br>
		TAHUN AKADEMIK 2021/2022
	</p>
	<table class="table1">
		<tr>
			<th class="text-center" >NO</th>
			<th class="text-center">RINCIAN</th>
			<th class="text-center">SATUAN JUMLAH (RP)</th>
			<th class="text-center">JUMLAH WISUDAWAN</th>
			<th class="text-center">TOTAL</th>
		</tr>
		<tr>
			<td>1</td>
			<td>Pembuatan Transkrip Nilai</td>
			<td class="text-center">Rp. <?= number_format( $config->pemb_transkrip_nilai) ?></td>
			<td class="text-center"><?= $data->jml_mhs ?></td>
			<td class="text-right">Rp. <?= number_format($data->j1)  ?></td>
		</tr>
		<tr>
			<td>2</td>
			<td>Pembuatan Akta</td>
			<td class="text-center">Rp. <?= number_format( $config->pemb_akta) ?></td>
			<td class="text-center"><?= $data->jml_mhs ?></td>
			<td class="text-right">Rp. <?= number_format($data->j2)  ?></td>
		</tr>
		<tr>
			<td>3</td>
			<td>Materai</td>
			<td class="text-center">Rp. <?= number_format( $config->materai) ?></td>
			<td class="text-center"><?= $data->jml_mhs ?></td>
			<td class="text-right">Rp. <?= number_format($data->j3)  ?></td>
		</tr>
		<tr>
			<td>4</td>
			<td>SKPI</td>
			<td class="text-center">Rp. <?= number_format( $config->skpi) ?></td>
			<td class="text-center"><?= $data->jml_mhs ?></td>
			<td class="text-right">Rp. <?= number_format($data->j4)  ?></td>
		</tr>
		<tr>
			<td>5</td>
			<td>Buku</td>
			<td class="text-center">Rp. <?= number_format( $config->buku) ?></td>
			<td class="text-center"><?= $data->jml_mhs ?></td>
			<td class="text-right">Rp. <?= number_format($data->j5)  ?></td>
		</tr>
		<tr>
			<td colspan="4"><center><strong>Total</strong></center></td>
			<td class="text-right"><strong>Rp. <?= number_format($data->t1) ?></strong></td>
		</tr>
	</table>
	<br>
	<p style="margin-left: 430px"><b>Dekan,</b></p>
	<p style="margin-left: 430px"><b>Fakultas Keguruan dan Ilmu Pendidikan</b></p>
	<p style="margin-top: 50px; margin-left: 430px"></p>
	<p style=" margin-left: 430px;"><b>Tri Indah Rusli, S.Pd., M.Pd</b></p>

	<!-- 2 -->
	<p style="page-break-before: always;">&nbsp;</p>
    
    <img src="<?= base_url('assets/img/kop_surat_baru.png') ?>" alt="" width="900" id="img">
    
	<?php $nama_prodi = $this->prodi->nama_jurusan($data->id_prodi) ?>
	<p align="center" style="font-weight: bold; margin-top: 20px; text-transform: uppercase;">
		PENDAPATAN TRANSITORIS <br>
		DANA WISUDA FKIP <br>
		<span style="text-transform: lowercase;">(Biaya Pembuatan Transkrip Nilai, Akta Mengajar)</span><br>
		PROGRAM STUDI <?= $nama_prodi ?> <br>
		periode <?= bulan($data->tgl_diajukan) ?> <?= thn($data->tgl_diajukan) ?><br>
		TAHUN AKADEMIK 2021/2022
	</p>
	<br>

	<table class="table1">
		<tr>
			<th class="text-center" width="5px">NO</th>
			<th class="text-center" width="35%">RINCIAN</th>
			<th class="text-center">SATUAN JUMLAH (RP)</th>
			<th class="text-center">BIAYA PERLEMBAR</th>
			<th class="text-center">TOTAL</th>
		</tr>
		<tr>
			<td>1</td>
			<td>Akta Mengajar</td>
			<td class="text-center">Rp. <?= number_format( $config->akta_mengajar) ?></td>
			<td class="text-center"><?= $data->jml_mhs ?> Lembar</td>
			<td class="text-right">Rp. <?= number_format($data->j6)  ?></td>
		</tr>
		<tr>
			<td>2</td>
			<td>Transkrip Nilai </td>
			<td class="text-center">Rp. <?= number_format( $config->transkrip_nilai) ?></td>
			<td class="text-center"><?= $data->jml_mhs ?> Lembar</td>
			<td class="text-right">Rp. <?= number_format($data->j7)  ?></td>
		</tr>
		<tr>
			<td colspan="4"><center><strong>Total</strong></center></td>
			<td class="text-right"><strong>Rp. <?= number_format($data->t2) ?></strong></td>
		</tr>
	</table>

	<br>
	<p style="margin-left: 430px"><b>Dekan,</b></p>
	<p style="margin-left: 430px"><b>Fakultas Keguruan dan Ilmu Pendidikan</b></p>
	<p style="margin-top: 50px; margin-left: 430px"></p>
	<p style=" margin-left: 430px;"><b>Tri Indah Rusli, S.Pd., M.Pd</b></p>

	<!-- 2 -->
	<p style="page-break-before: always;">&nbsp;</p>
	<img src="<?= base_url('assets/img/kop_surat_baru.png') ?>" alt="" width="900" id="img">
	<?php $nama_prodi = $this->prodi->nama_jurusan($data->id_prodi) ?>
	<p align="center" style="font-weight: bold; font-size: 18px; margin-top: 20px; text-transform: uppercase;">
		PENDAPATAN TRANSITORIS <br>
		DANA WISUDA FKIP <br>
		<span style="text-transform: lowercase;">(Insentif Pengelola)</span><br>
		PROGRAM STUDI <?= $nama_prodi ?> <br>
		periode <?= bulan($data->tgl_diajukan) ?> <?= thn($data->tgl_diajukan) ?><br>
		TAHUN AKADEMIK 2021/2022
	</p>
	<br>

	<table class="table1">
		<tr>
			<th class="text-center" width="5px">NO</th>
			<th class="text-center" width="200px">NAMA</th>
			<th class="text-center">JABATAN</th>
			<th class="text-center" width="100px">JUMLAH</th>
			<th class="text-center" width="100px">TANDA TANGAN</th>
		</tr>
		<?php 
			$jml = 0;
			foreach ($pengelola as $key => $p): ?>
				<tr>
					<td><?= $key + 1 ?></td>
					<td><?= $p->nama_pengelola ?></td>
					<td class="text-center"><?= $p->jabatan ?></td>
					<td class="text-center">Rp. <?= number_format($p->jumlah) ?></td>
					<?php $jml += $p->jumlah ?>
					<td><?= $key + 1 ?>...................</td>
				</tr>
			<?php endforeach ?>
			<tr>
				<td colspan="3"><center><strong>Total</strong></center></td>
				<td class="text-center"><strong>Rp. <?= number_format($jml) ?></strong></td>
				<td></td>
			</tr>
	</table>
	<br>
	<p style="margin-left: 430px"><b>Dekan,</b></p>
	<p style="margin-left: 430px"><b>Fakultas Keguruan dan Ilmu Pendidikan</b></p>
	<p style="margin-top: 50px; margin-left: 430px"></p>
	<p style=" margin-left: 430px;"><b>Tri Indah Rusli, S.Pd., M.Pd</b></p>

	<!-- 2 -->
	<p style="page-break-before: always;">&nbsp;</p>
    <img src="<?= base_url('assets/img/kop_surat_baru.png') ?>" alt="" width="900" id="img">
	<hr class="line-title">
	<?php $nama_prodi = $this->prodi->nama_jurusan($data->id_prodi) ?>
	<p align="center" style="font-weight: bold; font-size: 18px; margin-top: 20px; text-transform: uppercase;">
		PENDAPATAN TRANSITORIS <br>
		DANA WISUDA FKIP <br>
		<span style="text-transform: lowercase;">(SKPI)</span><br>
		PROGRAM STUDI <?= $nama_prodi ?> <br>
		periode <?= bulan($data->tgl_diajukan) ?> <?= thn($data->tgl_diajukan) ?><br>
		TAHUN AKADEMIK 2021/2022
	</p>
	<br>

	<table class="table1">
		<tr>
			<th class="text-center" width="5px">NO</th>
			<th class="text-center" width="35%">KETERANGAN</th>
			<th class="text-center">VOLUME</th>
			<th class="text-center">JUMLAH</th>
		</tr>
		<tr>
			<td>1</td>
			<td>Biaya Pembuatan SKPI</td>
			<td class="text-center"><?= $data->jml_mhs ?> X <?= number_format($config->pemb_skpi) ?></td>
			<td class="text-right">Rp. <?= number_format($data->j8)  ?></td>
		</tr>
		<tr>
			<td>2</td>
			<td>Tanda Tangan SKPI (Dekan)</td>
			<td class="text-center"><?= $data->jml_mhs ?> X <?= number_format($config->ttd_skpi_dekan) ?></td>
			<td class="text-right">Rp. <?= number_format($data->j9)  ?></td>
		</tr>
		<tr>
			<td>3</td>
			<td>Pengembangan Sistem</td>
			<td class="text-center"><?= $data->jml_mhs ?> X <?= number_format($config->ttd_skpi_prodi) ?></td>
			<td class="text-right">Rp. <?= number_format($data->j10)  ?></td>
		</tr>
		<tr>
			<td>4</td>
			<td>Kas Fakultas</td>
			<td class="text-center"><?= $data->jml_mhs ?> X <?= number_format($config->kas_fakultas) ?></td>
			<td class="text-right">Rp. <?= number_format($data->j11)  ?></td>
		</tr>
		<tr>
			<td>5</td>
			<td>Kas Prodi</td>
			<td class="text-center"><?= $data->jml_mhs ?> X <?= number_format($config->kas_prodi) ?></td>
			<td class="text-right">Rp. <?= number_format($data->j12)  ?></td>
		</tr>
		<tr>
			<td>6</td>
			<td>Verifikasi Wakil Dekan</td>
			<td class="text-center"><?= $data->jml_mhs ?> X <?= number_format($config->verifikasi_wadek ) ?></td>
			<td class="text-right">Rp. <?= number_format($data->j13)  ?></td>
		</tr>
		<tr>
			<td>7</td>
			<td>Verifikasi Staff Fakultas</td>
			<td class="text-center"><?= $data->jml_mhs ?> X <?= number_format($config->verifikasi_staff_fakultas) ?></td>
			<td class="text-right">Rp. <?= number_format($data->j14)  ?></td>
		</tr>
		<tr>
			<td>8</td>
			<td>Verifikasi Ka.Prodi</td>
			<td class="text-center"><?= $data->jml_mhs ?> X <?= number_format($config->verifikasi_kaprodi ) ?></td>
			<td class="text-right">Rp. <?= number_format($data->j15)  ?></td>
		</tr>
		<tr>
			<td colspan="3"><center><strong>Total</strong></center></td>
			<td class="text-right"><strong>Rp. <?= number_format($data->t3) ?></strong></td>
		</tr>
	</table>
	<br>
	<p style="margin-left: 430px"><b>Dekan,</b></p>
	<p style="margin-left: 430px"><b>Fakultas Keguruan dan Ilmu Pendidikan</b></p>
	<p style="margin-top: 50px; margin-left: 430px"></p>
	<p></p>
	<p style=" margin-left: 430px;"><b>Tri Indah Rusli, S.Pd., M.Pd</b></p>
<script type="text/javascript">window.onload = function() { window.print(); }</script>
</body>
</html>