<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_model extends CI_Model {

	function getAllFoto()
	{
		$this->db->select('*');
        $this->db->from('galeri');
		$this->db->order_by('id_galeri', 'desc');

		$query = $this->db->get();
		return $query->result();
    }

    function tambah($data)
	{
		$this->db->insert('galeri', $data);
    }
    
    function edit($data)
	{
		$this->db->where('id_galeri', $data['id_galeri']);
		$this->db->update('galeri',$data);
	}

    function get_by_id($id_galeri)
	{
		$this->db->select('*');
		$this->db->from('galeri');
		$this->db->where('id_galeri', $id_galeri);
		$this->db->order_by('id_galeri', 'desc');

		$query = $this->db->get();
		return $query->row();
    }
    
    function delete($data)
	{
		$this->db->where('id_galeri', $data['id_galeri']);
		$this->db->delete('galeri', $data);
	}

	function slider()
	{
		$this->db->select('*');
		$this->db->from('galeri');
		$this->db->where([	'posisi_foto'	=> 'slider',
							'status'		=> 'publish']);
		$this->db->limit(3);
		$this->db->order_by('id_galeri', 'desc');

		$query = $this->db->get();
		return $query->result();
	}




}