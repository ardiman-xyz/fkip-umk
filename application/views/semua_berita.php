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

  .card{
    border-bottom: 1px solid green
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
<section class="ftco-section ftco-no-pt ftc-no-pb">
<div class="container">
  <div class="row ">
    <div class="col-md-9 justy-content-center">
        <div class="card mb-3" style="border-radius: 0; padding: 0">
        <?php foreach ($berita as $row): ?>
          <div class="row no-gutters p-1">
            <div class="col-md-4">
              <img src="<?= base_url('assets/img/berita/'.$row->gambar); ?>" class="card-img" alt="..." style="border-radius: 0;">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"><a href="<?= base_url('home/baca_berita/'.$row->slug_berita); ?>"><?= $row->judul; ?></a></h5>
                <p class="card-text"><?= character_limiter($row->isi, 200) ?></p>
                <p class="card-text"><small class="text-muted"><?= date('d M Y - H:m', strtotime($row->tanggal)); ?></small></p>
              </div>
            </div>
          </div>
        <?php endforeach ?>

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
