<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class In extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('prodi_model', 'prodi');
		$this->load->model('surat_model', 'surat');
		$this->load->model('user_model', 'user');
		
	}

	public function index()
	{
		if (!$this->session->userdata('nim')) {
			redirect('mahasiswa/login');
		}
		$nim = $this->session->userdata('nim');
		$data['data'] = $this->user->getPengguna($nim);
		
		$data['title']	= 'Fkip | Mahasiswa Page';
        $data['isi']	= 'mahasiswa/dashboard';
                    
		$this->load->view('mahasiswa/layout/wrapper', $data, FALSE);
	}

	public function profil()
	{
		$nim = $this->session->userdata('nim');
		$data['data'] = $this->user->getPengguna($nim);

		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('nim', 'NIM', 'trim|required');
		$this->form_validation->set_rules('no_wa', 'Nomor WA', 'trim|required');


		if ($this->form_validation->run() == false) {
		
			$data['title']	= 'Fkip | Profil Mahasiswa';
	        $data['isi']	= 'mahasiswa/profil';
	                    
			$this->load->view('mahasiswa/layout/wrapper', $data, FALSE);	
		} else{

			$id = $this->session->userdata('nim');
			$nama_lengkap = $this->input->post('nama_lengkap');
			$jenis_kelamin= $this->input->post('jenis_kelamin');
			$nim = $this->input->post('nim');
			$no_wa = $this->input->post('no_wa');

			// cek jika ada gambar yang di upload
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {

				$config['allowed_types'] 	= 'gif|jpg|png';
				$config['max_size']  		= '2048';
				$config['upload_path'] 		= './assets/img/profile_pengguna/';
				$config['encrypt_name'] 	= true;
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('image')){
					echo $this->upload->display_errors();
				}
				else{

					$old_image = $data['data']->image;

					if ($old_image != 'men.jpg' and $old_image != 'muslim_women.jpg') {
						unlink(FCPATH . 'assets/img/profile_pengguna/'.$old_image);
					}
					
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				}

			}

			$this->db->set([
				'nim' => $nim,
				'nama_lengkap'	=> $nama_lengkap,
				'no_wa'			=> $no_wa,
				'jenis_kelamin' => $jenis_kelamin,
			]);
			$this->db->where('nim', $id);
			$this->db->update('pengguna');

		echo $this->session->set_flashdata('msg', 'success');
		redirect('mahasiswa/in/profil');

		}

	}
	
	public function update_password()
	{
		$nim = $this->session->userdata('nim');
		$data['data'] = $this->user->getPengguna($nim);

		$this->form_validation->set_rules('pass_lama', 'Current Password', 'trim|required');
		$this->form_validation->set_rules('pass_baru', 'New Password', 'trim|required|min_length[6]|matches[confirm_pass]');
		$this->form_validation->set_rules('confirm_pass', 'Confirm New Password', 'trim|required|matches[pass_baru]');

		if ($this->form_validation->run() == false) {

			$data['title']	= 'Fkip | Update Password';
	        $data['isi']	= 'mahasiswa/update_password';
	                    
			$this->load->view('mahasiswa/layout/wrapper', $data, FALSE);

		} else {

			$current_pass = sha1($this->input->post('pass_lama'));
			$new_password = $this->input->post('pass_baru');

			if ($current_pass != $data['data']->password) {
				$this->session->set_flashdata('sukses', '<div class="alert alert-block alert-danger text-center"><i class="ace-icon fa fa-exclamation-triangle "></i>Wrong Current Password!</div>');

				redirect('mahasiswa/in/update_password');
			} else {
				if ($current_pass == $new_password) {
					$this->session->set_flashdata('sukses', '<div class="alert alert-block alert-danger text-center"> <i class="ace-icon fa-exclamation-triangle"></i>New password cannot be the same as Current password!</div>');
					redirect('mahasiswa/in/update_password');
				} else {
					// password sudah ok 
					$password_encryp = sha1($new_password);
					$this->db->set('password', $password_encryp);
					$this->db->where('nim', $data['data']->nim);
					$this->db->update('pengguna');

					echo $this->session->set_flashdata('msg', 'success');
					redirect('mahasiswa/in/update_password');
				}
			}

		}

			
	}

	public function log_out()
	{
		$this->session->unset_userdata('nim');
		$this->session->unset_userdata('nama_lengkap');
		$this->session->unset_userdata('jenis_kelamin');

	// setelah di hapus maka di redirect
		$this->session->set_flashdata('sukses', '<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">
									<i class="ace-icon fa fa-times"></i>
								</button>
								<strong><i class="ace-icon fa fa-bullhorn"></i> Sukses! 
								</strong> Anda berhasil Logout<br /></div>');
		redirect(base_url('mahasiswa/login'));
	}

	public function registrasi()
	{
		$data['title'] = "Regitrasi Page";

		$this->load->view('mahasiswa/login/header', $data);
		$this->load->view('mahasiswa/login/registrasi');
		$this->load->view('mahasiswa/login/footer');
	}


	public function registrasi_action()
	{
		$nim = $this->input->post('nim');

		$cek_nim = $this->surat->cekNim($nim);

		if ($cek_nim->num_rows() > 0) {
			$this->session->set_flashdata('gagal', 'Nim anda sudah terdaftar');

				redirect(base_url('mahasiswa/in/registrasi'));
		}else{

			$data['nim'] 				= $this->input->post('nim');
			$data['nama_lengkap'] 		= $this->input->post('nama_lengkap');
			$data['password'] 			= sha1($this->input->post('password'));
			$data['jenis_kelamin'] 		= $this->input->post('jenis_kelamin');
			$data['hak_akses'] 			= "mahasiswa";
			$data['join'] 				= date('Y-m-d');
			$data['status_daftar_ujian']= 0;

			$this->session->set_userdata($data);

			$this->surat->masukkan($data);
			$this->session->set_flashdata('gagal', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><strong>sukses </strong> anda sudah registrasi! <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span aria-hidden="true">&times;</span></button></div>');
		redirect(base_url('mahasiswa/in'));
		}

		
	}
	
	public function tugas_akhir()
	{
		$data['skripsi']= $this->db->where("nim", $this->session->userdata("nim"))->get("repo_skripsi")->row();
		$data['judul_skripsi'] = $this->db->where("nim", $this->session->userdata("nim"))->get("bimbingan_mhs")->row()->judul;
		$data['title']	= 'Mahasiswa - TUgas Akhir';
        $data['isi']	= 'mahasiswa/tugas_akhir';
		$this->load->view('mahasiswa/layout/wrapper', $data, FALSE);
	}

	public function upload_skripsi()
	{
		$fileName = $_FILES['skripsi']['name'];
		$nim = $this->session->userdata("nim");

		$id_prodi = $this->db->where('nim', $nim)->get('pengguna')->row()->id_prodi;

	  	//kalau ada filenya
	  	if ($fileName) {
	  		$test = explode('.', $fileName);
	  		$extention = end($test); //dapatkan ektensi dari file

	  		$nama_file = 'skripsi-'.$nim.'-'.time(). '.' .$extention;
	  		$path = './assets/upload/skripsi/'.$nama_file;
	  		move_uploaded_file($_FILES['skripsi']['tmp_name'], $path);

	  		// set di database
	  		$data['id_prodi'] 		= $id_prodi;
	  		$data['nim'] 			= $nim;
	  		$data['skripsi']		= $nama_file;
	  		$data['date_created']	= date("Y-m-d");

	  		$this->db->insert('repo_skripsi', $data);
	  		
	  		redirect(base_url('mahasiswa/in/tugas_akhir'));
	  	}
	}

}

/* End of file Mahaasiswa.php */
/* Location: ./application/controllers/mahasiswa/Mahaasiswa.php */