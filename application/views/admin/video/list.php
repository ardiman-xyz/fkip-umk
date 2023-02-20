<?= $this->session->flashdata('success'); ?>
  <div class="card">
    <h5 class="card-header"><?= $title; ?></h5>
    <div class="card-body">
        <a href="<?= base_url('admin/video/tambah') ?>" class="btn btn-primary btn-sm mb-2">Tambah</a>

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>

        <table class="table table-hover" id="example1">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">video</th>
                    <th scope="col">Judul</th>
                    <th scope="col">posisi</th>
                    <th scope="col">keterangan</th>
                    <th scope="col">status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>

                <?php $no = 1; foreach($video as $v) : ?>

                <tr>
                    <td><?= $no++; ?></td>
                    <td><iframe width="200" height="113" src="https://www.youtube.com/embed/<?= $v->video ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>
                    <td><?= $v->judul ?></td>
                    <td><?= $v->posisi; ?></td>
                    <td><?= $v->keterangan; ?></td>
                    <td><?= $v->status; ?></td>
                    <td>
                        <a href="<?= base_url('admin/video/edit/'.$v->id_video) ?>" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Edit video"><i class="glyphicon glyphicon-pencil"></i></a>
                        <a href="<?= base_url('admin/video/hapus/'.$v->id_video) ?>" class="btn btn-danger btn-xs tombol-hapus" data-toggle="tooltip" data-placement="top" title="Delete video"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>

                <?php endforeach ?>
               
            </tbody>
        </table>
    </div>
</div>

