<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rab_model extends CI_Model {

	function getRab()
	{
		return $this->db->get('config_rab')->row();
	}


	public function get_data($table, $id)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('id_prodi', $id);
		$this->db->order_by('id', 'desc');

		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file Rab_model.php */
/* Location: ./application/models/Rab_model.php */