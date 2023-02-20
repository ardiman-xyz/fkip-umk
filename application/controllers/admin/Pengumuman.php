<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->simple_login->cek_login_admin();
		$this->load->model('pengumuman_model', 'pengumuman');

	}

	public function index()
	{
        $pengumuman = $this->pengumuman->getPengumumanAll();

		$data = [	'title'		=> 'List Pengumuman',
					'pengumuman'=> $pengumuman,
                    'isi'		=> 'admin/pengumuman/list' ];
                    
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


	public function tambah()
	{
		$akhir 		= $this->pengumuman->akhir();

		$this->form_validation->set_rules('judul', 'Judul Pengumuman', 'required|trim',
			['required' => '%s harus di isi']);
		$this->form_validation->set_rules('isi', 'isi', 'required|trim',
			['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('status_pengumuman', 'Status', 'required|trim',
			['required' => '%s tidak boleh kosong']);
			
		if ($this->form_validation->run()) {

			$config['upload_path'] 		= './assets/img/pengumuman/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400';
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('foto')){
				
				$data = array(	'title'	 	=> 'Tambah Berita',
								'errors'	=> $this->upload->display_errors(),
								'isi'		=> 'admin/pengumuman/tambah');
	
				$this->load->view('admin/layout/wrapper', $data, FALSE);
	
				}else{
				// masuk database
	
				$upload_foto = array('upload_data' => $this->upload->data());
				// CREATE THUMBNAIL GAMBAR
				$config['image_library'] 	= 'gd2';
				$config['source_image'] 	= './assets/img/pengumuman/'.$upload_foto['upload_data']['file_name'];
				$config['new_image'] 	    = './assets/img/pengumuman/thumbs/'.$upload_foto['upload_data']['file_name'];
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio']	= TRUE;
				$config['width']         	= 2000; //pixel
				$config['height']       	= 2000; //pixel
				$config['thumb_marker']		= '';
	
				$this->load->library('image_lib', $config);
	
				$this->image_lib->resize();
				
				$url_akhir 	= $akhir->id_berita + 1;
				$slug 		= $url_akhir.'-'.url_title($this->input->post('judul'), 'dash', TRUE);
	
				$data = [	'id_user'			=> $this->session->userdata('id_user'),
							'slug_pengumuman'	=> $slug,
							'judul'	    		=> $this->input->post('judul'),
							'isi_pengumuman'	=> $this->input->post('isi'),
							'jenis_pengumuman'	=> $this->input->post('jenis_pengumuman'),
							'status'			=> $this->input->post('status_pengumuman'),
							'gambar'			=> $upload_foto['upload_data']['file_name'],
							'tanggal'	        => date('Y-m-d, H:m')];
							
	
				$this->pengumuman->tambah($data);
	
				$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><strong>sukses ! </strong> Data Pengumuman berhasil di tambah ! <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span aria-hidden="true">&times;</span></button></div>');
				redirect('admin/pengumuman');
			}}
	
	
			$data = [	'title'		=> 'Tambah Pengumuman',
						'isi'		=> 'admin/pengumuman/tambah' ];
			$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


	public function edit($id_pengumuman)
	{

		$pengumuman = $this->pengumuman->getById($id_pengumuman);
		$akhir 		= $this->pengumuman->akhir();

		$this->form_validation->set_rules('judul', 'Judul Berita', 'required|trim',
			['required' => '%s harus di isi']);
		$this->form_validation->set_rules('isi', 'isi', 'required|trim',
			['required' => '%s tidak boleh kosong']);
	
		if ($this->form_validation->run()) {
			if(!empty($_FILES['foto']['name'])){
				$config['upload_path'] 		= './assets/img/pengumuman/';
				$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
				$config['max_size']  		= '3400';
				$config['max_width']  		= '3024';
				$config['max_height']  		= '3024';
			
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('foto')){


			$data = [	'title'		=> 'Edit pengumuman',
						'pengumuman'=> $pengumuman,
						'errors'	=> $this->upload->display_errors(),
						'isi'		=> 'admin/pengumuman/edit' ];
			$this->load->view('admin/layout/wrapper', $data, FALSE);

		}else{

			// masuk database

			$upload_foto = array('upload_data' => $this->upload->data());
			// CREATE THUMBNAIL GAMBAR
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './assets/img/pengumuman/'.$upload_foto['upload_data']['file_name'];
			$config['new_image'] 	    = './assets/img/pengumuman/thumbs/'.$upload_foto['upload_data']['file_name'];
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio']	= TRUE;
			$config['width']         	= 2000; //pixel
			$config['height']       	= 2000; //pixel
			$config['thumb_marker']		= '';
 
			$this->load->library('image_lib', $config);
 
			$this->image_lib->resize();
 
			if ($pengumuman->gambar !="") {
				unlink('assets/img/pengumuman/'.$pengumuman->gambar);
				unlink('assets/img/pengumuman/thumbs/'.$pengumuman->gambar);
			}

			$url_akhir 	= $akhir->id_pengumuman + 1;
			$slug 		= $url_akhir.'-'.url_title($this->input->post('judul'), 'dash', TRUE);

			$data = [	'id_pengumuman'		=> $id_pengumuman,
						'id_user'			=> $this->session->userdata('id_user'),
						'slug_pengumuman'	=> $slug,
						'judul'	    		=> $this->input->post('judul'),
						'isi_pengumuman'	=> $this->input->post('isi'),
						'jenis_pengumuman'	=> $this->input->post('jenis_pengumuman'),
						'status'			=> $this->input->post('status_pengumuman'),
						'gambar'			=> $upload_foto['upload_data']['file_name'],
						'tanggal'	        => date('Y-m-d, H:m')];
		
 
 
			$this->pengumuman->edit($data);
			$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><strong>sukses ! </strong> pengumuman berhasil di update ! <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/pengumuman');
 
		}} else {
 
			// proses edit tanpa mengganti gambar/foto
			$url_akhir 	= $akhir->id_pengumuman + 1;
			$slug 		= $url_akhir.'-'.url_title($this->input->post('judul'), 'dash', TRUE);

 
			$data = [	'id_pengumuman'		=> $id_pengumuman,
						'id_user'			=> $this->session->userdata('id_user'),
						'slug_pengumuman'	=> $slug,
						'judul'	    		=> $this->input->post('judul'),
						'isi_pengumuman'	=> $this->input->post('isi'),
						'jenis_pengumuman'	=> $this->input->post('jenis_pengumuman'),
						'status'			=> $this->input->post('status_pengumuman'),
						// 'gambar'			=> $upload_foto['upload_data']['file_name'],
						'tanggal'	        => date('Y-m-d, H:m')];
		
			
 
 
 
			$this->pengumuman->edit($data);
			$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><strong>sukses ! </strong> pengumuman berhasil di update ! <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/pengumuman');
		}}
 
		 
		$data = [  'title'		=> 'Edit pengumuman',
					'pengumuman'=> $pengumuman,
					'isi'		=> 'admin/pengumuman/edit'];
 
		 $this->load->view('admin/layout/wrapper', $data, FALSE);

	}

	
	public function hapus($id_pengumuman)
	{
		$pengumuman = $this->pengumuman->getById($id_pengumuman);
        
        unlink('./assets/img/pengumuman/'.$pengumuman->gambar);
        unlink('./assets/img/pengumuman/thumbs/'.$pengumuman->gambar);

		$data = ['id_pengumuman'	=> $id_pengumuman];

		$this->pengumuman->delete($data);
		$this->session->set_flashdata('sukses', ' di hapus');
		redirect('admin/pengumuman');
	}







}
