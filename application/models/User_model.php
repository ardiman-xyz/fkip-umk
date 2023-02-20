<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {


	function getAllUsers()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->order_by('id_user', 'desc');

		$query = $this->db->get();
		return $query->result();
	}

	function tambah($data)
	{
		return $this->db->insert('user', $data);

	}

	function getUser($username)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('user');

		return $query->row();

	}

	function getPengguna($nim)
	{
		$data = $this->db
		->select('pengguna.*, prodi.nama_prodi, prodi.id_prodi')
		->from('pengguna')
		->join('prodi', 'prodi.id_prodi = pengguna.id_prodi', 'left')
		->where('pengguna.nim' , $nim)
		->get()->row();

		return $data;
	}

	function getById($id_user)
	{
		$this->db->where('id_user', $id_user);
		return $this->db->get('user')->row();
	}

	function detail($id_admin)
	{
		$this->db->select('*');
		$this->db->from('ms_admin');
		$this->db->where('id_admin', $id_admin);
		$this->db->order_by('id_admin', 'desc');

		$query = $this->db->get();
		return $query->row();
	}

	function update($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('user',$data);
	}

	function delete($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->delete('user', $data);
	}
	

}

/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */