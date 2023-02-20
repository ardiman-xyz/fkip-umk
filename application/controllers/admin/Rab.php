<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rab extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('rab_model', 'rab');
		$this->simple_login->cek_login_admin();
	}

	public function index()
	{
		$data['title']	= 'List RAB';
        $data['isi']	= 'admin/rab/rab';
                    
		$this->load->view('admin/layout/wrapper', $data, FALSE);

	}

	public function config()
	{
		$data['rab'] = $this->rab->getRab();
		$data['title']	= 'Configurasi RAB';
        $data['isi']	= 'admin/rab/config_rab';
                    
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

}
