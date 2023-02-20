
  <!-- /.content-wrapper -->
 <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.13
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- Select2 -->
<script src="<?= base_url('assets/admin') ?>/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url('assets/admin') ?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/admin') ?>/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/admin') ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/admin') ?>/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/admin') ?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/admin') ?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?= base_url('assets/admin') ?>/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url('assets/admin') ?>/bower_components/ckeditor/ckeditor.js"></script>

<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree();
       //Initialize Select2 Elements
      $('.select2').select2();
       //Date picker
      $('#datepicker').datepicker({
        autoclose: true
      })
  });

  $(function () {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      });

      CKEDITOR.replace('editor1');
      CKEDITOR.replace('editor2');

    });


</script>



<!-- modal filter dosen-->
<div class="modal fade" id="modal-filter-dosen">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Filter Dosen</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left btn-sm btn-flat" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-sm btn-flat">Filter data</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- modal mahasiswa -->

 <div class="modal fade" id="modal-mahasiswa">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Detail Mahasiswa</h4>
      </div>
      <div class="modal-body">
       <span id="result_detail_mhs"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- modal edit user -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <?= form_open('admin/user/update', ['id' => 'formUpdateUser', 'role' => 'form']) ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit user</h4>
      </div>
      <div class="modal-body">
        <span id="result_user"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal" id="close_btn">Close</button>
        <button type="submit" class="btn btn-primary btn-flat" id="btn_update_user">Update <i class="fa fa-arrow-circle-right"></i></button>
      </div>
    </div>

    <?= form_close() ?>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
    
  function cari_mahasiswa(nim)
  {
    $.ajax({
      url : '<?= base_url("admin/dosen/cari_mahasiswa") ?>',
      method: 'post',
      data: {nim : nim},
      dataType: 'json',
      success: data =>{
        $('#result_detail_mhs').html(data)
      }
    });
  }

 
</script>

</body>
</html>
