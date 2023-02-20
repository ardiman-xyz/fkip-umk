
<div class="widget-box">
	<div class="widget-header widget-header-flat">
		<h4 class="widget-title">Konfigurasi RAB</h4>
	</div>

	<div class="widget-body">
		<form method="post" action="<?= base_url('admin/config') ?>">
			<div class="widget-main">
			<div class="row">
				<div class="col-sm-6">
					<table class="table table-hover">
						<h5>
							<i class="ace-icon fa fa-check green"></i>
							<strong>PENERIMAAN</strong>
						</h5>
						<tr>
							<td>Pembayaran Mahasiswa : </td>
							<td>
								<div class="input-group">
									<span class="input-group-addon">
										Rp.
									</span>

									<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" name="pembayaran_mhs" value="<?= number_format($rab->pembayaran_mhs,2) ?>"/>
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

									<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" name="kas_prodi" value="<?= number_format($rab->kas_prodi) ?>"/>
								</div>
							</td>
						</tr>
						<tr>
							<td>Kas FKIP : </td><td>
								<div class="input-group">
									<span class="input-group-addon">
										Rp.
									</span>

									<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" name="kas_fkip" value="<?= number_format($rab->kas_fkip) ?>"/>
								</div>
							</td>
						</tr>
						<tr>
							<td>Kas Universitas : </td><td>
								<div class="input-group">
									<span class="input-group-addon">
										Rp.
									</span>

									<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" name="kas_universitas" value="<?= number_format($rab->kas_universitas) ?>"/>
								</div>
							</td>
						</tr>
					</table>
				</div>
				<div class="col-sm-6">
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

									<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" name="insentif_ketua_penguji" value="<?= number_format($rab->insentif_ketua_penguji) ?>"/>
								</div></td>
						</tr>
						<tr>
							<td>Insentif Sekretaris Penguji : </td><td>
								<div class="input-group">
									<span class="input-group-addon">
										Rp.
									</span>

									<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" name="insentif_sekretaris_penguji" value="<?= number_format($rab->insentif_sekretaris_penguji) ?>"/>
								</div>
							</td>
						</tr>
						<tr>
							<td>Insentif Anggota Penguji: </td><td>
								<div class="input-group">
									<span class="input-group-addon">
										Rp.
									</span>

									<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" name="insentif_anggota_penguji" value="<?= number_format($rab->insentif_anggota_penguji) ?>"/>
								</div>
							</td>
						</tr>
						<tr>
							<td>Insentif Pengelola : </td><td>
								<div class="input-group">
									<span class="input-group-addon">
										Rp.
									</span>

									<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" name="" value="<?= number_format($rab->insentif_pengelola) ?>"/>
								</div>
							</td>
						</tr>
						<tr>
							<td>Makan Siang : </td><td>
								<div class="input-group">
									<span class="input-group-addon">
										Rp.
									</span>

									<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" value="<?= number_format($rab->makan_siang_penguji) ?>"/>
								</div>
							</td>
						</tr>
						<tr>
							<td>Snack Penguji : </td><td>
								<div class="input-group">
									<span class="input-group-addon">
										Rp.
									</span>

									<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" value="<?= number_format($rab->snack_penguji) ?>"/>
								</div>
							</td>
						</tr>
						<tr>
							<td>Makan Siang Pengelola: </td><td>
								<div class="input-group">
									<span class="input-group-addon">
										Rp.
									</span>

									<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" value=""/>
								</div>
							</td>
						</tr>
						<tr>
							<td>Snack Pengelola : </td><td>
								<div class="input-group">
									<span class="input-group-addon">
										Rp.
									</span>

									<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" value=""/>
								</div>
							</td>
						</tr>
						<tr>
							<td>Transportasi : </td><td>
								<div class="input-group">
									<span class="input-group-addon">
										Rp.
									</span>

									<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" value=""/>
								</div>
							</td>
						</tr>
						<tr>
							<td>Petugas Kebersihan : </td><td>
								<div class="input-group">
									<span class="input-group-addon">
										Rp.
									</span>

									<input class="form-control input-mask-phone" type="text" id="form-field-mask-2" value=""/>
								</div>
							</td>
						</tr>
							
						</table>
				</div>
			</div>

			<div class="form-actions center">
				<button type="button" class="btn btn-sm btn-primary">
					Update Configurasi
					<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
				</button>
			</div>
		</div>
		</form>
	</div>
</div>