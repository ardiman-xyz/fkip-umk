
<div class="row">
  <div class="col-xs-12">
    <!-- PAGE CONTENT BEGINS -->


      <div class="row">
        <div class="col-sm-12">
          <div class="tabbable">

            <ul class="nav nav-tabs" id="myTab">
              <li class="active">
                <a data-toggle="tab" href="#home">
                  <i class="blue ace-icon fa fa-envelope bigger-120"></i>
                  Surat Pengajuan Judul
                  <?php if ($jml_surat_pengajuan_judul == 0): ?>
                  <?php else: ?>
                    <span class="badge badge-danger"><?=$jml_surat_pengajuan_judul ?></span>
                  <?php endif ?>
                </a>
              </li>

              <li>
                <a data-toggle="tab" href="#messages">
                  <i class="blue ace-icon fa fa-envelope bigger-120"></i>
                  Surat Cuti
                  <?php if ($jml_surat_cuti == 0): ?>
                  <?php else: ?>
                    <span class="badge badge-danger"><?=$jml_surat_cuti ?></span>
                  <?php endif ?>
                </a>
              </li>
              <li>
                <a data-toggle="tab" href="#aktif">
                  <i class="blue ace-icon fa fa-envelope bigger-120"></i>
                  Surat Aktif Kuliah
                  <?php if ($jml_surat_aktif_kuliah == 0): ?>
                  <?php else: ?>
                    <span class="badge badge-danger"><?=$jml_surat_aktif_kuliah ?></span>
                  <?php endif ?>
                </a>
              </li>
              <li>
                <a data-toggle="tab" href="#beasiswa">
                  <i class="blue ace-icon fa fa-envelope bigger-120"></i>
                  SK Tidak Menerima Beasiswa
                  <?php if ($jml_surat_beasiswa == 0): ?>
                  <?php else: ?>
                    <span class="badge badge-danger"><?=$jml_surat_beasiswa ?></span>
                  <?php endif ?>
                </a>
              </li>
            </ul>

            <div class="tab-content">
              <div id="home" class="tab-pane fade in active">
                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Nim</th>
                        <th>Semester</th>
                        <th>Prodi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; foreach ($surat as $data): 
                      $nama_prodi   = $this->prodi->nama_jurusan($data->prodi); ?>
                        
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $data->nama ?></td>
                          <td><?= $data->nim ?></td>
                          <td><?= $data->semester ?>
                          <td><?= $nama_prodi ?></td>
                          <td>
                            <?php if ($data->status == "pending"): ?>
                              <span class="label label-danger"><?= $data->status ?></span>
                            <?php else: ?>
                              <span class="label label-success"><?= $data->status ?></span>
                            <?php endif ?>
                          </td>
                          <td>
                            <div class="hidden-sm hidden-xs action-buttons">
                             <?php if ($data->status == "pending"): ?>
                              <a class="blue" href="<?= base_url('admin/surat/diterima/'.$data->id) ?>">
                                <i class="ace-icon glyphicon glyphicon-ok bigger-130"></i>
                              </a>
                             <?php else: ?>
                               <a class="red" href="<?= base_url('admin/surat/pending/'.$data->id) ?>">
                                <i class="ace-icon glyphicon glyphicon-remove bigger-130"></i>
                              </a>
                             <?php endif ?>

                              <a class="red" href="<?= base_url('admin/surat/delete/'.$data->id) ?>">
                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                              </a>
                              <a class="green" target="_blank" title="download surat" href="<?= base_url('mahasiswa/surat/pdf/'.$data->id) ?>">
                                <i class="ace-icon fa fa-download bigger-130"></i>
                              </a>
                            </div>
                          </td>
                        </tr>
                      <?php endforeach ?>

                    </tbody>
                  </table>
              </div>

              <div id="messages" class="tab-pane fade">
                <p><table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Nim</th>
                        <th>Semester</th>
                        <th>Prodi</th>
                        <th>Alasan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; foreach ($surat_cuti as $data): 
                      $nama_prodi   = $this->prodi->nama_jurusan($data->prodi); ?>
                        
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $data->nama ?></td>
                          <td><?= $data->nim ?></td>
                          <td><?= $data->semester ?>
                          <td><?= $nama_prodi ?></td>
                          <td><?= $data->alasan ?></td>
                          <td>
                            <div class="hidden-sm hidden-xs action-buttons">
                            <?php if ($data->status == "pending"): ?>
                              <span class="label label-danger"><?= $data->status ?></span>
                            <?php else: ?>
                              <span class="label label-success"><?= $data->status ?></span>
                            <?php endif ?>
                          </td>
                          <td> 
                            <div class="hidden-sm hidden-xs action-buttons">
                            <?php if ($data->status == "pending"): ?>
                              <a class="blue" href="<?= base_url('admin/surat/diterima_cuti/'.$data->id_cuti) ?>">
                                <i class="ace-icon glyphicon glyphicon-ok bigger-130"></i>
                              </a>
                             <?php else: ?>
                               <a class="red" href="<?= base_url('admin/surat/pending_cuti/'.$data->id_cuti) ?>">
                                <i class="ace-icon glyphicon glyphicon-remove bigger-130"></i>
                              </a>
                             <?php endif ?>


                              <a class="blue" href="<?= base_url('admin/surat/detail/'.$data->id_cuti) ?>">
                                <i class="ace-icon fa fa-eye bigger-130"></i>
                              </a>

                              <a class="red" href="<?= base_url('admin/surat/delete_cuti/'.$data->id_cuti) ?>">
                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                              </a>
                              <a class="green" target="_blank" title="download surat" href="<?= base_url('mahasiswa/surat/pdf_surat_cuti/'.$data->id_cuti) ?>">
                                <i class="ace-icon fa fa-download bigger-130"></i>
                              </a>
                            </div>
                          </td>
                        </tr>
                      <?php endforeach ?>
                      
                    </tbody>
                  </table></p>
              </div>

              <div id="aktif" class="tab-pane fade">
                <p><table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Nim</th>
                        <th>Prodi</th>
                        <th>Semester</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; foreach ($surat_aktif_kuliah as $data): 
                      $nama_prodi   = $this->prodi->nama_jurusan($data->prodi); ?>
                        
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $data->nama ?></td>
                          <td><?= $data->nim ?></td>
                          <td><?= $nama_prodi ?></td>
                          <td><?= $data->semester ?>
                          <td>
                            <div class="hidden-sm hidden-xs action-buttons">
                            <?php if ($data->status == "pending"): ?>
                              <span class="label label-danger"><?= $data->status ?></span>
                            <?php else: ?>
                              <span class="label label-success"><?= $data->status ?></span>
                            <?php endif ?>
                          </td>
                          <td> 
                            <div class="hidden-sm hidden-xs action-buttons">
                            <?php if ($data->status == "pending"): ?>
                              <a class="blue" href="<?= base_url('admin/surat/diterima_aktif_kuliah/'.$data->id_aktif_kuliah) ?>">
                                <i class="ace-icon glyphicon glyphicon-ok bigger-130"></i>
                              </a>
                             <?php else: ?>
                               <a class="red" href="<?= base_url('admin/surat/pending_aktif_kuliah/'.$data->id_aktif_kuliah) ?>">
                                <i class="ace-icon glyphicon glyphicon-remove bigger-130"></i>
                              </a>
                             <?php endif ?>


                              <a class="blue" href="<?= base_url('admin/surat/detail_surat_aktif/'.$data->id_aktif_kuliah) ?>">
                                <i class="ace-icon fa fa-eye bigger-130"></i>
                              </a>

                              <a class="red" href="<?= base_url('admin/surat/delete_aktif_kuliah/'.$data->id_aktif_kuliah) ?>">
                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                              </a>
                               <a class="green" target="_blank" title="download surat" href="<?= base_url('mahasiswa/surat/pdf_surat_aktif/'.$data->id_aktif_kuliah) ?>">
                                <i class="ace-icon fa fa-download bigger-130"></i>
                              </a>
                            </div>
                          </td>
                        </tr>
                      <?php endforeach ?>
                      
                    </tbody>
                  </table>
                </p>
              </div>
              <div id="beasiswa" class="tab-pane fade">
                <p><table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Nim</th>
                        <th>Prodi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; foreach ($data_beasiswa as $data): 
                      $nama_prodi   = $this->prodi->nama_jurusan($data->id_prodi); ?>
                        
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $data->nama ?></td>
                          <td><?= $data->nim ?></td>
                          <td><?= $nama_prodi ?></td>
                          <td>
                            <div class="hidden-sm hidden-xs action-buttons">
                            <?php if ($data->status == "Pending"): ?>
                              <span class="label label-danger"><?= $data->status ?></span>
                            <?php else: ?>
                              <span class="label label-success"><?= $data->status ?></span>
                            <?php endif ?>
                          </td>
                          <td> 
                            <div class="hidden-sm hidden-xs action-buttons">
                            <?php if ($data->status == "Pending"): ?>
                              <a class="blue" href="<?= base_url('admin/surat/diterima_beasiswa/'.$data->id) ?>">
                                <i class="ace-icon glyphicon glyphicon-ok bigger-130"></i>
                              </a>
                             <?php else: ?>
                               <a class="red" href="<?= base_url('admin/surat/pending_beasiswa/'.$data->id) ?>">
                                <i class="ace-icon glyphicon glyphicon-remove bigger-130"></i>
                              </a>
                             <?php endif ?>

                              <a class="red" href="<?= base_url('admin/surat/delete_beasiswa/'.$data->id) ?>">
                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                              </a>
                               <a class="green" target="_blank" title="download surat" href="<?= base_url('mahasiswa/surat/pdf_surat_beasiswa/'.$data->id) ?>">
                                <i class="ace-icon fa fa-download bigger-130"></i>
                              </a>
                            </div>
                          </td>
                        </tr>
                      <?php endforeach ?>
                      
                    </tbody>
                  </table>
                </p>
              </div>

            </div>
          </div>
        </div><!-- /.col -->
      </div>
    </div>
    </div>


    <!-- PAGE CONTENT ENDS -->
  </div><!-- /.col -->
</div><!-- /.row -->

<?php if ($this->session->flashdata('msg') == 'success'): ?>
  <script type="text/javascript">
    iziToast.success({
      timeout: 5000,
      icon: 'fa fa-check',
      title: 'Sukses',
      message: 'Berhasil Di Update!',
      // position: 'topCenter'
    });
  </script>
<?php endif ?>