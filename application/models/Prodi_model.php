<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi_model extends CI_Model {

	function getAllProdi()
	{
		$this->db->select('*');
		$this->db->from('prodi');
		$this->db->order_by('id_prodi', 'desc');

		$query = $this->db->get();
		return $query->result();
    }

    function tambah($data)
	{
		return $this->db->insert('prodi', $data);

	}

	function getById($id_prodi)
	{
		$this->db->where('id_prodi', $id_prodi);
		return $this->db->get('prodi')->row();
	}

	function edit($data)
	{
		$this->db->where('id_prodi', $data['id_prodi']);
		$this->db->update('prodi',$data);
	}


	function delete($data)
	{
		$this->db->where('id_prodi', $data['id_prodi']);
		$this->db->delete('prodi', $data);
	}

	function nama_jurusan($kode)
	{
		$query = $this->db->query("SELECT * FROM prodi WHERE id_prodi = '$kode'");
		if ($query->num_rows() > 0 ) {
			$data = $query->row();
			$hasil = $data->nama_prodi;
		}else{
			$hasil = '';
		}

		return $hasil;
	}

}