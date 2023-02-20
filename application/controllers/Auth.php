<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->model('auth_model', 'auth');

		}

	public function index()
	{
		$data = [
			'title'	=> 'Login Page'
		];
		$this->load->view('auth/auth_header', $data);
		$this->load->view('auth/login', $data);
		$this->load->view('auth/auth_footer', $data);
	}

	public function login_admin()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required',[
						'required' => '%s harus di isi']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required',[
						'required' => '%s harus di isi']);
		

		if ($this->form_validation->run() == FALSE) {
			
			$data = [
			'title'	=> 'Login Page'
				];
				$this->load->view('auth/auth_header', $data);
				$this->load->view('auth/login', $data);
				$this->load->view('auth/auth_footer');

		} else {

			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$dataAdmin = $this->auth->getAdminByUsername($username);
			 
			
			if ($dataAdmin) {

				if (sha1($password) === $dataAdmin->password) {
					
					if ($dataAdmin->level == "admin") {
							$sess = [
							'nama_user'	=> $dataAdmin->nama_user,
							'username'	=> $dataAdmin->username,
							'level'		=> $dataAdmin->level,
							'id_user'	=> $dataAdmin->id_user
						];

						$this->session->set_userdata($sess);
						redirect('admin/dashboard');
					}else{
						$this->session->set_flashdata('gagal', 'Mohon maaf anda tidak memiliki akses di halaman ini!');
				redirect('auth');
					}
					
				}else{
					$this->session->set_flashdata('gagal', 'Password dan username salah !');
				redirect('auth');
				}

				


			}else{
				$this->session->set_flashdata('gagal', 'Password dan Username tidak sesuai!!');
				redirect('auth');
			}

			
			
		}
	}


	public function error()
	{
		$data['title'] = '404';

		$this->load->view('error', $data);
	}


	public function logout()
	{
		$this->session->unset_userdata('nama_user');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('id');

	// setelah di hapus maka di redirect
		$this->session->set_flashdata('sukses', '<div class="alert alert-success"><strong>Sukses ! </strong> Anda berhasil logout!</div>');
		redirect(base_url('auth'));
	}



	}

