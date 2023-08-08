<?php

class LemburModel extends CI_Model {
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

    $query = "SELECT l.id, l.id_karyawan, k.NIP, k.nama, l.tanggal_lembur, l.durasi, l.jam_mulai, l.jam_selesai, l.keterangan, l.file_bukti, l.status FROM lembur l JOIN karyawan k ON l.id_karyawan = k.id WHERE k.tipe_karyawan = $id_tipe_karyawan";
    
    return $this->db->query($query)->result_array();
  }

  public function get_all_single($id) {
    return $this->db->get_where("lembur", ["id" => $id])->row_array();
  }

  public function insert($data) {
    $this->db->insert($data);
    return $this->db->insert_id();
  }

  public function update($data, $id) {
    $this->db->set($data);
    $this->db->where("id", $id);
    $this->db->update("lembur");

    return $this->db->affected_rows();
  }

  private $status_map = [
    "setuju" => 1,
    "tolak" => -1
  ];

  public function update_status($id_lembur, $status) {    
    $this->db->set("status", $this->status_map[$status]);
    $this->db->where("id", $id_lembur);
    $this->db->update("lembur");

    return $this->db->affected_rows();
  }

  public function delete($id) {
    return $this->db->delete("lembur", ["id" => $id]);
  }
}