<div class="row">
	<div class="col-md-12 widget-container-col" id="widget-container-col-10">
		<div class="widget-box" id="widget-box-10">
			<div class="widget-header widget-header-small">
				<h5 class="widget-title smaller" id="judul">Kemahasiswaan</h5>
			</div>
			<span id="message"></span>
			<div class="widget-body">
				<div class="widget-main padding-6">
					<form id="repositoryForm" method="post" action="<?= base_url('admin/repository/store_assesment/') ?>" enctype="multipart/form-data">
						 <label>Nama file</label>
                        <input type="text" name="nama_file" class="form-control" required placeholder="masukkan nama">
						<br>
						<label>Upload file (pdf)</label>
              <input type="file" name="file" class="form-control" required>
              <br>
               <label>Type file</label>
                <select name="type" class="form-control" required>
                  <option value="">--Pilih--</option>
                  <!-- <option value="bebas">Bebas</option> -->
                  <option value="d1">Dokumen Renstra</option>
                  <option value="d2">Tata Pamong</option>
                  <option value="d3">Dokumen Sistem penjamin mutu</option>
                  <option value="d4.1">SPMB1</option>
                  <option value="d4.2">SPMB2</option>
                  <option value="d4.3">SPMB3</option>
                  <option value="d4.4">SPMB4</option>
                  <option value="d4.5">SPMB5</option>
                  <option value="d4.6">SPMB6</option>
                  <option value="d5">Penyusunan & pengembangan kurikulum</option>
                  <option value="d6">Laporan Keuangan Fakultas</option>
                  <option value="d7.1">Daftar Software yang berlisensi, petunjuk pemanfaatan SIM 1</option>
                  <option value="d7.2">Daftar Software yang berlisensi, petunjuk pemanfaatan SIM 2</option>
                  <option value="d7.3">Daftar Software yang berlisensi, petunjuk pemanfaatan SIM 3</option>
                  <option value="d8.1">Hasil Penelitian 1</option>
                  <option value="d8.2">Hasil Penelitian 2</option>
                  <option value="d9.1">Hasil PKM 1</option>
                  <option value="d9.2">Hasil PKM 2</option>
                  <option value="d10">Dokumen Pendukung Kerjasama dalam Negeri</option>
                  <option value="d11">Dokumen Pendukung Kerjasama Luar Negeri</option>
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