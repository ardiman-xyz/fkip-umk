<br>
<div class="row justy-content-center">
    <div class="container">
        <div class="alert alert-block alert-warning">
            <i class="ace-icon fa fa-check green"></i>
            Selamat datang du halaman <strong>Profil Administrasi Pendidikan</strong>
        </div>
    </div>
	<div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="list-group">
                  <a href="<?= base_url('tendik/pengumuman_berita/') ?>" class="list-group-item list-group-item-action">
                    Pengumuman & berita
                  </a>
                  <a href="<?= base_url('tendik/profil/') ?>" class="list-group-item list-group-item-action">
                    Profil
                  </a>
                  <a href="<?= base_url('tendik/akademik/') ?>" class="list-group-item list-group-item-action">Akademik</a>
                  <a href="<?= base_url('tendik/fasilitas/') ?>" class="list-group-item list-group-item-action">Fasilitas</a>
                  <a href="<?= base_url('tendik/penelitian_pengabdian/') ?>" class="list-group-item list-group-item-action active">Penelitian dan pengabdian</a>
                  <a href="<?= base_url('tendik/alumni/') ?>" class="list-group-item list-group-item-action">Alumni</a>
                     <a href="<?= base_url('tendik/gambar/') ?>" class="list-group-item list-group-item-action">Gambar</a>
                      <a href="<?= base_url('tendik/repository/') ?>" class="list-group-item list-group-item-action ">Repository</a>
                </div>
            </div>
        </div>
    </div>
	<div class="col-md-9">
    <?php if ($this->session->flashdata('sukses')): ?>
      <div class="alert alert-success">
        <?= $this->session->flashdata('sukses') ?>
      </div>
    <?php endif ?>
		<!-- PAGE CONTENT BEGINS -->
       <div class="card">
           <div class="card-body">
           	<a href="<?= base_url('tendik/tambah_repo') ?>" class="btn btn-sm btn-primary">Tambah</a>
               <table class="table table-stripped" id="dynamic-table">
               	<thead>
               		<tr>
               			<th>NO</th>
               			<th>Nama file</th>
               			<th>file</th>
                    <th>Action</th>
               		</tr>
               	</thead>
               	<tbody>
               		<!-- <?php $no =1; foreach ($file as $f): ?>
               			<tr>
	               			<td><?= $no++ ?></td>
	               			<td><?= $f->nama_file ?></td>
                      <td><a href="<?= base_url('assets/adm/file_upload/'.$f->file) ?>" target="_blank" title="<?= $f->nama_file ?>"><?= $f->nama_file ?></a></td>
                      <td>
                        <a href="<?= base_url('tendik/hapus_repo/'.$f->id) ?>" title="hapus" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                      </td>   
	               		</tr>
               		<?php endforeach ?> -->
               	</tbody>
               </table>		
           </div>
       </div>    
    </div>
</div>
</div>
