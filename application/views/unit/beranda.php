<br>
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="alert alert-info">
			<button class="close" data-dismiss="alert">
				<i class="ace-icon fa fa-times"></i>
			</button>
			Halaman Beranda Unit
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12 widget-container-col" id="widget-container-col-10">
		<div class="widget-box" id="widget-box-10">
			<div class="widget-header widget-header-small">
				<h5 class="widget-title smaller" id="judul">Profil</h5>
			</div>

			<div class="widget-body">
				<div class="widget-main padding-6">
					<form id="beranda" method="post" action="<?= base_url('unit/update_beranda/'.$data->id)?>" enctype="multipart/form-data">
						<label>Pesan</label>
							 <textarea name="beranda" id="basic-example" cols="30" rows="15"><?= $data->pesan ?></textarea>		
						<hr>
						<div align="center">
							<button class="btn btn-sm btn-secondary" type="reset"><i class="fa fa-times"></i> Reset</button>
					         <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-send"></i> update</button>						
				     	</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php if ($this->session->flashdata('msg') == 'success'): ?>
  <script type="text/javascript">
    iziToast.success({
      timeout: 7000,
      icon: 'fa fa-check',
      title: 'Sukses',
      message: 'Data anda sudah di update!',
      // position: 'topCenter'
    });
  </script>
<?php endif ?>

