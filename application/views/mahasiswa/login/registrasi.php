
<div class="row" style="margin-top: 20px">
	<div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
			<div class="login-container">
			<div class="signup-box visible widget-box no-border">
				<div class="widget-body">
					<div class="widget-main">
						<h4 class="header green lighter bigger">
							<i class="ace-icon fa fa-users blue"></i>
							New User Registration
						</h4>

						<div class="space-6"></div>
						<?php if ($this->session->flashdata("gagal")): ?>
							<div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert">
									<i class="ace-icon fa fa-times"></i>
								</button>

								<strong>
									<i class="ace-icon fa fa-bullhorn"></i>
									Maaf!
								</strong>

								<?= $this->session->flashdata("gagal"); ?>, Silahkan coba nim yang lain
								<br />
							</div>
						<?php endif ?>

						<p> Enter your details to begin: </p>

						<form method="post" action="<?= base_url('mahasiswa/in/registrasi_action') ?>">
							<fieldset>
								<label class="block clearfix">
									<span class="block input-icon input-icon-right">
										<input type="text" class="form-control" placeholder="Masukkan Nama Lengkap..." name="nama_lengkap" required/>
									</span>
								</label>

								<label class="block clearfix">
									<span class="block input-icon input-icon-right">
										<input type="text" class="form-control" placeholder="Nim" name="nim" required/>
									</span>
								</label>

								<label class="block clearfix">
									<span class="block input-icon input-icon-right">
										<input type="password" class="form-control" placeholder="Password" name="password" id="password" required/>
									</span>
								</label>


								<label class="block clearfix">
									<span class="block input-icon input-icon-right">
										<select name="jenis_kelamin" class="form-control" required>
											<option value="">--Pilih Jenis Kelamin--</option>
											<option value="L">Laki-laki</option>
											<option value="P">Perempuan</option>
										</select>
									</span>
								</label>

								<div class="checkbox">
									<label>
										<input name="form-field-checkbox" type="checkbox" id="show" class="ace" />
										<span class="lbl"> Show Password</span>
									</label>
								</div>

								<div class="space-24"></div>

								<div class="clearfix">
									<button type="reset" class="width-30 pull-left btn btn-sm">
										<i class="ace-icon fa fa-refresh"></i>
										<span class="bigger-110">Reset</span>
									</button>

									<button type="submit" onsubmit="cek()" class="width-65 pull-right btn btn-sm btn-success">
										<span class="bigger-110">Register</span>

										<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
									</button>
								</div>
							</fieldset>
						</form>
					</div>

					<div class="toolbar center">
						<a href="<?= base_url('mahasiswa/login') ?>" class="back-to-login-link">
							<i class="ace-icon fa fa-arrow-left"></i>
							Back to login
						</a>
					</div>
				</div><!-- /.widget-body -->
			</div><!-- /.signup-box -->
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
	});
</script>