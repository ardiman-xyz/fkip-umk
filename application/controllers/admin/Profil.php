<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('profil_model', 'profil');
		$this->load->model('prodi_model', 'prodi');
		$this->simple_login->cek_login_admin();
	}

	public function output_json($data, $encode = true)
	{
	    if ($encode) $data = json_encode($data);
	    $this->output->set_content_type('application/json')->set_output($data);
	}


	public function index()
	{
		$data['profil'] = $this->profil->getData();
		$data['title'] 	= 'Profil Page';
		$data['isi']	= 'admin/profil/list';
                    
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function update_profil()
	{
		cek_ajax();

		$id = $this->input->post('id_profile');

		$profil = $this->profil->getDataId($id);

			
			if (!empty($_FILES['struktur_organisasi']['name'])) {
				$config['upload_path'] 		= './assets/img/profil/';
				$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
				$config['max_size']  		= '3400';
				
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('struktur_organisasi')) {
					 $pesan = [
		              'status' => false,
		              'pesan'  => $this->upload->display_errors() 
		            ];
		           $this->output_json($pesan);   
				} else {
					// masuk database
					if ($profil->struktur_organisasi != '') {
						  unlink('assets/img/profil/'.$profil->struktur_organisasi);
					}

					$upload_foto = ['upload_data' => $this->upload->data()];

					$data['id'] 					= $id;
					$data['sejarah'] 				= $this->input->post('sejarah');
					$data['visi_misi']				= $this->input->post('visi_misi');
					$data['struktur_organisasi']	= $upload_foto['upload_data']['file_name'];

					$update = $this->db->update('profil', $data);

					$pesan = [
		              'status' => true,
		              'pesan'  => "Data berhasil di update"
		            ];
		           $this->output_json($pesan); 
				}

			}else{
				
				$data['id'] 					= $id;
				$data['sejarah'] 				= $this->input->post('sejarah');
				$data['visi_misi']				= $this->input->post('visi_misi');

				$update = $this->db->update('profil', $data);

				$pesan = [
	              'status' => true,
	              'pesan'  => "Data berhasil di update"
	            ];
	           $this->output_json($pesan); 
			}
	}

	public function pendidikan()
	{
		// $data['pimpinan']	= $this->profil->getDataPimpinan();
		$data['title'] 		= 'Admin - pendidikan';
		$data['isi']		= 'admin/profil/pendidikan';

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function pimpinan()
	{
		$data['pimpinan']	= $this->profil->getDataPimpinan();
		$data['title'] 		= 'Pimpinan Page';
		$data['isi']		= 'admin/profil/pimpinan';

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function kemahasiswaan()
	{
		// $data['pimpinan']	= $this->profil->getDataPimpinan();
		$data['title'] 		= 'Kemahasiswaan';
		$data['isi']		= 'admin/profil/kemahasiswaan';

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function fasilitas()
	{
		$data['fasilitas']	= $this->db->get('fasilitas')->result();
		$data['title'] 		= 'Fasilitas';
		$data['isi']		= 'admin/profil/fasilitas';

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah_fasilitas()
	{
		$data['title'] 		= 'Tambah Fasilitas';
		$data['isi']		= 'admin/profil/tambah_fasilitas';

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function store_fasilitas()
	{
		$config['upload_path'] 		= './assets/upload/fasilitas/';
		$config['allowed_types'] 	= 'jpg|jpeg|png';
		$config['max_size']  		= '2400'; //max besar file 2 mb

		$this->load->library('upload', $config);

		if (!empty($_FILES['foto'])) {
			$this->upload->do_upload('foto');
			$data1 = $this->upload->data();
			$file1 = $data1['file_name'];

			$data['judul'] = $this->input->post('judul');
			$data['foto'] = $file1;

			$this->db->insert('fasilitas', $data);
		}
	}

	public function tendik()
	{
		$data['tendik']	= $this->db->get('tendik')->result();
		$data['title'] 	= 'Tendik';
		$data['isi']	= 'admin/profil/tendik';

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah_tendik()
	{
		$data['prodi']		= $this->prodi->getAllProdi();
		$data['title'] 		= 'Tambah Tendik';
		$data['isi']		= 'admin/profil/tambah_tendik';

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function simpan_tendik()
	{
		cek_ajax();

		if (!empty($_FILES['foto_tendik']['name'])) {

			$config['upload_path'] 		= './assets/upload/tendik/';
			$config['allowed_types'] 	= 'jpg|jpeg|png';
			$config['max_size']  		= '2400'; //max besar file 2 mb

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('foto_tendik')){

            $pesan = [
              'status' => false,
              'pesan'  => $this->upload->display_errors() 
            ];

            $this->output_json($pesan);
	            
	          }else{
	          	$data['id_prodi']		= $this->input->post('id_prodi');
				$data['nama'] 			= $this->input->post('nama_tendik');
				$data['nik'] 			= $this->input->post('nik');
				$data['jabatan'] 		= $this->input->post('jabatan');
				$data['jenis_kelamin'] 	= $this->input->post('jenis_kelamin');
				$data['email'] 			= $this->input->post('email');
				$data['foto'] 			= $_FILES['foto_tendik']['name'];

				$this->db->insert('tendik', $data);

				$pesan = [
	              'status' => true,
	              'pesan'  => 'tendik berhasil di insert'
	            ];

	            $this->output_json($pesan);
				
			}
		}
	}

	public function edit_tendik($id)
	{
		$tendik = $this->db->get_where('tendik', ['id' => $id])->row();

		$data['prodi']		= $this->prodi->getAllProdi();
		$data['tendik']		= $tendik;
		$data['title'] 		= 'Edit Tendik';
		$data['isi']		= 'admin/profil/edit_tendik';

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function update_tendik()
	{
		cek_ajax();

		$id = $this->input->post('id');
		$tendik = $this->db->get_where('tendik', ['id' => $id])->row();

		if (!empty($_FILES['foto_tendik']['name'])) {

			$config['upload_path'] 		= './assets/upload/tendik/';
			$config['allowed_types'] 	= 'jpg|jpeg|png';
			$config['max_size']  		= '2400'; //max besar file 2 mb

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('foto_tendik')){

            $pesan = [
              'status' => false,
              'pesan'  => $this->upload->display_errors() 
            ];

            $this->output_json($pesan);
	            
	         }else{

	         	// cek apaka ada foto, kalau ada kita hapus yang di folder
	         	if ($tendik->foto != '') {
	         		unlink('./assets/upload/tendik/'.$tendik->foto);
	         	}

	          	$data['id_prodi']		= $this->input->post('id_prodi');
				$data['nama'] 			= $this->input->post('nama_tendik');
				$data['nik'] 			= $this->input->post('nik');
				$data['jabatan'] 		= $this->input->post('jabatan');
				$data['jenis_kelamin'] 	= $this->input->post('jenis_kelamin');
				$data['email'] 			= $this->input->post('email');
				$data['foto'] 			= $_FILES['foto_tendik']['name'];

				$this->db->where('id', $id)
				->update('tendik', $data);

				$pesan = [
	              'status' => true,
	              'pesan'  => 'tendik berhasil di update dengan gambar'
	            ];

	            $this->output_json($pesan);
				
			}
		}else{

			// upload tanpa gambar

			$data['id_prodi']		= $this->input->post('id_prodi');
			$data['nama'] 			= $this->input->post('nama_tendik');
			$data['nik'] 			= $this->input->post('nik');
			$data['jabatan'] 		= $this->input->post('jabatan');
			$data['jenis_kelamin'] 	= $this->input->post('jenis_kelamin');
			$data['email'] 			= $this->input->post('email');

			$this->db->where('id', $id)
			->update('tendik', $data);

			$pesan = [
              'status' => true,
              'pesan'  => 'tendik berhasil di update tanpa gambar'
            ];

            $this->output_json($pesan);

		}
	}

	public function delete_tendik()
	{
		$id = $this->input->post('id');

		$file = $this->db->get_where('tendik', ['id' => $id])->row();

		if (!empty($file)) {
			unlink('./assets/upload/tendik/'.$file->foto);
		}

		$this->db->delete('tendik', ['id' => $id]);

		$pesan = [
          'status' => true,
          'pesan'  => 'tendik berhasil di hapus'
        ];

        $this->output_json($pesan);

	}

}

/* End of file Profil.php */
/* Location: ./application/controllers/admin/Profil.php */