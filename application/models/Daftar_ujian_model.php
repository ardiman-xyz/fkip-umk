<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_ujian_model extends CI_Model {

	function getData()
	{
		$this->db->select('*');
        $this->db->from('daftar_ujian');
		$this->db->order_by('id', 'asc');

		$query = $this->db->get();
		return $query->result();
    
	}

	public function getDataPendaftar()
	{
	    $this->db->order_by('du.id_jenis_ujian', 'desc');
		$data = $this->db
		->select('du.*, bm.judul')
		->from('daftar_ujian du')
		->join('bimbingan_mhs bm', 'bm.nim = du.nim', 'left')
		->where(['du.prodi' => $this->session->userdata('prodi')])
		->get()->result();

		return $data;

	}

	function getJenisUjian()
	{
		$this->db->select("*");
		$this->db->from('jenis_ujian');
		$this->db->order_by('id_ujian', 'desc');
		$query = $this->db->get();

		return $query->result();
	}

	function getByNim($id)
	{
		$this->db->order_by('id', 'desc');

		$data = $this->db->get_where('daftar_ujian', ['id' => $id]);


		return $data->row();
	}	
	
	function getDataDaftarUjian($nim, $id_jenis_ujian)
	{
		$data = $this->db
		->select('du.*, ju.nama_ujian')
		->from('daftar_ujian du')
		->join('jenis_ujian ju', 'ju.id_ujian = du.id_jenis_ujian', 'left')
		->where(['nim' => $nim, 'id_jenis_ujian' => $id_jenis_ujian])
		->get();

		return $data->row();
	}

	function delete($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->delete('daftar_ujian', $data);
	}

	function nama_jenis_ujian($id)
	{
		$query = $this->db->query("SELECT * FROM jenis_ujian WHERE id_ujian = '$id'");

		if ($query->num_rows() > 0 ) {
			$data = $query->row();
			$hasil = $data->nama_ujian;
		}else{
			$hasil = '';
		}

		return $hasil;
	}


	public function view_by_date($date, $where)
	{

		$data = $this->db
		->select('du.*, bm.judul')
		->from('daftar_ujian du')
		->join('bimbingan_mhs bm', 'bm.nim = du.nim', 'left')
		->where([
			'DATE(created)' => $date,
			'du.prodi' => $this->session->userdata('prodi'),
			'du.id_jenis_ujian' => $where
			])
		->get()->result();

		return $data;

		// var_dump($data);

     //    $this->db->where('DATE(created)', $date);
     //    $this->db->where('prodi', $this->session->userdata('prodi'));
     //    $this->db->where('id_jenis_ujian', $where);
        
    	// return $this->db->get('daftar_ujian')->result();
	}

	public function view_by_month($month, $year, $where)
	{

		$data = $this->db
		->select('du.*, bm.judul')
		->from('daftar_ujian du')
		->join('bimbingan_mhs bm', 'bm.nim = du.nim', 'left')
		->where([
			'MONTH(created)' => $month,
			'YEAR(created)' => $year,
			'du.prodi' => $this->session->userdata('prodi'),
			'du.id_jenis_ujian' => $where
			])
		->get()->result();

		return $data;
	}

	public function view_by_year($year, $where)
	{
		$data = $this->db
		->select('du.*, bm.judul')
		->from('daftar_ujian du')
		->join('bimbingan_mhs bm', 'bm.nim = du.nim', 'left')
		->where([
			'YEAR(created)' => $year,
			'du.prodi' => $this->session->userdata('prodi'),
			'du.id_jenis_ujian' => $where
			])
		->get()->result();

		return $data;
	}

	public function view_by_year_status($year, $where, $where2)
	{
		$data = $this->db
		->select('du.*, bm.judul')
		->from('daftar_ujian du')
		->join('bimbingan_mhs bm', 'bm.nim = du.nim', 'left')
		->where([
			'YEAR(created)' => $year,
			'du.prodi' => $this->session->userdata('prodi'),
			'du.id_jenis_ujian' => $where,
			'du.status' => $where2
			])
		->get()->result();

		return $data;
	}


	 public function option_tahun(){
        $this->db->select('YEAR(created) AS tahun'); // Ambil Tahun dari field tgl
        $this->db->from('daftar_ujian'); // select ke tabel transaksi
        $this->db->order_by('YEAR(created)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(created)'); // Group berdasarkan tahun pada field tgl
        
        return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }

    public function get_pembimbing1($nim)
    {
    	$data = $this->db->where('nim', $nim)->get('bimbingan_mhs')->row();

    	if (!empty($data)) {
    	   	
    	   	$pembimbing_nidn = $data->id_pembimbing1;
    	   	$dt = $this->db->get_where('dosen', ['NIDN' => $pembimbing_nidn])->row();
    	   	$nama = $dt->nama_dosen; 
    	}else{
    		$nama = '';
    	} 

    	return $nama;  	
    }

    public function get_pembimbing2($nim)
    {
    	$data = $this->db->where('nim', $nim)->get('bimbingan_mhs')->row();

    	if (!empty($data)) {
    	   	
    	   	$pembimbing_nidn = $data->id_pembimbing2;
    	   	$dt = $this->db->get_where('dosen', ['NIDN' => $pembimbing_nidn])->row();
    	   	$nama = $dt->nama_dosen; 
    	}else{
    		$nama = '';
    	} 

    	return $nama;  	
    }

    public function get_all_pendaftar($where)
    {
    	$data = $this->db
		->select('du.*, bm.judul')
		->from('daftar_ujian du')
		->join('bimbingan_mhs bm', 'bm.nim = du.nim', 'left')
		->where([
			'du.prodi' => $this->session->userdata('prodi'),
			'du.id_jenis_ujian' => $where
			])
		->get()->result();

		return $data;
    }


}

/* End of file Daftar_ujian.php */
/* Location: ./application/models/Daftar_ujian.php */