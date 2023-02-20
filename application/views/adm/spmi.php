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
                <h5>SPMI</h5>
                <hr>
                <div class="alert alert-info">
                  List daftar file, silahkan klik <a href="#" id="show_form" title="">disini</a> untuk memasukkan kode baca
                </div>
                <span id="msg"></span>

                <form action="<?= base_url('site/adm/getCode') ?>" id="form_code" accept-charset="utf-8" style="display: none" method="post">
                  <input type="text" name="code_baca" id="code_baca" placeholder="Masukkan code baca">
                  <button type="submit" id="getCode" class="btn btn-success btn-sm" style="border-radius: 1px">
                  Submit
                  <svg id="svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; shape-rendering: auto; display: none; float: right;" width="30px" height="20px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"> <rect x="17.5" y="30" width="15" height="40" fill="#ecf9ff"> <animate attributeName="y" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="18;30;30" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.2s"></animate> <animate attributeName="height" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="64;40;40" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.2s"></animate> </rect> <rect x="42.5" y="30" width="15" height="40" fill="#d5e8ff"> <animate attributeName="y" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="20.999999999999996;30;30" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.1s"></animate> <animate attributeName="height" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="58.00000000000001;40;40" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.1s"></animate> </rect> <rect x="67.5" y="30" width="15" height="40" fill="#c9e8fc"> <animate attributeName="y" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="20.999999999999996;30;30" keySplines="0 0.5 0.5 1;0 0.5 0.5 1"></animate> <animate attributeName="height" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="58.00000000000001;40;40" keySplines="0 0.5 0.5 1;0 0.5 0.5 1"></animate> </rect> </svg>
                </button>
                <button type="button" id="btn-hide" class="btn btn-danger btn-sm" style="border-radius: 2px"><i class="fa fa-remove"></i>
                </button>
                </form>
                <br>

                <i class="fa fa-folder" style="color: #0a9acf"></i> Standar 1
                <ol>
                <?php  $s1 = $this->unit->getDataRepo('s1'); ?>
                 <?php foreach ($s1 as $key => $s): ?>
                    <li style="margin-bottom: 2px" >
                      <span id="sementara"  title="<?= $s->nama_file ?>"><?= $s->nama_file ?></span>
                    </li>
                 <?php endforeach;?>
                </ol>

                 <i class="fa fa-folder" style="color: #0a9acf"></i> Standar 2
                 <ol>
                  <?php  $s2 = $this->unit->getDataRepo('s2'); ?>
                 <?php foreach ($s2 as $key => $s): ?>
                    <li style="margin-bottom: 2px" >
                      <span id="sementara"  title="<?= $s->nama_file ?>"><?= $s->nama_file ?></span>
                    </li>
                 <?php endforeach;?>
                </ol>
                
                 <i class="fa fa-folder" style="color: #0a9acf"></i> Standar 3
                 <ol>
                  <?php  $s3 = $this->unit->getDataRepo('s3'); ?>
                 <?php foreach ($s3 as $key => $s): ?>
                    <li style="margin-bottom: 2px" >
                      <span id="sementara"  title="<?= $s->nama_file ?>"><?= $s->nama_file ?></span>
                    </li>
                 <?php endforeach;?>
                </ol>
                
                 <i class="fa fa-folder" style="color: #0a9acf"></i> Standar 4
                 <ol>
                  <?php  $s4 = $this->unit->getDataRepo('s4'); ?>
                 <?php foreach ($s4 as $key => $s): ?>
                    <li style="margin-bottom: 2px" >
                      <span id="sementara"  title="<?= $s->nama_file ?>"><?= $s->nama_file ?></span>
                    </li>
                 <?php endforeach;?>
                </ol>
                
                 <i class="fa fa-folder" style="color: #0a9acf"></i> Standar 5
                 <ol>
                  <?php  $s5 = $this->unit->getDataRepo('s5'); ?>
                 <?php foreach ($s5 as $key => $s): ?>
                    <li style="margin-bottom: 2px" >
                      <span id="sementara"  title="<?= $s->nama_file ?>"><?= $s->nama_file ?></span>
                    </li>
                 <?php endforeach;?>
                </ol>
                
                 <i class="fa fa-folder" style="color: #0a9acf"></i> Standar 6
                 <ol>
                  <?php  $s6 = $this->unit->getDataRepo('s6'); ?>
                 <?php foreach ($s6 as $key => $s): ?>
                    <li style="margin-bottom: 2px" >
                      <span id="sementara"  title="<?= $s->nama_file ?>"><?= $s->nama_file ?></span>
                    </li>
                 <?php endforeach;?>
                </ol>
                
                 <i class="fa fa-folder" style="color: #0a9acf"></i> Standar 7
                 <ol>
                  <?php  $s7 = $this->unit->getDataRepo('s7'); ?>
                 <?php foreach ($s7 as $key => $s): ?>
                    <li style="margin-bottom: 2px" >
                      <span id="sementara"  title="<?= $s->nama_file ?>"><?= $s->nama_file ?></span>
                      <!-- <i class="fa fa-file" style="color: #c2bac1"></i> 
                      <span class="tct" style="border-radius: 1px" class="spmi" data-dt="<?= base_url('assets/adm/file_upload/'.$s->file) ?>" type="button" title="<?= $s->nama_file ?>" id="file_view<?= $key +1 ?>" onclick="showBtn(<?= $key +1 ?>)"><?= $s->nama_file ?></span>
                      <span id="result<?= $key +1 ?>" ></span> -->
                    </li>
                 <?php endforeach;?>
                </ol>

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

 <!-- <iframe src="http://docs.google.com/viewer?url=url_pdfnya&embedded=true" width="100%" height="100%" style="border: none;"></iframe> -->

<script type="text/javascript">

 $(document).ready(function(){

    $('a#show_form').click(() => {
      $('form#form_code').css('display', 'block')
    });

     $('#form_code').submit(function(e){

      e.preventDefault();
      
      const me = $(this),
            url = me.attr('action'),
            data = me.serialize(),
            svg = $('#svg'),
            btn = $('#getCode');

      svg.css('display', 'block');
      btn.attr('disabled', true);
      
      $.ajax({
        url: url,
        method: 'post',
        dataType: 'json',
        data: data,
        success: callback =>{

          console.log(callback)

          if (callback.status === true) {
            $('#msg').html(` <div class="alert alert-success">
                  ${callback.pesan}
                </div>`);
            window.location.href = callback.url+'/'+callback.kode_unik;
          } else {
            $('#msg').html(` 
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> ${callback.pesan}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>`);
            btn.attr('disabled', false);
            svg.css('display', 'none')
          }

        }

      });

    });

     $('#btn-hide').click(() => {
      $('form#form_code').css('display', 'none')
     });

 });

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
        <iframe src="http://docs.google.com/viewer?url=${url}&embedded=true" width="100%" height="100%" style="border: none;"></iframe>`
        
        );

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
