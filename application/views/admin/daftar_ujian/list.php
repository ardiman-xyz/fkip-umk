
<div class="row">
  <div class="col-xs-12">

        <div class="clearfix">
          <div class="pull-right tableTools-container"></div>
        </div>
        <div class="table-header">
          Data pendaftar ujian
        </div>
        <div>
          <div class="row" style="margin-top: 10px">
          <form action="" method="post" id="formFilter">
            <div class="col-md-2">
                <div>
                  <label for="form-field-select-3"><i class="fa fa-filter blue"></i> Filter Data</label>

                  <br />
                  <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State..." name="jenis_ujian">
                    <option value="0"> Tampil semua </option>
                    <?php foreach ($jenis_ujian as $data): ?>
                      <option value="<?= $data->id_ujian ?>"><?= $data->nama_ujian ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
            </div>
              <div class="col-md-1">
                <button style="margin-top: 25px; margin-left: -8px" class="btn btn-sm btn-primary" type="submit" name="filter"><i class="fa fa-filter"></i> filter</button>
              </div>
              </form>
          </div>
          <hr>
         <div id="result">
           
         </div>
        </div>
      </div>
    </div>


    <!-- PAGE CONTENT ENDS -->
  </div><!-- /.col -->
</div><!-- /.row -->



<script type="text/javascript">
  $(document).ready(function(){
    $("#formFilter").submit(function(e){
      e.preventDefault();
      var id = $("#form-field-select-3").val();

      var url = "<?= base_url('tendik/filter/') ?>"+id;

      $("#result").load(url);

    });
  });
</script>