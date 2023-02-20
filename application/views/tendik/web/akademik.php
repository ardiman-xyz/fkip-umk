<br>
<div class="row justy-content-center">
    <div class="container">
        <div class="alert alert-block alert-warning">
            <i class="ace-icon fa fa-check green"></i>
            Selamat datang du halaman <strong>Profil Administrasi Pendidikan</strong>
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
                  <a href="<?= base_url('tendik/akademik/') ?>" class="list-group-item list-group-item-action active">Akademik</a>
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
               <form action="<?= base_url('tendik/update_akademik/'.$akademik->id) ?>" method="post" enctype="multipart/form-data">
                    <div class="row mb-2 mt-2">
                        <label>Upload kurikulum (pdf)</label>
                        <input type="file" name="kurikulum" class="form-control">
                    </div>
                    <div class="row mb-2 mt-2" style="margin-top: 10px">
                        <label>Deskripsi Kurikulum</label>
                        <textarea class="form-control" name="ket_kurikulum" rows="5"><?= $akademik->ket_kurikulum ?></textarea>
                    </div>
                     <div class="row mb-2 mt-2" style="margin-top: 10px">
                        <label>Kalender Akademik (pdf)</label>
                        <input type="file" name="kalender_akademik" class="form-control">
                    </div>
                    <div class="row mb-2 mt-2" style="margin-top: 10px">
                        <label>Deskripsi kalender akademik</label>
                        <textarea class="form-control" name="ket_kalender_akademik" rows="5"><?= $akademik->ket_kalender_akademik ?></textarea>
                    </div>
                    <div class="row mb-2 mt-2" style="margin-top: 10px">
                       <div class="col-md-6">
                          <label>Jadwal Kuliah (Genap)</label>
                          <input type="file" name="jadwal_kuliah_genap" class="form-control">
                       </div>
                       <div class="col-md-6">
                          <label>Jadwal Kuliah (Ganjil)</label>
                          <input type="file" name="jadwal_kuliah_ganjil" class="form-control">
                       </div> 
                    </div>
                    <div class="row mb-2 mt-2" style="margin-top: 10px">
                        <label>Deskripsi jadwal kuliah</label>
                        <textarea class="form-control" name="ket_jadwal_kuliah"rows="5"><?= $akademik->ket_jadwal_kuliah ?></textarea>
                    </div>
                    <div class="row mb-2 mt-2" style="margin-top: 10px">
                        <label>Akreditasi</label>
                        <input type="file" name="akreditasi" class="form-control">
                    </div>
                    <div class="row mb-2 mt-2" style="margin-top: 20px;" align="center">
                       <button type="submit" class="btn btn-primary" id="update">Update</button>
                    </div>
               </form>  
           </div>
       </div>    
    </div>
</div>
</div>