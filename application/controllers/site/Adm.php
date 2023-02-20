<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm extends CI_Controller {
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
		$this->load->model('galeri_model', 'galeri');
		$this->load->model('unit_model', 'unit');
		$this->load->model('adm_model', 'adm');
		$this->load->helper('download');
	}

	public function index()
	{
		$data['berita'] = $this->db->get_where('adm_beranda', ['jenis' => 'Berita'])->result();
		$data['slider'] = $this->db->get_where('adm_gallery', ['posisi_foto' => 'Slider', 'status' => 'Publish'])->result();
		$data['pengumuman'] = $this->db->get_where('adm_beranda', ['jenis' => 'Pengumuman'])->result();
		$data['title'] = "Home - Administrasi Pendidikan";
		$data['isi']   = "adm/index";

		$this->load->view('adm/layout/wrapper', $data, FALSE);
	}

	public function baca_berita($slug)
	{
		$data['berita'] = $this->db->get_where('adm_beranda', ['slug' => $slug])->row();
		$data['berita_lain'] = $this->db->get_where('adm_beranda', ['jenis' => 'Berita'])->result();
		$data['title'] = "Baca berita - Administrasi Pendidikan";
		$data['isi']   = "adm/baca_berita";

		$this->load->view('adm/layout/wrapper', $data, FALSE);
	}

	public function baca_pengumuman($slug)
	{
		$data['pengumuman'] = $this->db->get_where('adm_beranda', ['slug' => $slug])->row();
		$data['pengumuman_lain'] = $this->db->get_where('adm_beranda', ['jenis' => 'Pengumuman'])->result();
		$data['title'] = "Baca pengumuman - Administrasi Pendidikan";
		$data['isi']   = "adm/baca_pengumuman";

		$this->load->view('adm/layout/wrapper', $data, FALSE);
	}

	public function sambutan()
	{
		$data['sambutan'] = $this->db->get('adm_profil')->row()->sambutan;
		$data['title'] = "Sambutan - Administrasi Pendidikan";
		$data['isi']   = "adm/sambutan";

		$this->load->view('adm/layout/wrapper', $data, FALSE);
	}

	public function visi_misi()
	{
		$data['visi_misi'] = $this->db->get('adm_profil')->row()->visi_misi;
		$data['title'] = "Visi_misi - Administrasi Pendidikan";
		$data['isi']   = "adm/visi_misi";

		$this->load->view('adm/layout/wrapper', $data, FALSE);
	}

	public function kompetensi_lulusan()
	{
		$data['kompetensi_lulusan'] = $this->db->get('adm_profil')->row()->kompetensi_lulusan;
		$data['title'] = "Kompetensi lulusan - Administrasi Pendidikan";
		$data['isi']   = "adm/kompetensi_lulusan";

		$this->load->view('adm/layout/wrapper', $data, FALSE);
	}
	public function struktur_organisasi()
	{
		$data['struktur_organisasi'] = $this->db->get('adm_profil')->row()->struktur_organisasi;
		$data['title'] = "Struktur Organisasi - Administrasi Pendidikan";
		$data['isi']   = "adm/struktur_organisasi";

		$this->load->view('adm/layout/wrapper', $data, FALSE);
	}
	public function dosen()
	{
		$data['dosen'] = $this->dosen->getAllDosen();
		$data['title'] = "Dosen - Administrasi Pendidikan";
		$data['isi']   = "adm/dosen";

		$this->load->view('adm/layout/wrapper', $data, FALSE);
	}
	public function tendik()
	{
		$data['title'] = "Tendik - Administrasi Pendidikan";
		$data['isi']   = "adm/tendik";

		$this->load->view('adm/layout/wrapper', $data, FALSE);
	}

	public function kurikulum()
	{
		$data['pendidikan'] = $this->db->get('adm_akademik')->row();
		$data['title'] = "Kurikulum - Administrasi Pendidikan";
		$data['isi']   = "adm/kurikulum";

		$this->load->view('adm/layout/wrapper', $data, FALSE);
	}

	public function kalender_akademik()
	{
		$data['pendidikan'] = $this->db->get('adm_akademik')->row();
		$data['title'] = "Kalender Akademik - Administrasi Pendidikan";
		$data['isi']   = "adm/kalender_akademik";

		$this->load->view('adm/layout/wrapper', $data, FALSE);
	}
	public function jadwal_kuliah()
	{
		$data['pendidikan'] = $this->db->get('adm_akademik')->row();
		$data['title'] = "Jadwal Kuliah - Administrasi Pendidikan";
		$data['isi']   = "adm/jadwal_kuliah";

		$this->load->view('adm/layout/wrapper', $data, FALSE);
	}

	public function download($file)
	{
		force_download('assets/adm/file_upload/'.$file,NULL);
	}

	public function fasilitas()
	{
		$data['fasilitas'] = $this->db->get('adm_fasilitas')->result();
		$data['title'] = "Fasiltas - Administrasi Pendidikan";
		$data['isi']   = "adm/fasilitas";

		$this->load->view('adm/layout/wrapper', $data, FALSE);
	}


	public function akreditasi()
	{
		$data['akreditasi'] = $this->db->get('adm_akademik')->row()->akreditasi;
		$data['title'] = "Akreditasi - Administrasi Pendidikan";
		$data['isi']   = "adm/akreditasi";

		$this->load->view('adm/layout/wrapper', $data, FALSE);
	}

	public function kontak()
	{
		$data['title'] = "Kontak - Administrasi Pendidikan";
		$data['isi']   = "adm/kontak";

		$this->load->view('adm/layout/wrapper', $data, FALSE);
	}

	public function spmi()
	{
		$data['title'] = "SPMI - Administrasi Pendidikan";
		$data['isi']   = "adm/spmi";

		$this->load->view('adm/layout/wrapper', $data, FALSE);
	}
	
	public function getCode()
	{
		sleep(5);

		if (isset($_POST['code_baca'])) {

			$code = $this->input->post('code_baca');

			if ($code === '12345') {

				echo json_encode([
					'status' => true,
					'pesan' => 'Kode benar!',
					'url' => base_url('site/adm/open_file'),
					'kode_unik' => sha1(rand(10,20))
				]);
				
			}else{

				echo json_encode(['status' => false, 'pesan' => 'Kode Baca tidak dikenali']);
			}

		}else{
			echo "Anda tidak punya hak akses";
		}
		
	}

	public function open_file($kode)
	{
		if (!empty($kode)) {
			$data['s1'] = $this->unit->getDataRepo('s1');
			$data['s2'] = $this->unit->getDataRepo('s2');
			$data['s3'] = $this->unit->getDataRepo('s3');
			$data['s4'] = $this->unit->getDataRepo('s4');
			$data['s5'] = $this->unit->getDataRepo('s5');
			$data['s6'] = $this->unit->getDataRepo('s6');
			$data['s7'] = $this->unit->getDataRepo('s7');

			$data['title'] = "SPMI - Administrasi Pendidikan";
			$data['isi']   = "adm/open_file";

			$this->load->view('adm/layout/wrapper', $data, FALSE);

		}else{
			echo "kode tidak valid";
		}
	}

	public function get_autocomplete()
	{
		 if (isset($_GET['term'])) {
            $result = $this->adm->search($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->nama_file;
                echo json_encode($arr_result);
            }
        }
	}


    function search(){
        $title = $this->input->post('title');
        $data['data'] = $this->adm->search_item($title);

        echo json_encode($data);
    }

    public function login()
    {
    	$data['title'] = 'Adm - Login';
    	$this->load->view('adm/login', $data, FALSE);
    }

}