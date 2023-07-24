<?php

class TunjanganModel extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  public function get_all_tunjangan() {
    return $this->db->get("tunjangan")->result_array();
  }

  public function insert_tunjangan($data) {
    return $this->db->insert("tunjangan", $data);
  }
}