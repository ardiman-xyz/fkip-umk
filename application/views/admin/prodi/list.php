<?= $this->session->flashdata('success'); ?>
  <div class="card">
    <h5 class="card-header"><?= $title; ?></h5>
    <div class="card-body">
        <a href="<?= base_url('admin/prodi/tambah') ?>" class="btn btn-primary btn-sm mb-2"> Tambah</a>

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>

        <table class="table table-hover table-striped table-sm" id="dataTable">
            <thead class="thead-dark ">
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Kode Prodi</th>
                  <th scope="col">Nama Program Studi</th>
                  <th scope="col">Status</th>
                  <th scope="col">Jenjang</th>
                  <th scope="col">Aksi</th>
                </tr>
                
            </thead>
            <tbody>
            <?php $no = 1; foreach ($prodi as $prodi): ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $prodi->kode_prodi; ?></td>
                  <td><?= $prodi->nama_prodi; ?></td>
                  <td><?= $prodi->status; ?></td>
                  <td><?= $prodi->jenjang; ?></td>
                  <td>
                      <a href="<?= base_url('admin/prodi/edit/'.$prodi->id_prodi) ?>" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Edit prodi"><i class="fas fa-pencil-alt"></i></a>
                        <a href="<?= base_url('admin/prodi/hapus/'.$prodi->id_prodi) ?>" class="btn btn-danger btn-xs tombol-hapus" data-toggle="tooltip" data-placement="top" title="Delete prodi"><i class="far fa-trash-alt"></i></a>
                  </td>
                </tr>
            <?php endforeach ?>
               
            </tbody>
        </table>
    </div>
</div>

