
<div class="row">
  <div class="col-xs-12">

        <div class="clearfix">
          <div class="pull-right tableTools-container"></div>
        </div>

        <div class="table-header">
          <i class="fa fa-folder"></i> Document
        </div>
        <br>

        <a class="btn btn-sm btn-success" href="<?= base_url('unit/form_add_document') ?>"><i class="fa fa-plus"></i> Tambah Dokumen</a>
         <br>
        <?= $this->session->flashdata('success') ?>
      <hr>
         <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th width="60" class="center">No</th>  
                <th class="center">file</th>
                <th class="center">Kategori</th>
                <th class="center">Status</th>
                <th class="center" width="200">Aksi</th>
              </tr> 
            </thead>
            <tbody>
              <?php $no = 1; foreach ($document as $data): 
                $nama_kategory = $this->unit->getNamaDocument($data->id_document_category);
              ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><a href="<?= base_url('assets/upload/unit_document/'.$data->file) ?>"><?= $data->judul ?></a></td>
                  <td><?= $nama_kategory ?></td>
                  <td align="center">
                    <?php if ($data->status =='Y'): ?>
                      <span class="badge badge-success">Ya</span>
                    <?php else: ?>
                      <span class="badge badge-danger">No</span>
                    <?php endif ?>
                  </td>
                  <td>
                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                    <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-circle-o-notch"></i></a>
                     <a href="#" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>

    <!-- PAGE CONTENT ENDS -->
  </div><!-- /.col -->
</div><!-- /.row -->

<script type="text/javascript">
  $(document).ready(function(){

    $('.btn-delete').on('click', function(e){
      e.preventDefault();
      const href = $(this).attr('href');

          swal({
            title: 'Apakah anda yakin ?',
            text: 'ingin menghapus user ini!',
            type: 'warning',
            confirmButtonColor: '#d9534f',
            confirmButtonClass: 'btn-danger',
            cancelButtonText: 'No, Cancel',
            showCancelButton: true,
          }).then((result) => {
            if (result.value) {
              document.location.href = href;
            }
          }); 
    });

      $('.btn-nonAktif').on('click', function(e){

          e.preventDefault();
          const href = $(this).attr('href');

          swal({
            title: 'Apakah anda yakin ?',
            text: 'ingin mengNonAktifkan user ini!',
            type: 'warning',
            confirmButtonColor: '#d9534f',
            confirmButtonClass: 'btn-danger',
            cancelButtonText: 'No, Cancel',
            showCancelButton: true,
          }).then((result) => {
            if (result.value) {
              document.location.href = href;
            }
          }); 
      });

       $('#btn-Aktif').click(function(e){

          e.preventDefault();
          const href = $(this).attr('href');

          swal({
            title: 'Apakah anda yakin ?',
            text: 'ingin mengAktifkan user ini!',
            type: 'warning',
            confirmButtonColor: '#d9534f',
            confirmButtonClass: 'btn-danger',
            cancelButtonText: 'No, Cancel',
            showCancelButton: true,
          }).then((result) => {
            if (result.value) {
              document.location.href = href;
            }
          });

      });

  });
</script>

<?php if ($this->session->flashdata('msg') == 'success'): ?>
  <script type="text/javascript">
        iziToast.success({
          timeout: 5000,
          icon: 'fa fa-check',
          title: 'Sukses',
          message: 'User berhasil di nonAktifkan!',
          // position: 'topCenter'
        });
  </script>
  <?php elseif($this->session->flashdata('message') == 'success'): ?>
     <script type="text/javascript">
        iziToast.success({
          timeout: 5000,
          icon: 'fa fa-check',
          title: 'Sukses',
          message: 'User berhasil di Aktifkan!',
          // position: 'topCenter'
        });
  </script>
  <?php elseif($this->session->flashdata('msg') == 'sukses'): ?>
     <script type="text/javascript">
        iziToast.success({
          timeout: 5000,
          icon: 'fa fa-check',
          title: 'Sukses',
          message: 'User berhasil di Hapus!',
          // position: 'topCenter'
        });
  </script>
<?php endif ?>