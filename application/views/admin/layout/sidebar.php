<!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('assets/admin') ?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $this->session->userdata('nama_user'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN</li>
        <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="header">USERS</li>
        <li><a href="<?= base_url('admin/dosen/') ?>"><i class="fa fa-user-secret"></i> <span>Dosen</span></a></li>
         <li><a href="<?= base_url('admin/mahasiswa/') ?>"><i class="fa fa-users"></i> <span>Mahasiswa</span></a></li>
        <li><a href="<?= base_url('admin/user/') ?>"><i class="fa fa-user-secret"></i> <span>Users</span></a></li>

        <!-- Publish -->
        <li class="header">PUBLISH</li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-home"></i>
            <span>Profil Fakultas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/profil') ?>"><i class="fa fa-circle-o"></i> Profil</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Pendidikan</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Kemahasiswaan</a></li>
            <li><a href="../UI/sliders.html"><i class="fa fa-circle-o"></i> Fasilitas</a></li>
            <li><a href="<?= base_url('admin/profil/tendik') ?>"><i class="fa fa-circle-o"></i> Tendik</a></li>
          </ul>
        </li>
        <li><a href="<?= base_url('admin/berita') ?>"><i class="fa fa-newspaper-o"></i> <span>Berita</span></a></li>
        <li><a href="<?= base_url('admin/pengumuman') ?>"><i class="fa fa-bullhorn"></i> <span>Pengumuman</span></a></li>
        
         <li class="treeview">
          <a href="#">
            <i class="fa fa-picture-o"></i> <span>Gallery</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/galeri') ?>"><i class="fa fa-circle-o"></i> Gallery Foto</a></li>
            <li><a href="../tables/data.html"><i class="fa fa-circle-o"></i> Gallery Video</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Repository</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../tables/simple.html"><i class="fa fa-circle-o"></i> Repository</a></li>
            <li><a href="../tables/data.html"><i class="fa fa-circle-o"></i> File Assesment</a></li>
          </ul>
        </li>

        <!-- settings -->
        <li class="header">SETTINGS</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gears"></i> <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/konfigurasi') ?>"><i class="fa fa-circle-o"></i>Main settings</a></li>
            <li><a href="../tables/data.html"><i class="fa fa-circle-o"></i> Logo</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>