<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {

	//start dataTable server side

	var $column_order = array(null, 'nim', 'nama_lengkap', 'jenis_kelamin'); //set column field database for datatable orderable
    var $column_search = array('nim', 'nama_lengkap', 'jenis_kelamin'); //set column field database for datatable searchable
    var $order = array('nim' => 'asc'); // default order
 
    private function _get_datatables_query() {
        $data = $this->db
		->select('pengguna.*, prodi.nama_prodi')
		->from('pengguna')
		->join('prodi', 'prodi.id_prodi = pengguna.id_prodi', 'left');

        $i = 0;
        foreach ($this->column_search as $mhs) { // loop column
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($mhs, $_POST['search']['value']);
                } else {
                    $this->db->or_like($mhs, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables() {
        $this->_get_datatables_query();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all() {
        $this->db->from('pengguna');
        return $this->db->count_all_results();
    }

    //end dataTable server side

	function getAllMahasiswa(){
		
		$data = $this->db
		->select('pengguna.*, prodi.nama_prodi')
		->from('pengguna')
		->join('prodi', 'prodi.id_prodi = pengguna.id_prodi', 'left')
		->get()->result();

		return $data;

	}

	function jumlahMahasiswa(){
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->order_by('id_mahasiswa', 'desc');

		$query = $this->db->get();
		return $query->num_rows();
	}

	function tambah($data)
	{
		$this->db->insert('pengguna', $data);
	}

	function update_mhs($data)
	{
		$this->db->where('nim', $data['nim']);
		$this->db->update('pengguna',$data);
	}


	function getMahasiswa($nim)
	{
		return $this->db->get_where('pengguna', ['nim' => $nim])->row();
	}

	function getDataMahasiswaUjian()
	{	
		$id_prodi = $this->session->userdata('prodi');

		$this->db->select('*');
		$this->db->from('daftar_ujian');
		$this->db->where(['status' => 0, 'prodi' => $id_prodi]);
		$this->db->order_by('id', 'desc');

		$query = $this->db->get();
		return $query->result();
	}

	function detail($nim)
	{
		$data = $this->db
		->select('pengguna.*, prodi.nama_prodi')
		->from('pengguna')
		->join('prodi', 'prodi.id_prodi = pengguna.id_prodi', 'left')
		->where('pengguna.nim', $nim)
		->get()->row();

		return $data;
	}

	public function getInfo1($nim)
	{
		$data = $this->db
		->select('bm.*')
		->from('bimbingan_mhs bm')
		->where('nim', $nim)
		->get();

		if ($data->num_rows() > 0) {
			$dt = $data->row();
		}else{
			$dt = "";
		}

		return $dt;
	}

	public function getInfo2($nim)
	{
		$data = $this->db
		->select('du.*, ju.nama_ujian')
		->from('daftar_ujian du')
		->join('jenis_ujian ju', 'du.id_jenis_ujian = ju.id_ujian', 'left')
		->where('du.nim', $nim)
		->get()->result();

		return $data;
		
	}

	public function getPemb1($nidn)
	{
		return $nama_dosen = $this->db->get_where('dosen', ['NIDN' => $nidn])->row()->nama_dosen;
	}
	public function getPemb2($nidn)
	{
		return $nama_dosen = $this->db->get_where('dosen', ['NIDN' => $nidn])->row()->nama_dosen;
	}

	public function cekNim($nim)
	{
		return $this->db->get_where('pengguna', ['nim' => $nim]);
	}


	function delete($data)
	{
		$this->db->where('id_mahasiswa', $data['id_mahasiswa']);
		$this->db->delete('mahasiswa', $data);
	}

	public function getDataEdit($id)
	{
		$data = $this->db
		->select('bm.*, dosen.nama_dosen, dosen.NIDN')
		->from('bimbingan_mhs bm')
		->join('dosen', 'dosen.NIDN = bm.id_pembimbing1', 'left')
		->where('bm.id', $id)
		->get()->row();

		return $data;
	}

}
