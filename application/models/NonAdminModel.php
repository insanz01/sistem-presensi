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

  public function get_all_logbook() {
    $NIP = $this->session->userdata("SESS_PRESENSI_NIP");

    $query = "SELECT * FROM logbook WHERE DATE(created_at) = CURDATE() AND NIP = '$NIP'";

    return $this->db->query($query)->result_array();
  }

  public function ajukan_lembur($data) {
    $this->db->insert("lembur", $data);
    return $this->db->insert_id();
  }

  public function current_month_presensi() {
    $nip_karyawan = $this->session->userdata("SESS_PRESENSI_NIP");

    $karyawan = $this->db->get_where("karyawan", ["NIP" => $nip_karyawan])->row_array();

    $query = "SELECT presensi.created_at, kategori_presensi.nama as tipe_presensi FROM presensi JOIN kategori_presensi ON presensi.kategori_presensi = kategori_presensi.id WHERE MONTH(presensi.created_at) = MONTH(NOW()) AND presensi.id_karyawan = $karyawan[id]";

    return $this->db->query($query)->result_array();
  }

  public function get_lembur_hari_ini($id_karyawan) {
    $query = "SELECT * FROM lembur WHERE id_karyawan = $id_karyawan AND DATE(created_at) = CURRENT_DATE";

    return $this->db->query($query)->row_array();
  }

  public function update_lembur($id_lembur, $data) {
    $this->db->set($data);
    $this->db->where("id", $id_lembur);
    $this->db->update("lembur");

    return $this->db->affected_rows();
  }

  public function add_logbook($data) {
    $now = date("Y-m-d", time());

    $query = "SELECT * FROM logbook WHERE NIP = '$data[NIP]' AND DATE(created_at) = '$now'";
    $logbook = $this->db->query($query)->row_array();

    if($logbook) {
      $catatan = $logbook['catatan'];

      $catatan .= "\n" . $data['catatan'];

      $queryUpdate = "UPDATE logbook SET catatan = '$catatan' WHERE NIP = '$data[NIP]' AND DATE(created_at) = '$now'";

      return $this->db->query($queryUpdate);
    }
    
    return $this->db->insert("logbook", $data);
  }
}