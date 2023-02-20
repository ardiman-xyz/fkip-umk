<div class="row">
    <div class="col-md-10 col-md-offset-1"> 
        
        <div class="widget-box">
            <div class="widget-header widget-header-blue widget-header-flat">
                <h4 class="widget-title lighter">Edit Berita : <?= $berita->judul ?></h4>
            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <form action="<?= base_url('admin/berita/edit/'.$berita->id_berita) ?>" class="form-horizontal" id="validation-form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Judul Berita</label>

                            <div class="col-xs-12 col-sm-7">
                                <div class="clearfix">
                                   <input type="text" class="form-control mb-2" placeholder="judul.." name="judul" value="<?= $berita->judul ?>">
                                    <?php echo form_error('judul', '<div class="text-danger mt-2">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="space-2"></div>

                        <div class="form-group">
                            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Jenis Berita</label>

                            <div class="col-xs-12 col-sm-3">
                                <div class="clearfix">
                                    <select name="jenis_berita" class="form-control">
                                        <option value="">--pilih--</option>
                                        <option value="utama" <?php if($berita->jenis_berita == "utama"){echo"selected";} ?>>Utama</option>
                                        <option value="berita" <?php if($berita->jenis_berita == "berita"){echo"selected";} ?>>Berita</option>
                                    </select>
                                    <?php echo form_error('jenis_berita', '<div class="text-danger mt-2">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="space-2"></div>

                        <div class="form-group">
                            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2">Kategori Berita</label>

                            <div class="col-xs-12 col-sm-3">
                                <div class="clearfix">
                                    <select name="kategori_berita" class="form-control">
                                        <option value="">--pilih--</option>
                                        <?php foreach($kategori as $row ) : ?>
                                            <option value="<?= $row->id_kategori_berita; ?>" <?php if($berita->id_kategori_berita == $row->id_kategori_berita) {echo "selected";} ?> ><?= $row->nama_kategori; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?php echo form_error('kategori_berita', '<div class="text-danger mt-2">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Status Berita</label>

                            <div class="col-xs-12 col-sm-3">
                                <div class="clearfix">
                                   <select name="status_berita" class="form-control">
                                        <option value="">--pilih--</option>
                                        <option value="publish" <?php if($berita->status_berita == "publish"){echo"selected";} ?>>Publish</option>
                                        <option value="no publish" <?php if($berita->status_berita == "no publish"){echo"selected";} ?>>No Publish</option>
                                        <option value="pending" <?php if($berita->status_berita == "pending"){echo"selected";} ?>>Pending</option>
                                    </select>
                                    <?php echo form_error('telepon', '<div class="text-danger mt-2">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="space-2"></div>

                        <div class="form-group">
                            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="url">Gambar Berita</label>

                            <div class="col-xs-12 col-sm-3">
                                <div class="clearfix">
                                    <input type="file" class="form-control" placeholder="gambar" name="foto" value="<?= set_value('foto') ?>"><br>
                                    gambar lama <img src="<?= base_url('assets/img/berita/'.$berita->gambar); ?>" alt="" class="img-thumbnail" width="200" height="100">
                                    <?php echo form_error('foto', '<div class="text-danger mt-2">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                             <label>Isi Berita</label>
                                <textarea name="isi" id="basic-example" cols="30" rows="10"><?= $berita->isi?></textarea>
                                <?php echo form_error('isi', '<div class="text-danger mt-2">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="wizard-actions">
                            <button class="btn btn-prev" type="reset">
                                <i class="ace-icon fa fa-times"></i>
                                Reset
                            </button>

                            <button class="btn btn-success btn-next" type="submit">
                                Update
                                <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                            </button>
                        </div>
                       </form>

                </div>
            </div>
        </div>

    </div>
</div>