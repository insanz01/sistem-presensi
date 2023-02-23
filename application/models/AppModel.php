<?php

class AppModel extends CI_Model {
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
  
  public function get_all_presensi() {
    $query = "SELECT p.id, p.id_karyawan, k.NIP, k.nama, k.tipe_karyawan, p.terlambat, p.created_at FROM presensi p JOIN karyawan k ON p.id_karyawan = k.id WHERE k.tipe_karyawan <> 3";
    
    return $this->db->query($query)->result_array();
  }

  public function get_all_presensi_filter($filter) {
    $query = "SELECT p.id, p.id_karyawan, k.NIP, k.nama, k.tipe_karyawan, p.terlambat, p.created_at FROM presensi p JOIN karyawan k ON p.id_karyawan = k.id WHERE p.kategori_presensi = 1 AND k.tipe_karyawan <> 3";

    if($filter['filter_karyawan'] != "") {
      $tipe_karyawan = $this->map_karyawan[$filter['filter_karyawan']];

      $query = "SELECT p.id, p.id_karyawan, k.NIP, k.nama, k.tipe_karyawan, p.terlambat, p.created_at FROM presensi p JOIN karyawan k ON p.id_karyawan = k.id WHERE p.kategori_presensi = 1 AND k.tipe_karyawan = $tipe_karyawan";
    }

    if($filter['filter_absen'] != "") {
      $tipe_presensi = $this->map_presensi[$filter['filter_absen']];

      $absenQuery = " AND p.terlambat = $tipe_presensi";

      $query .= $absenQuery;
    }

    return $this->db->query($query)->result_array();
  }
}