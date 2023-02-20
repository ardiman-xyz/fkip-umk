<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model', 'konfigurasi');
	}

	public function index()
	{
		$data['konfigurasi']	= $this->konfigurasi->getKonfigurasi();
		$data['title'] 			= 'Admin ~ Konfigurasi web';
		$data['isi']			= 'admin/konfigurasi/umum';

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function update()
	{
		$data = [	
			'id_konfigurasi'	=> $this->input->post('id_konfigurasi'),
			'nama_dekan'	    => $this->input->post('nama_dekan'),
			'namaweb'	    	=> $this->input->post('nama_web'),
			'tagline'	    	=> $this->input->post('tagline'),
			'email'	    		=> $this->input->post('email'),
			'alamat'	    	=> $this->input->post('alamat'),
			'telepon'    		=> $this->input->post('telepon'),
			'keywords'	    	=> $this->input->post('seo'),
			'description'	 	=> $this->input->post('deskripsi')
		];

		$this->konfigurasi->update($data);

		$pesan = [
			'status' => true,
			'pesan'	 => 'Data konfigurasi berhasil di update!'
		];

		$this->output->set_content_type('application/json')->set_output(json_encode($pesan));
	}

}

/* End of file Konfigurasi.php */
/* Location: ./application/controllers/admin/Konfigurasi.php */