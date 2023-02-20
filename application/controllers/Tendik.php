 <?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'assets/uuid/vendor/autoload.php';
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class Tendik extends CI_Controller {
	private $filename = "format_ci";

	public function __construct()
	{
		parent::__construct();
		$this->load->model('prodi_model', 'prodi');
		$this->load->model('dosen_model', 'dosen');
		$this->load->model('surat_model', 'surat');
		$this->load->model('user_model', 'user');
		$this->load->model('tendik_model', 'tendik');
		$this->load->model('registrasi_model', 'registrasi');
		$this->load->model('mahasiswa_model', 'mahasiswa');
		$this->load->model('daftar_ujian_model', 'daftar_ujian');
		$this->load->model('rab_model', 'rab');
		$this->load->model('konfigurasi_model', 'konfigurasi');
		$this->load->model('pengguna_model', 'mhs');

	}

	public function output_json($data, $encode = true)
	{
		if ($encode) $data = json_encode($data);
		$this->output->set_content_type('application/json')->set_output($data);
	}


	public function index()
	{
		$data['title'] = "Login Tendik";

		$this->load->view('tendik/login/header', $data);
		$this->load->view('tendik/login/login');
		$this->load->view('tendik/login/footer');
	}

	public function login()
	{
		cek_ajax();

		$username = $this->input->post('username');
		$password = sha1($this->input->post('password'));

		$dataTendik = $this->user->getUser($username);

		if ($dataTendik) {

			if ($password == $dataTendik->password) {


				$sess = [
					'username' 	=> $dataTendik->username,
					'level' 	=> $dataTendik->level,
					'prodi'		=> $dataTendik->prodi
				];

				$this->session->set_userdata($sess);
				$data = [
					'status' => true,
					'pesan' => 'Redirecting.....!',
					'url'	=> base_url('tendik/in')
				];
				echo json_encode($data);

			}else{
				$data = [
					'status' => false,
					'pesan' => 'Maaf password anda tidak cocok!',
				];
				echo json_encode($data);
			}

		}else{

			$data = [
				'status' => false,
				'pesan' => 'Maaf password dan username anda tidak di kenali!',
			];
			echo json_encode($data);
		}


	}

	public function in()
	{
		if (empty($this->session->userdata('username'))) {
			redirect('tendik');
		}
		$level = $this->session->userdata('level');

		$data['user'] = $this->prodi->getById($this->session->userdata('prodi'));
		$data['staff_fk'] = $this->db->get_where('user', ['level' => $level])->row();
		$data['title']	= 'Tendik Page';
        $data['isi']	= 'tendik/lending_page';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function surat_seminar()
	{
		$this->simple_login->cek_login_tendik();

		$data['user'] = $this->prodi->getById($this->session->userdata('prodi'));
		$data['surat_seminar'] = $this->surat->getDataSeminar();

		$data['title']	= 'Surat seminar page';
        $data['isi']	= 'tendik/surat_seminar';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}


	public function surat_pengajuan_judul()
	{
		$this->simple_login->cek_login_tendik();

		$data['surat'] = $this->tendik->get_surat_pengajuan_judul();
		$data['jml_surat_aktif_kuliah'] = $this->surat->jumlah_surat_aktif_kuliah();
		$data['jml_surat_beasiswa'] = $this->surat->jumlah_surat_beasiswa();
		$data['jml_surat_pengajuan_judul'] = $this->surat->jumlah_surat_pengajuan_judul();
		$data['title']	= 'Tendik | surat pengajuan judul';
        $data['isi']	= 'tendik/surat_pengajuan_judul';
		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function surat_aktif_kuliah()
	{
		$this->simple_login->cek_login_tendik();
		$data['surat_aktif_kuliah'] = $this->tendik->get_surat_aktif_kuliah();
		$data['surat'] = $this->tendik->get_surat_pengajuan_judul();
		$data['jml_surat_aktif_kuliah'] = $this->surat->jumlah_surat_aktif_kuliah();
		$data['jml_surat_pengajuan_judul'] = $this->surat->jumlah_surat_pengajuan_judul();
		$data['jml_surat_beasiswa'] = $this->surat->jumlah_surat_beasiswa();
		$data['title']	= 'Tendik | surat aktif kuliah';
        $data['isi']	= 'tendik/surat_aktif_kuliah';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function sk_beasiswa()
	{
		$this->simple_login->cek_login_tendik();
		$data['data_beasiswa'] = $this->tendik->get_surat_beasiswa();
		$data['surat'] = $this->tendik->get_surat_pengajuan_judul();
		$data['jml_surat_aktif_kuliah'] = $this->surat->jumlah_surat_aktif_kuliah();
		$data['jml_surat_pengajuan_judul'] = $this->surat->jumlah_surat_pengajuan_judul();
		$data['jml_surat_beasiswa'] = $this->surat->jumlah_surat_beasiswa();
		$data['title']	= 'Tendik | sk Beasiswa';
        $data['isi']	= 'tendik/sk_beasiswa';
		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}
	
	public function delete_surat($params)
	{
		cek_ajax();

		if ($params == 'surat_beasiswa') {
			
			$chk = $this->input->post('checked', true);

			if (!$chk) {
				$this->output_json(['status' => false]);
			} else {
				if ($this->surat->delete_surat('surat_tidak_menrima_beasiswa', $chk, 'id')) {
					$this->output_json(['status' => true, 'total' => count($chk)]);
				}
			}

		}else if($params == 'surat_aktif_kuliah'){

			$chk = $this->input->post('checked', true);

			if (!$chk) {
				$this->output_json(['status' => false]);
			} else {
				if ($this->surat->delete_surat('surat_aktif_kuliah', $chk, 'id_aktif_kuliah')) {
					$this->output_json(['status' => true, 'total' => count($chk)]);
				}
			}
		}else if($params == 'izin_penelitian'){

			$chk = $this->input->post('checked', true);

			var_dump($chk);die;

			if (!$chk) {
				$this->output_json(['status' => false]);
			} else {
				if ($this->surat->delete_surat('pengajuan_judul', $chk, 'id')) {
					$this->output_json(['status' => true, 'total' => count($chk)]);
				}

				// hapus file surat

			}
		}
	}


	public function failed_surat($params)
	{
		cek_ajax();

		if ($params == 'izin_penelitian') {
			
			$id = $this->input->post('id');
			$respon = $this->surat->failed_surat('pengajuan_judul', $id, 'id');

			if ($respon) {
				$this->output_json(['status' => true]);
			}

		}else if($params == 'aktif_kuliah'){
			$id = $this->input->post('id');
			$respon = $this->surat->failed_surat('surat_aktif_kuliah', $id, 'id_aktif_kuliah');

			if ($respon) {
				$this->output_json(['status' => true]);
			}
		}else if($params == 'sk_beasiswa'){
			$id = $this->input->post('id');
			$respon = $this->surat->failed_surat('surat_tidak_menrima_beasiswa', $id, 'id');

			if ($respon) {
				$this->output_json(['status' => true]);
			}
		}
	}


	public function create()
	{
		$data['mahasiswa'] = $this->mahasiswa->getDataMahasiswaUjian();
		$data['dosen'] = $this->dosen->getAllDosen();
		$data['jenis_ujian']	= $this->db->get('jenis_ujian')->result();
		$data['title']	= 'Tendik - Buat surat seminar';
        $data['isi']	= 'tendik/create';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function cari_mhs()
	{
		cek_ajax();

		$id['nim'] = $this->input->get('nim');

		$data['mhs'] 		= $this->db->get_where('bimbingan_mhs', $id)->row();
		$data['pembimbing1'] = $this->registrasi->nama_pembimbing1($data['mhs']->id_pembimbing1);
		$data['pembimbing2'] = $this->registrasi->nama_pembimbing2($data['mhs']->id_pembimbing2);

		echo json_encode($data);

	}

	public function create_action()
	{
		cek_post();

		$uuid = Uuid::uuid4()->toString();

		$data['id_surat_seminar'] = $uuid;
		$data['id_prodi'] 		= $this->session->userdata('prodi');
		$data['ketua'] 			= $this->input->post('ketua');
		$data['sekretaris'] 	= $this->input->post('sekretaris');
		$data['jadwal_ujian'] 	= $this->input->post('jadwal_ujian');
		$data['waktu'] 			= $this->input->post('waktu');
		$data['tempat'] 		= $this->input->post('tempat');
		$data['id_jenis_ujian'] = $this->input->post('jenis_ujian');
 		$data['tgl_insert'] 	= date("Y-m-d");

		$this->db->insert('surat_seminar', $data);

		$i = 0; //for looping
		$id = $uuid;
		$nama_mhs 		= $this->input->post('nama');
		$nim 			= $this->input->post('nim');

		$judul_skripsi 	= $this->input->post('judul_skripsi');
		$pembimbing1 	= $this->input->post('pembimbing1');
		$pembimbing2 	= $this->input->post('pembimbing2');

			if ($nama_mhs[0] != null) {

				foreach ($nama_mhs as $row) {

				$dt = [
					'id_surat_seminar' 	=> $id,
					'nama_mhs' 			=> $row,
					'nim'				=> $nim[$i],
					'judul_skripsi'		=> $judul_skripsi[$i],
					'pembimbing1' 		=> $pembimbing1[$i],
					'pembimbing2' 		=> $pembimbing2[$i]
				];

				$insert = $this->db->insert('mhs_seminar',$dt);

				if ($insert) {
					$i++;
				}

			}
			}

		// insert anggota seminar menggunakan foreach
		$a = 0; //for looping
		$nama_anggota 		= $this->input->post('anggota');
		$status_penguji 	= $this->input->post('status_penguji');

		if ($nama_anggota[0] != null) {

				foreach ($nama_anggota as $row) {

				$dt = [
					'id_surat_seminar' => $id,
					'nama_anggota' 	=> $row,
					'status_penguji_tamu' => $status_penguji[$a]
				];

				$insert = $this->db->insert('anggota_pemb_seminar',$dt);

				if ($insert) {
					$a++;
				}

			}


		}

		$this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert"><strong>sukses ! </strong> Surat sukses di kirim! <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span aria-hidden="true">&times;</span></button></div>');
		redirect('tendik/surat_seminar');
	}

	public function detail($id)
	{
		$this->simple_login->cek_login_tendik();

		$data['data'] = $this->surat->getDataSeminarById($id);
		$data['mhs_seminar'] = $this->surat->getMhsSeminar($data['data']->id_surat_seminar)->result();
		$data['anggota'] = $this->surat->nama_anggota($data['data']->id_surat_seminar)->result();

		$data['title']	= 'Detail';
        $data['isi']	= 'tendik/detail';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}


	public function pdf($id)
	{
		$data['data'] 		 = $this->surat->getDataSeminarById($id);
		$data['mhs_seminar'] = $this->surat->getMhsSeminar($data['data']->id_surat_seminar)->result();
		$data['anggota'] 	 = $this->surat->nama_anggota($data['data']->id_surat_seminar)->result();
		$data['konfigurasi'] = $this->konfigurasi->getKonfigurasi();

		$this->load->view('tendik/cetak_surat', $data, false);

// 		$this->simple_login->pdfGenerator($html, 'Surat_pengajuan_judul', 'Legal', 'potrait');
	}


	public function delete($id)
	{

		$this->db->query("DELETE FROM surat_seminar WHERE id_surat_seminar = '$id'");
		$this->db->query("DELETE FROM mhs_seminar WHERE id_surat_seminar = '$id'");
		$this->db->query("DELETE FROM anggota_pemb_seminar WHERE id_surat_seminar = '$id'");

		$this->session->set_flashdata('success', 'Data Surat berhasil di hapus');
		redirect('tendik/surat_seminar');

	}

	public function log_out()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');

	// setelah di hapus maka di redirect
		$this->session->set_flashdata('sukses', '<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">
									<i class="ace-icon fa fa-times"></i>
								</button>
								<strong><i class="ace-icon fa fa-bullhorn"></i> Sukses!
								</strong> Anda berhasil Logout<br /></div>');
		redirect(base_url('tendik'));
	}


	public function mahasiswa()
	{
		$this->simple_login->cek_login_tendik();

		$data['mahasiswa'] 	= $this->tendik->getDataMahasiswa();
		$data['title']	= 'tendik - Mahasiswa';
        $data['isi']	= 'tendik/mahasiswa';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function pilih_pembimbing($nim)
	{
		$this->simple_login->cek_login_tendik();

		$data['dosen'] = $this->dosen->getAllDosen();
		$data['mahasiswa'] = $this->tendik->getByNim($nim);

		$data['title']	= 'Mahasiswa | select mentor II';
        $data['isi']	= 'tendik/form_pilih_pembimbing';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function pilih_pembimbing_action($nim)
	{
		$cek = $this->db->get_where('bimbingan_mhs', ['nim' => $nim])->row();

		if ($cek->status !== 'Diterima') {
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('tendik/mahasiswa');
		}else{
			$pembimbing2 = $this->input->post('pembimbing2');
			$this->db->set('id_pembimbing2', $pembimbing2);
			$this->db->where('nim', $nim);
			$this->db->update('bimbingan_mhs');

			echo $this->session->set_flashdata('msg', 'success');
			redirect('tendik/mahasiswa');
		}

		
	}

	public function surat_pembimbing_skripsi($id)
	{
		$data['data'] = $this->tendik->getById($id);


		$this->load->view('tendik/cetak_surat_bimbingan', $data, false);

// 		$this->simple_login->pdfGenerator($html, 'Surat_bimbingan', 'Legal', 'potrait');
	}


	public function rab_ujian()
	{
	    
		$this->simple_login->cek_login_tendik();
// 		echo"sedang dalam perbaikan";exit;

		$id_prodi = $this->session->userdata('prodi');
		$data['data_rab'] = $this->rab->get_data('rab_ujian_surat', $id_prodi);

		$data['title']	= 'Tendik - RAB Ujian';
        $data['isi']	= 'tendik/rab_list';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function config_rab()
	{
		$this->simple_login->cek_login_tendik();

		$data['rab']	= $this->db->get('config_rab')->row();

		$data['title']	= 'Tendik - Configurasi RAB';
        $data['isi']	= 'tendik/rab_config';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function update_config_rab($id)
	{

		$data = [

			'pembayaran_mhs'				=> $this->input->post('infak_mhs'),
			'pembayaran_mhs_skripsi'		=> $this->input->post('pembayaran_mhs_skripsi'),
			'kas_prodi'						=> $this->input->post('kas_prodi'),
			'kas_fkip'						=> $this->input->post('kas_fkip'),
			'kas_universitas'				=> $this->input->post('kas_universitas'),
			'insentif_ketua_penguji'		=> $this->input->post('insentif_ketua_penguji'),
			'insentif_sekretaris_penguji'	=> $this->input->post('insentif_sekretaris_penguji'),
			'insentif_anggota_penguji'		=> $this->input->post('insentif_anggota_penguji'),
			'insentif_pengelola'			=> $this->input->post('insentif_pengelola'),
			'konsumsi_penguji'				=> $this->input->post('konsumsi_penguji'),
			'konsumsi_pengelola'			=> $this->input->post('konsumsi_pengelola'),
			'transportasi'					=> $this->input->post('transportasi'),
			'petugas_kebersihan'			=> $this->input->post('petugas_kebersihan'),
			'insentif_pemb1'				=> $this->input->post('insentif_pemb1'),
			'insentif_pemb2'				=> $this->input->post('insentif_pemb2'),
			'ka_prodi'						=> $this->input->post('ka_prodi'),
			'staff_keuangan'				=> $this->input->post('staff_keuangan'),
			'staff_administrasi'			=> $this->input->post('staff_administrasi'),
			'staff_fakultas'				=> $this->input->post('staff_fakultas')
		];

		$this->db->where('id_config', $id)->update('config_rab', $data);

		$this->session->set_flashdata('success', '<div class="alert alert-success" role="alert"><strong>sukses ! </strong> Data config berhasil di update !</div>');
		redirect('tendik/config_rab');
	}



	public function buat_rab_ujian()
	{
		$this->simple_login->cek_login_tendik();

		$data['data']	= $this->db->get('config_rab')->row();
		$data['dosen']	= $this->db->get('dosen')->result();
		$data['jenis_ujian'] = $this->db->get('jenis_ujian')->result();
		$data['pemb1'] = $this->tendik->get_pemb1();
		$data['pemb2'] = $this->tendik->get_pemb2();
		$data['title']	= 'Tendik - Buat RAB ujian';
        $data['isi']	= 'tendik/buat_rab_ujian';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function cari_insentif1($data)
	{
		cek_ajax();

		$d = $this->db->get('config_rab')->row();

		if ($data === 'ketua') {
			$dt = $d->insentif_ketua_penguji;
		}elseif($data === 'sekretaris'){
			$dt = $d->insentif_sekretaris_penguji;
		}elseif($data === 'anggota'){
			$dt = $d->insentif_anggota_penguji;
		}else{
			$dt = '';
		}

		echo json_encode($dt);
	}


	public function cari_insentif2($data)
	{
		cek_ajax();

		$d = $this->db->get('config_rab')->row();

		if ($data === 'ka_prodi') {
			$dt = $d->ka_prodi;
		}elseif($data === 'pengarah'){
			$dt = $d->pengarah;
		}elseif($data === 'penanggung_jawab_dekan'){
			$dt = $d->penanggung_jawab_dekan;
		}elseif($data === 'penanggung_jawab_wadek'){
			$dt = $d->penanggung_jawab_wadek;
		}elseif($data === 'staff_keuangan'){
			$dt = $d->staff_keuangan;
		}elseif($data === 'staff_administrasi'){
			$dt = $d->staff_fakultas;
		}elseif($data === 'staff_fakultas'){
			$dt = $d->staff_fakultas;
		}elseif($data === 'mhs_magang'){
			$dt = $d->staff_administrasi;
		}else{
			$dt = '';
		}

		echo json_encode($dt);
	}
	
	public function store_rab_ujian()
	{

		cek_post();

		// simpan ke tabel rab_ujian_surat


		$uuid 	= Uuid::uuid4()->toString();
		$total 	= $this->input->post('total2') + 
				 $this->input->post('total3') + 
				 $this->input->post('total4') + 
				 $this->input->post('total5') + 
				 $this->input->post('total6') + 
				 $this->input->post('total7') + 
				 // $this->input->post('total8') + 
				 $this->input->post('total9') + 
				 $this->input->post('total10') + 
				 $this->input->post('total11');

		$jml = 	$this->input->post('total2') + 
				$this->input->post('total3') + 
				$this->input->post('total4') + 
				$this->input->post('total5') + 
				$this->input->post('total6') + 
				$this->input->post('total7') + 
				// $this->input->post('total8') + 
				$this->input->post('total9') + 
				$this->input->post('total10');

		$saldo = $this->input->post('total1') - $total;

		$id_jenis_ujian = $this->input->post('jenis_ujian');
		$id_prodi 		= $this->session->userdata('prodi');

		$data = [

			'id_jenis_ujian' => $this->input->post('jenis_ujian'),
			'id_surat'	=> $uuid,
			'id_prodi'	=> $id_prodi,
			'no_sk'		=> $this->input->post('no_sk'),
			'A1'		=> $this->input->post('infak_mhs'),
			'A2' 		=> $this->input->post('insentif_ketua'),
			'A3' 		=> $this->input->post('insentif_sekretaris'),
			'A4' 		=> $this->input->post('insentif_anggota'),
			'A5' 		=> $this->input->post('insentif_pengelola'),
			'A6' 		=> $this->input->post('konsumsi_penguji'),
			'A7' 		=> $this->input->post('konsumsi_pengelola'),
			// 'A8' 		=> $this->input->post('trans_kom'),
			'A9' 		=> $this->input->post('ptgs_kebersihan'),
			'A10' 		=> $this->input->post('kas_prodi'),
			'A11' 		=> $this->input->post('kas_fkip'),
			'A12' 		=> $this->input->post('kas_universitas'),

			'J1'		=> $this->input->post('total1'),
			'J2' 		=> $this->input->post('total2'),
			'J3' 		=> $this->input->post('total3'),
			'J4' 		=> $this->input->post('total4'),
			'J5' 		=> $this->input->post('total5'),
			'J6' 		=> $this->input->post('total6'),
			'J7' 		=> $this->input->post('total7'),
			'J8' 		=> $this->input->post('total8'),
			'J9' 		=> $this->input->post('total9'),
			'J10' 		=> $this->input->post('total10'), //Kas Prodi
			'jumlah_p'	=> $jml,
			'J11' 		=> $this->input->post('total11'), // kas Fakultas
			'J12' 		=> $this->input->post('total12'),
			'total' 	=> $total,
			'saldo' 	=> $saldo,

			'nama'				=> $this->input->post('nama'),
			'jabatan'			=> $this->input->post('jabatan_pengaju'),
			'jumlah_pengajuan' 	=> $jml,
			'no_rekening'		=> $this->input->post('no_rek'),
			'nama_bank'			=> $this->input->post('nama_bank'),
			'jenis_byr'			=> $this->input->post('jenis_bayar'),

			'date_created' 		=> date('Y-m-d'),

		];

		if ($id_jenis_ujian == '3') {
			$data['jml_mhs_pemb'] 			= $this->input->post('pemb1');
			$data['total_insentif_pemb'] 	= $this->input->post('ttl_insentif_pemb1');
			$data['jml_mhs_pemb2'] 			= $this->input->post('pemb2');
			$data['total_insentif_pemb2'] 	= $this->input->post('ttl_insentif_pemb2');
		}

		$result = $this->db->insert('rab_ujian_surat', $data);


		// menyimpan ke tabel rab_insentif_penguji

		$i = 0; //for looping
		$nama_penguji 	= $this->input->post('nama_dosen');
		$jabatan 		= $this->input->post('jabatan');
		$jumlah_mhs 	= $this->input->post('jumlah_mhs');
		$insentif 		= $this->input->post('insentif1');
		$total 			= $this->input->post('total');


			if ($nama_penguji[0] != null) {

				foreach ($nama_penguji as $nama) {

					$dt = [
						'id_surat' 		=> $uuid,
						'nama_anggota' 	=> $nama,
						'jabatan'		=> $jabatan[$i],
						'jml_mhs'		=> $jumlah_mhs[$i],
						'insentif'		=> $insentif[$i],
						'total' 		=> $total[$i]
					];

					$insert = $this->db->insert('rab_insentif_penguji', $dt);

					if ($insert) {
						$i++;
					}

				}
			}


			//menyimpan ke tabel rab_insentif_pengelola

				$a = 0; //for looping
				$nama_angg 			= $this->input->post('nama_ds');
				$jabatan_angg 		= $this->input->post('jabatan2');
				$jumlah_mhs_angg 	= $this->input->post('jumlah_mhs2');
				$insentif2 			= $this->input->post('insentif2');
				$total_angg 		= $this->input->post('total_insf');


				if ($nama_angg[0] != null) {

					foreach ($nama_angg as $nama) {

						$result = [
							'id_surat' 		=> $uuid,
							'nama_anggota' 	=> $nama,
							'jabatan'		=> $jabatan_angg[$a],
							'jml_mhs'		=> $jumlah_mhs_angg[$a],
							'insentif'		=> $insentif2[$a],
							'total' 		=> $total_angg[$a]
						];

						$insert = $this->db->insert('rab_insentif_pengelola', $result);

						if ($insert) {
							$a++;
						}

					}
				}

				// menyimpan ke tabel rab_insentif_pkb 

				$p = 0; //for looping
				$nama_petugask 	= $this->input->post('petugas_kebersihan');
				$jumlah_m 		= $this->input->post('jml_m');
				$insentif3		= $this->input->post('insentif3');
				$totalk 		= $this->input->post('totalk');

				if ($nama_petugask[0] != null) {

					foreach ($nama_petugask as $nama) {

						$result = [
							'id_surat' 	=> $uuid,
							'nama' 		=> $nama,
							'jml_mhs'	=> $jumlah_m[$p],
							'insentif'	=> $insentif3[$p],
							'total'		=> $totalk[$p],
						];

						$insert = $this->db->insert('rab_insentif_pkb', $result);

						if ($insert) {
							$p++;
						}

					}
				}

	

				if ($id_jenis_ujian == '3') {


					// simpan ke tabel rab_pemb1

					$c = 0; //for looping

					$id_dosen		= $this->input->post('nama_ds_pemb1');

					$jml_mhs		= $this->input->post('jumlah_mhs4');
					$insentif_ds	= $this->input->post('insentif4');
					$total_ins_ds	= $this->input->post('total_ins4');


					if ($id_dosen[0] != null) {

						foreach ($id_dosen as $id_ds) {

							$result = [
								'id_surat' 		=> $uuid,
								'nama' 			=> $id_ds,
								'jumlah_mhs'	=> $jml_mhs[$c],
								'insentif'		=> $insentif_ds[$c],
								'total'			=> $total_ins_ds[$c]
							];

							$insert = $this->db->insert('rab_pemb1', $result);

							if ($insert) {
								$c++;
							}

						}
					}

					$d = 0;

					$id_dosen_2		= $this->input->post('nama_ds_pemb2');

					$jml_mhs		= $this->input->post('jumlah_mhs5');
					$insentif_ds	= $this->input->post('insentif5');
					$total_ins_ds	= $this->input->post('total_ins5');


					if ($id_dosen_2[0] !== null) {

						foreach ($id_dosen_2 as $id_ds2) {

							$result = [
								'id_surat' 		=> $uuid,
								'nama' 			=> $id_ds2,
								'jumlah_mhs'	=> $jml_mhs[$d],
								'insentif'		=> $insentif_ds[$d],
								'total'			=> $total_ins_ds[$d]
							];

							$insert = $this->db->insert('rab_pemb2', $result);

							if ($insert) {
								$d++;
							}

						}
					}

				}



        if ($id_jenis_ujian === '1') {
        	$ket = 'Kas ujian Proposal';
        }elseif ($id_jenis_ujian === '2') {
        	$ket = 'Kas ujian Hasil';
        }else{
        	$ket = 'Kas ujian Skripsi';
        }

        $kasProdi 					= $this->input->post('total10');
        $data_kas['id_rab']			= $uuid;
		$data_kas['id_prodi'] 		= $id_prodi;
		$data_kas['jenis']			= 'M';
		$data_kas['jumlah']			= $kasProdi;
		$data_kas['ket']			= $ket;
		$data_kas['bukti'] 			= null;
		$data_kas['date_created']	= date('Y-m-d');

		$this->db->insert('kas_prodi', $data_kas);

		$this->session->set_flashdata('success', '<div class="alert alert-success">	RAB ujian berhasil dibuat!</div>');
		redirect('tendik/rab_ujian');

	}

// 	public function store_rab_ujian()
// 	{

// 		cek_post();

// 		// simpan ke tabel rab_ujian_surat

// 		$uuid = Uuid::uuid4()->toString();
// 		$total = $this->input->post('total2') + $this->input->post('total3') + $this->input->post('total4') + $this->input->post('total5') + $this->input->post('total6') + $this->input->post('total7') + $this->input->post('total8') + $this->input->post('total9') + $this->input->post('total10') + $this->input->post('total11');
// 		$jml = $this->input->post('total2') + $this->input->post('total3') + $this->input->post('total4') + $this->input->post('total5') + $this->input->post('total6') + $this->input->post('total7') + $this->input->post('total8') + $this->input->post('total9') + $this->input->post('total10');
// 		$saldo = $this->input->post('total1') - $total  ;

// 		$id_jenis_ujian = $this->input->post('jenis_ujian');
// 		$id_prodi = $this->session->userdata('prodi');

// 		$data = [

// 			'id_jenis_ujian' => $this->input->post('jenis_ujian'),
// 			'id_surat'	=> $uuid,
// 			'id_prodi'	=> $id_prodi,
// 			'no_sk'		=> $this->input->post('no_sk'),
// 			'A1'		=> $this->input->post('infak_mhs'),
// 			'A2' 		=> $this->input->post('insentif_ketua'),
// 			'A3' 		=> $this->input->post('insentif_sekretaris'),
// 			'A4' 		=> $this->input->post('insentif_anggota'),
// 			'A5' 		=> $this->input->post('insentif_pengelola'),
// 			'A6' 		=> $this->input->post('konsumsi_penguji'),
// 			'A7' 		=> $this->input->post('konsumsi_pengelola'),
// 			'A8' 		=> $this->input->post('trans_kom'),
// 			'A9' 		=> $this->input->post('ptgs_kebersihan'),
// 			'A10' 		=> $this->input->post('kas_prodi'),
// 			'A11' 		=> $this->input->post('kas_fkip'),
// 			'A12' 		=> $this->input->post('kas_universitas'),

// 			'J1'		=> $this->input->post('total1'),
// 			'J2' 		=> $this->input->post('total2'),
// 			'J3' 		=> $this->input->post('total3'),
// 			'J4' 		=> $this->input->post('total4'),
// 			'J5' 		=> $this->input->post('total5'),
// 			'J6' 		=> $this->input->post('total6'),
// 			'J7' 		=> $this->input->post('total7'),
// 			'J8' 		=> $this->input->post('total8'),
// 			'J9' 		=> $this->input->post('total9'),
// 			'J10' 		=> $this->input->post('total10'), //Kas Prodi
// 			'jumlah_p'	=> $jml,
// 			'J11' 		=> $this->input->post('total11'), // kas Fakultas
// 			'J12' 		=> $this->input->post('total12'),
// 			'total' 	=> $total,
// 			'saldo' 	=> $saldo,

// 			'nama'				=> $this->input->post('nama'),
// 			'jabatan'			=> $this->input->post('jabatan_pengaju'),
// 			'jumlah_pengajuan' 	=> $jml,
// 			'no_rekening'		=> $this->input->post('no_rek'),
// 			'nama_bank'			=> $this->input->post('nama_bank'),
// 			'jenis_byr'			=> $this->input->post('jenis_bayar'),

// 			'date_created' 	=> date('Y-m-d'),

// 		];

// 		if ($id_jenis_ujian == '3') {
// 			$data['jml_mhs_pemb'] = $this->input->post('pemb1');
// 			$data['total_insentif_pemb'] = $this->input->post('ttl_insentif_pemb1');
// 			$data['jml_mhs_pemb2'] = $this->input->post('pemb2');
// 			$data['total_insentif_pemb2'] = $this->input->post('ttl_insentif_pemb2');
// 		}

// 		$result = $this->db->insert('rab_ujian_surat', $data);


// 		// menyimpan ke tabel rab_insentif_penguji

// 		$i = 0; //for looping
// 		$nama_penguji 	= $this->input->post('nama_dosen');
// 		$jabatan 		= $this->input->post('jabatan');
// 		$jumlah_mhs 	= $this->input->post('jumlah_mhs');
// 		$insentif 		= $this->input->post('insentif1');
// 		$total 			= $this->input->post('total');


// 			if ($nama_penguji[0] != null) {

// 				foreach ($nama_penguji as $nama) {

// 					$dt = [
// 						'id_surat' 		=> $uuid,
// 						'nama_anggota' 	=> $nama,
// 						'jabatan'		=> $jabatan[$i],
// 						'jml_mhs'		=> $jumlah_mhs[$i],
// 						'insentif'		=> $insentif[$i],
// 						'total' 		=> $total[$i]
// 					];

// 					$insert = $this->db->insert('rab_insentif_penguji', $dt);

// 					if ($insert) {
// 						$i++;
// 					}

// 				}
// 			}


// 			//menyimpan ke tabel rab_insentif_pengelola

// 				$a = 0; //for looping
// 				$nama_angg 			= $this->input->post('nama_ds');
// 				$jabatan_angg 		= $this->input->post('jabatan2');
// 				$jumlah_mhs_angg 	= $this->input->post('jumlah_mhs2');
// 				$insentif2 			= $this->input->post('insentif2');
// 				$total_angg 		= $this->input->post('total_insf');


// 				if ($nama_angg[0] != null) {

// 					foreach ($nama_angg as $nama) {

// 						$result = [
// 							'id_surat' 		=> $uuid,
// 							'nama_anggota' 	=> $nama,
// 							'jabatan'		=> $jabatan_angg[$a],
// 							'jml_mhs'		=> $jumlah_mhs_angg[$a],
// 							'insentif'		=> $insentif2[$a],
// 							'total' 		=> $total_angg[$a]
// 						];

// 						$insert = $this->db->insert('rab_insentif_pengelola', $result);

// 						if ($insert) {
// 							$a++;
// 						}

// 					}
// 				}

// 				// menyimpan ke tabel rab_insentif_pkb 

// 				$p = 0; //for looping
// 				$nama_petugask 	= $this->input->post('petugas_kebersihan');
// 				$jumlah_m 		= $this->input->post('jml_m');
// 				$insentif3		= $this->input->post('insentif3');
// 				$totalk 		= $this->input->post('totalk');

// 				if ($nama_petugask[0] != null) {

// 					foreach ($nama_petugask as $nama) {

// 						$result = [
// 							'id_surat' 	=> $uuid,
// 							'nama' 		=> $nama,
// 							'jml_mhs'	=> $jumlah_m[$p],
// 							'insentif'	=> $insentif3[$p],
// 							'total'		=> $totalk[$p],
// 						];

// 						$insert = $this->db->insert('rab_insentif_pkb', $result);

// 						if ($insert) {
// 							$p++;
// 						}

// 					}
// 				}

	

// 				if ($id_jenis_ujian == '3') {


// 					// simpan ke tabel rab_pemb1

// 					$f = 0; //for looping
// 					$nama_pemb1 = $this->input->post('nama_ds_pemb1');
// 					$jml_mhs1 = $this->input->post('jumlah_mhs4');
// 					$insentif4 = $this->input->post('insentif4');
// 					$t_insentif = $this->input->post('total_ins');
					
// 					if ($nama_pemb1[0] != null) {

//     					foreach ($nama_pemb1 as $nama) {
    
//     						$result = [
//     							'id_surat' 		=> $uuid,
//     							'nama' 	        => $nama,
//     							'jumlah_mhs'		=> $jml_mhs1[$f],
//     							'insentif'		=> $insentif4[$f],
//     							'total' 		=> $t_insentif[$f]
//     						];
    
//     						$insert = $this->db->insert('rab_pemb1', $result);
    
//     						if ($insert) {
//     							$f++;
//     						}
    
//     					}
//     				}
    				
//     				$q = 0; //for looping
// 					$nama_pemb2 = $this->input->post('nama_ds_pemb2');
// 					$jml_mhs2 = $this->input->post('jumlah_mhs5');
// 					$insentif5 = $this->input->post('insentif5');
// 					$t_insentif5 = $this->input->post('total_ins5');
					
// 					if ($nama_pemb2[0] != null) {

//     					foreach ($nama_pemb2 as $nm) {
    
//     						$result = [
//     							'id_surat' 		=> $uuid,
//     							'nama' 	        => $nm,
//     							'jumlah_mhs'		=> $jml_mhs1[$q],
//     							'insentif'		=> $insentif5[$q],
//     							'total' 		=> $t_insentif5[$q]
//     						];
    
//     						$insert = $this->db->insert('rab_pemb2', $result);
    
//     						if ($insert) {
//     							$q++;
//     						}
    
//     					}
//     				}

// 				}

// 		// Masukkan data kas ke tabel kas prodi

// // 		$data_saldo  	= $this->tendik->get_saldo_terakhir();
// //         if ($data_saldo === null) {
// //         	$saldo_terakhir = 0;
// //         }else{
// //         	$saldo_terakhir = $data_saldo->saldo;
// //         }

//         if ($id_jenis_ujian === '1') {
//         	$ket = 'Kas ujian Proposal';
//         }elseif ($id_jenis_ujian === '2') {
//         	$ket = 'Kas ujian Hasil';
//         }else{
//         	$ket = 'Kas ujian Skripsi';
//         }

//         $kasProdi 					= $this->input->post('total10');
//         $data_kas['id_rab']			= $uuid;
// 		$data_kas['id_prodi'] 		= $id_prodi;
// 		$data_kas['jenis']			= 'M';
// 		$data_kas['jumlah']			= $kasProdi;
// 		$data_kas['ket']			= $ket;
// 		$data_kas['bukti'] 			= null;
// 		$data_kas['date_created']	= date('Y-m-d');

// 		$this->db->insert('kas_prodi', $data_kas);

// 		$this->session->set_flashdata('success', '<div class="alert alert-success">	RAB ujian berhasil dibuat!</div>');
// 		redirect('tendik/rab_ujian');

// 	}


	public function detail_rab($id_surat)
	{
		$this->simple_login->cek_login_tendik();

		$data['data_rab'] 		= $this->db->where('id_surat', $id_surat)
									->get('rab_ujian_surat')->row();
		$data['data_penguji']	= $this->db->where('id_surat', $id_surat)
									->get('rab_insentif_penguji')->result();
		$data['data_pengelola']	= $this->db->where('id_surat', $id_surat)
									->get('rab_insentif_pengelola')->result();
		$data['data_petugas_k']	= $this->db->where('id_surat', $id_surat)
									->get('rab_insentif_pkb')->result();

		if (!empty($data['data_rab'])) {

			$data['data']	= $this->db->get('config_rab')->row();
			$data['title']	= 'tendik - Detail rab';
	        $data['isi']	= 'tendik/detail_rab';
			$this->load->view('tendik/layout/wrapper', $data, FALSE);

		}else{

			$this->load->view('error');

		}

	}


	public function edit_rab($id_surat)
	{
		// $data_rab = $this->rab->getData($id_surat);
	}
	
	public function upload_form($id)
	{
		$data['id_rab'] = $id;
		$data['data']	= $this->db->get('config_rab')->row();
		$data['title']	= 'tendik - Upload bukti';
        $data['isi']	= 'tendik/upload_bukti_rab';
		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function upload_bukti()
	{
		$data = array(); 
        $errorUploadType = $statusMsg = ''; 
		$id_rab = $this->input->post('id_rab');

		$file = $_FILES['files']['name'];

			if (!empty($file) && count($file) > 0) {
				$fileCount = count($_FILES['files']['name']);
				for ($i=0; $i < $fileCount; $i++) { 
					 $_FILES['file']['name']     = $_FILES['files']['name'][$i]; 
                    $_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
                    $_FILES['file']['error']     = $_FILES['files']['error'][$i]; 
                    $_FILES['file']['size']     = $_FILES['files']['size'][$i]; 

					$uploadPath = './assets/upload/laporan_rab/bukti/'; 
                    $config['upload_path'] = $uploadPath; 
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                    $config['encrypt_name'] 	= true;
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 

					if ($this->upload->do_upload('file')) {
						$fileData = $this->upload->data();
						$uploadData[$i]['id_rab'] = $id_rab; 
						$uploadData[$i]['bukti'] = $fileData['file_name']; 
					}else{  
                        $errorUploadType .= $_FILES['file']['name'].' | ';  
                    } 

				}

				$errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 

				if(!empty($uploadData)){ 
                    // Insert files data into the database 
                    $insert = $this->tendik->upload_bukti_rab($uploadData); 
                     
                    // Upload status message 
                    $statusMsg = $insert?'Files uploaded successfully!'.$errorUploadType:'Some problem occurred, please try again.'; 
                }else{ 
                    $statusMsg = "Sorry, there was an error uploading your file.".$errorUploadType; 
                } 

			}else{ 
                $statusMsg = 'Please select image files to upload.'; 
            } 

        $data['statusMsg'] = $statusMsg; 
        redirect('tendik/rab_ujian');
	}


	public function cetak_rab($id_surat)
	{
		$data['data_rab'] 		= $this->db->where('id_surat', $id_surat)
									->get('rab_ujian_surat')->row();
		$data['data_penguji']	= $this->db->where('id_surat', $id_surat)
									->get('rab_insentif_penguji')->result();
		$data['data_pengelola']	= $this->tendik->get_pengelola($id_surat);
		$data['data_petugas_k']	= $this->db->where('id_surat', $id_surat)
									->get('rab_insentif_pkb')->result();
		$data['data_pemb1']	= $this->tendik->get_rab_pemb1($id_surat);
		$data['data_pemb2']	= $this->tendik->get_rab_pemb2($id_surat);
		$data['konfigurasi']	= $this->konfigurasi->getKonfigurasi();
		$data['data']	= $this->db->get('config_rab')->row();
		$data['bukti_tf'] 		= $this->db->where('id_rab', $id_surat)->get('rab_bukti')->result();
		

		$this->load->view('tendik/cetak_rab', $data, false);

	}

	public function laporan_rab()
	{
	    $data['rab']    = $this->tendik->getRab();
		$data['title']	= 'tendik - Laporan RAB';
        $data['isi']	= 'tendik/laporan/laporan_rab';
		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function cari_data_rab()
	{
		$data['rab'] = $this->tendik->getRab();

		echo $this->load->view('tendik/laporan/list_laporan_rab', $data, true);;
	}

	public function upload_laporan_rab($id)
	{
		cek_ajax();

		$data_rab = $this->db->get_where('rab_ujian_surat', ['id' => $id])->row();

	  	$fileName = $_FILES['fileUpload']['name'];
	  	//kalau ada filenya
	  	if ($fileName) {
	  		$test = explode('.', $fileName);
	  		$extention = end($test); //dapatkan ektensi dari file

	  		$nama_file = 'Laporan_rab_'.$data_rab->date_created.'-'.rand(100, 999). '.' .$extention;
	  		$path = './assets/upload/laporan_rab/'.$nama_file;
	  		move_uploaded_file($_FILES['fileUpload']['tmp_name'], $path);

	  		// set di database
	  		$data['upload_laporan'] = $nama_file;
	  		$data['updated_at'] 	= date('Y-m-d H:i:s');
	  		$this->db
	  		->where('id', $id)
	  		->update('rab_ujian_surat', $data);

	  		$pesan = [
	  			'status' => true,
	  			'pesan' => 'file laporan RAB berhasil di upload!'
	  		];

	  		$this->output_json($pesan);
	  	}

	}

	public function hapus_laporan_rab()
	{
		cek_ajax();

		$id = $this->input->post('id');
		$laporan_rab = $this->db->get_where('rab_ujian_surat', ['id' => $id])->row()->upload_laporan;

		// delete file di direktori
		if (!empty($laporan_rab)) {
			unlink('./assets/upload/laporan_rab/'.$laporan_rab);
		}

		// set null column upload_laporan di database
		$hapus = $this->db
	  		->where('id', $id)
	  		->update('rab_ujian_surat', ['upload_laporan' => null, 'updated_at' => null]);

		$pesan = [
			'status' => true,
			'pesan'	=> 'Data laporan RAB berhasil di hapus!'
		];

		$this->output_json($pesan);

	}


	public function hapus_rab($id_surat)
	{

		$data = $this->db->where('id_surat', $id_surat)->get('rab_ujian_surat')->row();
		$bukti_tf = $this->db->where('id_rab', $id_surat)->get('rab_bukti')->result();

		if (!empty($data)) {

			$this->db->query("DELETE FROM rab_ujian_surat WHERE id_surat = '$id_surat'");
			$this->db->query("DELETE FROM rab_insentif_pengelola WHERE id_surat = '$id_surat'");
			$this->db->query("DELETE FROM rab_insentif_penguji WHERE id_surat = '$id_surat'");
			$this->db->query("DELETE FROM rab_insentif_pkb WHERE id_surat = '$id_surat'");
			$this->db->query("DELETE FROM rab_pemb1 WHERE id_surat = '$id_surat'");
			$this->db->query("DELETE FROM rab_pemb2 WHERE id_surat = '$id_surat'");
			$this->db->query("DELETE FROM rab_bukti WHERE id_rab = '$id_surat'");

			// hapus saldo ditabel kas prodi
			$this->db->query("DELETE FROM kas_prodi WHERE id_rab = '$id_surat'");			

			// Hapus bukti rab
			if (!empty($bukti_tf)){
		        foreach ($bukti_tf as $image) { 
		           unlink(FCPATH . 'assets/upload/laporan_rab/bukti/' . $image->bukti);
		      }
		    }

			$this->session->set_flashdata('success', '<div class="alert alert-success">	RAB ujian berhasil dihapus!</div>');
			redirect('tendik/rab_ujian');

		}else{
			$this->load->view('error');
		}

	}


	//end RAB


	// pendaftar ujian

	public function pendaftar_ujian()
	{
		$this->simple_login->cek_login_tendik();

		$data['pendaftar'] = $this->daftar_ujian->getDataPendaftar();
		// var_dump($data);die;
		$data['tahun']	= $this->daftar_ujian->option_tahun();
		$data['jenis_ujian'] = $this->daftar_ujian->getJenisUjian();
		$data['title']	= 'tendik - pendaftar ujian';
        $data['isi']	= 'tendik/pendaftar_ujian';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}


	public function filter_pendaftar()
	{
		cek_post();

		$this->simple_login->cek_login_tendik();

		$filter = $this->input->post('filter');
		$where = $this->input->post('jenis_ujian');
		$nama_jenis_ujian = $this->daftar_ujian->nama_jenis_ujian($where);

		if ($filter == '1') {

			$tgl = $this->input->post('tgl');

			$data['ket'] = 'Data pendaftar ujian <b>'.$nama_jenis_ujian.'</b> Tanggal <b>'.date('d-m-Y', strtotime($tgl)).'</b>';
			$data['result'] = $this->daftar_ujian->view_by_date($tgl, $where);
			$url_cetak = 'tendik/cetak_filter?filter=1&tgl='.$tgl.'&jenis_ujian='.$where;

		}else if($filter == '2'){

			$bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');
            $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');


            $data['ket'] = 'Data pendaftar ujian <b>'.$nama_jenis_ujian.'</b> bulan <b>'.$nama_bulan[$bulan].' '.$tahun. '</b>';
           	$data['result'] = $this->daftar_ujian->view_by_month($bulan, $tahun, $where);
           	$url_cetak = 'tendik/cetak_filter?filter=2&bulan='.$bulan.'&tahun='.$tahun.'&jenis_ujian='.$where;

		}else if($filter == '3'){

            $tahun = $this->input->post('tahun');

            $data['ket'] = 'Data pendaftar ujian <b>'.$nama_jenis_ujian.'</b> Tahun <b>'.$tahun.'</b>';
           	$data['result'] = $this->daftar_ujian->view_by_year($tahun, $where);
           	$url_cetak = 'tendik/cetak_filter?filter=3&tahun='.$tahun.'&jenis_ujian='.$where;

		}else if($filter == '4'){

            $tahun = $this->input->post('tahun');
            $status = 1;

            $data['ket'] = 'Data pendaftar ujian yang <b> SUDAH UJIAN </b> Tahun <b>'.$tahun.'</b>';
           	$data['result'] = $this->daftar_ujian->view_by_year_status($tahun, $where, $status);
           	$url_cetak = 'tendik/cetak_filter?filter=4&tahun='.$tahun.'&jenis_ujian='.$where.'&status='.$status;

		}else if($filter == '5'){

            $tahun = $this->input->post('tahun');
            $status = 0;

            $data['ket'] = 'Data pendaftar ujian yang <b> SUDAH UJIAN </b> Tahun <b>'.$tahun.'</b>';
           	$data['result'] = $this->daftar_ujian->view_by_year_status($tahun, $where, $status);
           	$url_cetak = 'tendik/cetak_filter?filter=4&tahun='.$tahun.'&jenis_ujian='.$where.'&status='.$status;

		}else if($filter == '0'){

            $data['ket'] = 'Semua pendaftar <b>'.$nama_jenis_ujian.'</b>';
           	$data['result'] = $this->daftar_ujian->get_all_pendaftar($where);
           	$url_cetak = 'tendik/cetak_filter?filter=0&jenis_ujian='.$where;

		}

		$data['url_cetak']	= base_url($url_cetak);
		$data['title']	= 'Tendik - Filter pendaftar';
        $data['isi']	= 'tendik/filter_pendaftar';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function cetak_filter()
	{

		$filter = $_GET['filter'];
		$where = $_GET['jenis_ujian'];
		$nama_jenis_ujian = $this->daftar_ujian->nama_jenis_ujian($where);

		if ($filter == '1') {

			$tgl = $_GET['tgl'];
			$data['ket'] = 'Data pendaftar ujian <b>'.$nama_jenis_ujian.'</b> Tanggal <b>'.date('d-m-Y', strtotime($tgl)).'</b>';
			$data['result'] = $this->daftar_ujian->view_by_date($tgl, $where);

		}elseif ($filter == '2') {

			$bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');


            $data['ket'] = 'Data pendaftar ujian <b>'.$nama_jenis_ujian.'</b> bulan <b>'.$nama_bulan[$bulan].' '.$tahun. '</b>';
           	$data['result'] = $this->daftar_ujian->view_by_month($bulan, $tahun, $where);

		}elseif ($filter == '3') {

			$tahun = $_GET['tahun'];

            $data['ket'] = 'Data pendaftar ujian <b>'.$nama_jenis_ujian.'</b> Tahun <b>'.$tahun.'</b>';
           	$data['result'] = $this->daftar_ujian->view_by_year($tahun, $where);
           	$url_cetak = 'tendik/cetak_filter?filter=3&tahun='.$tahun.'&jenis_ujian='.$where;
			
		}elseif ($filter == '4') {

			$tahun = $_GET['tahun'];
			$status = $_GET['status'];

            $data['ket'] = 'Data pendaftar ujian yang<b> SUDAH UJIAN</b> Tahun <b>'.$tahun.'</b>';
           	$data['result'] = $this->daftar_ujian->view_by_year_status($tahun, $where, $status);
           	$url_cetak = 'tendik/cetak_filter?filter=3&tahun='.$tahun.'&jenis_ujian='.$where.'&status='.$status;
			
		}elseif ($filter == '5') {

			$tahun = $_GET['tahun'];
			$status = $_GET['status'];

            $data['ket'] = 'Data pendaftar ujian yang<b> SUDAH UJIAN</b> Tahun <b>'.$tahun.'</b>';
           	$data['result'] = $this->daftar_ujian->view_by_year_status($tahun, $where, $status);
           	$url_cetak = 'tendik/cetak_filter?filter=3&tahun='.$tahun.'&jenis_ujian='.$where.'&status='.$status;
			
		}else if($filter == '0'){

            $data['ket'] = 'Semua pendaftar <b>'.$nama_jenis_ujian.'</b>';
           	$data['result'] = $this->daftar_ujian->get_all_pendaftar($where);
		}

		$this->load->view('tendik/cetak_pendaftar_filter', $data, false);

// 		$this->simple_login->pdfGenerator($html, 'cetak_filter', 'Legal', 'potrait');
		
	}

	public function detail_daftar_ujian($nim, $id_jenis_ujian)
	{
		$this->simple_login->cek_login_tendik();
		$data['data'] = $this->daftar_ujian->getDataDaftarUjian($nim, $id_jenis_ujian);

		$data['title']	= 'Tendik - Detail';
        $data['isi']	= 'tendik/detail_daftar_ujian';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}


	public function delete_pendaftar_ujian($id)
	{
		$gambar = $this->daftar_ujian->getByNim($id);
		unlink('./assets/upload/image/'.$gambar->bukti_pembayaran_DU);
		unlink('./assets/upload/image/'.$gambar->bukti_lolos_toefl);
		unlink('./assets/upload/image/'.$gambar->bukti_btq);
		unlink('./assets/upload/image/'.$gambar->transkrip_nilai);
		$data = ['nim'	=> $nim ];

		$this->daftar_ujian->delete($data);
		$this->session->set_flashdata('sukses', ' di hapus');
		redirect('tendik/pendaftar_ujian');
	}



	public function edit_mhs($id)
	{

		$data['data']	= $this->db->get_where('bimbingan_mhs', ['id' => $id])->row();

		$data['dosen'] = $this->dosen->getAllDosen();
		$data['title']	= 'Tendik - Edit mahasiswa';
        $data['isi']	= 'tendik/edit_form_mhs';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function update_mhs_action($id)
	{
		$data = [

			'nama_mhs'			=> $this->input->post('nama'),
			'nim'				=> $this->input->post('nim'),
			'id_pembimbing1'	=> $this->input->post('pembimbing1'),
			'id_pembimbing2'	=> $this->input->post('pembimbing2'),
			'judul'				=> $this->input->post('judul_penelitian')

		];

		$this->db->where('id', $id);
		$this->db->update('bimbingan_mhs', $data);

		$this->session->set_flashdata('sukses', '<div class="alert alert-success">
								<strong><i class="ace-icon fa fa-bullhorn"></i> Sukses!
								</strong> Data berhasil di update <br /></div>');
		redirect('tendik/mahasiswa');

	}

	//update di hosting this area

	public function profil()
	{
		$data['profil'] = $this->db->get('adm_profil')->row();
		$data['title']	= 'Adm - Profil';
        $data['isi']	= 'tendik/profil';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	
	public function update_profil_adm($id)
	{

		$profil = $this->db->get_where('adm_profil', ['id' => $id])->row();

		$this->form_validation->set_rules('sambutan', 'Sejarah', 'trim|required', ['required' => '%s  Harus diisi']);
		$this->form_validation->set_rules('visi_misi', 'Visi & Misi', 'trim|required', ['required' => '%s Harus diisi']);
		$this->form_validation->set_rules('kompetensi_lulusan', 'Kompetensi lulusan', 'trim|required', ['required' => '%s Harus diisi']);

		if ($this->form_validation->run() == TRUE) {
			
			if (!empty($_FILES['struktur_organisasi']['name'])) {
				$config['upload_path'] 		= './assets/adm/img/';
				$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
				$config['max_size']  		= '3400';
				$config['max_width']  		= '3024';
				$config['max_height']  		= '3024';
				
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('struktur_organisasi')) {
					$data['profil'] = $this->db->get('adm_profil')->row();
					$data['title']	= 'Adm - Profil';
					$data['errors'] = $this->upload->display_errors();
        			$data['isi']	= 'tendik/profil';
					
					$this->load->view('tendik/layout/wrapper', $data, FALSE);

				} else {
					// masuk database
					if ($profil->struktur_organisasi != '') {
						  unlink('assets/adm/img/'.$profil->struktur_organisasi);
					}

					$upload_foto = ['upload_data' => $this->upload->data()];
					// $data['id'] 					= $id;
					$data['sambutan'] 				= $this->input->post('sambutan');
					$data['visi_misi']				= $this->input->post('visi_misi');
					$data['kompetensi_lulusan']		= $this->input->post('kompetensi_lulusan');
					$data['struktur_organisasi']	= $upload_foto['upload_data']['file_name'];

					$this->db->where('id', $id);
					$this->db->update('adm_profil', $data);

					$this->session->set_flashdata('sukses', "Data berhasil di update");
					redirect('tendik/profil');
				}

			}else {
				// tidak upload image

				$data['id'] 					= $id;
				$data['sambutan'] 				= $this->input->post('sambutan');
				$data['visi_misi']				= $this->input->post('visi_misi');
				$data['kompetensi_lulusan']		= $this->input->post('kompetensi_lulusan');

				$this->db->where('id', $id);
				$this->db->update('adm_profil', $data);

				$this->session->set_flashdata('sukses', "Data berhasil di update tanpa gambar");			
				redirect('tendik/profil');
			}
		} 

			
	}

	public function akademik()
	{
		$data['akademik']	= $this->db->get('adm_akademik')->row();
		$data['profil'] = $this->db->get('adm_profil')->row();
		$data['title']	= 'Adm - akademik';
        $data['isi']	= 'tendik/web/akademik';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function update_akademik($id)
	{
		$dt = $this->db->get_where('adm_akademik', ['id' => $id])->row();

		$config['upload_path'] 		= './assets/adm/file_upload/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|pdf';
		$config['max_size']  		= '2400'; //max besar file 2 mb
		$config['encrypt_name'] 	= true;

		$this->load->library('upload', $config);

		if (!empty($_FILES['kurikulum'])) {
			$this->upload->do_upload('kurikulum');
			$data1 = $this->upload->data();
			$file1 = $data1['file_name'];

			if ($dt->kurikulum != '') {
				  unlink('assets/adm/file_upload/'.$dt->kurikulum);
			}

		}

		if (!empty($_FILES['kalender_akademik'])) {
			$this->upload->do_upload('kalender_akademik');
			$data2 = $this->upload->data();
			$file2 = $data2['file_name'];

			if ($dt->kalender_akademik != '') {
				  unlink('assets/adm/file_upload/'.$dt->kalender_akademik);
			}

		}

		

		if (!empty($_FILES['jadwal_kuliah_genap'])) {
			$this->upload->do_upload('jadwal_kuliah_genap');
			$data3 = $this->upload->data();
			$file3 = $data3['file_name'];

			if ($dt->jadwal_kuliah != '') {
				  unlink('assets/adm/file_upload/'.$dt->jadwal_kuliah_genap);
			}

		}
		if (!empty($_FILES['jadwal_kuliah_ganjil'])) {
			$this->upload->do_upload('jadwal_kuliah_ganjil');
			$data4 = $this->upload->data();
			$file4 = $data4['file_name'];

			if ($dt->jadwal_kuliah != '') {
				  unlink('assets/adm/file_upload/'.$dt->jadwal_kuliah_ganjil);
			}

		}

		if (!empty($_FILES['akreditasi'])) {
			$this->upload->do_upload('akreditasi');
			$data5 = $this->upload->data();
			$file5 = $data5['file_name'];

			if ($dt->jadwal_kuliah != '') {
				  unlink('assets/adm/file_upload/'.$dt->akreditasi);
			}

		}

		$data['kurikulum'] = $file1;
		$data['kalender_akademik'] = $file2;
		$data['jadwal_kuliah_genap'] = $file3;
		$data['jadwal_kuliah_ganjil'] = $file4;
		$data['akreditasi'] = $file5;
		$data['ket_kurikulum'] = $this->input->post('ket_kurikulum');
		$data['ket_kalender_akademik'] = $this->input->post('ket_kalender_akademik');
		$data['ket_jadwal_kuliah'] = $this->input->post('ket_jadwal_kuliah');

		$this->db->where('id', $id);
		$this->db->update('adm_akademik', $data);

		redirect('tendik/akademik');
		$this->session->set_flashdata('sukses', 'Data berhasil di update');
	}

	public function fasilitas()
	{
		// $data['akademik']	= $this->db->get('adm_akademik')->row();
		$data['fasilitas'] = $this->db->get('adm_fasilitas')->result();
		$data['title']	= 'Adm - Fasilitas';
        $data['isi']	= 'tendik/web/fasilitas';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function tambah_fasilitas()
	{
		$data['title']	= 'Adm - Tambah Fasilitas';
        $data['isi']	= 'tendik/web/tambah_fasilitas';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function store_fasilitas()
	{
		$config['upload_path'] 		= './assets/adm/file_upload/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_size']  		= '2400'; //max besar file 2 mb
		$config['encrypt_name'] 	= true;

		$this->load->library('upload', $config);

		if (!empty($_FILES['gambar'])) {
			$this->upload->do_upload('gambar');
			$data1 = $this->upload->data();
			$file1 = $data1['file_name'];

			$data['deskripsi'] = $this->input->post('ket_gambar');
			$data['foto'] = $file1;

			$this->db->insert('adm_fasilitas', $data);
			redirect('tendik/fasilitas');
			$this->session->set_flashdata('sukses', 'data berhasil di input');

		}
	}


	public function hapus_fasilitas($id)
	{
		$fasilitas = $this->db->get_where('adm_fasilitas', ['id' => $id])->row();

		if (!empty($fasilitas)) {
			unlink('assets/adm/file_upload/'.$fasilitas->foto);
		}

		$this->db->delete('adm_fasilitas', ['id' => $id]);

		redirect('tendik/fasilitas');
		$this->session->set_flashdata('sukses', 'data berhasil di hapus');

	}

	public function pengumuman_berita()
	{
		$data['pengumuman'] = $this->db->get('adm_beranda')->result(); 
		$data['title']	= 'Adm - Pengumuman & Berita';
        $data['isi']	= 'tendik/web/pengumuman_berita';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function tambah_berita_pengumuman()
	{
		$data['title']	= 'Adm - Tambah Pengumuman & Berita';
        $data['isi']	= 'tendik/web/tambah_pengumuman_berita';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function store_pengumuman_berita()
	{
		$config['upload_path'] 		= './assets/adm/file_upload/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_size']  		= '2400'; //max besar file 2 mb
		$config['encrypt_name'] 	= true;

		$this->load->library('upload', $config);

		if (!empty($_FILES['gambar'])) {
			$this->upload->do_upload('gambar');
			$data1 = $this->upload->data();
			$file1 = $data1['file_name'];

			$slug 			= url_title($this->input->post('judul'), 'dash', TRUE);
			$data['jenis']	= $this->input->post('jenis');
			$data['slug'] 	= $slug;
			$data['judul']	= $this->input->post('judul');
			$data['isi']	= $this->input->post('isi');
			$data['gambar']	= $file1;
			$data['penulis']= "admin";
			$data['date_created']	= date('d m Y');

			$this->db->insert('adm_beranda', $data);
			redirect('tendik/pengumuman_berita');
			$this->session->set_flashdata('sukses', 'data berhasil di input');

		}
	}

	public function hapus_pengumuman_berita($id)
	{
		$pengumuman_berita = $this->db->get_where('adm_beranda', ['id' => $id])->row();

		if (!empty($pengumuman_berita)) {
			unlink('assets/adm/file_upload/'.$pengumuman_berita->gambar);
		}

		$this->db->delete('adm_beranda', ['id' => $id]);

		redirect('tendik/pengumuman_berita');
		$this->session->set_flashdata('sukses', 'data berhasil di hapus');

	}

	public function gambar()
	{
		$data['gambar'] = $this->db->get('adm_gallery')->result();
		$data['title']	= 'Adm - Gambar';
        $data['isi']	= 'tendik/web/gambar';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function tambah_gambar()
	{
		$data['title']	= 'Adm - Tambah Gambar';
        $data['isi']	= 'tendik/web/tambah_gambar';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function store_gambar()
	{
		$config['upload_path']	="./assets/adm/file_upload/"; //path folder file upload
        $config['allowed_types']='gif|jpg|png|jpeg'; //type file yang boleh di upload
        $config['encrypt_name'] = TRUE; //enkripsi file name upload
         
        $this->load->library('upload',$config); //call library upload 
        if($this->upload->do_upload("gambar")){ //upload file
            $dt = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
 
            $data['judul']			= $this->input->post('judul'); //get judul image
            $data['posisi_foto'] 	= $this->input->post('posisi');
            $data['foto'] 			= $dt['upload_data']['file_name'];
            $data['status'] 		= $this->input->post('status');
            $data['ket'] 			= $this->input->post('ket_gambar');
             
            $this->db->insert('adm_gallery', $data);


            $data = [
                    'status' => true,
                    'pesan'  => 'Data berhasil di simpan'
                ];

			echo json_encode($data);
        }else{
        	$data = [
                    'status' => false,
                    'pesan'  => 'Hanya gambar yang berekstensi jpg, png, jpeg'
                ];

			echo json_encode($data);
        }
	}

	public function hapus_gallery($id)
	{
		$gallery = $this->db->get_where('adm_gallery', ['id' => $id])->row();

		if (!empty($gallery)) {
			unlink('assets/adm/file_upload/'.$gallery->foto);
		}

		$this->db->delete('adm_gallery', ['id' => $id]);

		redirect('tendik/gambar');
		$this->session->set_flashdata('sukses', 'data berhasil di hapus');

	}

	public function repository()
	{
		$data['file'] 	= $this->db->get('adm_repository')->result();
		$data['title']	= 'Adm - Repository';
        $data['isi']	= 'tendik/web/repository';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function tambah_repo()
	{
		$data['title']	= 'Adm - Tambah Repository';
        $data['isi']	= 'tendik/web/tambah_repository';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function store_repo()
	{
		$config['upload_path'] 		= './assets/adm/file_upload/';
		$config['allowed_types'] 	= 'pdf';
		$config['max_size']  		= '2400'; //max besar file 2 mb

		$this->load->library('upload', $config);

		if (!empty($_FILES['file'])) {
			$this->upload->do_upload('file');
			$data1 = $this->upload->data();
			$file1 = $data1['file_name'];

			$data['type'] = $this->input->post('type');
			$data['nama_file'] = $this->input->post('nama_file');
			$data['file'] = $file1;

			$this->db->insert('adm_repository', $data);

		}
	}

	public function hapus_repo($id)
	{
		$file = $this->db->get_where('adm_repository', ['id' => $id])->row();

		if (!empty($file)) {
			unlink('assets/adm/file_upload/'.$file->foto);
		}

		$this->db->delete('adm_repository', ['id' => $id]);

		redirect('tendik/repository');
		$this->session->set_flashdata('sukses', 'data berhasil di hapus');

	}


	public function penelitian_pengabdian()
	{
		$data['title']	= 'Adm - Penelitian & Pengabdian';
        $data['isi']	= 'tendik/web/penelitian_pengabdian';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}


	// new
	public function get_ajax() {

	 	cek_ajax();

        $list = $this->tendik->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        
        foreach ($list as $mhs) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $mhs->nim;
            $row[] = $mhs->nama_lengkap;
            $row[] = $mhs->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan';
            $row[] = $mhs->no_wa;
            // add html for action
            $row[] = '
            <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModallarge" data-nim="'.$mhs->nim.'" id="btn-edit" title="Edit password">Edit password</a>
             <a href="#" id="hapus_mhs" data-id="'.$mhs->id.'" class="btn btn-danger btn-xs" title="Delete Mahasiswa"><i class="fa fa-trash"></i></a>
                   ';
            $data[] = $row;


             // <a href="'.base_url('tendik/reset_pass_mhs/'.$mhs->nim).'" class="btn btn-info btn-xs" title="Reset Password"><i class="fa fa-refresh"></i></a>
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->tendik->count_all(),
                    "recordsFiltered" => $this->tendik->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

	public function mhs()
	{
		$data['title']	= 'Tendik - Mahasiswa';
        $data['isi']	= 'tendik/mhs';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function tambah_mhs()
	{
		$data['title']	= 'Tendik - Tambah Mahasiswa';
        $data['isi']	= 'tendik/tambah_mhs';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function mhs_action()
	{
		$nim = $this->input->post('nim');

		$cek_nim = $this->surat->cekNim($nim);

		if ($cek_nim->num_rows() > 0) {
			$this->session->set_flashdata('gagal', 'Nim anda sudah terdaftar');

				redirect(base_url('tendik/tambah_mhs'));
		}else{

			$data['id_prodi']			= $this->session->userdata('prodi');
			$data['nim'] 				= $this->input->post('nim');
			$data['nama_lengkap'] 		= $this->input->post('nama_lengkap');
			$data['no_wa'] 				= $this->input->post('no_wa');
			$data['password'] 			= sha1($this->input->post('password'));
			$data['jenis_kelamin'] 		= $this->input->post('jenis_kelamin');
			$data['hak_akses'] 			= "mahasiswa";
			$data['join'] 				= date('Y-m-d');
			$data['status_daftar_ujian']= 0;

			$this->session->set_userdata($data);

			$this->surat->masukkan($data);
			$this->session->set_flashdata('success', '<div class="alert alert-success"><strong>sukses </strong> Mahasiswa berhasil di registrasi!</div>');
		redirect(base_url('tendik/mhs'));
		}
	}

	public function delete_mhs()
	{	
		$id = $this->input->post('id');

		$this->db->delete('pengguna', ['id' => $id]);
		$this->output->set_content_type('application/json')->set_output(json_encode([
			'status' => true
		]));
	}

	public function update_status_ujian()
	{
		cek_ajax();

		$data = $this->input->post('value');
		$id = $this->input->post('id');

		$this->db->set('status', $data);
		$this->db->where('id', $id);
		$this->db->update('daftar_ujian');

		$this->output->set_content_type('application/json')->set_output(json_encode(['message' => 'success']));
	}

	public function reset_pass_mhs()
	{
		$nim 		= $this->uri->segment(3);
		$mahasiswa 	= $this->tendik->get_mahasiswa('pengguna', $nim);

		if ($mahasiswa->num_rows() > 0) {
			$mhs 		= $mahasiswa->row();
			$nim 	= $mhs->nim;
		}

		$password = rand(123456,999999);
		$this->tendik->resetPasswordMhs($nim, $password);

		echo $this->session->set_flashdata('msg','show-modal');
        echo $this->session->set_flashdata('username', $nim);
        echo $this->session->set_flashdata('password', $password);
	    redirect('tendik/mhs');
	}

	public function detail_mhs($nim)
	{
		$data['story_daftar']	= $this->tendik->story_daftar($nim);
		$data['mhs']	= $this->tendik->detail_mhs($nim);
		$data['title']	= 'Tendik - Detail Mahasiswa';
        $data['isi']	= 'tendik/detail_mhs';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function search_dosen()
	{
		cek_ajax();

		$search = $this->input->post("search");
		$result = $this->tendik->get_data_dosen($search);

		foreach ($result as $value) {
			$selectAjax[] = array(
				'nidn' => $value['NIDN'],
				'label' => "nama : ".$value['nama_dosen']." ".$value['NIDN']
			);

			$this->output->set_content_type('application/json')->set_output(json_encode($selectAjax));
		}

	}

	public function form_pencairan()
	{
		$data['title']	= 'Tendik - Pengajuan Pencairan';
        $data['isi']	= 'tendik/form_pencairan';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	function form_import()
	{
		$data['title']	= 'Tendik - Form import mahasiswa';
        $data['isi']	= 'tendik/form_import';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}


	// import xlsx mahasiswa
	public function form(){

	cek_post();

    $data = array(); // Buat variabel $data sebagai array

  	// $filename = $_FILES['file']['name'];
    
    if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
      $upload = $this->tendik->upload_file($this->filename);
      
      if($upload['result'] == "success"){ // Jika proses upload sukses
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        
        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
        $data['sheet'] = $sheet; 
      }else{ // Jika proses upload gagal
        $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
      }
    }
    
   $data['title']	= 'Tendik - Form import mahasiswa';
	$data['isi']	= 'tendik/form_import';

	$this->load->view('tendik/layout/wrapper', $data, FALSE);
  }
  
  public function import(){
  	cek_post(); //cek kalau ada input post dari form
    // Load plugin PHPExcel nya
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    $excelreader = new PHPExcel_Reader_Excel2007();
    $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
    
    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
    $data = array();
    
    $numrow = 1;
    foreach($sheet as $row){
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1){
        // Kita push (add) array data ke variabel data
        array_push($data, array(
          'id_prodi'		=> $this->session->userdata('prodi'),
          'nim'				=> $row['A'], // Insert data nis dari kolom A di excel
          'password'		=> sha1($row['A']),
          'nama_lengkap'	=> $row['B'], // Insert data nama dari kolom B di excel
          'no_wa'			=> $row['C'], // Insert data jenis kelamin dari kolom c di excel
          'jenis_kelamin'	=> $row['D'], // Insert data jenis kelamin dari kolom D di excel
          'hak_akses'		=> 'mahasiswa',
          'image'			=> null,
          'join'			=> date('Y-m-d'),
          'status_daftar_ujian'	=> 0,
        ));
      }
      
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
    $this->tendik->insert_multiple($data);
    
    redirect("tendik/mhs"); // Redirect ke halaman awal (ke controller siswa fungsi index)
  }


  public function upload_file_surat($id)
  {
  	cek_ajax();
  	sleep(5);

  	$data_surat = $this->db->get_where('pengajuan_judul', ['id' => $id])->row();

  	$fileName = $_FILES['fileUpload']['name'];
  	// kalau ada filenya
  	if ($fileName) {
  		$test = explode('.', $fileName);
  		$extention = end($test); //dapatkan ektensi dari file

  		$nama_file = $data_surat->nim.'-'.date('Y-m-d').'-'.rand(100, 999). '.' .$extention;
  		$path = './assets/upload/surat_mahasiswa/'.$nama_file;
  		move_uploaded_file($_FILES['fileUpload']['tmp_name'], $path);

  		if ($data_surat->file != '') {
  			unlink('./assets/upload/surat_mahasiswa/'.$data_surat->file);
  		}

  		// set di database
  		$data['file'] = $nama_file;
  		$data['updated_at'] = date('Y-m-d H:i:s');
  		$this->db
  		->where('id', $id)
  		->update('pengajuan_judul', $data);

  		echo "sukses";

  	}

  }

  public function upload_file_suratAktif($id)
  {
  	cek_ajax();

  	$data_surat = $this->db->get_where('surat_aktif_kuliah', ['id_aktif_kuliah' => $id])->row();

  	$fileName = $_FILES['fileUpload']['name'];
  	// kalau ada filenya
  	if ($fileName) {
  		$test = explode('.', $fileName);
  		$extention = end($test); //dapatkan ektensi dari file

  		$nama_file = $data_surat->nim.'-'.date('Y-m-d').'-'.rand(100, 999). '.' .$extention;
  		$path = './assets/upload/surat_mahasiswa/'.$nama_file;
  		move_uploaded_file($_FILES['fileUpload']['tmp_name'], $path);

  		if ($data_surat->file != '') {
  			unlink('./assets/upload/surat_mahasiswa/'.$data_surat->file);
  		}

  		// set di database
  		$data['file'] = $nama_file;
  		$data['updated_at'] = date('Y-m-d H:i:s');
  		$this->db
  		->where('id_aktif_kuliah', $id)
  		->update('surat_aktif_kuliah', $data);

  		echo "sukses";

  	}
  }


  public function upload_file_skBeasiswa($id)
  {
  	cek_ajax();

  	$data_surat = $this->db->get_where('surat_tidak_menrima_beasiswa', ['id' => $id])->row();

  	$fileName = $_FILES['fileUpload']['name'];
  	// kalau ada filenya
  	if ($fileName) {
  		$test = explode('.', $fileName);
  		$extention = end($test); //dapatkan ektensi dari file

  		$nama_file = $data_surat->nim.'-'.date('Y-m-d').'-'.rand(100, 999). '.' .$extention;
  		$path = './assets/upload/surat_mahasiswa/'.$nama_file;
  		move_uploaded_file($_FILES['fileUpload']['tmp_name'], $path);

  		if ($data_surat->file != '') {
  			unlink('./assets/upload/surat_mahasiswa/'.$data_surat->file);
  		}

  		// set di database
  		$data['file'] = $nama_file;
  		$data['updated_at'] = date('Y-m-d H:i:s');
  		$this->db
  		->where('id', $id)
  		->update('surat_tidak_menrima_beasiswa', $data);

  		echo "sukses";

  	}
  }

  public function kirim_pesan()
  {
  	cek_ajax();
  	$type = $this->input->post('type');
  	$id = $this->input->post('id');

  	if ($type == 'izin_penelitian') {
  		$nama = $this->db->get_where('pengajuan_judul', ['id' => $id])->row()->nama;
  		$data['ket'] = $this->input->post('isi');
  		$this->db
  		->where('id', $id)
  		->update('pengajuan_judul', $data);
	  	$this->output->set_content_type('application/json')->set_output(json_encode([
	  		'status' => true,
	  		'nama' => $nama
	  	]));  

	  } elseif($type == 'aktif_kuliah') {
	  	$nama = $this->db->get_where('surat_aktif_kuliah', ['id_aktif_kuliah' => $id])->row()->nama;
  		$data['ket'] = $this->input->post('isi');
  		$this->db
  		->where('id_aktif_kuliah', $id)
  		->update('surat_aktif_kuliah', $data);
	  	$this->output->set_content_type('application/json')->set_output(json_encode([
	  		'status' => true,
	  		'nama' => $nama
	  	]));  	
  	} elseif($type == 'sk_beasiswa') {
	  	$nama = $this->db->get_where('surat_tidak_menrima_beasiswa', ['id' => $id])->row()->nama;
  		$data['ket'] = $this->input->post('isi');
  		$this->db
  		->where('id', $id)
  		->update('surat_tidak_menrima_beasiswa', $data);
	  	$this->output->set_content_type('application/json')->set_output(json_encode([
	  		'status' => true,
	  		'nama' => $nama
	  	]));  	
  	}
  		
  }
  
  public function set_no_sk()
  {
  	cek_ajax();
  	$id = $this->input->post('id');

  	$data['no_sk'] = $this->input->post('no_sk');
	  		$this->db
	  		->where('id_surat_seminar', $id)
	  		->update('surat_seminar', $data);

		$this->output_json(['status' => true, 'pesan' => 'nomor sk berhasil di masukkan']);
  }

  public function set_no_surat()
  {
  	cek_ajax(); //cek apakah requestnya ajax -> helper

  	$type = $this->input->post('type');
  	$id = $this->input->post('id');

  	if ($type == 'izin_penelitian') {
  		$data['no_surat'] = $this->input->post('no_surat');
	  		$this->db
	  		->where('id', $id)
	  		->update('pengajuan_judul', $data);
	  	$this->output->set_content_type('application/json')->set_output(json_encode([
	  		'status' => true
	  	]));
  	} elseif($type == 'aktif_kuliah') {
  		$data['no_surat'] = $this->input->post('no_surat');
	  		$this->db
	  		->where('id_aktif_kuliah', $id)
	  		->update('surat_aktif_kuliah', $data);
	  	$this->output->set_content_type('application/json')->set_output(json_encode([
	  		'status' => true
	  	]));
  	}elseif($type == 'sk_beasiswa') {
  		$data['no_surat'] = $this->input->post('no_surat');
	  		$this->db
	  		->where('id', $id)
	  		->update('surat_tidak_menrima_beasiswa', $data);
	  	$this->output->set_content_type('application/json')->set_output(json_encode([
	  		'status' => true
	  	]));
  	}
  		

  }

  public function approve_surat()
	{
		cek_ajax();

		$value = $this->input->post('value');
		$params = $this->input->post('params');

		if ($params == 'izin_penelitian') {
			
			$id = $this->input->post('id');
			$respon = $this->surat->approve_surat('pengajuan_judul', $id, 'id', $value);

			if ($respon) {
				$this->output_json(['status' => true]);
			}

		}else if($params == 'aktif_kuliah'){

			$id = $this->input->post('id');
			$respon = $this->surat->approve_surat('surat_aktif_kuliah', $id, 'id_aktif_kuliah', $value);

			if ($respon) {
				$this->output_json(['status' => true]);
			}
		}else if($params == 'sk_beasiswa'){
			$id = $this->input->post('id');
			$respon = $this->surat->approve_surat('surat_tidak_menrima_beasiswa', $id, 'id', $value);

			if ($respon) {
				$this->output_json(['status' => true]);
			}
		}
	}


	public function hapus_file_surat()
	{
		$type = $this->input->post('type');

		if ($type == 'izin_penelitian') {
			$id = $this->input->post('id');
			$file = $this->db->get_where('pengajuan_judul', ['id' => $id])->row()->file;

			$hapus = $this->db
	  		->where('id', $id)
	  		->update('pengajuan_judul', ['file' => null]);

	  		// hapus file di direktori
	  		if ($file != '') {
	  			unlink('./assets/upload/surat_mahasiswa/'.$file);
	  		}

	  		$this->output->set_content_type('application/json')->set_output(json_encode([
	  			'status' => true,
	  		]));
		}elseif ($type == 'aktif_kuliah') {
			$id = $this->input->post('id');
			$file = $this->db->get_where('surat_aktif_kuliah', ['id_aktif_kuliah' => $id])->row()->file;

			$hapus = $this->db
	  		->where('id_aktif_kuliah', $id)
	  		->update('surat_aktif_kuliah', ['file' => null]);

	  		// hapus file di direktori
	  		if ($file != '') {
	  			unlink('./assets/upload/surat_mahasiswa/'.$file);
	  		}

	  		$this->output->set_content_type('application/json')->set_output(json_encode([
	  			'status' => true,
	  		]));
		}elseif ($type == 'sk_beasiswa') {
			$id = $this->input->post('id');
			$file = $this->db->get_where('surat_tidak_menrima_beasiswa', ['id' => $id])->row()->file;

			$hapus = $this->db
	  		->where('id', $id)
	  		->update('surat_tidak_menrima_beasiswa', ['file' => null]);

	  		// hapus file di direktori
	  		if ($file != '') {
	  			unlink('./assets/upload/surat_mahasiswa/'.$file);
	  		}

	  		$this->output->set_content_type('application/json')->set_output(json_encode([
	  			'status' => true,
	  		]));
		}	
		
	}

	public function update_pass_mhs()
	{
		$nim = $this->input->post('nim');
		$pass_baru = $this->input->post('pass_baru');

		$update = $this->db
	  		->where('nim', $nim)
	  		->update('pengguna', ['password' => sha1($pass_baru)]);

		$this->output->set_content_type('application/json')->set_output(json_encode([
			'status' => true
		]));
	}


	public function get_autocomplete()
	{
		if (isset($_GET['term'])) {
            $result = $this->tendik->search_dosen($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = [
                	'label'	=> $row->nama_dosen,
                	'id_dosen'	=> $row->id_dosen
                ];
                echo json_encode($arr_result);
            }
        }
	}

	public function get_autocompleteMhs()
	{
		if (isset($_GET['term'])) {
            $result = $this->tendik->search_mahasiswa($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->nama_mhs;
                echo json_encode($arr_result);
            }
        }
	}

	public function edit_tgl_rab()
	{
		cek_ajax();

		$id = $this->input->post('id');
		$tgl = $this->input->post('value');

		$this->db->set('date_created', $tgl);
		$this->db->where('id', $id);
		$this->db->update('rab_ujian_surat');

		$message = [
			'status' => true,
			'pesan'	 => 'Tanggal RAB berhasil di update'
		];

		$this->output_json($message);

	}

	public function get_autocomplete2()
	{
		if (isset($_GET['term'])) {
            $result = $this->tendik->search_dosen($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->nama_dosen;
                echo json_encode($arr_result);
            }
        }
	}


	// raw

	public function raw()
	{
		$this->simple_login->cek_login_tendik();
		
		$data['result'] = $this->tendik->getDataRaw();
		$data['title']	= 'Tendik - Realisasi Anggaran Wisuda';
		$data['isi']	= 'tendik/raw/list';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function buat_pengajuan_raw()
	{
		$this->simple_login->cek_login_tendik();
		$data['title']	= 'Tendik - Buat pengjuan raw';
		$data['isi']	= 'tendik/raw/form_buat_pengajuan';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function post_raw()
	{
		cek_post();
		$uuid = Uuid::uuid4()->toString();

		$config_raw 		= $this->tendik->getDataConfigRaw();
		$jumlah_wisudawan 	= $this->input->post('jumlah_wisudawan');
		

		$j1 	= $jumlah_wisudawan * $config_raw->pemb_transkrip_nilai;
		$j2 	= $jumlah_wisudawan * $config_raw->pemb_akta;
		$j3 	= $jumlah_wisudawan * $config_raw->materai;

		$j4 	= $jumlah_wisudawan * $config_raw->skpi;
		$j5 	= $jumlah_wisudawan * $config_raw->buku;
		$total1 = $j1 + $j2 + $j3 + $j4 + $j5;
		
		$j6 	=  $jumlah_wisudawan * $config_raw->akta_mengajar;
		$j7 	=  $jumlah_wisudawan * $config_raw->transkrip_nilai;
		$total2	= $j6 + $j7;

		$j8 	= $jumlah_wisudawan * $config_raw->pemb_skpi;
		$j9 	= $jumlah_wisudawan * $config_raw->ttd_skpi_dekan;
		$j10 	= $jumlah_wisudawan * $config_raw->ttd_skpi_prodi;
		$j11 	= $jumlah_wisudawan * $config_raw->kas_fakultas;
		$j12 	= $jumlah_wisudawan * $config_raw->kas_prodi;
		$j13 	= $jumlah_wisudawan * $config_raw->verifikasi_wadek;
		$j14 	= $jumlah_wisudawan * $config_raw->verifikasi_staff_fakultas;
		$j15 	= $jumlah_wisudawan * $config_raw->verifikasi_kaprodi ;
		$total3 = $j8 + $j9 + $j10 + $j11 + $j12 + $j13 + $j14 + $j15;
		

		$data = [
			'id_raw' => $uuid,
			'id_prodi' => $this->session->userdata('prodi'),
			'jml_mhs' => $jumlah_wisudawan,
			'j1' => $j1,
			'j2' => $j2,
			'j3' => $j3,
			'j4' => $j4,
			'j5' => $j5,
			't1' => $total1,
			'j6' => $j6,
			'j7' => $j7,
			't2' => $total2,
			'j8' => $j8,
			'j9' => $j9,
			'j10' => $j10,
			'j11' => $j11,
			'j12' => $j12,
			'j13' => $j13,
			'j14' => $j14,
			'j15'=> $j15,
			't3' => $total3,
			'date_created' => date('Y-m-d')
		];

		$this->db->insert('raw', $data);

		// masukka data ke tabel raw pengelola
		$nama_pengelola = $this->input->post('nama_pengelola');
		$jabatan 		= $this->input->post('jabatan');
		
		$jml_awal = ($j1 + $j2 + $j3 ) - $total2;
		$jumlah_insentif_pengelola = ceil($jml_awal / count($nama_pengelola));

		$a = 0;
		if ($nama_pengelola[0] != null) {

			foreach ($nama_pengelola as $nama) {

				$result = [
					'id_raw' 		=> $uuid,
					'nama_pengelola'=> $nama,
					'jabatan'		=> $jabatan[$a],
					'jumlah'		=> $jumlah_insentif_pengelola
				];

				$insert = $this->db->insert('raw_pengelola', $result);

				if ($insert) {
					$a++;
				}

			}
		}else{
			echo "Data gagal di masukkan!";
		}


		$this->session->set_flashdata('sukses', '<div class="alert alert-success"><strong>sukses ! </strong> RAW berhasil di buat! </div>');
		redirect('tendik/raw');


	}

	public function raw_preview($id_raw)
	{
		$this->simple_login->cek_login_tendik();
		$data['config']		= $this->tendik->getDataConfigRaw();
		$data['data']		= $this->tendik->getDataRawDetail($id_raw);
		$data['pengelola'] 	= $this->tendik->getJmlPengelolaRaw($id_raw);
		$data['title']		= 'Tendik - Preview Realisasi Anggaran Wisuda';
		$data['isi']		= 'tendik/raw/preview';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}
	
	public function raw_edit($id_raw)
	{
		$this->simple_login->cek_login_tendik();
		$data['config']		= $this->tendik->getDataConfigRaw();
		$data['data']		= $this->tendik->getDataRawDetail($id_raw);
		$data['pengelola'] 	= $this->tendik->getJmlPengelolaRaw($id_raw);
		$data['title']		= 'Tendik - Preview Realisasi Anggaran Wisuda';
		$data['isi']		= 'tendik/raw/edit';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}
	
	public function edit_raw($id_raw)
	{
		$this->simple_login->cek_login_tendik();
		cek_post();		

		$config_raw 		= $this->tendik->getDataConfigRaw();
		$jumlah_wisudawan 	= $this->input->post('jumlah_wisudawan');
		$dt 				= $this->tendik->getDataRawDetail($id_raw);

		$j1 	= $jumlah_wisudawan * $config_raw->pemb_transkrip_nilai;
		$j2 	= $jumlah_wisudawan * $config_raw->pemb_akta;
		$j3 	= $jumlah_wisudawan * $config_raw->materai;

		$j4 	= $jumlah_wisudawan * $config_raw->skpi;
		$j5 	= $jumlah_wisudawan * $config_raw->buku;
		$total1 = $j1 + $j2 + $j3 + $j4 + $j5;

		$j6 	=  $jumlah_wisudawan * $config_raw->akta_mengajar;
		$j7 	=  $jumlah_wisudawan * $config_raw->transkrip_nilai;
		$total2	= $j6 + $j7;

		$j8 	= $jumlah_wisudawan * $config_raw->pemb_skpi;
		$j9 	= $jumlah_wisudawan * $config_raw->ttd_skpi_dekan;
		$j10 	= $jumlah_wisudawan * $config_raw->ttd_skpi_prodi;
		$j11 	= $jumlah_wisudawan * $config_raw->kas_fakultas;
		$j12 	= $jumlah_wisudawan * $config_raw->kas_prodi;
		$j13 	= $jumlah_wisudawan * $config_raw->verifikasi_wadek;
		$j14 	= $jumlah_wisudawan * $config_raw->verifikasi_staff_fakultas;
		$total3 = $j8 + $j9 + $j10 + $j11 + $j12 + $j13 + $j14;

		$data = [
			'id_raw' => $id_raw,
			'id_prodi' => $this->session->userdata('prodi'),
			'jml_mhs' => $jumlah_wisudawan,
			'j1' => $j1,
			'j2' => $j2,
			'j3' => $j3,
			'j4' => $j4,
			'j5' => $j5,
			't1' => $total1,
			'j6' => $j6,
			'j7' => $j7,
			't2' => $total2,
			'j8' => $j8,
			'j9' => $j9,
			'j10' => $j10,
			'j11' => $j11,
			'j12' => $j12,
			't3' => $total3,
			'date_created' => date('Y-m-d')
		];

		$this->db->where('id_raw', $id_raw);
		$this->db->update('raw', $data);

		// delete data di tabel raw pengelola
		$this->db->delete('raw_pengelola', array('id_raw' => $id_raw));

		// masukka data ke tabel raw pengelola
		$nama_pengelola = $this->input->post('nama_pengelola');
		$jabatan 		= $this->input->post('jabatan');
		$jml_awal 		= ($j1 + $j2 + $j3 ) - $total2;
		$jumlah_insentif_pengelola = ceil($jml_awal / count($nama_pengelola));

		$a = 0;
		if ($nama_pengelola[0] != null) {

			foreach ($nama_pengelola as $nama) {

				$result = [
					'id_raw' 		=> $id_raw,
					'nama_pengelola'=> $nama,
					'jabatan'		=> $jabatan[$a],
					'jumlah'		=> $jumlah_insentif_pengelola
				];

				$insert = $this->db->insert('raw_pengelola', $result);

				if ($insert) {
					$a++;
				}

			}
		}else{
			echo "Data gagal di masukkan!";
		}


		$this->session->set_flashdata('sukses', '<div class="alert alert-success"><strong>sukses ! </strong> RAW berhasil di ubah! </div>');
		redirect('tendik/raw');
	}

	public function raw_delete($id_raw)
	{
		//delete di tabel raw
		$this->db->delete('raw', array('id_raw' => $id_raw));
		// delete data di tabel raw pengelola
		$this->db->delete('raw_pengelola', array('id_raw' => $id_raw));

		$this->session->set_flashdata('sukses', '<div class="alert alert-success"><strong>sukses ! </strong> RAW berhasil di Hapus! </div>');
		redirect('tendik/raw');
	}

	public function update_status_raw()
	{
		cek_ajax();

		$id = $this->input->post('id');

		// set null column raw di database
		$hapus = $this->db
	  		->where('id', $id)
	  		->update('raw', ['status' => '1', 'tgl_diajukan' => date('Y-m-d')]);

		$pesan = [
			'status' => true,
			'pesan'	=> 'Raw berhasil di update!'
		];

		$this->output_json($pesan);
	}


	public function update_pengajuan_judul()
	{
		$id =  $this->input->post('id');
		$data = $this->input->post('value');

		$this->db->set('status', $data)->where('id', $id)->update('bimbingan_mhs');

		$data = [
			'status' => true,
			'pesan' => 'Status berhasil di update!',
		];
		echo json_encode($data);
	}
	
	
	// KAS Prodi

	public function kas_prodi()
	{
	    $pemasukan  	= $this->tendik->pemasukan();
        if ($pemasukan === null) {
        	$saldo = 0;
        }else{
        	$saldo = $pemasukan->jumlah;
        }

        $pengeluaran = $this->tendik->pengeluaran();

        $total = $saldo - $pengeluaran->jumlah;

		$data['title']	= 'Tendik - KAS Prodi';
        $data['isi']	= 'tendik/laporan/kas_prodi';
       $data['saldo'] 	= $total;

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function cari_kas_prodi()
	{
		$id_prodi 		= $this->session->userdata('prodi');
		$data['kas'] 	= $this->tendik->getKasProdi($id_prodi);

		echo $this->load->view('tendik/laporan/result_kas', $data, true);
	}

	public function input_kas()
	{
		$data['title']	= 'Tendik - input KAS Prodi';
        $data['isi']	= 'tendik/laporan/input_kas';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function simpan_kas()
	{
		cek_ajax();

        $config['upload_path']      = './assets/upload/bukti_kas/';
        $config['allowed_types']    = 'jpg|png|jpeg|pdf';
        $config['max_size']         = '2072';
        $config['encrypt_name']     = true;
        
        $this->load->library('upload', $config);
        $data1 = $this->upload->data();
        
        if ( ! $this->upload->do_upload('bukti')){

            $output = [
                'status'    => false,
                'message'   => $this->upload->display_errors()
            ];

            $this->output->set_content_type('application/json')->set_output(json_encode($output));
        }
        else{

            $jumlah_kas 	= $this->input->post('jumlah');
            $jenis 			= $this->input->post('jenis', true);

            $data['id_prodi']       = $this->session->userdata('prodi');
            $data['jenis']          = $jenis;
            $data['jumlah']			= $jumlah_kas;
            $data['ket']       		= $this->input->post('keterangan', true);
            $data['bukti']          = $this->upload->data('file_name');
            $data['date_created']   = date('Y-m-d');

            $this->db->insert('kas_prodi', $data);

            $output = [
                'status'    => true,
                'message'   => '<b>Sukses !</b> Data kas berhasil di simpan, Silahkan klik <b>Kembali</b>'
            ];
            $this->output->set_content_type('application/json')->set_output(json_encode($output));
            
        }

        
	}
	
	public function editSuratAktifKuliah($id)
	{
		$data['data'] = $this->db->get_where('surat_aktif_kuliah', ['id_aktif_kuliah' => $id])->row();

		$data['title']	= 'Tendik - edit surat aktif kuliah';
        $data['isi']	= 'tendik/edit_surat_aktif_kuliah';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function update_surat_aktif_kuliah($id)
	{

		cek_post();

		$data['nama'] 			= $this->input->post('nama');
		$data['tempat_lahir'] 	= $this->input->post('tempat');
		$data['tgl_lahir']		= $this->input->post('tgl_lahir');
		$data['nim'] 			= $this->input->post('nim');
		$data['semester'] 		= $this->input->post('smt');
		$data['alamat'] 		= $this->input->post('alamat');

		$data['nama_ortu']		= $this->input->post('nama_ortu');
		$data['nip']			= $this->input->post('nip');
		$data['pangkat']		= $this->input->post('pangkat');
		$data['jabatan']		= $this->input->post('jabatan');
		$data['instansi']		= $this->input->post('instansi');
		$data['alamat_ortu']	= $this->input->post('alamat_ortu');

		$update = $this->db->where('id_aktif_kuliah', $id)->update('surat_aktif_kuliah', $data);

		if ($update) {
			$this->session->set_flashdata('sukses', 'Surat berhasil di update');
			redirect('tendik/surat_aktif_kuliah');
		}
	}
	
	public function editSuratIzinPenelitian($id)
	{
		$data['data'] = $this->db->get_where('pengajuan_judul', ['id' => $id])->row();

		$data['title']	= 'Tendik - edit surat izin penelitian';
        $data['isi']	= 'tendik/edit_surat_izin_penelitian';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function update_surat_izin_penelitian($id)
	{
		cek_post();

		$data['semester'] 			= $this->input->post('smt');
		$data['judul_penelitian'] 	= $this->input->post('judul');
		$data['status'] 			= $this->input->post('status');

		$update = $this->db->where('id', $id)->update('pengajuan_judul', $data);

		if ($update) {
			$this->session->set_flashdata('sukses', 'Surat izin penelitian berhasil di update');
			redirect('tendik/surat_pengajuan_judul');
		}

	}

	public function editBeasiswa($id)
	{
		$data['data'] = $this->db->get_where('surat_tidak_menrima_beasiswa', ['id' => $id])->row();

		$data['title']	= 'Tendik - edit surat izin tidak menerima beasiswa';
        $data['isi']	= 'tendik/edit_beasiswa';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function update_beasiswa($id)
	{
		cek_post();

		$data['tempat_lahir'] 	= $this->input->post('tempat');
		$data['tgl_lahir'] 		= $this->input->post('tgl_lahir');
		$data['thn_akademik'] 	= $this->input->post('tahun_akademik');
		$data['status'] 		= $this->input->post('status');

		$update = $this->db->where('id', $id)->update('surat_tidak_menrima_beasiswa', $data);

		if ($update) {
			$this->session->set_flashdata('sukses', 'Surat ket. tidak menerima beasiswa berhasil di update');
			redirect('tendik/sk_beasiswa');
		}
	}
	
	public function skpi()
	{	
		$prodi = $this->session->userdata('prodi');

		$data['skpi'] = $this->db
					->select('pengguna.nama_lengkap, sm.*')
					->from('skpi_mahasiswa sm')
					->join('pengguna', 'pengguna.nim = sm.nim', 'left')
					->where(['sm.id_prodi' => $prodi])
					->get()->result();

		$data['title']	= 'Tendik - SKPI Mahasiswa';
        $data['isi']	= 'tendik/skpi';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}
	
	public function hapus_skpi($id)
	{
	    $this->db->query("DELETE FROM skpi_mahasiswa WHERE id = '$id'");
	    redirect('tendik/skpi');
	}

    public function cetak_skpi($id)
	{

		$this->db->select('prodi.nama_prodi');
		$this->db->from('prodi');
		$this->db->where('id_prodi', $this->session->userdata('prodi'));

		$data['nama_prodi'] = $this->db->get()->row()->nama_prodi;

		$data['data_skpi'] = $this->db
					->select('pengguna.nama_lengkap, sm.*, bm.judul')
					->from('skpi_mahasiswa sm')
					->join('pengguna', 'pengguna.nim = sm.nim', 'left')
					->join('bimbingan_mhs bm', 'bm.nim = pengguna.nim', 'left')
					->where(['sm.id' => $id])
					->get()->row();
		$data['penghargaan'] = $this->db->get_where('skpi_penghargaan', ['id_skpi' => $id])->result();
		$data['pelatihan'] = $this->db->get_where('skpi_pelatihan', ['id_skpi' => $id])->result();
		$data['organisasi'] = $this->db->get_where('skpi_organisasi', ['id_skpi' => $id])->result();
		$data['keahlian'] = $this->db->get_where('skpi_keahlian', ['id_skpi' => $id])->result();
		$data['magang'] = $this->db->get_where('skpi_magang', ['id_skpi' => $id])->result();
		$data['konfigurasi']	= $this->konfigurasi->getKonfigurasi();


		$this->load->view('tendik/cetak_skpi', $data, false);
	}

	public function edit_skpi($id)
	{

		$data['data'] = $this->db
					->select('pengguna.nama_lengkap, sm.*, bm.judul')
					->from('skpi_mahasiswa sm')
					->join('pengguna', 'pengguna.nim = sm.nim', 'left')
					->join('bimbingan_mhs bm', 'bm.nim = pengguna.nim', 'left')
					->where(['sm.id' => $id])
					->get()->row();

		$data['penghargaan'] 	= $this->db->get_where('skpi_penghargaan', ['id_skpi' => $id])->result();
		$data['pelatihan'] 		= $this->db->get_where('skpi_pelatihan', ['id_skpi' => $id])->result();
		$data['organisasi'] 	= $this->db->get_where('skpi_organisasi', ['id_skpi' => $id])->result();
		$data['keahlian'] 		= $this->db->get_where('skpi_keahlian', ['id_skpi' => $id])->result();
		$data['magang'] 		= $this->db->get_where('skpi_magang', ['id_skpi' => $id])->result();

		$data['title']	= 'Tendik - Ubah SKPI Mahasiswa';
        $data['isi']	= 'tendik/edit_skpi';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function update_skpi(){
		$id_skpi = $this->input->post('id_skpi');
		$no_ijazah = $this->input->post('no_ijazah');
		$no_surat = $this->input->post('no_surat');

		$data = [
				'no' 					=> $this->input->post('no_surat'),
				'no_ijazah'				=> $this->input->post('no_ijazah'),
				'tempat_lahir' 			=> $this->input->post('tempat'),
				'tgl_lahir' 			=> $this->input->post('tgl_lahir'),
				'tahun_masuk' 			=> $this->input->post('tahun_masuk'),
				'tahun_lulus' 			=> $this->input->post('tahun_lulus'),
				'status' 				=> 'Diterima',
				'updated_at' 			=> date('Y-m-d'),
			];	


		$update = $this->db->where('id', $id_skpi)->update('skpi_mahasiswa', $data);

		redirect('tendik/skpi');

	}

	public function update_status_skpi()
	{
		cek_ajax();

		$value = $this->input->post('value');
		$id = $this->input->post('id');

		$update = $this->db->where('id', $id)->update('skpi_mahasiswa', ['status' => $value]);


		if ($update) {
			$this->output->set_content_type('application/json')->set_output(json_encode(['message' => 'success']));
		}
		

	}

	public function preview($id)
	{
		$data['data'] = $this->db
					->select('pengguna.nama_lengkap, sm.*, bm.judul')
					->from('skpi_mahasiswa sm')
					->join('pengguna', 'pengguna.nim = sm.nim', 'left')
					->join('bimbingan_mhs bm', 'bm.nim = pengguna.nim', 'left')
					->where(['sm.id' => $id])
					->get()->row();

		$data['penghargaan'] 	= $this->db->get_where('skpi_penghargaan', ['id_skpi' => $id])->result();
		$data['pelatihan'] 		= $this->db->get_where('skpi_pelatihan', ['id_skpi' => $id])->result();
		$data['organisasi'] 	= $this->db->get_where('skpi_organisasi', ['id_skpi' => $id])->result();
		$data['keahlian'] 		= $this->db->get_where('skpi_keahlian', ['id_skpi' => $id])->result();
		$data['magang'] 		= $this->db->get_where('skpi_magang', ['id_skpi' => $id])->result();

		$data['title']	= 'Tendik - Preview SKPI Mahasiswa';
        $data['isi']	= 'tendik/preview_skpi';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}
	
	public function luluskan_mhs()
	{
		$data['title']	= 'Tendik - Luluskan';
        $data['isi']	= 'tendik/pelulusan_mhs';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
		
	}

	public function filter_mhs_angkt($query)
	{
		cek_ajax();
		
		// $query = $this->input->get('data_search');

		$data['result'] = $this->db
				->select('*')
				->from('pengguna')
				->like('nim', $query)
				->get()->result();


		echo $this->load->view('tendik/list_result_luluskan', $data, true);
	}

	public function update_status_mhs()
	{
		cek_ajax();

			
		$chk = $this->input->post('checked', true);

		if (!$chk) {
			$this->output_json(['status' => false]);
		} else {
			if ($this->tendik->update_status_mhs($chk, 'id')) {
				$this->output_json(['status' => true, 'total' => count($chk)]);
			}
		}
	}

}
