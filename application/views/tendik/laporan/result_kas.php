<?php foreach ($kas as $key => $k): ?>
  <tr>
    <td class="text-center"><?= $key+1 ?></td>
    <td class="text-center"><?= pengaturan_tgl($k->date_created) ?></td>
    <td width="35%"><?= $k->ket ?></td>
    <td class="text-right">
      <span style="color: green"><?= ($k->jenis === 'M' ? 'Rp. '.number_format($k->jumlah) : '-') ?></span></td>
    <td class="text-right">
      <span style="color: red"><?= ($k->jenis === 'K' ? 'Rp. '.number_format($k->jumlah) : '-') ?></span>
    </td>
    <td class="text-center">
    <?php if ($k->bukti !== null): ?>
       <a target="_blank" href="<?= base_url('assets/upload/bukti_kas/'.$k->bukti) ?>" title="Bukti"><i class="fa fa-download"></i> Bukti</a>
    <?php else: ?>
      --
    <?php endif ?>
    </td>
  </tr>
<?php endforeach ?>