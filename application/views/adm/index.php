<section class="home-slider owl-carousel">
 <?php foreach ($slider as $slide): ?>
    <div class="slider-item" style="background-image:url(<?= base_url('assets/adm/file_upload/'.$slide->foto) ?>);">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
      <div class="col-md-8 text-center ftco-animate">
        <!-- <h1 class="mb-4">Kids Are The Best <span>Explorers In The World</span></h1> -->
      </div>
    </div>
    </div>
  </div>
 <?php endforeach ?>
</section>

 <section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-2">
      <div class="col-md-8 text-center heading-section ftco-animate">
        <h2 class="mb-4"><span>Berita</span></h2>
        <p>Berbagai berita di lingkup Prodi</p>
      </div>
    </div>
    <div class="row">

     <?php foreach ($berita as $item): ?>
        <div class="col-md-6 col-lg-4 ftco-animate">
        <div class="blog-entry">
          <a href="<?= base_url('site/adm/baca_berita/'.$item->slug); ?>" class="block-20 d-flex align-items-end" style="background-image: url('<?= base_url("assets/adm/file_upload/".$item->gambar) ?>');">
            <div class="meta-date text-center p-2">
              <span class="day"><?= tgl($item->date_created) ?></span>
              <span class="mos"> <?= nama_hari_indo($item->date_created) ?></span>
              <span class="yr"><?= thn_adm($item->date_created) ?></span>
            </div>
          </a>
          <div class="text bg-white p-4">
            <h3 class="heading"><a href="<?= base_url('site/adm/baca_berita/'.$item->slug); ?>"><?= $item->judul ?></a></h3>
            <p><?= character_limiter($item->isi, 150)?></p>
            <div class="d-flex align-items-center mt-4">
              <p class="mb-0"><a href="<?= base_url('site/adm/baca_berita/'.$item->slug); ?>" class="btn btn-secondary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
              <p class="ml-auto mb-0">
                <a href="#" class="mr-2"><?= $item->penulis ?></a>
                <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
              </p>
            </div>
          </div>

        </div>
      </div>
     <?php endforeach ?>
    </div>
  </div>
     <div align="center">
       <p class="mb-0"><a href="<?= base_url('site/adm/semua_berita') ?>" class="btn btn-primary">Semua Berita <span class="ion-ios-arrow-round-forward"></span></a></p>
     </div>
</section>

<section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-2">

          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4"><span>Pengumuman</span></h2>
            <p>Berbagai pengumuman di lingkup prodi UMKendari</p>
          </div>
        </div>  
        <div class="row">

          <?php foreach ($pengumuman as $row): ?>
          <div class="col-md-6 course d-lg-flex ftco-animate">
            <div class="img" style="background-image: url(<?= base_url('assets/adm/file_upload/'.$row->gambar) ?>);"></div>
            <div class="text bg-light p-4">
              <h3><a href="<?= base_url('site/adm/baca_pengumuman'.$row->slug); ?>"><span style="font-size: 17px; font-weight: bold"><?= $row->judul ?></span></a></h3>
              <p class="subheading"><span> Date: </span><small class="text-muted"><?= date('d M Y ', strtotime($row->date_created)); ?></small></p>
              <p><?= character_limiter($row->isi, 100)?></p>

              <p class="text-right"><a href="<?= base_url('site/adm/baca_pengumuman/'.$row->slug); ?>">selengkapnya <span class="ion-ios-arrow-round-forward"></span></a></p>
            </div>
          </div>
          <?php endforeach ?>

        </div>
      </div>
    </section>