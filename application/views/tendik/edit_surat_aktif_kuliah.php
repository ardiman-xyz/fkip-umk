

<div class="container" style="margin-top: 20px">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">

    	 <div class="alert alert-block alert-success">
            <i class="ace-icon fa fa-check green"></i>
            Edit surat aktif kuliah <strong><?= $data->nama ?></strong> !!
        </div>

        <div class="widget-body">
          <div class="widget-main">
            <form class="form-horizontal form-label-left" method="post" action="<?= base_url('tendik/update_surat_aktif_kuliah/'.$data->id_aktif_kuliah) ?>" id="myCutiForm">
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
			        <div class="col-md-5">
			          <input type="text" required id="tempat" name="tempat" placeholder="masukkan tempat lahir" class="form-control col-md-12 col-xs-12" value="<?= $data->tempat_lahir ?>">
			        </div>
			         <div class="col-md-4">
			          <input type="date" id="tgl_lahir" name="tgl_lahir" placeholder="masukkan tanggal lahir" class="form-control col-md-12 col-xs-12" required value="<?= $data->tgl_lahir ?>">
			        </div>
			      </div>

			      <div class="form-group">
			        <label class="control-label col-md-3" for="first-name">Semester</label>
			        <div class="col-md-3">
			          <select name="smt" class="form-control" required>
			          	<option value="">--Pilih--</option>
			          	<option value="genap" <?= $data->semester === 'genap' ? 'selected' : '' ?>>Genap</option>
			          	<option value="ganjil" <?= $data->semester === 'ganjil' ? 'selected' : '' ?>>Ganjil</option>
			          </select>
			        </div>
			      </div>

			      <div class="form-group">
			        <label class="control-label col-md-3" for="first-name">Alamat</label>
			        <div class="col-md-9">
			          <textarea name="alamat" class="form-control" required><?= $data->alamat ?></textarea>
			        </div>
			      </div>

			      <p class="text-center "><b>Data orang tua/wali</b></p>
			      <div class="form-group">
			        <label class="control-label col-md-3" for="first-name">Nama orang tua</label>
			        <div class="col-md-9">
			          <input type="text" id="nama_ortu" name="nama_ortu" placeholder="masukkan nama orang tua/wali" class="form-control col-md-12 col-xs-12" required value="<?= $data->nama_ortu ?>">
			        </div>
			      </div>

			      <div class="form-group">
			        <label class="control-label col-md-3" for="first-name">NIP/NRP</label>
			        <div class="col-md-4">
			          <input type="text" id="nip" name="nip" placeholder="masukkan nip" class="form-control col-md-12 col-xs-12" required value="<?= $data->nip ?>">
			        </div>
			      </div>

			      <div class="form-group">
			        <label class="control-label col-md-3" for="first-name">Pangkat/Golongan</label>
			        <div class="col-md-4">
			          <input type="text" id="pangkat" name="pangkat" placeholder="masukkan pangkat" class="form-control col-md-12 col-xs-12" required value="<?= $data->pangkat ?>">
			        </div>
			      </div>

			      <div class="form-group">
			        <label class="control-label col-md-3" for="first-name">Jabatan/pekerjaan</label>
			        <div class="col-md-9">
			          <input type="text" id="jabatan" name="jabatan" placeholder="masukkan jabatan" class="form-control col-md-12 col-xs-12" required value="<?= $data->jabatan ?>">
			        </div>
			      </div>

			      <div class="form-group">
			        <label class="control-label col-md-3" for="first-name">Instansi/Kantor</label>
			        <div class="col-md-9">
			          <input type="text" id="instansi" name="instansi" placeholder="masukkan instansi" class="form-control col-md-12 col-xs-12" required value="<?= $data->instansi ?>">
			        </div>
			      </div>

			      <div class="form-group">
			        <label class="control-label col-md-3" for="first-name">Alamat</label>
			        <div class="col-md-9">
			          <textarea name="alamat_ortu" class="form-control" required><?= $data->alamat_ortu ?></textarea>
			        </div>
			      </div>


                  <p class="mb-0 text-center">
                  	<a href="<?= base_url('tendik/surat_aktif_kuliah') ?>" title="Batal" class="btn btn-danger btn-md">Batal</a>
                    <button style="border-radius: 1px" class="btn btn-primary btn-md" type="submit">Update surat aktif kuliah</button>
                  </p>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
