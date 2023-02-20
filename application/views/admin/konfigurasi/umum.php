<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      konfigurasi
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="<?= base_url('admin/konfigurasi') ?>">konfigurasi</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">

        <div class="box box-primary">
            <span id="msg"></span>

            <div class="box-header">
              <h3 class="box-title">Konfigurasi website</h3>
            </div>
           
            <?= form_open('admin/konfigurasi/update', ['id' => 'formUpdateKonfigurasi', 'role' => 'form']) ?>
            <input type="hidden" name="id_konfigurasi" value="<?= $konfigurasi->id_konfigurasi ?>">
              <div class="col-md-6 col-md-offset-3">
                <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Dekan</label>
                  <input type="text" class="form-control" name="nama_dekan" id="nama_dekan" placeholder="Enter Nama dekan.." value="<?= $konfigurasi->nama_dekan ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama web</label>
                  <input type="text" class="form-control" name="nama_web" id="nama_web" placeholder="Enter Nama website.." value="<?= $konfigurasi->namaweb ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tagline</label>
                  <input type="text" name="tagline" class="form-control" id="tagline " placeholder="Enter tegline.." value="<?= $konfigurasi->tagline ?>">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="Enter email.." value="<?= $konfigurasi->email ?>">
                </div>
                <div class="form-group">
                  <label>Telepon</label>
                  <input type="text" name="telepon" class="form-control" id="telepon" placeholder="Enter telepon.." value="<?= $konfigurasi->telepon ?>">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" name="alamat" rows="4"><?= $konfigurasi->alamat ?></textarea>
                </div>
                <div class="form-group">
                  <label>SEO <small class="text-muted"><em>(Untuk pencarian di google)</em></small></label>
                  <textarea class="form-control" name="seo" rows="4"><?= $konfigurasi->keywords ?></textarea>
                </div>
                 <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea class="form-control" name="deskripsi" rows="5"><?= $konfigurasi->description ?></textarea>
                </div> 

                <div class="box-footer">
                  <button type="submit" id="btnUpdateKonfigurasi" class="btn btn-primary btn flat pull-right">Update konfigurasi <i class="fa fa-arrow-circle-right"></i></button>
                </div> 
              </div>
              
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

    $('#formUpdateKonfigurasi').on('submit', function(e){
      e.preventDefault();

      const url = $(this).attr('action'),
            btn_simpan = $(this).find('#btnUpdateKonfigurasi');
            btn_simpan.attr('disabled', true);
            btn_simpan.html(`<i class="fa fa-spinner fa-spin "></i> Sedang mengupdate...`);
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
                text: `${callback.pesan}`,
                type: "success"
              });
              btn_simpan.attr('disabled', false);
              btn_simpan.html(`Update konfigurasi <i class="fa fa-arrow-circle-right"></i>`);
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

</script>