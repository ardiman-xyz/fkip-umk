<style type="text/css">
	.bg{
		background-image: url(<?= base_url("assets/img/bg.png") ?>);

	}

	#headingOne, #headingTwo{
		padding: 0 !important;
	}

	#headingOne button{
		/*color: hove*/
		text-decoration: none
	}

	#headingOne button:hover{
		/*color: hove*/
		color: black
	}

	#headingTwo button{
		/*color: hove*/
		text-decoration: none
	}

	#headingTwo button:hover{
		/*color: hove*/
		color: black
	}
</style>

<div class="bg">
	<br>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<nav aria-label="breadcrumb" >
				  <ol class="breadcrumb" style="border-radius: 0px !important; box-shadow: 1px 1px #e0e0d1 !important">
				    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
				  </ol>
				</nav>
			</div>
		</div>
	</div>
</section>
<section class="ftco-section ftco-no-pt ftc-no-pb">
<div class="container">
	<div class="row ">
		<div class="col-md-1"></div>
		<div class="col-md-10 justy-content-center">
			<div class="card border-secondary" style="border-radius: 0px !important; box-shadow: 1px 1px #e0e0d1 !important">
			  <div class="card-header">
			   <i class="fa fa-tasks"></i> REPOSITORY
			  </div>
			  <div class="card-body">
			  	<nav>
				  <div class="nav nav-tabs" id="nav-tab" role="tablist">
				    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#KKNDik" role="tab" aria-controls="KKNDik" aria-selected="true">KKNDik</a>
				    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#magang" role="tab" aria-controls="magang" aria-selected="false">MAGANG</a>
				    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#plp" role="tab" aria-controls="plp" aria-selected="false">PLP</a>
				    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#video" role="tab" aria-controls="video" aria-selected="false">Video Kegiatan</a>
				  </div>
				</nav>
				<div class="tab-content" id="nav-tabContent">
				  <div class="tab-pane fade show active" id="KKNDik" role="tabpanel" aria-labelledby="nav-home-tab"> <br>
				  	<div class="alert alert-warning" style="border-radius: 0px !important">
				  	Dokumen KKNDik
				  	</div>

				  	<table class="table table-sm table-hover table-bordered">
				  		<thead>
				  			<tr>
				  				<td align="center" width="70">No</td>
				  				<td align="center">Keterangan File</td>
				  				<td align="center" width="150">Download</td>
				  			</tr>
				  		</thead>
				  		<tbody>
				  			<?php $no = 1; foreach ($kkndik as $k): ?>
				  				<tr>
				  					<td align="center"><?= $no++ ?></td>
				  					<td><?= $k->judul ?></td>
				  					<td align="center">
				  						<a target="_blank" class="btn btn-sm btn-primary" style="border-radius: 2px !important"  href="<?= base_url('assets/upload/unit_document/'.$k->file) ?>"><i class="fa fa-download"></i> Download</a>
				  					</td>
				  				</tr>
				  			<?php endforeach ?>
				  		</tbody>
				  	</table>
				  </div>
				  <div class="tab-pane fade" id="magang" role="tabpanel" aria-labelledby="nav-profile-tab"><br>
				  	<div class="alert alert-warning" style="border-radius: 0px !important">
				  	Dokumen Magang
				  	</div>
				  		<table class="table table-sm table-hover table-bordered">
				  		<thead>
				  			<tr>
				  				<td align="center" width="70">No</td>
				  				<td align="center">Keterangan File</td>
				  				<td align="center" width="150">Download</td>
				  			</tr>
				  		</thead>
				  		<tbody>
				  			<?php $no = 1; foreach ($magang as $m): ?>
				  				<tr>
				  					<td align="center"><?= $no++ ?></td>
				  					<td><?= $m->judul ?></td>
				  					<td align="center">
				  						<a target="_blank" class="btn btn-sm btn-primary" style="border-radius: 2px !important"  href="<?= base_url('assets/upload/unit_document/'.$k->file) ?>"><i class="fa fa-download"></i> Download</a>
				  					</td>
				  				</tr>
				  			<?php endforeach ?>
				  		</tbody>
				  	</table>
				  </div>
				  <div class="tab-pane fade" id="plp" role="tabpanel" aria-labelledby="nav-contact-tab">
				  	<br>
				  	<div class="alert alert-warning" style="border-radius: 0px !important">
				  	Dokumen PLP
				  	</div>
				  		<table class="table table-sm table-hover table-bordered">
				  		<thead>
				  			<tr>
				  				<td align="center" width="70">No</td>
				  				<td align="center">Keterangan File</td>
				  				<td align="center" width="150">Download</td>
				  			</tr>
				  		</thead>
				  		<tbody>
				  			<?php $no = 1; foreach ($plp as $p): ?>
				  				<tr>
				  					<td align="center"><?= $no++ ?></td>
				  					<td><?= $p->judul ?></td>
				  					<td align="center">
				  						<a target="_blank" class="btn btn-sm btn-primary" style="border-radius: 2px !important"  href="<?= base_url('assets/upload/unit_document/'.$p->file) ?>"><i class="fa fa-download"></i> Download</a>
				  					</td>
				  				</tr>
				  			<?php endforeach ?>
				  		</tbody>
				  	</table>
				  </div>
				  <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="nav-contact-tab"><br>
				  	<div class="alert alert-warning" style="border-radius: 0px !important">
				  	Video Unit Kegiatan
				  	</div>

			  		<div class="row">
			  			<?php foreach ($video as $v): ?>
			  				<div class="col-md-4 mb-3">
								<div class="video">
									<iframe width="560" height="150" src="https://www.youtube.com/embed/<?= $v->link_youtube ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									<p><?= $v->judul ?> - <b><?= pengaturan_tgl($v->tgl_pelaksanaan) ?></b></p>
								</div>
				  			</div>
			  			<?php endforeach ?>
			  		</div>
			  		<?= $this->pagination->create_links(); ?>
				  </div>
				</div>
			  </div>
			</div>
		</div>
	</div>
</div>
</section>
<br>
</div>
