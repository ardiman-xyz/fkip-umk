<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->simple_login->cek_login_admin();
	}

	public function index()
	{
		$data = [	'title'		=> 'Admin - dashboard',
					'isi'		=> 'admin/dashboard' ];
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	
	public function konfigurasi()
	{
		$konfigurasi = $this->konfigurasi_model->getKonfigurasi();

		$this->form_validation->set_rules('nama', 'Nama web', 'required',
							['required' => 'Nama Web harus di isi']);

		if ($this->form_validation->run() === FALSE) {
			$data = [	'title'			=> 'konfigurasi umum',
						'konfigurasi'	=> $konfigurasi,
						'isi'			=> 'admin/konfigurasi/umum' ];

		$this->load->view('admin/layout/wrapper', $data, FALSE);

		}else{

			$data = [	'id_konfigurasi'	=> $konfigurasi->id_konfigurasi,
						'nama_dekan'	    => $this->input->post('nama_dekan'),
						'namaweb'	    	=> $this->input->post('nama'),
						'tagline'	    	=> $this->input->post('tagline'),
						'website'	    	=> $this->input->post('website'),
						'email'	    		=> $this->input->post('email'),
						'alamat'	    	=> $this->input->post('alamat'),
						'telepon'    		=> $this->input->post('telepon'),
						'keywords'	    	=> $this->input->post('keywords'),
						'description'	 	=> $this->input->post('deskripsi'),
						'google_map'	    => $this->input->post('google_map'),
						'metatext'	    	=> $this->input->post('metatext')
					];

		$this->konfigurasi_model->update($data);
		$this->session->set_flashdata('success', '<div class="alert alert-success><strong>sukses ! </strong> Data konfigurasi berhasil di ubah !</div>');
		redirect('admin/dashboard/konfigurasi');
		}

	
	}


	public function konfigurasiLogo()
	{

		$data = [	'title'			=> 'Admin - konfigurasi Logo',
					'isi'			=> 'admin/konfigurasi/logo' ];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}








}
