<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Profile
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="<?= base_url('admin/profil') ?>">Profile</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">

        <div class="box box-primary">
            <span id="msg"></span>          
            <?= form_open_multipart('admin/profil/update_profil', ['id' => 'formUpdateProfile', 'role' => 'form']) ?>
                <input type="hidden" name="id_profile" value="<?= $profil->id ?>">
                <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Sejarah</label>
                  <textarea id="editor1" name="sejarah" rows="10" cols="80"><?= $profil->sejarah ?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Visi misi</label>
                  <textarea id="editor2" name="visi_misi" rows="10" cols="80"><?= $profil->visi_misi ?></textarea>
                </div>
                 <div class="form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <label for="exampleInputPassword1">Struktur organisasi</label>
                      <input type="file" name="struktur_organisasi" class="form-control">
                    </div>
                    <div class="col-md-8">
                      <img src="<?= base_url('assets/img/profil/'.$profil->struktur_organisasi) ?>" alt="" width="100%" class="img-thumbnail">
                    </div>
                  </div>
                </div>
              <button type="submit" id="btnUpdateProfile" class="btn btn-primary btn flat pull-right">Update profile <i class="fa fa-arrow-circle-right"></i></button>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
            <?= form_close(); ?>
          </div>

      </div>
    </div>
  </section>
</div>
 


<script type="text/javascript">
  
  $(document).ready(function(){

    $('#formUpdateProfile').on('submit', function(e){
      e.preventDefault();

      const url = $(this).attr('action'),
            btn_simpan = $(this).find('#btnUpdateProfile');
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
            btn_simpan.html(`Update profile <i class="fa fa-arrow-circle-right"></i>`);
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