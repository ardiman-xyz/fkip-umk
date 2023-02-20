<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        // load data model user
        $this->CI->load->model('user_model');
	}

	// fungsi login
	public function login($username,$password)
	{
		$check = $this->CI->user_model->login($username,$password);
		// jika ada data user
		if ($check) {
			$id_user		= $check->id_user;
			$nama			= $check->nama;
			$akses_level	= $check->akses_level;

			// create session
			$this->CI->session->set_userdata('id_user',$id_user);
			$this->CI->session->set_userdata('nama',$nama);
			$this->CI->session->set_userdata('username',$username);
			$this->CI->session->set_userdata('akses_level',$akses_level);

			// redirect
			redirect(base_url('admin/dashboard'));
		}else{
			// kalau tidak ada username, password
			$this->CI->session->set_flashdata('warning', 'username dan password SALAH !');
			redirect(base_url('auth/error'));
		}
	}
	
	// fungsi cek login
	public function cek_login()
	{
		// memriksa session sudah ada atau belum
		if ($this->CI->session->userdata('nim') == "") {
			$this->CI->session->set_flashdata('warning', '<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert"><strong>Maaf ! </strong> Anda belum login! <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span aria-hidden="true">&times;</span></button></div>');
			redirect(base_url('surat'));
		}
	}

	function cek_login_admin()
	{
		if ($this->CI->session->userdata('username') == "") {
			$this->CI->session->set_flashdata('warning', '<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert"><strong>Maaf ! </strong> Anda belum login! <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span aria-hidden="true">&times;</span></button></div>');
			redirect(base_url('auth'));
		}	
	}

	function cek_login_unit()
	{
		if ($this->CI->session->userdata('username') == "") {
			$this->CI->session->set_flashdata('warning', '<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert"><strong>Maaf ! </strong> Anda belum login! <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span aria-hidden="true">&times;</span></button></div>');
			redirect(base_url('unit'));
		}	
	}

	function cek_login_tendik()
	{
		if ($this->CI->session->userdata('username') == "") {
			$this->CI->session->set_flashdata('warning', '<div class="alert alert-danger>Anda belum login</div>');
			redirect(base_url('tendik'));
		}	
	}

	// fungsi logout
	public function log_out()
	{
		// Membuang semua session yang telah dibuat 
		// create session
			$this->CI->session->unset_userdata('id_user');
			$this->CI->session->unset_userdata('nama');
			$this->CI->session->unset_userdata('username');
			$this->CI->session->unset_userdata('akses_level');
		// setelah di hapus maka di redirect
			$this->CI->session->set_flashdata('sukses', 'anda berhasil logout');
			redirect(base_url('login'));
	}



	function pdfGenerator($html, $fileName, $paper, $orientation)
	{
		$dompdf = new Dompdf\Dompdf();

		$dompdf->loadHtml($html);
		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper($paper, $orientation);
		// Render the HTML as PDF
		$dompdf->render();
		// Output the generated PDF to Browser
		$dompdf->stream($fileName, ['Attachment' => 0]);

	}

	// cek login staff fakultas
	function cek_login_fakultas()
	{
		if ($this->CI->session->userdata('username') == "" && $this->CI->session->userdata('level' != 'staff_fakultas')) {
			$this->CI->session->set_flashdata('warning', '<div class="alert alert-danger>Anda belum login</div>');
			redirect(base_url('tendik'));
		}	
	}

}
