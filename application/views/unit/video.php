
<div class="row">
  <div class="col-xs-12">

        <div class="clearfix">
          <div class="pull-right tableTools-container"></div>
        </div>

        <div class="table-header">
          <i class="fa fa-video-camera"></i> video
        </div>
        <br>

        <a class="btn btn-sm btn-success" href="<?= base_url('unit/form_add_video') ?>"><i class="fa fa-plus"></i> Tambah video</a>
         <br>
        <?= $this->session->flashdata('success') ?>
      <hr>
         <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th width="60" class="center">No</th>  
                <th class="center">Video</th>
                <th class="center">Judul</th>
                <th class="center">Tgl Pelaksanaan</th>
                <th class="center" width="200">Aksi</th>
              </tr> 
            </thead>
            <tbody>
              <?php $no = 1; foreach ($video as $v): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><iframe width="200" height="113" src="https://www.youtube.com/embed/<?= $v->link_youtube ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>
                  <td><?= $v->judul ?></td>
                  <td><?= tanggal_indo($v->tgl_pelaksanaan) ?></td>
                  <td>
                    <a href="<?= base_url('unit/edit_video/'.$v->id) ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
                     <a href="<?= base_url('unit/delete_video/'.$v->id) ?>" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>

    <!-- PAGE CONTENT ENDS -->
  </div><!-- /.col -->
</div><!-- /.row -->

<script type="text/javascript">
  $(video).ready(function(){

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
              video.location.href = href;
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
              video.location.href = href;
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
              video.location.href = href;
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