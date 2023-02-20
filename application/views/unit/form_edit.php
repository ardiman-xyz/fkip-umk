<br>
<div class="widget-box">
	<div class="widget-header widget-header-blue widget-header-flat">
		<h4 class="widget-title lighter">Edit pamong <b><?= $user->nama ?></b></h4>
	</div>

	<div class="widget-body">
		<div class="widget-main">

			<?= form_open('unit/save_user', array('id'=>'form_update', 'class '=>'form-horizontal'), array('method'=>'edit', 'id_user'=>$user->id))?>
				<div class="form-group">
					<label for="id_sekolah" class="col-xs-12 col-sm-3 control-label no-padding-right">Nama Sekolah</label>

					<div class="col-xs-12 col-sm-5">
						<span class="block input-icon input-icon-right">
							<select class="width-100 chosen-select" name="id_sekolah">
								<option value="">--Pilih--</option>
								<?php foreach ($sekolah as $data): ?>
									 <option value="<?= $data->id; ?>" <?= $user->id_sekolah === $data->id ? "selected" : "" ?> ><?= $data->nama_sekolah; ?></option>
								<?php endforeach ?>
							</select>
						</span>
					</div>
					
				</div>
				<div class="form-group">
					<label for="nama" class="col-xs-12 col-sm-3 control-label no-padding-right">Nama Lengkap</label>

					<div class="col-xs-12 col-sm-5">
						<span class="block input-icon input-icon-right">
							<input type="text" id="nama" class="width-100" name="nama" value="<?= $user->nama ?>"/>
							<i class="ace-icon fa fa-user"></i>
						</span>
					</div>
					<div class="help-block col-xs-12 col-sm-reset inline"></div>
				</div>
				<div class="form-group">
					<label for="username" class="col-xs-12 col-sm-3 control-label no-padding-right">Username</label>

					<div class="col-xs-12 col-sm-5">
						<span class="block input-icon input-icon-right">
							<input type="text" id="username" class="width-100" name="username"  value="<?= $user->username ?>"/>
							<i class="ace-icon fa fa-user"></i>
						</span>
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-xs-12 col-sm-3 control-label no-padding-right">Password</label>

					<div class="col-xs-12 col-sm-5">
						<span class="block input-icon input-icon-right">
							<input type="password"   value="<?= $user->password ?>" readonly id="password" class="width-100" name="password" />
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
								<option value="L" <?=$user->jenis_kelamin === "L" ? "selected" : "" ?>>L</option>
								<option value="P" <?=$user->jenis_kelamin === "P" ? "selected" : "" ?>>P</option>
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
									<option value="<?= $thn ?>" <?= $user->tahun === $thn ? "selected" : "" ?>><?= $thn ?></option>
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
								<option value="Y" <?=$user->active === "Y" ? "selected" : "" ?>>Ya</option>
								<option value="N" <?=$user->active === "N" ? "selected" : "" ?>>No</option>
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
						Update
						<i class="ace-icon fa fa-send"></i>
					</button>
				</div>
			</form>

		</div>
	</div>
</div>


<script type="text/javascript">

	$(document).ready(function(){

		var	url = '<?= base_url() ?>unit/user';

		$('#form_update').on('submit', function (e) {
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
	                        "text": "Data Berhasil diedit",
	                        "type": "success"
	                    }).then((result) => {
	                        if (result.value) {
	                            window.location.href = url;
	                        }
	                    });

	               } else {
		               $.each(data.errors, function (key, value) {
	                        $('[name="' + key + '"]').nextAll('.inline').eq(0).text(value);
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