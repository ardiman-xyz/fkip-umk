<br>
  <div class="col-md-12">
    
    <div class="alert alert-block alert-success">
      <i class="ace-icon fa fa-check green"></i>
      <?= $ket ?>
    </div>
      <div style="margin-bottom: 10px">
        <a href="<?= base_url('fakultas/mahasiswa') ?>"  class="btn btn-sm btn-danger">&laquo; Kembali</a>
      </div>
      <?= form_open('fakultas/mahasiswa/cetak_filter_check', ['id' => 'form_check_filter' ]); ?>
      <input type="hidden" name="nama_prodi" value="<?= $nama_prodi ?>">
      <div id="result" class="table-responsive">
         <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center">check</th>
                <th class="text-center">No</th>
                <th class="text-center">Jenis Ujian</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Nim</th>
                <th class="text-center">Smt</th>
                <th class="text-center">Pembimbing 1</th>
                <th class="text-center">Pembimbing 2</th>
                <th class="text-center">Tgl Bayar</th>
                <th class="text-center">Status ujian</th>
                <th class="text-center">Status pengajuan</th>
              </tr> 
            </thead>
            <tbody>
             <?php if (!empty($result)): ?>
              <?php $no = 1; foreach ($result as $key => $data): 
               $jenis_ujian  = $this->daftar_ujian->nama_jenis_ujian($data->id_jenis_ujian);
               $pembimbing1 = $this->daftar_ujian->get_pembimbing1($data->nim);
               $pembimbing2 = $this->daftar_ujian->get_pembimbing2($data->nim);
                ?>
                <tr>
                  <td><input type="checkbox" name="nim[]" value="<?= $data->nim ?>" class="check" onchange="cek(<?= $key+1 ?>)">
                    <input type="checkbox" id="ju<?= $key+1 ?>" name="jenis_ujian[]" value="<?= $data->id_jenis_ujian ?>" style="display: none">
                  </td>
                  <td><?= $no++; ?></td>
                  <td><?= $jenis_ujian ?></td>
                  <td><?= $data->nama ?></td>
                  <td><?= $data->nim ?></td>
                  <td class="text-center"><?= $data->semester ?></td>
                  <td><?= $pembimbing1 ?></td>
                   <td><?= $pembimbing2 ?></td>
                  <td><?= pengaturan_tgl($data->tgl_bayar) ?></td>
                  <td><?= ($data->status == '0' ? '<span class="badge badge-danger">Belum</span>' : '<span class="badge badge-success">Sudah</span>') ?></td>
                  <td class="text-center">
                    <select name="status_pengajuan" id="status_pengajuan<?= $key+1 ?>" onchange="update_status_pengajuan(<?= $data->id ?>,<?= $key+1 ?>)">
                      <option value="">--pilih--</option>
                      <option value="Proses" <?= $data->status_pengajuan === 'Proses' ? 'selected' : ''?>>Proses</option>
                      <option value="Cair" <?= $data->status_pengajuan === 'Cair' ? 'selected' : ''?>>cair</option>
                      <option value="tidak_cair" <?= $data->status_pengajuan === 'tidak_cair' ? 'selected' : ''?>>tidak cair</option>
                    </select>
                  </td>
                </tr>
              <?php endforeach ?>
              <?php else: ?>
                <tr>
                    <td colspan="10" align="center"><h6>Tidak ada data</h6></td>
                </tr>
             <?php endif ?>
            </tbody>
          </table>
     </div>

      <?= form_close(); ?>

     <?php if (!empty($result)): ?>
      <a href="<?= $url_cetak ?>" class="btn btn-sm btn-success" target="_blank"><i class="fa fa-print"></i> Cetak</a>
      <button onclick="cetak_filter_check()" class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-print"></i> Cetak yang dicheck</button>
    <?php else: ?>
       <div style="margin-top: 20px">
         <a href="#" class="btn btn-sm btn-success disabled"><i class="fa fa-print"></i> Cetak</a>
         <a href="#" class="btn btn-sm btn-primary disabled" target="_blank"><i class="fa fa-print"></i> Cetak yang dicheck</a>
       </div>
    <?php endif ?> 
  </div>
  

  <script type="text/javascript">
    function cetak_filter_check() {
        $('#form_check_filter').submit();
    }
    function cek(key)
    {
      $('#ju'+key).attr('checked', true);
    }

     function update_status_pengajuan(id, key)
   {
      const value = $('#status_pengajuan'+key).val();

      $.ajax({
        url: "<?= base_url('fakultas/mahasiswa/update_status_pengajuan') ?>",
        type: "post",
        data: {
          id: id,
          value: value
        },
        dataType: 'json',
        success: callback =>{
          if (callback.message == 'success') {
            iziToast.success({
              timeout: 5000,
              icon: 'fa fa-check',
              title: 'Sukses',
              message: 'Status berhasil di ubah!',
              position: 'topRight'
            });
          }
        },
        error: xhr =>{
           iziToast.error({
              timeout: 5000,
              icon: 'fa fa-time',
              title: 'Message',
              message: 'Something Wrong On your network!',
              position: 'topCenter'
            });
        }
      })
   }
  </script>

