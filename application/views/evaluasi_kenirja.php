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
   .tct{
    color: blue;
    cursor: pointer;
  }
  .tct:hover{
    color: green
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
<div class="container">
  <div class="row ">
    <div class="col-md-9 justy-content-center">
      <div class="card" style="border-radius: 0px !important; box-shadow: 1px 1px #e0e0d1 !important">
        <div class="card-body">
         <div class="post-thumb">
            <div class="post-content">
             
              <h4>Evaluasi Kinerja</h4>
              <ul>
                  <li><a target="_blank" href="<?= base_url('assets/upload/evaluasi/') ?>C.2._LAP_SURVEY_2019_PELAYANAN_ADMINISTRASI_Fakultas_dan_Prodi.pdf">Laporan Survey 2019 Pelayanan administrasi prodi dan fakultas</a></li>
                  <li><a target="_blank" href="<?= base_url('assets/upload/evaluasi/') ?>C.2._Laporan_2021_AMI_APS_4.0_Prodi_PTI.pdf">Laporan AMI APS Prodi PTI</a></li>
                   <li><a target="_blank" href="<?= base_url('assets/upload/evaluasi/') ?>C2.Laporan_Audit_Mutu_Internal_Sillus_I.pdf">Laporan Audit Mutu Internal Ssillus I</a></li>
                    <li><a target="_blank" href="<?= base_url('assets/upload/evaluasi/') ?>C2.Laporan_Audit_Mutu_Internal_Siklus_2_2017.pdf">Laporan Audit Mutu Internal Sillus II</a></li>
                     <li><a target="_blank" href="<?= base_url('assets/upload/evaluasi/') ?>LAP_SURVEY_2020_KINERJA_DOSEN.pdf">Laporan Survey kenierja dosen 2020</a></li>
              </ul>

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
</section>
<br>
</div>

