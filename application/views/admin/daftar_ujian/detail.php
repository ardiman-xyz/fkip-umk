<div class="row">
	<div class="col-md-6">
	  <div class="card">
	    <div class="card-body">
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
	        		<td>No. HP</td><td> : <?= $data->no_hp ?> </td>
	        	</tr>
	        </table>
	    </div>
	</div>
	<a align="center" href="<?= base_url('admin/daftar_ujian') ?>" class="btn btn-sm btn-danger">&larr; Kembali</a>

	</div>
	<div class="col-md-6">
		<div class="card">
	    <div class="card-body">
	    	<h3>file persyaratan : </h3>
	    	<hr>
	    	<p><b>Bukti Lolos Toefl</b></p>
	    	<?php if (!empty($data->bukti_lolos_toefl )): ?>
	    		<a href="<?= base_url('assets/upload/image/'.$data->bukti_lolos_toefl) ?>" data-lightbox="mygallery"><img class="img img-thumbnail img-responsive" src="<?= base_url('assets/upload/image/'.$data->bukti_lolos_toefl) ?>" width="200"></a>
	    	<?php else: ?>
	    		<p style="color: red;">Data kosong (bukan prodi bahasa inggris)</p>
	    	<?php endif ?>
	    	<hr>
	    	<p><b>Bukti Pembayaran Dana Ujian</b></p>
	    	<a href="<?= base_url('assets/upload/image/'.$data->bukti_pembayaran_DU) ?>" data-lightbox="mygallery"><img class="img img-thumbnail img-responsive" src="<?= base_url('assets/upload/image/'.$data->bukti_pembayaran_DU) ?>" width="200"></a>
	    	<hr>
	    	<p><b>Lembar/Hal. Persetujuan Pembimbing</b></p>
	    	<a href="<?= base_url('assets/upload/image/'.$data->persetujuan_pembimbing) ?>" data-lightbox="mygallery"><img class="img img-thumbnail img-responsive" src="<?= base_url('assets/upload/image/'.$data->persetujuan_pembimbing) ?>" width="200"></a>
	    	<hr>
	    	<p><b>Bukti Lolos BTQ</b></p>
	    	<a href="<?= base_url('assets/upload/image/'.$data->bukti_btq) ?>" data-lightbox="mygallery"><img class="img img-thumbnail img-responsive" src="<?= base_url('assets/upload/image/'.$data->bukti_btq) ?>" width="200"></a>
	    	<hr>
	    	<p><b>Transkrip Nilai</b></p>
	    	<a href="<?= base_url('assets/upload/image/'.$data->transkrip_nilai) ?>" data-lightbox="mygallery"><img class="img img-thumbnail img-responsive" src="<?= base_url('assets/upload/image/'.$data->transkrip_nilai) ?>" width="200"></a>
	    	<hr>
	    </div>
	</div>
	</div>
</div>