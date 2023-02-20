
<div class="container" style="margin-top: 20px">

	<div class="alert alert-warning">
		<i class="fa fa-list"></i> List RAB Ujian
	</div>

	<?= $this->session->flashdata('success') ?>
		
		<div style="margin-bottom: 10px">
			<a href="<?= base_url('tendik/buat_rab_ujian') ?>" title="buat RAB Ujian" class="btn btn-sm btn-primary">Buat RAB Ujian</a>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered table-hover" id="dynamic-table">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Tanggal</th>
						<th class="text-center">Jenis RAB</th>
						<th class="text-center">Edit Tgl</th>
						<th  width="35%" class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; foreach ($data_rab as $key => $rab): 
						$jenis_ujian = $this->daftar_ujian->nama_jenis_ujian($rab->id_jenis_ujian)
					?>
						<tr>
							<td class="text-center"><?= $no++ ?></td>
							<td class="text-center"><?= pengaturan_tgl($rab->date_created) ?></td>
							<td align="center"><?= $jenis_ujian ?></td>
							<td>
								<div class="input-group">
									<input class="form-control" type="date" name="tanggal" id="input_tgl<?= $key+1  ?>">
									<span class="input-group-btn">
										<button class="btn btn-sm btn-primary" id="btn_edit<?= $key+1  ?>" type="button" onclick="edit_tgl(<?= $rab->id ?>, <?= $key+1  ?>)">
											<i class="ace-icon fa fa-check bigger-110"></i>
											Update
										</button>
									</span>
								</div>
							</td>
							<td>
								<center>
								<?php if ($this->session->userdata('prodi') === '4'): ?>
										<a href="<?= base_url('tendik/upload_form/'.$rab->id_surat) ?>" title="detail surat" class="btn btn-sm btn-primary"><i class="fa fa-upload"></i> Upload Bukti</a>
									<?php endif ?>
									<a target="_blank" href="<?= base_url('tendik/cetak_rab/'.$rab->id_surat) ?>" title="print RAB" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-print"></i> Print</a>
									<a href="<?= base_url('tendik/hapus_rab/'.$rab->id_surat) ?>" onclick="return confirm('Anda yakin ?')" title="hapus RAB" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
								</center>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>

</div>
<script>
	function edit_tgl(id, key) {
		
		const value = $(`#input_tgl${key}`).val();

		if (!value) {
			alert('Tanggal harus di isi');
			false;
		}else{
			$.ajax({
				url: "<?= base_url('tendik/edit_tgl_rab') ?>",
				method: "post",
				data: {id: id, value: value},
				dataType: "json",
				beforeSend: () =>{
					const btn_edit = $(`#btn_edit${key}`).html(`<i class="ace-icon fa fa-spinner fa-spin bigger-125"></i> Mengupdate...`);
					btn_edit.attr('disabled', true);
				},
				complete: () =>{
					const btn_edit = $(`#btn_edit${key}`).html(`<i class="ace-icon fa fa-check bigger-110"></i>Update`);
					btn_edit.attr('disabled', false);
				},
				success: response =>{
					if (response.status === true) {
						 Swal({
					      title: `sukses`,
					      text: `${response.pesan}`,
					      type: "success",
					      showCancelButton: false,
					      confirmButtonColor: "#3085d6",
					      confirmButtonText: "Selesai!"
					    }).then(result => {
					      if (result.value) {
					      		location.reload();
					        }
		   				 });
					}
				}
			});
		}

		

	}
</script>