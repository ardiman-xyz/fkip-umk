<br>

<div class="row justy-content-center">
	<div class="col-md-10 col-md-offset-1">
		<!-- PAGE CONTENT BEGINS -->

    <div class="row" style="margin-top: 10px">
          <form action="<?= base_url('fakultas/laporan/filter_lap_rab') ?>" method="post">
            <div class="col-md-3">
              <div>
                  <label for="form-field-select-3"><i class="fa fa-filter blue"></i> Filter Data</label>
                  <br />
                  <select name="prodi" class="form-control" required>
                    <option value="">--Pilih Prodi-- </option>
                    <?php foreach ($prodi as $p): ?>
                       <option value="<?= $p->id_prodi ?>"><?= $p->nama_prodi ?></option>
                     <?php endforeach ?> 
                  </select>
                </div>
            </div>
            <div class="col-md-2">
              <div style="margin-top: 5px">
                <br>
                  <select name="jenis_ujian" class="form-control" required>
                    <option value="">--Pilih jenis ujian-- </option>
                    <option value="0">Semua</option>
                    <?php foreach ($jenis_ujian as $js): ?>
                       <option value="<?= $js->id_ujian ?>"><?= $js->nama_ujian ?></option>
                     <?php endforeach ?>
                  </select>
                </div>
            </div>
            <div id="result"></div>
              <button style="margin-top: 26px;" class="btn btn-sm btn-primary" type="submit" id="submit"><i class="fa fa-filter"></i> filter</button>
           </form>
          </div>
		<hr>
		<div class="row" style="margin-top: 10px">
      <div id="result" class="table-responsive">
        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Prodi</th>
              <th class="text-center">Tgl RAB</th>
              <th class="text-center">Jenis Ujian</th>
              <th class="text-center">File laporan</th>
              <th class="text-center">Tgl uploaded</th>
            </tr> 
          </thead>
          <tbody>
            <?php foreach ($laporan as $key => $lap): ?>
              <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $lap->nama_prodi ?></td>
                <td class="text-center"><?= pengaturan_tgl($lap->date_created) ?></td>
                <td class="text-center"><?= $lap->nama_ujian ?></td>
                <td class="text-center">
                  <?php if ($lap->upload_laporan === null): ?>
                    --Tidak ada laporan--
                  <?php else: ?>
                    <a href="<?= base_url('assets/upload/laporan_rab/'.$lap->upload_laporan) ?>" target="_blank" title=""><?= $lap->upload_laporan ?></a>
                  <?php endif ?>
                </td>
                <td class="text-center"><?= ($lap->updated_at == null ? '--Belum upload laporan--' : $lap->updated_at) ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
     </div>
  </div>
</div>

<script>
  $(document).ready(function(){ 
    get_data_rab();
  });

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
      if (size > 2000000) {
        Swal({
          title: "gagal",
          text: "File yang anda upload terlalu besar! min. 2MB",
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
              get_data_rab();
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