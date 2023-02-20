
  <div class="alert alert-info"><i class="fa fa-info-circle"></i><strong> Silahkan isi formulir dengan data yang falid!!</strong></div>


    <form class="form-horizontal form-label-left" method="post" action="<?= base_url('mahasiswa/surat/simpan_surat_cuti')  ?>" id="myCutiForm">
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
         <td>Alamat/Asal </td><td>  <input type="text" name="alamat_asal" id="alamat_asal" class="col-md-6  col-xs-12" required="required"></td>
       </tr>
       <tr>
         <td>Telepon/HP </td><td>  <input type="text" name="telepon" id="telepon" class="col-md-3  col-xs-12" required="required"></td>
       </tr>
       <tr>
         <td>Alamat di kendari </td><td>  <input type="text" name="alamat_sekarang" id="alamat_sekarang" class="col-md-6  col-xs-12" required="required"></td>
       </tr>
       <tr>
         <td>Semester </td><td>  
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
        <td>Tahun Akademik </td><td> : 
          <select class="col-md-3 col-xs-12" name="thn_akad" id="thn_akad" required="required">
            <option value="">--Pilih--</option>
            <option value="2017/2018">2017/2018</option>
            <option value="2018/2019">2018/2019</option>
            <option value="2019/2020">2019/2020</option>
            <option value="2020/2021">2020/2021</option>
            </td>
       </tr>
       <tr>
         <td>Alasan cuti</td><td>  <textarea class="form-control"  name="alasan" id="alasan" required="required"></textarea></td>
       </tr>
     </table>
     </div>
      <button class="btn btn-primary btn-sm btn-simpan-cuti" style="border-radius: 1px; margin-left: 10px;" id="btnCuti"><i class="glyphicon glyphicon-ok"></i> Kirim</button>
    </form>


<script>
 $(document).ready(function(){

    $('#myCutiForm').on('submit', function(e){
      e.preventDefault();

        const url = $(this).attr('action'),
              data = $(this).serialize(),
              btn_simpan = $('.btn-simpan-cuti').text('Menyimpan...');
              btn_simpan.attr('disabled', true);

        $.ajax({
          url: url,
          method: 'post',
          data: data,
          dataType: 'json',
          success: data => {
            if (data.status == true) {

              $('#myCutiForm')[0].reset();
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