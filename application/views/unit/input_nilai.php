<br>

<div class="widget-box">

	<div class="widget-header widget-header-blue widget-header-flat">
		<h4 class="widget-title lighter">Input Nilai PPL </h4>
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
					<form id="nilai_form" action="<?= base_url('unit/add_nilai') ?>">
						<input type="hidden" name="nim" id="nim" value="<?= $mahasiswa->nim ?>">
						<input type="hidden" name="method" value="add" id="method">
						<input type="hidden" name="uuid" value="" id="uuid">
						<table class="table table-hover table-bordered" id="nilai">
							<tr>
								<th>no</th>
								<th>Komponen</th>
								<th>Bobot</th>
								<th width="150">Nilai</th>
								<th>Nilai Akhir</th>
							</tr>
							<tbody>
								<tr>
									<td>1</td>
									<td><p>Nilai pelaksanaan pembelajaran di kampus oleh dosen pembimbing </p></td>
									<td>40</td>
									<td><input type="number" name="nilai1" id="nilai1" maxlength="2" class="col-md-10 col-xs-12" required></td>
									<td><input type="text" name="nilai_akhir1" class="col-xs-12" readonly id="nilai_akhir1" value="0"></td>
								</tr>
								<tr>
									<td>2</td>
									<td><p>Nilai pelaksanaan pembelajaran di sekolah dan aspek personal dan sosial </p></td>
									<td>40</td>
									<td><input type="number" name="nilai2" id="nilai2" class="col-md-10 col-xs-12" required></td>
									<td><input type="text" name="nilai_akhir2" class="col-xs-12" readonly id="nilai_akhir2" value="0"></td>
								</tr>
								
							</tbody>
							<tfoot>
								<tr>
									<td>3</td>
									<td><p>Nilai laporan PPL II </p></td>
									<td>20</td>
									<td><input type="number" name="nilai3" required id="nilai3" class="col-md-10 col-xs-12"></td>
									<td><input type="text" name="nilai_akhir3" class="col-xs-12" readonly id="nilai_akhir3" value="0"></td>
								</tr>
								<tr>
									<td colspan="4" align="center"><strong>Jumlah</strong></td>
									<td id="jumlah_nilai" class="center"></td>
								</tr>
								<tr>
									<td colspan="4" align="center"><strong>Skor Akhir</strong></td>
									<td id="skor_akhir" class="center"></td>
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

		$('#nilai1').keyup(function(){
			var total1 = (40 * $('#nilai1').val());

			$('#nilai_akhir1').val(total1);
		});

		$('#nilai2').keyup(function(){
			var total2 = (40 * $('#nilai2').val());

			$('#nilai_akhir2').val(total2);
		});
		$('#nilai3').keyup(function(){
			var total3 = (20 * $('#nilai3').val());

			$('#nilai_akhir3').val(total3);
		});

		$('#submit').on('click', function(e){
			e.preventDefault();

			var btn = $('#submit');
        	btn.attr('disabled', 'disabled').html('<i class="fa fa-spin fa-spinner"></i> Sedang Proses');

        	var data = $('#nilai_form').serialize();
        	var url = $('#nilai_form').attr('action');

			var nilai1 = $('#nilai1').val();
			var nilai2 = $('#nilai2').val();
			var nilai3 = $('#nilai3').val();

			if (nilai1.length == 0 || nilai2.length == 0 || nilai3.length == 0 ) {
				swal('Oops!', 'Silahkan isi 3 input!', 'error');
				btn.removeAttr('disabled').html('<i class="ace-icon fa fa-send"></i> Save');
			}

			if (nilai1.length == 2 && nilai2.length == 2 && nilai3.length == 2 ) {
				
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
				
			} else {
				swal('Oops!', 'hanya boleh 2 angka!', 'error');
				btn.removeAttr('disabled').html('<i class="ace-icon fa fa-send"></i> Save');
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
			url: '<?= base_url() ?>unit/load_nilai',
			success: (data) =>{

				if (!data) {
					$('#nilai1').val("");
					$('#nilai2').val("");
					$('#nilai3').val("");
					$('#nilai_akhir1').val("0");
					$('#nilai_akhir2').val("0");
					$('#nilai_akhir3').val("0");

					
				}else{
					$('#nilai1').val(data.nilai1);
					$('#nilai2').val(data.nilai2);
					$('#nilai3').val(data.nilai3);
					$('#nilai_akhir1').val(data.n_akhir1);
					$('#nilai_akhir2').val(data.n_akhir2);
					$('#nilai_akhir3').val(data.n_akhir3);

					var nilai1 = data.n_akhir1;
					var	nilai2 = data.n_akhir2;
					var	nilai3 = data.n_akhir3
					var jumlah =  parseInt(nilai1) + parseInt(nilai2) + parseInt(nilai3);
					var skor_akhir = jumlah / 100;
					$('#jumlah_nilai').html('<b>'+jumlah+'</b>');
					$('#skor_akhir').html('<span class="badge badge-success">'+skor_akhir+'</span>');

					$('#method').val('edit');
					$('#uuid').val(data.id);
					$('#submit').html('<i class="ace-icon fa fa-send"></i> Update');
					$('#submit').removeClass('btn-primary');
					$('#submit').addClass('btn-success');

				}
			}
		});
	}

</script>