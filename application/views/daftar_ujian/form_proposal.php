  
  <a href="<?= base_url('daftar_ujian') ?>" class="btn btn-danger" style="border-radius: 1px;"><i class="fa fa-backward"></i> Kembali</a>
  <hr>

  <div class="alert alert-info"><i class="fa fa-info-circle"></i><strong> Silahkan isi formulir dengan data yang falid!!</strong></div>


    <form class="form-horizontal form-label-left" method="post" action="<?= base_url('daftar_ujian/simpan_profosal')  ?>" id="myCutiForm" enctype="multipart/form-data">
     <table class="table">
       <tr>
         <td>Nama </td><td> : <input type="text" name="nama" id="nama" class="col-md-8  col-xs-8" required="required"></td>
         <input type="hidden" name="jenis_ujian" value="<?= $jenis_ujian ?>">
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
     </table>
      <div class="alert alert-info"><i class="fa fa-info-circle"></i><strong> silahkan pilih program studi untuk melihat syarat!!</strong></div>
    
     <div id="show"></div>

      <button class="btn btn-primary btn-sm" name="submit" style="border-radius: 1px; margin-left: 10px;" id="btnCuti">Kirim</button>
    </form>



<script type="text/javascript">
  $(document).ready(function(){

    $("#prodi").change(function(){
      var prodi = $("#prodi").val();
      var isi = ' <div class="alert alert-info"><i class="fa fa-info-circle"></i><strong> Silahkan upload file persyaratan daftar ujian, dalam format gambar(JPG, JPEG, PNG): </strong></div>';

      isi += `<table class="table">`
      if (prodi == 4) {
        
        isi += `<tr><td>Suggestion List</td> <td> : <input type="file" name="suggestion" id="foto" required></td> </tr> 
        <tr>
         <td>Bukti pembayaran dana ujian</td><td>: <input type="file" name="pembayaran" required></td>
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