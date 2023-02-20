
 <div class="card ">
  <h5 class="card-header"><?= $title; ?></h5>

<?php  echo form_open(base_url('admin/kategori_berita/edit/'.$kategori->id_kategori_berita)); ?>

  <div class="card-body">

     <div class="row mb-2 mt-2">
             <div class="col-md-6">
                <label for="validationCustom03">Nama kategori</label>
                <input type="text" class="form-control" placeholder="Enter..." name="nama_kategori" value="<?= $kategori->nama_kategori ?>">
                <?php echo form_error('nama_kategori', '<div class="text-danger mt-2">', '</div>'); ?>
            </div>
            <div class="col-md-6">
                <label for="validationCustom04">Slug kategori</label>
                <input type="text" class="form-control" placeholder="Enter..." name="slug_kategori_berita" value="<?= $kategori->slug_kategori_berita ?>">
                <?php echo form_error('slug_kategori_berita', '<div class="text-danger mt-2">', '</div>'); ?>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <label for="validationCustom04">Urutan</label>
                <input type="number" class="form-control" placeholder="Enter..." name="urutan" value="<?= $kategori->urutan ?>">
                <?php echo form_error('urutan', '<div class="text-danger mt-2">', '</div>'); ?>
            </div>
           
        </div>
        
        <hr>

         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-4 mt-3" align="center">
            <button class="btn btn-secondary" type="reset"><i class="fas fa-user-times"></i> Reset</button>
            <button class="btn btn-primary" type="submit"><i class="fas fa-user-plus"></i> Tambah</button>
        </div>
    </div>
  </form>


  </div>