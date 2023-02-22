<?php

class PresensiModel extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  private $map_karyawan = [
    "pns" => 1,
    "honorer" => 2,
    "magang" => 3
  ];

  public function get_all($tipe_karyawan) {
    $id_tipe_karyawan = $this->map_karyawan[$tipe_karyawan];

    $query = "SELECT p.id, p.id_karyawan, k.NIP, k.nama, p.terlambat, p.created_at FROM presensi p JOIN karyawan k ON p.id_karyawan = k.id WHERE k.tipe_karyawan = $id_tipe_karyawan";
    
    return $this->db->query($query)->result_array();
  }

  public function get_all_single($id) {
    return $this->db->get_where("presensi", ["id" => $id])->row_array();
  }

  public function insert($data) {
    $this->db->insert($data);
    return $this->db->insert_id();
  }

  public function update($data, $id) {
    $this->db->set($data);
    $this->db->where("id", $id);
    $this->db->update("presensi");

    return $this->db->affected_rows();
  }

  public function delete($id) {
    return $this->db->delete("presensi", ["id" => $id]);
  }
}