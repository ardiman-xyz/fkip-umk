<style type="text/css">
  .bg{
    background-image: url(<?= base_url("assets/img/bg.png") ?>);
    background-color: rgb(249,249,249);

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
          <ol class="breadcrumb" style="border-radius: 0px !important; box-shadow: 2px black; background-color: white">
            <li class="breadcrumb-item"><a href="<?= base_url('site/adm') ?>">Home</a></li>
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
    <div class="col-md-9 justy-content-center mb-2">
      <div class="card" style="border-radius: 0px !important;">
        <img src="<?= base_url('assets/adm/file_upload/'.$berita->gambar) ?>" alt="<?= $berita->judul ?>" width="100%">
        <div class="card-body">
         <div class="post-thumb">
            <div class="post-content">
              <h3><?= $berita->judul ?></h3>
              <p> By <?= $berita->penulis ?> <?= $berita->date_created; ?>, <i class="fa fa-eye"> 0 </i> <i class="fa fa-comment"></i> 0</p>
              <p>share :  
               <a href="https://twitter.com/intent/tweet?url=http://www.fkipumkendari.ac.id/site/adm/baca_berita/<?= $berita->slug ?>" target="_blank" class="btn btn-primary btn-sm" style="border-radius: 3px"><i class="fa fa-twitter"></i> twitter</a> 

                <a href="http://www.facebook.com/sharer.php?u=http://www.fkipumkendari.ac.id/site/adm/baca_berita/<?= $berita->slug ?>" target="_blank" style="background-color: #1A7CDE; color: #fff;border-radius: 3px" class="btn btn-sm" ><i class="fa fa-facebook"></i> facebook</a>

                <a href="https://plus.google.com/share?url=http://www.fkipumkendari.ac.id/site/adm/baca_berita/<?= $berita->slug ?>" target="_blank" class="btn btn-danger btn-sm" style="border-radius: 3px"><i class="fa fa-google-plus"></i> Google</a>

                <a target="_blank" href="whatsapp://send?text=http://www.fkipumkendari.ac.id/site/adm/baca_berita/<?= $berita->slug ?>" class="btn btn-success btn-sm" style="border-radius: 3px;color: #fff"><i class="fa fa-whatsapp"></i> whatsapp</a>
              </p>
              <hr>
              <p class="isi_berita"><?= $berita->isi ?></p>
            </div>
         </div>
        </div>
      </div>
    </div>
     <div class="col-md-3">
        <div class="card" style="border-radius: 1px !important;">
          <div class="card-body">
            <?php foreach ($berita_lain as $data): ?>
              <h6 class="card-title"><a href="<?= base_url('site/adm/baca_berita/'.$data->slug); ?>"><?= $data->judul ?></a></h6>
              <h6 class="card-subtitle mb-2 text-muted"><?= $data->date_created ?></h6>
              <hr>
            <?php endforeach ?>
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

