<br><br>
    <!-- Blog Section Start  -->
    <div id="blog-single">
        <div class="row">

        <div class="col-lg-2 col-md-12 col-xs-12 ml-4">
        <div class="card text-center shadow-sm p-2 bg-white rounded">
            <?php if($mahasiswa->foto !="") { ?>
                <img src="<?= base_url('assets/img/mahasiswa/'.$mahasiswa->foto); ?>" class="card-img-top" alt="..." height="150">
            <?php }else { ?>
                <img src="<?= base_url('assets/img/default.png'); ?>" class="card-img-top" alt="..." height="150">
            <?php } ?>
            </div>
        </div>

        <div class="col-lg-9 col-md-12 col-xs-12">
            <div class="blog-post">
                <div class="row m-2">
                <div class="col-md-6">
                   <table class="table table-striped table-sm text-dark">
                       <tr>
                           <td>Nama</td><td>    :&nbsp;<?= $mahasiswa->nama_mahasiswa ?></td>
                       </tr>
                        <tr>
                           <td>Tempat Lahir</td><td>    :&nbsp; <?= $mahasiswa->tempat_lahir ?></td>
                       </tr>
                        <tr>
                           <td>Jenis Kelamin</td><td>    :&nbsp; <?php if($mahasiswa->jenis_kelamin == "L"){echo"Laki-laki";}else{echo"Perempuan";} ?></td>
                       </tr>
                   </table>
               </div>
                <div class="col-md-6">
                   <table class="table table-striped table-sm text-dark">
                        <tr>
                           <td>Nama Ibu</td><td>    : &nbsp;<?= $mahasiswa->nama_ibu; ?></td>
                       </tr>
                        <tr>
                           <td>Tanggal Lahir</td><td>    : &nbsp;<?= date('d M Y', strtotime($mahasiswa->tgl_lahir)); ?></td>
                       </tr>    
                        <tr>
                           <td>Agama</td><td>    : &nbsp; <?= $mahasiswa->agama; ?></td>
                       </tr>
                   </table>
               </div>
                </div>
                
              <div class="post-content">
                
              <div class="pills-regular">
                    <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="home" aria-selected="true">Alamat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="profile" aria-selected="false">Orang Tua</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#akta" role="tab" aria-controls="profile" aria-selected="false">Wali</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#prodi" role="tab" aria-controls="profile" aria-selected="false">Kebutuhan Khusus</a>
                        </li>
                       
                    </ul>
                </div>

                <div class="pills-regular">
                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="row">
                            
                            <div class="col-md-12">
                                <table class="table table-striped table-sm">
                                    <tr>
                                        <td>NIK</td><td>    :</td>
                                    </tr>
                                        <td>NISN</td><td>    : </td>
                                    </tr>
                                        <td>NPWP</td><td>    : </td>
                                    </tr>
                                        <td>Kewarganegaraan</td><td>    : </td>
                                    </tr>
                                    </tr>
                                        <td>Jalan</td><td>    : </td>
                                    </tr>
                                    </tr>
                                        <td>Dusun</td><td>    : </td>
                                    </tr>
                                    </tr>
                                        <td>Kelurahan</td><td>    : </td>
                                    </tr>
                                    </tr>
                                        <td>Kecamatan</td><td>    : </td>
                                    </tr>
                                    </tr>
                                        <td>Jenis Tinggal</td><td>    : </td>
                                    </tr>
                                    </tr>
                                        <td>Penerima KPS</td><td>    : </td>
                                    </tr>
                                </table>
                            </div>
                                
                        </div>
                        </div>

                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="row">
                            <div class="col-md-6">
                                <table class="table table-sm table-striped">
                                    <h6 style="font-weight:900;">Ayah</h6>
                                    <tr>
                                        <td>NIK</td><td>    : <?= $mahasiswa->nik_ayah; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td><td>    : <?= $mahasiswa->nama_ayah; ?></td>
                                    </tr>
                                        <td>Tanggal Lahir</td><td>    : <?= $mahasiswa->tgl_lahir_ayah; ?></td>
                                    </tr>
                                    </tr>
                                        <td>Pendidikan</td><td>    : <?= $mahasiswa->pendidikan_ayah; ?></td>
                                    </tr>
                                    </tr>
                                        <td>Pekerjaan</td><td>    : <?= $mahasiswa->pekerjaan_ayah; ?></td>
                                    </tr>
                                    </tr>
                                        <td>Penghasilan</td><td>    : <?= $mahasiswa->penghasilan_ayah; ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-sm table-striped">
                                    <h6 style="font-weight:900;">Ibu</h6>
                                    <tr>
                                        <td>NIK</td><td>    : <?= $mahasiswa->nik_ibu; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td><td>    : <?= $mahasiswa->nama_ibu; ?></td>
                                    </tr>
                                        <td>Tanggal Lahir</td><td>    : <?= $mahasiswa->tgl_lahir_ibu; ?></td>
                                    </tr>
                                    </tr>
                                        <td>Pendidikan</td><td>    : <?= $mahasiswa->pendidikan_ibu; ?></td>
                                    </tr>
                                    </tr>
                                        <td>Pekerjaan</td><td>    : <?= $mahasiswa->pekerjaan_ibu; ?></td>
                                    </tr>
                                    </tr>
                                        <td>Penghasilan</td><td>    : <?= $mahasiswa->penghasilan_ibu; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        </div>

                        <div class="tab-pane fade" id="akta" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="row">
                            <div class="col-lg-6">
                                <table class="table table-striped table-sm">
                                <h6 style="font-weight:900;">Wali</h6>
                                    <tr>
                                        <td>Nama</td><td>    : </td>
                                    </tr>
                                        <td>Tanggal Lahir</td><td>    : </td>
                                    </tr>
                                    </tr>
                                        <td>Pendidikan</td><td>    : </td>
                                    </tr>
                                    </tr>
                                        <td>Pekerjaan</td><td>    : </td>
                                    </tr>
                                    </tr>
                                        <td>Penghasilan</td><td>    : </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        </div>

                        <div class="tab-pane fade" id="prodi" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="row">
                            <div class="col">
                                
                            </div>
                        </div>
                        </div>

              </div>
            </div>
           </div>
        </div>


     </div>
    </div>
<!-- Blog Section End  -->
