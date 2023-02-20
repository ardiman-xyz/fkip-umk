<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	function getAdminByUsername($username)
	{
		$this->db->where('username', $username);
		return $this->db->get('user')->row_object();
	}

	function getTeacherByUsername($username)
	{
		$this->db->where('teacher_name', $username);
		$this->db->where('teacher_hide', 0);
		return $this->db->get('my_teacher')->row_object();
	}

	function getStudentByNis($nis)
	{
		$this->db->where('student_nis', $nis);
		$this->db->where('student_hide', 0);
		return $this->db->get('my_student')->row_object();
	}

	function check($user, $pass)
	{
		$this->db->where('username', $user);
		$this->db->where('password', $pass);
		return $this->db->get('ms_admin');
	}



}

