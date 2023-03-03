<?php

class JabatanModel extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  public function get_all() {
    return $this->db->get("jabatan")->result_array();
  }

  public function get_tunjangan_by_jabatan_id($id_jabatan) {
    return $this->db->get_where("pengaturan_tunjangan", ['id_jabatan' => $id_jabatan])->row_array();
  }
}