<?php

class KatalogModel extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  public function get_all() {
    $query = "SELECT katalog.id, katalog.id_cabang, katalog.id_produk, produk.nama as nama_produk, produk.foto as foto_produk, katalog.jumlah, cabang.nama as nama_cabang, produk.detail, produk.foto, produk.harga FROM katalog JOIN produk ON katalog.id_produk = produk.id JOIN cabang ON katalog.id_cabang = cabang.id";

    return $this->db->query($query)->result_array();
  }

  public function get_all_by_cabang_id($id_cabang) {
    $query = "SELECT katalog.id, katalog.id_cabang, katalog.id_produk, produk.nama as nama_produk, produk.foto as foto_produk, katalog.jumlah, cabang.nama as nama_cabang, produk.detail, produk.foto, produk.harga FROM katalog JOIN produk ON katalog.id_produk = produk.id JOIN cabang ON katalog.id_cabang = cabang.id WHERE katalog.id_cabang = $id_cabang";

    return $this->db->query($query)->result_array();
  }

  public function get_single($id) {
    $query = "SELECT katalog.id, katalog.id_cabang, katalog.id_produk, produk.nama as nama_produk, produk.foto as foto_produk, katalog.jumlah, cabang.nama as nama_cabang, produk.detail, produk.foto, produk.harga FROM katalog JOIN produk ON katalog.id_produk = produk.id JOIN cabang ON katalog.id_cabang = cabang.id WHERE katalog.id = $id";

    return $this->db->query($query)->row_array();
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