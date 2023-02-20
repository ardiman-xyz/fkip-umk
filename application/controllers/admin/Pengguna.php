<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pengguna_model', 'pengguna');
		$this->simple_login->cek_login_admin();
	}

	public function index()
	{
		$data['pengguna']	= $this->pengguna->getDataPengguna();
		$data['title'] 		= 'Page Mahasiswa';
        $data['isi']		= 'admin/pengguna/list';
                    
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function delete($nim)
	{

		$pengguna = $this->pengguna->getPengguna($nim);

		unlink('./assets/img/profile_pengguna/'.$pengguna->image);

		$data = ['nim'	=> $nim];

		$this->pengguna->delete($data);
		redirect('admin/pengguna');
	}

}
