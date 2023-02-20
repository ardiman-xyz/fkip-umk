<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_model extends CI_Model {

	function insert($data)
	{
		$this->db->insert('pengajuan_judul', $data);
	}

	function insert_beasiswa($data)
	{
		$this->db->insert('surat_tidak_menrima_beasiswa', $data);
	}

	function getDataSeminar()
	{
		$this->db->select('surat_seminar.*, prodi.*, ju.nama_ujian');
		$this->db->from('surat_seminar');
		// join
		$this->db->join('prodi', 'prodi.id_prodi = surat_seminar.id_prodi','LEFT');
		$this->db->join('jenis_ujian ju', 'ju.id_ujian = surat_seminar.id_jenis_ujian', 'left');
		// and join
		$this->db->where('surat_seminar.id_prodi', $this->session->userdata('prodi'));
		$this->db->order_by('tgl_insert', 'desc');
		$query = $this->db->get();

		return $query->result();
	}
	function getMhsSeminar($id_surat_seminar)
	{

		return $this->db->get_where('mhs_seminar', ['id_surat_seminar' => $id_surat_seminar] );
	}

	function nama_anggota($id_surat_seminar)
	{

		return $this->db->get_where('anggota_pemb_seminar', ['id_surat_seminar' => $id_surat_seminar] );
	}

	function nama_pembimbing1($id)
	{
	
		$q  = $this->db->query("SELECT * FROM dosen WHERE id_dosen = '$id'");
		if ($q->num_rows() > 0) {
			$row = $q->row();
			$hasil = $row->nama_dosen;
		}else{
			$hasil = '';
		}

		return $hasil;
	}

	function nama_pembimbing2($id)
	{
	
		$q  = $this->db->query("SELECT * FROM dosen WHERE id_dosen = '$id'");
		if ($q->num_rows() > 0) {
			$row = $q->row();
			$hasil = $row->nama_dosen;
		}else{
			$hasil = '';
		}

		return $hasil;
	}

	function getDataSeminarById($id)
	{
		$this->db->select('*');
		$this->db->from('surat_seminar');
		// join;
		$this->db->join('prodi', 'prodi.id_prodi = surat_seminar.id_prodi','LEFT');
		// and join
		$this->db->where('surat_seminar.id_surat_seminar', $id);
		$this->db->order_by('ketua', 'ASC');
		$query = $this->db->get();

		return $query->row();
	}

	function cek_user($nim)
	{
		$this->db->where('nim', $nim);
		return $this->db->get('pengguna')->row();

	}

	function cekNim($nim)
	{
		$this->db->where('nim', $nim);
		$data = $this->db->get('pengguna');

		return $data;
	}

	function masukkan($data)
	{
		$this->db->insert('pengguna', $data);
	}

	function getSurat()
	{
		$nim = $this->session->userdata('nim');

		$this->db->order_by('id', 'desc');
		$this->db->where('nim', $nim);
		$query = $this->db->get('pengajuan_judul');

		return $query->result();
	}

	function getSuratBeasiswa()
	{
		$nim = $this->session->userdata('nim');

		$this->db->order_by('id', 'desc');
		$this->db->where('nim', $nim);
		$query = $this->db->get('surat_tidak_menrima_beasiswa');

		return $query->result();
	}

	function getAllSuratBeasiswa()
	{

		$this->db->order_by('id', 'desc');
		$query = $this->db->get('surat_tidak_menrima_beasiswa');

		return $query->result();
	}

	// untuk admin
	function getSuratJudul()
	{

		$this->db->order_by('id', 'desc');
		$query = $this->db->get('pengajuan_judul');

		return $query->result();
	}

	function getById($id)
	{
		$this->db->where('id', $id);
		$data = $this->db->get('pengajuan_judul');

		return $data->row();
	}

	function insert_surat_aktfiKuliah($data)
	{
		$this->db->insert('surat_aktif_kuliah', $data);
	}

	function getSuratAktifAdmin()
	{

		$this->db->order_by('id_aktif_kuliah', 'desc');
		$query = $this->db->get('surat_aktif_kuliah');

		return $query->result();
	}

	function getSuratAktif()
	{
		$nim = $this->session->userdata("nim");

		$this->db->order_by('id_aktif_kuliah', 'desc');
		$this->db->where('nim', $nim);
		$query = $this->db->get('surat_aktif_kuliah');

		return $query->result();
	}

	// untuk admin
	// function getSuratCutiAdmin()
	// {
	// 	$this->db->order_by('id_cuti', 'desc');
	// 	$query = $this->db->get('surat_cuti');

 //        return $query->result();
	// }

	function getById_surat_aktifkuliah($id)
	{
		$this->db->where('id_aktif_kuliah', $id);
		$data = $this->db->get('surat_aktif_kuliah');

		return $data->row();
	}

	function getById_surat_beasiswa($id)
	{
		$this->db->where('id', $id);
		$data = $this->db->get('surat_tidak_menrima_beasiswa');

		return $data->row();
	}


	function jumlah_surat_pengajuan_judul()
	{
		$id_prodi = $this->session->userdata('prodi');

		$query = $this->db->query("SELECT count(*) AS jumlah FROM pengajuan_judul WHERE status = 'pending' AND prodi = $id_prodi");

		return $query->row()->jumlah;
	}

	function jumlah_surat_beasiswa()
	{
		$id_prodi = $this->session->userdata('prodi');

		$query = $this->db->query("SELECT count(*) AS jumlah FROM surat_tidak_menrima_beasiswa WHERE status = 'Pending' AND id_prodi = $id_prodi");

		return $query->row()->jumlah;
	}


	function jumlah_surat_aktif_kuliah()
	{
		$id_prodi = $this->session->userdata('prodi');

		$query = $this->db->query("SELECT count(*) AS jumlah FROM surat_aktif_kuliah WHERE status = 'pending' AND prodi = $id_prodi");

		return $query->row()->jumlah;
	}

	function delete_surat($table, $data, $pk)
	{
		$this->db->where_in($pk, $data);
        return $this->db->delete($table);
	}

	function approve_surat($table, $data, $pk, $value){

		$this->db->where_in($pk, $data);
        return $this->db->update($table, ['status' => $value]);

	}

	function failed_surat($table, $data, $pk){

		$this->db->where_in($pk, $data);
        return $this->db->update($table, ['status' => 'pending']);

	}

}

/* End of file Surat_model.php */
/* Location: ./application/models/Surat_model.php */