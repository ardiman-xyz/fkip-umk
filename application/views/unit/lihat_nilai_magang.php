<br>
<a href="<?= base_url('unit/mahasiswa') ?>" class="btn btn-sm btn-danger"> <i class="fa-arrow-left fa"></i> Kembali</a>
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
									<th class="center">Skor</th>
								</tr>
							</thead>
							<tbody>
									<tr>
										<td class="center">1</td>
										<td><p>Tata tulis dan sistematika penulisan</p></td>
										<td id="nilai1" class="center"></td>
									</tr>
									<tr>
										<td class="center">2</td>
										<td><p>Pemahaman latar belakang kegiatan magang</p></td>
										<td id="nilai2" class="center"></td>
									</tr>
									<tr>
										<td class="center">3</td>
										<td><p>Pemahaman terhadap profil sekolah mitra</p></td>
										<td id="nilai3" class="center"></td>
									</tr>
									<tr>
										<td class="center">4</td>
										<td><p>Pemahaman terhadap visi misi mitra</p></td>
										<td id="nilai4" class="center"></td>
									</tr>
									<tr>
										<td class="center">5</td>
										<td><p>Pemahaman terhadap pengembangan kegiatan akademik mitra</p></td>
										<td id="nilai5" class="center"></td>
									</tr>
									<tr>
										<td class="center">6</td>
										<td><p>Pemahaman terhadap kegiatan non akademik mitra</p></td>
										<td id="nilai6"  class="center"></td>
									</tr>
									<tr>
										<td class="center">7</td>
										<td><p>Kesesuian simpulan saran</p></td>
										<td id="nilai7" class="center"></td>
									</tr>
									<tr>
										<td class="center">8</td>
										<td><p>Kelengkapan laporan</p></td>
										<td id="nilai8" class="center"></td>
									</tr>
								</form>
							</tbody>
							<tfoot>
								<tr>
									<th colspan="2" class="center">JUMLAH</th>
									<td id="jumlah" class="center"></td>
								</tr>
								<tr>
									<th colspan="2" class="center">Skor akhir pelaksanaan magang </th>
									<td id="skor_akhir" class="center"></td>
								</tr>
							</tfoot>
						</table>

						<hr>
					</form>
				</div>
			</div>
			

		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		load_nilai();
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
					$('#nilai1').text('-');
					$('#nilai2').text('-');
					$('#nilai3').text('-');
					$('#nilai4').text('-');
					$('#nilai5').text('-');
					$('#nilai6').text('-');
					$('#nilai7').text('-');
					$('#nilai8').text('-');

				}else{
					$('#nilai1').text(data.nilai1);
					$('#nilai2').text(data.nilai2);
					$('#nilai3').text(data.nilai3);
					$('#nilai4').text(data.nilai4);
					$('#nilai5').text(data.nilai5);
					$('#nilai6').text(data.nilai6);
					$('#nilai7').text(data.nilai7);
					$('#nilai8').text(data.nilai8);

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