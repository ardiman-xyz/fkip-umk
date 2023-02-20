<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_berita extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        $this->simple_login->cek_login_admin();
		$this->load->model('kategori_model', 'kategori');
	}

	public function index()
	{

        $kategori = $this->kategori->getAllKategori();

        $data = [	'title'		=> 'Kategori Berita',
                    'kategori'  => $kategori,
                    'isi'		=> 'admin/kategori_berita/list' ];
                    
		$this->load->view('admin/layout/wrapper', $data, FALSE);
    }
    

    public function tambah()
    {

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|trim',
			['required' => '%s harus di isi']);
		$this->form_validation->set_rules('slug_kategori_berita', 'Slug Kategori', 'required|trim',
            ['required' => '%s harus di isi']);
        $this->form_validation->set_rules('urutan', 'Urutan', 'required|trim',
        ['required' => '%s harus di isi']);

        if ($this->form_validation->run() === FALSE) {

			$data = array(	'title' => 'Tambah Kategori Berita',
                            'isi'	=> 'admin/kategori_berita/tambah');
                            
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        
		}else{
            // masuk data base
            
            $slug = url_title($this->input->post('slug_kategori_berita'), 'dash', TRUE);

			$data = [   'nama_kategori'	        => $this->input->post('nama_kategori'),
                        'slug_kategori_berita'	=> $slug,
                        'urutan'	            => $this->input->post('urutan')
                ];

			$this->kategori->tambah($data);
			$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><strong>sukses ! </strong> Data kategori berita berhasil di tambah ! <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span aria-hidden="true">&times;</span></button></div>');

			redirect(base_url('admin/kategori_berita'));
		}
    }


    public function edit($id_kategori_berita)
    {
        $kategori = $this->kategori->getById($id_kategori_berita);

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|trim',
			['required' => '%s harus di isi']);
		$this->form_validation->set_rules('slug_kategori_berita', 'Slug Kategori', 'required|trim',
            ['required' => '%s harus di isi']);
        $this->form_validation->set_rules('urutan', 'Urutan', 'required|trim',
        ['required' => '%s harus di isi']);

        if ($this->form_validation->run() === FALSE) {

        $data = [	'title'		=> 'Edit kategori Berita',
                    'kategori'  => $kategori,
                    'isi'		=> 'admin/kategori_berita/edit' ];

        $this->load->view('admin/layout/wrapper', $data, FALSE);

        }else{

            $slug = url_title($this->input->post('slug_kategori_berita'), 'dash', TRUE);

			$data = [   'id_kategori_berita'    => $id_kategori_berita,
                        'nama_kategori'	        => $this->input->post('nama_kategori'),
                        'slug_kategori_berita'	=> $slug,
                        'urutan'	            => $this->input->post('urutan')
                ];

			$this->kategori->edit($data);
			$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><strong>sukses ! </strong> Data kategori berita berhasil di update ! <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span aria-hidden="true">&times;</span></button></div>');

			redirect(base_url('admin/kategori_berita'));
        }            
    }


    public function hapus($id_kategori_berita)
	{

        $data = ['id_kategori_berita' => $id_kategori_berita];

		$this->kategori->delete($data);
		$this->session->set_flashdata('sukses', ' di hapus');
		redirect('admin/kategori_berita');
	}






}
