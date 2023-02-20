<?php
$konfigurasi    = $this->konfigurasi->getKonfigurasi();
?>
<style type="text/css">
  .dropdown-item:hover{
    background-color: #049B2A !important;
    color: white !important
  }

  #login:hover{
    background-color: #04c971;
    color: white;
  }
</style>
 <div class="py-2">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
      <div class="container d-flex align-items-center">
        <a class="navbar-brand mt-2" href="<?= base_url('site/adm') ?>">
          <!-- <img src="<?= base_url(); ?>assets/images/logo/logo-umk.png" alt=""> -->
         <img src="<?= base_url() ?>assets/img/Logo_adm.png" alt="" width="370">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">

           <!--  <li class="nav-item"><a href="<?= base_url('site/adm') ?>" class="nav-link">Home</a></li> -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                  Profil
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?= base_url('site/adm/sambutan') ?>">Sambutan Prodi</a>
                  <a class="dropdown-item" href="<?= base_url('site/adm/visi_misi') ?>">Visi dan Misi</a>
                  <a class="dropdown-item" href="<?= base_url('site/adm/kompetensi_lulusan') ?>">Kompetensi Lulusan</a>
                  <a class="dropdown-item" href="<?= base_url('site/adm/struktur_organisasi') ?>">Struktur Organisasi</a>
                  <a class="dropdown-item" href="<?= base_url('site/adm/dosen') ?>">Dosen</a>
                  <a class="dropdown-item" href="<?= base_url('site/adm/tendik') ?>">Tendik</a>
                </div>
              </li> 
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Akademik
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?= base_url('site/adm/kurikulum') ?>">Kurikulum</a>
                  <a class="dropdown-item" href="<?= base_url('site/adm/kalender_akademik') ?>">Kalender Akademik</a>
                  <a class="dropdown-item" href="<?= base_url('site/adm/jadwal_kuliah') ?>">Jadwal Kuliah</a>
                  <a class="dropdown-item" href="#">Prestasi</a>
                  <a class="dropdown-item" href="<?= base_url('site/adm/akreditasi') ?>">Akreditasi</a>
                </div>
              </li>

            <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="nav-link dropdown-toggle">Fasilitas</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="<?= base_url('site/adm/fasilitas') ?>" class="dropdown-item">Fasilitas Fisik </a></li>
              <!-- Level two dropdown-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Oneday Service</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow" id="dropd" style="display: none">
                  <li><a href="<?= base_url('tendik') ?>" class="dropdown-item">Tendik</a></li>
                  <li><a href="<?= base_url('mahasiswa/login') ?>" class="dropdown-item">Mahasiswa</a></li>
                </ul>
              </li>
              <!-- End Level two -->
            </ul>
          </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Penelitian & Pengabdian
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Penelitian Desa</a>
                <a class="dropdown-item" href="#">Penelitian Mahasiswa</a>
              </div>
            </li>
           
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Alumni
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Profil Alumni</a>
              </div>
            </li>
             <li class="nav-item"><a href="<?= base_url('site/adm/spmi') ?>" class="nav-link">Spmi</a></li>
            <li class="nav-item" >
              <a href="<?= base_url('site/adm/login') ?>" class="nav-link" id="login"><b>Login</b></a>
            </li>
          <!-- sistem penjaminan mutu -->
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->
<script>
    $(document).ready(function(){
  $('#dropdownSubMenu2').mouseover(function(e){
    $('#dropd').css('display', 'block').Toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>