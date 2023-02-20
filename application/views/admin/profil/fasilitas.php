<style type="text/css">
	.table > tbody > tr > td{
		vertical-align: middle;
	}
</style>

<div class="row">
	<div class="col-md-12 widget-container-col" id="widget-container-col-10">
		<div class="widget-box" id="widget-box-10">
			<div class="widget-header widget-header-small">
				<h5 class="widget-title smaller" id="judul">Fasilitas</h5>
			</div>

			<div class="widget-body">
				<div class="widget-main padding-6">

					<a href="<?= base_url('admin/profil/tambah_fasilitas') ?>" title="Tambah" class="btn btn-sm btn-primary">Tambah</a>
					
					<table class="table table-stripped" id="dynamic-table">
		               	<thead>
		               		<tr>
		               			<th>NO</th>
		               			<th>Foto Fasilitas</th>
		               			<th>Judul</th>
			                    <th>Action</th>
		               		</tr>
		               	</thead>
		               	<tbody>
		               		<?php $no =1; foreach ($fasilitas as $f): ?>
		               			<tr>
			               			<td><?= $no++ ?></td>
			               			<td><img src="<?= base_url('assets/upload/fasilitas/'.$f->foto) ?>" alt="img fasilitas" width="100"></td>
			               			<td><?= $f->judul ?></td>
		                      <td>
		                        <a href="<?= base_url('tendik/hapus_fasilitas/'.$f->id) ?>" title="hapus" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
		                      </td>   
			               		</tr>
		               		<?php endforeach ?>
		               	</tbody>
		               </table>			

				</div>
			</div>
		</div>
	</div>
</div>