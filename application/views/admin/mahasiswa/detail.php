<style type="text/css" media="screen">
  .post{
    margin: 10px
  }
  .my-page {
      margin: 20px 0 10px 0;
      font-size: 22px;
  }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Detail Mahasiswa
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="<?= base_url('admin/mahasiswa') ?>">Mahasiswa</a></li>
      <li><a href="<?= base_url('admin/mahasiswa/detail') ?>">Detail Mahasiswa</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <?php if (!empty($mahasiswa->image )): ?>
                <img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/img/mahasiswa/'.$mahasiswa->image) ?>" alt="User profile picture">
              <?php else: ?>
                 <?php if ($mahasiswa->jenis_kelamin === 'L'): ?>
                   <img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/img/') ?>men.jpg" alt="User profile picture">
                  <?php else: ?>
                    <img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/img/') ?>muslim_women.jpg" alt="User profile picture">
                 <?php endif ?>
              <?php endif ?>
              <h3 class="profile-username text-center"><?= $mahasiswa->nama_lengkap ?></h3>
              <p class="text-muted text-center">mahasiswa</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tentang <?= $mahasiswa->nama_lengkap ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-mobile-phone margin-r-5"></i> Mobile phone</strong>

              <p class="text-muted">
                <?= $mahasiswa->no_wa ?>
              </p>

              <hr>

              <strong><i class="fa fa-clock-o margin-r-5"></i> Join date</strong>

              <p class="text-muted"><?= pengaturan_tgl($mahasiswa->join) ?></p>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Judul Penelitan</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">
              <center>
                <?php if (!empty($info1->judul)): ?>
                    <blockquote>
                    <p>" <?= $info1->judul ?> "</p>
                    <small><?= $mahasiswa->nama_lengkap ?> ~ <?= $mahasiswa->nim ?> </small>
                  </blockquote>
                <?php else: ?>
                  -- <em>Belum ada judul</em> --
                <?php endif ?>
              </center>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.nav-tabs-custom -->

          <h2 class="my-page">Informasi Bimbingan</h2>

          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#saat_ini" data-toggle="tab" aria-expanded="true">Nama Pembimbing</a></li>
              <li class=""><a href="#history" data-toggle="tab" aria-expanded="false">History Ujian</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="saat_ini">
                  
                  <table class="table table-hover table-bordered">
                    <thead>
                      <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Pembimbing I</th>
                        <th class="text-center">Pembimbing II</th>
                        <th class="text-center">Date created</th>
                        <!--<th class="text-center">Status</th>-->
                      </tr>
                    </thead>
                    <tbody>
                      <?php if ($pemb1 != ""): ?>
                        <tr>
                          <td>1</td>
                          <td><?= $pemb1 ?></td>
                          <td><?= $pemb2 ?></td>
                          <!--<td class="text-center"><span class="label label-success"><?= $info1->tgl_insert ?></span></td>-->
                          <!--<td> <?= ($info1->status === "1" ? '<span class="label label-success">Selesai</span>' : '<span class="label label-danger">Belum</span>') ?></td>-->
                        </tr>
                      <?php else: ?>
                        <tr>
                          <td colspan="4" class="text-center">-- Tidak ada data --</td>
                        </tr>
                      <?php endif ?>
                    </tbody>
                  </table>

                </div>

              <div class="tab-pane" id="history">
                  <table class="table table-hover table-bordered">
                    <thead>
                      <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Jenis UJian</th>
                        <th class="text-center">Tgl. Mengajukan</th>
                        <th class="text-center">Data persyaratan</th>
                        <th class="text-center">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($info2)): ?>
                        <?php foreach ($info2 as $key => $value): ?>
                        <tr>
                          <td><?= $key+1 ?></td>
                          <td class="text-center">
                            <?php if ($value->nama_ujian === 'proposal'): ?>
                              <span class="label label-success"><?= $value->nama_ujian ?></span>
                            <?php elseif($value->nama_ujian === 'hasil'): ?>
                              <span class="label label-warning"><?= $value->nama_ujian ?></span>
                            <?php else: ?>
                              <span class="label label-danger"><?= $value->nama_ujian ?></span>
                            <?php endif ?>
                          </td>
                          <td class="text-center"><?= pengaturan_tgl($value->created) ?></td>
                          <td class="text-center">
                            <a href="#" title="Data persyaratan">Data persyaratan</a>
                          </td>
                          <td class="text-center">
                            <?= ($value->status === "1" ? '<span class="label label-success">Selesai</span>' : '<span class="label label-danger">Belum</span>') ?>
                          </td>
                        </tr>
                      <?php endforeach ?>
                      <?php else: ?>
                        <tr>
                          <td colspan="5" class="text-center">--Tidak ada data--</td>
                        </tr>
                      <?php endif ?>
                    </tbody>
                  </table>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
</div>
