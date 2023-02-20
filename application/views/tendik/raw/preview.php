
<div class="container" style="margin-top: 20px">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div style="margin-bottom: 10px">
				<a href="<?= base_url('tendik/raw') ?>" title="Kembali ke list RAW" class="btn btn-sm btn-danger">&laquo; Kembali</a>
			</div>


			<div class="table-responsive">
				<h5>
					<i class="ace-icon glyphicon glyphicon-user green"></i>
					<strong>PENDAPATAN TRANSITORIS DANA WISUDA FKIP</strong>
				</h5>
				<table class="table-sm table table-bordered table-hover" id="myTable">
						<thead>
							<tr>
								<th class="text-center" width="5px">NO</th>
								<th class="text-center" width="35%">RINCIAN</th>
								<th class="text-center">SATUAN JUMLAH (RP)</th>
								<th class="text-center">JUMLAH WISUDAWAN</th>
								<th class="text-center">TOTAL</th>
							</tr>
							<tr>
						</thead>
						<tbody>
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
						</tbody>
					</table>
					<hr>



				<h5>
					<i class="ace-icon glyphicon glyphicon-user green"></i>
					<strong>REALISASI PENDAPATAN TRANSITORIS DANA WISUDA (Biaya Pembuatan Transkrip Nilai, Akta Mengajar) </strong>
				</h5>
				<table class="table-sm table table-bordered table-hover" id="myTable">
					<thead>
						<tr>
							<th class="text-center" width="5px">NO</th>
							<th class="text-center" width="35%">RINCIAN</th>
							<th class="text-center">SATUAN JUMLAH (RP)</th>
							<th class="text-center">BIAYA PERLEMBAR</th>
							<th class="text-center">TOTAL</th>
						</tr>
					</thead>
					<tbody>
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
					</tbody>
				</table>
				<hr>

				<h5>
					<i class="ace-icon glyphicon glyphicon-user green"></i>
					<strong>
						REALISASI PENDAPATAN TRANSITORIS DANA WISUDA (Insentif Pengelola) 
					</strong>
				</h5>
				<table class="table-sm table table-bordered table-hover" id="myTable">
					<thead>
						<tr>
							<th class="text-center" width="5px">NO</th>
							<th class="text-center" width="35%">NAMA</th>
							<th class="text-center">JABATAN</th>
							<th class="text-center">JUMLAH</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$jml = 0;
						foreach ($pengelola as $key => $p): ?>
							<tr>
								<td><?= $key + 1 ?></td>
								<td><?= $p->nama_pengelola ?></td>
								<td class="text-center"><?= $p->jabatan ?></td>
								<td class="text-center">Rp. <?= number_format($p->jumlah) ?></td>
								<?php $jml += $p->jumlah ?>
							</tr>
						<?php endforeach ?>
						<tr>
							<td colspan="3"><center><strong>Total</strong></center></td>
							<td class="text-center"><strong>Rp. <?= number_format($jml) ?></strong></td>
						</tr>
					</tbody>
				</table>
				<hr>

				<h5>
					<i class="ace-icon glyphicon glyphicon-user green"></i>
					<strong>
						REALISASI PENDAPATAN TRANSITORIS DANA WISUDA (SKPI) 
					</strong>
				</h5>
				<table class="table-sm table table-bordered table-hover" id="myTable">
					<thead>
						<tr>
							<th class="text-center" width="5px">NO</th>
							<th class="text-center" width="35%">KETERANGAN</th>
							<th class="text-center">VOLUME</th>
							<th class="text-center">JUMLAH</th>
						</tr>
					</thead>
					<tbody>
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
                			<td class="text-right">Rp. <?= number_format($data->j12)  ?></td>
                		</tr>
                		<tr>
                			<td>7</td>
                			<td>Verifikasi Staff Fakultas</td>
                			<td class="text-center"><?= $data->jml_mhs ?> X <?= number_format($config->verifikasi_staff_fakultas) ?></td>
                			<td class="text-right">Rp. <?= number_format($data->j12)  ?></td>
                		</tr>
						<tr>
							<td colspan="3"><center><strong>Total</strong></center></td>
							<td class="text-right"><strong>Rp. <?= number_format($data->t3) ?></strong></td>
						</tr>
					</tbody>
				</table>
				<hr>

			</div>

		</div>
	</div>
</div>
	