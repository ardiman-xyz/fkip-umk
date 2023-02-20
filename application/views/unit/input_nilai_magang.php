<br>

<div class="widget-box">

	<div class="widget-header widget-header-blue widget-header-flat">
		<h4 class="widget-title lighter">Input Nilai Magang </h4>
	</div>

	<div class="widget-body">
		<div class="widget-main">

			<div class="container">
				<div class="row">
					<div class="col-md-2">
						<?php if (!empty($img->image)): ?>
							<img id="avatar" class="editable img-responsive img-thumbnail" alt="foto mahasiswa" src="<?= base_url('assets/img/profile_pengguna/'.$img->image) ?>" />
						<?php else: ?>
							<?php if ($img->jenis_kelamin == 'P'): ?>
					        	<img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="<?= base_url('assets/img/') ?>muslim_women.jpg" />
						        <?php else: ?>
						        	<img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="<?= base_url('assets/img/') ?>men.jpg"/>
						        <?php endif ?>
						<?php endif ?>
					</div>
					<div class="col-md-4">
						<table class="table table-hover">
							<tr>
								<td>Nama</td><td> : <?= $mahasiswa->nama ?></td>
							</tr>
							<tr>
								<td>Nim</td><td> : <?= $mahasiswa->nim ?></td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td><td> : 
									<?= $img->jenis_kelamin == "L" ? "Laki-laki" : "Perempuan" ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<hr>
			<div class="container">
				<div class="col-md-10">
					<form id="nilai_magang_form" action="<?= base_url('unit/add_nilai_magang') ?>">
						<input type="hidden" name="nim" id="nim" value="<?= $mahasiswa->nim ?>">
						<input type="hidden" name="method" value="add" id="method">
						<input type="hidden" name="uuid" value="" id="uuid">
						
						<hr>

						<table class="table table-hover table-bordered">
							<thead>
								<tr>
									<th class="center">No</th>
									<th class="center">Aspek Penilaian</th>
									<th class="center" colspan="4">Skor</th>
								</tr>
							</thead>
							<tbody>
									<tr>
										<td>1</td>
										<td><p>Tata tulis dan sistematika penulisan</p></td>
										<td>
											<label>
												<input name="nilai1" type="radio" class="ace" value="1" />
												<span class="lbl"> 1</span>
											</label>
										</td>
										<td>
											<label>
												<input name="nilai1" type="radio" class="ace" value="2" />
												<span class="lbl"> 2</span>
											</label>
										</td>
										<td>
											<label>
												<input name="nilai1" type="radio" class="ace" value="3" />
												<span class="lbl"> 3</span>
											</label>
										</td>
										<td>
											<label>
												<input name="nilai1" type="radio" class="ace" value="4" />
												<span class="lbl"> 4</span>
											</label>
										</td>
									</tr>
									<tr>
										<td>2</td>
										<td><p>Pemahaman latar belakang kegiatan magang</p></td>
										<td>
											<label>
												<input name="nilai2" type="radio" class="ace" value="1" />
												<span class="lbl"> 1</span>
											</label>
										</td>
										<td>
											<label>
												<input name="nilai2" type="radio" class="ace" value="2" />
												<span class="lbl"> 2</span>
											</label>
										</td>
										<td>
											<label>
												<input name="nilai2" type="radio" class="ace" value="3" />
												<span class="lbl"> 3</span>
											</label>
										</td>
										<td>
											<label>
												<input name="nilai2" type="radio" class="ace" value="4" />
												<span class="lbl"> 4</span>
											</label>
										</td>
									</tr>
									<tr>
										<td>3</td>
										<td><p>Pemahaman terhadap profil sekolah mitra</p></td>
										<td>
											<label>
												<input name="nilai3" type="radio" class="ace" value="1" />
												<span class="lbl"> 1</span>
											</label>
										</td>
										<td>
											<label>
												<input name="nilai3" type="radio" class="ace" value="2" />
												<span class="lbl"> 2</span>
											</label>
										</td>
										<td>
											<label>
												<input name="nilai3" type="radio" class="ace" value="3" />
												<span class="lbl"> 3</span>
											</label>
										</td>
										<td>
											<label>
												<input name="nilai3" type="radio" class="ace" value="4" />
												<span class="lbl"> 4</span>
											</label>
										</td>
									</tr>
									<tr>
										<td>4</td>
										<td><p>Pemahaman terhadap visi misi mitra</p></td>
										<td>
											<label>
												<input name="nilai4" type="radio" class="ace" value="1" />
												<span class="lbl"> 1</span>
											</label>
										</td>
										<td>
											<label>
												<input name="nilai4" type="radio" class="ace" value="2" />
												<span class="lbl"> 2</span>
											</label>
										</td>
										<td>
											<label>
												<input name="nilai4" type="radio" class="ace" value="3" />
												<span class="lbl"> 3</span>
											</label>
										</td>
										<td>
											<label>
												<input name="nilai4" type="radio" class="ace" value="4" />
												<span class="lbl"> 4</span>
											</label>
										</td>
									</tr>
									<tr>
										<td>5</td>
										<td><p>Pemahaman terhadap pengembangan kegiatan akademik mitra</p></td>
										<td>
											<label>
												<input name="nilai5" type="radio" class="ace" value="1" />
												<span class="lbl"> 1</span>
											</label>
										</td>
										<td>
											<label>
												<input name="nilai5" type="radio" class="ace" value="2" />
												<span class="lbl"> 2</span>
											</label>
										</td>
										<td>
											<label>
												<input name="nilai5" type="radio" class="ace" value="3" />
												<span class="lbl"> 3</span>
											</label>
										</td>
										<td>
											<label>
												<input name="nilai5" type="radio" class="ace" value="4" />
												<span class="lbl"> 4</span>
											</label>
										</td>
									</tr>
									<tr>
										<td>6</td>
										<td><p>Pemahaman terhadap kegiatan non akademik mitra</p></td>
										<td>
											<label>
												<input name="nilai6" type="radio" class="ace" value="1" />
												<span class="lbl"> 1</span>
											</label>
										</td>
										<td>
											<label>
												<input name="nilai6" type="radio" class="ace" value="2" />
												<span class="lbl"> 2</span>
											</label>
										</td>
										<td>
											<label>
												<input name="nilai6" type="radio" class="ace" value="3" />
												<span class="lbl"> 3</span>
											</label>
										</td>
										<td>
											<label>
												<input name="nilai6" type="radio" class="ace" value="4" />
												<span class="lbl"> 4</span>
											</label>
										</td>
									</tr>
									<tr>
										<td>7</td>
										<td><p>Kesesuian simpulan saran</p></td>
										<td>
											<label>
												<input name="nilai7" type="radio" class="ace" value="1" />
												<span class="lbl"> 1</span>
											</label>
										</td>
										<td>
											<label>
												<input name="nilai7" type="radio" class="ace" value="2" />
												<span class="lbl"> 2</span>
											</label>
										</td>
										<td>
											<label>
												<input name="nilai7" type="radio" class="ace" value="3" />
												<span class="lbl"> 3</span>
											</label>
										</td>
										<td>
											<label>
												<input name="nilai7" type="radio" class="ace" value="4" />
												<span class="lbl"> 4</span>
											</label>
										</td>
									</tr>
									<tr>
										<td>8</td>
										<td><p>Kelengkapan laporan</p></td>
										<td>
											<label>
												<input name="nilai8" type="radio" class="ace" value="1" />
												<span class="lbl"> 1</span>
											</label>
										</td>
										<td>
											<label>
												<input name="nilai8" type="radio" class="ace" value="2" />
												<span class="lbl"> 2</span>
											</label>
										</td>
										<td>
											<label>
												<input name="nilai8" type="radio" class="ace" value="3" />
												<span class="lbl"> 3</span>
											</label>
										</td>
										<td>
											<label>
												<input name="nilai8" type="radio" class="ace" value="4" />
												<span class="lbl"> 4</span>
											</label>
										</td>
									</tr>
								</form>
							</tbody>
							<tfoot>
								<tr>
									<th colspan="2" class="center">JUMLAH</th>
									<td colspan="4" id="jumlah" class="center"></td>
								</tr>
								<tr>
									<th colspan="2" class="center">SKOR AKHIR PELAKSANAAN MAGANG</th>
									<td colspan="4" id="skor_akhir" class="center"></td>
								</tr>
							</tfoot>
						</table>

						<hr>
						<div class="" align="center">
							<a href="<?= base_url('unit/mahasiswa') ?>" class="btn btn-sm btn-danger">
								<i class="ace-icon fa fa-times"></i>
								Cancel
							</a>

							<button class="btn btn-sm btn-primary btn-save" type="submit" id="submit">
								save
								<i class="ace-icon fa fa-send"></i>
							</button>
						</div>
					</form>
				</div>
			</div>
			

		</div>
	</div>
</div>


<script type="text/javascript">

	$(document).ready(function(){

		load_nilai();

		$('#submit').on('click', function(e){
			e.preventDefault();

			var btn = $('#submit');
        	btn.attr('disabled', 'disabled').html('<i class="fa fa-spin fa-spinner"></i> Sedang Proses');

        	var data = $('#nilai_magang_form').serialize();
        	var url = $('#nilai_magang_form').attr('action');

			var nilai1 = $('[name="nilai1"]:checked');
			var nilai2 = $('[name="nilai2"]:checked');
			var nilai3 = $('[name="nilai3"]:checked');
			var nilai4 = $('[name="nilai4"]:checked');
			var nilai5 = $('[name="nilai5"]:checked');
			var nilai6 = $('[name="nilai6"]:checked');
			var nilai7 = $('[name="nilai7"]:checked');
			var nilai8 = $('[name="nilai8"]:checked');

			if (nilai1.length == 0 ){
				swal('Oops!', 'Silahkan isi semua radio button 1!', 'error');
				btn.removeAttr('disabled').html('<i class="ace-icon fa fa-send"></i> Save');
				false;
			}else if(nilai2.length == 0 ){
				swal('Oops!', 'Silahkan isi semua radio button 2!', 'error');
				btn.removeAttr('disabled').html('<i class="ace-icon fa fa-send"></i> Save');
				false;
			}else if(nilai3.length == 0 ){
				swal('Oops!', 'Silahkan isi semua radio button 3!', 'error');
				btn.removeAttr('disabled').html('<i class="ace-icon fa fa-send"></i> Save');
				false;
			}else if(nilai4.length == 0 ){
				swal('Oops!', 'Silahkan isi semua radio button 4!', 'error');
				btn.removeAttr('disabled').html('<i class="ace-icon fa fa-send"></i> Save');
				false;
			}else if(nilai5.length == 0 ){
				swal('Oops!', 'Silahkan isi semua radio button 5!', 'error');
				btn.removeAttr('disabled').html('<i class="ace-icon fa fa-send"></i> Save');
				false;
			}else if(nilai6.length == 0 ){
				swal('Oops!', 'Silahkan isi semua radio button 6!', 'error');
				btn.removeAttr('disabled').html('<i class="ace-icon fa fa-send"></i> Save');
				false;
			}else if(nilai7.length == 0 ){
				swal('Oops!', 'Silahkan isi semua radio button 7!', 'error');
				btn.removeAttr('disabled').html('<i class="ace-icon fa fa-send"></i> Save');
				false;
			}else if(nilai8.length == 0 ){
				swal('Oops!', 'Silahkan isi semua radio button 8!', 'error');
				btn.removeAttr('disabled').html('<i class="ace-icon fa fa-send"></i> Save');
				false;
			} else {
				$.ajax({
				type: 'post',
				url: url,
				dataType: 'json',
				data: data,
				success:function(callback)
				{
					btn.removeAttr('disabled').html('<i class="ace-icon fa fa-send"></i> Save');
					if (callback.pesan) {
						swal('sukses!', 'Nilai berhasil di insert!', 'success');

					} else if(callback.pesan === false)
					{
						swal('sukses!', 'Nilai berhasil di Update!', 'success');
					}
					load_nilai();
				}
			});
			}

			
				
		});

	});



	function load_nilai()
	{
		var nim = $('#nim').val();

		$.ajax({
			type: 'post',
			dataType: 'json',
			data: 'nim='+nim,
			url: '<?= base_url() ?>unit/load_nilai_magang',
			success: (data) =>{

				if (!data) {
					$('input:radio[name="nilai1"][value='+data.nilai1+']')[0].checked = false;
					$('input:radio[name="nilai2"][value='+data.nilai2+']')[0].checked = false;
					$('input:radio[name="nilai3"][value='+data.nilai3+']')[0].checked = false;
					$('input:radio[name="nilai4"][value='+data.nilai4+']')[0].checked = false;
					$('input:radio[name="nilai5"][value='+data.nilai5+']')[0].checked = false;
					$('input:radio[name="nilai6"][value='+data.nilai6+']')[0].checked = false;
					$('input:radio[name="nilai7"][value='+data.nilai7+']')[0].checked = false;
					$('input:radio[name="nilai8"][value='+data.nilai8+']')[0].checked = false;

				}else{
					$('input:radio[name="nilai1"][value='+data.nilai1+']')[0].checked = true;
					$('input:radio[name="nilai2"][value='+data.nilai2+']')[0].checked = true;
					$('input:radio[name="nilai3"][value='+data.nilai3+']')[0].checked = true;
					$('input:radio[name="nilai4"][value='+data.nilai4+']')[0].checked = true;
					$('input:radio[name="nilai5"][value='+data.nilai5+']')[0].checked = true;
					$('input:radio[name="nilai6"][value='+data.nilai6+']')[0].checked = true;
					$('input:radio[name="nilai7"][value='+data.nilai7+']')[0].checked = true;
					$('input:radio[name="nilai8"][value='+data.nilai8+']')[0].checked = true;

					var nilai1 = data.nilai1;
					var	nilai2 = data.nilai2;
					var	nilai3 = data.nilai3;
					var nilai4 = data.nilai4;
					var	nilai5 = data.nilai5;
					var	nilai6 = data.nilai6;
					var nilai7 = data.nilai7;
					var	nilai8 = data.nilai8;
					var jumlah =  parseInt(nilai1) + parseInt(nilai2) + parseInt(nilai3) + parseInt(nilai4) + parseInt(nilai5) + parseInt(nilai6) + parseInt(nilai7) + parseInt(nilai8);
					var skor_akhir = (jumlah/32) * 100;
					$('#jumlah').html('<b>'+jumlah+'</b>');
					$('#skor_akhir').html('<span class="badge badge-success">'+skor_akhir+'</span>');

					$('#method').val('edit');
					$('#uuid').val(data.id);
					$('#update').text(data.date_created);
					$('#submit').html('<i class="ace-icon fa fa-send"></i> Update');
					$('#submit').removeClass('btn-primary');
					$('#submit').addClass('btn-success');

				}
			}
		});
	}

</script>