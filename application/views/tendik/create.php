
<div class="container" style="margin-top: 20px">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="alert alert-warning">
			<i class="fa fa-bullhorn"></i> Buat Surat Seminar
		</div>

		<?= $this->session->flashdata('success') ?>
		
		<div style="margin-bottom: 20px">
			<a href="<?= base_url('tendik/surat_seminar') ?>" title="buat RAB Ujian" class="btn btn-sm btn-danger">&laquo; Kembali</a>
		</div>

		<form class="form-horizontal" role="form" method="post" id="myForms" action="<?= base_url('tendik/create_action') ?>">

			<div class="widget-box light-border">
					<div class="widget-header">
						<h5>
							<i class="ace-icon glyphicon glyphicon-user green"></i>
							<strong>TIM PENGUJI</strong>
						</h5>

						<table class="table" id="table1">
							<tr>
								<td><strong>Ketua</strong></td>
								<td>:</td>
								<td>
									<div class="row">
										<div class="col-md-6">
											<select class="form-control chosen-select" name="ketua" required>
												<option value="">--Pilih--</option>
												<?php foreach ($dosen as $data): ?>
													<option value="<?= $data->nama_dosen ?>"><?= $data->nama_dosen ?></option>
												<?php endforeach ?>
											</select>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td><strong>Sekretaris</strong></td>
								<td>:</td>
								<td>
									<div class="row">
										<div class="col-md-6">
											<select class="form-control chosen-select" name="sekretaris" required>
												<option value="">--Pilih--</option>
												<?php foreach ($dosen as $data): ?>
													<option value="<?= $data->nama_dosen ?>"><?= $data->nama_dosen ?></option>
												<?php endforeach ?>
											</select>
										</div>	
									</div>		
								</td>
							</tr>
							<tr>
								<td><strong>Anggota1</strong></td>
								<td>:</td>
								<td>
									<div class="row">
										<div class="col-md-5">
											<input onkeyup="get_autocomplete(1)" type="text" class="form-control" placeholder="ketikkan nama dosen" id="get_autocomplete1" required name="anggota[]">
										</div>
										<div class="col-md-2">
											<select name="status_penguji[]">
												<option value="N">--Status--</option>
												<option value="Y">penguji tamu</option>
											</select>
										</div>
										<div class="col-md-2"><button id="tambah_anggota" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus"></i></button>
										</div>
									</div>
								</td>
							</tr>
						</table>

				</div>
			</div>

			<div class="widget-box light-border"style="margin-top: 20px">
				<div class="widget-header">
					<h5>
						<i class="ace-icon fa fa-calendar orange"></i>
						<strong> JADWAL UJIAN</strong>
					</h5>

					<table class="table">
						<tr>
							<td><strong>Jenis Ujian</strong></td>
							<td>:</td>
							<td>
								<div class="row">
									<div class="col-md-5">
										<select name="jenis_ujian" class="form-control" required>
											<option value="">-- Pilih --</option>
											<?php foreach ($jenis_ujian as $ujian): ?>
												<option value="<?= $ujian->id_ujian ?>"><?= $ujian->nama_ujian ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td><strong>Jadwal ujian</strong></td>
							<td>:</td>
							<td>
								<div class="row">
									<div class="col-md-5">
										<input type="text" id="datepicker" placeholder="jadwal ujian..." class="form-control col-sm-5" name="jadwal_ujian" required autocomplete="off"/>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td><strong>Waktu</strong></td>
							<td>:</td>
							<td>
								<div class="row">
									<div class="col-md-5">
										<div class="input-group clockpicker">
										    <input type="text" class="form-control" value="00:00" name="waktu" required>
										    <span class="input-group-addon">
										        <span class="glyphicon glyphicon-time"></span>
										    </span>
										</div>
									</div>	
								</div>		
							</td>
						</tr>
						<tr>
							<td><strong>Tempat</strong></td>
							<td>:</td>
							<td>
								<div class="row">
									<div class="col-md-5">
										<div class="input-group clockpicker">
										    <textarea name="tempat" rows="3" cols="40" placeholder="Masukkan tempat" required></textarea>
										</div>
									</div>	
								</div>		
							</td>
						</tr>
					</table>
				</div>
			</div>

			<!-- 3 -->
			<div class="widget-box light-border"style="margin-top: 20px">
				<div class="widget-header">
					<h5>
						<i class="ace-icon fa fa-users pink"></i>
						<strong>Mahasiwa yang ujian</strong>
					</h5>


					<table class="table" id="table2">
						<tr>
							<td><strong>NIM</strong></td>
							<td>:</td>
							<td>
								<div class="row">
									<div class="col-md-10">
										<select class="form-control chosen-select" name="nim[]" id="nim">
											<option>--Pilih--</option>
											<?php foreach ($mahasiswa as $data): ?>
												<option value="<?= $data->nim ?>"><?= $data->nim ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td><strong>Nama Mahasiswa 1</strong></td>
							<td>:</td>
							<td>
								<div class="row">
									<div class="col-md-10">
										<input type="text" id="nama" placeholder="Masukkan nama..." class="form-control col-sm-5 " name="nama[]" required readonly />
									</div>	
								</div>		
							</td>
						</tr>
						<tr>
							<td><strong>Judul Skripsi</strong></td>
							<td>:</td>
							<td>
								<div class="row">
									<div class="col-md-10">
										<textarea id="judul_skripsi" rows="4"  class="autosize-transition form-control" name="judul_skripsi[]" placeholder="judul skripsi..." readonly required></textarea>
									</div>	
								</div>		
							</td>
						</tr>
						<tr>
							<td><strong>Pembimbing I</strong></td>
							<td>:</td>
							<td>
								<div class="row">
									<div class="col-md-10">
										<input type="text" name="pembimbing1[]" id="pembimbing1" class="form-control" readonly>
									</div>	
								</div>		
							</td>
						</tr>
						<tr>
							<td><strong>Pembimbing II</strong></td>
							<td>:</td>
							<td>
								<div class="row">
									<div class="col-md-10">
										<input type="text" name="pembimbing2[]" id="pembimbing2" class="form-control" readonly>
									</div>	
								</div>		
							</td>
						</tr>
					</table>
				</div>
			</div>

			<div class="widget-box light-border" id="mantap" style="margin-top: 20px;">
				<div class="widget-header">
				</div>
			</div>

			<button id="add_column" type="button" class="btn-sm btn btn-primary " style="margin-top: 5px"><i class="fa fa-plus"></i> Tambah Mahasiswa</button>
			<div class="form-actions center">
				<button type="submit" id="submit" class="btn btn-sm btn-success">
					Simpan 
					<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
				</button>
			</div>
		</div>
	</form>
	</div>
</div>



<script type="text/javascript">

	$(document).ready(function(){
		
		$("#add_column").click(function(e){
			e.preventDefault();
			new_column();
		});

		$("#tambah_anggota").click(function(e){
			e.preventDefault();
			new_anggota();
		});
	});


	let i = 2;

	function new_anggota()
	{
		var newRow = $("#table1 > tbody");
        var cols = "";

        cols += `
        	<tr>
        		<td><strong>Anggota${i}</strong></td>
				<td>:</td>
				<td>
					<div class="row">
						<div class="col-md-5">
							<input onkeyup="get_autocomplete(${i})" type="text" class="form-control" placeholder="ketikkan nama dosen" id="get_autocomplete${i}" required name="anggota[]">
						</div>
						<div class="col-md-2">
							<select name="status_penguji[]">
								<option value="N">--Status--</option>
								<option value="Y">penguji tamu</option>
							</select>
						</div>
						<div class="col-md-2"><button id="btnDel" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-minus"></i></button>
						</div>
					</div>
				</td>
        	</tr>
        `;

        newRow.append(cols);
        $("table.order-list").append(newRow);
        i++;
	}


    $("#table1 > tbody").on("click", "#btnDel", function (event) {
        $(this).closest("tr").remove();       
        i -= 1

	});

	let a = 2;
	function new_column()
	{

		var newRow = $("#mantap > .widget-header");
        var cols = "";
		cols += `
		<div id="${a}">
			<table class="table">
			<tr>
			<td><strong>NIM${a}</strong></td>
			<td>:</td>
			<td>
				<div class="row">
					<div class="col-md-10">
						<select class="form-control chosen-select${a}" onchange="cari_data(this, ${a})" name="nim[]" id="nim${a}">
							<option>--Pilih--</option>
							<?php foreach ($mahasiswa as $data): ?>
								<option value="<?= $data->nim ?>"><?= $data->nim ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
			</td>
		</tr>
			<tr>
				<td><strong>Nama Mahasiswa ${a}</strong></td>
				<td>:</td>
				<td>
					<div class="row">
						<div class="col-md-10">
							<input type="text" id="nama${a}" placeholder="Masukkan nama..." class="form-control col-sm-5 " name="nama[]" required readonly />
						</div>	
					</div>		
				</td>
			</tr>
			<tr>
				<td><strong>Judul Skripsi</strong></td>
				<td>:</td>
				<td>
					<div class="row">
						<div class="col-md-10">
							<textarea id="judul_skripsi${a}" rows="4"  class="autosize-transition form-control" name="judul_skripsi[]" placeholder="judul skripsi..." readonly required></textarea>
						</div>	
					</div>		
				</td>
			</tr>
			<tr>
				<td><strong>Pembimbing I</strong></td>
				<td>:</td>
				<td>
					<div class="row">
						<div class="col-md-10">
							<input type="text" name="pembimbing1[]" id="pembimbing1${a}" class="form-control" readonly>
						</div>	
					</div>		
				</td>
			</tr>
			<tr>
				<td><strong>Pembimbing II</strong></td>
				<td>:</td>
				<td>
					<div class="row">
						<div class="col-md-10">
							<input type="text" name="pembimbing2[]" id="pembimbing2${a}" class="form-control" readonly>
						</div>	
					</div>		
				</td>
				
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>
				<button type="button" onclick="konfirmasi_hapus(${a})" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus mahasiswa ${a}</button>
				</td>
			</tr>
			</table>
		</div>	
			

			<br>
		`;

		 newRow.append(cols);
        $("table.order-list").append(newRow);
        a++;
	}

	 $("#table2 > tbody").on("click", "#btnDel", function (event) {
        $(this).closest("tr").remove();       
        i -= 1

	});

	$(document).on("click", "#hapus_column", function(e){
		e.preventDefault();

		$(this).parent().remove();

	});

	// $(document).on("click", "#hapus_anggota", function(e){
	// 	e.preventDefault();

	// 	$(this).parent().parent().parent().parent().remove();

	// });

	function konfirmasi_hapus(id) {
		const id_remove = "#"+id;
		$(id_remove).remove();
	}

</script>

<script type="text/javascript">
	$(document).ready(function(){
		$("#nim").change(function(){
			var nim = $(this).val();
			
			$.ajax({
				type: 'GET',
				dataType: 'JSON',
				url: '<?= base_url() ?>/tendik/cari_mhs',
				data: 'nim='+nim,
				success: function(data){
					// console.log(data);
					$("#nama").val(data.mhs.nama_mhs);
					$("#judul_skripsi").val(data.mhs.judul);
					$("#pembimbing1").val(data.pembimbing1);
					$("#pembimbing2").val(data.pembimbing2);
				}
			});

		});
	})
</script>
<script type="text/javascript">
	$(document).ready(function(){

		$("#table2").on('change', '#nim2', function(){
			var nim = $(this).val();
			
			$.ajax({
				type: 'GET',
				dataType: 'JSON',
				url: '<?= base_url() ?>/tendik/cari_mhs',
				data: 'nim='+nim,
				success: function(data){
					// console.log(data);
					$("#nama1").val(data.mhs.nama_mhs);
					$("#judul_skripsi1").val(data.mhs.judul);
					$("#pembimbing11").val(data.pembimbing1);
					$("#pembimbing21").val(data.pembimbing2);
				}
			});

		});
		$("#result").on('change', '#nim2', function(){
			var nim = $(this).val();
			
			$.ajax({
				type: 'GET',
				dataType: 'JSON',
				url: '<?= base_url() ?>/tendik/cari_mhs',
				data: 'nim='+nim,
				success: function(data){
					// console.log(data);
					$("#nama2").val(data.mhs.nama_mhs);
					$("#judul_skripsi2").val(data.mhs.judul);
					$("#pembimbing12").val(data.pembimbing1);
					$("#pembimbing22").val(data.pembimbing2);
				}
			});

		});

	});

	function cari_data(id, ke) {
		const  nim = id.value;

		$.ajax({
			type: 'GET',
			dataType: 'JSON',
			url: '<?= base_url() ?>/tendik/cari_mhs',
			data: 'nim='+nim,
			success: function(data){

				$("#nama"+ke+'').val(data.mhs.nama_mhs);
				$("#judul_skripsi"+ke+'').val(data.mhs.judul);
				$("#pembimbing1"+ke+'').val(data.pembimbing1);
				$("#pembimbing2"+ke+'').val(data.pembimbing2);
			}
		});
	}

	function get_autocomplete(key)
	{
		$('#get_autocomplete'+key).autocomplete({
		source: "<?php echo base_url('tendik/get_autocomplete2/')?>",
			select: function (event, ui) {
		        $(this).val(ui.item.label);
		        // $('#ds_mhs'+key).val(ui.item.label)
		    }
		})
	}
</script>