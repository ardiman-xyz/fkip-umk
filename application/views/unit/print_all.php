<!DOCTYPE html>
<html>
<head>
	<title>print</title>
<link rel="shortcut icon" href="<?= base_url() ?>assets/img/profil.png">
		
<style type="text/css">
	.line-title{
		border: 0;
		border-style: inset;
		border-top: 0,5px solid #000;
		margin-top: -10px;
		width: 650px;
	}

	body{
		font-size: 14px;
		font-family: arial ,sans-serif, times new roman;
		word-spacing: 2px;
	}

	h1{
		  font-family: sans-serif;
		}
		 
		table {
		  font-family: Arial, Helvetica, sans-serif;
		  color: #666;
		  text-shadow: 1px 1px 0px #fff;
		  background: #eaebec;
		  border: #ccc 1px solid;
		  width: 100%;
		  margin-top: 50px
		}
		 
		table th {
		  padding: 15px 10px;
		  border-left:1px solid #e0e0e0;
		  border-bottom: 1px solid #e0e0e0;
		  background: #ededed;
		}
		 
		table th:first-child{  
		  border-left:none;  
		}
		 
		table tr {
		  text-align: left;
		  padding-left: 20px;
		}

		table tr:first-child {
		  text-align: center;
		}
		 
		table td:first-child {
		  text-align: left;
		  padding-left: 10px;
		  border-left: 0;
		}
		 
		table td {
		  padding: 10px 20px;
		  border-top: 1px solid #ffffff;
		  border-bottom: 1px solid #e0e0e0;
		  border-left: 1px solid #e0e0e0;
		  background: #fafafa;
		  background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
		  background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
		}
		 
		table tr:last-child td {
		  border-bottom: 0;
		}
		 
		table tr:last-child td:first-child {
		  -moz-border-radius-bottomleft: 3px;
		  -webkit-border-bottom-left-radius: 3px;
		  border-bottom-left-radius: 3px;
		}
		 
		table tr:last-child td:last-child {
		  -moz-border-radius-bottomright: 3px;
		  -webkit-border-bottom-right-radius: 3px;
		  border-bottom-right-radius: 3px;
		}
		 
		table tr:hover td {
		  background: #f2f2f2;
		  background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
		  background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
		}

		#kiri {
			float:left;
			width: 120px
		}
		#kanan{
			margin-left: -10px
		}

		.clear{
			clear: both;
		}

</style>

</head>
<body onload="print()">

	<img src="<?= base_url() ?>assets/img/logo.png" width="70" style="position: absolute; height: auto; margin-left: 20px; margin-top: -2px">
					<h4 align="center" style="word-spacing: 3px; margin-left: 10px; font-family: 18px">
						UNIVERSITAS MUHAMMADIYAH KENDARI <br>
						FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN <br>
					<small align="center" style="font-size: 10px; font-weight: 0; word-spacing: 0px">Alamat : Jl. KH. Ahmad Dahlan No. 10 Kendari Telp. 0401-3008780, fax. 0401-3930710, E-mail: fkip_umk@yahoo.com</small>
					</h4>
	<hr class="line-title">
	<p align="center" style="font-weight: bold; margin-top: 20px">
		NILAI PLP
	</p>

	<div class="head">
		<div id="kiri">Lokasi </div>
		<?php $nama_sekolah = $this->unit->getNamaSekolah($this->session->userdata('id_sekolah')) ?>
		<div id="kanan"> : <?= $nama_sekolah ?></div>
	</div>
	<div class="clear"></div>
	<div class="head">
		<div id="kiri">Nama Pamong </div>
		<?php $nama_pamong = $this->unit->getNamaPamong($this->session->userdata('id_sekolah')) ?>
		<div id="kanan"> : <?= $nama_pamong ?></div>
	</div>
	<div class="clear"></div>

	<table cellspacing='0' style="margin-top: 10px">
		<thead>
			<tr>
				<th>No</th>
				<th>NIM</th>
				<th>Nama</th>
				<th>nilai</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; foreach ($data_mhs as $data): 
				$nilai = $this->unit->getNilaiMhs($data->nim, $data->program);
			?>
				<tr>
					<td align="center"><?= $no++ ?></td>
					<td align="center"><?= $data->nim ?></td>
					<td align="center"><?= $data->nama ?></td>
					<td align="center"><b><?= $nilai ?></b></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>


</body>
</html>
