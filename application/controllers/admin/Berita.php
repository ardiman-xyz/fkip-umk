<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->simple_login->cek_login_admin();
		$this->load->model('berita_model', 'berita');
		$this->load->model('kategori_model', 'kategori');

	}

	public function index()
	{
		$berita = $this->berita->getAllBerita();

		$data = [	'title'		=> 'Admin - List Berita',
					'berita'	=> $berita,
                    'isi'		=> 'admin/berita/list' ];
                    
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


	public function tambah()
	{
		$kategori 	= $this->kategori->getAllKategori();
		$akhir 		= $this->berita->akhir();

		$this->form_validation->set_rules('judul', 'Judul Berita', 'required|trim',
			['required' => '%s harus di isi']);
		$this->form_validation->set_rules('isi', 'isi', 'required|trim',
			['required' => '%s tidak boleh kosong']);
		
			
		if ($this->form_validation->run()) {

			$config['upload_path'] 		= './assets/img/berita/';
			$config['allowed_types']    = 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400';
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('foto')){
				
				$data = array(	'title'	 	=> 'Tambah Berita',
								'kategori'	=> $kategori,
								'errors'	=> $this->upload->display_errors(),
								'isi'		=> 'admin/berita/tambah');
	
				$this->load->view('admin/layout/wrapper', $data, FALSE);
	
				}else{
				// masuk database
	
				$upload_foto = array('upload_data' => $this->upload->data());
				// CREATE THUMBNAIL GAMBAR
				$config['image_library'] 	= 'gd2';
				$config['source_image'] 	= './assets/img/berita/'.$upload_foto['upload_data']['file_name'];
				$config['new_image'] 	    = './assets/img/berita/thumbs/'.$upload_foto['upload_data']['file_name'];
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
							'id_kategori_berita'=> $this->input->post('kategori_berita'),
							'slug_berita'		=> $slug,
							'judul'	    		=> $this->input->post('judul'),
							'isi'	    		=> $this->input->post('isi'),
							'status_berita'	    => $this->input->post('status_berita'),
							'jenis_berita'	    => $this->input->post('jenis_berita'),
							'gambar'			=> $upload_foto['upload_data']['file_name'],
							'tanggal'	        => date('Y-m-d')];
							
	
				$this->berita->tambah($data);
	
				$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><strong>sukses ! </strong> Data Berita berhasil di tambah ! <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span aria-hidden="true">&times;</span></button></div>');
				redirect('admin/berita');
			}}
	
	
			$data = [	'title'		=> 'Admin - Tambah Berita',
						'kategori'	=> $kategori,
						'isi'		=> 'admin/berita/tambah' ];
			$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


	public function edit($id_berita)
	{

		$berita 	= $this->berita->getById($id_berita);
		$kategori 	= $this->kategori->getAllKategori();
		$akhir 		= $this->berita->akhir();

		$this->form_validation->set_rules('judul', 'Judul Berita', 'required|trim',
			['required' => '%s harus di isi']);
		$this->form_validation->set_rules('isi', 'isi', 'required|trim',
			['required' => '%s tidak boleh kosong']);
	
		if ($this->form_validation->run()) {
			if(!empty($_FILES['foto']['name'])){
				$config['upload_path'] 		= './assets/img/berita/';
				$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
				$config['max_size']  		= '3400';
				$config['max_width']  		= '3024';
				$config['max_height']  		= '3024';
			
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('foto')){


			$data = [	'title'		=> 'Edit Berita',
						'kategori'	=> $kategori,
						'berita'	=> $berita,
						'errors'	=> $this->upload->display_errors(),
						'isi'		=> 'admin/berita/edit' ];
			$this->load->view('admin/layout/wrapper', $data, FALSE);

		}else{

			// masuk database

			$upload_foto = array('upload_data' => $this->upload->data());
			// CREATE THUMBNAIL GAMBAR
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './assets/img/berita/'.$upload_foto['upload_data']['file_name'];
			$config['new_image'] 	    = './assets/img/berita/thumbs/'.$upload_foto['upload_data']['file_name'];
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio']	= TRUE;
			$config['width']         	= 2000; //pixel
			$config['height']       	= 2000; //pixel
			$config['thumb_marker']		= '';
 
			$this->load->library('image_lib', $config);
 
			$this->image_lib->resize();
 
			if ($berita->gambar !="") {
				unlink('assets/img/berita/'.$berita->gambar);
				unlink('assets/img/berita/thumbs/'.$berita->gambar);
			}

			$url_akhir 	= $akhir->id_berita + 1;
			$slug 		= $url_akhir.'-'.url_title($this->input->post('judul'), 'dash', TRUE);

			$data = [	'id_berita'			=> $id_berita,
						'id_user'			=> 1,
						'id_kategori_berita'=> $this->input->post('kategori_berita'),
						'slug_berita'		=> $slug,
						'judul'	    		=> $this->input->post('judul'),
						'isi'	    		=> $this->input->post('isi'),
						'status_berita'	    => $this->input->post('status_berita'),
						'jenis_berita'	    => $this->input->post('jenis_berita'),
						'gambar'			=> $upload_foto['upload_data']['file_name'],
						'tanggal'	        => date('Y-m-d')];
			
 
 
			$this->berita->edit($data);
			$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><strong>sukses ! </strong> Berita berhasil di update ! <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/berita');
 
		}} else {
 
			// proses edit tanpa mengganti gambar/foto
			$url_akhir 	= $akhir->id_berita + 1;
			$slug 		= $url_akhir.'-'.url_title($this->input->post('judul'), 'dash', TRUE);

 
			$data = [	'id_berita'			=> $id_berita,
						'id_user'			=> 1,
						'id_kategori_berita'=> $this->input->post('kategori_berita'),
						'slug_berita'		=> $slug,
						'judul'	    		=> $this->input->post('judul'),
						'isi'	    		=> $this->input->post('isi'),
						'status_berita'	    => $this->input->post('status_berita'),
						'jenis_berita'	    => $this->input->post('jenis_berita'),
						// 'gambar'			=> $upload_foto['upload_data']['file_name'],
						'tanggal'	        => date('Y-m-d')];
			
 
 
 
			$this->berita->edit($data);
			$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><strong>sukses ! </strong> Berita berhasil di update ! <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/berita');
		}}
 
		 
		$data = [  'title'		=> 'Admin - Edit Berita',
					'kategori'	=> $kategori,
					'berita'	=> $berita,
					'isi'		=> 'admin/berita/edit'];
 
		 $this->load->view('admin/layout/wrapper', $data, FALSE);

	}

	
	public function hapus($id_berita)
	{
		$berita = $this->berita->getById($id_berita);
        
        unlink('./assets/img/berita/'.$berita->gambar);
        unlink('./assets/img/berita/thumbs/'.$berita->gambar);

		$data = ['id_berita'	=> $id_berita];

		$this->berita->delete($data);
		$this->session->set_flashdata('sukses', ' di hapus');
		redirect('admin/berita');
	}







}
