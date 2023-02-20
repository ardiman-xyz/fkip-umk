
 <div class="card ">
  <h5 class="card-header"><?= $title; ?></h5>

<?php  echo form_open_multipart(base_url('admin/berita/tambah')); ?>

  <div class="card-body">

    <div class="row">
       <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 ">
            <label>Judul Berita</label>
            <input type="text" class="form-control mb-2" placeholder="judul.." name="judul" value="<?= set_value('judul') ?>">
             <?php echo form_error('judul', '<div class="text-danger mt-2">', '</div>'); ?>
        </div>
        <div class="col-md-4">
                <label for="validationCustom03">Jenis Berita</label>
                <select name="jenis_berita" class="form-control">
                    <option value="">--pilih--</option>
                    <option value="utama">Utama</option>
                    <option value="berita">berita</option>
                </select>
                <?php echo form_error('jenis_berita', '<div class="text-danger mt-2">', '</div>'); ?>
            </div>
    </div>
     <div class="row mb-2 mt-2">
             <div class="col-md-4">
                <label for="validationCustom03">Kategori Berita</label>
                <select name="kategori_berita" class="form-control">
                    <option value="">--pilih--</option>
                    <?php foreach($kategori as $row ) : ?>
                        <option value="<?= $row->id_kategori_berita; ?>"><?= $row->nama_kategori; ?></option>
                    <?php endforeach ?>
                </select>
                <?php echo form_error('kategori_berita', '<div class="text-danger mt-2">', '</div>'); ?>
            </div>
            <div class="col-md-4">
                <label for="validationCustom04">Status Berita</label>
                <select name="status_berita" class="form-control">
                    <option value="">--pilih--</option>
                    <option value="publish">Publish</option>
                    <option value="no publish">No Publish</option>
                    <option value="pending">Pending</option>
                </select>
                <?php echo form_error('telepon', '<div class="text-danger mt-2">', '</div>'); ?>
            </div>
            <div class="col-md-4">
                <label for="validationCustom04">Gambar Berita</label>
                <input type="file" class="form-control" placeholder="gambar" name="foto" value="<?= set_value('foto') ?>">
                <?php echo form_error('foto', '<div class="text-danger mt-2">', '</div>'); ?>
            </div>
        </div>

        <div class="row mb-2 mt-2">
        <div class="col-md-12">
            <label>Isi Berita</label>
            <textarea name="isi" id="basic-example" cols="30" rows="10"></textarea>
            <?php echo form_error('isi', '<div class="text-danger mt-2">', '</div>'); ?>
        </div>
        </div>

        <hr>


         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-4 mt-3" align="center">
            <button class="btn btn-secondary" type="reset"> Reset</button>
            <button class="btn btn-primary" type="submit"> Tambah</button>
        </div>
    </div>
  </form>


  </div>