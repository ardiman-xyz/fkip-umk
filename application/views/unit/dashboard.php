<br>
<div class="row justify-content-center">
	<div class="col-md-12 col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		
		<div class="alert alert-block alert-success">
			<i class="ace-icon fa fa-check green"></i>
			Welcome <strong class="green"><?= $this->session->userdata('level'); ?></strong>
			<strong class="green">
			di Unit Fkip UMKendari
			</strong><br>
		</div>
	</div>
</div>
<div class="container">
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
			<div class="col-xs-12 col-sm-8">

					<div class="profile-user-info profile-user-info-striped">
						
							<div class="profile-info-row">
								<div class="profile-info-name"> nama </div>

								<div class="profile-info-value col-md-5">
									<span class="editable" id="username"><b><?= $user->nama ?></b></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="profile-info-name"> username</div>

								<div class="profile-info-value col-md-5">
									<span class="editable" id="username"><?= $user->username ?></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="profile-info-name"> Level</div>

								<div class="profile-info-value col-md-5">
									<span class="editable" id="username"><span class="badge badge-success"><?= $user->level ?></span></span>
								</div>
							</div>
							<?php if ($this->session->userdata('level') == 'pengawas'): ?>
							<?php else: ?>
							<div class="profile-info-row">
								<div class="profile-info-name"> Lokasi</div>
								<?php $nama_sekolah = $this->unit->getNamaSekolah($user->id_sekolah) ?>
								<div class="profile-info-value col-md-5">
									<span class="editable" id="username"><?= $nama_sekolah ?></span>
								</div>
							</div>
							<?php endif ?>
							<div class="profile-info-row">
								<div class="profile-info-name"> Tahun</div>

								<div class="profile-info-value col-md-5">
									<span class="editable" id="username"><?= $user->tahun ?></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="profile-info-name"> Date Created</div>

								<div class="profile-info-value col-md-5">
									<span class="editable" id="username"><?= pengaturan_tgl($user->date_created) ?></span>
								</div>
							</div>


					</div>

					<div class="space-6"></div>
			</div>
		</div>
	</div>
</div>		