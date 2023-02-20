<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit tendik
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="<?= base_url('admin/profil/tendik') ?>">tendik</a></li>
      <li>edit tendik</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">

        <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?= base_url('admin/profil/tendik') ?>" title="Kembali" class="btn btn-danger btn-flat btn-sm"><i class="fa fa-backward"></i> Kembali</a>
            </div>

            <span id="msg"></span>
            <!-- /.box-header -->
            <!-- form start -->
           
            <?= form_open_multipart('admin/profil/update_tendik', ['id' => 'formEditTendik', 'role' => 'form']) ?>
            <input type="hidden" name="id" value="<?= $tendik->id ?>">
              <div class="col-md-6 col-md-offset-3">
                <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama tendik</label>
                  <input type="text" class="form-control" name="nama_tendik" id="nama_tendik" placeholder="Enter Nama.." value="<?= $tendik->nama ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">NIK</label>
                  <input type="text" name="nik" class="form-control" id="nik " placeholder="Enter NIM.." value="<?= $tendik->nik ?>">
                </div>
                <div class="form-group">
                  <label>Jabatan</label>
                  <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Enter jabatan.." value="<?= $tendik->jabatan ?>">
                </div>
                 <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="exampleInputPassword1">Prodi</label>
                      <select name="id_prodi" class="form-control" id="id_prodi">
                        <option value="">--Pilih--</option>
                        <?php foreach ($prodi as $key => $p): ?>
                          <option value="<?= $p->id_prodi ?>" <?= ($p->id_prodi === $tendik->id_prodi) ? "selected" : '' ?>><?= $p->nama_prodi ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label for="exampleInputPassword1">Jenis Kelamin</label>
                      <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                        <option value="">--Pilih--</option>
                        <option value="L" <?= ($tendik->jenis_kelamin === 'L' ? 'selected' : '') ?>>Laki-laki</option>
                        <option value="P" <?= ($tendik->jenis_kelamin === 'P' ? 'selected' : '') ?>>Perempuan</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="email" name="email" class="form-control" id="email " placeholder="Enter Email valid.." value="<?= $tendik->email ?>">
                </div>
              <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="exampleInputFile">Upload Foto</label>
                        <input type="file" name="foto_tendik" id="exampleInputFile" class="form-control" onchange="loadFile(event)">
                        <p class="help-block"><em>(ex: <strong>png, jpg, jpeg</strong>)</em></p>
                    </div>
                    <div class="col-md-6">
                      <img src="<?= base_url('assets/upload/tendik/'.$tendik->foto) ?>" alt="No image" class="img-thumbnail" id="img-preview">
                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" id="btnUpdateTendik" class="btn btn-primary btn flat pull-right">Update <i class="fa fa-arrow-circle-right"></i></button>
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

    $('#formEditTendik').on('submit', function(e){
      e.preventDefault();

      const url = $(this).attr('action'),
            btn_simpan = $(this).find('#btnUpdateTendik');
            btn_simpan.attr('disabled', true);
            btn_simpan.html(`<i class="fa fa-spinner fa-spin "></i> Sedang mengupdate...`);
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
                text: `${callback.pesan}`,
                type: "success"
              });
              btn_simpan.attr('disabled', false);
              btn_simpan.html(`Update profile <i class="fa fa-arrow-circle-right"></i>`);
          }else{
            btn_simpan.attr('disabled', false);
            btn_simpan.html(`Update <i class="fa fa-arrow-circle-right"></i>`);
             $('#msg').html(`<div class="alert alert-danger alert-dismissible" style="margin: 10px">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                ${callback.pesan}
            </div>`).focus();
          }
        }

      });
    

    })

  });

  const loadFile = function(event) {
    const reader = new FileReader();
    reader.onload = function(){
      const output = document.getElementById('img-preview');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  }; 

</script>