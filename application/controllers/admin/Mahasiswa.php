<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->simple_login->cek_login_admin();
		$this->load->model('mahasiswa_model', 'mahasiswa');
		$this->load->model('prodi_model', 'prodi');
	}

	public function output_json($data, $encode = true)
  	{
	    if ($encode) $data = json_encode($data);
	    $this->output->set_content_type('application/json')->set_output($data);
  	}

	public function index()
	{
		// $mahasiswa = $this->mahasiswa->getAllMahasiswa();

		$data = [	'title'		=> 'Data Mahasiswa',
                    'isi'		=> 'admin/mahasiswa/list' ];
                    
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function get_ajax() {

        $list = $this->mahasiswa->get_datatables();

        $data = array();
        $no = @$_POST['start'];

        foreach ($list as $mhs) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $mhs->nim;
            $row[] = $mhs->nama_lengkap;
             $row[] = $mhs->nama_prodi;
            $row[] = $mhs->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan';
            $row[] = $mhs->no_wa;
            // add html for action
            $row[] = '
            <a href="'.base_url("admin/mahasiswa/detail/".$mhs->nim).'" title="Detail" class="btn btn-success btn-flat btn-sm"><i class="fa fa-eye"></i> Detail</a>
           <a href="'.base_url("admin/mahasiswa/edit/".$mhs->nim).'" title="Edit" class="btn btn-warning btn-flat btn-sm"><i class="fa fa-edit"></i> Edit</a>
             <button onclick="delete_mahasiswa('.$mhs->nim.')" title="Delete" class="btn btn-danger btn-flat btn-sm"><i class="fa fa-trash"></i> Delete</button>
                   ';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->mahasiswa->count_all(),
                    "recordsFiltered" => $this->mahasiswa->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }
	
	public function tambah()
	{
		$data['prodi']	= $this->prodi->getAllProdi();
		$data['title']	= 'Admin ~ Tambah mahasiswa';
		$data['isi']	= 'admin/mahasiswa/tambah';

		$this->load->view('admin/layout/wrapper', $data, FALSE);

	}

	public function simpan()
	{
		cek_ajax();

		// cek nim apakah sudah terdaftar di sistem
		$nim = $this->input->post('nim');
		$cek_nim = $this->mahasiswa->cekNim($nim);

		if ($cek_nim->num_rows() > 0) {

			$pesan = [
				'status'	=> false,
				'pesan'		=> 'Nim sudah terdaftar di sistem',
			];
			
			$this->output_json($pesan);

		}else{

			$data['id_prodi']			= $this->input->post('id_prodi');
			$data['nim'] 				= $this->input->post('nim');
			$data['nama_lengkap'] 		= $this->input->post('nama_mahasiswa');
			$data['no_wa'] 				= $this->input->post('no_wa');
			$data['password'] 			= sha1($this->input->post('password'));
			$data['jenis_kelamin'] 		= $this->input->post('jenis_kelamin');
			$data['hak_akses'] 			= "mahasiswa";
			$data['join'] 				= date('Y-m-d');
			$data['status_daftar_ujian']= 0;

			$this->mahasiswa->tambah($data);
			$pesan = [
				'status'	=> true,
				'pesan'		=> 'Mahasiwa berhasil di tambah!',
			];
			
			$this->output_json($pesan);
		}
	}


	public function edit($nim)
	{

		$data['prodi']		= $this->prodi->getAllProdi();
		$data['mahasiswa']	= $this->mahasiswa->getMahasiswa($nim);
		$data['title']		= 'Admin ~ Edit mahasiswa';
		$data['isi']		= 'admin/mahasiswa/edit';

		$this->load->view('admin/layout/wrapper', $data, FALSE);

	}

	public function update()
	{
		cek_ajax();

		$data['id_prodi']			= $this->input->post('id_prodi');
		$data['nim'] 				= $this->input->post('nim');
		$data['nama_lengkap'] 		= $this->input->post('nama_mahasiswa');
		$data['no_wa'] 				= $this->input->post('no_wa');
		$data['password'] 			= sha1($this->input->post('password'));
		$data['jenis_kelamin'] 		= $this->input->post('jenis_kelamin');
		$data['hak_akses'] 			= "mahasiswa";
		$data['join'] 				= date('Y-m-d');
		$data['status_daftar_ujian']= 0;

		$this->mahasiswa->update_mhs($data);
		$pesan = [
			'status'	=> true,
			'pesan'		=> 'Mahasiwa berhasil di di update!',
		];
		
		$this->output_json($pesan);
		
	}


	public function detail($nim)
	{
		$mahasiswa 	= $this->mahasiswa->detail($nim);
		$info1		= $this->mahasiswa->getInfo1($nim);

		if ($info1 != null && $info1->id_pembimbing1 != null && $info1->id_pembimbing2 != null ) {
			$pemb1		= $this->mahasiswa->getPemb1($info1->id_pembimbing1);	
			$pemb2		= $this->mahasiswa->getPemb2($info1->id_pembimbing2);
		}else{
			$pemb1 = "";
			$pemb2 = "";
		}

		// info 2
		$info2 = $this->mahasiswa->getInfo2($nim);

		$data = [
			'title'		=> 'Detail mahasiswa ',
			'mahasiswa'	=> $mahasiswa,
			'info1'		=> $info1,
			'pemb1'		=> $pemb1,
			'pemb2'		=> $pemb2,
			'info2'		=> $info2,
			'isi'		=> 'admin/mahasiswa/detail'];

		$this->load->view('admin/layout/wrapper', $data);
	}


	public function delete_mahasiswa()
	{
		cek_ajax();

	    $nim 	= $this->input->post('nim');
		$mahasiswa 	= $this->db->get_where('pengguna', ['nim' => $nim])->row();

		if (!empty($mahasiswa->image)) {
	      unlink('./assets/img/profile_pengguna/'.$mahasiswa->image);
	    }

		$this->db->where('nim', $nim)->delete('pengguna');

	    $pesan = [
	      'status' => true,
	      'pesan'  => 'data berhasil di hapus',
	      'nama'   => $mahasiswa->nama_lengkap
	    ];

	    $this->output_json($pesan);

		
	}


	public function cetak()
	{
		$mahasiswa = $this->mahasiswa->getAllMahasiswa();

		$data = [	'title'		=> 'Data Mahasiswa',
					'mahasiswa'	=> $mahasiswa];

		$html = $this->load->view('admin/mahasiswa/list', $data, true);

		$mpdf = new \Mpdf\Mpdf();
		$mpdf->WriteHtml($html);
		$mpdf->output('P');
	}


}