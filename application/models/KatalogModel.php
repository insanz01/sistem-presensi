<?php

class KatalogModel extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  public function get_all() {
    return $this->db->get("katalog")->result_array();
  }

  public function get_single($id) {
    return $this->db->get_where("katalog", ['id' => $id])->row_array();
  }

  public function insert($data) {
    return $this->db->insert("katalog", $data);
  }

  public function update($data, $id) {
    $this->db->set($data);
    $this->db->where('id', $id);
    $this->db->update("katalog");

    return $this->db->affected_rows();
  }

  public function delete($id) {
    return $this->db->delete("katalog", ["id" => $id]);
  }
}