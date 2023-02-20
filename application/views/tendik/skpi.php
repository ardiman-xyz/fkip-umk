<br>

<div class="row justy-content-center">
	<div class="col-md-12">
		<!-- PAGE CONTENT BEGINS -->
		
		<div class="alert alert-block alert-success">
			<i class="ace-icon fa fa-check green"></i>
			Data SKPI Mahasiswa
		</div>
        <?= $this->session->flashdata('sukses') ?>
    <h4 class="widget-title lighter">
      <!-- <i class="ace-icon glyphicon glyphicon-ok green"></i>
      Surat Izin Penelitian -->
    </h4>
		<div class="row" style="margin-top: 10px">
          <div id="result" class="table-responsive">
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Tanggal Pengajuan</th>
                  <th class="text-center">NIM</th>
                  <th class="text-center">Nama Mahasiswa</th>
                  <th class="text-center">Tahun Masuk</th>
                  <th class="text-center">Tahun Lulus</th>
                  <th class="text-center">Aksi</th>
                </tr> 
              </thead>
              <tbody>
                <?php foreach ($skpi as $key => $data): ?>
                  <tr <?= $data->status === 'Diterima' ? 'style="background-color: #97d18a;"' : 'style="background-color: #eb9696;"'?>>
                    <td class="text-center"><?= $key + 1 ?></td>
                    <td class="text-center"><?= pengaturan_tgl($data->date_created) ?></td>
                    <td class="text-center"><?= $data->nim ?></td>
                    <td class="text-center"><?= $data->nama_lengkap ?></td>
                    <td class="text-center"><?= $data->tahun_masuk ?></td>
                    <td class="text-center"><?= $data->tahun_lulus ?></td>
                    <td class="text-center">
                      <a class="btn btn-xs btn-info" title="Lengkapi data" href="<?= base_url('tendik/edit_skpi/'.$data->id) ?>">Lengkapi data</a>
                      <a class="btn btn-xs btn-default" title="Lengkapi data" href="<?= base_url('tendik/preview/'.$data->id) ?>">Preview</a>
                      <a class="btn btn-xs btn-primary" target="_blank" title="Cetak SKPI" href="<?= base_url('tendik/cetak_skpi/'.$data->id) ?>">Cetak</a>
                      <a class="btn btn-xs btn-danger" title="Hapus" href="<?= base_url('tendik/hapus_skpi/'.$data->id) ?>">Hapus</a>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
         </div>
  </div>
</div>
