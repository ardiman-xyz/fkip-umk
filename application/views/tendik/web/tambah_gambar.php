<br>
<div class="row justy-content-center">
    <div class="container">
        <div class="alert alert-block alert-warning">
            <i class="ace-icon fa fa-check green"></i>
            Selamat datang di halaman <strong>Profil Administrasi Pendidikan</strong>
        </div>
    </div>
  <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="list-group">
                  <a href="<?= base_url('tendik/pengumuman_berita/') ?>" class="list-group-item list-group-item-action">
                    Pengumuman & berita
                  </a>
                  <a href="<?= base_url('tendik/profil/') ?>" class="list-group-item list-group-item-action">
                    Profil
                  </a>
                  <a href="<?= base_url('tendik/akademik/') ?>" class="list-group-item list-group-item-action">Akademik</a>
                  <a href="<?= base_url('tendik/fasilitas/') ?>" class="list-group-item list-group-item-action">Fasilitas</a>
                  <a href="<?= base_url('tendik/penelitian_pengabdian/') ?>" class="list-group-item list-group-item-action">Penelitian dan pengabdian</a>
                  <a href="<?= base_url('tendik/alumni/') ?>" class="list-group-item list-group-item-action">Alumni</a>
                     <a href="<?= base_url('tendik/gambar/') ?>" class="list-group-item list-group-item-action active">Gambar</a>
                      <a href="<?= base_url('tendik/repository/') ?>" class="list-group-item list-group-item-action">Repository</a>
                </div>
            </div>
        </div>
    </div>
  <div class="col-md-9">
   
    <!-- PAGE CONTENT BEGINS -->
       <div class="card">
           <div class="card-body">
               <form action="<?= base_url('tendik/store_gambar') ?>" method="post" enctype="multipart/form-data" id="formTambahGambar">
                 <div class="row mb-2 mt-2">
                        <label>Judul</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>
                     <div class="row">
                       <div class="col-md-6">
                         <div class="row mb-2 mt-2" style="margin-top: 20px;">
                            <label>Posisi</label>
                            <select name="posisi" class="form-control" required>
                              <option value="">--Pilih--</option>
                              <option value="Gambar">Gambar</option>
                              <option value="Slider">Slider</option>
                            </select>
                        </div>
                       </div>

                        <div class="col-md-6">
                          <div class="row mb-2 mt-2" style="margin-top: 20px; margin-left: 2px">
                            <label>Status</label>
                            <select name="status" class="form-control" required>
                              <option value="">--Pilih--</option>
                              <option value="Publish">Publish</option>
                              <option value="No Publish">NO Publish</option>
                            </select>
                        </div>
                        </div>
                     </div> 
                    <div class="row mb-2 mt-2" style="margin-top: 20px;">
                        <label>Upload Gambar (jpg,png,jpeg)</label>
                        <input type="file" name="gambar" class="form-control" required>
                    </div>
                    <div class="row mb-2 mt-2" style="margin-top: 10px">
                        <label>Deskripsi Gambar</label>
                        <textarea class="form-control" name="ket_gambar" rows="3" required></textarea>
                    </div>

                    <span id="message"></span>
                    
                     
                    <div class="row mb-2 mt-2" style="margin-top: 20px;" align="center">
                      <a href="<?= base_url('tendik/gambar') ?>" class="btn btn-danger">Kembali</a>
                       <button type="submit" class="btn btn-primary" id="tambah">Tambah</button>
                    </div>
               </form>  
           </div>
       </div>    
    </div>
</div>
</div>

<script type="text/javascript" charset="utf-8" async defer>
  $(document).ready(function(){

    $('#formTambahGambar').submit(function(e){
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
          
           $('#message').html(`<div class="alert alert-success" style="margin-top: 5px">
                      data berhasil di insert
                    </div>`)
          $('#formTambahGambar')[0].reset();
          btn = $('#tambah').removeAttr('disabled', 'disabled');

        }
      });

    });

  });
</script>