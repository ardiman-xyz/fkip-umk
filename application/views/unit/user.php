
<div class="row">
  <div class="col-xs-12">

        <div class="clearfix">
          <div class="pull-right tableTools-container"></div>
        </div>

        <div class="table-header">
          Data User
        </div>
        <br>

        <a class="btn btn-sm btn-success" href="<?= base_url('unit/create_user') ?>">Create User</a>
      <hr>
         <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th width="60" class="center">No</th>
                <th width="70" class="center">Tahun</th>                
                <th class="center">Sekolah</th>
                <th class="center">Nama</th>
                <th class="center">Username</th>
                <th class="center">L / P</th>
                <th class="center">Status</th>
                <th class="center" width="200">Aksi</th>
              </tr> 
            </thead>
            <tbody>
              <?php $no = 1; foreach ($user as $data): 
                $nama_sekolah = $this->unit->getNamaSekolah($data->id_sekolah);
              ?>
                <tr>
                  <?php if ($data->id == '1'): ?>
                    <?php else: ?>
                      <td align="center"><?= $no++ ?></td>
                      <td align="center"><?= $data->tahun ?></td>
                      <td><?= $nama_sekolah ?></td>
                      <td><?= $data->nama ?></td>
                      <td><?= $data->username ?></td>
                      <td align="center"><?= $data->jenis_kelamin ?></td>
                      <td align="center">
                        <?php if ($data->active == 'Y'): ?>
                          <span class="badge badge-success">aktif</span>
                        <?php else: ?>
                          <span class="badge badge-danger">NonAktif</span>
                        <?php endif ?>
                      </td>
                      <td align="center">
                         <?php if ($data->active == 'Y'): ?>
                           <a href="<?= base_url('unit/nonAktifUser/'.$data->id) ?>" class="btn btn-danger btn-sm btn-nonAktif" title="NonAktif"><i class="fa fa-times"></i></a>
                          <?php else: ?>
                            <a href="<?= base_url('unit/AktifUser/'.$data->id) ?>" class="btn btn-success btn-sm" id="btn-aktif" title="aktifkan"><i class="fa fa-check"></i></a>
                         <?php endif ?>
                         <a href="<?= base_url('unit/reset_password_user/'.$data->id) ?>" class="btn btn-primary btn-sm" title="Reset Password"><i class="fa fa-refresh"></i></a>
                        <a href="<?= base_url('unit/edit_form/'.$data->id) ?>" title="Edit User" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                         <a href="<?= base_url('unit/delete_user/'.$data->id) ?>" title="Delete User" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>
                      </td>
                  <?php endif ?>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>

    <!-- PAGE CONTENT ENDS -->
  </div><!-- /.col -->
</div><!-- /.row -->


  <!--Modal Reset Password-->
    <div class="modal fade" id="ModalResetPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                    <h4 class="modal-title" id="myModalLabel">Reset Password</h4>
                </div>
                
                <div class="modal-body">

                  <div class="alert alert-success">
                    <p>Silahkan Copy password baru!</p>
                  </div>
                            
                    <table>
                        <tr>
                            <th style="width:120px;">Username</th>
                            <th>:</th>
                            <th><?php echo $this->session->flashdata('username');?></th>
                        </tr>
                        <tr>
                            <th style="width:120px;">Password Baru</th>
                            <th>:</th>
                            <th><?php echo $this->session->flashdata('password');?></th>
                        </tr>
                    </table>                     
                                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>


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