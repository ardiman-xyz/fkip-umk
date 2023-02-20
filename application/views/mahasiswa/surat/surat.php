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
            <th>Download</th>
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
                <?php if($dt->status == 'pending') { ?>
                   <p><span class="badge badge-danger">Pending</span></p>
                 <?php } else if($dt->status == 'diterima') { ?>
                   <p><span class="badge badge-primary">Diterima</span></p>
                 <?php } ?>
                </td>
                <td  align="center">
                  <?php if($dt->status == 'pending') { ?>
                  
                 <?php } else if($dt->status == 'diterima') { ?>
                   <a target="_blank" href="<?= base_url('surat/pdf/') . $dt->id  ?>"  style="border-radius: 1px"><i class="fa fa-download" title="download"></i></a>
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


    <h4 class="widget-title lighter">
      <i class="ace-icon glyphicon glyphicon-ok green"></i>
      Surat Keterangan Aktif Kuliah
    </h4>
       <table class="table table-striped table-sm">
        <thead class="thead-dark">
      
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">NIM</th>
              <th scope="col">Semester</th>
              <th scope="col">Prodi</th>
              <th scope="col">Status</th>
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
                   <p><span class="badge badge-danger">Pending</span></p>
                 <?php } else if($data->status == 'diterima') { ?>
                   <p><span class="badge badge-primary">Diterima</span></p>
                 <?php } ?>
                </td>
                <td  align="center">
                  <?php if($data->status == 'pending') { ?>
                  
                 <?php } else if($data->status == 'diterima') { ?>
                   <a target="_blank" href="<?= base_url('surat/pdf_surat_aktif/') . $data->id_aktif_kuliah  ?>"  style="border-radius: 1px"><i class="fa fa-download" title="download"></i></a>
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


    <h4 class="widget-title lighter">
      <i class="ace-icon glyphicon glyphicon-ok green"></i>
      Surat cuti
    </h4>

        <table class="table table-striped table-sm">
        <thead class="thead-dark">
      
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">NIM</th>
              <th scope="col">Semester</th>
              <th scope="col">Prodi</th>
              <th scope="col">alasan cuti</th>
              <th scope="col">Status</th>
              <th scope="col" align="center">Download</th>
            </tr>
            
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php if (!empty($data_surat_cuti)): ?>
          <?php foreach ($data_surat_cuti as $data): 
            $nama_prodi   = $this->prodi->nama_jurusan($data->prodi);
            ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $data->nama ?></td>
              <td><?= $data->nim ?></td>
              <td><?= $data->smt ?> (<?= $data->semester ?>)</td>
              <td><?= $nama_prodi ?></td>
              <td><?= $data->alasan ?></td>
              <td>
                <?php if($data->status == 'pending') { ?>
                   <p><span class="badge badge-danger">Pending</span></p>
                 <?php } else if($data->status == 'diterima') { ?>
                   <p><span class="badge badge-primary">Diterima</span></p>
                 <?php } ?>
                </td>
                <td  align="center">
                  <?php if($data->status == 'pending') { ?>
                  
                 <?php } else if($data->status == 'diterima') { ?>
                   <a target="_blank" href="<?= base_url('surat/pdf_surat_cuti/') . $data->id_cuti  ?>"  style="border-radius: 1px"><i class="fa fa-download" title="download"></i></a>
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

		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->
	