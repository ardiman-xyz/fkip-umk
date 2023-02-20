<br>
<a href="<?= base_url('unit/mahasiswa') ?>" class="btn btn-sm btn-danger"><i class="fa-arrow-left fa"></i> Kembali</a>
<div class="widget-box">

	<div class="widget-header widget-header-blue widget-header-flat">
		<h4 class="widget-title lighter">Lihat nilai : </h4>
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
			<br>
			<div class="container">
				<div class="col-md-10">
					<form id="nilai_form" action="<?= base_url('unit/add_nilai') ?>">
						<input type="hidden" name="nim" id="nim" value="<?= $mahasiswa->nim ?>">
						<input type="hidden" name="method" value="add" id="method">
						<input type="hidden" name="uuid" value="" id="uuid">
						<table class="table table-hover table-bordered">
							<tr>
								<th>no</th>
								<th>Komponen</th>
								<th class="center">Bobot</th>
								<th width="100" class="center">Nilai</th>
								<th width="100" class="center">Nilai Akhir</th>
							</tr>
							<tbody>
								<tr>
									<td>1</td>
									<td><p>Nilai pelaksanaan pembelajaran di kampus oleh dosen pembimbing </p></td>
									<td class="center">40</td>
									<td id="nilai1" class="center"></td>
									<td id="n_akhir1" class="center"></td>
								</tr>
								<tr>
									<td>2</td>
									<td><p>Nilai pelaksanaan pembelajaran di sekolah dan aspek personal dan sosial </p></td>
									<td class="center">40</td>
									<td id="nilai2" class="center"></td>
									<td id="n_akhir2" class="center"></td>
								</tr>
								<tr>
									<td>3</td>
									<td><p>Nilai laporan PPL II </p></td>
									<td class="center">20</td>
									<td id="nilai3" class="center"></td>
									<td id="n_akhir3" class="center"></td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="4" class="center"><b>JUMLAH</b></td>
									<td id="jumlah" class="center"></td>
								</tr>
								<tr>
									<td colspan="4" align="center"><strong>SKOR AKHIR</strong></td>
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
			url: '<?= base_url() ?>unit/load_nilai',
			success: (data) =>{

				if (!data) {
					$('#nilai1').text('-');
					$('#nilai2').text('-');
					$('#nilai3').text('-');
					$('#n_akhir1').text('-');
					$('#n_akhir2').text('-');
					$('#n_akhir3').text('-');
					
				}else{
					$('#nilai1').text(data.nilai1);
					$('#nilai2').text(data.nilai2);
					$('#nilai3').text(data.nilai3);
					$('#n_akhir1').text(data.n_akhir1);
					$('#n_akhir2').text(data.n_akhir2);
					$('#n_akhir3').text(data.n_akhir3);

					var nilai1 = data.n_akhir1;
					var	nilai2 = data.n_akhir2;
					var	nilai3 = data.n_akhir3
					var jumlah =  parseInt(nilai1) + parseInt(nilai2) + parseInt(nilai3);
					var skor_akhir = jumlah / 100;
					$('#jumlah').html('<b>'+jumlah+'</b>');
					$('#skor_akhir').html('<span class="badge badge-success">'+skor_akhir+'</span>');

				}
			}
		});
	}

</script>