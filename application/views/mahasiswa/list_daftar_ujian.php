<br>
<div class="row justy-content-center">
  <div class="col-md-1"></div>
  <div class="col-md-10">
    <!-- PAGE CONTENT BEGINS -->
    
    <div class="alert alert-block alert-success">
      <i class="ace-icon fa fa-check green"></i>
      Welcome to Daftar ujian
    </div>

    <div style="margin-top: 10px">
      <?= $this->session->flashdata('sukses'); ?>
    </div>


    <a href="<?= base_url('mahasiswa/daftar_ujian/daftar_form')  ?>" class="btn btn-primary" style="border-radius: 1px; margin-bottom: 7px;"> Daftar Ujian</a>
    <h4 class="widget-title lighter">
      <!-- <i class="ace-icon glyphicon glyphicon-ok green"></i>
      Surat Izin Penelitian -->
    </h4>
    <div class="table-responsive">
      <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Nim</th>
            <th class="text-center">Jenis ujian</th>
            <th class="text-center">Tanggal Daftar</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($data)): ?>
                <?php $no =1; foreach ($data as $dt): 
                  $jenis_ujian = $this->daftar_ujian->nama_jenis_ujian($dt->id_jenis_ujian);
                ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $dt->nama ?></td>
                        <td class="text-center"><?= $dt->nim ?></td>
                        <td class="text-center"><?= $jenis_ujian ?></td>
                        <td class="text-center"><?= pengaturan_tgl($dt->created) ?></td>
                    </tr>
                <?php endforeach ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center">Belum ada data</td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
    </div>
</div>
</div>

<?php if ($this->session->flashdata('msg') == 'success'): ?>
  <script type="text/javascript">
    iziToast.success({
      timeout: 7000,
      icon: 'fa fa-check',
      title: 'Sukses',
      message: 'Data anda sudah di rekam!',
      // position: 'topCenter'
    });
  </script>
<?php elseif($this->session->flashdata('msg') == 'error'): ?>
  <script type="text/javascript">
    iziToast.error({
      timeout: 10000,
      icon: 'fa fa-times',
      title: 'gagal',
      message: 'nim & jenis ujian anda sudah terdaftar, silahkan hubungi admin!',
      // position: 'topCenter'
    });
  </script>
<?php endif ?>
