<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      List User
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="<?= base_url('admin/user') ?>">Users</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data User</h3>
            </div>
            <div class="" style="margin-left: 10px">
               <a href="<?= base_url('admin/user/tambah') ?>" title="Detail" class="btn btn-success btn-flat btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
               <button type="button" title="Detail" class="btn bg-purple btn-flat margin btn-sm" data-toggle="modal" data-target="#modal-filter-dosen"><i class="fa fa-filter"></i> Filter Data</button>
               <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-flat btn-danger">Export Data</button>
                  <button type="button" class="btn btn-sm btn-flat btn-danger dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#"><i class="fa fa-file-pdf-o"></i> Pdf</a></li>
                    <li><a href="#"><i class="fa fa-file-excel-o"></i> Excel</a></li>
                  </ul>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Username</th>
                  <th class="text-center">Level</th>
                  <th class="text-center">Nama user</th>
                  <th class="text-center" width="190px">Aksi</th>
                </tr>
                </thead>
                <tbody>
                 <?php foreach ($users as $key => $value): ?>
                    <tr>
                      <td class="text-center"><?= $key+1 ?></td>
                      <td><?= $value->username ?></td>
                      <td class="text-center">
                        <?php if ($value->level === 'admin'): ?>
                         <span class="label label-danger"><?= $value->level ?></span>
                        <?php else: ?>
                         <span class="label label-success"><?= $value->level ?></span>
                        <?php endif ?>
                      </td>
                      <td><?= $value->nama_user ?></td>
                      <td class="text-center">
                        <button title="Edit" class="btn btn-warning btn-flat btn-sm" data-toggle="modal" data-target="#modal-default" onclick="get_data(<?= $value->id_user ?>)"><i class="fa fa-edit"></i> Edit</button>
                        <button onclick="delete_user(<?= $value->id_user ?>)" title="Delete" class="btn btn-danger btn-flat btn-sm"><i class="fa fa-trash"></i> Delete</button>
                      </td>
                    </tr> 
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>

      </div>
    </div>
  </section>
</div>



<script type="text/javascript">
  function delete_user(id_user) {

    Swal({
      title: "Anda yakin?",
      text: "Data akan dihapus!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Hapus!"
    }).then(result => {
      if (result.value) {

          $.ajax({
            url: '<?= base_url('admin/user/delete_user') ?>',
            type: 'post',
            dataType: 'json',
            data: {
              id_user: id_user
            },
            success: callback =>{
             if (callback.status == true) {
              swal({
                title: "sukses",
                text: callback.nama+" Berhasil di hapus ",
                type: "success"
              });
             }else{
              swal({
                title: "Gagal",
                text: "data dosen Gagal di hapus",
                type: "error"
              });
             }
            }

          });
        
      }
    });

  }

  function get_data(id_user)
  {
     $.ajax({
          type: 'post',
          data: 'id_user='+id_user,
          url: '<?= base_url() ?>admin/user/get_data',
          dataType: 'html',
          success: data => {
            console.log(data)
            $('#result_user').html(data)
          }
      });
  }

</script>