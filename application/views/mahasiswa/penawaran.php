
<br>
<div class="container">
  <div class="row justy-content-center">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <!-- PAGE CONTENT BEGINS -->
      <h3>Form menawar manual</h3>
      <?php if ($this->session->flashdata('pesan')): ?>
        <?= $this->session->flashdata('pesan'); ?>
      <?php endif ?>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <span id="message"></span>

    <?php if (empty($data)): ?>

      <div class="alert alert-block alert-success">
        <i class="ace-icon fa fa-warning"></i>
          Silahkan upload persyaratan penawaran 
      </div>

      <div class="widget-box">
        <div class="widget-header widget-header-flat">
          <h4 class="widget-title smaller">isi form dengan data yang valid!</h4>
        </div>

        <div class="widget-body">
          <div class="widget-main">

              <form class="form-horizontal form-label-left" method="post" action="<?= base_url('mahasiswa/penawaran/simpan') ?>" id="penawaran_form" enctype="multipart/form-data">
                   <div class="table-responsive">
                     <table class="table">
                      <tr>
                         <td>Nama Dosen PA</td>
                         <td>
                         <select name="nama_dosen_pa" class="form-control chosen-select" required>
                            <option value="">--Pilih dosen PA--</option>
                            <?php foreach ($dosen as $key => $ds): ?>
                              <option value="<?= $ds->id_dosen ?>"><?= $ds->nama_dosen ?></option>
                            <?php endforeach ?>
                          </select> 
                         </td>
                       </tr>
                     <tr>
                       <td>Bukti Pembayaran (<small>semester ini</small>) </td>
                       <td> 
                        <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="col-md-8  col-xs-8" required>
                       </td>
                     </tr>

                     <tr>
                       <td>KHS (<small>semester sebelumnya</small>) </td>
                       <td> 
                        <input type="file" name="khs" id="khs" class="col-md-8  col-xs-8" required>
                       </td>
                     </tr>


                     <tr>
                       <td>KRS (<small>Sejak semester I sampai sekarang</small>) </td>
                       <td> 
                        <input type="file" name="krs" id="krs" class="col-md-8  col-xs-8" required>
                       </td>
                     </tr>


                     <tr>
                       <td>Screenshoot telah mengisi kusioner</td>
                       <td> 
                        <input type="file" name="sc_kuisioner" id="sc_kuisioner" class="col-md-8  col-xs-8" required>
                       </td>
                     </tr>
                    
                   </table>

                   </div>

                 <button class="btn btn-primary pull-right" name="submit" type="submit" id="submit">Kirim</button>
                 <br>
                 <br>
            </form>

          </div>
        </div>

      </div>


      <?php else: ?>

        <div class="alert alert-block alert-success">
          <i class="ace-icon fa fa-warning"></i>
            Hasil penawaran manual ini adalah kumpulan informasi untuk penawaran online di simak, silahkan cetak dengan mengklik tombol <b>Download</b>, jika ada kebingungan silahkan ke prodi untuk konsultasi
        </div>

        <a href="<?= base_url('mahasiswa/penawaran/tambah') ?>" title="Tambah" class="btn btn-sm btn-primary">Tambah</a>

        <div class="widget-box">
          <div class="widget-header widget-header-flat">
            <h4 class="widget-title smaller">Silahkan download hasil penawaran!</h4>
          </div>

          <div class="widget-body">
            <div class="widget-main">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal insert</th>
                      <th>Semester / TA</th>
                      <th>Nama</th>
                      <th>Status</th>
                      <th width="250">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data as $key => $d): 
                      $nama_mhs = $this->penawaran->getNamaMahasiswa($d->nim);
                      ?>
                      <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= pengaturan_tgl($d->date_created) ?></td>
                        <td><?= $d->semester ?> - <?= $d->thn_akademik ?></td>
                        <td><?= $nama_mhs ?></td>
                        <td><?= ($d->status === '0' ? 'belum' : 'sudah') ?></td>
                        <td>
                          <?php if ($d->status === '0'): ?>
                            <a href="<?= base_url('mahasiswa/penawaran/edit/'.$d->nim) ?>" title="Ubah" class="btn btn-sm btn-info">Ubah</a>
                            <a href="<?= base_url('mahasiswa/penawaran/hapus/'.$d->id) ?>" onclick="return confirm('Anda yakin ?')" title="Hapus" class="btn btn-sm btn-danger">Hapus</a>
                          <?php else: ?>
                            <a target="_blank" href="<?= base_url('mahasiswa/penawaran/download/'.$d->nim) ?>" title="Download" class="btn btn-sm btn-primary">Download</a><!-- 
                             <a href="<?= base_url('mahasiswa/penawaran/edit/'.$d->nim) ?>" title="Ubah" class="btn btn-sm btn-info">Ubah</a>
                            <a href="<?= base_url('mahasiswa/penawaran/hapus/'.$d->id) ?>" onclick="return confirm('Anda yakin ?')" title="Hapus" class="btn btn-sm btn-danger">Hapus</a> -->
                          <?php endif ?>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
      <?php endif ?>

    </div>
  </div>
</div>





