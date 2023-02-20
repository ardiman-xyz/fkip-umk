<br>
<div class="row justy-content-center">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<!-- PAGE CONTENT BEGINS -->
		
		<div class="alert alert-block alert-warning">
			<i class="ace-icon fa fa-users green"></i>
			Halaman Mahasiswa
		</div>
        <?= $this->session->flashdata('success') ?>
    <h4 class="widget-title lighter">
      <a href="<?= base_url('tendik/tambah_mhs') ?>" title="Tambah Mahasiswa" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Mahasiswa</a>
      <a href="<?= base_url('tendik/form_import') ?>" title="import mahasiswa" class="btn btn-sm btn-success"><i class="fa fa-file"></i> Import data Excel</a>
      <a href="<?= base_url('tendik/luluskan_mhs') ?>" title="import mahasiswa" class="btn btn-sm btn-danger"><i class="fa fa-user"></i> Luluskan</a>
    </h4>
	<div class="table-responsive">
        <table id="TableServerSide" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th class="text-center">Nim</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Jenis Kelamin</th>
            <th class="text-center">No WA</th>
            <th class="text-center" width="160">Aksi</th>
          </tr>
        </thead>
        <tbody>         
        </tbody>
    </table>
    </div>
</div>
</div>

<!-- modal edit pasword -->

<div class="modal fade" id="exampleModallarge" tabindex="-1" role="dialog" aria-labelledby="exampleModalLarge" aria-hidden="true">
<div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLarge"><b></b></h5>
        </div>
        
        <form action="<?=base_url('tendik/update_pass_mhs') ?>" method="post" accept-charset="utf-8" id="form_update_pass">
            <div class="modal-body">
                <span id="msg"></span>
                <input type="hidden" name="nim" value="" id="nim">
                <input type="text" name="pass_baru" class="form-control" placeholder="Masukkan password" id="pass_baru">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm btn-pill" id="btn-close" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm  btn-md" style="border-radius: 1px; margin-left: 10px;" id="btnSimpan"><i class="glyphicon glyphicon-ok"></i> Update password</button>
            </div>
        </form>
        
      </div>
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){

        $('#TableServerSide').DataTable({
           "processing": true,
           "serverSide": true,
           "ajax": {
                "url": "<?= base_url('tendik/get_ajax') ?>",
                "type": "POST"
           }

        });

        $('body').on('click', '#btn-edit', function(){
           const nim = $(this).data('nim')
           $('#nim').val(nim)
           $('.modal-title').text('Edit password mahasiswa : ' +nim);
        })

        $('body').on('submit', '#form_update_pass', function(e){
            e.preventDefault();

            const pass_baru = $('#pass_baru').val();

            if(!pass_baru)
            {
                $('#msg').html(`<div class="alert alert-danger"><i class="fa fa-warning"></i> Password harus di isi bang!</div>`)
                return false;
            }

            const me  = $(this),
                  url = me.attr('action'),
                  data = me.serialize(),
                  btn_submit = me.find('#btnSimpan').html(`<i class="ace-icon fa fa-spinner fa-spin bigger-125"></i> sedang megupdate...`),
                  btn_close = me.find('#btn-close').attr('disabled', true);
                  btn_submit.attr('disabled', true);

            $.ajax({
                url : url,
                method: 'post',
                data: data,
                dataType: 'json',
                success: callback =>{
                    if(callback.status == true)
                    {
                        $('.modal-body').html(`<div class="alert alert-success">Password berasil di update! silahkan tekan <b>Close</b> dan <b>Represh</b> halaman</div>`);
                        btn_close.attr('disabled', false);
                        btn_submit.html(`Updated`);
                    }
                },
                error: xhr =>{
                    alert('Gagal mengubah, periksa koneksi!')
                }
            })

        });

        $('body').on('click', '#hapus_mhs', function(e){
          e.preventDefault();

          const id = $(this).data('id');

          Swal({
            title: "Anda yakin?",
            text: "Data akan dihapus!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus!"
          }).then(result => {
            if (result.value) {

             $.ajax({
                url: '<?= base_url('tendik/delete_mhs') ?>',
                type: 'post',
                dataType: 'json',
                data: {
                  id: id
                },
                success: callback =>{
                  if(callback.status == true)
                  {
                    Swal({
                      title: "Berhasil",
                      text: "File berhasil di hapus",
                      type: "success"
                    });
                  }

                  reload_ajax();
                },
                error: xhr => {
                  alert('something went wrong!')
                }
              });

              
            }
          });

        })

    });



</script>

