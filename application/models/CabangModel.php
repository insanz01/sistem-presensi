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

  public function get_all_report() {
    $query = "SELECT cabang.id, cabang.nama, cabang.lokasi, cabang.created_at FROM cabang";
    $cabang = $this->db->query($query)->result_array();

    $result = [];

    foreach($cabang as $cab) {
      $query = "SELECT COUNT(*) as total_item FROM katalog WHERE id_cabang = $cab[id]";
      $produk = $this->db->query($query)->row_array();

      $temp = [
        "id" => $cab['id'],
        "nama" => $cab['nama'],
        "lokasi" => $cab['lokasi'],
        "created_at" => $cab['created_at'],
        "total_item" => $produk["total_item"]
      ];

      array_push($result, $temp);
    }

    return $result;
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