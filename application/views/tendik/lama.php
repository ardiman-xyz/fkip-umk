<br>
<div class="row justy-content-center">
	<div class="col-md-8 col-md-offset-2">
		<!-- PAGE CONTENT BEGINS -->

		<div class="widget-box light-border" id="widget-box-5">
			<div class="widget-header widget-header-flat">
				<h5 class="widget-title smaller">Buat surat keputusan seminar</h5>

				<div class="widget-toolbar">
					<a class="btn-xs btn btn-danger" href="<?= base_url('tendik/surat_seminar') ?>"><i class="ace-icon fa fa-arrow-left"></i> Back</a>
				</div>
			</div>

			<div class="widget-body">
				<div class="widget-main padding-6" >

					<div class="space-4"></div>
					
<form class="form-horizontal" role="form" method="post" action="<?= base_url('tendik/create_action') ?>">
						<h3 class="header smaller lighter blue">Tim Penguji</h3>

						<div class="form-group">
							<label class="col-sm-3 col-xs-4 control-label no-padding-right" for="form-field-1"> Ketua </label>

							<div class="col-sm-4 col-xs-8">
								<select class="form-control chosen-select" name="ketua" required>
									<option value="">--Pilih--</option>
									<?php foreach ($dosen as $data): ?>
										<option value="<?= $data->nama_dosen ?>"><?= $data->nama_dosen ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 col-xs-4 control-label no-padding-right" for="form-field-1"> Sekretaris </label>

							<div class="col-sm-4 col-xs-8">
								<select class="form-control chosen-select" name="sekretaris" required>
									<option value="">--Pilih--</option>
									<?php foreach ($dosen as $data): ?>
										<option value="<?= $data->nama_dosen ?>"><?= $data->nama_dosen ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 col-xs-4 control-label no-padding-right" for="form-field-1"> Anggota </label>

							<div class="col-sm-4 col-xs-8">
								<div class="row">
									<div class="col-md-10">
										<input type="text" id="form-field-1" placeholder="anggota..." class="form-control col-sm-5" name="anggota[]" required/>
									</div>
									<div class="col-md-2"><button id="tambah_anggota" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus"></i></button>
									</div>
								</div>
							</div>
						</div>

						<span id="result_anggota"></span>

						<h3 class="header smaller lighter blue">Jadwal Ujian</h3>

						<div class="form-group">
							<label class="col-sm-3 col-xs-4 control-label no-padding-right" for="form-field-1"> Jadwal Ujian </label>

							<div class="col-sm-3 col-xs-4">
								<input type="text" id="datepicker" placeholder="jadwal ujian..." class="form-control col-sm-5" name="jadwal_ujian" required autocomplete="off"/>
							</div>
						</div>


						<div class="form-group ">
							<label class="col-sm-3 col-xs-4 control-label no-padding-right" for="form-field-1"> Waktu </label>

							<div class="col-sm-2 col-xs-4">
								<div class="input-group clockpicker">
								    <input type="text" class="form-control" value="00:00" name="waktu">
								    <span class="input-group-addon">
								        <span class="glyphicon glyphicon-time"></span>
								    </span>
								</div>
							</div>
						</div>

						<h3 class="header smaller lighter blue">Mahasiswa yang UJian</h3>

						<button class="btn btn-primary btn-xs" id="add_column">Add Column</button>

						<div class="form-group">
							<label class="col-sm-3 col-xs-4 control-label no-padding-right" for="form-field-1"> NIM</label>

							<div class="col-sm-9 col-xs-8">
								<div class="row">
									<div class="col-md-8">
										<select class="form-control chosen-select" name="nim[]" id="nim">
											<option>--Pilih--</option>
											<?php foreach ($mahasiswa as $data): ?>
												<option value="<?= $data->nim ?>"><?= $data->nim ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-xs-4 control-label no-padding-right" for="form-field-1"> Nama</label>

							<div class="col-sm-9 col-xs-8">
								<div class="row">
									<div class="col-md-8">
										<input type="text" id="nama" placeholder="Masukkan nama..." class="form-control col-sm-5 " name="nama[]" required readonly />
									</div>
									
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 col-xs-4 control-label no-padding-right" for="form-field-1"> Judul Skripsi </label>

							<div class="col-sm-6 col-xs-8">
								<textarea id="judul_skripsi" rows="4"  class="autosize-transition form-control" name="judul_skripsi[]" placeholder="judul skripsi..." readonly required></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-xs-4 control-label no-padding-right" for="form-field-1"> Pembimbing I </label>

							<div class="col-sm-6 col-xs-8">
								<input type="text" name="pembimbing1[]" id="pembimbing1" class="form-control" readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 col-xs-4 control-label no-padding-right" for="form-field-1"> Pembimbing II </label>

							<div class="col-sm-6 col-xs-8">
								<input type="text" name="pembimbing2[]" id="pembimbing2" class="form-control" readonly>
							</div>
						</div>

						<div id="result"></div>

						<div class="clearfix form-actions">
							<div class="col-md-offset-3 col-md-9">
								&nbsp; &nbsp; &nbsp;
								<button class="btn btn-xs" type="reset">
									<i class="ace-icon fa fa-undo bigger-110"></i>
									Reset
								</button>
								<button class="btn btn-xs btn-info" type="submit">
									<i class="ace-icon fa fa-check bigger-110"></i>
									Submit
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- PAGE CONTENT END -->
	</div>
</div>