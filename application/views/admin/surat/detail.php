
<div class="row">
  <div class="col-xs-10">
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
					        		<td>semester</td><td>: <?= $data->smt ?> (<?= $data->semester ?>)</td>
					        	</tr>
					        	<tr>
					        	<?php $nama_prodi   = $this->prodi->nama_jurusan($data->prodi); ?> 
					        		<td>prodi</td><td>: <?= $nama_prodi ?></td>
					        	</tr>
					        	<tr>
					        		<td>Alasan</td><td>: <?= $data->alasan ?></td>
					        	</tr>
					        </table>
					</div>
					<div class="col-sm-6">
						<h3>lanjutan</h3>
					    	<table class="table">
					        	<tr>
					        		<td>Alamat Asal</td><td>: <?= $data->alamat_asal ?></td>
					        	</tr>
					        	<tr>
					        		<td>Alamat Sekarang</td><td>: <?= $data->alamat_sekarang ?></td>
					        	</tr>
					        	<tr>
					        		<td>semester</td><td>: <?= $data->telepon ?></td>
					        	</tr>
					        	<tr>
					        		<td>prodi</td><td>: <?= $data->thn_akademik ?></td>
					        	</tr>
					        	<tr>
					        		<td>Tanggal Mendaftar</td><td>: <?= $data->tgl_insert ?></td>
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