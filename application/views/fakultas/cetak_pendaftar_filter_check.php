<!DOCTYPE html>
<html>
<head>
	<title>print</title>
		
<style type="text/css">
	.line-title{
			border: 1;
			border-style: inset;
			border-top: 0,5px solid #000;
			width: 650px;
			margin-top:-10px;
		}

	body{

		font-size: 18px;
		font-family: 'Times new roman';
	}

	.kotak {
		width: 100%;
	}
	
	.container{
			margin: 0 10px;
		}

	.kiri{
		width: 14.5%;
		float: left;
	}
	.kanan{
		width: 80%;
		float: left;
	}

	.left{

		padding: 5px;
		float: left;
	}

	.right{

		padding: 5px;
		float: left;
	}

	.clear{
		clear: left;
	}

	.content-table{
		border-collapse: collapse;
		margin: 25px 0;
		min-width: 100%;
	}
	.content-table thead tr {
		color: black;
		text-align: left;;
		font-weight: bold;


	}
	.content-table th, .content-table td {
		padding: 2px 4px;
		border: 1px solid black
	}
    
	#img{
	    margin-top:20px;
	}
	#cerdas{
	    margin-top: 20px;
	}
	@page {
        margin: 0 50px;  /* this affects the margin in the printer settings */
    }
</style>


</head>
<body>

  <img src="<?= base_url('assets/img/kop_surat_baru.png') ?>" alt="" width="900" id="img">
    <br>
    <br>
	<p align="center" style="font-weight: bold; font-size: 16px; margin-top: 20px; text-transform: uppercase;"><?= $ket ?></p>


	 <table class="content-table">
	    <thead>
	      <tr>
	        <th align="center">NO</th>
	        <th align="center">STAMBUK</th>
	        <th align="center">NAMA</th>
	        <th align="center">PEMBAYARAN</th>
	        <th align="center">TGL PEMBAYARAN</th>
	      </tr> 
	    </thead>
	    <tbody>
	        
	      <?php $no = 1; foreach ($result as $data): 
	      ?>
	        <tr>
	          <td align="center"><?= $no++; ?></td>
	          <td align="center"><?= $data->nim ?></td>
	          <td><?= $data->nama  ?></td>
	          <td align="center"><?= $data->nama_ujian ?></td>
	          <td align="center"><?= pengaturan_tgl($data->tgl_bayar) ?></td>
	        </tr>
	      <?php endforeach ?>
	    </tbody>
	  </table>

	  <p style="margin-left: 430px; margin-top: 50px">Kendari, <?= tanggal_indo(date('Y-m-d')) ?> M.</p>
			<p style="margin-left: 430px"><b>Yang Menerima,</b></p>
			<p style="margin-top: 50px; margin-left: 430px"></p>
			<p style=" margin-left: 430px;"><b><?= $nama_staff ?></b></p>		
	</div>

	<script type="text/javascript">window.onload = function() { window.print(); }</script>

</body>
</html>