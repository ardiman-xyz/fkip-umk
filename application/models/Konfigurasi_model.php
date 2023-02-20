<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model {

	function getKonfigurasi()
	{
		$this->db->select('*');
		$this->db->from('konfigurasi');
		$this->db->order_by('id_konfigurasi', 'desc');

		$query = $this->db->get();
		return $query->row();
	}

	function update($data)
	{
		$this->db->where('id_konfigurasi', $data['id_konfigurasi']);
		$this->db->update('konfigurasi',$data);
	}
}