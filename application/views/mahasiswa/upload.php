
<div class="overlay loading" style="display: none">
    <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
  </div>
  <br><br>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<span id="message"></span>
			 <?php if (!empty($data)): ?>
         <center><img src="<?= base_url('assets/img/') ?>logo_success.png" alt="" width="150"></center>
        <br>
        <table class="table table-bordered">
          <tr>
            <td>File </td><td><a target="_blank" href="<?= base_url('assets/upload/plp_magang/'.$data->file) ?>" title="File Artikel"> File Artikel</a></td>
          </tr>
          <tr>
            <td>Video  </td><td><a target="_blank" href="<?= $data->link_youtube ?>" title="File Artikel"> Video Kegitan</a></td>
          </tr>
        </table>
       <?php else: ?>
        <form action="<?= base_url('mahasiswa/magang/simpan_data') ?>" method="post" accept-charset="utf-8" id="form_upload">
        <div class="form-group">
          <label for="">Upload file</label>
          <input type="file" name="file" class="form-control" required="required">
        </div>
        <div class="form-group">
          <label for="">Masukkan Link video Youtube</label>
          <input type="text" name="link_youtube" class="form-control" placeholder="ex: https://www.youtube.com/watch?v=YyDmcAg-mM8" required="required">
        </div>
        <div class="form-group">
          <label for="">Keterangan (<small style="color: red"><i>masukkan keterangan lokasi, tgl mulai - selesai PLP/MAGANG</i></small>)</label>
          <textarea name="keterangan" class="form-control" placeholder="masukkan keterangan" rows="3" required="required"></textarea>
        </div>
        
        <div class="form-group">
          <button type="submit" class="btn btn-sm btn-success">Simpan</button>
        </div>        
      </form>
       <?php endif ?>
		</div>
	</div>
</div>

<script>
  
$(document).ready(function(){

  $("#form_upload").on('submit', function(e){
    e.preventDefault();

    const me = $(this),
          url = me.attr('action');
    const data = new FormData(this);

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
          hide_loading();
        }else{
          $('#message').html(`<div class="alert alert-success" style="margin-top: 7px">${callback.message}</div>`);
          hide_loading();
          $('#form_kas')[0].reset();
          setTimeout(() => {
            location.reload();
          }, 500);
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

let target = document.querySelector('.loading');

function show_loading() {
  target.style.display = "block";
}

function hide_loading(){
  let fadeEffect = setInterval(() => {
      clearInterval(fadeEffect);
      target.style.display = "none"
  }, 200)
}

</script>