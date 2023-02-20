<style type="text/css" media="screen">
	.btnTambah {
		margin-left: 10px;
	}
</style>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-1"></div>
		
     <center><h2 style="text-transform: uppercase;"><b>Preview skpi <?= $data->nama_lengkap ?></b></h2></center>
     <hr>

     <div style="margin-bottom: 10px;">
       <a href="<?= base_url('tendik/skpi') ?>" title="Kembali" class="btn btn-danger btn-sm">Kembali</a>
     </div>

     <div class="list_skpi">
       <table class="table table-striped table-bordered">
         <tr>
           <td>No SK</td><td> : <?= $data->No ?></td>
         </tr>
         <tr>
           <td>No Ijazah</td> <td> : <?= $data->no_ijazah ?></td>
         </tr>
         <tr>
           <td>NIM</td> <td> : <?= $data->nim ?></td>
         </tr>
         <tr>
           <td>Tempat/Tanggal Lahir</td> <td> : <?= $data->tempat_lahir ?> / <?= tanggal_indo($data->tgl_lahir) ?></td>
         </tr>
         <tr>
           <td>Tahun Masuk - Lulus</td> <td> : <?= $data->tahun_masuk ?> - <?= $data->tahun_lulus ?></td>
         </tr>
         <tr>
           <td>Judul Skripsi</td> <td> : <?= $data->judul ?></td>
         </tr>
       </table>
       <hr>
       <h4><b>1. Prestasi dan Penghargaan</b></h4>
       <table class="table-sm table table-bordered table-hover" id="myTable1">
        <thead>
          <tr>
            <th class="text-center" width="5px">NO</th>
            <th class="text-center" width="60%">Nama Kegiatan</th>
            <th class="text-center">Bukti</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($penghargaan as $key => $value): ?>
            <tr>
              <td class="text-center"><?= $key + 1 ?></td>
              <td class="text"><?= $value->kegiatan ?></td>
              <td class="text-center"><a href="<?= base_url('assets/upload/skpi/'.$value->bukti) ?>" target="_blank"><?= $value->bukti ?></a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
      <hr>

      <h4><b>2. Pelatihan/seminar/workshop</b></h4>
       <table class="table-sm table table-bordered table-hover" id="myTable1">
        <thead>
          <tr>
            <th class="text-center" width="5px">NO</th>
            <th class="text-center" width="60%">Nama Kegiatan</th>
            <th class="text-center">Bukti</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($pelatihan as $key => $value): ?>
            <tr>
              <td class="text-center"><?= $key + 1 ?></td>
              <td class="text"><?= $value->nama_kegiatan ?></td>
              <td class="text-center"><a href="<?= base_url('assets/upload/skpi/'.$value->bukti) ?>" target="_blank"><?= $value->bukti ?></a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
      <hr>

      <h4><b>3. Keikutsertaan dalam organisasi</b></h4>
       <table class="table-sm table table-bordered table-hover" id="myTable1">
        <thead>
          <tr>
            <th class="text-center" width="5px">NO</th>
            <th class="text-center" width="60%">Nama Kegiatan</th>
            <th class="text-center">Bukti</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($organisasi as $key => $value): ?>
            <tr>
              <td class="text-center"><?= $key + 1 ?></td>
              <td class="text"><?= $value->nama_organisasi ?></td>
              <td class="text-center"><a href="<?= base_url('assets/upload/skpi/'.$value->bukti) ?>" target="_blank"><?= $value->bukti ?></a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
      <hr>

      <h4><b>4. Sertifikat Keahlian</b></h4>
       <table class="table-sm table table-bordered table-hover" id="myTable1">
        <thead>
          <tr>
            <th class="text-center" width="5px">NO</th>
            <th class="text-center" width="60%">Nama Kegiatan</th>
            <th class="text-center">Bukti</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($keahlian as $key => $value): ?>
            <tr>
              <td class="text-center"><?= $key + 1 ?></td>
              <td class="text"><?= $value->nama_keahlian ?></td>
              <td class="text-center"><a href="<?= base_url('assets/upload/skpi/'.$value->bukti) ?>" target="_blank"><?= $value->bukti ?></a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
      <hr>

      <h4><b>5. Kerja praktek/magang</b></h4>
       <table class="table-sm table table-bordered table-hover" id="myTable1">
        <thead>
          <tr>
            <th class="text-center" width="5px">NO</th>
            <th class="text-center" width="60%">Nama Kegiatan</th>
            <th class="text-center">Bukti</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($magang as $key => $value): ?>
            <tr>
              <td class="text-center"><?= $key + 1 ?></td>
              <td class="text"><?= $value->nama_lokasi ?></td>
              <td class="text-center"><a href="<?= base_url('assets/upload/skpi/'.$value->bukti) ?>" target="_blank"><?= $value->bukti ?></a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
      <hr>


     </div>

		</div>
	</div>
</div>

