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
                  <a href="<?= base_url('tendik/pengumuman_berita/') ?>" class="list-group-item list-group-item-action active">
                    Pengumuman & berita
                  </a>
                  <a href="<?= base_url('tendik/profil/') ?>" class="list-group-item list-group-item-action">
                    Profil
                  </a>
                  <a href="<?= base_url('tendik/akademik/') ?>" class="list-group-item list-group-item-action">Akademik</a>
                  <a href="<?= base_url('tendik/fasilitas/') ?>" class="list-group-item list-group-item-action">Fasilitas</a>
                  <a href="<?= base_url('tendik/penelitian_pengabdian/') ?>" class="list-group-item list-group-item-action">Penelitian dan pengabdian</a>
                  <a href="<?= base_url('tendik/alumni/') ?>" class="list-group-item list-group-item-action">Alumni</a>
                     <a href="<?= base_url('tendik/gambar/') ?>" class="list-group-item list-group-item-action">Gambar</a>
                      <a href="<?= base_url('tendik/repository/') ?>" class="list-group-item list-group-item-action">Repository</a>
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
               <form action="<?= base_url('tendik/store_pengumuman_berita') ?>" method="post" enctype="multipart/form-data">
                    <div class="row mb-2 mt-2">
                        <label>Judul</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>
                    <div class="row" style="margin-bottom: 7px">
                        <label>Jenis</label>
                        <select name="jenis" class="form-control">
                          <option value="Pengumuman">Pengumuman</option>
                          <option value="Berita">Berita</option>
                        </select>
                    </div>
                    <div class="row mb-2 mt-2">
                        <label>Upload Gambar (jpg,png,jpeg)</label>
                        <input type="file" name="gambar" class="form-control" required>
                    </div>
                    <div class="row mb-2 mt-2" style="margin-top: 10px">
                        <label>Isi</label>
                        <textarea  id="basic-example" cols="30" rows="5" class="form-control" name="isi"></textarea>
                    </div>
                    <div class="row mb-2 mt-2" style="margin-top: 20px;" align="center">
                       <button type="submit" class="btn btn-primary" id="update">Tambah</button>
                    </div>
               </form>  
           </div>
       </div>    
    </div>
</div>
</div>