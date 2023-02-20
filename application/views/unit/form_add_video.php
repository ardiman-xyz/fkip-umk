<br>
<div class="widget-box">
	<div class="widget-header widget-header-blue widget-header-flat">
		<h4 class="widget-title lighter">Form Create New Video</h4>
	</div>

	<div class="widget-body">
		<div class="widget-main">

			<form class="form-horizontal" id="form_create" action="<?= base_url('unit/save_video') ?>">
				<div class="form-group">

					<input type="hidden" name="method" value="add">

				<div class="form-group">
					<label for="judul" class="col-xs-12 col-sm-3 control-label">Judul</label>

					<div class="col-xs-12 col-sm-5">
						<span class="block input-icon">
							<input type="text" id="judul" class="width-100" name="judul" placeholder="masukkan judul" />
						</span>
					</div>
					<div class="help-block col-xs-12 col-sm-reset inline"></div>
				</div>

				<div class="form-group">
					<label for="link" class="col-xs-12 col-sm-3 control-label no-padding-right">Link Youtube</label>

					<div class="col-xs-12 col-sm-5">
						<span class="block input-icon">
							<input type="text" id="link" class="width-100" name="link" placeholder="contoh : Z18bhQcg6PQ" />
						</span>
						<p style="color: red">masukkan link youtube setelah = <span style="color: green">http:://www.youtube.com/watch?v= &nbsp;</span></p>

					</div>
				</div>
				<div class="form-group">
					<label for="tgl" class="col-xs-12 col-sm-3 control-label no-padding-right">Tanggal Pelaksanaan</label>

					<div class="col-xs-12 col-sm-5">
						<span class="block input-icon input-icon-right">
							<input type="date" id="tgl" class="width-50" name="tgl" />
						</span>
					</div>
				</div>
				<hr>
				<div class="" align="center">
					<a href="<?= base_url('unit/video') ?>" class="btn btn-sm btn-danger">
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

		var	url = '<?= base_url() ?>unit/video';

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