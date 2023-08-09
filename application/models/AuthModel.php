<?php

class AuthModel extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  public function login($data) {
    $user = $this->db->get_where('users', ['username' => $data['username']])->row_array();

		if(password_verify($data['password'], $user['password'])) {
			if($user['is_active'] == 0) {
				$this->session->set_flashdata('is_active', false);
				return false;
			}

			$karyawan = $this->db->get_where('karyawan', ['id_user' => $user['id']])->row_array();
			$magang = $this->db->get_where('magang', ['id_user' => $user['id']])->row_array();

			if($karyawan) {
				$this->session->set_userdata("SESS_PRESENSI_NIP", $karyawan['NIP']);
				$this->session->set_userdata("SESS_PRESENSI_NAMA", $karyawan['nama']);
			} else {
				$this->session->set_userdata("SESS_PRESENSI_MAGANGID", $magang['id']);
				$this->session->set_userdata("SESS_PRESENSI_NAMA", $magang['nama']);
			}
			
			$this->session->set_userdata('SESS_PRESENSI_USERID', $user['id']);
			$this->session->set_userdata('SESS_PRESENSI_USERNAME', $user['username']);
			$this->session->set_userdata('SESS_PRESENSI_ROLEID', $user['role_id']);

			return true;
		}

		return false;
  }
}