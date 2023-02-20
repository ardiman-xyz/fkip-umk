<br>
<div class="row justy-content-center">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="alert alert-block alert-success">
			Silahkan filter per angkatan (217,218, dst..)
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <input class="form-control input-mask-date" type="text" id="filter" placeholder="silahkan masukkan tahun angkatan. ex. 217">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button" id="btn-filter">
                            <i class="ace-icon fa fa-search bigger-110"></i>
                            Filter
                        </button>
                    </span>
                </div>
            </div>
        </div>


        <div id="result_query" style="margin-top: 15px;"></div>

    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){

        $('#btn-filter').click(function (e) {
            e.preventDefault();
            const query = $('#filter').val(),
                  btn = $('#btn-filter');

            if(!query.length) {
              Swal({
                title: "Warning",
                text: "Input harus diisi bang!",
                type: "error"
              });
              return false;
            }

            $.ajax({
                url : '<?= base_url("tendik/filter_mhs_angkt") ?>/'+query,
                method: 'get',
                dataType: 'html',
                beforeSend: function(){
                    btn.attr('disabled', true);
                    btn.html('<i class="fa fa-spinner fa-spin "></i> Sedang mencari...');
                },
                success: callback =>{
                   $('#result_query').html(callback)
                    btn.html('<i class="ace-icon fa fa-search bigger-110"></i> Filter');
                     btn.attr('disabled', false);
                },
                error: xhr =>{
                    alert('Gagal mengubah, periksa koneksi!')
                }
            })

        });

    });



</script>

