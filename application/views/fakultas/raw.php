<br>
<div class="row justy-content-center">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<!-- PAGE CONTENT BEGINS -->
		
		<div class="alert alert-block alert-warning">
			<i class="ace-icon fa fa-check green"></i>
			selamat datang di halaman Realisasi Anggaran Wisuda (RAW)
		</div>
	<div class="table-responsive">
        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Tgl Di Ajukan</th>
            <th class="text-center">Prodi</th>
            <th class="text-center">Jumlah Mahasiswa</th>
            <th class="text-center">Jumlah pengelola</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
           <?php foreach ($raw as $key => $dt):  
                $jml_pengelola = $this->tendik->getJmlPengelolaRaw($dt->id_raw);
                $nama_prodi = $this->prodi->nama_jurusan($dt->id_prodi);
            ?>
                <tr>
                    <td class="text-center"><?= $key + 1 ?></td>
                    <td class="text-center"><?= pengaturan_tgl($dt->tgl_diajukan) ?></td>
                    <td class="text-center"><?= $nama_prodi ?></td>  
                    <td class="text-center"><?= $dt->jml_mhs ?></td>  
                    <td class="text-center"><?= count($jml_pengelola) ?></td>
                    <td class="text-center">                        
                      <a href="<?= base_url('fakultas/raw/cetak_raw/'.$dt->id_raw) ?>" target="_blank"  title="Cetak RAW" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Cetak</a>
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
