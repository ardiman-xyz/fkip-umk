
<form action="" method="post" accept-charset="utf-8" id="formLulusan">
	<div class="table-responsive">
        <table id="TableServerSide" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="text-center">No.</th>
				<th class="text-center">NIM</th>
				<th class="text-center">Nama Mahasiswa</th>
				<th class="text-center">Status</th>
				<th class="text-center">
					<input type="checkbox" id="select_all" class="check">
				</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($result as $key => $r): ?>
				<tr>
					<td class="text-center"><?= $key + 1 ?></td>
					<td class="text-center"><?= $r->nim ?></td>
					<td><?= $r->nama_lengkap ?></td>
					<td class="text-center">
						<span class="label  arrowed-right <?= $r->status === '0' ? 'label-danger' : 'label-success' ?>">
							<?= $r->status === '0' ? 'Belum Lulus' : 'Lulus' ?>
						</span>
					</td>
					<td class="text-center">
		            <input type="checkbox" class="check" name="checked[]" value="<?= $r->id ?>">
		          </td> 
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<button type="button" onclick="luluskan_mhs()" class="btn btn-primary btn-sm">Update Status</button>
</div>
</form>


<script>
$("#select_all").on("click", function() {
    if (this.checked) {
      $(".check").each(function() {
        this.checked = true;
      });
    } else {
      $(".check").each(function() {
        this.checked = false;
      });
    }
  });

$("#TableServerSide tbody").on("click", "tr .check", function() {
    var check = $("#TableServerSide tbody tr .check").length;
    var checked = $("#TableServerSide tbody tr .check:checked").length;
    if (check === checked) {
      $("#select_all").prop("checked", true);
    } else {
      $("#select_all").prop("checked", false);
    }
  });


function luluskan_mhs(){
	if ($("#TableServerSide tbody tr .check:checked").length == 0) {
	    Swal({
	      title: "Gagal",
	      text: "Tidak ada data yang dipilih",
	      type: "error"
	    });
	  }else{
	  	 $("#formLulusan").attr("action", '<?= base_url() ?>' + "tendik/update_status_mhs/");
		    Swal({
		      title: "Anda yakin?",
		      text: "Mahasiswa akan diluluskan!",
		      type: "warning",
		      showCancelButton: true,
		      confirmButtonColor: "#3085d6",
		      cancelButtonColor: "#d33",
		      confirmButtonText: "Update Status!"
		    }).then(result => {
		      if (result.value) {
		        $("#formLulusan").submit();
		      }
		    });
	  }
}


$("#formLulusan").on("submit", function(e) {
    if ($(this).attr("action")) {
    	e.preventDefault();
      	e.stopImmediatePropagation();

          $.ajax({
	        url: $(this).attr("action"),
	        data: $(this).serialize(),
	        type: "POST",
	        success: function(respon) {
	          if (respon.status) {
		            Swal({
		              title: "Berhasil",
		              text: respon.total + " Mahasiswa berhasil diluluskan!",
		              type: "success"
		            });
		          } 
		          setTimeout(() => {
		            location.reload();
		          }, 500)
	        },
	        error: function() {
	          Swal({
	            title: "Gagal",
	            text: "Ada data yang sedang digunakan",
	            type: "error"
	          });
	        }
	      });  	

    }
});
</script>