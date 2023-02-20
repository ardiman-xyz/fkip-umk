
  <input type="hidden" name="id_user" value="<?= $user->id_user ?>">
  <div class="col-md-12">
    <div class="box-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Username</label>
      <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username.." value="<?= $user->username ?>">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="password" class="form-control" id="password " placeholder="Enter password.." value="<?= $user->password ?>">
    </div>
    <div class="form-group">
      <label>Nama user</label>
      <input type="text" name="nama_user" class="form-control" id="nama_user" placeholder="Enter nama user.." value="<?= $user->nama_user ?>">
    </div>
    <div class="form-group">
        <div class="checkbox">
          <label>
            <input type="checkbox" id="show_pass_user">
            Show password
          </label>
        </div>
      </div>
  </div>
  </div>
  <!-- /.box-body -->
  <div class="box-footer">

<script type="text/javascript">

  $(document).ready(function(){
    $('#formUpdateUser').on('submit', function(e){
      e.preventDefault();
      
      const me = $(this),
            url = me.attr('action'),
            data = me.serialize(),
            btn_update = me.find('#btn_update_user').attr('disabled', true),
            btn_close = me.find('#close_btn').attr('disabled', true);
            btn_update.html(`<i class="ace-icon fa fa-spinner fa-spin"></i> Mengupdate...`);
      $.ajax({
        url: url,
        method: 'post',
        data: data,
        dataType: 'json',
        success: callback =>{
          if (callback.status === true) {
            btn_close.attr('disabled', false);
            btn_update.html('Updated')
            $('#result_user').html(`<div class="alert alert-success"> <i class="fa fa-check-circle-o"></i> User berhasil di update </div>`)
          }
        },
        error: xhr =>{
          alert('something went wrong')
        }
      });


    })
  });

   $('body').on('click', '#show_pass_user', function(){
      if ($(this).is(':checked')) {
        $('#password').attr('type', 'text');
      } else {
        $('#password').attr('type', 'password');
      }
    });
</script>

