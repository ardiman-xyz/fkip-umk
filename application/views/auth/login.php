
<div class="login-box">
  <div class="login-logo" style="margin-top: -30px">
     <img src="<?= base_url('assets/img/') ?>logo.png" alt="" width="100"> 
  </div>
  <?= $this->session->flashdata('sukses') ?> 
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Login ~ Admin</p>

    <?= form_open('auth/login_admin', ['id' => 'formLoginAdmin']); ?>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="Masukkan username..." autocomplete="off">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" id="show_pass" onclick="show()"> Show password
            </label>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-flat btn-primary btn-block" id="btn_login">Login</button>
    <?= form_close() ?>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

