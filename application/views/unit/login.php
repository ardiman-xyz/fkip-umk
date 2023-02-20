<div class="main-container">
<div class="main-content">
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="login-container">
				<div class="center">
					<h1>
						<i class="ace-icon fa fa-leaf green"></i>
						<span class="red">Login</span>
						<span class="white" id="id-text2">Unit</span>
					</h1>
					<h4 class="blue" id="id-company-text">&copy; FKIP UMKendari</h4>
				</div>

				<div class="space-6"></div>

				<div class="position-relative">
					<div id="login-box" class="login-box visible widget-box no-border">
						<div class="widget-body login-layout light-login">
							<div class="widget-main">
								<h4 class="header blue lighter bigger">
									<i class="ace-icon fa fa-coffee green"></i>
									Login with Your Account
								</h4>

								<div class="space-6"></div>

								<?= $this->session->flashdata("sukses") ?>
								<?= $this->session->flashdata("gagal") ?>
								<div class="space-6"></div>

								<form method="post" action="<?= base_url('unit/login') ?>">
									<fieldset>
										<label class="block clearfix">
											<span class="block input-icon input-icon-right">
												<input type="text" class="form-control" placeholder="Username" name="username" required />
												<i class="ace-icon fa fa-user"></i>
											</span>
										</label>

										<label class="block clearfix">
											<span class="block input-icon input-icon-right">
												<input type="password" class="form-control" placeholder="Password" id="password" name="password" required/>

												<i class="ace-icon fa fa-lock"></i>
											</span>
										</label>

										<label class="block clearfix">
											<span class="block input-icon input-icon-right">
												<select class="form-control" name="hak_akses" required>
													<option value="">--Hak Akses--</option>
													<option value="pamong">Pamong</option>
													<option value="pengawas">Pengawas</option>
												</select>
											</span>
										</label>
										<div class="checkbox">
											<label>
												<input name="form-field-checkbox" type="checkbox" id="show" class="ace" />
												<span class="lbl"> Show Password</span>
											</label>
										</div>

										<div class="space"></div>

										<div class="clearfix">
											<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
												<i class="ace-icon fa fa-key"></i>
												<span class="bigger-110">Login</span>
											</button>
										</div>

										<div class="space-4"></div>
									</fieldset>
								</form>
							</div><!-- /.widget-main -->

							<div class="toolbar clearfix">
								<div>
									<a href="<?= base_url() ?>" class="forgot-password-link">
										<i class="ace-icon fa fa-arrow-left"></i>
										Back
									</a>
								</div>
							</div>
						</div><!-- /.widget-body -->
					</div><!-- /.login-box -->

					
				</div><!-- /.position-relative -->
			</div>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.main-content -->
</div><!-- /.main-container -->

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