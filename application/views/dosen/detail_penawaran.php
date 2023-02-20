
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
                  <h5 class="card-title m-0">Detail penawaran mahasiswa <b><?= $nama_mhs ?></b></h5>
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

                 <table class="table">
                     <tr>
                       <td>Jumlah sks</td><td><?= $data->jml_sks ?></td>
                     </tr>
                     <tr>
                       <td>IP Semester lalu</td><td><?= $data->ip_smt_lalu ?></td>
                     </tr>
                     <tr>
                       <td>Matakuliah</td>
                       <td>
                         <?php foreach ($matakuliah as $key => $m): ?>
                           <ul>
                             <li><?= $m->nama_matakuliah ?></li>
                           </ul>
                         <?php endforeach ?>
                       </td>
                     </tr>
                      <tr>
                       <td>Komentar</td><td><?= $data->komentar_pa ?></td>
                     </tr>
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

