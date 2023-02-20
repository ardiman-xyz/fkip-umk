<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit Dosen
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="<?= base_url('admin/dosen') ?>">Dosen</a></li>
      <li><a href="<?= base_url('admin/dosen/edit') ?>">Edit dosen</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">

        <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?= base_url('admin/dosen') ?>" title="Kembali" class="btn btn-danger btn-flat btn-sm"><i class="fa fa-backward"></i> Kembali</a>
            </div>

            <span id="msg"></span>
            <!-- /.box-header -->
            <!-- form start -->
           
            <?= form_open_multipart('admin/dosen/update', ['id' => 'formUpdateDosen', 'role' => 'form']) ?>
              <div class="col-md-6 col-md-offset-3">
                 <input type="hidden" name="id_dosen" value="<?= $dosen->id_dosen ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Dosen</label>
                  <input type="text" class="form-control" name="nama_dosen" id="nama_dosen" placeholder="Enter Nama.." value="<?= $dosen->nama_dosen ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">NIDN</label>
                  <input type="nidn" name="nidn" class="form-control" id="nidn " placeholder="Enter NIDN.." value="<?= $dosen->NIDN ?>">
                  <span class="help-block"><em>* Jika tidak di inputkan, maka akan di generate otomatis oleh sistem!</em></span>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email.."value="<?= $dosen->email_dosen ?>">
                </div>
                 <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="exampleInputPassword1">Prodi</label>
                      <select name="id_prodi" class="form-control" id="id_prodi">
                        <option value="">--Pilih--</option>
                        <?php foreach ($prodi as $key => $p): ?>
                          <option value="<?= $p->id_prodi ?>" <?= ($dosen->id_prodi === $p->id_prodi ? 'selected' : '') ?>><?= $p->nama_prodi ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label for="exampleInputPassword1">Jenis Kelamin</label>
                      <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                        <option value="">--Pilih--</option>
                        <option value="L" <?= ($dosen->jenis_kelamin === 'L' ? 'selected' : '') ?>>Laki-laki</option>
                        <option value="P" <?= ($dosen->jenis_kelamin === 'P' ? 'selected' : '') ?>>Perempuan</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Enter Alamat..."><?= $dosen->alamat_dosen ?></textarea>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="exampleInputPassword1">Tanggal Lahir</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="tgl_lahir" class="form-control pull-right" id="datepicker" value="<?= $dosen->ttl_dosen ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                      <label for="exampleInputPassword1">No. Telp/Hp</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                          </div>
                          <input type="text" name="no_telp" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" value="<?= $dosen->telepon_dosen ?>">
                        </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="exampleInputFile">Upload Foto</label>
                        <input type="file" name="foto" id="exampleInputFile" class="form-control">
                        <p class="help-block"><em>Silahkan upload foto dosen</em></p>
                    </div>
                    <div class="col-md-6">
                      <img src="<?= base_url('assets/img/dosen/'.$dosen->foto_dosen) ?>" alt="" width="200">
                    </div>
                  </div>
                </div>
                
                <button type="submit" id="btnUpdateDosen" class="btn btn-primary btn-flat pull-right btn-md">Update <i class="fa fa-arrow-circle-right"></i></button>

              </div>
              <!-- /.box-body -->
              </div>

              <div class="box-footer">
              </div>
            </form>
          </div>

      </div>
    </div>
  </section>
</div>
 


<script type="text/javascript">
  
  $(document).ready(function(){

    $('#formUpdateDosen').on('submit', function(e){
      e.preventDefault();

      const url = $(this).attr('action'),
            btn_update = $(this).find('#btnUpdateDosen');
            btn_update.attr('disabled', true);
            btn_update.html(`<i class="fa fa-spinner fa-spin "></i> Sedang mengUpdate...`);
      const data = new FormData(this);

      $.ajax({
        url: url,
        method: 'post',
        data: data,
        dataType: 'json',
        processData:false,
        contentType:false,
        cache:false,
        async:false,
        success: callback =>{
          if (callback.status == true) {
             Swal({
                title: "sukses",
                text: callback.pesan,
                type: "success"
              });
              btn_update.attr('disabled', false);
              btn_update.html(`Simpan <i class="fa fa-arrow-circle-right"></i>`);
          }else{
            btn_update.attr('disabled', false);
            btn_update.html(`Simpan <i class="fa fa-arrow-circle-right"></i>`);
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