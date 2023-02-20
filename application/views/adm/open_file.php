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
              <div class="container">
                <div class="d-flex">
                  <h5>SPMI</h5>
                <hr>
                <form id="form_search" action="<?= base_url('site/adm/search') ?>" method="post">
                 <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" id="title" placeholder="Find some file in here..">
                  </div>
                </form>
                </div>
                <hr>

                <a href="<?= base_url('site/adm/spmi') ?>" title="Kembali" class="btn btn-danger btn-sm " style="border-radius: 2px"> &laquo; Kembali</a>
                <span id="btn-refresh"></span>
                <br><br>

                <div id="result">
                  <i class="fa fa-folder" style="color: #0a9acf"></i> Standar 1
                <ol>
                 <?php foreach ($s1 as $key => $s): ?>
                    <li style="margin-bottom: 2px" >
                      <a id="url_file" href="<?= base_url('assets/adm/file_upload/'.$s->file) ?>" target="_blank" title="<?= $s->nama_file ?>"><?= $s->nama_file ?></a>
                    </li>
                 <?php endforeach;?>
                </ol>

                 <i class="fa fa-folder" style="color: #0a9acf"></i> Standar 2
                 <ol>
                 <?php foreach ($s2 as $key => $s): ?>
                    <li style="margin-bottom: 2px" >
                       <a id="url_file" href="<?= base_url('assets/adm/file_upload/'.$s->file) ?>" target="_blank" title="<?= $s->nama_file ?>"><?= $s->nama_file ?></a>
                    </li>
                 <?php endforeach;?>
                </ol>
                
                 <i class="fa fa-folder" style="color: #0a9acf"></i> Standar 3
                 <ol>
                 <?php foreach ($s3 as $key => $s): ?>
                    <li style="margin-bottom: 2px" >
                       <a id="url_file" href="<?= base_url('assets/adm/file_upload/'.$s->file) ?>" target="_blank" title="<?= $s->nama_file ?>"><?= $s->nama_file ?></a>
                    </li>
                 <?php endforeach;?>
                </ol>
                
                 <i class="fa fa-folder" style="color: #0a9acf"></i> Standar 4
                 <ol>
                 <?php foreach ($s4 as $key => $s): ?>
                    <li style="margin-bottom: 2px" >
                      <a id="url_file" href="<?= base_url('assets/adm/file_upload/'.$s->file) ?>" target="_blank" title="<?= $s->nama_file ?>"><?= $s->nama_file ?></a>
                    </li>
                 <?php endforeach;?>
                </ol>
                
                 <i class="fa fa-folder" style="color: #0a9acf"></i> Standar 5
                 <ol>
                 <?php foreach ($s5 as $key => $s): ?>
                    <li style="margin-bottom: 2px" >
                      <a id="url_file" href="<?= base_url('assets/adm/file_upload/'.$s->file) ?>" target="_blank" title="<?= $s->nama_file ?>"><?= $s->nama_file ?></a>
                    </li>
                 <?php endforeach;?>
                </ol>
                
                 <i class="fa fa-folder" style="color: #0a9acf"></i> Standar 6
                 <ol>
                 <?php foreach ($s6 as $key => $s): ?>
                    <li style="margin-bottom: 2px" >
                       <a id="url_file" href="<?= base_url('assets/adm/file_upload/'.$s->file) ?>" target="_blank" title="<?= $s->nama_file ?>"><?= $s->nama_file ?></a>
                    </li>
                 <?php endforeach;?>
                </ol>
                
                 <i class="fa fa-folder" style="color: #0a9acf"></i> Standar 7
                 <ol>
                 <?php foreach ($s7 as $key => $s): ?>
                    <li style="margin-bottom: 2px" >
                     <a id="url_file" href="<?= base_url('assets/adm/file_upload/'.$s->file) ?>" target="_blank" title="<?= $s->nama_file ?>"><?= $s->nama_file ?></a>
                    </li>
                 <?php endforeach;?>
                </ol>
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

