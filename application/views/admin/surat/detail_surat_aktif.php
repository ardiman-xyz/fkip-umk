
<div class="row">
  <div class="col-xs-12">
    <!-- PAGE CONTENT BEGINS -->
      
    <div class="widget-box">
		<div class="widget-header widget-header-flat">
			<h4 class="widget-title">Biodata lengkap <?= $data->nama ?></h4>
		</div>

		<div class="widget-body">
			<div class="widget-main">
				<div class="row">

					<div class="col-sm-6">
						<h3>Biodata : </h3>
					         <table class="table">
					        	<tr>
					        		<td>nama</td><td>: <?= $data->nama ?></td>
					        	</tr>
					        	<tr>
					        		<td>nim</td><td>: <?= $data->nim ?></td>
					        	</tr>
					        	<tr>
					        		<td>semester</td><td>: <?= $data->semester ?></td>
					        	</tr>
					        	<tr>
					        	<?php $nama_prodi   = $this->prodi->nama_jurusan($data->prodi); ?> 
					        		<td>prodi</td><td>: <?= $nama_prodi ?></td>
					        	</tr>
					        	<tr>
					        		<td>Tempat Lahir</td><td>: <?= $data->tempat_lahir ?></td>
					        	</tr>
					        	<tr>
					        		<td>Tanggal lahir</td><td>: <?= $data->tgl_lahir ?></td>
					        	</tr>
					        	<tr>
					        		<td>Alamat</td><td>: <?= $data->alamat ?></td>
					        	</tr>
					        </table>
					</div>
					<div class="col-sm-6">
						<h3>Data Orang Tua / Wali</h3>
				    	<table class="table">
				        	<tr>
				        		<td>Nama Orang tua</td><td>: <?= $data->nama_ortu ?></td>
				        	</tr>
				        	<tr>
				        		<td>Alamat Orang Tua</td><td>: <?= $data->alamat_ortu ?></td>
				        	</tr>
				        	<tr>
				        		<td>NIP</td><td>: <?= $data->nip ?></td>
				        	</tr>
				        	<tr>
				        		<td>Pangkat</td><td>: <?= $data->pangkat ?></td>
				        	</tr>
				        	<tr>
				        		<td>Jabatan</td><td>: <?= $data->jabatan ?></td>
				        	</tr>
				        	<tr>
				        		<td>Instansi</td><td>: <?= $data->instansi ?></td>
				        	</tr>
				        	<tr>
				        		<td>Tanggal Medanftar</td><td>: <?= $data->tgl_insert ?></td>
				        	</tr>
				        </table>

					</div>
				</div>
			</div>
		</div>
	</div>
<a align="center" href="<?= base_url('admin/surat') ?>" class="btn btn-sm btn-danger">&larr; Kembali</a>

    <!-- PAGE CONTENT ENDS -->
  </div><!-- /.col -->
</div><!-- /.row -->