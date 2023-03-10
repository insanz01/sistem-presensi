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

  public function get_all_presensi_magang() {
    $query = "SELECT p.id, p.id_karyawan, k.NIP, k.nama, k.tipe_karyawan, p.terlambat, p.created_at FROM presensi p JOIN karyawan k ON p.id_karyawan = k.id WHERE k.tipe_karyawan = 3";
    
    return $this->db->query($query)->result_array();
  }

  public function get_all_presensi_filter($filter) {
    $query = "SELECT p.id, p.id_karyawan, k.NIP, k.nama, k.tipe_karyawan, p.terlambat, p.created_at FROM presensi p JOIN karyawan k ON p.id_karyawan = k.id WHERE p.kategori_presensi = 1 AND k.tipe_karyawan <> 3";

    if(key_exists("filter_karyawan", $filter)) {
      if($filter['filter_karyawan'] != "") {
        $tipe_karyawan = $this->map_karyawan[$filter['filter_karyawan']];
  
        $query = "SELECT p.id, p.id_karyawan, k.NIP, k.nama, k.tipe_karyawan, p.terlambat, p.created_at FROM presensi p JOIN karyawan k ON p.id_karyawan = k.id WHERE p.kategori_presensi = 1 AND k.tipe_karyawan = $tipe_karyawan";
      }
    }

    if(key_exists("filter_absen", $filter)) {
      if($filter['filter_absen'] != "") {
        $tipe_presensi = $this->map_presensi[$filter['filter_absen']];
  
        $absenQuery = " AND p.terlambat = $tipe_presensi";
  
        $query .= $absenQuery;
      }
    }

    return $this->db->query($query)->result_array();
  }

  public function get_all_presensi_magang_filter($filter) {
    $query = "SELECT p.id, p.id_karyawan, k.NIP, k.nama, k.tipe_karyawan, p.terlambat, p.created_at FROM presensi p JOIN karyawan k ON p.id_karyawan = k.id WHERE p.kategori_presensi = 1 AND k.tipe_karyawan = 3";

    if(key_exists("filter_absen", $filter)) {
      if($filter['filter_absen'] != "") {
        $tipe_presensi = $this->map_presensi[$filter['filter_absen']];
  
        $absenQuery = " AND p.terlambat = $tipe_presensi";
  
        $query .= $absenQuery;
      }
    }

    return $this->db->query($query)->result_array();
  }

  public function get_all_lembur_pns() {
    $query = "SELECT l.id, l.id_karyawan, k.NIP, k.nama, l.tanggal_lembur, l.durasi, l.jam_mulai, l.jam_selesai, l.status FROM lembur l JOIN karyawan k ON l.id_karyawan = k.id WHERE k.tipe_karyawan = 1";
    
    return $this->db->query($query)->result_array();
  }

  public function get_all_lembur_honorer() {
    $query = "SELECT l.id, l.id_karyawan, k.NIP, k.nama, l.tanggal_lembur, l.durasi, l.jam_mulai, l.jam_selesai, l.status FROM lembur l JOIN karyawan k ON l.id_karyawan = k.id WHERE k.tipe_karyawan = 2";
    
    return $this->db->query($query)->result_array();
  }

  public function get_total_karyawan() {
    $query = "SELECT COUNT(*) AS total FROM karyawan WHERE tipe_karyawan = 1 OR tipe_karyawan = 2";
    $data = $this->db->query($query)->row_array();

    return $data['total'];
  }

  public function get_total_magang() {
    $query = "SELECT COUNT(*) AS total FROM karyawan WHERE tipe_karyawan = 3";
    $data = $this->db->query($query)->row_array();

    return $data['total'];
  }

  public function get_total_presensi_today() {
    $query = "SELECT COUNT(*) AS total FROM presensi WHERE terlambat = 0 AND DATE(created_at) = DATE( NOW())";
    $data = $this->db->query($query)->row_array();

    return $data['total'];
  }

  public function get_total_terlambat() {
    $query = "SELECT COUNT(*) AS total FROM presensi WHERE terlambat = 1 AND DATE(created_at) = DATE( NOW())";
    $data = $this->db->query($query)->row_array();

    return $data['total'];
  }
}