<br>
<br>
    
    <!-- Blog Section Start  -->
    <div id="blog-single">
        <div class="row">

        <div class="col-lg-2 col-md-12 col-xs-12 ml-4">
            <div class="widgets">

              <div class="widget-latest-post single-widget">
                <h4 align="center" class="font-weight-light">Filter</h4>
                <ul class="latest-post">
                  <li class="single-latest-post">

                  <div class="accordion accordion-sm" id="accordionExample">
                      
                    <div class="card">
                        <div class="card-header" id="headingOne">
                        <h2>
                            <li data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                           Program Studi
                            </li>
                        </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <a href="<?= base_url('profil/mahasiswa') ?>">tampil semua</a><br>
                            <a href="<?= base_url('profil/cari_pls') ?>">pendidikan luar sekolah</a><br>
                            <a href="<?= base_url('profil/cari_admTik') ?>">ADM TIK</a>
                            
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <li data-toggle="collapse" data-target="#JSKelamin" aria-expanded="false" aria-controls="JSKelamin">
                            Status Mahasiswa
                            </li>
                        </h2>
                        </div>
                        <div id="JSKelamin" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            <a href="<?= base_url('profil/cari_statusAktif') ?>">Aktif</a><br>
                            <a href="<?= base_url('profil/cari_statusNonaktif') ?>">Nonaktif</a>
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <li data-toggle="collapse" data-target="#Agama" aria-expanded="false" aria-controls="Agama">
                            Agama
                            </li>
                        </h2>
                        </div>
                        <div id="Agama" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            <a href="<?= base_url('profil/cari_islam') ?>">islam</a><br>
                            <a href="<?= base_url('profil/cari_kristen') ?>">kristen</a>
                            <a href="<?= base_url('profil/cari_kwc') ?>">Kong whu chu</a>
                        </div>
                        </div>
                    </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
        </div>

        <div class="col-lg-9 col-md-12 col-xs-12">
            <div class="blog-post">

              <div class="post-thumb">
                <img src="assets/img/blog/blog-1-big.jpg" alt="">
              </div>
              <div class="post-content">
              <table class="table table-striped table-sm" id="dataTable">
                <thead class="thead-dark">
              
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama</th>
                      <th scope="col">NIM</th>
                      <th scope="col">L/P</th>
                      <th scope="col">Agama</th>
                      <th scope="col" class="text-center">Total SKS Diambil</th>
                      <th scope="col">Tanggal Lahir</th>
                      <th scope="col">Program Studi</th>
                      <th scope="col">Status</th>
                      <th scope="col">Angkatan</th>
                    </tr>
                    
                </thead>
                <tbody>
                <?php $no = 1; foreach ($mahasiswa as $mhs): ?>
                    <tr>
                      <th scope="row"><?= $no++; ?></th>
                      <td><a href="<?= base_url('profil/detail/'.$mhs->id_mahasiswa); ?>"><?= $mhs->nama_mahasiswa; ?><a></td>
                      <td><?= $mhs->nim; ?></td>
                      <td><?= $mhs->jenis_kelamin; ?></td>
                      <td><?= $mhs->agama; ?></td>
                      <td align="center">-</td>
                      <td><?= $mhs->tgl_lahir; ?></td>
                      <td><?= $mhs->nama_prodi; ?></td>
                      <td><?= $mhs->status; ?></td>
                      <td><?= $mhs->angkatan; ?></td>
                    </tr>
                    <?php endforeach ?>
                   
                </tbody>
                </table> 
              </div>
            </div>
           </div>
        </div>


     </div>
    </div>
<!-- Blog Section End  -->
