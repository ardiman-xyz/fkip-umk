
<div class="row">
  <div class="col-xs-12">

        <div class="clearfix">
          <div class="pull-right tableTools-container"></div>
        </div>

        <div class="table-header">
          Data pendaftar Mahasiswa PLP / Magang
        </div><br>
       <?php if ($user->level === 'pamong'): ?>
          <?php $id = $this->session->userdata('id_sekolah') ?>
         <a href="<?= base_url('unit/print_all/'.$id) ?>" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Print Nilai Mahasiswa</a>
       <?php endif ?>
         <hr>
      
         <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th class="center" width="60">No</th>
                <?php if ($user->level == 'pengawas'): ?>
                <th class="center">Lokasi</th>                
                <?php endif ?>
                <th class="center">Program</th>  
                <th class="center">Nim</th>
                <th class="center">Nama</th>
                <th width="200" class="center">Aksi</th>
              </tr> 
            </thead>
            <tbody>
              <?php $no = 1; foreach ($data as $dt): 
              $nama_sekolah = $this->unit->getNamaSekolah($dt->id_sekolah);
              ?>
                <tr>
                  <td class="center"><?= $no++ ?></td>
                  <?php if ($user->level == 'pengawas'): ?>
                  <td><?= $nama_sekolah ?></td>               
                  <?php endif ?>
                  <td><?= $dt->program ?></td>  
                  <td><?= $dt->nim ?></td>
                  <td><?= $dt->nama ?></td>
                  <td>
                    <?php if ($user->level == 'pamong'): ?>
                      <?php if ($dt->program === 'plp'): ?>
                        <a href="<?= base_url('unit/input_nilai/'.$dt->id) ?>" class="btn btn-primary btn-sm"><i class="fa fa-file"></i> Input Nilai</a>
                        <?php else: ?>
                          <a href="<?= base_url('unit/input_nilai_magang/'.$dt->id) ?>" class="btn btn-sm btn-warning" data-rel="tooltip" data-placement="left" title="Input nilai magang"><i class="fa fa-file-text"></i> Input Nilai</a>
                      <?php endif ?>
                    <?php else: ?>
                      <?php if ($dt->program == 'plp'): ?>
                        <a href="<?= base_url('unit/lihat_nilai/'.$dt->id); ?>" class="btn btn-sm btn-primary" title="lihat nilai"><i class="fa fa-eye"></i></a>
                        <a href="<?= base_url('unit/lihat_data/'.$dt->id) ?>" class="btn btn-sm btn-info"><i class="fa fa-file"></i></a>
                        <a href="<?= base_url('unit/hapus_mhs_unit/'.$dt->id) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        <?php elseif($dt->program == 'magang'): ?>
                          <a title="Lihat Nilai" href="<?= base_url('unit/lihat_nilai_magang/'.$dt->id) ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                          <a href="<?= base_url('unit/lihat_data/'.$dt->id) ?>" class="btn btn-sm btn-info"><i class="fa fa-file"></i></a>
                         <a href="<?= base_url('unit/hapus_mhs_unit/'.$dt->id) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                      <?php endif ?>
                    <?php endif ?>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>

    <!-- PAGE CONTENT ENDS -->
  </div><!-- /.col -->
</div><!-- /.row -->

