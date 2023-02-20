<html>
	<head>
		<title>Cetak Bimbingan <?= $dosen->nama_dosen ?></title>
		<link rel="shortcut icon" href="<?= base_url() ?>assets/img/profil.png">
		<style type="text/css">
			.tabel {
			    color: #232323 !important;
			    border-collapse: collapse;
			    width: 100%;
			    -webkit-print-color-adjust: exact; 
			}
			 
			.tabel, th, td {
			    border: 1px solid #999 !important;
			    padding: 4px 10px;
			}
			.header {
				text-align: center;
				margin-top: 20px;
			}
			.center {
				text-align: center;
			}
			#red {
			    background-color: #f5d3bc;
			}
			#green {
			    background-color: #bff2c3;
			}
		</style>
	</head>
	<body>
		<div class="container">

			<div class="header">
				<h2>Daftar Semua Bimbingan <?= $dosen->nama_dosen ?></h2>
			</div>

			<table class="tabel">
				<thead>
					<tr style="background-color: #c9c3c3">
						<th>No</th>
						<th>NIM</th>
						<th>Nama</th>
						<th>Judul Penelitian</th>
						<th>Jurusan</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php if (!empty($bimbingan)): ?>
                        <?php foreach ($bimbingan as $key => $mhs): 
                          $status = $this->dosen->getStatusUjianMhs($mhs->nim)['status'];
                          ?>
                          <tr>
                            <td id="<?= $status === 'selesai' ? 'red' : 'green' ?>"><?= $key+1 ?></td>
                            <td id="<?= $status === 'selesai' ? 'red' : 'green' ?>" class="center"><?= $mhs->nim ?></td>
                            <td id="<?= $status === 'selesai' ? 'red' : 'green' ?>"><?= $mhs->nama_mhs ?></td>
                            <td id="<?= $status === 'selesai' ? 'red' : 'green' ?>"><?= $mhs->judul ?></td>
                            <td id="<?= $status === 'selesai' ? 'red' : 'green' ?>"><?= $mhs->nama_prodi ?></td>
                            <td class="center" id="<?= $status === 'selesai' ? 'red' : 'green' ?>"><?= $status ?></td>
                          </tr>
                        <?php endforeach ?>
                      <?php else: ?>
                        <tr>
                          <td colspan="5" align="center"><em>Tidak ada data</em></td>
                        </tr>
                      <?php endif ?>
				</tbody>
			</table>
		</div>

		<script>
			window.print()
		</script>
	</body>
</html>