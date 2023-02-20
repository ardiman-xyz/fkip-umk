<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video_model extends CI_Model {

	function getAllVideo()
	{
		$this->db->select('*');
		$this->db->from('video');
		$this->db->order_by('id_video', 'desc');

		$query = $this->db->get();
		return $query->result();
	}
	
	function getVideoHome()
	{
		$this->db->select('*');
		$this->db->from('video');
		$this->db->where(['status' => 'publish',
							'posisi' => 'homepage']);
		$this->db->order_by('id_video', 'desc');

		$query = $this->db->get();
		return $query->result();
	}

    function tambah($data)
	{
		$this->db->insert('video', $data);
	}

	function getById($id_video)
	{
		$this->db->select('*');
		$this->db->from('video');
		$this->db->where('id_video', $id_video);
		$this->db->order_by('id_video', 'desc');

		$query = $this->db->get();
		return $query->row();
	}

	public function edit($data)
	{
		$this->db->where('video', $data['video']);
		$this->db->update('video',$data);
	}

	public function delete($data)
	{
		$this->db->where('id_video', $data['id_video']);
		$this->db->delete('video',$data);
	}



}