

<script type="text/javascript" >
	
	$(document).ready(function(){

		// ketika di ganti jenis bayar

		$('#jenis_bayar').on('change', function(){

			const jenis_bayar = $(this).val();

			if (jenis_bayar == 'rekening') {
				$('#result_bayar1').html(`
						<td>No. Rekening </td><td> : <input type="text" name="no_rek" placeholder="No. Rekening" ></td>
				`);
				$('#result_bayar2').html(`
						<td>Nama Bank </td><td> : <input type="text" name="nama_bank" placeholder="Nama Bank" required></td>
				`);
			}else{
				$('#result_bayar1').html(`
						<td>kuitansi</td><td> : <input type="text" name="no_rek" placeholder="kuitansi" ></td>
				`);
				$('#result_bayar2').html(`
						<td>no kuitansi</td><td> : <input type="text" name="nama_bank" placeholder="No kuitansi" required></td>
				`);
			}

		});

		// const jumlah_1 = $('#jumlah1').text();
		const jumlah_2 = $('#jumlah2').text();
		const jumlah_3 = $('#jumlah3').text();
		const jumlah_4 = $('#jumlah4').text();
		const jumlah_5 = $('#jumlah5').text();
		const jumlah_6 = $('#jumlah6').text();
		const jumlah_7 = $('#jumlah7').text();
		const jumlah_8 = $('#jumlah8').text();
		const jumlah_9 = $('#jumlah9').text();
		const jumlah_10 = $('#jumlah10').text();
		const jumlah_11 = $('#jumlah11').text();
		const jumlah_12 = $('#jumlah12').text();

		$('body').on('keyup', '#komponen1' ,function(){

			const komponen1 =  $('body').find('#jumlah1').text();

			const jumlah_mhs = $(this).val();
			const hasil = jumlah_mhs * komponen1;
			$('#total1').val(hasil);

		});

		$('#komponen2').keyup(function(){
			const komponen2 = $('#komponen2').val();
			const hasil2 = komponen2 * jumlah_2;
			$('#total2').val(hasil2);
		});

		$('#komponen3').keyup(function(){
			const komponen3 = $('#komponen3').val();
			const hasil = komponen3 * jumlah_3;
			$('#total3').val(hasil);
		});
		$('#komponen4').keyup(function(){
			const komponen4 = $('#komponen4').val();
			const hasil = komponen4 * jumlah_4;
			$('#total4').val(hasil);
		});

		$('#komponen5').keyup(function(){
			const komponen5 = $('#komponen5').val();
			const hasil = komponen5 * jumlah_5;
			$('#total5').val(hasil);
		});

		$('#komponen6').keyup(function(){
			const komponen6 = $('#komponen6').val();
			const hasil = komponen6 * jumlah_6;
			$('#total6').val(hasil);
		});

		$('#komponen7').keyup(function(){
			const komponen7 = $('#komponen7').val();
			const hasil = komponen7 * jumlah_7;
			$('#total7').val(hasil);
		});
		$('#komponen8').keyup(function(){
			const komponen8 = $('#komponen8').val();
			const hasil = komponen8 * jumlah_8;
			$('#total8').val(hasil);
		});

		$('#komponen9').keyup(function(){
			const komponen9 = $('#komponen9').val();
			const hasil = komponen9 * jumlah_9;
			$('#total9').val(hasil);
		});

		$('#komponen10').keyup(function(){
			const komponen10 = $('#komponen10').val();
			const hasil = komponen10 * jumlah_10;
			$('#total10').val(hasil);
		});
		$('#komponen11').keyup(function(){
			const komponen11 = $('#komponen11').val();
			const hasil = komponen11 * jumlah_11;
			$('#total11').val(hasil);
		});

		$('#komponen12').keyup(function(){
			const komponen12 = $('#komponen12').val();
			const hasil = komponen12 * jumlah_12;
			$('#total12').val(hasil);
		});

		
		$('body').on('keyup', '#komponen10_skripsi', function() {
			const jumlah_10_skripsi = $('#jumlah10').text();
			const komponen10 = $(this).val();
			const hasil = jumlah_10_skripsi * komponen10;
			$('#total10').val(hasil);
		});

		$('body').on('keyup', '#komponen11_skripsi', function() {
			const jumlah_11_skripsi = $('#jumlah11').text();
			const komponen11 = $(this).val();
			const hasil = jumlah_11_skripsi * komponen11;
			$('#total11').val(hasil);
		});

		$('body').on('keyup', '#komponen12_skripsi', function() {
			const jumlah_12_skripsi = $('#jumlah12').text();
			const komponen12 = $(this).val();
			const hasil = jumlah_12_skripsi * komponen12;
			$('#total12').val(hasil);
		});


		// pembimbing I
		$('body').on('keyup', '#jml_pemb1' ,function(){

			const jumlah_insentif_pemb1 =  $('body').find('#jumlah_insentif_pemb1').text();

			const jumlah_mhs = $(this).val();
			const hasil = jumlah_mhs * jumlah_insentif_pemb1;
			$('#ttl_insentif_pemb1').val(hasil);

		});

		// pembimbing II

		$('body').on('keyup', '#jml_pemb2' ,function(){

			const jumlah_insentif_pemb2 =  $('body').find('#jumlah_insentif_pemb2').text();

			const jumlah_mhs = $(this).val();
			const hasil = jumlah_mhs * jumlah_insentif_pemb2;
			$('#ttl_insentif_pemb2').val(hasil);

		});
		



		// tambah row anggota insentif penguji seminar

	    var i = 1;

	    $("#btn-tambah").on("click", function () {
	        
		    var newRow = $("#myTable > tbody");
	        var cols = "";

	        cols += `
	        	<tr>
					<td class="text-center">${i}</td>
					<td class="text-center">
					<input type="text" class="form-control" placeholder="Masukkan nama dosen" onkeyup="cari_dosen(${i})" id="get_autocomplete${i}" required>
                          <input type="hidden" name="nama_dosen[]" value="" id="nama_dosen${i}">
					</td>
					<td class="text-center">
						<select name="jabatan[]" class="form-control" id="jabatan${i}" onchange="cari_insentif(this, ${i})" required>
							<option value="">pilih</option>
							<option value="ketua">Ketua</option>
							<option value="sekretaris">Sekretaris</option>
							<option value="anggota">Anggota</option>
						</select>
					</td>
					<td class="text-center">
						<input name="jumlah_mhs[]" id="jml_mhs${i}" type="number" value="0" class="form-control" required>
					</td>
					<td class="text-right">
						<input type="number"  id="list${i}" name="insentif1[]" value="0" class="form-control" readonly>
					</td>
					<td class="text-center">
						<span>
							<input id="total_daftar${i}" type="text" name="total[]" value="0" class="form-control" readonly>
						</span>
					</td>
					<td><button type="button" class="btn btn-sm ibtnDel btn-danger"><i class="fa fa-minus"></i></button></td>
				</tr>
	        `;

	        newRow.append(cols);
	        $("table.order-list").append(newRow);
	        i++;

	    });


	    $("#myTable > tbody").on("click", ".ibtnDel", function (event) {
	        $(this).closest("tr").remove();       
	        i -= 1

    	});


	    // tambah row anggota pengolola penguji seminar

	    var a = 1;

	    $("#btn-tambah2").on("click", function () {
	        
		    var newRow = $("#myTable2 > tbody");
	        var cols = "";

	        cols += `
	        	<tr>
					<td class="text-center">${a}</td>
					<td class="text-center">
						<input type="text" name="nama_ds[]" class="form-control" placeholder="Ketikkan nama dosen" required onkeyup="get_autocomplete2(${a})" id="ds_mhs${a}">
						
					</td>
					<td class="text-center">
						<select name="jabatan2[]" class="form-control" id="jabatan2${a}" onchange="cari_insentif2(this, ${a})" required>
							<option value="">pilih</option>
							<option value="pengarah">Pengarah (Rektor)</option>
							<option value="penanggung_jawab_dekan">Penanggung Jawab (Dekan)</option>
							<option value="penanggung_jawab_wadek">Penanggung Jawab (Wakil Dekan)</option>
							<option value="ka_prodi">Ketua Panitia (Ka. Prodi)</option>
							<option value="staff_keuangan">Sekretaris (Tendik Prodi)</option>
							<option value="staff_administrasi">Bendahara (Bendahara Fakultas)</option>
							<option value="mhs_magang">Anggota (Tendik prodi/magang)</option>
						</select>
					</td>
					<td class="text-center">
						<input name="jumlah_mhs2[]" id="jml_mahasiswa${a}" type="number" value="0" class="form-control" required>
					</td>
					<td class="text-center">
						<input type="number"  id="list_p${a}" name="insentif2[]" value="0" class="form-control" readonly>
					</td>
					<td class="text-center">
						<span>
							<input id="total_d${a}" type="text" name="total_insf[]" value="0" class="form-control" readonly>
						</span>
					</td>
					<td><button type="button" class="btn btn-sm ibtnDel btn-danger"><i class="fa fa-minus"></i></button></td>
				</tr>
	        `;

	        newRow.append(cols);
	        $("table.order-list").append(newRow);
	        a++;

	    });


	    // tambah row petugas kebersihan

	    var x = 1;

	    $("#btn-tambah3").on("click", function () {
	        
		    var newRow = $("#myTable3 > tbody");
	        var cols = "";

	        cols += `
	        	<tr>
					<td class="text-center">${x}</td>
					<td class="text-center">
						<input type="text" name="petugas_kebersihan[]" class="form-control" placeholder="masukkan nama..." required>
					</td>
					<td class="text-center">
						<span><input  id="jml_mhsk${x}" type="number" name="jml_m[]" value="" class="form-control" required></span>
					</td>
					<td class="text-center">
					<input type="number"  id="list_msk${x}" name="insentif3[]" value="<?= $data->petugas_kebersihan ?>" class="form-control" readonly>
					</td>
					<td class="text-center">
						<span ><input  id="totalk${x}"type="text" name="totalk[]" value="0" class="form-control" readonly></span>
					</td>
					<td class="text-center"><button type="button" class="btn btn-sm ibtnDel btn-danger"><i class="fa fa-minus"></i></button></td>
				</tr>
	        `;

	        newRow.append(cols);
	        $("table.order-list").append(newRow);
	        x++;

	    });


	    // btn tambah 5

	    let t = 1;

	    $('body').on("click",'#btn-tambah5',function () {
	        
		   let newRow = $("#myTable5 > tbody");
	        let cols = "";

	        cols += `
	        	<tr>
					<td class="text-center">${t}</td>
					<td class="text-center">
						<select name="nama_ds_pemb2[]" class="form-control chosen-select" required>
							<option value="">pilih</option>
							<?php foreach ($dosen as $ds): ?>
								<option value="<?= $ds->id_dosen ?>"><?= $ds->nama_dosen ?></option>
							<?php endforeach ?>
						</select>
					</td>
					<td class="text-center">
						<input name="jumlah_mhs5[]" id="jml_mhsp2${t}" onkeyup="cari_total2(${t})" type="number" value="0" class="form-control" required>
					</td>
					<td class="text-center">
						<input type="number"  id="ins2${t}" name="insentif5[]" value="<?= $pemb2->insentif_pemb2 ?>" class="form-control" readonly>
					</td>
					<td class="text-center">
						<span>
							<input id="ttl_insentif2${t}" type="text" name="total_ins5[]" value="0" class="form-control" readonly>
						</span>
					</td>
					<td><button type="button" class="btn btn-sm ibtnDel btn-danger"><i class="fa fa-minus"></i></button></td>
				</tr>
	        `;

	        newRow.append(cols);
	        $("table.order-list").append(newRow);
	        t++;

	    });


	    $("#myTable2 > tbody").on("click", ".ibtnDel", function (event) {
	        $(this).closest("tr").remove();       
	        a -= 1

    	});

	    $("#myTable3 > tbody").on("click", ".ibtnDel", function (event) {
	        $(this).closest("tr").remove();       
	        x -= 1

    	});
    	$("#myTable4 > tbody").on("click", ".ibtnDel", function (event) {
	        alert('ok')

    	});
    	 $("body").on("click", ".ibtnDel", function (event) {
	        $(this).closest("tr").remove();       
	        number -= 1

    	});

    	$("#myTable3 > tbody").on("keyup", "#jml_mhsk1", function (event) {
	       
	       const jml = $('#jml_mhsk1').val()
	       const insentif = $('#list_msk1').val();

	       const hasil = jml * insentif;

	       console.log(insentif)

	       $('#totalk1').val(hasil)
    	});

    	$("#myTable3 > tbody").on("keyup", "#jml_mhsk2", function (event) {
	       
	       const jml = $('#jml_mhsk2').val()
	       const insentif = $('#list_msk2').val();

	       const hasil = jml * insentif;

	       $('#totalk2').val(hasil)
    	});

    	$("#myTable3 > tbody").on("keyup", "#jml_mhsk3", function (event) {
	       
	       const jml = $('#jml_mhsk3').val()
	       const insentif = $('#list_msk3').val();

	       const hasil = jml * insentif;

	       $('#totalk3').val(hasil)
    	});

	});

	function cari_insentif(id, i)
	{

		const t_daftar = $("#jml_mhs"+i+'').val();

		const data = id.value;

		if (t_daftar === '0') {
			alert('silahkan isi jumlah mahasiswa terlebih dahulu')
			$("#jml_mhs"+i+'').focus();
			$("#jabatan"+i).val('')
			return false
		}

		$.ajax({
			method: 'get',
			url: '<?= base_url() ?>tendik/cari_insentif1/'+data,
			dataType: 'json',
			success:function(response){

				if (response) {
					$("#list"+i+'').val(response)
					$("#total_daftar"+i+'').val(t_daftar * response)
					
				}else{
					$("#list"+i+'').val('')
					$("#total_daftar"+i+'').val('')
				}
			}
		});
	}

	function cari_insentif2(id, a)
	{

		const t_daftar = $("#jml_mahasiswa"+a+'').val();

		const data = id.value;

		if (t_daftar === '0') {
			alert('silahkan isi jumlah mahasiswa terlebih dahulu')
			$("#jml_mahasiswa"+a+'').focus();
			$("#jabatan2"+a).val('')
			return false
		}

		$.ajax({
			method: 'get',
			url: '<?= base_url() ?>tendik/cari_insentif2/'+data,
			dataType: 'json',
			success:function(response){

				if (response) {
					$("#list_p"+a+'').val(response)
					$("#total_d"+a+'').val(t_daftar * response)
					
				}else{
					$("#list"+a+'').val('')
					$("#total_d"+a+'').val('')
				}
			}
		});
	}

	function show_form(id)
	{
		if (id === '3') {
			
			$('#form_pembimbing').html(`

				<h5>
					<i class="ace-icon glyphicon glyphicon-user red"></i>
					<strong>INSENTIF PEMBIMBING I</strong>
				</h5>

				<table class="table-sm table table-bordered table-hover" id="myTable4">
					<thead>
						<tr>
							<th class="text-center" rowspan="2" width="5px">NO</th>
							<th class="text-center" rowspan="2" width="35%">NAMA</th>
							<th class="text-center" colspan="3">JUMLAH</th>
						</tr>
						<tr>
							<th class="text-center" width="5px">Mahasiswa</th>
							<th class="text-center" width="100px">Insentif (Rp.)</th>
							<th class="text-center" width="100px">Total (Rp.)</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
					
				</table>
				<button id="btn-tambah4" type="button" class="btn-sm btn btn-primary"><i class="fa fa-plus"></i> Tambah</button>
				<hr>


				<h5>
					<i class="ace-icon glyphicon glyphicon-user red"></i>
					<strong>INSENTIF PEMBIMBING II</strong>
				</h5>

				<table class="table-sm table table-bordered table-hover" id="myTable5">
					<thead>
						<tr>
							<th class="text-center" rowspan="2" width="5px">NO</th>
							<th class="text-center" rowspan="2" width="35%">NAMA</th>
							<th class="text-center" colspan="3">JUMLAH</th>
						</tr>
						<tr>
							<th class="text-center" width="5px">Mahasiswa</th>
							<th class="text-center" width="100px">Insentif (Rp.)</th>
							<th class="text-center" width="100px">Total (Rp.)</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
					
				</table>
				<button id="btn-tambah5" type="button" class="btn-sm btn btn-primary"><i class="fa fa-plus"></i> Tambah</button>
				<hr>

			`);


			// show tr di id show_tr
			$('#pemb1').html(`
					<td class="text-center">#</td>
					<td>Insentif pembimbing I</td>
					<td class="text-center">
						<input type="number" id="jml_pemb1" autocomplete="off" name="pemb1" class="form-control" required>
					</td>
					<td class="text-right">@Rp. <span id="jumlah_insentif_pemb1"><?= $data->insentif_pemb1 ?></span></td>
					<td class="text-right">
						<span>
							<input type="text" id="ttl_insentif_pemb1" name="ttl_insentif_pemb1" class="form-control" value="0" readonly>
						</span>
					</td>
			`);

			$('#pemb2').html(`
					<td class="text-center">#</td>
					<td>Insentif pembimbing II</td>
					<td class="text-center">
						<input type="number" id="jml_pemb2" autocomplete="off" name="pemb2" class="form-control" required>
					</td>
					<td class="text-right">@Rp. <span id="jumlah_insentif_pemb2"><?= $data->insentif_pemb2 ?></span></td>
					<td class="text-right">
						<span>
							<input type="text" id="ttl_insentif_pemb2" name="ttl_insentif_pemb2" class="form-control" value="0" readonly>
						</span>
					</td>
			`);

			$('#jumlah1').text(<?= $data->pembayaran_mhs_skripsi ?>);

			$("#komponen10").attr('id', 'komponen10_skripsi')
			$("#jumlah10").text('10000');

			$("#komponen11").attr('id', 'komponen11_skripsi')
			$("#jumlah11").text('15000');

			$("#komponen12").attr('id', 'komponen12_skripsi')
			$("#jumlah12").text('37500');

		}else if(id === '1'){
			$('#form_pembimbing').html('');
			$('#pemb1').html('');
			$('#pemb2').html('');
			$('#jumlah1').text(<?= $data->pembayaran_mhs ?>);
		}else if(id === '2'){
			$('#form_pembimbing').html('');
			$('#pemb1').html('');
			$('#pemb2').html('');
			$('#jumlah1').text(<?= $data->pembayaran_mhs ?>);
		}

		
	}



	function cari_total(key)
	{
	   const jml 		= $('#jml_mhsp'+key).val();
       const insentif 	= $('#ins'+key).val();
       const hasil 		= jml * insentif;

       $('#ttl_insentif'+key).val(hasil)
	}

	function cari_total2(key)
	{
	   const jml 		= $('#jml_mhsp2'+key).val();
       const insentif 	= $('#ins2'+key).val();
       const hasil 		= jml * insentif;

       $('#ttl_insentif2'+key).val(hasil)
	}

	function cari_dosen(key)
	{
		$('#get_autocomplete'+key).autocomplete({
			source: "<?php echo base_url('tendik/get_autocomplete/')?>",
			select: function (event, ui) {
		        $(this).val(ui.item.label);
		        $('#nama_dosen'+key).val(ui.item.id_dosen)
		    }
		})
	}

	function get_autocomplete(key)
	{
		$('#get_autocomplete'+key).autocomplete({
			source: "<?php echo base_url('tendik/get_autocomplete/')?>",
			select: function (event, ui) {
		        $(this).val(ui.item.label);
		        $('#nama_ds_pemb'+key).val(ui.item.id_dosen)
		    }
		})
	}

	function get_autocomplete_mhs(key)
	{
		$('#mhs_bim'+key).autocomplete({
			source: "<?php echo base_url('tendik/get_autocompleteMhs/')?>",
			select: function (event, ui) {
		        $(this).val(ui.item.label);
		    }
		})
	}



	// btn tambah 4
	var p = 1;

	    $('body').on("click",'#btn-tambah4',function () {
	        
		   var newRow = $("#myTable4 > tbody");
	        var cols = "";

	        cols += `
	        	<tr>
					<td class="text-center">${p}</td>
					<td class="text-center">
						<select name="nama_ds_pemb1[]" class="form-control chosen-select" required>
							<option value="">pilih</option>
							<?php foreach ($dosen as $ds): ?>
								<option value="<?= $ds->id_dosen ?>"><?= $ds->nama_dosen ?></option>
							<?php endforeach ?>
						</select>
					</td>
					<td class="text-center">
						<input name="jumlah_mhs4[]" id="jml_mhsp${p}" onkeyup="cari_total(${p})" type="number" value="0" class="form-control" required>
					</td>
					<td class="text-center">
						<input type="number"  id="ins${p}" name="insentif4[]" value="<?= $pemb1->insentif_pemb1 ?>" class="form-control" readonly>
					</td>
					<td class="text-center">
						<span>
							<input id="ttl_insentif${p}" type="text" name="total_ins4[]" value="0" class="form-control" readonly>
						</span>
					</td>
					<td><button type="button" class="btn btn-sm ibtnDel btn-danger"><i class="fa fa-minus"></i></button></td>
				</tr>
	        `;

	        newRow.append(cols);
	        $("table.order-list").append(newRow);
	        p++;

	    });


	    



	function status_pemb(value, key)
	{
		let hasil = 0;
		if (value === '1') {
			hasil = 1 * 300000;
		}else if(value === '2'){
			hasil = 1 * 250000;
		}else{
			hasil = 0;
		}

		$('#insentif_dosen'+key).val(hasil);
	}

	function hapus_baris(key)
	{
		$('#row'+key).remove();
		$('#pembm'+key).remove();
		$('#insentif_dosen'+key).remove();
	}

	function get_autocomplete2(key)
	{
		$('#get_autocomplete2'+key).autocomplete({
		source: "<?php echo base_url('tendik/get_autocomplete2/')?>",
			select: function (event, ui) {
		        $(this).val(ui.item.label);
		        // $('#ds_mhs'+key).val(ui.item.label)
		    }
		})
	}
	
	function cek_saldo() {
		let total1 = parseInt($('#total1').val()),
			total2 = $('#total2').val(),
			total3 = $('#total3').val(),
			total4 = $('#total4').val(),
			total5 = $('#total5').val(),
			total6 = $('#total6').val(),
			total7 = $('#total7').val(),
			total9 = $('#total9').val(),
			total10 = $('#total10').val(),
			total11 = $('#total11').val(),
			total12 = $('#total2').val();

		const result = parseInt(total2)+parseInt(total3)+parseInt(total4)+parseInt(total5)+parseInt(total6)+parseInt(total7)+parseInt(total9)+parseInt(total10)+parseInt(total11)+parseInt(total12);

		const hasil = total1 - result;

		$("#grandTotal").html(`
			<div>
				${formatRupiah(result)}	
			</div>
		`)

		$("#saldo-operasi").html(`
			<div>
				<span>${formatRupiah(total1)} - ${formatRupiah(result)} = <span style="font-weight: bold">${formatRupiah(hasil)}</span></span>
			</div>
		`);

	}

	function formatRupiah(bilangan){
		var	number_string = bilangan.toString(),
			sisa 	= number_string.length % 3,
			rupiah 	= number_string.substr(0, sisa),
			ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
				
		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

		return 'Rp. ' + rupiah;

	}

</script>