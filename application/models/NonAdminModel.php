<?php

class NonAdminModel extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  public function get_karyawan_by_NIP($NIP) {
    return $this->db->get_where("karyawan", ["NIP" => $NIP])->row_array();
  }
}