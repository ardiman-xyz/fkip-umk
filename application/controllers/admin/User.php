<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->simple_login->cek_login_admin();
			$this->load->model('user_model', 'user');
			$this->load->model('prodi_model', 'prodi');

		}

	private function output_json($data, $encode = true)
  	{
	    if ($encode) $data = json_encode($data);
	    $this->output->set_content_type('application/json')->set_output($data);
  	}

	public function index()
	{
		$users = $this->user->getAllUsers();

		$data = [	'title'		=> 'List User',
					'users'		=> $users,		
                    'isi'		=> 'admin/user/list' ];
                    
        $this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	

	public function tambah()
	{
		$prodi = $this->prodi->getAllProdi();
		$data = [	'title'		=> 'Admin ~ Tambah user',
					'prodi'		=> $prodi,
                    'isi'		=> 'admin/user/tambah' ];
                    
        $this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function simpan()
	{
		cek_ajax();

		$data = [
			'username'		=> htmlspecialchars($this->input->post('username')),
			'password'		=> sha1($this->input->post('password')),
			'level'			=> $this->input->post('level'),
			'nama_user'		=> htmlspecialchars($this->input->post('nama_user')),
			'prodi'		=> $this->input->post('id_prodi'),
			'created'	=> date('Y-m-d')
		];

		$this->user->tambah($data);
		
		$pesan = [
          'status' => true,
          'pesan'  => 'Data user berhasil di simpan'
        ];

        $this->output_json($pesan);

		
	}

	public function get_data()
	{
		cek_ajax();

		$id = $this->input->post('id_user');

		$data['user'] = $this->db->get_where('user', ['id_user' => $id])->row();

		echo $this->load->view('admin/user/form_edit', $data, TRUE);
	}


	public function update()
	{
		cek_ajax();

		sleep(2);

		$data = [
			'id_user'	=> $this->input->post('id_user'),
			'username'	=> $this->input->post('username'),
			'password'	=> sha1($this->input->post('password')),
			'nama_user'	=> $this->input->post('nama_user'),
		];

		$this->user->update($data);

		$pesan = [
			'status' => true,
			'pesan'  => 'data berhasil di update',
		];

		$this->output_json($pesan);

	}


	public function delete_user()
	{
		cek_ajax();

	    $id = $this->input->post('id_user');

		$this->db->where('id_user', $id)->delete('user');

	    $pesan = [
	      'status' => true,
	      'pesan'  => 'data berhasil di hapus'
	    ];

	    $this->output_json($pesan);
	}



}