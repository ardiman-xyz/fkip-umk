<section class="ftco-section bg-light" style="color: black">
  <div class="container">
    <div class="row justify-content-center" >
      <div class="col-md-11 col-lg-11 ftco-animate">
        <div class="blog-entry "  style="border: 1px skyblue solid">
          <div class="text bg-white p-4">

              <?= $this->session->flashdata('success'); ?>
              <a href="<?= base_url('surat/tambah')  ?>" class="btn btn-success" style="border-radius: 1px; margin-bottom: 5px;"><i class="fa fa-envelope"></i>  Buat Surat</a>
              <div class="alert alert-info"><i class="fa fa-bullhorn"></i><strong> Silahkan klik icon ( <i class="fa fa-download"></i> ) untuk mendownload surat yang telah di setujui !!</strong>
              </div>

              <img src="<?= base_url('assets/img/') ?>surat.png" width="50px" class="img-circle"><h5>Surat Izin penelitian</h5>
                <p></p>
              <table class="table table-striped table-sm">
                <thead class="thead-dark">
              
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama</th>
                      <th scope="col">NIM</th>
                      <th scope="col">Semester</th>
                      <th scope="col">Prodi</th>
                      <th scope="col">Judul Penelitian</th>
                      <th scope="col">Status</th>
                      <th scope="col" align="center">Download</th>
                    </tr>
                    
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  
                  <?php if (!empty($data)): ?>
                    <?php foreach ($data as $dt): 
                     $nama_prodi   = $this->prodi->nama_jurusan($dt->prodi);
                    ?>
                     <tr>
                       <td><?= $no++ ?></td>
                       <td><?= $dt->nama ?></td>
                       <td><?= $dt->nim ?></td>
                       <td><?= $dt->semester ?></td>
                       <td><?= $nama_prodi ?></td>
                       <td><?= $dt->judul_penelitian ?></td>
                       <td>
                        <?php if($dt->status == 'pending') { ?>
                           <p><span class="badge badge-danger">Pending</span></p>
                         <?php } else if($dt->status == 'diterima') { ?>
                           <p><span class="badge badge-primary">Diterima</span></p>
                         <?php } ?>
                        </td>
                        <td  align="center">
                          <?php if($dt->status == 'pending') { ?>
                          
                         <?php } else if($dt->status == 'diterima') { ?>
                           <a target="_blank" href="<?= base_url('surat/pdf/') . $dt->id  ?>"  style="border-radius: 1px"><i class="fa fa-download" title="download"></i></a>
                         <?php } ?>
                        </td>
                     </tr>
                   <?php endforeach ?>
                   <?php else: ?>
                    <tr>
                      <td colspan="8" align="center"><h6>Tidak ada surat</h6></td>
                    </tr>
                  <?php endif ?>

                </tbody>
                </table> 
                <hr>

                <img src="<?= base_url('assets/img/') ?>surat1.png" width="50px" class="img-circle"><h5>Surat Keterangan Aktif Kuliah</h5>
                <p></p>
              <table class="table table-striped table-sm">
                <thead class="thead-dark">
              
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama</th>
                      <th scope="col">NIM</th>
                      <th scope="col">Semester</th>
                      <th scope="col">Prodi</th>
                      <th scope="col">Status</th>
                      <th scope="col" align="center">Download</th>
                    </tr>
                    
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php if (!empty($data_surat_aktif)): ?>
                    <?php foreach ($data_surat_aktif as $data): 
                    $nama_prodi   = $this->prodi->nama_jurusan($data->prodi);
                    ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $data->nama ?></td>
                      <td><?= $data->nim ?></td>
                      <td><?= $data->semester ?></td>
                      <td><?= $nama_prodi ?></td>
                     <td>
                        <?php if($data->status == 'pending') { ?>
                           <p><span class="badge badge-danger">Pending</span></p>
                         <?php } else if($data->status == 'diterima') { ?>
                           <p><span class="badge badge-primary">Diterima</span></p>
                         <?php } ?>
                        </td>
                        <td  align="center">
                          <?php if($data->status == 'pending') { ?>
                          
                         <?php } else if($data->status == 'diterima') { ?>
                           <a target="_blank" href="<?= base_url('surat/pdf_surat_aktif/') . $data->id_aktif_kuliah  ?>"  style="border-radius: 1px"><i class="fa fa-download" title="download"></i></a>
                         <?php } ?>
                        </td>
                    </tr>
                  <?php endforeach ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="8" align="center"><h6>Tidak ada surat</h6></td>
                    </tr>
                  <?php endif ?>
                </tbody>
                </table> 
                <hr>

                 <img src="<?= base_url('assets/img/') ?>surat2.png" width="50px" class="img-circle"><h5>Surat Cuti</h5>
                <p></p>
              <table class="table table-striped table-sm">
                <thead class="thead-dark">
              
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama</th>
                      <th scope="col">NIM</th>
                      <th scope="col">Semester</th>
                      <th scope="col">Prodi</th>
                      <th scope="col">alasan cuti</th>
                      <th scope="col">Status</th>
                      <th scope="col" align="center">Download</th>
                    </tr>
                    
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php if (!empty($data_surat_cuti)): ?>
                  <?php foreach ($data_surat_cuti as $data): 
                    $nama_prodi   = $this->prodi->nama_jurusan($data->prodi);
                    ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $data->nama ?></td>
                      <td><?= $data->nim ?></td>
                      <td><?= $data->smt ?> (<?= $data->semester ?>)</td>
                      <td><?= $nama_prodi ?></td>
                      <td><?= $data->alasan ?></td>
                      <td>
                        <?php if($data->status == 'pending') { ?>
                           <p><span class="badge badge-danger">Pending</span></p>
                         <?php } else if($data->status == 'diterima') { ?>
                           <p><span class="badge badge-primary">Diterima</span></p>
                         <?php } ?>
                        </td>
                        <td  align="center">
                          <?php if($data->status == 'pending') { ?>
                          
                         <?php } else if($data->status == 'diterima') { ?>
                           <a target="_blank" href="<?= base_url('surat/pdf_surat_cuti/') . $data->id_cuti  ?>"  style="border-radius: 1px"><i class="fa fa-download" title="download"></i></a>
                         <?php } ?>
                        </td>
                    </tr>
                  <?php endforeach ?>
                  <?php else: ?>
                     <tr>
                      <td colspan="8" align="center"><h6>Tidak ada surat</h6></td>
                    </tr>
                  <?php endif ?>
                </tbody>
                </table> 

                
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
