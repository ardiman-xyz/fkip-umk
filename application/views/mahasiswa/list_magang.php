<div class="container">
    <div class="row justy-content-center">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <!-- PAGE CONTENT BEGINS -->
        <br>
          <div class="alert alert-warning">
            <strong>
              <i class="ace-icon fa fa-warning"></i>
              History : 
            </strong>
            <br />
          </div>
          <a href="<?= base_url('mahasiswa/magang/add_form') ?>" class="btn btn-primary btn-sm">Daftar PLP/Magang</a>

          <div class="table-responsive">
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center">NO</th>
                <th class="text-center">nim</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Prodi</th>
                <th class="text-center">Lokasi - Program</th>
                <th class="text-center">Tgl Daftar</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($data as $d): 
                $nama_prodi = $this->prodi->nama_jurusan($d->id_prodi);
                $nama_sekolah = $this->unit->getNamaSekolah($d->id_sekolah);
              ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $d->nim ?></td>
                  <td><?= $d->nama ?></td>
                  <td><?= $nama_prodi ?></td>
                  <td><?= $nama_sekolah ?> - <span class="badge badge-success"><?= $d->program ?></span></td>
                  <td><?= $d->tgl_insert ?></td>
                  <td>
                    <a href="<?= base_url('mahasiswa/magang/lihat_nilai/'.$d->nim.'/'.$d->program) ?>" title="Lihat Nilai"><i class="fa fa-folder-open"></i> Lihat nilai</a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
          </div>


      </div>
    </div>
  </div>