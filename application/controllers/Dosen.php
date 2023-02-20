<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('dosen_model', 'dosen');
		$this->load->model('penawaranModel', 'penawaran');		
	}

	public function output_json($data)
	{
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function cek_login()
	{
		$nidn 		= $this->input->post('nidn');
		$password 	= $this->input->post('password', true);


		$check = $this->dosen->check('dosen', $nidn)->row();

		if ($check != null) {

			if ($check->password === $password) {

				$sess = [
					'NIDN' 			=> $check->NIDN,
					'nama_dosen'	=> $check->nama_dosen,
					'id_dosen'		=> $check->id_dosen
				];

				$this->session->set_userdata($sess);

				$data = [
						'status' 	=> true,
						'url'		=>  'dosen/on',
						'message' 	=> "successfuly logged in!"
					];

				$this->output_json($data);
				
			}else{

				$data = [
					'status' => false,
					'failed' => "Password anda salah !"
				];

				$this->output_json($data);
			}

		}else{
			$data = [
					'status' => false,
					'failed' => "Anda tidak terdaftar"
				];

			$this->output_json($data);
		}
		

	}


	public function on()
	{
		if ($this->session->userdata('NIDN') == '') {
			redirect('home/dosen');
		}

		$nidn = $this->session->userdata('NIDN');

		$dt = $this->db->get_where('dosen', ['NIDN' => $nidn])->row();
		$info_dosen = $this->db->get_where('informasi_dosen', ['nidn_dosen' => $nidn]);
		$prodi = $this->db->get('prodi')->result();

		if ($info_dosen->num_rows() == null) {
			$info_d = '';
		}else {
			$info_d = $info_dosen->row();
		}

		$data = [
			'title'	=> 'Dashboard',
			'data'	=> $dt,
			'info_dsn'	=> $info_d,
			'prodi'	=> $prodi,
			'isi'	=> 'dosen/dashboard'
		];
		$this->load->view('dosen/layout/wrapper', $data, FALSE);
	}


	public function update_dosen()
	{	
		$nidn = $this->session->userdata('NIDN');
		$dt = $this->db->get_where('dosen', ['NIDN' => $nidn])->row();
		$info_dosen = $this->db->get_where('informasi_dosen', ['nidn_dosen' => $nidn])->row();
		$prodi = $this->db->get('prodi')->result();

        
    	 $data = [ 	'id_prodi'		=> $this->input->post('id_prodi'),
    	 			'nama_dosen'    => $this->input->post('nama'),
	                'NIDN'          => $this->input->post('nidn'),
	                'agama'         => $this->input->post('agama'),
	                'email_dosen'   => $this->input->post('email'),
	                'telepon_dosen' => $this->input->post('telepon'),
	                'alamat_dosen'  => $this->input->post('alamat'),
	                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
	                'status'        => 'Aktif',
	                'ttl_dosen'     => $this->input->post('ttl'),
	                'dibuat'        => date('Y-m-d  H-i-s')
	            ];

        	$this->db->where('nidn', $nidn);
			$this->db->update('dosen',$data);

			$d = [ 	'nidn_dosen'    => $nidn,
	                'profil_dosen'  => $this->input->post('profil'),
	                'penelitian'   	=> $this->input->post('penelitian'),
	                'publikasi' 	=> $this->input->post('publikasi'),
	                'pengajaran'  	=> $this->input->post('pengajaran'),
	            ];

	        $this->db->where('nidn_dosen', $nidn);
			$this->db->update('informasi_dosen',$d);

	       echo json_encode(['status' => true, 'pesan' => 'update dosen berhasil']);

	    
	}

	public function update_pass()
	{
		if ($this->session->userdata('NIDN') == '') {
			redirect('home/dosen');
		}

		$nidn = $this->session->userdata('NIDN');

		$dt = $this->db->get_where('dosen', ['NIDN' => $nidn])->row();

		$data = [	'title'		=> 'Update password',
					'data'		=> $dt,
					'isi'		=> 'dosen/update_pass'
				];	
		$this->load->view('dosen/layout/wrapper', $data, FALSE);

	}

	public function update_pass_action()
	{
		$nidn = $this->session->userdata('NIDN');
		$check = $this->db->get_where('dosen', ['NIDN' => $nidn])->row();

		$this->form_validation->set_rules('pass_lama', 'Password Lama', 'trim|required');
		$this->form_validation->set_rules('pass_baru', 'Password Baru', 'trim|required|min_length[6]|matches[konf_pass]');
		$this->form_validation->set_rules('konf_pass', 'Konfirmasi password', 'trim|required|matches[pass_baru]');

		if ($this->form_validation->run() == false) {

			$data['title']	= 'Update Password';
			$data['data']	= $check;
	        $data['isi']	= 'dosen/update_pass';
	                    
			$this->load->view('dosen/layout/wrapper', $data, FALSE);

		} else {

			$current_pass = $this->input->post('pass_lama');
			$new_password = $this->input->post('pass_baru');

			if ($current_pass != $check->password) {
				$this->session->set_flashdata('sukses', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Gagal ! </strong> Password lama salah!
                </div>');

				redirect('dosen/update_pass');
			} else {
				if ($current_pass == $new_password) {
					$this->session->set_flashdata('sukses', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Gagal ! </strong> Password baru tidak boleh sama dengan password lama!
                </div>');
					redirect('dosen/update_pass');
				} else {
					// password sudah ok 
					$password_encryp = $new_password;
					$this->db->set('password', $password_encryp);
					$this->db->where('NIDN', $check->NIDN);
					$this->db->update('dosen');

					$this->session->set_flashdata('sukses', '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Sukses ! </strong> Password anda berhasil di update!
                </div>');
					redirect('dosen/update_pass');
				}
			}

		}
	}


	public function update_photo()
	{
		if ($this->session->userdata('NIDN') == '') {
			redirect('home/dosen');
		}
		$nidn = $this->session->userdata('NIDN');

		$dt = $this->db->get_where('dosen', ['NIDN' => $nidn])->row();

		$data['title']	= 'Update Photo';
		$data['data']	= $dt;
        $data['isi']	= 'dosen/update_photo';
                    
		$this->load->view('dosen/layout/wrapper', $data, FALSE);
	}

	public function update_photo_action()
	{

		$nidn = $this->session->userdata('NIDN');
		$data = $this->db->get_where('dosen', ['NIDN' => $nidn])->row();

		$upload_image = $_FILES['foto']['name'];

		if ($upload_image) {

				$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
				$config['max_size']  		= '2048';
				$config['upload_path'] 		= './assets/img/dosen/';
				$config['encrypt_name'] 	= true;
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('foto')){
					echo $this->upload->display_errors();
				}
				else{

					$old_image = $data->foto_dosen;

					if ($old_image != 'men.jpg' and $old_image != 'muslim_women.jpg') {
						unlink(FCPATH . 'assets/img/dosen/'.$old_image);
					}
					
					$new_image = $this->upload->data('file_name');
					$this->db->set('foto_dosen', $new_image);
					$this->db->where('NIDN', $nidn);
					$this->db->update('dosen');
				}

			}
			$this->session->set_flashdata('sukses', '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Sukses ! </strong> Photo berhasil di update!
                </div>');
			redirect('dosen/update_photo');

	}


	public function update_rip()
	{
		$nidn = $this->session->userdata('NIDN');
		$data = $this->db->get_where('informasi_dosen', ['nidn_dosen' => $nidn])->row();

		$upload_rip = $_FILES['rip']['name'];

		if ($upload_rip) {

				$config['allowed_types'] 	= 'pdf';
				$config['max_size']  		= '2048';
				$config['upload_path'] 		= './assets/img/dosen/rip_dosen/';
				$config['encrypt_name'] 	= true;
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('rip')){

					echo json_encode(['status' => false, 'pesan' => $this->upload->display_errors()]);
				}
				else{

					$old_rip = $data->rip;

					if ($old_rip) {
						unlink(FCPATH . 'assets/img/dosen/rip_dosen/'.$old_rip);
					}
					
					$new_rip = $this->upload->data('file_name');

					$this->db->set('rip', $new_rip);
					$this->db->where('nidn_dosen', $nidn);
					$this->db->update('informasi_dosen');

					echo json_encode(['status' => true, 'pesan' => 'RIP Berhasil di Upload']);
					
				}

			}
			
	}


	public function out()
	{
		$this->session->unset_userdata('NIDN');
		$this->session->unset_userdata('nama_dosen');
		$this->session->unset_userdata('id_dosen');

	// setelah di hapus maka di redirect
		$this->session->set_flashdata('sukses', '<div class="alert alert-success"><strong>Sukses ! </strong> Anda berhasil logout!</div>');
		redirect(base_url('home/dosen'));
	}


	// ruang Penasehat akademik
	public function ruang_pa()
	{
		$data = $this->penawaran->getPenawaranDosen();
		$thn_akademik = $this->penawaran->getThnAkademik();

		$data = [	'title'		=> 'Ruang PA',
					'data'		=> $data,
					'thn_akademik' => $thn_akademik,
					'isi'		=> 'dosen/ruang_pa'
				];	
		$this->load->view('dosen/layout/wrapper', $data, FALSE);
	}

	public function buat_penawaran_mhs($id)
	{
		$nim 			= $this->penawaran->getDataPenawaran($id)->row()->nim;
		$nama_mhs 		= $this->db->get_where('pengguna', ['nim' => $nim])->row()->nama_lengkap;
		$data 			= $this->penawaran->getDataPenawaran($id)->row();
		$thn_akademik 	= ['2019/2020', '2020/2021', '2021/2022', '2022/2023'];

		$data = [	'title'			=> 'Buat penawaran mhs',
					'data'			=> $data,
					'nama_mhs'		=> $nama_mhs,
					'thn_akademik' 	=> $thn_akademik,
					'isi'			=> 'dosen/buat_penawaran_mhs'
				];	
		$this->load->view('dosen/layout/wrapper', $data, FALSE);
	}

	public function update_penawaran()
	{
		cek_ajax();
		$nim = $this->input->post('nim');
		$id = $this->input->post('id');
		$data = [
			'komentar_pa' => $this->input->post('komenter_pa'),
			'jml_sks'	  => $this->input->post('jumlah_sks'),
			'ip_smt_lalu' => $this->input->post('ip_smt_lalu'),
			'semester' 	  => $this->input->post('semester'),
			'thn_akademik' => $this->input->post('thn_akademik'),
			'status'	  => 1,
		];

		$this->db->set($data)
				->where('nim', $nim)
				->update('penawaran_mhs');

		// masukkan data matakuliah ke database

		$a = 0; //for looping
		$nama_matakuliah = $this->input->post('nama_matakuliah');


		if ($nama_matakuliah[0] != null) {

			foreach ($nama_matakuliah as $nama_mk) {

				$result = [
					'id_penawar'		=> $id,
					'nim' 				=> $nim,
					'nama_matakuliah' 	=> $nama_mk,
				];

				$insert = $this->db->insert('penawaran_mk_mhs', $result);

				if ($insert) {
					$a++;
				}

			}
		}


		$msg = [
			'status' => true,
			'pesan'	 => 'data berhasil disimpan',
			'url'	 => base_url('dosen/ruang_pa')
		];

		echo $this->output_json($msg);
	}

	public function hapus_mhs_penawaran($id)
	{
		$data 		= $this->db->get_where('penawaran_mhs', ['id' => $id])->row();

		if (!empty($data)) {
			unlink('assets/upload/mahasiswa/penawaran/'.$data->bukti_pembayaran);
			unlink('assets/upload/mahasiswa/penawaran/'.$data->khs);
			unlink('assets/upload/mahasiswa/penawaran/'.$data->krs);
			unlink('assets/upload/mahasiswa/penawaran/'.$data->sc_kuisioner);
		}

		$this->db->where('id', $id);
		$this->db->delete('penawaran_mhs', $data);

		// hapus matakuliah
		$this->db->where('nim', $data->nim)->delete('penawaran_mk_mhs');

		$this->session->set_flashdata('sukses', 'Data berhasil di hapus');
		redirect('dosen/ruang_pa');
		
	}

	public function detail_penawaran($nim)
	{
		$nama_mhs 	= $this->db->get_where('pengguna', ['nim' => $nim])->row()->nama_lengkap;
		$dt 		= $this->penawaran->getDataPenawaranByNim($nim)->row();
		$matakuliah = $this->penawaran->getMatakuliah($nim);


		$data = [	'title'		=> 'Detail penawaran',
					'data'		=> $dt,
					'nama_mhs'	=> $nama_mhs,
					'matakuliah' => $matakuliah,
					'isi'		=> 'dosen/detail_penawaran'
				];	
		$this->load->view('dosen/layout/wrapper', $data, FALSE);
	}

	public function ubah_penawaran_mhs($nim)
	{
		$nama_mhs 	= $this->db->get_where('pengguna', ['nim' => $nim])->row()->nama_lengkap;
		$dt 		= $this->penawaran->getDataPenawaranByNim($nim)->row();
		$matakuliah = $this->penawaran->getMatakuliah($nim);
		$thn_akademik = ['2019/2020', '2020/2021', '2021/2022', '2022/2023'];

		$data = [	'title'		=> 'Detail penawaran',
					'data'		=> $dt,
					'nama_mhs'	=> $nama_mhs,
					'matakuliah' => $matakuliah,
					'thn_akademik' => $thn_akademik,
					'isi'		=> 'dosen/ubah_penawaran_mhs'
				];	
		$this->load->view('dosen/layout/wrapper', $data, FALSE);
	}

	public function update_penawaran_mhs()
	{
		cek_ajax();

		$nim = $this->input->post('nim');

		$data = [
			'komentar_pa' => $this->input->post('komenter_pa'),
			'jml_sks'	  => $this->input->post('jumlah_sks'),
			'ip_smt_lalu' => $this->input->post('ip_smt_lalu'),
			'semester' 	  => $this->input->post('semester'),
			'thn_akademik' => $this->input->post('thn_akademik'),
			'status'	  => 1,
		];

		$this->db->set($data)
				->where('nim', $nim)
				->update('penawaran_mhs');

		// delete data yang ada
		$this->db->delete('penawaran_mk_mhs', ['nim' => $nim]);

		$nama_matakuliah = $this->input->post('nama_matakuliah');

		$result = [];

		foreach ($nama_matakuliah as $key => $nama_mk) {
			$result[] = [
				'nim'	=> $nim,
				'nama_matakuliah' => $nama_mk
			];
		}

		$this->db->insert_batch('penawaran_mk_mhs', $result);


		$msg = [
			'status' => true,
			'pesan'	 => 'data berhasil di update',
			'url'    => base_url('dosen/ruang_pa'),
		];

		echo $this->output_json($msg);

	}

	public function filter_penawaran()
	{
		$thn_akademik 	= $this->input->get('thn_akademik');
		$semester		= $this->input->get('semester');
		
		$data['ket']	= 'Filter data Tahun Akademik <b>'. $thn_akademik .'</b> Semester <b>'.$semester.'</b>';
		$data['result']	= $this->penawaran->getDataFilter($thn_akademik, $semester);
		$data['title']	= 'Dosen - Filter data';
		$data['isi']	= 'dosen/filter_data';

		$this->load->view('dosen/layout/wrapper', $data, FALSE);

	}

}

