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
  .list-group-item:hover{
  	background-color: #24bd2b;
  	color: white
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
    <div class="col-md-9 justy-content-center mb-2">
      <div class="card" style="border-radius: 0px !important;">
       
       <div class="row">
       	<div class="col-md-3">
       		<div class="card" style="margin: 5px">
			  <img class="card-img-top" src="<?= base_url('assets/images/') ?>dept-5.jpg" alt="Card image cap">
			  <div class="card-body">
			    <h6 class="card-title">Administrasi Pendidikan</h6>
			    <a href="<?= base_url('site/adm') ?>" class="btn btn-primary" style="border-radius: 1px !important">Ke Website</a>
			  </div>
			</div>
       	</div>

       	<div class="col-md-3">
       		<div class="card" style="margin: 5px">
			  <img class="card-img-top" src="<?= base_url('assets/images/') ?>dept-5.jpg" alt="Card image cap">
			  <div class="card-body">
			    <h6 class="card-title">Pendidikan Teknologi Informasi</h6>
			    <a href="#" class="btn btn-primary" style="border-radius: 1px !important">Ke Website</a>
			  </div>
			</div>
       	</div>

       	<div class="col-md-3">
       		<div class="card" style="margin: 5px">
			  <img class="card-img-top" src="<?= base_url('assets/images/') ?>dept-5.jpg" alt="Card image cap">
			  <div class="card-body">
			    <h6 class="card-title">PENMAS/PNF</h6>
			    <a href="#" class="btn btn-primary" style="border-radius: 1px !important">Ke Website</a>
			  </div>
			</div>
       	</div>

       	<div class="col-md-3">
       		<div class="card" style="margin: 5px">
			  <img class="card-img-top" src="<?= base_url('assets/images/') ?>dept-5.jpg" alt="Card image cap">
			  <div class="card-body">
			    <h6 class="card-title">Pendidikan Guru Pendidikan Anak Usia Dini</h6>
			    <a href="#" class="btn btn-primary" style="border-radius: 1px !important">Ke Website</a>
			  </div>
			</div>
       	</div>

       	<div class="col-md-3">
       		<div class="card" style="margin: 5px">
			  <img class="card-img-top" src="<?= base_url('assets/images/') ?>dept-5.jpg" alt="Card image cap">
			  <div class="card-body">
			    <h6 class="card-title">Pendidikan Bahasa Inggris</h6>
			    <a href="#" class="btn btn-primary" style="border-radius: 1px !important">Ke Website</a>
			  </div>
			</div>
       	</div>

       </div>
        
      </div>
    </div>
     <div class="col-md-3">
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

