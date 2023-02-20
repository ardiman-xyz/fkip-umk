
 <div class="card ">
  <h5 class="card-header"><?= $title; ?></h5>

<?php  echo form_open(base_url('admin/prodi/tambah')); ?>

  <div class="card-body">

     <div class="row mb-2">
             <div class="col-md-6">
                <label for="validationCustom03">Kode Prodi</label>
                <input type="text" class="form-control" placeholder="kode..." name="kode_prodi" value="<?= set_value('kode_prodi') ?>">
                <?php echo form_error('kode_prodi', '<div class="text-danger mt-2">', '</div>'); ?>
            </div>
            <div class="col-md-6">
                <label for="validationCustom04">Nama Prodi</label>
                <input type="text" class="form-control" placeholder="nama prodi..." name="nama_prodi" value="<?= set_value('nama_prodi') ?>">
                <?php echo form_error('nama_prodi', '<div class="text-danger mt-2">', '</div>'); ?>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <label for="validationCustom04">Status</label>
              <select name="status" class="form-control">
                <option value="">--Pilih--</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
              </select>
                <?php echo form_error('status', '<div class="text-danger mt-2">', '</div>'); ?>
            </div>
            <div class="col-md-6">
                <label for="validationCustom04">Jenjang</label>
               <input autocomplete="off" type="text" class="form-control " placeholder="Jenjang" name="jenjang" value="<?= set_value('jenjang') ?>">
                <?php echo form_error('jenjang', '<div class="text-danger mt-2">', '</div>'); ?>
            </div>
        </div>


         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-4 mt-3" align="center">
            <button class="btn btn-secondary" type="reset"> Reset</button>
            <button class="btn btn-primary" type="submit"> Tambah</button>
        </div>
    </div>
  </form>


  </div>