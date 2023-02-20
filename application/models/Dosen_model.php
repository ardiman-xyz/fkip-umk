<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_model extends CI_Model {

	function getAllDosen()
	{
		$data = $this->db
		->select('d.*, p.nama_prodi')
		->from('dosen d')
		->join('prodi p', 'd.id_prodi = p.id_prodi', 'left')
		->get()->result();

		return $data;
	}

	public function getById($id_dosen)
	{
		$data = $this->db
		->from('dosen')
		->where('id_dosen',$id_dosen)
		->get()->row();

		return $data;
	}

	function getInfoDosen($nidn)
	{
		$data = $this->db
		->from('informasi_dosen')
		->where('nidn_dosen',$nidn)
		->get()->row();

		return $data;
	}

	public function get_nama_dosen($id)
	{
		$data = $this->db->where('id_dosen', $id)->get('dosen')->row();

		if ($data != null) {
			$dt = $data->nama_dosen;
		}else{
			$dt = '';
		}

		return $dt;
	}

	function edit($data)
	{
		$this->db->where('id_dosen', $data['id_dosen']);
		$this->db->update('dosen',$data);
	}

	function update_profil($data)
	{
		$this->db->where('nidn_dosen', $data['nidn_dosen']);
		$this->db->update('dsn_profil',$data);
	}

	function mhs_bimbingan1($nidn)
	{
		$query = "SELECT nama_mhs FROM bimbingan_mhs WHERE id_pembimbing1='$nidn'";
		return $this->db->query($query)->result();
	}

	function mhs_bimbingan2($nidn)
	{
		$query = "SELECT nama_mhs FROM bimbingan_mhs WHERE id_pembimbing2='$nidn'";
		return $this->db->query($query)->result();
	}

	function cari_peneliltian($nidn)
	{
		$this->db->select('*');
		$this->db->from('dsn_penelitian');
		$this->db->where('nidn_dosen', $nidn);

		$this->db->order_by('nidn_dosen', 'desc');
		$query = $this->db->get();

		return $query->row();
	}

	function getInfo($nidn)
	{
		$id = ['nidn_dosen' => $nidn];
		$query = $this->db->get_where('informasi_dosen', $id);

		if ($query->num_rows() > 0) {

			 $data = $query->row();

		}else{
			 $data = '';
		}

		return $data;
		
	}

	function jurnal($nidn)
	{
		$this->db->select('*');
		$this->db->from('dsn_jurnal');
		$this->db->where('nidn_dosen', $nidn);

		$this->db->order_by('nidn_dosen', 'desc');
		$query = $this->db->get();

		return $query->result();
	}


	function buku($nidn)
	{
		$this->db->select('*');
		$this->db->from('dsn_buku');
		$this->db->where('nidn_dosen', $nidn);

		$this->db->order_by('nidn_dosen', 'desc');
		$query = $this->db->get();

		return $query->result();
	}

	function universitas($nidn)
	{
		$this->db->select('*');
		$this->db->from('dsn_universitas');
		$this->db->where('nidn_dosen', $nidn);

		$this->db->order_by('nidn_dosen', 'desc');
		$query = $this->db->get();

		return $query->result();
	}

	function matakuliah($nidn)
	{
		$this->db->select('*');
		$this->db->from('dsn_matakuliah');
		$this->db->where('nidn_dosen', $nidn);

		$this->db->order_by('nidn_dosen', 'desc');
		$query = $this->db->get();

		return $query->result();
	}

	function cari_publikasi_dosen($nidn)
	{
		$this->db->select('*');
		$this->db->from('dsn_detail_penelitian');
		$this->db->where('nidn_dosen', $nidn);

		$this->db->order_by('nidn_dosen', 'desc');
		$query = $this->db->get();

		return $query->result();
	}

	function cari_publikasi_smt($nidn)
	{
		$this->db->select('*');
		$this->db->from('dsn_penelitian_smt');
		$this->db->where('nidn_dosen', $nidn);

		$this->db->order_by('nidn_dosen', 'desc');
		$query = $this->db->get();

		return $query->result();
	}

	function cari_peneliltian1($nidn)
	{
		$this->db->select('penelitian');
		$this->db->from('dsn_detail_penelitian');
		$this->db->where('nidn_dosen', $nidn);

		$query = $this->db->get();
		return $query->result();
	}

	function cari_peneliltian2($nidn)
	{
		$this->db->select('penelitian_sementara');
		$this->db->from('dsn_penelitian_smt');
		$this->db->where('nidn_dosen', $nidn);

		$query = $this->db->get();
		return $query->result();
	}

	function jumlahDosen()
	{
		$this->db->select('*');
		$this->db->from('dosen');
		$this->db->order_by('id_dosen', 'desc');

		$query = $this->db->get();
		return $query->num_rows();
	}

	function getDosenHome()
	{
		$this->db->select('*');
		$this->db->from('dosen');
		$this->db->limit(4);
		$this->db->order_by('id_dosen', 'desc');

		$query = $this->db->get();
		return $query->result();
	}

	function tambah($data)
	{
		$this->db->insert('dosen', $data);
	}

	function update($table, $data, $where)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function get_by_id($id_dosen)
	{
		$this->db->select('*');
		$this->db->from('dosen');
		$this->db->where('id_dosen', $id_dosen);
		$this->db->order_by('id_dosen', 'desc');

		$query = $this->db->get();
		return $query->row();
	}

	function get_by_nidn($nidn)
	{
		$this->db->select('*');
		$this->db->from('informasi_dosen');
		$this->db->where('nidn_dosen', $nidn);
		$this->db->order_by('nidn_dosen', 'desc');

		$query = $this->db->get();
		return $query->row();
	}


	function delete($data)
	{
		$this->db->where('id_dosen', $data['id_dosen']);
		$this->db->delete('dosen', $data);
	}

	function check($table, $data)
	{
		return $this->db->get_where($table, ['NIDN' => $data]);
	}

	public function getMahasiswaBimbingan($nidn)
	{
// 	    $data = $this->db
// 		->select('bm.nama_mhs, bm.nim, bm.judul,  p.nama_prodi, du.id_jenis_ujian as jenis_ujian, du.status as status_ujian')
// 		->from('bimbingan_mhs bm')
// 		->join('prodi p ', 'bm.id_prodi = p.id_prodi', 'left')
// 		->join('daftar_ujian du ', 'du.nim = bm.nim', 'left')
// 		->where(['id_pembimbing1' => $nidn, 'du.id_jenis_ujian' => 3, 'du.status' => 1])
// 		->or_where('id_pembimbing2', $nidn)
// 		->get()->result();
		
		$query = "SELECT bimbingan_mhs.*,prodi.nama_prodi FROM bimbingan_mhs JOIN prodi ON prodi.id_prodi = bimbingan_mhs.id_prodi WHERE bimbingan_mhs.id_pembimbing1 = $nidn OR bimbingan_mhs.id_pembimbing2 = $nidn ORDER BY bimbingan_mhs.nim desc";
		$data = $this->db->query($query)->result();
		
		return $data;
	}
	
	public function getStatusUjianMhs($nim){
		$data =  $this->db->get_where('daftar_ujian', ['nim' => $nim, 'id_jenis_ujian' => '3', 'status' => '1'])->row();

		if ($data === null) {
			$dt = ['status' => 'Belum'];
		}else{
			$dt = ['status' => 'selesai'];
		}
		return $dt;
	}

	public function cekNidn($nidn)
	{
		return $this->db->get_where('dosen', ['NIDN' => $nidn])->row();
	}
	
	public function getJmlBelumSelesai($nidn){
	    
		$query = "SELECT bm.nama_mhs, bm.nim, bm.judul, du.status, du.id_jenis_ujian, prodi.nama_prodi FROM bimbingan_mhs as bm INNER JOIN prodi ON bm.id_prodi = prodi.id_prodi INNER JOIN daftar_ujian as du ON du.nim = bm.nim WHERE du.status = 0 AND (id_pembimbing1 = $nidn OR id_pembimbing2 = $nidn)";

		$data = $this->db->query($query);

		return $data->result_array();
	}
	

}

/* End of file Teacher_model.php */
/* Location: ./application/models/Teacher_model.php */