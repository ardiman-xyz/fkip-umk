<div class="container">
	<div class="hr dotted"></div>

	<?= $this->session->flashdata('sukses') ?>
	<?php  
		if (isset($error)) {
			echo "<p class='alert alert-danger'>";
			echo $error;
			echo "</p>";
		}
	?>
	<div>
	<?= form_open_multipart('mahasiswa/in/profil');?>

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
					<div class="space-6"></div>
					<div class="form-group">
						<div class="alert alert-warning">
							<small class="text-danger">Silahkan Upload foto anda! max 2 MB</small>
						</div>
						<div class="col-xs-12">
							<input type="file" id="id-input-file-2" name="image" />
						</div>
						<div class="space-6"></div>
					</div>
				</div>

				<div class="space-6"></div>

			</div>
			<div class="col-xs-12 col-sm-9">

				<div class="profile-user-info profile-user-info-striped">
					
						<div class="profile-info-row">
							<div class="profile-info-name"> Nama Lengkap </div>

							<div class="profile-info-value">
								<input type="text" name="nama_lengkap" class="form-control" value="<?= $data->nama_lengkap ?>">
								<?= form_error('nama_lengkap', '<small class="text-danger">', '</small>') ?>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> Jenis_kelamin </div>

							<div class="profile-info-value col-md-3">
								<select name="jenis_kelamin" class="form-control">
									<option value="L" <?php if($data->jenis_kelamin == 'L') {echo "selected";} ?>>Laki-laki</option>
									<option value="P"  <?php if($data->jenis_kelamin == 'P') {echo "selected";} ?>>Perempuan</option>
								</select>
								<?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>') ?>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> nim </div>

							<div class="profile-info-value  col-md-5">
								<input type="text" name="nim" class="form-control" value="<?= $data->nim ?>">
								<?= form_error('nim', '<small class="text-danger">', '</small>') ?>
							</div>
						</div>
						
						<div class="profile-info-row">
							<div class="profile-info-name"> No. WA </div>

							<div class="profile-info-value  col-md-5">
								<input type="text" name="no_wa" class="form-control" value="<?= $data->no_wa ?>">
								<?= form_error('no_wa', '<small class="text-danger">', '</small>') ?>
							</div>
						</div>
				</div>

				<div class="space-6"></div>
				<button type="submit" class="btn btn-sm btn-primary" style="margin-left: 12px; margin-bottom: 5px">Update Profil</button>
			</div>
		</div>
		</form>
	</div>
</div>		
<div class="hr dotted"></div>

<?php if ($this->session->flashdata('msg') == 'success'): ?>
	<script type="text/javascript">
		iziToast.success({
			timeout: 5000,
			icon: 'fa fa-check',
			title: 'ok',
			message: 'Profil berhasil di update!',
			// position: 'topCenter'
		});
	</script>
<?php endif ?>