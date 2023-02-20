<div class="row">
	<div class="col-md-12 widget-container-col" id="widget-container-col-10">
		<div class="widget-box" id="widget-box-10">
			<div class="widget-header widget-header-small">
				<h5 class="widget-title smaller" id="judul">Kemahasiswaan</h5>
			</div>
			<span id="message"></span>
			<div class="widget-body">
				<div class="widget-main padding-6">
					<form id="repositoryForm" method="post" action="<?= base_url('admin/repository/store_repo/') ?>" enctype="multipart/form-data">
						 <label>Nama file</label>
                        <input type="text" name="nama_file" class="form-control" required placeholder="masukkan nama">
						<br>
						<label>Upload file (pdf)</label>
              <input type="file" name="file" class="form-control" required>
              <br>
               <label>Type file</label>
                <select name="type" class="form-control" required>
                  <option value="">--Pilih--</option>
                  <option value="dokumen_mutu">Dokumen Mutu</option>
                  <option value="panduan_dan_pedoman">Panduan dan Pedoman</option>
                  <option value="sop">SOP</option>
                </select>
                <br>
                <a href="<?= base_url('admin/repository') ?>" class="btn btn-sm btn-danger">kembali</a>
             		<button type="submit" class="btn btn-sm btn-primary" id="tambah">Tambah</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" charset="utf-8" async defer>
  $(document).ready(function(){

    $('#repositoryForm').submit(function(e){
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
          $('#repositoryForm')[0].reset();
          btn = $('#tambah').removeAttr('disabled', 'disabled');

        }
      });

    });

  });
</script>