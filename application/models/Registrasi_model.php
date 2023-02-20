<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi_model extends CI_Model {

	function simpan($data)
	{
		$this->db->insert('bimbingan_mhs', $data);
	}

	function getDataByNim($nim)
	{
		$this->db->where('nim', $nim);
		return $this->db->get('bimbingan_mhs')->result();
	}

	function nama_pembimbing1($id)
	{
		$query = $this->db->query("SELECT * FROM dosen WHERE NIDN = '$id'");
		if ($query->num_rows() > 0 ) {
			$data = $query->row();
			$hasil = $data->nama_dosen;
		}else{
			$hasil = '';
		}

		return $hasil;
	}

	function nama_pembimbing2($id)
	{
		$query = $this->db->query("SELECT * FROM dosen WHERE NIDN = '$id'");
		if ($query->num_rows() > 0 ) {
			$data = $query->row();
			$hasil = $data->nama_dosen;
		}else{
			$hasil = '';
		}

		return $hasil;
	}

}

/* End of file Registrasi_model.php */
/* Location: ./application/models/Registrasi_model.php */