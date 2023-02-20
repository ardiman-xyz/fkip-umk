  
  <a href="<?= base_url('surat/in') ?>" class="btn btn-danger" style="border-radius: 1px;"><i class="fa fa-backward"></i> Kembali</a>
  <hr>

  <div class="alert alert-info"><i class="fa fa-info-circle"></i><strong> Silahkan isi formulir dengan data yang falid!!</strong></div>


    <form class="form-horizontal form-label-left" id="form_pengajuan" method="post" action="<?= base_url('surat/simpan')  ?>" enctype="multipart/form-data">
       <div class="form-group">
        <label class="control-label col-md-3" for="last-name">No. Induk
        </label>
        <div class="col-md-4">
          <input type="text" id="nim" name="nim" class="form-control col-md-7 col-xs-12" value="<?= $this->session->userdata('nim') ?>" readonly>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3" for="first-name">Nama <span class="required" style="color: red;">*</span>
        </label>
        <div class="col-md-7">
          <input type="text" id="nama" name="nama" placeholder="masukkan nama" required="required" class="form-control col-md-12 col-xs-12" required>
        </div>
      </div>
     
      <div class="form-group">
        <label class="control-label col-md-3" for="first-name">Semester <span class="required" style="color: red;">*</span>
        </label>
        <div class="col-md-7">
          <select class="form-control col-md-7 col-xs-12" name="semester" id="semester" required>
            <option value="">--Pilih--</option>
            <option value="genap">Genap</option>
            <option value="ganjil">Ganjil</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3" for="last-name">Program Studi <span class="required" style="color: red;">*</span>
        </label>
        <div class="col-md-7">
         <select class="form-control col-md-10 col-xs-12" name="prodi" id="prodi" required>
            <option value="">--Pilih--</option>
            <?php foreach ($prodi as $data): ?>
              <option value="<?= $data->id_prodi ?>"><?= $data->nama_prodi ?></option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3" for="last-name">Judul Penelitian <span class="required" style="color: red;">*</span>
        </label>
        <div class="col-md-7">
          <input type="text" id="judul" placeholder="Masukkan judul penelitian" name="judul" class="form-control col-md-12 col-xs-12" required>
        </div>
      </div>

      <button type="submit" class="btn btn-primary btn-sm" style="border-radius: 1px; margin-left: 10px;" id="btnSimpan">Kirim</button>

    </form>



