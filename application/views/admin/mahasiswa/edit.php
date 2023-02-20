<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit mahasiswa
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="<?= base_url('admin/mahasiswa') ?>">mahasiswa</a></li>
      <li><a href="<?= base_url('admin/mahasiswa/edit') ?>">Edit mahasiswa</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">

        <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?= base_url('admin/mahasiswa') ?>" title="Kembali" class="btn btn-danger btn-flat btn-sm"><i class="fa fa-backward"></i> Kembali</a>
            </div>

            <span id="msg"></span>
            <!-- /.box-header -->
            <!-- form start -->
           
            <?= form_open('admin/mahasiswa/update', ['id' => 'formEditMahasiswa', 'role' => 'form']) ?>
              <div class="col-md-6 col-md-offset-3">
                <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama mahasiswa</label>
                  <input type="text" class="form-control" name="nama_mahasiswa" id="nama_mahasiswa" placeholder="Enter Nama.." value="<?= $mahasiswa->nama_lengkap ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">NIM</label>
                  <input type="text" name="nim" class="form-control" id="nim " placeholder="Enter NIM.." value="<?= $mahasiswa->nim ?>">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" id="password" placeholder="Enter password.." value="<?= $mahasiswa->password ?>">
                </div>
                 <div class="form-group">
                  <div class="row">
                    <div class="col-md-8">
                      <label for="exampleInputPassword1">Prodi</label>
                      <select name="id_prodi" class="form-control" id="id_prodi">
                        <option value="">--Pilih--</option>
                        <?php foreach ($prodi as $key => $p): ?>
                          <option value="<?= $p->id_prodi ?>" <?= ($mahasiswa->id_prodi == $p->id_prodi ? 'selected' : '') ?>><?= $p->nama_prodi ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label for="exampleInputPassword1">Jenis Kelamin</label>
                      <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                        <option value="">--Pilih--</option>
                        <option value="L" <?= ($mahasiswa->jenis_kelamin === 'L' ? 'selected' : '') ?>>Laki-laki</option>
                        <option value="P" <?= ($mahasiswa->jenis_kelamin === 'P' ? 'selected' : '') ?>>Perempuan</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">No WA</label>
                  <input type="number" name="no_wa" class="form-control" id="no_wa " placeholder="Enter no wa.." value="<?= $mahasiswa->no_wa ?>">
                </div>
              </div>
              <button type="submit" id="btnUpdateMahasiswa" class="btn btn-primary btn flat pull-right">Update <i class="fa fa-arrow-circle-right"></i></button>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
            </form>
          </div>

      </div>
    </div>
  </section>
</div>
 


<script type="text/javascript">
  
  $(document).ready(function(){

    $('#formEditMahasiswa').on('submit', function(e){
      e.preventDefault();

      const url = $(this).attr('action'),
            btn_update = $(this).find('#btnUpdateMahasiswa');
            btn_update.attr('disabled', true);
            btn_update.html(`<i class="fa fa-spinner fa-spin "></i> Sedang mengUpdate...`);
      const data = $(this).serialize();

      $.ajax({
        url: url,
        method: 'post',
        data: data,
        dataType: 'json',
        success: callback =>{
          if (callback.status == true) {
             Swal({
                title: "sukses",
                text: "data mahasiswa berhasil di update",
                type: "success"
              });
              btn_update.attr('disabled', false);
              btn_update.html(`update <i class="fa fa-arrow-circle-right"></i>`);
          }else{
            btn_update.attr('disabled', false);
            btn_update.html(`update <i class="fa fa-arrow-circle-right"></i>`);
             $('#msg').html(`<div class="alert alert-danger alert-dismissible" style="margin: 10px">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                ${callback.pesan}
            </div>`).focus();
          }
        },
        error: xhr =>{  
          alert('something went wrong!')
        }

      });
    

    })

  });

</script>