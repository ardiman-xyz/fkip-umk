<br>
  <div class="col-md-12">
    <!-- PAGE CONTENT BEGINS -->
    
    <div class="alert alert-block alert-success">
      <?= $ket ?>
    </div>
      <div style="margin-bottom: 10px">
        <a href="<?= base_url('fakultas/laporan') ?>"  class="btn btn-sm btn-danger">&laquo; Kembali</a>
      </div>
      <div id="result" class="table-responsive">
         <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
              <th class="text-center">No</th>
              <th class="text-center">Prodi</th>
              <th class="text-center">Tgl RAB</th>
              <th class="text-center">Jenis Ujian</th>
              <th class="text-center">File laporan</th>
              <th class="text-center">Tgl uploaded</th>
              </tr> 
            </thead>
            <tbody>
            <?php if (!empty($laporan)): ?>
                 <?php foreach ($laporan as $key => $lap): ?>
                  <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $lap->nama_prodi ?></td>
                    <td class="text-center"><?= pengaturan_tgl($lap->date_created) ?></td>
                    <td class="text-center"><?= $lap->nama_ujian ?></td>
                    <td class="text-center">
                      <?php if ($lap->upload_laporan === null): ?>
                        --Tidak ada laporan--
                      <?php else: ?>
                        <a href="<?= base_url('assets/upload/laporan_rab/'.$lap->upload_laporan) ?>" target="_blank" title=""><?= $lap->upload_laporan ?></a>
                      <?php endif ?>
                    </td>
                    <td class="text-center"><?= ($lap->updated_at == null ? '--Belum upload laporan--' : $lap->updated_at) ?></td>
                  </tr>
                <?php endforeach ?>
            <?php else: ?>
              <tr>
                <td colspan="6" class="text-center">Tidak ada data</td>
              </tr>
            <?php endif ?>
            </tbody>
          </table>
     </div> 
  </div>
  

