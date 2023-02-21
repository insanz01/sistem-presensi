<?php

class LemburModel extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  public function get_all() {
    return $this->db->get("lembur")->result_array();
  }

  public function get_all_single($id) {
    return $this->db->get_where("lembur", ["id" => $id])->row_array();
  }

  public function insert($data) {
    $this->db->insert($data);
    return $this->db->insert_id();
  }

  public function update($data, $id) {
    $this->db->set($data);
    $this->db->where("id", $id);
    $this->db->update("lembur");

    return $this->db->affected_rows();
  }

  public function delete($id) {
    return $this->db->delete("lembur", ["id" => $id]);
  }
}