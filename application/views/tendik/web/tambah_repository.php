<style type="text/css" media="screen">
  .lds-ring {
  display: inline-block;
  position: relative;
  margin-left: 50%;
}
.lds-ring div {
  box-sizing: border-box;
  display: block;
  position: absolute;
  width: 30px;
  height: 30px;
  margin: 8px;
  border: 3px solid #000;
  border-radius: 50%;
  animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  border-color: #000 transparent transparent transparent;
}
.lds-ring div:nth-child(1) {
  animation-delay: -0.45s;
}
.lds-ring div:nth-child(2) {
  animation-delay: -0.3s;
}
.lds-ring div:nth-child(3) {
  animation-delay: -0.10s;
}
@keyframes lds-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>

<br>
<div class="row justy-content-center">
<div class="lds-ring" style="display: none;"><div></div><div></div><div></div><div></div></div>

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
                  <a href="<?= base_url('tendik/fasilitas/') ?>" class="list-group-item list-group-item-action ">Fasilitas</a>
                  <a href="<?= base_url('tendik/penelitian_pengabdian/') ?>" class="list-group-item list-group-item-action">Penelitian dan pengabdian</a>
                  <a href="<?= base_url('tendik/alumni/') ?>" class="list-group-item list-group-item-action">Alumni</a>
                     <a href="<?= base_url('tendik/gambar/') ?>" class="list-group-item list-group-item-action">Gambar</a>
                      <a href="<?= base_url('tendik/repository/') ?>" class="list-group-item list-group-item-action active">Repository</a>
                </div>
            </div>
        </div>
    </div>
	<div class="col-md-9">
    <?php if ($this->session->flashdata('sukses')): ?>
      <div class="alert alert-success">
        <?= $this->session->flashdata('sukses') ?>
      </div>
    <?php endif ?>
		<!-- PAGE CONTENT BEGINS -->
       <div class="card">
           <div class="card-body">
            <span id="message"></span>
               <form action="<?= base_url('tendik/store_repo') ?>" method="post" enctype="multipart/form-data" id="form-repo">
                <div class="row mb-2 mt-2">
                      <label>Nama file</label>
                        <input type="text" name="nama_file" class="form-control" required placeholder="masukkan nama">
                    </div>
                    <div class="row mb-2 mt-2" style="margin-top: 10px">
                        <label>Upload file (pdf)</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                     <div class="row mb-2 mt-2" style="margin-top: 10px">
                        <label>Type file</label>
                        <select name="type" class="form-control" required>
                          <option value="">--Pilih--</option>
                          <option value="s1">Standar 1</option>
                          <option value="s2">Standar 2</option>
                        </select>
                    </div>
                    <div class="row mb-2 mt-2" style="margin-top: 20px;" align="center">
                      <a href="<?= base_url('tendik/repository') ?>" class="btn btn-danger">kembali</a>
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

    $('#form-repo').submit(function(e){
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
          $('#form-repo')[0].reset();
          btn = $('#tambah').removeAttr('disabled', 'disabled');

        }
      });

    });

  });
</script>