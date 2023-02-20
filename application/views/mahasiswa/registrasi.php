<div class="overlay loading" style="display: none">
    <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
  </div>
<br>
<div class="container">
  <div class="row justy-content-center">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <!-- PAGE CONTENT BEGINS -->
      <div class="alert alert-block alert-success">
        <i class="ace-icon fa fa-check green"></i>
          Silahkan ajukan judul dengan megisi data yang valid, <strong class="green">Anda harus sudah menghubungi pembimbing 1 via email / Whatsapp</strong>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <a href="<?= base_url('mahasiswa/registrasi') ?>" class="btn btn-sm btn-danger" style="border-radius: 1px;">&larr; Kembali</a>
      <span id="message"></span>
      <div class="widget-box">
        <div class="widget-header widget-header-flat">
          <h4 class="widget-title smaller">isi form dengan data yang valid!</h4>
        </div>

        <div class="widget-body">
          <div class="widget-main">
            <form class="form-horizontal form-label-left" method="post" action="<?= base_url('mahasiswa/registrasi/simpan') ?>" id="registrasi_form" enctype="multipart/form-data">
                   <div class="table-responsive">
                     <table class="table">
                     <tr>
                       <td>Nama </td><td>  <input type="text" name="nama" id="nama" class="col-md-8  col-xs-8" readonly value="<?= $user->nama_lengkap ?>"></td>
                     </tr>
                     <tr>
                       <td>Nim </td><td>  <input type="text" name="nim" id="nim" class="col-md-3  col-xs-3" readonly value="<?= $user->nim ?>"></td>
                     </tr>
                      <tr>
                       <td>Program Studi </td><td> 
                        <select name="prodi" class="form-control" id="prodi" readonly>
                          <option value="">--Pilih--</option>
                          <?php foreach ($prodi as $key => $value): ?>
                            <option value="<?= $value->id_prodi ?>" <?= ($user->id_prodi == $value->id_prodi ?'selected ' : '') ?> > <?= $value->nama_prodi ?></option>  
                          <?php endforeach ?>
                        </select>
                      </td>
                     </tr>
                     <tr>
                       <td>Nama Pembimbing 1 </td><td> 
                       <select name="pembimbing1" id="pembimbing1" class="chosen-select col-md-6 col-xs-8">
                       <option value="">--Pilih Dosen--</option>
                        <?php foreach($dosen as $ds) : ?>
                            <option value="<?= $ds->NIDN ?>"><?= $ds->nama_dosen ?></option>
                        <?php endforeach ?>
                       </select>
                       </td>
                     </tr>
                    
                     <tr>
                       <td>Judul yang disarankan</td><td>  <textarea name="judul" id="judul" cols="50" rows="4" placeholder="masukkan judul yang disarankan...." class="form-control col-md-4 col-xs-8"></textarea></td>
                     </tr>
                     <tr>
                       <td>Screen Shoot percakapan(via email, WA) </td><td>  
                        <input type="file" name="foto" id="foto id-input-file-1" class="col-md-8  col-xs-8"></td>
                     </tr>
                   </table>

                   </div>

                 <button class="btn btn-primary btn-sm pull-right" name="submit" type="submit" id="submit">Ajukan</button>
                 <br>
                 <br>
               </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>


<script>
  
$(document).ready(function(){

  $("#registrasi_form").on('submit', function(e){
    e.preventDefault();

    const me = $(this),
          url = me.attr('action');
    const data = new FormData(this);
    const btn_submit = me.find('#submit').attr('disabled', true);
          btn_submit.html('<i class="ace-icon fa fa-spinner fa-spin bigger-125"></i> Mengajukan...');

    $.ajax({
      url: url,
      method: 'post',
      data: data,
      processData:false,
      contentType:false,
      dataType: 'json',
      cache:false,
      async:false,
      beforeSend: () =>{
        show_loading()
      },
      success: callback =>{
        if (callback.status === false) {
          $('#message').html(`<div class="alert alert-danger" style="margin-top: 7px">${callback.message}</div>`);
          btn_submit.attr('disabled', false);
          btn_submit.text('Ajukan')
          hide_loading();
        }else{
          $('#message').html(`<div class="alert alert-success" style="margin-top: 7px">${callback.message}</div>`);
          btn_submit.attr('disabled', false);
          btn_submit.text('Ajukan')
          hide_loading();
        }
      },
      error: xhr =>{
        iziToast.error({
          timeout: 10000,
          icon: 'fa fa-times',
          title: 'Gagal',
          message: 'Silahkan perikas koneksi anda!',
        });
      }
    });     

  });

});

let fadeTarget = document.querySelector('.loading');

function show_loading() {
  fadeTarget.style.display = "block";
}

function hide_loading(){
  let fadeEffect = setInterval(() => {
      clearInterval(fadeEffect);
      fadeTarget.style.display = "none"
  }, 200)
}

</script>




