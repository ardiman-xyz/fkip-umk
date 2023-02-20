
      <nav class="navbar navbar-expand-md fixed-top bg-inverse scrolling-navbar">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a href="<?= base_url(); ?>" class="navbar-brand"><img src="<?= base_url('assets/front-end/'); ?>assets/img/logo-umk.png" alt=""></a> <p class="top-text">fakultas keguruan dan ilmu pendidikan</p>
             
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="lni-menu"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto w-100 justify-content-end clearfix">
              
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('profil') ?>">
                 Profil
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Mahasiswa
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?= base_url('profil/mahasiswa') ?>">Mahasiswa</a>
                  <a class="dropdown-item" href="<?= base_url('surat') ?>">Buat Surat</a>
                  <a class="dropdown-item" href="<?= base_url('daftar_ujian') ?>">Daftar Ujian</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Dosen
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?= base_url('home/dosen') ?>">Dosen</a>
                  <a class="dropdown-item" href="#">Penugasan Dosen</a>
                </div>
              </li>
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Akademik
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">SAP</a>
                  <a class="dropdown-item" href="#">STATISTIK MAHASISWA</a>
                  <a class="dropdown-item" href="#">KALENDER AKADEMIK</a>
                  <a class="dropdown-item" href="#">JADWAL KULIAH</a>
                  <a class="dropdown-item" href="#">SERTIFIKAT AKREDITASI</a>
                </div>
              </li>
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Penelitian pengabdian
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">ORGANISASI PENJAMINAN MUTU</a>
                  <a class="dropdown-item" href="#">PEDOMAN DAN PANDUAN</a>
                  <a class="dropdown-item" href="#">FASILITAS</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  Kerjasama
                </a>
              </li>

              <?php if ($this->session->userdata('nim') == null ): ?>
                
              <?php else: ?>
                <li class="nav-item">
                <a class="nav-link" href="<?= base_url('surat/log_out')  ?>">
                 <i class="fas fa-logout">#</i>
                </a>
              </li>
              <?php endif ?>
            </ul>
          </div>
        </div>
      </nav>
      <!-- Navbar End -->