<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tambah user
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="<?= base_url('admin/user') ?>">user</a></li>
      <li><a href="<?= base_url('admin/user/tambah') ?>">Tambah user</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">

        <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?= base_url('admin/user') ?>" title="Kembali" class="btn btn-danger btn-flat btn-sm"><i class="fa fa-backward"></i> Kembali</a>
            </div>

            <span id="msg"></span>
            <!-- /.box-header -->
            <!-- form start -->
           
            <?= form_open('admin/user/simpan', ['id' => 'formTambahUser', 'role' => 'form']) ?>
              <div class="col-md-4 col-md-offset-4">
                <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama user</label>
                  <input type="text" class="form-control" name="nama_user" id="nama_user" placeholder="Enter Nama..">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Username</label>
                  <input type="text" name="username" class="form-control" id="username " placeholder="Enter username..">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">password</label>
                  <input type="password" name="password" class="form-control" id="password " placeholder="Enter password..">
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Level</label>
                    <select name="level" class="form-control" id="level" >
                      <option value="">--Pilih--</option>
                      <option value="staff_fakultas">staff fakultas</option>
                      <option value="staff">staff</option>
                    </select>
                  </div>
                  <span id="result"></span>
              </div>
              <button type="submit" id="btnTambahuser" class="btn btn-primary btn flat pull-right">Simpan <i class="fa fa-arrow-circle-right"></i></button>
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

    $('#level').on('change', function(){
      const value = $('option:selected', this).val();

      if (value === 'staff') {
        $('#result').html(`<div class="form-group">
                    <label for="exampleInputPassword1">Program studi</label>
                    <select name="id_prodi" class="form-control" id="id_prodi" required>
                      <option value="">--Pilih--</option>
                     <?php foreach ($prodi as $p): ?>
                        <option value="<?= $p->id_prodi ?>"><?= $p->nama_prodi ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>`)
      }else{
        $('#result').html('')
      }
      
    });

    $('#formTambahUser').on('submit', function(e){
      e.preventDefault();

      const url = $(this).attr('action'),
            btn_simpan = $(this).find('#btnTambahuser');
            btn_simpan.attr('disabled', true);
            btn_simpan.html(`<i class="fa fa-spinner fa-spin "></i> Sedang menyimpan...`);
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
                text: "data user berhasil di simpan",
                type: "success"
              });
              btn_simpan.attr('disabled', false);
              btn_simpan.html(`Simpan <i class="fa fa-arrow-circle-right"></i>`);
          }else{
            btn_simpan.attr('disabled', false);
            btn_simpan.html(`Simpan <i class="fa fa-arrow-circle-right"></i>`);
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


  function show()
  {
    const value = $('option:selected', this).val();

    alert(value)
  }

</script>