<style type="text/css">

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

<div class="">
  <br>
<section>
  <div class="container">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" >
          <ol class="breadcrumb" style="border-radius: 0px !important; box-shadow: 2px black; background-color: white">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>

<!-- Blog Single Start Here -->
    <div class="single-blog-details" style="margin-bottom: 10px !important">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-12">
            <div class="single-image">
              <img src="<?= base_url('assets/img/berita/'.$baca_berita->gambar) ?>" alt="single" width="100%">
            </div><!-- .single-image End -->
            <h5 class="top-title"><?= $baca_berita->judul ?></h5>
            <p><?= $baca_berita->isi ?></p>
            <div class="share-section">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 life-style">
                  <span class="author"> 
                    <a href="#"><i class="fa fa-user-o" aria-hidden="true"></i> <?= $baca_berita->nama_user ?> </a>
                  </span> 
                  <span class="comment"> 
                    <a href="#"> 
                      <i class="fa fa-commenting-o" aria-hidden="true"></i> 12
                    </a>
                  </span>
                  <span class="date">
                    <i class="fa fa-calendar" aria-hidden="true"></i> <?= tanggal_indo($baca_berita->tanggal); ?>
                  </span>
                  <span class="cat">
                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?= $baca_berita->view_berita ?> </a>
                  </span>
                </div>
              </div>
            </div><!-- .share-section End -->

            <div class="share-section2">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <span> You Can Share It : </span>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <ul class="share-link">
                    <li><a href="http://www.facebook.com/sharer.php?u=http://www.fkipumkendari.ac.id/home/baca_berita/<?= $baca_berita->slug_berita ?>" target="_blank"> <i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a></li>
                    <li><a href="https://twitter.com/intent/tweet?url=http://www.fkipumkendari.ac.id/home/baca_berita/<?= $baca_berita->slug_berita ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></li>
                    <!-- <li><a href="https://plus.google.com/share?url=http://www.fkipumkendari.ac.id/home/baca_berita/<?= $baca_berita->slug_berita ?>" target="_blank"><i class="fa fa-google" aria-hidden="true"></i> Google</a></li> -->
                    <li><a href="whatsapp://send?text=http://www.fkipumkendari.ac.id/home/baca_berita/<?= $baca_berita->slug_berita ?>" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i> Whatsapp</a></li>
                  </ul>
                </div>
              </div>
            </div><!-- .share-section2 End -->

            
            <div class="leave-comments-area">
                 <div id="disqus_thread"></div>
                    <script>

                    /**
                    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                    /*
                    var disqus_config = function () {
                    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    };
                    */
                    (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = 'https://fkipumkendari.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                    })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                                
            </div><!-- .leave-comments-area end -->  
            
                                           
          </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-area">
                    <div class="search-box">
                        <h3 class="title">Search Courses</h3>
                        <div class="box-search">
                           <form action="#" method="post" accept-charset="utf-8">
                              <input class="form-control" placeholder="Search Here ..." name="srch-term" id="srch-term" type="text">
                              <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                           </form>
                        </div>
                    </div><!-- .search-box end -->
                    
                    <div class="latest-courses">
                        <h3 class="title">Latest News</h3>

                        <?php foreach ($berita_lain as $key => $bl): ?>
                          <div class="post-item">
                            <div class="post-img">
                                <a href="<?= base_url('home/baca_berita/'.$bl->slug_berita) ?>"><img src="<?= base_url('assets/img/berita/'.$bl->gambar) ?>" alt="" title="News image"></a>
                            </div>
                            <div class="post-desc">
                                <h4><a href="<?= base_url('home/baca_berita/'.$bl->slug_berita) ?>"><?= $bl->judul ?></a></h4>
                                <span class="duration"> 
                                    <i class="fa fa-clock-o" aria-hidden="true"></i> <?= tanggal_indo($bl->tanggal) ?>
                                </span> 
                            </div>
                          </div><!-- .post-item end -->
                        <?php endforeach ?>
                      
                    </div>
                    <div class="tags-cloud clearfix">
                        <h3 class="title">Product Tags</h3>
                        <ul>
                            <li>
                                <a href="#">SCIENCE</a>
                            </li>
                            <li>
                                <a href="#">HUMANITIES</a>
                            </li>
                            <li>
                                <a href="#">DIPLOMA</a>
                            </li>
                            <li>
                                <a href="#">BUSINESS</a>
                            </li>
                            <li>
                                <a href="#">SPROTS</a>
                            </li>
                            <li>
                                <a href="#">RESEARCH</a>
                            </li>
                            <li>
                                <a href="#">ARTS</a>
                            </li>
                            <li>
                                <a href="#">ADMISSIONS</a>
                            </li>
                        </ul>
                    </div><!-- .tags-cloud end --> 
                    <div class="newsletter">
                        <h4>Newsletter</h4>
                        <p>Sign up for our Newsletter !</p>
                        <div class="box-newsletter">
                            <input class="form-control" placeholder="support@rstheme.com" name="newsletter-term" id="newsletter-term" type="text">
                            <button class="btn btn-default" type="submit"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                        </div>
                    </div><!-- .newsletter end --> 
                </div><!-- .sidebar-area end --> 
            </div>             
        </div>
      </div>
    </div>
<!-- Blog Single End  -->


