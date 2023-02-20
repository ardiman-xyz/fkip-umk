<br>
<div class="container">
  <div class="row justy-content-center">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <?php if ($this->session->flashdata('pesan')): ?>
        <?= $this->session->flashdata('pesan'); ?>
      <?php endif ?>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <span id="message"></span>

        <div class="alert alert-block alert-success">
          <i class="ace-icon fa fa-warning"></i>
            Silahkan upload skripsi dengan ekstensi (.pdf)
        </div>

        <div class="widget-box">
			<div class="widget-header widget-header-flat">
				<h4 class="widget-title smaller">Tugas Akhir</h4>

				<div class="widget-toolbar">
					<label>
						
						<?php if (!empty($skripsi)): ?>
							<small class="green">
								<b>Submited</b>
							</small>
							<input id="id-check-horizontal" type="checkbox" checked class="ace ace-switch ace-switch-6" disabled>
							<span class="lbl middle"></span>
						<?php else: ?>
							<small class="red">
								<b>Not Submited</b>
							</small>
							<input id="id-check-horizontal" type="checkbox" class="ace ace-switch ace-switch-6" disabled>
							<span class="lbl middle"></span>
						<?php endif ?>
					</label>
				</div>
			</div>

			<div class="widget-body">
				<div class="widget-main">

					<dl id="dt-list-1">
						<dt>Nama Lengkap - NIM</dt>
						<dd>Ardiman - 21711170</dd>
						<br>
						<dt>Judul Skripsi</dt>
						<dd><?= $judul_skripsi ?></dd>
						<br>
						<dt>Upload Skripsi</dt>
						<?php if (empty($skripsi)): ?>
							<form action="<?= base_url("mahasiswa/in/upload_skripsi") ?>" method="post" enctype="multipart/form-data">
							<div class="col-xs-12 col-lg-4" style="margin-top: 5px; margin-bottom: ;">
								<input type="file" name="skripsi" class="form-control" id="skripsi">
							</div>
							<button type="submit"class="btn btn-primary btn-sm" style="margin-top: 5px;">upload</button>
								
							</form>
						<?php else: ?>
							<a href="<?= base_url("assets/upload/skripsi/".$skripsi->skripsi) ?>" title="skripsi" target="_blank"><i class="fa fa-file"></i> File skripsi</a>
						<?php endif ?>
					</dl>
				</div>
			</div>
		</div>

      </div>

    </div>
  </div>
</div>


