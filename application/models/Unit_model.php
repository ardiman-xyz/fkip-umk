<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_model extends CI_Model {
	
		
	function getMahasiswaBySekolah()
	{
		$id_sekolah = $this->session->userdata('id_sekolah');

		if ($id_sekolah == '0') {
			$this->db->select('*');
			$this->db->from('daftar_magang');
			$this->db->order_by('nama', 'asc');

			$query = $this->db->get();
		} else {
			$this->db->select('*');
			$this->db->from('daftar_magang');
			$this->db->where('id_sekolah', $id_sekolah);
			$this->db->order_by('nama', 'asc');

			$query = $this->db->get();
		}

		return $query->result();
	}

	function getNilai($table, $data)
	{
		return $this->db->get_where($table, $data);
	}

	function getNilaiMhs($nim, $program)
	{
		if ($program === 'plp') {
			$data = $this->db->get_where('ppl_nilai', ['nim'=>$nim]);
			if ($data->num_rows() > 0) {
				$dt = $data->row();
				$nilai1 = $dt->n_akhir1;
				$nilai2 = $dt->n_akhir2;
				$nilai3 = $dt->n_akhir3;

				$nilai_akhir = ($nilai1 + $nilai2 + $nilai3) / 100; 
			}else {
				$nilai_akhir = 0;
			}
		}else{
			$data = $this->db->get_where('nilai_magang', ['nim'=>$nim]);
			if ($data->num_rows() > 0) {
				$dt = $data->row();
				$nilai1 = $dt->nilai1;
				$nilai2 = $dt->nilai2;
				$nilai3 = $dt->nilai3;
				$nilai4 = $dt->nilai4;
				$nilai5 = $dt->nilai5;
				$nilai6 = $dt->nilai6;
				$nilai7 = $dt->nilai7;
				$nilai8 = $dt->nilai8;

				$jumlah = $nilai1 + $nilai2 + $nilai3 + $nilai4 + $nilai5 + $nilai6 + $nilai7 + $nilai8;
				$nilai_akhir = ($jumlah/32) * 100;
			}else {
				$nilai_akhir = 0;
			}
		}

		return $nilai_akhir;
	}

	function getUsername($username)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('unit_user');

		return $query->row();

	}


	function getMahasiswaId($id)
	{
		$this->db->select('*');
		$this->db->from('daftar_magang');
		$this->db->where('id', $id);
		$this->db->order_by('id', 'desc');

		$query = $this->db->get();
		return $query->row();
	
	}

	function getData($table)
	{
		return $this->db->get($table)->result();
	}

	function getDataRepo($where)
	{
		return $this->db->get_where('adm_repository', ['type' => $where])->result();
	}

	function getDataMagang($nim)
	{
		return $this->db->get_where('daftar_magang', ['nim'=>$nim])->row();
	}

	function getDataPlp($nim)
	{
		return $this->db->get_where('daftar_magang', ['nim'=>$nim])->row();
	}

	function getDataJadwal($table)
	{
		return $this->db->get($table)->row();
	}

	function addData($data, $table)
	{
		$this->db->insert($table, $data);
	}

	function cek_sekolah($data)
	{
		$this->db->select('*');
		$this->db->from('plp_magang_sekolah');
		$this->db->where('nama_sekolah', $data);

		return $this->db->get();
	}

	function getDataSekolahId($table, $data)
	{
		return $this->db->get_where($table, $data);
	}

	function detail($table, $id)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('id', $id);
		$data = $this->db->get();

		return $data;
	}

	function update_sekolah($table, $data, $where)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function delete($table, $id)
	{
		$this->db->where($id);
		$this->db->delete($table);
	}

	function getNamaSekolah($id)
	{
		$data = $this->db->get_where('plp_magang_sekolah', ['id'=>$id]);
		if ($data->num_rows() > 0) {
			$nm = $data->row();
			$nama_sekolah = $nm->nama_sekolah;
		} else {
			$nama_sekolah = '';
		}

		return $nama_sekolah;
	}

	function getNamaPamong($id_sekolah)
	{
		$data = $this->db->get_where('unit_user', ['id_sekolah'=>$id_sekolah]);
		if ($data->num_rows() > 0) {
			$nm = $data->row();
			$nama_pamong = $nm->nama;
		} else {
			$nama_pamong = '';
		}

		return $nama_pamong;
	}

	function getNamaDocument($id)
	{
		$data = $this->db->get_where('unit_category_document', ['id'=>$id]);
		if ($data->num_rows() > 0) {
			$nm = $data->row();
			$nama_document = $nm->nama;
		} else {
			$nama_document = '';
		}

		return $nama_document;
	}

	function resetPasswordUser($id, $pass)
	{
		$hasil = $this->db->query("UPDATE unit_user set password = sha1('$pass') where id='$id'");
		return $hasil;
	
	}

	function update($table, $data, $pk, $id)
	{
		$insert = $this->db->update($table, $data, array($pk => $id));
	}

	function countAllVideo()
	{
		return $this->db->get('unit_video')->num_rows();
	}
	
	function getVideo($limit, $start)
	{
		$this->db->order_by('id', 'desc');
		return $this->db->get('unit_video', $limit, $start)->result();
		
	}

}
	
