 <table id="dynamic-table" class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th>No</th>
      <th>Jenis Ujian</th>
      <th>Nama</th>
      <th>Nim</th>
      <th>Semester</th>
      <th>Prodi</th>
      <th>Aksi</th>
    </tr> 
  </thead>
  <tbody>
   <?php if (!empty($data)): ?>
    <?php $no = 1; foreach ($data as $data): 
     $nama_prodi   = $this->prodi->nama_jurusan($data->prodi); 
     $jenis_ujian  = $this->daftar_ujian->nama_jenis_ujian($data->id_jenis_ujian)?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $jenis_ujian ?></td>
        <td><?= $data->nama ?></td>
        <td><?= $data->nim ?></td>
        <th><?= $data->semester ?></th>
        <td><?= $nama_prodi ?></td>
        <td>
          <div class="hidden-sm hidden-xs action-buttons">
            <a class="blue" href="<?= base_url('tendik/detail_daftar_ujian/'.$data->nim) ?>">
                <i class="ace-icon fa fa-eye bigger-130"></i>
              </a>
            <a class="red" href="<?= base_url('tendik/delete/'.$data->nim) ?>">
              <i class="ace-icon fa fa-trash-o bigger-130"></i>
            </a>
          </div>
        </td>
      </tr>
    <?php endforeach ?>
    <?php else: ?>
      <tr>
          <td colspan="7" align="center"><h6>Tidak ada data</h6></td>
      </tr>
   <?php endif ?>
  </tbody>
</table>
<?php if (!empty($data)): ?>
  <a href="<?= base_url('admin/daftar_ujian/cetak/'.$id_jenis_ujian) ?>" class="btn btn-sm btn-success" target="_blank"><i class="fa fa-print"></i> Cetak</a>
<?php else: ?>
   <a href="#" class="btn btn-sm btn-success disabled"><i class="fa fa-print"></i> Cetak</a>
<?php endif ?>