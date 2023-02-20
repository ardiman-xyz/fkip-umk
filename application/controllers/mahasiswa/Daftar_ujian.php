<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Daftar_ujian extends CI_Controller {
    
	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('nim'))) {
			redirect('mahasiswa/login');
		}
		
		$this->load->model('prodi_model', 'prodi');
		$this->load->model('surat_model', 'surat');
		$this->load->library('simple_login');
		$this->load->model('daftar_ujian_model', 'daftar_ujian');
		$this->load->model('konfigurasi_model', 'konfigurasi');
		$this->load->model('user_model', 'user');
	}

	public function index()
	{
		$nim = $this->session->userdata('nim');
		$data['data']	= $this->db->get_where('daftar_ujian', ['nim' => $nim])->result();
		$data['title']	= 'Mahasiswa | List daftar ujian';
        $data['isi']	= 'mahasiswa/list_daftar_ujian';
                    
		$this->load->view('mahasiswa/layout/wrapper', $data, FALSE);
	}

	public function daftar_form()
	{

		$data['prodi'] = $this->prodi->getAllProdi();
		$data['jenis_ujian'] = $this->daftar_ujian->getJenisUjian();
		$data['title']	= 'Mahasiswa | Daftar Ujian';
        $data['isi']	= 'mahasiswa/daftar_ujian';
                    
		$this->load->view('mahasiswa/layout/wrapper', $data, FALSE);
	}



	public function simpan()
	{
		$data['nim'] = $this->input->post('nim');
		$data['id_jenis_ujian'] = $this->input->post('jenis_ujian');
		
		// cek apakah mahasiswa sudah bisa daftar ujian
		$akses_daftar = $this->db->where('nim', $this->session->userdata('nim'))
						->get('pengguna')->row();
		// cek apakah mahasiwa sudah memiliki pembimbing II 
		$pembimbing = $this->db->where('nim', $this->session->userdata('nim'))
						->get('bimbingan_mhs')->row();

		// cek apakah mahasiswa sudah pernah mendaftar
		$cek = $this->db->get_where('daftar_ujian', $data);

		if ($akses_daftar->status_daftar_ujian === '0') {

			$this->session->set_flashdata('sukses', '<div class="alert alert-danger "><strong>Gagal ! </strong> Anda belum melakukan pengajuan judul! </div>');
                redirect('mahasiswa/daftar_ujian');
			
		}else{

			if (empty($pembimbing->id_pembimbing2)) {


			$this->session->set_flashdata('sukses', '<div class="alert alert-danger "><strong>Gagal ! </strong> Pembimbing II masih kosong, mohon menunggu atau laporkan ke prodi! </div>');
                redirect('mahasiswa/daftar_ujian');
				
			}else{


				if ($cek->num_rows() > 0) {

				echo $this->session->set_flashdata('msg', 'error');
				redirect('mahasiswa/daftar_ujian');
				
				}else{

					if (isset($_POST['submit'])) {

					$config['upload_path'] 		= './assets/upload/image/';
					$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
					$config['max_size']  		= '2400'; //max besar file 2 mb
					$config['encrypt_name'] 	= true;
					$this->load->library('upload', $config);


					if (!empty($_FILES['suggestion'])) {
						$this->upload->do_upload('suggestion');
						$data1 = $this->upload->data();
						$file1 = $data1['file_name'];

					}else{
						$data1 = '';
						$file1 = '';
					}

					if (!empty($_FILES['persetujuan_pembimbing'])) {
						$this->upload->do_upload('persetujuan_pembimbing');
						$data5 = $this->upload->data();
						$file5 = $data5['file_name'];

					}

					if (!empty($_FILES['pembayaran'])) {
						$this->upload->do_upload('pembayaran');
						$data2 = $this->upload->data();
						$file2 = $data2['file_name'];

					}

					if (!empty($_FILES['transkrip_nilai'])) {
						$this->upload->do_upload('transkrip_nilai');
						$data3 = $this->upload->data();
						$file3 = $data3['file_name'];

					}

					if (!empty($_FILES['btq'])) {
						$this->upload->do_upload('btq');
						$data4 = $this->upload->data();
						$file4 = $data4['file_name'];

					}
					
					if (!empty($_FILES['turnitin'])) {
						$this->upload->do_upload('turnitin');
						$data6 = $this->upload->data();
						$file6 = $data6['file_name'];

					}
					    $nama = $this->input->post('nama');
						$nim = $this->input->post('nim');
						$id_jenis_ujian = $this->input->post('jenis_ujian');

				// 		$jenis_ujian = $this->db->get_where('jenis_ujian', ['id_ujian' => $id_jenis_ujian])->row()->nama_ujian;

						$data['id_jenis_ujian'] 		= $id_jenis_ujian;
						$data['nama'] 					= $nama;
						$data['nim'] 					= $nim;
						$data['semester'] 				= $this->input->post('semester');
						$data['prodi'] 					= $this->input->post('prodi');
						$data['tgl_bayar']				= $this->input->post('tgl_bayar');
						$data['semester']				= $this->input->post('semester');
						$data['bukti_pembayaran_DU'] 	= $file2;
						$data['bukti_lolos_toefl'] 		= $file1;
						$data['persetujuan_pembimbing'] = $file5;
						$data['bukti_btq'] 				= $file4;
						$data['transkrip_nilai'] 		= $file3;
						$data['turnitin'] 				= $file6;
						$data['no_hp'] 					= $this->input->post('no_hp');
						$data['created'] 				= date('Y-m-d H:i:s');

						$this->db->insert('daftar_ujian', $data);
						echo $this->session->set_flashdata('msg', 'success');
						redirect('mahasiswa/daftar_ujian');
						echo "berhasil";
						
						// info ke email
				// 		$this->_sendEmail($nama, $nim, $jenis_ujian);

					}else{
						echo "gagal";
					}
				}
			}

		}
		
	}

	public function success()
	{
		$data['title']	= 'success';
        $data['isi']	= 'mahasiswa/success';

		$this->load->view('mahasiswa/layout/wrapper', $data, FALSE);
	}
	
	private function _sendEmail($nama, $nim, $jenis_ujian){
	    
	   
		require './vendor/autoload.php';


		$mail = new PHPMailer(true);
		try {
				//Server settings
	          $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
	          $mail->isSMTP();                                            //Send using SMTP
	          $mail->Host       = 'smtp.googlemail.com'; //Set the SMTP server to send through
	          $mail->SMTPAuth   = true;    //Enable SMTP authentication
	          $mail->Username   = 'cerdas.fkipumkendari@gmail.com';  //SMTP username
	          $mail->Password   = 'sistemCerdas123';    //SMTP password
	          $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
	          $mail->Port       = 465;             

	          //Recipients
	          $mail->setFrom('cerdas.fkipumkendari@gmail.com', 'SISTEM CERDAS FKIP');
	          $mail->addAddress('pc.ardiman98@gmail.com');     //Add a recipient
	          $mail->addReplyTo('cerdas.fkipumkendari@gmail.com', 'SISTEM CERDAS FKIP');

	          //Content
	          $mail->isHTML(true);                                  //Set email format to HTML
	          $mail->Subject = 'Info pendaftar ujian';
	          $mail->Body    = 'Hallo PRODI <b>PENDIDIKAN BAHASA INGGRIS,'.$nama.'</b> dengan nim <b>'.$nim.'</b> Telah Melakukan pendaftaran ujian <b>'.$jenis_ujian.'</b> 
	          <p>SALAM CERDAS :)</p>
	          ';

	          $mail->send();
	           echo "Send Email";
	      } catch (Exception $e) {
	          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	      }
	}

}


