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

  private $map_presensi = [
    "ontime" => 0,
    "terlambat" => 1
  ];

  public function get_all_magang() {
    $query = "SELECT p.id, p.id_magang, m.email, m.nama, p.terlambat, l.kegiatan as catatan, p.created_at FROM presensi p JOIN magang m ON p.id_magang = m.id LEFT JOIN agenda_kegiatan l ON DATE(p.created_at) = DATE(l.created_at) WHERE l.id_magang = m.id";

    return $this->db->query($query)->result_array();
  }

  public function get_all_magang_filter($filter) {
    $tipe_presensi = $this->map_presensi[$filter['filter_absen']];

    $query = "SELECT p.id, p.id_magang, m.email, m.nama, p.terlambat, l.kegiatan as catatan, p.created_at FROM presensi p JOIN magang m ON p.id_magang = m.id LEFT JOIN agenda_kegiatan l ON DATE(p.created_at) = DATE(l.created_at) WHERE l.id_magang = m.id AND p.terlambat = $tipe_presensi";

    return $this->db->query($query)->result_array();
  }

  public function get_all($tipe_karyawan) {
    $id_tipe_karyawan = $this->map_karyawan[$tipe_karyawan];

    $query = "SELECT p.id, p.id_karyawan, k.NIP, k.nama, p.terlambat, l.catatan, p.created_at FROM presensi p JOIN karyawan k ON p.id_karyawan = k.id LEFT JOIN logbook l ON DATE(p.created_at) = DATE(l.created_at) WHERE k.tipe_karyawan = $id_tipe_karyawan AND p.kategori_presensi = 1";
    
    return $this->db->query($query)->result_array();
  }

  public function get_all_filter($tipe_karyawan, $filter) {
    $id_tipe_karyawan = $this->map_karyawan[$tipe_karyawan];
    $tipe_presensi = $this->map_presensi[$filter['filter_absen']];

    $query = "SELECT p.id, p.id_karyawan, k.NIP, k.nama, p.terlambat, l.catatan, p.created_at FROM presensi p JOIN karyawan k ON p.id_karyawan = k.id LEFT JOIN logbook l ON DATE(p.created_at) = DATE(l.created_at) WHERE k.tipe_karyawan = $id_tipe_karyawan AND p.terlambat = $tipe_presensi AND p.kategori_presensi = 1";
    
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