<div class="row">
	<div class="col-md-12 widget-container-col" id="widget-container-col-10">
		<div class="widget-box" id="widget-box-10">
			<div class="widget-header widget-header-small">
				<h5 class="widget-title smaller" id="judul">Kemahasiswaan</h5>
			</div>

			<div class="widget-body">
				<div class="widget-main padding-6">
					<form id="pendidikan" method="post" action="<?= base_url('admin/profil/update_kemahasiswaan/') ?>" enctype="multipart/form-data">
						<label>Info Beasiswa</label>
						<input type="file" name="kalender_akademik" class="form-control">
						<br>
						<label>Organisasi Kemahasiswaan</label>
	   					 <textarea name="visi_misi" id="basic-example1" cols="30" rows="10"></textarea>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>