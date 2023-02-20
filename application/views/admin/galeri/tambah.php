
 <div class="card ">
  <h5 class="card-header"><?= $title; ?></h5>

<?php  echo form_open_multipart(base_url('admin/galeri/tambah')); ?>

  <div class="card-body">

     <div class="row mb-2 mt-2">
             <div class="col-md-6">
                <label for="validationCustom03">Judul Foto</label>
                <input type="text" class="form-control" placeholder="Judul" name="judul_foto" value="<?= set_value('judul_foto') ?>">
                <?php echo form_error('judul_foto', '<div class="text-danger mt-2">', '</div>'); ?>
            </div>
            <div class="col-md-6">
                <label for="validationCustom04">Posisi Foto</label>
                <select name="posisi_foto" class="form-control">
                    <option value="">Pilih</option>
                    <option value="slider">Slider</option>
                    <option value="galeri">Galeri</option>
                </select>
                <?php echo form_error('posisi_foto', '<div class="text-danger mt-2">', '</div>'); ?>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <label for="validationCustom04">Status</label>
                <select name="status_foto" class="form-control">
                    <option value="">Pilih</option>
                    <option value="publish">Publish</option>
                    <option value="no publish">No Publish</option>
                    <option value="pending">pending</option>
                </select>
                <?php echo form_error('status_foto', '<div class="text-danger mt-2">', '</div>'); ?>
            </div>

            <div class="col-md-3">
                <label for="validationCustom04">Upload Foto</label>
               <input type="file" class="form-control mt-1" onchange="loadFile(event)" name="foto" id="foto" value="<?= set_value('foto') ?>">
                <?php echo form_error('foto', '<div class="text-danger mt-2">', '</div>'); ?>
                <h5 class="text-danger mt-2">*silahkan upload foto</h5>
                <img id="preimage" width="150px" height="150px">
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