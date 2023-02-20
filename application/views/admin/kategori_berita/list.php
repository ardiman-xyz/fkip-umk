<?= $this->session->flashdata('success'); ?>
  <div class="card">
    <h5 class="card-header"><?= $title; ?></h5>
    <div class="card-body">
        <a href="<?= base_url('admin/kategori_berita/tambah') ?>" class="btn btn-primary btn-sm mb-2">Tambah</a>

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>

        <table class="table table-hover table-sm">
            <thead  class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Slug Kategori</th>
                    <th scope="col">Urutan </th>
                    <th scope="col" width="15%" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $no = 1; foreach ($kategori as $row ) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->nama_kategori; ?></td>
                    <td><?= $row->slug_kategori_berita; ?></td>
                    <td><?= $row->urutan; ?></td>
                    <td>
                        <a href="<?= base_url('admin/kategori_berita/edit/'.$row->id_kategori_berita) ?>" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Edit kategori"><i class="glyphicon glyphicon-pencil"></i></a>
                        <a href="<?= base_url('admin/kategori_berita/hapus/'.$row->id_kategori_berita) ?>" class="btn btn-danger btn-xs tombol-hapus" data-toggle="tooltip" data-placement="top" title="Delete kategori"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

