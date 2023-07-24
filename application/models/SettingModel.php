<?php

class SettingModel extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  public function get_jadwal_pns() {
    return $this->db->get_where("pengaturan", ["tipe_karyawan" => 1])->row_array();
  }

  public function get_jadwal_honorer() {
    return $this->db->get_where("pengaturan", ["tipe_karyawan" => 2])->row_array();
  }

  public function set_jadwal_pns($data) {
    $this->db->set($data);
    $this->db->where("tipe_karyawan", 1);
    $this->db->update("pengaturan");

    return $this->db->affected_rows();
  }

  public function set_jadwal_honorer($data) {
    $this->db->set($data);
    $this->db->where("tipe_karyawan", 2);
    $this->db->update("pengaturan");

    return $this->db->affected_rows();
  }

  public function set_gaji($data) {
    $this->db->set("gaji", $data['nominal']);
    $this->db->where("id_golongan", $data['id_golongan']);
    $this->db->update("pengaturan_gaji");
    
    return $this->db->affected_rows();
  }

  public function set_jabatan($data) {
    $this->db->set("nominal", $data['nominal']);
    $this->db->where("id_jabatan", $data['id_jabatan']);
    $this->db->update("pengaturan_tunjangan");
    
    return $this->db->affected_rows();
  }
}