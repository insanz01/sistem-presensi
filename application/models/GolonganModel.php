<?php

class GolonganModel extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  public function get_all() {
    return $this->db->get("golongan")->result_array();
  }

  public function get_single($id) {
    return $this->db->get_where("golongan", ['id' => $id])->row_array();
  }
}