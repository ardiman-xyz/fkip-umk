<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skpi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model', 'konfigurasi');
		$this->load->model('user_model', 'user');
		$this->load->model('tendik_model', 'tendik');
		$this->load->model('skpi_model', 'skpi');
	}

	public function index()
	{
		$nim = $this->session->userdata('nim');

		$mahasiswa = $this->db
					->select('pengguna.*, bm.judul')
					->from('pengguna')
					->join('bimbingan_mhs bm', 'bm.nim = pengguna.nim', 'left')
					->where(['pengguna.nim' => $nim])
					->get()->row();
		$data_skpi = $this->db->get_where('skpi_mahasiswa', ['nim' => $nim])->row();

		$data['mahasiswa'] = $mahasiswa;
		$data['data_skpi'] = $data_skpi;
		$data['title']	= 'Mahasiswa | SKPI';
        $data['isi']	= 'mahasiswa/skpi';
                    
		$this->load->view('mahasiswa/layout/wrapper', $data, FALSE);
	}

	public function simpan()
	{	
		$id_prodi = $this->db->get_where('pengguna', ['nim' => $this->session->userdata('nim')])->row()->id_prodi;

		$data = [
					'id_prodi' 				=> $id_prodi,
					'nim' 					=> $this->input->post('nim'),
					'tempat_lahir' 			=> $this->input->post('tempat'),
					'tgl_lahir' 			=> $this->input->post('tgl_lahir'),
					'tahun_masuk' 			=> $this->input->post('tahun_masuk'),
					'tahun_lulus' 			=> $this->input->post('tahun_lulus'),
					'status' 				=> 'Pending',
					'date_created' 			=> date('Y-m-d'),
				];

		$id_insert = $this->skpi->simpan_skpi($data);

		// prestasi
		$nama_kegiatan = $this->input->post('prestasi_penghargaan');
		$gambar = $_FILES['bukti_prestasi_penghargaan'];

		$a = 0;
		foreach ($nama_kegiatan as $value) {

			$file = explode('.', $gambar['name'][$a]);
	  		$extention = end($file);
			$nama_file = 'skpi-1-'.date('Y-m-d').'-'.rand(100, 999). '.' .$extention;

			$data = [
				'id_skpi' 	=> $id_insert,
				'kegiatan' 	=> $value,
				'bukti' 	=> $nama_file
			];

			$simpan = $this->db->insert('skpi_penghargaan', $data);

			

			$path = './assets/upload/skpi/'.$nama_file;
			move_uploaded_file($gambar['tmp_name'][$a], $path);

			if ($simpan) {
				$a++;
			}
		}

		// pelatihan seminar/workshop
		$nama_pelatihan_seminar = $this->input->post('pelatihan_seminar');
		$gambar = $_FILES['bukti_pelatihan_seminar'];

		$b = 0;
		foreach ($nama_pelatihan_seminar as $value) {

			$file 		= explode('.', $gambar['name'][$b]);
	  		$extention 	= end($file);
			$nama_file 	= 'skpi-2-'.date('Y-m-d').'-'.rand(100, 999). '.' .$extention;

			$data = [
				'id_skpi' 		=> $id_insert,
				'nama_kegiatan' => $value,
				'bukti' 		=> $nama_file
			];

			$simpan2 = $this->db->insert('skpi_pelatihan', $data);

			

			$path = './assets/upload/skpi/'.$nama_file;
			move_uploaded_file($gambar['tmp_name'][$b], $path);

			if ($simpan2) {
				$b++;
			}
		}

		// pelatihan seminar/workshop
		$nama_organisasi = $this->input->post('organisasi');
		$gambar = $_FILES['bukti_organisasi'];

		$c = 0;
		foreach ($nama_organisasi as $value) {

			$file 		= explode('.', $gambar['name'][$c]);
	  		$extention 	= end($file);
			$nama_file 	= 'skpi-3-'.date('Y-m-d').'-'.rand(100, 999).'.'.$extention;

			$data = [
				'id_skpi' 			=> $id_insert,
				'nama_organisasi' 	=> $value,
				'bukti' 			=> $nama_file
			];

			$simpan3 = $this->db->insert('skpi_organisasi', $data);

			

			$path = './assets/upload/skpi/'.$nama_file;
			move_uploaded_file($gambar['tmp_name'][$c], $path);

			if ($simpan3) {
				$c++;
			}
		}

		// keahlian
		$nama_organisasi = $this->input->post('keahlian');
		$gambar = $_FILES['bukti_keahlian'];

		$d = 0;
		foreach ($nama_organisasi as $value) {

			$file 		= explode('.', $gambar['name'][$d]);
	  		$extention 	= end($file);
			$nama_file 	= 'skpi-4-'.date('Y-m-d').'-'.rand(100, 999).'.'.$extention;

			$data = [
				'id_skpi' 			=> $id_insert,
				'nama_keahlian' 	=> $value,
				'bukti' 			=> $nama_file
			];

			$simpan3 = $this->db->insert('skpi_keahlian', $data);

			

			$path = './assets/upload/skpi/'.$nama_file;
			move_uploaded_file($gambar['tmp_name'][$d], $path);

			if ($simpan3) {
				$d++;
			}
		}

		// magang
		$nama_lokasi = $this->input->post('magang');
		$gambar = $_FILES['bukti_magang'];

		$e = 0;
		foreach ($nama_lokasi as $value) {

			$file 		= explode('.', $gambar['name'][$e]);
	  		$extention 	= end($file);
			$nama_file 	= 'skpi-5-'.date('Y-m-d').'-'.rand(100, 999).'.'.$extention;

			$data = [
				'id_skpi' 			=> $id_insert,
				'nama_lokasi' 	=> $value,
				'bukti' 			=> $nama_file
			];

			$simpan5 = $this->db->insert('skpi_magang', $data);

			

			$path = './assets/upload/skpi/'.$nama_file;
			move_uploaded_file($gambar['tmp_name'][$e], $path);

			if ($simpan5) {
				$e++;
			}
		}

		$this->session->set_flashdata('success', '<div class="alert alert-success">	Data berhasil disimpan
			1</div>');
		redirect('mahasiswa/skpi');
	}

}

/* End of file Skpi.php */
/* Location: ./application/controllers/mahasiswa/Skpi.php */