<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('fakultas_model', 'fakultas');
		$this->load->model('konfigurasi_model', 'konfigurasi');
		$this->load->model('prodi_model', 'prodi');
		$this->load->model('daftar_ujian_model', 'daftar_ujian');
		
	}

	public function index()
	{
		$data['prodi']			= $this->prodi->getAllProdi();
		$data['jenis_ujian'] 	= $this->db->get('jenis_ujian')->result();
		$data['laporan']		= $this->fakultas->getDataLaporan();
		$data['title']			= 'Fakultas ~ Laporan RAB';
        $data['isi']			= 'fakultas/laporan_rab';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function filter_lap_rab()
	{
		cek_post();

		$prodi 				= $this->input->post('prodi');
		$jenis_ujian 		= $this->input->post('jenis_ujian');
		$nama_jenis_ujian 	= $this->daftar_ujian->nama_jenis_ujian($jenis_ujian);
		$nama_prodi			= $this->prodi->nama_jurusan($prodi);

		$data['ket'] 	= 'Data laporan RAB ujian <b>'.$nama_jenis_ujian.'</b> prodi <b>'.$nama_prodi.'</b>';
		if ($jenis_ujian === '0') {
			$data['laporan']	= $this->fakultas->getLaporanRabFilterAll($prodi);	
		}else{
			$data['laporan']	= $this->fakultas->getLaporanRabFilter($prodi, $jenis_ujian);
		}

		$data['title']		= 'Fakultas ~ Filter Laporan RAB';
        $data['isi']		= 'fakultas/filter_laporan_rab';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

}

/* End of file Laporan.php */
/* Location: ./application/controllers/fakultas/Laporan.php */