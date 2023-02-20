<!-- jQuery 3 -->
<script src="<?= base_url('assets/admin') ?>/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/admin') ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url('assets/admin') ?>/plugins/iCheck/icheck.min.js"></script>
<script>

  $(document).ready(function(){
    $('#show_pass').on('click', function(){
      alert('ok');
    });
  });

  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });

  function show()
  {
    if ($(this).is(':checked')) {
        $('#password').attr('type', 'text');
      } else {
        $('#password').attr('type', 'password');
      }
  }
</script>
</body>
</html>
