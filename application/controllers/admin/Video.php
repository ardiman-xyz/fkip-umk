<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->simple_login->cek_login_admin();
		$this->load->model('video_model', 'video');
	}

	public function index()
	{
        $video = $this->video->getAllvideo();
		
        $data = [	'title'		=> 'Galeri video',
                    'video'     => $video,
                    'isi'		=> 'admin/video/list' ];
                    
		$this->load->view('admin/layout/wrapper', $data, FALSE);
    }


    public function tambah()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim',[
			'required' => '%s harus di isi']);
		$this->form_validation->set_rules('posisi', 'Posisi', 'required|trim',
			['required' => '%s harus di isi']);
		$this->form_validation->set_rules('video', 'link video', 'required|trim',
			['required' => '%s harus di isi']);
		$this->form_validation->set_rules('status', 'Status', 'required|trim',
			['required' => '%s harus di isi']);

		if ($this->form_validation->run() == false ) {

			$data = [	'title'		=> 'Tambah video',
						'isi'		=> 'admin/video/tambah' ];

			$this->load->view('admin/layout/wrapper', $data, FALSE);

		} else{

			$data = [
				'judul'		    => htmlspecialchars($this->input->post('judul')),
				'keterangan'	=> htmlspecialchars($this->input->post('keterangan')),
				'posisi'		=> $this->input->post('posisi'),
				'video'		    => $this->input->post('video'),
				'status'	    => $this->input->post('status'),
				'tanggal'	    => date('Y-m-d')
			];

			$this->video->tambah($data);
			$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><strong>sukses ! </strong> Data video berhasil di tambah ! <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/video');

		}
    }


	public function edit($id_video)
	{
		$video = $this->video->getById($id_video);

		$this->form_validation->set_rules('judul', 'Judul', 'required|trim',[
			'required' => '%s harus di isi']);
		$this->form_validation->set_rules('posisi', 'Posisi', 'required|trim',
			['required' => '%s harus di isi']);
		$this->form_validation->set_rules('video', 'link video', 'required|trim',
			['required' => '%s harus di isi']);
		$this->form_validation->set_rules('status', 'Status', 'required|trim',
			['required' => '%s harus di isi']);

		if ($this->form_validation->run() == false ) {

			$data = [	'title'		=> 'edit video | '.$video->judul,
						'video'		=> $video,
						'isi'		=> 'admin/video/edit' ];

			$this->load->view('admin/layout/wrapper', $data, FALSE);
	
		}else{

			$data = [	'id_video'		=> $id_video,
						'judul'		    => htmlspecialchars($this->input->post('judul')),
						'keterangan'	=> htmlspecialchars($this->input->post('keterangan')),
						'posisi'		=> $this->input->post('posisi'),
						'video'		    => $this->input->post('video'),
						'status'	    => $this->input->post('status'),
						'tanggal'	    => date('Y-m-d')
					];

			$this->video->edit($data);
			$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><strong>sukses ! </strong> Data video berhasil di ubah ! <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/video');	
		}
	}

	public function hapus($id_video)
	{
		$data = ['id_video'	=> $id_video];

		$this->video->delete($data);
		$this->session->set_flashdata('sukses', ' di hapus');
		redirect('admin/video');
	}


}
    