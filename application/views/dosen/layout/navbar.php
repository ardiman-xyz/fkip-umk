 <style type="text/css">
   .nav-item:hover a{
     background-color: #22B0C8 !important;
     color: white !important;
   }
 </style>

 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="<?= base_url('dosen/on') ?>" class="navbar-brand">
        <img src="<?= base_url('assets/img/')  ?>hat.png" alt="Logo" class="brand-image img-circle"
             >
        <span class="brand-text font-weight-light dosen-font">Dosen Fkip</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
           <li class="nav-item">
          <a href="<?= base_url('dosen/on') ?>" class="nav-link"><b><i class="fa fa-home"></i> Home</b></a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('dosen/update_pass') ?>" class="nav-link"><b><i class="fa fa-lock"></i> Ganti password</b></a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('dosen/ruang_pa') ?>" class="nav-link"><b><i class="fa fa-book"></i> Ruang PA</b></a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('dosen/out') ?>" class="nav-link"><b><i class="fa fa-sign-out"></i> Keluar</b></a>
        </li>
        </ul>

      </div>


    </div>
  </nav>
  <!-- /.navbar -->


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Profil Dosen</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('dosen/on') ?>">Home</a></li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->