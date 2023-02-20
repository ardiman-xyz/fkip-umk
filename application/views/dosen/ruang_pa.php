
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <span id="message"></span>
          <div class="row justify-content-md-center">
            <div class="col-md-12">

               <div class="alert alert-success">
                Silahkan berikan matakuliah, sks, dan komentar pada mahasiswa
              </div>

              <?php if ($this->session->flashdata('sukses')): ?>
                 <div class="alert alert-success">
                  <?= $this->session->flashdata('sukses'); ?>
                </div>
              <?php endif ?>


              <div class="card">
                <div class="card-header">
                  <h5 class="card-title m-0">Daftar mahasiswa bimbingan anda : </h5>
                </div>
                <div class="card-body">

                 <?= form_open('dosen/filter_penawaran', ['id' => 'form_filter', 'method' => 'GET']); ?>

                 <div class="row">
                   <div class="col-md-1">
                     Filter Data :
                   </div>
                   <div class="col-md-2">
                    <select name="thn_akademik" class="form-control" id="filter" required>
                      <option value="">--Pilih Thn AK--</option>
                      <?php foreach ($thn_akademik as $key => $thn): ?>
                        <option value="<?= $thn->thn_akademik ?>"><?= $thn->thn_akademik ?></option>
                      <?php endforeach ?>
                    </select>
                   </div>
                   <div class="col-md-2">
                    <select name="semester" class="form-control" id="semester" required>
                      <option value="">--Pilih Semester--</option>
                      <option value="genap">Genap</option>
                      <option value="ganjil">Ganjil</option>
                      option
                    </select>
                   </div>
                   <div class="col-md-1">
                     <button type="submit" class="btn btn-primary">Filter</button>
                   </div>
                 </div>

                 <?= form_close(); ?>
                  <hr>
                 
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">no</th>
                        <th class="text-center">Thn AK - Smt</th>
                        <th class="text-center">Nim</th>
                        <th class="text-center">Nama mahasiswa</th>
                        <th class="text-center">Dibuat</th>
                        <th class="text-center">Jml matkul</th>
                        <th class="text-center">Jml sks</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($data)): ?>
                        <?php foreach ($data as $key => $d): 
                          $jml_matakuliah = $this->penawaran->getDataMatakuliah($d->id); 
                          ?>
                            <tr>
                              <td class="text-center"><?= $key + 1; ?></td>
                              <td class="text-center"><?= $d->thn_akademik; ?> - <?= $d->semester ?></td>
                              <td class="text-center"><?= $d->nim ?></td>
                              <td><?= $d->nama ?></td>
                              <td class="text-center"><?= pengaturan_tgl($d->date) ?></td>
                              <td class="text-center">
                               <?= $jml_matakuliah ?>  
                               
                                </td>
                              <td class="text-center">
                                <?php if ($d->jml_sks === null): ?>
                                  0
                                <?php else: ?>
                                  <?= $d->jml_sks ?>
                                <?php endif ?>
                              </td>
                              <td class="text-center">
                                <?php if ($d->status === '0'): ?>
                                  <a href="<?= base_url('dosen/buat_penawaran_mhs/'.$d->id) ?>" class="btn btn-sm btn-primary" title="">Buat</a>
                                 <a href="<?= base_url('dosen/hapus_mhs_penawaran/'.$d->id) ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger" title="Hapus">Hapus</a>
                                <?php else: ?>
                                  <a href="<?= base_url('dosen/detail_penawaran/'.$d->nim) ?>" class="btn btn-sm btn-success" title="">Lihat</a>
                                  <a href="<?= base_url('dosen/ubah_penawaran_mhs/'.$d->nim) ?>" class="btn btn-sm btn-primary" title="">Ubah</a>
                                  <a href="<?= base_url('dosen/hapus_mhs_penawaran/'.$d->id) ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger" title="Hapus">Hapus</a>
                                <?php endif ?>
                              </td>
                            </tr>
                        <?php endforeach ?>

                      <?php endif ?>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
