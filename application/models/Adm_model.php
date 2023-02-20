<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_model extends CI_Model {

	public function search($params)
	{
		$this->db->like('nama_file', $params , 'both');
        $this->db->order_by('nama_file', 'ASC');
        $this->db->limit(10);
        return $this->db->get('adm_repository')->result();
	}

	public function search_item($params)
	{
		return $this->db->get_where('adm_repository', ['nama_file' => $params])->row();
	}

	public function search_fakultas($params)
	{
		$this->db->like('nama_file', $params , 'both');
        $this->db->order_by('nama_file', 'ASC');
        $this->db->limit(10);
        return $this->db->get('file_assesment')->result();
	}


	public function search_assesment($params)
	{
		return $this->db->get_where('file_assesment', ['nama_file' => $params])->row();
	}


}