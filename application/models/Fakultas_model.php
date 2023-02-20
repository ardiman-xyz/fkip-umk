<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas_model extends CI_Model {

	public function getDataPendaftar()
	{
		$data = $this->db
		->select('du.*, bm.judul')
		->from('daftar_ujian du')
		->join('bimbingan_mhs bm', 'bm.nim = du.nim', 'left')
		->get()->result();

		return $data;

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

    public function view_by_year_status($id_prodi, $year, $where = null, $where2)
    {
        if ($where != null) {
            $data = $this->db
            ->select('du.*, bm.judul')
            ->from('daftar_ujian du')
            ->join('bimbingan_mhs bm', 'bm.nim = du.nim', 'left')
            ->where([
                'YEAR(created)' => $year,
                'du.prodi' => $id_prodi,
                'du.id_jenis_ujian' => $where,
                'du.status' => $where2
                ])
            ->get()->result();
        } else {

            $this->db->order_by('du.id_jenis_ujian', 'asc');
           $data = $this->db
            ->select('du.*, bm.judul')
            ->from('daftar_ujian du')
            ->join('bimbingan_mhs bm', 'bm.nim = du.nim', 'left')
            ->where([
                'YEAR(created)' => $year,
                'du.prodi' => $id_prodi,
                'du.status' => $where2
                ])
            ->get()->result();
        }
        

        return $data;
    }

     public function get_all_pendaftar($id_prodi, $where)
    {
        $data = $this->db
        ->select('du.*, bm.judul')
        ->from('daftar_ujian du')
        ->join('bimbingan_mhs bm', 'bm.nim = du.nim', 'left')
        ->where([
            'du.prodi' => $id_prodi,
            'du.id_jenis_ujian' => $where
            ])
        ->get()->result();

        return $data;
    }

    public function getDataLaporan()
    {
        $this->db->order_by('date_created', 'desc');
        $data = $this->db->select('rus.date_created, rus.upload_laporan, rus.updated_at, prodi.nama_prodi, js.nama_ujian')
                ->from('rab_ujian_surat rus')
                ->join('prodi ', 'prodi.id_prodi = rus.id_prodi', 'left')
                ->join('jenis_ujian js', 'js.id_ujian = rus.id_jenis_ujian', 'left')
                ->get()->result();
        return $data;
    }

    public function getLaporanRabFilter($prodi, $jenis_ujian)
    {
        $this->db->order_by('date_created', 'desc');
        $data = $this->db->select('rus.date_created, rus.upload_laporan, rus.updated_at, prodi.nama_prodi, js.nama_ujian')
                ->from('rab_ujian_surat rus')
                ->join('prodi ', 'prodi.id_prodi = rus.id_prodi', 'left')
                ->join('jenis_ujian js', 'js.id_ujian = rus.id_jenis_ujian', 'left')
                ->where(['rus.id_jenis_ujian' => $jenis_ujian, 'rus.id_prodi' => $prodi])
                ->get()->result();
        return $data;
    }

    public function getLaporanRabFilterAll($prodi)
    {
        $this->db->order_by('date_created', 'desc');
        $data = $this->db->select('rus.date_created, rus.upload_laporan, rus.updated_at, prodi.nama_prodi, js.nama_ujian')
                ->from('rab_ujian_surat rus')
                ->join('prodi ', 'prodi.id_prodi = rus.id_prodi', 'left')
                ->join('jenis_ujian js', 'js.id_ujian = rus.id_jenis_ujian', 'left')
                ->where('rus.id_prodi', $prodi)
                ->get()->result();
        return $data;
    }

    public function getDataPendaftarCheck($nim, $jenis_ujian)
    {
        $data = $this->db
                ->select('du.nama, du.nim, du.tgl_bayar, ju.nama_ujian, prodi.nama_prodi')
                ->from('daftar_ujian du')
                ->join('jenis_ujian ju', 'ju.id_ujian = du.id_jenis_ujian', 'left')
                ->join('prodi', 'prodi.id_prodi = du.prodi', 'left')
                ->where(['du.nim' => $nim, 'id_jenis_ujian' => $jenis_ujian])
                ->get()->row();
        return $data;

    }

    public function getDataRaw()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get_where('raw', ['status' => '1'])->result();
    }

    public function getDataRawDetail($id_raw)
    {
        return $this->db->get_where('raw', ['id_raw' => $id_raw])->row();
    }

}

/* End of file Fakultas_model.php */
/* Location: ./application/models/Fakultas_model.php */