 <br>
 <style type="text/css" media="screen">
   .kirim, .red{
    cursor: pointer;
    color: blue
   }
 </style>
<div class="row justy-content-center">
	<div class="col-md-12">
		<!-- PAGE CONTENT BEGINS -->
		<?php if ($this->session->flashdata('sukses')): ?>
      <div class="alert alert-block alert-success">
        <i class="ace-icon fa fa-check green"></i>
        <?= $this->session->flashdata('sukses') ?>
      </div>
    <?php endif ?>
    <h4 class="widget-title lighter">
	
</h4>
 
<div class="row">
  <div class="col-xs-12">
    <!-- PAGE CONTENT BEGINS -->                    
    <div style="margin-bottom: 30px">

      <ul class="nav nav-pills">
      <li>
        <a href="<?= base_url('tendik/surat_pengajuan_judul') ?>">Surat Izin Penelitian  
          <?php if ($jml_surat_pengajuan_judul == 0): ?>

          <?php else: ?>
            <span class="badge badge-danger"><?= $jml_surat_pengajuan_judul ?></span>
          <?php endif ?>
        </a>
      </li>
      <li class="active">
        <a href="<?= base_url('tendik/surat_aktif_kuliah') ?>">Surat Aktif Kuliah
          <?php if ($jml_surat_aktif_kuliah == 0): ?>

          <?php else: ?>
            <span class="badge badge-danger"><?= $jml_surat_aktif_kuliah ?></span>
          <?php endif ?>
        </a>
      </li>
      <li>
        <a href="<?= base_url('tendik/sk_beasiswa') ?>">SK Tidak Menerima Beasiswa
           <?php if ($jml_surat_beasiswa == 0): ?>

          <?php else: ?>
            <span class="badge badge-danger"><?= $jml_surat_beasiswa ?></span>
          <?php endif ?>
        </a>
      </li>
    </ul>
    <!-- <div class="pull-right" style="margin-bottom: 10px; margin-top: 10px ">   
        <button onclick="bulk_delete('surat_aktif_kuliah')" class="btn btn-sm btn-danger btn-flat" type="button"><i class="fa fa-trash"></i> Delete</button>
      </div> -->
  </div>
  <?=form_open('',array('id'=>'form_sk_beasiswa'))?>
  <div class="table-responsive">
    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th class="text-center">NO</th>
        <th class="text-center">Tanggal</th>
        <th class="text-center">Nama</th>
        <th class="text-center">Nim</th>
        <th class="text-center">Semester</th>
        <th class="text-center">Status</th>
        <th class="text-center">Pesan</th>
        <th class="text-center" width="60px">No surat</th>
        <th class="text-center">Uploaded</th>
        <th class="text-center" width="220px">Aksi</th>
         <th><input type="checkbox" id="select_all" class="check"></th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; foreach ($surat_aktif_kuliah as $key => $data) : ?>
        
        <tr>
          <td><?= $no++; ?></td>
          <td><?= pengaturan_tgl($data->tgl_insert) ?></td>
          <td><?= $data->nama ?></td>
          <td><?= $data->nim ?></td>
          <td><?= $data->semester ?>
          <td>
           <?php if ($data->status == "pending"): ?>
              <span class="label label-warning">Menunggu persetujuan...</span>
            <?php elseif($data->status == 'ditolak') : ?>
              <span class="label label-danger">Di tolak</span>
            <?php else: ?>
              <span class="label label-success"><?= $data->status ?></span>
            <?php endif ?>
          </td>
          <td align="center">
            <?php if (!empty($data->ket)): ?>
                <span id="isi_pesan<?= $key+1 ?>"><?= $data->ket ?></span>
            <?php else: ?>
              <textarea name="ket" rows="2" class="form-control" id="pesan<?= $key+1 ?>"></textarea>
             <span class="kirim" title="kirim ke <?= $data->nama ?>" id="kirim<?= $key+1 ?>" onclick="kirim_pesan('aktif_kuliah',<?= $key+1 ?>, <?= $data->id_aktif_kuliah ?>)">Send</span>
            <?php endif ?>
          </td>
          <td align="center">
            <?php if ($data->no_surat == 0): ?>
              <input type="number" name="no_surat" class="form-control" id="no_surat<?= $key+1 ?>">
               <span class="kirim" title="input no surat" id="add_no_surat<?= $key+1 ?>" onclick="add_no_surat('aktif_kuliah',<?= $key+1 ?>, <?= $data->id_aktif_kuliah ?>)">Add</span>
            <?php else: ?>
              <?= $data->no_surat ?>
            <?php endif ?>
          </td>
          <td>
            <?php if ($data->file != ''): ?>
                <a target="_blank" href="<?= base_url('assets/upload/surat_mahasiswa/'.$data->file) ?>" title=""><?= $data->file ?></a> &nbsp;<i class="fa fa-trash red" id="remove<?= $key+1 ?>" onclick="hapus_file('aktif_kuliah',<?= $data->id_aktif_kuliah ?>,<?= $key+1 ?>)" title="hapus file"></i>
            <?php else: ?>
              <input type="file" name="file" id="fileUpload<?= $key+1 ?>" onchange="file_upload_aktifKuliah(<?= $data->id_aktif_kuliah ?>,<?= $key+1 ?>)" <?= ($data->status != 'diterima' ? 'disabled' : '') ?>> 
              <span id="msg<?= $key+1 ?>"></span>
            <?php endif ?>
          </td>
          <td> 
            <div class=" action-buttons">
             <select name="status" onchange="approve_surat('aktif_kuliah', <?= $data->id_aktif_kuliah ?>, $(this).val())">
                  <option value="">--pilih--</option>
                  <option value="diterima">Terima</option>
                  <option value="ditolak">Tolak</option>
                </select>
                  <a class="btn btn-xs btn-primary" target="_blank" title="download surat" href="<?= base_url('mahasiswa/surat/pdf_surat_aktif/'.$data->id_aktif_kuliah) ?>">Lihat</a>
                <a href="<?= base_url('tendik/editSuratAktifKuliah/'.$data->id_aktif_kuliah) ?>" title="Edit" class="btn btn-xs btn-warning">Edit</a>
            </div>
          </td>
          <td>
            <input type="checkbox" class="check" name="checked[]" value="<?= $data->id_aktif_kuliah ?>">
          </td> 
        </tr>
      <?php endforeach ?>
      
    </tbody>
  </table>
  </div>
  <?= form_close(); ?>

  </div><!-- /.col -->
</div><!-- /.row -->


<?php require_once 'script_surat.php' ?>