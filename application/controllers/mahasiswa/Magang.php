<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'assets/uuid/vendor/autoload.php';
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class Magang extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model', 'konfigurasi');
		$this->load->model('user_model', 'user');
		$this->load->library('simple_login');
		$this->load->model('unit_model', 'unit');
		$this->load->model('prodi_model', 'prodi');
	}

	public function index()
	{
		if (empty($this->session->userdata('nim'))) {
			redirect('mahasiswa/login');
		}
		$nim = $this->session->userdata('nim');
		$data['data'] = $this->db->get_where('daftar_magang', ['nim'=> $nim])->result();
		$data['title'] 	= "PLP/Magang Page";
        $data['isi']	= 'mahasiswa/list_magang';
                    
		$this->load->view('mahasiswa/layout/wrapper', $data, FALSE);
	}


	public function add_form()
	{
		$data['tgl']	= $this->unit->getDataJadwal('unit_jadwal');
		$data['lokasi'] = $this->unit->getData('plp_magang_sekolah');
		$data['prodi'] = $this->unit->getData('prodi');
		$data['title'] 	= "Form daftar | PLP/Magang";
        $data['isi']	= 'mahasiswa/magang';
                    
		$this->load->view('mahasiswa/layout/wrapper', $data, FALSE);
	}


	public function add()
	{

		sleep(2);

		$config['upload_path'] 		= './assets/upload/plp_magang/';
		$config['allowed_types'] 	= 'pdf';
		$config['max_size']     	= '2400';
		$config['encrypt_name'] 	= true;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('formulir') && ! $this->upload->do_upload('bukti_bayar')){

			echo json_encode(['status' => false, 'pesan' => $this->upload->display_errors()]);

		} else {

			if (!empty($_FILES['formulir'])) {
				$this->upload->do_upload('formulir');
				$data1 = $this->upload->data();
				$file1 = $data1['file_name'];

			}

			if (!empty($_FILES['bukti_bayar'])) {
				$this->upload->do_upload('bukti_bayar');
				$data2 = $this->upload->data();
				$file2 = $data2['file_name'];
			}

				$uuid = Uuid::uuid4()->toString();

				$data['id'] 			= $uuid;
				$data['id_sekolah'] 	= $this->input->post('lokasi');
				$data['id_prodi'] 		= $this->input->post('id_prodi');
				$data['nim'] 			= $this->input->post('nim');
				$data['nama'] 			= $this->input->post('nama');
				$data['program'] 		= $this->input->post('program');
				$data['formulir'] 		= $file1;
				$data['bukti_bayar'] 	= $file2;

				$this->db->insert('daftar_magang', $data);

				echo json_encode(['status' => true, 'pesan' => 'Registrasi berhasil!']);


		}


	}

	public function lihat_nilai($nim, $program)
	{
		if ($program === 'magang') {
			$data['program'] = $program;
			$data_nilai = $this->db->get_where('nilai_magang', ['nim' => $nim])->row();

		}else if($program === 'plp') {
			$data['program'] = $program;
			$data_nilai = $this->db->get_where('ppl_nilai', ['nim' => $nim])->row();
		}

		$data['data_nilai'] = $data_nilai;
		$data['data_mhs'] = $this->db->get_where('daftar_magang', ['nim'=> $nim])->row();
		$data['title'] 	= "Daftar Nilai";
        $data['isi']	= 'mahasiswa/detail_nilai';
                    
		$this->load->view('mahasiswa/layout/wrapper', $data, FALSE);

	}


	public function print_nilai($nim,$program)
	{
		if ($program === 'magang') {
			$data['data_nilai'] = $this->unit->getNilai('nilai_magang',['nim' => $nim])->row();
			$data['data_mhs'] = $this->unit->getDataMagang($nim);
			$data['nama_prodi'] = $this->prodi->nama_jurusan($data['data_mhs']->id_prodi);
			$data['nama_sekolah'] = $this->unit->getNamaSekolah($data['data_mhs']->id_sekolah);
			$data['nama_pamong'] = $this->unit->getNamaPamong($data['data_mhs']->id_sekolah);
			$html = $this->load->view('mahasiswa/cetak_nilai_magang', $data, true);
			$this->simple_login->pdfGenerator($html, 'nilai_magang', 'Legal', 'potrait');
		}else{
			$data['data_nilai'] = $this->unit->getNilai('ppl_nilai',['nim' => $nim])->row();
			$data['data_mhs'] = $this->unit->getDataPlp($nim);
			$data['nama_prodi'] = $this->prodi->nama_jurusan($data['data_mhs']->id_prodi);
			$data['nama_sekolah'] = $this->unit->getNamaSekolah($data['data_mhs']->id_sekolah);
			$data['nama_pamong'] = $this->unit->getNamaPamong($data['data_mhs']->id_sekolah);
			$html = $this->load->view('mahasiswa/cetak_nilai_plp', $data, true);
			$this->simple_login->pdfGenerator($html, 'nilai_plp', 'Legal', 'potrait');
		}

	}
	
	public function upload()
	{
		$nim = $this->session->userdata('nim');
		$data['data'] 	= $this->db->get_where('repo_plp', ['nim' => $nim])->row();
		$data['title'] 	= "PLP/Magang - Upload";
        $data['isi']	= 'mahasiswa/upload';
                    
		$this->load->view('mahasiswa/layout/wrapper', $data, FALSE);
	}

	public function simpan_data()
	{
		cek_ajax();

        $config['upload_path']      = './assets/upload/plp_magang/';
        $config['allowed_types']    = 'jpg|png|jpeg|pdf';
        $config['max_size']         = '2072';
        $config['encrypt_name']     = true;
        
        $this->load->library('upload', $config);
        $data1 = $this->upload->data();
        
        if ( ! $this->upload->do_upload('file')){

            $output = [
                'status'    => false,
                'message'   => $this->upload->display_errors()
            ];

            $this->output->set_content_type('application/json')->set_output(json_encode($output));
        }else{

            $data['nim']       		= $this->session->userdata('nim');
            $data['file']          	= $this->upload->data('file_name');
            $data['link_youtube']	= $this->input->post('link_youtube');
            $data['ket']			= $this->input->post('keterangan');
            $data['date_created']   = date('Y-m-d');

            $this->db->insert('repo_plp', $data);

            $output = [
                'status'    => true,
                'message'   => '<b>Sukses !</b> Data berhasil di simpan!'
            ];
            $this->output->set_content_type('application/json')->set_output(json_encode($output));
            
        }
	}

}
