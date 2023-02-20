<?= $this->session->flashdata('success'); ?>
  <div class="card">
    <h5 class="card-header"><?= $title; ?></h5>
    <div class="card-body">
        <a href="<?= base_url('admin/galeri/tambah') ?>" class="btn btn-primary btn-sm mb-2"> Tambah</a>

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>

        <table class="table table-hover table-sm" id="dataTable">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">foto</th>
                    <th scope="col">Judul foto </th>
                    <th scope="col">Posisi</th>
                    <th scope="col">Status</th>
                    <th scope="col" width="15%" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>

            <?php $no = 1; foreach ($foto as $row ) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><img src="<?= base_url('assets/img/galeri/'.$row->foto)?>" class="img-responsive img-thumbnail" width="200"></td>
                    <td><?= $row->judul_foto; ?></td>
                    <td><?= $row->posisi_foto; ?></td>
                    <td><?= $row->status; ?></td>
                    <td>
                        <a href="<?= base_url('admin/galeri/ubah/'.$row->id_galeri) ?>" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Ubah foto"><i class="glyphicon glyphicon-pencil"></i></a>
                        <a href="<?= base_url('admin/galeri/hapus/'.$row->id_galeri) ?>" class="btn btn-danger btn-xs tombol-hapus" data-toggle="tooltip" data-placement="top" title="Hapus foto"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach ?>
               
            </tbody>
        </table>
    </div>
</div>

