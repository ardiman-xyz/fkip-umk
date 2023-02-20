<?php  
  $tgl_now = date('d-m-Y');
?>
 <br>
<?php if ($tgl_now < tgl_jadwal($tgl->tgl_start) ): ?>
  <div class="container">
    <div class="row justy-content-center">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <!-- PAGE CONTENT BEGINS -->
       <h3 class="header smaller lighter green">
            <i class="ace-icon fa fa-bullhorn"></i>
            Pemberitahuan !
          </h3>

          <div class="alert alert-warning">
            <strong>
              <i class="ace-icon fa fa-warning"></i>
              PESAN!
            </strong>
              PENDAFTARAN BELUM TERBUKA!
            <br />
          </div>
      </div>
    </div>
  </div>
  <?php elseif($tgl_now > tgl_jadwal($tgl->tgl_end)): ?>
    <div class="container">
    <div class="row justy-content-center">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <!-- PAGE CONTENT BEGINS -->
        
        <h3 class="header smaller lighter green">
            <i class="ace-icon fa fa-bullhorn"></i>
            Pemberitahuan !
          </h3>

          <div class="alert alert-warning">
            <strong>
              <i class="ace-icon fa fa-warning"></i>
              PESAN!
            </strong>
              PENDAFTARAN SUDAH BERAKHIR!
            <br />
          </div>
      </div>
    </div>
  </div>
<?php else: ?>

  <div class="container">
    <div class="row justy-content-center">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <!-- PAGE CONTENT BEGINS -->
        <h3 class="header smaller lighter green">
            <i class="ace-icon fa fa-bullhorn"></i>
            Pemberitahuan !
          </h3>
        <div class="alert alert-block alert-warning">
          <i class="ace-icon fa fa-warning"></i>
            Silahkan mengupload file yang dibutuhkan <strong>dengan data yang benar!</strong>
        </div>
        <span id="message"></span>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <div class="widget-box">
          <div class="widget-header widget-header-flat">
            <h4 class="widget-title smaller">isi form dengan data yang valid!</h4>
          </div>

          <div class="widget-body">
            <div class="widget-main">
              <form class="form-horizontal form-label-left" method="post" action="<?= base_url('mahasiswa/magang/add') ?>" id="magang" enctype="multipart/form-data">
                <div class="table-responsive">
                  <table class="table">
                   <tr>
                         <td>Nama :</td><td>  <input type="text" name="nama" id="nama" class="col-md-8  col-xs-12" readonly="readonly" value="<?= $this->session->userdata('nama_lengkap') ?>"></td>
                       </tr>
                       <tr>
                         <td>Nim  : </td><td>  <input type="text" name="nim" id="nim" class="col-md-3  col-xs-12" readonly="readonly" value="<?= $this->session->userdata('nim') ?>"></td>
                       </tr>
                        <tr>
                         <td>Program Studi  : </td>
                         <td>
                           <select name="id_prodi" required class="form-control col-md-6 col-xs-12" required="required">
                             <option value="">--Pilih--</option>
                             <?php foreach ($prodi as $data): ?>
                               <option value="<?= $data->id_prodi ?>"><?= $data->nama_prodi ?></option>
                             <?php endforeach ?>
                           </select>
                         </td>
                       </tr>
                       <tr>
                         <td>Lokasi Magang/PLP  : </td>
                         <td>
                           <select name="lokasi" required class="form-control col-md-4 col-xs-12" id="lokasi" required="required">
                             <option value="">--Pilih--</option>
                             <?php foreach ($lokasi as $data): ?>
                               <option value="<?= $data->id ?>"><?= $data->nama_sekolah ?></option>
                             <?php endforeach ?>
                           </select>
                         </td>
                       </tr>
                       <tr>
                         <td>Program : </td><td><select name="program" id="program" class="form-control col-md-4" required="required">
                           <option value="">--Pilih program--</option>
                           <option value="plp">PLP</option>
                           <option value="magang">MAGANG</option>
                         </select></td>
                       </tr>
                       <tr>
                         <td>Upload Formulir (pdf) : </td><td>  <input type="file" name="formulir" id="formulir" class="col-md-5  col-xs-12"></td>
                       </tr>
                       <tr>
                         <td>Upload bukti bayar (pdf) : </td><td>  <input type="file" name="bukti_bayar" id="bukti_bayar" class="col-md-5  col-xs-12"></td>
                       </tr>
                </table>
                </div>
                 <p class="mb-0"><button style="border-radius: 1px; display: flex; align-items: center;" type="submit" class="btn btn-primary" name="submit" id="add">  
                 Kirim 
                 <svg id="sfg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; shape-rendering: auto; display: none" width="30px" height="20px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"> <rect x="17.5" y="30" width="15" height="40" fill="#ecf9ff"> <animate attributeName="y" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="18;30;30" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.2s"></animate> <animate attributeName="height" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="64;40;40" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.2s"></animate> </rect> <rect x="42.5" y="30" width="15" height="40" fill="#d5e8ff"> <animate attributeName="y" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="20.999999999999996;30;30" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.1s"></animate> <animate attributeName="height" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="58.00000000000001;40;40" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.1s"></animate> </rect> <rect x="67.5" y="30" width="15" height="40" fill="#c9e8fc"> <animate attributeName="y" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="20.999999999999996;30;30" keySplines="0 0.5 0.5 1;0 0.5 0.5 1"></animate> <animate attributeName="height" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="58.00000000000001;40;40" keySplines="0 0.5 0.5 1;0 0.5 0.5 1"></animate> </rect> </svg>
               </button></p>
              </form>
            </div>
          </div>
        </div>
    </div>
     </div>
  </div>

  <script type="text/javascript">
    const base_url = '<?= base_url() ?>';
  </script>
  <script type="text/javascript" src="<?= base_url() ?>assets/js/myScript/addmagang.js"></script> 

<?php endif ?>
