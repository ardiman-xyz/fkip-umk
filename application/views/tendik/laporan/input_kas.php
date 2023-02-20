

<div class="overlay loading" style="display: none">
    <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
  </div>
  <br><br>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<span id="message"></span>
			<form action="<?= base_url('tendik/simpan_kas') ?>" method="post" accept-charset="utf-8" id="form_kas">
				<div class="form-group">
					<label for="">Input jumlah</label>
					<input type="number" name="jumlah" class="form-control" placeholder="input jumlah Rp." required="required">
				</div>
				<div class="form-group">
					<label for="">Jenis</label>
					<select class="form-control" name="jenis" required="required">
						<option value="M">Kas Masuk</option>
						<option value="K">Kas Keluar</option>
					</select>
				</div>
				<div class="form-group">
					<label for="">Keterangan</label>
					<textarea name="keterangan" class="form-control" placeholder="masukkan keterangan" rows="3" required="required"></textarea>
				</div>
				<div class="form-group">
					<label for="">Bukti</label>
					<input type="file" name="bukti" class="form-control" required="required">
				</div>
				<div class="form-group">
					<a href="<?= base_url('tendik/kas_prodi') ?>" title="Kembali" class="btn btn-sm btn-danger">Kembali</a>
					<button type="submit" class="btn btn-sm btn-success">Simpan kas</button>
				</div>				
			</form>
		</div>
	</div>
</div>

<script>
  
$(document).ready(function(){

  $("#form_kas").on('submit', function(e){
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