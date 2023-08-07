<?php

class PotonganModel extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  public function get_all_potongan() {
    return $this->db->get("potongan")->result_array();
  }

  public function get_single_potongan($id) {
    return $this->db->get_where("potongan", ["id" => $id])->row_array();
  }

  public function insert_potongan($data) {
    return $this->db->insert("potongan", $data);
  }

  public function update_potongan($data, $id) {
    $this->db->set($data);
    $this->db->where("id", $id);
    $this->db->update("potongan");

    return $this->db->affected_rows();
  }

  public function delete_potongan($id) {
    return $this->db->delete('potongan', ['id' => $id]);
  }
}