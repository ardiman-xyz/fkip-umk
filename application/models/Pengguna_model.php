<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_Model {

	function getDataPengguna()
	{
		$this->db->order_by('nama_lengkap', 'asc');
		return $this->db->get('pengguna')->result();
	}

	function delete($data)
	{
		$this->db->where('nim', $data['nim']);
		$this->db->delete('pengguna', $data);
	}

	function getPengguna($nim)
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where('nim', $nim);
		$this->db->order_by('nim', 'desc');

		$query = $this->db->get();
		return $query->row();
	}
	

}