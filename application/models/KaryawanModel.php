<?php

class KaryawanModel extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  public function get_all() {
    $query = "SELECT karyawan.*, tipe_karyawan.nama as tipe FROM karyawan JOIN tipe_karyawan ON karyawan.tipe_karyawan = tipe_karyawan.id";
    
    return $this->db->query($query)->result_array();
  }

  public function get_all_single($id) {
    return $this->db->get_where("karyawan", ["id" => $id])->row_array();
  }

  public function insert($data) {
    $this->db->insert("karyawan", $data);
    return $this->db->insert_id();
  }

  public function update($data, $id) {
    $this->db->set($data);
    $this->db->where("id", $id);
    $this->db->update("karyawan");

    return $this->db->affected_rows();
  }

  public function delete($id) {
    return $this->db->delete("karyawan", ["id" => $id]);
  }

  public function get_all_tipe() {
    return $this->db->get("tipe_karyawan")->result_array();
  }
}