
  <div class="alert alert-info"><i class="fa fa-info-circle"></i><strong> Silahkan isi formulir dengan data yang falid!!</strong></div>


    <h2>Formulir Minat Bakat</h2>


    <form class="form-horizontal form-label-left" method="post" action="<?= base_url('mahasiswa/surat/simpan_minat_bakat')  ?>" id="form-minat_bakat">
     <div class="table-responsive">
       <table class="table">
       <tr>
         <td>Nim </td><td>  <input type="text" name="nim" id="nim" class="col-md-3  col-xs-12" value="<?= $this->session->userdata('nim') ?>" readonly></td>
       </tr>
       <tr>
         <td>Nama </td><td>  <input type="text" name="nama" id="nama" class="col-md-8  col-xs-12" readonly="readonly" value="<?= $this->session->userdata('nama_lengkap') ?>"></td>
       </tr>
       <tr>
         <td>Nama Panggilan</td><td>  <input type="text" name="nama_panggilan" id="nama_panggilan" class="col-md-8  col-xs-12" placeholder="Nama panggilan.." required></td>
       </tr>
       <tr>
         <td>Program Studi </td><td>  
          <select class="col-md-8 col-xs-12" name="prodi" id="prodi" required="required">
            <option value="">--Pilih--</option>
             <?php foreach ($prodi as $data): ?>
              <option value="<?= $data->id_prodi ?>"><?= $data->nama_prodi ?></option>
            <?php endforeach ?>
          </select></td>
       </tr>
       <tr>
         <td>No. HP</td>
         <td><input type="number" name="no_hp" id="no_hp" class="col-md-5 col-xs-12" placeholder="No Handphone.." required></td>
       </tr>  
       <tr>
         <td>Tempat/Tanggal Lahir </td><td>  <input type="text" name="tempat" id="tempat" class="col-md-5 col-xs-12" placeholder="Tempat lahir.." required> <input type="date" id="tgl_lahir" name="tgl_lahir" class="col-md-5  col-xs-12" required></td>
       </tr>
       <tr>
         <td>Semester/angkatan </td>
         <td>  <input type="number" name="smt" id="smt" class="col-md-5 col-xs-12" placeholder="3" required> 
          <input type="number" id="angkatan" name="angkatan" class="col-md-5  col-xs-12" required placeholder="2020"></td>
       </tr>
       <tr>
        <td>Alamat tempat tinggal </td>
        <td> 
         <input type="text" name="alamat" id="alamat" class="col-md-12 col-xs-12" placeholder="Alamat tempat tinggal sekarang.." required>
          </td>
       </tr>
       <tr>
        <td>Agama</td><td> 
         <select name="agama" required>
           <option value="islam">Islam</option>
           <option value="kristen">Kristen</option>
           <option value="budha">BUdha</option>
           <option value="khatolik">khatolik</option>
           <option value="lain">Lain-lain</option>
         </select>  
          </td>
       </tr>
       <tr>
         <td>Suku</td>
         <td><input type="text" name="suku" value="" placeholder="ex:Tolaki...." required></td>
       </tr>
        <tr>
         <td>Minat Bakat</td>
         <td>
           <textarea name="minat" rows="3" class="form-control" placeholder="ex: sepak bola, bulu tangkis, dll...." required></textarea>
         </td>
       </tr>
       <tr>
         <td>Upaya Pengembangan minat bakat (optional)</td>
         <td>
           <textarea name="upaya" rows="5" class="form-control" placeholder="ex: nonton video, dll...."></textarea>
         </td>
       </tr>
       <tr>
         <td>Saran Mahasiswa untuk prodi (optional)</td>
         <td>
           <textarea name="saran" rows="5" class="form-control" placeholder="ex: nonton video, dll...."></textarea>
         </td>
       </tr>
     </table>
     </div>
      <button class="btn btn-primary btn-sm" style="border-radius: 1px; margin-left: 10px;" id="btnCuti"><i class="glyphicon glyphicon-ok"></i> Kirim</button>
    </form>



<script>
 $(document).ready(function(){

    $('#form-minat_bakat').on('submit', function(e){
      e.preventDefault();

        const url = $(this).attr('action');
        const data = $(this).serialize();

        $.ajax({
          url: url,
          method: 'post',
          data: data,
          success: function(data){
            if (data == 'sukses') {
              swal({
                title: "Surat berhasil di buat!",
                text: "silahkan tunggu konfirmasi dari tendik!",
                icon: "success",
                button: "selesai!",
              }).then((ok) => {
                if (ok) {
                  window.location.assign('<?= base_url("mahasiswa/surat") ?>');
                 }
                
              });
            }

            }
        });

    })

  });

</script>