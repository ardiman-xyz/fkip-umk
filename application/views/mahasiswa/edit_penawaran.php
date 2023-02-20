
<br>
<div class="container">
  <div class="row justy-content-center">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <!-- PAGE CONTENT BEGINS -->
      <div class="alert alert-block alert-success">
        <i class="ace-icon fa fa-warning"></i>
          Silahkan edit data upload
      </div>

      <a href="<?= base_url('mahasiswa/penawaran') ?>" class="btn btn-danger btn-sm" title="kembali">Kembali</a>

    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <span id="message"></span>

        <h5><b>DATA UPLOAD: </b></h5>

        <form class="form-horizontal form-label-left" method="post" action="<?= base_url('mahasiswa/penawaran/update') ?>" id="penawaran_form_edit" enctype="multipart/form-data">
          <input type="hidden" name="nim" value="<?= $data->nim ?>">
               <div class="table-responsive">
                 <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="text-center">No</th>
                      <th class="text-center">Nama </th>
                      <th class="text-center">Data upload</th>
                      <th class="text-center">Edit</th>
                    </tr>
                  </thead>
                  <tr>
                    <td class="text-center">1</td>
                     <td>Nama Dosen PA</td>
                     <td> 
                      <?= $nama_dosen_pa ?>
                     </td>
                     <td> 
                          <input type="text" class="col-md-8  col-xs-8" placeholder="Masukkan nama dosen" onkeyup="cari_dosen()" id="get_autocomplete">
                          <input type="hidden" name="nama_dosen_pa" value="<?= $data->id_dosen ?>" id="id_dosen_pa">
                       </td>
                   </tr>
                 <tr>
                  <td class="text-center">2</td>
                   <td>Bukti Pembayaran (<small>semester ini</small>) </td>
                   <td><a target="_blank" href="<?= base_url('assets/upload/mahasiswa/penawaran/'.$data->bukti_pembayaran) ?>">Bukti pembayaran</a></td>
                   <td> 
                    <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="col-md-8  col-xs-8">
                   </td>
                 </tr>

                 <tr>
                  <td class="text-center">3</td>
                   <td>KHS (<small>semester sebelumnya</small>) </td>
                   <td>
                    <a target="_blank" href="<?= base_url('assets/upload/mahasiswa/penawaran/'.$data->khs) ?>">Kartu hasil studi (KHS)</a>
                  </td>
                   <td> 
                    <input type="file" name="khs" id="khs" class="col-md-8  col-xs-8">
                   </td>
                 </tr>


                 <tr>
                  <td class="text-center">4</td>
                   <td>KRS (<small>Sejak semester I sampai sekarang</small>) </td>
                   <td>
                    <a target="_blank" href="<?= base_url('assets/upload/mahasiswa/penawaran/'.$data->krs) ?>">Kartu rencana studi (KRS)</a>
                  </td>
                   <td> 
                    <input type="file" name="krs" id="krs" class="col-md-8  col-xs-8">
                   </td>
                 </tr>


                 <tr>
                  <td class="text-center">5</td>
                   <td>Screenshoot telah mengisi kusioner</td>
                   <td>
                    <a target="_blank" href="<?= base_url('assets/upload/mahasiswa/penawaran/'.$data->sc_kuisioner) ?>">Screenshot kuisioner</a>
                  </td>
                   <td> 
                    <input type="file" name="sc_kuisioner" id="sc_kuisioner" class="col-md-8  col-xs-8">
                   </td>
                 </tr>
                
               </table>

               </div>
               <br>
             <button class="btn btn-primary pull-right" name="submit" type="submit" id="submit">Update</button>
             <br>
             <br>
        </form>

    </div>
  </div>
</div>


<script type="text/javascript">

  $(document).ready(function(){

    $("#penawaran_form_edit").on('submit', function(e){
      e.preventDefault();

      const me = $(this),
            url = me.attr('action');
      const data = new FormData(this);
      const btn_submit = me.find('#submit').attr('disabled', true);
            btn_submit.html('<i class="ace-icon fa fa-spinner fa-spin bigger-125"></i> Mengirim...');    

      $.ajax({
      url: url,
      method: 'post',
      data: data,
      dataType: 'json',
      processData:false,
      contentType:false,
      dataType: 'json',
      cache:false,
      async:false,
      success: callback =>{
        if (callback.status === false) {
          $('#message').html(`<div class="alert alert-danger" style="margin-top: 7px">${callback.pesan}</div>`);
          btn_submit.attr('disabled', false);
          btn_submit.text('Ajukan')
        }else{
         Swal({
            title: "Sukses",
            text: `${callback.pesan}`,
            type: "success",
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "selesai!"
          }).then(result => {

            if (result.value) {
              location.reload();               
            }

          })
        }
      },
      error: xhr =>{
        iziToast.error({
          timeout: 10000,
          icon: 'fa fa-times',
          title: 'Gagal',
          message: 'Silahkan perikas koneksi anda!',
        });
      }
    }); 
    });

  });


  function cari_dosen()
  {
    $('#get_autocomplete').autocomplete({
        source: "<?php echo base_url('mahasiswa/penawaran/cari_dosen_ajax')?>",
        select: function (event, ui) {
              $(this).val(ui.item.label);
              $('#id_dosen_pa').val(ui.item.id_dosen)
          }
      });
  }

</script>
