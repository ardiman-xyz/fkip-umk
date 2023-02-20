<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skpi_model extends CI_Model {

	function simpan_skpi($data)
	{
		$this->db->insert('skpi_mahasiswa', $data);
	   	$insert_id = $this->db->insert_id();

	   	return  $insert_id;
	}


}

