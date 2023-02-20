<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman_model extends CI_Model {

	function getAllPengumuman($slug)
	{
		$this->db->select('pengumuman.*, user.nama_user');
		$this->db->from('pengumuman');
		$this->db->join('user', 'user.id_user = pengumuman.id_user', 'LEFT');
		$this->db->where(['status' => 'publish', 'slug_pengumuman !=' => $slug]);
		$this->db->limit(3);
		$this->db->order_by('id_pengumuman', rand());

		$query = $this->db->get();
		return $query->result();
	}

	public function getPengumumanAll()
	{
		$data = $this->db
				->select('pengumuman.*, user.nama_user')
				->from('pengumuman')
				->join('user', 'user.id_user = pengumuman.id_user', 'left')
				->get()->result();
		return $data;
	}

	function tambah($data)
	{
		$this->db->insert('pengumuman', $data);
	}
	
	function edit($data)
	{
		$this->db->where('id_pengumuman', $data['id_pengumuman']);
		$this->db->update('pengumuman',$data);
	}

	function akhir()
	{
		$query = $this->db->query('SELECT * FROM pengumuman ORDER BY id_pengumuman DESC');
		return $query->row();
	}

	function getById($id_pengumuman)
	{
		$this->db->select('*');
		$this->db->from('pengumuman');
		$this->db->where('id_pengumuman', $id_pengumuman);
		$this->db->order_by('id_pengumuman', 'desc');

		$query = $this->db->get();
		return $query->row();
	}
	
	function delete($data)
	{
		$this->db->where('id_pengumuman', $data['id_pengumuman']);
		$this->db->delete('pengumuman', $data);
	}

	function getPengumuman($slug_pengumuman)
	{
		
		$this->db->select('pengumuman.*, user.nama_user');
		$this->db->from('pengumuman');
		$this->db->join('user', 'user.id_user = pengumuman.id_user', 'LEFT');
		$this->db->where('slug_pengumuman', $slug_pengumuman);
		$this->db->order_by('id_pengumuman', 'desc');

		$query = $this->db->get();
		return $query->row();
	}

	public function getPengumumanList()
	{
		$this->db->select('*');
		$this->db->from('pengumuman');
		$this->db->limit(3);
		$this->db->order_by('id_pengumuman', 'desc');

		$query = $this->db->get();
		return $query->result();
	}

	function countAllAnnouncement()
	{
		return $this->db->get('pengumuman')->num_rows();
	}

	function getAnnouncement($limit, $start)
	{
		$this->db->order_by('id_pengumuman', 'desc');
		return $this->db->get('pengumuman', $limit, $start)->result();
		
	}
    
	
    
}