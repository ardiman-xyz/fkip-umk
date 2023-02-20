<style type="text/css" media="screen">
	.btnTambah {
		margin-left: 10px;
	}
</style>
<br>
<div class="row justy-content-center">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<!-- PAGE CONTENT BEGINS -->
		
		<?php if ($this->session->flashdata('success')): ?>
      <?= $this->session->flashdata('success') ?>
    <?php endif ?>

		
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-1"></div>
		
      <?php if ($data_skpi !== null): ?>
        <div align="center">
          <div class="col-md-12">
            <h2><b>Anda telah membuat SKPI</b></h2>
          <img src="<?= base_url('assets/img/done-skpi.jpg') ?>" alt="Selesai" width="300">
          </div>
          <br>
          <b>Status : </b> <?= $data_skpi->status ?>
          <br><br>
          <?php if ($data_skpi->status === 'Pending' || $data_skpi->status === 'Dibatalkan'): ?>
            <button type="button" class="btn btn-info">Ubah</button>
          <?php else: ?>
            <p>Silahkan datang ke prodi untuk mengambil SKPI anda!</p>
          <?php endif ?>

        </div>
      <?php else: ?>
        <div class="col-md-10">
          <b>A. Informasi tentang identitas diri</b>

          <div style="margin-top: 20px;">
            <form class="form-horizontal form-label-left" id="form_pengajuan" method="post" action="<?= base_url('mahasiswa/skpi/simpan') ?>" enctype="multipart/form-data">
                   <div class="form-group">
                    <label class="control-label col-md-3" for="last-name">No. Induk
                    </label>
                    <div class="col-md-4">
                      <input type="text" id="nim" name="nim" class="form-control col-md-7 col-xs-12" value="<?= $mahasiswa->nim ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3" for="first-name">Nama <span class="required" style="color: red;">*</span>
                    </label>
                    <div class="col-md-7">
                      <input type="text" id="nama" name="nama" placeholder="masukkan nama" required="required" class="form-control col-md-12 col-xs-12" required readonly value="<?= $mahasiswa->nama_lengkap ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3" for="first-name">Tempat / Tanggal Lahir <span class="required" style="color: red;">*</span>
                    </label>
                    <div class="col-md-5">
                      <input type="text" id="tempat" name="tempat" placeholder="masukkan tempat lahir" required="required" class="form-control col-md-12 col-xs-12" required >
                    </div>
                     <div class="col-md-2">
                      <input type="date" id="tgl_lahir" name="tgl_lahir" placeholder="masukkan ttl" required="required" class="form-control col-md-12 col-xs-12" required >
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3" for="first-name">Tahun Masuk dan lulus <span class="required" style="color: red;">*</span>
                    </label>
                    <div class="col-md-4">
                      <input type="text" id="tahun_masuk" name="tahun_masuk" placeholder="Tahun masuk" required="required" class="form-control col-md-12 col-xs-12" required >
                    </div>
                     <div class="col-md-3">
                      <input type="text" id="tahun_lulus" name="tahun_lulus" placeholder="Tahun lulus" required="required" class="form-control col-md-12 col-xs-12" required >
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3" for="first-name">Judul Skripsi <span class="required" style="color: red;">*</span>
                    </label>
                    <div class="col-md-7">
                      <textarea rows="5" name="judul_skripsi" class="form_control col-md-12 col-xs-12" required readonly><?= $mahasiswa->judul ?></textarea>
                    </div>
                  </div>
                  <hr>

                  <b>B. Aktivitas, Prestasi, dan Penghargaan</b><br>
                  <p></p>
                  <div class="alert alert-danger">
                    <p>Kosongkan bila tidak ada prestasi dan penghargaan!!</p>
                  </div>

                  <div style="margin: 10px 0;">1. Prestasi dan penghargaan</div>
                  <table class="table-sm table table-bordered table-hover" id="myTable1">
                    <thead>
                      <tr>
                        <th class="text-center" width="5px">NO</th>
                        <th class="text-center" width="60%">Nama Kegiatan</th>
                        <th class="text-center">Upload Bukti (<small>JPG, PNG, JEPG</small>)</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
                  <button id="btn-tambah1" type="button" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</button>
                  <hr>
                  <div style="margin-bottom: 5px;">2. Pelatihan/seminar workshop</div>
                  <table class="table-sm table table-bordered table-hover" id="myTable2">
                    <thead>
                      <tr>
                        <th class="text-center" width="5px">NO</th>
                        <th class="text-center" width="60%">Nama Kegiatan</th>
                        <th class="text-center">Upload Bukti</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
                  <button id="btn-tambah2" type="button" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</button>
                  <hr>

                  <div style="margin-bottom: 5px;">3. Keikutsertaan dalam organisasi</div>
                  <table class="table-sm table table-bordered table-hover" id="myTable3">
                    <thead>
                      <tr>
                        <th class="text-center" width="5px">NO</th>
                        <th class="text-center" width="60%">Nama Kegiatan</th>
                        <th class="text-center">Upload Bukti</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
                  <button id="btn-tambah3" type="button" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</button>
                  <hr>

                  <div style="margin-bottom: 5px;">4. Sertifikat Keahlian</div>
                  <table class="table-sm table table-bordered table-hover" id="myTable4">
                    <thead>
                      <tr>
                        <th class="text-center" width="5px">NO</th>
                        <th class="text-center" width="60%">Nama Kegiatan</th>
                        <th class="text-center">Upload Bukti</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
                  <button id="btn-tambah4" type="button" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</button>
                  <hr>

                  <div style="margin-bottom: 5px;">5. Kerja Praktek/Magang</div>
                  <table class="table-sm table table-bordered table-hover" id="myTable5">
                    <thead>
                      <tr>
                        <th class="text-center" width="5px">NO</th>
                        <th class="text-center" width="60%">Nama Kegiatan</th>
                        <th class="text-center">Upload Bukti</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
                  <button id="btn-tambah5" type="button" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</button>
                  <hr>

                    <div class="col-md-12 mt-3" align="center">
                      <button type="submit" class="btn btn-primary">Simpan data</button>
                    </div>

                  </form>
                  </div>
              <?php endif ?>

		</div>
	</div>
</div>

<script>
    // 1
    let i = 1;
    $('#btn-tambah1').on('click', function() {

      let newRow = $("#myTable1 > tbody");

      let cols = "";

      cols += `
            <tr>
              <td class="text-center">${i}</td>
              <td class="text-center">
                <textarea name="prestasi_penghargaan[]" class="form-control" required placeholder="Tuliskan nama prestasi, ex: juaran 1 duta bahasa"></textarea>
              </td>
              
              <td class="text-center">
                  <input type="file" name="bukti_prestasi_penghargaan[]" class="form-control" required>
              </td>
              <td><button type="button" class="btn btn-sm ibtnDel btn-danger"><i class="fa fa-minus"></i></button></td>
            </tr>
        `;

        newRow.append(cols);
        $("table.order-list").append(newRow);
        i++;

        $("#myTable1 > tbody").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();       
            i -= 1

        });

    });

    //2
    let j = 1;
    $('#btn-tambah2').on('click', function() {

      let newRow = $("#myTable2 > tbody");

      let cols = "";

      cols += `
            <tr>
              <td class="text-center">${j}</td>
              <td class="text-center">
                <textarea name="pelatihan_seminar[]" class="form-control" required placeholder="Tuliskan posisi, ex: peserta seminar nasional"></textarea>
              </td>
              
              <td class="text-center">
                  <input type="file" name="bukti_pelatihan_seminar[]" class="form-control" required>
              </td>
              <td><button type="button" class="btn btn-sm ibtnDel btn-danger"><i class="fa fa-minus"></i></button></td>
            </tr>
        `;

        newRow.append(cols);
        $("table.order-list").append(newRow);
        j++;

        $("#myTable2 > tbody").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();       
            j -= 1

        });

    });

    //3
    let k = 1;
    $('#btn-tambah3').on('click', function() {

      let newRow = $("#myTable3 > tbody");

      let cols = "";

      cols += `
            <tr>
              <td class="text-center">${k}</td>
              <td class="text-center">
                <textarea name="organisasi[]" class="form-control" required placeholder="Tuliskan nama organisasi dan jabatan, ex: IMM Sebagai ketua"></textarea>
              </td>
              
              <td class="text-center">
                  <input type="file" name="bukti_organisasi[]" class="form-control" required>
              </td>
              <td><button type="button" class="btn btn-sm ibtnDel btn-danger"><i class="fa fa-minus"></i></button></td>
            </tr>
        `;

        newRow.append(cols);
        $("table.order-list").append(newRow);
        k++;

        $("#myTable3 > tbody").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();       
            k -= 1

        });

    });

    //4
    let l = 1;
    $('#btn-tambah4').on('click', function() {

      let newRow = $("#myTable4 > tbody");

      let cols = "";

      cols += `
            <tr>
              <td class="text-center">${l}</td>
              <td class="text-center">
                <textarea name="keahlian[]" class="form-control" required placeholder="Tuliskan nama organisasi dan jabatan, ex: IMM Sebagai ketua"></textarea>
              </td>
              
              <td class="text-center">
                  <input type="file" name="bukti_keahlian[]" class="form-control" required>
              </td>
              <td><button type="button" class="btn btn-sm ibtnDel btn-danger"><i class="fa fa-minus"></i></button></td>
            </tr>
        `;

        newRow.append(cols);
        $("table.order-list").append(newRow);
        l++;

        $("#myTable4 > tbody").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();       
            l -= 1

        });

    });

    //5
    let m = 1;
    $('#btn-tambah5').on('click', function() {

      let newRow = $("#myTable5 > tbody");

      let cols = "";

      cols += `
            <tr>
              <td class="text-center">${m}</td>
              <td class="text-center">
                <textarea name="magang[]" class="form-control" required placeholder="Tuliskan nama organisasi dan jabatan, ex: IMM Sebagai ketua"></textarea>
              </td>
              
              <td class="text-center">
                  <input type="file" name="bukti_magang[]" class="form-control" required>
              </td>
              <td><button type="button" class="btn btn-sm ibtnDel btn-danger"><i class="fa fa-minus"></i></button></td>
            </tr>
        `;

        newRow.append(cols);
        $("table.order-list").append(newRow);
        m++;

        $("#myTable5 > tbody").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();       
            m -= 1

        });

    });


</script>