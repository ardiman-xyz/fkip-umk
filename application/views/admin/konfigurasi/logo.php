<?= $this->session->flashdata('success'); ?>
 <div class="card ">
  <h5 class="card-header"><?= $title; ?></h5>

<?php  echo form_open_multipart(base_url('admin/dashboard/logo')); ?>

  <div class="card-body">

    <div class="row mb-4 mt-3">
       <div class="col-md-3">
            <label for="validationCustom04">Upload Logo</label>
           <input type="file" class="form-control mt-1" onchange="loadFile(event)" name="foto" id="foto" value="<?= set_value('foto') ?>">
            <?php echo form_error('foto', '<div class="text-danger mt-2">', '</div>'); ?>
            <h5 class="text-danger mt-2">*silahkan upload Logo website</h5>
            <img id="preimage" width="150px" height="150px">
        </div>
        <div class="col-md-3">
            <h4>Halaman logo lama</h4>
        </div>
    </div>
       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-4 mt-3" align="center">
          <button class="btn btn-primary" type="submit">Update</button>
      </div>
    </div>
  </form>

  </div>