<br>
<?php  
	if (isset($errors)) {
		echo "<p class='alert alert-danger'>";
		echo $errors;
		echo "</p>";
	}
?>


<div class="widget-box">
	<div class="widget-header widget-header-blue widget-header-flat">
		<h4 class="widget-title lighter">Form Create New Document</h4>
	</div>

	<div class="widget-body">
		<div class="widget-main">

			<form class="form-horizontal" enctype="multipart/form-data" method="post" id="form_create" action="<?= base_url('unit/save_document') ?>">
				<div class="form-group">
					<label for="id_category_document" class="col-xs-12 col-sm-3 control-label no-padding-right">Kategori Dokumen</label>

					<input type="hidden" name="method" value="add">

					<div class="col-xs-12 col-sm-5">
						<span class="block input-icon input-icon-right">
							<select class="width-100 chosen-select" name="id_category_document" required>
								<option value="">--Pilih--</option>
								<?php foreach ($category_document as $data): ?>
									<option value="<?= $data->id ?>"><?= $data->nama ?></option>
								<?php endforeach ?>
							</select>
						</span>
					</div>
					<div class="help-block col-xs-12 col-sm-reset inline"></div>
					
				</div>

				<div class="form-group">
					<label for="judul" class="col-xs-12 col-sm-3 control-label no-padding-right">Judul</label>

					<div class="col-xs-12 col-sm-5">
						<span class="block input-icon">
							<input type="text" id="judul" class="width-100" name="judul" required />
						</span>
					</div>
					<div class="help-block col-xs-12 col-sm-reset inline"></div>
				</div>
				<div class="form-group">
					<label for="status" class="col-xs-12 col-sm-3 control-label no-padding-right">Publish</label>

					<div class="col-xs-12 col-sm-5">
						<span class="block input-icon input-icon-right">
							<select class="width-30 chosen-select" name="status" required>
								<option value="">--Pilih--</option>
								<option value="Y">Ya</option>
								<option value="N">No</option>
							</select>
						</span>
					</div>
				</div>
				<div class="form-group">
					<label for="file" class="col-xs-12 col-sm-3 control-label no-padding-right">File</label>

					<div class="col-xs-12 col-sm-5">
						<span class="block input-icon">
							<input type="file" id="file" class="width-100" name="file" required />
						</span>
					</div>
				</div>
				<hr>
				<div class="" align="center">
					<a href="<?= base_url('unit/document') ?>" class="btn btn-sm btn-danger">
						<i class="ace-icon fa fa-times"></i>
						Cancel
					</a>

					<button class="btn btn-sm btn-primary btn-next" type="submit" id="submit">
						save
						<i class="ace-icon fa fa-send"></i>
					</button>
				</div>
			</form>

		</div>
	</div>
</div>

