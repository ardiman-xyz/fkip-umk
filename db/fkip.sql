-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 20, 2023 at 01:25 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fkip`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm_akademik`
--

CREATE TABLE `adm_akademik` (
  `id` int(11) NOT NULL,
  `kurikulum` varchar(255) NOT NULL,
  `kalender_akademik` varchar(255) NOT NULL,
  `jadwal_kuliah_genap` varchar(255) NOT NULL,
  `jadwal_kuliah_ganjil` varchar(255) NOT NULL,
  `akreditasi` varchar(255) NOT NULL,
  `ket_kurikulum` text NOT NULL,
  `ket_kalender_akademik` text NOT NULL,
  `ket_jadwal_kuliah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adm_akademik`
--

INSERT INTO `adm_akademik` (`id`, `kurikulum`, `kalender_akademik`, `jadwal_kuliah_genap`, `jadwal_kuliah_ganjil`, `akreditasi`, `ket_kurikulum`, `ket_kalender_akademik`, `ket_jadwal_kuliah`) VALUES
(1, '952f7eb1a947a68fc352c948fcc82131.png', '6c6c5fd4974b052826309c5e543e9a7b.pdf', '60bc3f552937aed32b09b1cfaf0b32a3.pdf', '155542e77a46e43724a7fff80efe5f92.pdf', 'bf653be12090ce87077168e8a721d394.pdf', ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets', ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets ok', ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets ok');

-- --------------------------------------------------------

--
-- Table structure for table `adm_beranda`
--

CREATE TABLE `adm_beranda` (
  `id` int(11) NOT NULL,
  `jenis` enum('Berita','Pengumuman') NOT NULL,
  `slug` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `penulis` varchar(15) NOT NULL,
  `date_created` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adm_beranda`
--

INSERT INTO `adm_beranda` (`id`, `jenis`, `slug`, `judul`, `isi`, `gambar`, `penulis`, `date_created`) VALUES
(2, 'Berita', 'ini-adalah-judul-berita', 'Ini adalah judul berita', '<p>Universitas Muhammadiyah Kendari terus memacu mahasiswanya untuk menjadi lulusan yang kreatif dan inovatif, salah satunya dengan mengadakan &nbsp;Program Kreatifitas Mahasiswa (PKM). Untuk menunjang kegiatan tersebut, UMK terus berupaya menggali potensi dari mahasiswa-mahasiswanya dengan&nbsp;Workshop Penulisan&nbsp;Proposal Program Kreatifitas Mahasiswa&nbsp;2017, Selasa (21/11).</p>\r\n<p>Pelatihan ini&nbsp;merupakan upaya UMK &nbsp;untuk&nbsp;mengasah teknik penulisan mahasiswa&nbsp;agar jumlah PKM yang tembus di&nbsp;tahun ini lebih banyak daripada tahun&nbsp;sebelumnya. Mahasiswa sendiri&nbsp;memberikan respon positif dwngan diadakannya kegiatan ini, terhitung lebih dari 50 orang yang mengikuti workshop penulisan proposal kali ini.</p>\r\n<p>Salah satu pemateri kegiatan Ary Tamtama, S.Pi. &nbsp;menjelaskan, mengapa mahasiwa perlu membuat PKM, karena PKM melatih mahasiswa untuk menuangkan ide kreatif dan briliannya untuk pengembangan kualitas diri mahasiswa dalam menulis karya ilmiah, yang akan bermanfaat pada saat penyusunan skripsi.</p>', 'c65dc2d2bfe04c04a83581ccc48aeda0.png', 'admin', '12 06 2020'),
(3, 'Pengumuman', 'ini-adalah-judul-pengumuman', 'Ini adalah judul pengumuman', '<p>Assalamu \'alaikum Mahasiswa/i Lingkup FKIP yang kami Banggakan<br /><br />Kami meminta kesediaan untuk dapat mengisi angket terkait perkuliahan online yang dilakukan selama wabah Covid-19 melanda Bumi anoa kita tercinta.<br />Kami berharap dengan mengisi angket ini pihak FKIP dapat bijaksana mengambil keputusan terkait perkuliahan online yang akan berlangsing hingga tanggal 31 April 2020.<br /><br />Mohon mengisi link dibawah ini</p>', 'b6edc5cda67a63367da6e29666161c23.jpeg', 'admin', '12 06 2020');

-- --------------------------------------------------------

--
-- Table structure for table `adm_fasilitas`
--

CREATE TABLE `adm_fasilitas` (
  `id` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adm_fasilitas`
--

INSERT INTO `adm_fasilitas` (`id`, `deskripsi`, `foto`, `date_created`) VALUES
(5, ' is simply dummy text of the printing ', '3c838356bf4788248c276cdc1f9e5680.jpg', '2020-06-11 09:00:58'),
(6, ' is simply dummy text of the printing ', 'f4b7f9ebaee225df0a410273e9077a0a.jpeg', '2020-06-11 09:01:04'),
(7, 'is simply dummy text of the printing', '9d7142bc61aa68cca752206ba29ddd43.jpg', '2020-06-11 13:23:23'),
(8, 'is simply dummy text of the printing', 'b7cdfd6852ee8ad63e37a0923afbbcb7.png', '2020-06-11 13:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `adm_gallery`
--

CREATE TABLE `adm_gallery` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `posisi_foto` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('Publish','No Publish') NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adm_gallery`
--

INSERT INTO `adm_gallery` (`id`, `judul`, `posisi_foto`, `foto`, `status`, `ket`) VALUES
(19, 'Slider', 'Slider', '82d4a84c25b05a09c38e4ea56dff5707.jpg', 'Publish', 'rapat'),
(20, 'slider 2', 'Slider', '771c925b44b40e6273ff38573baae39b.jpeg', 'Publish', 'slider 2'),
(21, 'slider 3', 'Slider', '7765260db1c90b462432426c77ed4e97.jpg', 'Publish', 'slider 3');

-- --------------------------------------------------------

--
-- Table structure for table `adm_profil`
--

CREATE TABLE `adm_profil` (
  `id` int(11) NOT NULL,
  `sambutan` text NOT NULL,
  `visi_misi` text NOT NULL,
  `kompetensi_lulusan` text NOT NULL,
  `struktur_organisasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adm_profil`
--

INSERT INTO `adm_profil` (`id`, `sambutan`, `visi_misi`, `kompetensi_lulusan`, `struktur_organisasi`) VALUES
(1, '<p><em><strong>Assalamu&rsquo;alaikum wr wb</strong></em></p>\r\n<p style=\"text-align: justify;\">Segala puji dan syukur kami panjatkan kehadirat&nbsp;<em>Allah Subhanahu Wa Ta&rsquo;ala</em>&nbsp;yang telah melimpahkan rahmat dan hidayahnya. Shalawat serta salam semoga tercurah kepada&nbsp;<em>Rasulullah Shalallahu &lsquo;Alaihi Wassalam</em>&nbsp;beserta keluarga, sahabat dan seluruh pengikut setia beliau sampai akhir zaman. Alhamdullilah dengan izin, dan kasih sayang-Nya, akhirnya kami dapat menampilkan&nbsp; w<em>ebsite</em> yang merupakan salah satu media komunikasi dan informasi yang berkaitan dengan Program Studi Administrasi Pendidikan Universitas Muhammadiyah Kendari.</p>\r\n<p style=\"text-align: justify;\">Program Studi Administrasi Pendidikan memiliki berbagai program kerja yang berkaitan dengan Tri Dharma Perguruan Tinggi yaitu Pendidikan, Penelitian dan Pengabdian masyarakat. Semoga <em>website</em> ini&nbsp; dapat memberikan informasi yang dibutuhkan oleh dosen, mahasiswa dan masyarakat umum yang berkaitan dengan&nbsp; Program Studi Administrasi Pendidikan .</p>\r\n<p style=\"text-align: justify;\">Akhir kata, kami menyampaikan terima kasih dan penghargaan yang setinggi-tingginya kepada semua pihak yang telah membesarkan dan mengembangkan Program Studi Administrasi Pendidikan. Semoga <em>Allah Subhanahu Wa Ta&rsquo;ala</em>&nbsp;senantiasa meridhoi amal ibadah kita, Aamiin.</p>\r\n<p style=\"text-align: justify;\"><em><strong>Wassalamu&rsquo;alaikum wr wb</strong></em></p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: right;\">Kendari, 14 juni 2020</p>\r\n<p style=\"text-align: right;\">Kaprodi Administrasi Pendidikan,</p>\r\n<p style=\"text-align: right;\">&nbsp;</p>\r\n<p style=\"text-align: right;\">&nbsp;</p>\r\n<p style=\"text-align: right;\"><strong>Junaidin, S.Pd., M.Pd.</strong></p>\r\n<p style=\"text-align: right;\">NIDN : 0910128502</p>', '<p class=\"western\" lang=\"id-ID\" align=\"justify\"><strong><span lang=\"en-US\">VISI</span></strong></p>\r\n<p class=\"western\" lang=\"id-ID\" align=\"justify\">Pada tahun 2020 menjadi program studi yang unggul di wilayah Indonesia Timur dalam bidang administrasi pendidikan yang profesional, berkarakter, mandiri, dan berakhlak mulia.</p>\r\n<p class=\"western\" lang=\"id-ID\" align=\"justify\"><strong><span lang=\"en-US\">MISI</span></strong></p>\r\n<ol>\r\n<li>\r\n<p class=\"western\" lang=\"id-ID\" align=\"justify\">Menyelenggarakan pendidikan dan pengajaran yang bermutu untuk menghasilakan lulusan yang unggul dan kompetitif</p>\r\n</li>\r\n<li>\r\n<p class=\"western\" lang=\"id-ID\" align=\"justify\">Mengembangkan dan menyelenggarakan penelitian ilmu pendidikan dengan memamnfaatkan aplikasi teknologi informasi</p>\r\n</li>\r\n<li>\r\n<p class=\"western\" lang=\"id-ID\" align=\"justify\">Melakusanakan kegiatan pengabdian kepada masyarkaan sebagai salah satu proses pemantapan ilmu utuk masyarakat khususnya yang berkaitan dengan bidang pendidikan</p>\r\n</li>\r\n<li>\r\n<p class=\"western\" lang=\"id-ID\" align=\"justify\">Mengintegrasikan nilai-nilai islam dan kemuhammadiyaan dalam ilmu pengetahuan dan teknologi, menuju keluhuran budi dan akhlaqul karimah</p>\r\n</li>\r\n</ol>\r\n<p class=\"western\" lang=\"id-ID\" align=\"justify\"><strong><span lang=\"en-US\">TUJUAN</span></strong></p>\r\n<p class=\"western\" lang=\"id-ID\" align=\"justify\">Tujuan Progarm studi administrasi pendidikan FKIP UMK adalah:</p>\r\n<ol>\r\n<li>\r\n<p class=\"western\" lang=\"id-ID\" align=\"justify\">Menghasilakan lulusan yang profesional dalam bidang administrasi pendidikan</p>\r\n</li>\r\n<li>\r\n<p class=\"western\" lang=\"id-ID\" align=\"justify\">Menghasilkan penelitian dan inovasi dalam bidang administrasi pendidikan</p>\r\n</li>\r\n<li>\r\n<p class=\"western\" lang=\"id-ID\" align=\"justify\">Menghasilkan pengabdian kepada masyarakat yang mampu merespon perkembangan ilmu pengetahuan dan teknologi serta dapat malakukan upaya pembaharuan dalam pemberdayaan masyarakat dibidang administrasi pendidikan</p>\r\n</li>\r\n<li>\r\n<p class=\"western\" lang=\"id-ID\" align=\"justify\">Menghasilkan lulusan yang beriman dan bertaqwa serta berahlaqul karimah dan berwawasan kemuhammadiyahan.</p>\r\n</li>\r\n</ol>', '<p>sdfasdasdasdad ok</p>', 'struktur_organisasi_prodi1.png');

-- --------------------------------------------------------

--
-- Table structure for table `adm_repository`
--

CREATE TABLE `adm_repository` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adm_repository`
--

INSERT INTO `adm_repository` (`id`, `type`, `nama_file`, `file`) VALUES
(8, 's1', 'BKD 2018_2019', 'RENSTRA_PRODI.pdf'),
(9, 'tipe2', '1. Struktur Organisasi UMK', '1__Struktur_Organisasi_UMK.pdf'),
(10, 's2', '2. SK PWM 2015-2019', '2__SK_PWM_2015-2019.pdf'),
(11, 's2', '3. SK Pengurus BPH', '3__SK_Pengurus_BPH.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `album` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `album`, `slug`) VALUES
(1, 'slider', 'slider'),
(2, 'visitasi prodi ADM', 'visitasi-prodi-adm'),
(3, 'webinar fkip', 'webinar-fkip'),
(4, 'akreditasi PTI', 'akreditasi-pti');

-- --------------------------------------------------------

--
-- Table structure for table `anggota_pemb_seminar`
--

CREATE TABLE `anggota_pemb_seminar` (
  `id_anggota` int(11) NOT NULL,
  `id_surat_seminar` varchar(100) NOT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `status_penguji_tamu` enum('N','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota_pemb_seminar`
--

INSERT INTO `anggota_pemb_seminar` (`id_anggota`, `id_surat_seminar`, `nama_anggota`, `status_penguji_tamu`) VALUES
(41, '62c26729-e6d1-43b5-994d-0700dba9a9c4', 'Tri indah rusli., S.Pd., M.Pd', 'N'),
(42, '62c26729-e6d1-43b5-994d-0700dba9a9c4', 'Darma., S.Pd., M.Pd', 'N'),
(44, '77a5620b-7593-484e-a0a3-c028d3c55ff1', 'ardian', 'N'),
(45, '77a5620b-7593-484e-a0a3-c028d3c55ff1', 'Risal jibran', 'N'),
(46, 'bb60dc20-4091-4498-84ca-818975e1d23c', 'tri indah rusli', 'N'),
(47, 'bb60dc20-4091-4498-84ca-818975e1d23c', 'ardiman', 'N'),
(48, '005a82b4-9672-4b63-8de1-079657394730', 'Junaidin, S.Pd, M.Pd', 'N'),
(49, '005a82b4-9672-4b63-8de1-079657394730', 'Nurul Idhayani, S.Pd, M.Pd', 'N'),
(50, '005a82b4-9672-4b63-8de1-079657394730', 'Nur Rizky Alfiany Suaib, S.S., M.Hum', 'N'),
(51, '4da1b580-8271-42a8-91b7-3dd66545e81a', 'Tri Indah Rusli, S.Pd, M.Pd', 'N'),
(53, '3349f034-7d69-4442-9700-4a51a1c5d02f', 'Rahmat Nasrullah, S.Pd, M.Hum', 'Y'),
(58, '06ac7316-caf1-4bff-8bb1-954d6fcde950', 'Titin Rahmiatin, S.Pd, M.Pd', 'Y'),
(59, '06ac7316-caf1-4bff-8bb1-954d6fcde950', 'Hasmira Said, Dra., M.Pd', 'N'),
(60, '4701964e-9518-416a-8ed7-9e2aecd0efc4', 'Tri Indah Rusli, S.Pd, M.Pd', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori_berita` int(11) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `status_berita` varchar(30) NOT NULL,
  `jenis_berita` varchar(30) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `view_berita` int(11) NOT NULL DEFAULT 0,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_user`, `id_kategori_berita`, `slug_berita`, `judul`, `isi`, `status_berita`, `jenis_berita`, `gambar`, `view_berita`, `tanggal`) VALUES
(20, 1, 1, '19-pelatihan-pengelolaan-website-tenaga-kependidikan-umk', 'PELATIHAN PENGELOLAAN WEBSITE TENAGA KEPENDIDIKAN UMK', '<p>Rabu (24-01-2018) dalam rangka meningkatkan&nbsp;&nbsp;pengelolaan teknologi,komunikasi dan informasi, Universitas Muhammadiyah Kendari&nbsp;&nbsp;(UMK) kembali mengadakan Pelatihan Pengelolaan website yang melibatkan Tenaga Kependidikan dari&nbsp;&nbsp;setiap lembaga, Unit dan program studi (prodi), untuk menunjang&nbsp;&nbsp;kemampuan penulian berita dari setiap pengelola websitenya.</p>\r\n<p>Materi yang disajikan dalam pelatihan kali ini pun beragam, mulai dari tekhnik penulisan berita, pembuatan konten dalam website, dan tekhnik pengelolaannya. Selain itu pelatihan ini dimaksudkan untuk meningkatka&nbsp;<em>knowledge&nbsp;</em>dan skill dalam petdiaan informasi. Hal ini ditengarai bahwa website suatu institusi&nbsp; sebagai tolak ukur kualitas dari sebuah institusi.</p>\r\n<p>Hal ini pula dilakukan dikarenakan website Perguruan Tinggi menjadi&nbsp;&nbsp;salah satu informasi yang bisa diakses dimana dan kapan saja dan keberadaan website sangat berkepentingan bagi masyarkaat yang ingin mendapat informasi yang ada di lingkungan UMK.</p>\r\n<p>Selain itu, kegiatan ini pula dilakukan untuk mencapai dimensi keunggulan yang terus dilakukan oleh UMK, yaitu untuk mewujudkan poin ketiga dari lima pilar keunggulan ABCD UMK, yakni Keunggulan&nbsp;<em>computer skill</em>&nbsp;(keterampilan menggunakan komputer).</p>', 'publish', 'utama', 'UMKENDARI37.jpg', 19, '2019-12-03'),
(21, 1, 6, '21-fkip-umk-gelar-expo-pendidikan', 'FKIP UMK GELAR EXPO PENDIDIKAN', '<p>Expo Pendidikan kembali diselenggarakan oleh Fakultas Keguruan dan Ilmu Pendidikan Universitas Muhammadiyah Kendari (FKIP UMK) yang dilaksanakan pada 15-18 Januari 2018, dalam kegiatan Expo Pendidikan kali ini, FKIP turut pula menyelenggarakan perlombaan ditingkat&nbsp;&nbsp;Taman Kanak-Kanak hingga&nbsp;&nbsp;tingkat Sekolah Menengah Atas, diantaranya lomba tari tradisional, lomba senam anak sholeh, kontes literasi matematika hingga turnamen futsal Dekan Cup FKIP UMK.</p>\r\n<p>Dalam pagelaran kegiatan Expo Pendidikan 2018, disertai pula dengana&nbsp;<em>launching&nbsp;</em>Prodi Pendidikan Teknologi&nbsp;&nbsp;Informasi yang diresmikan oleh Rektor UMK Muhammad Nur, S.P., M.Si., Dekan FKIP UMK Awaluddin, S.Pd, M.Pd., dan Kepala Dinas (Kadis) Pendidikan Kepemudaan dan Olahraga Kota Kendari Dra. Sartini Sarita, M.Pd.</p>\r\n<p>Sartina sendiri mengapresisasi kegiatan yang diadakan oleh FKIP UMK, selain menumbuhkan jiwa berkompetisi didalam perlombaan yang diadakan, diharapkan pula dengan hadirnya program studi Teknologi Informasi didalam tubuh FKIP, kedepannya UMK dapat menghasilkan mahasiswa dan mahasiswi yang memiliki kontribusi pada perkembangan Kota Kendari. Selain kedua kegaiatan tersebut, diadakan pula Seminar Pendidikan sebagai bagian dari kegiatan Expo Pendidikan 2018.</p>', 'publish', 'utama', 'UMKENDARI38.jpg', 12, '2019-12-03'),
(22, 1, 6, '22-umk-dorong-mahasiswa-ikut-pkm', 'UMK DORONG MAHASISWA IKUT PKM', '<p>Universitas Muhammadiyah Kendari terus memacu mahasiswanya untuk menjadi lulusan yang kreatif dan inovatif, salah satunya dengan mengadakan &nbsp;Program Kreatifitas Mahasiswa (PKM). Untuk menunjang kegiatan tersebut, UMK terus berupaya menggali potensi dari mahasiswa-mahasiswanya dengan&nbsp;Workshop Penulisan&nbsp;Proposal Program Kreatifitas Mahasiswa&nbsp;2017, Selasa (21/11).</p>\r\n<p>Pelatihan ini&nbsp;merupakan upaya UMK &nbsp;untuk&nbsp;mengasah teknik penulisan mahasiswa&nbsp;agar jumlah PKM yang tembus di&nbsp;tahun ini lebih banyak daripada tahun&nbsp;sebelumnya. Mahasiswa sendiri&nbsp;memberikan respon positif dwngan diadakannya kegiatan ini, terhitung lebih dari 50 orang yang mengikuti workshop penulisan proposal kali ini.</p>\r\n<p>Salah satu pemateri kegiatan Ary Tamtama, S.Pi. &nbsp;menjelaskan, mengapa mahasiwa perlu membuat PKM, karena PKM melatih mahasiswa untuk menuangkan ide kreatif dan briliannya untuk pengembangan kualitas diri mahasiswa dalam menulis karya ilmiah, yang akan bermanfaat pada saat penyusunan skripsi.</p>\r\n<p>Selain itu PKM merupakan program Kemenristek bidang kemahasiswaan, yang bertujuan untuk menyiapkan mahasiswa lebih siap nantinya menghadapi dunia kerja, karena sudah dapat merancang sebuah kegiatan secara mandiri maupun kelompok, jelasnya.</p>\r\n<p>Wakil Rektor III UMK Ir. Bambang Indro Yuwono,M.Si &nbsp;juga menarangkan kepada peserta kegiatan untuk berusaha membuat proposal PKM semaksimal mungkin,sebagai pembuktian diri dan niat untuk membanggakan almamater, jelasnya sekaligus membuka kegitan Workshop Penulisan Proposal Program Kreatifitas Mahasiswa UMK tahun 2017.</p>', 'publish', 'utama', 'UMKENDARI39.jpg', 69, '2019-12-03'),
(23, 1, 6, '23-bi-corner-hadir-di-umk', 'BI CORNER HADIR DI UMK', '<p>Saat &nbsp;ini perpustakaan UMK terasa lebih lengkap, informasi &nbsp;&nbsp;kebanksentralan baik terbitan dalam negeri maupun luar negeri bisa diakses dengan mudah. Terlebih lagi informasi kekinian mengenai tugas, peran, dan kebijakan BI (Bank Indonesia) sebagai Bank sentral. Kesemuanya tersaji di fasilitas pojok baca BI Corner yang telah resmi dibuka di Gedung Perpustakaan UMK lantai tiga, Senin (20/1/017).</p>\r\n<p>Dihadiri oleh Rektor UMK dan jajaran pimpinan UMK, fasilitas baru UMK&nbsp; tersebut diresmikan langsung oleh Kepala Perwakilan Bank Indonesia Sulawesi Tenggara, Minot Purwahono. Dalam sambutannya, Minot menerangkan bahwa tujuan dari BI Corner adalah untuk melakukan sharing atau publikasi seluruh hasil kajian penelitian dan membangun sinergi kolaborasi dalam rangka memberikan informasi tentang kebijakan-kebijakan dari Bank Indonesia.</p>\r\n<p>Hal ini perlu kami lakukan, karena pihak akademisi perguruan tinggi terutama UMK, merupakan mitra strategis dari BI. Hal ini diharapkan untuk memberikan pemahaman yang benar tentang kebijakan-kebijakan yang benar bagi BI, terangnya.</p>\r\n<p>Rektor UMK Muhammad Nur,S.P.,M.Si mengapresiasi dengan hadirnya BI Corner di UMK, dapat menjadi magnet tersediri bagi mahasiswa dan dosen untuk mengunjungi perpustakan UMK, hal ini juga menjadi kepentingan internal mengingat jumlah kunjungan dosen dan mahasiswa akan berdampak pada citra Universitas terutama dalam perbaikan akreditasi, baik peningkatan akreditasi Program Studi maupun akreditasi Institusi, ungkap Muhammad Nur.</p>\r\n<p>Selain peresmian dari BI Corner, dalam kesempatan ini Bank Indonesia turut pula membawakan materi pada Kuliah Umum yang mengangkat tema Tantangan dan Peluang Mendorong Sumber Pertumbuhan Ekonomi Sulawesi Tenggara, yang dihadiri oleh dosen dan mahasiswa-mahasiswi UMK.</p>\r\n<p>&nbsp;</p>', 'publish', '', 'UMKENDARI.jpg', 142, '2019-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `bimbingan_mhs`
--

CREATE TABLE `bimbingan_mhs` (
  `id` int(11) NOT NULL,
  `nama_mhs` varchar(100) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `id_pembimbing1` varchar(100) NOT NULL DEFAULT '',
  `id_pembimbing2` varchar(50) DEFAULT NULL,
  `id_prodi` int(50) NOT NULL,
  `judul` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tgl_insert` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('Diterima','Pending','Ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bimbingan_mhs`
--

INSERT INTO `bimbingan_mhs` (`id`, `nama_mhs`, `nim`, `id_pembimbing1`, `id_pembimbing2`, `id_prodi`, `judul`, `foto`, `tgl_insert`, `status`) VALUES
(13, 'Reni Febriani', '21711012', '0907099101', '0927068604', 9, 'membuat media pembelajaran berbasis web', '6eb24c0f519424a5cc085aaaf0a93197.jpeg', '2020-05-04 08:52:21', 'Diterima'),
(15, 'Putra panca prasetyo', '21711160', '0921096401', '0907099101', 9, 'Membuat aplikasi web pendaftaran mahasiswa menggunakan framework laravel 7 dan boosrtap v.4', 'e43a088b51405ab17e825a0217d102a5.jpg', '2020-05-06 08:25:36', 'Diterima'),
(21, 'UCI LESTARI', '031904160', '0910128502', '0927068604', 9, 'membangun sistem penawaran manul di fkip umkendari', '443d2f5d8dbf066f3d6e5697cc5baa18.png', '2020-08-19 19:20:26', 'Diterima'),
(29, 'ardiman', '21711170', '0910128502', '0907068602', 9, 'asds', 'transkrip.jpeg', '2021-02-18 12:18:03', 'Pending'),
(31, 'Mega ilfiana', '21511041', '0910128502', '0916108703', 4, 'asdsa', '28b7a09e4017d06dcfb435f6bb059321.jpeg', '2021-02-23 18:44:41', 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `config_rab`
--

CREATE TABLE `config_rab` (
  `id_config` int(11) NOT NULL,
  `pembayaran_mhs` int(11) NOT NULL,
  `pembayaran_mhs_skripsi` int(11) NOT NULL,
  `kas_prodi` int(11) NOT NULL,
  `kas_fkip` int(11) NOT NULL,
  `kas_universitas` int(11) NOT NULL,
  `insentif_ketua_penguji` int(11) NOT NULL,
  `insentif_sekretaris_penguji` int(11) NOT NULL,
  `insentif_anggota_penguji` int(11) NOT NULL,
  `insentif_pengelola` int(11) NOT NULL,
  `konsumsi_penguji` int(11) NOT NULL,
  `konsumsi_pengelola` int(11) NOT NULL,
  `transportasi` int(11) NOT NULL,
  `petugas_kebersihan` int(11) NOT NULL,
  `insentif_pemb1` int(11) NOT NULL,
  `insentif_pemb2` int(11) NOT NULL,
  `ka_prodi` int(11) NOT NULL,
  `staff_keuangan` int(11) NOT NULL,
  `staff_administrasi` int(11) NOT NULL,
  `staff_fakultas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config_rab`
--

INSERT INTO `config_rab` (`id_config`, `pembayaran_mhs`, `pembayaran_mhs_skripsi`, `kas_prodi`, `kas_fkip`, `kas_universitas`, `insentif_ketua_penguji`, `insentif_sekretaris_penguji`, `insentif_anggota_penguji`, `insentif_pengelola`, `konsumsi_penguji`, `konsumsi_pengelola`, `transportasi`, `petugas_kebersihan`, `insentif_pemb1`, `insentif_pemb2`, `ka_prodi`, `staff_keuangan`, `staff_administrasi`, `staff_fakultas`) VALUES
(1, 700000, 1250000, 10000, 15000, 28000, 100000, 90000, 85000, 105000, 30000, 30000, 30000, 10000, 300000, 250000, 35000, 30000, 30000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_magang`
--

CREATE TABLE `daftar_magang` (
  `id` varchar(100) NOT NULL,
  `id_sekolah` int(11) NOT NULL DEFAULT 0,
  `id_prodi` int(11) NOT NULL DEFAULT 0,
  `nim` varchar(40) NOT NULL,
  `nama` varchar(100) NOT NULL DEFAULT '0',
  `program` varchar(50) NOT NULL DEFAULT '0',
  `formulir` varchar(100) NOT NULL,
  `bukti_bayar` varchar(100) NOT NULL,
  `tgl_insert` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_magang`
--

INSERT INTO `daftar_magang` (`id`, `id_sekolah`, `id_prodi`, `nim`, `nama`, `program`, `formulir`, `bukti_bayar`, `tgl_insert`) VALUES
('2d7307ac-1385-4d64-b4fb-78d44c28c7ca', 9, 9, '21711170', 'ardiman', 'plp', 'c94f198ac51a1acda960bd033450512b.pdf', 'a01f6f365e2427cb6e933e050c11a295.pdf', '2020-02-14 13:05:31'),
('9e7887ae-34dc-4289-bd0b-f8f022c8630f', 12, 9, '217101212', 'Rani Sapsuha', 'magang', '65c6e9c79e6ea40647dfda8e190e5451.pdf', '1fd4c2414dbf3d76e886e4c567ff4a79.pdf', '2020-02-14 16:35:50'),
('28f2addd-7b3c-45e5-be95-7a77ed5301de', 9, 9, '21711172', 'ardian', 'plp', '34ccc3758f603dec5a9e96af116d8c08.pdf', 'fd9153159f7954b53c0485b5509d4f90.pdf', '2020-02-16 13:38:38'),
('415fd5b6-8045-4a24-943a-aa4a5e4e5583', 10, 3, '21610112', 'juwar', 'plp', 'c699ad5446532ed6cc73ce60d305a893.pdf', 'da048877e038b362aa15602e13dee07d.pdf', '2020-04-21 13:42:32'),
('777daf2f-69c6-4eaa-b268-c0be17f41b1d', 9, 9, '21711011', 'Basrin', 'plp', '50d66e5bc297834b246ffc4e91264a17.pdf', '4d2a460a4e233a4b2c6580d6d03c0d43.pdf', '2020-06-09 03:31:03'),
('9fa2d97f-25ac-4464-b7fb-1e33fd79cc3f', 2, 3, '21711170', 'ardiman', 'plp', '235ff1082cabd86936783e8332726b5a.pdf', 'f9802f12e8ada87e61ba2a2556c24194.pdf', '2020-06-18 13:47:46'),
('87a6d23e-d60c-4026-96fa-1aa65f6e92a2', 9, 3, '21711170', 'ardiman', 'plp', 'IMG-20191211-WA0028.jpg', '43e98d64a5448b92b6599eaf17048a62.pdf', '2020-06-18 14:06:34'),
('4a185c01-214c-48c5-97a3-c33f914f737f', 9, 3, '21711170', 'ardiman', 'plp', '47f5a65fe1be72353a9325a3d1f14132.pdf', '09110a2337a37502923e5054ce2cdc07.pdf', '2020-06-18 14:10:09'),
('cf8e1809-2be5-4e3e-b146-ef5eeb5e239a', 9, 3, '21711170', 'ardiman', 'magang', '88dafa96bcd2b1aa65066317981c8934.pdf', '85953f06cdb7beeca1a0a26a11e2c2df.pdf', '2020-06-18 14:14:51'),
('403847f8-c056-4ae1-a57f-309c1b4782a2', 9, 4, '21711170', 'ardiman', 'plp', 'fd069575f27e6367967ff2e0fdbd06ca.pdf', 'cd0f6ddb4957ef7dd817ad2ff651e74f.pdf', '2020-06-18 14:15:54'),
('69d3cfa9-aa68-4cbb-957c-c1386b6a8834', 9, 4, '21711170', 'ardiman', 'plp', '4bc71d0545b54e126423ddde731541b1.pdf', '665a80bdbf33846e66b530db87fce76f.pdf', '2020-06-18 14:16:46'),
('2b4861ab-7f98-4544-a64c-62f3c8359a52', 9, 3, '21711170', 'ardiman', 'plp', '331853ce9ca96d83c5e0a3da95ef05c7.pdf', 'cb9dd68d4d8da2d4ded5dc2a01ecdce1.pdf', '2020-06-18 14:17:42'),
('44cca2ab-a5fa-409e-9c1f-9cf221cfded9', 2, 3, '21711170', 'ardiman', 'plp', '2a4811f749e10a54fa1593c13363c5c1.pdf', '5587b139fbe8bfc71021df1d7332a9cc.pdf', '2020-06-18 14:19:50'),
('b343a93a-3700-421b-8cbe-ebe841a0b160', 2, 3, '21711170', 'ardiman', 'plp', 'e28006601f389a8c4418fc0223deee8b.pdf', '11e0b1ba088d4d74ce4d0b3745638a74.pdf', '2020-06-18 14:22:33'),
('246cc3aa-2c5c-4e17-8b2f-f8d1ec59f63a', 2, 3, '21711170', 'ardiman', 'plp', 'd422fddaff60f1e7a8034f83fa2d18bb.pdf', 'f36c42f78bd33ea3c5f52c1d3cf08022.pdf', '2020-06-18 14:23:25'),
('dd9b5d83-7cf2-4516-ae04-4e1895ec9efe', 9, 3, '21711170', 'ardiman', 'plp', 'd628f7ba72fb4dbb5c3bdf6bf54acfc3.pdf', '6f45f5ba295bbb12be7940b07fda1b49.pdf', '2020-06-18 14:26:12'),
('1932f76e-b25d-45bd-ad0c-af7d2d9b1aa7', 9, 3, '21711170', 'ardiman', 'plp', '26a8d9add912c128dbad7dd7af8974f1.pdf', '9e0ea168ac5c80263231bf13bd232a5c.pdf', '2020-06-18 14:27:10'),
('df9622b1-706e-49e0-80e9-9b39ef045df0', 9, 3, '21711170', 'ardiman', 'plp', '23ad058bc75d71c05b1baa39c9be0eda.pdf', '6f3c5a0f985113875e74d64586eb0387.pdf', '2020-06-18 14:27:42'),
('50f0da03-5f31-4a39-aaee-4f45af7bedef', 9, 3, '21711170', 'ardiman', 'plp', '240d5c11654efcd1a3b8a515513d6da0.pdf', 'd4138e98a75221cea06098721a706163.pdf', '2020-06-18 14:30:35');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_ujian`
--

CREATE TABLE `daftar_ujian` (
  `id` int(11) NOT NULL,
  `id_jenis_ujian` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(12) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `prodi` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bukti_pembayaran_DU` varchar(255) NOT NULL,
  `bukti_lolos_toefl` varchar(255) NOT NULL,
  `persetujuan_pembimbing` varchar(255) NOT NULL,
  `bukti_btq` varchar(255) NOT NULL,
  `transkrip_nilai` varchar(255) NOT NULL,
  `turnitin` varchar(255) DEFAULT NULL,
  `no_hp` varchar(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `status_pengajuan` enum('Proses','Cair','tidak_cair') NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_ujian`
--

INSERT INTO `daftar_ujian` (`id`, `id_jenis_ujian`, `nama`, `nim`, `semester`, `prodi`, `tgl_bayar`, `bukti_pembayaran_DU`, `bukti_lolos_toefl`, `persetujuan_pembimbing`, `bukti_btq`, `transkrip_nilai`, `turnitin`, `no_hp`, `status`, `status_pengajuan`, `created`) VALUES
(23, 3, 'Putra panca prasetyo', '21711160', '8', 9, '2020-05-06', '4e5ed21c00fb7d335fe5fd5d4d502d52.jpg', '', '1f1d192edca597e225669743daded311.jpg', '60a4fa9d82e4ac0f612f5960f8f04586.jpg', '629dbea7427a8d47280c21d6116ec9ad.jpeg', NULL, '343535354353', 0, 'Cair', '2020-05-06'),
(26, 3, 'UCI LESTARI', '031904160', '7', 9, '2020-08-19', '', '', '', '', '', NULL, '08224568545', 0, 'tidak_cair', '2020-08-19'),
(28, 2, 'Novianti', '21511049', '4', 4, '2021-03-09', '', '', '', '', '', NULL, '43', 0, 'Proses', '2021-02-23'),
(29, 2, 'Mega ilfiana', '21511041', '8', 4, '2021-02-25', '', '', '', '', '', NULL, '345345', 0, 'Proses', '2021-02-23'),
(34, 3, 'Novianti', '21511049', '9', 4, '2021-06-09', '710017158d203afe04ad62c8d83b6252.png', '', '818af5628e2405d6cd5d4114bf3c08fd.png', '3afc04fca7f00cf5d497bd09c2da3c98.png', '169f4b56419dda3b3f40d69d41af15ae.png', 'fab2cd85fc8f4ce6d0b8a9863bcf6638.png', '082393317549', 0, 'Proses', '2021-06-09'),
(42, 3, 'ardiman', '21711170', '8', 9, '2021-08-16', 'd2c9931d2b6b5f96887822211bf8bd87.png', '', 'b9941d63f11fbec0472c8004aa7c0c54.png', '72b9c42ede408747aa74cdd8b90bd347.png', '01fabfa21bc916fe0301b30cd60b1aed.png', '69f08c998dfa0953127ce57d33f076e1.png', '085256580091', 1, 'Proses', '2021-08-16');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `id_prodi` int(11) DEFAULT NULL,
  `nama_dosen` varchar(100) DEFAULT NULL,
  `NIDN` varchar(100) DEFAULT NULL,
  `agama` varchar(100) DEFAULT NULL,
  `email_dosen` varchar(100) DEFAULT NULL,
  `telepon_dosen` varchar(20) DEFAULT NULL,
  `alamat_dosen` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `ttl_dosen` varchar(100) DEFAULT NULL,
  `foto_dosen` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `dibuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `id_prodi`, `nama_dosen`, `NIDN`, `agama`, `email_dosen`, `telepon_dosen`, `alamat_dosen`, `jenis_kelamin`, `status`, `ttl_dosen`, `foto_dosen`, `password`, `token`, `dibuat`) VALUES
(22, 9, 'Junaidin, S.Pd, M.Pd', '0910128502', 'islam', 'juna@gmail.com', '-', '-', 'L', 'Aktif', '2020-08-27', NULL, '67bfef6d9003803d24e6d1cc4a6a9d29e1d25a6f', 'mdUw1QX8eVDWi49RLzHGJTZxMl2oNsrYcavt6kEg', '2020-08-26'),
(23, 8, 'Kabiba, S.Pd, M.Pd', '0927068604', 'islam', '-', '-', '-', 'P', 'Aktif', '', NULL, '84798b207f9c08c274efbf2792e7f9073bbf8e1f', 'VI2CKAQ3S05gyflkoc4XZrjNmB9GRtT78MaJLDPz', '2019-11-27'),
(25, 8, 'Muhammad Alamsah, S.Pd, M.Hum', '0926077902', 'islam', '-', '-', '-', 'L', 'Aktif', '', NULL, '0926077902', NULL, '2019-11-27'),
(26, NULL, 'Mujiati, Dra., M.Si', '0904106903', 'islam', '-', '-', '-', 'P', 'Aktif', '', NULL, '0904106903', NULL, '2019-11-27'),
(27, 8, 'Nasir, S.Pd, M.Pd', '0919068301', 'islam', '-', '-', '-', 'L', 'Aktif', '', NULL, '0919068301', NULL, '2019-11-27'),
(28, NULL, 'Nurzaima, S.Pd, M.Pd', '0908117802', 'islam', '-', '-', '-', 'P', 'Aktif', '', NULL, '0908117802', NULL, '2019-11-27'),
(29, NULL, 'Rahmawati M, S.Pd, M.Pd', '0925068401', 'islam', '-', '-', '-', 'P', 'Aktif', '', NULL, '0925068401', NULL, '2019-11-27'),
(30, NULL, 'Wa Rosida, S.Pd, M.Pd', '0906108603', 'islam', '-', '-', '-', 'P', 'Aktif', '', NULL, '0906108603', NULL, '2019-11-27'),
(31, NULL, 'Maulina, S.Pd, M.Pd', '0907108901', 'islam', '-', '-', '-', 'P', 'Aktif', '', NULL, '0907108901', NULL, '2019-11-27'),
(32, NULL, 'Nur Rizky Alfiany Suaib, S.S., M.Hum', '930098603', 'islam', '-', '-', '-', 'P', 'Aktif', '', NULL, '930098603', NULL, '2019-11-27'),
(33, NULL, 'Rahmat Nasrullah, S.Pd, M.Hum', '0916108703', 'islam', '-', '-', '-', 'L', 'Aktif', '', NULL, '0916108703', NULL, '2019-11-27'),
(34, NULL, 'Ririn Syahriani, S.Pd, M.Pd', '0915018502', 'islam', '-', '-', '-', 'P', 'Aktif', '', NULL, '0915018502', NULL, '2019-11-27'),
(35, NULL, 'Syarif Amin, S.Pd.I, M.Pd.I', '0906038503', 'islam', '-', '-', '-', 'L', 'Aktif', '', NULL, '0906038503', NULL, '2019-11-27'),
(36, NULL, 'Titin Rahmiatin, S.Pd, M.Pd', '0909028302', 'islam', '-', '-', '-', 'P', 'Aktif', '', NULL, '0909028302', NULL, '2019-11-27'),
(37, NULL, 'Andi Rachmawati Syarif, S.S., M.Hum', '0914037701', 'islam', '-', '-', '-', 'P', 'Aktif', '', NULL, '0914037701', NULL, '2019-11-27'),
(38, NULL, 'Tri Indah Rusli, S.Pd, M.Pd', '0907068602', 'islam', '-', '-', '-', 'P', 'Aktif', '', 'c56f4d63b2a06dd2b80333cdabc047e7.jpg', 'f23fd6984db6e99205132e1967df69c0ed68f1de', NULL, '2019-11-27'),
(39, NULL, 'Yuliyanah Sain, S.S., M.Hum', '0902117801', 'islam', 'ardian@email.com', '00349543', 'desa matabubu', 'P', 'Aktif', '1998-09-15', NULL, '0902117801', NULL, '2020-06-15'),
(40, NULL, 'Citra Prasiska Puspita Tohamba, S.Pd., M.Pd', '0922058902', 'islam', '-', '-', '-', 'P', 'Aktif', '', NULL, '0922058902', NULL, '2019-11-27'),
(41, NULL, 'Hadijah Selman, S.Pd., M.Pd', '0927096601', 'islam', '-', '-', '-', 'P', 'Aktif', '', NULL, '0927096601', NULL, '2019-11-27'),
(42, NULL, 'Adam, S.Pd, M.Pd', '0907018102', 'islam', '-', '-', '-', 'L', 'Aktif', '', NULL, '0907018102', NULL, '2019-11-27'),
(43, NULL, 'Hermanto, S.Pd, M.Pd', '0919038701', 'islam', '-', '-', '-', 'L', 'Aktif', '', NULL, '0919038701', NULL, '2019-11-27'),
(44, NULL, 'Nurul Idhayani, S.Pd, M.Pd', '0903079002', 'islam', '-', '-', '-', 'P', 'Aktif', '', NULL, '0903079002', NULL, '2019-11-27'),
(45, NULL, 'Rohmiati, S.Pd.I., M.Pd', '0919086801', 'islam', '-', '-', '-', 'P', 'Aktif', '', NULL, '0919086801', NULL, '2019-11-27'),
(46, NULL, 'Waode Sari Amalia, S.Pd, M.Pd', '0908118301', 'islam', '-', '-', '-', 'P', 'Aktif', '', NULL, '0908118301', NULL, '2019-11-27'),
(47, NULL, 'Zulaeni Esita, S.Psi., MA', '0920098401', 'islam', '-', '-', '-', 'P', 'Aktif', '', NULL, '0920098401', NULL, '2019-11-27'),
(48, NULL, 'Bahartiar, SP., M.Pd', '0910096901', 'islam', '-', '-', '-', 'L', 'Aktif', '', NULL, '0910096901', NULL, '2019-11-27'),
(49, NULL, 'Hasmira Said, Dra., M.Pd', '0921096401', 'islam', '-', '-', '-', 'L', 'Aktif', '', NULL, '0921096401', NULL, '2019-11-27'),
(50, NULL, 'Pahenra,  S.Sos., M.Pd', '0904087103', 'islam', '-', '-', '-', 'L', 'Aktif', '', NULL, '0904087103', NULL, '2019-11-27'),
(51, NULL, 'Yaman La Ndibo, S.Pd., M.Pd', '0916048802', 'islam', '-', '-', '-', 'L', 'Aktif', '', NULL, '0916048802', NULL, '2019-11-27'),
(52, NULL, 'Samusu,  S.Pd., M.Pd', '0916049006', 'islam', '-', '-', '-', 'L', 'Aktif', '', NULL, '0916049006', NULL, '2019-11-27'),
(53, NULL, 'Hendra Nelva Saputra, S.Pd., M.Pd', '0919029203', 'islam', '-', '-', '-', 'L', 'Aktif', '', NULL, '0919029203', NULL, '2019-11-27'),
(54, NULL, 'Zila Razilu, S.Pd., M.Pd', '0922059102', 'islam', '-', '-', '-', 'P', 'Aktif', '', NULL, '0922059102', NULL, '2019-11-27'),
(55, 3, 'Alfiah Fajriani, ST., M.Eng', '0907099101', 'islam', 'ardimandev98@gmail.com', '-', '-', 'P', 'Aktif', '2020-06-16', NULL, '0907099101', NULL, '2020-06-17'),
(56, NULL, 'Abdullah Alhadza, Prof., Dr., MA', '0024105001', 'islam', 'alucardcanfarming@gmail.com', '-', '-', 'L', 'Aktif', 'sddsd', 'person_1.jpg', '0024105001', NULL, '2020-02-05'),
(60, 0, 'Usman, S.Pd, M.Pd', '0908109005', NULL, 'usman_muhammadiyah03@gmail.com', '-', 'Jln. Orinunggu Lrg. BSB Kel. Mokoau, Kec. Kambu, Kota Kendari', 'P', 'Aktif', '1990-10-08', 'utsman.png', '0908109005', NULL, '2020-07-27'),
(61, NULL, 'Darman, S.Pd., M.Pd', '0904048003', 'islam', 'darman@umkendari.ac.id', '-', 'JL. BANTENG , BTN MUTIARA GEMILANG BLOK G.10  Rahandouna, Poasia, Kota Kendari, Sulawesi Tenggara 93', 'L', 'Aktif', '1991-05-13', 'e5a799e14aeafbafa118f629a2e25afa.jpg', '0904048003', NULL, '2020-04-14'),
(62, 0, 'Lilianti, S.Pd, M.Pd', '0909078603', NULL, 'lilianti@umkendari.ac.id', '-', 'Jalan Sungai Wanggu Haji Lamuse (Kampung KB) Kelurahan Lepo-Lepo, Kecamatan Baruga Kota Kendari', 'P', 'Aktif', '1986-06-09', 'c56f4d63b2a06dd2b80333cdabc047e7.jpg', '0909078603', NULL, '2020-07-23'),
(70, 9, 'Tobirama Sensei', 'RD842331', NULL, 'ardimandev98@gmail.com', 'adas', 'dimanapun', 'L', 'Aktif', '07/24/2020', '9da94f8a93e075708bce5a6a4a110250.jpeg', 'RD842331', NULL, '2020-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `judul`, `foto`) VALUES
(1, 'Ini adalah judul berita', 'user.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `file_assesment`
--

CREATE TABLE `file_assesment` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file_assesment`
--

INSERT INTO `file_assesment` (`id`, `type`, `nama_file`, `file`) VALUES
(1, 'd1', 'RENOP FKIP UMK 2019_2023', '1_1_RENSTRA_FKIP_UMK_2019_2023.pdf'),
(2, 'd1', 'RENSTRA FKIP UMK 2019_2023', '1_1_RENSTRA_FKIP_UMK_2019_20231.pdf'),
(3, 'd2', 'Pedoman PTM', 'A_  Pedoman PTM.pdf'),
(4, 'd3', 'KEBIJAKAN-MUTU-UMK', 'KEBIJAKAN-MUTU-UMK.pdf'),
(5, 'd4.1', 'Pedoman-Penerimaan-Mahaiswa-Baru', '(1),_(3)_Pedoman-Penerimaan-Mahaiswa-Baru.pdf'),
(6, 'd4.2', 'Pedoman-Penerimaan-Mahaiswa-Baru', 'a__Pedoman-Penerimaan-Mahaiswa-Baru.pdf'),
(7, 'd4.2', 'SK Pembebasan Biaya Kuliah Siti Fasmaun', 'SK_Pembebasan_Biaya_Kuliah_Siti_Fasmaun.pdf'),
(8, 'd4.3', 'SK Rektor tentang Penerimaan Maba Berdasarkan Pemerataan Wilayah', 'SK_Rektor_tentang_Penerimaan_Maba_Berdasarkan_Pemerataan_Wilayah.pdf'),
(9, 'd4.4', 'SK Penerimaan Maba Berdasarkan Prinsip Equitas', 'SK_Penerimaan_Maba_Berdasarkan_Prinsip_Equitas.pdf'),
(10, 'd4.5', 'LAPORAN PANITIA SPMB 2015', 'LAPORAN_PANITIA_SPMB_2015.pdf'),
(11, 'd4.6', 'Sampul Soal', 'Sampul Soal.docx'),
(12, 'd5', 'Pedoman-Penyusunan-Kurikulum', 'a__Pedoman-Penyusunan-Kurikulum.pdf'),
(13, 'd6', 'Laporan Audit Keuangan Eksternal', 'Laporan Audit Keuangan Eksternal.pdf'),
(14, 'd7.1', 'MANUAL ELEARNING', '2_MANUAL_ELEARNING_ok.pdf'),
(15, 'd7.2', 'Cetak Biru Sistem Informasi', 'Cetak_Biru_Sistem_Informasi.pdf'),
(16, 'd7.3', 'BUKTI KEPEMILIKAN LISENSI WINDOWS SERVER', 'a__BUKTI_KEPEMILIKAN_LISENSI_WINDOWS_SERVER.pdf'),
(17, 'd8.1', 'Daftar Pemenang Penelitian Tahun Anggaran 2016', 'b__Daftar_Pemenang_Penelitian_Tahun_Anggaran_2016.pdf'),
(18, 'd8.2', 'Penelitian Apriani Safitri 2018', 'Penelitian_Apriani_Safitri_2018.pdf'),
(19, 'd9.1', 'PENGABDIAN', 'PENGABDIAN.pdf'),
(20, 'd9.2', 'PKM Arifin 2017', 'PKM_Arifin_2017.pdf'),
(21, 'd10', 'MoU UMK - Balai Peningkatan Produktivitas Kendari', 'MoU_UMK_-_Balai_Peningkatan_Produktivitas_Kendari.pdf'),
(22, 'd11', '2019-11-08_LoA SEA Teacher B9', '2019-11-08_LoA_SEA_Teacher_B9.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `id_album` int(11) NOT NULL,
  `judul_foto` varchar(100) NOT NULL,
  `posisi_foto` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` enum('publish','no publish','pending') NOT NULL,
  `jumlah_view` int(11) DEFAULT NULL,
  `jumlah_like` int(11) DEFAULT NULL,
  `tgl_insert` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `id_album`, `judul_foto`, `posisi_foto`, `foto`, `status`, `jumlah_view`, `jumlah_like`, `tgl_insert`) VALUES
(14, 1, 'pelatihan', 'slider', '1__4_.jpg', 'publish', 98, 12, ''),
(15, 1, 'pelatihan komputer', 'slider', 'IMG_8573.jpg', 'publish', 40, 30, ''),
(16, 2, 'penjelasan', 'slider', 'MG_8195.jpg', 'publish', 120, 41, '');

-- --------------------------------------------------------

--
-- Table structure for table `informasi_dosen`
--

CREATE TABLE `informasi_dosen` (
  `id` int(11) NOT NULL,
  `nidn_dosen` varchar(40) NOT NULL,
  `profil_dosen` text NOT NULL,
  `penelitian` text NOT NULL,
  `publikasi` text NOT NULL,
  `pengajaran` text NOT NULL,
  `rip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasi_dosen`
--

INSERT INTO `informasi_dosen` (`id`, `nidn_dosen`, `profil_dosen`, `penelitian`, `publikasi`, `pengajaran`, `rip`) VALUES
(2, '0909078603', 'Lilianti, dilahirkan di desa Ululakara Kecamatan Palangga Selatan Kabupaten Konawe Selatan pada tangggal 9 Juli 1986. Penulis merupakan anak ketiga dari empat bersaudara, pasangan ayah Weona dan ibu Wila. Tahun 2016 menikah dengan Adenisatrawan, S.HI., M.H dan dikaruniai satu orang putri  yaitu Ainayya Khaliqa Dzahin Satrawan (2 Tahun 7 Bulan).\r\nRiwayat pendidikan penulis dimulai lulus SDN 1 Ululakara lulus tahun 1998, SMP Hasrati Kendari  lulus tahun 2001, SMA Hasrati Kendari lulus tahun 2004, Pendidikan S1 (2005-2009) ditempuh pada Universitas Muhammadiyah Kendari (UMK) Fakultas Keguruan dan Ilmu Pendidikan (FKIP) jurusan administrasi pendidikan. Melanjutkan pendidikan S2 (2011-2013) pada Jurusan Manajemen Pendidikan Universitas Muhammadiyah Surakarta (UMS) dan Pendidikan S3 pada Program Studi Administrasi Pendidikan SPs UPI (2015-2019)..', '<p><em>Proyek Penelitan (Yang Telah Dilaksanakan) :</em></p>\r\n<ol start=\"1\">\r\n<li>Partisipasi Wanita Dalam Pendidikan</li>\r\n<li>Penanganan Kesulitan Belajar Siswa Melalui Pendekatan Psikologi Belajar</li>\r\n<li>Pelestarian Budaya Daerah Untuk Pengembangan Sektor Pariwisata Taman Kanak-Kanak</li>\r\n<li>Pengelolaan Pembelajaran Berbasis CTL</li>\r\n<li>Manajemen Mutu Berbasis Sekolah</li>\r\n<li>Manajemen PPG</li>\r\n<li>Strategi Pengembangan Profesionalitas Guru</li>\r\n<li>Analisis Kebijakan PPG</li>\r\n<li>Peran Penilaian Kinerja Guru Dalam Pengembangan Profesi Pendidikan</li>\r\n</ol>\r\n<p><em>Proyek Penelitan (Yang Sedang Atau Sementara Dilaksanakan) :</em></p>\r\n<ol start=\"1\">\r\n<li>Pengembangan Klinik Sentra Permainan Untuk Pemantauan Tumbuh Kembang Anak Taman Kanak-Kanak</li>\r\n<li>Implementasi Kebijakan Sd-Smp Negeri Satu Atap</li>\r\n</ol>', '<p><strong><em>Jurnal</em></strong></p>\r\n<ol start=\"1\">\r\n<li>Persamaan Hak: Partisipasi Wanita Dalam Pendidikan (Didaktis: Jurnal Pendidikan Dan Ilmu Pengetahuan)</li>\r\n<li>Pelestarian Budaya Daerah Untuk Pengembangan Sektor Pariwisata Taman Kanak-Kanak (Jurnal Pengabdian Masyarakat UMK)</li>\r\n<li>Pengelolaan Pembelajaran Biologi Berbasis Contextual Teaching And Learning (Jurnal Humanika Universitas Haluoleo)</li>\r\n<li>Persepsi Guru Terhadap Manajemen Mutu Berbasis Sekolah (Jurnal Humanika Universitas Haluoleo)</li>\r\n<li>Implementasi Penyelenggaraan PPG (Jurnal Administrasi Pendidikan (JAP)) UPI</li>\r\n</ol>\r\n<h5 class=\"card-title\"><em><strong>Buku</strong></em></h5>\r\n<p><em><strong>-</strong></em></p>', '<p><em>Universitas/Sekolah Tinggi/Institusi :</em></p>\r\n<ol>\r\n<li>Universitas Muhammadiyah Kendari</li>\r\n</ol>\r\n<p><em>Mata Kuliah Yang Diajarkan :</em></p>\r\n<ol start=\"1\">\r\n<li>Kapita Selekta Administrasi Pendidikan</li>\r\n<li>Analisa Kebijakan Dan Pengambilan Keputusan</li>\r\n<li>Manajemen Peserta Didik</li>\r\n<li>Inovasi Pendidikan</li>\r\n<li>Penelitian Kuantitatif</li>\r\n<li>Perspektif Global</li>\r\n<li>Riset Dan Pengembangan</li>\r\n<li>Teori Organisasi</li>\r\n<li>Manajemen Pelatihan Pendidikan</li>\r\n</ol>', 'abbbc9eab28559b188ea027ba49f40c5.pdf'),
(3, '0904048003', 'Darman, anak rantau yang hijrah di Kota Kendari tahun 2009. Lahir di Kosundano Kabupaten Muna, Provinsi Sulawesi Tenggara pada tanggal 04 april 1980 yang merupakan anak ke dua dari enam orang bersaudara dari pasangan La Kaada dan Wa Halisa. Saat ini bertempat tinggal di Kelurahan Rahandouna, Kec. Poasia, Kota Kendari, Sulawesi Tenggara 93232, BTN Mutiara Gemilang Blok G10. Menikah dengan Hasnawati, S.Pd. Anak: Muhammad Darman Mufasih Quran.', '<p><em>Proyek Penelitan (Yang Telah Dilaksanakan) :</em></p>\r\n<ol>\r\n<li>Media Pembelajaran</li>\r\n<li>Teknologi Pembelajaran</li>\r\n<li>Jaringan Komputer</li>\r\n<li>Web</li>\r\n</ol>\r\n<p><em>Proyek Penelitan (Yang Sedang Atau Sementara Dilaksanakan) :</em></p>\r\n<ol>\r\n<li>Media Pembelajaran Berbasis Teknologi</li>\r\n</ol>', '<p><strong><em>Jurnal</em></strong></p>\r\n<ol>\r\n<li>Media Pembelajaran Berbasis Web Mata Pelajaran IPA Terpadu Kelas VII Di SMP Negeri 10 Kendari</li>\r\n</ol>\r\n<p><strong><em>Buku</em></strong></p>\r\n<p><strong><em>-</em></strong></p>', '<p><em>Universitas/Sekolah Tinggi/Institusi :</em></p>\r\n<ol>\r\n<li>Universitas Muhammadiyah Kendari</li>\r\n</ol>\r\n<p><em>Mata Kuliah Yang Diajarkan :</em></p>\r\n<ol>\r\n<li>CONTENT MANAJEMEN (ADM TIK)</li>\r\n<li>KAPITA SELEKTA TI (ADM TIK)</li>\r\n<li>TEKNOLOGI INFORMASI DAN KOMUNIKASI (ADM IPA)</li>\r\n<li>PEMBELAJARAN TERPADU (PG-PAUD)</li>\r\n<li>KOMPUTERISASI MANAJEMEN (MANAJEMEN)</li>\r\n<li>SISTEM INFORMASI MANAJEMEN (MANAJEMEN)</li>\r\n<li>INTRODUCTION TO COMPUTER & INTERNET (PBI)</li>\r\n<li>PENGENALAN KOMPUTER DAN INTERNET (PG-PAUD & ADM P)</li>\r\n<li>APLIKASI KOMPUTER (PLS)</li>\r\n<li>PEMROGRAMAN WEB (ADM TIK)</li>\r\n<li>JARINGAN NIRKABEL (ADM TIK)</li>\r\n<li>PEMBELAJARAN BERBASIS KOMPUTER (ADM TIK)</li>\r\n<li>PAKET APLIKASI SEKOLAH (ADM TIK)</li>\r\n<li>ILMU TEKNOLOGI DAN MASYARAKAT (ADM IPA)</li>\r\n<li>ALGORITMA DAN PEMROGRAMAN (PTI)</li>\r\n<li>BASIS DATA (PTI)</li>\r\n<li>ARSITEKTUR DAN ORGANISASI KOMPUTER (PTI)</li>\r\n<li>STATISTIK PENDIDIKAN (PTI)</li><li>PEMROGRAMAN WEB DASAR (PTI)</li>\r\n</ol>\r\n<p> </p>', ''),
(4, '0025096506', '', '', '', '', ''),
(5, '0924048702', '                                                             -\r\n                                                      ', '                                                        -\r\n                                                  ', '<p>sd</p>', '<p>fdsd</p>', ''),
(6, '0911108403', '-', '-', '<p>-</p>', '<p>-</p>', ''),
(7, '0906128503', '', '', '', '', ''),
(8, '0918047401', '', '', '', '', ''),
(9, '0916128701', '', '', '', '', ''),
(10, '0920048101', '', '', '', '', ''),
(11, '0910128502', '                                                             -\r\n                                                      ', '                                                        -sedas', '<p>asd</p>', '<p>asdas</p>', ''),
(12, '0927068604', '', '', '', '', ''),
(13, '0926077902', '', '', '', '', ''),
(14, '0919068301', '', '', '', '', ''),
(15, '0908117802', '', '', '', '', ''),
(16, '0925068401', '', '', '', '', ''),
(17, '0906108603', '', '', '', '', ''),
(18, '0907108901', '', '', '', '', ''),
(19, '930098603', '', '', '', '', ''),
(20, '0916108703', '', '', '', '', ''),
(21, '0915018502', '', '', '', '', ''),
(22, '0906038503', '', '', '', '', ''),
(23, '0909028302', '', '', '', '', ''),
(24, '0914037701', '', '', '', '', ''),
(25, '0907068602', '', '', '', '', ''),
(26, '0902117801', 'nama saya yuliyanah saya lahir tgl sekian dan terimakasih', '- ini adalah halaman penelitian saya', '<p>ini adalah halaman&nbsp;<span style=\"font-size: 1rem;\">publikasi saya</span></p>', '<p>ini adalah halaman pengajaran saya</p>', ''),
(27, '0922058902', '', '', '', '', ''),
(28, '0927096601', '', '', '', '', ''),
(29, '0907018102', '', '', '', '', ''),
(30, '0919038701', '', '', '', '', ''),
(31, '0903079002', '', '', '', '', ''),
(32, '0919086801', '', '', '', '', ''),
(33, '0908118301', '', '', '', '', ''),
(34, '0920098401', '', '', '', '', ''),
(35, '0910096901', '', '', '', '', ''),
(36, '0921096401', '', '', '', '', ''),
(37, '0904087103', '', '', '', '', ''),
(38, '0916048802', '', '', '', '', ''),
(39, '0916049006', '', '', '', '', ''),
(40, '0919029203', '', '', '', '', ''),
(41, '0922059102', '', '', '', '', '');
INSERT INTO `informasi_dosen` (`id`, `nidn_dosen`, `profil_dosen`, `penelitian`, `publikasi`, `pengajaran`, `rip`) VALUES
(42, '0907099101', '                                                           <p>                                                                                                                                                                                 -ini data diri saya                                                        <img src=\"data:image/png;base64,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', '                                                                                                                                                                                                                        -                                                                                                                                                                                                                ', '<p>-ok</p>', '<p>-</p>', '6f2f69dc48b2d613f6b8e77aa888aa36.pdf');
INSERT INTO `informasi_dosen` (`id`, `nidn_dosen`, `profil_dosen`, `penelitian`, `publikasi`, `pengajaran`, `rip`) VALUES
(43, '0024105001', '', '', '', '', ''),
(44, '1', 'Nama Usman, S.Pd., M.Pd. biasa dipanggil Usman. Saya lahir di Matandasa pada tanggal 8 Oktober 1990. Saya menempuh sekolah di SD Negeri 4 Lawa tamat 2003 kemudian melanjutkan sekolah di SMPN 4 Lawa tamat 2006. Setalah itu lanjut di SMAN 1 Sawerigadi dan Tamat pada tahun 2009. S1 dan S2 ditempuh di Universitas Halu Oleo Kendari. Saya mempunyai istri bernama Wa Fiana, S.Pd. dan anak pertama bernama Muhammad Azka Al-khawarizmi Usman.\r\n                                                            -', '-', '<p>-</p>', '<p>-</p>', '1861a653c6e7beca766db0965b1c97be.pdf'),
(45, 'RD141049', '-', '-', '-', '-', '-'),
(46, 'RD842331', '-', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_ujian`
--

CREATE TABLE `jenis_ujian` (
  `id_ujian` int(11) NOT NULL,
  `nama_ujian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_ujian`
--

INSERT INTO `jenis_ujian` (`id_ujian`, `nama_ujian`) VALUES
(1, 'proposal'),
(2, 'hasil'),
(3, 'skripsi');

-- --------------------------------------------------------

--
-- Table structure for table `kas_prodi`
--

CREATE TABLE `kas_prodi` (
  `id` int(11) NOT NULL,
  `id_rab` varchar(255) DEFAULT NULL,
  `id_prodi` int(11) NOT NULL,
  `jenis` enum('M','K') NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ket` text NOT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `date_created` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kas_prodi`
--

INSERT INTO `kas_prodi` (`id`, `id_rab`, `id_prodi`, `jenis`, `jumlah`, `ket`, `bukti`, `date_created`) VALUES
(36, NULL, 9, 'M', 30000, 'hibah fakultas', 'ecdce320f2f92484e654c513e13e9c45.png', '2021-06-09'),
(37, NULL, 9, 'K', 20000, 'asdasd', 'a9e2d999f32bc2bfea51bef90b30146a.png', '2021-06-09'),
(38, NULL, 9, 'M', 40000, 'sfsafsdf', '0c26846fc0bc86dc82e52d19a4c5b240.png', '2021-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_berita`
--

CREATE TABLE `kategori_berita` (
  `id_kategori_berita` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `slug_kategori_berita` varchar(100) NOT NULL,
  `urutan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_berita`
--

INSERT INTO `kategori_berita` (`id_kategori_berita`, `nama_kategori`, `slug_kategori_berita`, `urutan`) VALUES
(1, 'berita', 'berita', '1'),
(2, 'pengumuman', 'pengumuman', '2'),
(5, 'acara', 'acara', '3'),
(6, 'utama', 'utama', '1');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `nama_dekan` varchar(255) NOT NULL DEFAULT '0',
  `namaweb` varchar(100) NOT NULL,
  `tagline` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `telepon` varchar(30) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `google_map` text DEFAULT NULL,
  `logo` varchar(123) DEFAULT NULL,
  `icon` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `nama_dekan`, `namaweb`, `tagline`, `website`, `email`, `alamat`, `telepon`, `keywords`, `description`, `google_map`, `logo`, `icon`) VALUES
(1, 'Tri Indah Rusli., S.Pd., M.Pd', 'FKIP UMKendari', 'Fast, Fit and Fun', 'http://www.fkipumkendari.ac.id', 'fkip@gmail.com', 'Jl. KH. Ahmad Dahlan No. 10 Kendari', '0401-3190710', 'fkip, umkendari, fakultas keguruan dan ilmu pendidikan universitas muhammadiyah kendari, keguruan, universitas terbagus di kendari', 'fakultas akhlakulkarimah ', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63680.34749033984!2d122.47706144790227!3d-4.015944578564699!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d98ecde057e49d9%3A0xee318b8f3b9185ca!2sUniversitas+Muhammadiyah+Kendari!5e0!3m2!1sid!2sid!4v1564737774591!5m2!1sid!2sid\" width=\"100%\" height=\"400\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `nim` varchar(100) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `agama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `angkatan` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nik_ayah` varchar(100) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `tgl_lahir_ayah` varchar(100) NOT NULL,
  `pendidikan_ayah` varchar(100) NOT NULL,
  `pekerjaan_ayah` varchar(100) NOT NULL,
  `penghasilan_ayah` varchar(100) NOT NULL,
  `nik_ibu` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `tgl_lahir_ibu` varchar(100) NOT NULL,
  `pendidikan_ibu` varchar(100) NOT NULL,
  `pekerjaan_ibu` varchar(100) NOT NULL,
  `penghasilan_ibu` varchar(100) NOT NULL,
  `created` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `id_prodi`, `nim`, `nama_mahasiswa`, `jenis_kelamin`, `agama`, `tempat_lahir`, `tgl_lahir`, `status`, `alamat`, `angkatan`, `foto`, `nik_ayah`, `nama_ayah`, `tgl_lahir_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `nik_ibu`, `nama_ibu`, `tgl_lahir_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `created`) VALUES
(1, 1, '21711170', 'ardiman', 'L', 'islam', 'matabubu', '15-09-1999', 'aktif', 'desa matabubu, kec. baito. kab. konsel', '2017', '', '-', 'mangudu S.IP', '12-07-1986', 'S1 Ilmu Pemerintahan', 'PNS', '3.000.000', '-', 'risnawati', '12-07-1989', 'SMA', 'Ibu Rumah tangga', '1.000.000', '09-08-2019'),
(2, 2, '21711011', 'sahril ramdhan', 'L', 'islam', 'alangga', '22-06-1999', 'aktif', 'alngga. kec. andoolo barat', '2018', 'hotiwqv9-400x400-bf84a8ea43502074d62e263b19c6ad496.png', '-', 'sarimin', '-', 'S1 Sarjana Hukum', 'Jaksa', '>1.000.000', '-', 'sarmila', '-', 'SMA Sederajat', 'ibu rumah tangga', '<1.000.000', '2019-08-09, 15:08:58'),
(3, 1, '21722101', 'risal jibran', 'L', 'islam', 'punggaluku', '23-06-1998', 'aktif', 'lorong cendana', '2018', 'anton-leste21-400x400.jpg', '-', 'paijo', '-', 'S1 Pertanaian', 'bertani', '>1.000.000', '-', 'maimuna', '-', 'SMA Sederajat', 'ibu rumah tangga', '<1.000.000', '2019-08-09, 15:08:05'),
(4, 1, '21711012', 'I Wayan Arik Astika', 'L', 'hindu', 'motaha', '05-05-1998', 'aktif', 'jalan sao-sao, kec.tidak tahu', '2018', 'TPA1-400x400.jpeg', '-', 'agus sudrajat', '-', 'S1 Kelautan', 'melaut', '>1.000.000', '-', 'warnisa', '-', 'SMA Sederajat', 'guru SD', '>1.000.000', '2019-08-09, 16:08:18'),
(5, 2, '21602344', 'aji saputra', 'L', 'kristen', 'jepara', '06-10-1997', 'nonaktif', 'cakala, muna', '2019', 'Foto_Artikel_KIAT_Guru_(2).jpg', '-', 'dartomo', '-', 'S2 Hukum', 'menghukum', '>1.000.000', '-', 'warmina', '-', 'SMA Sederajat', 'ibu rumah tangga', '<1.000.000', '2019-08-09, 16:08:59'),
(6, 1, '21711560', 'asizah sri septiani', 'P', 'islam', 'kendari', '16-02-1999', 'aktif', 'cakala, muna', '2018', 'profile1.png', '-', 'paijo', '-', 'S1 sarjana ilmu pemerintahan', 'PNS', '>1.000.000', '-', 'karmilasari', '-', 'SMA Sederajat', 'ibu rumah tangga', '<1.000.000', '2019-08-09, 16:08:33');

-- --------------------------------------------------------

--
-- Table structure for table `mhs_seminar`
--

CREATE TABLE `mhs_seminar` (
  `id_mhs_seminar` int(11) NOT NULL,
  `id_surat_seminar` varchar(100) NOT NULL DEFAULT '',
  `nama_mhs` varchar(100) NOT NULL,
  `nim` varchar(30) NOT NULL,
  `judul_skripsi` text NOT NULL,
  `pembimbing1` varchar(100) NOT NULL,
  `pembimbing2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mhs_seminar`
--

INSERT INTO `mhs_seminar` (`id_mhs_seminar`, `id_surat_seminar`, `nama_mhs`, `nim`, `judul_skripsi`, `pembimbing1`, `pembimbing2`) VALUES
(52, '62c26729-e6d1-43b5-994d-0700dba9a9c4', 'Ardiman', '21711170', 'Pengembangan website FKIP UMKendari menggunakan framework Codeigniter 3 dan boostrap v.3', 'Darman, S.Pd., M.Pd', 'Alfiah Fajriani, ST. MENg'),
(53, '77a5620b-7593-484e-a0a3-c028d3c55ff1', 'Jokowidodo', '21513014', 'Membuat media pembelajaran interkatif menggunakan adobe ilustrator di SDN 03 MOROWALI', 'Lilianti, S.Pd, M.Pd', 'Nur Rizky Alfiany Suaib, S.S., M.Hum'),
(55, '77a5620b-7593-484e-a0a3-c028d3c55ff1', 'Sahril Rmahdhan', '21711011', 'pembuatan sumber belajar online di SMP 01 KONSEL', 'Alfiah Fajriani, ST., M.Eng', 'Hendra Nelva Saputra, S.Pd., M.Pd'),
(56, 'bb60dc20-4091-4498-84ca-818975e1d23c', 'ardiman', '21711170', 'fkip umkendari ac ids', 'Abdullah Alhadza, Prof., Dr., MA', 'Alfiah Fajriani, ST., M.Eng'),
(57, '4da1b580-8271-42a8-91b7-3dd66545e81a', 'Mega ilfiana', '21511041', 'asdsa', 'Junaidin, S.Pd, M.Pd', 'Rahmat Nasrullah, S.Pd, M.Hum'),
(58, '4da1b580-8271-42a8-91b7-3dd66545e81a', 'Novianti', '21511049', 'adasd', 'Junaidin, S.Pd, M.Pd', 'Nasir, S.Pd, M.Pd'),
(60, '3349f034-7d69-4442-9700-4a51a1c5d02f', 'Novianti', '21511049', 'adasd', 'Junaidin, S.Pd, M.Pd', 'Nasir, S.Pd, M.Pd'),
(61, 'cd370c85-0b3d-411f-b4c7-d257937adaa0', 'Mega ilfiana', '21511041', 'asdsa', 'Junaidin, S.Pd, M.Pd', 'Rahmat Nasrullah, S.Pd, M.Hum'),
(62, 'fa7d2d78-bcc7-48b3-aa6b-14e272f72826', 'Novianti', '21511049', 'adasd', 'Junaidin, S.Pd, M.Pd', 'Nasir, S.Pd, M.Pd'),
(63, '06ac7316-caf1-4bff-8bb1-954d6fcde950', 'Novianti', '21511049', 'adasd', 'Junaidin, S.Pd, M.Pd', 'Nasir, S.Pd, M.Pd'),
(64, '4701964e-9518-416a-8ed7-9e2aecd0efc4', 'UCI LESTARI', '031904160', 'membangun sistem penawaran manul di fkip umkendari', 'Junaidin, S.Pd, M.Pd', 'Kabiba, S.Pd, M.Pd');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_magang`
--

CREATE TABLE `nilai_magang` (
  `id` int(11) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `nilai1` int(11) NOT NULL,
  `nilai2` int(11) NOT NULL,
  `nilai3` int(11) NOT NULL,
  `nilai4` int(11) NOT NULL,
  `nilai5` int(11) NOT NULL,
  `nilai6` int(11) NOT NULL,
  `nilai7` int(11) NOT NULL,
  `nilai8` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_magang`
--

INSERT INTO `nilai_magang` (`id`, `nim`, `nilai1`, `nilai2`, `nilai3`, `nilai4`, `nilai5`, `nilai6`, `nilai7`, `nilai8`, `date_created`) VALUES
(1, '217101212', 4, 4, 3, 3, 4, 4, 4, 4, '2020-02-16 01:22:53');

-- --------------------------------------------------------

--
-- Table structure for table `paud_akademik`
--

CREATE TABLE `paud_akademik` (
  `id` int(11) NOT NULL,
  `kurikulum` varchar(255) NOT NULL,
  `kalender_akademik` varchar(255) NOT NULL,
  `jadwal_kuliah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paud_akademik`
--

INSERT INTO `paud_akademik` (`id`, `kurikulum`, `kalender_akademik`, `jadwal_kuliah`) VALUES
(1, 'aisyah_1.pdf', 'aisyah_1.pdf', 'aisyah_1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `paud_fasilitas`
--

CREATE TABLE `paud_fasilitas` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `ket` text NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paud_fasilitas`
--

INSERT INTO `paud_fasilitas` (`id`, `nama`, `foto`, `ket`, `status`, `created_at`) VALUES
(2, 'laptop edit', 'Screenshot from 2020-08-05 16-54-31.png', 'ini adalah laptop yang disedikan oleh kampus', 1, '2020-08-08 03:24:44'),
(5, 'ini adalah fasiltas baru paudq', 'Screenshot from 2020-08-07 03-09-22.png', '<p>ini adalah keteran dari fasilitas paud edit</p>', 1, '2020-08-11 05:36:28');

-- --------------------------------------------------------

--
-- Table structure for table `paud_gallery`
--

CREATE TABLE `paud_gallery` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `view` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `created_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paud_gallery`
--

INSERT INTO `paud_gallery` (`id`, `type`, `judul`, `file`, `view`, `status`, `created_at`) VALUES
(5, 'foto', 'pelatihan web', 'Screenshot from 2020-08-08 12-44-10.png', 0, 1, '2020-08-08 04:43:01'),
(8, 'video', 'KKN-Dik universitas muhammadiyaj kendari 2023', 'oqIZYY7XUiA', NULL, 1, '2020-08-08 05:18:21'),
(13, 'file', 'file assesment', 'ardiman.pdf', NULL, 1, '2020-08-08 14:22:10'),
(14, 'foto', 'image baru', 'no_img.jpg', 0, 1, '2020-08-10 15:35:46'),
(15, 'foto', 'image baru lagi', 'no_img_1.jpg', 0, 1, '2020-08-10 15:36:55'),
(16, 'foto', 'image baru lagi dan lagi', 'no_img_2.jpg', 0, 1, '2020-08-10 15:37:02'),
(17, 'foto', 'pelatihan web programmer', 'no_img_3.jpg', 0, 1, '2020-08-14 04:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `paud_profil`
--

CREATE TABLE `paud_profil` (
  `id` int(11) NOT NULL,
  `sambutan` text NOT NULL,
  `visi_misi` text NOT NULL,
  `struktur_organisasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paud_profil`
--

INSERT INTO `paud_profil` (`id`, `sambutan`, `visi_misi`, `struktur_organisasi`) VALUES
(1, '<p style=\"margin-bottom: 1rem; font-family: Roboto, sans-serif;\"><em><span style=\"font-weight: bolder;\">Assalamu’alaikum wr wb</span></em></p><p style=\"margin-bottom: 1rem; font-family: Roboto, sans-serif; text-align: justify;\">Segala puji dan syukur kami panjatkan kehadirat <em>Allah Subhanahu Wa Ta’ala</em> yang telah melimpahkan rahmat dan hidayahnya. Shalawat serta salam semoga tercurah kepada <em>Rasulullah Shalallahu ‘Alaihi Wassalam</em> beserta keluarga, sahabat dan seluruh pengikut setia beliau sampai akhir zaman. Alhamdullilah dengan izin, dan kasih sayang-Nya, akhirnya kami dapat menampilkan  w<em>ebsite</em> yang merupakan salah satu media komunikasi dan informasi yang berkaitan dengan Program Studi Administrasi Pendidikan Universitas Muhammadiyah Kendari.</p><p style=\"margin-bottom: 1rem; font-family: Roboto, sans-serif; text-align: justify;\">Program Studi pendidikan anak usia dini memiliki berbagai program kerja yang berkaitan dengan Tri Dharma Perguruan Tinggi yaitu Pendidikan, Penelitian dan Pengabdian masyarakat. Semoga <em>website</em> ini  dapat memberikan informasi yang dibutuhkan oleh dosen, mahasiswa dan masyarakat umum yang berkaitan dengan  Program Studi Administrasi Pendidikan .</p><p style=\"margin-bottom: 1rem; font-family: Roboto, sans-serif; text-align: justify;\">Akhir kata, kami menyampaikan terima kasih dan penghargaan yang setinggi-tingginya kepada semua pihak yang telah membesarkan dan mengembangkan Program Studi Administrasi Pendidikan. Semoga <em>Allah Subhanahu Wa Ta’ala</em> senantiasa meridhoi amal ibadah kita, Aamiin.</p><p style=\"margin-bottom: 1rem; font-family: Roboto, sans-serif; text-align: justify;\"><em><span style=\"font-weight: bolder;\">Wassalamu’alaikum wr wb</span></em></p><p style=\"margin-bottom: 1rem; font-family: Roboto, sans-serif; text-align: justify;\"> </p><p style=\"margin-bottom: 1rem; font-family: Roboto, sans-serif; text-align: right;\">Kendari, 14 juni 2020</p><p style=\"margin-bottom: 1rem; font-family: Roboto, sans-serif; text-align: right;\">Kaprodi Administrasi Pendidikan,</p><p style=\"margin-bottom: 1rem; font-family: Roboto, sans-serif; text-align: right;\"> </p><p style=\"margin-bottom: 1rem; font-family: Roboto, sans-serif; text-align: right;\"> </p><p style=\"margin-bottom: 1rem; font-family: Roboto, sans-serif; text-align: right;\"><b>Pahendra</b></p><p style=\"margin-bottom: 1rem; font-family: Roboto, sans-serif; text-align: right;\">NIDN : 0910128502</p>', '<p class=\"western\" lang=\"id-ID\" align=\"justify\" style=\"margin-bottom: 1rem; font-family: Roboto, sans-serif;\"><span style=\"font-weight: bolder;\"><span lang=\"en-US\">VISI</span></span></p><p class=\"western\" lang=\"id-ID\" align=\"justify\" style=\"margin-bottom: 1rem; font-family: Roboto, sans-serif;\">Pada tahun 2020 menjadi program studi yang unggul di wilayah Indonesia Timur dalam bidang administrasi pendidikan yang profesional, berkarakter, mandiri, dan berakhlak mulia.</p><p class=\"western\" lang=\"id-ID\" align=\"justify\" style=\"margin-bottom: 1rem; font-family: Roboto, sans-serif;\"><span style=\"font-weight: bolder;\"><span lang=\"en-US\">MISI</span></span></p><ol style=\"margin-bottom: 1rem; font-family: Roboto, sans-serif;\"><li><p class=\"western\" lang=\"id-ID\" align=\"justify\" style=\"margin-bottom: 1rem;\">Menyelenggarakan pendidikan dan pengajaran yang bermutu untuk menghasilakan lulusan yang unggul dan kompetitif</p></li><li><p class=\"western\" lang=\"id-ID\" align=\"justify\" style=\"margin-bottom: 1rem;\">Mengembangkan dan menyelenggarakan penelitian ilmu pendidikan dengan memamnfaatkan aplikasi teknologi informasi</p></li><li><p class=\"western\" lang=\"id-ID\" align=\"justify\" style=\"margin-bottom: 1rem;\">Melakusanakan kegiatan pengabdian kepada masyarkaan sebagai salah satu proses pemantapan ilmu utuk masyarakat khususnya yang berkaitan dengan bidang pendidikan</p></li><li><p class=\"western\" lang=\"id-ID\" align=\"justify\" style=\"margin-bottom: 1rem;\">Mengintegrasikan nilai-nilai islam dan kemuhammadiyaan dalam ilmu pengetahuan dan teknologi, menuju keluhuran budi dan akhlaqul karimah</p></li></ol><p class=\"western\" lang=\"id-ID\" align=\"justify\" style=\"margin-bottom: 1rem; font-family: Roboto, sans-serif;\"><span style=\"font-weight: bolder;\"><span lang=\"en-US\">TUJUAN</span></span></p><p class=\"western\" lang=\"id-ID\" align=\"justify\" style=\"margin-bottom: 1rem; font-family: Roboto, sans-serif;\">Tujuan Progarm studi administrasi pendidikan FKIP UMK adalah:</p><ol style=\"margin-bottom: 1rem; font-family: Roboto, sans-serif;\"><li><p class=\"western\" lang=\"id-ID\" align=\"justify\" style=\"margin-bottom: 1rem;\">Menghasilakan lulusan yang profesional dalam bidang administrasi pendidikan</p></li><li><p class=\"western\" lang=\"id-ID\" align=\"justify\" style=\"margin-bottom: 1rem;\">Menghasilkan penelitian dan inovasi dalam bidang administrasi pendidikan</p></li><li><p class=\"western\" lang=\"id-ID\" align=\"justify\" style=\"margin-bottom: 1rem;\">Menghasilkan pengabdian kepada masyarakat yang mampu merespon perkembangan ilmu pengetahuan dan teknologi serta dapat malakukan upaya pembaharuan dalam pemberdayaan masyarakat dibidang administrasi pendidikan</p></li><li><p class=\"western\" lang=\"id-ID\" align=\"justify\" style=\"margin-bottom: 1rem;\">Menghasilkan lulusan yang beriman dan bertaqwa serta berahlaqul karimah dan berwawasan kemuhammadiyahan.</p></li></ol>', 'Screenshot from 2020-07-26 03-14-24.png');

-- --------------------------------------------------------

--
-- Table structure for table `paud_publish`
--

CREATE TABLE `paud_publish` (
  `id` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `view` int(5) NOT NULL,
  `date_created` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paud_publish`
--

INSERT INTO `paud_publish` (`id`, `jenis`, `slug`, `judul`, `isi`, `gambar`, `penulis`, `status`, `view`, `date_created`) VALUES
(45, 'pengumuman', 'ini-adalah-judul-pengumuman', 'ini adalah judul pengumuman', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. <br></p>', 'Screenshot from 2020-07-26 03-14-24.png', 'Admin', 1, 4, '2020-08-04'),
(46, 'pengumuman', 'ini-adalah-judul-berita', 'Ini adalah judul berita', '<p><span style=\"color: rgb(51, 51, 51); background-color: rgb(249, 249, 249);\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.&nbsp;</span><br></p>', 'IMG-20190910-WA0006.jpg', 'Admin', 1, 1, '2020-08-10 14:57:55'),
(50, 'berita', 'ini-adalah-judul-berita-pertama', 'Ini adalah judul berita pertama', '<p>ini adalah content berita</p>', 'IMG-20190910-WA0006.jpg', 'Admin', 1, 13, '2020-08-08'),
(51, 'berita', 'ini-adalah-berita-ke-2', 'ini adalah berita ke 2', '<p style=\"text-align: justify; \">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,&nbsp; quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod&nbsp; consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse&nbsp; &nbsp;cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non&nbsp; &nbsp;proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Screenshot from 2020-07-29 14-51-20.png', 'Admin', 1, 66, '2020-08-09'),
(52, 'berita', 'ini-adalah-judul-berita-3', 'Ini adalah judul berita 3', '<p><span style=\"color: rgb(51, 51, 51); text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,&nbsp; quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod&nbsp; consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse&nbsp; &nbsp;cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non&nbsp; &nbsp;proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><br></p>', 'Screenshot from 2020-07-26 03-14-24.png', 'Admin', 1, 24, '2020-08-09'),
(53, 'pengumuman', 'ini-adalah-pengumuman-ke-3', 'ini adalah pengumuman ke 3', '<p><span style=\"color: rgb(51, 51, 51); background-color: rgb(249, 249, 249);\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </span><br></p>', 'TVRI_1.jpeg', 'Admin', 1, 2, '2020-08-10 15:00:44'),
(54, 'pengumuman', 'ini-adalah-pengumuman-ke-4', 'ini adalah pengumuman ke 4', '<p><span style=\"color: rgb(51, 51, 51); background-color: rgb(249, 249, 249);\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </span><br></p>', 'Screenshot from 2020-08-08 12-44-10.png', 'Admin', 1, 0, '2020-08-10 15:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `paud_setting_web`
--

CREATE TABLE `paud_setting_web` (
  `id` int(11) NOT NULL,
  `nama_kaprodi` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(14) NOT NULL,
  `keyword` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paud_setting_web`
--

INSERT INTO `paud_setting_web` (`id`, `nama_kaprodi`, `website`, `email`, `alamat`, `telepon`, `keyword`, `foto`) VALUES
(1, 'pahendra, S.Pd., M.Pd', 'paud.fkipumkendari.ac.id', 'paud@gmail.com', 'kendari', '34534545', 'paud, fkipumkendari', 'avatar5.png');

-- --------------------------------------------------------

--
-- Table structure for table `paud_slider`
--

CREATE TABLE `paud_slider` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `date_created` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paud_slider`
--

INSERT INTO `paud_slider` (`id`, `judul`, `image`, `status`, `date_created`) VALUES
(11, 'slider 2', 'IMG-20190910-WA0006.jpg', 1, '2020-08-16'),
(12, 'slider 3', 'slider.png', 1, '2020-08-16'),
(14, 'slider 4', 'mac.jpg', 1, '2020-08-16');

-- --------------------------------------------------------

--
-- Table structure for table `paud_users`
--

CREATE TABLE `paud_users` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paud_users`
--

INSERT INTO `paud_users` (`id`, `nama_user`, `username`, `password`, `status`) VALUES
(1, 'Ardiman', 'ardiman', '740d1dfa7979333f829c0103b0637ea2f24b529e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penawaran_mhs`
--

CREATE TABLE `penawaran_mhs` (
  `id` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `khs` varchar(255) NOT NULL,
  `krs` varchar(255) NOT NULL,
  `sc_kuisioner` varchar(255) NOT NULL,
  `komentar_pa` text DEFAULT NULL,
  `jml_sks` int(11) DEFAULT NULL,
  `ip_smt_lalu` varchar(4) DEFAULT NULL,
  `semester` varchar(50) DEFAULT NULL,
  `thn_akademik` varchar(20) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `date_created` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penawaran_mhs`
--

INSERT INTO `penawaran_mhs` (`id`, `id_dosen`, `nim`, `bukti_pembayaran`, `khs`, `krs`, `sc_kuisioner`, `komentar_pa`, `jml_sks`, `ip_smt_lalu`, `semester`, `thn_akademik`, `status`, `date_created`) VALUES
(38, 25, '21711170', 'ef49f7b7b12bee74356e5e0db4ec54eb.png', 'ad4d8c7b4bb6c69e04c138734755b343.png', '6065643ce3c2bd80d038dd31df04d965.png', '6a24215d7133292535c69e8ff93cac7f.png', 'sdsads', 24, '4.0', 'genap', '2021/2022', 1, '2021-03-16'),
(39, 30, '21411032', 'a70d452e343bd0f6ee4d5828c35b0f8d.png', '6a9fcfe0e046cb59a7bed491efc627d9.png', '812549d310caf9019aa7948570b79509.png', 'ceeb4b6ab02a5edae740fc1015fd9cf9.png', 'asdasds', 20, '4.0', 'ganjil', '2021/2022', 1, '2020-09-01'),
(40, 30, '21411111', '276b2a81e575059677b5a602b47d5985.png', 'bde6ff8256d72cf08b91ec167160e70a.png', '412e0f0f067ef1764f4121ffc411f954.png', '8c1270816ac37e8d57852e7e494b4a4c.png', 'asdsad', 20, '4.0', 'ganjil', '2020/2021', 1, '2020-09-01'),
(41, 30, '21711170', 'ef49f7b7b12bee74356e5e0db4ec54eb.png', 'ad4d8c7b4bb6c69e04c138734755b343.png', '6065643ce3c2bd80d038dd31df04d965.png', '6a24215d7133292535c69e8ff93cac7f.png', 'sdsads', 24, '4.0', 'genap', '2021/2022', 1, '2021-03-16');

-- --------------------------------------------------------

--
-- Table structure for table `penawaran_mk_mhs`
--

CREATE TABLE `penawaran_mk_mhs` (
  `id` int(11) NOT NULL,
  `id_penawar` int(11) DEFAULT NULL,
  `nim` varchar(10) NOT NULL,
  `nama_matakuliah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penawaran_mk_mhs`
--

INSERT INTO `penawaran_mk_mhs` (`id`, `id_penawar`, `nim`, `nama_matakuliah`) VALUES
(76, NULL, '21711170', 'bahasa indonesia'),
(77, NULL, '21711170', 'matematika dasar'),
(78, NULL, '21711170', 'teknik jaringan'),
(79, NULL, '21711170', 'programming web'),
(80, NULL, '21711170', 'algoritma dan pemrograman'),
(81, NULL, '21411032', 'teknik jaringan'),
(82, NULL, '21411032', 'bahasa indonesia'),
(83, NULL, '21411111', 'teknik jaringan'),
(84, NULL, '21411111', 'matakuliah ditambah lagi'),
(85, 41, '21711170', 'matakuliah ditambah lagi'),
(86, 41, '21711170', 'matakuliah ditambah'),
(87, 41, '21711170', 'matakuliah ditambah');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_judul`
--

CREATE TABLE `pengajuan_judul` (
  `id` int(11) NOT NULL,
  `no_surat` int(4) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `semester` varchar(40) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `judul_penelitian` varchar(255) NOT NULL,
  `status` enum('diterima','pending','ditolak') NOT NULL,
  `ket` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `tgl_insert` varchar(100) NOT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan_judul`
--

INSERT INTO `pengajuan_judul` (`id`, `no_surat`, `nama`, `nim`, `semester`, `prodi`, `judul_penelitian`, `status`, `ket`, `file`, `tgl_insert`, `updated_at`) VALUES
(18, 234, 'mardan', '21712321', 'genap', '9', 'membangun webstie SDN 09 KABAENA', 'diterima', 'silahkan di download suratnya', '21712321-2020-07-16-240.pdf', '2020-07-15 05:17:58', '2020-07-16 07:48:15'),
(19, 125, 'Ardiman', '21711170', 'genap', '9', 'membangun website FKIP UMKENDARI menggunakan framework codeIgniter 3+ dan bootstrap', 'diterima', 'silahkan di download suratnya', '21711170-2020-07-16-609.pdf', '2020-07-16 07:53:09', '2020-07-16 08:24:38'),
(33, 342, 'Ardiman', '21711170', 'ganjil', '9', 'coba judul penelitiansds', 'diterima', NULL, NULL, '2021-01-24 02:22:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `id_prodi` int(11) DEFAULT NULL,
  `nim` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `no_wa` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `hak_akses` varchar(40) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `join` timestamp NULL DEFAULT NULL,
  `status_daftar_ujian` int(1) NOT NULL,
  `status` int(11) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `id_prodi`, `nim`, `password`, `token`, `nama_lengkap`, `no_wa`, `jenis_kelamin`, `hak_akses`, `image`, `email`, `join`, `status_daftar_ujian`, `status`, `updated_at`) VALUES
(3, 4, '21013092', '09cf1a48f3a57906580c8024616ea08570c6d9b8', NULL, 'Nurbianti', '085397377396', 'P', 'mahasiswa', NULL, NULL, '2020-07-07 10:00:00', 1, 0, ''),
(4, 9, '21111029', 'a6ea2ee9c3051dd40e875cf6a2f08660bd285dc3', NULL, 'Irsan', NULL, 'L', 'mahasiswa', NULL, NULL, '2020-06-30 10:00:00', 0, 0, ''),
(5, 9, '21212121', 'abc5ef78ecc20f69446cf960577f7b7c86cefea4', NULL, 'Dian', NULL, 'P', 'mahasiswa', NULL, NULL, '2020-04-18 10:00:00', 0, 0, ''),
(6, 4, '21213092', 'ff1df930ccc6c3575b922071a68cd21e24c488a6', NULL, 'Nasrul', '082349914570', 'L', 'mahasiswa', NULL, NULL, '2020-07-07 10:00:00', 1, 0, ''),
(7, 9, '21411032', 'eb6ad7898b39cbe79820c98183aec4eb0655b9b1', NULL, 'Siti Nursanti', NULL, 'P', 'mahasiswa', NULL, NULL, '2020-04-18 10:00:00', 1, 1, ''),
(8, 9, '21411049', '2c2bc04b212ba69b9d89a463ac32a217c0128b0b', NULL, 'Askam Rio', NULL, 'L', 'mahasiswa', NULL, NULL, '2020-06-02 10:00:00', 0, 0, ''),
(9, 9, '21411062', 'e6e4d4268a556551e01358ebe0927a27427dbbe2', 'lhSCaLtq6JIrFPDQnkmg1vpWGoXVTsu3Uzy4fc20', 'Andi asnal', NULL, 'L', 'mahasiswa', NULL, NULL, '2020-04-21 10:00:00', 1, 1, ''),
(11, 9, '21411111', 'd2d110ca6e65b8c18ea9ca64db72c8b3b00943e7', NULL, 'Ninsiar Woliktol', NULL, 'P', 'mahasiswa', NULL, NULL, '2020-06-28 10:00:00', 1, 1, ''),
(12, 9, '21411113', '030ace58cde11ba10eea7c97e9f384a86ff559d9', NULL, 'Muhammad Idul Akbar', NULL, 'L', 'mahasiswa', NULL, NULL, '2020-04-25 10:00:00', 1, 1, ''),
(13, 9, '21511007', 'e3a418fdfc10191b94de68f07ce60e58d5399136', NULL, 'Darmawati', NULL, 'P', 'mahasiswa', NULL, NULL, '2020-04-29 10:00:00', 0, 0, ''),
(14, 9, '21511011', 'ddf7d5318bcfc298d22b7d6f41820f529b32b320', NULL, 'Didik Irman Syaputra', '-', 'L', 'mahasiswa', NULL, NULL, '2020-07-07 10:00:00', 0, 0, ''),
(15, 9, '21511039', 'ef9c27ea38415a1720f08c999ce2786154e43438', NULL, 'lukman', NULL, 'L', 'mahasiswa', NULL, NULL, '2020-05-06 10:00:00', 1, 0, ''),
(16, 4, '21511041', '1276a9bb7846f0e4225d19e5805a80953458cdb5', NULL, 'Mega ilfiana', NULL, 'P', 'mahasiswa', NULL, NULL, '2020-05-01 10:00:00', 1, 0, ''),
(17, 9, '21511049', '8168de42fe99e762b6a4e14aa0349f598c99f40a', NULL, 'Novianti', NULL, 'P', 'mahasiswa', NULL, NULL, '2020-06-02 10:00:00', 1, 0, ''),
(18, 9, '21711170', '740d1dfa7979333f829c0103b0637ea2f24b529e', 'n38r7xvB2dMhEzwkYgCu0NsIQAFZcV9DjbLRfyqp', 'ardiman', '082290118200', 'L', 'mahasiswa', NULL, 'ardimandev98@gmail.com', '2020-08-10 17:00:00', 1, 0, '2021-01-24 19:56:49');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `slug_pengumuman` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi_pengumuman` text NOT NULL,
  `jenis_pengumuman` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `view_pengumuman` int(11) NOT NULL DEFAULT 0,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `id_user`, `slug_pengumuman`, `judul`, `isi_pengumuman`, `jenis_pengumuman`, `status`, `gambar`, `view_pengumuman`, `tanggal`) VALUES
(7, 1, '1-tim-umk-bersaing-di-monev-pkm', 'TIM UMK BERSAING DI MONEV PKM', '<p>Sebanyak 5 tim Program Kreativitas Mahasiswa (PKM)&nbsp;Universitas Muhammadiyah Kendari mengikuti mengikuti Monitoring dan Evaluasi (Monev) di Gedung Rektorat Universitas Halu Oleo &nbsp;pada Senin (1/7/19), yang menjadi tuan rumah pada pelaksanaan monev kali ini.</p>\r\n<p>Monev tersebut dilaksanakan untuk mengetahui perkembangan dan mengevaluasi pelaksanaan PKM di bidangnya oleh para mahasiswa yang proposal programnya berhasil mendapatkan pendanaan.</p>\r\n<p>Proses pendampingan terhadap mahasiswa yang mengikuti PKM ini sendiri sudah dilakukan sejak sebelum pendaftaran. Diungkapkan salah satu dosen pembimbing mahasiswa Ary Tamtama, para mahasiswa yang mendaftar ini merupakan kelompok yang telah dipersiapkan dengan matang. Dengan kata lain, kualitas program para mahasiswa ini sudah dinyatakan unggul, semua sudah dipersiapkan dengan baik.</p>\r\n<p>Dalam pelaksanaan monev ini, kami berfokus pada tiga komponen penilaian yang dilakukan dari tim juri yaitu, tim telah selesai menggunggah laporan kemajuan, presentasi hasil dari PKM, dan produk-produk &nbsp;apa saja yang telah dihasilkan</p>\r\n<p>Untuk persiapan monev, kami telah melakukan beberapa kali monev internal di UMK, harapan kami nantinya ada salah satu tim kita yang dapat berhasil lolos PIMNAS dan bersaing dengan Perguruan Tinggi lainnya di Universitas Udayana Bali, terangnya.</p>', 'pengumuman', 'publish', 'tim_pkm_21.png', 5, '2019-12-05, 11:12'),
(8, 1, '1-dosen-faperta-umk-raih-gelar-doktor', 'DOSEN FAPERTA UMK RAIH GELAR DOKTOR', '<p>Salah satu dosen tetap di Fakultas Pertanian (Faperta) Universitas Muhammadiyah Kendari (UMK), melaksanakan ujian Promosi Doktor Program Studi Ilmu Pertanian Konsentrasi Agribisnis di Program Doktor Pascasarjana Universitas Halu Oleo Kendari, Jumat (28/6/19).</p>\r\n<p>Ialah Ir.Hj.Hartati, M.Si., dosen tetap Fakultas Pertanian, yang juga merupakan Kepala Lembaga Kewirausahaan Universitas Muhammadiyah Kendari.</p>\r\n<div class=\"text_exposed_show\">\r\n<p>Dr. Ir.Hj.Hartati, M.Si., mengambil judul Disertasi &ldquo;Manajemen Risiko Usaha Ternak Ras Pedaging di Sulawesi Tenggara&rdquo;.</p>\r\n<p>Ketua Penguji Prof. Dr. Ir. R. Marzuki Iswandi., M.Si. mengapresiasi atas keberhasilan Dr. Ir. Hj. Hartati, M.Si ,dalam menyelesaikan studi S3 pada Pascasarjana Universitas Halu Oleo, dan menjadi salah satu dosen bergelar Doktor di Universitas Muhammadiyah Kendari, ucapnya.</p>\r\n<p>Dalam kesempatan kali ini Rektor Universitas Muhammadiyah Kendari, mengucapkan selamat atas gelar yang didapatkan salah satu dosen Faperta tersebut, harapanya, semoga dengan diraihnya Doktor Fakultas Pertanian ini, dapat membawa kemajuan dan peningkatan mutu di Universitas Muhamadiyah Kendari khususnya Fakultas Pertanian&rdquo; ungkap Amir Mahmud, S.PI., M.P.</p>\r\n</div>', 'utama', 'publish', 'sidang_doktor.png', 6, '2019-12-05, 11:12'),
(9, 1, '1-pts-pertama-terakreditasi-b-di-sulawesi-tenggara', 'PTS PERTAMA TERAKREDITASI B DI SULAWESI TENGGARA', '<p>Universitas Muhammadiyah Kendari (UMK) resmi terakreditasi B. Sebelumnya tim asesor Badan Akreditasi Nasional Perguruan Tinggi (BAN PT) telah melakukan visitasi di kampus ini pada 30 November 2018 dan hasilnya keluar pada Selasa, 4 Desember 2018.</p>\r\n<p>Rektor UMK Muhammad Nur mengatakan bahwa akreditas B merupakan target awal sewaktu tim visitasi BAN PT melakukan asesmen lapangan di UMK. Sebelumnya UMK masih menyandang akreditasi C.</p>\r\n<p>Suksesnya UMK menyandang akreditasi B tidak luput dari kerja keras civitas akademik dan mahasiswa yang ikut serta berkontribusi mewujudkan target akreditasi B ini, kata Muhammad Nur ditemui di ruang kerjanya, Rabu (5/12/2018).</p>\r\n<p>Muhammad Nur menambahkan, untuk meningkatkan akreditasi institusi, pihaknya telah memperbaiki sarana prasarana serta kebersihan dan keindahan kampus. Pembinaan mahasiswa juga sudah cukup bagus dan memiliki prestasi yang patut dibanggakan.</p>\r\n<p>Upaya peningkatan akreditasi institusi tersebut juga didukung akreditasi program studi yang rata terakrditasi B. Dari 14 program studi di UMK, ada empat yang masih terakreditasi C, yakni Prodi Arsitektur, Prodi Agribisnis, Prodi Pendidikan Luar Sekolah, dan Pendidikan TIK. Ini bukanlah akhir, tapi ini adalah awal bagi UMK untuk lebih menunjukkan diri kepada masyarakat Sultra, Indonesia dan dunia, terang Rektor UMK.</p>\r\n<p>Selanjutnya, ia berharap, perubahan akreditas institut dari C ke B bisa terus ditingkatkan sehingga kualitas pendidikan juga semakin meningkat.</p>\r\n<p>&nbsp;</p>', 'utama', 'publish', 'Sertifikat_APT_UNismuh_Kendari.jpg', 2, '2019-12-05, 11:12'),
(10, 10, '1-survey-kepuasan-mahasiswa-terhadap-perkuliahan-online-ditengah-wabah-covid-19', 'SURVEY KEPUASAN MAHASISWA TERHADAP PERKULIAHAN ONLINE DITENGAH WABAH COVID-19', '<p>Assalamu \'alaikum Mahasiswa/i Lingkup FKIP yang kami Banggakan<br /><br />Kami meminta kesediaan untuk dapat mengisi angket terkait perkuliahan online yang dilakukan selama wabah Covid-19 melanda Bumi anoa kita tercinta.<br />Kami berharap dengan mengisi angket ini pihak FKIP dapat bijaksana mengambil keputusan terkait perkuliahan online yang akan berlangsing hingga tanggal 31 April 2020.<br /><br />Mohon mengisi link dibawah ini</p>\r\n<p><a href=\"https://s.surveyplanet.com/qlbnBsAVb\">https://s.surveyplanet.com/qlbnBsAVb</a></p>\r\n<p>Atas kesediaannya kami ucapkan terimakasih<br />#jagakesehatan<br />#jagakebersihan<br />#jagadiridankeluarga<br />#tetaptinggaldirumah</p>\r\n<p>\"Karena 2 menit anda mengisi angket ini menentukan kebijakan pimpinan 2 bulan berikutnya\".&nbsp;&nbsp;</p>', 'pengumuman', 'publish', 'survey.jpg', 37, '2020-04-01, 14:04');

-- --------------------------------------------------------

--
-- Table structure for table `pimpinan`
--

CREATE TABLE `pimpinan` (
  `id` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `id_prodi` int(11) DEFAULT NULL,
  `nidn` varchar(100) NOT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pimpinan`
--

INSERT INTO `pimpinan` (`id`, `nama`, `jabatan`, `email`, `jenis_kelamin`, `id_prodi`, `nidn`, `foto`) VALUES
('0394503IOI239234', 'Tri Indah Rusli, S.Pd, M.Pd', 'Dekan FKIP', 'triIndah@gmail.con', 'P', 0, '0907068602', ''),
('3253453LKDFS6767', 'Arif Rahman Wibowo, S.T, M.Eng', 'KETUA LPPM', 'hasma@gmail.com', 'L', 3, '0922059102', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plp_magang_sekolah`
--

CREATE TABLE `plp_magang_sekolah` (
  `id` int(11) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kuota` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plp_magang_sekolah`
--

INSERT INTO `plp_magang_sekolah` (`id`, `nama_sekolah`, `alamat`, `kuota`, `status`) VALUES
(2, 'SMA 6 KENDARI', 'Jl. Banda No.Kelurahan, Punggolaka, Puuwatu, Kota Kendari, Sulawesi Tenggara 93115', 10, '0'),
(9, 'SMA MUHAMMADIYAH', 'JL. K.H. Ahmad Dahlan No.19, Kandai, Kendari, Kendari City, South East Sulawesi 93127', 7, '0'),
(10, 'SMK TELKOM', 'Jl. Jend. AH. Nasution, Kambu, Kec. Kambu, Kota Kendari, Sulawesi Tenggara 93561', 7, '0'),
(12, 'SMK N 1 KENDARI', 'Jl. Jend. Ahmad Yani No.17, Bende, Kec. Kadia, Kota Kendari, Sulawesi Tenggara 93117', 7, '0'),
(13, 'SMKN 4 KENDARI', 'Jl. Kijang, Rahandouna, Poasia, Kota Kendari, Sulawesi Tenggara 93231', 10, '0'),
(14, 'SMK N 5 KENDARI', 'Jl. Ir. Soekarno No.49, Dapu-Dapura, Kendari Bar., Kota Kendari, Sulawesi Tenggara 93126', 4, '0');

-- --------------------------------------------------------

--
-- Table structure for table `ppl_nilai`
--

CREATE TABLE `ppl_nilai` (
  `id` varchar(100) NOT NULL,
  `nim` varchar(40) NOT NULL,
  `nilai1` int(11) NOT NULL,
  `nilai2` int(11) NOT NULL,
  `nilai3` int(11) NOT NULL,
  `n_akhir1` int(11) NOT NULL,
  `n_akhir2` int(11) NOT NULL,
  `n_akhir3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppl_nilai`
--

INSERT INTO `ppl_nilai` (`id`, `nim`, `nilai1`, `nilai2`, `nilai3`, `n_akhir1`, `n_akhir2`, `n_akhir3`) VALUES
('1c082c1c-40ac-4d32-91a2-72517119ba19', '21610112', 90, 70, 85, 3600, 2800, 1700),
('55647dc5-71bb-4f2b-98b1-15f5f61227a6', '21711172', 80, 90, 95, 3200, 3600, 1900),
('5ef47d10-d172-4ea9-926a-efeec2a2d1eb', '21711170', 90, 90, 90, 3600, 3600, 1800),
('d6b30b93-4a9b-4395-9eb9-63d0cb85c533', '21711011', 90, 97, 80, 3600, 3880, 1600);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `kode_prodi` varchar(100) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `jenjang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `kode_prodi`, `nama_prodi`, `status`, `jenjang`) VALUES
(3, '83207', 'pendidikan teknologi informasi', 'A', 'S1'),
(4, '88203', 'pendidikan bahasa inggris', 'A', 'S1'),
(7, '86205', 'Pendidikan Masyarakat', 'B', 'S1'),
(8, '86207', 'Pendidikan Guru Pendidikan Anak Usia Dini', 'B', 'S1'),
(9, 'AD0833', 'administrasi pendidikan', 'B', 's1');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `sejarah` text NOT NULL,
  `visi_misi` text NOT NULL,
  `struktur_organisasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `sejarah`, `visi_misi`, `struktur_organisasi`) VALUES
(1, '<p><strong>Visi Misi dan Tujuan </strong></p>\r\n\r\n<p>VISI Pada tahun 2029, FKIP UMK menjadi Lembaga Pendidikan Tenaga Kependidikan yang menghasilkan tenaga pendidik profesional berkepribadian islami, dan memberi arah perubahan. MISI Menyelenggarakan pendidikan, pelatihan, dan pembimbingan untuk menghasilkan tenaga pendidik yang CAKAP (Cerdas, Amanah, Kompeten, Andal, dan Pembaharu), berjiwa wirausaha dan berkepribadian Islami. Melaksanakan penelitian dan pengembangan untuk menghasilkan IPTEKS yang mendukung peningkatan kualitas pendidikan, pelatihan, dan pembimbingan. Menyelenggarakan kegiatan pengabdian kepada masyarakat dalam bidang kependidikan. TUJUAN Menghasilkan lulusan yang cerdas, amanah, kompeten, andal, dan pembaharu, serta berkepribadian Islami sesuai dengan kompetensi pendidik. Menghasilkan penelitian yang dapat digunakan untuk meningkatkan kualitas proses dan hasil pembelajaran dan Melaksanakan pengabdian pada masyarakat yang terkait dengan penerapan ilmu pengetahuan dan teknologi dalam pendidikan dan kewirausahaan.</p>\r\n', '<p>ini adalah isi dan misi edit</p>\r\n', 'mac.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rab_bukti`
--

CREATE TABLE `rab_bukti` (
  `id` int(11) NOT NULL,
  `id_rab` varchar(255) NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rab_bukti`
--

INSERT INTO `rab_bukti` (`id`, `id_rab`, `bukti`) VALUES
(10, 'd917e244-c6eb-43c6-81d4-175c5ac784a1', '2fa75795272e22a6db4707140d3848e9.jpeg'),
(11, 'd917e244-c6eb-43c6-81d4-175c5ac784a1', '58e266502f821cd3dc6985ca4cd88683.jpeg'),
(12, 'd917e244-c6eb-43c6-81d4-175c5ac784a1', '3dbb2f6bcd57cf8547928fafc9939e99.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `rab_insentif_pembimbingan`
--

CREATE TABLE `rab_insentif_pembimbingan` (
  `id` int(11) NOT NULL,
  `id_surat` varchar(255) NOT NULL,
  `id_dosen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rab_insentif_pembimbingan`
--

INSERT INTO `rab_insentif_pembimbingan` (`id`, `id_surat`, `id_dosen`) VALUES
(79, '0f973082-7f49-401b-872d-3a6977926ae2', 22),
(80, '0f973082-7f49-401b-872d-3a6977926ae2', 37);

-- --------------------------------------------------------

--
-- Table structure for table `rab_insentif_pengelola`
--

CREATE TABLE `rab_insentif_pengelola` (
  `id` int(11) NOT NULL,
  `id_surat` varchar(255) NOT NULL DEFAULT '0',
  `nama_anggota` varchar(255) NOT NULL DEFAULT '0',
  `jabatan` varchar(100) NOT NULL DEFAULT '0',
  `jml_mhs` int(11) NOT NULL DEFAULT 0,
  `insentif` int(11) NOT NULL DEFAULT 0,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rab_insentif_pengelola`
--

INSERT INTO `rab_insentif_pengelola` (`id`, `id_surat`, `nama_anggota`, `jabatan`, `jml_mhs`, `insentif`, `total`) VALUES
(155, 'a10b0812-29a5-4125-a592-c4c136b921c5', 'rahmat nasrullah', 'ka_prodi', 2, 35000, 70000),
(156, 'a10b0812-29a5-4125-a592-c4c136b921c5', 'sahid', 'staff_keuangan', 2, 30000, 60000),
(157, 'a10b0812-29a5-4125-a592-c4c136b921c5', 'ardiman', 'staff_administrasi', 2, 30000, 60000),
(158, 'a10b0812-29a5-4125-a592-c4c136b921c5', 'rey nilda, S.Pd', 'staff_fakultas', 2, 10000, 20000),
(159, '7c75a469-42b5-4e07-83c3-4733a825c1cb', 'rahmat nasrullah', 'ka_prodi', 2, 35000, 70000),
(160, '7c75a469-42b5-4e07-83c3-4733a825c1cb', 'sahid', 'staff_keuangan', 2, 30000, 60000),
(161, '7c75a469-42b5-4e07-83c3-4733a825c1cb', 'ardiman', 'staff_administrasi', 2, 30000, 60000),
(162, '7c75a469-42b5-4e07-83c3-4733a825c1cb', 'rey nilda, S.Pd', 'staff_fakultas', 2, 10000, 20000),
(163, 'a1730a38-3aeb-4297-be8f-13fc569c0035', 'rahmat ', 'ka_prodi', 2, 35000, 70000),
(164, 'a1730a38-3aeb-4297-be8f-13fc569c0035', 'sahid', 'staff_keuangan', 2, 30000, 60000),
(165, 'a1730a38-3aeb-4297-be8f-13fc569c0035', 'ardiman', 'staff_administrasi', 2, 30000, 60000),
(166, 'a1730a38-3aeb-4297-be8f-13fc569c0035', 'rey nilda', 'staff_fakultas', 2, 10000, 20000),
(170, 'd917e244-c6eb-43c6-81d4-175c5ac784a1', 'Rahmat', 'staff_keuangan', 2, 30000, 60000),
(171, '5f9f7fc9-1175-4b06-9d4d-fe1c3a717338', 'tri', 'staff_keuangan', 2, 30000, 60000),
(172, '5f9f7fc9-1175-4b06-9d4d-fe1c3a717338', 'juna', 'staff_administrasi', 2, 30000, 60000),
(173, 'e066328c-fa2f-4546-ac53-344c3427a309', 'Rahmat', 'ka_prodi', 3, 35000, 105000),
(174, '3dce9e89-14ec-465e-b9aa-fe6255fb6964', 'Rahmat', 'ka_prodi', 2, 35000, 70000);

-- --------------------------------------------------------

--
-- Table structure for table `rab_insentif_penguji`
--

CREATE TABLE `rab_insentif_penguji` (
  `id` int(11) NOT NULL,
  `id_surat` varchar(255) NOT NULL DEFAULT '0',
  `nama_anggota` varchar(255) NOT NULL DEFAULT '0',
  `jabatan` varchar(50) NOT NULL DEFAULT '0',
  `jml_mhs` int(11) NOT NULL DEFAULT 0,
  `insentif` int(11) NOT NULL DEFAULT 0,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rab_insentif_penguji`
--

INSERT INTO `rab_insentif_penguji` (`id`, `id_surat`, `nama_anggota`, `jabatan`, `jml_mhs`, `insentif`, `total`) VALUES
(174, 'a10b0812-29a5-4125-a592-c4c136b921c5', '25', 'ketua', 2, 100000, 200000),
(175, 'a10b0812-29a5-4125-a592-c4c136b921c5', '33', 'sekretaris', 2, 90000, 180000),
(176, 'a10b0812-29a5-4125-a592-c4c136b921c5', '38', 'anggota', 2, 85000, 170000),
(177, 'a10b0812-29a5-4125-a592-c4c136b921c5', '40', 'anggota', 2, 85000, 170000),
(178, '7c75a469-42b5-4e07-83c3-4733a825c1cb', '25', 'ketua', 2, 100000, 200000),
(179, '7c75a469-42b5-4e07-83c3-4733a825c1cb', '33', 'sekretaris', 2, 90000, 180000),
(180, '7c75a469-42b5-4e07-83c3-4733a825c1cb', '38', 'anggota', 2, 85000, 170000),
(181, '7c75a469-42b5-4e07-83c3-4733a825c1cb', '40', 'anggota', 2, 85000, 170000),
(182, 'a1730a38-3aeb-4297-be8f-13fc569c0035', '54', 'ketua', 2, 100000, 200000),
(183, 'a1730a38-3aeb-4297-be8f-13fc569c0035', '61', 'sekretaris', 2, 90000, 180000),
(184, 'a1730a38-3aeb-4297-be8f-13fc569c0035', '33', 'anggota', 2, 85000, 170000),
(185, 'a1730a38-3aeb-4297-be8f-13fc569c0035', '38', 'anggota', 2, 85000, 170000),
(189, 'd917e244-c6eb-43c6-81d4-175c5ac784a1', '40', 'ketua', 2, 100000, 200000),
(190, 'd917e244-c6eb-43c6-81d4-175c5ac784a1', '33', 'sekretaris', 2, 90000, 180000),
(191, '5f9f7fc9-1175-4b06-9d4d-fe1c3a717338', '33', 'ketua', 2, 100000, 200000),
(192, '5f9f7fc9-1175-4b06-9d4d-fe1c3a717338', '38', 'sekretaris', 2, 90000, 180000),
(193, 'e066328c-fa2f-4546-ac53-344c3427a309', '22', 'ketua', 3, 100000, 300000),
(194, 'e066328c-fa2f-4546-ac53-344c3427a309', '36', 'sekretaris', 3, 90000, 270000),
(195, '3dce9e89-14ec-465e-b9aa-fe6255fb6964', '33', 'ketua', 2, 100000, 200000),
(196, '3dce9e89-14ec-465e-b9aa-fe6255fb6964', '38', 'sekretaris', 2, 90000, 180000);

-- --------------------------------------------------------

--
-- Table structure for table `rab_insentif_pkb`
--

CREATE TABLE `rab_insentif_pkb` (
  `id` int(11) NOT NULL,
  `id_surat` varchar(255) NOT NULL DEFAULT '0',
  `nama` varchar(100) NOT NULL DEFAULT '0',
  `jml_mhs` int(11) NOT NULL DEFAULT 0,
  `insentif` int(11) NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rab_insentif_pkb`
--

INSERT INTO `rab_insentif_pkb` (`id`, `id_surat`, `nama`, `jml_mhs`, `insentif`, `total`) VALUES
(100, 'a10b0812-29a5-4125-a592-c4c136b921c5', 'Pa mesa', 2, 10000, 20000),
(101, '7c75a469-42b5-4e07-83c3-4733a825c1cb', 'Pa mesa', 2, 10000, 20000),
(102, 'a1730a38-3aeb-4297-be8f-13fc569c0035', 'C ronaldo', 2, 10000, 20000),
(104, 'd917e244-c6eb-43c6-81d4-175c5ac784a1', 'Operator Prodi', 2, 10000, 20000),
(105, '5f9f7fc9-1175-4b06-9d4d-fe1c3a717338', 'Operator Prodi', 2, 10000, 20000),
(106, 'e066328c-fa2f-4546-ac53-344c3427a309', 'Operator Prodi', 3, 10000, 30000),
(107, '3dce9e89-14ec-465e-b9aa-fe6255fb6964', 'Operator Prodi', 2, 10000, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `rab_mhs_bimbingan`
--

CREATE TABLE `rab_mhs_bimbingan` (
  `id` int(11) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `nama_mhs` varchar(255) DEFAULT NULL,
  `pbb` int(2) DEFAULT NULL,
  `insentif` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rab_mhs_bimbingan`
--

INSERT INTO `rab_mhs_bimbingan` (`id`, `id_dosen`, `nama_mhs`, `pbb`, `insentif`) VALUES
(122, 22, 'putra', 1, 300000),
(123, 22, 'reni', 1, 300000),
(124, 37, 'ardian', 1, 300000),
(125, 37, 'Ardiman', 2, 250000);

-- --------------------------------------------------------

--
-- Table structure for table `rab_pemb1`
--

CREATE TABLE `rab_pemb1` (
  `id` int(11) NOT NULL,
  `id_surat` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jumlah_mhs` int(3) NOT NULL,
  `insentif` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rab_pemb2`
--

CREATE TABLE `rab_pemb2` (
  `id` int(11) NOT NULL,
  `id_surat` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jumlah_mhs` int(3) NOT NULL,
  `insentif` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rab_ujian_surat`
--

CREATE TABLE `rab_ujian_surat` (
  `id` int(11) NOT NULL,
  `id_jenis_ujian` int(11) NOT NULL,
  `id_surat` varchar(255) NOT NULL DEFAULT '0',
  `id_prodi` int(11) NOT NULL DEFAULT 0,
  `no_sk` int(11) NOT NULL,
  `A1` int(11) NOT NULL DEFAULT 0,
  `A2` int(11) NOT NULL DEFAULT 0,
  `A3` int(11) NOT NULL DEFAULT 0,
  `A4` int(11) NOT NULL DEFAULT 0,
  `A5` int(11) NOT NULL DEFAULT 0,
  `A6` int(11) NOT NULL DEFAULT 0,
  `A7` int(11) NOT NULL DEFAULT 0,
  `A8` int(11) NOT NULL DEFAULT 0,
  `A9` int(11) NOT NULL DEFAULT 0,
  `A10` int(11) NOT NULL DEFAULT 0,
  `A11` int(11) NOT NULL DEFAULT 0,
  `A12` int(11) NOT NULL DEFAULT 0,
  `J1` int(11) NOT NULL DEFAULT 0,
  `J2` int(11) NOT NULL DEFAULT 0,
  `J3` int(11) NOT NULL DEFAULT 0,
  `J4` int(11) NOT NULL DEFAULT 0,
  `J5` int(11) NOT NULL DEFAULT 0,
  `J6` int(11) NOT NULL DEFAULT 0,
  `J7` int(11) NOT NULL DEFAULT 0,
  `J8` int(11) NOT NULL DEFAULT 0,
  `J9` int(11) NOT NULL DEFAULT 0,
  `J10` int(11) NOT NULL DEFAULT 0,
  `jumlah_p` int(11) DEFAULT NULL,
  `J11` int(11) NOT NULL DEFAULT 0,
  `J12` int(11) NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL DEFAULT 0,
  `saldo` int(11) NOT NULL DEFAULT 0,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `jumlah_pengajuan` int(11) NOT NULL,
  `no_rekening` varchar(255) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `jenis_byr` varchar(11) NOT NULL,
  `date_created` varchar(50) NOT NULL DEFAULT '0',
  `jml_mhs_pemb` int(11) DEFAULT NULL,
  `total_insentif_pemb` int(11) DEFAULT NULL,
  `jml_mhs_pemb2` int(11) DEFAULT NULL,
  `total_insentif_pemb2` int(11) DEFAULT NULL,
  `upload_laporan` varchar(255) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rab_ujian_surat`
--

INSERT INTO `rab_ujian_surat` (`id`, `id_jenis_ujian`, `id_surat`, `id_prodi`, `no_sk`, `A1`, `A2`, `A3`, `A4`, `A5`, `A6`, `A7`, `A8`, `A9`, `A10`, `A11`, `A12`, `J1`, `J2`, `J3`, `J4`, `J5`, `J6`, `J7`, `J8`, `J9`, `J10`, `jumlah_p`, `J11`, `J12`, `total`, `saldo`, `nama`, `jabatan`, `jumlah_pengajuan`, `no_rekening`, `nama_bank`, `jenis_byr`, `date_created`, `jml_mhs_pemb`, `total_insentif_pemb`, `jml_mhs_pemb2`, `total_insentif_pemb2`, `upload_laporan`, `updated_at`) VALUES
(154, 2, 'a10b0812-29a5-4125-a592-c4c136b921c5', 9, 0, 2, 2, 2, 4, 2, 4, 4, 1, 2, 2, 2, 2, 1400000, 200000, 180000, 340000, 210000, 140000, 120000, 30000, 20000, 20000, 1260000, 30000, 56000, 1290000, 110000, 'Ardiman', 'staff fakultas', 1260000, '5499234000896', 'BSM', 'rekening', '2020-10-17', NULL, NULL, NULL, NULL, NULL, NULL),
(155, 2, '7c75a469-42b5-4e07-83c3-4733a825c1cb', 9, 0, 2, 2, 2, 4, 2, 4, 4, 1, 2, 2, 2, 2, 1400000, 200000, 180000, 340000, 210000, 140000, 120000, 30000, 20000, 20000, 1260000, 30000, 56000, 1290000, 110000, 'Ardiman', 'staff fakultas', 1260000, '5499234000896', 'BSM', 'rekening', '2020-10-17', NULL, NULL, NULL, NULL, NULL, NULL),
(156, 1, 'a1730a38-3aeb-4297-be8f-13fc569c0035', 9, 0, 2, 2, 2, 4, 2, 4, 4, 1, 2, 2, 2, 2, 1400000, 200000, 180000, 340000, 210000, 140000, 120000, 30000, 20000, 20000, 1260000, 30000, 56000, 1290000, 110000, 'Ardiman', 'staff fakultas', 1260000, '5499234-000896', 'mandiri', 'rekening', '2020-10-18', NULL, NULL, NULL, NULL, NULL, NULL),
(158, 1, 'd917e244-c6eb-43c6-81d4-175c5ac784a1', 4, 123, 2, 2, 2, 2, 2, 4, 4, 1, 2, 2, 2, 2, 1400000, 200000, 180000, 170000, 210000, 120000, 120000, 30000, 20000, 20000, 1070000, 30000, 56000, 1100000, 300000, 'Ardiman', 'staff ', 1070000, '7142820409', 'mandiri', 'rekening', '2021-04-21', NULL, NULL, NULL, NULL, NULL, NULL),
(159, 1, '5f9f7fc9-1175-4b06-9d4d-fe1c3a717338', 9, 123, 2, 2, 2, 4, 2, 4, 4, 1, 2, 2, 2, 2, 1400000, 200000, 180000, 340000, 210000, 120000, 120000, 30000, 20000, 20000, 1240000, 30000, 56000, 1270000, 130000, 'Ardiman', 'staff fakultas', 1240000, '242343434343', 'mandiri', 'rekening', '2021-06-09', NULL, NULL, NULL, NULL, NULL, NULL),
(160, 1, 'e066328c-fa2f-4546-ac53-344c3427a309', 9, 234, 3, 3, 3, 9, 3, 4, 5, 1, 3, 3, 3, 3, 2100000, 300000, 270000, 765000, 315000, 120000, 150000, 30000, 30000, 30000, 2010000, 45000, 84000, 2055000, 45000, 'misran asrofil', 'staff PAUD', 2010000, '242343434343', 'BSM', 'rekening', '2021-06-09', NULL, NULL, NULL, NULL, NULL, NULL),
(161, 1, '3dce9e89-14ec-465e-b9aa-fe6255fb6964', 9, 125, 2, 2, 2, 4, 2, 4, 4, 1, 2, 2, 2, 2, 1400000, 200000, 180000, 340000, 210000, 120000, 120000, 30000, 20000, 20000, 1240000, 30000, 56000, 1270000, 130000, 'Sahid', 'Staff', 1240000, '7142820409', 'BSI', 'rekening', '2021-06-09', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `raw`
--

CREATE TABLE `raw` (
  `id` int(11) NOT NULL,
  `id_raw` varchar(255) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `jml_mhs` int(11) NOT NULL,
  `j1` int(11) NOT NULL,
  `j2` int(11) NOT NULL,
  `j3` int(11) NOT NULL,
  `j4` int(11) NOT NULL,
  `j5` int(11) NOT NULL,
  `t1` int(11) NOT NULL,
  `j6` int(11) NOT NULL,
  `j7` int(11) NOT NULL,
  `t2` int(11) NOT NULL,
  `j8` int(11) NOT NULL,
  `j9` int(11) NOT NULL,
  `j10` int(11) NOT NULL,
  `j11` int(11) NOT NULL,
  `j12` int(11) NOT NULL,
  `t3` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_diajukan` varchar(50) DEFAULT NULL,
  `date_created` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `raw`
--

INSERT INTO `raw` (`id`, `id_raw`, `id_prodi`, `jml_mhs`, `j1`, `j2`, `j3`, `j4`, `j5`, `t1`, `j6`, `j7`, `t2`, `j8`, `j9`, `j10`, `j11`, `j12`, `t3`, `status`, `tgl_diajukan`, `date_created`) VALUES
(10, '4d2ff7a2-306f-42a3-b77f-82d786a17696', 9, 50, 1250000, 1250000, 300000, 2250000, 1250000, 7550000, 250000, 300000, 550000, 250000, 750000, 500000, 500000, 250000, 2250000, 1, '2020-09-12', '2020-09-12'),
(15, 'a6b29172-671a-474c-8005-65c343533687', 4, 47, 1175000, 1175000, 282000, 2115000, 1175000, 7097000, 235000, 282000, 517000, 235000, 705000, 470000, 470000, 235000, 2115000, 1, '2020-09-14', '2020-09-14');

-- --------------------------------------------------------

--
-- Table structure for table `raw_konfig`
--

CREATE TABLE `raw_konfig` (
  `id` int(11) NOT NULL,
  `pemb_transkrip_nilai` int(11) DEFAULT NULL,
  `pemb_akta` int(11) DEFAULT NULL,
  `materai` int(11) DEFAULT NULL,
  `skpi` int(11) DEFAULT NULL,
  `buku` int(11) DEFAULT NULL,
  `pemb_skpi` int(11) DEFAULT NULL,
  `ttd_skpi_dekan` int(11) DEFAULT NULL,
  `ttd_skpi_prodi` int(11) DEFAULT NULL,
  `kas_fakultas` int(11) DEFAULT NULL,
  `kas_prodi` int(11) DEFAULT NULL,
  `akta_mengajar` int(11) DEFAULT NULL,
  `transkrip_nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `raw_konfig`
--

INSERT INTO `raw_konfig` (`id`, `pemb_transkrip_nilai`, `pemb_akta`, `materai`, `skpi`, `buku`, `pemb_skpi`, `ttd_skpi_dekan`, `ttd_skpi_prodi`, `kas_fakultas`, `kas_prodi`, `akta_mengajar`, `transkrip_nilai`) VALUES
(1, 25000, 25000, 6000, 45000, 50000, 5000, 15000, 10000, 10000, 5000, 5000, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `raw_pengelola`
--

CREATE TABLE `raw_pengelola` (
  `id` int(11) NOT NULL,
  `id_raw` varchar(255) NOT NULL,
  `nama_pengelola` varchar(255) NOT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `raw_pengelola`
--

INSERT INTO `raw_pengelola` (`id`, `id_raw`, `nama_pengelola`, `jabatan`, `jumlah`) VALUES
(37, '4d2ff7a2-306f-42a3-b77f-82d786a17696', 'Junaidin, S.Pd, M.Pd', 'ketua program studi', '933334'),
(38, '4d2ff7a2-306f-42a3-b77f-82d786a17696', 'Rahmawati M, S.Pd, M.Pd', 'staff administrasi', '933334'),
(39, '4d2ff7a2-306f-42a3-b77f-82d786a17696', 'Marliana', 'staff administrasi', '933334'),
(52, 'a6b29172-671a-474c-8005-65c343533687', 'Rahmat Nasrullah, S.Pd, M.Hum', 'ketua program studi', '705000'),
(53, 'a6b29172-671a-474c-8005-65c343533687', 'Sahid', 'staff akademik', '705000'),
(54, 'a6b29172-671a-474c-8005-65c343533687', 'Fharanita, S.Pd', 'staff administrasi', '705000');

-- --------------------------------------------------------

--
-- Table structure for table `repository`
--

CREATE TABLE `repository` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `repository`
--

INSERT INTO `repository` (`id`, `type`, `nama_file`, `file`) VALUES
(5, 'tipe1', 'file 1', 'PENYUSUNAN_LAPORAN_HASIL_PENELITIAN_TINDAKAN_KELAS.pdf'),
(6, 'tipe2', 'file 1', 'c7293f70e4f59322403c43d930a78dc1.pdf'),
(7, 'panduan_dan_pedoman', 'Standar mutu prodi', 'PENYUSUNAN_LAPORAN_HASIL_PENELITIAN_TINDAKAN_KELAS1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `repo_plp`
--

CREATE TABLE `repo_plp` (
  `id` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `file` varchar(255) NOT NULL,
  `link_youtube` varchar(255) NOT NULL,
  `ket` text NOT NULL,
  `date_created` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `repo_plp`
--

INSERT INTO `repo_plp` (`id`, `nim`, `file`, `link_youtube`, `ket`, `date_created`) VALUES
(1, '21711170', '7c2b885fda18c75f82b555025ee393ec.pdf', 'https://www.youtube.com/watch?v=YyDmcAg-mM8', 'ket', '2020-10-20');

-- --------------------------------------------------------

--
-- Table structure for table `repo_skripsi`
--

CREATE TABLE `repo_skripsi` (
  `id` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `skripsi` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `repo_skripsi`
--

INSERT INTO `repo_skripsi` (`id`, `id_prodi`, `nim`, `skripsi`, `date_created`) VALUES
(3, 9, '21711170', 'skripsi-21711170-1639153280.pdf', '2021-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `skpi_keahlian`
--

CREATE TABLE `skpi_keahlian` (
  `id` int(11) NOT NULL,
  `id_skpi` int(11) NOT NULL,
  `nama_keahlian` text NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skpi_keahlian`
--

INSERT INTO `skpi_keahlian` (`id`, `id_skpi`, `nama_keahlian`, `bukti`) VALUES
(1, 15, 'ghkhjkljhk', 'skpi-4-2021-07-07-758.png'),
(2, 15, 'gfkhjgjkghj', 'skpi-4-2021-07-07-105.png');

-- --------------------------------------------------------

--
-- Table structure for table `skpi_magang`
--

CREATE TABLE `skpi_magang` (
  `id` int(11) NOT NULL,
  `id_skpi` int(11) NOT NULL,
  `nama_lokasi` text NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `skpi_mahasiswa`
--

CREATE TABLE `skpi_mahasiswa` (
  `id` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `No` int(11) DEFAULT NULL,
  `nim` varchar(50) NOT NULL,
  `no_ijazah` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(40) NOT NULL,
  `tgl_lahir` varchar(100) NOT NULL,
  `tahun_masuk` varchar(5) NOT NULL,
  `tahun_lulus` varchar(5) NOT NULL,
  `status` enum('Diterima','Pending','Ditolak') NOT NULL,
  `date_created` varchar(40) NOT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skpi_mahasiswa`
--

INSERT INTO `skpi_mahasiswa` (`id`, `id_prodi`, `No`, `nim`, `no_ijazah`, `tempat_lahir`, `tgl_lahir`, `tahun_masuk`, `tahun_lulus`, `status`, `date_created`, `updated_at`) VALUES
(15, 9, 256, '21711170', '7459/IUDHI', 'matabubu', '2021-07-07', '2017', '2021', 'Diterima', '2021-07-07', '2021-08-03');

-- --------------------------------------------------------

--
-- Table structure for table `skpi_organisasi`
--

CREATE TABLE `skpi_organisasi` (
  `id` int(11) NOT NULL,
  `id_skpi` int(11) NOT NULL,
  `nama_organisasi` text NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skpi_organisasi`
--

INSERT INTO `skpi_organisasi` (`id`, `id_skpi`, `nama_organisasi`, `bukti`) VALUES
(1, 15, 'sdgsdgfsd', 'skpi-3-2021-07-07-458.png'),
(2, 15, 'ukhjkhjk', 'skpi-3-2021-07-07-143.png');

-- --------------------------------------------------------

--
-- Table structure for table `skpi_pelatihan`
--

CREATE TABLE `skpi_pelatihan` (
  `id` int(11) NOT NULL,
  `id_skpi` int(11) NOT NULL,
  `nama_kegiatan` text NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skpi_pelatihan`
--

INSERT INTO `skpi_pelatihan` (`id`, `id_skpi`, `nama_kegiatan`, `bukti`) VALUES
(5, 15, 'sadfsdf update', 'skpi-2-2021-07-07-251.png'),
(6, 15, 'sadfsdf update', 'skpi-2-2021-07-07-936.png');

-- --------------------------------------------------------

--
-- Table structure for table `skpi_penghargaan`
--

CREATE TABLE `skpi_penghargaan` (
  `id` int(11) NOT NULL,
  `id_skpi` int(11) NOT NULL,
  `kegiatan` text NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skpi_penghargaan`
--

INSERT INTO `skpi_penghargaan` (`id`, `id_skpi`, `kegiatan`, `bukti`) VALUES
(47, 15, 'u', 'sdfsd'),
(48, 15, 'u', 'fghfgh');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id` int(11) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nama_panggilan` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` varchar(40) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `smt` int(1) NOT NULL,
  `angkatan` varchar(5) NOT NULL,
  `no_hp` int(15) NOT NULL,
  `alamat` text NOT NULL,
  `minat_bakat` varchar(255) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `suku` varchar(50) NOT NULL,
  `upaya` text DEFAULT NULL,
  `saran` text DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surat_aktif_kuliah`
--

CREATE TABLE `surat_aktif_kuliah` (
  `id_aktif_kuliah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_surat` int(4) DEFAULT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nim` varchar(40) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `semester` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `nama_ortu` varchar(60) NOT NULL,
  `nip` varchar(40) DEFAULT NULL,
  `pangkat` varchar(80) DEFAULT NULL,
  `jabatan` varchar(80) DEFAULT NULL,
  `instansi` varchar(80) DEFAULT NULL,
  `alamat_ortu` text NOT NULL,
  `status` enum('diterima','pending','ditolak') NOT NULL,
  `ket` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `tgl_insert` date NOT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_aktif_kuliah`
--

INSERT INTO `surat_aktif_kuliah` (`id_aktif_kuliah`, `nama`, `no_surat`, `tempat_lahir`, `tgl_lahir`, `nim`, `prodi`, `semester`, `alamat`, `nama_ortu`, `nip`, `pangkat`, `jabatan`, `instansi`, `alamat_ortu`, `status`, `ket`, `file`, `tgl_insert`, `updated_at`) VALUES
(12, 'ardiman', 123, 'sad', '2020-07-07', '21711170', '9', 'genap', 'sads', 'sad', 'sd', 'asd', 'as', 'asdasd', 'dss', 'ditolak', 'sdfdsfdf', '21711170-2020-07-16-309.pdf', '2020-07-04', '2020-07-16 08:44:01'),
(13, 'ardiman', 182, 'matabubu', '2020-07-15', '21711170', '9', 'genap', 'asd', 'mangudu', 'dasd', 'asdsa', 'asda', 'asda', 'asd', 'diterima', 'zxcx', '21711170-2020-07-16-757.pdf', '2020-07-04', '2020-07-16 21:35:20');

-- --------------------------------------------------------

--
-- Table structure for table `surat_seminar`
--

CREATE TABLE `surat_seminar` (
  `id_surat_seminar` varchar(200) NOT NULL DEFAULT '',
  `id_prodi` int(11) NOT NULL,
  `ketua` varchar(100) NOT NULL,
  `sekretaris` varchar(100) NOT NULL,
  `jadwal_ujian` varchar(100) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `tempat` varchar(255) DEFAULT NULL,
  `id_jenis_ujian` int(11) NOT NULL DEFAULT 0,
  `no_sk` int(11) DEFAULT NULL,
  `tgl_insert` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_seminar`
--

INSERT INTO `surat_seminar` (`id_surat_seminar`, `id_prodi`, `ketua`, `sekretaris`, `jadwal_ujian`, `waktu`, `tempat`, `id_jenis_ujian`, `no_sk`, `tgl_insert`) VALUES
('005a82b4-9672-4b63-8de1-079657394730', 4, 'Kabiba, S.Pd, M.Pd', 'Titin Rahmiatin, S.Pd, M.Pd', '2020-08-04', '13:01', NULL, 1, 12, '2020-08-18'),
('06ac7316-caf1-4bff-8bb1-954d6fcde950', 4, 'Nasir, S.Pd, M.Pd', 'Muhammad Alamsah, S.Pd, M.Hum', '2021-03-25', '18:30', NULL, 3, NULL, '2021-03-25'),
('3349f034-7d69-4442-9700-4a51a1c5d02f', 4, 'Muhammad Alamsah, S.Pd, M.Hum', 'Kabiba, S.Pd, M.Pd', '2021-03-02', '06:25', NULL, 1, NULL, '2021-03-25'),
('4701964e-9518-416a-8ed7-9e2aecd0efc4', 9, 'Muhammad Alamsah, S.Pd, M.Hum', 'Nasir, S.Pd, M.Pd', '2021-03-30', '13:30', 'ruang ujian bahasa inggris', 1, NULL, '2021-03-30'),
('4da1b580-8271-42a8-91b7-3dd66545e81a', 4, 'Muhammad Alamsah, S.Pd, M.Hum', 'Nasir, S.Pd, M.Pd', '2021-02-24', '12:10', NULL, 1, 120, '2021-02-23'),
('62c26729-e6d1-43b5-994d-0700dba9a9c4', 9, 'Abdullah Alhadza, Prof., Dr., MA', 'Abubakar, Dr., M.Pd', '2020-05-07', '02:00', NULL, 1, 12, '2020-05-04'),
('77a5620b-7593-484e-a0a3-c028d3c55ff1', 4, 'Adam, S.Pd, M.Pd', 'Arfin, S.Pd., M.Pd', '2020-05-05', '02:30', NULL, 1, 120, '2020-05-04'),
('bb60dc20-4091-4498-84ca-818975e1d23c', 9, 'Abdullah Alhadza, Prof., Dr., MA', 'Abubakar, Dr., M.Pd', '2020-07-19', '12:30', NULL, 2, 12, '2020-07-17'),
('cd370c85-0b3d-411f-b4c7-d257937adaa0', 4, 'Junaidin, S.Pd, M.Pd', 'Kabiba, S.Pd, M.Pd', '2021-03-26', '17:30', NULL, 1, NULL, '2021-03-25'),
('fa7d2d78-bcc7-48b3-aa6b-14e272f72826', 4, 'Kabiba, S.Pd, M.Pd', 'Nurzaima, S.Pd, M.Pd', '2021-03-25', '12:30', NULL, 2, NULL, '2021-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `surat_tidak_menrima_beasiswa`
--

CREATE TABLE `surat_tidak_menrima_beasiswa` (
  `id` int(11) NOT NULL,
  `no_surat` int(4) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(30) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `thn_akademik` varchar(50) NOT NULL DEFAULT '',
  `status` enum('diterima','pending','ditolak') NOT NULL,
  `ket` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `tgl_insert` date NOT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_tidak_menrima_beasiswa`
--

INSERT INTO `surat_tidak_menrima_beasiswa` (`id`, `no_surat`, `nama`, `nim`, `tempat_lahir`, `tgl_lahir`, `id_prodi`, `thn_akademik`, `status`, `ket`, `file`, `tgl_insert`, `updated_at`) VALUES
(17, 123, 'Ardiman', '21711170', 'matabubusds', '1999-09-16', 9, '2020/2021', 'diterima', 'om wkwkwk', '21711170-2020-07-16-551.pdf', '2020-07-16', '2020-07-16 09:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `tendik`
--

CREATE TABLE `tendik` (
  `id` int(11) NOT NULL,
  `id_prodi` int(11) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tendik`
--

INSERT INTO `tendik` (`id`, `id_prodi`, `nama`, `nik`, `jabatan`, `jenis_kelamin`, `email`, `foto`) VALUES
(3, 9, 'Laode Fahasini, S.Pd., S.Ip., M.Si', '-', 'Staff Paud', 'L', 'Fahsin@gmail.com', ''),
(4, 3, 'Waode tini, S.Pd', '-', 'keuangan', 'L', 'sdfdf@gmail.com', 't2.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `unit_beranda`
--

CREATE TABLE `unit_beranda` (
  `id` int(11) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_beranda`
--

INSERT INTO `unit_beranda` (`id`, `pesan`) VALUES
(1, '<p style=\"text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `unit_bimbingan`
--

CREATE TABLE `unit_bimbingan` (
  `id` int(11) NOT NULL,
  `tahun_akademik` varchar(10) DEFAULT NULL,
  `semester` enum('Genap','Ganjil') DEFAULT NULL,
  `id_pendaftar` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `n_pembekalan` int(11) NOT NULL,
  `n_pelaksanaan` int(11) NOT NULL,
  `n_laporan` int(11) NOT NULL,
  `n_akhir` int(5) DEFAULT NULL,
  `grade` varchar(1) DEFAULT NULL,
  `date_created` varchar(40) NOT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit_bimbingan`
--

INSERT INTO `unit_bimbingan` (`id`, `tahun_akademik`, `semester`, `id_pendaftar`, `id_dosen`, `n_pembekalan`, `n_pelaksanaan`, `n_laporan`, `n_akhir`, `grade`, `date_created`, `updated_at`) VALUES
(58, '2020/2021', 'Ganjil', 37, 22, 0, 0, 0, 0, 'E', '2022-07-06', NULL),
(59, '2020/2021', 'Ganjil', 28, 22, 0, 0, 0, 0, 'E', '', '2022-07-06'),
(69, '2020/2021', 'Genap', 62, 22, 90, 90, 90, 90, 'A', '', '2022-08-31'),
(71, '2020/2021', 'Genap', 59, 22, 0, 0, 0, 0, 'D', '', '2022-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `unit_category_document`
--

CREATE TABLE `unit_category_document` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_category_document`
--

INSERT INTO `unit_category_document` (`id`, `nama`) VALUES
(1, 'KKNDIK'),
(2, 'PLP'),
(3, 'MAGANG');

-- --------------------------------------------------------

--
-- Table structure for table `unit_document`
--

CREATE TABLE `unit_document` (
  `id` int(11) NOT NULL,
  `id_document_category` int(11) NOT NULL,
  `judul` varchar(225) NOT NULL,
  `file` varchar(100) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_document`
--

INSERT INTO `unit_document` (`id`, `id_document_category`, `judul`, `file`, `status`, `date_created`) VALUES
(8, 1, 'Formulir Pendaftaran', '1c6ece0863345d95857148a93e2e01bf.docx', 'N', '2020-02-18 13:56:13'),
(9, 3, 'Panduan Magang', '6a9e28ebd96c1566cbfe282b880c4274.pdf', 'Y', '2020-02-18 13:43:10'),
(10, 1, 'Panduan KKNDik', 'f65ec00c28e03853998e461e594f32ef.pdf', 'Y', '2020-02-18 13:43:29'),
(11, 2, 'Panduan PLP', '7b46bca1c74499f31c81bf644c5703d3.pdf', 'Y', '2020-02-18 13:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `unit_kegiatan`
--

CREATE TABLE `unit_kegiatan` (
  `id` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `background` varchar(255) NOT NULL,
  `deskripsi` longtext DEFAULT NULL,
  `aktif` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit_kegiatan`
--

INSERT INTO `unit_kegiatan` (`id`, `nama_kegiatan`, `slug`, `background`, `deskripsi`, `aktif`) VALUES
(17, 'Asistensi Mengajar', 'asistensi-mengajar', '1656986930_a15cc179b6a5c3a4ea3e.png', 'kegiatan asistensi mengajar', 'Y'),
(18, 'Magang', 'magang', '1656986951_a6eb6b484fab257ab715.png', 'Kegiatan magang', 'Y'),
(19, 'Studi Independent', 'studi-independent', '1656986981_7b875c4eab5881523449.png', 'Program studi independent', 'Y'),
(20, 'Mahasiswa Penggerak', 'mahasiswa-penggerak', '1656987003_d6b97ab03888810d72c4.png', 'Kegiatan mahasiswa penggerak', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `unit_logbook_doc`
--

CREATE TABLE `unit_logbook_doc` (
  `id` int(11) NOT NULL,
  `id_logbook` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_logbook_doc`
--

INSERT INTO `unit_logbook_doc` (`id`, `id_logbook`, `gambar`) VALUES
(11, 43, '1654758936_e94491781e09932a6d59.png'),
(12, 43, '1654758936_daf65bb00b8c7d8b4e21.png'),
(13, 44, '1654759148_c8902f4c43373e424d7d.png'),
(14, 44, '1654759148_8ab73d6392395932ea29.png'),
(15, 45, '1654759417_a980f9415f26828233d9.png'),
(16, 45, '1654759417_9c0fefdd00f38acfbf0c.png'),
(17, 46, '1654759443_6e9c0f50e3556addb68a.png'),
(18, 46, '1654759443_0a70f9b0036d027e8af9.png'),
(19, 47, '1654759574_9066554612216968232f.png'),
(20, 47, '1654759574_1949ca8f0bfa4a87809b.png'),
(21, 48, '1654759850_de51ab7fca7dfd294c74.png'),
(22, 49, '1654759914_e94c779320ac92ad0dab.png'),
(29, 54, '1654826055_2d51198c0933e0b2ad34.png'),
(30, 54, '1654826056_611b50609cda4b006a41.png'),
(31, 54, '1654826056_041d8e18953ad1178036.png'),
(32, 54, '1654826056_d400864ddc2c6afe9925.png'),
(43, 55, '1654846275_60314fdba53a8cc166d6.png'),
(44, 55, '1654846275_890b36a2fcf1f2dca494.png'),
(45, 55, '1654846275_837b332b73c6307a79af.png'),
(46, 55, '1654846275_ee0948151569f498cffd.png'),
(47, 56, '1655254865_407014bf9be41db7dedb.jpg'),
(48, 56, '1655254865_d0fd5030dd0de74efc1f.jpg'),
(49, 56, '1655254865_47cfaa319d310e220684.jpg'),
(50, 56, '1655254865_17fac7eb12e2883eab98.jpg'),
(51, 57, '1656379764_dc92f92bde9a1c361713.jpg'),
(52, 57, '1656379764_b8b5c62c19bbc0912099.jpg'),
(53, 57, '1656379764_7bc2f70d8885b4855565.jpg'),
(61, 60, '1661919092_76aa63ab9f9347f1373e.png'),
(62, 60, '1661919092_fb280b0cd7d7d13fed5d.png'),
(63, 60, '1661919092_034e7c1fa371f2dc2a50.png'),
(64, 60, '1661919092_75a36548a7b00311868c.png');

-- --------------------------------------------------------

--
-- Table structure for table `unit_logbook_mhs`
--

CREATE TABLE `unit_logbook_mhs` (
  `id` int(11) NOT NULL,
  `id_pendaftar` int(11) NOT NULL,
  `tgl_kegiatan` varchar(100) NOT NULL,
  `mingguKe` int(11) NOT NULL,
  `nama_kegiatan` text NOT NULL,
  `tujuan_kegiatan` text NOT NULL,
  `catatan` text NOT NULL,
  `pemecahan_masalah` text NOT NULL,
  `kesimpulan` text NOT NULL,
  `rencana` text NOT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  `status` enum('not_verified','verified') NOT NULL,
  `verified_date` varchar(255) DEFAULT NULL,
  `date_created` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit_logbook_mhs`
--

INSERT INTO `unit_logbook_mhs` (`id`, `id_pendaftar`, `tgl_kegiatan`, `mingguKe`, `nama_kegiatan`, `tujuan_kegiatan`, `catatan`, `pemecahan_masalah`, `kesimpulan`, `rencana`, `lampiran`, `status`, `verified_date`, `date_created`) VALUES
(34, 38, '2021-09-02', 0, '<p>asdasd</p>', '<p>asdas</p>', '<p>asdas</p>', '<p>asdsa</p>', '<p>asdsa</p>', '<p>asdsa</p>', '1630488527_bcb0180736cce959fbfb.jpeg', 'not_verified', NULL, '2021-09-01'),
(35, 38, '2021-09-02', 0, '<p><span style=\"color: rgb(0, 0, 0);\">\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</span></p>', '<p><span style=\"color: rgb(0, 0, 0);\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</span></p>', '<p><span style=\"color: rgb(0, 0, 0);\">\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of</span></p>', '<p><span style=\"color: rgb(0, 0, 0);\">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam</span></p>', '<p><span style=\"color: rgb(0, 0, 0);\">asure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the</span></p>', '<p><span style=\"color: rgb(0, 0, 0);\">ations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains</span></p>', '1630489313_d9c150ce83b6371f36ff.jpeg', 'not_verified', NULL, '2021-09-01'),
(55, 55, '5 Juli 2022', 2, '<p>edit&nbsp; is simply dummy text of the printing and typesetting industry.d</p>\r\n', '<p>edit&nbsp; &quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;d</p>\r\n', '<p>edit&nbsp; Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;d</p>\r\n', '<p>edit&nbsp; &quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;d</p>\r\n', '<p>edit&nbsp; &quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;d</p>\r\n', '<p>edit &quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;</p>\r\n', NULL, 'verified', NULL, '2022-06-10'),
(56, 56, '5 Juni 2022', 1, '<p>Lorem ipsum dolor sit amet,\r\n</p>\r\n', '<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n', '<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n', '<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n', '<p>pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what&nbsp;</p>\r\n', '<p>pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what&nbsp;</p>\r\n', NULL, 'verified', NULL, '2022-06-14'),
(57, 57, '28 Juni 2022', 1, '<p>&quot;Lorem ipsum dolor sit amet</p>\r\n', '<h3><strong>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</strong></h3>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n', '<h3><strong>1914 translation by H. Rackham</strong></h3>\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n', '<h3><strong>ection 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</strong></h3>\r\n\r\n<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n', '<p>n the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.</p>\r\n', '<p>pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;</p>\r\n', NULL, 'verified', NULL, '2022-06-27'),
(60, 62, '16 Februari 2022', 1, '<p>Hello from CKEditor 4!&nbsp;asafHello from CKEditor 4!asdasdadasadsad</p>\r\n', '<p>Hello from CKEditor 4!&nbsp;asafHello from CKEditor 4!</p>\r\n', '<p>Hello from CKEditor 4!&nbsp;&nbsp;Hello from CKEditor 4!&nbsp;</p>\r\n', '', '<p>Hello from CKEditor 4!&nbsp;&nbsp;Hello from CKEditor 4!&nbsp;</p>\r\n', '<p>Hello from CKEditor 4!sasdas</p>\r\n', NULL, 'not_verified', NULL, '2022-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `unit_matakuliah_mhs`
--

CREATE TABLE `unit_matakuliah_mhs` (
  `id` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `matakuliah` varchar(255) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_matakuliah_mhs`
--

INSERT INTO `unit_matakuliah_mhs` (`id`, `nim`, `matakuliah`, `sks`) VALUES
(72, 21711170, 'Basis data', 3),
(73, 21711170, 'KKA', 6),
(74, 21711170, 'big data', 3),
(75, 21711170, 'Manajemen Perkantoran', 2),
(76, 21711170, 'PPL', 4),
(77, 21711170, 'Manajemen Kelas', 2),
(81, 21411111, 'Basis data', 3),
(82, 21411111, 'KKA', 6),
(83, 21411111, 'PPL 2', 3),
(88, 21411032, 'Basis data', 3),
(89, 21411032, 'KKA', 6),
(90, 21411032, 'PPL II', 4),
(91, 21411032, 'Manajemen Perkantoran', 2),
(92, 21411032, 'Big Data', 3),
(93, 21511039, 'KKA', 4),
(94, 21511039, 'Implentasi Manajeme sekolah', 3),
(95, 21511039, 'Manajemen perkantoran', 4),
(96, 21511039, 'PPL 2', 3),
(97, 21411049, 'Basis data', 4),
(98, 21411049, 'KKA', 6),
(99, 21411049, 'Manajemen Kelas', 3);

-- --------------------------------------------------------

--
-- Table structure for table `unit_pendaftar`
--

CREATE TABLE `unit_pendaftar` (
  `id` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `tahun_akademik` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `jenis_kegiatan` varchar(255) NOT NULL,
  `jenis_kepesertaan` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `ukuran_baju` varchar(50) NOT NULL,
  `bukti_bayar` varchar(255) NOT NULL,
  `bukti_bayar2` varchar(255) DEFAULT NULL,
  `btq` varchar(255) DEFAULT NULL,
  `tgl_bayar` varchar(50) NOT NULL,
  `nilai` varchar(1) NOT NULL,
  `laporan` varchar(255) DEFAULT NULL,
  `link_kegiatan_magang` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit_pendaftar`
--

INSERT INTO `unit_pendaftar` (`id`, `id_prodi`, `nim`, `tahun_akademik`, `semester`, `jenis_kegiatan`, `jenis_kepesertaan`, `lokasi`, `no_hp`, `ukuran_baju`, `bukti_bayar`, `bukti_bayar2`, `btq`, `tgl_bayar`, `nilai`, `laporan`, `link_kegiatan_magang`, `created_at`, `updated_at`) VALUES
(28, 3, '21111029', '2020/2021', 'Ganjil', 'Asistensi Mengajar', 'Kelompok', 'SMK N 5 KENDARI', '', '', '1612435791_7c552f051478c80c32a7.png', NULL, NULL, '', '', '1613395404_c110f0818d1d36c39ad3.pdf', NULL, '2021-02-04', '2021-02-15'),
(37, 4, '21013092', '2020/2021', 'Ganjil', 'Magang', 'Kelompok', 'SMP MUHAMMADIYAH', '900890', 'L (Large)', '1627245087_2fe469977c426b8710e6.pdf', '1627245087_a75bb2bc9ea10f27bb35.pdf', NULL, '', 'A', NULL, NULL, '2021-07-25', NULL),
(40, 9, '21111029', '2020/2021', 'Ganjil', 'sadfsadf', 'safd', 'sadf', 'sdf', 'M', '', NULL, NULL, '', '', NULL, NULL, '', NULL),
(59, 9, '21411111', '2020/2021', 'Genap', 'Studi Independent', 'Kelompok', 'SMK TELKOM', '567567567', 'L', '1657092122_6072b0db17a0d2e10ec4.pdf', '1657092122_6de9a24ba7f06ead26df.pdf', '1657092122_ce883132e4a01a6a294e.pdf', '2022-07-05', '', NULL, NULL, '2022-07-06', NULL),
(60, 9, '21511039', '2020/2021', 'Genap', 'magang', 'Perorangan', 'SMKN 4 KENDARI', '456456', 'L', '1657092326_1e61280f0c6648970931.pdf', '1657092326_7f8188b26a5cab151bf6.pdf', '1657092326_a64d9a19f032757f0753.pdf', '2022-07-05', '', NULL, NULL, '2022-07-06', NULL),
(62, 9, '21411049', '2020/2021', 'Genap', 'Mahasiswa Penggerak', 'Perorangan', 'SMA MUHAMMADIYAH', '456456456', 'L', '1657093939_843137c0a1b69dd8b719.pdf', '1657093939_9397a3fb578114b32313.pdf', '1657093939_d0dd0bba0502075f6110.pdf', '2022-07-04', '', '1661916710_ab8db29622290e0db763.pdf', 'dlRN9DTcHEU', '2022-07-06', '1661916710');

-- --------------------------------------------------------

--
-- Table structure for table `unit_pengaturan`
--

CREATE TABLE `unit_pengaturan` (
  `id` int(11) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `tahun_akademik` varchar(50) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `tgl_mulai` varchar(20) NOT NULL,
  `tgl_berakhir` varchar(20) NOT NULL,
  `tgl_pembekalan` varchar(255) NOT NULL,
  `tgl_penarikan` varchar(255) NOT NULL,
  `ket` text DEFAULT NULL,
  `status` enum('Y','N') NOT NULL,
  `status_sekolah` enum('Y','N') NOT NULL,
  `batas_input_nilai` varchar(50) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit_pengaturan`
--

INSERT INTO `unit_pengaturan` (`id`, `tahun`, `tahun_akademik`, `semester`, `tgl_mulai`, `tgl_berakhir`, `tgl_pembekalan`, `tgl_penarikan`, `ket`, `status`, `status_sekolah`, `batas_input_nilai`, `updated_at`) VALUES
(1, '2022', '2020/2021', 'Genap', '2021-06-22', '2022-07-30', '2021-03-08', '2022-06-30', 'ini adalah keterangan akhir update again', 'Y', 'Y', '2021-08-22', '2022-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `unit_tahun_akademik`
--

CREATE TABLE `unit_tahun_akademik` (
  `id` int(11) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `tahun_akad` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unit_user`
--

CREATE TABLE `unit_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `level` enum('pengawas','dpl','mahasiswa','prodi') NOT NULL,
  `active` enum('Y','N') NOT NULL,
  `tahun` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_user`
--

INSERT INTO `unit_user` (`id`, `nama`, `username`, `password`, `token`, `jenis_kelamin`, `level`, `active`, `tahun`, `foto`, `date_created`) VALUES
(1, 'Hasma Nur Jaya, S.Pd, M.Pd', 'hasma', '6a2e55d4daefd3d84186cddd4255bb145718d08a', 'lpKmvT1OXHzVARLEo08CWtPYj2qyaeBJFnNIwbdr', 'P', 'pengawas', 'Y', 2020, '', '2020-01-29 17:00:00'),
(18, 'ardiman', 'ardiman', '740d1dfa7979333f829c0103b0637ea2f24b529e', NULL, 'L', 'mahasiswa', 'Y', 2022, 'null', '2022-03-08 12:33:21');

-- --------------------------------------------------------

--
-- Table structure for table `unit_video`
--

CREATE TABLE `unit_video` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `link_youtube` varchar(100) NOT NULL,
  `tgl_pelaksanaan` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_video`
--

INSERT INTO `unit_video` (`id`, `judul`, `link_youtube`, `tgl_pelaksanaan`, `date_created`) VALUES
(2, 'KKN di desa palingi barat konkep ', '4POBkjNgee0', '2020-02-21', '2020-02-19 01:50:08'),
(3, 'KKA di desa palingi timur KONKEP', '0jpzGb0ALRs', '2020-02-20', '2020-02-19 02:03:33'),
(4, 'KKA di desa wawowanggu di Kendari', 'oCXkjXxs2CI', '2019-06-11', '2020-02-19 02:04:53'),
(5, 'PLP di SMA 1KENDARI', 'kAWaa-xDmzo', '2020-02-02', '2020-02-19 02:09:12');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `tgl_lahir` varchar(100) DEFAULT NULL,
  `prodi` varchar(100) DEFAULT NULL,
  `created` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `nama_user`, `jenis_kelamin`, `alamat`, `tgl_lahir`, `prodi`, `created`) VALUES
(1, 'ardiman', '740d1dfa7979333f829c0103b0637ea2f24b529e', 'admin', 'ardiman', 'L', 'jl.jati raya, wawowanggu,kadia, kota kendari', '15-09-1998', NULL, ''),
(4, 'ADM001', '9c8653b5b727ce3f2cf17bd1c060f3d60a4444cd', 'staff', '', '', '', '', '9', ''),
(5, 'BI0002', 'f7913056f35a041efa1f563f40a2be9fa12af12e', 'staff', '', '', '', '', '4', ''),
(6, 'PGSD001', 'b710cbc46b8b8165a9a00e07c1c17d548ea8fbfb', 'staff', '', '', '', '', '8', ''),
(7, 'PLS001', '676d2daf65e4a8caecbd9213a5a4e66392727c4d', 'staff', '', '', '', '', '7', ''),
(8, 'AGB001', 'fe63e91ce09703fdf056d0302453751d908d3893', 'staff', '', '', '', '', NULL, ''),
(9, 'PTI001', 'dcb66854f097355e05d51d0c1649a2c1dac203c3', 'staff', '', '', '', '', '3', ''),
(10, 'indah', '1a53c81e686e1e32913f347ef088e8f71fa4e644', 'admin', 'Tri Indah Rusli', 'P', '-', '-', NULL, '2019-12-17'),
(11, 'pamong1', '75122bc00b733bf9f2a80d37d4a4e58c586d52fc', 'pamong', 'pamong', 'L', '-', '15-09-1987', NULL, '2020-01-28'),
(12, 'hasma', '6a2e55d4daefd3d84186cddd4255bb145718d08a', 'pengawas', 'hasma nur jaya', 'P', '-', '-', NULL, '2020-01-29'),
(13, 'FKIP001', 'e3bb6bb02898ad0939042457415afa70ff89c6ac', 'staff_fakultas', 'Rey Nilda., S.Pd', 'P', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `posisi` varchar(100) NOT NULL,
  `video` varchar(100) NOT NULL,
  `status` enum('publish','no publish','pending') NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id_video`, `judul`, `keterangan`, `posisi`, `video`, `status`, `tanggal`) VALUES
(3, 'ugm pmb di UGM', 'penerimaan mahasiswa baru di UGM tahun 2019', 'homepage', 'IRH14jj5T1A', 'publish', '2019-08-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm_akademik`
--
ALTER TABLE `adm_akademik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adm_beranda`
--
ALTER TABLE `adm_beranda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adm_fasilitas`
--
ALTER TABLE `adm_fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adm_gallery`
--
ALTER TABLE `adm_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adm_profil`
--
ALTER TABLE `adm_profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adm_repository`
--
ALTER TABLE `adm_repository`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anggota_pemb_seminar`
--
ALTER TABLE `anggota_pemb_seminar`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `bimbingan_mhs`
--
ALTER TABLE `bimbingan_mhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config_rab`
--
ALTER TABLE `config_rab`
  ADD PRIMARY KEY (`id_config`);

--
-- Indexes for table `daftar_ujian`
--
ALTER TABLE `daftar_ujian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_assesment`
--
ALTER TABLE `file_assesment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `informasi_dosen`
--
ALTER TABLE `informasi_dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_ujian`
--
ALTER TABLE `jenis_ujian`
  ADD PRIMARY KEY (`id_ujian`);

--
-- Indexes for table `kas_prodi`
--
ALTER TABLE `kas_prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`id_kategori_berita`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `mhs_seminar`
--
ALTER TABLE `mhs_seminar`
  ADD PRIMARY KEY (`id_mhs_seminar`);

--
-- Indexes for table `nilai_magang`
--
ALTER TABLE `nilai_magang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paud_akademik`
--
ALTER TABLE `paud_akademik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paud_fasilitas`
--
ALTER TABLE `paud_fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paud_gallery`
--
ALTER TABLE `paud_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paud_profil`
--
ALTER TABLE `paud_profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paud_publish`
--
ALTER TABLE `paud_publish`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paud_setting_web`
--
ALTER TABLE `paud_setting_web`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paud_slider`
--
ALTER TABLE `paud_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paud_users`
--
ALTER TABLE `paud_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penawaran_mhs`
--
ALTER TABLE `penawaran_mhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penawaran_mk_mhs`
--
ALTER TABLE `penawaran_mk_mhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan_judul`
--
ALTER TABLE `pengajuan_judul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `pimpinan`
--
ALTER TABLE `pimpinan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plp_magang_sekolah`
--
ALTER TABLE `plp_magang_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppl_nilai`
--
ALTER TABLE `ppl_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rab_bukti`
--
ALTER TABLE `rab_bukti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rab_insentif_pembimbingan`
--
ALTER TABLE `rab_insentif_pembimbingan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rab_insentif_pengelola`
--
ALTER TABLE `rab_insentif_pengelola`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rab_insentif_penguji`
--
ALTER TABLE `rab_insentif_penguji`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indexes for table `rab_insentif_pkb`
--
ALTER TABLE `rab_insentif_pkb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rab_mhs_bimbingan`
--
ALTER TABLE `rab_mhs_bimbingan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rab_pemb1`
--
ALTER TABLE `rab_pemb1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rab_pemb2`
--
ALTER TABLE `rab_pemb2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rab_ujian_surat`
--
ALTER TABLE `rab_ujian_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raw`
--
ALTER TABLE `raw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raw_konfig`
--
ALTER TABLE `raw_konfig`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raw_pengelola`
--
ALTER TABLE `raw_pengelola`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repository`
--
ALTER TABLE `repository`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repo_plp`
--
ALTER TABLE `repo_plp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repo_skripsi`
--
ALTER TABLE `repo_skripsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skpi_keahlian`
--
ALTER TABLE `skpi_keahlian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skpi_magang`
--
ALTER TABLE `skpi_magang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skpi_mahasiswa`
--
ALTER TABLE `skpi_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skpi_organisasi`
--
ALTER TABLE `skpi_organisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skpi_pelatihan`
--
ALTER TABLE `skpi_pelatihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skpi_penghargaan`
--
ALTER TABLE `skpi_penghargaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_aktif_kuliah`
--
ALTER TABLE `surat_aktif_kuliah`
  ADD PRIMARY KEY (`id_aktif_kuliah`);

--
-- Indexes for table `surat_seminar`
--
ALTER TABLE `surat_seminar`
  ADD PRIMARY KEY (`id_surat_seminar`);

--
-- Indexes for table `surat_tidak_menrima_beasiswa`
--
ALTER TABLE `surat_tidak_menrima_beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tendik`
--
ALTER TABLE `tendik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_beranda`
--
ALTER TABLE `unit_beranda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_bimbingan`
--
ALTER TABLE `unit_bimbingan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_category_document`
--
ALTER TABLE `unit_category_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_document`
--
ALTER TABLE `unit_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_kegiatan`
--
ALTER TABLE `unit_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_logbook_doc`
--
ALTER TABLE `unit_logbook_doc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_logbook_mhs`
--
ALTER TABLE `unit_logbook_mhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_matakuliah_mhs`
--
ALTER TABLE `unit_matakuliah_mhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_pendaftar`
--
ALTER TABLE `unit_pendaftar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_pengaturan`
--
ALTER TABLE `unit_pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_user`
--
ALTER TABLE `unit_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_video`
--
ALTER TABLE `unit_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm_akademik`
--
ALTER TABLE `adm_akademik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adm_beranda`
--
ALTER TABLE `adm_beranda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `adm_fasilitas`
--
ALTER TABLE `adm_fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `adm_gallery`
--
ALTER TABLE `adm_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `adm_profil`
--
ALTER TABLE `adm_profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adm_repository`
--
ALTER TABLE `adm_repository`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `anggota_pemb_seminar`
--
ALTER TABLE `anggota_pemb_seminar`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `bimbingan_mhs`
--
ALTER TABLE `bimbingan_mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `config_rab`
--
ALTER TABLE `config_rab`
  MODIFY `id_config` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `daftar_ujian`
--
ALTER TABLE `daftar_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `file_assesment`
--
ALTER TABLE `file_assesment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `informasi_dosen`
--
ALTER TABLE `informasi_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `jenis_ujian`
--
ALTER TABLE `jenis_ujian`
  MODIFY `id_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kas_prodi`
--
ALTER TABLE `kas_prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `id_kategori_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mhs_seminar`
--
ALTER TABLE `mhs_seminar`
  MODIFY `id_mhs_seminar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `nilai_magang`
--
ALTER TABLE `nilai_magang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paud_akademik`
--
ALTER TABLE `paud_akademik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paud_fasilitas`
--
ALTER TABLE `paud_fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `paud_gallery`
--
ALTER TABLE `paud_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `paud_profil`
--
ALTER TABLE `paud_profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paud_publish`
--
ALTER TABLE `paud_publish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `paud_setting_web`
--
ALTER TABLE `paud_setting_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paud_slider`
--
ALTER TABLE `paud_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `paud_users`
--
ALTER TABLE `paud_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penawaran_mhs`
--
ALTER TABLE `penawaran_mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `penawaran_mk_mhs`
--
ALTER TABLE `penawaran_mk_mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `pengajuan_judul`
--
ALTER TABLE `pengajuan_judul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `plp_magang_sekolah`
--
ALTER TABLE `plp_magang_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rab_bukti`
--
ALTER TABLE `rab_bukti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rab_insentif_pembimbingan`
--
ALTER TABLE `rab_insentif_pembimbingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `rab_insentif_pengelola`
--
ALTER TABLE `rab_insentif_pengelola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `rab_insentif_penguji`
--
ALTER TABLE `rab_insentif_penguji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `rab_insentif_pkb`
--
ALTER TABLE `rab_insentif_pkb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `rab_mhs_bimbingan`
--
ALTER TABLE `rab_mhs_bimbingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `rab_pemb1`
--
ALTER TABLE `rab_pemb1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rab_pemb2`
--
ALTER TABLE `rab_pemb2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rab_ujian_surat`
--
ALTER TABLE `rab_ujian_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `raw`
--
ALTER TABLE `raw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `raw_konfig`
--
ALTER TABLE `raw_konfig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `raw_pengelola`
--
ALTER TABLE `raw_pengelola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `repository`
--
ALTER TABLE `repository`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `repo_plp`
--
ALTER TABLE `repo_plp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `repo_skripsi`
--
ALTER TABLE `repo_skripsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `skpi_keahlian`
--
ALTER TABLE `skpi_keahlian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skpi_magang`
--
ALTER TABLE `skpi_magang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skpi_mahasiswa`
--
ALTER TABLE `skpi_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `skpi_organisasi`
--
ALTER TABLE `skpi_organisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skpi_pelatihan`
--
ALTER TABLE `skpi_pelatihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `skpi_penghargaan`
--
ALTER TABLE `skpi_penghargaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_aktif_kuliah`
--
ALTER TABLE `surat_aktif_kuliah`
  MODIFY `id_aktif_kuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `surat_tidak_menrima_beasiswa`
--
ALTER TABLE `surat_tidak_menrima_beasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tendik`
--
ALTER TABLE `tendik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `unit_beranda`
--
ALTER TABLE `unit_beranda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `unit_bimbingan`
--
ALTER TABLE `unit_bimbingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `unit_category_document`
--
ALTER TABLE `unit_category_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `unit_document`
--
ALTER TABLE `unit_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `unit_kegiatan`
--
ALTER TABLE `unit_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `unit_logbook_doc`
--
ALTER TABLE `unit_logbook_doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `unit_logbook_mhs`
--
ALTER TABLE `unit_logbook_mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `unit_matakuliah_mhs`
--
ALTER TABLE `unit_matakuliah_mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `unit_pendaftar`
--
ALTER TABLE `unit_pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `unit_pengaturan`
--
ALTER TABLE `unit_pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `unit_user`
--
ALTER TABLE `unit_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `unit_video`
--
ALTER TABLE `unit_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
