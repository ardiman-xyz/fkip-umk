<html>
	<head>
		<meta charset="utf-8">
		<title>Cetak SKPI</title>
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/print_skpi.css') ?>">
		<style>
			@media print {
			   body {
			      -webkit-print-color-adjust: exact;
			   }
			}
		</style>	
	</head>
	<body>
		<img src="<?= base_url('assets/img/kop_surat_baru.png')?>" width="900" >
		<h4 align="center" style="font-weight: bold;">
			SURAT KETERANGAN PENDAMPING IJAZAH <br>
			<span class="italic">DIPLOMA SUPPLEMENT</span> <br>
			<span>Nomor : <?= $data_skpi->No ?>/KET/II.3.AU-01/B/<?= date('Y') ?></span>
		</h4>
		<br>
		
		<div class="container">
			<p class="text-justify" style="width:95%">Surat Keterangan Pendamping Ijazah ini sebagai pelengkap ijazah yang menerangkan capaian pembelajaran dan prestasi dari pemegang ijazah selama masa studi</p>
			<p class="bhs_ingrris text-justify" style="width:95%">The Diploma Supplement accompanies a higher education certificate providing a standardized description of the nature, level, context, content and status of the studies completed by its holder</p>
			<hr style="color: #f0f0f0;" width="95%" align="left">
			<br>

			<b>01. Informasi tentang identitas diri pemegang SKPI</b><br>
			<span class="italic">01. Information Identifying The Holder of Diploma Supplement</span>
			<table class="tabel">
				<tr>
					<td>
						Nama Lengkap <br>
						<span class="italic">Full Name</span>
					</td>
					<td>
						Nomor Ijazah <br>
						<span class="italic">Diploma Number</span>
					</td>
				</tr>
				<tr>
					<td class="brown">
						<span style="text-transform: capitalize;"><?= $data_skpi->nama_lengkap ?></span> <br>
					</td>
					<td class="brown">
						<?= $data_skpi->no_ijazah ?><br>
					</td>
				</tr>
				<tr>
					<td>
						Tempat dan tanggal lahir <br>
						<span class="italic">Place/Date of Birth</span>
					</td>
					<td>
						Nomor induk mahasiswa <br>
						<span class="italic">Student identification number</span>
					</td>
				</tr>
				<tr>
					<td class="brown">
						<span style="text-transform: capitalize"><?= $data_skpi->tempat_lahir ?>/<?= tanggal_indo($data_skpi->tgl_lahir) ?></span> <br>
					</td>
					<td class="brown">
						<?= $data_skpi->nim ?> <br>
					</td>
				</tr>
				<tr>
					<td>
						Tahun Masuk <br>
						<span class="italic">Entry Year</span>
					</td>
					<td>
						Tahun Lulus <br>
						<span class="italic">Graduation Year</span>
					</td>
				</tr>
				<tr>
					<td class="brown">
						<?= $data_skpi->tahun_masuk ?> <br>
					</td>
					<td class="brown">
						<?= $data_skpi->tahun_lulus ?> <br>
					</td>
				</tr>`
				<tr>
					<td>
						Gelar <br>
						<span class="italic">Title</span>
					</td>
					<td>
					</td>
				</tr>
				<tr>
					<td class="brown">
						Sarjana Pendidikan (S.Pd.) <br>
						<span class="italic">Bachelor of English Education</span>
					</td>
					<td>
					</td>
				</tr>
			</table>
			<hr style="color: #f0f0f0;" width="95%" align="left">
			<br>

			<b>02. Informasi tentang identitas Penyelenggara Program</b> <br>
			<span class="italic">02. Information Identifying The Awarding Insitution</span>
			<table class="tabel">
				<tr>
					<td>
						Nama Perguruan Tinggi <br>
						<span class="italic">Awarding institution</span>
					</td>
					<td>
						Status Akreditasi Perguruan Tinggi  <br>
						<span class="italic">College Accreditation Status</span>
					</td>
				</tr>
				<tr>
					<td class="brown">
						Universitas Muhammadiyah Kendari <br>
					</td>
					<td class="brown">
						B <br>
					</td>
				</tr>
				<tr>
					<td>
						Nama Program Studi <br>
						<span class="italic">Main field of Study</span>
					</td>
					<td>
						Nomor SK Akreditasi Perguruan Tinggi <br>
						<span class="italic">College Accreditation Decree Number</span>
					</td>
				</tr>
				<tr>
					<td class="brown">
						<span style="text-transform: capitalize"><?= $nama_prodi ?></span> <br>
					</td>
					<td class="brown">
					    333/SK/BAN-PT/Akred/PT/XII/2018 <br>
						<!--333/SK/BAN-PT/Akred/PT/XII/2018 <br>-->
					</td>
				</tr>
				<tr>
					<td>
						Status Akreditasi Program Studi <br>
						<span class="italic">Study Program Accreditation Status</span>
					</td>
					<td>
						Nomor SK Akreditasi Program Studi <br>
						<span class="italic">Study Program Accreditation Decree Number</span>
					</td>
				</tr>
				<tr>
					<td class="brown">
						<?php if ($this->session->userdata('prodi') === '9'): ?>
							A
						<?php else: ?>
							B
						<?php endif ?> 
						<br>
					</td>
					<td class="brown">
					    <?php if ($this->session->userdata('prodi') === '9'): ?>
							3794/SK/BAN-PT/Akred/S/VII/2020
						<?php else: ?>
							<!--2226/SK/BAN-PT/Ak-PPJ/S/IV/2022-->
							3968/SK/BAN-PT/Ak-PPJ/S/VII/2020
						<?php endif ?>
						 <br>
					</td>
				</tr>


				<tr>
					<td>
						Jenjang kualifikasi sesuai KKNI <br>
						<span class="italic">Level of Qualification in the National Qualification Framework</span>
					</td>
					<td>
						Persyaratan penerimaan <br>
						<span class="italic">Entry requirements</span>
					</td>
				</tr>
				<tr>
					<td class="brown">
						Level 6<br>
					</td>
					<td class="brown">
						- <br>
					</td>
				</tr>


				<tr>
					<td>
						Bahasa pengantar kuliah <br>
						<span class="italic">Language of instruction</span>
					</td>
					<td>
						Sistem penilaian <br>
						<span class="italic">Grading system</span>
					</td>
				</tr>
				<tr>
					<td class="brown">
						<?php if ($this->session->userdata('prodi') === '4'): ?>
							Bahasa Inggris
						<?php else: ?>
							Bahasa Indonesia
						<?php endif ?>
						<br>
					</td>
					<td class="brown">
						Skala 0.00-4.00; <br> A=4.00, A-=3.70, B+=3.30, B=3.00, B-=2.70, C+=2.30, C=2.00, D=1.00, E=0.00 <br>
					</td>
				</tr>


				<tr>
					<td>
						Lama studi regular <br>
						<span class="italic">Regular length of study</span>
					</td>
					<td>
						Jenis dan jenjang pendidikan lanjutan <br>
						<span class="italic">Type dan level of education</span>
					</td>
				</tr>
				<tr>
					<td class="brown">
						8 Semester <br>
					</td>
					<td class="brown">
						Program Magister & Doktoral <br>
					</td>
				</tr>

			</table>

			<br>
			<p style="page-break-before: always;">&nbsp;</p>
			<!-- 3 -->
			<b>03. AKTIVITAS, PRESTASI, DAN PENGHARGAAN</b>
			<p class="italic" style="margin-top: -4px;">03. Activities, Achievements, and Rewards</p>
			<table class="tabel">
				<tr>
					<td>
						PRESTASI DAN PENGHARGAAN <br>
						<span class="italic">Achievement and Rewards</span>
					</td>
				</tr>
				<tr>
					<td class="brown">
						
						<p>
							<ol class="prestasi">

								<?php foreach ($penghargaan as $dt): ?>
									<?php if ($dt): ?>
										<li><span style="text-transform: capitalize;"><?= $dt->kegiatan ?></span></li>
									<?php else: ?>
										<p class="italic">Tidak ada</p>
									<?php endif ?>
								<?php endforeach ?>
							</ol>
						</p>
					</td>
				</tr>


				<tr>
					<td>
						PELATIHAN/SEMINAR/WORKSHOP <br>
						<span class="italic">TRAINING/SEMINAR/WORKSHOP</span>
					</td>
				</tr>
				<tr>
					<td class="brown">
						<p>
							<ol class="prestasi">
								<?php foreach ($pelatihan as $dt): ?>
									<?php if ($dt): ?>
										<li><span style="text-transform: capitalize;"><?= $dt->nama_kegiatan ?></span></li>
									<?php else: ?>
										<p class="italic">Tidak ada</p>
									<?php endif ?>
								<?php endforeach ?>
							</ol>
						</p>
					</td>
				</tr>

				<tr>
					<td>
						KEIKUTSERTAAN DALAM ORGANISASI <br>
						<span class="italic">Experiences in Organization</span>
					</td>
				</tr>
				<tr>
					<td class="brown">
						<p>
							<ol class="prestasi">
								<?php foreach ($organisasi as $dt): ?>
									<?php if ($dt): ?>
										<li><span style="text-transform: capitalize;"><?= $dt->nama_organisasi ?></span></li>
									<?php else: ?>
										<p class="italic">Tidak ada</p>
									<?php endif ?>
								<?php endforeach ?>
							</ol>
						</p>
					</td>
				</tr>

				<tr>
					<td>
						SERTIFIKAT KEAHLIAN <br>
						<span class="italic">Certificate</span>
					</td>
				</tr>
				<tr>
					<td class="brown">
						<p>
							<ol class="prestasi">
								<?php foreach ($keahlian as $dt): ?>
									<?php if ($dt): ?>
										<li><span style="text-transform: capitalize;"><?= $dt->nama_keahlian ?></span></li>
									<?php else: ?>
										<p class="italic">Tidak ada</p>
									<?php endif ?>
								<?php endforeach ?>
							</ol>
						</p>
					</td>
				</tr>

				<tr>
					<td>
						KERJA PRAKTEK/MAGANG <br>
						<span class="italic">Apprenticeship</span>
					</td>
				</tr>
				<tr>
					<td class="brown">
						<p>
							<ol class="prestasi">
								<?php foreach ($magang as $dt): ?>
									<?php if ($dt): ?>
										<li><span style="text-transform: capitalize;"><?= $dt->nama_lokasi ?></span></li>
									<?php else: ?>
										<p class="italic">Tidak ada</p>
									<?php endif ?>
								<?php endforeach ?>
							</ol>
						</p>
					</td>
				</tr>

				<tr>
					<td>
						Skripsi <br>
						<span class="italic">Undergraduate Thesis</span>
					</td>
				</tr>
				<tr>
					<td class="brown">
						<p><span style="text-transform: capitalize;"><?= $data_skpi->judul ?></span></p>
					</td>
				</tr>

				<tr>
					<td>
						Catatan <br>
					</td>
				</tr>
				<tr>
					<td>
						<ol style="margin-left: -25px; margin-bottom: -2px;" class="text-justify">
							<li><b>Program-program tersebut di atas terdiri atas kegiatan untuk mengembangkan soft skills masing-masing mahasiswa. Daftar kegiatan ko-kurikuler dan ekstra-kurikuler yang diikuti oleh pemegang SKPI ini terlampir.</b></li>
							<li><b>Lulusan bertanggung jawab sepenuhnya atas semua informasi yang disampaikan pada Lampiran SKPI. </b></li>
						</ol>
					</td>
				</tr>

			</table>
			<hr style="color: #f0f0f0;" width="95%" align="left">
			<br>

			<!-- 4 -->
			<b>04. INFORMASI TENTANG KUALIFIKASI DAN HASIL YANG DICAPAI</b>
			<p class="italic bhs_ingrris2">04. Information of the Qualification and Outcomes Obtained</p>

			<div class="hasil">
				<p><b>A. CAPAIAN PEMBELAJARAN</b></p>
				<ol>
					<li>KETERAMPILAN UMUM</li>
					<li>KETERAMPILAN KHUSUS</li>
				</ol>

				<p><b>B. PROFILE LULUSAN </b></p>
				<?php if ($nama_prodi === 'pendidikan bahasa inggris'): ?>
					<ol>
						<li>Pendidik Bahasa Inggris</li>
						<li>Praktisi Bidang Pendidikan</li>
						<li>Wirausahawan</li>
					</ol>
				<?php elseif($nama_prodi === 'pendidikan teknologi informasi'): ?>
				    <ol>
				        <li>	<p><b>PENDIDIK</b>  Menjadi pendidik yang berwawasan global dan berakhlaqul karimah dibidang pendidikan teknologi informasi.</p></li>
					    <li><p><b>Asisten Peneliti</b> Menjadi asisten peneliti yang berwawasan global dan berakhlaqul karimah dibidang pendidikan teknologi informasi.</p></li>
					    <li><p><b>Tenaga Profesional Bidang Teknologi Informasi</b> Menjadi Tenaga profesional yang berdaya saing global dan berakhlaqul karimah dalam bidang pendidikan teknologi informasi.</p></li>
					  </ol>
				<?php elseif($nama_prodi === 'Pendidikan Masyarakat'): ?>
					<p>Belum ada profil</p>
				<?php elseif($nama_prodi === 'Pendidikan Guru Pendidikan Anak Usia Dini'): ?>
					<p>Belum ada profil</p>
				<?php elseif($nama_prodi === 'administrasi pendidikan'): ?>
					<ol>
					    <li>TENAGA KEPENDIDIKAN</li>
					    <li>PENGELOLA PENDIDIKAN</li>
					    <li>ETREPRENEUR BIDANG PENDIDIKAN</li>
					    <li>TENAGA PENDIDIK</li>
					</ol>
				<?php endif ?>
			</div>
		</div>

		<p style="margin-left: 430px; margin-top: 50px">Kendari, <?= tanggal_indo(date('Y-m-d')) ?></p>
			<p style="margin-left: 430px"><b>Dekan FKIP</b></p>
			<p style="margin-top: 70px; margin-left: 430px"></p>
			<p style=" margin-left: 430px; border-bottom: 1px solid #000; width: 220px"><b><?= $konfigurasi->nama_dekan ?></b></p>
			<p style="margin-left: 430px; margin-top: -15px;" ><b>NIDN. 0907068602</b></p>
<script type="text/javascript">window.onload = function() { window.print(); }</script>
	</body>
</html>