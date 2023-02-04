<?php

class CabangModel extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  public function get_all() {
    return $this->db->get("cabang")->result_array();
  }

  public function get_single($id) {
    return $this->db->get_where("cabang", ['id' => $id])->row_array();
  }

  public function insert($data) {
    return $this->db->insert("cabang", $data);
  }

  public function update($data, $id) {
    $this->db->set($data);
    $this->db->where('id', $id);
    $this->db->update("cabang");

    return $this->db->affected_rows();
  }

  public function delete($id) {
    return $this->db->delete("cabang", ["id" => $id]);
  }
}