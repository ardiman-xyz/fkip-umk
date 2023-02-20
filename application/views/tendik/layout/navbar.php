<div id="navbar" class="navbar navbar-default    navbar-collapse       h-navbar ace-save-state">
      <div class="navbar-container ace-save-state" id="navbar-container">
        <div class="navbar-header pull-left">
          <a href="<?= base_url('tendik/in') ?>" class="navbar-brand">
            <small>
                <?php if ($this->session->userdata('level') === 'staff_fakultas'): ?>
                  Staff Fakultas
                <?php else: ?>
                  Administrasi
                <?php endif ?>
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
                <img class="nav-user-photo" src="<?= base_url() ?>assets/img/new_logo_fkip.jpeg" alt="Jason's Photo" />
                <span class="user-info">
                  <small>Welcome,</small>
                  <?= $this->session->userdata('username'); ?>
                </span>

                <i class="ace-icon fa fa-caret-down"></i>
              </a>

              <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                <li>
                  <a href="<?= base_url('tendik/log_out') ?>">
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
        <?php if ($this->session->userdata('level') === 'staff_fakultas'): ?>
           <li>
              <a href="<?= base_url('fakultas/mahasiswa') ?>">
                  Pendaftar Ujian
              </a>
            </li>
            <li>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Laporan
                &nbsp;
                <i class="ace-icon fa fa-angle-down bigger-110"></i>
              </a>

              <ul class="dropdown-menu dropdown-light-blue dropdown-caret">
                <li>
                  <a href="<?= base_url('fakultas/laporan') ?>">
                  <i class="ace-icon fa fa-file pink"></i>
                    RAB
                  </a>
                </li>
              </ul>
            </li>

            <li>
              <a href="<?= base_url('fakultas/raw') ?>">
                  RAW
              </a>
            </li>

        <?php else: ?>
           <?php 

              $jml_surat_pengajuan_judul = $this->surat->jumlah_surat_pengajuan_judul();
              $jml_surat_aktif_kuliah = $this->surat->jumlah_surat_aktif_kuliah();
              $jml_surat_beasiswa = $this->surat->jumlah_surat_beasiswa();
              
              ?>

          <?php if ($this->session->userdata('prodi') == '9'): ?>
              <li>
              <a href="<?= base_url('tendik/profil') ?>">
                <i class="fa fa-gear"></i>
                  Setting web
              </a>
            </li>
            <?php endif ?>
            
            <li>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Surat
                &nbsp;
                    <?php if ($jml_surat_pengajuan_judul == 0 && $jml_surat_aktif_kuliah == 0 && $jml_surat_beasiswa == 0): ?>
                    <?php else: ?>
                      <span class="badge badge-danger">!</span>
                    <?php endif ?>
                <i class="ace-icon fa fa-angle-down bigger-110"></i>
              </a>

              

              <ul class="dropdown-menu dropdown-light-blue dropdown-caret">
                <li>
                  <a href="<?= base_url('tendik/surat_pengajuan_judul') ?>">
                    <i class="ace-icon fa fa-envelope bigger-110 green"></i>
                   surat
                    <?php if ($jml_surat_pengajuan_judul == 0  && $jml_surat_aktif_kuliah == 0 && $jml_surat_beasiswa == 0): ?>
                    <?php else: ?>
                      <span class="badge badge-danger">..</span>
                    <?php endif ?>
                  </a>
                </li>
                <li>
                  <a href="<?= base_url('tendik/surat_seminar') ?>">
                    <i class="ace-icon fa fa-envelope bigger-110 blue"></i>
                    List Surat Seminar
                  </a>
                </li>         
            </ul>
            </li>

            <li>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                RAB Ujian
                &nbsp;
                <i class="ace-icon fa fa-angle-down bigger-110"></i>
              </a>

              <ul class="dropdown-menu dropdown-light-blue dropdown-caret">
                <li>
                <li>
                  <a href="<?= base_url('tendik/rab_ujian') ?>">
                  <i class="ace-icon fa fa-envelope bigger-110 green"></i>
                    List RAB
                  </a>
                </li>

                <li>
                  <a href="<?= base_url('tendik/laporan_rab') ?>">
                  <i class="ace-icon fa fa-file-text-o bigger-110 pink"></i>
                    Laporan RAB
                  </a>
                </li>
                
                <li>
                  <a href="<?= base_url('tendik/kas_prodi') ?>">
                  <i class="ace-icon fa fa-money bigger-110"></i>
                    KAS Prodi                    
                  </a>
                </li>

                <li>
                  <a href="<?= base_url('tendik/config_rab') ?>">
                    <i class="ace-icon fa fa-cog bigger-110 blue"></i>
                    Settings
                  </a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                RAW
                &nbsp;
                <i class="ace-icon fa fa-angle-down bigger-110"></i>
              </a>

              <ul class="dropdown-menu dropdown-light-blue dropdown-caret">
                <li>
                  <a href="<?= base_url('tendik/raw') ?>">
                  <i class="ace-icon fa fa-money bigger-110 green"></i>
                    List RAW
                  </a>
                </li>

                <!--<li>-->
                <!--  <a href="<?= base_url('tendik/config_rab') ?>">-->
                <!--    <i class="ace-icon fa fa-cog bigger-110 blue"></i>-->
                <!--    Settings-->
                <!--  </a>-->
                <!--</li>-->
              </ul>
            </li>
             <li>
              <?php 
                $count  = $this->tendik->jumlah_mhs();
              ?>

              <a href="<?= base_url('tendik/mahasiswa') ?>">
                  Pengajuan judul
                   <?php if ($count < 1): ?>
                     <span class="badge badge-danger"></span>
                    <?php else: ?>
                      <span class="badge badge-danger"><?= $count ?></span>
                  <?php endif ?>
              </a>
            </li>

            <!-- new upload -->
            <li>
             <!--  <?php 
                $count  = $this->tendik->jumlah_mhs();
              ?> -->

              <a href="<?= base_url('tendik/pendaftar_ujian') ?>">
                  Pendaftar Ujian
                  <!--  <?php if ($count < 1): ?>
                     <span class="badge badge-danger"></span>
                    <?php else: ?>
                      <span class="badge badge-danger"><?= $count ?></span>
                  <?php endif ?> -->
              </a>
            </li>
            <!-- end new -->

            <li>
              <a href="<?= base_url('tendik/mhs') ?>">
                  Mahasiswa
              </a>
            </li>
            
             <li>
              <a href="<?= base_url('tendik/skpi') ?>">
                  Skpi
              </a>
            </li>

          </ul>
        <?php endif ?>
        </nav>

      </div><!-- /.navbar-container -->
    </div>

<div class="main-container ace-save-state" id="main-container" >
<div class="main-content">
<div class="main-content-inner">
  <div class="page-content">
    <div class="ace-settings-container" id="ace-settings-container">
    </div><!-- /.ace-settings-container -->