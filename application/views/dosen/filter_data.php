
    <!-- Main content -->
    <div class="content">
      <div class="container">
        
          <div class="row justify-content-md-center">
            <div class="col-md-12">
              <span id="message"></span>

              <a href="<?= base_url('dosen/ruang_pa') ?>" title="kembali" class="btn btn-danger btn-sm mb-2">Kembali</a>


              <div class="card">
                <div class="card-header">
                  <h5 class="card-title m-0"><?= $ket ?></h5>
                </div>
                <div class="card-body">
                 
                 <div class="table-responsive">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">no</th>
                        <th class="text-center">Nim</th>
                        <th class="text-center">Nama mahasiswa</th>
                        <th class="text-center">Dibuat</th>
                        <th class="text-center">Jml matkul</th>
                        <th class="text-center">Jml sks</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($result)): ?>
                        <?php foreach ($result as $key => $d): 
                          $jml_matakuliah = $this->penawaran->getDataMatakuliah($d->nim); 
                          ?>
                            <tr>
                              <td class="text-center"><?= $key + 1; ?></td> 
                              <td class="text-center"><?= $d->nim ?></td>
                              <td><?= $d->nama ?></td>
                              <td class="text-center"><?= pengaturan_tgl($d->date) ?></td>
                              <td class="text-center">
                               <?= $jml_matakuliah ?>  
                               
                                </td>
                              <td class="text-center">
                                <?php if ($d->jml_sks === null): ?>
                                  0
                                <?php else: ?>
                                  <?= $d->jml_sks ?>
                                <?php endif ?>
                              </td>
                              <td class="text-center">
                                <?php if ($d->status === '0'): ?>
                                  <a href="<?= base_url('dosen/buat_penawaran_mhs/'.$d->id) ?>" class="btn btn-sm btn-primary" title="">Buat</a>
                                 <a href="<?= base_url('dosen/hapus_mhs_penawaran/'.$d->id) ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger" title="Hapus">Hapus</a>
                                <?php else: ?>
                                  <a href="<?= base_url('dosen/detail_penawaran/'.$d->nim) ?>" class="btn btn-sm btn-success" title="">Lihat</a>
                                  <a href="<?= base_url('dosen/ubah_penawaran_mhs/'.$d->nim) ?>" class="btn btn-sm btn-primary" title="">Ubah</a>
                                  <a href="<?= base_url('dosen/hapus_mhs_penawaran/'.$d->id) ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger" title="Hapus">Hapus</a>
                                <?php endif ?>
                              </td>
                            </tr>
                        <?php endforeach ?>

                      <?php endif ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div>
          </div>

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>

  <script type="text/javascript">
    $(document).ready(function(){

      $('#form_penawaran').on('submit', function(e){
         e.preventDefault();
         const me = $(this),
               url = me.attr('action'),
               data = me.serialize(),
               btn_simpan = me.find('#btn-simpan');
               btn_simpan.attr('disabled', true);
               btn_simpan.html(`  
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Menyimpan...`);
        $.ajax({
          url: url,
          method: 'post',
          data: data,
          dataType: 'json',
          success: callback => {
            if (callback.status == true) {
              $('#message').html(`<div class="alert alert-success"> ${callback.pesan}
              </div>`);
              btn_simpan.attr('disabled', false);
              btn_simpan.html('Simpan')
            }
          }
        })

      });


      $('#btn-tambah').click(function(e){
        e.preventDefault();
        tambah_matakuliah();
      });

    });

    let i = 1;

    function tambah_matakuliah()
    {
      $('#input-matakuliah').append(`
        <input type="text" name="nama_matakuliah[]" class="form-control mb-1" id="input-mk${i}" placeholder="Masukkan nama matakuliah">
      `);

      $('#btn-hapus').append(`
        <button type="button" class="btn btn-md btn-danger mb-1" onclick="hapus_input(${i})" id="btn-hapus${i}">Hapus</button>
      `);
      i++;
    }

    function hapus_input(key)
    {
      $('#input-mk'+key).remove();
      $('#btn-hapus'+key).remove();
    }

  </script>

