<?php

class PotonganModel extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  public function get_all_potongan() {
    return $this->db->get("potongan")->result_array();
  }

  public function insert_potongan($data) {
    return $this->db->insert("potongan", $data);
  }
}