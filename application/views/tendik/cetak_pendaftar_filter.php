<!DOCTYPE html>
<html>
<head>
	<title>print</title>
	<!--<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">-->
	<link href="https://id.allfont.net/allfont.css?fonts=arial-narrow" rel="stylesheet" type="text/css" />
		
<style type="text/css">
	.line-title{
			border: 1;
			border-style: inset;
			border-top: 0,5px solid #000;
			width: 650px;
			margin-top:-10px;
		}

	body{

		font-size: 14px;
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
    

    	#kolom-3 {
	  width:100%;
	}

	.kolom1 {
	  width:15%;
	  float:left;
	  display:inline;
	  word-wrap:break-word; /* fix for long text breaking sidebar float in IE */
	  overflow:hidden;      /* fix for long non-text content breaking IE sidebar float */
	}

	.kolom2 {
	  width:70%;
	  float:left;
	  display:inline;
	  word-wrap:break-word; /* fix for long text breaking sidebar float in IE */
	  overflow:hidden;
	  text-align: center;      /* fix for long non-text content breaking IE sidebar float */
	}

	.kolom3 {
	  width:15%;
	  float:left;
	  display:inline;
	  word-wrap:break-word; /* fix for long text breaking sidebar float in IE */
	  overflow:hidden;      /* fix for long non-text content breaking IE sidebar float */
	}
	.kolom1 #img{
		margin-top: 8px;
	}
	.kolom3 #img{
		margin-top: 20px
	}
	#img{
	    margin-left:20px;
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

<div id='kolom-3' style="align-items: center;">
    <div class='kolom1'>
        <img src="<?= base_url('assets/img/logo.png') ?>" width="70" id="img">
    </div>
    <div class='kolom2'  style="align-items: center;">
       <span style="font-weight: bold; font-size: 18px;">
			UNIVERSITAS MUHAMMADIYAH KENDARI <br>
			FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN <br>
			<span style="font-size:14px">SK. MENDIKNAS NO. 149/D/0/2001</span> <br>
		</span>
		<small style="font-size: 12px; margin-top:-30px">Kantor Pusat : Jl. KH. Ahmad Dahlan No. 10 Kendari Telp. 0401-3008780, fax. 0401-3930710</small>
		<small style="font-size: 12px; margin-top:-100px">http://www.fkipumkendari.ac.id/e-mail: fkip@umkendari.ac.id</small>
    </div>
    <div class='kolom3'>
       <img src="<?= base_url('assets/img/cerdas.png') ?>" width="100" id="cerdas">
    </div>
    <div style='clear:both;'></div>
</div>

    <hr color="#000">

	<p align="center" style="font-weight: bold; font-size: 16px; margin-top: 20px; text-transform: uppercase;"><?= $ket ?></p>


	 <table class="content-table">
            <thead>
              <tr>
                <th align="center">No</th>
                <th align="center">Jenis Ujian</th>
                <th align="center">Nama</th>
                <th align="center">Nim</th>
                <th align="center">Smt</th>
                <th align="center">Judul</th>
                <th align="center">Pembimbing 1</th>
                <th align="center">Pembimbing 2</th>
                <th align="center">Status Ujian</th>
              </tr> 
            </thead>
            <tbody>
              <?php $no = 1; foreach ($result as $data): 
               $jenis_ujian  = $this->daftar_ujian->nama_jenis_ujian($data->id_jenis_ujian);
               $pembimbing1 = $this->daftar_ujian->get_pembimbing1($data->nim);
               $pembimbing2 = $this->daftar_ujian->get_pembimbing2($data->nim);
                ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $jenis_ujian ?></td>
                  <td><?= $data->nama ?></td>
                  <td><?= $data->nim ?></td>
                  <td align="center"><?= $data->semester ?></td>
                  <td><?= $data->judul ?></td>
                  <td><?= $pembimbing1 ?></td>
                   <td><?= $pembimbing2 ?></td>
                   <td><?= ($data->status === '0' ? 'Belum' : "Sudah") ?></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
	<script type="text/javascript">window.onload = function() { window.print(); }</script>

</body>
</html>