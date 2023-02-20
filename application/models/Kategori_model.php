<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

	function getAllKategori()
	{
		$this->db->select('*');
        $this->db->from('kategori_berita');
		$this->db->order_by('id_kategori_berita', 'desc');

		$query = $this->db->get();
		return $query->result();
    }

    function tambah($data){

        $this->db->insert('kategori_berita', $data);
        
    }
    
    function getById($id)
    {
        $this->db->select('*');
        $this->db->from('kategori_berita');
        $this->db->where('id_kategori_berita', $id);
        $this->db->order_by('id_kategori_berita', 'desc');
        
        $query = $this->db->get();

        return $query->row();
        		
    }

    function edit($data)
    {
		$this->db->where('id_kategori_berita', $data['id_kategori_berita']);
        $this->db->update('kategori_berita', $data);
    }
    
    function delete($data)
    {

		$this->db->where('id_kategori_berita', $data['id_kategori_berita']);
		$this->db->delete('kategori_berita', $data);
        
	}


}