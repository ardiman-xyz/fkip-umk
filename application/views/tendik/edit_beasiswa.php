

<div class="container" style="margin-top: 20px">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">

    	 <div class="alert alert-block alert-success">
            <i class="ace-icon fa fa-check green"></i>
            Edit surat keterangan tidak meneriman beasiswa <strong><?= $data->nama ?></strong> !!
        </div>

        <div class="widget-body">
          <div class="widget-main">
            <form class="form-horizontal form-label-left" method="post" action="<?= base_url('tendik/update_beasiswa/'.$data->id) ?>" id="myCutiForm">
            		<p class="text-center "><b>Data mahasiswa</b></p>
                   <div class="form-group">
			        <label class="control-label col-md-3" for="first-name">NIM</label>
			        <div class="col-md-2">
			          <input type="text" id="nim" name="nim" placeholder="masukkan nim" class="form-control col-md-12 col-xs-12" required readonly="readonly" value="<?= $data->nim ?>">
			        </div>
			      </div>
			      <div class="form-group">
			        <label class="control-label col-md-3" for="first-name">Nama Mahasiswa</label>
			        <div class="col-md-9">
			          <input type="text" id="nama" name="nama" placeholder="masukkan nama" class="form-control col-md-12 col-xs-12" required readonly="readonly" value="<?= $data->nama ?>">
			        </div>
			      </div>

			      <div class="form-group">
			        <label class="control-label col-md-3" for="first-name">Tempat/Tgl lahir</label>
			        <div class="col-md-6">
			          <input type="text" required id="tempat" name="tempat" placeholder="masukkan tempat lahir" class="form-control col-md-12 col-xs-12" value="<?= $data->tempat_lahir ?>">
			        </div>
			         <div class="col-md-3">
			          <input type="date" id="tgl_lahir" name="tgl_lahir" placeholder="masukkan tanggal lahir" class="form-control col-md-12 col-xs-12" required value="<?= $data->tgl_lahir ?>">
			        </div>
			      </div>

			      <div class="form-group">
			        <label class="control-label col-md-3" for="first-name">Tahun Akademik</label>
			        <div class="col-md-2">
			          <input type="text" id="tahun_akademik" name="tahun_akademik" placeholder="masukkan tahun akademik" class="form-control col-md-12 col-xs-12" required value="<?= $data->thn_akademik ?>">
			        </div>
			      </div>

			      <div class="form-group">
			        <label class="control-label col-md-3" for="first-name">Status</label>
			        <div class="col-md-3">
			          <select name="status" class="form-control" required>
			          	<option value="">--Pilih--</option>
			          	<option value="diterima" <?= $data->status === 'diterima' ? 'selected' : '' ?>>Diterima</option>
			          	<option value="pending" <?= $data->status === 'pending' ? 'selected' : '' ?>>Pending</option>
			          	<option value="ditolak" <?= $data->status === 'ditolak' ? 'selected' : '' ?>>Ditolak</option>
			          </select>
			        </div>
			      </div>
			      <hr>
                  <p class="mb-0 text-center">
                  	<a href="<?= base_url('tendik/surat_pengajuan_judul') ?>" title="Batal" class="btn btn-danger btn-md">Batal</a>
                    <button style="border-radius: 1px" class="btn btn-primary btn-md" type="submit">Update Ket. beasiswa</button>
                  </p>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
