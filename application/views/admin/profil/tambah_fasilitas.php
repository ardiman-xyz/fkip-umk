<div class="row">
	<div class="col-md-12 widget-container-col" id="widget-container-col-10">
		<div class="widget-box" id="widget-box-10">
			<div class="widget-header widget-header-small">
				<h5 class="widget-title smaller" id="judul">Tendik</h5>
			</div>
			<span id="message"></span>
			<div class="widget-body">
				<div class="widget-main padding-6">
					<form id="fasilitas-form" method="post" action="<?= base_url('admin/profil/store_fasilitas/') ?>" enctype="multipart/form-data">
						 <label>Judul</label>
              <input type="text" name="judul" class="form-control" required placeholder="masukkan Judul">
						<br>
               <label>Foto</label>
            <input type="file" name="foto" class="form-control" required>
              <br>
              <a href="<?= base_url('admin/profil/fasilitas') ?>" class="btn btn-sm btn-danger">kembali</a>
           		<button type="submit" class="btn btn-sm btn-primary" id="tambah">Tambah</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" charset="utf-8" async defer>
  $(document).ready(function(){

    $('#fasilitas-form').submit(function(e){
      e.preventDefault();
      const me = $(this),
            url = me.attr('action');
      const data = new FormData(this);
      let btn = $('#tambah').attr('disabled', 'disabled');

      $.ajax({
        url: url,
        data:data,
        method: 'post',
        processData:false,
        contentType:false,
        cache:false,
        async:false,
        success: (callback) =>{
          
           $('#message').html(`<div class="alert alert-success" style="margin: 5px">
                      data berhasil di insert
                    </div>`)
          $('#fasilitas-form')[0].reset();
          btn = $('#tambah').removeAttr('disabled', 'disabled');

        }
      });

    });

  });
</script>