<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Raw extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model', 'konfigurasi');
		$this->load->model('fakultas_model', 'fakultas');
		$this->load->model('tendik_model', 'tendik');
		$this->load->model('prodi_model', 'prodi');
	}

	public function index()
	{
		$data['raw']	= $this->fakultas->getDataRaw();
		$data['title']	= 'Fakultas - Realisasi Anggaran Wisuda';
        $data['isi']	= 'fakultas/raw';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function cetak_raw($id_raw)
	{
		$data['config']		= $this->tendik->getDataConfigRaw();
		$data['data']		= $this->fakultas->getDataRawDetail($id_raw);
		$data['pengelola'] 	= $this->tendik->getJmlPengelolaRaw($id_raw);

		$this->load->view('fakultas/cetak_raw', $data, false);
	}

}

/* End of file Raw.php */
/* Location: ./application/controllers/fakultas/Raw.php */