<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mahasiswa_model', 'mahasiswa');
		$this->load->model('prodi_model', 'prodi');
	}

	public function index()
	{
		$prodi = $this->prodi->getAllProdi();

		$data = [	'title'		=> 'Profil',
					'prodi'		=> $prodi,
                    'isi'		=> 'profil/list' ];
                    
		$this->load->view('profil/layout/wrapper', $data, FALSE);
    }


    public function sejarah()
    {
    	$data = [	'title'		=> 'Fkip | Sejarah',
                    'isi'		=> 'profil/sejarah' ];
                    
		$this->load->view('profil/layout/wrapper', $data, FALSE);
    }

    public function identitas()
    {
    	$data = [	'title'	=> 'Fkip | Identitas',
                    'isi'		=> 'profil/identitas' ];
                    
		$this->load->view('profil/layout/wrapper', $data, FALSE);
    }

     public function visiMisi()
    {
    	$data = [	'title'		=> 'Fkip | Visi dan Misi',
                    'isi'		=> 'profil/visi_misi' ];
                    
		$this->load->view('profil/layout/wrapper', $data, FALSE);
    }

      public function kebijakan_umum()
    {
    	$data = [	'title'		=> 'Fkip | Kebijakan Umum',
                    'isi'		=> 'profil/kebijakan_umum' ];
                    
		$this->load->view('profil/layout/wrapper', $data, FALSE);
    }

    
    public function mahasiswa()
    {	
		$mahasiswa = $this->mahasiswa->getAllMahasiswa();
        
		$data = [	'title'		=> 'Mahasiswa',
					'mahasiswa'	=> $mahasiswa,
                    'isi'		=> 'profil/mahasiswa' ];
        
        $this->load->view('layout/wrapper', $data, FALSE);
	}
	
	public function detail($id_mahasiswa)
    {	
		$mahasiswa = $this->mahasiswa->getMahasiswa($id_mahasiswa);
        
		$data = [	'title'		=> 'Mahasiswa',
					'mahasiswa'	=> $mahasiswa,
                    'isi'		=> 'profil/detail_mahasiswa' ];
        
        $this->load->view('layout/wrapper', $data, FALSE);
	}


	public function cari_islam()
	{
		$this->db->like('agama', 'islam');

		$this->db->select('mahasiswa.*,prodi.nama_prodi');
		$this->db->from('mahasiswa');
		$this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi', 'left');

		$this->db->order_by('id_mahasiswa', 'desc');

		$query = $this->db->get()->result();
		

		$data = [	'title'		=> 'Mahasiswa',
					'mahasiswa'	=> $query,
					'isi'		=> 'profil/mahasiswa' ];

		$this->load->view('layout/wrapper', $data, FALSE);

		
	}

	public function cari_kristen()
	{
		$this->db->like('agama', 'kristen');

		$this->db->select('mahasiswa.*,prodi.nama_prodi');
		$this->db->from('mahasiswa');
		$this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi', 'left');

		$this->db->order_by('id_mahasiswa', 'desc');

		$query = $this->db->get()->result();
		

		$data = [	'title'	=> 'Mahasiswa',
					'mahasiswa'	=> $query,
					'isi'		=> 'profil/mahasiswa' ];

		$this->load->view('layout/wrapper', $data, FALSE);
		
	}

	public function cari_pls()
	{
		$this->db->like('nama_prodi', 'Pendidikan Luar Sekolah');

		$this->db->select('mahasiswa.*,prodi.nama_prodi');
		$this->db->from('mahasiswa');
		$this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi', 'left');

		$this->db->order_by('id_mahasiswa', 'desc');

		$query = $this->db->get()->result();
		

		$data = [	'title'		=> 'Mahasiswa',
					'mahasiswa'	=> $query,
					'isi'		=> 'profil/mahasiswa' ];

		$this->load->view('layout/wrapper', $data, FALSE);
		
	}

	public function cari_admTik()
	{
		$this->db->like('nama_prodi', 'adminitrasi pendidikan tik');

		$this->db->select('mahasiswa.*,prodi.nama_prodi');
		$this->db->from('mahasiswa');
		$this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi', 'left');

		$this->db->order_by('id_mahasiswa', 'desc');

		$query = $this->db->get()->result();
		

		$data = [	'title'		=> 'Mahasiswa',
					'mahasiswa'	=> $query,
					'isi'		=> 'profil/mahasiswa' ];

		$this->load->view('layout/wrapper', $data, FALSE);
		
	}

	public function cari_kwc()
	{
		$this->db->like('agama', 'kong whu chu');

		$this->db->select('mahasiswa.*,prodi.nama_prodi');
		$this->db->from('mahasiswa');
		$this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi', 'left');

		$this->db->order_by('id_mahasiswa', 'desc');

		$query = $this->db->get()->result();
		

		$data = [	'title'		=> 'Mahasiswa',
					'mahasiswa'	=> $query,
					'isi'		=> 'profil/mahasiswa' ];

		$this->load->view('layout/wrapper', $data, FALSE);
		
	}



}
