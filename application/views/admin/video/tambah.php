
 <div class="card ">
  <h5 class="card-header"><?= $title; ?></h5>

<?php  echo form_open_multipart(base_url('admin/video/tambah')); ?>

  <div class="card-body">

    <div class="row">
       <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 ">
            <label>Judul Video</label>
            <input type="text" class="form-control mb-2" placeholder="judul.." name="judul" value="<?= set_value('judul') ?>">
             <?php echo form_error('judul', '<div class="text-danger mt-2">', '</div>'); ?>
        </div>
        <div class="col-md-4">
                <label for="validationCustom03">Posisi</label>
                <select name="posisi" class="form-control">
                    <option value="">--pilih--</option>
                    <option value="video">Video Galeri</option>
                    <option value="homepage">Homepage Video</option>
                </select>
                <?php echo form_error('posisi', '<div class="text-danger mt-2">', '</div>'); ?>
            </div>
    </div>
     <div class="row mb-2 mt-2">
            <div class="col-md-8">
                <label>Link video youtube</label>
                <div class="form-group input-group">
                    <span class="input-group-addon">http:://www.youtube.com/watch?v= &nbsp;</span>
                    <input name="video" type="text" class="form-control" placeholder="masukkan kode terakhir yaoutube setalah =...">
                </div>   

                <?php echo form_error('video', '<div class="text-danger mt-2">', '</div>'); ?>
            </div>
            <div class="col-md-4">
                <label for="validationCustom04">Status video</label>
                <select name="status" class="form-control">
                    <option value="">--pilih--</option>
                    <option value="publish">Publish</option>
                    <option value="no publish">No Publish</option>
                    <option value="pending">Pending</option>
                </select>
                <?php echo form_error('status', '<div class="text-danger mt-2">', '</div>'); ?>
            </div>
           
        </div>
        <div class="row mt-2">
        <div class="col-md-12">
                <label for="validationCustom03">Katerangan</label>
                <textarea class="form-control" name="keterangan" rows="3"></textarea>
                <?php echo form_error('keterangan', '<div class="text-danger mt-2">', '</div>'); ?>
            </div>
        </div>

        <hr>


         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-4 mt-3" align="center">
            <button class="btn btn-secondary" type="reset"> Reset</button>
            <button class="btn btn-primary" type="submit">Tambah</button>
        </div>
    </div>
  </form>


  </div>