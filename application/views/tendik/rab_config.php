<div class="container" style="margin-top: 20px">

	<div class="alert alert-warning">
		<i class="fa fa-warning"></i> Konfigurasi Rab
	</div>

	<?= $this->session->flashdata('success') ?>
		
	<div class="widget-box">
		<div class="widget-header widget-header-flat">
			<h4 class="widget-title">Konfigurasi RAB</h4>
		</div>

		<div class="widget-body">
			<form method="post" action="<?= base_url('tendik/update_config_rab/'.$rab->id_config) ?>">
				<div class="widget-main">
				<div class="row">
					<div class="col-sm-6">
						<table class="table table-hover">
							<h5>
								<i class="ace-icon fa fa-check green"></i>
								<strong>PENERIMAAN</strong>
							</h5>
							<tr>
								<td>Infak Mahasiswa (proposal, hasil) : </td>
								<td>
									<div class="input-group">
										<span class="input-group-addon">
											Rp.
										</span>

										<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" name="infak_mhs" value="<?= $rab->pembayaran_mhs ?>"/>
									</div>
									
								</td>
							</tr>
							<tr>
								<td>Pembayaran Mahasiswa (skripsi): </td>
								<td>
									<div class="input-group">
										<span class="input-group-addon">
											Rp.
										</span>

										<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" name="pembayaran_mhs_skripsi" value="<?= $rab->pembayaran_mhs_skripsi ?>"/>
									</div>
									
								</td>
							</tr>
							<tr>
								<td>Kas Prodi : </td>
								<td>
									<div class="input-group">
										<span class="input-group-addon">
											Rp.
										</span>

										<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" name="kas_prodi" value="<?= $rab->kas_prodi ?>"/>
									</div>
								</td>
							</tr>
							<tr>
								<td>Kas FKIP : </td><td>
									<div class="input-group">
										<span class="input-group-addon">
											Rp.
										</span>

										<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" name="kas_fkip" value="<?= $rab->kas_fkip ?>"/>
									</div>
								</td>
							</tr>
							<tr>
								<td>Kas Universitas : </td><td>
									<div class="input-group">
										<span class="input-group-addon">
											Rp.
										</span>

										<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" name="kas_universitas" value="<?= $rab->kas_universitas ?>"/>
									</div>
								</td>
							</tr>
						</table>
						<hr>
						<h5>
						<i class="ace-icon fa fa-check green"></i>
						<strong>PENGELUARAN</strong>
					</h5>
					<table class="table table-hover">
						<tr>
						<td>Insentif Ketua Penguji : </td><td><div class="input-group">
								<span class="input-group-addon">
									Rp.
								</span>

								<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" name="insentif_ketua_penguji" value="<?= $rab->insentif_ketua_penguji ?>"/>
							</div></td>
					</tr>
					<tr>
						<td>Insentif Sekretaris Penguji : </td><td>
							<div class="input-group">
								<span class="input-group-addon">
									Rp.
								</span>

								<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" name="insentif_sekretaris_penguji" value="<?= $rab->insentif_sekretaris_penguji ?>"/>
							</div>
						</td>
					</tr>
					<tr>
						<td>Insentif Anggota Penguji: </td><td>
							<div class="input-group">
								<span class="input-group-addon">
									Rp.
								</span>

								<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" name="insentif_anggota_penguji" value="<?= $rab->insentif_anggota_penguji ?>"/>
							</div>
						</td>
					</tr>
					<tr>
						<td>Insentif Pengelola : </td><td>
							<div class="input-group">
								<span class="input-group-addon">
									Rp.
								</span>

								<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" name="insentif_pengelola" value="<?= $rab->insentif_pengelola ?>"/>
							</div>
						</td>
					</tr>
					<tr>
						<td>Konsumsi penguji : </td><td>
							<div class="input-group">
								<span class="input-group-addon">
									Rp.
								</span>

								<input class="form-control input-mask-phone" name="konsumsi_penguji" type="text" id="form-field-mask-2" value="<?= $rab->konsumsi_penguji?>"/>
							</div>
						</td>
					</tr>
					<tr>
						<td>Konsumsi pengelola : </td><td>
							<div class="input-group">
								<span class="input-group-addon">
									Rp.
								</span>

								<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" name="konsumsi_pengelola" value="<?= $rab->konsumsi_pengelola?>"/>
							</div>
						</td>
					</tr>
					<tr>
						<td>Transportasi: </td><td>
							<div class="input-group">
								<span class="input-group-addon">
									Rp.
								</span>

								<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" name="transportasi" value="<?= $rab->transportasi ?>"/>
							</div>
						</td>
					</tr>
					<tr>
						<td>Petugas Kebersihan : </td><td>
							<div class="input-group">
								<span class="input-group-addon">
									Rp.
								</span>

								<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" name="petugas_kebersihan" value="<?= $rab->petugas_kebersihan ?>"/>
							</div>
						</td>
					</tr>
					<tr>
						<td>Insentif Pembimbing I : </td><td>
							<div class="input-group">
								<span class="input-group-addon">
									Rp.
								</span>

								<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" value="<?= $rab->insentif_pemb1 ?>" name="insentif_pemb1"/>
							</div>
						</td>
					</tr>
					<tr>
						<td>Insentif Pembimbing II : </td><td>
							<div class="input-group">
								<span class="input-group-addon">
									Rp.
								</span>

								<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" value="<?= $rab->insentif_pemb2 ?>" name="insentif_pemb2"/>
							</div>
						</td>
					</tr>
					</table>
					<hr>
					</div>
					<div class="col-sm-6">
						
							<table class="table table-hover">
							<h5>
								<i class="ace-icon glyphicon glyphicon-user black"></i>
								<strong>INSENTIF LAIN</strong>
							</h5>
							<tr>
								<td>Ka Prodi : </td>
								<td>
									<div class="input-group">
										<span class="input-group-addon">
											Rp.
										</span>

										<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" name="ka_prodi" value="<?= $rab->ka_prodi ?>"/>
									</div>
									
								</td>
							</tr>
							<tr>
								<td>Staff Keuangan : </td>
								<td>
									<div class="input-group">
										<span class="input-group-addon">
											Rp.
										</span>

										<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" name="staff_keuangan" value="<?= $rab->staff_keuangan ?>"/>
									</div>
								</td>
							</tr>
							<tr>
								<td>Staff Admiistrasi : </td><td>
									<div class="input-group">
										<span class="input-group-addon">
											Rp.
										</span>

										<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" name="staff_administrasi" value="<?= $rab->staff_administrasi ?>"/>
									</div>
								</td>
							</tr>
							<tr>
								<td>Staff fakultas : </td><td>
									<div class="input-group">
										<span class="input-group-addon">
											Rp.
										</span>

										<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" name="staff_fakultas" value="<?= $rab->staff_fakultas ?>"/>
									</div>
								</td>
							</tr>

							
						</table>
					</div>
				</div>

				<div class="form-actions center">
					<button type="submit" class="btn btn-sm btn-primary">
						Update Configurasi rab
						<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
					</button>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>