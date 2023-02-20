 <section class="hero-wrap hero-wrap-2" style="background-image: url('<?= base_url("assets/") ?>images/bg_2.jpg');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread"><?= $title ?></h1>
        <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url() ?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span><?= $title ?><i class="ion-ios-arrow-forward"></i></span></p>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-no-pt ftc-no-pb">
  <div class="container">
    <div class="row">
      <div class="col-md-4 order-md-last wrap-about py-5 wrap-about bg-light">
        <div class="text px-4 ftco-animate">
          <h4>pengumuman Terbaru</h4>
          <ul class="latest-post">
            <li class="single-latest-post">
              <div class="latest-post-img">
                <a href="#"><img src="assets/img/blog/1.jpg" class="img-fluid" alt="Blog-image"></a>
              </div>
              <h5><a href="single-blog.html">Awesome Blog Title</a></h5>
              <p><a href="#">12 Feb, 2020</a></p>
            </li>
            <li class="single-latest-post">
              <div class="latest-post-img">
                <a href="#"><img src="assets/img/blog/2.jpg" class="img-fluid" alt="Blog-image"></a>
              </div>
              <h5><a href="single-blog.html">Awesome Blog Title</a></h5>
              <p><a href="#">12 Feb, 2020</a></p>
            </li>
            <li class="single-latest-post">
              <div class="latest-post-img">
                <a href="#"><img src="assets/img/blog/3.jpg" class="img-fluid" alt="Blog-image"></a>
              </div>
              <h5><a href="single-blog.html">Awesome Blog Title</a></h5>
              <p><a href="#">12 Feb, 2020</a></p>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-md-8 wrap-about py-5 pr-md-4 ftco-animate">
       <?php foreach($pengumuman as $row ) : ?>
              <div class="card mb-2"><span class="border-bottom border-success"></span>
                  <div class="row no-gutters p-1">
                      <div class="col-md-4">
                          <img src="<?= base_url('assets/img/pengumuman/'.$row->gambar); ?>" class="card-img" alt="..." height="180">
                      </div>
                      <div class="col-md-8">
                          <div class="card-body">
                              <h5 class="card-title"><a style="color:black;" href="<?= base_url('home/baca_pengumuman/'.$row->slug_pengumuman); ?>"><?= $row->judul; ?></a></h5>
                              <p class="card-text"><small class="text-muted"><i class="far fa-clock"></i> <?= date('d M Y - H:m', strtotime($row->tanggal)); ?> WIB</small></p>
                              <p class="card-text"><?= character_limiter($row->isi_pengumuman, 150) ?></p>
                              
                          </div>
                      </div>
                  </div>
              </div>
          <?php endforeach ?>
            <br>
          <?= $this->pagination->create_links(); ?>

        </div>
      </div>
    </div>
  </div>
</section>