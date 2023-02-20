<style type="text/css">	

	#load{
		width: 100%;
		height: 100%;
		position: fixed;
		text-indent: 100%;
		background: #e0e0e0 url(<?= base_url() ?>"assets/img/loading.gif") no-repeat center;
		z-index: 1;
		opacity: 0.6;
	}

</style>

<div id="load">
</div>
	
<br>
<div class="row justy-content-center">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<!-- PAGE CONTENT BEGINS -->
		
		<div class="alert alert-block alert-success">
			<i class="ace-icon fa fa-check green"></i>
			Welcome to
			<strong class="green">
				Fkip UMKendari
			</strong>, Silhakan Daftarkan Dirimu dengan memasukkan data yang valid <br>
		</div>

		
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<div class="widget-box">
				<div class="widget-header widget-header-flat">
					<h4 class="widget-title smaller">Daftar Ujian</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main">
						 <form class="form-horizontal form-label-left" method="post" action="<?= base_url('mahasiswa/daftar_ujian/simpan')  ?>" id="myCutiForm" enctype="multipart/form-data">
                                
                            <div class="table-responsive">
                                 <table class="table">
		                     <tr>
		                       <td>Nama :</td><td>  <input type="text" name="nama" id="nama" class="col-md-8  col-xs-12" readonly="readonly" value="<?= $this->session->userdata('nama_lengkap') ?>"></td>
		                     </tr>
		                     <tr>
		                       <td>Nim  : </td><td>  <input type="text" name="nim" id="nim" class="col-md-3  col-xs-12" readonly="readonly" value="<?= $this->session->userdata('nim') ?>"></td>
		                     </tr>
		                     <tr>
		                       <td>Program Studi : </td><td>  
		                        <select class="col-md-6 col-xs-12" name="prodi" id="prodi" required="required">
		                          <option value="">--Pilih--</option>
		                           <?php foreach ($prodi as $data): ?>
		                            <option value="<?= $data->id_prodi ?>"><?= $data->nama_prodi ?></option>
		                          <?php endforeach ?>
		                        </select></td>
		                     </tr>
		                    <tr>
		                       <td>Jenis Ujian : </td><td>  
		                         <select class="col-md-3 col-xs-12" name="jenis_ujian" id="jenis_ujian" required="required">
		                          <option value="">--Pilih--</option>
		                          <?php foreach ($jenis_ujian as $data): ?>
		                            <option value="<?= $data->id_ujian ?>"><?= $data->nama_ujian ?></option>
		                          <?php endforeach ?>
		                      </td>
		                     </tr>
		                    <tr>
		                     	<?php 

		                     		$semester = ['1','2','3','4','5','6','7','8','9','10','11','12','13','14'];

		                     	 ?>
		                       <td>Semester :  </td><td> 
		                        <select class="col-md-3 col-xs-12" name="semester" id="semester" required="required">
		                          <option value="">--Pilih--</option>
		                          <?php foreach ($semester as $smt): ?>
		                          	<option value="<?= $smt ?>"><?= $smt ?></option>
		                          <?php endforeach ?>
		                          <input type="hidden" name="smt"></td>
		                     </tr>
		                      <tr>
		                       <td>No. HP : </td><td>  <input type="text" name="no_hp" id="no_hp" class="col-md-5  col-xs-12" required="required" placeholder="masukkan no hp yang aktif"></td>
		                     </tr>
		                      <tr>
		                       <td>Tgl. Pembayaran : </td><td>  <input type="date" name="tgl_bayar" id="tgl_bayar" class="col-md-3  col-xs-12" required="required"></td>
		                     </tr>
		                   </table>
                            </div>
		                  
		                    <div class="alert alert-info"><i class="fa fa-info-circle"></i> silahkan pilih program studi untuk melihat syarat!!</div>
		                  
		                   <div id="show"></div>

		                  <p class="mb-0"><button style="border-radius: 1px" class="btn btn-primary btn-sm" name="submit">Kirim <span class="ion-ios-arrow-round-forward"></span></button></p>
		                  </form>
					</div>
				</div>


			</div>
		</div>
	</div>
</div>


  <script type="text/javascript">
  $(document).ready(function(){

  	$("#load").fadeOut(1000);

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
       </tr>
       <tr>
         <td>Bukti Turnitin <small>(max 30%)</small></td><td>: <input type="file" name="turnitin" required></td>
       </tr>
       `;

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
       </tr>
        <tr>
         <td>Bukti Turnitin <small>(max 30%)</small></td><td>: <input type="file" name="turnitin" required></td>
       </tr>
       `;
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
	  title: 'gagal',
	  message: 'nim & jenis ujian anda sudah terdaftar, silahkan hubungi admin!',
	  // position: 'topCenter'
	});
</script>
<?php endif ?>