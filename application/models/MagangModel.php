<?php

class MagangModel extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  public function get_all_magang() {
    return $this->db->get('magang')->result_array();
  }

  public function get_single_magang($id) {
    return $this->db->get_where('magang', ['id' => $id])->row_array();
  }

  public function get_single_magang_by_user_id($id_user) {
    return $this->db->get_where('magang', ['id_user' => $id_user])->row_array();
  }

  public function get_all_agenda() {
    return $this->db->get('agenda_kegiatan')->result_array();
  }

  public function get_all_agenda_by_magang_id($id_magang) {
    return $this->db->get_where("agenda_kegiatan", ['id_magang' => $id_magang])->result_array();
  }

  public function add_agenda($data) {
    $now = date("Y-m-d", time());

    $query = "SELECT * FROM agenda_kegiatan WHERE id_magang = $data[id_magang] AND DATE(created_at) = '$now'";
    $agenda_kegiatan = $this->db->query($query)->row_array();

    if($agenda_kegiatan) {
      $kegiatan = $agenda_kegiatan['kegiatan'];

      $kegiatan .= "\n" .  $data['kegiatan'];

      $queryUpdate = "UPDATE agenda_kegiatan SET kegiatan = '$kegiatan' WHERE id_magang = $data[id_magang] AND DATE(created_at) = '$now'";

      return $this->db->query($queryUpdate);
    }

    return $this->db->insert("agenda_kegiatan", $data);
  }

  public function get_all_penilaian_magang() {
    $query = "SELECT m.id, m.nama, p.disiplin_kerja, p.komunikasi, p.motivasi, p.inisiatif, p.kerjasama, p.etika, p.tanggung_jawab FROM penilaian_magang p JOIN magang m WHERE p.id_magang = m.id";

    return $this->db->query($query)->result_array();
  }

  public function get_not_exist_penilaian_magang() {
    $query = "SELECT magang.id, magang.nama FROM magang WHERE magang.id NOT IN (SELECT id_magang FROM penilaian_magang)";

    return $this->db->query($query)->result_array();
  }
}