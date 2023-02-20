<div class="row">
	<div class="col-md-12 widget-container-col" id="widget-container-col-10">
		<div class="widget-box" id="widget-box-10">
			<div class="widget-header widget-header-small">
				<h5 class="widget-title smaller" id="judul">Repository</h5>
			</div>

			<div class="widget-body">
				<div class="widget-main padding-6">

					<a href="<?= base_url('admin/repository/tambah') ?>" title="Tambah" class="btn btn-sm btn-primary">Tambah</a>
					
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
               		<?php $no =1; foreach ($file as $f): ?>
               			<tr>
	               			<td><?= $no++ ?></td>
	               			<td><?= $f->nama_file ?></td>
                      <td><a href="<?= base_url('assets/adm/file_upload/'.$f->file) ?>" target="_blank" title="<?= $f->nama_file ?>"><?= $f->nama_file ?></a></td>
                      <td>
                        <a href="<?= base_url('admin/repository/hapus_repo/'.$f->id) ?>" title="hapus" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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