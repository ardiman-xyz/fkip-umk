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
             
              <i class="fa fa-folder" style="color: #0a9acf"></i> Dokumen Mutu
                <ol>
                <?php  $s1 = $this->profil->getDataRepo('dokumen_mutu'); ?>
                 <?php foreach ($s1 as $key => $s): ?>
                  
                    <li style="margin-bottom: 2px" >
                      <a href="<?= base_url('assets/upload/repo_fakultas/'.$s->file) ?>" title="" target="_blank"><?= $s->nama_file ?></a>
                    </li>
                 <?php endforeach;?>
                </ol>

                 <i class="fa fa-folder" style="color: #0a9acf"></i> Panduan & Pedoman
                 <ol>
                  <?php  $s2 = $this->profil->getDataRepo('panduan_dan_pedoman'); ?>
                 <?php foreach ($s2 as $key => $s): ?>
                
                    <li style="margin-bottom: 2px" >
                        <a href="<?= base_url('assets/upload/repo_fakultas/'.$s->file) ?>" title=""  target="_blank"><?= $s->nama_file ?></a>
                     <!--  <i class="fa fa-file" style="color: #c2bac1"></i> 
                      <span class="tct" style="border-radius: 1px" class="spmi" data-dt="<?= base_url('assets/upload/repo_fakultas/'.$s->file) ?>" type="button" title="<?= $s->nama_file ?>" id="file_view<?= $key +200 ?>" onclick="showBtn(<?= $key +200 ?>)"><?= $s->nama_file ?></span>
                      <span id="result<?= $key +200 ?>" ></span> -->
                    </li>
                 <?php endforeach;?>
                </ol>
                
                 <i class="fa fa-folder" style="color: #0a9acf"></i> Standar Operasional Prosedur
                 <ol>
                  <?php  $s3 = $this->profil->getDataRepo('sop'); ?>
                 <?php foreach ($s3 as $key => $s): ?>
                    <li style="margin-bottom: 2px" >
                       <a href="<?= base_url('assets/upload/repo_fakultas/'.$s->file) ?>" title=""  target="_blank"><?= $s->nama_file ?></a>
                     <!--  <i class="fa fa-file" style="color: #c2bac1"></i> 
                      <span class="tct" style="border-radius: 1px" class="spmi" data-dt="<?= base_url('assets/upload/repo_fakultas/'.$s->file) ?>" type="button" title="<?= $s->nama_file ?>" id="file_view<?= $key +300 ?>" onclick="showBtn(<?= $key +300 ?>)"><?= $s->nama_file ?></span>
                      <span id="result<?= $key +300 ?>" ></span> -->
                    </li>
                 <?php endforeach;?>
                </ol>

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



<script type="text/javascript">
  function showBtn(key) {
    
    $('#result'+key+'').html(`
      <input type="text" name="code" placeholder="Masukkan kode baca" id="code">
      <button class="btn btn-sm btn-primary" style="border-radius:1px" onclick="getCode($('#code').val(),${key})">Accept</button>
      <button class="btn btn-sm btn-danger" style="border-radius:1px" onclick="delete_input(${key})">Cancel</button>
    `);

  }

  function getCode(code, key) {
    if(code === '12345'){

     const url = $('#file_view'+key+'').attr('data-dt');

      $('#result'+key+'').html(`
        <iframe src = "${url}" width='400' height='300' allowfullscreen webkitallowfullscreen></iframe
        `);

    }else{
      $('#msg').html(`
        <div class="alert alert-danger">
          Code salah
        </div>
      `);
    }
  }

  function delete_input(key) {
    $('#result'+key+'').html('');
  }
</script>