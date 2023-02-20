<br>

<div class="widget-box">

	<div class="widget-header widget-header-blue widget-header-flat">
		<h4 class="widget-title lighter">Set jadwal kegiatan PPL/MAGANG</h4>
	</div>

	<div class="widget-body">
		<div class="widget-main">

			<div class="container">
				<div class="col-md-8">
					<form class="" action="<?= base_url('unit/set_tgl_kegiatan') ?>" id="form_set">
						<input type="hidden" name="method" value="add" id="method">
						<input type="hidden" name="id" value="" id="id">
						<div class="form-group">
							<label for="nama" class="col-xs-12 col-sm-3 control-label no-padding-right">Tahun</label>

							<div class="col-xs-12 col-sm-5">
								<span class="block input-icon input-icon-right">
									<select class="width-70 chosen-select" name="tahun" id="tahun">
										<option value="">--Pilih--</option>
										<?php foreach ($tahun as $thn): ?>
											<option value="<?= $thn ?>"><?= $thn ?></option>
										<?php endforeach ?>
									</select>
								</span>
							</div>
							<div class="help-block col-xs-12 col-sm-reset inline"></div>
						</div>

						<div class="form-group">
							<label for="nama" class="col-xs-12 col-sm-3 control-label no-padding-right">set tanggal</label>

							<div class="col-xs-12 col-sm-6">
								<span class="block input-icon input-icon-right">
									<div class="input-daterange input-group">
										<input type="text" class="input-sm form-control" name="tgl_start" id="start" />
										<span class="input-group-addon">
											<i class="fa fa-exchange"></i>
										</span>

										<input type="text" class="input-sm form-control" name="tgl_end" id="end" />
									</div>		
								</span>
							</div>
							<div class="help-block col-xs-12 col-sm-reset inline"></div>
						</div>
					<br>
					<div class="" style="margin-left: 196px">
						<button class="btn btn-sm btn-primary btn-next" type="submit" id="submit">
							save
							<i class="ace-icon fa fa-send"></i>
						</button>
					</div>
						
					</form>
				</div>
			</div>

			<hr>

		</div>
	</div>
</div>


<script type="text/javascript">

	$(document).ready(function(){

		load_tgl();

		$('#submit').on('click', function(e){
			e.preventDefault();

			var btn = $('#submit');
        	btn.attr('disabled', 'disabled').html('<i class="fa fa-spin fa-spinner"></i> Sedang Proses');

        	var data = $('#form_set').serialize();
        	var url = $('#form_set').attr('action');

			var tahun = $('#tahun').val();
			var start = $('#start').val();

			if (tahun.length == 0) {
				swal('Oops!', 'Silahkan pilih tahun!', 'error');
				btn.removeAttr('disabled').html('<i class="ace-icon fa fa-send"></i> Save');
			} else if(start.length == 0)
			{
				swal('Oops!', 'Silahkan set tanggal!', 'error');
				btn.removeAttr('disabled').html('<i class="ace-icon fa fa-send"></i> Save');
			}else {

				$.ajax({
					type: 'post',
					url: url,
					dataType: 'json',
					data: data,
					success:function(callback)
					{
						btn.removeAttr('disabled').html('<i class="ace-icon fa fa-send"></i> Save');
						if (callback.pesan) {
							swal('sukses!', 'Tanggal berhasil di simpan!', 'success');

						} else if(callback.pesan === false)
						{
							swal('sukses!', 'Tanggal berhasil di Update!', 'success');
						}
						load_tgl();
					}
				});

			}
	

		});

	});



	function load_tgl()
	{

		$.ajax({
			type: 'get',
			dataType: 'json',
			url: '<?= base_url() ?>unit/load_tgl',
			success: (data) =>{
					// $selected = $('#tahun option:selected').text();
					// $('#tahun').val(data.tahun);
					$('#start').val(data.tgl_start);
					$('#end').val(data.tgl_end);

					$('#method').val('edit');
					$('#id').val(data.id);
					$('#submit').html('<i class="ace-icon fa fa-send"></i> Update');
					$('#submit').removeClass('btn-primary');
					$('#submit').addClass('btn-success');

			}
		});
	}

</script>
