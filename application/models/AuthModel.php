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
			
			$this->session->set_userdata('SESS_PRESENSI_USERID', $user['id']);
			$this->session->set_userdata('SESS_PRESENSI_USERNAME', $user['username']);

			return true;
		}

		return false;
  }
}