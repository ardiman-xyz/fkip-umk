<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_model extends CI_Model {

	function getData()
	{
		$this->db->select('*');
		$this->db->from('profil');
		$this->db->order_by('id', 'desc');

		$query = $this->db->get();
		return $query->row();
	}

	function getDataId($id)
	{
		$this->db->select('*');
		$this->db->from('profil');
		$this->db->where('id', $id);
		$this->db->order_by('id', 'desc');

		$query = $this->db->get();
		return $query->row();
	}

	function getDataPimpinan()
	{
		return $this->db->get('pimpinan')->result();
	}

	function getDataRepo($where)
	{
		return $this->db->get_where('repository', ['type' => $where])->result();
	}


}

/* End of file Profil_model.php */
/* Location: ./application/models/Profil_model.php */