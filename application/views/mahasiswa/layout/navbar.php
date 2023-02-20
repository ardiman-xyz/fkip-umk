<div id="navbar" class="navbar navbar-default    navbar-collapse       h-navbar ace-save-state">
      <div class="navbar-container ace-save-state" id="navbar-container">
        <div class="navbar-header pull-left">
          <a href="<?= base_url('mahasiswa/in') ?>" class="navbar-brand">
            <small>
                FKIP UMKendari
            </small>
          </a>

          <button class="pull-right navbar-toggle navbar-toggle-img collapsed" type="button" data-toggle="collapse" data-target=".navbar-buttons,.navbar-menu">
             <span class="sr-only" style="margin-top: 2px">Toggle sidebar</span>

              <span class="icon-bar" style="margin: 5px"></span>

              <span class="icon-bar" style="margin: 5px"></span>

              <span class="icon-bar" style="margin: 5px"></span>
          </button>
        </div>

        <div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
          <ul class="nav ace-nav">

            <li class="light-blue dropdown-modal user-min">
              <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                <?php 

                  $user = $this->user->getPengguna($this->session->userdata('nim'));
                  $jenis_kelamin = $user->jenis_kelamin;
                  $image = $user->image;

                 ?>

                  <?php if (!empty($image)): ?>
                     <img class="nav-user-photo" src="<?= base_url('assets/img/profile_pengguna/'.$image) ?>"/>
                    <?php else: ?>
                      <?php if ($jenis_kelamin == "L") : ?>
                         <img class="nav-user-photo" src="<?= base_url('assets/img/') ?>men.jpg" alt="<?=$this->session->userdata('nama_lengkap') ?>" />
                      <?php else: ?>
                         <img class="nav-user-photo" src="<?= base_url('assets/img/') ?>muslim_women.jpg" alt="<?=$this->session->userdata('nama_lengkap') ?>" />
                      <?php endif ?>
                  <?php endif ?>
                 
                <span class="user-info">
                  <small>Welcome,</small>
                  <?= $this->session->userdata('nama_lengkap'); ?>
                </span>

                <i class="ace-icon fa fa-caret-down"></i>
              </a>

              <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                <li>
                  <a href="<?= base_url('mahasiswa/in/update_password') ?>">
                    <i class="ace-icon fa fa-key"></i>
                    Change Password
                  </a>
                </li>

                <li>
                  <a href="<?= base_url('mahasiswa/in/profil') ?>">
                    <i class="ace-icon fa fa-user"></i>
                    Profile
                  </a>
                </li>

                <li class="divider"></li>

                <li>
                  <a href="<?= base_url('mahasiswa/in/log_out') ?>">
                    <i class="ace-icon fa fa-power-off"></i>
                    Logout
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>

        <nav role="navigation" class="navbar-menu pull-left collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <!-- <li>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Surat
                &nbsp;
                <i class="ace-icon fa fa-angle-down bigger-110"></i>
              </a>

              <ul class="dropdown-menu dropdown-light-blue dropdown-caret">
                <li>
                  <a href="<?= base_url('tendik/create') ?>">
                    <i class="ace-icon fa fa-envelope bigger-110 blue"></i>
                    Buat Surat Seminar
                  </a>
                </li>

                <li>
                  <a href="#">
                  <i class="ace-icon fa fa-envelope bigger-110 green"></i>
                    List Surat
                  </a>
                </li>

                <li>
                  <a href="#">
                    <i class="ace-icon fa fa-cog bigger-110 blue"></i>
                    Settings
                  </a>
                </li>
              </ul>
            </li> -->
            <li>
              <a href="<?= base_url('mahasiswa/surat') ?>">
                Surat
              </a>
            </li>
             <li>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                PLP/Magang
                <i class="ace-icon fa fa-angle-down bigger-110"></i>
              </a>

              <ul class="dropdown-menu dropdown-light-blue dropdown-caret">
                <!--<li>-->
                <!--  <a href="<?= base_url('mahasiswa/magang') ?>">-->
                <!--    <i class="ace-icon fa fa-user"></i>-->
                <!--    PLP/Magang-->
                <!--</a>-->
                <!--</li>-->
                <li>
                  <a href="<?= base_url('mahasiswa/magang/upload') ?>">
                    <i class="ace-icon fa fa-upload bigger-110 blue"></i>
                    Upload
                  </a>
                </li>         
            </ul>
            </li>
            <li>
              <a href="<?= base_url('mahasiswa/registrasi') ?>">
                 Pengajuan Judul
              </a>
            </li>
            <li>
              <a href="<?= base_url('mahasiswa/daftar_ujian') ?>">
                Daftar Ujian
              </a>
            </li>
            <li>
              <a href="<?= base_url('mahasiswa/penawaran') ?>">
                Penawaran
              </a>
            </li>
            <li>
              <a href="<?= base_url('mahasiswa/in/tugas_akhir') ?>">
                Tugas Akhir
              </a>
            </li>
             <li>
              <a href="<?= base_url('mahasiswa/skpi') ?>">
                SKPI
              </a>
            </li>
          </ul>

        </nav>

          
      </div><!-- /.navbar-container -->
    </div>

<div class="main-container ace-save-state" id="main-container" >
<div class="main-content">
<div class="main-content-inner">
  <div class="page-content">
    <div class="ace-settings-container" id="ace-settings-container">
    </div><!-- /.ace-settings-container -->