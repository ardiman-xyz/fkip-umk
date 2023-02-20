
<div class="container" style="margin-top: 20px">
	<div class="row">
	<form id="form_rab" method="post" action="<?= base_url('tendik/store_rab_ujian') ?>">
		<div class="col-md-10 col-md-offset-1">
			<div class="alert alert-warning">
			<i class="fa fa-bullhorn"></i> Buat RAB ujian 

			<select class="" required id="jenis_ujian" name="jenis_ujian" onchange="show_form($(this).val())">
				<option value="">--Pilih jenis ujian--</option>
				<?php foreach ($jenis_ujian as $key => $value): ?>
					<option value="<?= $value->id_ujian ?>"><?= $value->nama_ujian ?></option>
				<?php endforeach ?>
			</select>

			<input type="number" name="no_sk" placeholder="no sk" required width="150">

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
						<tr>
							<th class="text-center" width="15px">No</th>
							<th class="text-center" width="350px">Komponen</th>
							<th class="text-center" width="10px">jumlah orang</th>
							<th class="text-center">Jumlah</th>
							<th class="text-center" width="169px">Total (Rp.)</th>
						</tr>
						<tr>
							<td class="text-center">1</td>
							<td>Infak Mahasiswa</td>
							<td class="text-center">
								<input type="number" id="komponen1" autocomplete="off" name="infak_mhs" class="form-control" required>
							</td>
							<td class="text-right">@Rp. <span  id="jumlah1"><?= $data->pembayaran_mhs ?></span></td>
							<td class="text-right">
								<input type="text" id="total1" name="total1" class="form-control" value="0" readonly>
							</td>
						</tr>
					</table>

					<table class="table table-bordered table-hover table-sm">
						<h5>
							<i class="ace-icon fa fa-money green"></i>
							<strong>PENGELUARAN</strong>
						</h5>
						<tr>
							<th class="text-center" width="15px">No</th>
							<th class="text-center" width="350px">Komponen</th>
							<th class="text-center" width="10px">jumlah orang</th>
							<th class="text-center">Jumlah</th>
							<th class="text-center" width="169px">Total (Rp.)</th>
						</tr>
						<tr>
							<td class="text-center">1</td>
							<td>Insentif ketua penguji seminar</td>
							<td class="text-center">
								<input type="number" id="komponen2" autocomplete="off" name="insentif_ketua" class="form-control" required>
							</td>
							<td class="text-right">@Rp. <span  id="jumlah2"><?= $data->insentif_ketua_penguji ?></span></td>
							<td class="text-right">
								<span>
									<input type="text" id="total2" name="total2" class="form-control" value="0" readonly>
								</span>
							</td>
						</tr>
						<tr>
							<td class="text-center">2</td>
							<td>Insentif sekretaris penguji seminar</td>
							<td class="text-center">
								<input type="number" id="komponen3" autocomplete="off" name="insentif_sekretaris" class="form-control" required>
							</td>
							<td class="text-right">@Rp. <span id="jumlah3"><?= $data->insentif_sekretaris_penguji ?></span></td>
							<td class="text-right">
								<span>
									<input type="text" id="total3" name="total3" class="form-control" value="0" readonly>
								</span>
							</td>
						</tr>

						<!-- pemb1 & pemb2 -->
						<tr id="pemb1"></tr>
						<tr id="pemb2"></tr>
						<!-- end -->

						<tr>
							<td class="text-center">3</td>
							<td>Insentif anggota penguji seminar</td>
							<td class="text-center">
								<input type="number" id="komponen4" autocomplete="off" name="insentif_anggota" class="form-control" required>
							</td>
							<td class="text-right">@Rp. <span id="jumlah4"><?= $data->insentif_anggota_penguji ?></span></td>
							<td class="text-right">
								<span>
									<input type="text" id="total4" name="total4" class="form-control" value="0" readonly>
								</span>
							</td>
						</tr>
						<tr>
							<td class="text-center">4</td>
							<td>Insentif pengelola</td>
							<td class="text-center">
								<input type="number" id="komponen5" autocomplete="off" name="insentif_pengelola" class="form-control" required>
							</td>
							<td class="text-right">@Rp. <span id="jumlah5"><?= $data->insentif_pengelola ?></span></td>
							<td class="text-right">
								<span>
									<input type="text" id="total5" name="total5" class="form-control" value="0" readonly>
								</span>
							</td>
						</tr>
						<tr>
							<td class="text-center">5</td>
							<td>Konsumsi penguji</td>
							<td class="text-center">
								<input type="number" id="komponen6" autocomplete="off" name="konsumsi_penguji" class="form-control" required>
							</td>
							<td class="text-right">@Rp. <span id="jumlah6"><?= $data->konsumsi_penguji ?></span></td>
							<td class="text-right">
								<span>
									<input type="text" id="total6" name="total6" class="form-control" value="0" readonly>
								</span>
							</td>
						</tr>
						<tr>
							<td class="text-center">6</td>
							<td>Konsumsi pengelola</td>
							<td class="text-center">
								<input type="number" id="komponen7" autocomplete="off" name="konsumsi_pengelola" class="form-control" required>
							</td>
							<td class="text-right">@Rp. <span id="jumlah7"><?= $data->konsumsi_pengelola ?></span></td>
							<td class="text-right">
								<span>
									<input type="text" id="total7" name="total7" class="form-control" value="0" readonly>
								</span>
							</td>
						</tr>
						<tr>
							<td class="text-center">8</td>
							<td>Petugas kebersihan</td>
							<td class="text-center">
								<input type="number" id="komponen9" autocomplete="off" name="ptgs_kebersihan" class="form-control" required>
							</td>
							<td class="text-right">@Rp. <span id="jumlah9"><?= $data->petugas_kebersihan ?></span></td>
							<td class="text-right">
								<span>
									<input type="text" id="total9" name="total9" class="form-control" value="0" readonly>
								</span>
							</td>
						</tr>

						<tr>
							<td class="text-center">9</td>
							<td>Kas prodi</td>
							<td class="text-center">
								<input type="number" id="komponen10" autocomplete="off" name="kas_prodi" class="form-control" required>
							</td>
							<td class="text-right">@Rp. <span id="jumlah10"><?= $data->kas_prodi ?></span></td>
							<td class="text-right">
								<span>
									<input type="text" id="total10" name="total10" class="form-control" value="0" readonly>
								</span>
							</td>
						</tr>

						<tr>
							<td class="text-center">10</td>
							<td>Kas FKIP</td>
							<td class="text-center">
								<input type="number" id="komponen11" autocomplete="off" name="kas_fkip" class="form-control" required>
							</td>
							<td class="text-right">@Rp. <span id="jumlah11"><?= $data->kas_fkip ?></span></td>
							<td class="text-right">
								<span>
									<input type="text" id="total11" name="total11" class="form-control" value="0" readonly>
								</span>
							</td>
						</tr>
						<tr>
							<td class="text-center">11</td>
							<td>Kas universitas</td>
							<td class="text-center">
								<input type="number" id="komponen12" autocomplete="off" name="kas_universitas" class="form-control" required>
							</td>
							<td class="text-right">@Rp. <span id="jumlah12"><?= $data->kas_universitas ?></span></td>
							<td class="text-right">
								<span>
									<input type="text" id="total12" name="total12" class="form-control" value="0" readonly>
								</span>
							</td>
						</tr>
						<tfoot>
							<tr>
								<td class="text-center" colspan="4"><b>Total</b> <span id="jumlah13"></span></td>
								<td class="text-left"><b>
								<span id="grandTotal">
										
									</span>
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
							<td colspan="3"><b>Penerimaan - Pengeluaran</b>
							    <br>
								<span><a href="javascript:void(0)" title="cek saldo" onclick="cek_saldo()">cek saldo >></a></span>
							</td>
							<td class="" width="222px">
								<span id="saldo-operasi"></span>
								<span id="saldo" style="font-weight: bold;"></span>
							</td>
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
								<th class="text-center" width="100px">Insentif (Rp.)</th>
								<th class="text-center" width="100px">Total (Rp.)</th>
							</tr>
						</thead>
						<tbody>
							
						</tbody>
						
					</table>
					<button id="btn-tambah" type="button" class="btn-sm btn btn-primary"><i class="fa fa-plus"></i> Tambah</button>
					<hr>


					<span id="form_pembimbing"></span>


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
								<th class="text-center" width="100px">Insentif (Rp.)</th>
								<th class="text-center">Total (Rp.)</th>
							</tr>
						</thead>
						<tbody></tbody>
						
					</table>
					<button id="btn-tambah2" type="button" class="btn-sm btn btn-primary"><i class="fa fa-plus"></i> Tambah</button>
					<hr>

					<h5>
						<i class="ace-icon glyphicon glyphicon-user blue"></i>
						<strong>DAFTAR INSENTIF PETUGAS KEBERSIHAN SEMINAR PROFOSAL</strong> - <small>(max 3 orang)</small>
					</h5>
					<table class="table-sm table table-bordered table-hover" id="myTable3">
						<thead>
							<tr>
								<th class="text-center" rowspan="2" width="5px">NO</th>
								<th class="text-center" rowspan="2" width="40%">NAMA</th>
								<th class="text-center" colspan="3">JUMLAH</th>
								<th class="text-center" rowspan="2">Aksi</th>
							</tr>
							<tr>
								<th class="text-center" width="78px">Mahasiswa</th>
								<th class="text-center">Insentif (Rp.)</th>
								<th class="text-center">Total (Rp.)</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>

					<button id="btn-tambah3" type="button" class="btn-sm btn btn-primary"><i class="fa fa-plus"></i> Tambah</button>
					<hr>

					<h5>
						<i class="ace-icon fa fa-money blue"></i>
						<strong>PERMOHONAN PENCAIRAN ANGGARAN</strong>
					</h5><br>


					Jenis Pembayaran : 	
					<select name="jenis_bayar" required id="jenis_bayar">
						<option value="">--Pilih--</option>
						<option value="rekening">Rekening</option>
						<option value="kuitansi">Kuitansi</option>
					</select>	
					<hr>
					<table class="table-sm table table-hover">
						<tr>
							<td>Nama </td><td> : <input type="text" name="nama" required placeholder="Nama Pemohon"></td>
						</tr>
						<tr>
							<td>Jabatan </td><td> : <input type="text" name="jabatan_pengaju" required placeholder="Jabatan"></td>
						</tr>
						<tr>
							<td>Jumlah Pengajuan </td><td> : <input type="text" name="jml_pengajuan" readonly value="Otomatis nanti di surat"></td>
						</tr>
						<tr id="result_bayar1"></tr>
						<tr id="result_bayar2"></tr>
					</table>

					<br>
					<div class="form-actions center">
						<button type="submit" id="submit" class="btn btn-sm btn-primary">
							Simpan rab ujian
							<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
						</button>
					</div>

			</div>
		</div>
	<?php form_close(); ?>
	</div>
</div>

<?php require_once 'script.php' ?>
	