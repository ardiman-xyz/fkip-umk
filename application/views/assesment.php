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
     <!--  <img src="<?= base_url('assets/img/berita/'.$baca_berita->gambar) ?>" alt="<?= $baca_berita->judul ?>" width="100%"> -->
        <div class="card-body">
         <div class="post-thumb">
            <div class="post-content">

              <div class="alert alert-info">
                Data Dukung APS-UPPS Prodi dan fakultas
              </div>

              <a href="https://drive.google.com/drive/folders/1t89LYGMKbOz3vO4WryzNL6pJN32NT9kr?usp=sharing" class="btn btn-primary btn-lg" target="_blank" style="border-radius: 2px">Data dukung APS Administrasi Pendidikan</a>
              <button type="button" class="btn btn-primary btn-lg" id="showInput" style="border-radius: 2px">Data dukung UPPS</button>
               <a href="https://drive.google.com/drive/folders/1DczqhvEGWMk5QHMvcruE8a1kCkhSmYVQ?usp=sharing" class="btn btn-primary btn-lg" target="_blank" style="border-radius: 2px">Data dukung APS PTI</a>

              <span class="msg"></span>

              <div class="code" style="display: none; margin-bottom: 10px; margin-top: 10px">
                <input type="password" name="code" id="code" placeholder="Masukkan kode baca"> 
                <button type="button" id="getCode" style="border-radius: 2px" class="btn btn-sm btn-primary">Submit</button>
              </div>
             <hr>


              <div class="file" style="display: none">

                <div class="d-flex">
                  <h5>Data Dukung UPPS</h5>
                <hr>
                <form id="form_search" action="<?= base_url('home/search') ?>" method="post">
                 <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" id="title" placeholder="Find some file in here..">
                  </div>
                </form>
                </div>
                <hr>

               <div id="result">
                 <i class="fa fa-folder" style="color: #0a9acf"></i> 1.1 Dokumen RENSTRA dan RENOP Fakultas
                <ol>
                <?php  $d1 = $this->db->get_where('file_assesment', ['type' => 'd1'])->result()?>
                 <?php foreach ($d1 as $key => $d): ?>
                    <li><a href="<?= base_url('assets/upload/file_assesment/'.$d->file) ?>" title="" target="_blank"><?= $d->nama_file ?></a></li>
                 <?php endforeach;?>
                </ol>

                <i class="fa fa-folder" style="color: #0a9acf"></i> 2.1 Tata Pamong
                <ol>
                  <?php  $d1 = $this->db->get_where('file_assesment', ['type' => 'd2'])->result()?>
                   <?php foreach ($d1 as $key => $d): ?>
                      <li><a href="<?= base_url('assets/upload/file_assesment/'.$d->file) ?>" title="" target="_blank"><?= $d->nama_file ?></a></li>
                   <?php endforeach;?>
                </ol>

                 <i class="fa fa-folder" style="color: #0a9acf"></i> 2.5 Dokumen sistem Penjamin Mutu di Tk.Fakultas
                <ol>
                  <?php  $d1 = $this->db->get_where('file_assesment', ['type' => 'd3'])->result()?>
                   <?php foreach ($d1 as $key => $d): ?>
                      <li><a href="<?= base_url('assets/upload/file_assesment/'.$d->file) ?>" title="" target="_blank"><?= $d->nama_file ?></a></li>
                   <?php endforeach;?>
                </ol>

                <!-- Start SPMB -->
                 <i class="fa fa-folder" style="color: #0a9acf"></i> 3.1 SPMB <br>
                    <i class="fa fa-folder" style="color: #7ac6e6; margin-left: 10px;"></i> 3.1.1 Sistem Penerimaan Maba
                    <ol>
                       <?php  $d1 = $this->db->get_where('file_assesment', ['type' => 'd4.1'])->result()?>
                       <?php foreach ($d1 as $key => $d): ?>
                          <li><a href="<?= base_url('assets/upload/file_assesment/'.$d->file) ?>" title="" target="_blank"><?= $d->nama_file ?></a></li>
                       <?php endforeach;?>
                    </ol>

                     <i class="fa fa-folder" style="color: #7ac6e6; margin-left: 10px;"></i> 3.1.2 Sistem Penerimaan Maba Berprestasi dan Kurang Mampu
                    <ol>
                       <?php  $d1 = $this->db->get_where('file_assesment', ['type' => 'd4.2'])->result()?>
                       <?php foreach ($d1 as $key => $d): ?>
                          <li><a href="<?= base_url('assets/upload/file_assesment/'.$d->file) ?>" title="" target="_blank"><?= $d->nama_file ?></a></li>
                       <?php endforeach;?>
                    </ol>

                    <i class="fa fa-folder" style="color: #7ac6e6; margin-left: 10px;"></i> 3.1.3. Sistem Penerimaan Maba Berdasarkan Pemerataan Wilayah
                    <ol>
                       <?php  $d1 = $this->db->get_where('file_assesment', ['type' => 'd4.3'])->result()?>
                       <?php foreach ($d1 as $key => $d): ?>
                          <li><a href="<?= base_url('assets/upload/file_assesment/'.$d->file) ?>" title="" target="_blank"><?= $d->nama_file ?></a></li>
                       <?php endforeach;?>
                    </ol>

                    <i class="fa fa-folder" style="color: #7ac6e6; margin-left: 10px;"></i> 3.1.4. Sistem Penerimaan Maba Berdasrkan Prinsip Ekuitas
                    <ol>
                       <?php  $d1 = $this->db->get_where('file_assesment', ['type' => 'd4.4'])->result()?>
                       <?php foreach ($d1 as $key => $d): ?>
                          <li><a href="<?= base_url('assets/upload/file_assesment/'.$d->file) ?>" title="" target="_blank"><?= $d->nama_file ?></a></li>
                       <?php endforeach;?>
                    </ol>

                    <i class="fa fa-folder" style="color: #7ac6e6; margin-left: 10px;"></i> 3.1.5. Jumlah Mahasiswa Baru
                    <ol>
                       <?php  $d1 = $this->db->get_where('file_assesment', ['type' => 'd4.5'])->result()?>
                       <?php foreach ($d1 as $key => $d): ?>
                          <li><a href="<?= base_url('assets/upload/file_assesment/'.$d->file) ?>" title="" target="_blank"><?= $d->nama_file ?></a></li>
                       <?php endforeach;?>
                    </ol>

                    <i class="fa fa-folder" style="color: #7ac6e6; margin-left: 10px;"></i> 3.3.1.6 Instrumen Penerimaan MABA
                    <ol>
                       <?php  $d1 = $this->db->get_where('file_assesment', ['type' => 'd4.6'])->result()?>
                       <?php foreach ($d1 as $key => $d): ?>
                          <li><a href="<?= base_url('assets/upload/file_assesment/'.$d->file) ?>" title="" target="_blank"><?= $d->nama_file ?></a></li>
                       <?php endforeach;?>
                    </ol>
                <!-- end SPMB -->
                   
                <i class="fa fa-folder" style="color: #0a9acf"></i> 5.1. Penyusunan dan Pengembangan Kurikulum
                <ol>
                  <?php  $d1 = $this->db->get_where('file_assesment', ['type' => 'd5'])->result()?>
                       <?php foreach ($d1 as $key => $d): ?>
                          <li><a href="<?= base_url('assets/upload/file_assesment/'.$d->file) ?>" title="" target="_blank"><?= $d->nama_file ?></a></li>
                       <?php endforeach;?>
                </ol>

                 <i class="fa fa-folder" style="color: #0a9acf"></i> 6.1.1 Laporan Keuangan Fakultas
                <ol>
                  <?php  $d1 = $this->db->get_where('file_assesment', ['type' => 'd6'])->result()?>
                       <?php foreach ($d1 as $key => $d): ?>
                          <li><a href="<?= base_url('assets/upload/file_assesment/'.$d->file) ?>" title="" target="_blank"><?= $d->nama_file ?></a></li>
                       <?php endforeach;?>
                </ol>


                <!-- start -->

                 <i class="fa fa-folder" style="color: #0a9acf"></i> 6.4 Daftar Software yang berlisensi, petunjuk pemanfaatan SIM <br>
                  
                  <i class="fa fa-folder" style="color: #7ac6e6; margin-left: 10px;"></i> 6.4.1 Pedoman Sistem Informasi
                    <ol>
                       <?php  $d1 = $this->db->get_where('file_assesment', ['type' => 'd7.1'])->result()?>
                       <?php foreach ($d1 as $key => $d): ?>
                          <li><a href="<?= base_url('assets/upload/file_assesment/'.$d->file) ?>" title="" target="_blank"><?= $d->nama_file ?></a></li>
                       <?php endforeach;?>
                    </ol>

                    <i class="fa fa-folder" style="color: #7ac6e6; margin-left: 10px;"></i> 6.4.2 Blue Print Pengembangan Sistem Informasi
                    <ol>
                       <?php  $d1 = $this->db->get_where('file_assesment', ['type' => 'd7.2'])->result()?>
                       <?php foreach ($d1 as $key => $d): ?>
                          <li><a href="<?= base_url('assets/upload/file_assesment/'.$d->file) ?>" title="" target="_blank"><?= $d->nama_file ?></a></li>
                       <?php endforeach;?>
                    </ol>

                    <i class="fa fa-folder" style="color: #7ac6e6; margin-left: 10px;"></i> 6.4.3 Sistem Informasi
                    <ol>
                       <?php  $d1 = $this->db->get_where('file_assesment', ['type' => 'd7.3'])->result()?>
                       <?php foreach ($d1 as $key => $d): ?>
                          <li><a href="<?= base_url('assets/upload/file_assesment/'.$d->file) ?>" title="" target="_blank"><?= $d->nama_file ?></a></li>
                       <?php endforeach;?>
                    </ol>

                <!-- end -->

                <!-- start -->

                <i class="fa fa-folder" style="color: #0a9acf"></i> 7.1.1 Hasil Penellitian <br>
                  
                  <i class="fa fa-folder" style="color: #7ac6e6; margin-left: 10px;"></i> 7.1.2 Data Jumlah penelitian Dosen Tetap
                    <ol>
                       <?php  $d1 = $this->db->get_where('file_assesment', ['type' => 'd8.1'])->result()?>
                       <?php foreach ($d1 as $key => $d): ?>
                          <li><a href="<?= base_url('assets/upload/file_assesment/'.$d->file) ?>" title="" target="_blank"><?= $d->nama_file ?></a></li>
                       <?php endforeach;?>
                    </ol>

                    <i class="fa fa-folder" style="color: #7ac6e6; margin-left: 10px;"></i> 7.1.3 Dokumen Hasil Penelitian
                    <ol>
                       <?php  $d1 = $this->db->get_where('file_assesment', ['type' => 'd8.2'])->result()?>
                       <?php foreach ($d1 as $key => $d): ?>
                          <li><a href="<?= base_url('assets/upload/file_assesment/'.$d->file) ?>" title="" target="_blank"><?= $d->nama_file ?></a></li>
                       <?php endforeach;?>
                    </ol>

                <!-- end -->


                <!-- start -->

                <i class="fa fa-folder" style="color: #0a9acf"></i> 7.2.1 Hasil PKM <br>
                  
                  <i class="fa fa-folder" style="color: #7ac6e6; margin-left: 10px;"></i> 7.2.1 Data Jumlah penelitian Dosen Tetap
                    <ol>
                       <?php  $d1 = $this->db->get_where('file_assesment', ['type' => 'd9.1'])->result()?>
                       <?php foreach ($d1 as $key => $d): ?>
                          <li><a href="<?= base_url('assets/upload/file_assesment/'.$d->file) ?>" title="" target="_blank"><?= $d->nama_file ?></a></li>
                       <?php endforeach;?>
                    </ol>

                    <i class="fa fa-folder" style="color: #7ac6e6; margin-left: 10px;"></i> 7.2.2 Dokumen Hasil PKM
                    <ol>
                       <?php  $d1 = $this->db->get_where('file_assesment', ['type' => 'd9.2'])->result()?>
                       <?php foreach ($d1 as $key => $d): ?>
                          <li><a href="<?= base_url('assets/upload/file_assesment/'.$d->file) ?>" title="" target="_blank"><?= $d->nama_file ?></a></li>
                       <?php endforeach;?>
                    </ol>


                <!-- end -->


                 <!-- start -->

                <i class="fa fa-folder" style="color: #0a9acf"></i>7.3.1 Dokumen Pendukung Kerjasama dalam Negeri<br>
                  
                  <i class="fa fa-folder" style="color: #7ac6e6; margin-left: 10px;"></i> Daftar Kerjasama Dalam Negeri
                    <ol>
                       <?php  $d1 = $this->db->get_where('file_assesment', ['type' => 'd10'])->result()?>
                       <?php foreach ($d1 as $key => $d): ?>
                          <li><a href="<?= base_url('assets/upload/file_assesment/'.$d->file) ?>" title="" target="_blank"><?= $d->nama_file ?></a></li>
                       <?php endforeach;?>
                    </ol>


                <!-- end -->


                 <!-- start -->

                <i class="fa fa-folder" style="color: #0a9acf"></i>7.3.2 Dokumen Pendukung Kerjasama  Luar Negeri<br>
                  
                  <i class="fa fa-folder" style="color: #7ac6e6; margin-left: 10px;"></i> Daftar Kerjasama Dalam Luar Negeri
                    <ol>
                       <?php  $d1 = $this->db->get_where('file_assesment', ['type' => 'd11'])->result()?>
                       <?php foreach ($d1 as $key => $d): ?>
                          <li><a href="<?= base_url('assets/upload/file_assesment/'.$d->file) ?>" title="" target="_blank"><?= $d->nama_file ?></a></li>
                       <?php endforeach;?>
                    </ol>


                <!-- end -->
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





<script type="text/javascript">
 
 $(document).ready(function(){

    $('#showInput').click(() => {
      $('.code').css('display', 'block');
    })


    $('#getCode').click(() => {
      const code = $('#code').val();
      
      if (code === '12345') {
        $('.file').css('display', 'block');
      } else {
        $('.msg').html(`
          <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
            <strong>Gagal!</strong> Kode anda salah!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          `)
      }

    })

 });

</script>