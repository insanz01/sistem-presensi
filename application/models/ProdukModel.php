<?php

class ProdukModel extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  public function get_all() {
    return $this->db->get("produk")->result_array();
  }

  public function get_single($id) {
    return $this->db->get_where("produk", ['id' => $id])->row_array();
  }

  public function insert($data) {
    return $this->db->insert("produk", $data);
  }

  public function update($data, $id) {
    $this->db->set($data);
    $this->db->where('id', $id);
    $this->db->update("produk");

    return $this->db->affected_rows();
  }

  public function delete($id) {
    return $this->db->delete("produk", ["id" => $id]);
  }
}