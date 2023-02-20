<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tambah pengumuman
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="<?= base_url('admin/pengumuman') ?>">pengumuman</a></li>
      <li><a href="<?= base_url('admin/pengumuman/tambah') ?>">Tambah pengumuman</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">

        <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?= base_url('admin/pengumuman') ?>" title="Kembali" class="btn btn-danger btn-flat btn-sm"><i class="fa fa-backward"></i> Kembali</a>
            </div>

            <span id="msg"></span>
           
            <?= form_open_multipart('admin/pengumuman/tambah', ['id' => 'formTambahpengumuman', 'role' => 'form']) ?>
              <div class="col-md-10 col-md-offset-1">
                <div class="box-body">
                <div class="form-group">
                   <label>Judul Pengumuman</label>
                    <input type="text" class="form-control mb-2" placeholder="judul.." name="judul" value="<?= set_value('judul') ?>">
                     <?php echo form_error('judul', '<div class="text-danger mt-2">', '</div>'); ?>
                </div>
                <div class="form-group">
                  <label for="validationCustom03">Jenis Pengumuman</label>
                    <select name="jenis_pengumuman" class="form-control">
                        <option value="">--pilih--</option>
                        <option value="utama">Utama</option>
                        <option value="pengumuman">Pengumuman</option>
                    </select>
                    <?php echo form_error('jenis_pengumuman', '<div class="text-danger mt-2">', '</div>'); ?>
                </div>
                <div class="form-group">
                   <label for="validationCustom04">Status Pengumuman</label>
                    <select name="status_pengumuman" class="form-control">
                        <option value="">--pilih--</option>
                        <option value="publish">Publish</option>
                        <option value="no publish">No Publish</option>
                    </select>
                    <?php echo form_error('status_pengumuman', '<div class="text-danger mt-2">', '</div>'); ?>
                </div>
                 <div class="form-group">
                    <label for="validationCustom04">Gambar Pengumuman</label>
                    <input type="file" class="form-control" placeholder="gambar" name="foto" value="<?= set_value('foto') ?>">
                    <?php echo form_error('foto', '<div class="text-danger mt-2">', '</div>'); ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Isi Pengumuman</label>
                  <textarea id="editor1" name="isi" rows="10" cols="80"></textarea>
                  <?php echo form_error('isi', '<div class="text-danger mt-2">', '</div>'); ?>
                </div>
              </div>
              <button type="submit" id="btnTambahpengumuman" class="btn btn-primary btn flat pull-right">Simpan <i class="fa fa-arrow-circle-right"></i></button>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
            </form>
          </div>

      </div>
    </div>
  </section>
</div>
 



<!--  <div class="card ">
  <h5 class="card-header"><?= $title; ?></h5>

<?php  echo form_open_multipart(base_url('admin/pengumuman/tambah')); ?>

  <div class="card-body">

    <div class="row">
       <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 ">
            <label>Judul Pengumuman</label>
            <input type="text" class="form-control mb-2" placeholder="judul.." name="judul" value="<?= set_value('judul') ?>">
             <?php echo form_error('judul', '<div class="text-danger mt-2">', '</div>'); ?>
        </div>
        <div class="col-md-4">
                <label for="validationCustom03">Jenis Pengumuman</label>
                <select name="jenis_pengumuman" class="form-control">
                    <option value="">--pilih--</option>
                    <option value="utama">Utama</option>
                    <option value="pengumuman">Pengumuman</option>
                </select>
                <?php echo form_error('jenis_pengumuman', '<div class="text-danger mt-2">', '</div>'); ?>
            </div>
    </div>
     <div class="row mb-2 mt-2">
            <div class="col-md-4">
                <label for="validationCustom04">Status Pengumuman</label>
                <select name="status_pengumuman" class="form-control">
                    <option value="">--pilih--</option>
                    <option value="publish">Publish</option>
                    <option value="no publish">No Publish</option>
                </select>
                <?php echo form_error('status_pengumuman', '<div class="text-danger mt-2">', '</div>'); ?>
            </div>
            <div class="col-md-4">
                <label for="validationCustom04">Gambar Pengumuman</label>
                <input type="file" class="form-control" placeholder="gambar" name="foto" value="<?= set_value('foto') ?>">
                <?php echo form_error('foto', '<div class="text-danger mt-2">', '</div>'); ?>
            </div>
        </div>

        <div class="row mb-2 mt-2">
        <div class="col-md-12">
            <label>Isi Pengumuman</label>
            <textarea name="isi" id="basic-example" cols="30" rows="10"></textarea>
            <?php echo form_error('isi', '<div class="text-danger mt-2">', '</div>'); ?>
        </div>
        </div>

        <hr>


         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-4 mt-3" align="center">
            <button class="btn btn-secondary" type="reset"> Reset</button>
            <button class="btn btn-primary" type="submit">Tambah</button>
        </div>
    </div>
  </form>


  </div> -->