<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_ujian extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->simple_login->cek_login_admin();
		$this->load->model('prodi_model', 'prodi');
		$this->load->model('surat_model', 'surat');
		$this->load->model('daftar_ujian_model', 'daftar_ujian');
		$this->load->library('simple_login');
	}

	public function index()
	{
		
		$data['jenis_ujian'] = $this->daftar_ujian->getJenisUjian();
		$data['title']	= 'Admin - Daftar ujian';
        $data['isi']	= 'admin/daftar_ujian/list';
                    
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function detail($nim)
	{
		$data['data'] = $this->daftar_ujian->getByNim($nim);

		$data['title']	= 'Admin - Detail';
        $data['isi']	= 'admin/daftar_ujian/detail';
                    
		$this->load->view('admin/layout/wrapper', $data, FALSE);	
	}


	public function filter($id)
	{
		if ($id == 0) {
			$data = $this->daftar_ujian->getData();
			
		}else{
			$data = $this->db->get_where('daftar_ujian', ['id_jenis_ujian' => $id])->result();
		}

		$dt['data'] = $data;
		$dt['id_jenis_ujian'] = $id;

		$this->load->view('admin/daftar_ujian/filter', $dt);
	}

	public function cetak($id)
	{
		if ($id == 0) {
			$data = $this->daftar_ujian->getData();
			
		}else{
			$data = $this->db->get_where('daftar_ujian', ['id_jenis_ujian' => $id])->result();
		}

		$dt['data'] = $data;
		$dt['id_jenis_ujian'] = $id;

		$html = $this->load->view('admin/daftar_ujian/cetak', $dt, true);

		$this->simple_login->pdfGenerator($html, 'Daftar pendaftar ujian', 'A4', 'potrait');
	}


	public function delete($nim)
	{

		$gambar = $this->daftar_ujian->getByNim($nim);
		unlink('./assets/upload/image/'.$gambar->bukti_pembayaran_DU);
		unlink('./assets/upload/image/'.$gambar->bukti_lolos_toefl);
		unlink('./assets/upload/image/'.$gambar->bukti_btq);
		unlink('./assets/upload/image/'.$gambar->transkrip_nilai);
		$data = ['nim'	=> $nim ];

		$this->daftar_ujian->delete($data);
		$this->session->set_flashdata('sukses', ' di hapus');
		redirect('admin/daftar_ujian');
	}


}

