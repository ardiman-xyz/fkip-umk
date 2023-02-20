 <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      developed by Ardiman
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?= date('Y') ?> <a href="#">FKIP UMkendari</a>.</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/dosen/') ?>bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/dosen/') ?>adminlte.min.js"></script>
<script src="<?= base_url('assets/dosen/') ?>summernote-bs4.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/fontawesome.min.js"></script>

<script src="<?= base_url('assets/dosen/js/') ?>myScript.js" type="text/javascript" charset="utf-8" async defer></script>

<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
</body>
</html>