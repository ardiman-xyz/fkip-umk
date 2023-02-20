<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tendik_model extends CI_Model {


	//start dataTable server side

	var $column_order = array(null, 'nim', 'nama_lengkap', 'jenis_kelamin'); //set column field database for datatable orderable
    var $column_search = array('nim', 'nama_lengkap', 'jenis_kelamin'); //set column field database for datatable searchable
    var $order = array('nim' => 'asc'); // default order
 
    private function _get_datatables_query() {
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->where('id_prodi', $this->session->userdata('prodi'));
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


	function getDataMahasiswa()
	{
		$this->db->select('bimbingan_mhs.*,prodi.nama_prodi');
		$this->db->from('bimbingan_mhs');
		$this->db->join('prodi', 'bimbingan_mhs.id_prodi = prodi.id_prodi', 'left');
		$this->db->where('prodi.id_prodi', $this->session->userdata('prodi'));
		$this->db->order_by('id', 'desc');

		$query = $this->db->get();
		return $query->result();
	}

	function getByNim($nim)
	{
		$this->db->where('nim', $nim);
		return $this->db->get('bimbingan_mhs')->row();
	}

	function getById($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('bimbingan_mhs')->row();
	}

	function nama_prodi($id_prodi)
	{
		$query = $this->db->query("SELECT * FROM prodi WHERE id_prodi = '$id_prodi'");
		if ($query->num_rows() > 0 ) {
			$data = $query->row();
			$hasil = $data->nama_prodi;
		}else{
			$hasil = '';
		}

		return $hasil;
	}


	public function jumlah_mhs()
	{
		$id_prodi = $this->session->userdata('prodi');

		$query = $this->db->query("SELECT count(*) AS jumlah FROM bimbingan_mhs WHERE id_pembimbing2 = '' AND id_prodi = $id_prodi");
		return $query->row()->jumlah;
	}


	public function get_surat_pengajuan_judul()
	{	
		$id_prodi = $this->session->userdata('prodi');

		$this->db->order_by('id', 'desc');
		$data = $this->db->get_where('pengajuan_judul', ['prodi' => $id_prodi]);

		return $data->result();
	}

	public function get_surat_cuti()
	{	
		$id_prodi = $this->session->userdata('prodi');

		$this->db->order_by('id_cuti', 'desc');
		$data = $this->db->get_where('surat_cuti', ['prodi' => $id_prodi]);

		return $data->result();
	}

	public function get_surat_aktif_kuliah()
	{	
		$id_prodi = $this->session->userdata('prodi');

		$this->db->order_by('id_aktif_kuliah', 'desc');
		$data = $this->db->get_where('surat_aktif_kuliah', ['prodi' => $id_prodi]);

		return $data->result();
	}

	public function get_surat_beasiswa()
	{	
		$id_prodi = $this->session->userdata('prodi');

		$this->db->order_by('id', 'desc');
		$data = $this->db->get_where('surat_tidak_menrima_beasiswa', ['id_prodi' => $id_prodi]);

		return $data->result();
	}


	function update($table, $data, $pk, $id)
	{
		$result = $this->db->update($table, $data, array($pk => $id));
		return $result;
	}

	public function get_mahasiswa($table, $nim)
	{
		return $this->db->get_where($table, ['nim' => $nim]);
	}

	function resetPasswordMhs($nim, $pass)
	{
		$result = $this->db->query("UPDATE pengguna set password = sha1('$pass') where nim='$nim'");
		return $result;
	
	}

	public function story_daftar($nim)
	{
		return $this->db->get_where('daftar_ujian', ['nim' => $nim])->result();
	}

	public function detail_mhs($nim)
	{
		$data = $this->db
		->select('pg.*, du.no_hp')
		->from('pengguna pg')
		->join('daftar_ujian du', 'du.nim = pg.nim', 'left')
		->where(['du.nim' => $nim])
		->get();

		if ($data->num_rows() > 0) {
			$hasil = $data->row();
		}else{
			$hasil = "";
		}

		return $hasil;
	}

	public function get_jenis_ujian($id)
	{
		$data = $this->db->get_where('jenis_ujian', ['id_ujian' => $id]);

		if ($data->num_rows() > 0) {
			$hasil = $data->row()->nama_ujian;
		}else{
			$hasil = "";
		}

		return $hasil;

	}

	public function get_data_dosen($search)
	{
		$data = $this->db->select('*')
		->from('dosen')
		->like('nama_dosen', $search)
		->or_like('NIDN', $search)
		->get()->result_array();

		return $data;
	}

	public function get_pemb1()
	{
		$data = $this->db
		->select('insentif_pemb1')
		->from('config_rab')
		->get()->row();

		return $data;
	}

	public function get_pemb2()
	{
		$data = $this->db
		->select('insentif_pemb2')
		->from('config_rab')
		->get()->row();

		return $data;
	}

	public function get_rab_pemb1($id_surat)
	{
		$data = $this->db
		->select('r1.*,d.nama_dosen')
		->from('rab_pemb1 r1')
		->join('dosen d', 'd.id_dosen = r1.nama', 'left')
		->where('r1.id_surat', $id_surat)
		->get()->result();

		return $data;
	}

	public function get_rab_pemb2($id_surat)
	{
		$data = $this->db
		->select('r2.*,d.nama_dosen')
		->from('rab_pemb2 r2')
		->join('dosen d', 'd.id_dosen = r2.nama', 'left')
		->where('r2.id_surat', $id_surat)
		->get()->result();

		return $data;
	}

	public function upload_file($filename){
    $this->load->library('upload'); // Load librari upload
    
    $config['upload_path'] = './excel/';
    $config['allowed_types'] = 'xlsx';
    $config['max_size']  = '2048';
    $config['overwrite'] = true;
    $config['file_name'] = $filename;
  
    $this->upload->initialize($config); // Load konfigurasi uploadnya
    if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
      // Jika berhasil :
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      // Jika gagal :
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }
  
  // Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
  public function insert_multiple($data){
    $this->db->insert_batch('pengguna', $data);
}


	public function get_pengelola($id_surat)
	{
		$this->db->select('*');
		$this->db->from('rab_insentif_pengelola');
		$this->db->where('id_surat', $id_surat);
		$this->db->order_by('id', 'asc');

		$query = $this->db->get();
		return $query->result();
	}


	public function getRab()
	{
		$id_prodi = $this->session->userdata('prodi');

		$this->db->order_by('id', 'desc');
		$data = $this->db
				->select('rab.*,ju.nama_ujian')
				->from('rab_ujian_surat rab')
				->join('jenis_ujian ju', 'ju.id_ujian = rab.id_jenis_ujian', 'left')
				->where('id_prodi', $id_prodi)
				->get()->result();

		return $data;

	}

	public function search_dosen($params)
	{
		$this->db->like('nama_dosen', $params , 'both');
        $this->db->order_by('nama_dosen', 'ASC');
        $this->db->limit(10);
        return $this->db->get('dosen')->result();
	}

	public function search_mahasiswa($params)
	{
		$this->db->like('nama_mhs', $params , 'both');
        $this->db->order_by('nama_mhs', 'ASC');
        $this->db->limit(10);
        return $this->db->get('bimbingan_mhs')->result();
	}


	// raw

	public function getDataConfigRaw()
	{
		return $this->db->get('raw_konfig')->row();
	}

	public function getDataRaw()
	{
		$id_prodi = $this->session->userdata('prodi');
		$this->db->order_by('id', 'desc');
		return $this->db->get_where('raw', ['id_prodi' => $id_prodi])->result();
	}

	public function getJmlPengelolaRaw($id_raw)
	{
	    $this->db->order_by('id', 'asc');
		return $this->db->get_where('raw_pengelola', ['id_raw' => $id_raw])->result();
	}

	public function getDataRawDetail($id_raw)
	{
		$id_prodi = $this->session->userdata('prodi');

		$data = $this->db
				->select('raw.*')
				->from('raw')
				->where(['raw.id_raw' => $id_raw, 'raw.id_prodi' => $id_prodi])
				->get()->row();

		return $data;
	}
	
	public function getKasProdi($id_prodi)
	{
		$this->db->order_by('id', 'desc');
		return $this->db->get_where('kas_prodi', ['id_prodi' => $id_prodi])->result();
	}
	
	public function get_saldo_terakhir()
	{
		$id_prodi = $this->session->userdata('prodi');
		$this->db->order_by('id', 'desc');
		$this->db->select('*');
		$this->db->from('kas_prodi');
		$this->db->where('id_prodi', $id_prodi);
		$this->db->limit(1);
		return $this->db->get()->row();	
	}
	
	public function upload_bukti_rab($data = array()){ 
        $insert = $this->db->insert_batch('rab_bukti',$data); 
        return $insert?true:false; 
    } 
    
    public function pemasukan()
	{
		$id_prodi = $this->session->userdata('prodi');

		$this->db->select_sum('jumlah');
		$this->db->from('kas_prodi');
		$this->db->where(['id_prodi' => $id_prodi, 'jenis' => 'M']);
		return $this->db->get()->row();	
	}

	public function pengeluaran()
	{
		$id_prodi = $this->session->userdata('prodi');

		$this->db->select_sum('jumlah');
		$this->db->from('kas_prodi');
		$this->db->where(['id_prodi' => $id_prodi, 'jenis' => 'K']);
		return $this->db->get()->row();	
	}
	
	public function update_status_mhs($data, $pk)
    {
    	$this->db->where_in($pk, $data);
        $this->db->set('status', 1);
        return $this->db->update('pengguna');
    }

}

/* End of file Tendik_model.php */
/* Location: ./application/models/Tendik_model.php */