  
  <a href="<?= base_url('surat/in') ?>" class="btn btn-danger" style="border-radius: 1px;"><i class="fa fa-backward"></i> Kembali</a>
  <hr>

  <div class="alert alert-info"><i class="fa fa-info-circle"></i><strong> Silahkan isi formulir dengan data yang falid!!</strong></div>


    <form class="form-horizontal form-label-left" method="" action="" id="myCutiForm">
     <table class="table">
       <tr>
         <td>Nim </td><td> : <input type="text" name="nim" id="nim" class="col-md-3  col-xs-3" value="<?= $this->session->userdata('nim') ?>" readonly></td>
       </tr>
       <tr>
         <td>Nama </td><td> : <input type="text" name="nama" id="nama" class="col-md-8  col-xs-8"></td>
       </tr>
       <tr>
         <td>Tempat/Tanggal Lahir </td><td> : <input type="text" name="tempat" id="tempat" class="col-md-5 col-xs-5"> <input type="date" id="tgl_lahir" name="tgl_lahir" class="col-md-3  col-xs-3"></td>
       </tr>
      
       <tr>
         <td>Program Studi </td><td> : 
          <select class="col-md-10 col-xs-12" name="prodi" id="prodi">
            <option value="">--Pilih--</option>
            <?php foreach ($prodi as $data): ?>
              <option value="<?= $data->id_prodi ?>"><?= $data->nama_prodi ?></option>
            <?php endforeach ?>
          </select></td>
       </tr>
       <tr>
         <td>Semester </td><td> : 
          <select class="col-md-3 col-xs-12" name="semester" id="semester">
            <option value="">--Pilih--</option>
            <option value="genap">Genap</option>
            <option value="ganjil">Ganjil</option>
            </td>
       </tr>
       <tr>
         <td>Alamat </td><td> : <input type="text" name="alamat" id="alamat" class="col-md-8 col-xs-8"></td>
       </tr>
     </table>

     <hr>

     <div class="alert alert-info"><i class="fa fa-info-circle"></i><strong> Silahkan isi formulir Data Orang Tua/Wali. Gunakan (-) untuk mengosongkan inputan !</strong></div>
<table class="table">
     <tr>
         <td>Nama Orang Tua</td><td> : <input type="text" name="nama_ortu" id="nama_ortu" class="col-md-8  col-xs-8"></td>
       </tr>
       <tr>
         <td>NIP/NRP </td><td> : <input type="text" name="nip" id="nip" class="col-md-5 col-xs-4"></td>
       </tr>
       <tr>
         <td>Pangkat/Golongan </td><td> : <input type="text" name="pangkat" id="pangkat" class="col-md-4  col-xs-3"></td>
       </tr>
        <tr>
         <td>Jabatan/Pekerjaan </td><td> : <input type="text" name="jabatan" id="jabatan" class="col-md-4  col-xs-3"></td>
       </tr>
        <tr>
         <td>Intansi Kantor </td><td> : <input type="text" name="instansi" id="instansi" class="col-md-8  col-xs-3"></td>
       </tr>
        <tr>
         <td>Alamat</td><td> : <input type="text" name="alamat_ortu" id="alamat_ortu" class="col-md-8  col-xs-3"></td>
       </tr>
     </table>
    </form>
<br>
      <button class="btn btn-primary btn-sm" style="border-radius: 1px; margin-left: 10px;" id="btnCuti">Kirim</button>



<script type="text/javascript">
  $(document).ready(function(){

    $('#btnCuti').click(function(){

      var nama      = $('#nama').val();
      var tempat      = $('#tempat').val();
      var tgl_lahir      = $('#tgl_lahir').val();
      var nim       = $('#nim').val();
      var prodi     = $('#prodi').val();
      var semester  = $('#semester').val();
      var alamat     = $('#alamat').val();
      var nama_ortu     = $('#nama_ortu').val();
      var nip     = $('#nip').val();
      var pangkat     = $('#pangkat').val();
      var jabatan     = $('#jabatan').val();
      var instansi     = $('#instansi').val();
      var alamat_ortu     = $('#alamat_ortu').val();
      var data      = $('#myCutiForm').serialize();

      if (!nama) {
       $.toast({
              heading: 'Info',
              text: "Nama harus di isi",
              showHideTransition: 'slide',
              icon: 'info',
              hideAfter: false,
              position: 'top-right',
              bgColor: '#ef5252'
          });
      $("#nama").focus();
      return false;
      }

      if (!tempat) {
        $.toast({
              heading: 'Info',
              text: "Tempat harus di isi",
              showHideTransition: 'slide',
              icon: 'info',
              hideAfter: false,
              position: 'top-right',
              bgColor: '#ef5252'
          });
      $("#tempat").focus();
      return false;
      }

      if (!tgl_lahir) {
        $.toast({
              heading: 'Info',
              text: "Tanggal lahir harus di isi",
              showHideTransition: 'slide',
              icon: 'info',
              hideAfter: false,
              position: 'top-right',
              bgColor: '#ef5252'
          });
        $("#tgl_lahir").focus();
        return false;
      }

      if (!nim) {
       $.toast({
              heading: 'Info',
              text: "Nim harus di isi",
              showHideTransition: 'slide',
              icon: 'info',
              hideAfter: false,
              position: 'top-right',
              bgColor: '#ef5252'
          });
        $("#nim").focus();
        return false;
      }

      if (!prodi) {
        $.toast({
              heading: 'Info',
              text: "Silahkan pilih prodi terlebih dahulu",
              showHideTransition: 'slide',
              icon: 'info',
              hideAfter: false,
              position: 'top-right',
              bgColor: '#ef5252'
          });
        $("#prodi").focus();
        return false;
      }
       if (!semester) {
        $.toast({
              heading: 'Info',
              text: "Silahkan pilih semester terlebih dahulu",
              showHideTransition: 'slide',
              icon: 'info',
              hideAfter: false,
              position: 'top-right',
              bgColor: '#ef5252'
          });
        $("#semester").focus();
        return false;
      }

       if (!alamat) {
        $.toast({
              heading: 'Info',
              text: "Alamat harus di isi!",
              showHideTransition: 'slide',
              icon: 'info',
              hideAfter: false,
              position: 'top-right',
              bgColor: '#ef5252'
          });
        $("#alamat").focus();
        return false;
      }

       if (!nama_ortu) {
        $.toast({
              heading: 'Info',
              text: "Nama orang tua harus di isi!",
              showHideTransition: 'slide',
              icon: 'info',
              hideAfter: false,
              position: 'top-right',
              bgColor: '#ef5252'
          });
        $("#nama_ortu").focus();
        return false;
      }

      if (!nip) {
        $.toast({
              heading: 'Info',
              text: "Nip harus di isi!",
              showHideTransition: 'slide',
              icon: 'info',
              hideAfter: false,
              position: 'top-right',
              bgColor: '#ef5252'
          });
        $("#nip").focus();
        return false;
      }

      if (!pangkat) {
        $.toast({
              heading: 'Info',
              text: "pangkat harus di isi!",
              showHideTransition: 'slide',
              icon: 'info',
              hideAfter: false,
              position: 'top-right',
              bgColor: '#ef5252'
          });
        $("#pangkat").focus();
        return false;
      }

       if (!jabatan) {
        $.toast({
              heading: 'Info',
              text: "Jabatan harus di isi!",
              showHideTransition: 'slide',
              icon: 'info',
              hideAfter: false,
              position: 'top-right',
              bgColor: '#ef5252'
          });
        $("#jabatan").focus();
        return false;
      }

       if (!instansi) {
        $.toast({
              heading: 'Info',
              text: "Instansi harus di isi!",
              showHideTransition: 'slide',
              icon: 'info',
              hideAfter: false,
              position: 'top-right',
              bgColor: '#ef5252'
          });
        $("#instansi").focus();
        return false;
      }

       if (!alamat_ortu) {
        $.toast({
              heading: 'Info',
              text: "Alamat orang tua harus di isi!",
              showHideTransition: 'slide',
              icon: 'info',
              hideAfter: false,
              position: 'top-right',
              bgColor: '#ef5252'
          });
        $("#alamat_ortu").focus();
        return false;
      }

      $.ajax({
        type: 'POST',
        url: '<?= base_url("surat/simpan_surat_aktifkuliah") ?>',
        data: data,
        cache: false,
        success: function(data){
           $.toast({
              heading: 'Info',
              text: data,
              showHideTransition: 'slide',
              icon: 'info',
              hideAfter: false,
              position: 'top-right',
              bgColor: '#ef5252'
        });

          if (data == 'Sukses') {
            window.location.assign('<?= base_url("mahasiswa/surat") ?>');
          }
        }
      });

    });

  });
</script>