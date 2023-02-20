<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      List pengumuman
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="<?= base_url('admin/pengumuman') ?>">pengumuman</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data pengumuman</h3>
            </div>
            <div class="" style="margin-left: 10px">
               <a href="<?= base_url('admin/pengumuman/tambah') ?>" title="Detail" class="btn btn-success btn-flat btn-sm"><i class="fa fa-plus"></i> Tambah pengumuman</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table  id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th class="text-center">No</th>
                    <th class="text-center">Gambar</th>
                    <th class="text-center">Judul</th>
                    <th class="text-center"width="35%" class="text-center">Isi Pengumuman</th>
                    <th class="text-center">Penulis</th>
                    <th class="text-center">Jenis - status</th>
                    <th class="text-center" width="10%" class="text-center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                     <?php $no = 1; foreach ($pengumuman as $row ) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><img src="<?= base_url('assets/img/pengumuman/thumbs/'.$row->gambar)?>" class="img-responsive img-thumbnail" width="200"></td>
                <td><?= $row->judul ?></td>
                <td><?= character_limiter($row->isi_pengumuman, 150) ?>

                <button type="button" class="btn bg-primary btn-xs text-white btn-pill mb-3 mb-md-0" data-toggle="modal" data-target="#exampleModallarge<?= $row->id_pengumuman ?>">Selengkapnya</button>

                <div class="modal fade" id="exampleModallarge<?= $row->id_pengumuman ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLarge" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLarge<?= $row->id_pengumuman ?>">Selengkapnya pengumuman : <b><?= $row->judul ?></b></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <?= $row->isi_pengumuman ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                </div>
                
                </td>
                <td><?= $row->nama_user; ?></td>
                <td><?= $row->jenis_pengumuman; ?> - <?= $row->status; ?></td>
                <td>
                    <a href="<?= base_url('admin/pengumuman/edit/'.$row->id_pengumuman) ?>" class="btn btn-flat btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Edit pengumuman"><i class="glyphicon glyphicon-pencil"></i></a>
                    <a href="<?= base_url('admin/pengumuman/hapus/'.$row->id_pengumuman) ?>" onclick="return confirm('Data akan di hapus ?')" class="btn btn-flat btn-danger btn-xs tombol-hapus" data-toggle="tooltip" data-placement="top" title="Delete pengumuman"><i class="glyphicon glyphicon-trash"></i></a>
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
