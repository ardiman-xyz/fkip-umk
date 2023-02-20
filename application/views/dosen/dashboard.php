

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <span id="message"></span>
        <?= $this->session->flashdata("sukses") ?>
        <div class="row">
          <div class="col-lg-3">
            <div class="card">
              <div class="card-body">
                <div class="card-body box-profile">
                <div class="text-center">
                  <?php if ($data->foto_dosen != null): ?>
                    <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url('assets/img/dosen/'.$data->foto_dosen) ?>"
                       alt="User profile picture">
                  <?php else: ?>
                    <?php if ($data->jenis_kelamin == 'L'): ?>
                       <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url('assets/img/') ?>men.jpg"
                       alt="User profile picture">
                       <?php else: ?>
                        <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url('assets/img/') ?>muslim_women.jpg"
                       alt="User profile picture">
                    <?php endif ?>
                  <?php endif ?>
                </div>
              </div>

             

                <h3 class="profile-username text-center"><?= $data->nama_dosen ?></h3>
                <p class="text-muted text-center">Dosen FKIP</p>
                 <a href="<?= base_url('dosen/update_photo') ?>" class="btn btn-primary btn-block"><b>Update Photo</b></a>
              </div>
            </div>
            <div class="mb-3">
              Download contoh format profil di <a href="<?= base_url('assets/upload/') ?>ex-pofil_dosen.docx">sini</a>
            </div>            
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-9">
          <form class="form-horizontal" action="<?= base_url('dosen/update_dosen') ?>" method="post" id="formDosen">
            <div class="card">
                <div class="card-header">
                  <h5 class="card-title m-0">Data Diri : </h5>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fa fa-remove"></i></button>
                  </div>
                </div>
                <div class="card-body">
                    <div class="card-body">
                    <div class="form-group row">
                        <label for="profil" class="col-sm-2 col-form-label">Profil Dosen</label>
                        <div class="col-md-10 col-xs-12">
                          <textarea name="profil" id="profil" class="textarea" placeholder="Ex: "  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>
                             <?php if ($info_dsn->profil_dosen != ""): ?>
                              <?= $info_dsn->profil_dosen ?>
                              <?php else: ?>
                                -
                            <?php endif ?>
                          </textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="nidn" class="col-sm-2 col-form-label">NIDN</label>
                        <div class="col-sm-3 col-xs-12">
                          <input type="text" class="form-control" id="nidn" name="nidn" value="<?= $data->NIDN ?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Dosen</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="nama" name="nama" value="<?= $data->nama_dosen ?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Prodi</label>
                        <div class="col-sm-10">
                          <select name="id_prodi" class="form-control" required>
                            <option value="">--Pilih--</option>
                            <?php foreach ($prodi as $p): ?>
                              <option value="<?= $p->id_prodi ?>" <?= $p->id_prodi === $data->id_prodi ? 'selected': '' ?>><?= $p->nama_prodi ?></option>
                            <?php endforeach ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                        <div class="col-sm-3 col-xs-12">
                          <input type="text" class="form-control" id="agama" name="agama" value="<?= $data->agama ?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="email" name="email" value="<?= $data->email_dosen ?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="telepon" class="col-sm-2 col-form-label">Telepon / Hp</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $data->telepon_dosen ?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <textarea type="text" class="form-control" id="alamat" name="alamat" required><?= $data->alamat_dosen ?></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-3">
                          <select class="form-control" name="jenis_kelamin" required>
                            <option value="">--Pilih--</option>
                            <option value="L" <?php if($data->jenis_kelamin == 'L'){echo "selected";} ?>>Laki-laki</option>
                            <option value="P" <?php if($data->jenis_kelamin == 'P'){echo "selected";} ?>>Perempuan</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="ttl" class="col-sm-2 col-form-label">Tgl Lahir</label>
                        <div class="col-sm-4">
                          <input type="date" class="form-control" id="ttl" name="ttl" value="<?= $data->ttl_dosen ?>" required>
                        </div>
                      </div>

                    </div>
                </div>
              </div>

              <div class="alert alert-default">
                Gunakan tanda <strong>(-)</strong> Untuk mengosongkan inputan
                </div>

              <div class="card">
                <div class="card-header">
                  <h5 class="card-title m-0">Informasi Dosen : </h5>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fa fa-remove"></i></button>
                  </div>
                </div>
                <div class="card-body">
                <form class="form-horizontal">
                  <div class="form-group row">
                    <label for="penelitian" class="col-md-2 col-form-label">Penelitian</label>
                    <div class="col-md-10 col-xs-12">
                      <textarea name="penelitian" id="penelitian" class="textarea" placeholder="Ex: "  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>
                        <?php if ($info_dsn->penelitian != null): ?>
                              <?= $info_dsn->penelitian ?>
                              <?php else: ?>
                                -
                            <?php endif ?>
                      </textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="publikasi" class="col-md-2 col-form-label">Publikasi</label>
                    <div class="col-md-10 col-xs-12">
                      <textarea name="publikasi" id="publikasi" class="textarea" placeholder="Ex: "  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?= $info_dsn->publikasi ?></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                  <label for="pengajaran" class="col-md-2 col-form-label">Pengajaran</label>
                    <div class="col-md-10 col-xs-12">
                      <textarea name="pengajaran" id="pengajaran" class="textarea" placeholder="Ex: "  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?= $info_dsn->pengajaran ?></textarea>
                    </div>
                  </div>
                  
                  <hr>
                  <button type="submit" class="btn btn-primary float-right" id="update">
                  Update profil
                </button>
                </div>
              </div>
            </form>

            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">RIP Dosen : </h5>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
                
              </div>
              <div class="card-body">
                <span id="message"></span>
              <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?= base_url('dosen/update_rip') ?>" id="form-rip">
                <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Upload Rip</label>
                        <input type="file" name="rip" class="form-control" required> 
                        <p style="color: red; font-style: italic;">Silahkan upload RIP anda dengan ekstensi pdf..</p>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-rip" style="margin-top: 31px">Update Rip</button>
                      </div>
                    </div>
                  </div>
              </form>
                  <hr>
                  <?php if (!empty($info_dsn->rip)): ?>
                    <iframe width="100%" height="700px" src="<?= base_url('assets/img/dosen/rip_dosen/'.$info_dsn->rip) ?>" ></iframe> 
                  <?php else: ?>
                    <div class="text-center">
                      --Belum ada rip--
                    </div>
                  <?php endif ?>

          </div>
          <!-- /.col-md-6 -->
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
