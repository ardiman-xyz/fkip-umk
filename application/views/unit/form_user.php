<br>
<div class="widget-box">
	<div class="widget-header widget-header-blue widget-header-flat">
		<h4 class="widget-title lighter">Form Create New User</h4>
	</div>

	<div class="widget-body">
		<div class="widget-main">

			<form class="form-horizontal" id="form_create" action="<?= base_url('unit/save_user') ?>">
				<div class="form-group">
					<label for="id_sekolah" class="col-xs-12 col-sm-3 control-label no-padding-right">Nama Sekolah</label>

					<input type="hidden" name="method" value="add">

					<div class="col-xs-12 col-sm-5">
						<span class="block input-icon input-icon-right">
							<select class="width-100 chosen-select" name="id_sekolah">
								<option value="">--Pilih--</option>
								<?php foreach ($sekolah as $data): ?>
									<option value="<?= $data->id ?>"><?= $data->nama_sekolah ?></option>
								<?php endforeach ?>
							</select>
						</span>
					</div>
					<div class="help-block col-xs-12 col-sm-reset inline"></div>
					
				</div>

				<div class="form-group">
					<label for="nama" class="col-xs-12 col-sm-3 control-label no-padding-right">Nama Lengkap</label>

					<div class="col-xs-12 col-sm-5">
						<span class="block input-icon input-icon-right">
							<input type="text" id="nama" class="width-100" name="nama" />
							<i class="ace-icon fa fa-user"></i>
						</span>
					</div>
					<div class="help-block col-xs-12 col-sm-reset inline"></div>
				</div>

				<div class="form-group">
					<label for="username" class="col-xs-12 col-sm-3 control-label no-padding-right">Username</label>

					<div class="col-xs-12 col-sm-5">
						<span class="block input-icon input-icon-right">
							<input type="text" id="username" class="width-100" name="username" />
							<i class="ace-icon fa fa-user"></i>
						</span>
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-xs-12 col-sm-3 control-label no-padding-right">Password</label>

					<div class="col-xs-12 col-sm-5">
						<span class="block input-icon input-icon-right">
							<input type="password" id="password" class="width-100" name="password" />
							<div class="checkbox">
								<label>
									<input name="form-field-checkbox" type="checkbox" id="show" class="ace" />
									<span class="lbl"> Show</span>
								</label>
							</div>
							<i class="ace-icon fa fa-key"></i>
						</span>
					</div>
					
				</div>
				<div class="form-group">
					<label for="active" class="col-xs-12 col-sm-3 control-label no-padding-right">Jenis Kelamin</label>

					<div class="col-xs-12 col-sm-5">
						<span class="block input-icon input-icon-right">
							<select class="width-30 chosen-select" name="jenis_kelamin">
								<option value="">--Pilih--</option>
								<option value="L">Laki-laki</option>
								<option value="P">Perempuan</option>
							</select>
						</span>
					</div>
				</div>
				<div class="form-group">
					<label for="active" class="col-xs-12 col-sm-3 control-label no-padding-right">Tahun</label>

					<div class="col-xs-12 col-sm-5">
						<span class="block input-icon input-icon-right">
							<select class="width-30 chosen-select" name="tahun">
								<option value="">--Pilih--</option>
								<?php foreach ($tahun as $thn): ?>
									<option value="<?= $thn ?>"><?= $thn ?></option>
								<?php endforeach ?>
							</select>
						</span>
					</div>
				</div>
				<div class="form-group">
					<label for="active" class="col-xs-12 col-sm-3 control-label no-padding-right">Active</label>

					<div class="col-xs-12 col-sm-5">
						<span class="block input-icon input-icon-right">
							<select class="width-30 chosen-select" name="active">
								<option value="">--Pilih--</option>
								<option value="Y">Ya</option>
								<option value="N">No</option>
							</select>
						</span>
					</div>
				</div>
				<hr>
				<div class="" align="center">
					<a href="<?= base_url('unit/user') ?>" class="btn btn-sm btn-danger">
						<i class="ace-icon fa fa-times"></i>
						Cancel
					</a>

					<button class="btn btn-sm btn-primary btn-next" type="submit" id="submit">
						save
						<i class="ace-icon fa fa-send"></i>
					</button>
				</div>
			</form>

		</div>
	</div>
</div>


<script type="text/javascript">

	$(document).ready(function(){

		$('#show').on('click', function(){
			if ($(this).is(':checked')) {
				$('#password').attr('type', 'text');
			} else {
				$('#password').attr('type', 'password');
			}
		});

		var	url = '<?= base_url() ?>unit/user';

		$('#form_create').on('submit', function (e) {
	        e.preventDefault();
	        e.stopImmediatePropagation();

        	var btn = $('#submit');
        	btn.attr('disabled', 'disabled').html('<i class="fa fa-spin fa-spinner"></i> Sedang Proses');

	        $.ajax({
	            url: $(this).attr('action'),
	            data: $(this).serialize(),
	            type: 'POST',
	            success: function (data) {

	               btn.removeAttr('disabled').html('<i class="ace-icon fa fa-send"></i> Save');

	               if (data.status) {
	               		Swal({
	                        "title": "Sukses",
	                        "text": "Data Berhasil disimpan",
	                        "type": "success"
	                    }).then((result) => {
	                        if (result.value) {
	                            window.location.href = url;
	                        }
	                    });

	               } else {
		               $.each(data.errors, function (key, value) {
	                        $('[name="' + key + '"]').parents('.inline').text(value);
	                        $('[name="' + key + '"]').closest('.form-group').addClass('has-error');
	                        if (value == '') {
	                            $('[name="' + key + '"]').nextAll('.help-block').eq(0).text('');
	                            $('[name="' + key + '"]').closest('.form-group').removeClass('has-error').addClass('has-success');
	                        }

	                    });
		        	}
	             }
		    });
	    });


		$('#show').on('chec')

	});

</script>