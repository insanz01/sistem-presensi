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
    
    $query = `SELECT "$current_time" < "08:00:00" AND "$current_time" > "07:00:00" as on_time;`;
    $waktu = $this->db->query($query)->row_array();

    return !$waktu['on_time'];
  }

  public function presensi($data) {
    $this->db->insert("presensi", $data);
    return $this->db->insert_id();
  }

  public function ajukan_lembur($data) {
    $this->db->insert("lembur", $data);
    return $this->db->insert_id();
  }
}