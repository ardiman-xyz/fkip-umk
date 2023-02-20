<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

    public function __construct()
	{
      parent::__construct();
      $this->simple_login->cek_login_admin();
		  $this->load->model('galeri_model', 'galeri');
	}

	public function index()
	{
        $foto = $this->galeri->getAllFoto();
		
        $data = [	'title'		=> 'Galeri foto',
                    'foto'      => $foto,
                    'isi'		=> 'admin/galeri/list' ];
                    
		$this->load->view('admin/layout/wrapper', $data, FALSE);
    }
    

    public function tambah()
    {

    $this->form_validation->set_rules('judul_foto', 'Judul foto', 'required|trim',[
			'required' => '%s harus di isi']);
		$this->form_validation->set_rules('posisi_foto', 'Pilih posisi foto', 'required|trim',
			['required' => '%s harus di isi']);
		$this->form_validation->set_rules('status_foto', 'Pilih Status foto', 'required|trim',
            ['required' => '%s harus di isi']);

		if ($this->form_validation->run()) {

		$config['upload_path'] 		= './assets/img/galeri/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_size']  		= '3400';
		$config['max_width']  		= '3024';
		$config['max_height']  		= '3024';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('foto')){
			
			$data = array(	'title'	 	=> 'Tambah dosen',
							'errors'	=> $this->upload->display_errors(),
							'isi'		=> 'admin/dosen/tambah');

			$this->load->view('admin/layout/wrapper', $data, FALSE);

			}else{
			// masuk database

			$upload_foto = array('upload_data' => $this->upload->data());
			// CREATE THUMBNAIL GAMBAR
			$config['image_library'] 	= 'gd2';
            $config['source_image'] 	= './assets/img/galeri/'.$upload_foto['upload_data']['file_name'];
            $config['new_image'] 	    = './assets/img/galeri/thumbs/'.$upload_foto['upload_data']['file_name'];
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio']	= TRUE;
// 			$config['width']         	= 2000; //pixel
			$config['height']       	= 820; //pixel
			$config['thumb_marker']		= '';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();

			$data = [	'judul_foto'		=> $this->input->post('judul_foto'),
                        'posisi_foto'		=> $this->input->post('posisi_foto'),
                        'foto'		        => $upload_foto['upload_data']['file_name'],
                        'status'		    => $this->input->post('status_foto')
                    ];
						

			$this->galeri->tambah($data);

			$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><strong>sukses ! </strong> foto berhasil di tambah ! <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/galeri');
		}}

        $data = [	'title'		=> 'Tambah foto',
                    'isi'		=> 'admin/galeri/tambah' ];
                    
		$this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function ubah($id_galeri)
	{
        $foto = $this->galeri->get_by_id($id_galeri);

        $this->form_validation->set_rules('judul_foto', 'Judul foto', 'required|trim',[
    			'required' => '%s harus di isi']);
    		$this->form_validation->set_rules('posisi_foto', 'Pilih posisi foto', 'required|trim',
    			['required' => '%s harus di isi']);
    		$this->form_validation->set_rules('status_foto', 'Pilih Status foto', 'required|trim',
                ['required' => '%s harus di isi']);
            
        
        if ($this->form_validation->run()) {
            if(!empty($_FILES['foto']['name'])){
                $config['upload_path'] 		= './assets/img/galeri/';
                $config['allowed_types'] 	= 'gif|jpg|png|jpeg';
                $config['max_size']  		= '3400';
                $config['max_width']  		= '3024';
                $config['max_height']  		= '3024';
           
           $this->load->library('upload', $config);
           if ( ! $this->upload->do_upload('foto')){
           
           $data = array(  'title'	 	=> 'Edit Foto',
                           'foto'	    => $foto,
                           'errors'	    => $this->upload->display_errors(),
                           'isi'		=> 'admin/galeri/edit');

           $this->load->view('admin/layout/wrapper', $data, FALSE);

           }else{
           // masuk database

           $upload_foto = array('upload_data' => $this->upload->data());
           // CREATE THUMBNAIL GAMBAR
           $config['image_library'] 	= 'gd2';
           $config['source_image'] 	    = './assets/img/galeri/'.$upload_foto['upload_data']['file_name'];
           $config['new_image'] 	    = './assets/img/galeri/thumbs/'.$upload_foto['upload_data']['file_name'];
           $config['create_thumb'] 	    = TRUE;
           $config['maintain_ratio']	= TRUE;
           $config['width']         	= 250; //pixel
           $config['height']       	    = 250; //pixel
           $config['thumb_marker']		= '';

           $this->load->library('image_lib', $config);

           $this->image_lib->resize();

           if ($foto->foto !="") {
               unlink('assets/img/galeri/'.$foto->foto);
               unlink('assets/img/galeri/thumbs/'.$foto->foto);
           }

           $data = [	'id_galeri'         => $id_galeri,
                        'judul_foto'		=> $this->input->post('judul_foto'),
                        'posisi_foto'		=> $this->input->post('posisi_foto'),
                        'foto'		        => $upload_foto['upload_data']['file_name'],
                        'status'		    => $this->input->post('status_foto')
                    ];


           $this->galeri->edit($data);
           $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><strong>sukses ! </strong> Foto berhasil di update ! <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span aria-hidden="true">&times;</span></button></div>');
           redirect('admin/galeri');

       }} else {

           // proses edit tanpa mengganti gambar/foto

           $data = [	'id_galeri'     => $id_galeri,
                        'judul_foto'	=> $this->input->post('judul_foto'),
                        'posisi_foto'	=> $this->input->post('posisi_foto'),
                        // 'foto'	        => $upload_foto['upload_data']['file_name']
                        'status'		=> $this->input->post('status_foto')
                    ];


           $this->galeri->edit($data);
           $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><strong>sukses ! </strong> Foto berhasil di update ! <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span aria-hidden="true">&times;</span></button></div>');
           redirect('admin/galeri');
       }}

		
       $data = array(   'title'	 	=> 'Edit Foto',
                        'foto'	    => $foto,
                        'isi'		=> 'admin/galeri/edit');

        $this->load->view('admin/layout/wrapper', $data, FALSE);

    }


    public function hapus($id_galeri)
	{
        $foto = $this->galeri->get_by_id($id_galeri);
        
        unlink('./assets/img/galeri/'.$foto->foto);
        unlink('./assets/img/galeri/thumbs/'.$foto->foto);

		$data = ['id_galeri'	=> $id_galeri];

		$this->galeri->delete($data);
		$this->session->set_flashdata('sukses', ' di hapus');
		redirect('admin/galeri');
	}






}
