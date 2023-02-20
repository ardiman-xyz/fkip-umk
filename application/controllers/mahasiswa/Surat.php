<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('prodi_model', 'prodi');
		$this->load->model('surat_model', 'surat');
		$this->load->model('user_model', 'user');
		
		
	}

	public function index()
	{
		if (empty($this->session->userdata('nim'))) {
			redirect('mahasiswa/login');
		}
		$data['data_surat_aktif'] = $this->surat->getSuratAktif();
		$data['data'] 	= $this->surat->getSurat();
		$data['data_beasiswa'] = $this->surat->getSuratBeasiswa();
		$data['title']	= 'Fkip | Tambah Surat';
        $data['isi']	= 'mahasiswa/surat';
                    
		$this->load->view('mahasiswa/layout/wrapper', $data, FALSE);
	}


	public function tambah()
	{
		if (empty($this->session->userdata('nim'))) {
			redirect('mahasiswa/login');
		}
		$data['title']	= 'Fkip | Tambah Surat';
        $data['isi']	= 'mahasiswa/form_surat';
                    
		$this->load->view('mahasiswa/layout/wrapper', $data, FALSE);
		
	}


	public function form_surat($pilihan)
	{
		$data['prodi'] = $this->prodi->getAllProdi();
		if ($pilihan == 1) {
			echo $this->load->view('mahasiswa/form_pengajuan_judul', $data, true);
		}elseif($pilihan == 3){
			echo $this->load->view('mahasiswa/form_surat_aktif_kuliah', $data, true);
		}elseif($pilihan == 4){
			echo $this->load->view('mahasiswa/form_belum_menerima_beasiswa', $data, true);
		}else if($pilihan == 5){
			echo $this->load->view('mahasiswa/form_minat_bakat', $data, true);;
		}
	}

	public function simpan()
	{
		cek_ajax();

		$data['no_surat'] 		= 0;
		$data['nama'] 			= $this->input->post('nama');
		$data['nim'] 			= $this->input->post('nim');
		$data['semester'] 		= $this->input->post('semester');
		$data['prodi'] 			= $this->input->post('prodi');
		$data['judul_penelitian']= $this->input->post('judul');
		$data['status']			= 'pending';
		$data['tgl_insert'] 	= date("Y-m-d h:i:s");

		$this->surat->insert($data);

		$this->output->set_content_type('application/json')->set_output(json_encode(['status' => true]));
		
	}

	public function simpan_beasiswa()
	{
		cek_ajax();

		$data['no_surat']		= 0;
		$data['nama'] 			= $this->input->post('nama');
		$data['nim'] 			= $this->input->post('nim');
		$data['tempat_lahir']	= $this->input->post('tempat');
		$data['tgl_lahir'] 		= $this->input->post('tgl_lahir');
		$data['thn_akademik'] 	= $this->input->post('thn_akad');
		$data['id_prodi'] 		= $this->input->post('prodi');
		$data['status']			= 'pending';
		$data['tgl_insert'] 	= date("Y-m-d");

		$this->surat->insert_beasiswa($data);

		$this->output->set_content_type('application/json')->set_output(json_encode(['status' => true]));

	}

	public function simpan_surat_aktifkuliah()
	{
		cek_ajax();

		$data['nama'] 			= $this->input->post('nama');
		$data['no_surat']		= 0;
		$data['tempat_lahir'] 	= $this->input->post('tempat');
		$data['tgl_lahir']		= $this->input->post('tgl_lahir');
		$data['nim'] 			= $this->input->post('nim');
		$data['prodi'] 			= $this->input->post('prodi');
		$data['semester'] 		= $this->input->post('semester');
		$data['alamat'] 		= $this->input->post('alamat');

		$data['nama_ortu']		= $this->input->post('nama_ortu');
		$data['nip']			= $this->input->post('nip');
		$data['pangkat']		= $this->input->post('pangkat');
		$data['jabatan']		= $this->input->post('jabatan');
		$data['instansi']		= $this->input->post('instansi');
		$data['alamat_ortu']	= $this->input->post('alamat_ortu');
		$data['status']			= 'pending';
		$data['tgl_insert'] 	= date("Y-m-d h:i:s");

		$insert = $this->surat->insert_surat_aktfiKuliah($data);

		$this->output->set_content_type('application/json')->set_output(json_encode(['status' => true]));
		
	}

	public function pdf($id)
	{
		$data['data'] = $this->surat->getById($id);


		$this->load->view('mahasiswa/surat/cetak_surat', $data, false);

// 		$this->simple_login->pdfGenerator($html, 'Surat_pengajuan_judul', 'A4', 'potrait');
	}

	public function pdf_surat_aktif($id)
	{
		$data['data'] = $this->surat->getById_surat_aktifkuliah($id);


		$this->load->view('mahasiswa/surat/cetak_surat_aktif', $data, false);

// 		$this->simple_login->pdfGenerator($html, 'Surat_aktif_kuliah', 'legal', 'potrait');
	}

	public function pdf_surat_beasiswa($id)
	{
		$data['data'] = $this->surat->getById_surat_beasiswa($id);


		$this->load->view('mahasiswa/surat/cetak_surat_beasiswa', $data, false);

// 		$this->simple_login->pdfGenerator($html, 'SK_tidak_menerima_beasiswa', 'A4', 'potrait');
	}
		
	public function simpan_minat_bakat()
	{
		
		$data['nim']			= $this->input->post('nim');
		$data['nama']			= $this->input->post('nama');
		$data['nama_panggilan']	= $this->input->post('nama_panggilan');
		$data['tempat_lahir']	= $this->input->post('tempat');
		$data['tgl_lahir']		= $this->input->post('tgl_lahir');
		$data['id_jurusan']		= $this->input->post('prodi');
		$data['smt']			= $this->input->post('smt');
		$data['angkatan'] 		= $this->input->post('angkatan');
		$data['no_hp'] 			= $this->input->post('no_hp');
		$data['alamat'] 		= $this->input->post('alamat');
		$data['minat_bakat'] 	= $this->input->post('minat');
		$data['agama'] 			= $this->input->post('agama');
		$data['suku']			= $this->input->post('suku');
		$data['upaya']			= $this->input->post('upaya');
		$data['saran']			= $this->input->post('saran');

		$insert = $this->db->insert('surat',$data);


		echo "sukses";
	}

	public function get_data()
	{
		$id = $this->input->post('id');

		$data['surat'] = $this->db->get_where('pengajuan_judul', ['id' => $id])->row();
		$data['prodi'] = $data['prodi'] = $this->prodi->getAllProdi();

		echo $this->load->view('mahasiswa/form_edit', $data, TRUE);
	}

	public function update_surat()
	{
		$id = $this->input->post('id');

		$data = [
			'nama' 				=> htmlspecialchars($this->input->post('nama'), true),
			'nim' 				=>	htmlspecialchars($this->input->post('nim'), true),
			'semester' 			=>	htmlspecialchars($this->input->post('semester'), true),
			'prodi' 			=>	htmlspecialchars($this->input->post('prodi'), true),
			'judul_penelitian' 	=>	htmlspecialchars($this->input->post('judul'), true),
			'tgl_insert' 		=>	date('Y-m-d H:i:s')
		];

		$insert = $this->db
		->where('id', $id)
		->update('pengajuan_judul', $data);

		$this->output->set_content_type('application/json')->set_output(json_encode([
			'status' 	=> true,
			'pesan'		=> 'Data berhasil di update'				
		]));

	}


}

/* End of file Surat.php */
/* Location: ./application/controllers/Surat.php */