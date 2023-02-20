<div class="row">
  <div class="col-xs-12">

    <div class="clearfix">
      <div class="pull-right tableTools-container"></div>
    </div>

      <div class="table-header">
        Daftar Pimpinan
      </div>
       

        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th width="30px">No</th>
              <th width="150px" align="center">Foto</th>
              <th>Nama</th>
              <th>Jabatan</th>
              <th>Email</th>
              <th>P/L</th>
              <th>prodi</th>
              <th width="150" class="center">Aksi</th>
            </tr> 
          </thead>
          <tbody>
            <?php $no = 1; foreach ($pimpinan as $data): 
              $nama_prodi = $this->prodi->nama_jurusan($data->id_prodi);
            ?>
              <tr>
                <td><?= $no++ ?></td>
                <td>
                  <?php if (!empty($data->foto)): ?>
                    <img class="editable img-responsive" alt="foto" src="<?= base_url('assets/img/profil/pimpinan/'.$data->foto) ?>"/>
                  <?php else: ?>
                    <?php if ($data->jenis_kelamin == 'L'): ?>
                       <img class="editable img-responsive" alt="foto" src="<?= base_url('assets/img/profil/pimpinan/') ?>men.jpg" width="80"/>
                       <?php else: ?>
                         <img class="img-responsive img-thumbnail" alt="foto" src="<?= base_url('assets/img/profil/pimpinan/') ?>muslim_women.jpg" width="80"/>
                    <?php endif ?>
                  <?php endif ?>
                </td>
                <td><?= $data->nama ?></td>
                <td><?= $data->jabatan ?></td>
                <td><?= $data->email ?></td>
                <td><?= $data->jenis_kelamin ?></td>
                <td>
                  <?php if ($data->id_prodi == 0): ?>
                    -
                  <?php else: ?>
                    <?= $nama_prodi ?>
                  <?php endif ?>
                </td>
                <td align="center">
                  <a href="#" class="btn btn-sm btn-info">Edit</a>
                  <a href="#" class="btn btn-sm btn-danger">Delete</a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
    <!-- PAGE CONTENT ENDS -->
  </div><!-- /.col -->
</div><!-- /.row -->

<?php if ($this->session->flashdata('msg') == 'danger'): ?>
  <script type="text/javascript">
    iziToast.error({
      timeout: 5000,
      icon: 'fa fa-check',
      title: 'Sukses',
      message: 'Data Berhasil Di Hapus!',
      // position: 'topCenter'
    });
  </script>
<?php endif ?>