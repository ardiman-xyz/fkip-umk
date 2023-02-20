<section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center" >
      <div class="col-md-9 col-lg-9 ftco-animate">
        <div class="blog-entry "  style="border: 1px skyblue solid">
          <div class="text bg-white p-4">
            <div class="alert alert-info"><i class="fa fa-info-circle"></i> Silahkan isi formulir dengan data yang falid!!</div>

            <?= $this->session->flashdata('msg'); ?>

                 <form class="form-horizontal form-label-left" method="post" action="<?= base_url('daftar_ujian/simpan')  ?>" id="myCutiForm" enctype="multipart/form-data">

                   <table class="table">
                     <tr>
                       <td>Nama </td><td> : <input type="text" name="nama" id="nama" class="col-md-8  col-xs-8" required="required"></td>
                     </tr>
                     <tr>
                       <td>Nim </td><td> : <input type="text" name="nim" id="nim" class="col-md-3  col-xs-3" required="required"></td>
                     </tr>
                     <tr>
                       <td>Program Studi </td><td> : 
                        <select class="col-md-8 col-xs-12" name="prodi" id="prodi" required="required">
                          <option value="">--Pilih--</option>
                           <?php foreach ($prodi as $data): ?>
                            <option value="<?= $data->id_prodi ?>"><?= $data->nama_prodi ?></option>
                          <?php endforeach ?>
                        </select></td>
                     </tr>
                     <tr>
                       <td>Semester </td><td> : 
                        <select class="col-md-3 col-xs-12" name="semester" id="semester" required="required">
                          <option value="">--Pilih--</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <input type="hidden" name="smt"></td>
                     </tr>
                     <tr>
                       <td>Jenis Ujian</td><td> : 
                         <select class="col-md-3 col-xs-12" name="jenis_ujian" id="jenis_ujian" required="required">
                          <option value="">--Pilih--</option>
                          <?php foreach ($jenis_ujian as $data): ?>
                            <option value="<?= $data->id_ujian ?>"><?= $data->nama_ujian ?></option>
                          <?php endforeach ?>
                      </td>
                     </tr>
                      <tr>
                       <td>No. HP </td><td> : <input type="text" name="no_hp" id="no_hp" class="col-md-5  col-xs-5" required="required" placeholder="masukkan no hp yang aktif"></td>
                     </tr>
                   </table>
                    <div class="alert alert-info"><i class="fa fa-info-circle"></i> silahkan pilih program studi untuk melihat syarat!!</div>
                  
                   <div id="show"></div>

                  <p class="mb-0"><button style="border-radius: 1px" class="btn btn-secondary" name="submit">Kirim <span class="ion-ios-arrow-round-forward"></span></button></p>
                  </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


  <script type="text/javascript">
  $(document).ready(function(){

    $("#prodi").change(function(){
      var prodi = $("#prodi").val();
      var isi = ' <div class="alert alert-info"><i class="fa fa-info-circle"></i><strong> Silahkan upload file persyaratan daftar ujian, dalam format gambar(JPG, JPEG, PNG): </strong></div>';

      isi += `<table class="table">`
      if (prodi == 4) {
        
        isi += `<tr><td>Sertifikat Toefl</td> <td> : <input type="file" name="suggestion" id="foto" required></td> </tr> 
        <tr>
         <td>Bukti pembayaran dana ujian</td><td>: <input type="file" name="pembayaran" required></td>
       </tr>
        <tr>
         <td>Lembar/Hal. Persetujuan Pembimbing</td><td>: <input type="file" name="persetujuan_pembimbing" required></td>
       </tr>
       <tr>
         <td>Transkrip nilai</td><td>: <input type="file" name="transkrip_nilai" required></td>
       </tr>
       <tr>
         <td>Bukti Ket. mampu BTQ</td><td>: <input type="file" name="btq" required></td>
       </tr>`;

      }else{
        isi += `
        <tr>
         <td>Bukti pembayaran dana ujian</td><td>: <input type="file" name="pembayaran" required></td>
       </tr>
        <tr>
         <td>Lembar/Hal. Persetujuan Pembimbing</td><td>: <input type="file" name="persetujuan_pembimbing" required></td>
       </tr>
       <tr>
         <td>Transkrip nilai</td><td>: <input type="file" name="transkrip_nilai" required></td>
       </tr>
       <tr>
         <td>Bukti Ket. mampu BTQ</td><td>: <input type="file" name="btq" required></td>
       </tr>`;
      }

      isi += `</table>`

        $("#show").html(isi).fadeIn('slow');
      
    });

  });

</script>

<?php if ($this->session->flashdata('msg') == 'error'): ?>
  <script type="text/javascript">
    iziToast.error({
      timeout: 10000,
      icon: 'fa fa-times',
      title: 'Gagal',
      message: 'Nim anda sudah terdaftar, silahkan menghubungi admin!',
      // position: 'topCenter'
    });
  </script>
<?php endif ?>