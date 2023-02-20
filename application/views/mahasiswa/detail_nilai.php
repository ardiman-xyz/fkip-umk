<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <br>
        <a href="<?= base_url('mahasiswa/magang') ?>" class="btn btn-sm btn-danger"><i class="fa-arrow-left fa"></i> Kembali</a>
        <div class="widget-box">

          <div class="widget-header widget-header-blue widget-header-flat">
            <h4 class="widget-title lighter">Lihat nilai : </h4>
            <div class="widget-toolbar">
              <label>
                <small class="green">
                  <b><a href="<?= base_url('mahasiswa/magang/print_nilai/'.$data_mhs->nim.'/'.$program) ?>" target="_blank"><i class="fa fa-print"></i> Print nilai</a></b>
                </small>
              </label>
            </div>
          </div>

          <div class="widget-body">
            <div class="widget-main">

              <div class="container">
                <div class="row">
                  <div class="col-md-4">
                    <table class="table table-hover">
                      <?php  
                      $nama_sekolah = $this->unit->getNamaSekolah($data_mhs->id_sekolah);  
                      $nama_pamong = $this->unit->getNamaPamong($data_mhs->id_sekolah);
                      ?>
                      <tr>
                        <td>Lokasi Magang : </td> <td><?= $nama_sekolah ?></td>
                      </tr>
                      <tr>
                        <td>Pamong : </td> <td><?= $nama_pamong?></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <hr>
              <br>
                
              <?php if ($program == 'plp'): ?>
                <table class="table table-hover table-bordered">
                  <tr>
                    <th>no</th>
                    <th>Komponen</th>
                    <th class="center">Bobot</th>
                    <th width="100" class="center">Nilai</th>
                    <th width="100" class="center">Nilai Akhir</th>
                  </tr>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td><p>Nilai pelaksanaan pembelajaran di kampus oleh dosen pembimbing </p></td>
                      <td class="center">40</td>
                      <td id="nilai1" class="center">
                        <?php if (!empty($data_nilai->nilai1)): ?>
                        <?= $data_nilai->nilai1 ?>
                        <?php else: ?>
                          -
                      <?php endif ?></td>
                      <td id="n_akhir1" class="center">
                        <?php if (!empty($data_nilai->n_akhir1)): ?>
                        <?= $data_nilai->n_akhir1 ?>
                        <?php else: ?>
                          -
                      <?php endif ?>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td><p>Nilai pelaksanaan pembelajaran di sekolah dan aspek personal dan sosial </p></td>
                      <td class="center">40</td>
                      <td id="nilai2" class="center"><?php if (!empty($data_nilai->nilai2)): ?>
                        <?= $data_nilai->nilai2 ?>
                        <?php else: ?>
                          -
                      <?php endif ?></td>
                      <td id="n_akhir2" class="center">
                        <?php if (!empty($data_nilai->n_akhir2)): ?>
                        <?= $data_nilai->n_akhir2 ?>
                        <?php else: ?>
                          -
                      <?php endif ?>
                      </td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td><p>Nilai laporan PPL II </p></td>
                      <td class="center">20</td>
                      <td id="nilai3" class="center">
                        <?php if (!empty($data_nilai->nilai3)): ?>
                        <?= $data_nilai->nilai3 ?>
                        <?php else: ?>
                          -
                      <?php endif ?>
                      </td>
                      <td id="n_akhir3" class="center">
                        <?php if (!empty($data_nilai->n_akhir3)): ?>
                        <?= $data_nilai->n_akhir3 ?>
                        <?php else: ?>
                          -
                      <?php endif ?>
                      </td>
                    </tr>
                    
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="4" align="center"><b>Jumlah</b></td>
                     <?php if ($data_nilai != null): ?>
                        <?php $jumlah = $data_nilai->n_akhir1 + $data_nilai->n_akhir2 + $data_nilai->n_akhir3 ?>
                      <td align="center"><?= $jumlah ?></td>
                      <?php else: ?>
                        <td align="center">0</td>
                     <?php endif ?>
                    </tr>
                    <tr>
                      <td colspan="4" align="center"><b>Skor Akhir</b></td>
                      <?php if ($data_nilai != null): ?>
                        <?php $skor_akhir = $jumlah / 100 ?>
                      <td align="center"><span class="badge badge-success"><?= $skor_akhir ?></span></td>
                      <?php else: ?>
                        <td align="center"><span class="badge badge-success">0</span></td>
                      <?php endif ?>
                    </tr>
                  </tfoot>
                </table>
              <?php else: ?>

                <table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th class="center">No</th>
                  <th class="center">Aspek Penilaian</th>
                  <th class="center">Skor</th>
                </tr>
              </thead>
              <tbody>
                  <tr>
                    <td class="center">1</td>
                    <td><p>Tata tulis dan sistematika penulisan</p></td>
                    <td id="nilai1" class="center">
                      <?php if (!empty($data_nilai->nilai1)): ?>
                      <?= $data_nilai->nilai1 ?>
                     <?php else: ?>
                     - 
                    <?php endif ?>
                    </td>
                  </tr>
                  <tr>
                    <td class="center">2</td>
                    <td><p>Pemahaman latar belakang kegiatan magang</p></td>
                    <td id="nilai2" class="center">
                      <?php if (!empty($data_nilai->nilai2)): ?>
                      <?= $data_nilai->nilai2 ?>
                     <?php else: ?>
                     - 
                    <?php endif ?>
                    </td>
                  </tr>
                  <tr>
                    <td class="center">3</td>
                    <td><p>Pemahaman terhadap profil sekolah mitra</p></td>
                    <td id="nilai3" class="center">
                      <?php if (!empty($data_nilai->nilai3)): ?>
                      <?= $data_nilai->nilai3 ?>
                     <?php else: ?>
                     - 
                    <?php endif ?>
                    </td>
                  </tr>
                  <tr>
                    <td class="center">4</td>
                    <td><p>Pemahaman terhadap visi misi mitra</p></td>
                    <td id="nilai4" class="center">
                      <?php if (!empty($data_nilai->nilai4)): ?>
                      <?= $data_nilai->nilai4 ?>
                     <?php else: ?>
                     - 
                    <?php endif ?>
                    </td>
                  </tr>
                  <tr>
                    <td class="center">5</td>
                    <td><p>Pemahaman terhadap pengembangan kegiatan akademik mitra</p></td>
                    <td id="nilai5" class="center">
                      <?php if (!empty($data_nilai->nilai5)): ?>
                      <?= $data_nilai->nilai5 ?>
                     <?php else: ?>
                     - 
                    <?php endif ?>
                    </td>
                  </tr>
                  <tr>
                    <td class="center">6</td>
                    <td><p>Pemahaman terhadap kegiatan non akademik mitra</p></td>
                    <td id="nilai6"  class="center">
                      <?php if (!empty($data_nilai->nilai6)): ?>
                      <?= $data_nilai->nilai6 ?>
                     <?php else: ?>
                     - 
                    <?php endif ?>
                    </td>
                  </tr>
                  <tr>
                    <td class="center">7</td>
                    <td><p>Kesesuian simpulan saran</p></td>
                    <td id="nilai7" class="center">
                      <?php if (!empty($data_nilai->nilai7)): ?>
                      <?= $data_nilai->nilai7 ?>
                     <?php else: ?>
                     - 
                    <?php endif ?>
                    </td>
                  </tr>
                  <tr>
                    <td class="center">8</td>
                    <td><p>Kelengkapan laporan</p></td>
                    <td id="nilai8" class="center">
                      <?php if (!empty($data_nilai->nilai8)): ?>
                      <?= $data_nilai->nilai8 ?>
                     <?php else: ?>
                     - 
                    <?php endif ?>
                    </td>
                  </tr>
                </form>
              </tbody>
              <tfoot>
                <tr>
                  <th colspan="2" class="center"> Jumlah </th>
                 <?php if (!empty($data_nilai)): ?>
                    <?php $jumlah = $data_nilai->nilai1 + $data_nilai->nilai2 + $data_nilai->nilai3 + $data_nilai->nilai4 + $data_nilai->nilai5 + $data_nilai->nilai6 + $data_nilai->nilai7 + $data_nilai->nilai8  ?>
                  <td class="center"><b><?= $jumlah ?></b></td>
                  <?php else: ?>
                    <td class="center"><b>0</b></td>
                 <?php endif ?>
                </tr>
                <tr>
                  <th colspan="2" class="center"> Skor akhir pelaksanaan magang </th>
                  <?php if (!empty($data_nilai)): ?>
                  <?php $nilai_akhir = ($jumlah/32) * 100; ?>
                    <td class="center"><span class="badge badge-success"><?= $nilai_akhir ?></span></td>
                    <?php else: ?>
                      <td class="center"><span class="badge badge-success">0</span></td>
                  <?php endif ?>
                </tr>
              </tfoot>
            </table>

              <?php endif ?>

              <hr>
             
            </div>
          </div>
        </div>

    </div>
  </div>
</div>