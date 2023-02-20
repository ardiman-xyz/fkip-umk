<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenawaranModel extends CI_Model {

	public function getDataPenawaran($id)
	{
		return $this->db->get_where('penawaran_mhs', ['id' => $id]);
	}

	public function getDataPenawaranByNim($nim)
	{
		return $this->db->get_where('penawaran_mhs', ['nim' => $nim]);
	}

	public function search_dosen($params)
	{
		$this->db->like('nama_dosen', $params , 'both');
        $this->db->order_by('nama_dosen', 'ASC');
        $this->db->limit(10);
        return $this->db->get('dosen')->result();
	}

	public function getPenawaranDosen()
	{
		$data = $this->db->select('pm.id,pm.nim, pm.id_dosen, pm.jml_sks, pm.status, pm.date_created as date, pm.semester, pm.thn_akademik, p.nama_lengkap as nama')
				->from('penawaran_mhs pm')
				->join('pengguna p', 'p.nim = pm.nim', 'left')
				->where('pm.id_dosen', $this->session->userdata('id_dosen'))
				->get()->result();
		return $data;
	}


	public function getDataMatakuliah($id)
	{
		return $this->db->where(['id_penawar' => $id])->from("penawaran_mk_mhs")->count_all_results();
	}

	public function getNamaMahasiswa($nim)
	{
		return $this->db->get_where('pengguna', ['nim' => $nim])->row()->nama_lengkap;
	}

	public function update($nim, $data)
	{
		$this->db->where('nim', $nim);
		$this->db->update('penawaran_mhs',$data);
	}

	public function getThnAkademik()
	{

		$data = $this->db
				->select('pm.thn_akademik')
				->from('penawaran_mhs pm')
				->group_by('pm.thn_akademik')
				->get()->result();
		return $data;
	}

	public function getDataFilter($thn_akademik, $semester)
	{
		$data = $this->db->select('pm.id,pm.nim, pm.id_dosen, pm.jml_sks, pm.status, pm.date_created as date, pm.semester, pm.thn_akademik, p.nama_lengkap as nama')
				->from('penawaran_mhs pm')
				->join('pengguna p', 'p.nim = pm.nim', 'left')
				->where(['semester' => $semester, 'thn_akademik' => $thn_akademik])
				->get()->result();
		return $data;

	}

}

/* End of file PenawaranModel.php */
/* Location: ./application/models/PenawaranModel.php */