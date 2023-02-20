<div class="overlay loading" style="display: none">
    <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
  </div>
<div class="container" style="margin-top: 20px">

	<div class="alert alert-warning">
		<i class="fa fa-list"></i> List KAS Prodi
	</div>
	<h2><strong>Saldo Kas Prodi : Rp. <?= number_format($saldo,2) ?></strong></h2>
	<hr>
	<?= $this->session->flashdata('success') ?>
		
		<div style="margin-bottom: 10px">
			<a href="<?= base_url('tendik/input_kas') ?>" title="Input pemasukan kas" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Input Kas</a>
			<!-- <a href="<?= base_url('tendik/input_kas') ?>" title="Cetak laporan kas" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Cetak kas</a> -->
		</div>
		<div class="table-responsive">
			<table class="table table-bordered table-hover" id="dynamic-table">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Tanggal</th>
						<th class="text-center">Keterangan</th>
						<th class="text-center">Kas Masuk</th>
						<th class="text-center">Kas Keluar</th>
						<th class="text-center" width="100px">Bukti</th>
					</tr>
				</thead>
				<tbody id="result_kas">
				</tbody>
			</table>
		</div>

</div>

<script>

	$(document).ready(function(){

		cari_kas();

	});

	function cari_kas()
	{
		$.ajax({
			url: "<?= base_url('tendik/cari_kas_prodi') ?>",
			method: "get",
			dataType: "html",
			beforeSend: () =>{
				show_loading()
			},
			complete: () =>{
				hide_loading()
			},
			success: response =>{
				$('#result_kas').html(response)
			}
		});
	}

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

	let element = document.querySelector('.loading');

	function show_loading() {
	  element.style.display = "block";
	}

	function hide_loading(){
	  let fadeEffect = setInterval(() => {
	      clearInterval(fadeEffect);
	      element.style.display = "none"
	  }, 200)
	}
</script>