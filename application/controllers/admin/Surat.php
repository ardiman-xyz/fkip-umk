<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('surat_model', 'surat');
		$this->load->model('prodi_model', 'prodi');
		$this->simple_login->cek_login_admin();
	}

	public function index()
	{
		$data['surat'] = $this->surat->getSuratJudul();
		$data['surat_cuti'] = $this->surat->getSuratCutiAdmin();
		$data['surat_aktif_kuliah'] = $this->surat->getSuratAktifAdmin();
		$data['data_beasiswa'] = $this->surat->getAllSuratBeasiswa();

		// jumlah yang belum di confirm
		$data['jml_surat_pengajuan_judul'] = $this->surat->jumlah_surat_pengajuan_judul();
		$data['jml_surat_cuti'] = $this->surat->jumlah_surat_cuti();
		$data['jml_surat_aktif_kuliah'] = $this->surat->jumlah_surat_aktif_kuliah();
		$data['jml_surat_beasiswa'] = $this->surat->jumlah_surat_beasiswa();

		$data['title'] 	= 'Daftar Surat';
        $data['isi']	= 'admin/surat/list';
                    
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function diterima($id)
	{
		$this->surat->diterima($id);

		$this->session->set_flashdata('sukses', ' di diterima');
		redirect('admin/surat');
	}

	public function pending($id)
	{
		$this->surat->pending($id);

		$this->session->set_flashdata('sukses', ' di pending');
		redirect('admin/surat');
	}

	public function diterima_cuti($id)
	{
		$this->surat->diterima_cuti($id);

		$this->session->set_flashdata('sukses', ' di diterima');
		redirect('admin/surat');
	}

	public function pending_cuti($id_cuti)
	{
		$data = [
			'status' => 'pending'
		];

		$this->db->where('id_cuti', $id_cuti);
		$this->db->update('surat_cuti', $data);

		$this->session->set_flashdata('sukses', ' di diterima');
		redirect('admin/surat');
	}

	public function diterima_aktif_kuliah($id)
	{

		$data = [
			'status' => 'diterima'
		];

		$this->db->where('id_aktif_kuliah', $id);
		$this->db->update('surat_aktif_kuliah', $data);

		$this->session->set_flashdata('sukses', ' di diterima');
		redirect('admin/surat');
	}

	public function pending_aktif_kuliah($id)
	{

		$data = [
			'status' => 'pending'
		];

		$this->db->where('id_aktif_kuliah', $id);
		$this->db->update('surat_aktif_kuliah', $data);

		$this->session->set_flashdata('sukses', ' di diterima');
		redirect('admin/surat');
	}

	public function diterima_beasiswa($id)
	{

		$data = [
			'status' => 'Diterima'
		];

		$this->db->where('id', $id);
		$this->db->update('surat_tidak_menrima_beasiswa', $data);

		echo $this->session->set_flashdata('msg', 'success');
		redirect('admin/surat');
	}


	public function pending_beasiswa($id)
	{

		$data = [
			'status' => 'Pending'
		];

		$this->db->where('id', $id);
		$this->db->update('surat_tidak_menrima_beasiswa', $data);

		echo $this->session->set_flashdata('msg', 'success');
		redirect('admin/surat');
	}


	public function detail($id_cuti)
	{
		$data['data']	= $this->surat->getById_surat_cuti($id_cuti);

		$data['title'] 	= "Detail ".$data['data']->nama;
		$data['isi'] 	= "admin/surat/detail";

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function detail_surat_aktif($id_aktif)
	{

		$data['data']	= $this->surat->getById_surat_aktifkuliah($id_aktif);

		$data['title'] 	= "Detail ".$data['data']->nama;
		$data['isi'] 	= "admin/surat/detail_surat_aktif";

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


	public function delete($id)
	{

		$data = ['id'	=> $id ];

		$this->surat->delete($data);
		$this->session->set_flashdata('sukses', ' di hapus');
		redirect('admin/surat');
	}
	public function delete_cuti($id)
	{

		$this->db->where('id_cuti',$id );
		$this->db->delete('surat_cuti');
		$this->session->set_flashdata('sukses', ' di hapus');
		redirect('admin/surat');
	}

	public function delete_aktif_kuliah($id)
	{

		$this->db->where('id_aktif_kuliah',$id );
		$this->db->delete('surat_aktif_kuliah');
		$this->session->set_flashdata('sukses', ' di hapus');
		redirect('admin/surat');
	}

	public function delete_beasiswa($id)
	{

		$data = ['id'	=> $id ];

		$this->surat->delete_beasiswa($data);
		$this->session->set_flashdata('sukses', ' di hapus');
		redirect('admin/surat');
	}

}

/* End of file Surat.php */
/* Location: ./application/controllers/admin/Surat.php */