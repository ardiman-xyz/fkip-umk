<br>
<div class="row justy-content-center">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<!-- PAGE CONTENT BEGINS -->
		
		<div class="alert alert-block alert-success">
			<i class="ace-icon fa fa-info-circle"></i>
			Silhakan pilih menu <strong>Jenis Surat</strong> untuk memilih jenis surat yang akan di buat! 
			</ul>
		</div>

   <a href="<?= base_url('surat/in') ?>" class="btn btn-sm btn-danger" style="border-radius: 1px;">&larr; Kembali</a>

    <div class="row">
      <div class="col-md-3">

        <div class="widget-box">
          <div class="widget-header">
            <h4 class="widget-title">Jenis Surat</h4>
          </div>

          <div class="widget-body">
            <div class="widget-main no-padding">
              <form method="" action="">
                <!-- <legend>Form</legend> -->
                <fieldset>
                  <label>Pilih jenis surat</label>
                        <select class="form-control" id="pilihan">
                        <option value="">--Pilih--</option>
                        <option value="1">Izin penelitian</option>
                        <option value="2">Cuti</option>
                        <option value="3">Aktif Kuliah</option>
                      </select>
                    <button class="btn btn-primary btn-xs" id="simpan" style="border-radius: 1px; margin-top: 10px"> Proses <i class="ace-icon fa fa-arrow-right icon-on-right"></i></button>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-9">
        <div class="widget-box">
          <div class="widget-body">
            <div class="widget-main">
              <div id="form_surat">
                <div class="alert alert-block alert-success">
                <i class="ace-icon fa fa-info-circle green"></i>
                Silhakan pilih menu <strong>Jenis Surat</strong> untuk memilih jenis surat yang akan di buat! 
                </ul>
              </div>
            </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>


		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->

<script>
     $(document).ready(function(){

        $('#simpan').click(function(e){
          e.preventDefault();
          var pilihan = $('#pilihan').val();

          if (!pilihan) {
             alert("Jenis surat tidak boleh kosong");
            $("#pilihan").focus();
            return false;
          }

        $.ajax({
          type: 'post',
          url: '<?= base_url("surat/form_surat/") ?>' + pilihan,
          cache: false,
          success: function(data){

            $('#form_surat').html(data);
          }
        });

        });

     });
  </script>