<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('galeri_model', 'galeri');
		$this->load->model('berita_model', 'berita');
		$this->load->model('kategori_model', 'kategori');
		$this->load->model('dosen_model', 'dosen');
		$this->load->model('video_model', 'video');
		$this->load->model('pengumuman_model', 'pengumuman');
		$this->load->model('mahasiswa_model', 'mahasiswa');
		$this->load->model('prodi_model', 'prodi');
		$this->load->model('konfigurasi_model', 'konfigurasi');
		$this->load->model('profil_model', 'profil');
		$this->load->model('unit_model', 'unit');
		$this->load->model('adm_model', 'adm');

	}



	public function index()
	{

		$slider 		= $this->galeri->slider();
		$berita 		= $this->berita->home_berita();
		$berita_terbaru = $this->berita->berita_terbaru();
 		$dosen 			= $this->dosen->getDosenHome();
		$videoHome 		= $this->video->getVideoHome();
		$pengumumanList	= $this->pengumuman->getPengumumanList();
		$jumlahMahasiswa= $this->mahasiswa->jumlahMahasiswa();
		$jumlahDosen	= $this->dosen->jumlahDosen();
		$DosenHome   	= $this->dosen->getDosenHome();
		$konfigurasi 	= $this->konfigurasi->getKonfigurasi();


		$data = [	'title'		=> 'Fkip | Universitas muhammadiyah kendari',
					'slider'	=> $slider,
					'berita'	=> $berita,
					'berita_terbaru' => $berita_terbaru,
					'dosen'		=> $dosen,
					'videoHome'	=> $videoHome,
					'pengumumanList' => $pengumumanList,
					'jumlahMahasiswa' => $jumlahMahasiswa,
					'jumlahDosen'=> $jumlahDosen,
					'dosenHome'	 => $DosenHome,
                    'isi'		=> 'home' ];

		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function sejarah()
	{
		$data['sejarah'] 	= $this->profil->getData();
		$data['title'] 		= 'Sejarah Page';
		$data['isi'] 		= 'sejarah';

		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function visi_misi()
	{
		$data['sejarah'] 	= $this->profil->getData();
		$data['title'] 		= 'Visi Misi Page';
		$data['isi'] 		= 'visi_misi';

		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function struktur_organisasi()
	{
		$data['sejarah'] 	= $this->profil->getData();
		$data['title'] 		= 'Struktur Organisai Page';
		$data['isi'] 		= 'struktur_organisasi';

		$this->load->view('layout/wrapper', $data, FALSE);
	}


	public function semua_berita()
	{
		// pagination starta

		$config['base_url'] = 'http://localhost/fkip/home/semua_berita';
		$config['total_rows'] = $this->berita->countAllNews();
		$config['per_page'] = 4;


		// styling
		$config['full_tag_open'] 	= '<nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] 	= '</ul></nav>';

		$config['first_link'] 		= 'First';
		$config['first_tag_open'] 	= '<li class="page-item">';
		$config['first_tag_close'] 	= '</li>';

		$config['last_link'] 		= 'Last';
		$config['last_tag_open'] 	= '<li class="page-item">';
		$config['last_tag_close'] 	= '</li>';

		$config['next_link'] 		= '&raquo';
		$config['next_tag_open'] 	= '<li class="page-item">';
		$config['next_tag_close'] 	= '</li>';

		$config['prev_link'] 		= '&laquo';
		$config['prev_tag_open'] 	= '<li class="page-item">';
		$config['prev_tag_close'] 	= '</li>';

		$config['cur_tag_open'] 	= '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] 	= '</a></li>';

		$config['num_tag_open'] 	= '<li class="page-item">';
		$config['num_tag_close'] 	= '</li>';

		$config['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$berita = $this->berita->getNews($config['per_page'], $data['start'] );

		// pagination end

		$data = [	'title'		=> 'semua berita',
					'berita'	=> $berita,
                    'isi'		=> 'semua_berita' ];

		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function baca_berita($slug_berita)
	{
		$baca_berita = $this->berita->getBerita($slug_berita);
		$berita_lain = $this->berita->beritaLain($slug_berita);

        $this->db->query("UPDATE berita SET view_berita = view_berita+1 WHERE slug_berita = '$slug_berita'");


		$data = [	'title'			=> 'Baca berita | '.$baca_berita->judul,
					'baca_berita'	=> $baca_berita,
					'berita_lain'	=> $berita_lain,
                    'isi'			=> 'baca_berita' ];

		$this->load->view('layout/wrapper', $data, FALSE);
	}


	public function dosen()
	{
		$dosen = $this->dosen->getAllDosen();
		$prodi = $this->prodi->getAllProdi();

		$data = [	'title'		=> 'Dosen FKIP',
					'dosen'		=> $dosen,
					'prodi'		=> $prodi,
                    'isi'		=> 'dosen' ];

		$this->load->view('layout/wrapper', $data, FALSE);
	}


  public function download($nidn)
  {
      $data = $this->dosen->get_by_nidn($nidn);

      $file = $data->rip;

      force_download('./assets/img/dosen/rip_dosen/'.$file, null);
  }


	public function detail_dosen($id_dosen)
	{
		$dosen 						= $this->dosen->get_by_id($id_dosen);
		$informasi_dosen 			= $this->dosen->getInfo($dosen->NIDN);
		$jumlahMahasiswaBimbingan 	= $this->dosen->getMahasiswaBimbingan($dosen->NIDN);

		$data['title']						= 'Detail Dosen ';
		$data['dosen']						= $dosen;
		$data['informasi_dosen'] 			= $informasi_dosen;
		$data['jumlahMahasiswaBimbingan']	= $jumlahMahasiswaBimbingan;
		$data['isi'	]						= 'detail_dosen';
		$this->load->view('layout/wrapper', $data, FALSE);
	}


	public function Semua_pengumuman()
	{
		$config['base_url'] = 'http://localhost/fkip/home/semua_pengumuman';
		$config['total_rows'] = $this->pengumuman->countAllAnnouncement();
		$config['per_page'] = 4;


		// styling
		$config['full_tag_open'] 	= '<nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] 	= '</ul></nav>';

		$config['first_link'] 		= 'First';
		$config['first_tag_open'] 	= '<li class="page-item">';
		$config['first_tag_close'] 	= '</li>';

		$config['last_link'] 		= 'Last';
		$config['last_tag_open'] 	= '<li class="page-item">';
		$config['last_tag_close'] 	= '</li>';

		$config['next_link'] 		= '&raquo';
		$config['next_tag_open'] 	= '<li class="page-item">';
		$config['next_tag_close'] 	= '</li>';

		$config['prev_link'] 		= '&laquo';
		$config['prev_tag_open'] 	= '<li class="page-item">';
		$config['prev_tag_close'] 	= '</li>';

		$config['cur_tag_open'] 	= '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] 	= '</a></li>';

		$config['num_tag_open'] 	= '<li class="page-item">';
		$config['num_tag_close'] 	= '</li>';

		$config['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$pengumuman = $this->pengumuman->getAnnouncement($config['per_page'], $data['start'] );

		// pagination end

		$data = [	'title'		=> 'semua pengumuman',
					'pengumuman'=> $pengumuman,
                    'isi'		=> 'semua_pengumuman' ];

		$this->load->view('layout/wrapper', $data, FALSE);

	}


	public function baca_pengumuman($slug_pengumuman)
	{
		$pengumuman = $this->pengumuman->getPengumuman($slug_pengumuman);
		$allPengumuman = $this->pengumuman->getAllPengumuman($slug_pengumuman);

		$this->db->query("UPDATE pengumuman SET view_pengumuman = view_pengumuman+1 WHERE slug_pengumuman = '$slug_pengumuman'");

		$data = [	'title'			=> 'Baca Pengumuman | '.$pengumuman->judul,
					'pengumuman'	=> $pengumuman,
					'allPengumuman'	=> $allPengumuman,
                    'isi'			=> 'baca_pengumuman' ];

		$this->load->view('layout/wrapper', $data, FALSE);

	}


	public function kegiatan()
	{
		$kkndik = $this->db->get_where('unit_document', ['id_document_category' => 1])->result();
		$plp 	= $this->db->get_where('unit_document', ['id_document_category' => 2])->result();
		$magang = $this->db->get_where('unit_document', ['id_document_category' => 3])->result();

		$config['base_url'] = 'http://localhost/fkip/home/kegiatan';
		$config['total_rows'] = $this->unit->countAllVideo();
		$config['per_page'] = 9;


		// styling
		$config['full_tag_open'] 	= '<nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] 	= '</ul></nav>';

		$config['first_link'] 		= 'First';
		$config['first_tag_open'] 	= '<li class="page-item">';
		$config['first_tag_close'] 	= '</li>';

		$config['last_link'] 		= 'Last';
		$config['last_tag_open'] 	= '<li class="page-item">';
		$config['last_tag_close'] 	= '</li>';

		$config['next_link'] 		= '&raquo';
		$config['next_tag_open'] 	= '<li class="page-item">';
		$config['next_tag_close'] 	= '</li>';

		$config['prev_link'] 		= '&laquo';
		$config['prev_tag_open'] 	= '<li class="page-item">';
		$config['prev_tag_close'] 	= '</li>';

		$config['cur_tag_open'] 	= '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] 	= '</a></li>';

		$config['num_tag_open'] 	= '<li class="page-item">';
		$config['num_tag_close'] 	= '</li>';

		$config['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$video = $this->unit->getVideo($config['per_page'], $data['start'] );

		$data = [	'title'		=> 'FKIP | Unit Kegiatan',
					'kkndik'	=> $kkndik,
					'plp'		=> $plp,
					'magang'	=> $magang,
					'video'		=> $video,
                    'isi'		=> 'kegiatan' ];


		$this->load->view('layout/wrapper', $data, FALSE);
	}


	public function jadwal_kegiatan()
	{
		$data = $this->unit->getDataJadwal('unit_jadwal');
		$data = [	'title'		=> 'Jadwal Kegiatan',
					'jadwal'	=> $data,
                    'isi'		=> 'jadwal_kegiatan' ];

		$this->load->view('layout/wrapper', $data, FALSE);
	}


	public function beranda_unit()
	{
		$data = $this->db->get('unit_beranda')->row();
		$data = [	'title'		=> 'FKIP | Beranda Unit',
					'pesan'		=> $data,
                    'isi'		=> 'beranda-unit' ];

		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// update
	public function prodi()
	{
		$prodi = $this->db->get('prodi')->result();
		$data = [	'title'		=> 'Program Studi Fkip',
					'prodi'		=> $prodi,
                    'isi'		=> 'prodi' ];

		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function repository()
	{
		$repo = $this->db->get('repository')->result();
		$data = [	'title'		=> 'Repository FKIP',
					'repo'		=> $repo,
                    'isi'		=> 'repository' ];

		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function sinteg()
	{

		$data = [	'title'		=> 'SINTEG - FKIP',
                    'isi'		=> 'sinteg' ];

		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function tendik()
	{

		$tendik	= $this->db->get('tendik')->result();
		$data = [	'title'	=> 'TENDIK - FKIP',
					'tendik' => $tendik,
                    'isi'	=> 'tendik' ];

		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function file_assesment()
	{

		$assesment	= $this->db->get('file_assesment')->result();
		$data = [	'title'	=> 'File Assesment - FKIP',
					'assesment' => $assesment,
                    'isi'	=> 'assesment' ];

		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function info_beasiswa()
	{
		$data = [	'title'	=> 'Informasi Beasiswa - FKIP',
                    'isi'	=> 'info_beasiswa' ];

		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function organisasi()
	{
		$data = [	'title'	=> 'Organisasi - FKIP',
                    'isi'	=> 'organisasi' ];

		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function kalender_akademik()
	{
		$data = [	'title'	=> 'Kalender Akademik - FKIP',
                    'isi'	=> 'kalender_akademik' ];

		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function fasilitas()
	{
		$data = [	'title'	=> 'Fasilitas - FKIP',
                    'isi'	=> 'fasilitas' ];

		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function get_autocomplete()
	{
		 if (isset($_GET['term'])) {
            $result = $this->adm->search_fakultas($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->nama_file;
                echo json_encode($arr_result);
            }
        }
	}


    function search(){
        $title = $this->input->post('title');
        $data['data'] = $this->adm->search_assesment($title);

        echo json_encode($data);
    }

    public function login()
    {
    	$data['title'] = 'Adm - Login';
    	$this->load->view('adm/login', $data, FALSE);
    }
    
     public function artikel_magang()
    {
    	$data['artikel'] = $this->db->get('repo_plp')->result();

        $data['title'] 	= 'Artikel Magang/PLP 2';
        $data['isi']	= 'artikel';

		$this->load->view('layout/wrapper', $data, FALSE);
    }

    public function video_magang()
    {
    	$data['video'] = $this->db->get('repo_plp')->result();

        $data['title'] 	= 'Video Magang/PLP 2';
        $data['isi']	= 'video_plp';

		$this->load->view('layout/wrapper', $data, FALSE);
    }
    
    public function evaluasi_kinerja()
    {

        $data['title'] 	= 'Evaluasi Kinerja FKIP';
        $data['isi']	= 'evaluasi_kenirja';

		$this->load->view('layout/wrapper', $data, FALSE);
    }
    
    public function skripsi()
    {
        
        // echo "halaman skripsi";die;

    	$data = $this->berita->getSkripsi();
    	$data['skripsi'] = $data;

    	$data['title'] 	= 'Skripsi';
        $data['isi']	= 'skripsi';

		$this->load->view('layout/wrapper', $data, FALSE);
    }

}
