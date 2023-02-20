<br>

<div class="row justy-content-center">
	<div class="col-md-10 col-md-offset-1">
		<!-- PAGE CONTENT BEGINS -->
		
		<div class="alert alert-block alert-success">
			<i class="ace-icon fa fa-check green"></i>
		Silahkan upload laporan :
		   <ul>
		       <li>Insentif penguji, pembimbing, pengelola dan petugas kebersihan</li>
		       <li>Bukti pengeluaran konsumsi</li>
		       <li><b>Laporan dibuat dalam satu file pdf</b></li>
		   </ul>
		<span id="loading"></span>
		</div>
		<div class="row" style="margin-top: 10px">
      <div id="result" class="table-responsive">
        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Tgl RAB</th>
              <th class="text-center">Jenis Ujian</th>
              <th class="text-center">No SK</th>
              <th class="text-center">File laporan</th>
              <th class="text-center">Tgl upload</th>
              <th class="text-center">Aksi</th>
            </tr> 
          </thead>
          <tbody>
              <?php foreach ($rab as $key => $value): ?>
              <tr>
                <td class="text-center"><?= $key+1 ?></td>
                <td class="text-center"><?= pengaturan_tgl($value->date_created) ?></td>
                <td class="text-center"><span class="label label-success"><?= $value->nama_ujian ?></span></td>
                <td class="text-center"><?= $value->no_sk ?></td>
                <td>
                  <?php if ($value->upload_laporan !== null): ?>
                    <a href="<?= base_url('assets/upload/laporan_rab/'.$value->upload_laporan ) ?>" title="Lihat laporan" target="_blank"><?= $value->upload_laporan ?></a>
                  <?php else: ?>
                    <input type="file" name="file_laporan" id="fileUpload<?= $key+1 ?>" onchange="upload_laporan(<?= $value->id ?>,<?= $key+1 ?>)"> 
                    <span id="msg<?= $key+1 ?>"></span>
                  <?php endif ?>
                </td>
                <td class="text-center">
                  <?php if ($value->upload_laporan !== null): ?>
                    <?= $value->updated_at ?>
                  <?php else: ?>
                    --Belum ada data--
                  <?php endif ?>
                </td>
                <td class="text-center">
                  <?php if ($value->upload_laporan !== null): ?>
                  <button title="Hapus RAB" class="btn btn-danger btn-sm" id="btn-hapus<?= $key+1 ?>" onclick="hapus_rab(<?= $value->id ?>,<?= $key+1 ?>)"><i class="fa fa-trash"></i></button>
                  <?php endif ?>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
     </div>
  </div>
</div>

<script>
//   $(document).ready(function(){ 
//     get_data_rab();
//   });
    $('#dynamic-table').DataTable();
  function get_data_rab()
  {
    $.ajax({
      url: "<?= base_url('tendik/cari_data_rab') ?>",
      method: "post",
      dataType: "html",
      beforeSend: function(){
          $('#loading').html(`<i class="fa fa-spinner fa-spin text-danger"></i> Mencari data...`);
        },
      success: data =>{
        $('#loading').html('');
        $("tbody#result").html(data)
      }
    })
  }

  function upload_laporan(id, key)
  {

     const ext = $('#fileUpload'+key).val().split('.').pop().toLowerCase(),
          property = document.getElementById('fileUpload'+key).files[0],
          nama_file = property.name;

     if (jQuery.inArray(ext, ['pdf','docx']) == -1) {
        Swal({
          title: "gagal",
          text: "Yang anda upload bukan file! hanya file pdf, docx",
          type: "error"
        });

        return false;
      } 

      const size = property.size;
      if (size > 9000000) {
        Swal({
          title: "gagal",
          text: "File yang anda upload terlalu besar! min. 4MB",
          type: "error"
        });
        return false;
      }else{

        const form_data = new FormData();
        form_data.append('fileUpload', property);

        $.ajax({
          url: '<?= base_url('tendik/upload_laporan_rab') ?>/'+id,
          method: 'post',
          data: form_data,
          dataType: 'json',
          contentType: false,
          cache: false,
          processData: false,
          beforeSend: function(){
            $('#msg'+key).html(`<i class="fa fa-spinner fa-spin text-danger"></i> Sedang mengupload...`);
          },
          success: callback =>{
            if (callback.status == true) {
              Swal({
                title: "Berhasil",
                text: `${callback.pesan}`,
                type: "success"
              });
              $('#msg'+key).html('');
               window.location.reload();
            }
          },
          error: xhr =>{
            alert('something went wrong');
          }
        });

      } 

  }

  function hapus_rab(id, key)
  {
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
          url: '<?= base_url('tendik/hapus_laporan_rab') ?>',
          type: 'post',
          dataType: 'json',
          data: {
            id: id
          },
          beforeSend: function(){
            $('#btn-hapus'+key).attr('disabled', true);
            $('#btn-hapus'+key).html('<i class="fa fa-spinner fa-spin"></i>');
          },
          success: callback =>{
            if(callback.status == true)
            {
              $('#remove'+key).html('');
              Swal({
                  title: "Berhasil",
                  text: `${callback.pesan}`,
                  type: "success"
                });
              get_data_rab();
            }
          },
          error: xhr => {
            alert('something went wrong!')
          }
        });

        
      }
    });
  }

</script>