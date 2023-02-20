<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->simple_login->cek_login_admin();
		$this->load->model('prodi_model', 'prodi');
	}

	public function index()
	{
		$prodi = $this->prodi->getAllProdi();

		$data = [	'title'		=> 'Data prodi',
					'prodi'		=> $prodi,
                    'isi'		=> 'admin/prodi/list' ];
                    
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('kode_prodi', 'Kode Prodi', 'required|trim',[
			'required' => '%s harus di isi']);
		$this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required|trim',
			['required' => '%s harus di isi']);
		$this->form_validation->set_rules('status', 'Status', 'required|trim',
			['required' => '%s harus di isi']);
		$this->form_validation->set_rules('jenjang', 'jenjang', 'required|trim',
			['required' => '%s harus di isi']);

		if ($this->form_validation->run() == false ) {

		$data = [	'title'		=> 'Tambah Prodi',
					'isi'		=> 'admin/prodi/tambah' ];

		$this->load->view('admin/layout/wrapper', $data, FALSE);

		}else{
			// masuk database
			$data = [
				'kode_prodi'	=> htmlspecialchars($this->input->post('kode_prodi')),
				'nama_prodi'	=> htmlspecialchars($this->input->post('nama_prodi')),
				'status'		=> $this->input->post('status'),
				'jenjang	'	=> htmlspecialchars($this->input->post('jenjang'))];
			
			$this->prodi->tambah($data);
			$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><strong>sukses ! </strong> Data prodi berhasil di tambah ! <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/prodi');
		}
	}


	public function edit($id_prodi)
	{
		$prodi = $this->prodi->getById($id_prodi);

		$this->form_validation->set_rules('kode_prodi', 'Kode Prodi', 'required|trim',[
			'required' => '%s harus di isi']);
		$this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required|trim',
			['required' => '%s harus di isi']);
		$this->form_validation->set_rules('status', 'Status', 'required|trim',
			['required' => '%s harus di isi']);
		$this->form_validation->set_rules('jenjang', 'jenjang', 'required|trim',
			['required' => '%s harus di isi']);

		if ($this->form_validation->run() == false ) {

		$data = [	'title'		=> 'Edit Prodi | '.$prodi->nama_prodi,
					'prodi'		=> $prodi,
					'isi'		=> 'admin/prodi/edit' ];

		$this->load->view('admin/layout/wrapper', $data, FALSE);

		}else{
			// masuk database
			$data = [	'id_prodi'		=> $id_prodi,
						'kode_prodi'	=> htmlspecialchars($this->input->post('kode_prodi')),
						'nama_prodi'	=> htmlspecialchars($this->input->post('nama_prodi')),
						'status'		=> $this->input->post('status'),
						'jenjang	'	=> htmlspecialchars($this->input->post('jenjang'))];
			
			$this->prodi->edit($data);
			$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><strong>sukses ! </strong> Data prodi berhasil di Edit ! <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/prodi');
		}
	}


	public function hapus($id_prodi)
	{
		$data = ['id_prodi'	=> $id_prodi];

		$this->prodi->delete($data);
		$this->session->set_flashdata('sukses', ' di hapus');
		redirect('admin/prodi');
	}





}