<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penawaran extends CI_Controller {

	protected $bukti_pembayaran;
	protected $khs;
	protected $krs;
	protected $sc_kuisioner;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('penawaranModel', 'penawaran');
		$this->load->model('konfigurasi_model', 'konfigurasi');
		$this->load->model('user_model', 'user');
		$this->load->model('prodi_model', 'prodi');
		$this->load->model('dosen_model', 'dosen');
		$this->form_validation->set_error_delimiters('', '');
	}

	public function output_json($data, $encode = true)
	{
		if ($encode) $data = json_encode($data);
		$this->output->set_content_type('application/json')->set_output($data);
	}


	public function index()
	{
		$data['dosen']	= $this->dosen->getAllDosen();
		$data['data']	= $this->penawaran->getDataPenawaranByNim($this->session->userdata('nim'))->result();
		$data['title']	= 'Mahasiswa ~ Penawaran';
        $data['isi']	= 'mahasiswa/penawaran';
                    
		$this->load->view('mahasiswa/layout/wrapper', $data, FALSE);
	}

	public function cari_dosen_ajax()
	{
		cek_ajax();

		if (isset($_GET['term'])) {
            $result = $this->penawaran->search_dosen($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = [
                	'label'	=> $row->nama_dosen,
                	'id_dosen'	=> $row->id_dosen
                ];
                echo json_encode($arr_result);
            }
        }
	}

	function simpan()
	{
	
	    $config['upload_path'] 		= './assets/upload/mahasiswa/penawaran/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|pdf';
		$config['max_size']  		= '2400'; //max besar file 2 mb
		$config['encrypt_name']		= true;
		$this->load->library('upload', $config);

		if ( !$this->upload->do_upload('bukti_pembayaran')){			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">bukti pembayaran'.$this->upload->display_errors().'</div>');
			redirect('mahasiswa/penawaran');
		}else{

			$data1 = $this->upload->data();
			$this->bukti_pembayaran = $data1['file_name'];
		}

		if ( !$this->upload->do_upload('khs')){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">KHS'.$this->upload->display_errors().'</div>');
			redirect('mahasiswa/penawaran');
		}else{

			$data1 = $this->upload->data();
			$this->khs = $data1['file_name'];
		}

		if ( !$this->upload->do_upload('krs')){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">KRS'.$this->upload->display_errors().'</div>');
			redirect('mahasiswa/penawaran');
		}else{

			$data1 = $this->upload->data();
			$this->krs = $data1['file_name'];
		}

		if ( !$this->upload->do_upload('sc_kuisioner')){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Screenshoot kuisioner'.$this->upload->display_errors().'</div>');
			redirect('mahasiswa/penawaran');
		}else{

			$data1 = $this->upload->data();
			$this->sc_kuisioner = $data1['file_name'];
		}


		$data = [
			'id_dosen' 	=> $this->input->post('nama_dosen_pa'),
			'nim'		=> $this->session->userdata('nim'),
			'bukti_pembayaran' => $this->bukti_pembayaran,
			'khs'		=> $this->khs,
			'krs'		=> $this->krs,
			'sc_kuisioner'	=> $this->sc_kuisioner,
			'date_created' => date('Y-m-d')
		];

		$this->db->insert('penawaran_mhs', $data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success">Data berhasil di kirim</div>');
			redirect('mahasiswa/penawaran');
		
	}


	public function download($nim)
	{
		$data['nama_mhs'] 	= $this->db->get_where('pengguna', ['nim' => $nim])->row()->nama_lengkap;
		$id_prodi 			= $this->db->get_where('pengguna', ['nim' => $nim])->row()->id_prodi;
		$data['prodi'] 		= $this->prodi->nama_jurusan($id_prodi);
		$data['data'] 		= $this->penawaran->getDataPenawaranByNim($nim)->row();
		$data['matakuliah'] = $this->penawaran->getMatakuliah($nim);
		$data['nama_pa']	= $this->dosen->get_nama_dosen($data['data']->id_dosen);

		$html = $this->load->view('mahasiswa/download_penawaran', $data, true);

		$this->simple_login->pdfGenerator($html, 'penawaran', 'A4', 'potrait');
	}

	public function edit($nim)
	{
		$data['data']			= $this->penawaran->getDataPenawaranByNim($nim)->row();
		$data['matakuliah']		= $this->penawaran->getMatakuliah($nim);
		$data['nama_dosen_pa']  = $this->dosen->get_nama_dosen($data['data']->id_dosen);
		$data['title']			= 'Mahasiswa ~ Penawaran';
        $data['isi']			= 'mahasiswa/edit_penawaran';
                    
		$this->load->view('mahasiswa/layout/wrapper', $data, FALSE);
	}

	public function update()
	{
		cek_ajax();

		$nim 	= $this->input->post('nim');
		$dt 	= $this->penawaran->getDataPenawaranByNim($nim)->row();
		$path 	=  'assets/upload/mahasiswa/penawaran/';

		$config['upload_path'] 		= './assets/upload/mahasiswa/penawaran/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|pdf';
		$config['max_size']  		= '2400'; //max besar file 2 mb
		$config["overwrite"] 		= true;
		$this->load->library('upload', $config);

		if ($_FILES['bukti_pembayaran']['name'] !== '') {
			$this->upload->do_upload('bukti_pembayaran');
			$data1 = $this->upload->data();
			$this->bukti_pembayaran = $data1['file_name'];
			// hapus file di directory
			unlink($path.$dt->bukti_pembayaran);
		}else{
			$this->bukti_pembayaran = $dt->bukti_pembayaran;
		}


		if ($_FILES['khs']['name'] !== '') {
				$this->upload->do_upload('khs');
				$data1 = $this->upload->data();
				$this->khs = $data1['file_name'];
				// hapus file di directory
				unlink($path.$dt->khs);
		}else{
			$this->khs = $dt->khs;
		}

		if ($_FILES['krs']['name'] !== '') {
				$this->upload->do_upload('krs');
				$data1 = $this->upload->data();
				$this->krs = $data1['file_name'];
				// hapus file di directory
				unlink($path.$dt->krs);
		}else{
			$this->krs = $dt->krs;
		}


		if ($_FILES['sc_kuisioner']['name'] !== '') {
				$this->upload->do_upload('sc_kuisioner');
				$data1 = $this->upload->data();
				$this->sc_kuisioner = $data1['file_name'];
				// hapus file di directory
				unlink($path.$dt->sc_kuisioner);
		}else{
			$this->sc_kuisioner = $dt->sc_kuisioner;
		}
		$data = [
			'id_dosen' 			=> $this->input->post('nama_dosen_pa'),
			'nim'				=> $this->session->userdata('nim'),
			'bukti_pembayaran'	=> $this->bukti_pembayaran,
			'khs'				=> $this->khs,
			'krs'				=> $this->krs,
			'sc_kuisioner'		=> $this->sc_kuisioner,
			'date_created' 		=> date('Y-m-d')
		];

		$this->penawaran->update($nim, $data);

		$msg = [
				'status' => true,
				'pesan'	 => 'data berhasil di update'
			];
		echo $this->output_json($msg);
	}

	public function hapus($id)
	{
		$data = $this->db->get_where('penawaran_mhs', ['id' => $id])->row();
		$path = 'assets/upload/mahasiswa/penawaran/';

		if (!empty($data)) {
			
			unlink($path.$data->bukti_pembayaran);
			unlink($path.$data->khs);
			unlink($path.$data->krs);
			unlink($path.$data->sc_kuisioner);

			$this->db->where('id', $id)->delete('penawaran_mhs');
			$this->db->where('nim', $data->nim)->delete('penawaran_mk_mhs');

			$this->session->set_flashdata('sukses', '<div class="alert alert-block alert-success text-center"> <i class="fa fa-warning"></i> Data berhasil di hapus</div>');
			redirect('mahasiswa/penawaran');

		}else{
			echo "no data";
		}
		
	}
	
	public function tambah()
	{
		$data['dosen']	= $this->dosen->getAllDosen();
		$data['title']			= 'Mahasiswa | Tambah penawaran';
        $data['isi']			= 'mahasiswa/tambah_penawaran';
                    
		$this->load->view('mahasiswa/layout/wrapper', $data, FALSE);
	}

	public function simpan_penawaran()
	{
		$config['upload_path'] 		= './assets/upload/mahasiswa/penawaran/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|pdf';
		$config['max_size']  		= '2400'; //max besar file 2 mb
		$config['encrypt_name']		= true;
		$this->load->library('upload', $config);

		if ( !$this->upload->do_upload('bukti_pembayaran')){			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">bukti pembayarang'.$this->upload->display_errors().'</div>');
			redirect('mahasiswa/penawaran');
		}else{

			$data1 = $this->upload->data();
			$this->bukti_pembayaran = $data1['file_name'];
		}

		if ( !$this->upload->do_upload('khs')){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">KHS'.$this->upload->display_errors().'</div>');
			redirect('mahasiswa/penawaran');
		}else{

			$data1 = $this->upload->data();
			$this->khs = $data1['file_name'];
		}

		if ( !$this->upload->do_upload('krs')){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">KRS'.$this->upload->display_errors().'</div>');
			redirect('mahasiswa/penawaran');
		}else{

			$data1 = $this->upload->data();
			$this->krs = $data1['file_name'];
		}

		if ( !$this->upload->do_upload('sc_kuisioner')){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Screenshoot kuisioner'.$this->upload->display_errors().'</div>');
			redirect('mahasiswa/penawaran');
		}else{

			$data1 = $this->upload->data();
			$this->sc_kuisioner = $data1['file_name'];
		}


		$data = [
			'id_dosen' 	=> $this->input->post('nama_dosen_pa'),
			'nim'		=> $this->session->userdata('nim'),
			'bukti_pembayaran' => $this->bukti_pembayaran,
			'khs'		=> $this->khs,
			'krs'		=> $this->krs,
			'sc_kuisioner'	=> $this->sc_kuisioner,
			'semester' => $this->input->post('semester'),
			'thn_akademik' => $this->input->post('tahun_akademik'),
			'date_created' => date('Y-m-d')
		];

		$this->db->insert('penawaran_mhs', $data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success">Data berhasil di kirim</div>');
			redirect('mahasiswa/penawaran');
	}

}

/* End of file Penawaran.php */
/* Location: ./application/controllers/mahasiswa/Penawaran.php */