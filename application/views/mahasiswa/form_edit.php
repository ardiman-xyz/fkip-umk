 <form class="form-horizontal form-label-left" id="izin_penelitian" method="post" action="<?= base_url('mahasiswa/surat/update_surat')  ?>" >
  <input type="hidden" name="id" value="<?= $surat->id ?>">
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
          <input type="text" id="nama" name="nama" placeholder="masukkan nama" class="form-control col-md-12 col-xs-12" readonly="readonly" value="<?= $this->session->userdata('nama_lengkap') ?>">
        </div>
      </div>
     
      <div class="form-group">
        <label class="control-label col-md-3" for="first-name">Semester <span class="required" style="color: red;">*</span>
        </label>
        <div class="col-md-7">
          <select class="form-control col-md-7 col-xs-12" name="semester" id="semester" required>
            <option value="">--Pilih--</option>
            <option value="genap" <?= ($surat->semester == 'genap' ? 'selected' : '') ?>>Genap</option>
            <option value="ganjil" <?= ($surat->semester == 'ganjil' ? 'selected' : '') ?>>Ganjil</option>
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
              <option value="<?= $data->id_prodi ?>" <?= ($surat->prodi == $data->id_prodi ? 'selected' : '') ?>><?= $data->nama_prodi ?></option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3" for="last-name">Judul Penelitian <span class="required" style="color: red;">*</span>
        </label>
        <div class="col-md-7">
          <textarea name="judul"  type="text" id="judul" placeholder="Masukkan judul penelitian" name="judul" class="form-control col-md-12 col-xs-12" required rows="3"><?= $surat->judul_penelitian ?></textarea>
        </div>
      </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-pill" id="btn-close" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-md" style="border-radius: 1px; margin-left: 10px;" id="btnSimpan"><i class="glyphicon glyphicon-ok"></i> Kirim</button>
        </div>
    </form>


<script>

  $(document).ready(function(){

    $('#izin_penelitian').on('submit', function(e){
      e.preventDefault();
      const me = $(this),
            url = me.attr('action'),
            data = me.serialize();
            btn_submit = me.find('#btnSimpan').attr('disabled', true);
            btn_close = me.find('#btn-close').attr('disabled', true);
            btn_submit.html('<i class="glyphicon glyphicon-ok"></i> Kirim');

      $.ajax({
        url: url,
        method: 'post',
        dataType: 'json',
        data: data,
        success: callback => {
          if(callback.status == true)
          {
            btn_submit = me.find('#btnSimpan').attr('disabled', false);
            btn_close = me.find('#btn-close').attr('disabled', false);
            btn_submit.html('<i class="glyphicon glyphicon-ok"></i> Kirim');
            
            $('#msg').html(`
              <div class="alert alert-success" align="center">
                ${callback.pesan}
              </div>
              `);
            setTimeout(() => {
                location.reload();
              }, 700);

          }else{
            btn_submit = me.find('#btnSimpan').attr('disabled', false);
            btn_close = me.find('#btn-close').attr('disabled', false);
            btn_submit.html('<i class="glyphicon glyphicon-ok"></i> Kirim');
            alert('Gagal update')
          }

        },
        error: xhr =>{
          alert('something went wrong')
        }
      })

    })

  });

</script>