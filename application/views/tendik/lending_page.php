<br>

<div class="container">


<div class="row justy-content-center">
	<div class="col-md-10 col-md-offset-1">
    <?= $this->session->flashdata('sukses') ?>
		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->

<div class="container">
  <div class="hr dotted"></div>
  <div>

    <div id="user-profile-1" class="user-profile row">
      <div class="col-xs-12 col-md-3">
        <div>
          <span class="profile-picture">
           <img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="<?= base_url('assets/img/') ?>new_logo_fkip.jpeg" width="200"/>
          </span>
          <div class="space-4"></div>
        </div>

        <div class="space-6"></div>
      </div>
      <div class="col-xs-12 col-md-9">

        <?php if ($this->session->userdata('level') === 'staff_fakultas'): ?>
          <h1>FKIP UMKENDARI</h1>
          <hr>
          <div class="profile-user-info profile-user-info-striped">
            
              <div class="profile-info-row">
                <div class="profile-info-name"> Nama </div>

                <div class="profile-info-value col-md-5">
                  <span class="editable" id="username"><?= $staff_fk->nama_user ?></span>
                </div>
              </div>

              <div class="profile-info-row">
                <div class="profile-info-name"> Jenis Kelamin </div>

                <div class="profile-info-value  col-md-5">
                  <span class="editable" id="username">
                    <?php if ($staff_fk->jenis_kelamin == 'L'): ?>
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
                  <span class="editable" id="username">Staff Fakultas</span>
                </div>
              </div>
              <div class="profile-info-row">
                <div class="profile-info-name"> Join </div>

                <div class="profile-info-value col-md-5">
                  <span class="editable" id="username">/</span>
                </div>
              </div>
          </div>
        <?php else: ?>
        <h1>Prodi : <?= $user->nama_prodi ?></h1>
        <hr>

          
        <?php endif ?>

          
      </div>
    </div>
  </div>
</div>    
<div class="hr dotted"></div>