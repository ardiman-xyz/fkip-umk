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
      Detail Dosen
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="<?= base_url('admin/dosen') ?>">Dosen</a></li>
      <li><a href="<?= base_url('admin/dosen/detail') ?>">Detail Dosen</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <?php if (!empty($dosen->foto_dosen )): ?>
                <img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/img/dosen/'.$dosen->foto_dosen) ?>" alt="User profile picture">
              <?php else: ?>
                 <?php if ($dosen->jenis_kelamin === 'L'): ?>
                   <img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/img/') ?>men.jpg" alt="User profile picture">
                  <?php else: ?>
                    <img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/img/') ?>muslim_women.jpg" alt="User profile picture">
                 <?php endif ?>
              <?php endif ?>
              <h3 class="profile-username text-center"><?= $dosen->nama_dosen ?></h3>
              <p class="text-muted text-center">Dosen</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#pengajaran" data-toggle="tab" aria-expanded="true">Pengajaran</a></li>
              <li class=""><a href="#penelitian" data-toggle="tab" aria-expanded="false">Penelitian</a></li>
              <li class=""><a href="#publikasi" data-toggle="tab" aria-expanded="false">Publikasi</a></li>
              <li class=""><a href="#rip" data-toggle="tab" aria-expanded="false">Rip</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="pengajaran">
                <div class="post">
                  <?php if (!empty($info_dosen->pengajaran)): ?>
                    <?= $info_dosen->pengajaran ?>
                  <?php else: ?>
                    <center><em>Belum ada data</em></center>
                  <?php endif ?>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="penelitian">
                <div class="post">
                   <?php if (!empty($info_dosen->penelitian)): ?>
                    <?= $info_dosen->penelitian ?>
                  <?php else: ?>
                    <center><em>Belum ada data</em></center>
                  <?php endif ?>
                </div>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="publikasi">
                 <div class="post">
                   <?php if (!empty($info_dosen->publikasi)): ?>
                    <?= $info_dosen->publikasi ?>
                  <?php else: ?>
                    <center><em>Belum ada data</em></center>
                  <?php endif ?>
                 </div> 
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="rip">
                 <div class="post">
                   <?php if (!empty($info_dosen->rip)): ?>
                    <a target="_blank" href="<?= base_url('assets/img/dosen/rip_dosen/'.$info_dosen->rip) ?>" title=""><?= $info_dosen->rip ?></a>
                  <?php else: ?>
                    <center><em>Belum ada data</em></center>
                  <?php endif ?>
                 </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->

          <h2 class="my-page">Mahasiswa Bimbingan <span class="label label-primary"><?= count($jumlahMahasiswaBimbingan) ?> Orang</span></h2>

          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#saat_ini" data-toggle="tab" aria-expanded="true">Semua bimbingan</a></li>
              <li class=""><a href="#history" data-toggle="tab" aria-expanded="false">History</a></li>
            </ul>
            <div class="tab-content">
                 <a href="<?= base_url('admin/dosen/cetak_bimbingan/'.$id_dosen) ?>" target="_blank" class="btn btn-primary btn-sm btn-flat">Cetak semua bimbingan</a>
                <hr>
              <div class="tab-pane active" id="saat_ini">
                  
                 <table class="table table-hover table-bordered" id="example1">
                    <thead>
                      <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">NIM</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center" width="250px">Judul Penelitian</th>
                        <th class="text-center">Jurusan</th>
                        <th class="text-center">Status Lulus</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($jumlahMahasiswaBimbingan)): ?>
                        <?php foreach ($jumlahMahasiswaBimbingan as $key => $mhs): 
                          $status = $this->dosen->getStatusUjianMhs($mhs->nim)['status'];
                          ?>
                          <tr>
                            <td><?= $key+1 ?></td>
                            <td class="text-center"><?= $mhs->nim ?></td>
                            <td><a href="#" onclick="cari_mahasiswa(<?= $mhs->nim ?>)" data-toggle="modal" data-target="#modal-mahasiswa" title="<?= $mhs->nama_mhs ?>"><?= $mhs->nama_mhs ?></a></td>
                            <td><?= $mhs->judul ?></td>
                            <td><?= $mhs->nama_prodi ?></td>
                            <td><?= $status ?></td>
                          </tr>
                        <?php endforeach ?>
                      <?php else: ?>
                        <tr>
                          <td colspan="5" align="center"><em>Tidak ada data</em></td>
                        </tr>
                      <?php endif ?>
                    </tbody>
                  </table>

                </div>

              <div class="tab-pane" id="history">
                 <div class="post">
                   history
                 </div> 
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
