<?php

class KategoriModel extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  public function get_all() {
    return $this->db->get("kategori_presensi")->result_array();
  }
}