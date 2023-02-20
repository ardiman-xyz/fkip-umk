<style type="text/css">
  .bg{
    background-image: url(<?= base_url("assets/img/bg.png") ?>);

  }

  #headingOne, #headingTwo{
    padding: 0 !important;
  }

  #headingOne button{
    /*color: hove*/
    text-decoration: none
  }

  #headingOne button:hover{
    /*color: hove*/
    color: black
  }

  #headingTwo button{
    /*color: hove*/
    text-decoration: none
  }

  #headingTwo button:hover{
    /*color: hove*/
    color: black
  }
</style>

<div class="bg">
  <br>
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <nav aria-label="breadcrumb" >
          <ol class="breadcrumb" style="border-radius: 0px !important; box-shadow: 1px 1px #e0e0d1 !important">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-no-pt ftc-no-pb mb-1">
<div class="container" style="margin-bottom: 5px">
  <div class="row ">
    <div class="col-md-9 justy-content-center">
      <div class="card" style="border-radius: 0px !important; box-shadow: 1px 1px #e0e0d1 !important">
        <div class="card-body">
         <div class="post-thumb">
            <div class="post-content">
              
              <div class="card border-light mb-3 mt-2" style="max-width: 1000px; text-align: justify;">
                <div class="row no-gutters">
                  <div class="col-md-3 col-xs-1">
                    <img src="<?= base_url('assets/img/dosen/'.$dosen->foto_dosen) ?>" class="card-img" alt="<?= $dosen->nama_dosen ?>">
                  </div>
                  <div class="col-md-9">
                    <div class="card-body"  style="color: black;">
                      <?php if (!empty($informasi_dosen)): ?>
                        <p><?= $informasi_dosen->profil_dosen ?></p>

                      <?php else: ?>
                        <p>--Belum ada data--</p>
                      <?php endif ?>
                    </div>
                  </div>
                </div>
              </div>
              <hr>



              <div style="text-transform: capitalize;">
                <div class="row">

                    <div class="col-md-12">
                      <ul class="nav nav-tabs" id="myTab" role="tablist" >

                        <li class="nav-item">
                          <a class="nav-link active" id="pengajaran-tab" data-toggle="tab" href="#pengajaran" role="tab" aria-controls="pengajaran" aria-selected="false">Pengajaran</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="home-tab" data-toggle="tab" href="#penelitian" role="tab" aria-controls="penelitian" aria-selected="true">Penelitian</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="publikasi-tab" data-toggle="tab" href="#publikasi" role="tab" aria-controls="publikasi" aria-selected="false">Publikasi</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="kontak-tab" data-toggle="tab" href="#kontak" role="tab" aria-controls="kontak" aria-selected="false">Kontak</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="rip-tab" data-toggle="tab" href="#rip" role="tab" aria-controls="rip" aria-selected="false">RIP</a>
                        </li>
                         <li class="nav-item">
                          <a class="nav-link" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="false">Login</a>
                        </li>

                      </ul>

                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade  " id="penelitian" role="tabpanel" aria-labelledby="penelitian-tab">
                          <div class="container mt-3">
                            <div class="card" style="color: black" >
                              <div class="card-header">
                                Penelitian
                              </div>
                              <div class="card-body">
                                 <?php if ($informasi_dosen != null): ?>
                                   <?= $informasi_dosen->penelitian ?>
                                    <?php else: ?>
                                      <p>--Tidak Ada Data--</p>
                                 <?php endif ?>
                                 <hr>
                                 <!--<h4>Mahasiswa Bimbingan Saat Ini : <?= count($jmlBelumSelesai) ?> Orang </h4>-->
                                <!--<blockquote class="blockquote mb-0" >-->
                                <!--    <footer class="blockquote-footer"><cite title="Source Title">Mahasiswa Bimbingan Saat Ini : <?= count($jmlBelumSelesai) ?> Orang</cite></footer>-->
                                <!--</blockquote>-->
                                <div class="table-responsive" style="font-size:16px">
                                    <table class="table table-bordered table-hover table-sm" id="example1">
                                  <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Nim</th>
                                      <th width="150px">Nama</th>
                                      <th>Judul penelitian</th>
                                      <th>Jurusan</th>
                                      <th>Status</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach ($jumlahMahasiswaBimbingan as $key => $jmb): 
                                      $status = $this->dosen->getStatusUjianMhs($jmb->nim)['status'];
                                      ?>
                                      <tr>
                                        <td><?= $key+1 ?></td>
                                        <td><?= $jmb->nim ?></td>
                                        <td><?= $jmb->nama_mhs ?></td>
                                        <td><?= $jmb->judul ?></td>
                                        <td><?= $jmb->nama_prodi ?></td>
                                        <td><?= $status ?></td>
                                      </tr>
                                    <?php endforeach ?>
                                  </tbody>
                                </table>  
                                </div>     
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- publikasi -->
                        <div class="tab-pane fade " id="publikasi" role="tabpanel" aria-labelledby="publikasi-tab">
                          <div class="card mt-3"  style="color: black">
                              <div class="card-header">
                                Publikasi
                              </div>
                              <div class="card-body " >
                                <?php if ($informasi_dosen != null): ?>
                                 <?= $informasi_dosen->publikasi ?>
                                  <?php else: ?>
                                    <p>--Tidak Ada Data--</p>
                                 <?php endif ?>
                              </div>
                            </div>

                        </div>
                        <!-- end publikasi -->

                        <!-- pengajaran -->
                        <div class="tab-pane fade show active" id="pengajaran" role="tabpanel" aria-labelledby="pengajaran-tab">
                          <div class="card mt-3"  style="color: black">
                              <div class="card-header">
                               Pengajaran
                              </div>
                              <div class="card-body" style="text-transform: capitalize;">
                                 <?php if ($informasi_dosen != null): ?>
                                 <?= $informasi_dosen->pengajaran ?>
                                  <?php else: ?>
                                    <p>--Tidak Ada Data--</p>
                                 <?php endif ?>
                              </div>
                            </div>
                        </div>
                        <!-- end pengajaran -->

                        <!-- Kontak -->
                        <div class="tab-pane fade" id="kontak" role="tabpanel" aria-labelledby="kontak-tab">
                          <div class="card mt-3"  style="color: black">
                              <div class="card-header">
                               Kontak
                              </div>
                              <div class="card-body">
                                <p class="card-text"><?= $dosen->alamat_dosen ?></p>

                                <p  class="card-text" style="font-style: italic">Alamat Surel</p>
                                <ul>
                                  <li><a target="_blank" href="<?= $dosen->email_dosen ?>"><?= $dosen->email_dosen ?></a></li>
                                </ul>
                              <!--   <a href="https://api.whatsapp.com/send?phone=6282293696251&text=Hallo%20Agan%20Baik" class="btn btn-success"><i class="fa fa-whatsapp"> Chat Whatsapp</i></a> -->
                                <!-- <a href="https://api.whatsapp.com/send?phone=6282293696251&text=Hallo%20Agan%20Baik"><img src="tombol.png">share on whatsapp</a> -->
                              </div>
                            </div>
                        </div> 
                        <!-- end kontak -->

                        <!-- RIP -->
                        <div class="tab-pane fade" id="rip" role="tabpanel" aria-labelledby="rip-tab">
                          <div class="card mt-3"  style="color: black">
                              <div class="card-header">
                               Rip
                              </div>
                              <div class="card-body">
                                 <?php if (!empty($informasi_dosen->rip)): ?>
                                 <p>silahkan download Rip Di <a href="<?= base_url('home/download/'.$dosen->NIDN) ?>"> sini</a></p>
                                  <?php else: ?>
                                    <p>--Tidak Ada Rip--</p>
                                 <?php endif ?>
                              </div>
                            </div>
                        </div>
                        <!-- And Rip -->

                        <!-- Login -->
                        <div class="tab-pane fade" id="login" role="tabpanel" aria-labelledby="login-tab">
                          <div class="alert alert-warning mt-3">
                              <i class="fa fa-warning"></i> Silahkan Login Untuk melengkapi/mengubah data diri anda!
                            </div>
                            <div id="infoMessage" class="text-center"></div>
                          <div class="card mt-3"  style="color: black">
                              <div class="card-header">
                               Halaman Login : <b><?= $dosen->nama_dosen ?></b>
                              </div>
                              <div class="card-body">
                                <form class="form-horizontal" id="formLoginDosen" action="<?= base_url('dosen/cek_login') ?>">
                                 <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Username </label>

                                    <div class="col-sm-9">
                                      <input type="text" id="nidn" placeholder="Username" class="col-xs-10 col-sm-5" name="nidn" value="<?= $dosen->NIDN ?>" readonly/>
                                    </div>
                                  </div>
                                   <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right"> Password </label>

                                    <div class="col-sm-9">
                                      <input type="password" name="password" id="password" placeholder="Password" class="col-xs-10 col-sm-5" />
                                    </div>
                                  </div>
                                   <div class="form-group">
                                    <div class="col-sm-9">
                                      <button type="submit" id="submit" class="btn btn-primary" style="border-radius: 2px">Login</button>
                                    </div>
                                  </div>
                               </form>
                              </div>
                            </div>
                        </div>
                        <!-- And Login -->
                    </div>

                    </div>
                  </div>
              </div>

            </div>
         </div>
        </div>
      </div>
    </div>
     <div class="col-md-3">
       <div class="card" style="border-radius: 0px !important;">
          <div class="card-body" align="center" style="padding: 1px">
           <img src="<?= base_url() ?>assets/img/link.png" width="274">
          </div>
        </div>
         <div class="card mt-2" style="border-radius: 0px !important;">
          <div class="card-body" align="center">
            <a href="https://simak.umkendari.ac.id/" target="_blank"><img src="<?= base_url('assets/') ?>img/cerdas.jpg" class="img-responsive" height="100"></a>
          </div>
        </div>
        <div class="card mt-2" style="border-radius: 0px !important;">
          <div class="card-body" align="center">
           <a href="https://elib.umkendari.ac.id/" target="_blank"> <img src="<?= base_url('assets/') ?>img/e-library.png" width="250"></a>
          </div>
        </div>
         <div class="card mt-2" style="border-radius: 0px !important;">
          <div class="card-body" align="center">
           <h3>Berita Akademik</h3>
          </div>
        </div>
      </div>
  </div>
</div>
<br>

<script type="text/javascript">
 $(document).ready(function(){

  $('form#formLoginDosen').on('submit', function (e) {
    e.preventDefault();

    var username = $("#username").val();
    var password = $("#password").val();

    if (password.length == 0) {
      alert('Password harus diisi!');
    } else {

    var url = $("#formLoginDosen").attr('action');
    var data = $("#formLoginDosen").serialize();
    var base_url = '<?= base_url() ?>';

    var infobox = $('#infoMessage');
        infobox.addClass('alert alert-info').text('Checking...');

    var btnsubmit = $('#submit');
        btnsubmit.attr('disabled', 'disabled').html('<i class="fa fa-spin fa-spinner"></i> Wait....');

        $.ajax({
          url: url,
          type: 'post',
          data: data,
          success: function(data)
          {
            infobox.removeAttr('class').text('');
              btnsubmit.removeAttr('disabled').html('Login');

               if(data.status){
                  infobox.addClass('alert alert-success text-center').text('Login Sukses');
                  var go = base_url + data.url;
                  window.location.href = go;
              }else{
              
               if(data.failed){
                    infobox.addClass('alert alert-danger text-center').text(data.failed);
                }
              }

          }

        });
    }

  });

});
</script>

