<br>
<div class="row justy-content-center">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<!-- PAGE CONTENT BEGINS -->
		
		<div class="alert alert-block alert-success">
			<i class="ace-icon fa fa-check green"></i>
			Welcome <strong class="green"><?= $this->session->userdata('nama_lengkap'); ?></strong> to 
			<strong class="green">
				Fkip UMKendari
			</strong>, Silhakan buat surat, Daftar Ujian, Registrasi! dengan memasukkan data yang valid <br>
		</div>
	</div>
</div>
<div class="container">
	<div class="hr dotted"></div>

	<?php  
		if (isset($error)) {
			echo "<p class='alert alert-danger'>";
			echo $error;
			echo "</p>";
		}
	?>
	<div>

		<div id="user-profile-1" class="user-profile row">
			<div class="col-xs-12 col-sm-3 center">
				<div>
					<span class="profile-picture">
					 <img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="<?= base_url('assets/img/') ?>profil.png" width="200"/>
					</span>
					<div class="space-4"></div>
				</div>

				<div class="space-6"></div>
			</div>
			<div class="col-xs-12 col-sm-6">

					<div class="profile-user-info profile-user-info-striped">
						
							<div class="profile-info-row">
								<div class="profile-info-name"> Nama </div>

								<div class="profile-info-value col-md-5">
									<span class="editable" id="username"><?= $data->nama_lengkap ?></span>
								</div>
							</div>

							<div class="profile-info-row">
								<div class="profile-info-name"> NIM</div>

								<div class="profile-info-value col-md-5">
									<span class="editable" id="username"><?= $data->nim ?></span>
								</div>
							</div>

							<div class="profile-info-row">
								<div class="profile-info-name"> Jenis Kelamin </div>

								<div class="profile-info-value  col-md-5">
									<span class="editable" id="username">
										<?php if ($data->jenis_kelamin == 'L'): ?>
											<span class="editable" id="username">Laki-Laki</span>
										<?php else: ?>
											<span class="editable" id="username">Perempuan</span>
										<?php endif ?>
									</span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="profile-info-name"> Hak Akses</div>

								<div class="profile-info-value col-md-5">
									<span class="editable" id="username"><?= $data->hak_akses ?></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="profile-info-name"> Join </div>

								<div class="profile-info-value col-md-5">
									<span class="editable" id="username"><?= pengaturan_tgl($data->join) ?></span>
								</div>
							</div>

					</div>

					<div class="space-6"></div>
			</div>
		</div>
	</div>
</div>		
<div class="hr dotted"></div>