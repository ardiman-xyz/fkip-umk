<!DOCTYPE html>
<html>
<head>
	<title>print</title>
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
	<link href="https://id.allfont.net/allfont.css?fonts=arial-narrow" rel="stylesheet" type="text/css" />
		
<style type="text/css">
	.line-title{
		border: 0;
		border-style: inset;
		border-top: 0,5px solid #000;
		width: 650px;
	}

	body{
		font-size: 18px;
		font-family: 'Times new roman';
	}

	.kotak {
		width: 800px;
	}

	.clear{
		clear: left;
	}

	.content-table{
		border-collapse: collapse;
		margin: 25px 0;
		font-size: 0.9em;
		min-width: 100%;
	}
	.content-table thead tr {
		color: black;
		text-align: left;;
		font-weight: bold;


	}
	.content-table th, .content-table td {
		padding: 5px 5px;
		border: 1px solid black
	}

   #container {
    width: 100%;
    padding-right: 20px;
    padding-left: 20px;
    margin-right: auto;
    margin-left: auto;
}

</style>

</head>
<body>

    <div id="container">
        <img src="<?= base_url('assets/img/kop_surat_baru.png') ?>" alt="" width="900" id="img">
    <br>
    <br>

	<p align="center" style="font-weight: bold; font-size: 16px; margin-top: 20px; text-transform: uppercase;"><?= $ket ?></p>


	 <table class="content-table">
	    <thead>
	      <tr>
	        <th class="text-center">NO</th>
	        <th class="text-center">STAMBUK</th>
	        <th class="text-center">NAMA</th>
	        <th class="text-center">PEMBAYARAN</th>
	        <th class="text-center">TGL PEMBAYARAN</th>
	      </tr> 
	    </thead>
	    <tbody>
	      <?php $no = 1; foreach ($result as $data): 
	      	$jenis_ujian = $this->fakultas->nama_jenis_ujian($data->id_jenis_ujian);
	      ?>
	        <tr>
	          <td align="center"><?= $no++; ?></td>
	          <td align="center"><?= $data->nim ?></td>
	          <td><?= $data->nama  ?></td>
	          <td class="text-center"><?= $jenis_ujian ?></td>
	          <td align="center"><?= pengaturan_tgl($data->tgl_bayar) ?></td>
	        </tr>
	      <?php endforeach ?>
	    </tbody>
	  </table>

	  <p style="margin-left: 500px; margin-top: 50px">Kendari, <?= tanggal_indo(date('Y-m-d')) ?> M.</p>
			<p style="margin-left: 500px"><b>Yang Menerima,</b></p>
			<p style="margin-top: 50px; margin-left: 500px"></p>
			<p style=" margin-left: 500px;"><b><?= $nama_staff ?></b></p>		
	</div>

    </div>
	
<script type="text/javascript">window.onload = function() { window.print(); }</script>
</body>
</html>