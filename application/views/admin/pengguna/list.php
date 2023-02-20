<div class="row">
  <div class="col-xs-12">

    <div class="clearfix">
      <div class="pull-right tableTools-container"></div>
    </div>

      <div class="table-header">
        Data Mahasiswa
      </div>
       

        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th width="30px">No</th>
              <th width="100px" align="center">Foto</th>
              <th>Nama</th>
              <th>Nim</th>
              <th>Jenis Kelamin</th>
              <th>Aksi</th>
            </tr> 
          </thead>
          <tbody>
            <?php $no = 1; foreach ($pengguna as $data): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td align="center">
                  <?php if($data->image == null) : ?>
                    <p style="color: red; font-style: italic;">Belum Ada foto</p>
                    <?php else: ?>
                      <img src="<?= base_url('assets/img/profile_pengguna/'.$data->image)?>" class="img-responsive img-thumbnail" width="50">
                    <?php endif ?>
                </td>
                <td><?= $data->nama_lengkap ?></td>
                <td><?= $data->nim ?></td>
                <td><?= $data->jenis_kelamin == 'L' ? "Laki-laki" : "Perempuan" ?></td>
                <td>
                   <a class="blue" href="<?= base_url('admin/pengguna/reset_password/'.$data->nim) ?>">
                      <i class="ace-icon glyphicon glyphicon-repeat bigger-130" title="Reset Password"></i>
                    </a>
                    <a class="red" href="<?= base_url('admin/pengguna/delete/'.$data->nim) ?>">
                      <i class="ace-icon fa fa-trash-o bigger-130" title="Hapus Mahasiswa"></i>
                    </a>
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