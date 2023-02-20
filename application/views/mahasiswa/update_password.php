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
						<?php if (!empty($data->image)): ?>
							   <img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="<?= base_url('assets/img/profile_pengguna/'.$data->image) ?>"/>
						<?php else: ?>

							<?php if ($data->jenis_kelamin == 'L'): ?>
				              <img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="<?= base_url('assets/img/') ?>men.jpg"/>
				            <?php else: ?>
				              <img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="<?= base_url('assets/img/') ?>muslim_women.jpg" />
				            <?php endif ?>

						<?php endif ?>
					</span>

					<div class="space-4"></div>

					<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
						<div class="inline position-relative">
							<i class="ace-icon fa fa-circle light-green"></i>
							&nbsp;
							<span class="white"><?= $this->session->userdata('nama_lengkap'); ?></span>
						</div>
					</div>
				</div>

				<div class="space-6"></div>

			</div>
			<div class="col-xs-12 col-sm-9">
			<?= $this->session->flashdata('sukses') ?>

				<form action="<?= base_url('mahasiswa/in/update_password') ?>" method="post">
					<div class="profile-user-info profile-user-info-striped">
						
							<div class="profile-info-row">
								<div class="profile-info-name"> Current Password </div>

								<div class="profile-info-value col-md-5">
									<input type="password" name="pass_lama" class="form-control">
									<?= form_error('pass_lama', '<small class="text-danger">', '</small>') ?>
								</div>
							</div>

							<div class="profile-info-row">
								<div class="profile-info-name"> New Password </div>

								<div class="profile-info-value col-md-5">
									<input type="password" name="pass_baru" class="form-control">
									<?= form_error('pass_baru', '<small class="text-danger">', '</small>') ?>
								</div>
							</div>

							<div class="profile-info-row">
								<div class="profile-info-name"> Repeat Password </div>

								<div class="profile-info-value  col-md-5">
									<input type="password" name="confirm_pass" class="form-control">
									<?= form_error('confirm_pass', '<small class="text-danger">', '</small>') ?>
								</div>
							</div>
					</div>

					<div class="space-6"></div>
					<button type="submit" class="btn btn-sm btn-primary" style="margin-left: 12px; margin-bottom: 5px">Change Password</button>
				</form>
			</div>
		</div>
	</div>
</div>		
<div class="hr dotted"></div>

<?php if ($this->session->flashdata('msg') == 'success'): ?>
	<script type="text/javascript">
		iziToast.success({
			timeout: 5000,
			icon: 'fa fa-check',
			title: 'ok',
			message: 'Password berhasil di update!',
			// position: 'topCenter'
		});
	</script>
<?php endif ?>