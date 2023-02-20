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
     <!--  <img src="<?= base_url('assets/img/berita/'.$baca_berita->gambar) ?>" alt="<?= $baca_berita->judul ?>" width="100%"> -->
        <div class="card-body">
         <div class="post-thumb">
            <div class="post-content">
             
             <table class="table table-bordered table-hover">
               <thead>
                 <tr>
                   <th class="text-center">No</th>
                   <th class="text-center">Beasiswa</th>
                 </tr>
               </thead>
               <tbody>
                 <tr>
                   <td class="text-center">1</td>
                   <td>BEASISWA SSO ( Seni, Sains, dan Olahraga )</td>
                 </tr>
                 <tr>
                   <td class="text-center">2</td>
                   <td>BEASISWA HAFIDZ</td>
                 </tr>
                 <tr>
                   <td class="text-center">3</td>
                   <td>BEASISWA PERSYARIKATAN</td>
                 </tr>
                 <tr>
                   <td class="text-center">4</td>
                   <td>BEASISWA ON GOING : </td>
                 </tr>
                 <tr>
                  <td></td>
                   <td>- Beasiswa Peningkatang Prestasi Akademik (PPA)</td>
                 </tr>
                 <tr>
                  <td></td>
                   <td>- Beasiswa Rektor (Al-Maun)</td>
                 </tr>
                 <tr>
                  <td></td>
                   <td>- Beasiswa Perbankan</td>
                 </tr>
                  <tr>
                  <td></td>
                   <td>- Beasiswa Perusahaan Mitra</td>
                 </tr>
                 <tr>
                  <td></td>
                   <td>- Beasiswa BIDIK MISI</td>
                 </tr>
                 <tr>
                  <td></td>
                   <td>- Beasiswa Lainnya</td>
                 </tr>
               </tbody>
             </table>

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
