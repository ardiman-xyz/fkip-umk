<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        $this->simple_login->cek_login_admin();
		    $this->load->model('dosen_model', 'dosen');
        $this->load->model('prodi_model', 'prodi');
	}

  public function output_json($data, $encode = true)
  {
    if ($encode) $data = json_encode($data);
    $this->output->set_content_type('application/json')->set_output($data);
  }


	public function index()
	{
        $dosen = $this->dosen->getAllDosen();
		
        $data = [	'title' => 'List dosen',
                  'dosen' => $dosen,
                  'isi'		=> 'admin/dosen/list' ];
                    
		$this->load->view('admin/layout/wrapper', $data, FALSE);
    }
    
  public function tambah()
	{
		
    $prodi = $this->prodi->getAllProdi();
	
		$data = [	'title'		=> 'Tambah Dosen',
              'prodi'   => $prodi,
					     'isi'		=> 'admin/dosen/tambah' ];
		$this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  public function simpan()
  {
    cek_ajax();

    $nidn = $this->input->post('nidn');
    $cek = $this->dosen->cekNidn($nidn);

    // jika nidn nya kosong, maka  kita random
    if ($nidn == '') {
      $nidn_baru = 'RD'.rand(123456,999999);
    }else{
      $nidn_baru = $nidn;
    }

    // cek apakah di database sudah terdapat nidn yang sama
    if (!$cek) {
       $foto = $_FILES['foto']['name'];

      if ($foto) {
          $config['allowed_types']  = 'png|jpg|jpeg|gif';
          $config['max_size']       = '2048';
          $config['upload_path']    = './assets/img/dosen/';
          $config['encrypt_name']   = true;
          
          $this->load->library('upload', $config);
          
          if ( ! $this->upload->do_upload('foto')){

            $pesan = [
              'status' => false,
              'pesan'  => $this->upload->display_errors() 
            ];

            $this->output_json($pesan);
            
          }else{

            $foto = $this->upload->data('file_name');

            $data = [
              'id_prodi'      => $this->input->post('id_prodi'),
              'nama_dosen'    => $this->input->post('nama_dosen'),
              'NIDN'          => $nidn_baru,
              'agama'         => $this->input->post('agama'),
              'email_dosen'   => $this->input->post('email'),
              'telepon_dosen' => $this->input->post('no_telp'),
              'alamat_dosen'  => $this->input->post('alamat'),
              'jenis_kelamin' => $this->input->post('jenis_kelamin'),
              'status'        => 'Aktif',
              'ttl_dosen'     => $this->input->post('tgl_lahir'),
              'foto_dosen'    => $foto,
              'dibuat'        => date('Y-m-d H:i:s'),
              'password'      => $nidn_baru
            ];

            // insert ke tabel dosen
            $this->dosen->tambah($data);

            // insert ke tabel informasi_dosen
            $infoDosen = [
              'nidn_dosen'    => $nidn_baru,
              'profil_dosen'  => '-',
              'penelitian'    => '-',
              'publikasi'     => '-',
              'pengajaran'    => '-',
              'rip'           => '-' 
            ];
            $this->db->insert('informasi_dosen', $infoDosen);

            // berikan pesan dengan respon json
             $pesan = [
              'status' => true,
              'pesan'  => 'Data dosen berhasil di simpan'
            ];

            $this->output_json($pesan);
            
          }
      } else {
        $pesan = [
          'status' => false,
          'pesan'  => 'Gagal! Tidak ada foto yang di upload'
        ];
        $this->output_json($pesan);
      }
    }else{
      $pesan = [
          'status' => false,
          'pesan'  => 'NIDN sudah terdaftar di sistem, gunakan yang lain'
        ];

        $this->output_json($pesan);
    }

   
    
  }
    

  public function edit($id_dosen)
	{
        $dosen = $this->dosen->get_by_id($id_dosen);
        $prodi = $this->prodi->getAllProdi();
        $data = [ 'title'   => 'Edit dosen',
                   'dosen'  => $dosen,
                   'prodi'  => $prodi,
                   'isi'     => 'admin/dosen/edit'
                ];

      $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  public function update()
  {
    
    $id_dosen = $this->input->post('id_dosen');
    $dosen = $this->dosen->get_by_id($id_dosen);
    $nidn = $this->input->post('nidn');

    // jika nidn nya kosong, maka  kita random
    if ($nidn == '') {
      $nidn_baru = 'RD'.rand(123456,999999);
    }else{
      $nidn_baru = $nidn;
    }

      if(!empty($_FILES['foto']['name'])){
        $config['upload_path']    = './assets/img/dosen/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';
        $config['max_size']       = '2400';
        $config['max_width']      = '2024';
        $config['max_height']     = '2024';
      
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('foto')){
        
          $pesan = [
              'status' => false,
              'pesan'  => $this->upload->display_errors() 
            ];
           $this->output_json($pesan);            

        }else{
        // masuk database

        $foto = $_FILES['foto']['name'];

        if ($dosen->foto_dosen !="") {
          unlink('assets/img/dosen/'.$dosen->foto_dosen);
        }

         $data = [
              'id_dosen'      => $id_dosen,
              'id_prodi'      => $this->input->post('id_prodi'),
              'nama_dosen'    => $this->input->post('nama_dosen'),
              'NIDN'          => $nidn_baru,
              'agama'         => $this->input->post('agama'),
              'email_dosen'   => $this->input->post('email'),
              'telepon_dosen' => $this->input->post('no_telp'),
              'alamat_dosen'  => $this->input->post('alamat'),
              'jenis_kelamin' => $this->input->post('jenis_kelamin'),
              'status'        => 'Aktif',
              'ttl_dosen'     => $this->input->post('tgl_lahir'),
              'foto_dosen'    => $foto,
              'dibuat'        => date('Y-m-d H:i:s'),
              'password'      => $nidn_baru
            ];
       $this->dosen->edit($data);


      $pesan = [
          'status' => true,
          'pesan'  => $dosen->nama_dosen." Berhasil di update dengan gambar!"
        ];
      $this->output_json($pesan);  

    }} else {

      // proses edit tanpa mengganti gambar/foto

        $data = [
              'id_dosen'      => $id_dosen,
              'id_prodi'      => $this->input->post('id_prodi'),
              'nama_dosen'    => $this->input->post('nama_dosen'),
              'NIDN'          => $nidn_baru,
              'agama'         => $this->input->post('agama'),
              'email_dosen'   => $this->input->post('email'),
              'telepon_dosen' => $this->input->post('no_telp'),
              'alamat_dosen'  => $this->input->post('alamat'),
              'jenis_kelamin' => $this->input->post('jenis_kelamin'),
              'status'        => 'Aktif',
              'ttl_dosen'     => $this->input->post('tgl_lahir'),
              'dibuat'        => date('Y-m-d H:i:s'),
              'password'      => $nidn_baru
            ];

      $this->dosen->edit($data);
      $pesan = [
          'status' => true,
          'pesan'  => $dosen->nama_dosen." Berhasil di update tanpa gambar!"
        ];
      $this->output_json($pesan); 
    }

  }

  public function detail($id_dosen)
  {

    $data['dosen']                    = $this->dosen->getById($id_dosen);
    $data['info_dosen']               = $this->dosen->getInfoDosen($data['dosen']->NIDN);
    $data['id_dosen']               = $id_dosen;
    $data['jumlahMahasiswaBimbingan'] = $this->dosen->getMahasiswaBimbingan($data['dosen']->NIDN);
    $data['title']                    = "Admin ~ Detail dosen";
    $data['isi']                      = 'admin/dosen/detail_dosen';

    $this->load->view('admin/layout/wrapper', $data);
  }
  
  public function cetak_bimbingan($id_dosen) {

    $data['dosen']      = $this->db->get_where('dosen', ['id_dosen' => $id_dosen])->row();
    $data['bimbingan']  = $this->dosen->getMahasiswaBimbingan($data['dosen']->NIDN);
    
    $this->load->view('admin/dosen/cetak_bimbingan_mhs', $data);

  }


  public function biografi_dosen()
  {

    $data['dosen'] = $dosen = $this->dosen->getAllDosen();
    $data['title'] = "Form Biografi Dosen";
    $data['isi'] = 'admin/dosen/form_biografi';

    $this->load->view('admin/layout/wrapper', $data);

  }

  public function form_biografi()
  {
    $id_dosen = $this->input->post("id_dosen");

    $data['dosen'] = $this->dosen->get_by_id($id_dosen);
    $data['title'] = "Buat Biografi Dosen";
    $data['isi'] = 'admin/dosen/create_biografi';

    $this->load->view('admin/layout/wrapper', $data);

  }

  public function simpan_biografi()
  {

      $nidn = $this->input->post('nidn_dosen');

      $config['upload_path']          = './assets/img/dosen/rip_dosen/';
      $config['allowed_types']        = 'pdf';
      $config['max_size']             = 2048;
      $config['max_width']            = 2048;
      $config['max_height']           = 2048;
      $config['encrypt_name']         = true;

    $this->load->library('upload', $config);

     if ($this->upload->do_upload('rip')){


      $data['nidn_dosen'] = $nidn;
      $data['mhs_bimbingan'] = $this->input->post("jumlah_mhs");
      $data['rip'] = $this->upload->data('file_name');
      $this->db->insert('dsn_penelitian', $data);
    }
    $a = 0; //for looping
    $judul_penelitian = $this->input->post('judul_penelitian');

        if ($judul_penelitian[0] != null) {

            foreach ($judul_penelitian as $row) {
            
            $dt = [
              'nidn_dosen' => $nidn,
              'penelitian'  => $row,
            ];

            $insert = $this->db->insert('dsn_detail_penelitian',$dt);

              if ($insert) {
                $a++;
              }

          }
        }

          // insert anggota seminar menggunakan foreach
          $b = 0; //for looping
          $judul_penelitian_sedang = $this->input->post('judul_penelitian_sedang');

          if ($judul_penelitian_sedang[0] != null) {

              foreach ($judul_penelitian_sedang as $row) {
              
              $dt = [
                'nidn_dosen' => $nidn,
                'penelitian_sementara'  => $row
              ];

              $insert = $this->db->insert('dsn_penelitian_smt',$dt);

              if ($insert) {
                $b++;
              }

            }
        }

        // insert judul jurnal menggunakan foreach
          $c = 0; //for looping
          $judul_jurnal = $this->input->post('judul_jurnal');

          if ($judul_jurnal[0] != null) {

              foreach ($judul_jurnal as $row) {
              
              $dt = [
                'nidn_dosen' => $nidn,
                'jurnal'  => $row,
                'berkas_jurnal' => ''
              ];

              $insert = $this->db->insert('dsn_jurnal',$dt);

              if ($insert) {
                $c++;
              }

            }
        }

         // insert judul buku menggunakan foreach
          $d = 0; //for looping
          $judul_buku = $this->input->post('judul_buku');

          if ($judul_buku[0] != null) {

              foreach ($judul_buku as $row) {
              
              $dt = [
                'nidn_dosen' => $nidn,
                'buku'  => $row
              ];

              $insert = $this->db->insert('dsn_buku',$dt);

              if ($insert) {
                $d++;
              }

            }
        }

        // insert nama institusi menggunakan foreach
          $e = 0; //for looping
          $nama_institusi = $this->input->post('nama_institusi');

          if ($nama_institusi[0] != null) {

              foreach ($nama_institusi as $row) {
              
              $dt = [
                'nidn_dosen' => $nidn,
                'universitas'  => $row
              ];

              $insert = $this->db->insert('dsn_universitas',$dt);

              if ($insert) {
                $e++;
              }

            }
        }

        // insert nama matakuliah menggunakan foreach
          $e = 0; //for looping
          $nama_mk = $this->input->post('nama_mk');

          if ($nama_mk[0] != null) {

              foreach ($nama_mk as $row) {
              
              $dt = [
                'nidn_dosen' => $nidn,
                'matakuliah'  => $row
              ];

              $insert = $this->db->insert('dsn_matakuliah',$dt);

              if ($insert) {
                $e++;
              }

            }
        }



    $this->session->set_flashdata('sukses', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><strong>sukses ! </strong> Surat sukses di kirim! <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span aria-hidden="true">&times;</span></button></div>');
    redirect('admin/dosen/biografi_dosen');


  }

  public function save_biografi()
  {
    

      $config['upload_path']          = './assets/img/dosen/rip_dosen/';
      $config['allowed_types']        = 'pdf';
      $config['max_size']             = 2048;
      $config['max_width']            = 2048;
      $config['max_height']           = 2048;
      $config['encrypt_name']         = true;

    $this->load->library('upload', $config);

     if ($this->upload->do_upload('rip')){

      $data = [
        'nidn_dosen' => $this->input->post('nidn_dosen'),
        'penelitian' => $this->input->post('penelitian'),
        'publikasi' => $this->input->post('publikasi'),
        'pengajaran' => $this->input->post('pengajaran'),
        'rip'       => $this->upload->data('file_name')
      ];

      $insert = $this->db->insert('informasi_dosen', $data);

      if ($insert) {
         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><strong>info ! </strong> data sukes di insert</div>');
         redirect('admin/dosen/biografi_dosen');
      }else{
         $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert"><strong>info ! </strong> data gagal di insert</div>');
         redirect('admin/dosen/biografi_dosen');
      }
    }
  }
    

  public function delete_dosen()
	{

    cek_ajax();

    $id = $this->input->post('id_dosen');
		$dosen = $this->db->get_where('dosen', ['id_dosen' => $id])->row();

		if (!empty($dosen->foto_dosen)) {
      unlink('./assets/img/dosen/'.$dosen->foto_dosen);
    }

		$this->db->where('id_dosen', $id)->delete('dosen');

    $pesan = [
      'status' => true,
      'pesan'  => 'data berhasil di hapus',
      'nama'   => $dosen->nama_dosen
    ];

    $this->output_json($pesan);

		
	}

public function cari_mahasiswa()
{
  $nim = $this->input->post('nim');

  var_dump($nim);
}



}
