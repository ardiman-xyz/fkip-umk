
  <div class="alert alert-info"><i class="fa fa-info-circle"></i><strong> Silahkan isi formulir dengan data yang falid!!</strong></div>


    <form class="form-horizontal form-label-left" method="post" action="<?= base_url('mahasiswa/surat/simpan_beasiswa')  ?>" id="myBeasiswaForm">
     <div class="table-responsive">
       <table class="table">
       <tr>
         <td>Nim </td><td>  <input type="text" name="nim" id="nim" class="col-md-3  col-xs-12" value="<?= $this->session->userdata('nim') ?>" readonly></td>
       </tr>
       <tr>
         <td>Nama </td><td>  <input type="text" name="nama" id="nama" class="col-md-8  col-xs-12" readonly="readonly" value="<?= $this->session->userdata('nama_lengkap') ?>"></td>
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
         <td>Tempat/Tanggal Lahir </td><td>  <input type="text" name="tempat" id="tempat" class="col-md-5 col-xs-12"> <input type="date" id="tgl_lahir" name="tgl_lahir" class="col-md-3  col-xs-12"></td>
       </tr>
       <tr>
        <td>Tahun Akademik </td><td> 
          <select class="col-md-3 col-xs-12" name="thn_akad" id="thn_akad" required="required">
            <option value="">--Pilih--</option>
            <option value="2019/2020">2019/2020</option>
            <option value="2020/2021">2020/2021</option>
            <option value="2019/2020">2021/2022</option>
            <option value="2020/2021">2022/2023</option>
            <option value="2019/2020">2023/2024</option>
            <option value="2020/2021">2024/2025</option>
            </td>
       </tr>
     </table>
     </div>
      <button class="btn btn-primary btn-sm" style="border-radius: 1px; margin-left: 10px;" id="btnBeasiswa"><i class="glyphicon glyphicon-ok"></i> Kirim</button>
    </form>



<script>
 $(document).ready(function(){

    $('#myBeasiswaForm').on('submit', function(e){
      e.preventDefault();

        const url = $(this).attr('action'),
              data = $(this).serialize(),
              btn_simpan = $('#btnBeasiswa').text('Menyimpan...');
              btn_simpan.attr('disabled', true);

        $.ajax({
          url: url,
          method: 'post',
          data: data,
          dataType: 'json',
          success: data => {
            if (data.status == true) {

              $('#myBeasiswaForm')[0].reset();
              btn_simpan.html(`<i class="glyphicon glyphicon-ok"></i> Kirim`);
              btn_simpan.attr('disabled', false);

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
            }else{
              alert('Gagal Membuat surat')
            }

            },
            error: xhr =>{
              alert('Something went wrong!')
            }
        });

    })

  });

</script>