<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'assets/uuid/vendor/autoload.php';
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class Unit extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('unit_model', 'unit');
		$this->load->model('user_model', 'user');
		$this->load->model('pengguna_model', 'pengguna');
		$this->form_validation->set_error_delimiters('', '');

	}

	public function output_json($data, $encode = true)
	{
		if ($encode) $data = json_encode($data);
		$this->output->set_content_type('application/json')->set_output($data);
	}

	public function index()
	{
		$data['title'] = "Login Unit";

		$this->load->view('tendik/login/header', $data);
		$this->load->view('unit/login');
		$this->load->view('tendik/login/footer');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = sha1($this->input->post('password'));
		$level = $this->input->post('hak_akses');

		$unit_user = $this->unit->getUsername($username);

		if ($unit_user) {

			if ($unit_user->active == 'Y') {
				if ($password == $unit_user->password) {

					if ($level == $unit_user->level) {

						$sess = [
							'username' 		=> $unit_user->username,
							'level' 		=> $unit_user->level,
							'nama'			=> $unit_user->nama,
							'jenis_kelamin'	=> $unit_user->jenis_kelamin,
							'id_sekolah'	=> $unit_user->id_sekolah,
							'tahun'			=> $unit_user->tahun,
							'date_created'	=> $unit_user->date_created
						];

						$this->session->set_userdata($sess);
						$this->session->set_flashdata('success', '<div class="alert alert-block alert-success">
					        <i class="ace-icon fa fa-check"></i>
					          Sukses <strong>Anda berhasil login!</strong>
					      </div>');
						redirect('unit/in');
					} else {
						$this->session->set_flashdata('gagal', '<div class="alert alert-block alert-danger">
					        <i class="ace-icon fa fa-times"></i>
					          Gagal <strong>Hak akses salah!</strong>
					      </div>');
						redirect('unit');
					}

				}else{
					$this->session->set_flashdata('gagal', '<div class="alert alert-block alert-danger">
				        <i class="ace-icon fa fa-times"></i>
				          Gagal <strong>password anda salah!</strong>
				      </div>');
					redirect('unit');
				}
			}else {
				$this->session->set_flashdata('gagal', '<div class="alert alert-block alert-danger">
			        <i class="ace-icon fa fa-times"></i>
			          Gagal <strong>Anda belum di aktifkan!</strong>
			      </div>');
				redirect('unit');
			}

		}else{
			$this->session->set_flashdata('gagal', '<div class="alert alert-block alert-danger">
			        <i class="ace-icon fa fa-times"></i>
			          Gagal <strong>username dan password tidak terdaftar!</strong>
			      </div>');
				redirect('unit');
		}
	}

	public function in()
	{
		$this->simple_login->cek_login_unit();
		
		$data['user']	= $this->unit->getUsername($this->session->userdata('username'));
		$data['title']  = 'Unit Page';
		$data['isi'] 	= 'unit/dashboard';

		$this->load->view('unit/layout/wrapper', $data, FALSE);

	}

	/*PROFILE*/

	public function unit_profile()
	{
		$this->simple_login->cek_login_unit();
		$data['user'] 	= $this->unit->getUsername($this->session->userdata('username'));
		$data['title']  = 'Profile Page';
		$data['isi'] 	= 'unit/unit_profile';

		$this->load->view('unit/layout/wrapper', $data, FALSE);
	}

	/*END PROFILE*/


	/*MAHASISWA PAGE*/

	public function mahasiswa()
	{
		$this->simple_login->cek_login_unit();
		
		$data['sekolah']= $this->unit->getData('plp_magang_sekolah');
		$data['user']	= $this->unit->getUsername($this->session->userdata('username'));
		$data['data']	= $this->unit->getMahasiswaBySekolah();
		$data['title']  = 'Unit mahasiswa page';
		$data['isi'] 	= 'unit/mahasiswa';

		$this->load->view('unit/layout/wrapper', $data, FALSE);
	}

	public function input_nilai($id)
	{
		$this->simple_login->cek_login_unit();

		$data['mahasiswa']	= $this->unit->getMahasiswaId($id);
		$data['img']		= $this->pengguna->getPengguna($data['mahasiswa']->nim);
		$data['title']  = 'Input Nilai';
		$data['isi'] 	= 'unit/input_nilai';

		$this->load->view('unit/layout/wrapper', $data, FALSE);
	}

	public function add_nilai()
	{
		$method = $this->input->post('method', true);

		if ($method === 'add') {

			$uuid = Uuid::uuid4()->toString();
			$data['id']			= $uuid;
			$data['nim']		= $this->input->post('nim');
			$data['nilai1'] 	= $this->input->post('nilai1');
			$data['nilai2'] 	= $this->input->post('nilai2');
			$data['nilai3'] 	= $this->input->post('nilai3');
			$data['n_akhir1'] 	= $this->input->post('nilai_akhir1');
			$data['n_akhir2'] 	= $this->input->post('nilai_akhir2');
			$data['n_akhir3'] 	= $this->input->post('nilai_akhir3');

			$this->db->insert('ppl_nilai', $data);
			$this->output_json(['pesan' => true]);

		} else if($method === 'edit'){

			$id					= $this->input->post('uuid');
			$data['nim'] 		= $this->input->post('nim');
			$data['nilai1'] 	= $this->input->post('nilai1');
			$data['nilai2'] 	= $this->input->post('nilai2');
			$data['nilai3'] 	= $this->input->post('nilai3');
			$data['n_akhir1'] 	= $this->input->post('nilai_akhir1');
			$data['n_akhir2'] 	= $this->input->post('nilai_akhir2');
			$data['n_akhir3'] 	= $this->input->post('nilai_akhir3');


			$this->unit->update('ppl_nilai', $data, 'id', $id);
			$this->output_json(['pesan' => false]);
		}
	}

	public function load_nilai()
	{
		$data['nim'] = $this->input->post('nim');

		$data = $this->unit->getNilai('ppl_nilai',$data)->row();

		echo json_encode($data);
	}


	public function lihat_nilai($id)
	{
		$this->simple_login->cek_login_unit();

		$data['mahasiswa']	= $this->unit->getMahasiswaId($id);
		$data['img']		= $this->pengguna->getPengguna($data['mahasiswa']->nim);
		$data['title']  	= 'Lihat Nilai';
		$data['isi'] 		= 'unit/lihat_nilai';

		$this->load->view('unit/layout/wrapper', $data, FALSE);
	}

	public function input_nilai_magang($id)
	{
		$this->simple_login->cek_login_unit();

		$data['mahasiswa']	= $this->unit->getMahasiswaId($id);
		$data['img']		= $this->pengguna->getPengguna($data['mahasiswa']->nim);
		$data['title']  = 'Input Nilai Magang';
		$data['isi'] 	= 'unit/input_nilai_magang';

		$this->load->view('unit/layout/wrapper', $data, FALSE);
	}

	public function add_nilai_magang()
	{
		$method = $this->input->post('method', true);

		if ($method === 'add') {

			$data['nim']		= $this->input->post('nim');
			$data['nilai1'] 	= $this->input->post('nilai1');
			$data['nilai2'] 	= $this->input->post('nilai2');
			$data['nilai3'] 	= $this->input->post('nilai3');
			$data['nilai4'] 	= $this->input->post('nilai4');
			$data['nilai5'] 	= $this->input->post('nilai5');
			$data['nilai6'] 	= $this->input->post('nilai6');
			$data['nilai7'] 	= $this->input->post('nilai7');
			$data['nilai8'] 	= $this->input->post('nilai8');


			$this->db->insert('nilai_magang', $data);
			$this->output_json(['pesan' => true]);

		} else if($method === 'edit'){

			$id					= $this->input->post('uuid');
			$data['nim']		= $this->input->post('nim');
			$data['nilai1'] 	= $this->input->post('nilai1');
			$data['nilai2'] 	= $this->input->post('nilai2');
			$data['nilai3'] 	= $this->input->post('nilai3');
			$data['nilai4'] 	= $this->input->post('nilai4');
			$data['nilai5'] 	= $this->input->post('nilai5');
			$data['nilai6'] 	= $this->input->post('nilai6');
			$data['nilai7'] 	= $this->input->post('nilai7');
			$data['nilai8'] 	= $this->input->post('nilai8');



			$this->unit->update('nilai_magang', $data, 'id', $id);
			$this->output_json(['pesan' => false]);
		}
	}

	public function load_nilai_magang()
	{
		$data['nim'] = $this->input->post('nim');

		$data = $this->unit->getNilai('nilai_magang', $data)->row();

		echo json_encode($data);
	}

	public function lihat_nilai_magang($id)
	{
		$this->simple_login->cek_login_unit();

		$data['mahasiswa']	= $this->unit->getMahasiswaId($id);
		$data['img']		= $this->pengguna->getPengguna($data['mahasiswa']->nim);
		$data['title']  = 'Lihat Nilai';
		$data['isi'] 	= 'unit/lihat_nilai_magang';

		$this->load->view('unit/layout/wrapper', $data, FALSE);
	}

	public function lihat_data($id)
	{
		$this->simple_login->cek_login_unit();

		$data['mahasiswa']	= $this->unit->getMahasiswaId($id);
		$data['img']		= $this->pengguna->getPengguna($data['mahasiswa']->nim);
		$data['title']  = 'Lihat Data';
		$data['isi'] 	= 'unit/lihat_data';

		$this->load->view('unit/layout/wrapper', $data, FALSE);
	}


	/* END MAHASISWA */


	/* SEKOLAH PAGE */
	public function sekolah()
	{
		$this->simple_login->cek_login_unit();
		$data['title']  = 'Sekolah';
		$data['isi'] 	= 'unit/sekolah';

		$this->load->view('unit/layout/wrapper', $data, FALSE);
	}

	public function load_data()
	{
		$data_sekolah = $this->unit->getData('plp_magang_sekolah');

		echo json_encode($data_sekolah);
	}

	public function add_sekolah()
	{
		$nama_sekolah = $this->input->post('nama_sekolah');

		$cek = $this->unit->cek_sekolah($nama_sekolah);

		if ($cek->num_rows() > 0) {
			echo json_encode(['data' => false]);
			
		} else {

			$data['nama_sekolah'] = $nama_sekolah;

			$insert = $this->unit->addData($data, 'plp_magang_sekolah');

			echo json_encode(['pesan' => true]);
		}
		
	}

	public function getSekolah()
	{
		$id = $this->input->post('id');
		$where = ['id' => $id];

		$data = $this->unit->getDataSekolahId('plp_magang_sekolah', $where)->result();

		echo json_encode($data);

	}

	public function update_sekolah()
	{
		$id_sekolah = $this->input->post('id');
		$nama_sekolah = $this->input->post('nama_sekolah');

		$where = ['id' => $id_sekolah];
		$data = [
			'nama_sekolah' => $nama_sekolah
		];

		$update = $this->unit->update_sekolah('plp_magang_sekolah', $data, $where);
		echo json_encode(['pesan' => true]);
	}

	public function delete_sekolah()
	{
		$id = $this->input->post('id');

		$data = ['id' => $id];

		$this->unit->delete('plp_magang_sekolah', $data);
		echo json_encode(['pesan' => true]);
	}

	/* END SEKOLAH */



	/*
		USER PAGE
	*/

	public function user()
	{
		$this->simple_login->cek_login_unit();
		$data['user'] 	= $this->unit->getData('unit_user');
		$data['title']  = 'User';
		$data['isi'] 	= 'unit/user';

		$this->load->view('unit/layout/wrapper', $data, FALSE);
	}


	public function create_user()
	{
		$this->simple_login->cek_login_unit();
		$data['tahun']      = ['2020', '2021', '2022', '2023', '2024', '2025'];
 		$data['sekolah'] 	= $this->unit->getData('plp_magang_sekolah');
		$data['title']  	= 'Create User';
		$data['isi'] 		= 'unit/form_user';

		$this->load->view('unit/layout/wrapper', $data, FALSE);
	}

	public function save_user()
	{
		$method = $this->input->post('method', true);

		$this->form_validation->set_rules('id_sekolah', 'Sekolah', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required');
		$this->form_validation->set_rules('active', 'Active', 'required');

		$this->form_validation->set_message('required', 'Kolom {field} wajib diisi');

		if ($this->form_validation->run() == false ) {

			$data = [
				'status'	=> false,
				'errors'	=> [
					'id_sekolah'	=> form_error('id_sekolah'),
					'nama' 			=> form_error('nama'),
					'username' 		=> form_error('username'),
					'password' 		=> form_error('password'),
					'jenis_kelamin' => form_error('jenis_kelamin'),
					'active' 		=> form_error('active'),
					'tahun' 		=> form_error('tahun'),
				]
			];
			$this->output_json($data);

		} else {

			$input = [
				'id_sekolah' 	=> $this->input->post('id_sekolah'),
				'nama'			=> $this->input->post('nama'),
				'username'		=> $this->input->post('username'),
				'password'		=> sha1($this->input->post('password')),
				'level'			=> 'pamong',
				'jenis_kelamin'	=> $this->input->post('jenis_kelamin'),
				'active'		=> $this->input->post('active'),
				'tahun'			=> $this->input->post('tahun'),
				'date_created' 	=> date('Y-m-d')
			];

			if ($method === 'add') {
				$save = $this->unit->addData($input, 'unit_user');

				$this->output_json(['status' => true]);
			}else{
				$id = $this->input->post('id_user', true);
				$action = $this->unit->update('unit_user', $input, 'id', $id);
				$this->output_json(['status' => true]);
			}

			

		}
		

	}

	public function reset_password_user()
	{
		$id_user 	= $this->uri->segment(3);
		$data_user 	= $this->unit->detail('unit_user', $id_user);

		if ($data_user->num_rows() > 0) {
			$user 		= $data_user->row();
			$username 	= $user->username;
		}

		$password = rand(123456,999999);
		$this->unit->resetPasswordUser($id_user, $password);

		echo $this->session->set_flashdata('msg','show-modal');
        echo $this->session->set_flashdata('username', $username);
        echo $this->session->set_flashdata('password', $password);
	    redirect('unit/user');

	}


	public function nonAktifUser($id)
	{
		
		$data = ['active' => 'N'];
		$this->db->where('id', $id);
		$this->db->update('unit_user', $data);

		echo $this->session->set_flashdata('msg', 'success');
		redirect('unit/user');

	}

	public function AktifUser($id)
	{
		
		$data = ['active' => 'Y'];
		$this->db->where('id', $id);
		$this->db->update('unit_user', $data);

		echo $this->session->set_flashdata('message', 'success');
		redirect('unit/user');

	}

	public function edit_form($id)
	{
		$this->simple_login->cek_login_unit();

		$data['user']		= $this->unit->detail('unit_user', $id)->row();
		$data['tahun']      = ['2020', '2021', '2022', '2023', '2024', '2025'];
 		$data['sekolah'] 	= $this->unit->getData('plp_magang_sekolah');
		$data['title']  	= 'Create User';
		$data['isi'] 		= 'unit/form_edit';

		$this->load->view('unit/layout/wrapper', $data, FALSE);
	}

	public function delete_user($id)
	{
		$data = ['id' => $id];

		$this->unit->delete('unit_user', $data);
		echo $this->session->set_flashdata('msg', 'sukses');;
		redirect('unit/user');
	}


	/*
	AND USER
	*/


	/*JADWAL KEGIATAN PAGE*/

	public function jadwal_kegiatan()
	{
		$data['tahun']      = ['2020', '2021', '2022', '2023', '2024', '2025'];
		$data['title']  	= 'Jadwal Kegiatan';
		$data['isi'] 		= 'unit/jadwal_kegiatan';

		$this->load->view('unit/layout/wrapper', $data, FALSE);
	}

	public function set_tgl_kegiatan()
	{
		$method = $this->input->post('method', true);

		if ($method === 'add') {

			$data['tahun'] 		= $this->input->post('tahun');
			$data['author'] 	= $this->session->userdata('nama');
			$data['tgl_start'] 	= $this->input->post('tgl_start');
			$data['tgl_end'] 	= $this->input->post('tgl_end');

			$this->db->insert('unit_jadwal', $data);
			$this->output_json(['pesan' => true]);

		} else if($method === 'edit'){

			$id					= $this->input->post('id');
			$data['tahun'] 		= $this->input->post('tahun');
			// $data['author'] 	= $this->session->userdata('nama');
			$data['tgl_start'] 	= $this->input->post('tgl_start');
			$data['tgl_end'] 	= $this->input->post('tgl_end');



			$this->unit->update('unit_jadwal', $data, 'id', $id);
			$this->output_json(['pesan' => false]);
		}
	}

	public function load_tgl()
	{
		$data = $this->unit->getDatajadwal('unit_jadwal');

		$this->output_json($data);
	}

	/*END JADWAL KEGIATAN*/


	public function print_all($id)
	{
		$data['data_mhs'] = $this->db->get_where('daftar_magang', ['id_sekolah' => $id])->result();
		$this->load->view('unit/print_all', $data, FALSE);
		
	}

	/*
		PAGE REPOSITORY
	*/

	public function document()
	{
		$data['document']   = $this->unit->getData('unit_document');
		$data['title']  	= 'Repository | Document';
		$data['isi'] 		= 'unit/document';

		$this->load->view('unit/layout/wrapper', $data, FALSE);
	}


	public function form_add_document()
	{
		$data['category_document'] = $this->unit->getData('unit_category_document');
		$data['title']  	= 'Add Document';
		$data['isi'] 		= 'unit/form_document_add';

		$this->load->view('unit/layout/wrapper', $data, FALSE);
	}

	public function save_document()
	{

		$config['upload_path'] 		= './assets/upload/unit_document/';
		$config['allowed_types'] 	= 'pdf|docx|xlsx';
		$config['max_size']  		= '2400';
		$config['encrypt_name']     = true;
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('file')){
			$category_document = $this->unit->getData('unit_category_document');
			
			$data = array(	'title'	 				=> 'Add document',
							'category_document'		=> $category_document,
							'errors'				=> $this->upload->display_errors(),
							'isi'					=> 'unit/form_document_add');

			$this->load->view('unit/layout/wrapper', $data, FALSE);
		}else{
			// masuk database

			$upload_foto = array('upload_data' => $this->upload->data());

			$data = [
						'id_document_category'	=> $this->input->post('id_category_document'),
						'judul'					=> $this->input->post('judul'),
						'file'					=> $upload_foto['upload_data']['file_name'],
						'status'				=> $this->input->post('status')
					];
						

			$this->unit->addData($data,'unit_document');

			$this->session->set_flashdata('success', '<div class="alert alert-success">Data document berhasil di simpan</div>');
			redirect('unit/document');
		}
	}


	public function video()
	{
		$this->db->order_by('id', 'desc');
		$data['video']	= $this->unit->getData('unit_video');
		$data['title']	= 'Repository | Video';
		$data['isi']	= 'unit/video';

		$this->load->view('unit/layout/wrapper', $data, FALSE);
	}

	public function form_add_video()
	{
		$data['title']	= 'Add Video';
		$data['isi']	= 'unit/form_add_video';

		$this->load->view('unit/layout/wrapper', $data, FALSE);
	}

	public function save_video()
	{
		$method = $this->input->post('method', true);

		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('link', 'Link Youtube', 'required');
		$this->form_validation->set_rules('tgl', 'Tgl', 'required');

		$this->form_validation->set_message('required', 'Kolom {field} wajib diisi');

		if ($this->form_validation->run() == false ) {

			$data = [
				'status'	=> false,
				'errors'	=> [
					'judul'		=> form_error('judul'),
					'link' 		=> form_error('link'),
					'tgl' 		=> form_error('tgl')
				]
			];
			$this->output_json($data);

		} else {

			$input = [
				'judul' 			=> $this->input->post('judul'),
				'link_youtube'		=> $this->input->post('link'),
				'tgl_pelaksanaan'	=> $this->input->post('tgl')
			];

			if ($method === 'add') {
				$save = $this->unit->addData($input, 'unit_video');

				$this->output_json(['status' => true]);
			}else{
				$id = $this->input->post('id_video', true);
				$action = $this->unit->update('unit_video', $input, 'id', $id);
				$this->output_json(['status' => true]);
			}
		}
	}


	public function beranda()
	{
		$data['data']	= $this->db->get('unit_beranda')->row();
		$data['title']	= 'Beranda Unit';
		$data['isi']	= 'unit/beranda';

		$this->load->view('unit/layout/wrapper', $data, FALSE);
	}

	public function update_beranda($id){

		$this->form_validation->set_rules('beranda', 'Pesan Beranda', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['data']	= $this->db->get('unit_beranda')->row();
				$data['title']	= 'Beranda Unit';
				$data['isi']	= 'unit/beranda';

				$this->load->view('unit/layout/wrapper', $data, FALSE);

			} else {
				$dt['id']		= $id;
				$dt['pesan'] 	= $this->input->post('beranda');

				$this->db->update('unit_beranda', $dt);
				echo $this->session->set_flashdata('msg', 'success');
				redirect('unit/beranda');
			
		}

	}


	/*
		END REPOSITORY
	*/


	public function log_out()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('prodi');
		$this->session->unset_userdata('level');

		$this->session->set_flashdata('sukses', '<div class="alert alert-block alert-success">
			        <i class="ace-icon fa fa-check"></i>
			          sukses <strong>Anda berhasil logout</strong>
			      </div>');
		redirect(base_url('unit'));
	
	}

}