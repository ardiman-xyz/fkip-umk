<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      List tendik
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="<?= base_url('admin/tendik') ?>">tendik</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data tendik</h3>
            </div>
            <div class="" style="margin-left: 10px">
               <a href="<?= base_url('admin/profil/tambah_tendik') ?>" title="Detail" class="btn btn-success btn-flat btn-sm"><i class="fa fa-plus"></i> Tambah tendik</a>
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
                  <th class="text-center">Nama</th>
                  <th class="text-center">NIk</th>
                  <th class="text-center">Jabatan</th>
                  <th class="text-center">L/P</th>
                  <th class="text-center">Email</th>
                  <th class="text-center" width="190px">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($tendik as $key => $value): ?>
                    <tr>
                      <td class="text-center"><?= $key+1 ?></td>
                      <td><?= $value->nama ?></td>
                      <td><?= $value->nik ?></td>
                      <td><?= $value->jabatan ?></td>
                      <td class="text-center"><?= $value->jenis_kelamin ?></td>
                      <td class="text-center"><?= $value->email ?></td>
                      <td class="text-center">
                        <a href="<?= base_url('admin/profil/edit_tendik/'.$value->id) ?>" title="Edit" class="btn btn-warning btn-flat btn-sm"><i class="fa fa-edit"></i> Edit</a>
                        <button onclick="delete_tendik(<?= $value->id ?>)" title="Delete" class="btn btn-danger btn-flat btn-sm"><i class="fa fa-trash"></i> Delete</button>
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
  function delete_tendik(id) {

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
            url: '<?= base_url('admin/profil/delete_tendik') ?>',
            type: 'post',
            dataType: 'json',
            data: {
              id: id
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
                text: "data tendik Gagal di hapus",
                type: "error"
              });
             }
            }

          });
        
      }
    });

  }
</script>