<?php

class Info extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model', 'konfigurasi');

	}

    public function rpl(){
        
		$data['title'] 		= 'Informasi RPL';
		$data['isi'] 		= 'rpl';
        
       $this->load->view('layout/wrapper', $data, FALSE);
    } 
    
}