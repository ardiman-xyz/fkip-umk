<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {

	function getAllBerita()
	{
		$this->db->select('berita.*, kategori_berita.nama_kategori, user.nama_user');
		$this->db->from('berita');
		$this->db->join('kategori_berita', 'kategori_berita.id_kategori_berita = berita.id_kategori_berita', 'LEFT');
		$this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
		$this->db->order_by('id_berita', 'desc');

		$query = $this->db->get();
		return $query->result();
	}

	function tambah($data)
	{
		$this->db->insert('berita', $data);
	}
	
	function edit($data)
	{
		$this->db->where('id_berita', $data['id_berita']);
		$this->db->update('berita',$data);
	}

	function akhir()
	{
		$query = $this->db->query('SELECT * FROM berita ORDER BY id_berita DESC');
		return $query->row();
	}

	function getById($id_berita)
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where('id_berita', $id_berita);
		$this->db->order_by('id_berita', 'desc');

		$query = $this->db->get();
		return $query->row();
	}
	
	function delete($data)
	{
		$this->db->where('id_berita', $data['id_berita']);
		$this->db->delete('berita', $data);
	}

	function home_berita()
	{
		$query = "SELECT max(id_berita) as id_berita FROM berita";
		$id_berita_baru = $this->db->query($query)->row()->id_berita;

		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where(['status_berita' => 'publish', 'id_berita !=' => $id_berita_baru]);
		$this->db->limit(3);
		$this->db->order_by('id_berita', 'desc');

		$query = $this->db->get()->result();
		return $query;

	}

	function berita_terbaru()
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where('status_berita', 'publish');
		$this->db->limit(1);
		$this->db->order_by('id_berita', 'desc');

		$query = $this->db->get();
		return $query->row();
	}

	function getBerita($slug_berita)
	{
		
		$this->db->select('berita.*, user.nama_user');
		$this->db->from('berita');
		$this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
		$this->db->where('slug_berita', $slug_berita);
		$this->db->order_by('id_berita', 'desc');

		$query = $this->db->get();
		return $query->row();
	}

	public function beritaLain($slug)
	{
		$this->db->select('*');
		$this->db->from('berita');
		// where slider
		$this->db->where(['status_berita' => 'publish', 'slug_berita !=' => $slug]);
		$this->db->order_by('id_berita', rand());
		// batasi 10 slide saja
		$this->db->limit(3);
		$query = $this->db->get();

		return $query->result();
	}

	function countAllNews()
	{
		return $this->db->get('berita')->num_rows();
	}

	function getNews($limit, $start)
	{
		$this->db->order_by('id_berita', 'desc');
		return $this->db->get('berita', $limit, $start)->result();
		
	}
    
    public function getSkripsi()
	{
		$this->db->select('repo_skripsi.*, pengguna.nama_lengkap, prodi.nama_prodi, bimbingan_mhs.judul');
		$this->db->from('repo_skripsi');
		$this->db->join('pengguna', 'pengguna.nim = repo_skripsi.nim', 'LEFT');
		$this->db->join('prodi', 'prodi.id_prodi = repo_skripsi.id_prodi', 'LEFT');
		$this->db->join('bimbingan_mhs', 'bimbingan_mhs.nim = repo_skripsi.nim', 'LEFT');
		$this->db->order_by('repo_skripsi.id', 'desc');

		$query = $this->db->get();
		return $query->result();
	}
	
    
}