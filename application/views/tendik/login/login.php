<div class="main-container">
<div class="main-content">
	<div class="overlay loading" style="display: none">
	  <div class="lds-ripple"><div></div><div></div></div>
	</div>
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="login-container">
				<div class="center">
					<h1>
						<span class="orange">Login</span>
						<span class="green" id="id-text2">Tendik</span>
					</h1>
					<h4 class="blue" id="id-company-text">&copy; FKIP UMkendari</h4>
				</div>


				<div class="space-6"></div>

				<div class="position-relative">
					<div id="login-box" class="login-box visible widget-box no-border">
						<div class="widget-body login-layout light-login">
							<div class="widget-main">
								<div class="center">
									<img src="<?= base_url('assets/img/new_logo_fkip.jpeg') ?>" width="100">
								</div>
								<hr>
								<span id="pesan"></span>
								<div class="space-6"></div>
								<form method="post" action="<?= base_url('tendik/login') ?>" id="formLoginTendik">
									<fieldset>
										<label class="block clearfix">
											<span class="block input-icon input-icon-right">
												<input type="text" class="form-control" placeholder="Username" name="username" required />
												<i class="ace-icon fa fa-user"></i>
											</span>
										</label>

										<label class="block clearfix">
											<span class="block input-icon input-icon-right">
												<input type="password" id="password" class="form-control" placeholder="Password" name="password" required/>
												<i class="ace-icon fa fa-lock"></i>
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
											<button type="submit" id="login-btn" class="btn-block btn btn-md btn-primary">
												Login
											</button>
										</div>

										<div class="space-4"></div>
									</fieldset>
								</form>
							</div><!-- /.widget-main -->

						</div><!-- /.widget-body -->
					</div><!-- /.login-box -->

					
				</div><!-- /.position-relative -->
			</div>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.main-content -->
</div><!-- /.main-container -->
