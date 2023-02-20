<br>
<div class="row justy-content-center">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<!-- PAGE CONTENT BEGINS -->
		
		<div class="alert alert-block alert-warning">
			<i class="ace-icon fa fa-check green"></i>
			selamat datang di halaman Realisasi Anggaran Wisuda (RAW)
		</div>
        <?= $this->session->flashdata('sukses') ?>
    <h4 class="widget-title lighter">
      <a href="<?= base_url('tendik/buat_pengajuan_raw') ?>" title="" class="btn btn-sm btn-primary">Buat pengajuan</a>
    </h4>
	<div class="table-responsive">
        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">Tgl Dibuat</th>
            <th class="text-center">Jumlah Mahasiswa</th>
            <th class="text-center">Jumlah pengelola</th>
            <th class="text-center">Status</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
           <?php foreach ($result as $key => $dt):  
                $jml_pengelola = $this->tendik->getJmlPengelolaRaw($dt->id_raw);
            ?>
                <tr>
                    <td class="text-center"><?= $key + 1 ?></td>
                    <td class="text-center"><?= pengaturan_tgl($dt->date_created) ?></td> 
                    <td class="text-center"><?= $dt->jml_mhs ?></td>  
                    <td class="text-center"><?= count($jml_pengelola) ?></td>
                    <td class="text-center">
                        <?php if ($dt->status == "1"): ?>
                          <span class="label label-success">Sudah diajukan</span>
                          <span class="label label-success">Tgl : <?= tgl_balik($dt->tgl_diajukan) ?></span>
                        <?php else: ?>
                          <span class="label label-danger">Belum diajukan</span>
                        <?php endif ?>
                    </td>
                    <td class="text-center">
                        <?php if ($dt->status === '0'): ?>
                            <button onclick="update_pengajuan(<?= $dt->id ?>,<?=$key+1?>)" title="Ajukan" class="btn btn-sm btn-default" id="btn_pengajuan<?=$key+1?>">Ajukan</button>
                        <?php endif ?>
                        <a href="<?= base_url('tendik/raw_preview/'.$dt->id_raw) ?>" title="Preview Realisasi Anggaran Wisuda" class="btn btn-sm btn-info">Preview</a>
                        <a href="<?= base_url('tendik/raw_edit/'.$dt->id_raw) ?>" title="Edit" class="btn btn-sm btn-success">Edit</a>
                        <a href="<?= base_url('tendik/raw_delete/'.$dt->id_raw) ?>" onclick="return confirm('apakah anda yakin ?')" title="Delete" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    </div>
</div>
</div>

<script type="text/javascript">
    function update_pengajuan(id, key) {
        Swal({
          title: "Anda yakin?",
          text: "RAW Akan di ajukan!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Ajukan sekarang!"
        }).then(result => {
          if (result.value) {

             $.ajax({
              url: '<?= base_url('tendik/update_status_raw') ?>',
              type: 'post',
              dataType: 'json',
              data: {
                id: id
              },
              beforeSend: function(){
                $('#btn_pengajuan'+key).attr('disabled', true);
                $('#btn_pengajuan'+key).html('<i class="fa fa-spinner fa-spin"></i>');
              },
              success: callback =>{
                if(callback.status == true)
                {
                  // $('#remove'+key).html('');
                  Swal({
                      title: "Berhasil",
                      text: `${callback.pesan}`,
                      type: "success"
                    });
                }
                 setTimeout(() => {
                    location.reload();
                  }, 500);
              },
              error: xhr => {
                alert('something went wrong!')
              }
            });

            
          }
        });
    }
</script>
