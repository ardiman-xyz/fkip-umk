
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <span id="message"></span>
        <div class="row">
          <div class="col-lg-3">
            <div class="card">
              <div class="card-body">
                <div class="card-body box-profile">
                <div class="text-center">
                 <?php if ($data->foto_dosen != null): ?>
                    <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url('assets/img/dosen/'.$data->foto_dosen) ?>"
                       alt="User profile picture">
                  <?php else: ?>
                    <?php if ($data->jenis_kelamin == 'L'): ?>
                       <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url('assets/img/') ?>men.jpg"
                       alt="User profile picture">
                       <?php else: ?>
                        <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url('assets/img/') ?>muslim_women.jpg"
                       alt="User profile picture">
                    <?php endif ?>
                  <?php endif ?>
                </div>
              </div>
              <h3 class="profile-username text-center"><?= $data->nama_dosen ?></h3>
                <p class="text-muted text-center">Dosen FKIP</p>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                  <h5 class="card-title m-0">Update password : </h5>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fa fa-remove"></i></button>
                  </div>
                </div>
                <div class="card-body">
                 <div class="card-body">
                 	<form class="form-horizontal" method="post" action="<?= base_url('dosen/update_pass_action') ?>" id="formPassword">
                 		<div class="form-group row">
                        <label for="pass_lama" class="col-sm-2 col-form-label">Password Lama</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="pass_lama" name="pass_lama">
                           <?php echo form_error('pass_lama', '<div class="text-danger mt-2">', '</div>'); ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="pass_baru" class="col-sm-2 col-form-label">Password Baru</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="pass_baru" name="pass_baru">
                           <?php echo form_error('pass_baru', '<div class="text-danger mt-2">', '</div>'); ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="konf_pass" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="konf_pass" name="konf_pass">
                           <?php echo form_error('konf_pass', '<div class="text-danger mt-2">', '</div>'); ?>
                        </div>
                      </div>
                       <div class="form-group row">
                        <label for="konf_pass" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                        	<a href="<?= base_url('dosen/on') ?>" class="btn btn-danger">Kembali</a>
                      		<button type="submit" class="btn btn-primary update-password">Update Password</button>
                        </div>
                      </div>
                 	</form>
                </div>
              </div>
          	</div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar