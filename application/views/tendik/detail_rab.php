
<div class="container" style="margin-top: 20px">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="alert alert-warning">
			<i class="fa fa-bullhorn"></i> Buat RAB ujian
		</div>

			<?= $this->session->flashdata('success') ?>
			
			<div style="margin-bottom: 10px">
				<a href="<?= base_url('tendik/rab_ujian') ?>" title="buat RAB Ujian" class="btn btn-sm btn-danger">&laquo; Kembali</a>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered table-hover table-sm" id="table">
					<h5>
						<i class="ace-icon fa fa-check green"></i>
						<strong>PENERIMAAN</strong>
					</h5>
					<thead>
						<tr>
							<th class="text-center" width="15px">No</th>
							<th class="text-center" width="350px">Komponen</th>
							<th class="text-center" width="10px">jumlah orang</th>
							<th class="text-center">Jumlah</th>
							<th class="text-center" width="169px">Total (Rp.)</th>
						</tr>
					</thead>
					<tr>
						<td class="text-center">1</td>
						<td>Infak Mahasiswa</td>
						<td class="text-center"><?= $data_rab->A1 ?></td>
						<td class="text-right">@Rp. <span  id="jumlah1"><?= $data->pembayaran_mhs ?></span></td>
						<td class="text-right"> Rp. <?= number_format($data_rab->J1) ?></td>
					</tr>
				</table>

				<table class="table table-bordered table-hover table-sm">
					<h5>
						<i class="ace-icon fa fa-money green"></i>
						<strong>PENGELUARAN</strong>
					</h5>
					<thead>
						<tr>
							<th class="text-center" width="15px">No</th>
							<th class="text-center" width="350px">Komponen</th>
							<th class="text-center" width="10px">jumlah orang</th>
							<th class="text-center">Jumlah</th>
							<th class="text-center" width="169px">Total (Rp.)</th>
						</tr>
					</thead>
					<tr>
						<td class="text-center">1</td>
						<td>Insentif ketua penguji seminar</td>
						<td class="text-center"><?= $data_rab->A2 ?></td>
						<td class="text-right">@Rp. <span  id="jumlah2"><?= $data->insentif_ketua_penguji ?></span></td>
						<td class="text-right">Rp. <?= number_format($data_rab->J2) ?></td>
					</tr>
					<tr>
						<td class="text-center">2</td>
						<td>Insentif sekretaris penguji seminar</td>
						<td class="text-center"><?= $data_rab->A3 ?></td>
						<td class="text-right">@Rp. <span id="jumlah3"><?= $data->insentif_sekretaris_penguji ?></span></td>
						<td class="text-right">Rp. <?= number_format($data_rab->J3) ?></td>
					</tr>
					<tr>
						<td class="text-center">3</td>
						<td>Insentif anggota penguji seminar</td>
						<td class="text-center"><?= $data_rab->A4 ?></td>
						<td class="text-right">@Rp. <span id="jumlah4"><?= $data->insentif_anggota_penguji ?></span></td>
						<td class="text-right">Rp. <?= number_format($data_rab->J4) ?></td>
					</tr>
					<tr>
						<td class="text-center">4</td>
						<td>Insentif pengelola</td>
						<td class="text-center"><?= $data_rab->A5 ?></td>
						<td class="text-right">@Rp. <span id="jumlah12"><?= $data->insentif_pengelola ?></span></td>
						<td class="text-right">Rp. <?= number_format($data_rab->J5) ?></td>
					</tr>
					<tr>
						<td class="text-center">5</td>
						<td>Konsumsi penguji</td>
						<td class="text-center"><?= $data_rab->A6 ?></td>
						<td class="text-right">@Rp. <span id="jumlah5"><?= $data->konsumsi_penguji ?></span></td>
						<td class="text-right">Rp. <?= number_format($data_rab->J6) ?></span>
						</td>
					</tr>
					<tr>
						<td class="text-center">6</td>
						<td>Konsumsi pengelola</td>
						<td class="text-center"><?= $data_rab->A7 ?></td>
						<td class="text-right">@Rp. <span id="jumlah6"><?= $data->konsumsi_pengelola ?></span></td>
						<td class="text-right">Rp. <?= number_format($data_rab->J7) ?></td>
					</tr>
					<tr>
						<td class="text-center">7</td>
						<td>Transportasi & Komunikasi</td>
						<td class="text-center"><?= $data_rab->A8 ?></td>
						<td class="text-right">@Rp. <span id="jumlah7"><?= $data->transportasi ?></span></td>
						<td class="text-right">Rp. <?= number_format($data_rab->J8) ?></td>
					</tr>
					<tr>
						<td class="text-center">8</td>
						<td>Petugas kebersihan</td>
						<td class="text-center"><?= $data_rab->A9 ?></td>
						<td class="text-right">@Rp. <span id="jumlah8"><?= $data->petugas_kebersihan ?></span></td>
						<td class="text-right">Rp. <?= number_format($data_rab->J9) ?></td>
					</tr>
					<tr>
						<td class="text-center">9</td>
						<td>Kas prodi</td>
						<td class="text-center"><?= $data_rab->A10 ?></td>
						<td class="text-right">@Rp. <span id="jumlah9"><?= $data->kas_prodi ?></span></td>
						<td class="text-right">Rp. <?= number_format($data_rab->J10) ?></td>
					</tr>
					<tr>
						<td class="text-center">10</td>
						<td>Kas FKIP</td>
						<td class="text-center"><?= $data_rab->A11 ?></td>
						<td class="text-right">@Rp. <span id="jumlah10"><?= $data->kas_fkip ?></span></td>
						<td class="text-right">Rp. <?= number_format($data_rab->J11) ?></td>
					</tr>
					<tr>
						<td class="text-center">11</td>
						<td>Kas universitas</td>
						<td class="text-center"><?= $data_rab->A12 ?></td>
						<td class="text-right">@Rp. <span id="jumlah11"><?= $data->kas_universitas ?></span></td>
						<td class="text-right">Rp. <?= number_format($data_rab->J12) ?></td>
					</tr>
					<tfoot>
						<tr>
							<td class="text-center" colspan="4"><b>Total</b></td>
							<td class="text-right">Rp. <b><?= number_format($data_rab->total) ?></b>
							</td>
						</tr>
					</tfoot>
				</table>
				<table class="table table-bordered table-hover">
					<h5>
						<i class="ace-icon fa fa-money green"></i>
						<strong>SALDO</strong>
					</h5>
					<tr>
						<td class="text-center" width="6px">1</td>
						<td colspan="3"><b>Penerimaan - Pengeluaran</b></td>
						<td class="text-right" width="222px"><b>Rp. <?= number_format($data_rab->saldo) ?></b></td>
					</tr>
				</table>
				<hr>

				<h5>
					<i class="ace-icon glyphicon glyphicon-user green"></i>
					<strong>DAFTAR INSENTIF PENGUJI SEMINAR PROFOSAL</strong>
				</h5>

				<table class="table-sm table table-bordered table-hover" id="myTable">
					<thead>
						<tr>
							<th class="text-center" rowspan="2" width="5px">NO</th>
							<th class="text-center" rowspan="2" width="35%">NAMA</th>
							<th class="text-center" rowspan="2">JABATAN</th>
							<th class="text-center" colspan="3">JUMLAH</th>
						</tr>
						<tr>
							<th class="text-center" width="5px">Mahasiswa</th>
							<th class="text-center">Insentif (Rp.)</th>
							<th class="text-center" width="150px">Total (Rp.)</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; 
						$jumlah = 0;
						foreach ($data_penguji as $penguji): 
							$nama_dosen = $this->dosen->get_nama_dosen($penguji->nama_anggota);

						?>
							<tr>
								<td class="text-center"><?= $no++ ?></td>
								<td class=""><?= $nama_dosen ?></td>
								<td class="text-center"><?= $penguji->jabatan ?></td>
								<td class="text-center"><?= $penguji->jml_mhs ?></td>
								<td class="text-center">Rp. <?= number_format($penguji->insentif) ?></td>
								<td class="text-center">Rp. <?= number_format($penguji->total) ?></td>
							</tr>
						<?php $jumlah += $penguji->total; endforeach ?>
						<tr>
							<td colspan="5" class="text-center"><b>Total</b></td>
							<td class="text-center"><b>Rp. <?= number_format($jumlah) ?></b></td>
						</tr>
					</tbody>
				</table>
				<hr>

				<h5>
					<i class="ace-icon glyphicon glyphicon-user blue"></i>
					<strong>DAFTAR INSENTIF PENGELOLA SEMINAR PROFOSAL</strong>
				</h5>

				<table class="table-sm table table-bordered table-hover" id="myTable2">
					<thead>
						<tr>
							<th class="text-center" rowspan="2" width="5px">NO</th>
							<th class="text-center" rowspan="2" width="35%">NAMA</th>
							<th class="text-center" rowspan="2">JABATAN</th>
							<th class="text-center" colspan="3">JUMLAH</th>
						</tr>
						<tr>
							<th class="text-center" width="78px">Mahasiswa</th>
							<th class="text-center">Insentif (Rp.)</th>
							<th class="text-center">Total (Rp.)</th>
						</tr>
					</thead>
					<tbody>
						<?php
						 $jumlah1 = 0;
						 $no = 1; foreach ($data_pengelola as $pengelola): 
							$nama_dosen = $this->dosen->get_nama_dosen($pengelola->nama_anggota);
						?>
							<tr>
								<td class="text-center"><?= $no++ ?></td>
								<td class=""><?= $nama_dosen ?></td>
								<td class="text-center">
									<?php if ($pengelola->jabatan === 'ka_prodi'): ?>
										Ka Prodi
									<?php elseif($pengelola->jabatan === 'staff_keuangan'): ?>
										Staff Keuangan
									<?php elseif($pengelola->jabatan === 'staff_administrasi'): ?>
										Staff Administrasi
									<?php elseif($pengelola->jabatan === 'staff_fakultas'): ?>
										Mahasiswa Magang / Staff Fakultas
									<?php endif ?>
								</td>
								<td class="text-center"><?= $pengelola->jml_mhs ?></td>
								<td class="text-center">Rp. <?= number_format($pengelola->insentif) ?></td>
								<td class="text-center">Rp. <?= number_format($pengelola->total) ?></td>
							</tr>
						<?php $jumlah1 += $pengelola->total; endforeach ?>
						<tr>
							<td colspan="5" class="text-center"><b>Total</b></td>
							<td class="text-center"><b>Rp. <?= number_format($jumlah1) ?></b></td>
						</tr>
					</tbody>
					
				</table>
				<hr>

				<h5>
					<i class="ace-icon glyphicon glyphicon-user orange"></i>
					<strong>DAFTAR INSENTIF PETUGAS KEBERSIHAN SEMINAR PROFOSAL</strong> - <small>(max 3 orang)</small>
				</h5>
				<table class="table-sm table table-bordered table-hover" id="myTable3">
					<thead>
						<tr>
							<th class="text-center" rowspan="2" width="5px">NO</th>
							<th class="text-center" rowspan="2" width="40%">NAMA</th>
							<th class="text-center" colspan="3">JUMLAH</th>
						</tr>
						<tr>
							<th class="text-center" width="78px">Mahasiswa</th>
							<th class="text-center">Insentif (Rp.)</th>
							<th class="text-center">Total (Rp.)</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$total = 0;
						$no =1; foreach ($data_petugas_k as $kebersihan): ?>
							<tr>
								<td class="text-center"><?= $no++ ?></td>
								<td><?= $kebersihan->nama ?></td>
								<td class="text-center"><?= $kebersihan->jml_mhs ?></td>
								<td class="text-center">Rp. <?= number_format($kebersihan->insentif) ?></td>
								<td class="text-center">Rp. <?= number_format($kebersihan->total) ?></td>
							</tr>
						<?php $total += $kebersihan->total; endforeach ?>
						<tr>
							<td colspan="4" class="text-center"><b>Total</b></td>
							<td class="text-center"><b>Rp. <?= number_format($total) ?></b></td>
						</tr>
					</tbody>
				</table>
				<hr>
			</div>
		</div>
	</div>
</div>

