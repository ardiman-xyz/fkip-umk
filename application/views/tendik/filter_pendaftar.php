<br>
  <div class="col-md-12">
    <!-- PAGE CONTENT BEGINS -->
    
    <div class="alert alert-block alert-success">
      <i class="ace-icon fa fa-check green"></i>
      <?= $ket ?>
    </div>
      <div style="margin-bottom: 10px">
        <a href="<?= base_url('tendik/pendaftar_ujian') ?>"  class="btn btn-sm btn-danger">&laquo; Kembali</a>
      </div>
      <div id="result" class="table-responsive">
         <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Jenis Ujian</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Nim</th>
                <th class="text-center">No. HP</th>
                <th class="text-center">Smt</th>
                <th class="text-center">Judul</th>
                <th class="text-center">Pembimbing 1</th>
                <th class="text-center">Pembimbing 2</th>
                <!-- <th class="text-center">Aksi</th> -->
              </tr> 
            </thead>
            <tbody>
             <?php if (!empty($result)): ?>
              <?php $no = 1; foreach ($result as $data): 
               $jenis_ujian  = $this->daftar_ujian->nama_jenis_ujian($data->id_jenis_ujian);
               $pembimbing1 = $this->daftar_ujian->get_pembimbing1($data->nim);
               $pembimbing2 = $this->daftar_ujian->get_pembimbing2($data->nim);
            //   $judul       = $this->daftar_ujian->get_judul($data->nim);
                ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $jenis_ujian ?></td>
                   <td>
                      <?php if ($data->status_pengajuan === 'Proses'): ?>
                       <?= $data->nama ?> <i class="fa fa-refresh orange"></i>
                      <?php elseif($data->status_pengajuan === 'Cair'): ?>
                        <?= $data->nama ?> <i class="fa fa-check green"></i>
                      <?php else: ?>
                        <?= $data->nama ?> <i class="fa fa-refresh red"></i>
                      <?php endif ?>
                    </td>
                  <td><?= $data->nim ?></td>
                  <td><?= $data->no_hp ?></td>
                  <td class="text-center"><?= $data->semester ?></td>
                  <td width="350px"><?= $data->judul ?></td>
                  <td><?= $pembimbing1 ?></td>
                   <td><?= $pembimbing2 ?></td>
                  <!-- <td>
                    <div class="hidden-sm hidden-xs action-buttons">
                      <a class="blue" href="<?= base_url('tendik/detail_daftar_ujian/'.$data->nim) ?>">
                          <i class="ace-icon fa fa-eye bigger-130"></i>
                        </a>
                      <a class="red" href="<?= base_url('tendik/delete/'.$data->nim) ?>">
                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                      </a>
                    </div>
                  </td> -->
                </tr>
              <?php endforeach ?>
              <?php else: ?>
                <tr>
                    <td colspan="8" align="center"><h6>Tidak ada data</h6></td>
                </tr>
             <?php endif ?>
            </tbody>
          </table>
     </div>
     <?php if (!empty($result)): ?>
      <a href="<?= $url_cetak ?>" class="btn btn-sm btn-success" target="_blank"><i class="fa fa-print"></i> Cetak</a>
    <?php else: ?>
       <div style="margin-top: 20px">
         <a href="#" class="btn btn-sm btn-success disabled"><i class="fa fa-print"></i> Cetak</a>
       </div>
    <?php endif ?> 
  </div>
  

