<br>
<style type="text/css">
    .clrG{
        color: green;
        font-style: italic;
    }
    .clrR{
        color: red;
        font-style: italic;
    }
    .clrO{
        color: orange;
        font-style: italic;
    }
</style>
<div class="overlay loading" style="display: none">
    <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
  </div>
<div class="row justy-content-center">
    <div class="col-md-6 col-md-offset-3">
        <!-- PAGE CONTENT BEGINS -->
        
        <div class="alert alert-block alert-warning">
            <i class="ace-icon fa fa-upload"></i>
            Upload Bukti Transfer
        </div>
        <?php echo !empty($statusMsg)?'<p class="status-msg">'.$statusMsg.'</p>':''; ?>
        <h4 class="widget-title lighter">
        </h4>
        <div class="table-responsive">
             <form action="<?= base_url('tendik/upload_bukti') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_rab" value="<?= $id_rab ?>">
            <fieldset>
                <label class="block clearfix">
                    <span class="block input-icon input-icon-right">
                        <input type="file" class="form-control" name="files[]" required multiple/>
                    </span>
                </label>

                <div class="space-10"></div>

                <div class="clearfix">
                    <button type="submit" name="upload" class="btn-block btn btn-sm btn-success">Upload</button>
                </div>
            </fieldset>
        </form>
        </div>
    </div>
</div>

