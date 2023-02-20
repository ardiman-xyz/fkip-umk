
 <div class="card ">
  <h5 class="card-header"><?= $title; ?></h5>

<?php  echo form_open_multipart(base_url('admin/pengumuman/edit/'.$pengumuman->id_pengumuman)); ?>

  <div class="card-body">

    <div class="row">
       <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 ">
            <label>Judul Pengumuman</label>
            <input type="text" class="form-control mb-2" placeholder="judul.." name="judul" value="<?= $pengumuman->judul ?>">
             <?php echo form_error('judul', '<div class="text-danger mt-2">', '</div>'); ?>
        </div>
        <div class="col-md-4">
                <label for="validationCustom03">Jenis Pengumuman</label>
                <select name="jenis_pengumuman" class="form-control">
                    <option value="">--pilih--</option>
                    <option value="utama" <?php if($pengumuman->jenis_pengumuman == 'utama'){echo'selected';} ?>>Utama</option>
                    <option value="pengumuman" <?php if($pengumuman->jenis_pengumuman == 'pengumuman'){echo'selected';} ?>>Pengumuman</option>
                </select>
                <?php echo form_error('jenis_pengumuman', '<div class="text-danger mt-2">', '</div>'); ?>
            </div>
    </div>
     <div class="row mb-2 mt-2">
            <div class="col-md-4">
                <label for="validationCustom04">Status Pengumuman</label>
                <select name="status_pengumuman" class="form-control">
                    <option value="">--pilih--</option>
                    <option value="publish" <?php if($pengumuman->status == 'publish'){echo'selected';} ?>>Publish</option>
                    <option value="no publish" <?php if($pengumuman->status == 'no publish'){echo'selected';} ?>>No Publish</option>
                </select>
                <?php echo form_error('status_pengumuman', '<div class="text-danger mt-2">', '</div>'); ?>
            </div>
            <div class="col-md-4">
                <label for="validationCustom04">Gambar Pengumuman</label>
                <input type="file" class="form-control" placeholder="gambar" name="foto" value="<?= set_value('foto') ?>"> <br>
                gambar lama <img src="<?= base_url('assets/img/pengumuman/thumbs/'.$pengumuman->gambar); ?>" alt="" class="img-thumbnail" width="200" height="100">
                <?php echo form_error('foto', '<div class="text-danger mt-2">', '</div>'); ?>
            </div>
        </div>

        <div class="row mb-2 mt-2">
        <div class="col-md-12">
            <label>Isi Pengumuman</label>
            <textarea name="isi" id="basic-example" cols="30" rows="10"><?= $pengumuman->isi_pengumuman ?></textarea>
            <?php echo form_error('isi', '<div class="text-danger mt-2">', '</div>'); ?>
        </div>
        </div>

        <hr>


         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-4 mt-3" align="center">
            <button class="btn btn-secondary" type="reset">Reset</button>
            <button class="btn btn-primary" type="submit"> Tambah</button>
        </div>
    </div>
  </form>


  </div>