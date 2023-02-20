<br>
<div class="row justy-content-center">
	<div class="col-md-4 col-md-offset-4 col-xs-10 col-xs-offset-1">
		<!-- PAGE CONTENT BEGINS -->
		
		<div class="alert alert-block alert-warning">
			<i class="ace-icon fa fa-users green"></i>
			Halaman Tambah Mahasiswa
		</div>
        <?= $this->session->flashdata('sukses') ?>
        <?php if ($this->session->flashdata("gagal")): ?>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
                </button>

                <strong>
                    <i class="ace-icon fa fa-bullhorn"></i>
                    Maaf!
                </strong>

                <?= $this->session->flashdata("gagal"); ?>, Silahkan coba nim yang lain
                <br />
            </div>
        <?php endif ?>

	       
        <form action="<?= base_url('tendik/mhs_action') ?>" method="post" accept-charset="utf-8">
            <fieldset>
                <label class="block clearfix">
                    <span class="block input-icon input-icon-right">
                        <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap..." name="nama_lengkap" required/>
                    </span>
                </label>

                <label class="block clearfix">
                    <span class="block input-icon input-icon-right">
                        <input type="text" class="form-control" placeholder="Nim" name="nim" required/>
                    </span>
                </label>

                <label class="block clearfix">
                    <span class="block input-icon input-icon-right">
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password" required/>
                    </span>
                </label>
                 <label class="block clearfix">
                    <span class="block input-icon input-icon-right">
                        <input type="text" class="form-control" placeholder="No WA" name="no_wa" id="no_wa" required/>
                    </span>
                </label>


                <label class="block clearfix">
                    <span class="block input-icon input-icon-right">
                        <select name="jenis_kelamin" class="form-control" required>
                            <option value="">--Pilih Jenis Kelamin--</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </span>
                </label>

                <div class="checkbox">
                    <label>
                        <input name="form-field-checkbox" type="checkbox" id="show" class="ace" />
                        <span class="lbl"> Show Password</span>
                    </label>
                </div>

                <div class="space-24"></div>

                <div class="clearfix">
                    <button type="reset" class="width-30 pull-left btn btn-sm">
                        <i class="ace-icon fa fa-refresh"></i>
                        <span class="bigger-110">Reset</span>
                    </button>

                    <button type="submit" onsubmit="cek()" class="width-65 pull-right btn btn-sm btn-success">
                        <span class="bigger-110">Register</span>

                        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                    </button>
                </div>
            </fieldset>
        </form>


    </div>
</div>