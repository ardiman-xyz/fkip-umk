<br>
<br>
    
    <!-- Blog Section Start  -->
    <div id="blog-single">
        <div class="container">
          <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="blog-post">

              <div class="post-thumb">
                <img src="assets/img/blog/blog-1-big.jpg" alt="">
              </div>

              <div class="post-content">
                <?= $this->session->flashdata('success'); ?>
                <div class="alert alert-info">
                  <i class="fa fa-bullhorn"></i><strong> Data anda berhasil di kirim, untuk info lebih lanjut tentang penjadwalan silahkan hubungi 082293696251(admin) atau silahkan datang ke prodi FKIP UMK Kendari, terimakasih!</strong>
                </div>
                <div class="icon" align="center">
                  <a href="<?= base_url('daftar_ujian')  ?>"><i class="fa fa-backward"></i> Go back</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
