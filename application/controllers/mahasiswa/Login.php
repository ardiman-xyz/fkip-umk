<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('prodi_model', 'prodi');
		$this->load->model('surat_model', 'surat');
		$this->load->model('user_model', 'user');
		
		
	}

	public function index()
	{
		$data['title'] = "Login";
		
		$this->load->view('mahasiswa/login/header', $data);
		$this->load->view('mahasiswa/login/login');
		$this->load->view('mahasiswa/login/footer');
		
	}

	public function login()
	{
		cek_ajax();

		$nim = $this->input->post('nim');
		$password = sha1($this->input->post('password'));

		$dataUser = $this->surat->cek_user($nim);

		if ($dataUser) {
			
			if ($dataUser->password == $password) {
				
				$sess = [
					'nama_lengkap' 	=> $dataUser->nama_lengkap,
					'nim' 			=> $dataUser->nim,
					'jenis_kelamin' => $dataUser->jenis_kelamin
				];

				$this->session->set_userdata($sess);
				
				$this->output->set_content_type('application/json')->set_output(json_encode([
					'status' => true,
					'message' => 'Anda berhasil login',
					'url' => base_url('mahasiswa/in')
				]));

			}else{
				$this->output->set_content_type('application/json')->set_output(json_encode([
					'status' => false,
					'message' => 'Password Anda salah',
				]));
			}

		}else{

			$this->output->set_content_type('application/json')->set_output(json_encode([
					'status' => false,
					'message' => 'Anda tidak terdaftar di sistem',
				]));
		}


	}

}

/* End of file Login.php */
/* Location: ./application/controllers/mahasiswa/Login.php */