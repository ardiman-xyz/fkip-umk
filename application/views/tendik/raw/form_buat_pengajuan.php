
<div style="margin-top: 20px">
	<div class="alert alert-success">
		Buat pengajuan RAW 
	</div>

	<div style="margin-bottom: 10px">
		<a href="<?= base_url('tendik/raw') ?>" title="Kembali" class="btn btn-sm btn-danger">&laquo; Kembali</a>
	</div>
	<hr>
	<div class="row">

	<div class="col-md-3">
		<div class="well">
			<h4 class="green smaller lighter">INFO JUMLAH</h4>
			<table>
				<tr>
					<td>Pembuatan Transkrip Nilai : </td><td>Rp. 25.000</td>
				</tr>
				<tr>
					<td>Pembuatan Akta : </td><td>Rp. 25.000</td>
				</tr>
				<tr>
					<td>Materai : </td><td>Rp. 6.000</td>
				</tr>
				<tr>
					<td>SKPI : </td><td>Rp. 45.000</td>
				</tr>
				<tr>
					<td>Buku : </td><td>Rp. 50.000</td>
				</tr>
			</table>
			<hr>
			<table>
				<tr>
					<td>Biaya pembuatan SKPI : </td><td>Rp. 5.000</td>
				</tr>
				<tr>
					<td>Tanda tangan SKPI(Dekan) : </td><td>Rp. 15.000</td>
				</tr>
				<tr>
					<td>Tanda tangan SKPI(Ka Prodi) : </td><td>Rp. 10.000</td>
				</tr>
				<tr>
					<td>Kas Fakultas : </td><td>Rp. 10.000</td>
				</tr>
				<tr>
					<td>Kas Prodi : </td><td>Rp. 5.000</td>
				</tr>
			</table>
		</div>
		<center>
			<button type="button" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Ubah Jumlah</button>
		</center>

	</div>

	<?= form_open('tendik/post_raw', ['id' => 'form_raw']); ?>
		<div class="col-md-9">

			<?= $this->session->flashdata('success') ?>

			<div class="table-responsive">
				<table >
					<tr>
						<td>Input jumlah wisudawan : </td><td> &nbsp;<input type="number" name="jumlah_wisudawan" required autocomplete="off"></td>
					</tr>
				</table>
				<hr>
				<h5>
					<i class="ace-icon glyphicon glyphicon-user green"></i>
					<strong>DAFTAR INSENTIF PENGELOLA DANA WISUDA</strong>
				</h5>
				<table class="table-sm table table-bordered table-hover" id="myTable">
						<thead>
							<tr>
								<th class="text-center" width="5px">NO</th>
								<th class="text-center" width="35%">NAMA</th>
								<th class="text-center">JABATAN</th>
								<th class="text-center">#</th>
							</tr>
							<tr>
						</thead>
						<tbody>
							
						</tbody>
						
					</table>
					<button id="btn-tambah" type="button" class="btn-sm btn btn-success"><i class="fa fa-plus"></i> Tambah</button>
					<hr>

					<center>
						<button type="submit" class="btn btn-primary btn-sm" id="btn-submit">Simpan RAW</button>
					</center>
			</div>

		</div>
	</form> 
</div>
<script>
	var i = 1;

	    $("#btn-tambah").on("click", function () {
	        
		    var newRow = $("#myTable > tbody");
	        var cols = "";

	        cols += `
	        	<tr>
					<td class="text-center">${i}</td>
					<td class="text-center">
					<input type="text" name="nama_pengelola[]" class="form-control" placeholder="Masukkan nama pengelola" onkeyup="cari_pengelola(${i})" id="input_pengelola${i}" required autocomplete="off">
					</td>
					<td class="text-center">
						<select name="jabatan[]" class="form-control" id="jabatan${i}" required>
							<option value="">--pilih jabatan--</option>
							<option value="ketua program studi">Ketua program studi</option>
							<option value="staff administrasi">Staff administrasi</option>
							<option value="staff akademik">Staff akademik</option>
						</select>
					</td>	
					<td class="text-center">
					<button type="button" class="btn btn-sm ibtnDel btn-danger"><i class="fa fa-minus"></i></button>
					</td>
				</tr>
	        `;

	        newRow.append(cols);
	        $("table.order-list").append(newRow);
	        i++;

	    });

	     $("#myTable > tbody").on("click", ".ibtnDel", function (event) {
	        $(this).closest("tr").remove();       
	        i -= 1

    	})

	function cari_pengelola(key)
	{
		$('#input_pengelola'+key).autocomplete({
			source: "<?php echo base_url('tendik/get_autocomplete/')?>",
			select: function (event, ui) {
				console.log(ui)
		        $(this).val(ui.item.label);
		    }
		})
	}
</script>