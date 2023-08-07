<?php

class TunjanganModel extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  public function get_tunjangan_dari_jabatan($id_jabatan) {
    return $this->db->get_where("pengaturan_tunjangan", ["id_jabatan" => $id_jabatan])->row_array();
  }

  public function get_all_tunjangan() {
    $query = "SELECT t.id, k.id as id_karyawan, k.nama, k.NIP, t.nominal FROM tunjangan t JOIN karyawan k ON t.id_karyawan = k.id";

    return $this->db->query($query)->result_array();
  }

  public function get_single_tunjangan($id) {
    return $this->db->get_where("tunjangan", ["id" => $id])->row_array();
  }

  public function insert_tunjangan($data) {
    return $this->db->insert("tunjangan", $data);
  }

  public function update_tunjangan($data, $id) {
    $this->db->set($data);
    $this->db->where("id", $id);
    $this->db->update("tunjangan");

    return $this->db->affected_rows();
  }
}