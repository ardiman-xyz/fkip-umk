
<!-- Slider Area Start -->
  <div id="rs-slider" class="slider-overlay-2">     
    <div id="home-slider">

      <?php foreach ($slider as $key => $slide): ?>
        <div class="item active">
          <img src="<?= base_url('assets/img/galeri/thumbs/'.$slide->foto) ?>" alt="Slide1" />
          <div class="slide-content">
            <div class="display-table">
              <div class="display-table-cell">
                <div class="container text-center">
                  <h1 class="slider-title" data-animation-in="fadeInLeft" data-animation-out="animate-out">WELCOME TO FKIP UMKendari</h1>
                  <p data-animation-in="fadeInUp" data-animation-out="animate-out" class="slider-desc">
                    Perguruan Tinggi Swasta Terbaik se-Sulawesi Tenggara
                  </p>  
                  <a href="https://spmb.umkendari.ac.id/" target="_blank" class="sl-get-started-btn" data-animation-in="lightSpeedIn" data-animation-out="animate-out">GET STARTED NOW</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach ?>

    </div>         
  </div>
  <!-- Slider Area End -->

  <!-- Services Start -->
    <div class="rs-services rs-services-style1">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                  <div class="services-item rs-animation-hover">
                     <a href="<?= base_url('home/sinteg') ?>" target="_blank" title="Sistem Terintegrasi"> 
                        <div class="services-icon">
                          <i class="fa fa-american-sign-language-interpreting rs-animation-scale-up"></i>                             
                        </div>
                        <div class="services-desc">
                            <h4 class="services-title">Sistem Terintegrasi</h4>
                            <p>semua sistem yang terintegrasi di fakultas FKIP</p>
                        </div>
                     </a>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6">
                  <div class="services-item rs-animation-hover">
                    <a href="https://elib.umkendari.ac.id/" title="">
                      <div class="services-icon">                             
                          <i class="fa fa-book rs-animation-scale-up"></i>
                      </div>
                      <div class="services-desc">
                          <h4 class="services-title">Books & Liberary</h4>
                          <p>Menciptakan dan memantapkan kegemaran membaca </p>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6">
                  <div class="services-item rs-animation-hover">
                      <a href="" title="">
                        <div class="services-icon">
                          <i class="fa fa-graduation-cap rs-animation-scale-up"></i>
                        </div>
                        <div class="services-desc">
                            <h4 class="services-title">Universitas</h4>
                            <p>Situs Resmi universitas muhammadiyah kendari.</p>
                        </div>
                      </a>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6">
                  <div class="services-item rs-animation-hover">
                      <div class="services-icon">
                          <i class="fa fa-graduation-cap rs-animation-scale-up"></i>
                      </div>
                      <div class="services-desc">
                          <h4 class="services-title">Certification</h4>
                          <p>Lorem ipsum dolor sit amet Sed nec molestie justo</p>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->
    
    <div style="width: 100%; margin-top:30px;  display: flex; flex-direction: column; align-items: center; justify-content: center;">
         <img src="<?= base_url('assets/informasi/rpl.png') ?>" width="1000px"> 
         <div class="news-btn" style="margin-top: 20px">
            <a href="<?= base_url('info/rpl')?>">Selengkapnya</a>
          </div>
    </div>
    <hr />
    <!-- Latest News Start -->
   <div id="rs-latest-news" class="rs-latest-news sec-spacer">
      <div class="container">
        <div class="sec-title mb-50 text-center">
            <h2>Berita Fkip</h2>      
          <p>Berbagai berita di FKIP UMKendari</p>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="news-normal-block">
              <div class="news-img">
                <a href="<?= base_url('home/baca_berita/'.$berita_terbaru->slug_berita); ?>">
                    <img src="<?= base_url("assets/img/berita/thumbs/".$berita_terbaru->gambar) ?>" alt="" width="150px" />
                </a>
              </div>
              <div class="news-date">
                <i class="fa fa-calendar-check-o"></i>
                <span><?= tanggal_indo($berita_terbaru->tanggal) ?></span>
              </div>
              <h4 class="news-title"><a href="<?= base_url('home/baca_berita/'.$berita_terbaru->slug_berita); ?>"><?= $berita_terbaru->judul ?></a></h4>
              <div class="news-desc">
                <p>
                  <?= character_limiter($berita_terbaru->isi, 170)?>
                </p>
              </div>
              <div class="news-btn">
                <a href="<?= base_url('home/baca_berita/'.$berita_terbaru->slug_berita); ?>">Read More</a>
              </div>
          </div>
          </div>
          <div class="col-md-6">
            <div class="news-list-block">

              <?php foreach ($berita as $key => $b): ?>
                <div class="news-list-item">
                  <div class="news-img">
                    <a href="<?= base_url('home/baca_berita/'.$b->slug_berita); ?>">
                        <img src="<?= base_url("assets/img/berita/thumbs/".$b->gambar) ?>" alt="" />
                    </a>
                  </div>                    
                  <div class="news-content">
                      <h5 class="news-title"><a href="<?= base_url('home/baca_berita/'.$b->slug_berita); ?>"><?= $b->judul ?></a></h5>
                      <div class="news-date">
                        <i class="fa fa-calendar-check-o"></i>
                        <span><?= tanggal_indo($b->tanggal) ?></span>
                      </div>
                      <div class="news-desc">
                        <p>
                         <?= character_limiter($berita_terbaru->isi, 95)?>
                        </p>
                      </div>
                  </div>                    
                </div>
              <?php endforeach ?>
                
              </div>
            </div>
          </div>
          <br>
          <div align="center">
            <div class="news-btn" align="center">
                <a href="<?= base_url('home/semua_berita'); ?>">Semua Berita</a>
              </div>
          </div>
      </div>
    </div>

    <!-- Latest News End -->


    <!-- Events Start -->
    <div id="rs-events" class="rs-events sec-spacer sec-color" style="padding: 40px !important">
      <div class="container">
        <div class="sec-title mb-50 text-center">
            <h2>Pengumuman</h2>      
          <p>Berbagai pengumuman yang berada di lingkup Fkip UMKendari</p>
      </div>
        <div class="row">
              <div class="col-md-12">
               <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="false" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="true" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="true" data-ipad-device-dots="true" data-md-device="3" data-md-device-nav="true" data-md-device-dots="true">

                    <?php foreach ($pengumumanList as $key => $p): ?>
                       <div class="event-item">
                          <div class="event-img">
                              <img src="<?= base_url('assets/img/pengumuman/thumbs/'.$p->gambar) ?>" alt="<?= $p->judul ?>" />
                                <a class="image-link" href="events-details.html" title="University Tour 2018">
                                    <i class="fa fa-link"></i>
                                </a>
                          </div>
                          <div class="events-details sec-color">
                            <div class="event-date">
                                <i class="fa fa-calendar"></i>
                                <span><?= $p->tanggal ?></span>
                            </div>
                            <h4 class="event-title"><a href="<?= base_url('home/baca_pengumuman/'.$p->slug_pengumuman) ?>"><?= $p->judul ?></a></h4>
                            <div class="event-btn">
                                <a href="<?= base_url('home/baca_pengumuman/'.$p->slug_pengumuman) ?>">Selengkapnya <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>  
                      </div>
                    <?php endforeach ?>
                     
                      
                  </div>
              </div>

          </div>
           <div align="center">
            <div class="news-btn" align="center">
                <a href="<?= base_url('home/semua_pengumuman'); ?>">Semua Pengumuman</a>
              </div>
          </div>
      </div>
    </div>
  <!-- Events End -->
