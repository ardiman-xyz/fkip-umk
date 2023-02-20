<!-- Menu Start -->
    <div class="menu-area menu-sticky">
        <div class="container">
            <div class="main-menu">
                <div class="row">
                    <div class="col-sm-12">
                        <a class="rs-menu-toggle"><i class="fa fa-bars"></i>Menu</a>
                        <nav class="rs-menu">
                            <ul class="nav-menu">
                                <!--Home Menu Start-->
                                <li> <a href="<?= base_url() ?>">Home</a></li>
                                <!--Home Menu End-->
                                
                                <!--Profil Menu Start-->
                                <li class="menu-item-has-children"> <a href="#">Profil</a>
                                    <ul class="sub-menu">
                                        <li> <a href="<?= base_url('home/sejarah') ?>">Sejarah Fakultas</a></li>
                                        <li><a href="<?= base_url('home/visi_misi') ?>">Visi, Misi dan Tujuan</a></li>
                                        <li><a href="<?= base_url('home/struktur_organisasi') ?>">Struktur Organisasi</a></li>
                                        <li><a href="<?= base_url('home/dosen') ?>">Daftar Dosen</a></li>
                                        <li><a href="<?= base_url('home/tendik') ?>">Daftar Tenaga Kependidikan</a></li>
                                    </ul>
                                </li>
                                <!--Profil Menu End--> 

                                <!-- Pendidikan Menu start -->
                                <li class="menu-item-has-children"> <a href="#">Pendidikan</a>
                                    <ul class="sub-menu"> 
                                       <li class="menu-item-has-children"> <a href="#">Program Studi</a>
                                          <ul class="sub-menu">
                                            <li> <a target="_blank" href="<?= base_url('site/adm') ?>">Administrasi Pendidikan</a></li>
                                            <li> <a target="_blank" href="http://pti.fkip.umkendari.ac.id">Pendidikan Teknologi Informasi</a> </li> 
                                            <li> <a target="_blank" href="#">PENMAS/PNF</a> </li>
                                            <li> <a target="_blank" href="http://paud.fkipumkendari.ac.id/">Pendidikan Guru Pendidikan Anak Usia Dini</a> </li>
                                             <li> <a target="_blank" href="#">Pendidikan Bahasa Inggris</a> </li>
                                          </ul>
                                        </li>
                                        <li><a href="<?= base_url('home/kalender_akademik') ?>">Kalender Akademik</a></li>
                                        <li class="menu-item-has-children"> <a href="#">Survey Kepuasan</a>
                                          <ul class="sub-menu">
                                            <li> <a target="_blank" href="https://forms.gle/Z2G9AKaJs9ERtz6j7">Survei Kinerja Dosen</a></li>
                                            <li> <a target="_blank" href="https://forms.gle/nFszW97Q2qZox5dp8">Pelayanan Administrasi</a> </li> 
                                            <li> <a target="_blank" href="https://forms.gle/WRCEh646rbZ59mTm8">Kuisioner Pemahaman Visi misi</a> </li>
                                          </ul>
                                        </li>
                                    </ul>
                                </li>
                                <!-- Pendidikan menu end -->
                                
                                <!--Kemahasiswaaan Menu Start-->
                                <li class="menu-item-has-children"> <a href="#">Kemahasiswaaan</a>
                                  <ul class="sub-menu">
                                    <li><a href="<?= base_url('home/info_beasiswa') ?>">Informasi Beasiswa</a></li>
                                    <li><a href="<?= base_url('home/organisasi') ?>">Organisasi Kemahasiswaan</a></li>
                                    <li><a target="_blank" href="https://docs.google.com/forms/d/1_GQhUkb57fauXxsmiDnTr7aeVf63o-Ofi27klvl23aI/edit?usp=sharing">Program Magang</a></li>
                                  </ul>
                                </li>
                                <!--Kemahasiswaaan Menu End-->
                                
                                <!--Fasilitas Menu Start-->
                                <li class="menu-item-has-children"> <a href="#">Fasilitas</a>
                                    <ul class="sub-menu">
                                        <li><a href="<?= base_url('home/fasilitas') ?>">Fasilitas Fisik</a></li>
                                    </ul>
                                </li>
                                <!--Fasilitas Menu End-->
                                
                                <!--blog Menu Start-->
                                <li class="menu-item-has-children"> <a href="#">Alumni</a>
                                    <ul class="sub-menu">
                                        <li><a href="#">Profil Alumni</a></li>
                                    </ul>
                                </li>
                                <!--blog Menu End-->
                                
                               <!--Repository Menu Start-->
                                <li class="menu-item-has-children"> <a href="#">Repository</a>
                                    <ul class="sub-menu">
                                        <li><a href="<?= base_url('home/file_assesment') ?>">File Asessment APS</a></li>
                                        <li><a href="<?= base_url('home/repository') ?>">Download Fakultas</a></li>
                                        <li><a href="<?= base_url('home/artikel_magang') ?>">Artikel Magang/PLP 2</a></li>
                                        <li><a href="<?= base_url('home/video_magang') ?>">Video Magang/PLP 2</a></li>
                                        <li><a href="<?= base_url('home/evaluasi_kinerja') ?>">Evaluasi Kinerja</a></li>
                                        <li><a href="<?= base_url('home/skripsi') ?>">Skripsi</a></li>

                                    </ul>
                                </li>
                                <!--Repository Menu End-->
                                <!-- Layanana online -->
                                 <li> <a href="https://jet.or.id/index.php/jet/index" target="_blank">JET</a></li>
                                    <li> <a href="<?= base_url('site/adm/login') ?>">Layanan Online</a></li>
                                <!-- end -->
                            </ul>
                        </nav>
                        <div class="right-bar-icon rs-offcanvas-link text-right">
                            <a class="hidden-xs rs-search" data-target=".search-modal" data-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Menu End -->
</header>
<!--Header End-->

</div>
<!--Full width header End-->