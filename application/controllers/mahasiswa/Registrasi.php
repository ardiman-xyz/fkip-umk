<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mahasiswa_model', 'mahasiswa');
        $this->load->model('prodi_model', 'prodi');
        $this->load->model('konfigurasi_model', 'konfigurasi');
        $this->load->model('dosen_model', 'dosen');
        $this->load->model('registrasi_model', 'registrasi');
        $this->load->model('user_model', 'user');


	}

    private function output_json($data, $encode = true)
    {
        if ($encode) $data = json_encode($data);
        $this->output->set_content_type('application/json')->set_output($data);
    }

	public function index()
	{
		$nim = $this->session->userdata('nim');

		$data['data'] = $this->registrasi->getDataByNim($nim);
        $data['title']  = 'Mahasiswa';
        $data['isi']    = 'mahasiswa/registrasi_list';
                    
        $this->load->view('mahasiswa/layout/wrapper', $data, FALSE);
	}

	public function registrasi()
	{

		$data['user'] = $this->user->getPengguna($this->session->userdata('nim'));
        $data['dosen'] = $this->dosen->getAllDosen();
        $data['prodi'] = $this->prodi->getAllProdi();
        $data['title']  = 'Mahasiswa | Registrasi';
        $data['isi']    = 'mahasiswa/registrasi';
                    
        $this->load->view('mahasiswa/layout/wrapper', $data, FALSE);
    }

    public function simpan()
    {   

        cek_ajax();

        $id['nim'] = $this->input->post('nim');
        $cek = $this->db->get_where('bimbingan_mhs', $id);

        if ($cek->num_rows() == null) {
            $config['upload_path']      = './assets/img/registrasi/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = '2072';
            $config['encrypt_name']     = true;
            
            $this->load->library('upload', $config);
            $data1 = $this->upload->data();
            
            if ( ! $this->upload->do_upload('foto')){

                $output = [
                    'status'    => false,
                    'message'   => $this->upload->display_errors()
                ];

                $this->output->set_content_type('application/json')->set_output(json_encode($output));
            }
            else{

                $data['nama_mhs']       = $this->input->post('nama', true);
                $data['nim']            = $this->input->post('nim', true);
                $data['id_pembimbing1'] = $this->input->post('pembimbing1', true);
                $data['id_prodi']       = $this->input->post('prodi', true);
                $data['judul']          = $this->input->post('judul', true);
                $data['foto']           = $this->upload->data('file_name');
                $data['status']         = 'Pending';

                $simpan = $this->registrasi->simpan($data);

                // update status ujian di tabel pengguna mahasiswa = 1

                $this->db->where('nim', $this->session->userdata('nim'));
                $this->db->update('pengguna', ['status_daftar_ujian' => 1]);

                $output = [
                    'status'    => true,
                    'message'   => '<b>Sukses !</b> Anda berhasil Mengajukan judul, Silahkan klik <b>Kembali</b>'
                ];
                $this->output->set_content_type('application/json')->set_output(json_encode($output));
                
            }

        }else{
             $output = [
                'status'    => false,
                'message'   => '<b>Gagal !</b> Anda sudah pernah megajukan judul'
            ];

            $this->output->set_content_type('application/json')->set_output(json_encode($output));
        }
    }

    public function edit($id)
    {
        $data['prodi'] = $this->prodi->getAllProdi();
        $data['user'] = $this->user->getPengguna($this->session->userdata('nim'));   
        $data['data'] = $this->mahasiswa->getDataEdit($id);
        $data['dosen'] = $this->dosen->getAllDosen();
        $data['title']  = 'Mahasiswa | Edit pengajuan judul';
        $data['isi']    = 'mahasiswa/edit_pengajuan_judul';
                    
        $this->load->view('mahasiswa/layout/wrapper', $data, FALSE);
    }

    public function update_pengajuan()
    {
        cek_ajax();
        $id['nim'] = $this->input->post('nim');
        $cek = $this->db->get_where('bimbingan_mhs', $id)->row();
        $path = 'assets/img/registrasi/';

        $config['upload_path']      = './assets/img/registrasi/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']         = '2072';
        $config['encrypt_name']     = true;
        $this->load->library('upload', $config);

        if($_FILES['foto']['name'] !== ''){

            $this->upload->do_upload('foto');
            $data1 = $this->upload->data();
            $foto = $data1['file_name'];
            // hapus file di directory
            unlink($path.$cek->foto);

            $data['id_pembimbing1']   = $this->input->post('pembimbing1', true);
            $data['judul']            = $this->input->post('judul', true);
            $data['foto']             = $foto;

            $this->db->where('id',$this->input->post('id'));
            $this->db->update('bimbingan_mhs',$data);

            $output = [
                'status'    => true,
                'message'   => '<b>Sukses! update dengan gambar</b> '
            ];

            $this->output->set_content_type('application/json')->set_output(json_encode($output));

        }else{
            $data['id_pembimbing1']   = $this->input->post('pembimbing1', true);
            $data['judul']            = $this->input->post('judul', true);

            $this->db->where('id',$this->input->post('id'));
            $this->db->update('bimbingan_mhs',$data);

            $output = [
                'status'    => true,
                'message'   => '<b>sukse !</b> berhasil tanpa gambar'
            ];

            $this->output->set_content_type('application/json')->set_output(json_encode($output));
        }
       
    }

    public function hapus($id)
    {
        $data = $this->db->get_where('bimbingan_mhs', ['id' => $id])->row();
        
        // unlik foto
        unlink('assets/img/registrasi/'.$data->foto);

        $this->db->where('id', $id);
        $this->db->delete('bimbingan_mhs');

        redirect('mahasiswa/registrasi');
    }


}