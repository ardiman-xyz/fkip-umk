<br>
<div class="row justy-content-center">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<!-- PAGE CONTENT BEGINS -->
		
		<div class="alert alert-block alert-success">
			<i class="ace-icon fa fa-check green"></i>
			Welcome to
			<strong class="green">
				Fkip UMKendari
			</strong>, Silhakan buat surat dengan memasukkan data yang valid <br>
			<ul>
				<li>Di Halaman ini tempat anda membuat surat</li>
				<li>Silahkan klik tombol buat surat, untuk membuat surat</li>
				<li>Silahkan klik icon <i class="fa fa-download"></i>, untuk mendownload surat yang telah disetujui</li>
			</ul>
		</div>

		<a href="<?= base_url('mahasiswa/surat/tambah')  ?>" class="btn btn-primary" style="border-radius: 1px; margin-bottom: 7px;"><i class="fa fa-envelope"></i>  Buat Surat</a>
    <h4 class="widget-title lighter">
      <i class="ace-icon glyphicon glyphicon-ok green"></i>
      Surat Izin Penelitian
    </h4>
		<div class="table-responsive">
      <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>NO</th>
            <th>Nama</th>
            <th>Nim</th>
            <th>Semester</th>
            <th>Prodi</th>
            <th>Judul Penelitian</th>
            <th>Status</th>
            <th>Pesan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
              
           <?php $no = 1; ?>
           <?php if (!empty($data)): ?>
            <?php foreach ($data as $dt): 
             $nama_prodi   = $this->prodi->nama_jurusan($dt->prodi);
            ?>
             <tr>
               <td><?= $no++ ?></td>
               <td><?= $dt->nama ?></td>
               <td><?= $dt->nim ?></td>
               <td><?= $dt->semester ?></td>
               <td><?= $nama_prodi ?></td>
               <td><?= $dt->judul_penelitian ?></td>
               <td>
                  <?php if ($dt->status == 'diterima'): ?>
                   <span class="badge badge-success">Diterima</span>
                   <span class="badge badge-success"><?= $dt->updated_at ?></span>
                  <?php elseif($dt->status =='pending') : ?>
                  <span class="badge badge-warning">Sedang di proses</span>
                  <?php elseif($dt->status =='ditolak'): ?>
                    <span class="badge badge-danger">Ditolak</span>
                 <?php endif ?>
                </td>
                <td>
                  <?php if (!empty($dt->ket)): ?>
                    <?= $dt->ket ?>
                  <?php else: ?>
                    --Tidak ada pesan--
                  <?php endif ?>
                </td>
                <td  align="center">
                  <?php if($dt->status == 'pending') { ?>
                  <a href="#" title="edit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModallarge" onclick="submit(<?= $dt->id ?>)">Edit</a>
                <?php }elseif($dt->status == 'ditolak') { ?>
                   <a href="#" title="edit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModallarge" onclick="submit(<?= $dt->id ?>)">Edit</a>
                 <?php } else if($dt->status == 'diterima') { ?>
                   <?php if ($dt->file != ''): ?>
                     <a target="_blank" href="<?= base_url('assets/upload/surat_mahasiswa/'.$dt->file)?>"  style="border-radius: 1px"><i class="fa fa-download" title="download"></i></a>
                    <?php else: ?>
                   <?php endif ?>
                 <?php } ?>
                </td>
             </tr>
           <?php endforeach ?>
           <?php else: ?>
            <tr>
              <td colspan="9" align="center"><h6>Tidak ada surat</h6></td>
            </tr>
          <?php endif ?>                  
                                
        </tbody>
      </table>
    </div>


    <h4 class="widget-title lighter">
      <i class="ace-icon glyphicon glyphicon-ok green"></i>
      Surat Keterangan Aktif Kuliah
    </h4>
      
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-sm">
        <thead class="thead-dark">
      
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">NIM</th>
              <th scope="col">Semester</th>
              <th scope="col">Prodi</th>
              <th scope="col">Status</th>
              <th scope="col">Pesan</th>
              <th scope="col" align="center">Download</th>
            </tr>
            
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php if (!empty($data_surat_aktif)): ?>
            <?php foreach ($data_surat_aktif as $data): 
            $nama_prodi   = $this->prodi->nama_jurusan($data->prodi);
            ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $data->nama ?></td>
              <td><?= $data->nim ?></td>
              <td><?= $data->semester ?></td>
              <td><?= $nama_prodi ?></td>
             <td>
              <?php if($data->status == 'pending') { ?>
                 <p><span class="badge badge-warning">Sedang di proses...</span></p>
               <?php } else if($data->status == 'diterima') { ?>
                 <p><span class="badge badge-success">Diterima</span></p>
                 <span class="badge badge-success"><?= $data->updated_at ?></span>
               <?php } else if($data->status == 'ditolak') { ?>
                <p><span class="badge badge-danger">Ditolak</span></p>                 
               <?php } ?>
              </td>
              <td>
                <?php if (!empty($data->ket)): ?>
                    <?= $data->ket ?>
                  <?php else: ?>
                    --Tidak ada pesan--
                  <?php endif ?>
              </td>
              <td  align="center">
                <?php if($data->status == 'pending') { ?>
                
               <?php } else if($data->status == 'diterima') { ?>
                  <?php if ($data->file != ''): ?>
                     <a target="_blank" href="<?= base_url('assets/upload/surat_mahasiswa/'.$data->file)?>"  style="border-radius: 1px"><i class="fa fa-download" title="download"></i></a>
                    <?php else: ?>
                      -
                   <?php endif ?>
               <?php } ?>
              </td>
            </tr>
          <?php endforeach ?>
          <?php else: ?>
            <tr>
              <td colspan="8" align="center"><h6>Tidak ada surat</h6></td>
            </tr>
          <?php endif ?>
        </tbody>
        </table> 
      </div>


    
    <h4 class="widget-title lighter">
      <i class="ace-icon glyphicon glyphicon-ok green"></i>
      Surat Tidak Menerima Beasiswa
    </h4>

      <div class="table-responsive">
        <table class="table table-striped table-bordered table-sm">
        <thead class="thead-dark">
      
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">NIM</th>
              <th scope="col">Prodi</th>
              <th scope="col">Status</th>
              <th scope="col">Pesan</th>
              <th scope="col" align="center">Download</th>
            </tr>
            
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php if (!empty($data_beasiswa)): ?>
          <?php foreach ($data_beasiswa as $data): 
            $nama_prodi   = $this->prodi->nama_jurusan($data->id_prodi);
            ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $data->nama ?></td>
              <td><?= $data->nim ?></td>
              <td><?= $nama_prodi ?></td>
              <td>
                <?php if($data->status == 'pending') { ?>
                   <p><span class="badge badge-warning">Sedang di proses...</span></p>
                 <?php } else if($data->status == 'diterima') { ?>
                   <p><span class="badge badge-success">Diterima</span></p>
                   <span class="badge badge-success"><?= $data->updated_at ?></span>
                  <?php } else if($data->status == 'ditolak') { ?>
                 <p><span class="badge badge-danger">Ditolak</span></p>
                 <?php } ?>
                </td>
                 <td>
                  <?php if (!empty($data->ket)): ?>
                      <?= $data->ket ?>
                    <?php else: ?>
                      --Tidak ada pesan--
                    <?php endif ?>
                </td>
                <td  align="center">
                  <?php if($data->status == 'pending') { ?>
                  
                 <?php } else if($data->status == 'diterima') { ?>
                   <?php if ($data->file != ''): ?>
                     <a target="_blank" href="<?= base_url('assets/upload/surat_mahasiswa/'.$data->file)?>"  style="border-radius: 1px"><i class="fa fa-download" title="download"></i></a>
                    <?php else: ?>
                      -
                   <?php endif ?>
                 <?php } ?>
                </td>
            </tr>
          <?php endforeach ?>
          <?php else: ?>
             <tr>
              <td colspan="8" align="center"><h6>Tidak ada surat</h6></td>
            </tr>
          <?php endif ?>
        </tbody>
        </table> 
      </div>

		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->
	
<?php if ($this->session->flashdata('msg') == 'success'): ?>
  <script type="text/javascript">
    iziToast.success({
      timeout: 5000,
      icon: 'fa fa-check',
      title: 'ok',
      message: 'Surat Berhasil di Insert! silahkan tunggu konfirmasi.',
      // position: 'topCenter'
    });
  </script>
<?php endif ?>

<!-- modal izin penelitian -->
<div class="modal fade" id="exampleModallarge" tabindex="-1" role="dialog" aria-labelledby="exampleModalLarge" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLarge">Edit Surat izin penelitian<b></b></h5>
        </div>
        <span id="msg"></span>
        <div class="modal-body" id="result">

      </div>
  </div>
</div>

<script type="text/javascript">
  
  function submit(id) {
    $.ajax({
          type: 'post',
          data: 'id='+id,
          url: '<?= base_url() ?>mahasiswa/surat/get_data',
          dataType: 'html',
          success: data => {
            console.log(data)
            $('#result').html(data)
          }
      });
  }

</script>
