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
<div class="container">
  <div class="row ">
    <div class="col-md-9 justy-content-center">
      <div class="card" style="border-radius: 0px !important; box-shadow: 1px 1px #e0e0d1 !important">
        <div class="card-body">
         <div class="post-thumb">
            <div class="post-content">
              <h3>Silahkan Hubungi Kami Melalui Form Dibawah Ini</h3>
              <div class="row">
                <div class="col-md-12">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63680.34749033984!2d122.47706144790227!3d-4.015944578564699!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d98ecde057e49d9%3A0xee318b8f3b9185ca!2sUniversitas+Muhammadiyah+Kendari!5e0!3m2!1sid!2sid!4v1564737774591!5m2!1sid!2sid" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="col-md-6" style="margin-top: 2em">
                  <ul>
                    <li>
                      <i class="fa fa-whatsapp"></i>
                       9454350345 (marliana)
                    </li>
                    <li>
                      <i class="fa fa-phone"> 2304-3094-3 (darto)</i>
                    </li>
                  </ul>
                </div>
                <div class="col-md-6" style="margin-top: 2em">
                  <form action="#">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Your Name">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Your Email">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Subject">
                  </div>
                  <div class="form-group">
                    <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Send Message" class="btn btn-primary" style="border-radius: 1px !important">
                  </div>
                </form>
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
</section>
<br>
</div>

