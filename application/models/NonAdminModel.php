<?php

class NonAdminModel extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  public function get_karyawan_by_NIP($NIP) {
    return $this->db->get_where("karyawan", ["NIP" => $NIP])->row_array();
  }

  public function check_keterlambatan() {
    $current_time = date("H:i:s", time());
    
    $query = "SELECT '$current_time' < '08:05:00' AND '$current_time' > '07:00:00' as on_time";
    $waktu = $this->db->query($query)->row_array();

    return !$waktu['on_time'];
  }

  public function exists_presensi($data) {
    $query = "SELECT * FROM presensi WHERE id_karyawan = $data[id_karyawan] AND kategori_presensi = $data[kategori_presensi] AND DATE(created_at) = DATE(now())";

    return $this->db->query($query)->row_array();
  }

  public function presensi($data) {
    $this->db->insert("presensi", $data);
    return $this->db->insert_id();
  }

  public function ajukan_lembur($data) {
    $this->db->insert("lembur", $data);
    return $this->db->insert_id();
  }

  public function current_month_presensi() {
    $id_karyawan = $this->session->userdata("SESS_PRESENSI_USERID");

    $query = "SELECT created_at FROM presensi WHERE MONTH(created_at) = MONTH(NOW()) AND id_karyawan = $id_karyawan";

    return $this->db->query()->result_array();
  }
}