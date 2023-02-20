<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model', 'konfigurasi');
		$this->load->model('fakultas_model', 'fakultas');
		$this->load->model('daftar_ujian_model', 'daftar_ujian');
		$this->load->model('prodi_model', 'prodi');
	}

	public function index()
	{
		$data['pendaftar'] 		= $this->fakultas->getDataPendaftar();
		$data['tahun']			= $this->daftar_ujian->option_tahun();
		$data['jenis_ujian'] 	= $this->daftar_ujian->getJenisUjian();
		$data['prodi']			= $this->prodi->getAllProdi();
		$data['title']			= 'Fakultas - Mahasiswa ujian';
        $data['isi']			= 'fakultas/mahasiswa_ujian';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);
	}

	public function filter_pendaftar()
	{		
		$this->simple_login->cek_login_fakultas();
// 		cek_post();

		// start
		$id_prodi 			= $this->input->get('prodi');
		$where 				= $this->input->get('jenis_ujian');
		$filter 			= $this->input->get('filter');
		$nama_jenis_ujian 	= $this->daftar_ujian->nama_jenis_ujian($where);
		$nama_prodi 		= $this->prodi->nama_jurusan($id_prodi);
		$data['nama_prodi'] = $nama_prodi;

		if ($filter == '4') {
			
            $tahun = $this->input->get('tahun');
            $status = 1;

            if ($where == 'semua') {
				
				// semua jenis ujian yang belum
				 $data['ket'] = "Data pendaftar semua jenis ujian, prodi <b>${nama_prodi}</b> yang <b> SUDAH UJIAN </b> Tahun <b>${tahun}</b>";
	           	$data['result'] = $this->fakultas->view_by_year_status($id_prodi, $tahun, '', $status);
	           	$url_cetak = 'fakultas/mahasiswa/cetak_filter?filter=4&prodi='.$id_prodi.'&jenis_ujian=all&tahun='.$tahun.'&status='.$status;

			}else{
				$data['ket'] = "Data pendaftar ujian <b>${nama_jenis_ujian}</b> prodi <b>${nama_prodi}</b> yang <b> SUDAH UJIAN </b> Tahun <b>${tahun}</b>";
		       	$data['result'] = $this->fakultas->view_by_year_status($id_prodi, $tahun, $where, $status);
		       	$url_cetak = 'fakultas/mahasiswa/cetak_filter?filter=4&prodi='.$id_prodi.'&tahun='.$tahun.'&jenis_ujian='.$where.'&status='.$status;
			}

		}else if($filter == '5'){
			$tahun = $this->input->get('tahun');
	        $status = 0;

			if ($where == 'semua') {
				
				// semua jenis ujian yang belum
				 $data['ket'] = "Data pendaftar semua jenis ujian, prodi <b>${nama_prodi}</b> yang <b> BELUM UJIAN </b> Tahun <b>${tahun}</b>";
	           	$data['result'] = $this->fakultas->view_by_year_status($id_prodi, $tahun, '', $status);
	           	$url_cetak = 'fakultas/mahasiswa/cetak_filter?filter=5&prodi='.$id_prodi.'&jenis_ujian=all&tahun='.$tahun.'&status='.$status;

			} else {

	            $data['ket'] = "Data pendaftar ujian <b>${nama_jenis_ujian}</b> prodi <b>${nama_prodi}</b> yang <b> BELUM UJIAN </b> Tahun <b>${tahun}</b>";
	           	$data['result'] = $this->fakultas->view_by_year_status($id_prodi, $tahun, $where, $status);
	           	$url_cetak = 'fakultas/mahasiswa/cetak_filter?filter=5&prodi='.$id_prodi.'&tahun='.$tahun.'&jenis_ujian='.$where.'&status='.$status;
			}
			


		}else if($filter == '0'){

            $data['ket'] = "Semua pendaftar <b>${nama_jenis_ujian}</b> prodi <b>${nama_prodi}</b></b>";
           	$data['result'] = $this->fakultas->get_all_pendaftar($id_prodi,$where);
           	$url_cetak = 'fakultas/mahasiswa/cetak_filter?filter=0&prodi='.$id_prodi.'&jenis_ujian='.$where;
		}

		$data['url_cetak']	= base_url($url_cetak);
		$data['title']		= 'Fakultas - Filter pendaftar ujian';
        $data['isi']		= 'fakultas/filter_pendaftar_ujian';

		$this->load->view('tendik/layout/wrapper', $data, FALSE);

		// end
	}


	public function cetak_filter()
	{
		$filter 	= $_GET['filter'];
		$where 		= $_GET['jenis_ujian'];
		$id_prodi 	= $_GET['prodi'];
		$nama_jenis_ujian = $this->fakultas->nama_jenis_ujian($where);
		$nama_prodi = $this->prodi->nama_jurusan($id_prodi);
		$data['nama_staff'] = $this->db->get_where('user', ['level' => $this->session->userdata('level')])->row()->nama_user;

		if ($filter == '4') {
			$tahun = $_GET['tahun'];
			$status = $_GET['status'];

            $data['ket'] 		= "TANDA BUKTI PEMBAYARAN SEMINAR ${nama_prodi}";
            if ($where = 'all') {
            	$data['result'] 	= $this->fakultas->view_by_year_status($id_prodi, $tahun, '', $status);
            } else {
            	$data['result'] 	= $this->fakultas->view_by_year_status($id_prodi, $tahun, $where, $status);
            }

		}else if($filter == '5') {
			$tahun = $_GET['tahun'];
			$status = $_GET['status'];

            $data['ket'] 		= "TANDA BUKTI PEMBAYARAN SEMINAR ${nama_prodi}";
           	if ($where == 'all') {
           		$data['result'] 	= $this->fakultas->view_by_year_status($id_prodi, $tahun, '', $status);
           	} else {
           		$data['result'] 	= $this->fakultas->view_by_year_status($id_prodi, $tahun, $where, $status);
           	}

		}else if($filter == '0') {

			$id_prodi 	= $_GET['prodi'];
			$jenis_ujian = $_GET['jenis_ujian'];

            $data['ket'] 		= "TANDA BUKTI PEMBAYARAN SEMINAR ${nama_prodi}";
           	$data['result'] 	= $this->fakultas->get_all_pendaftar($id_prodi, $jenis_ujian);
		}
		
		$this->load->view('fakultas/cetak_pendaftar_filter', $data, false);
// 		$this->simple_login->pdfGenerator($html, 'pengajuan_keuangan', 'Legal', 'potrait');
	}

    public function cetak_filter_check()
	{
		$nim 		 = $this->input->post('nim');
		$jenis_ujian = $this->input->post('jenis_ujian');
		$nama_prodi  = $this->input->post('nama_prodi');
		$dt 		 = [];

		for ($index = 0 ; $index < count($nim); $index ++) {
		  $dt[] = $this->fakultas->getDataPendaftarCheck($nim[$index], $jenis_ujian[$index]);
		}

		$data['nama_staff'] = $this->db->get_where('user', ['level' => $this->session->userdata('level')])->row()->nama_user;
		$data['result']		= $dt;
		$data['ket'] 		= "TANDA BUKTI PEMBAYARAN SEMINAR " .$nama_prodi;

		$this->load->view('fakultas/cetak_pendaftar_filter_check', $data, false);
// 		$this->simple_login->pdfGenerator($html, 'pengajuan_keuangan', 'Legal', 'potrait');
		
	}
	
	public function update_status_pengajuan()
	{
		cek_ajax();

		$data = $this->input->post('value');
		$id = $this->input->post('id');

		$this->db->set('status_pengajuan', $data)->where('id', $id)->update('daftar_ujian');
		$this->output->set_content_type('application/json')->set_output(json_encode(['message' => 'success']));
	}


}

/* End of file Mahasiswa.php */
/* Location: ./application/controllers/fakultas/Mahasiswa.php */