
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      List Berita
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="<?= base_url('admin/berita') ?>">Berita</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Berita</h3>
            </div>
            <div class="" style="margin-left: 10px">
               <a href="<?= base_url('admin/berita/tambah') ?>" class="btn btn-primary btn-sm mb-2 btn-flat"> Tambah</a>
               <button type="button" title="Detail" class="btn bg-purple btn-flat margin btn-sm" data-toggle="modal" data-target="#modal-filter-Berita"><i class="fa fa-filter"></i> Filter Data</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th width="35%" class="text-center">Isi Berita</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Jenis - status</th>
                    <th width="10%" class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; foreach ($berita as $row ) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><img src="<?= base_url('assets/img/berita/thumbs/'.$row->gambar)?>" class="img-responsive img-thumbnail" width="200"></td>
                        <td><?= $row->judul ?></td>
                        <td><?= character_limiter($row->isi, 150) ?>
                            <button type="button" class="btn bg-primary btn-xs text-white btn-pill mb-3 mb-md-0" data-toggle="modal" data-target="#exampleModallarge<?= $row->id_berita ?>">Selengkapnya</button>
            
                            <div class="modal fade" id="exampleModallarge<?= $row->id_berita ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLarge" aria-hidden="true" style="z-index: 999999">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLarge<?= $row->id_berita ?>">Selengkapnya Berita : <b><?= $row->judul ?></b></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <?= $row->isi ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        </td>
                        <td><?= $row->nama_kategori; ?></td>
                        <td><?= $row->nama_user; ?></td>
                        <td><?= $row->jenis_berita; ?> - <?= $row->status_berita; ?></td>
                        <td>
                            <a href="<?= base_url('admin/berita/edit/'.$row->id_berita) ?>" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Edit Berita"><i class="glyphicon glyphicon-pencil"></i></a>
                            <a href="<?= base_url('admin/berita/hapus/'.$row->id_berita) ?>" class="btn btn-danger btn-xs tombol-hapus" data-toggle="tooltip" data-placement="top" title="Delete Berita"><i class="glyphicon glyphicon-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>

      </div>
    </div>
  </section>
</div>




