<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repository extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('profil_model', 'profil');
	}

	public function index()
	{
		$data['file'] 		= $this->db->get('repository')->result();
		$data['title'] 		= 'Repository';
		$data['isi']		= 'admin/repository/index';

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah()
	{
		$data['title'] 		= 'Tambah Repository';
		$data['isi']		= 'admin/repository/tambah';

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function store_repo()
	{
		$config['upload_path'] 		= './assets/upload/repo_fakultas/';
		$config['allowed_types'] 	= 'pdf';
		$config['max_size']  		= '2400'; //max besar file 2 mb

		$this->load->library('upload', $config);

		if (!empty($_FILES['file'])) {
			$this->upload->do_upload('file');
			$data1 = $this->upload->data();
			$file1 = $data1['file_name'];

			$data['type'] = $this->input->post('type');
			$data['nama_file'] = $this->input->post('nama_file');
			$data['file'] = $file1;

			$this->db->insert('repository', $data);
		}
	}

	public function hapus_repo($id)
	{
		$file = $this->db->get_where('repository', ['id' => $id])->row();

		if (!empty($file)) {
			unlink('assets/upload/repo_fakultas/'.$file->foto);
		}

		$this->db->delete('repository', ['id' => $id]);

		redirect('admin/repository');
		$this->session->set_flashdata('sukses', 'data berhasil di hapus');

	}

	public function assesment()
	{
		$data['file'] 		= $this->db->get('file_assesment')->result();
		$data['title'] 		= 'File assesment';
		$data['isi']		= 'admin/repository/assesment';

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah_assesment()
	{
		$data['title'] 		= 'Tambah File assesment';
		$data['isi']		= 'admin/repository/tambah_assesment';

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function store_assesment()
	{
		$config['upload_path'] 		= './assets/upload/file_assesment/';
		$config['allowed_types'] 	= 'pdf|xlsx|docs';
		$config['max_size']  		= '2400'; //max besar file 2 mb

		$this->load->library('upload', $config);

		if (!empty($_FILES['file'])) {
			$this->upload->do_upload('file');
			$data1 = $this->upload->data();
			$file1 = $data1['file_name'];

			$data['type'] = $this->input->post('type');
			$data['nama_file'] = $this->input->post('nama_file');
			$data['file'] = $file1;

			$this->db->insert('file_assesment', $data);
		}
	}

}

/* End of file Repository.php */
/* Location: ./application/controllers/admin/Repository.php */