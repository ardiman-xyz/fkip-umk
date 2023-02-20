
    <!-- Main content -->
    <div class="content">
      <div class="container">
        
          <div class="row justify-content-md-center">
            <div class="col-md-10">

               <div class="alert alert-success">
                Silahkan berikan matakuliah, sks, dan komentar pada mahasiswa
              </div>
              <span id="message"></span>

              <a href="<?= base_url('dosen/ruang_pa') ?>" title="kembali" class="btn btn-danger btn-sm mb-2">Kembali</a>


              <div class="card">
                <div class="card-header">
                  <h5 class="card-title m-0">Buat penawaran mahasiswa : <b><?= $nama_mhs ?></b></h5>
                </div>
                <div class="card-body">
                 
                 <div class="table-responsive">
                   <table class="table table-bordered table-hover">
                     <thead>
                       <tr>
                         <td>No</td>
                         <td>Name file</td>
                         <th>Data</th>
                       </tr>
                     </thead>
                     <tbody>
                       <tr>
                         <td>1</td>
                         <td>Bukti pembayaran</td>
                         <td><a target="_blank" href="<?= base_url('assets/upload/mahasiswa/penawaran/'.$data->bukti_pembayaran) ?>" title="">Data bukti pembayaran</a></td>
                       </tr>
                       <tr>
                         <td>2</td>
                         <td>Kartu Hasil Studi (KHS)</td>
                         <td><a target="_blank" href="<?= base_url('assets/upload/mahasiswa/penawaran/'.$data->khs) ?>" title="">Data KHS</a></td>
                       </tr>
                       <tr>
                         <td>3</td>
                         <td>Kartu Rencana Studi (KRS)</td>
                         <td><a target="_blank" href="<?= base_url('assets/upload/mahasiswa/penawaran/'.$data->krs) ?>" title="">Data KRS</a></td>
                       </tr>
                       <tr>
                         <td>4</td>
                         <td>Screenshot kuisioner</td>
                         <td><a target="_blank" href="<?= base_url('assets/upload/mahasiswa/penawaran/'.$data->sc_kuisioner) ?>" title="">Data Screenshot Kuisioner</a></td>
                       </tr>
                     </tbody>
                   </table>
                 </div>

                 <hr>

                 <form action="<?= base_url('dosen/update_penawaran_mhs') ?>" method="get" accept-charset="utf-8" id="form_penawaran">
                  <input type="hidden" name="nim" value="<?= $data->nim ?>">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Semester / Tahun akademik</label>
                    <div class="col-sm-3">
                      <select name="semester" class="form-control">
                        <option value="genap" <?= ($data->semester === 'genap') ? 'selected' : '' ?>>Genap</option>
                        <option value="ganjil" <?= ($data->semester === 'ganjil') ? 'selected' : '' ?>>Ganjil</option>
                      </select>
                    </div>
                    <div class="col-sm-2">
                      <select name="thn_akademik" class="form-control" required>
                        <?php foreach ($thn_akademik as $thn): ?>
                          <option value="<?= $thn ?>" <?= ($data->thn_akademik === $thn) ? 'selected' : '' ?>><?= $thn ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">IP Semester lalu</label>
                    <div class="col-sm-3">
                      <input type="text" name="ip_smt_lalu" class="form-control" id="inputEmail3" placeholder="masukkkan ip semester lalu" value="<?= $data->ip_smt_lalu ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Jumlah sks</label>
                    <div class="col-sm-3">
                      <input type="text" name="jumlah_sks" class="form-control" id="inputEmail3" placeholder="masukkkan jumlah sks" value="<?= $data->jml_sks ?>">
                    </div>
                  </div>

                     <button class="btn btn-md btn-primary mb-1" id="btn-tambah">Tambah</button>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Matakuliah yang diprogram</label>
                    <div class="col-sm-6">
                      <?php foreach ($matakuliah as $key => $m): ?>
                         <input type="text" class="form-control mb-1" name="nama_matakuliah[]" id="input-mk<?= $key+1 ?>"  placeholder="Masukkan nama matakuliah" value="<?= $m->nama_matakuliah ?>">
                      <?php endforeach ?>            
                    <span id="input-matakuliah"></span>
                    </div>
                    <div class="col-md-1">
                     <?php foreach ($matakuliah as $key => $m): ?>
                        <button type="button" class="btn btn-md btn-danger mb-1" onclick="hapus_input(<?= $key+1 ?>)" id="btn-hapus<?= $key+1 ?>">Hapus</button>
                     <?php endforeach ?>
                      <span id="btn-hapus"></span>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Komentar penasehat akademik</label>
                    <div class="col-sm-6">
                      <textarea name="komenter_pa" class="form-control" rows="4" placeholder="masukkan komentar"><?= $data->komentar_pa ?></textarea>
                    </div>
                  </div>

                  <button class="btn btn-primary" id="btn-update">Update</button>

                 </form>  
                  
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
               btn_simpan = me.find('#btn-update');
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
            Swal({
                title: "Sukses",
                text: `${callback.pesan}`,
                type: "success",
                showCancelButton: false,
                confirmButtonColor: "#3085d6",
                confirmButtonText: "selesai!"
              }).then(result => {
                if (result.value) {
                  location.href = callback.url;               
                }

              });
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

    let i = 30;

    function tambah_matakuliah()
    {
      $('#input-matakuliah').append(`
        <input type="text" name="nama_matakuliah[]" class="form-control mb-1" id="input-mk${i}" placeholder="Masukkan nama matakuliah">
      `);

      $('#btn-hapus').append(`
        <button type="button" class="btn btn-md btn-danger mb-1" onclick="hapus_input(${i})" id="btn-hapus${i}">Hapus</button>
      `);
      i += 30;
    }

    function hapus_input(key)
    {
      $('#input-mk'+key).remove();
      $('#btn-hapus'+key).remove();
    }

  </script>

