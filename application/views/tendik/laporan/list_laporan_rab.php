<?php foreach ($rab as $key => $value): ?>
  <tr>
    <td class="text-center"><?= $key+1 ?></td>
    <td class="text-center"><?= pengaturan_tgl($value->date_created) ?></td>
    <td class="text-center"><span class="label label-success"><?= $value->nama_ujian ?></span></td>
    <td class="text-center"><?= $value->no_sk ?></td>
    <td>
      <?php if ($value->upload_laporan !== null): ?>
        <a href="<?= base_url('assets/upload/laporan_rab/'.$value->upload_laporan ) ?>" title="Lihat laporan" target="_blank"><?= $value->upload_laporan ?></a>
      <?php else: ?>
        <input type="file" name="file_laporan" id="fileUpload<?= $key+1 ?>" onchange="upload_laporan(<?= $value->id ?>,<?= $key+1 ?>)"> 
        <span id="msg<?= $key+1 ?>"></span>
      <?php endif ?>
    </td>
    <td class="text-center">
      <?php if ($value->upload_laporan !== null): ?>
        <?= $value->updated_at ?>
      <?php else: ?>
        --Belum ada data--
      <?php endif ?>
    </td>
    <td class="text-center">
      <?php if ($value->upload_laporan !== null): ?>
      <button title="Hapus RAB" class="btn btn-danger btn-sm" id="btn-hapus<?= $key+1 ?>" onclick="hapus_rab(<?= $value->id ?>,<?= $key+1 ?>)"><i class="fa fa-trash"></i></button>
      <?php endif ?>
    </td>
  </tr>
<?php endforeach ?>